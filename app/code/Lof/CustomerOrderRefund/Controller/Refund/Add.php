<?php
declare(strict_types=1);

namespace Lof\CustomerOrderRefund\Controller\Refund;

use Lof\CustomerOrderRefund\Model\LofCustomerRefundOrder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Setup\Exception;

class Add extends Action
{
    protected $resultFactory;

    /**
     * @var LofCustomerRefundOrder
     */
    protected $refundModel;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        ResultFactory $resultFactory,
        LofCustomerRefundOrder $refundModel,
    ) {
        $this->resultFactory = $resultFactory;
        $this->refundModel = $refundModel;
        parent::__construct($context);
    }

    /**
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|(\Magento\Framework\Controller\Result\Redirect&\Magento\Framework\Controller\ResultInterface)|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        $customerSession = $objectManager->create("Magento\Customer\Model\Session");
        try {
            $orderId = $this->getRequest()->getParam('order_id');
            $customerId = $customerSession->getCustomerId();

            $this->refundModel->setData([
                'customer_id' => $customerId,
                'order_id'  => $orderId
            ]);
            $this->refundModel->save();
        }catch (Exception $exception){
        }

        return $resultPage->setPath('order/refund/index');
    }
}
