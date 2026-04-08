---
title: Dynamic Currency Conversion on S2S Integration
description: Know how to allow the cardholder to convert international payments in INR (or other currency) to cardholders’ home currency via S2S Integration.
---

# Dynamic Currency Conversion on S2S Integration

You can use Dynamic Currency Conversion (DCC) to offer international cardholders a choice to pay in the local currency or their home currency. The customers can view the exact amount they will be charged before making the transaction. This feature is enabled by default for all S2S integrations.

For example, a customer whose home currency is INR and if the amount is displayed in USD, an INR equivalent of the USD amount is displayed to the user before making the payment.

> **WARN**
>
> 
> **Watch Out!**
> 
> Dynamic Currency Conversion (DCC) is not available for [Razorpay Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer.md).
> 

## DCC S2S Payment Flow

Below is the Dynamic Currency Conversion S2S payment flow:

1. The cardholder selects the payment method on the S2S checkout page and tries to make the payment.
    
2. If the card is a non-INR card, the user is directed to the Currency Conversion screen to change the currency.
    
3. The users also get the option to change the currency as per their choice. Based on the selected currency, the amount is displayed. The user can check the amount in the selected currency and proceed to make the payment.
    

### Disable Dynamic Currency Conversion

The DCC feature is available by default for all the S2S integrations. Please contact the [Support Team](https://razorpay.com/support/#request) if you want to disable it.

### Related Information

- [DCC Custom Checkout Payment Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/dynamic-currency-conversion/custom-integration.md)
- [International Payment Support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md)
