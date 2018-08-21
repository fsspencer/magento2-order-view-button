<?php
/**
 * Copyright © 2018 Codealist. All rights reserved.
 *
 * @category Class
 * @package  Codealist_OrderViewButton
 * @author   Codealist <info@codealist.com>
 * @license  See LICENSE.txt for license details.
 * @link     https://www.codealist.com/
 */

namespace Codealist\OrderViewButton\Controller\Adminhtml\Order;


class Index extends \Magento\Sales\Controller\Adminhtml\Order
{
    /**
     * Execute action
     *
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        // In case you want to do something with the order
        $order = $this->_initOrder();
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            // TODO: Do something with the order
            $this->messageManager->addSuccessMessage(__('We did something!'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $resultRedirect->setPath('sales/order/view', [ 'order_id' => $order->getId() ]);
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Codealist_OrderViewButton::order_dosomething');
    }
}