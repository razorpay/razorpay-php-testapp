---
title: Third-Party Validation (TPV) - S2S Integration
description: Know how Razorpay performs third-party validation (TPV) of your customers' bank accounts in real-time using Razorpay S2S Integration.
---

# Third-Party Validation (TPV) - S2S Integration

Third-Party Validation (TPV) of bank accounts is a mandatory requirement for merchants in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. As per Securities and Exchange Board of India (SEBI) guidelines, transactions must be made by the customers **only** from those bank accounts provided when they registered with your business.

With Razorpay, you can comply with the SEBI guidelines for online payment collections by offering TPV integrations with [major banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/s2s-integration/bank-list.md) at Checkout. Customers can make payments using netbanking, debit card or UPI. UPI supports both [Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/s2s-integration/upi/collect.md) and [Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/s2s-integration/upi/intent.md) flows.

> **SUCCESS**
>
> 
> **What's New**
> 
> Customers can now select card as the payment method and make payments only through their debit cards. Know more about [Debit Card TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/s2s-integration/debit-card.md)
> 

 to get this feature activated on your Razorpay account.

## Supported Payment Methods

- [Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/s2s-integration/netbanking.md)
  
Customers select netbanking as the payment method and make payments only through their registered bank accounts.
- [Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/s2s-integration/debit-card.md)
Customers select card as the payment method and make payments only through their debit cards.
  - **Guest Checkout**: Customers can add a new debit card for their purchase in this flow. They are given the option to save the card for future use or proceed with the purchase without saving the card details.

  - **[Coming Soon] Tokenized or Saved Card**: Soon, we'll introduce a streamlined checkout experience where customers can select a saved debit card for their purchase, eliminating the need to re-enter the card information.
- UPI
    - [Collect Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/s2s-integration/upi/collect.md)
      
Customers select UPI as the payment method and enter their registered UPI ID. They manually open their UPI PSP app and complete the payment.
    - [Intent Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/s2s-integration/upi/intent.md)
      
Customers select the UPI PSP app on your app. The UPI PSP app is launched automatically on their mobile devices, where they complete the payment.
