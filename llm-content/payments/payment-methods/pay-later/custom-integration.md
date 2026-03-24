---
title: Pay Later - Custom Checkout
description: Let your customers make payments using the Pay Later payment method on the Razorpay Custom Checkout.
---

# Pay Later - Custom Checkout

On the Razorpay Checkout form, you can let your customers make payments using the **Pay Later** service offered by various third-party providers.

Based on the concept, *Buy now, Pay Later*, the customers get a running line of credit by registering with any providers. When customers buy goods or services on your website or apps, no money is debited from their accounts. Instead, you will receive the payments from their providers. The customer pays back to the provider as per the fixed schedule defined by the provider.

## Providers

@include payment-methods/paylater/providers

## Payment Flow

1. At the Checkout, customers enter the contact details and select **PayLater** as the payment method.

2. From the displayed List of PayLater providers, customers select their preferred provider.

3. Customers authorise their accounts via the OTP sent to their registered phone numbers.

4. Payment is completed after successful validation.

## Prerequisites

- The [Razorpay Custom Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md) should be integrated on your website or app.
- Keep the API keys (a combination of `Key_Id` and `Key_Secret`) handy for integration. 
- [Generate API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from the Dashboard.
- Customers should be registered account holders of the Pay Later service providers.

## Integration Steps

After an order is created and the customer's payment details are received, the information should be sent to Razorpay to complete the payment. You can do this by invoking `createPayment` and passing `method=paylater` and `provider=`.

@include payment-methods/paylater/provider-code

```js: Sample Request
razorpay.createPayment({
  amount: 200000,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9111145678',
  order_id: 'order_DPzFe1Q1dEObDv',
  method: 'paylater',
  provider: 
});
```
