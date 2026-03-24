---
title: Contact Error Codes
description: RazorpayX Contacts Error Codes. Understand why they occur and the steps to resolve them.
---

# Contact Error Codes

When firing [Contact APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts.md), you might run into errors for various reasons. These error codes are returned in an error body, which you can use to understand the reason for the error and the steps to resolve it.

## Error Sample Code and Description 

Here is an example of how an error code appears when any Contact API fails.

```json: Sample Error Response
{
  "error": {
      "code": "BAD_REQUEST_ERROR",
      "description": "The name field is required.",
      "source": "business",
      "step": null,
      "reason": "input_validation_failed",
      "metadata": {},
      "field": "name"
  }
}
```

`code`
: `string` Not applicable for Error Codes. The value is displayed to maintain consistency of the error object.

`description`
: `string` A description for the error. For example, `The name field is required.`.

`source`
: `string` Possible value is `business`. The error can be fixed from your end.

`step`
: `string` Not applicable for API Error Codes. The value is displayed to maintain consistency of the error object.

`reason`
: `string` The error reason. For example, `input_validation_failed`.

`metadata`
: `Null Value` Not applicable for API Error Codes. The value displayed to maintain consistency of the error object.

`field`
: The Contact details in the [Contact entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/#contact-entity.md) such as `name`, `email`, `type` and so on.

### Related Information

- [Contact APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts.md)
- [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
