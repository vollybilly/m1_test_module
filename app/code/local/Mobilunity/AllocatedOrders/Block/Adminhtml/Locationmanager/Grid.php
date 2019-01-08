<?php

class Mobilunity_AllocatedOrders_Block_Adminhtml_Locationmanager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Initialize Grid settings
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('mobilunity_locationmanager_list');
        $this->setDefaultSort('id');

        $this->setUseAjax(true);
    }

    /**
     * Prepare locationmanager collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('mobilunity_allocatedorders/locationmanager_collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare Grid columns
     *
     * @return Mobilunity_AllocatedOrders_Block_Adminhtml_Locationmanager_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('postcode', array(
            'header' => $this->__('Postcode'),
            'index'  => 'postcode'
        ));

        $this->addColumn('manager', array(
            'header' => $this->__('Manager'),
            'index'  => 'manager',
        ));

        $this->addColumn('action', array(
            'header'   => $this->__('Action'),
            'width'    => '100px',
            'type'     => 'action',
            'getter'   => 'getId',
            'actions'  => [
                [
                    'caption' => $this->__('Edit'),
                    'url'     => ['base' => '*/*/edit'],
                    'field'   => 'id',
                ]
            ],
            'filter'   => false,
            'sortable' => false,
        ));

        return parent::_prepareColumns();
    }


    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('mapping_ids');
        $this->getMassactionBlock()->setUseSelectAll(false);

        if (Mage::getSingleton('admin/session')->isAllowed('*/*/massDelete')) {
            $this->getMassactionBlock()->addItem('massdelete', array(
                'label' => Mage::helper('mobilunity_allocatedorders')->__('Delete'),
                'url'   => $this->getUrl('*/*/massDelete'),
            ));
        }

        return $this;
    }

    /**
     * Return url where to send user when he clicks on a row
     *
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }

    /**
     * Return grid url for AJAX query
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }
}
