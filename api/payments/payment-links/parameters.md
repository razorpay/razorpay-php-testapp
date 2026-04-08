---
title: Modified Request and Response Parameters for Payment Links
description: Check the Request and Response parameters for the Razorpay APIs that have undergone change and modify your integration accordingly.
---

# Modified Request and Response Parameters for Payment Links

> **WARN**
>
> 
> **New API Version**
> 
> We are introducing a new version of APIs for Payment Links.
> 

> Old API URL: https://api.razorpay.com/v1/invoices
> 

> New API URL: https://api.razorpay.com/v1/payment_links
> 

> Some of the existing request and response parameters have changed and new ones have been added.
> 
> Pass this information to your developers and ask them to change your integration accordingly.
> 

Along with the changes in the API endpoint, some of the Payment Links' request and response parameters have undergone change. 

Old Parameter | New Parameter | Description
---
partial_payment | accept_partial | To allow customers to make partial payments for a Payment Link. `accept_partial` must be used in association with the `first_min_partial_amount` parameter.
---
first_payment_min_amount | first_partial_min_amount | If partial payment is allowed, the minimum amount that must be paid as the first payment.
---
receipt | reference_id | User-defined reference number for a Payment Link.
---
sms_notify | notify.sms | Defines who handles the SMS notification to the customer.
---
email_notify | notify.email | Defines who handles the email notification to the customer.
