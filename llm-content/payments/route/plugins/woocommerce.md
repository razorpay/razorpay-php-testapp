---
title: Route | WooCommerce
heading: Razorpay Route for WooCommerce
description: Transfer funds to Linked Accounts from your WooCommerce-enabled WordPress site using Razorpay Route.
---

# Razorpay Route for WooCommerce

Use Razorpay Route on your WooCommerce website to split payments received using the Razorpay Payment Gateway and transfer the funds to Linked Accounts. Razorpy Route is available in the [Razorpay Payment Gateway for WooCommerce plugin](https://woocommerce.com/products/razorpay-for-woocommerce/?quid=57ce5a37ef6413695523cb3fd68f1c1b). 

## Plugin Dependencies

You must have the following installed for the plugin to work:

Platform/Plugin/Language | Version
---
WordPress | 3.9.2 or higher
---
[WooCommerce Plugin for WordPress](https://wordpress.org/plugins/woocommerce/) | 2.4 or higher
---
[Razorpay WooCommerce Plugin](https://wordpress.org/plugins/woo-razorpay/) | 2.8.0 and above
---

## Prerequisites

- Integrate your [WooCommerce website](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce.md) with the Razorpay Payment Gateway plugin.
- Create [Linked Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/linked-account.md#create-linked-accounts) to split the received payments.
- Understand the [payment flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md) process.

## How it Works

1. You enable the Route Module in the Razorpay Payment Gateway plugin for WooCommerce.
2. You define the transfer details, such as the Linked Account number and amount, while creating a product.
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     The Route Module is a product-specific feature. You can exclude this module for the required product by not defining the transfer details while creating a product.
>     

3. The transfer will be initiated automatically after the customer makes the payment.

## Integration Steps

Follow these steps to integrate Razorpay Route on your WooCommerce-enabled WordPress website:

  - **1. Build Integration**: Integrate Route Using WooCommerce plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

## Support

If you have any queries, raise a ticket on the [Razorpay Support Portal](https://razorpay.com/support/).
