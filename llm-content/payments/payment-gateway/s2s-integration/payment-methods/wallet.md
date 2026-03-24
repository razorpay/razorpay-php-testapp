---
title: Wallets
description: Integrate Wallets with Razorpay to accept payments.
---

# Wallets

An online wallet works as a payment instrument that can be used by customers to store money for later use. On the other hand, a payment gateway is a full-fledged payment solution that helps online businesses to accept money via a website or app.

## Integration Steps

Follow the steps below to integrate S2S JSON API and accept payments using Wallet.

**1.1** [Generate List of Wallets Supported](#11-generate-the-list-of-wallets-supported).

**1.2** [Create an Order](#12-create-an-order).

**1.3** [Create a Payment](#13-create-a-payment).

**1.4** [Handle Payment Success and Error Events](#14-handle-payment-success-and-error-events).

**1.5** [Fetch the Payment Details and Status](#15-fetch-payment-details-and-status).

**1.6** [Verify Payment Signature](#16-verify-payment-signature).

**1.7** [Integrate Payments Rainy Day Kit](#17-integrate-payments-rainy-day-kit).

**1.8** [Verify Payment Status](#18-verify-payment-status).

### 1.1 Generate the List of Wallets Supported

The first step to identify and get the list of wallets enabled in your Razorpay account with their respective codes to integrate correctly. Razorpay uses its own wallet codes to identify the right wallet instrument entity in the system correctly. 

To get the list of wallets and their respective codes, use the following API code:

```curl: Request 
curl --location --request GET 'https://api.razorpay.com/v1/methods?key_id={MERCHANT_API_KEY}'

```json: Response
{
   "entity": "methods",
   "wallet": {
	"boost": true,
	"grabpay": true,
	"touchngo": true,
  "shopback": true,
	"mcash": true
   }
}
```

### 1.2 Create an Order

To process a payment, create a Razorpay Order to correspond with the order in your system. Send the order request parameters to the following endpoint:

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call.  Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) Orders API.  
- The `order_id` received in the response should be passed to the checkout. This ties the order with the payment and secures the request from being tampered.

#### API Sample Code

Use this endpoint to create an order using the Orders API.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders 
-U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
    "amount": 500,
    "currency": "",
    "receipt": "qwsaq1",
    "partial_payment": true,
    "first_payment_min_amount": 230
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

  JSONObject orderRequest = new JSONObject();
  orderRequest.put("amount", 50000); // amount in the smallest currency unit
  orderRequest.put("currency", "");
  orderRequest.put("receipt", "order_rcptid_11");

  Order order = razorpay.Orders.create(orderRequest);
} catch (RazorpayException e) {
  // Handle Exception
  System.out.println(e.getMessage());
}
```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

DATA = {
    "amount": 100,
    "currency": "",
    "receipt": "receipt#1",
    "notes": {
        "key1": "value3",
        "key2": "value2"
    }
}
client.order.create(data=DATA)
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => '', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.add("receipt", "order_rcptid_11");
options.add("currency", "");
Order order = client.Order.Create(options);
```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

options = amount: 50000, currency: '', receipt: ''
order = Razorpay::Order.create
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "",
  receipt: "receipt#1",
  notes: {
    key1: "value3",
    key2: "value2"
  }
})
```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 50000,
  "currency": "",
  "receipt": "some_receipt_id"
}
body, err := client.Order.Create(data)
```json: Response
{
    "id": "order_IluGWxBm9U8zJ8",
    "entity": "order",
    "amount": 5000,
    "amount_paid": 0,
    "amount_due": 5000,
    "currency": "",
    "receipt": "rcptid_11",
    "offer_id": null,
    "status": "created",
    "attempts": 0,
    "notes": [],
    "created_at": 1642662092
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit, such as Ringgit (in case of MY). For example, for an actual amount of  , the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. Length must be of 3 characters. For example, `MYR`.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`first_payment_min_amount` _optional_
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of  is to be received from the customer in two installments of #1 - RM 5,000, #2 - RM 2,000, then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

#### Response Parameters
Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) parameters table.

#### Error Response Parameters

The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).

### 1.3 Create a Payment

Once an order is created, your next step is to create a payment. The following API will create a payment with `wallet` as the payment method:

/payments/create/json

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "content-type: application/json" \
-d '{
   "amount": 100,
   "currency": "MYR",
   "order_id": "order_M44abB0zucB0h4",
   "email": "nur.aisyah@example.com",
   "contact": "+60123456789",
   "method": "wallet",
   "wallet": "touchngo",
   "callback_url": "https://merchant_callback_url.."
}'

```json: Response
{
   "next": [
       {
           "action": "redirect",
           "url": "https://api-dark.razorpay.com/pg_router/v1/payments/M44abyKHHUnfBc/authenticate"
       }
   ],
   "razorpay_payment_id": "pay_M44abyKHHUnfBc"
}
```

#### Request Parameters

The payment request for each of the supported payment methods will slightly vary. Know more about the [relevant payment request fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md).

#### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. Possible values:
      - `redirect` : Use this URL to redirect customer to submit the OTP on the bank page.
    
    `url`
    : `string`  URL to be used for the action indicated. 

The Payment API will return the payment id along with the authentication URL to which the user has to be redirected. You may choose to store the Payment id on your server to help us enquire about the status and other accounting purposes if required.

You may now choose to redirect the user to the authentication URL that you have received in the response.

### 1.4 Handle Payment Success and Error Events

Once the payment is completed by the customer, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_LUtJxInEqa0oAA&",
  "razorpay_order_id": "order_LUtJ52zWwapfqs&",
  "razorpay_signature": "e617a6c035cb39feb6cd16358d83a4e3d30b11d9e8e2181e6ef442da1d41df20"
}
```

#### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#errors) for details.

### 1.5 Fetch Payment Details and Status

After receiving the `razorpay_payment_id` through the merchant `callback_url`, use this to fetch the payment details to check the status of the payment by using the following code:

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/payments/pay_M44abyKHHUnfBc \

```json: Response
{
	"id": "pay_M44abyKHHUnfBc",
	"entity": "payment",
	"amount": 100,
	"currency": "MYR",
	"base_amount": 100,
	"status": "captured",
	"order_id": "order_M44abB0zucB0h4",
	"invoice_id": null,
	"international": false,
	"method": "wallet",
	"amount_refunded": 0,
	"refund_status": null,
	"captured": true,
	"description": null,
	"card_id": null,
	"bank": "",
	"wallet": "touchngo",
	"vpa": null,
	"email": "nur.aisyah@example.com",
	"contact": "+60123456789",
	"notes": [],
	"fee": 0,
	"tax": 0,
	"error_code": null,
	"error_description": null,
	"error_source": null,
	"error_step": null,
	"error_reason": null,
	"acquirer_data": {
		"transaction_id": "CDH000000M44abyKHHUnfBc"
	},
	"created_at": 1687239830
}
```

### 1.6 Verify Payment Signature

Signature verification is a mandatory step to ensure that Razorpay Curlec sends the callback. The `razorpay_signature` contained in the callback can be regenerated by your system and verified as follows.

Create a string to be hashed using the `razorpay_payment_id` contained in the callback and the Order ID generated in the first step, separated by a `|`. Hash this string using SHA256 and your API Secret.

```
generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

if (generated_signature == razorpay_signature) {
    payment is successful
}
```

### 1.7 Integrate Payments Rainy Day Kit

Use Payments Rainy Day kit to overcome payments exceptions such as:
- [Late Authorisation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md)
- [Payment Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md)
- [Payment Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)

### 1.8 Verify Payment Status

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
    

        

### Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
