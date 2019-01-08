<?php

/**
 * Class Mobilunity_Allocatedorders_Model_Observer
 */
class Mobilunity_Allocatedorders_Model_Observer
{
    /**
     * Method runs after checkout submit and allocate expensive orders to certain account manager.
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function checkoutSubmitAfter(Varien_Event_Observer $observer)
    {
        /* @var Mobilunity_AllocatedOrders_Helper_Data $helper */
        $helper = Mage::helper('mobilunity_allocatedorders');

        if ($helper->isEnabled()) {

            $order = $observer->getOrder();

            $orderGrandTotal = $order->getGrandTotal();

            $orderAmountThreshold = $helper->getOrderAmountThreshold();

            // Convert order amount to GB pounds (added this operation to avoid switching website to UK currency,
            // but even if it's UK website - it will work as well)
            $orderGrandTotalConverted = $helper->convertAmountByCurrency($orderGrandTotal);

            // check if bigger than configured amount threshold
            if ($orderAmountThreshold && $orderGrandTotalConverted > $orderAmountThreshold) {
                $orderShippingPostcode = $order->getShippingAddress()->getPostcode();

                // use serialized configuration mapping (my alternative way) or data "from grid"
                if ($helper->isUseConfigMapping()) {
                    $locationManagerMapping = $helper->getLocationManagerMapping();
                    $mappingRecords = count($locationManagerMapping);
                } else {
                    $locationManagerMapping = Mage::getModel('mobilunity_allocatedorders/locationmanager')->getCollection();
                    $mappingRecords = $locationManagerMapping->getSize();
                }

                if ($mappingRecords) {
                    foreach ($locationManagerMapping as $locationRecord) {
                        if ($orderShippingPostcode === $locationRecord['postcode']) {

                            // assign manager to the order
                            try {
                                $data = [
                                    'order_id' => $order->getId(),
                                    'manager'  => $locationRecord['manager']
                                ];

                                /* @var Mobilunity_AllocatedOrders_Model_Allocatedorders $model */
                                $model = Mage::getModel('mobilunity_allocatedorders/allocatedorders');
                                $model->setData($data);
                                $model->save();

                            } catch (Exception $e) {
                                Mage::logException($e);
                            }

                            break;
                        }
                    }
                }
            }
        }

        return $this;
    }
}
