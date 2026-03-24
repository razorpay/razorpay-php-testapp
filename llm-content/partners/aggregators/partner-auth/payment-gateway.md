---
title: Partner Auth | Payment Gateway
heading: Payment Gateway
description: Integrate Razorpay Payment Gateway using Partner Auth.
---

# Payment Gateway

Follow these steps to integrate with the Razorpay Payment Gateway:

1. [Create an order using Orders API](#step-1-create-an-order-using-orders-api).
2. [Add the Razorpay Checkout code to your website](#step-2-add-razorpay-checkout-code-to-website).
3. [Store fields in your server](#step-3-store-fields-in-your-server).
4. [Verify payment signature](#step-4-verify-payment-signature).
5. [Verify payment status](#step-5-verify-payment-status).

## Step 1: Create an Order Using Orders API

Integrate with [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md) to create an order. Given below is the sample code for Create an Order API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders \
-u [CLIENT_ID]:[CLIENT_SECRET] \
-H 'content-type:application/json' \
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \
-d '{
    "amount": 50000,
    "currency": "INR",
    "receipt": "rcptid_11"
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
orderRequest.put("amount", 50000); // amount in the smallest currency unit
orderRequest.put("currency", "INR");
orderRequest.put("receipt", "receipt#1");

Order order = razorpay.orders.create(orderRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

headers = {"headers": {"X-Razorpay-Account": "acc_ImoLtoiOGXlyEi"}}

client.order.create(data={
    "amount": 50000,
    "currency": "INR",
    "receipt": "rcptid_11"
,}, **headers)

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->order->create(array('receipt' => 'receipt#1', 'amount' => 50000, 'currency' => 'INR'));

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

client.addHeader("X-Razorpay-Account", "acc_Ef7ArAsdU5t0XL");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 50000);
orderRequest.Add("currency", "INR");
orderRequest.Add("receipt", "receipt#1");

Order order = client.Order.Create(orderRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1'

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.orders.create({
"amount": 50000,
"currency": "INR",
"receipt": "rcptid_11"
}) 

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

data := map[string]interface{}{
  "amount": 50000,
  "currency": "INR",
  "receipt": "some_receipt_id",
  "partial_payment": false,
  "notes": map[string]interface{}{
      "key1": "value1",
      "key2": "value2",
    } 
}
body, err := client.Order.Create(data, extraHeaders)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr:= map[string]interface{}{
    "amount": "50000",
    "currency": "INR",
    "receipt": "rcptid_11",
}

headers:= map[string]string{
    "X-Razorpay-Account": "acc_ImoLtoiOGXlyEi",
}

body, err := client.Order.Create(para_attr, headers)

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

### Request Parameters

Here is the list of parameters and their description for creating an order:

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunits. For example, for an actual amount of , the value of this field should be `30000`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be 3 characters.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

## Step 2: Add Razorpay Checkout Code to Website

Copy-paste the parameters as `options` in your code. This creates a Pay button on the website, which the customer can use to invoke Checkout and complete the payment. Pass the `order_id` received in the response of [step 1](#step-1-create-an-order-using-orders-api) to the checkout code.

```html: Checkout with Handler Functions (JavaScript)
Pay

var options = {
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise.
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "account_id": "acc_Ef7ArAsdU5t0XL",
    "order_id": "order_DBJOWzybf0sJbb", //This is a sample Order id. Pass the `id` obtained in the response of Step 1.
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

```html: Manual Checkout with Callback URL (JavaScript)
Pay

var options = {
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise.
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "account_id": "acc_Ef7ArAsdU5t0XL",
    "order_id": "order_DBJOWzybf0sJbb", //This is a sample Order id. Pass the `id` obtained in the response of Step 1.
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

```

> **INFO**
>
> 
> **Handy Tips**
> 
> Test your integration using these [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#2-test-integration).
> 

### Checkout Options

`key` _mandatory_
: `string` API Key ID generated from the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is , enter `222250` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

   
> **WARN**
>
> 
>    **Watch Out!**
> 
>    As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>    

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

   
> **INFO**
>
> 
> 
>    **Handy Tips**
> 
>    Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>    

`name` _mandatory_
: `string` Your Business/Enterprise name shown on the Checkout form. For example, **Acme Corp**.

`description` _optional_
: `string` Description of the purchase item shown on the Checkout form. It should start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown on the Checkout form. Can also be a **base64** string if you are not loading the image from a network.

`order_id` _mandatory_
: `string` Order ID generated via [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`prefill`
: `object` You can prefill the following details at Checkout.

   
> **INFO**
>
> 
>    **Boost Conversions and Minimise Drop-offs**
> 
>    - Autofill customer contact details, especially phone number to ease form completion. Include customer’s phone number in the `contact` parameter of the JSON request's `prefill` object. Format: +(country code)(phone number). Example: "contact": "+919000090000".   
>    - This is not applicable if you do not collect customer contact details on your website before checkout, have Shopify stores or use any of the no-code apps.
> 
>    

   `name` _optional_
   : `string` Cardholder's name to be prefilled if customer is to make card payments on Checkout. For example, **Gaurav Kumar**.

   `email` _optional_
   : `string` Email address of the customer.

   `contact` _optional_
   : `string` Phone number of the customer. The expected format of the phone number is `+ {country code}{phone number}`. If the country code is not specified, `91` will be used as the default value. This is particularly important while prefilling `contact` of customers with phone numbers issued outside India. **Examples**:
       - +14155552671 (a valid non-Indian number)
       - +919977665544 (a valid Indian number). 
If 9977665544 is entered, `+91` is added to it as +919977665544.

   `method` _optional_
   : `string` Pre-selection of the payment method for the customer. Will only work if `contact` and `email` are also prefilled. Possible values:
       
       - `card`

       - `netbanking`

       - `wallet`

       - `upi`

       - `emi`

       

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`theme`
: `object` Thematic options to modify the appearance of Checkout.

   `color` _optional_
   : `string` Enter your brand colour's HEX code to alter the text, payment method icons and CTA (call-to-action) button colour of the Checkout form.

   `backdrop_color` _optional_
   : `string` Enter a HEX code to change the Checkout's backdrop colour.

`modal`
: `object` Options to handle the Checkout modal.

   `backdropclose` _optional_
   : `boolean` Indicates whether clicking the translucent blank space outside the Checkout form should close the form. Possible values:
       - `true`: Closes the form when your customer clicks outside the checkout form.
       - `false` (default): Does not close the form when customer clicks outside the checkout form.

   `escape` _optional_
   : `boolean` Indicates whether pressing the **escape** key should close the Checkout form. Possible values:
       - `true` (default): Closes the form when the customer presses the **escape** key.
       - `false`: Does not close the form when the customer presses the **escape** key.

   `handleback` _optional_
   : `boolean` Determines whether Checkout must behave similar to the browser when back button is pressed. Possible values:
       - `true` (default): Checkout behaves similarly to the browser. That is, when the browser's back button is pressed, the Checkout also simulates a back press. This happens as long as the Checkout modal is open.
       - `false`: Checkout does not simulate a back press when browser's back button is pressed.

   `confirm_close` _optional_
   : `boolean` Determines whether a confirmation dialog box should be shown if customers attempts to close Checkout. Possible values:
       - `true`: Confirmation dialog box is shown.
       - `false` (default): Confirmation dialog box is not shown.
  
   `ondismiss` _optional_
   : `function` Used to track the status of Checkout. You can pass a modal object with `ondismiss: function()\{\}` as options. This function is called when the modal is closed by the user. If `retry` is `false`, the `ondismiss` function is triggered when checkout closes, even after a failure.

   `animation` _optional_
   : `boolean` Shows an animation before loading of Checkout. Possible values:
       - `true`(default): Animation appears.
       - `false`: Animation does not appear.

`subscription_id` _optional_
: `string` If you are accepting recurring payments using Razorpay Checkout, you should pass the relevant `subscription_id` to the Checkout. Know more about [Subscriptions on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#checkout-integration).

`subscription_card_change` _optional_
: `boolean` Permit or restrict customer from changing the card linked to the subscription. You can also do this from the [hosted page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/payment-retries.md#update-the-payment-method-via-our-hosted-page). Possible values:
   - `true`: Allow the customer to change the card from Checkout.
   - `false` (default): Do not allow the customer to change the card from Checkout.

`recurring` _optional_
: `boolean` Determines if you are accepting [recurring (charge-at-will) payments on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md) via instruments such as emandate, paper NACH and so on. Possible values:
   - `true`: You are accepting recurring payments.
   - `false` (default): You are not accepting recurring payments.

`callback_url` _optional_
: `string` Customers will be redirected to this URL on successful payment. Ensure that the domain of the Callback URL is allowlisted.

`redirect` _optional_
: `boolean` Determines whether to post a response to the event handler post payment completion or redirect to Callback URL. `callback_url` must be passed while using this parameter. Possible values:
   - `true`: Customer is redirected to the specified callback URL in case of payment failure.
   - `false` (default): Customer is shown the Checkout popup to retry the payment with the suggested next best option.

`customer_id` _optional_
: `string` Unique identifier of customer. Used for:

   - [Local saved cards feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md#manage-saved-cards).
   - Static bank account details on Checkout in case of [Bank Transfer payment method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md).

`remember_customer` _optional_
: `boolean` Determines whether to allow saving of cards. Can also be configured via the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#flash-checkout). Possible values:
   - `true`: Enables card saving feature.
   - `false` (default): Disables card saving feature.

`timeout` _optional_
: `integer` Sets a timeout on Checkout, in seconds. After the specified time limit, the customer will not be able to use Checkout.

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     Some browsers may pause `JavaScript` timers when the user switches tabs, especially in power saver mode. This can cause the checkout session to stay active beyond the set timeout duration.
>     

`readonly`
: `object` Marks fields as read-only.

   `contact` _optional_
   : `boolean` Used to set the `contact` field as readonly. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as readonly. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.
      
   `name` _optional_
   : `boolean` Used to set the `name` field as readonly. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

`hidden`
: `object` Hides the contact details.

   `contact` _optional_
   : `boolean` Used to set the `contact` field as optional. Possible values:
       - `true`: Customer will not be able to view this field.
       - `false` (default): Customer will be able to view this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as optional. Possible values:
       - `true`: Customer will not be able to view this field.
       - `false` (default): Customer will be able to view this field.

`send_sms_hash` _optional_
: `boolean` Used to auto-read OTP for cards and netbanking pages. Applicable from Android SDK version 1.5.9 and above. Possible values:
   - `true`: OTP is auto-read.
   - `false` (default): OTP is not auto-read.

`allow_rotation` _optional_
: `boolean` Used to rotate payment page as per screen orientation. Applicable from Android SDK version 1.6.4 and above. Possible values:
   - `true`: Payment page can be rotated.
   - `false` (default): Payment page cannot be rotated.

`retry` _optional_
: `object` Parameters that enable retry of payment on the checkout.

   `enabled`
   : `boolean` Determines whether the customers can retry payments on the checkout. Possible values:
       - `true` (default): Enables customers to retry payments.
       - `false`: Disables customers from retrying the payment.
  
   `max_count`
   : `integer` The number of times the customer can retry the payment. We recommend you to set this to 4. Having a larger number here can cause loops to occur.
       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        Web Integration does not support the `max_count` parameter. It is applicable only in Android and iOS SDKs.
>        

  
`config` _optional_
: `object` Parameters that enable checkout configuration. Know more about how to [configure payment methods on Razorpay standard checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).
  
   `display`
   : `object` Child parameter that enables configuration of checkout display language.

       `language`
       : `string` The language in which checkout should be displayed. Possible values:
           - `en`: English
           - `ben`: Bengali
           - `hi`: Hindi
           - `mar`: Marathi
           - `guj`: Gujarati
           - `tam`: Tamil
           - `tel`: Telugu

## Step 3: Store Fields in Your Server

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
    

## Step 4: Verify Payment Signature

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
    

Check [our SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration.md) for the supported platforms.

## Step 5: Verify Payment Status

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
        ![](/docs/assets/images/testpayment.jpg)
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

## Next Steps

You can view the payments received from customers on the sub-merchant's  Dashboard. Also, you can retrieve the status of the payments by polling our [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).

Given below is the APIs used to fetch payments. You must pass the sub-merchant account identifier as a header while retrieving details using GET requests.

### Fetch Payments of Sub-Merchants API

You can fetch the details of the payments received by sub-merchant using the endpoint given below. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

/payments

```curl: Curl
curl -X GET https://api.razorpay.com/v1/payments \
-u : \ 
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \

```java: Java
RazorpayClient razorpay = new RazorpayClient([YOUR_KEY_ID],[YOUR_KEY_SECRET]);
try {
  JSONObject orderRequest = new JSONObject();
  headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
  instance.addHeaders(headers);

    //supported option filters (from, to, count, skip)

  List payments = razorpay.Payments.fetchAll(paymentRequest);
} catch (RazorpayException e) {
  // Handle Exception
    System.out.println(e.getMessage());
}

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->payment->all($options)

```js:Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.payments.all(option)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

Razorpay::Payment.all

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

body, err := client.Payment.All(nil, extraHeaders)
```json: Response
{
  "id": "pay_EfXir8l3TPO9zw",
  "entity": "payment",
  "amount": 10000,
  "currency": "MYR",
  "status": "authorized",
  "order_id": "order_EfXfUWQzL1YyI4",
  "invoice_id": null,
  "international": false,
  "method": "wallet",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": false,
  "description": "Test transaction",
  "card_id": null,
  "bank": null,
  "wallet": "touchngo",
  "email": "gaurav.kumar@example.com",
  "contact": "+919988776644",
  "notes": [],
  "fee": null,
  "tax": null,
  "error_code": null,
  "error_description": null,
  "created_at": 1587124317
}
```

### Related Information

- [Razorpay Payment Gateway: Web Standard Integration Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
