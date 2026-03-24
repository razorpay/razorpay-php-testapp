---
title: Cancel a Standard Payment Link
description: Cancel a Standard Payment Link using this endpoint.
---

# Cancel a Standard Payment Link

## Cancel a Standard Payment Link

Use this endpoint to cancel a Standard Payment Link.

### Request

@include payment-links-v2/cancel-st-req

### Response

@include payment-links-v2/cancel-standard-res

### Parameters

@include payment-links-v2/cancel-path

### Parameters

@include payment-links-v2/create-res

### Errors

cannot cancel or expire an already paid/partially paid link
* code: 400
* description: When a business tries to cancel/expire a Payment Link which is already paid or partially paid.
* solution: Ensure that the Payment Link is in the `created` state to cancel the Payment Link.
 
cannot cancel or expire an expired link
* code: 400
* description: When a business tries to cancel/expire a payment link which has expired or cancelled.
* solution: Ensure the Payment Link you want to cancel is in the `created` state.

The id provided does not exist
* code: 400
* description: The Payment Link does not belong to the requestor business, or it doesn't exist.
* solution: Ensure that the Payment Link is valid and belongs to the requestor business.

The api \{key/secret\} provided is invalid
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Ensure that the API Keys are active and entered correctly. Also, make sure there are no white-spaces before or after the keys.
