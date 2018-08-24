<!--
/**
 * Copyright © 2018 GBPrimePay Payments.
 */
-->
define(
    [
        'jquery',
        'ko',
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/model/full-screen-loader',
        'Magento_Checkout/js/model/payment/additional-validators',
    ], function ($, ko, Component, fullScreenLoader, additionalValidators) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'GBPrimePay_Payments/payment/gbprimepay_qrcode'
            },
            QrcodeName: ko.observable(),
            AccountName: ko.observable(),
            QrcodeRoutingnumber: ko.observable(),
            QrcodeAccountNumber: ko.observable(),

            initObservable: function () {
                // this.loadQrcodeRender();
                this._super().observe({
                    sayHello: '1'
                });
                var self = this;
                return this;
            },
            getCode: function () {
                return 'gbprimepay_qrcode';
            },
            validate: function () {
                return true;
            },
            getInstructionQrcode: function () {
                return window.gbprimepay.instructionqrcode;
            },
            getQrcode: function () {
                return window.gbprimepay.generateqrcode;
            },
            getTitleQrcode:function () {
              return window.gbprimepay.titleqrcode;
            }
        });
    }
);
