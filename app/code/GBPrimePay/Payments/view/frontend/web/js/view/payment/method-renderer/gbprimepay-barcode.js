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
                template: 'GBPrimePay_Payments/payment/gbprimepay_barcode'
            },
            BarcodeName: ko.observable(),
            AccountName: ko.observable(),
            BarcodeRoutingnumber: ko.observable(),
            BarcodeAccountNumber: ko.observable(),

            initObservable: function () {
                // this.loadBarcodeRender();
                this._super().observe({
                    sayHello: '1'
                });
                var self = this;
                return this;
            },
            getCode: function () {
                return 'gbprimepay_barcode';
            },
            validate: function () {
                return true;
            },
            getInstructionBarcode: function () {
                return window.gbprimepay.instructionbarcode;
            },
            getBarcode: function () {
                return window.gbprimepay.generatebarcode;
            },
            getTitleBarcode:function () {
              return window.gbprimepay.titlebarcode;
            }
        });
    }
);
