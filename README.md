Manual installation

extract file and copy to Magento application folder "/app/code/"
ex: magento\path\app\code\GBPrimePay\Payments



Once the upload is completed you need to open de command line interface and run the following
commands to install the extension:

php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy

After running both commands the extension is installed successfully



Now the extension has been installed
login into Magento 2 backend and to go the
GBPrimePay Payments configuration by going to:
Stores->Configuration

Tab menu
GBPrimePay
GBPrimePay Payments Settings