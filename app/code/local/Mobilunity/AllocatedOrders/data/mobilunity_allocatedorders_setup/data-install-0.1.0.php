<?php

// Initial data install

// Part 1. Insert provided postcode-manager mapping into mobilunity_allocatedorders_postcode_manager table

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$postcodeManagerTable = $this->getTable('mobilunity_allocatedorders/postcode_manager');

$installer->run("

INSERT INTO `{$postcodeManagerTable}` 
(`postcode`, `manager`)
VALUES
('GU1 1', 'Dave Lister'),
('GU1 2', 'Arnold Rimmer'),
('GU1 3', 'Arthur Dent'),
('GU1 4', 'Ford Prefect'),
('GU1 9', 'Dave Lister'),
('GU10 1', 'Arnold Rimmer'),
('GU10 2', 'Arthur Dent'),
('GU10 3', 'Ford Prefect'),
('GU10 4', 'Dave Lister'),
('GU10 5', 'Arnold Rimmer'),
('GU11 1', 'Arthur Dent'),
('GU11 2', 'Ford Prefect'),
('GU11 3', 'Dave Lister'),
('GU11 9', 'Arnold Rimmer'),
('GU12 4', 'Arthur Dent'),
('GU12 5', 'Ford Prefect'),
('GU12 6', 'Dave Lister'),
('GU14 0', 'Arnold Rimmer'),
('GU14 4', 'Arthur Dent'),
('GU14 6', 'Ford Prefect'),
('GU14 7', 'Dave Lister'),
('GU14 8', 'Arnold Rimmer'),
('GU14 9', 'Arthur Dent'),
('GU15 1', 'Ford Prefect'),
('GU15 2', 'Dave Lister'),
('GU15 3', 'Arnold Rimmer'),
('GU15 4', 'Arthur Dent'),
('GU15 9', 'Ford Prefect'),
('GU16 6', 'Dave Lister'),
('GU16 7', 'Arnold Rimmer'),
('GU16 8', 'Arthur Dent'),
('GU16 9', 'Ford Prefect'),
('GU17 0', 'Dave Lister'),
('GU17 9', 'Arnold Rimmer'),
('GU18 5', 'Arthur Dent'),
('GU19 5', 'Ford Prefect'),
('GU2 4', 'Dave Lister'),
('GU2 7', 'Arnold Rimmer'),
('GU2 8', 'Arthur Dent'),
('GU2 9', 'Ford Prefect'),
('GU20 6', 'Dave Lister'),
('GU21 2', 'Arnold Rimmer'),
('GU21 3', 'Arthur Dent'),
('GU21 4', 'Ford Prefect'),
('GU21 5', 'Dave Lister');
 
");

$installer->endSetup();


// Part 2 (alternative - read file with explanations). Save provided postcode-manager mapping as serialized config data

$locationManagerValues =
[
    [
        'postcode' => 'GU1 1',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU1 2',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU1 3',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU1 4',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU1 9',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU10 1',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU10 2',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU10 3',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU10 4',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU10 5',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU11 1',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU11 2',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU11 3',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU11 9',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU12 4',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU12 5',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU12 6',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU14 0',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU14 4',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU14 6',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU14 7',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU14 8',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU14 9',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU15 1',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU15 2',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU15 3',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU15 4',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU15 9',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU16 6',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU16 7',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU16 8',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU16 9',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU17 0',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU17 9',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU18 5',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU19 5',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU2 4',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU2 7',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU2 8',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU2 9',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU20 6',
        'manager' => 'Dave Lister'
    ],
    [
        'postcode' => 'GU21 2',
        'manager' => 'Arnold Rimmer'
    ],
    [
        'postcode' => 'GU21 3',
        'manager' => 'Arthur Dent'
    ],
    [
        'postcode' => 'GU21 4',
        'manager' => 'Ford Prefect'
    ],
    [
        'postcode' => 'GU21 5',
        'manager' => 'Dave Lister'
    ]
];

Mage::getConfig()->saveConfig('mobilunity_allocatedorders/general/location_mapping', serialize($locationManagerValues));
