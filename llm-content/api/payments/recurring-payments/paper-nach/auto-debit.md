---
title: Charge First Payment Automatically after NACH Registration
description: Register a customer's mandate AND charge them the first recurring payment as part of the same transaction via paper NACH.
---

# Charge First Payment Automatically after NACH Registration

You can register a customer's mandate and charge them the first recurring payment as part of the same transaction. For this you have to pass the `first_payment_amount` parameter while creating the order.

@include recurring-payments/paper-nach/intro

## 1. Create an Authorisation Transaction

@include recurring-payments/create-auth-tran-two-methods

### 1.1. Using Razorpay Standard Checkout

@include recurring-payments/create-auth-tran-checkout-intro

### 1.1.1. Create a Customer

@include recurring-payments/customer/api

#### Request Parameters

@include recurring-payments/customer/api-req

#### Response Parameters

@include recurring-payments/customer/api-res

### 1.1.2. Create an Order

@include recurring-payments/paper-nach/auto-order

#### Request Parameters

@include recurring-payments/paper-nach/order-req-1

@include recurring-payments/paper-nach/order-req-token-first-payment

 `auth_type` _mandatory_
  : `string` The payment method used to make the authorisation payment. Here, it is `physical`.

  `bank_account`
  : The customer's bank account details that is printed on the NACH form.

    `account_number`_mandatory_
    : `string` The customer's bank account number. For example `11214311215411`.

    `ifsc_code`_mandatory_
    : `string` The customer's bank IFSC. For example `UTIB0000001`.

    `beneficiary_name`_mandatory_
    : `string` The customer's name. For example, `Gaurav Kumar`.

    `account_type` _optional_
    : `string` The customer's bank account type. Possible values:
      - `savings` (default)
      - `current`
      - `cc` (Cash Credit)
      - `nre` (SB-NRE)
      - `nro` (SB-NRO)

  `max_amount` _optional_
  : `integer` Use to set the maximum amount per debit request. Know about [maximum and default values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/paper-nach/faqs.md#3-is-there-a-limit-on-the-debit).

  `expire_at` _optional_
  : `integer` The Unix timestamp that specifies when the registration link should expire. The value can range from the current date to 01-19-2038 (`2147483647`).

  `nach`
  : Additional information to be printed on the NACH form that your customer will sign.

    `form_reference1` _optional_
    : `string` A user-entered reference that appears on the NACH form.

    `form_reference2` _optional_
    : `string` A user-entered reference that appears on the NACH form.

    `description` _optional_
    : `string` A user-entered description that appears on the hosted page. For example, `Form for Gaurav Kumar.`

  `notes`_optional_
  : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameters

@include recurring-payments/emandate/order-res

@include recurring-payments/paper-nach/order-note

You can create a payment against the `order_id` after it is created.

### 1.1.3. Create an Authorisation Payment

You should create an authorisation payment after you create an order.

To create an authorisation payment:

1. Download the Paper NACH form and send it to the customers.
2. Ask the customers to fill the form and either [Upload via Checkout](#1131-upload-the-nach-file-via-checkout) or send it to you to upload the form using the [create NACH File API](#1132-upload-the-nach-file-via-api).

#### 1.1.3.1 Upload the NACH File via Checkout

@include recurring-payments/paper-nach/auth-payment-api

#### Additional Checkout Fields

@include recurring-payments/auth-payment-api-additional-fields

`recurring` _mandatory_
: `boolean` Determines whether the recurring payment is enabled or not. Possible values:
  - `1`: Recurring payment is enabled.
  - `0`: Recurring payment is not enabled.

#### 1.1.3.2 Upload the NACH File via API

You can upload the signed NACH forms that are collected from your customers using the create NACH File API, . Razorpay's OCR-enabled NACH engine submits the form to NPCI on successful verification and you will receive a success or a failure response.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

Use the following endpoint to upload the signed Paper NACH form via the API.

/payments/create/nach/file

@include recurring-payments/paper-nach/upload-nach-form-api

### Error Reasons

The below table lists the errors that may appear while uploading the NACH file, the reason, explanation and next steps:

Reason | Explanation | Next Steps
---
`unknown_file_type` | The file type of the image is not supported. | Upload an image that is in either of `.jpeg`, `.jpg` or `.png` formats.
---
`file_size_exceeds_limit` | The file size exceeds the permissible limits. | Upload an image of smaller size.
---
`image_not_clear` | The uploaded image is not clear. This can either be due to poor resolution or because part of the image is cropped. | Upload an image with better quality without any cropping of the form.
---
`form_mismatch` | The ID of the uploaded form does not match with that in our records. | Check that the form is uploaded against the correct order ID.
---
`form_signature_missing` | The signature of the customer is either missing or could not be detected. | Check that the customer has signed in the appropriate box and that the image uploaded is clear. For current account, a company stamp may also be required.
---
`form_data_mismatch` | One or more of the fields on the NACH form do not match with that in our records. | Check that the image is clear and that the data has not been tampered with before uploading again.
---
`form_status_pending` | A form against this order is pending action on the destination bank. A new form cannot be submitted till a status is received. | Wait for an update from the destination bank on the approval/rejection of the mandate.

### 1.2. Using a Registration Link

Registration Link is an alternate way of creating an authorisation transaction. You can create a registration link using the [API](#121-create-a-registration-link) or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#1-create-a-registration-link).

> **INFO**
>
> 
> **Handy Tips**
> 
> You do not have to create a customer if you choose the registration link method for creating an authorisation transaction.
> 

- When you create a registration link, an [invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) is automatically issued to the customer. They can use this invoice to make the authorisation payment.
- A registration link should always have an order amount (in paise) the customer will be charged when making the authorisation payment. This amount should be `0` in the case of Paper NACH.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can [use Webhooks to get notifications about successful payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-authorization-link-status-using-webhooks) against a registration link.
> 

### 1.2.1. Create a Registration Link

@include recurring-payments/paper-nach/auth-link-note

#### Request Parameters

@include recurring-payments/link-req-man

@include recurring-payments/paper-nach/auto-link-req

@include recurring-payments/link-req-opt

#### Response Parameters

@include recurring-payments/auth-link-res

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

#### Path Parameters

@include recurring-payments/send-notification-path-api

#### Response Parameters

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
    - `true`: The notifications were successfully sent via SMS, email or both.
    - `false`: The notifications were not sent.

### 1.2.3. Cancel a Registration Link

@include recurring-payments/paper-nach/auth-link-cancel-intro

@include recurring-payments/paper-nach/auth-link-cancel-code-first-payment

#### Path Parameter

@include recurring-payments/cancel-path

#### Response Parameters

@include recurring-payments/auth-link-res

## 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

Know more about [Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/paper-nach/integrate.md#fetch-nach-mandate-registration-details).

### 2.1. Fetch Token by Payment ID

@include recurring-payments/paper-nach/token-by-payment

### Path Parameter

@include recurring-payments/fetch-token-pay-path-api

### Response Parameters

@include recurring-payments/fetch-token-pay-res

### 2.2. Fetch Tokens by Customer ID

@include recurring-payments/paper-nach/token-by-customer

### Path Parameter

@include recurring-payments/fetch-token-cust-path-api

### Response Parameters

@include recurring-payments/fetch-token-cust-response-api

### 2.3. Delete Tokens

@include recurring-payments/fetch-token-delete-api

### Path Parameter

@include recurring-payments/delete-token-path

### Response Parameters

`deleted`
: `boolean` Indicates whether the token is deleted. Possible values:
    - `true`: The token is deleted successfully.
    - `false`: The token was not deleted.

## 3. Create Subsequent Payments

@include recurring-payments/subsequent-payments/pay-intro

### 3.1. Create an Order to Charge the Customer

@include recurring-payments/subsequent-payments/order

### Request Parameters

@include recurring-payments/subsequent-payments/order-req

### Response Parameters

@include recurring-payments/subsequent-payments/order-res

### 3.2. Create a Recurring Payment

@include recurring-payments/subsequent-payments/rec-pay

### Request Parameters

@include recurring-payments/subsequent-payments/rec-pay-req

### Response Parameters

`razorpay_payment_id`
: `string` The unique identifier of the payment that is created. For example, `pay_1Aa00000000001`.

`razorpay_order_id`
: `string` The unique identifier of the order that is created. For example, `order_1Aa00000000001`.

`razorpay_signature`
: `string` The signature generated by the Razorpay. For example, `9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d`.
