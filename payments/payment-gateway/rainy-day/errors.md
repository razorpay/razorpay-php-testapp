---
title: Rainy Day | Errors
heading: About Errors
description: Understand the errors returned in the API responses from Razorpay.
---

# About Errors

All successful responses are returned with HTTP Status code 200. In case of failure, Razorpay API returns a JSON error response with the parameters that detail the reason for the failure. 

> **INFO**
>
> 
> **Note:**
> 
> If you are using an official [Razorpay Language-wise SDK Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration.md), the error responses result in exceptions that need to be handled in your integration.
> 

## Error Response

The error response contains `code`, `description`, `field`, `source`, `step`, `reason` and `metadata` parameters that help you diagnose and solve the error.

To understand more about error codes, refer to the [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) section.

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

### Response Parameters

`error`
: `object` The error object.

`code`
: `string` Type of the error.

`description`
: `string` Descriptive text about the error.

`field`
: `string` Name of the parameter in the API request that caused the error.

`source`
: `string` The point of failure in the specific operation (payment in this case). For example, customer, business

`step` 
: `string` The stage where the transaction failure occurred. The stages can vary depending on the payment method used to complete the transaction.

`reason`
: `string` The exact error reason. It can be handled programmatically.

`metadata`
: `object` Contains additional information about the request.

    `payment_id`
    : `string` Unique identifier of the payment.
    
    `order_id`
    : `string` Unique identifier of the order associated with the payment.
