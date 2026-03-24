---
title: Razorpay Payment Gateway Flow
heading: How Payment Gateway Works
description: Understand the Razorpay Payment Gateway flow and how it works.
---

# How Payment Gateway Works

A Payment Gateway focuses on securing the sensitive information given by the user throughout the process. It ensures security by encrypting data like card and bank details provided by the user.

## Payment Gateway Workflow

Given below is a complete end-to-end flow about how you can use Razorpay Payment Gateway.

![](/docs/assets/images/payment-flow-pg.jpg)

    
### 1. Customer Places an Order

         A customer visits your website or app, selects items they want to purchase and clicks the pay button to place an order. For each order placed by your customer, you create a `transaction_id` or `checkout_id` on your server for your reference. For example, `#trn-345`.
        

    
### 2. Create Order from Server

         For each order placed by your customer, use the [Razorpay Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md) to create an order from your server.
        

    
### 3. Order ID Returned

         Razorpay processes the details sent and returns an `order_id` to you, for example, `order_EKwxwAgItmmXdp`. Map this `order_id` to the transaction_id `#trn-345` you created in the first step. Know more about [order states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders.md#order-states).
        

    
### 4. Pass Order ID to Checkout

         Pass the `order_id` returned by Razorpay to your integration. This invokes the Razorpay Checkout, the client-side UI, which displays various payment methods. 
        

    
### 5. Collect Payment Details

         The customer selects a payment option to complete the payment. The payment details entered by the customer are secured and stored by Razorpay as tokens. The generated tokens are exchanged with your servers for further use.
        

    
### 6. Bank Authenticates the Payment

         Razorpay sends an authentication request to the customer's bank internally. After authentication, Razorpay is authorised to deduct the amount from the customer's bank account.

         For successful payments, the Checkout returns the `razorpay_order_id`, `razorpay_payment_id` and `razorpay_signature`.

         Know more about [payment states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md#payment-life-cycle).
        

### Payment Capture and Settlement

Once your customer completes the payment and Razorpay authenticates it, you must capture it automatically or manually. You can also verify the payment signature to ensure that the payment is received from an authentic source. Know more about [payment capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).

After the payment is successfully captured, the amount is settled in your account according to your settlement cycle. Know more about [settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md).

### Refunds

Customers may claim [ refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md) after the transaction. In such cases, you can initiate a refund, post which the funds are sent back to the customer's account.

## Test Cards

Use the [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md) to test domestic payments, international payments and subscriptions.

### Test Razorpay Checkout

Test the Checkout by clicking the **PAY WITH RAZORPAY** button. 

- This initiates a  payment. 
- Provide your phone number, email address, select your preferred payment method and complete the payment.

> **WARN**
>
> 
> 
> **Live Transaction with Auto Refund**
> 
> This is a real transaction and money will be deducted from your account. However, the amount debited will be auto-refunded to your account in 5-7 working days.
> 

## Next Step

[Get started with Razorpay Payment Gateway integration.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md) 

### Related Information
- [Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md) 
- [Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md)
- [Features](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/features.md)

- [Set up your Razorpay account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md#1-sign-up)
- [List of required KYC documents](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/business-types-kyc-documents.md)
