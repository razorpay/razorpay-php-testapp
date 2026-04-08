---
title: Customer Fee Bearer on Credit Card on UPI
description: Accept S2S UPI payments from your customers.
---

# Customer Fee Bearer on Credit Card on UPI

Customer Fee Bearer (CFB) on Credit Card on UPI is a payment feature that allows you to pass on processing fees to customers when they make UPI payments using their linked credit cards. This feature enables you to maintain your profit margins while offering customers the convenience of using credit cards through UPI for everyday transactions. When enabled, the checkout will:
- Automatically detect when a customer selects UPI as the payment method.
- Display fee breakdown transparently before payment, showing the convenience fee separately from the order amount.
- Process payment seamlessly after customer confirmation.

> **INFO**
>
> 
> **Feature Enablement**
> 
> This is an on-demand feature. Contact your account manager or raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature enabled.
> 

## Prerequisites

- This feature is available on the Axis Switch gateway only.
- Integrate with Server-to-Server (S2S) integration:
  - [S2S JSON V2 (Latest)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md)
  - [S2S JSON V1](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v1.md)
  - [S2S Redirect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect.md)
- This feature is **not** available on UPI Collect method (NPCI restriction).
- Certain business categories are restricted as per NPCI guidelines. The following MCC codes cannot accept credit card payments on UPI:

  
### Restricted MCC codes

     
     MCC Code | Category
     ---
     6012 | Lending, NBFC, Cooperatives, Pension Fund
     ---
     4829 | Wire Transfers and Money Orders
     ---
     7322 | Debt Collection Agencies
     ---
     6010 | Forex
     ---
     6011 | ATMs
     ---
     6051 | Cryptocurrency
     ---
     6211 | Mutual Fund, Securities, Commodities, Trading
     ---
     7800 | Lottery
     ---
     7802 | Horse or Dog Racing
     ---
     7995 | Lottery and Betting
     
    

## Integration Steps

Follow the integration steps given below:

### Step 1: Create an Order

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
   

### Step 2: Calculate Fees Using Calculate Fee API

Use this API to get the fee breakdown before displaying it to customers:

/payments/calculate/fees

  
```curl: Request
    curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X POST https://api.razorpay.com/v1/payments/calculate/fees \
    -H "Content-Type: application/json" \
    -d '{
      "amount": 100,
      "currency": "INR",
      "method": "upi",
      "upi": {
        "flow": "intent"
      },
      "contact": "9000090000",
      "email": "gaurav.kumar@example.com",
      "description": "testing payment create",
      "payer_account_type": "credit_card"
    }'
```json: Response
    {
      "input": {
        "amount": 336,
        "currency": "INR",
        "method": "upi",
        "upi": {
          "flow": "intent",
          "type": "default"
        },
        "contact": "9000090000",
        "email": "gaurav.kumar@example.com",
        "description": "testing payment create",
        "payer_account_type": "credit_card",
        "fee": 236,
        "tax": 36
      },
      "display": {
        "originalAmount": 1,
        "original_amount": 1,
        "fees": 2.36,
        "razorpay_fee": 2.00,
        "tax": 0.36,
        "amount": 3.36,
        "currency": "INR"
      }
    }
```
  
  
```curl: Request
    curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X POST https://api.razorpay.com/v1/payments/calculate/fees \
    -H "Content-Type: application/json" \
    -d '{
      "amount": 100,
      "currency": "INR",
      "method": "upi",
      "upi": {
        "flow": "intent"
      },
      "contact": "9000090000",
      "email": "gaurav.kumar@example.com",
      "description": "testing payment create"
    }'
```json: Response
    {
      "input": {
        "amount": 101,
        "currency": "INR",
        "method": "upi",
        "upi": {
          "flow": "intent",
          "type": "default"
        },
        "contact": "9000090000",
        "email": "gaurav.kumar@example.com",
        "description": "testing payment create",
        "fee": 1,
        "tax": 0
      },
      "display": {
        "originalAmount": 1,
        "original_amount": 1,
        "fees": 0.01,
        "razorpay_fee": 0.01,
        "tax": 0,
        "amount": 1.01,
        "currency": "INR"
      }
    }
```
  

  
### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. Length must be of 3 characters.

