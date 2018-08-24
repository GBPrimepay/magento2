<?php
/**
 * GBPrimePay_Payments extension
 * @package GBPrimePay_Payments
 * @copyright Copyright (c) 2018 GBPrimePay Payments (https://gbprimepay.com/)
 */

namespace GBPrimePay\Payments\Block\Checkout\View;

use Magento\Catalog\Block\Product\Context;

class Config extends \Magento\Framework\View\Element\Template
{
    public $_configHelper;
    protected $cardFactory;
    private $checkoutSession;
    public $customerSession;
    public $countryFactory;
    public $localeList;

    public function __construct(
        Context $context,
        \GBPrimePay\Payments\Helper\ConfigHelper $configHelper,
        \GBPrimePay\Payments\Model\CardFactory $cardFactory,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Directory\Model\CountryFactory $countryFactory,
        \Magento\Framework\Locale\ListsInterface $localeList,
        array $data
    ) {

        $this->customerSession = $customerSession;
        $this->cardFactory = $cardFactory;
        $this->checkoutSession = $checkoutSession;
        $this->_configHelper = $configHelper;
        parent::__construct($context, $data);
        $this->countryFactory = $countryFactory;
        $this->localeList = $localeList;
    }

    public function getDataCard()
    {
        $customer_id = $this->customerSession->getCustomerId();
        $testModel = $this->cardFactory->create()
            ->getCollection()
            ->addFieldToFilter("magento_customer_id", $customer_id)
            ->getData();
        $this->checkFlag = count($testModel);

        return $testModel;
    }

    public function getConfigData()
    {
        return $this->_configHelper;
    }

    public function getGenerateQrcode()
    {
        return $this->checkoutSession->getGenerateQrcode();
    }

    public function getGenerateBarcode()
    {
        return $this->checkoutSession->getGenerateBarcode();
    }
}
