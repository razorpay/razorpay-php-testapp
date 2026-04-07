---
title: Refund Payments made to a Customer Identifier
description: Learn about the Refund API that enables you to refund payments made into a Customer Identifier.
---

# Refund Payments made to a Customer Identifier

You can process refunds for a payment made towards a Customer Identifier. The following endpoint refunds a payment using the payment ID.

/payments/:id/refund

## Path Parameter

`id` _mandatory_
: `string` The unique identifier of the payment to be refunded.

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/pay_E54n391WnEAV9H/refund \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "notes": {
    "key_1": "value1",
    "key_2": "value2"
  }
}'
```json: Response
{
  "id": "rfnd_E6j36ZEKvsWsEn",
  "entity": "refund",
  "amount": 100,
  "currency": "INR",
  "payment_id": "pay_E54n391WnEAV9H",
  "notes": {
    "key_1": "value1",
    "key_2": "value2"
  },
  "receipt": null,
  "acquirer_data": {
    "rrn": null
  },
  "created_at": 1579522301
}
```

## Request Parameters

`amount` _optional_
: `string` Amount to be refunded. If no value is passed, a full refund is issued.

`notes` _optional_
: `json object` Array of notes fields. You can enter custom data in key-value pairs. Refer the [Notes section of the API Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) documentation to learn more.

## Response Parameters

`id`
: `string` The unique identifier of the refund.

`amount`
: `integer` The amount that is refunded to the customer.

`currency`
: `string` The currency in which the payment is made. We support [international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`payment_id`
: `string` The unique identifier of the payment.

`notes`
: `json object` Array of notes fields. You can enter custom data in key-value pairs. 

`created_at`
: `integer` UNIX Timestamp that indicates when the refund was processed.

Refer [Refunds API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md) to perform other refund-related operations:
- Fetch a particular refund or a list of refunds for a payment ID.
- Update a refund to modify the Notes field.
