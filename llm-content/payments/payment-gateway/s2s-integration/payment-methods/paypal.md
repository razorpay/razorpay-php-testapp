---
title: PayPal
description: Integrate PayPal with Razorpay to accept International Payments.
---

# PayPal

PayPal is a payment method that you can integrate with Razorpay to accept payments in international currencies.

You can accept payments based on the transaction limit of your PayPal account. Know more about the other [payment methods and the transaction limits](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/transaction-limits.md).

### Advantages

Integrating PayPal as a payment method offers you the following advantages:

- **Better Success Rates**: Enjoy up to 20% higher success rates.
- **Faster Settlement time**: Get paid on a T+1 settlement schedule.
- **Wide user base**: Reach Over 30 million PayPal users around the world.
- **No additional charges**: PayPal defines the rates for transactions.

> **WARN**
>
> 
> **Watch Out!**
> 
> You can accept payments from the provided [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/paypal/supported-currencies.md).
> 

## Onboarding Process to Enable PayPal

Watch this video to see the onboarding process to enable PayPal on your checkout form.

[Video: https://www.youtube.com/embed/N5ZtN-_zye8?si=C0VWahb6kPT7Lk4s]

> **INFO**
>
> 
> **Handy Tips**
> 
> The PayPal section is visible only in the **Live** mode on the Dashboard.
> 

    
### To enable PayPal:

         1. Log in to the Dashboard.
         2. Navigate to **Account & Settings** → **International payments** (under Payment methods). Scroll to the **PayPal** section and click **Link Account**.
                
         4. Upon redirection to PayPal:
                - If you do not have a PayPal account, you need to complete the verification process and KYC. This will include confirming your email address by clicking on the link sent to you by PayPal.
                - If you already have a PayPal account, you need to authorise Razorpay to accept payments.

            You should now be able to see your PayPal enablement status set to `Pending` on your Razorpay Dashboard. PayPal will activate your account within 48 hours if all of the previous steps are successfully completed.

            You can now proceed with the integration. This depends on how you have integrated Razorpay on your website or application.

            By default, your PayPal account is configured to receive USD payments. You can enable more currencies on your account from your PayPal Dashboard.

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             - You should not use the same email ID for multiple MIDs.
>             - Each merchant should set up a separate PayPal account for each MID.
>             

        

## Integration Steps

If you are using Razorpay Server-to-Server integration, first you need to raise a request with our [Support team](https://razorpay.com/support/) to enable PayPal and complete the [onboarding procedure](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/paypal/#to-enable-paypal.md).

Follow the steps given below to integrate S2S JSON API and accept payments using PayPal.

**1.1** [Create an Order](#11-create-an-order)

**1.2** [Create a Payment](#12-create-a-payment)

**1.3** [Handle Payment Success and Error Events](#13-handle-payment-success-and-error-events)

**1.4** [Verify Payment Signature](#14-verify-payment-signature)

**1.5** [Integrate Payments Rainy Day Kit](#15-integrate-payments-rainy-day-kit)

**1.6** [Verify Payment Status](#16-verify-payment-status)

### 1.1 Create an Order

To process a payment, create a Razorpay Order to correspond with the order in your system. Send the order request parameters to the following endpoint:

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call.  Know how to [authenticate](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) Orders API.  
- The `order_id` received in the response should be passed to the checkout. This ties the order with the payment and secures the request from being tampered.

You can create an order:
- Using the sample code on the Razorpay Postman Public Workspace.
- By manually integrating the API sample codes on your server.

### Razorpay Postman Public Workspace

You can use the Postman workspace below to create an order:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-6f15a901-06ea-4224-b396-15cd94c6148d)

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Under the **Authorization** section in Postman, select **Basic Auth** and add the Key Id and secret as the Username and Password, respectively.
> 

You can create an order manually by integrating the API sample codes on your server.

### API Sample Code

Use this endpoint to create an order using the Orders API.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders 
-U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
  "amount": 50000,
  "currency": "",
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
orderRequest.put("currency","");
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
  "currency": "",
  "receipt": "receipt#1",
  "partial_payment": false,
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
})
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => '123', 'amount' => 50000, 'currency' => '', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 50000);
orderRequest.Add("currency", "");
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
  "currency": "",
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
  "currency": "",
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
  "currency": "",
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
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "",
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
: `integer` The transaction amount, expressed in the currency subunit. For example, for an actual amount of , the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. Refer to the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/paypal/supported-currencies.md). Length must be of 3 characters.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`first_payment_min_amount` _optional_
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of  is to be received from the customer in two installments of #1 - , #2 - , then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.
    

  
### Response Parameters

     Descriptions for the response parameters are present in the [Orders Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/entity.md) parameters table.
    

  
### Error Response Parameters

     The error response parameters are available in the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md).
    

## 1.2 Create a Payment

Once an order is created, your next step is to create a payment. The following API will create a payment with `wallet` as the payment method:

@include s2s-integration/json/paypal/create-payment

## 1.3 Handle Payment Success and Error Events

Once the payment is completed by the customer, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [Errors](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#errors.md) for details.

## 1.4 Verify Payment Signature

Signature verification is a mandatory step to ensure that Razorpay sends the callback. The `razorpay_signature` contained in the callback can be regenerated by your system and verified as follows.

Create a string to be hashed using the `razorpay_payment_id` contained in the callback and the Order ID generated in the first step, separated by a `|`. Hash this string using SHA256 and your API Secret.

```
generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

if (generated_signature == razorpay_signature) {
    payment is successful
}
```

### Generate Signature on your Server

@include s2s-integration/json/netbanking/generate-signature

## 1.5 Integrate Payments Rainy Day Kit

@include rainy-day/section

## 1.6 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)

@include payment-methods/paypal-settlements-refunds
