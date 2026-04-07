---
title: Fetch Document Content
description: Fetch Document Content using Razorpays API.
---

# Fetch Document Content

## Fetch Document Content

Use this endpoint to download an earlier uploaded document.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/documents/:id/content
```

### Response

```json: Failure
{
  "error":{
    "status_code": 401,
    "description":"The API `` provided is invalid.",
    "code":"BAD_REQUEST_ERROR"
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the document.

### Errors

The API `` provided is invalid.
* code: 400
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.- Different keys for test mode and live modes.
- Expired API key.

* solution: The API keys must be active and entered correctly with no whitespace before or after the keys.

_id is not a valid id.
* code: 400
* description: - The id is not 14 characters long.
- The id is not alphanumeric.

* solution: Use a valid document id.
