---
title: Fund Account Error Codes
description: RazorpayX Fund Account Error Codes. Understand why they occur and the steps to resolve them.
---

# Fund Account Error Codes

Fund Account error codes are returned when a fund account creation fails for some reason. You can identify when a Fund Account API has failed with the response or webhooks.

## Errors Sample Code and Description

Here is an example of how an error code appears when a fund account creation fails.

### Sample Code

```json: Sample Error Response
{
  "error": 
  {
      "code": "BAD_REQUEST_ERROR",
      "description": "The id provided does not exist",
      "source": "business",
      "step": null,
      "reason": "input_validation_failed",
      "metadata": {}
  }
}
```

`code`
: `string` Not applicable for Error Codes, value displayed to maintain consistency of error object.

`description`
: `string` A description for the error. For example, `IMPS is not enabled on beneficiary account, Retry with different mode`.

`source`
: `string` Possible values:
  - `business`: The error can be fixed from your end.

`step`
: `string` Not applicable for API Error Codes, value displayed to maintain consistency of error object.

`reason`
: `string` The error reason. For example, `input_validation_failed`.

`metadata`
: `Null Value` Not applicable for API Error Codes, value displayed to maintain consistency of error object.

### Related Information

- [Fund Account APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/fund-accounts.md)
- [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md)
