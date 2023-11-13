<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\CustomerOrderRefund\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface LofCustomerRefundOrderRepositoryInterface
{

    /**
     * Save lof_customer_refund_order
     * @param \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface $lofCustomerRefundOrder
     * @return \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface $lofCustomerRefundOrder
    );

    /**
     * Retrieve lof_customer_refund_order
     * @param string $lofCustomerRefundOrderId
     * @return \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($lofCustomerRefundOrderId);

    /**
     * Retrieve lof_customer_refund_order matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete lof_customer_refund_order
     * @param \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface $lofCustomerRefundOrder
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface $lofCustomerRefundOrder
    );

    /**
     * Delete lof_customer_refund_order by ID
     * @param string $lofCustomerRefundOrderId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($lofCustomerRefundOrderId);
}

