---
title: 1. Build Integration
description: Steps to integrate with Outward Remittance LRS Flow APIs for a seamless international payments solution for education and travel with custom integration.
---

# 1. Build Integration

Follow these steps to integrate with the Outward Remittance LRS Flow APIs.

**1.1** [Fetch Forex Rates](#11-fetch-forex-rates)

**1.2** [Create an Order](#12-create-an-order)

**1.3** [Collect Documents](#13-collect-documents)

**1.4** [Invoke Checkout and Pass Order Id and Other Options to it](#14-invoke-checkout-and-pass-order-id-and)

  **1.4.1** [Include JavaScript code in your Webpage](#141-include-javascript-code-in-your-webpage)

  **1.4.2** [Instantiate Custom Checkout](#142-instantiate-custom-checkout)

  **1.4.3** [Submit Payment Details](#143-submit-payment-details)

**1.5** [Store Fields in Your Server](#15-store-fields-in-your-server)

**1.6** [Verify Payment Signature](#16-verify-payment-signature)

**1.7** [Verify Payment Status](#17-verify-payment-status)

## 1.1 Fetch Forex Rates

@include lrs/forex-charges

## 1.2 Create an Order

Create an order using the following API and send additional information such as customer details, identity and bank account details.

### Prerequisites

- The Bank Account of the Payer/Remitter is mandatory as TPV (Third Party Validation) needs to be done.
- You must provide the PAN details of the payer (PAN number of the payer from whose bank account the amount will be debited).
- Debit Card TPV is mandatory.
- Partial payments are not permitted.

/orders

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "customer_details": {
    "name": "Gaurav Kumar",
    "contact": "9000090000",
    "email": "gaurav.kumar@example.com",
    "identity": [
      {
        "type": "tax_id",
        "id": "AVOJB1111K"
      }
    ]
  },
  "bank_account": {
    "account_number": "765432123456789",
    "name": "Gaurav Kumar",
    "ifsc": "HDFC0000053"
  },
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}'
```

```json: Success
{
  "id": "order_GAWRjlWkVcRh0V",
  "entity": "order",
  "amount": 1000,
  "amount_paid": 0,
  "amount_due": 1000,
  "currency": "INR",
  "receipt": "BILL13375649",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1573044206
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The id provided does not exist",
    "source": "business",
    "reason": "input_validation_failed",
    "step": "NA",
    "metadata": {},
    "field": "beneficiary_id"
  }
}
```

  
### Request Parameters

`amount` _mandatory_
: `integer` The amount for which the order is created, in currency subunits. For example, for an amount of , enter `29500`. Payment can only be made for this amount against the Order.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. Refer to the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Can have a maximum length of 40 characters and has to be unique.

`customer_details` _mandatory_
: `json_object` Contains the customer details of the order. 

    `name` _mandatory_
    : `string` Customer's name. Alphanumeric, with period (.), apostrophe (') and parentheses allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

    `contact` _mandatory_
    : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

    `email` _mandatory_
    : `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

    `identity` _mandatory_
    : `array` Collect identity-related information from the customer. 
    
    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     This field is mandatory for all businesses using LRS, as we must collect PAN information to obtain TCS rates from the bank associated with that PAN.
>     

    
      `type` _mandatory_
      : `string` Type of identity information collected. Possible value is `tax_id`.

      `id` _mandatory_
      : `string` Unique identifier of the identity type. For example, for tax_id, the id is PAN Number, say, `AVOJB1111K`.

`bank_account`
: `json_object` Details of the bank account to be passed in the request. Required if the method is `emandate`.

    `account_number` _mandatory_
    : `string` Bank account number used to initiate the payment.

    `ifsc` _mandatory_
    : `string` IFSC of the bank used to initiate the payment.

    `name` _mandatory_
    : `string` Name associated with the bank account used to initiate the payment.

`notes` _optional_
: `json object` Key-value pair used to store additional information about the entity. Holds 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
    

  
### Response Parameters

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

`amount_due`
: `integer` The amount pending against the order.

`amount_paid`
: `integer` The amount paid against the order.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.

`currency`
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

`entity`
: `string` Name of the entity. Here, it is `order`.

`id`
: `string` The unique identifier of the order.

`notes`
: `object` Key-value pair used to store additional information about the entity. Holds 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`offer_id`
: `string` The unique identifier of the offer. For example, `offer_JHD834hjbxzhd38d`.

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`status`
: `string` The status of the order. Possible values:
    - `created`: When you create an order, it is in the `created` state. It stays in this state till a payment is attempted.
    - `attempted`: An order changes to the `attempted` state following the first payment attempt and remains in this state until at least one payment is successfully processed and captured.
    - `paid`: After successfully capturing the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to this state. 
 The order stays in the `paid` state even if the payment associated with the order is refunded.
    

  
### Error Response Parameters

Error | Cause | Solution
---
`` is missing. | A mandatory field is missing. | Ensure all mandatory fields and values are present.
---
The beneficiary id provided does not exist. | The beneficiary id provided is incorrect. | Use the correct `beneficiary_id`.
---
The API `` provided is invalid. | The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.
 | The API keys must be active and entered correctly with no whitespace before or after the keys.
---
The amount must be at least INR 1.00. | The amount specified is less than the minimum amount. Currency subunits, such as paise (in the case of INR), should always be greater than 100. | Enter an amount equal to or greater than the minimum amount, that is 100.
---
The **field name** is required. | A mandatory field is missing. | Ensure all mandatory fields and values are present.

    

## 1.3 Collect Documents

Collect the necessary documents in the LRS flow to facilitate the processing and settlement of payments by our AD Partner Bank.

/order/:id/documents

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST 'https://api.razorpay.com/v1/order/:id/documents' \
-H "Content-Type: multipart/form-data" \
-F 'purpose=lrs_education' \
-F 'file=@/Users/your_name/sample_uploaded.jpeg' \
-F 'document_type=passport_front' \
```

```json: Success
{
  "id": "doc_EsyWjHrfzb59Re",
  "entity": "document",
  "purpose": "lrs_education",
  "name": "doc_19_12_2020.jpg",
  "mime_type": "image/png",
  "size": 2863,
  "created_at": 1590604200
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The id provided does not exist",
    "source": "business",
    "reason": "input_validation_failed",
    "step": "NA",
    "metadata": {},
    "field": "order_id"
  }
}

```

  
### Request Parameters

`document_type` _mandatory_
: `string` Type of document corresponding to the flow of LRS, that is Education or Travel. For example, it is `admission_letter` when the student’s admission letter is uploaded. Possible values: 
    - `admission_letter`
    - `passport_front`
    - `passport_back`
    - `loan_sanction_letter`
    - `booking_invoice`

`purpose` _mandatory_
: `string`  The reason you are uploading this document. Possible values: 
    - `lrs_education`
    - `lrs_travel`
    

  
### Response Parameters

`id`
: `string` The unique identifier of the document.

`entity`
: `string` Name of the entity. Here, it is `document`.

`purpose`
: `string` The reason you are uploading this document. Here, it is `lrs_education`. Possible values: 
    - `lrs_education`
    - `lrs_travel`

`size`
: `integer` Indicates the size of the document in bytes.

`mime_type`
: `string` Indicates the nature and format in which the document is uploaded. Possible values include:
    - `image/jpg`
    - `image/jpeg`
    - `image/png`
    - `application/pdf`

`created_at`
: `integer` Unix timestamp at which the document was uploaded.
    

  
### Error Response Parameters

Error | Cause | Solution
---
`` is missing. | A mandatory field is missing. | Ensure all mandatory fields and values are present.
---
The id provided does not exist. | The Order id provided is incorrect. | Use the correct `order_id`.

    

## 1.4 Invoke Checkout and Pass Order Id and Other Options to it

### 1.4.1 Include JavaScript code in your Webpage

Include the following script, preferably in the `` section of your page:

```html: Index HTML

```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Include the script from `https://checkout.razorpay.com/v1/razorpay.js` instead of serving a copy from your server. This allows the library's new updates and bug fixes to fit your application automatically.
> - We always maintain backward compatibility with our code.
> 

### 1.4.2 Instantiate Custom Checkout

#### Single Instance on a Page

```js: Invoke a Single Instance
var razorpay = new Razorpay({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
});
```

#### Multiple Instances on Same Page

If you need multiple Razorpay instances on the same page, you can globally set some of the options:

```js: Invoke Multiple Instances
Razorpay.configure({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
})
new Razorpay({}); // will inherit key and image from above.
```

#### Checkout Options

While building a custom UI for accepting payments from your customers, you should be familiar with the fields supported in the `razorpay.js` script.

@include checkout-parameters/custom

### 1.4.3 Submit Payment Details

After creating an order and obtaining the customer's payment details, send the information to Razorpay to complete the payment. The data that needs to be submitted depends on the customer's payment method. You can do this by invoking `createPayment` method.

Know more about [sample codes for various payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md).

@include integration-steps/curlec-fpx-callout

```js: createPayment with handler function
var data = {
  amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
  currency: "INR",// Default is INR. We support more than 90 currencies.
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  notes: {
    "payment_reason": "Tuition Fee",
  },
  order_id: 'order_CuEzONfnOI86Ab',// Replace with Order ID generated in Step 2
  method: 'netbanking',

  // method specific fields
  bank: 'HDFC'
};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
  // has to be placed within user initiated context, such as click, in order for popup to open.
  razorpay.createPayment(data);

  razorpay.on('payment.success', function(resp) {
    alert(resp.razorpay_payment_id),
    alert(resp.razorpay_order_id),
    alert(resp.razorpay_signature)}); // will pass payment ID, order ID, and Razorpay signature to success handler.

  razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler

})

```js: createPayment with callback URL
var data = {
  callback_url: 'https://www.examplecallbackurl.com/',
  amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
  currency: "INR",// Default is INR. We support more than 90 currencies.
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_CuEzONfnOI86Ab',// Replace with Order ID generated in Step 2
  method: 'netbanking',

  // method specific fields
  bank: 'HDFC'
};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
  // has to be placed within user initiated context, such as click, in order for popup to open.
  razorpay.createPayment(data);

})
```

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> The `createPayment` method should be called within an event listener triggered by user action to prevent the popup from being blocked. For example:
> 

> ```js
> $('button').click( function (){ razorpay.createPayment(...) })
> ```
> 

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - **Handler Function**
>   
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server.
> - **Callback URL**
>   
When you use a callback URL, Razorpay makes a post call to the callback URL, with the `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` in the response object of the successful payment (`razorpay_payment_id` and `razorpay_order_id`). 
> 

## 1.5 Store Fields in Your Server

@include integration-steps/store-fields

@include integration-steps/payment-failure

## 1.6 Verify Payment Signature

@include integration-steps/verify-signature

## 1.7 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/outward-remittances/custom-integration/test-integration.md)
