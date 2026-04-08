---
title: Customer Payment History
description: View all the payments associated with a customer using Razorpay APIs.
---

# Customer Payment History

You can retrieve the history of all payments made by a customer using Razorpay APIs.

## Prerequisites

1. To fetch payments made by a customer, you must create and associate a customer with every payment.
  Create a new customer using the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) and store the customer ID at your end. This customer ID must be passed when the payment is made by the customer.

2. Generate the API keys from the Dashboard for authenticating the API requests with Razorpay.
Watch [this](https://i.imgur.com/ylwYzbC.gif) animation to learn how to generate the API keys in the Dashboard.

> **INFO**
>
> 
> **Note**
> 
> When the customer makes a first-time payment, the created `customer_id` can be used for future payments made by the same customer.
> 

## Associate a Payment with a Customer

To associate the payment details to a specific customer, pass the created `customer_id` to the [Razorpay Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#12-integrate-with-checkout-on-client-side) at the time of payment.

```html: HTML

```

## Fetch Payments by Customer ID

The following endpoint is used for retrieving a list of payments for a customer:

/payments

### Path Parameters

`customer_id` _string_
:  Unique identifier of the customer, which is passed to the Checkout form at the time of payment.

### Query Parameters

`from` _timestamp_
:  Timestamp, in seconds, at which the payments were created.

`to` _timestamp_
:  Timestamp, in seconds, till which the payments were created.

`count` _integer_
:  The number of payments to be fetched. Defaults to 10.

`skip` _integer_
:  The number of payments to be skipped.

### Example

```curl: Sample request
curl -X GET -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
https://api.razorpay.com/v1/payments?customer_id=cust_32hsbEKriO6ai4
```json: Response
{
  "count": 2,
  "entity": "collection",
  "items": [
    {
      "id": "pay_7IZD7aJ2kkmOjk",
      "entity": "payment",
      "amount": 29935,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "wallet",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami",
      "card_id": null,
      "bank": null,
      "wallet": "olamoney",
      "vpa": null,
      "email": "gaurav.kumar@example.com",
      "contact": "9123456780",
      "customer_id": "cust_32hsbEKriO6ai4",
      "notes": {
        "merchant_order_id": "order id"
      },
      "fee": 12,
      "tax": 2,
      "error_code": null,
      "error_description": null,
      "created_at": 1487348129
    },
    {
      "id": "pay_19btGlBig6xZ2f",
      "entity": "payment",
      "amount": 500,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "card",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "Purchase Description",
      "card_id": "card_12abClEig3hi2k",
      "bank": null,
      "wallet": null,
      "vpa": null,
      "email": "gaurav.kumar@example.com",
      "contact": "9123456780",
      "customer_id": "cust_32hsbEKriO6ai4",
      "notes": {
        "merchant_order_id": "order id"
      }
    },
    {
      "fee": 12,
      "tax": 2,
      "error_code": null,
      "error_description": null,
      "created_at": 1400826750
    }
  ]
}
```
