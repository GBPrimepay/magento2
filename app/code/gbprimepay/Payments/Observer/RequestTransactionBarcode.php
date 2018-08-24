<?php
/**
 * GBPrimePay_Payments extension
 * @package GBPrimePay_Payments
 * @copyright Copyright (c) 2018 GBPrimePay Payments (https://gbprimepay.com/)
 */

namespace GBPrimePay\Payments\Observer;

use Magento\Framework\Event\ObserverInterface;

class RequestTransactionBarcode implements ObserverInterface
{

protected $_config;
protected $gbprimepayLogger;

public function __construct(
    \Magento\Payment\Model\Method\Logger $logger,
    \GBPrimePay\Payments\Helper\ConfigHelper $configHelper,
    \GBPrimePay\Payments\Logger\Logger $gbprimepayLogger,
    array $data = []
) {

    $this->gbprimepayLogger = $gbprimepayLogger;
    $this->_config = $configHelper;

}
	public function execute(\Magento\Framework\Event\Observer $observer)
	{

  if ($this->_config->getCanDebug()) {
    $this->gbprimepayLogger->addDebug("RequestTransactionBarcode event start//");
  }

		return $this;
	}
}
