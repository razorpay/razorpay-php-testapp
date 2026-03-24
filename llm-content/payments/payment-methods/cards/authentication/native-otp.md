---
title: Authentication Type for Cards - Native OTP
description: Use Razorpay Native OTP to address customer payment issues such as payment failures due to low internet speeds and bank page redirects. Authenticate card payments using OTPs.
---

# Authentication Type for Cards - Native OTP

Use Razorpay's Native OTP feature to provide an efficient and simple OTP flow to your customers, reduce payment failures due to low internet speeds and avoid payment failure due to redirects to bank pages.

## Prerequisites

Before implementing the Native OTP feature, check if the following requirements are in place:
1. Verify that you are PCI-compliant to accept and process the customer's card details. Know more about [PCI compliance](https://www.pcicomplianceguide.org/faq/#1). The compliance certificate should be updated as per the yearly renewal cycle.
2. Raise a request with [Razorpay Support](https://razorpay.com/support#request) to enable this feature on your Checkout page.
3. Understand the [payment process](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/how-it-works.md).

## Create Workflow for Native OTP

1. [Creating a Razorpay order](#1-create-a-razorpay-order)
2. [Validating authentication type](#2-validate-authentication-type)
3. [Creating a payment](#3-create-a-payment)
4. [OTP Authentication](#4-otp-authentication)
5. [Payment Verification](#5-verify-the-payment)

> **INFO**
>
> 
> **API Authentication**
> 
> Razorpay APIs are authenticated using **Basic Auth** method, where  `your_key_id` is the **Username** and `your_key_secret` is the **Password**. You can access your API keys from the Dashboard.
> 

### 1. Create a Razorpay Order

A **Razorpay Order** creates an Order ID corresponding to the unique order (transaction ID or checkout ID) created at your end. The Order ID is tied to all the payments made against that particular order.

/orders

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call.  Know how to [authenticate](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) Orders API.  
- The order_id received in the response should be passed to the checkout. This ties the Order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

#### API Sample Code

The following is a sample API request and response for creating an order:

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
    "amount": 50000,
    "currency": "INR",
    "receipt": "rcptid_11",
    "partial_payment": true,
    "first_payment_min_amount": 23000
}'
```java: Java
try {
  JSONObject orderRequest = new JSONObject();
  orderRequest.put("amount", 50000); // amount in the smallest currency unit
  orderRequest.put("currency", "INR");
  orderRequest.put("receipt", "order_rcptid_11");

  Order order = razorpay.Orders.create(orderRequest);
} catch (RazorpayException e) {
  // Handle Exception
  System.out.println(e.getMessage());
}
```Python: Python
import razorpay
client = razorpay.Client(auth=("api_key", "api_secret"))

DATA = {
    "amount": 50000,
    "currency": "INR",
    "receipt": "receipt#1",
    "notes": {
        "key1": "value3",
        "key2": "value2"
    }
}
client.order.create(data=DATA)
```php: PHP
$order  = $client->order->create([
  'receipt'         => 'order_rcptid_11',
  'amount'          => 50000, // amount in the smallest currency unit
  'currency'        => 'INR'// [See the list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).)
]);
```csharp: .NET
Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.add("receipt", "order_rcptid_11");
options.add("currency", "INR");
Order order = client.Order.Create(options);
```ruby: Ruby
options = amount: 50000, currency: 'INR', receipt: ''
order = Razorpay::Order.create
```javascript: Node.js
var options = {
  amount: 50000,  // amount in the smallest currency unit
  currency: "INR",
  receipt: "order_rcptid_11"
};
instance.orders.create(options, function(err, order) {
  console.log(order);
});
```json: Response
{
    "id": "order_DBJOWzybf0sJbb",
    "entity": "order",
    "amount": 50000,
    "amount_paid": 0,
    "amount_due": 50000,
    "currency": "INR",
    "receipt": "rcptid_11",
    "status": "created",
    "attempts": 0,
    "notes": [],
    "created_at": 1566986570
}
```

#### Request Parameters

Here is the list of parameters and their description for creating an order:

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). Length must be 3 characters.

  
  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY and three decimal currencies, such as KWD, BHD and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

  

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`id` _mandatory_
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

Know more about [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

#### Response Parameters

Descriptions for the response parameters are present in the [Orders Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/entity.md) table.

#### Error Response Parameters

The error response parameters are available in the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md).

### 2. Validate Authentication Type

Validate the authentication type to set the value of `auth_type` in [payment creation](#3-create-a-payment). The transaction will fail if the value of `auth_type` is sent as `otp` for a BIN, which is not validated successfully.

The following API endpoint allows Razorpay to verify the OTP-based authentication flow for a specific card:

/payment/flows

```curl: Example Request
curl -X POST https://api.razorpay.com/v1/payment/flows \
-u : \
-H 'content-type: application/json'
-d '{
  "card_number": "4242424242424242"
}'
```json: Validation Success
{
  "otp": true,
  "pin": true/false
}

```json: Validation Failure
{
  []
}
```

### 3. Create a Payment

Use the following API to create a payment using the Order ID.

/payments/create/redirect

#### Request Parameters

`currency` _mandatory_
: `string` The currency of the payment amount. Pass `INR` for Indian rupees as currently, we do not support foreign currencies.

`amount` _mandatory_
: `integer` The payment amount in **paise**. For example, if the payment amount is ₹195.55, pass `19555`.

`order_id` _mandatory_
: `string` The unique identifier of the order created in [step 1](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/authentication/native-otp/#creating-the-workflow-for-native-otp.md).

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `+919123456780`.

`method` _mandatory_
: `string` The payment method selected by the customer. The only allowed value is `card`.

`card[number]` _mandatory_
: `integer` Unformatted card number. This field is required if value of `method` is `card`. Use one of our [ test cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/test-card-details.md) to try out the payment flow.

`card[name]` _mandatory_
: `string` The name of the cardholder.

`card[expiry_month]` _mandatory_
: `integer` The expiry month of the card in *MM* format. For example, `01` for January and `12` for December.

`card[expiry_year]` _mandatory_
: `integer` Expiry year for card in *YY* format. For example, `22` for 2022.

`card[cvv]` _mandatory_
: `integer` 3-digit code on the back of Master or Visa card or 4-digit code on the front of the AMEX card.

`notes` _optional_
: `object` A set of key-value pairs that you can attach to an entity. Maximum 15 pairs. Maximum 256 characters for each pair. This can be useful for storing additional information about the entity.

`ip` _mandatory_
: `string` The client's IP address.

`referer` _mandatory_
: `string` The client's referer URL.

`user_agent` _mandatory_
: `string` The client's User-Agent.

[`auth_type`](#2-auth_type-verification) _mandatory_
: `string` Indicates the authentication type for this integration method.
  Defaults to `3ds`. Upon [successful validation](#2-validate-authentication-type), pass `auth_type=otp`.
  @// Passing `auth_type=otp` when the [validation](#2-validate-authentication-type) has failed, will result in payment failure.

#### Response Parameters

`razorpay_payment_id`
: `string` Specifies the unique identifier of a payment. A sample payment ID: `pay_29QQoUBi66xm2f`

`next`
: `array` Lists the subsequent payment actions available: `otp_submit` and `otp_resend` [Know more about `next` actions.](#4-otp-authentication)

The following example request creates a payment of ₹50:

> **INFO**
>
> 
> **Handy Tips**
> 
> The payment data is passed in `form-urlencoded` format, which ensures that nested keys are correctly passed.
> 

```cURL: Example Request with auth_type
curl -X POST \
'https://api.razorpay.com/v1/payments/create/redirect' \
-u : \
-H "Content-Type: application/x-www-form-urlencoded" \
-d 'amount=5000&currency=INR&contact=9123456780&email=gaurav.kumar@example.com&method=card&card[number]=4386289407660153&card[name]=Gaurav%20Kumar&card[expiry_month]=01&card[expiry_year]=17&card[cvv]=111&user_agent=Razorpay%20SDK&ip=1.160.10.240&referer=https://www.example.com&auth_type=otp'
```json: Response with OTP
{
"next": [
"otp_submit",
"otp_resend"
],
"razorpay_payment_id": "pay_Bf9GPSOEQg0NTi"
}
@// {
@// "razorpay_payment_id": "pay_29QQoUBi66xm2f",
@//  "razorpay_order_id": "order_9A33XWu170gUtm",
@// "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d",
@// "next": ["otp_submit", "otp_resend"]
@// }
```

#### Error Responses

```json: Normal Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Your payment was not successful as you have an invalid expiry date. To pay successfully try adding the right details",
    "source": "customer",
    "step": "payment_authentication",
    "reason": "incorrect_card_expiry_date",
    "metadata": {}
  }
}
```json: Feature Unavailable for the BIN
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The otp authentication type is not applicable on the given card",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {
      "payment_id": "pay_IAnwCdYqXiBjZ7"
    }
  }
}
```

**Know More**: Know more about [API error codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/#error-response.md).

### 4. OTP Authentication

After entering the OTP, the customer can perform either of the two actions, as described in the `next` parameter:

1. [OTP Submit](#otp-submission)
2. [OTP Resend](#otp-resend)

`next`
: `array` This array specifies the available actions as a comma-separated list. It can have the following predefined values:

  - `otp_submit`
  - `otp_resend`

 In cases where two-factor authentication is not required or not available, the `next` object will not be returned in the response.

`[next]otp_submit`
: `string` This value is consumed to display OTP submit option.

`[next]otp_resend`
: `string` This value is consumed as a retry option for OTP submission. If the parameter is not present, the OTP resend option cannot be shown to the customers. The resend option may be unavailable after a certain number of retries. The bank determines the number of retries and not Razorpay.

#### OTP Submission

The customer needs to submit the OTP using your application frontend as part of the payment authentication process.

For card payments, the customer receives the OTP using their preferred notification medium - SMS or email.

> **INFO**
>
> 
> **Handy Tips**
> 
> Do not perform any validation on the length of the OTP since this can vary across banks. The OTP should not be blank.
> 

The OTP received must be submitted to the following endpoint:

payments/:id/otp/submit

```curl: Curl
curl -X POST \
'https://api.razorpay.com/v1/payments/pay_29QQoUBi66xm2f/otp/submit' \
-u : \
-H "Content-Type: application/x-www-form-urlencoded" \
-d 'otp=123456'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_29QQoUBi66xm2f";

String jsonRequest = "{\n" +
                "  \"otp\": \"123456\",\n" +
                "}";

JSONObject requestJson = new JSONObject(jsonRequest);

Payment payment = razorpayclient.payments.otpSubmit(paymentId, requestJson);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "otp": "123456"
}

paymentId = "pay_29QQoUBi66xm2f";

Razorpay::Payment.otp_generate(paymentId, para_attr)

```csharp: .NET

RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string paymentId = "pay_Z6t7VFTb9xHeOs";

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("otp", "123456");

Payment payment = client.Payment.OtpSubmit(paymentId, paymentRequest);

```json: Success
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Payment processing failed because of incorrect OTP",
    "source": "customer",
    "step": "payment_authentication",
    "reason": "incorrect_otp",
    "metadata": {
      "payment_id": "pay_IAnpZpkZriWX1T"
    },
    "action": "RETRY"
  },
  "next": [
    "otp_submit",
    "otp_resend"
  ]
}
```

Know more about [Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/payments/payment-methods-error-parameters/#cards.md).

#### OTP Resend

For certain situations, the customers may need to re-enter the OTP sent to them. The card issuing bank sets the number of retries the customer is allowed to re-enter the OTP.

payments/:id/otp/resend

```curl: Curl
curl -X POST \
'https://api.razorpay.com/v1/payments/pay_29QQoUBi66xm2f/otp/resend' \
-u :
-H "Content-Type: application/x-www-form-urlencoded"

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_29QQoUBi66xm2f";

Payment payment = razorpayclient.payments.otpResend(paymentId);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymentId = "pay_29QQoUBi66xm2f";

Razorpay::Payment.otp_resend(paymentId)

```csharp: .NET

RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string paymentId = "pay_Z6t7VFTb9xHeOs";

Payment payment = client.Payment.OtpResend(paymentId);

```json: Response with OTP
{
  "next": [
    "otp_submit",
    "otp_resend"
  ],
  "razorpay_payment_id": "pay_Bf9GPSOEQg0NTi"
}

```json: Success
{
  "next": ["otp_submit", "otp_resend"],
  "razorpay_payment_id": "pay_29QQoUBi66xm2f"
}
```

### 5. Verify the Payment

After the payment process is complete, Razorpay makes a `POST` request to the `callback_url` about whether the payment was a **success** or a **failure**.

You can easily verify the payment signature using our SDKs:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_9A33XWu170gUtm");
options.put("razorpay_payment_id", "pay_29QQoUBi66xm2f");
options.put("razorpay_signature", "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d");

boolean status =  Utils.verifyPaymentSignature(options, secret);

```python: Python
params = {
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
client.utility.verify_payment_signature(params_dict)

```php: PHP
$params = [
  'razorpay_order_id'     =>  'order_9A33XWu170gUtm',
  'razorpay_payment_id'   =>  'pay_29QQoUBi66xm2f',
  'razorpay_signature'    =>  '9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d'
];
Razorpay\Api\Utility::verifyPaymentSignature($params);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
        razorpay_order_id: 'order_9A33XWu170gUtm',
        razorpay_payment_id: 'pay_29QQoUBi66xm2f',
        razorpay_signature: '9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d'
      }
Razorpay::Utility.verify_payment_signature(payment_response)
```

If `razorpay_payment_id` is returned, the payment is successfully created and verified.

> **INFO**
>
> 
> **Post-processing**
> 
> A successful transaction results in the creation of the `razorpay_order_id` in your database. You can mark the corresponding transaction at your end as `paid` and notify the customer.
> 

#### Failure

An exception is thrown in the event of unsuccessful signature verification. If the `razorpay_payment_id` field is missing in the API request, the following error is displayed in the corresponding response body:

```html: Failure POST Request
error%5Bcode%5D=BAD_REQUEST_ERROR&error%5Bdescription%5D=Payment+failed
```
