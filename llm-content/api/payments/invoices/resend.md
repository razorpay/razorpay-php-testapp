---
title: Send Notifications
description: Send notifications to your customers via SMS and Email using this endpoint.
---

# Send Notifications

## Send Notifications

Use this endpoint to send notifications with the short URL to the customer via email or SMS.

### Request

@include invoices-api/resend-req

### Response

@include invoices-api/send-res

### Parameters

@include invoices-api/resend-path-param

### Parameters

@include invoices-api/resend-res-param

### Errors

The API `` provided is invalid.
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution:  - Ensure that the API Keys are active and entered correctly.
- There should be no whitespaces before or after the keys.

 
The id provided does not exist.
* code: 400
* description: The invoice id entered is either invalid or does not belong to the requester account.
* solution: Enter a valid invoice id.

email is not a valid communication medium.
* code: 400
* description: There is a spelling error in “email” in the URL.
* solution: Check that the keywords are spelled correctly.
