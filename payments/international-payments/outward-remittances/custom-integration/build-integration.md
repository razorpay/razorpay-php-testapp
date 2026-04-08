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

Use the following API to fetch the real-time conversion rate Razorpay will charge to facilitate the transaction. This includes additional charges within the LRS flow. 

/forex_charges

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET 'https://api.razorpay.com/v1/forex_charges?amount=1000&base_currency=USD&conversion_currency=INR
-H "Authorization: Bearer "
```

```json: Success
{
  "amount": 1000,
  "base_currency": "USD",
  "converted_amount": 83000,
  "conversion_currency": "INR",
  "expiry_time": 1590604500,
  "fee": [
    {
      "type": "bank",
      "amount": "100"
    },
    {
      "type": "miscellaneous",
      "amount": "100"
    }
  ],
  "taxes": [
    {
      "type": "tcs",
      "amount": "1000"
    },
    {
      "type": "gst",
      "amount": "1000"
    }
  ]
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

  
### Query Parameters

`amount` _mandatory_
: `integer`  The amount which needs to be converted in currency subunits. For example, for an amount of ₹295.00, enter 29500.

`base_currency` _mandatory_
: `string` Currency ISO code for the given amount. The default length is 3 characters. Refer to the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`conversion_currency` _mandatory_
: `string`  ISO code for the currency to which the given amount should be converted, specified in currency subunits. If left blank, the conversion amount is provided for all supported currencies as a list. Otherwise, provides the conversion amount only for the requested currency. Refer to the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).
    

  
### Response Parameters

`amount`
: `string` The amount which needs to be converted in currency subunits.

`base_currency`
: `string` Currency ISO code for the given amount.

`converted_amount`
: `string` Converted amount in the requested currency.

`conversion_currency`
: `string` ISO code for the currency to which the given amount should be converted, specified in currency subunits.

`expiry_time`
: `integer` Unix timestamp at which the conversion rate will expire.

`fee`
: `integer` Fee charged by the bank.

  `type`
  : `string` Type of identity information collected. Possible value is `bank`.

  `amount`
  : `string` The amount which needs to be converted in currency subunits.

`taxes`
: `integer` Taxes collected for the remittance.

    `type`
  : `string` Type of identity information collected. Possible value is `tcs`.

  `amount`
  : `string` The amount which needs to be converted in currency subunits.
    

  
### Error Response Parameters

Error | Cause | Solution
---
`` is missing. | A mandatory field is missing. | Ensure all mandatory fields and values are present.

    

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
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. Refer to the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

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

