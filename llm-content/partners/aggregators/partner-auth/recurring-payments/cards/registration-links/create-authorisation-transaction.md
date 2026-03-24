---
title: 1. Create Authorisation Transaction
description: Create an authorisation transaction for cards using Razorpay APIs.
---

# 1. Create Authorisation Transaction

Registration Link is an alternate way of creating an authorisation transaction. You can create a registration link using the API or [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#1-create-a-registration-link.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> You do not have to create a customer if you choose the registration link method for creating an authorisation transaction.
> 

When you create a registration link, an [invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices.md) is automatically issued to the customer. They can use this invoice to make the authorisation payment.

A registration link should always have an order amount (in paise) the customer will be charged when making the authorisation payment. This amount should be **1** in the case of cards.

## 1.1 Create a Registration Link
The following endpoint creates a registration link.

/subscription_registration/auth_links

```curl: Curl
curl -X POST https://api.razorpay.com/v1/subscription_registration/auth_links \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET] \
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "customer":{
    "name":"Gaurav Kumar",
    "email":"gaurav.kumar@example.com",
    "contact":"9123456780"
  },
  "type":"link",
  "amount":"100",
  "currency":"INR",
  "description":"Registration Link for Gaurav Kumar",
  "subscription_registration":{
    "method":"card",
    "max_amount":"500",
    "expire_at":1609423824
  },
  "receipt":"Receipt No. 1",
  "email_notify":true,
  "sms_notify":true,
  "expire_by":1732202345,
  "notes":{
    "note_key 1":"Beam me up Scotty",
    "note_key 2":"Tea. Earl Gray. Hot."
  }
}'
```json: Response
{
  "id": "inv_FHrXGIpd3N17DX",
  "entity": "invoice",
  "receipt": "Receipt No. 24",
  "invoice_number": "Receipt No. 24",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrXGJNngJyEAe",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1732202345,
  "issued_at": 1595491014,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491014,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 100,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 100,
  "amount_paid": 0,
  "amount_due": 100,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "Registration Link for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/VSriCfn",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491014,
  "idempotency_key": null
}
```

#### Request Parameters

`customer`
: Details of the customer to whom the registration link is sent.

  `name` _mandatory_
  : `string` Customer's name.

  `email` _mandatory_
  : `string` Customer's email address.

  `contact` _mandatory_
  : `integer` Customer's contact number.

`type` _mandatory_
: `string` In this case, the value is `link`.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, only INR is supported.

`amount` _mandatory_
: `integer` The payment amount in the smallest currency sub-unit.

`description` _mandatory_
: `string` A description that appears on the hosted page. For example, 12:30 p.m. Thali meals (Gaurav Kumar).

`subscription_registration`
: Details of the authorisation payment.

  `method` _mandatory_
  : `string` The authorization method. Here, it is `card`.

  `max_amount` _optional_
  : `integer` The maximum amount, in paise, a customer can be charged in a transaction. This value can range from 500 to 99999900. The default value is 9900000 (₹99,000).

  `expire_at` _optional_
  : `integer` The Unix timestamp indicates till when you can use the token (authorisation on the payment method) to charge the customer their subsequent payments.

`sms_notify` _optional_
: `boolean` Indicates if SMS notifications are to be sent by Razorpay. Possible values:
  - `true` (default): Notifications are sent by Razorpay.
  - `false`: Notifications are not sent by Razorpay.

`email_notify` _optional_
: `boolean` Indicates if email notifications are to be sent by Razorpay. Possible values:
  - `true` (default): Notifications are sent by Razorpay.
  - `false`: Notifications are not sent by Razorpay.

`expire_by` _optional_
: `integer` The Unix timestamp indicates the expiry of the registration link.

`receipt` _optional_
: `string` A unique identifier entered by you for the order. For example, Receipt No. 1. You must map this parameter to the order_id sent by Razorpay.

`notes` _optional_
: `object` This is a key-value pair that is used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.

#### Response Parameters

`id`
: `string` The unique identifier of the invoice.

`entity`
: `string` The entity that has been created. Here, it is invoice.

`receipt`
: `string` A user-entered unique identifier of the invoice.

`invoice_number`
: `string` Unique number you added for internal reference.

`customer_id`
: `string` The unique identifier of the customer. For example, cust_BMB3EwbqnqZ2EI.

`customer_details`
: Details of the customer.

  `id`
  : `string` The unique identifier associated with the customer to whom the invoice has been issued.

  `name`
  : `string` The customer's name.

  `email`
  : `string` The customer's email address.

  `contact`
  : `integer` The customer's phone number.

  `billing_address`
  : `string` Details of the customer's billing address.

  `shipping_address`
  : `string` Details of the customer's shipping address.

`order_id`
: `string` The unique identifier of the order associated with the invoice.

`line_items`
: `string` Details of the line item that is billed in the invoice. Maximum of 50 line items are allowed.

`payment_id`
: `string` Unique identifier of a payment made against the invoice.

`status`
: `string` The status of the invoice. Possible values:
  - `draft`
  - `issued`
  - `partially_paid`
  - `paid`
  - `cancelled`
  - `expired`
  - `deleted`

`expire_by`
: `integer` The Unix timestamp at which the invoice will expire.

`issued_at`
: `integer` The Unix timestamp at which the invoice was issued to the customer.

`paid_at`
: `integer` The Unix timestamp at which the payment was made.

`cancelled_at`
: `integer` The Unix timestamp at which the invoice was cancelled.

`expired_at`
: `integer` The Unix timestamp at which the invoice expired.

`sms_status`
: `string` The delivery status of the SMS notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`email_status`
: `string` The delivery status of the email notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`date`
: `integer` Timestamp, in Unix format, that indicates the issue date of the invoice.

`terms`
: `string` Any terms to be included in the invoice. Maximum of 2048 characters.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is ₹299.95, pass the value as 29995.

`amount_paid`
: `integer` Amount paid by the customer against the invoice.

`amount_due`
: `integer` The remaining amount to be paid by the customer for the issued invoice.

`currency`
: `string` The currency associated with the invoice. You should mandatorily pass this parameter if you are accepting international payments.

`description`
: `string` A brief description of the invoice.

`notes`
: `object` Any custom notes added to the invoice. Maximum of 2048 characters.

`short_url`
: `string` The short URL that is generated. This is the link that can be shared with the customer to receive payments.

`type`
: `string` Here, it is invoice.

`comment`
: `string` Any comments to be added in the invoice. Maximum of 2048 characters.

### 1.2 Send/Resend Notifications
The following endpoint sends/resends notifications with the short URL to the customer:

/invoices/:id/notify_by/:medium

```curl: Curl
curl -X POST https://api.razorpay.com/v1/invoices/inv_FHrfRupD2ouKIt/notify_by/sms \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET] \
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
```json: Response
{
  "success": true
}
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier of the invoice linked to the registration link for which you want to send the notification. For example, inv_FHrfRupD2ouKIt.

`medium` _mandatory_
: `string` Determines through which medium you want to resend the notification. Possible values:
    - `sms`
    - `email`

#### Response Parameter

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
    - `true`: The notifications were successfully sent via SMS, email or both.
    - `false`: The notifications were not sent.

### 1.3 Cancel a Registration Link

The following endpoint cancels a registration link.

> **WARN**
>
> 
> **Watch Out!**
> 
> You can only cancel a registration link that is in the issued state.
> 

/invoices/:id/cancel

```curl: Curl
curl -X POST https://api.razorpay.com/v1/invoices/inv_FHrfRupD2ouKIt/cancel \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET] \
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" 
```json: Response
{
  "id": "inv_FHrfRupD2ouKIt",
  "entity": "invoice",
  "receipt": "Receipt No. 1",
  "invoice_number": "Receipt No. 1",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrfRw4TZU5Q2L",
  "line_items": [],
  "payment_id": null,
  "status": "cancelled",
  "expire_by": 4102444799,
  "issued_at": 1595491479,
  "paid_at": null,
  "cancelled_at": 1595491488,
  "expired_at": null,
  "sms_status": "sent",
  "email_status": "sent",
  "date": 1595491479,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 100,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 100,
  "amount_paid": 0,
  "amount_due": 100,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "Registration Link for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/QlfexTj",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491480,
  "idempotency_key": null
}
```

#### Path Parameter

`id` _mandatory_
: `string` The unique identifier for the invoice linked to the registration link that you want to cancel. For example, inv_1Aa00000000001.

#### Response Parameters

`id`
: `string` The unique identifier of the invoice.

`entity`
: `string` The entity that has been created. Here, it is invoice.

`receipt`
: `string` A user-entered unique identifier of the invoice.

`invoice_number`
: `string` Unique number you added for internal reference.

`customer_id`
: `string` The unique identifier of the customer. For example, cust_BMB3EwbqnqZ2EI.

`customer_details`
: Details of the customer.

  `id`
  : `string` The unique identifier associated with the customer to whom the invoice has been issued.

  `name`
  : `string` The customer's name.

  `email`
  : `string` The customer's email address.

  `contact`
  : `integer` The customer's phone number.

  `billing_address`
  : `string` Details of the customer's billing address.

  `shipping_address`
  : `string` Details of the customer's shipping address.

`order_id`
: `string` The unique identifier of the order associated with the invoice.

`line_items`
: `string` Details of the line item that is billed in the invoice. Maximum of 50 line items are allowed.

`payment_id`
: `string` Unique identifier of a payment made against the invoice.

`status`
: `string` The status of the invoice. Possible values:
  - `draft`
  - `issued`
  - `partially_paid`
  - `paid`
  - `cancelled`
  - `expired`
  - `deleted`

`expire_by`
: `integer` The Unix timestamp at which the invoice will expire.

`issued_at`
: `integer` The Unix timestamp at which the invoice was issued to the customer.

`paid_at`
: `integer` The Unix timestamp at which the payment was made.

`cancelled_at`
: `integer` The Unix timestamp at which the invoice was cancelled.

`expired_at`
: `integer` The Unix timestamp at which the invoice expired.

`sms_status`
: `string` The delivery status of the SMS notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`email_status`
: `string` The delivery status of the email notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`date`
: `integer` Timestamp, in Unix format, that indicates the issue date of the invoice.

`terms`
: `string` Any terms to be included in the invoice. Maximum of 2048 characters.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is ₹299.95, pass the value as 29995.

`amount_paid`
: `integer` Amount paid by the customer against the invoice.

`amount_due`
: `integer` The remaining amount to be paid by the customer for the issued invoice.

`currency`
: `string` The currency associated with the invoice. You should mandatorily pass this parameter if you are accepting international payments.

`description`
: `string` A brief description of the invoice.

`notes`
: `object` Any custom notes added to the invoice. Maximum of 2048 characters.

`short_url`
: `string` The short URL that is generated. This is the link that can be shared with the customer to receive payments.

`type`
: `string` Here, it is invoice.

`comment`
: `string` Any comments to be added in the invoice. Maximum of 2048 characters
