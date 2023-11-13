<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\CustomerOrderRefund\Api\Data;

interface LofCustomerRefundOrderInterface
{

    const ORDER_ID = 'order_id';
    const UPDATED_AT = 'updated_at';
    const ENTITY_ID = 'entity_id';
    const CREATED_AT = 'created_at';
    const CUSTOMER_ID = 'customer_id';


    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Lof\CustomerOrderRefund\LofCustomerRefundOrder\Api\Data\LofCustomerRefundOrderInterface
     */
    public function setEntityId($entityId);

    /**
     * Get order_id
     * @return string|null
     */
    public function getOrderId();

    /**
     * Set order_id
     * @param string $orderId
     * @return \Lof\CustomerOrderRefund\LofCustomerRefundOrder\Api\Data\LofCustomerRefundOrderInterface
     */
    public function setOrderId($orderId);

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Lof\CustomerOrderRefund\LofCustomerRefundOrder\Api\Data\LofCustomerRefundOrderInterface
     */
    public function setCustomerId($customerId);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Lof\CustomerOrderRefund\LofCustomerRefundOrder\Api\Data\LofCustomerRefundOrderInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Lof\CustomerOrderRefund\LofCustomerRefundOrder\Api\Data\LofCustomerRefundOrderInterface
     */
    public function setUpdatedAt($updatedAt);
}

