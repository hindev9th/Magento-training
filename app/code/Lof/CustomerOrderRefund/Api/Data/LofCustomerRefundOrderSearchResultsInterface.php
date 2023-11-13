<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\CustomerOrderRefund\Api\Data;

interface LofCustomerRefundOrderSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get lof_customer_refund_order list.
     * @return \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface[]
     */
    public function getItems();

    /**
     * Set entity_id list.
     * @param \Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

