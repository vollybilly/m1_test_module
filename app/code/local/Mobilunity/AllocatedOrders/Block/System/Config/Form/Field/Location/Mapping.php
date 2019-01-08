<?php
/**
 * @package Mobilunity_AllocatedOrders
 */

/**
 * Class Mobilunity_AllocatedOrders_Block_System_Config_Form_Field_Location_Mapping
 *
 * @SuppressWarnings(PHPMD.CamelCaseClassName)
 */
class Mobilunity_AllocatedOrders_Block_System_Config_Form_Field_Location_Mapping extends
    Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    public function __construct()
    {
        $this->addColumn(
            'postcode',
            [
                'label' => $this->__('Postal Sector'),
                'style' => 'width:80px',
            ]
        );

        $this->addColumn(
            'manager',
            [
                'label' => $this->__('Account Manager'),
                'style' => 'width:150px',
            ]
        );

        $this->_addAfter = false;

        parent::__construct();
    }

    /**
     * Fix for ignored "depends enabled"
     * See: https://magento.stackexchange.com/questions/15500/configuration-depends-with-front-and-backend-model
     */
    public function _toHtml()
    {
        return '<div id="' . $this->getElement()->getId() . '">' . parent::_toHtml() . '</div>';
    }
}
