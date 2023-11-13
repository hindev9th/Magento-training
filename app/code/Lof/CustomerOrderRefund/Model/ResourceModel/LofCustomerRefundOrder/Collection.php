<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\CustomerOrderRefund\Model\ResourceModel\LofCustomerRefundOrder;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Lof\CustomerOrderRefund\Model\LofCustomerRefundOrder::class,
            \Lof\CustomerOrderRefund\Model\ResourceModel\LofCustomerRefundOrder::class
        );
    }
}

