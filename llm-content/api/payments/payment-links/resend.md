---
title: Send or Resend Notifications
description: Send or Resend notifications to your customers via email and SMS using this endpoint.
---

# Send or Resend Notifications

## Send or Resend Notifications

Use this endpoint to send or resend notifications to your customers via email and SMS.

### Request

@include payment-links-v2/resend

### Response

@include payment-links-v2/resend-res

### Parameters

@include payment-links-v2/resend-path

### Parameters

`success` 
: `boolean` Indicates whether the notification was sent successfully. Possible value is `true`, which means the notification was sent successfully.

### Errors

not a valid notification medium
* code: 400
* description: Occurs when you try to resend a Payment Link to customers and medium of notification is not valid.
* solution: Ensure that you use the correct medium to resend a payment link.
