---
title: About Partner Auth
description: Use the Partner Auth credentials while using Razorpay product APIs to accept customer payments on behalf of your sub-merchants.
---

# About Partner Auth

You need to use Partner Auth credentials to accept payments from customers on behalf of your sub-merchants. You can use these Razorpay products to accept payments:

- [Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/payment-gateway.md)
- [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/payment-links.md)
- [QR Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/qr-codes.md)
- [Smart Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/smart-collect.md)
- [Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/subscriptions.md)
- [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/recurring-payments.md)

## Get Partner Auth Credentials

Use the Partner credentials as described in the [Dashboard Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators.md#partner-credentials). 

Watch this video to see how to access your Partner credentials.

> **INFOR**
>
> 
> **Handy Tips**
> 
> - We use `Basic Auth` for authorising Partner requests. 
> - These credentials are mode-specific. In addition to the API Key ID and Secret, provide the sub-merchant identification in the API requests in the header.
> 

## How to Use Partner Auth in APIs

To your API request: 
1. Add the basic auth with partner credentials (client_id and client_secret).
2. Add the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.
 
You can use Partner Auth for all [Razorpay APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md). 

Below is an example for [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

```Curl: GET Request
curl -u [CLIENT_ID]:[CLIENT_SECRET] \
-X GET https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-H "X-Razorpay-Account: acc_Ef7ArAsdU5t0XL" \

```Curl: POST Request
curl -u [CLIENT_ID]:[CLIENT_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-H "X-Razorpay-Account: acc_Ef7ArAsdU5t0XL" \
-d '{
    "amount": 10000,
    "currency": "INR",
    "receipt": "1"
}'
```

### Related Information

- [About Aggregators](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators.md)
- [Add Sub-merchants](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/add-submerchants.md)
- [Testing Operations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/testing.md)