`method` _mandatory_
: `string` Payment method used to make the payment. In this case, it is `upi`.

`contact` _mandatory_
: `string` Customer's phone number.

`email` _mandatory_
: `string` Customer's email address.

`description` _optional_
: `string` A brief description of the payment.

`payer_account_type` _mandatory_ 
: `string` (**CFB Credit Card on UPI only**) Indicates the type of account from which the payment is made. Pass `credit_card` to calculate fees for credit card payments made via UPI.

`upi` _mandatory_
: `object` Additional fields to accept UPI payments.

  `flow` _mandatory_
  : `string` The UPI flow for the payment. In this case, it is `intent`.
    

  
### Response Parameters

`input`
: `object` Contains the processed input parameters along with calculated fees.

  `amount`
  : `integer` Total amount including fees in the smallest currency unit. For example, `101` for ₹1.01.

  `currency`
  : `string` The currency in which the transaction is made. Length must be of 3 characters.

  `method`
  : `string` Payment method used to make the payment. In this case, it is `upi`.

  `fee`
  : `integer` Total fee amount in the smallest currency unit. For example, `1` for ₹0.01 fee on regular UPI or `236` for ₹2.36 fee on credit card on UPI.

  `tax`
  : `integer` Tax amount on the fees in the smallest currency unit. For example, `0` for regular UPI or `36` for ₹0.36 tax on credit card on UPI.

  `payer_account_type` 
  : `string` (**CFB Credit Card on UPI only**) Account type used for payment. Returns `credit_card` when present in request.

  `upi`
  : `object` UPI payment details.

    `flow`
    : `string` The UPI flow type. In this case, it is `intent`.

    `type`
    : `string` UPI type. In this case, it is `default`.

`display`
: `object` Contains fee breakdown for display purposes in rupees.

  `originalAmount`
  : `integer` Original order amount in rupees. For example, `1` for ₹1.

  `original_amount`
  : `integer` Original order amount in rupees (alternative field). For example, `1` for ₹1.

  `fees`
  : `decimal` Total fees amount in rupees. For example, `0.01` for regular UPI or `2.36` for credit card on UPI.

  `razorpay_fee`
  : `decimal` Razorpay processing fee in rupees. For example, `0.01` for regular UPI or `2.00` for credit card on UPI.

  `tax`
  : `decimal` Tax amount on fees in rupees. For example, `0` for regular UPI or `0.36` for credit card on UPI.

  `amount`
  : `decimal` Total amount including fees in rupees. For example, `1.01` for regular UPI or `3.36` for credit card on UPI.

  `currency`
  : `string` The currency in which the transaction is made. Length must be of 3 characters.
    

### Step 3: Display Fee Breakdown to Customer

Use the Calculate Fee API response to show customers:
- Original order amount
- Processing fee (convenience fee)
- Total amount to be charged

The fee breakdown must be displayed transparently before the customer confirms payment.

### Step 4: Process Payment

Create the payment using the standard payment creation endpoint. The implementation varies based on your CFB configuration:

- **Full CFB (Charge customer fee on all UPI payments)**
  - Pass `amount` including UPI base fees. 
  - Pass `fee` parameter with the fee amount.
- **Partial CFB (Charge fees only for Credit Card on UPI)**
  - Pass original `amount` as is.
  - Pass `fee` parameter with the fee amount.

Below is the sample code for partial CFB (credit card on UPI only):

