<?php
/**
 * GBPrimePay_Payments extension
 * @package GBPrimePay_Payments
 * @copyright Copyright (c) 2018 GBPrimePay Payments (https://gbprimepay.com/)
 */

namespace GBPrimePay\Payments\Controller\Checkout;

use Magento\Framework\App\ResponseInterface;

class loadQrcode extends \GBPrimePay\Payments\Controller\Checkout
{

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        try {



echo "<br>getLiveTokenKey-".$this->_config->getLiveTokenKey();
echo "<br>getTestTokenKey-".$this->_config->getTestTokenKey();
// echo "<br>orderId-".$orderId;




          $payment = $this->getInfoInstance();
          $order = $payment->getOrder();
          $amount = $order->getBaseGrandTotal();
          $customer_id = $order->getCustomerId();
          $orderId = $order->getIncrementId();


          echo "<br>orderId-".$orderId;
          echo "<br>customer_id-".$customer_id;
          echo "<br>amount-".$amount;



if ($this->_config->getCanDebug()) {
$this->gbprimepayLogger->addDebug("loadQrcode execute start//");
}
if ($this->_config->getCanDebug()) {
$this->gbprimepayLogger->addDebug("loadQrcode execute orderId //" . print_r($orderId, true));
}






      } catch (\Exception $exception) {
      if ($this->_config->getCanDebug()) {
          $this->gbprimepayLogger->addDebug("load Qrcode //" . $exception->getMessage());
      }
      // $this->cancelOrder();
      // $this->checkoutSession->restoreQuote();

      return $this->jsonFactory->create()->setData([
          'success' => false,
          'error' => true,
          'message' => $exception->getMessage()
      ]);
      }

    }
}
