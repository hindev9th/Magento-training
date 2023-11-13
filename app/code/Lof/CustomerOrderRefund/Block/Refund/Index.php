<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\CustomerOrderRefund\Block\Refund;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Lof\CustomerOrderRefund\Model\ResourceModel\LofCustomerRefundOrder\CollectionFactory $collection
     */
    protected $collection;

    /**
     * @var \Magento\Customer\Model\SessionFactory $customerSession
     */
    protected $customerSession;

    /**
     * @var \Magento\Framework\Pricing\PriceCurrencyInterface
     */
    protected $priceCurrency;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Lof\CustomerOrderRefund\Model\ResourceModel\LofCustomerRefundOrder\CollectionFactory $collectionFactory,
        \Magento\Customer\Model\SessionFactory $customerSession,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        array $data = []
    ) {
        $this->collection = $collectionFactory;
        $this->customerSession = $customerSession;
        $this->priceCurrency = $priceCurrency;
        parent::__construct($context, $data);
    }

    /**
     * Get orders refund
     *
     * @return \Lof\CustomerOrderRefund\Model\ResourceModel\LofCustomerRefundOrder\Collection
     */
    public function getOrderRefunds()
    {
        $customerId = $this->customerSession->create()->getId();
        $orderRefunds = $this->collection->create();
        $orderRefunds
            ->getSelect()
            ->joinInner(["sales_order"],"main_table.order_id = sales_order.entity_id",[])
            ->columns(["sales_order.entity_id", "sales_order.created_at", "sales_order.grand_total", "sales_order.status"])
            ->where("main_table.customer_id = ".$customerId);
        return $orderRefunds;
    }

    /**
     * Get order view URL
     *
     * @param object $order
     * @return string
     */
    public function getViewUrl($order)
    {
        return $this->getUrl('sales/order/view', ['order_id' => $order['order_id']]);
    }

    /**
     * format price
     *
     * @param $amount
     * @return string
     */
    public function formatPriceCurrency($amount)
    {
        return $this->priceCurrency->convertAndFormat($amount);
    }

}

