---
title: Error Codes
description: Check the API Error Codes, their meaning and steps to resolve the errors.
---

# Error Codes

RazorpayX aims to make all transaction successful for its customers. However, errors might still occur in the financial ecosystem because of intermittent communication and technical issues at multiple hops. Hence, it becomes critical for businesses to identify the `source` of the error and the `reason` for the error. This enables you to minimize or fix errors to reduce any losses.

API error codes are sent to you when an API cannot be fired. We return a JSON error response that contains the reason for the failure. You can use this response to make changes to the API request body and try to fire them again.

> **INFO**
>
> 
> **Handy Tips**
> 
> The error object in the payouts' API response gives more details about the exact reason for a payout failure and the suggested next steps. You can enable these changes from the RazorpayX Dashboard.
> 

> Please share this information with your developers and make sure to check if there is any hard mapping for parameters before making this change. Once enabled, these changes cannot be reverted back.
> 

## Sample Code

```json: Sample Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The id provided does not exist",
    "source": "business",
    "reason": "input_validation_failed",
    "step": "NA",
    "metadata": {}
  }
}
```

`code`
: `string` Type of the error. For example, `BAD_REQUEST_ERROR`.

`description`
: `string` A description for the error. For example, `The id provided does not exist`.

`source`
: `string` Possible values:
  - `business`: Merchant action required.
  - `internal`: Technical error at Razorpay's server.

`reason`
: `string` The error reason. For example, `input_validation_failed`.

`step`
: `NA` Not applicable for API Error Codes, value displayed to maintain consistency of error object.

`metadata`
: `Null value` Not applicable for API Error Codes, value displayed to maintain consistency of error object.

## API Error Source

Source | Explanation
---
`business` | Merchant action required.
---
`internal` | Technical error at Razorpay's server.

## API Error Reason and Next Steps

The table below lists the various API error reasons, explains the likely reason for the error and suggests the next steps you can take to fix the error.

Reason | Explanation | Next Step
---
#### input_validation_failed | Failed due to wrong request or input sent in the request parameter. Check the error `description` parameter for more information about the error. | Make the necessary changes and retry. Know about the [API response paremeters](https://razorpay.com/docs).
---
#### insufficient_funds | You do not have enough funds in your account to make the transaction. | Add funds to your account or use different account and retry.
---
#### server_error | Technical error at Razorpay's server. This usually occurs when there is some server issue at Razorpay's end. | Retry after some time or reach out to RazorpayX Support from the Dashboard.

### Related Information

- [About Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x.md)
- [Payout Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
