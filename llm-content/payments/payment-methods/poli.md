---
title: International Payments - POLi
description: Accept payments from Australian customers using POLi.
---

# International Payments - POLi

Accept international payments from Australian customers using POLi, a popular payment method that enables customers to make payments directly from their bank accounts. 

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

![](/docs/assets/images/poli.jpg)

## Advantages

- **No card? No problem!** 

    Customers who do not have access to cards or do not want to use them for online transactions can use POLi to pay through their bank accounts.
- **No chargeback or fraud** 
 
    Avoid unnecessary chargebacks or frauds with an authorised bank transfer solution.
- **Instant confirmation** 
 
    Receive instant payment confirmation, unlike Swift transfers which can take days. 
- **Higher transaction amount** 
 
    We support payments up to $10,000.

## How it Works

1. After the payment method is enabled for your Razorpay account, it will appear automatically on Checkout without additional integration.
2. Your customer opens Razorpay checkout and selects POLi as the payment method.
3. Razorpay redirects the customer to a POLi-hosted payment page with a list of available banks in their country.
4. The customer chooses the bank and logs into the online bank account.
5. The customer selects the account to make payment and completes the additional factor of authentication (OTP verification).
6. The customer completes the payment and is redirected to your website or app.

### Pricing

POLi payments are charged at 3.0%.

### Refunds and Settlements

- Refunds are not supported for POLi payments. 
 
- POLi payments take T+14 days to get settled to your Razorpay account.

### Supported Integrations

For [Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md) no additional integration is needed.
- [Custom Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/poli/custom-integration.md)
- [S2S Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/poli/s2s-integration.md)  

### FAQ

#### 1. My customer claims to have made a payment using POLi, but we have not received any confirmation from POLi. Should I ask the customer to make another payment?

POLi transactions are asynchronous. In rare cases, POLi might not confirm whether a customer payment is successful. In this case, the customer may have transferred funds but not have received a receipt from POLi or you. 

This status can arise due to a bank or local issue at the customer's end. 

Ensure that when the customer clicks `Return to merchant's website`, they land on a page that displays a clear message asking them to check their bank account and verify that the amount has not been deducted before processing another transaction. This will reduce the chances of duplicate transactions.
