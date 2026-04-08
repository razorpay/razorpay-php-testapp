---
title: ACH Direct Debit
description: Steps to integrate S2S JSON API and accept payments using ACH Direct Debit.
---

# ACH Direct Debit

ACH (Automated Clearing House) is an electronic network that processes bank-to-bank payments in batches. ACH Direct Debit enables you to withdraw funds directly from a customer's US bank account using their account and routing numbers, with transactions settling within 3-5 business days.

## Integration Steps

Follow the steps below to integrate Razorpay S2S JSON API and accept payments using ACH.

**1.1** [Create an Order](#11-create-an-order)

**1.2** [Create a Payment](#12-create-a-payment)

**1.3** [Handle Payment Success and Error Events](#13-handle-payment-success-and-error-events)

**1.4** [Integrate Payments Rainy Day Kit](#14-integrate-payments-rainy-day-kit)

**1.5** [Fetch Payment Details and Verify Payment Status](#15-fetch-payment-details-and-verify-payment-status)

### 1.1 Create an Order

To process a payment, create a Razorpay Order to correspond with the order in your system. Send the order request parameters to the following endpoint:

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

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-6f15a901-06ea-4224-b396-15cd94c6148d)

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
   

### 1.2 Create a Payment

Once an order is created, your next step is to create a payment. The following API will create a payment with `ach` as the payment method:

/payments/create/json

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "",
  "order_id": "order_GAWN9beXgaqRyO",
  "email": "",
  "contact": "",
  "method": "ach",
  "bank_account": {
    "account_number": "000000001234",
    "name": "",
    "bank_code": "122105278",
    "bank_code_category": "routing_number",
    "account_type": "personal_savings"
  },
  "billing_address": {
    "line1": "Block",
    "line2": "Street",
    "city": "San Jose",
    "state": "California",
    "postal_code": "33154"
  }
}'
```
```json: Success Response
{
   "razorpay_payment_id": "pay_29QQoUBi66xm2f",
   "razorpay_order_id": "order_GAWN9beXgaqRyO",
   "razorpay_signature": "9ef4dffbfd84f1318f6ae648f114332d8401e0949a3d"
}
```json: Failure - Account Number
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "You entered an account number which is invalid or not found please try again",
    "source": "customer",
    "step": "validation",
    "reason": "invalid_account_number"
  }
}
```json: Failure - Bank Code
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "You entered a bank code which is invalid or not found please try again",
    "source": "customer",
    "step": "validation",
    "reason": "invalid_bank_code"
  }
}
```json: Failure - Account Type
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "You entered an account type which is invalid please try again",
    "source": "customer",
    "step": "validation",
    "reason": "invalid_account_type"
  }
}
```

    
### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `USD`.

`order_id` _mandatory_
: `string` Unique identifier of the Order.
 Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters. 

`contact` _mandatory_
: `string`  Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code. 

`method` _mandatory_
: `string` Name of the payment method. Here it is `ach`.

`bank_account` _mandatory_
: `object` Bank account details.

    `account_number` _mandatory_
    : `string` Customer's bank account number.
    
    `name` _mandatory_
    : `string` Account holder's name as per bank records.
    
    `bank_code` _mandatory_
    : `string` The ACH routing number of the bank account.
    
    `bank_code_category` _mandatory_
    : `string` The category of bank code. Must be `routing_number` for ACH payments.
    
    `account_type` _mandatory_
    : `string` Type of bank account. Possible values:
      - `personal_savings`: Individual savings account.
      - `personal_checking`: Individual current account.
      - `business_savings`: Business savings account.
      - `business_checking`: Business current account.

`billing_address` _optional_
: `json object` This will have details about the billing address of the customer/user.

  `line1` _optional_
  : `string` Address Line 1 of the address.

  `line2` _optional_
  : `string` Address Line 2 of the address.

  `city` _optional_
  : `string` City of the address. For example, `San Jose`.

  `state` _optional_
  : `string` Name of the state. For example, `California`.

  `postal_code` _optional_
  : `string` Postal code of the state. For example, `33514`.

The payment request for each of the supported payment methods will slightly vary. Know more about the [relevant payment request fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md).
        

    
### Response Parameters

If the payment request is valid, the response contains the following fields:

`razorpay_order_id`
: `string` Order ID returned by Razorpay Orders API.

`razorpay_payment_id`
: `string` Returned by Razorpay API *only* for successful payments.

`razorpay_signature`
: `string` A hexadecimal string used for verifying the payment.
        

    
### Error Response Parameters

Error | Cause | Solution
---
The API `` provided is invalid. | The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.
 | The API keys must be active and entered correctly with no whitespace before or after the keys.
---
The amount must be at least USD 1.00. | The amount specified is less than the minimum amount. Currency subunits, such as cents (in the case of USD), should always be greater than or equal to 100. | Enter an amount equal to or greater than the minimum amount, that is 100 (representing $1.00).
---
You entered an account number which is invalid or not found please try again. | The bank account number provided is invalid, does not exist or does not match the format expected by the bank. | - Verify that the account number is entered correctly without any spaces or special characters.
- Confirm the account number with the customer or check their bank statement.
- Ensure the account is active and not closed.

---
You entered a bank code which is invalid or not found please try again. | The routing number (bank code) provided is invalid or does not exist in the ACH network. | - Verify that the routing number is exactly 9 digits.
- Ensure the routing number passes checksum validation using the formula: ((3 × d1 + 7 × d2 + 1 × d3) + (3 × d4 + 7 × d5 + 1 × d6) + (3 × d7 + 7 × d8 + 1 × d9)) % 10 == 0
- Confirm the routing number with the customer or check their cheque or bank statement.

---
You entered an account type which is invalid please try again. | The account type provided does not match the accepted values for ACH transactions. | - Ensure the account type is one of the following valid values: `personal_savings`, `personal_checking`, `business_savings` or `business_checking`.
- Verify that the account type matches the customer's actual bank account type.

        

#### ACH Payment States

ACH payments progress through the following states:

- **Created**: Payment request has been initiated.
- **Authorised**: Payment has been accepted by Razorpay and submitted to the ACH network.
- **Captured**: Funds have been confirmed and will be settled to your account.
- **Failed**: Payment was rejected due to invalid account details, insufficient funds or other errors.

> **INFO**
>
> 
> **Payment Processing Timeline**
> 
> Unlike card payments, ACH transactions are not processed in real-time. After successful payment creation:
> - The payment status moves to `authorised` within seconds.
> - However, actual bank authorisation takes 1-4 business days.
> - Settlement occurs on T+5 (5 business days after transaction).
> - Most returns occur within the first 5 days if there are account issues.
> 
> ![ACH Settlement flow diagram](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ach-settlement-flow.jpg.md)
> 

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
  "id": "pay_Ja8Pcd1Q2w3X4Y",
  "entity": "payment",
  "amount": 50000,
  "currency": "",
  "status": "captured",
  "order_id": "order_Ja8Pbcd2Ef3GhI",
  "invoice_id": null,
  "international": false,
  "method": "ach",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": "Test ACH payment",
  "card_id": null,
  "bank": "JP Morgan and Chase",
  "wallet": null,
  "vpa": null,
  "email": "",
  "contact": "",
  "notes": {
    "merchant_order_id": "M-12345",
    "source": "pg-router"
  },
  "fee": 2950,
  "tax": 450,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "bank_transaction_id": "123456789012"
  },
  "bank_account": {
    "name": "",
    "last_4": "xxxxxxx1234",
    "bank_code": "122105278",
    "bank_code_category": "routing_number",
    "bank_name": "JP Morgan and Chase",
    "account_type": "business_checking"
  },
  "created_at": 1712123456
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
        ![](/docs/assets/images/testpayment.jpg)
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
