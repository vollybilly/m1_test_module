<?php

class Mobilunity_AllocatedOrders_Block_Adminhtml_Locationmanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Create outer form wrapper
     */
    protected function _construct()
    {
        parent::_construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'mobilunity_allocatedorders';
        $this->_controller = 'adminhtml_locationmanager';
        $this->_mode = 'edit';
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $this->_updateButton('save', 'label', $this->__('Save'));
        $this->_updateButton('delete', 'label', $this->__('Delete'));

        return $this;
    }

    /**
     * Return the title string to show above the form
     *
     * @return string
     */
    public function getHeaderText()
    {
        $model = Mage::registry('current_locationmanager');

        if ($model && $model->getId()) {
            return $this->__('Edit mapping "%s - %s"',
                $this->escapeHtml($model->getPostcode()),
                $this->escapeHtml($model->getManager())
            );
        } else {
            return $this->__('New "Location - Manager" mapping');
        }
    }
}
