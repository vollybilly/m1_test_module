<?php

class Mobilunity_AllocatedOrders_Adminhtml_LocationmanagerController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Sales'))->_title($this->__('Location Managers'));
        $this->loadLayout();
        $this->_setActiveMenu('sales/mobilunity_allocatedorders');
        $this->renderLayout();
    }

    /**
     * Check ACL permissions
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('sales/mobilunity_allocatedorders');
    }

    /**
     * Grid action for ajax requests
     */
    public function gridAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Create or edit "location - manager" mapping
     */
    public function editAction()
    {
        /* @var Mobilunity_AllocatedOrders_Model_Locationmanager $model */
        $model = Mage::getModel('mobilunity_allocatedorders/locationmanager');
        Mage::register('current_locationmanager', $model);
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No record with ID % found.', $id));
                }
            }

            if ($model->getId()) {
                $pageTitle = $this->__('Edit "%s - %s" mapping',
                    $model->getPostcode(),
                    $model->getManager());
            } else {
                $pageTitle = $this->__('New "Location - Manager" mapping');
            }

            $this->_title($this->__('Sales'))
                ->_title($this->__('Location Managers'))
                ->_title($this->__($pageTitle));

            $this->loadLayout();

            $this->_setActiveMenu('sales/mobilunity_allocatedorders');

            $this->_addBreadcrumb($this->__('Sales'), $this->__('Sales'));
            $this->_addBreadcrumb($this->__('Location Managers'), $this->__('Location Managers'));
            $this->_addBreadcrumb($pageTitle, $pageTitle);

            $this->renderLayout();

        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*/index');
        }
    }

    /**
     * Process form post
     */
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            $this->_getSession()->setFormData($data);

            /* @var Mobilunity_AllocatedOrders_Model_Locationmanager $model */
            $model = Mage::getModel('mobilunity_allocatedorders/locationmanager');
            $id = $this->getRequest()->getParam('id');

            try {
                if ($id) {
                    $model->load($id);
                }
                $model->addData($data);
                $model->save();

                $this->_getSession()->addSuccess($this->__('"Location - Manager" mapping was successfully saved'));
                $this->_getSession()->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $params = ['id' => $model->getId()];
                    $this->_redirect('*/*/edit', $params);
                } else {
                    $this->_redirect('*/*/index');
                }
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', ['id' => $model->getId()]);
                } else {
                    $this->_redirect('*/*/new');
                }
            }

            return;
        }
    }

    /**
     * Delete "Postcode-Manager" mapping entity
     */
    public function deleteAction()
    {
        /* @var Mobilunity_AllocatedOrders_Model_Locationmanager $model */
        $model = Mage::getModel('mobilunity_allocatedorders/locationmanager');
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No record with ID % found.', $id));
                }
            }
            $postcode = $model->getPostcode();
            $manager = $model->getManager();
            $model->delete();
            $this->_getSession()->addSuccess($this->__(
                'Mapping "%s - %s" was successfully deleted', $postcode, $manager
            ));

            $this->_redirect('*/*');
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*');
        }
    }

    /**
     * Bulk delete of "Postcode-Manager" mapping entities
     */

    public function massDeleteAction()
    {
        $ids = $this->getRequest()->getParam('mapping_ids');

        if (!is_array($ids)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__(
                'Please select record(s).'
            ));
        } else {
            try {
                /* @var Mobilunity_AllocatedOrders_Model_Locationmanager $model */
                $model = Mage::getModel('mobilunity_allocatedorders/locationmanager');

                foreach ($ids as $id) {
                    if (!$model->load($id)->getId()) {
                        Mage::throwException($this->__('No record with ID % found.', $id));
                    }
                    $model->reset()
                        ->load($id)
                        ->delete();
                }

                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__('Total of %d record(s) were deleted.', count($ids))
                );

            } catch (Exception $e) {
                Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }
}
