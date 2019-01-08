<?php

class Mobilunity_AllocatedOrders_Block_Adminhtml_Locationmanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Initialize grid container settings
     */
    protected function _construct()
    {
        $this->_blockGroup = 'mobilunity_allocatedorders';
        $this->_controller = 'adminhtml_locationmanager';
        $this->_headerText = $this->__('Location Managers');

        parent::_construct();
    }
}
