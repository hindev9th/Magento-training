<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\CustomerOrderRefund\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class LofCustomerRefundOrder extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('lof_customer_refund_order', 'entity_id');
    }
}

