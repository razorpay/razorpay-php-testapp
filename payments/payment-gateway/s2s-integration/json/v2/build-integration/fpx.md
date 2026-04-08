---
title: FPX
description: Steps to integrate S2S JSON API and accept payments using FPX.
---

# FPX

Financial Process Exchange (FPX) is an online banking payment method that allows end users to pay money directly from their bank account for all online transactions.

## Integration Steps

Follow the steps below to Razorpay Curlec S2S JSON API and accept payments using FPX.

**1.1** [Generate List of Banks Supporting FPX](#11-generate-the-list-of-banks-supporting-fpx)

**1.2** [Create an Order](#12-create-an-order)

**1.3** [Create a Payment](#13-create-a-payment)

**1.4** [Handle Payment Success and Error Events](#14-handle-payment-success-and-error-events)

**1.5** [Integrate Payments Rainy Day Kit](#15-integrate-payments-rainy-day-kit)

**1.6** [Fetch Payment Details and Verify Payment Status](#16-fetch-payment-details-and-verify-payment-status)

### 1.1 Generate the List of Banks Supporting FPX

The first step is identifying and getting the list of banks with their respective codes to integrate correctly. Razorpay Curlec uses its bank codes to correctly identify a bank entity in the system.

> **INFO**
>
> 
> **Handy Tips**
> 
> FPX transactions are of two categories: B2B and B2C. We follow a nomenclature of suffixing `_C` as a parameter if the transaction is of a corporate type.
> 

Use this endpoint to get the list of Banks and their respective codes:

```curl: Request 
curl --location --request GET 'https://api.razorpay.com/v1/methods?key_id={MERCHANT_API_KEY}'

```json: Response
{
   "entity": "methods",
   "fpx": {
       "PHBM": "Affin Bank",
       "PHBM_C": "AFFINMAX",
       "MFBB_C": "Alliance Bank (Business)",
       "MFBB": "Alliance Bank (Personal)",
       "ARBK": "AmBank",
       "ARBK_C": "AmBank",
       "AGOB": "AGRONet",
       "AGOB_C": "AGRONetBIZ",
       "BNPA_C": "BNP Paribas",
       "BIMB_C": "Bank Islam",
       "BIMB": "Bank Islam",
       "BKRM_C": "i-bizRakyat",
       "BKRM": "Bank Rakyat",
       "BMMB_C": "Bank Muamalat",
       "BMMB": "Bank Muamalat",
       "BKCH": "Bank Of China",
       "BSNA": "BSN",
       "CIBB_C": "CIMB Bank",
       "CIBB": "CIMB Clicks",
       "CITI_C": "Citibank Corporate Banking",
       "DEUT_C": "Deutsche Bank",
       "HSBC_C": "HSBC Bank",
       "HSBC": "HSBC Bank",
       "HLBB_C": "Hong Leong Bank",
       "HLBB": "Hong Leong Bank",
       "KFHO_C": "KFH",
       "KFHO": "KFH",
       "MBBE_C": "Maybank2E",
       "MBBE": "Maybank2E",
       "MB2U": "Maybank2U",
       "OCBC_C": "OCBC Bank",
       "OCBC": "OCBC Bank",
       "PBBE_C": "Public Bank",
       "PBBE": "Public Bank",
       "PBBN_C": "PB Enterprise",
       "RHBB_C": "RHB Bank",
       "RHBB": "RHB Bank",
       "SCBL_C": "Standard Chartered",
       "SCBL": "Standard Chartered",
       "UOVB": "UOB Bank",
       "UOVB_C": "UOB Regional"
   }
}
```

### 1.2 Create an Order

To process a payment, create a Razorpay Curlec Order to correspond with the order in your system. Send the order request parameters to the following endpoint:

**Order is an important step in the payment process.**

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call. Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) Orders API.
- The `order_id` received in the response should be passed to the checkout. This ties the order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

You can create an order:
- Using the sample code on the Razorpay Postman Public Workspace.
- By manually integrating the API sample codes on your server.

#### Razorpay Postman Public Workspace

You can use the Postman workspace below to create an order:

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-6f15a901-06ea-4224-b396-15cd94c6148d)

> **INFO**
>
> 
> **Handy Tips**
> 
> Under the **Authorization** section in Postman, select **Basic Auth** and add the Key Id and secret as the Username and Password, respectively.
> 

#### API Sample Code

Use this endpoint to create an order using the Orders API.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders
-U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
 "amount": 500,
 "currency": "INR",
 "receipt": "qwsaq1",
 "partial_payment": true,
 "first_payment_min_amount": 230,
 "notes": {
   "key1": "value3",
   "key2": "value2"
 }
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount",50000);
orderRequest.put("currency","INR");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_1","Tea, Earl Grey, Hot");
orderRequest.put("notes",notes);

Order order = instance.orders.create(orderRequest);
```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
 "amount": 50000,
 "currency": "INR",
 "receipt": "receipt#1",
 "partial_payment": False,
 "notes": {
   "key1": "value3",
   "key2": "value2"
 }
})
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 50000);
orderRequest.Add("currency", "INR");
orderRequest.Add("receipt", "receipt#1");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey, Hot");
orderRequest.Add("notes", notes);

Order order = client.Order.Create(orderRequest);
```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
 "amount": 50000,
 "currency": "INR",
 "receipt": "receipt#1",
 "notes": {
   "key1": "value3",
   "key2": "value2"
 }
}

Razorpay::Order.create(para_attr)
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
 "amount": 50000,
 "currency": "INR",
 "receipt": "receipt#1",
 "partial_payment": false,
 "notes": {
   "key1": "value3",
   "key2": "value2"
 }
})
```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
 "amount": 50000,
 "currency": "INR",
 "receipt": "some_receipt_id",
 "partial_payment": false,
 "notes": map[string]interface{}{
     "key1": "value1",
     "key2": "value2",
   },
}
body, err := client.Order.Create(data, nil)
```

```json: Success Response
{
 "id": "order_IluGWxBm9U8zJ8",
 "entity": "order",
 "amount": 5000,
 "amount_paid": 0,
 "amount_due": 5000,
 "currency": "INR",
 "receipt": "rcptid_11",
 "offer_id": null,
 "status": "created",
 "attempts": 0,
 "notes": [],
 "created_at": 1642662092
}
```json: Failure Response
{
 "error": {
   "code": "BAD_REQUEST_ERROR",
   "description": "Order amount less than minimum amount allowed",
   "source": "business",
   "step": "payment_initiation",
   "reason": "input_validation_failed",
   "metadata": {},
   "field": "amount"
 }
}
```

 
### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

 
> **WARN**
>
> 
>  **Watch Out!**
> 
>  As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>  

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be 3 characters.

 
> **INFO**
>
> 
> 
>  **Handy Tips**
> 
>  Razorpay has added support for zero decimal currencies, such as JPY and three decimal currencies, such as KWD, BHD and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>  

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
 - `true`: The customer can make partial payments.
 - `false` (default): The customer cannot make partial payments.

`first_payment_min_amount` _optional_
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of 7000 is to be received from the customer in two installments of #1 - 5000, #2 - 2000 then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).
   

 
### Response Parameters

    Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) parameters table.
   

 
### Error Response Parameters

    The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
   

### 1.3 Create a Payment

Once an order is created, your next step is to create a payment. The following API will create a payment with `fpx` as the payment method:

/payments/create/json

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "content-type: application/json" \
-d '{
   "amount": 200,
   "currency": "MYR",
   "order_id": "order_LSA6ny1sGKAp0C",
   "email": "nur.aisyah@example.com",
   "contact": "+60123456789",
   "method": "fpx",
   "bank": "MB2U",
   "callback_url": "https://merchant_callback_url.."
}'

