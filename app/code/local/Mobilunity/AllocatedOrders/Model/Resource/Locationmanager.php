<?php

class Mobilunity_AllocatedOrders_Model_Resource_Locationmanager extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        // init resource model
        $this->_init('mobilunity_allocatedorders/postcode_manager', 'entity_id');
    }
}
