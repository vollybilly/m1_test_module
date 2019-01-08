<?php

class Mobilunity_AllocatedOrders_Model_Resource_Allocatedorders extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('mobilunity_allocatedorders/order_item_manager', 'entity_id');
    }
}
