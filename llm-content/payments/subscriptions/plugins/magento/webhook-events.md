---
title: Subscriptions | Magento - Webhook Events
heading: Webhook Events
description: Check the webhook payloads for events relevant to Magento Plugin for Razorpay Subscriptions.
---

# Webhook Events

Webhooks (Web Callback, HTTP Push API or Reverse API) automatically notify your application when specific events occur. Instead of continuously polling APIs to check for updates, webhooks push notifications directly to your server when events happen.

## Webhooks vs APIs

Here is how webhooks compare to traditional API polling:

Aspect | APIs | Webhooks
---
**Data retrieval** | Pull-based (you request) | Push-based (we send)
---
**Timing** | On-demand | Near real-time when events occur
---
**Resource usage** | Requires polling | Event-driven, efficient

## How Razorpay Webhooks Work

When you subscribe to webhook events, Razorpay sends an HTTP POST request with JSON payload to your configured endpoint URL whenever those events are triggered.

Suppose you have subscribed to the `order.paid` webhook event, you will receive a notification every time a user pays you for an order, in the configured endpoint URL.

### Use Cases

There can be multiple uses for webhook events. Two of these are listed below.

    
### Capturing Late Authorised Payments

         Capturing payments for which you did not receive a response on the client-side is perhaps the most important use case for the `payment.authorized` event.

         Sometimes, the communication between the bank and Razorpay or between you and Razorpay may not occur. This could be because of a slow network connection or your customer closing the window while processing the payment. This could lead to a payment being marked as **Failed** on the Dashboard but changed to **Authorized** at a later time. Know more about [late authorisation of payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md).

         You can use webhooks to get notified about payments that get authorised and analyse this data to decide whether to capture the payment or not.
        

    
### Notifications on Failed Payments

         When a payment attempted by your customer fails, we receive the failed payment status from the bank. This payment gets recorded in our system as **Failed**.

         Suppose you have enabled the `payment.failed` webhook, you will receive a notification from us about the failed payment. You can then further analyse this payment and notify your customer about the failure.

        

### Setup and Configuration

