<?php
/**
 * @package Mobilunity_AllocatedOrders
 */

/**
 * Class Mobilunity_AllocatedOrders_Helper_Data
 *
 * @SuppressWarnings(PHPMD.CamelCaseClassName)
 */
class Mobilunity_AllocatedOrders_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @var string
     */
    protected $configPrefix = 'mobilunity_allocatedorders/general/';

    /**
     * @param mixed $store
     *
     * @return bool
     */
    public function isEnabled($store = null)
    {
        return $this->getConfigFlag('enabled', $store);
    }

    /**
     * @param mixed $store
     *
     * @return bool
     */
    public function isUseConfigMapping($store = null)
    {
        return $this->getConfigFlag('use_config_mapping', $store);
    }

    /**
     * @param null $store
     * @return int
     */
    public function getOrderAmountThreshold($store = null)
    {
        return (int)$this->getConfig('threshold', $store);
    }


    /**
     * @return array
     *
     * Example:
     * [
     *      [
     *       'postcode' => 'GU12 6',
     *       'manager' => 'Dave Lister'
     *      ],
     *      [
     *       'postcode' => 'GU14 0',
     *       'manager' => 'Arnold Rimmer'
     *      ]
     * ]
     */
    public function getLocationManagerMapping()
    {
        $data = $this->getConfig('location_mapping');

        if (is_string($data)) {
            $data = @unserialize($data);
        }

        $result = [];

        if (is_array($data)) {
            foreach ($data as $row) {
                $row = array_map('trim', $row);

                if (isset($row['postcode'], $row['manager'])) {
                    $result[] = $row;
                }
            }
        }

        return $result;
    }

    /**
     * Convert amount in current currency to one in required currency (in which threshold is)
     *
     * TODO: add config option to select default currency code for threshold
     *
     * @param $amount
     * @param string $currencyCode
     * @return float
     */
    public function convertAmountByCurrency($amount, $currencyCode = 'GBP')
    {
        $currentCurrencyCode = Mage::app()->getStore()->getCurrentCurrencyCode();

        $convertedAmount = Mage::helper('directory')->currencyConvert($amount, $currentCurrencyCode, $currencyCode);

        return $convertedAmount;
    }

    /**
     * @param string $path
     * @param mixed  $store
     *
     * @return mixed
     */
    protected function getConfig($path, $store = null)
    {
        return Mage::getStoreConfig($this->configPrefix . $path, $store);
    }

    /**
     * @param string $path
     * @param mixed  $store
     *
     * @return bool
     */
    protected function getConfigFlag($path, $store = null)
    {
        return Mage::getStoreConfigFlag($this->configPrefix . $path, $store);
    }
}
