---
title: Handle Errors
description: Know about errors returned in the API responses from the different payment methods used for Recurring Payments.
---

# Handle Errors

Razorpay aims to make every transaction successful for its customers. However, in the financial ecosystem errors might still occur because of intermittent communication and technical issues at multiple hops. Hence, it becomes critical for businesses to identify the `source` of the error, the payment `step` where the error occurred and the `reason` that caused the error. In short, you can identify the **who**, **where** and **why** of every payment error. This enables you to minimize or fix errors to reduce any losses.

With the new error codes, Razorpay helps you build your own logic and take remedial action at your end, wherever possible. Deriving these insights can help your business to:
- Map and analyze top failure reasons.
- Identify the source of failure. 

  Narrow down and understand if cause of the failure. Can be due to customer action or external factors (Razorpay, Gateway, Bank).
- Identify the payment step.
- Identify the exact reason of the failure.
- Handle actionable error codes.
- Avoid possible integration errors.
- Display valid responses to your customers.

## Error Response

All successful responses are returned with HTTP Status code 200. In case of failure, Razorpay API returns a JSON error response with the parameters that detail the reason for the failure.

The error response contains `code`, `description`, `field`, `source`, `step`, `reason` and `metadata` parameters that help you diagnose and solve the error.

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
: `string` The point of failure in the specific operation (payment in this case). For example, customer, business.

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

## Error Parameters

There are certain error codes specific for each payment method supported by Razorpay. To understand the errors and their `reasons`, it is recommended to know the `source` (stakeholders) and the `steps` involved in the payment flows.

@include error-reasons/emandate-flow

## Error Reasons

Below are the possible values for the `reason` parameter in the error response, their explanation and the next best action to be taken in case of a failure.

@include error-reasons/emandate-error-reasons

### Related Information
- [Integrate Recurring Payments Using Emandate](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/integrate.md)
- [Charge Customers During Registration - Use Cases and Payment Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/charge-customer-during-registration.md)
- [Supported Banks and Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/supported-banks.md)
- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/apis.md)
