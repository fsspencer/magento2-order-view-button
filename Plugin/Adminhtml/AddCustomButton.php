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

namespace Codealist\OrderViewButton\Plugin\Adminhtml;


class AddCustomButton
{
    /**
     * @param \Magento\Backend\Block\Widget\Button\Toolbar\Interceptor $subject
     * @param \Magento\Framework\View\Element\AbstractBlock $context
     * @param \Magento\Backend\Block\Widget\Button\ButtonList $buttonList
     */
    public function beforePushButtons(
        \Magento\Backend\Block\Widget\Button\Toolbar\Interceptor $subject,
        \Magento\Framework\View\Element\AbstractBlock $context,
        \Magento\Backend\Block\Widget\Button\ButtonList $buttonList
    )
    {
        if ($context->getRequest()->getFullActionName() == 'sales_order_view') {
            $url = $context->getUrl('codealist_orderviewbutton/order/index');
            $buttonList->add(
                'customButton',
                ['label' => __('Do Something'), 'onclick' => 'setLocation("' . $url . '")', 'class' => 'reset'],
                -1
            );
        }
    }
}