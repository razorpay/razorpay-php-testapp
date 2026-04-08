---
title: About Orders
description: All about Razorpay Orders, their states and Razorpay Dashboard actions.
---

# About Orders

Order is an important step of the payment life cycle at Razorpay. When a customer clicks the pay button on your website or app, an order is created with a unique identifier. This contains details such as the transaction amount and currency. The order id secures the payment request and one cannot tamper with the order amount. Pass this order id to the Razorpay Checkout.

You need to integrate your server with Orders API before proceeding with Razorpay Payment Gateway integration on your website or app.

### Advantages

- Single successful payment bound to an order. Prevents multiple payments.
- Quick and easy query in the database. Combines multiple payment attempts for a single order.

## Order States

Following are the various states of an order:

 Status | Description
 ---
 `created` | When a new order is created, it is in the `created`  state. It stays in this state until payment is attempted on it.
 ---
 `attempted` | An order moves from `created` to `attempted` state when payment is first attempted on it. It remains in the `attempted` state until a payment associated with that order is captured.  
 ---
 `paid` | After the payment is captured successfully, the order moves to the `paid` state. No further payment requests are allowed once the order moves to the `paid` state. The order continues to be in the `paid` state even if the payment associated with the order is refunded.

> **WARN**
>
> 
>  **Watch Out!**
>  
>  If an order is in an `attempted` state with the associated payment id in the `authorised` state, initiating another payment using the same order id is not allowed.
>  

## Order and Payment Flows

Following is a pictorial representation of how order and payment flows are closely related:

![Pictorial representation of Order and Payment Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/orders-payment-flow.jpg.md)

## Create Orders

You can [create an order using this API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#create-an-order).

## Dashboard Actions

Perform the following actions using the Dashboard:
- [View orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders/dashboard.md#view-order-details)
- [Subscribe to Webhook Events related to orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders/dashboard.md#subscribe-to-webhook-events)
- [View reports related to orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders/dashboard.md#reports)

### Related Information

[Orders APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders/apis.md)
