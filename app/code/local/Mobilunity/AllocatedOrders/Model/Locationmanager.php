<?php

class Mobilunity_AllocatedOrders_Model_Locationmanager extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('mobilunity_allocatedorders/locationmanager');
    }

    /**
     * Reset all model data
     *
     * @return Mage_Customer_Model_Customer
     */
    public function reset()
    {
        $this->setData(array());
        $this->setOrigData();
        $this->_attributes = null;

        return $this;
    }
}