```json: Response
{
   "razorpay_payment_id": "pay_LUtJxInEqa0oAA",
   "next": [
       {
           "action": "redirect",
           "url": "https://api.razorpay.com/v1/payments/LUtJxInEqa0oAA/authenticate"
       }
   ]
}
```

### Request Parameters

The payment request for each of the supported payment methods will slightly vary. Know more about the [relevant payment request fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md).

### Response Parameters

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

### 1.5 Integrate Payments Rainy Day Kit

Use Payments Rainy Day kit to overcome payments exceptions such as:
- [Late Authorisation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md)
- [Payment Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md)
- [Payment Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)

### 1.6 Fetch Payment Details and Verify Payment Status 

After receiving the `razorpay_payment_id` through the `callback_url`, use this endpoint to fetch the payment details:

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/pay_LUuOjDOkeb63gS \

```json: Response
{
   "id": "pay_LUuOjDOkeb63gS",
   "entity": "payment",
   "amount": 100,
   "currency": "MYR",
   "base_amount": 100,
   "status": "captured",
   "order_id": "order_LUuObyEK6ix6TZ",
   "invoice_id": null,
   "international": false,
   "method": "fpx",
   "amount_refunded": 0,
   "refund_status": null,
   "captured": true,
   "description": null,
   "card_id": null,
   "bank": "MB2U",
   "wallet": null,
   "vpa": null,
   "email": "nur.aisyah@example.com",
   "contact": "+6012345678",
   "notes": {
       "notes_key_1": "Nasi Lemak"
   },
   "fee": 0,
   "tax": 0,
   "error_code": null,
   "error_description": null,
   "error_source": null,
   "error_step": null,
   "error_reason": null,
   "acquirer_data": {},
   "created_at": 1679562035
}
```

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

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
