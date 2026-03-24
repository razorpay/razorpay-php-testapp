---
title: Razorpay Subscriptions Plugin for Magento
description: Accept recurring payments on your Magento site using the Razorpay Subscription for Magento plugin.
---

# Razorpay Subscriptions Plugin for Magento

You can now accept recurring payments on your Magento site using the Razorpay Subscriptions for Magento. This plugin is built on the Razorpay Subscriptions product and offers seamless integration, allowing you to create and sell subscription services on your website.

Click the below button to download the Magento plugin.

[Magento](https://github.com/razorpay/subscriptions-magento-plugin/releases)

## Advantages
- Razorpay Subscription Plugin has a very quick and customer-friendly integration.
- There is no need to create Plans or Subscriptions using the Razorpay Dashboard or Razorpay APIs. All this can be done easily from your Magento Dashboard.
- Customers are not redirected from your website to make payments.
- You can accept recurring payments using Razorpay Subscription Plugin on your Magento website itself via Credit Card, Debit Card, Netbanking and UPI payment methods.

## Plugin Dependencies

You must have the following installed for the plugin to work:

Platform/Plugin/Language | Version
---
Magento | 2.3 or higher
---
[Razorpay Magento PG plugin](https://github.com/razorpay/razorpay-magento) | 3.5 or higher
---
[Razorpay Magento Subscriptions Plugin](https://github.com/razorpay/subscriptions-magento-plugin) | 1.0.0
---
PHP | 5.6.0 or higher
---
php-curl | N/A

## Prerequisites

- Sign up for a Razorpay Account.
- Generate API Keys from the Dashboard.

## Integration Steps

To start accepting subscription payments using the plugin:

On Your Magento Site:
1. [Install the Razorpay Subscriptions for Magento Plugin](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/magento/#install-the-razorpay-subscriptions-for-magento-plugin.md).
2. [Configure Magento Store](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/magento/#configure-magento-store.md).
3. [Create a Plan for a Subscription Product](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/magento/#create-a-plan-for-subscription-product.md).
4. [Enable Subscriptions for your Product](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/magento/#configure-your-product-for-subscriptions.md).
5. [Test it out - Sign up for a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/magento/test-it-out.md).

### Install the Razorpay Subscriptions for Magento Plugin

There are two methods to install the Razorpay Subscription for Magento plugin:
- Install with Composer
- Manual without Composer

#### Install the Razorpay Module with Composer

You can install the extension on your Magento store using the Composer Package Manager. 

Composer is an application-level package manager for the PHP programming language that provides a standard format for managing dependencies of PHP software and required libraries.

To install the Razorpay module using the Composer Package Manager:

1. Go to your installation root directory of Magento and execute the following command.

    ```php: Deploy Commands
    composer require razorpay/subscriptions-magento-plugin
    bin/magento module:enable Razorpay_Subscription
    ```

2. Run the following command to check the installation status.

    ```php: Installation Status Commands
    bin/magento module:status
    ```

#### Install the Razorpay Module without Composer

To install the Razorpay Subscriptions without the Composer Package Manager:

1. Download the `code.zip` file from the [latest release](https://github.com/razorpay/subscriptions-magento-plugin/releases) and extract the zip.
2. Place the `code` folder in your `app` folder. If you are updating the Razorpay Subscriptions, replace or overwrite the existing `code` folder.
3. Enable and deploy the Razorpay module using the following commands.

```php: Deploy Commands
bin/magento module:enable Razorpay_Subscription
bin/magento setup:upgrade
```

### Configure Magento Store

To configure your Magento store for Razorpay:

1. Log in to your [Magento store](https://business.adobe.com/products/magento/magento-commerce.html/).
2. Click **Stores** in the left menu and navigate to **Settings** → **Configuration**.
    ![](/docs/assets/images/sub_config_magento_configuration.jpg)
3. Expand **Sales** in the left menu and click **Payment Methods**.
    ![](/docs/assets/images/sub_config_magento_payment_meth.jpg)
4. Go to **Razorpay** in the **Payment Methods** page.
5. Enter your test mode [KEY_ID] and [KEY_SECRET]. These can be generated from your Dashboard.
6. Select the webhook events from the **Webhook Events** drop-down list to enable webhook notifications.
7. Select **Yes** from the **Enabled** drop-down list to enable the option to sell the Subscriptions.
    ![](/docs/assets/images/sub_config_magento_enable_rzp.jpg)
8. Click **Save Config**.

This activates your account in the Test Mode. You can use this account to make a few test payments to ensure a successful workflow.

### Create a Plan for Subscription Product.

To create a plan for a Subscription product:

1. Log in to your [Magento store](https://business.adobe.com/products/magento/magento-commerce.html/).
2. Navigate to **Razorpay Subscription** → **Manage Plans**.
    ![](/docs/assets/images/sub_magento_manage_palns.jpg)
3. Click **Add New Plan**.
4. Enter the all the required details.
5. Click **Save Plan**.
    ![](/docs/assets/images/sub_magento_plan_save.jpg)

> **WARN**
>
> 
> **Watch Out!**
> 
> 
> You can enable or disable a plan only after it is created.
> 
> ![](/docs/assets/images/sub_magento_enable_disable_plan.jpg)
> 

### Enable Subscriptions for your Product

To configure your product for Subscription in the Magento store:

1. Log in to your [Magento store](https://business.adobe.com/products/magento/magento-commerce.html/).
2. Navigate to **Catalog** → **Products**.
    ![](/docs/assets/images/sub_magento_catalog_products.jpg)
3. Select any product you want to enable Subscription and go to **Subscription By Razorpay** section.
4. Enable the Subscription on the product level. You can select the Subscription mode. Following are the options available.
    - **Subscription Only:** Customers will get an option of only a Subscription with a respective plan, and they will be unable to buy a product for one time.
      ![](/docs/assets/images/sub_magento_sub_only.jpg)
    - **With Subscription:** Customers will have both the option for buying a product once for all and a Subscription.
      ![](/docs/assets/images/sub_magento_sub_one_time.jpg)
5. Click **Save** to save the product.

#### Buy a Product on a Subscription Basis

To buy a product on a Subscription basis:

1. Go to your [Magento website](https://business.adobe.com/products/magento/magento-commerce.html/) and select the product which you have enabled for Subscription. 
2. Select the **Subscribe to this product** option and select the Subscription frequency from the **Select Frequency** drop-down list.
3. Click **Add to Cart** to proceed.
4. After the product is added to your cart, the Subscription details will be shown in the cart and the mini cart.
5. Click **Proceed to Checkout** to proceed with the checkout.

## Enable Webhooks

You can set up a webhook from the Dashboard and configure separate URLs for live and test mode.

> **INFO**
>
> 
> **Handy Tips**
> 
> For details of available events and sample payloads, refer to the [Webhook Events section](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce/troubleshooting-faqs.md).
> 

### Setup Webhooks

@include webhooks/webhooks-setup
