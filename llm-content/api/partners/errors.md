---
title: Generic Partners API Errors
heading: Generic API Errors
description: List of errors encountered while using Partners API with solutions.
---

# Generic API Errors

Given below are the error codes and descriptions that are common to all Onboarding APIs.

- [400 Bad Request Error](#400-bad-request-error)
- [401 Unauthorized](#401-unauthorized)
- [500 Internal Server Error](#500-internal-server-error)

## 400 Bad Request Error

Given below are sample error objects for bad request errors.

### Data Exceeds Specified Length

This error occurs when the value sent for a particular field exceeds the specified limit. For example, if you had sent a phone number with more than 10 digits.

Error Description | Solution
---
The `field_name` must be `x` digits. | Check the length mentioned in the documentation and resend.

```json: Length Exceeded
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The phone must be 10 digits.",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "phone"
  }
}
```

### Invalid URL Sent

This error occurs when you the send an invalid URL.

Error Description | Solution
---
The url is not a valid URL. | Check the URL and resend.

```json: Invalid URL
{
   "error": {
       "code": "BAD_REQUEST_ERROR",
       "description": "The url is not a valid URL.",
       "source": "business",
       "step": "payment_initiation",
       "reason": "input_validation_failed",
       "metadata": {}
   }
}
```

### Invalid Data Sent 

This error occurs when the value sent for a particular field is incorrect. For example, if you sent an invalid webhook event name. 

Error Description | Solution
---
Invalid event name/names: payment.authorized | Check the mentioned field (here, webhook event name) and resend.

```json: Invalid Data
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Invalid event name/names: payment.authorized",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {}
  }
}
```

### Blank Field

This error occurs when a field is sent without any values. For example, if the Account entity parameter `customer_facing_business_name` is sent without any value.

Error Description | Solution
---
The business dba field is required. | Ensure all mandatory fields and values are present. (Here, the business name).

```json: Blank Business Name Field
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The business dba field is required.",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "business_dba"
  }
}
```

### Extra Fields Submitted at Needs Clarification State

This error occurs when the Razorpay team has evaluated the details, changed the activation status to `needs_clarification` and has sought more details. Therefore, only those fields which are present in the `requirements array` in the [Fetch Product Configuration API](https://razorpay.com/docs/api/partners/product-configuration/fetch) response should be resent. You cannot send any additional fields.

Error Description | Solution
---
Only fields requested for needs clarification are allowed for update. | Send only the highlighted fields.

```json: Extra Fields
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Only fields requested for needs clarification are allowed for update"
  }
}
```

### Extra Fields Submitted at Under Review State

This error occurs when the Razorpay team is evaluating the submitted details and changed the activation status to `under_review`. Therefore, you cannot send any fields.

Error Description | Solution
---
Merchant activation form has been locked for editing by admin | Do not send any requests. Wait for Razorpay team to revert.

```json: Extra Fields
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Merchant activation form has been locked for editing by admin"
  }
}
```

### Extra Fields Submitted at Activated State

This error occurs when the activation is complete. At this point, you cannot send any fields.

Error Description | Solution
---
Merchant activation form has been locked for editing by admin | Do not send any requests.

```json: Extra Fields
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Merchant activation form has been locked for editing by admin"
  }
}
```

## 401 Unauthorized 

This error occurs when you use incorrect API keys while making the requests.

Error Description | Solution
---
The api secret provided is invalid. | The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.

```json: Invalid Key
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The api key provided is invalid",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  }
}
```json: Invalid Secret
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The api secret provided is invalid",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  }
}
```

## 500 Internal Server Error      

This error occurs when emojis are sent in the API request. 

Error Description | Solution
---
We are facing some trouble completing your request at the moment. Please try again shortly. | Ensure that the API request does not have emojis and resend. 

```json: Server Error
{
  "error": {
    "code": "SERVER_ERROR",
    "description": "We are facing some trouble completing your request at the moment. Please try again shortly.",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  }
}
```
