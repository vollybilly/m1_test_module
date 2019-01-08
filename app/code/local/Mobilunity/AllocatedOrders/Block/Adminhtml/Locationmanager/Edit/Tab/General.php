<?php

class Mobilunity_AllocatedOrders_Block_Adminhtml_Locationmanager_Edit_Tab_General extends Mage_Adminhtml_Block_Widget_Form
{
    public function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('general');
        $fieldset = $form->addFieldset('general_form', ['legend' => $this->__('Mapping Setup')]);

        if (Mage::registry('current_locationmanager')->getId()) {
            $fieldset->addField('entity_id', 'label', [
                'label' => $this->__('Entity ID %s', Mage::registry('current_locationmanager')->getId())
            ]);
        }

        $fieldset->addField('postcode', 'text', [
            'label'    => $this->__('Postcode'),
            'class'    => 'required-entry',
            'required' => true,
            'name'     => 'postcode'
        ]);

        $fieldset->addField('manager', 'text', [
            'label'    => $this->__('Manager'),
            'class'    => 'required-entry',
            'required' => true,
            'name'     => 'manager'
        ]);

        if (Mage::registry('current_locationmanager')) {
            $form->setValues(Mage::registry('current_locationmanager')->getData());
        }

        $this->setForm($form);

        return parent::_prepareForm();
    }
}
