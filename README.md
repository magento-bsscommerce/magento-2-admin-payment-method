# Admin Payment Method for Magento 2

Magento 2 Admin Payment Method extension allows store admins to create custom payment methods for admin orders. This is especially useful for handling offline payments, internal transactions, and special payment arrangements without exposing them to customers on the frontend.

## Key Features

- **Exclusive Admin Payment Method**: Create a new payment method that is only available in the Magento admin panel, preventing it from being selected on the frontend checkout.
- **Custom Payment Title & Instructions**: Define a custom title and instructions for the payment method to guide admin users during order creation.
- **Offline Payment Support**: Enable payments via offline methods such as bank transfers, cash payments, or custom internal payment terms.
- **Auto Invoice & Shipment**: Automatically generate invoices and shipments upon order completion, with an option to enable/disable in settings.
- **Order Tracking & Filtering**: Easily track and filter all orders using the admin payment method in a dedicated grid.
- **Easy Configuration**: Enable and configure the method within the Magento admin panel with minimal effort.

## Demo site

**[Backend demo Luma](https://admin-shipping-payment-method.demom2.bsscommerce.com/admin/sales/order/index/key/184bee617d7727a4e43b64cb5f472605f2930369ac973107584a966c87207cfb/)**

**[Frontend demo Luma](https://admin-shipping-payment-method.demom2.bsscommerce.com/)**

## Installation

1. Download the module from the BSS Commerce store: **[https://bsscommerce.com/magento-2-admin-payment-method-extension.html](https://bsscommerce.com/magento-2-admin-payment-method-extension.html)**

2. Extract the package and upload it to `app/code/Bss/AdminPaymentMethod`.

3. Run the following commands in the root directory:

```bash
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
```

4. Enable and customize the extension under Stores > Configuration > Sales > Payment Methods. Refer to our User Guide for detailed setup instructions.

## FAQ

**1. Will this payment method appear on the frontend checkout page?**

No, the Admin Payment Method is exclusively available in the Magento admin panel and cannot be selected by customers.

**2. Can I restrict the method to specific customer groups?**

No, the Magento 2 Admin Payment Method extension does not have a built-in feature to restrict payment methods by customer groups, as it is designed exclusively for admin use. However, if you need to restrict payment methods based on customer groups on the frontend, consider using **[BSS Magento 2 payment restrictions](https://bsscommerce.com/magento-2-shipping-and-payment-method-per-customer-group-extension.html)**

**3. How do I troubleshoot if the payment method is not appearing?**

Ensure the module is enabled, the cache is cleared, and configurations are correctly set under **Stores > Configuration > Sales > Payment Methods**. If the issue persists, check for conflicts with other payment extensions or review error logs for troubleshooting.




