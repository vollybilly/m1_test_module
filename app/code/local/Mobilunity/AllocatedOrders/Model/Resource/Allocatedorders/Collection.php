<?php

class Mobilunity_AllocatedOrders_Model_Resource_Allocatedorders_Collection extends
    Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('mobilunity_allocatedorders/allocatedorders');
    }
}
