<?php
/**
 * GBPrimePay_Payments extension
 * @package GBPrimePay_Payments
 * @copyright Copyright (c) 2018 GBPrimePay Payments (https://gbprimepay.com/)
 */

namespace GBPrimePay\Payments\Observer;

use Magento\Framework\Event\ObserverInterface;

class RequestTransactionQrcode implements ObserverInterface
{



protected $_config;
protected $checkoutSession;
protected $customerFactory;
protected $customerSession;
protected $gbprimepayLogger;

public function __construct(
    \Magento\Framework\Model\Context $context,
    \Magento\Framework\Registry $registry,
    \Magento\Payment\Helper\Data $paymentData,
    \Magento\Payment\Model\Method\Logger $logger,
    \Magento\Customer\Model\Session $customerSession,
    \Magento\Backend\Model\Auth\Session $backendAuthSession,
    \Magento\Backend\Model\Session\Quote $sessionQuote,
    \Magento\Checkout\Model\Session $checkoutSession,
    \Magento\Quote\Api\CartRepositoryInterface $quoteRepository,
    \Magento\Quote\Api\CartManagementInterface $quoteManagement,
    \Magento\Framework\Message\ManagerInterface $messageManager,
    \Magento\Checkout\Helper\Data $checkoutData,
    \GBPrimePay\Payments\Helper\ConfigHelper $configHelper,
    \GBPrimePay\Payments\Model\CustomerFactory $customerFactory,
    \GBPrimePay\Payments\Logger\Logger $gbprimepayLogger,

    $data = []
) {

    $this->gbprimepayLogger = $gbprimepayLogger;
    $this->_config = $configHelper;
    $this->customerFactory = $customerFactory;
    $this->customerSession = $customerSession;
    $this->backendAuthSession = $backendAuthSession;
    $this->sessionQuote = $sessionQuote;
    $this->checkoutSession = $checkoutSession;
    $this->quoteRepository = $quoteRepository;
    $this->quoteManagement = $quoteManagement;
    $this->checkoutData = $checkoutData;

}
	public function execute(\Magento\Framework\Event\Observer $observer)
	{

  if ($this->_config->getCanDebug()) {
    $this->gbprimepayLogger->addDebug("RequestTransactionQrcode event start//");
  }



    $GenerateQrcodeStatus = $this->checkoutSession->getGenerateQrcodeStatus();
    // $payment = $this->getInfoInstance();
    // $order = $payment->getOrder();
    // $amount = $order->getBaseGrandTotal();
    // $customer_id = $order->getCustomerId();

  if ($this->_config->getCanDebug()) {
  $this->gbprimepayLogger->addDebug("GenerateQrcodeStatus yesoron//" . print_r($GenerateQrcodeStatus, true));

  // $this->gbprimepayLogger->addDebug("assignData data//" . print_r($customer_id, true));
  }

// $paymentData

    // $event = $observer->getEvent();

    // $orderId = $observer->getEvent()->getOrder()->getId();



    // $order = $observer->getEvent()->getOrder();





		return $this;
	}
}
