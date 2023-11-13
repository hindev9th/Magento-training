<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Lof\CustomerOrderRefund\Model;

use Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterface;
use Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderInterfaceFactory;
use Lof\CustomerOrderRefund\Api\Data\LofCustomerRefundOrderSearchResultsInterfaceFactory;
use Lof\CustomerOrderRefund\Api\LofCustomerRefundOrderRepositoryInterface;
use Lof\CustomerOrderRefund\Model\ResourceModel\LofCustomerRefundOrder as ResourceLofCustomerRefundOrder;
use Lof\CustomerOrderRefund\Model\ResourceModel\LofCustomerRefundOrder\CollectionFactory as LofCustomerRefundOrderCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class LofCustomerRefundOrderRepository implements LofCustomerRefundOrderRepositoryInterface
{

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var LofCustomerRefundOrderCollectionFactory
     */
    protected $lofCustomerRefundOrderCollectionFactory;

    /**
     * @var LofCustomerRefundOrder
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceLofCustomerRefundOrder
     */
    protected $resource;

    /**
     * @var LofCustomerRefundOrderInterfaceFactory
     */
    protected $lofCustomerRefundOrderFactory;


    /**
     * @param ResourceLofCustomerRefundOrder $resource
     * @param LofCustomerRefundOrderInterfaceFactory $lofCustomerRefundOrderFactory
     * @param LofCustomerRefundOrderCollectionFactory $lofCustomerRefundOrderCollectionFactory
     * @param LofCustomerRefundOrderSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceLofCustomerRefundOrder $resource,
        LofCustomerRefundOrderInterfaceFactory $lofCustomerRefundOrderFactory,
        LofCustomerRefundOrderCollectionFactory $lofCustomerRefundOrderCollectionFactory,
        LofCustomerRefundOrderSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->lofCustomerRefundOrderFactory = $lofCustomerRefundOrderFactory;
        $this->lofCustomerRefundOrderCollectionFactory = $lofCustomerRefundOrderCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        LofCustomerRefundOrderInterface $lofCustomerRefundOrder
    ) {
        try {
            $this->resource->save($lofCustomerRefundOrder);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the lofCustomerRefundOrder: %1',
                $exception->getMessage()
            ));
        }
        return $lofCustomerRefundOrder;
    }

    /**
     * @inheritDoc
     */
    public function get($lofCustomerRefundOrderId)
    {
        $lofCustomerRefundOrder = $this->lofCustomerRefundOrderFactory->create();
        $this->resource->load($lofCustomerRefundOrder, $lofCustomerRefundOrderId);
        if (!$lofCustomerRefundOrder->getId()) {
            throw new NoSuchEntityException(__('lof_customer_refund_order with id "%1" does not exist.', $lofCustomerRefundOrderId));
        }
        return $lofCustomerRefundOrder;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->lofCustomerRefundOrderCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        LofCustomerRefundOrderInterface $lofCustomerRefundOrder
    ) {
        try {
            $lofCustomerRefundOrderModel = $this->lofCustomerRefundOrderFactory->create();
            $this->resource->load($lofCustomerRefundOrderModel, $lofCustomerRefundOrder->getLofCustomerRefundOrderId());
            $this->resource->delete($lofCustomerRefundOrderModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the lof_customer_refund_order: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($lofCustomerRefundOrderId)
    {
        return $this->delete($this->get($lofCustomerRefundOrderId));
    }
}

