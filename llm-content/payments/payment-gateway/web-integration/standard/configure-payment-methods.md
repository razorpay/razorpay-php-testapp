---
title: About Payment Methods Configuration
description: Configure the payment methods of your choice at Razorpay Checkout.
---

# About Payment Methods Configuration

You can configure the payment methods of your choice on the Razorpay Checkout to provide a highly personalised experience for your customers. This provides a simple and accessible experience to your customers increasing your sales and your success rates.

  
 

## Use Cases

Depending on the use cases that you might have, Razorpay allows you to create any configuration of the payment methods, of your choice:

- **Highlighting certain payment instruments on the Checkout.** For example, **Google Pay** could be displayed outside the UPI block as a separate payment method. **HDFC Netbanking** could come out of the Netbanking container as a different payment method.

- **Restricting the kind of network, issuer, BIN and card type, different card properties, to accept payments.** For example, you can choose to accept payments only from **HDFC Visa Debit cards** on the Checkout.

- **Removing a certain payment method or instrument.** For example, any wallet can be removed as a payment instrument from wallets. The entire **Netbanking** block or a certain bank in Netbanking can be removed from the Checkout.

- **Reordering of payment methods on the Checkout.** You can choose to arrange **UPI** as the first section instead of **Cards** on the Checkout. You can again order the PSPs within the UPI block according to your need.

- **Grouping of payment instruments.** For example, you can choose to group **Netbanking** and **UPI** payment methods of a bank as a block that will be labelled as **Pay via Bank** on the Checkout.

## Configuring Payment Methods

To control payment methods on the Checkout, there are different ways to pass the configuration to the Checkout:

- **Configure via Dashboard**: Choose the payment methods and instruments you want to display at checkout, arrange them in your preferred order, and tailor the checkout experience to match your business needs. Create custom payment blocks for specific customer segments on the Razorpay Dashboard. Know more about [Payment Configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-configuration.md).

- **Pass Configuration at Runtime**: Pass the configuration to the `options` parameter of the Checkout code at the run time.  This is useful when you want to modify the order of the payment methods for a particular set of payments while rendering the Checkout. See the [Sample Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/sample-code.md) for details.

- **Use a Configuration ID**: Create a global setting of the payments as a **Configuration ID** and pass these values while creating the Order. This is useful when you want control the checkout configurations dynamically using different **Configuration IDs**. You can create a **Configuration ID** through the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-configuration.md). There are two ways to pass the Configuration ID:
  - While creating the order: Add the `checkout_config_id` field in the order creation request.
  - While opening the checkout: Include the `checkout_config_id` in the checkout options.

  ```json: Pass config id
  "checkout_config_id": "YourConfigIDHere"
  ```

## Next Steps

[Understand the Configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/understand-configuration.md)

### Related Information

- [Customise Checkout Appearance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-styling.md)
- [Customise Checkout Experience](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md)
- [Customise Payment Methods on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-configuration.md)
- [Supported Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md)
- [Sample Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/sample-code.md)
