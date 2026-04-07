---
title: Payment Links APIs
description: Create, update, cancel and fetch Payment Links and resend notifications using Payment Links APIs.
---

# Payment Links APIs

Payment Links help you to receive payments from customers by sending them links via email and SMS. Use our APIs to create Payment Links. You can enter details such as amount, link expiry time, and more and send the link to the customer via email or SMS. The customer can select their desired payment method and complete the payment. Once the customer makes the payment, you will receive the amount in your bank account according to your settlement cycle.

There are two types of Payment Links:

- **Standard Payment Links**: Customers can make payments through netbanking, cards, wallets, UPI and bank transfer payment methods using Standard Payment Links.

- **UPI Payment Links**: Customers can select the UPI app of your choice to make payments using UPI Payment Links.

## Payment Link APIs

### Using Callback URL Parameter

Upon successful payment, customers can be directed to a designated URL through the `callback_url` and `callback_method` parameters. For example, you can redirect customers to `https://example-callback-url.com/`.

Parameter | Description
---
`razorpay_payment_id` | Payment ID of the successful payment.
---
`razorpay_payment_link_id` | Payment Link ID generated at the time of link creation.
---
`razorpay_payment_link_reference_id` | Internal order ID set by you for business reference using the `reference_id` parameter at the time of link creation. No value is returned if `reference_id` parameter was not used.
---
`razorpay_payment_link_status` | Current status of the link.
---
`razorpay_signature` | Signature for server-side validation to be calculated as HMAC hex digest using SHA256 algorithm. This is described below with a sample code.

The query parameters are added to the URL as shown:

```json: Query Parameters
https://example-callback-url.com/?razorpay_payment_id=pay_Fc8mUeDrEKf08Y&razorpay_payment_link_id=plink_Fc8lXILABzQL7M&
razorpay_payment_link_reference_id=TSsd1989&
razorpay_payment_link_status=partially_paid&razorpay_signature=b0ea302006
```

### Verify Signature

You can verify the `razorpay_signature` parameter to validate that it is authentic and sent from Razorpay servers.

The `razorpay_payment_link_id​` attribute should be stored in your system against an order, right after it is returned in the create [Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md) response. This is displayed as just `id` (for example, `"id": "plink_FKeEiabyAAiSVQ"`) in the response.

- The `razorpay_signature` should be validated by your server. In order to verify the signature, you need to create a signature using 
  - `razorpay_payment_link_id` 
  - `razorpay_payment_link_reference_id` 
  - `razorpay_payment_link_status`
  - `razorpay_payment_id​` 
  as payload and your `key_secret​` (your API secret) as secret.

After validating the signature, you should fetch the order in your system corresponding to the `razorpay_payment_link_id`​ and mark this order as successful.

### Related Information

- [Payment Links APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md)
- [Subscribe to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/subscribe-to-webhooks.md)
