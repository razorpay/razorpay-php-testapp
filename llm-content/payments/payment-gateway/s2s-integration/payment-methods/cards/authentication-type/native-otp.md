---
title: Native OTP
description: Use the Razorpay Native OTP feature to support OTPs at the checkout without redirecting customers to the ACS page of the issuing bank.
---

# Native OTP

Razorpay's Native OTP feature supports one-time passwords (OTPs) in the Checkout form, without redirecting customers to the ACS page of the respective issuing banks.
This enables you to extend a simple and efficient OTP flow to your customers, reduce payment failures due to low internet speeds and avoid failures due to redirects to bank pages.

Shown below is a sample OTP input screen:

![](/docs/assets/images/rzp-acs_page.jpg)

 to get this feature activated on your Razorpay account.

## Prerequisites

Before implementing the Native OTP feature, ensure that the following requirements are met:
1. Verify that you are PCI compliant to accept and process customer's card details at your end.
   [Learn more about PCI compliance](https://www.pcicomplianceguide.org/faq/#1). The compliance certificate should be updated as per the yearly renewal cycle.
2. Familiarize yourselves with the [payment flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/how-it-works.md).

## Workflow for Native OTP

1. [Create a Razorpay order](#1-create-a-razorpay-order)
2. [Validate Authentication Type](#2-validate-authentication-type)
3. [Create a Payment](#3-create-a-payment)
4. [OTP Authentication](#4-otp-authentication)
5. [Payment Verification](#5-verify-the-payment)

> **INFO**
>
> 
> 
> **API Authentication**
> 
> Razorpay APIs are authenticated using **Basic Auth** method where your `key_id` is the **Username** and `key_secret` is the **Password**. You can access your API keys from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md).
> 

### 1. Create a Razorpay Order

A **Razorpay Order** creates an order ID that corresponds to the unique transaction ID or checkout ID created at your end. The Order ID is tied to all the payments made against that particular order.

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

Validating the authentication type is critical. This will help you to set the value of `auth_type` in [payment creation](#3-create-a-payment). If the value of `auth_type` is sent as `otp` for a BIN which is not validated successfully, the transaction will fail.

The following API endpoint will enable Razorpay to verify the OTP-based authentication flow for a specific card:

/payment/flows

```curl: Request
curl -X POST \
'https://api.razorpay.com/v1/payment/flows' \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json'
-d '{
    "card_number":"4242424242424242"
}'
```json: Response
{
  "otp": true, // if OTP is enabled on the card
  ...
}
```

### 3. Create a Payment

After the Order ID is created, create a payment for the Order ID. The API endpoint for creating a payment is given below:

/payments/create/redirect

```curl: Example Request with auth_type
curl -X POST \
'https://api.razorpay.com/v1/payments/create/redirect' \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/x-www-form-urlencoded" \
-d 'amount=5000&currency=INR&contact=9123456780&email=gaurav.kumar@example.com&method=card&card[number]=4386289407660153&card[name]=Gaurav%20Kumar&card[expiry_month]=01&card[expiry_year]=25&card[cvv]=111&user_agent=Razorpay%20SDK&ip=1.160.10.240&referer=https://www.example.com&auth_type=otp'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_Bf9GPSOEQg0NTi";

Payment payment = razorpayclient.payments.otpResend(paymentId);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymentId = "pay_Bf9GPSOEQg0NTi";

Razorpay::Payment.otp_resend(paymentId)

```json: Response with OTP
{
  "next": [
    "otp_submit",
    "otp_resend"
  ],
  "razorpay_payment_id": "pay_Bf9GPSOEQg0NTi"
}
```json: Normal Error Response
{
  "error": {
    "code": "GATEWAY_ERROR"
  }
}
```json: Feature Unavailable for the BIN
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The otp authentication type is not applicable on the given card"
  }
}
```

#### Request Parameters

`currency` _mandatory_
: `string` The currency of the transaction as passed in [Orders](#1-create-a-razorpay-order). [See the list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

`amount` _mandatory_
: `integer` The transaction amount, expressed in the smallest currency unit such as paise. For example, for an actual amount of , the value of this field should be `29935`.

`order_id` _mandatory_
: `string` The unique identifier of the order created using in [Step 1](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/cards/authentication-type/native-otp/#1-create-a-razorpay-order.md).

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `9123456780`.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `card`.

`card`
: The attributes associated with a card.

    `number` _mandatory_
    : `integer` Unformatted card number. This field is required if value of `method` is `card`. Use one of our test cards to try out the payment flow.

    `name` _mandatory_
    : `string` The name of the cardholder.

    `expiry_month` _mandatory_
    : `integer` The expiry month of the card in `MM` format. For example, `01` for January and `12` for December.

    `expiry_year` _mandatory_
    : `integer` Expiry year for card in `YY` format. For example, 2025 will be in format `25`.

    `cvv` _mandatory_
    : `integer` CVV printed on the back of the card.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>       - CVV is not required by default for tokenised cards across all networks.
>       - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>       - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>       - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>       - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.       
>     

`notes` _optional_
: `object` Set of key-value pairs used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`ip` _mandatory_
: `string` The client's IP address.

`referer` _mandatory_
: `string` The client's referer URL.

`user_agent` _mandatory_
: `string` The client's User-Agent.

`auth_type` _mandatory_
: `string` Indicates the authentication type for this integration method.
  Defaults to `3ds`. Upon [successful validation](#2-validate-authentication-type), pass `auth_type=otp`.

#### Response Parameters

`razorpay_payment_id`
: `string` Unique identifier of a payment.

`razorpay_order_id` _string_
: `string` Unique identifier of an Order.

 `razorpay_signature` _string_
: `string` Unique alpha-numeric identifier used for verifying a payment.

[`next`](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/cards/authentication-type/native-otp/#otp-submit.md)
: `array` Lists the subsequent payment actions available:
  - `otp_submit`
  - `otp_resend` 

  [Learn more about `next` actions.](#4-otp-authentication)

The following example request creates a payment for :

> **INFO**
>
> 
> 
> **Note**
> 
> The payment data is passed in `form-urlencoded` format which ensures that nested keys are correctly passed.
> 

### 4. OTP Authentication

After entering the OTP, the customer can perform either of the two actions, as described in the `next` parameter:

1. [OTP Submit](#otp-submit)
2. [OTP Resend](#otp-resend)

`next`
: `array` This array specifies the available actions as a comma-separated list. It can have the following predefined values:
  -`otp_submit`
  -`otp_resend`

In cases where two-factor authentication is not required or not available, the `next` object will not be returned in the response.

  `otp_submit`
  : `string` This value is consumed to display otp submit option.

  `otp_resend`
  : `string` This value is consumed as a retry option for OTP submission. If the parameter is not present, the OTP resend option cannot be shown to the customers. The resend option may be unavailable after a certain number of retries. The number of retries is determined by the bank and not by Razorpay.

#### OTP Submit

OTP submission is a part of the payment authentication process from the customer's end where an OTP received is submitted through your application's frontend.

For card payments, customers receive the OTP via their preferred notification medium - SMS or email.

> **INFO**
>
> 
> 
> **Note**
> 
> Do not perform any validation on the length of the OTP since this can vary across banks. However, the OTP should not be blank.
> 

The OTP received must be submitted to the following endpoint:

payments/:id/otp/submit

```curl: Example Request
curl -X POST \
'https://api.razorpay.com/v1/payments/pay_29QQoUBi66xm2f/otp/submit' \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/x-www-form-urlencoded" \
-d 'otp=123456'
```json: Success
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```json: Failure
{
  "error": {
    "code" : "BAD_REQUEST_ERROR",
    "description": "payment processing failed because of incorrect otp"
  },
  "next": ["otp_submit", "otp_resend"]
}
```

#### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the payment.

#### Request Parameter

`otp` _mandatory_
: `integer` The OTP received by the customer.

#### OTP Resend

There could be situations when the customer has to re-enter the OTP. The number of retries that the user is allowed is determined by the issuing bank.

payments/:id/otp/resend

```curl: Example Request
curl -X POST \
'https://api.razorpay.com/v1/payments/pay_29QQoUBi66xm2f/otp/resend' \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
```json: Success
{
  "next": ["otp_submit", "otp_resend"],
  "razorpay_payment_id": "pay_29QQoUBi66xm2f"
}
```

#### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the payment.

### 5. Verify the Payment

Once the payment process is completed, Razorpay will make a `POST` request to the `callback_url` on whether the payment was a **success** or a **failure**.

You can easily verify the payment signature using our SDKs:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

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
        razorpay_order_id: 'order_IEIaMR65cu6nz3',
        razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
        razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
      }
Razorpay::Utility.verify_payment_signature(payment_response)
```

If `razorpay_payment_id` is returned, the payment is successfully created and verified.

> **INFO**
>
> 
> 
> **Post-processing**
> 
> A successful transaction results in the creation of the `razorpay_order_id` in your database. You can mark the corresponding transaction at your end as paid and notify the customer of the same.
> 

### Failure Scenario

An exception is thrown in the event of unsuccessful signature verification. If the `razorpay_payment_id` field is missing in the API request, the following error is displayed in the corresponding response body:

```html: Response
error%5Bcode%5D=BAD_REQUEST_ERROR&error%5Bdescription%5D=Payment+failed
```