- You can set up webhooks from your Dashboard and configure separate URLs for **Live** mode and **Test** mode. Know more about setting up [Payment webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) and [Payout webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md).
- A **Test** mode webhook receives events for your test transactions. Know more about [testing webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md).
- Webhook URLs must use ports **80** or **443** only.
- Ensure Razorpay webhook IPs are whitelisted on your server. Even if your server accepts all incoming requests, webhooks may still be blocked by cloud security groups or network configurations. Refer to [Razorpay IPs and Certificates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md#webhook-ips) for the complete list of webhook IP addresses.

> **WARN**
>
> 
> **Implementation Considerations**
> 
> Webhooks are the primary and most efficient method for event notifications. They are delivered asynchronously in near real-time. For critical user-facing flows that need instant confirmation (like showing "Payment Successful" immediately), supplement webhooks with API verification.
> 
> **Recommended approach** 

> - Rely on webhooks for all automation, which can be asynchronous.
> - If a critical user-facing flow requires instant status, but the webhook notification has not arrived within the time mandated by your business needs, perform an immediate API Fetch call ([Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md), [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-with-id.md) and [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds/fetch-specific-refund-payment.md)) to verify the status.
> 

Currently, webhooks are available for the following events:

Webhook Event | Description
---
`payment.authorized` | Sent when the authorisation payment has been made for the Subscription. A nominal amount is charged to validate the card details and is then automatically refunded.
---
`order.paid` | Triggered when an order is successfully paid.
---
`subscription.paused` | Sent when a Subscription is paused and moved to the `paused` state.
---
`subscription.cancelled` | Sent when a subscription is cancelled and moved to the cancelled state.
---
---
`payment.failed` | Sent when the payment attempt for a Subscription fails.
---
`subscription.cancelled` | Sent when a Subscription is cancelled and moved to the `cancelled` state.
---

## Webhook Sample Payloads

> **INFO**
>
> 
> **Handy Tips**
> 
> The payload for all these events would contain the Subscription entity. They would also contain a payment entity if a payment attempt was made before the event was triggered.
> 

### payment.authorized

```JSON: Payload Sample
{
   "entity":"event",
   "account_id":"acc_DDiURNtiQ5kFsb",
   "event":"payment.authorized",
   "contains":[
      "payment"
   ],
   "payload":{
      "payment":{
         "entity":{
            "id":"pay_DGoUVWeFLKKacL",
            "entity":"payment",
            "amount":6000,
            "currency":"INR",
            "status":"authorized",
            "order_id":"order_DGoUOaUvWLGnEO",
            "invoice_id":"inv_DGoUOZNF6uGBcA",
            "international":false,
            "method":"upi",
            "amount_refunded":0,
            "refund_status":null,
            "captured":false,
            "description":"Order 251",
            "card_id":null,
            "bank":null,
            "wallet":null,
            "vpa":"123@upi",
            "email":"gaurav.kumar@example.com",
            "contact":"+919999999998",
            "customer_id":"cust_DG44HEGMbfRm1N",
            "token_id":"token_DG4GL5OAv8tSYE",
            "notes":{
               "magento_order_id":"",
               "merchant_quote_id":"36"
            },
            "fee":null,
            "tax":null,
            "error_code":null,
            "error_description":null,
            "error_source":null,
            "error_step":null,
            "error_reason":null,
            "acquirer_data":{
               "rrn":"001000100002",
               "upi_transaction_id":"npci_txn_id_for_IilTQTf37sXXNX"
            },
            "created_at":1641976110
         }
      }
   },
   "created_at":1641976110
}
```

### order.paid 

```JSON: Sample Payload
{
   "entity":"event",
   "account_id":"acc_FzO2PyLE5ZYkW8",
   "event":"order.paid",
   "contains":[
      "payment",
      "order"
   ],
   "payload":{
      "payment":{
         "entity":{
            "id":"pay_IilTQTf37sXXNX",
            "entity":"payment",
            "amount":6000,
            "currency":"INR",
            "base_amount":6000,
            "status":"captured",
            "order_id":"order_IilT1yadIMdg9b",
            "invoice_id":"inv_IilT1w4sLgP3s2",
            "international":false,
            "method":"upi",
            "amount_refunded":0,
            "amount_transferred":0,
            "refund_status":null,
            "captured":true,
            "description":null,
            "card_id":null,
            "bank":null,
            "wallet":null,
            "vpa":"123@upi",
            "email":"roni_cost@example.com",
            "contact":"+1234567890",
            "customer_id":"cust_IilSzuBJCNvrsu",
            "token_id":"token_IilTQiLc4NU0je",
            "notes":{
               "merchant_order_id":"",
               "merchant_quote_id":"36"
            },
            "fee":142,
            "tax":22,
            "error_code":null,
            "error_description":null,
            "error_source":null,
            "error_step":null,
            "error_reason":null,
            "acquirer_data":{
               "rrn":"001000100002",
               "upi_transaction_id":"npci_txn_id_for_IilTQTf37sXXNX"
            },
            "created_at":1641976110
         }
      },
      "order":{
         "entity":{
            "id":"order_IilT1yadIMdg9b",
            "entity":"order",
            "amount":6000,
            "amount_paid":6000,
            "amount_due":0,
            "currency":"INR",
            "receipt":null,
            "offer_id":null,
            "status":"paid",
            "attempts":1,
            "notes":[
               
            ],
            "created_at":1641976087
         }
      }
   },
   "created_at":1641976113
}
```

### subscription.charged 

```JSON: Sample Payload
{
   "entity":"event",
   "account_id":"acc_FzO2PyLE5ZYkW8",
   "event":"subscription.charged",
   "contains":[
      "subscription",
      "payment"
   ],
   "payload":{
      "subscription":{
         "entity":{
            "id":"sub_IilT1Ob70FQPp3",
            "entity":"subscription",
            "plan_id":"plan_IilSFBnjkbmBuP",
            "customer_id":"cust_IilSzuBJCNvrsu",
            "status":"active",
            "current_start":1641976110,
            "current_end":1644949800,
            "ended_at":null,
            "quantity":1,
            "notes":{
               "source":"magento-subscription",
               "magento_quote_id":"36"
            },
            "charge_at":1644949800,
            "start_at":1641976110,
            "end_at":1657045800,
            "auth_attempts":0,
            "total_count":6,
            "paid_count":1,
            "customer_notify":false,
            "created_at":1641976086,
            "expire_by":null,
            "short_url":null,
            "has_scheduled_changes":false,
            "change_scheduled_at":null,
            "source":"magento-subscription",
            "payment_method":"upi",
            "offer_id":null,
            "remaining_count":5
         }
      },
      "payment":{
         "entity":{
            "id":"pay_IilTQTf37sXXNX",
            "entity":"payment",
            "amount":6000,
            "currency":"INR",
            "status":"captured",
            "order_id":"order_IilT1yadIMdg9b",
            "invoice_id":"inv_IilT1w4sLgP3s2",
            "international":false,
            "method":"upi",
            "amount_refunded":0,
            "amount_transferred":0,
            "refund_status":null,
            "captured":"1",
            "description":null,
            "card_id":null,
            "bank":null,
            "wallet":null,
            "vpa":"123@upi",
            "email":"roni_cost@example.com",
            "contact":"+1234567890",
            "customer_id":"cust_IilSzuBJCNvrsu",
            "token_id":"token_IilTQiLc4NU0je",
            "notes":{
               "merchant_order_id":"",
               "merchant_quote_id":"36"
            },
            "fee":142,
            "tax":22,
            "error_code":null,
            "error_description":null,
            "acquirer_data":{
               "rrn":"001000100002",
               "upi_transaction_id":"npci_txn_id_for_IilTQTf37sXXNX"
            },
            "created_at":1641976110
         }
      }
   },
   "created_at":1641976178
}
```

### subscription.paused

```JSON: Sample Payload
{
   "entity":"event",
   "account_id":"acc_FzO2PyLE5ZYkW8",
   "event":"subscription.paused",
   "contains":[
      "subscription"
   ],
   "payload":{
      "subscription":{
         "entity":{
            "id":"sub_IilT1Ob70FQPp3",
            "entity":"subscription",
            "plan_id":"plan_IilSFBnjkbmBuP",
            "customer_id":"cust_IilSzuBJCNvrsu",
            "status":"paused",
            "type":3,
            "current_start":1641976110,
            "current_end":1644949800,
            "ended_at":null,
            "quantity":1,
            "notes":{
               "source":"magento-subscription",
               "magento_quote_id":"36"
            },
            "charge_at":null,
            "start_at":1641976110,
            "end_at":1657045800,
            "auth_attempts":0,
            "total_count":6,
            "paid_count":1,
            "customer_notify":false,
            "created_at":1641976086,
            "expire_by":null,
            "short_url":null,
            "has_scheduled_changes":false,
            "change_scheduled_at":null,
            "source":"magento-subscription",
            "payment_method":"upi",
            "offer_id":null,
            "remaining_count":5,
            "pause_initiated_by":"self",
            "cancel_initiated_by":null
         }
      }
   },
   "created_at":1641976696
}
```

### subscription.cancelled

```JSON: Sample Payload
{
   "entity": "event",
   "account_id": "acc_FzO2PyLE5ZYkW8",
   "event": "subscription.cancelled",
   "contains": [
     "subscription"
   ],
   "payload": {
     "subscription": {
       "entity": {
         "id": "sub_IilT1Ob70FQPp3",
         "entity": "subscription",
         "plan_id": "plan_IilSFBnjkbmBuP",
         "customer_id": "cust_IilSzuBJCNvrsu",
         "status": "cancelled",
         "type": 3,
         "current_start": 1641976110,
         "current_end": 1644949800,
         "ended_at": 1641976760,
         "quantity": 1,
         "notes": {
           "source": "magento-subscription",
           "magento_quote_id": "36"
         },
         "charge_at": null,
         "start_at": 1641976110,
         "end_at": 1657045800,
         "auth_attempts": 0,
         "total_count": 6,
         "paid_count": 1,
         "customer_notify": false,
         "created_at": 1641976086,
         "expire_by": null,
         "short_url": null,
         "has_scheduled_changes": false,
         "change_scheduled_at": null,
         "source": "magento-subscription",
         "payment_method": "upi",
         "offer_id": null,
         "remaining_count": 5
       }
     }
   },
   "created_at": 1641976762
 }
```
