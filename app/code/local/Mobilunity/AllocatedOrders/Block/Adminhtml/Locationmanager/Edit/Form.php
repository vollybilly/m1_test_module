<?php

class Mobilunity_AllocatedOrders_Block_Adminhtml_Locationmanager_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare the inner form wrapper
     */
    public function _prepareForm()
    {
        $form = new Varien_Data_Form([
            'id'      => 'edit_form',
            'action'  => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('id')]),
            'method'  => 'post',
            'enctype' => 'multipart/form_data',
        ]);
        $form->setUseContainer(true);
        $this->setForm($form);

        if (Mage::registry('current_locationmanager')) {
            $form->setValues(Mage::registry('current_locationmanager')->getData());
        }

        return parent::_prepareForm();
    }
}
