---
title: Native OTP
description: Integrate the Razorpay Native OTP feature with Custom Checkout to combat customer payment issues such as payment failures due to low internet speeds and bank page redirects.
---

# Native OTP

Native OTP helps generate and verify OTP on the customers’ browser without redirecting them to their bank's ACS page for authentication. Since there will be no redirection using the customers’ browser, it will reduce the dependency on the customers’ browser network, reduce the drop-off rates, and give a seamless consumer experience for card transactions.

## Advantages 

- Increase success rates by up to 4%.
- Reduce payment failures due to low internet speeds.
- Avoid failures due to redirects to bank pages.
- Offer a consistent experience on mobile and web checkout.

## Prerequisites

- Verify that you are PCI compliant to accept and process customers' card details. Know more about [PCI compliance](https://www.pcicomplianceguide.org/faq/#1). The compliance certificate should be updated as per the yearly renewal cycle.
- Raise a request with our [Support](https://razorpay.com/support/#request) team to enable this feature on your Checkout page.
- Know about the [Razorpay Payment Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md).
- Integrate with [Razorpay Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md).

## Integration Steps 
Follow the integration steps given below: 

**1.1** [Create an Order in Server](#11-create-an-order-in-server).

**1.2** [Integrate the getCardFlows Method](#12-integrate-the-getcardflows-method).

**1.3** [Create a Payment](#13-create-a-payment).

**1.4** [Display OTP UI](#14-display-otp-ui).

**1.5** [Perform OTP Authentication](#15-perform-otp-authentication).

**1.6** [Verify Payment Signature](#16-verify-payment-signature).

### 1.1 Create an Order in Server

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call.  Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) Orders API.  
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
  'currency'        => 'INR'// [See the list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).)
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
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be 3 characters.

  
  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY and three decimal currencies, such as KWD, BHD and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
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

Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

#### Response Parameters

Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) table.

#### Error Response Parameters

The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md). 

### 1.2 Integrate the getCardFlows Method

Validating the authentication type is critical. This will help you set the value of `auth_type` during [payment creation](#13-create-a-payment).

> **WARN**
>
> 
> **Watch Out!**
> 
> If the value of `auth_type` is sent as an OTP for a BIN that is not validated successfully, the transaction will fail.
> 
  

Use the `getCardFlows` method given below to check for the available flows on a given card number: 

```java: getcardsflow
razorpay.getCardFlows('438628', (flows) => {
      console.log(flows.otp);
    });
```
Use the `getCardFeatures` method given below to get the card features:

```java: getCardFeatures
{
    "flows": {
        "otp": true,
        "recurring": false,
        "iframe": false,
        "emi": true
    },
    "type": "credit",
    "issuer": "HDFC",
    "network": "Diners Club",
    "cobranding_partner": null,
    "country": "IN",
    "http_status_code": 200
}
```

### 1.3 Create a Payment 

While initiating payment for the card payment method, you must pass an additional parameter within the create payment function if the card flow function response is `otp = true`.

```java: Create a Payment 
function createRazorpayPayment (data) {
 rzp.createPayment(data, {
   nativeotp: true
 });
}
```
### 1.4 Display OTP UI

Use the sample code given below to display OTP UI to your customers:

```java: OTP UI
rzp.on('payment.otp.required', function (data) {
 // Show OTP UI
// data = {
//   "metadata": {
//     "issuer": "HDFC",
//     "network": "MC",
//     "last4": "9275",
//     "iin": "512967"
//   },
//   "next": [
//     "otp_submit",
//     "otp_resend"
//   ],
//   "redirect": "https://api.razorpay.com/v1/payments/pay_E1xQsBuIZ02..."
// }
});
```

> **INFO**
>
> 
> **Handy Tips**
> 
> - If you want to redirect the user to the bank ACS page, you should use the URL present in the response for creating a payment.
> - To get post-transaction feedback from the bank page to your website, the callback URL needs to be defined while creating a payment. Razorpay will send the response to the defined callback URL after payment success or failure.
> 

### 1.5 Perform OTP Authentication 

After entering the OTP, the customer can perform either:

- [OTP Submit](#otp-submit)
- [OTP Resend](#otp-resend)
- [OTP Cancel](#otp-cancel)

#### OTP Submit

OTP submission is a part of the payment authentication process where the customer submits the OTP received through your application's frontend.

The customer receives the OTP for card payments via their preferred notification medium - SMS or email.

> **INFO**
>
> 
> **Handy Tips**
> 
> Do not perform any validation on the length of the OTP since this can vary across banks. The OTP, however, should not be blank.
> 

Use the following function to enable customers to submit OTP

```java: OTP Submit
function submitRazorpayOTP (otp) {
 rzp.submitOTP(otp);
}
```

#### OTP Resend 

There can be situations when customers must re-enter the OTP sent to them. The issuing bank determines the number of retries that the user is allowed. Given below is the sample code of the OTP Resend function:

```java: OTP Resend 
function resendRazorpayOTP () {
 rzp.resendOTP();
}
```

#### OTP Cancel

Customers can cancel the payment based on their requirements. Given below is the sample code of the OTP Cancel function:

```java: OTP Cancel
function cancelRazorpayPayment () {
 rzp.emit('payment.cancel');
}
```

### 1.6 Verify Payment Signature 

Once the payment process is completed, Razorpay will make a `POST` request to the `callback_url` on whether the payment was a success or a failure.

You can easily verify the payment signature using our SDKs:

```java: Java
String secret = "";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

boolean status =  Utils.verifyPaymentSignature(options, secret);
```php: PHP
use Razorpay\Api\Api;
$api = new Api($key_id, $key_secret);
$attributes  = array('razorpay_signature'  => '23233',  'razorpay_payment_id'  => '332' ,  'razorpay_order_id' => '12122');
$order  = $api->utility->verifyPaymentSignature($attributes)
```ruby: Ruby
require 'razorpay'
Razorpay.setup('key_id', 'key_secret')
payment_response = {
  'razorpay_order_id': '12122',
  'razorpay_payment_id': '332',
  'razorpay_signature': '23233'
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

Dictionary attributes = new Dictionary();

            attributes.Add("razorpay_payment_id", paymentId);
            attributes.Add("razorpay_order_id", Request.Form["razorpay_order_id"]);
            attributes.Add("razorpay_signature", Request.Form["razorpay_signature"]);

            Utils.verifyPaymentSignature(attributes);
```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var { validatePaymentVerification } = require('./dist/utils/razorpay-utils');

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

If `razorpay_payment_id` is returned, the payment is successfully created and verified.

> **INFO**
>
> 
> **Handy Tips**
> 
> A successful transaction results in creating the `razorpay_order_id` in your database. You can mark the corresponding transaction at your end as **paid** and notify the customer of the same.
> 

#### Sample Code

You can use the sample code given below:

```java: Sample Code

  
    
    
    
    Document
    
  
  
    Pay Rs. 5000

    Payment Method
    

    Pay
    pop-up top
  

  
    var razorpay = new Razorpay({
      key: 'YOUR_KEY_ID',
      image:
        'https://www.carlogos.org/car-logos/lamborghini-logo-1000x1100-show.png',
      callback_url: 'https://www.google.com/',
      redirect: true,
    });

    razorpay.once('ready', function (response) {
      // console.log(response.methods);
      // document.getElementById("method").innerHTML = JSON.stringify(response.methods);
    });

    razorpay.getCardFlows('438628', (flows) => {
      console.log(flows.otp);
    });

    var data = {
      amount: 100,
      email: 'gaurav.kumar@example.com',
      contact: '9000090000',
      //"order_id": "order_JyhxBsMXOOfJ4c",
      method: 'card',
      'card[name]': 'Gaurav Kumar',
      'card[number]': '4386289407660153',
      'card[cvv]': '566',
      'card[expiry_month]': '10',
      'card[expiry_year]': '26',
    };

    var btn = document.querySelector('#rzp-button1');
    btn.addEventListener('click', function () {
      razorpay.createPayment(data, {
        nativeotp: true,
      });

      razorpay.on('payment.otp.required', function (data) {
        // Show OTP UI
        console.log(data);
      });

      // razorpay.submitOTP('1234');
      //razorpay.resendOTP();
      //razorpay.emit('payment.cancel');
    });

    var btn1 = document.querySelector('#rzp-button2');
    btn1.addEventListener('click', function () {
      razorpay.focus(); // will bring popup to top
    });
  

```
