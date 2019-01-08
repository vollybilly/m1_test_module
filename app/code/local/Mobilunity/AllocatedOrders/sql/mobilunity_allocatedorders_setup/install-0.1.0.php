<?php
/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$orderManagerTable = $this->getTable('mobilunity_allocatedorders/order_item_manager');
$postcodeManagerTable = $this->getTable('mobilunity_allocatedorders/postcode_manager');

// This table will be used to allocated orders for managers and to extend orders grid

$installer->run("
    CREATE TABLE IF NOT EXISTS `{$orderManagerTable}` (
        `entity_id` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `order_id` INT UNSIGNED NOT NULL,
        `manager` VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

// This table will contain a postcode-manager mapping

$installer->run("
    CREATE TABLE IF NOT EXISTS `{$postcodeManagerTable}` (
        `entity_id` INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `postcode` VARCHAR(255) NOT NULL,
        `manager` VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();
