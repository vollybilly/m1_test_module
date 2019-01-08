<?php

class Mobilunity_AllocatedOrders_Block_Adminhtml_Locationmanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('mobilunity_locationmanager_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('mobilunity_allocatedorders')->__('Mapping Setup'));
    }

    public function _beforeToHtml()
    {
        $this->addTab('general', array(
            'label'   => $this->__('General'),
            'content' => $this->getLayout()
                ->createBlock('mobilunity_allocatedorders/adminhtml_locationmanager_edit_tab_general')->toHtml(),
            'active'  => true
        ));

        return parent::_beforeToHtml();
    }
}
