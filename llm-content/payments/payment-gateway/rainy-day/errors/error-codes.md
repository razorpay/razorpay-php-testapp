---
title: Rainy Day | Error Codes
heading: Error Codes
description: Handle errors received from Razorpay and take remedial action at your end.
---

# Error Codes

Razorpay aims to make every transaction successful for its customers. However, in the financial ecosystem errors might still occur because of intermittent communication and technical issues at multiple hops. Hence, it becomes critical for businesses to identify the `source` of the error, the payment `step` where the error occurred and the `reason` that caused the error. In short, you can identify the **who**, **where** and **why** of every payment error. This enables you to minimize or fix errors to reduce any losses.

With the new error codes, Razorpay helps you build your own logic and take remedial action at your end, wherever possible. Deriving these insights can help your business to:

-   Map and analyze top failure reasons 
-   Identify the source of failure. 
Narrow down and understand if cause of the failure. Can be due to customer action or external factors (Razorpay, Gateway, Bank, Network)
-   Identify the payment step  
-   Identify the exact reason of the failure
-   Handle actionable error codes
-   Avoid possible integration errors
-   Display valid responses to your customers

## Understanding the Error Response

Let us take an example where a payment failed because the customer entered a wrong OTP while making a payment using card on the Checkout.

```json: Sample Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Authentication failed due to incorrect otp",
    "field": null,
    "source": "customer",
    "step": "payment_authentication",
    "reason": "invalid_otp",
    "metadata": {
      "payment_id": "pay_EDNBKIP31Y4jl8",
      "order_id": "order_DBJKIP31Y4jl8"
    }
  }
}
```

Looking at the `source`, `step` and `reason` provided in the error description, you can understand that the payment failed at the authentication step due to the incorrect OTP entered by the customer. An elegant way to handle this error would be to notify your customer and bring them back to the checkout window and ask them to retry the payment with the correct OTP.

### Related Information

For the list of reasons, refer to the [Error Reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) section.

To understand error codes specific for each payment method supported by Razorpay, refer to the payment flows described in the [Payment Method Error Parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/payment-methods-error-parameters.md) section.
