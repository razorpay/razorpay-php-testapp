---
title: GoPay
description: Accept payments from customers using GoPay.
---

# GoPay

GoPay is part of the GoJek super app ecosystem, which is widely-used e-wallet in Indonesia, enabling you to accept payments directly from customers. With GoPay, customers can make secure and seamless transactions using their mobile devices.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

> **INFO**
>
> 
> **Handy Tips**
> 
> - List of [supported region and currency](#supported-region-and-currency).
> - Razorpay's [pay in native currency](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/dynamic-currency-conversion.md) feature will ensure that your customer is shown the right currency.
> 

## Advantages

- **Wide Adoption:** GoPay is one of the most popular payment methods in Indonesia, offering businesses access to a large customer base.

- **Flexible Transaction Limits:** Supports both low and high transaction amounts, catering to various customer needs, including both KYC and non-KYC users.

- **Seamless Payment Experience:** The integration allows for a smooth transaction process, with customers completing payments through the GoJek app.

- **Comprehensive Refund Options:** Offers partial, multiple partial, and full refunds, enhancing customer satisfaction and merchant flexibility.

- **Secure Transactions:** Transactions are authenticated through a PIN entry, ensuring a secure payment process.

### Refunds and Settlements

Payments follow standard refund and settlement timelines.

- You can refund customer payments made using GoPay by following the usual [refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md) process.  
 
- GoPay payments take T+22 days to get settled to your Razorpay account.

### Supported Integrations

Secure [S2S integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/gopay/s2s-integration.md) for seamless payment processing.

### Supported Region and Currency

Given below is the region and currency that support DOKU, OVO and LinkAja payments:

Region | Currency
---
Indonesia | IDR

### Minimum and Maximum Transaction Amounts for GoPay Payments

Minimum Transaction Amount: IDR 1 

Maximum Transaction Amount:

  
    - Non-KYC User: IDR 2,000,000 per transaction
    - KYC’ed User: IDR 20,000,000 per transaction
  
  
    Limit varies based on the user’s spending and repayment history. The maximum possible limit is IDR 3,000,000.
