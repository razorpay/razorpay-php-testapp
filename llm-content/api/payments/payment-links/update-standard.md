---
title: Update Standard Payment Link
description: Update the details of a Standard Payment Link using this endpoint.
---

# Update Standard Payment Link

## Update Standard Payment Link

Use this endpoint to edit the Standard Payment Link details such as the reference id, expiry date and so on.

### Request

@include payment-links-v2/update-standard-req

### Response

@include payment-links-v2/update-standard-res

### Parameters

@include payment-links-v2/fetch-id-path

### Parameters

@include payment-links-v2/update-req

### Parameters

@include payment-links-v2/create-res

### Errors

update can only be made in created or partially paid state
* code: 400
* description: A payment link has been passed in `paid` state.
* solution: Ensure that the Payment Link is in the `created` state or `partially paid` state to update the Payment Link.
 
wrong input fields sent.
* code: 400
* description: When wrong input fields are sent while updating the Payment Link.
* solution: Ensure that the input fields are added correctly. Refer to these [request parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md#request-parameters) on how to add correct input fields.

The id provided does not exist
* code: 400
* description: The Payment Link does not belong to the requestor business, or it doesn't exist.
* solution: Ensure that the Payment Link is valid and belongs to the requestor business.

The api \{key/secret\} provided is invalid
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Ensure that the API Keys are active and entered correctly. Also, make sure there are no white-spaces before or after the keys.