/payments/create/json

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "contact": "9000090000",
  "email": "gaurav.kumar@example.com",
  "description": "testing payment create",
  "order_id": "order_QvjHcQ48WcXXXX",
  "method": "upi",
  "fee": 1,
  "upi": {
    "flow": "intent"
  },
  "notes": {
    "prod": "test"
  }
}'
```json: Response
{
  "link": "upi://pay?am=1.00&cu=INR&mc=5262&mode=04&pa=test.rzp@rxaxis&pn=Test&split=CCONFEE:0.01&tid=ABRT36c10fe7aa7411f1bcd0b1f2916a821&tn=testingpaymentcreate&tr=RU1AJqAF1W29N1",
  "razorpay_payment_id": "pay_RU1AJqAF1WXXXX"
}
```

  
### Request Parameters

`amount` _mandatory_
: `integer` Amount to be paid by the customer in the smallest currency unit. For **Full CFB**, include the UPI base fees in this amount. For **Partial CFB**, pass the original order amount. For example, for an actual amount of ₹1, pass `100`.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Length must be of 3 characters.

`contact` _mandatory_
: `string` Customer's phone number.

`email` _mandatory_
: `string` Customer's email address.

`description` _optional_
: `string` A brief description of the payment.

`method` _mandatory_
: `string` Payment method used to make the payment. In this case, it is `upi`.

`fee` _mandatory_ 
: `integer` (**CFB feature only**) The fee amount obtained from the calculate fee API response in the smallest currency unit. For example, `1` for ₹0.01 fee on regular UPI or `236` for ₹2.36 fee on credit card on UPI.

`order_id` _mandatory_
: `string` Unique identifier of the order created using the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).

`upi` _mandatory_
: `object` Additional fields to accept UPI payments.

  `flow` _mandatory_
  : `string` The UPI flow for the payment. In this case, it is `intent`.

`notes` _optional_
: `json object` A key-value pair that can hold additional information about the payment. Maximum 15 key-value pairs, 256 characters (maximum) each. 
    

  
### Response Parameters

`razorpay_payment_id`
: `string` Unique identifier for the payment. For example, `pay_RU1AJqAF1WXXXX`.

`link`
: `string` UPI deep link for payment processing. For CFB transactions, the link contains the payment amount and fee breakdown with `split=CCONFEE:` parameter.
    

## Webhook Response

Once the payment is successfully processed, you will receive a payment captured webhook with the following structure:
```json: Payload
{
  "event": {
    "name": "payment_captured",
    "data": {
      "payment": {
        "id": "RFGWLM9pHQXXXX",
        "created_at": 1757369021,
        "authorized_at": 1757369048,
        "status": 2,
        "amount": 101,
        "currency": "INR",
        "method": "upi",
        "gateway": "upi_rzpaxis",
        "description": "testing payment create",
        "fee_data": {
          "fee_bearer": 1,
          "fee": 1
        },
        "settled_by": "Razorpay",
        "base_amount": 101
      },
      "payment_method_details": {
        "upi": {
          "flow": "intent",
          "vpa": "gaurav.kumar@exampleupi",
          "payer_account_type": "credit_card"
        }
      }
    }
  }
}
```

## Settlements

You will receive the payments in your bank account as per the settlement cycle agreed upon at the time of Razorpay account setup. The settlement breakdown includes:
- **Order Amount**: Original transaction amount.
- **Debit**: Total amount debited from customer.
- **Fees**: Processing fees.
- **Tax**: Applicable taxes.
- **CFB**: When enabled, `Order amount + fees = debit amount`.

Refer to the [Settlement APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/apis.md).

## Frequently Asked Questions (FAQs)

  
### 1. How much convenience fee will customers pay?

     The convenience fee varies based on the payment method selected. Use the [Calculate Fee API](#step-2-calculate-fees-using-calculate-fee-api) to get the exact fee amount, which customers will see in the checkout fee breakdown before confirming their payment.
    

  
### 2. Can I control which customers see this fee?

     The fee is automatically applied when customers select UPI as the payment method and use a linked credit card. The system detects this automatically during the payment flow using the `payer_account_type` parameter.
    

  
### 3. Does this work with all UPI apps?

     This feature works with UPI apps that support credit card linking, subject to the individual app's capabilities and the customer's credit card issuer support.
