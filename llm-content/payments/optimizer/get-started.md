---
title: Get Started With Optimizer
description: Integrate Optimizer on your website to start accepting payments.
---

# Get Started With Optimizer

Check the prerequisites and the integration steps for Optimizer.

## Prerequisites

- [Create a Razorpay account](https://dashboard.razorpay.com/).
- If you are an existing Razorpay user, please raise a request with our [support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account. 

## Integration Steps

To accept payments using Optimizer, follow the steps given below:

1. [Integrate with Razorpay Payment Gateway](#step-1-integrate-with-razorpay-payment-gateway).
2. [Add Payment Providers](#step-2-add-payment-providers).
3. [Configure Routing rules](#step-3-configure-routing-rules).

## Step 1: Integrate With Razorpay Payment Gateway
You can start accepting payments by integrating your website, app, or ecommerce store with the Razorpay Payment Gateway through any of the [integration methods available](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md).

  
### Payments API

     Payments APIs are used to capture and fetch payments. The payment entity has one extra field with Optimizer to identify the payment provider through which the payment is processed.

      Given below is the additional response parameter apart from the Payment Entity:

      `gateway_provider`
      : `string` The payment provider used to process the payment. Possible values:
          - `payu`
          - `cashfree`
          - `paytm`
          - `pinelabs`
          - `ccavenue`
          - `ingenico`
          - `billdesk_optimizer`

      Refer to [Payments Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#payments-entity) for the rest of the parameters.

      

      ```json: Payment Success
      {
        "id": "pay_JTiNyKvjH6p3GD",
        "entity": "payment",
        "amount": 100,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": true,
        "description": null,
        "card_id": "card_JTiNyNf65C8Qkn",
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "testing@razorpay.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": 0,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "auth_code": null
        },
        "gateway_provider": "payu",
        "created_at": 1652227221
      }

      ```json: Payment Failure
      {
        "id": "pay_Kb8P4crStfXJea",
        "entity": "payment",
        "amount": 10000,
        "currency": "INR",
        "status": "failed",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": false,
        "description": "Test Transaction",
        "card_id": "card_Kb8P4eO7zAsjQJ",
        "card": {
          "id": "card_Kb8P4eO7zAsjQJ",
          "entity": "card",
          "name": "",
          "last4": "0153",
          "network": "Visa",
          "type": "debit",
          "issuer": null,
          "international": false,
          "emi": false,
          "sub_type": "consumer",
          "token_iin": null
        },
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+9000090000",
        "notes": {
          "address": "Razorpay Corporate Office"
        },
        "fee": null,
        "tax": null,
        "error_code": "BAD_REQUEST_ERROR",
        "error_description": "Your payment has been cancelled. Try again or complete the payment later.",
        "error_source": "customer",
        "error_step": "payment_authentication",
        "error_reason": "payment_cancelled",
        "acquirer_data": {
          "auth_code": null
        },
        "gateway_provider": "payu",
        "created_at": 1667384312
      }
      ```
      
    

  
### Webhooks

     You can use Webhooks to configure and receive notifications when a specific event occurs. When an event is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. You can [set up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) from the Dashboard.

      Given below is the sample payload for webhook events for Optimizer. All the parameters and events will remain the same as shown in the [sample payloads for payment webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md) except for one additional parameter, `gateway_provider`.

      
      ```json: Webhook Sample Payload
      {
        "entity": "event",
        "account_id": "acc_BFQ7uQEaa7j2z7",
        "event": "payment.authorized",
        "contains": [
          "payment"
        ],
        "payload": {
          "payment": {
            "entity": {
              "id": "pay_DESlfW9H8K9uqM",
              "entity": "payment",
              "amount": 100,
              "currency": "INR",
              "status": "authorized",
              "order_id": "order_DESlLckIVRkHWj",
              "invoice_id": null,
              "international": false,
              "method": "netbanking",
              "amount_refunded": 0,
              "refund_status": null,
              "captured": false,
              "description": null,
              "card_id": null,
              "bank": "HDFC",
              "wallet": null,
              "vpa": null,
              "email": "gaurav.kumar@example.com",
              "contact": "+919876543210",
              "notes": [],
              "fee": null,
              "tax": null,
              "error_code": null,
              "error_description": null,
              "error_source": null,
              "error_step": null,
              "error_reason": null,
              "acquirer_data": {
                "bank_transaction_id": "0125836177"
              },
              "gateway_provider": "payu",
              "created_at": 1567674599
            }
          }
        },
        "created_at": 1567674606
      }
      ```
      
    

## Step 2: Add Payment Providers

Watch this video to know how to add payment providers and configure rules using Optimizer.

[Video: https://www.youtube.com/embed/xmjn0GD-7qM]

The Razorpay Dashboard offers a self-serve flow to [add Payment Providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/add-payment-providers.md) by submitting your details. This process is secure, and the details you add are fully encrypted which is only visible on your Dashboard. Know more about [Razorpay Security](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security.md).

## Step 3: Configure Routing Rules
Create your rules on the Razorpay Dashboard to [dynamically route transactions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/dynamic-routing.md) using different parameters like payment method, amount, issuer, and more. You can also add priorities in every rule to ensure transactions are routed to the best-performing gateway.

### Related Information

- [Add a Payment Provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/add-payment-providers.md)
- [Dynamic Routing](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/dynamic-routing.md)
- [Capture and Refund Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/capture-refund-settings.md)
- [Supported Gateways and Aggregators](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/supported-gateways-aggregators.md)
- [SR Analytics Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/success-rate.md)
- [Single Reconciliation View](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/reconciliation.md)
- [Roles and Permissions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/roles-and-permissions.md)
- [Tokenisation for Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/tokenisation.md)