`key` _mandatory_
: `string` API Key ID generated from **Dashboard** → **Account & Settings** → [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `10000`. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>     

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. For example, `INR`. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

    
> **INFO**
>
> 
> 
>     **Handy Tips**
> 
>     Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>     

`description` _optional_
: `string` Description of the product shown in the Checkout form. It must start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown in the Checkout form. Can also be a **base64** string, if loading the image from a network is not desirable.

`order_id` _mandatory_
: `string` Order ID generated via the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`method` _mandatory_
: `string` The payment method used by the customer on Checkout. 
Possible values:
    - `card` (default)
    - `upi` (default)
    - `netbanking` (default)
    - `wallet` (default)
    - `emi` (default)
    - `cardless_emi` (requires [approval](https://razorpay.com/support/#request))
    - `paylater` (requires [approval](https://razorpay.com/support/#request))
    - `emandate` (requires [approval](https://razorpay.com/support/#request))

`card` _mandatory if method=card/emi_
: `object` The details of the card that should be entered while making the payment.

            `number` 
            : `integer` Unformatted card number.

            `name`
            : `string` The name of the cardholder.

            `expiry_month`
            : `integer` Expiry month for card in MM format.

            `expiry_year`
            : `integer` Expiry year for card in YY format.

            `cvv`
            : `integer` CVV printed on the back of the card.
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             - CVV is not required by default for tokenised cards across all networks.
>             - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>             - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>             - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>             - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.   
>             

            `emi_duration`
            : `integer` Defines the number of months in the EMI plan.

`bank_account` _mandatory if method=emandate_
: The details of the bank account that should be passed in the request. These details include bank account number, IFSC code and the name of the customer associated with the bank account.

    `account_number`
    : `string` Bank account number used to initiate the payment.

    `ifsc`
    : `string` IFSC of the bank used to initiate the payment.

    `name`
    : `string` Name associated with the bank account used to initiate the payment.

`bank` _mandatory if method=netbanking_
: `string` Bank code. List of available banks enabled for your account can be fetched via [**methods**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#fetch-supported-methods).

`wallet` _mandatory if method=wallet_
: `string` Wallet code for the wallet used for the payment. Possible values:
    - `payzapp` (default)
    - `olamoney` (requires [approval](https://razorpay.com/support/#request))
    - `phonepe` (requires [approval](https://razorpay.com/support/#request))
    - `airtelmoney` (requires [approval](https://razorpay.com/support/#request))
    - `mobikwik` (requires [approval](https://razorpay.com/support/#request))
    - `jiomoney` (requires [approval](https://razorpay.com/support/#request))
    - `amazonpay` (requires [approval](https://razorpay.com/support/#request))
    - `paypal` (requires [approval](https://razorpay.com/support/#request))
    - `phonepeswitch` (requires [approval](https://razorpay.com/support/#request))

`provider` _mandatory if method=cardless_emi/paylater_
: `string`  Name of the cardless EMI provider partnered with Razorpay.

  Available options for Cardless EMI (requires [approval](https://razorpay.com/support/#request)):
    - `hdfc`
    - `icic`
    - `idfb`
    - `kkbk`
    - `zestmoney`
    - `earlysalary`
    - `walnut369`

  Available options for Pay Later:
    - `lazypay`
    - `paypal`

`vpa` _mandatory if method=upi_
: `string`  UPI ID used for making the payment on the UPI app. 

    
> **WARN**
>
> 
>     **Deprecation Notice**
> 
>     UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md) to switch to UPI Intent.
>     

`callback_url` _optional_
: `string` The URL to which the customer must be redirected upon completion of payment. The URL must accept incoming `POST` requests. The callback URL will have `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` as the request parameters for a successful payment.

`redirect` _conditionally mandatory_
: `boolean` Determines whether customer should be redirected to the URL mentioned in the
`callback_url` parameter. This is mandatory if `callback_url` parameter is used. Possible values:
    - `true`: Customer will be redirected to the `callback_url`.
    - `false`: Customer will not be redirected to the `callback_url`

### 1.4.3 Submit Payment Details

After creating an order and obtaining the customer's payment details, send the information to Razorpay to complete the payment. The data that needs to be submitted depends on the customer's payment method. You can do this by invoking `createPayment` method.

Know more about [sample codes for various payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md).

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

A successful payment returns the following fields to the Checkout form.

  
### Success Callback

- You need to store these fields in your server.
- You can confirm the authenticity of these details by verifying the signature in the next step.

```json: Success Callback
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
    

  
### Failure Response

A failed payment returns an error response.

```json: Sample Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Authentication failed due to incorrect otp",
    "field": null,
    "source": "customer",
    "step": "payment_authentication",
    "reason": "invalid_otp",
    "metadata": {
      "payment_id": "pay_EDNBKIP31Y4jl8",
      "order_id": "order_DBJKIP31Y4jl8"
    }
  }
}
```

Know more about [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md).
    

## 1.6 Verify Payment Signature

This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

  
### To verify the `razorpay_signature` returned to you by the Checkout form:

     1. Create a signature in your server using the following attributes:
        - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
        - `razorpay_payment_id`: Returned by Checkout.
        - `key_secret`: Available in your server. The `key_secret` that was generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

     2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

         ```html: HMAC Hex Digest
         generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

           if (generated_signature == razorpay_signature) {
             payment is successful
           }
         ```
         
     3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
    

  
### Generate Signature on Your Server

Given below is the sample code for payment signature verification:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

boolean status =  Utils.verifyPaymentSignature(options, secret);

```php: PHP
$api = new Api($key_id, $secret);

$api->utility->verifyPaymentSignature(array('razorpay_order_id' => $razorpayOrderId, 'razorpay_payment_id' => $razorpayPaymentId, 'razorpay_signature' => $razorpaySignature));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
       razorpay_order_id: 'order_IEIaMR65cu6nz3',
       razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
       razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
     }
Razorpay::Utility.verify_payment_signature(payment_response)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.utility.verify_payment_signature({
  'razorpay_order_id': razorpay_order_id,
  'razorpay_payment_id': razorpay_payment_id,
  'razorpay_signature': razorpay_signature
  })

```c: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("razorpay_order_id", "order_IEIaMR65");
options.Add("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.Add("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50");

Utils.verifyPaymentSignature(options);

```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var { validatePaymentVerification, validateWebhookSignature } = require('./dist/utils/razorpay-utils');
validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);

```Go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

params := map[string]interface{}{
 "razorpay_order_id": "order_IEIaMR65cu6nz3",
 "razorpay_payment_id": "pay_IH4NVgf4Dreq1l",
}

signature := "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f";
secret := "EnLs21M47BllR3X8PSFtjtbd";
utils.VerifyPaymentSignature(params, signature, secret)
```

    

  
### Post Signature Verification

After you have completed the integration, you can [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md), make test payments, replace the test key with the live key and integrate with other [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
    

## 1.7 Verify Payment Status

> **INFO**
>
> 
> **Handy Tips**
> 
> On the Razorpay Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
> 

    
### You can track the payment status in three ways:

    
        To verify the payment status from the Razorpay Dashboard:

        1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
        2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**.
        
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/outward-remittances/custom-integration/test-integration.md)
