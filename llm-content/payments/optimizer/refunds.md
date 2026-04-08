---
title: Pay Refunds to Customers using Optimizer
heading: Refunds on Optimizer
description: Initiate Refunds for all payment gateways from one place via Optimizer using the Razorpay Dashboard and APIs for your customers.
---

# Refunds on Optimizer

There could be situations when customers request a refund of the payments made for the products or services purchased or availed on your website or app.

> **INFO**
>
> 
> 
> **Customer Looking for Refund**
> 
> If you are a customer looking for a refund, know about [customer refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers/customer-refunds.md).
> 

## How Refunds Work
When you request a refund through Optimizer, the details are forwarded to downstream payment gateways, each with its own refund procedures. Once processed, the refund amount is sent to the customer's bank account or card balance. For example, if a credit card was used to make the payment, the refund amount is pushed to the same credit card. 

> **INFO**
>
> 
> **Handy Tips**
> 
> Once the payment is processed, Optimizer retrieves the status from the downstream gateway and displays it to the customer.
> 

## Issue Refunds
You can issue refunds to your customers using the Dashboard or APIs. Refunds are possible for `captured` payments only.

Refunds can be made either in **full** or in **part**.

- **Full Refund**

You can refund the entire amount that you received in the payment.

- **Partial Refund**

You can refund part of the amount received in the payment. You can issue multiple, partial refunds as long as their sum does not exceed the captured amount.

A payment moves to the `refunded` state only when the entire amount is refunded to the customer. In case of partial refunds, the payment continues to remain in the `captured` state till the entire payment is refunded.

### Refund States

    
### Following are the various states of a refund:

         

         States | Description
         ---
         `created` | This state indicates that the refund is initiated from Razorpay. This state will be displayed only on the Refunds API.
         ---
         `processed` | This is the final state of the refund.
         ---
         `failed` | A refund can attain the failed state if normal refunds are not possible for a payment that is more than 6 months old.
         ---
         
        

### Issue Refunds Using Dashboard

    
### Follow the steps given below to issue refunds:

         1. Log in to the Dashboard.
         2. Navigate to **Transactions** → **Payments**.
         3. Select the payment for which refund is requested. The payment should be in the `captured` state.
         4. On the **Refund Payment** page, in the **amount** field, enter an amount lesser than the captured amount for issuing a partial refund.
         By default, the entire amount will be refunded.
             ![Refund Payment Page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-refund-screen.jpg.md)

         5. Click the **Issue Full Refund** or **Issue Partial Refund** button, depending on the amount to be refunded.
         6. Once the refund is processed successfully the status of the refund moves to `Refunded`, if not you can view the details of the gateway failure reason along with error code.
             ![Optimizer Refund details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-refund-gateway-details.jpg.md)
        

### View Refunds Details

    
### To view a refund:

         1. Log in to the Dashboard.
         2. Navigate to **Transactions** → **Refunds**.
         3. Click a **Refund Id** to view details of the refund.
            ![Refund Payment Page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-refund-view.jpg.md)
