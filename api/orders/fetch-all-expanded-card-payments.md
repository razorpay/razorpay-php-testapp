---
title: Fetch All Orders (With Expand Card Payments)
description: Expand card object when fetching payents for Orders using Razorpay Orders API.
---

# Fetch All Orders (With Expand Card Payments)

## Fetch All Orders (With Expanded Card Payments)

Use this endpoint to retrieve the details of all the orders that you created, with the card parameter expanded in the payments object.

### Request

```Curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/orders?expand[]=payments.card

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("expand[]","payments.card");

List order = instance.orders.fetchAll(params);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))
client.order.all({
  "expand[]":  "payments.card"
})

```php: PHP
$api = new Api($key_id, $secret);
$api->order->all(array("expand[]" => "payments.card"));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

option = {"expand[]": "payments.card"}

Razorpay::Order.all(option)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.all({
  "expand[]":  "payments.card"
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

options := map[string]interface{}{
  "expand[]":  "payments.card",
}
body, err := client.Order.All(options, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("expand[]","payments.card");

List order = client.Order.All(orderRequest);

```

### Response

```json: Success
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "order_MjehF7I6RXSm2o",
      "entity": "order",
      "amount": 500,
      "amount_paid": 500,
      "amount_due": 0,
      "currency": "",
      "receipt": null,
      "payments": {
        "entity": "collection",
        "count": 1,
        "items": [
          {
            "id": "pay_MjehkbJc3pPERF",
            "entity": "payment",
            "amount": 500,
            "currency": "",
            "status": "captured",
            "order_id": "order_MjehF7I6RXSm2o",
            "invoice_id": null,
            "international": false,
            "method": "card",
            "amount_refunded": 0,
            "refund_status": null,
            "captured": true,
            "description": null,
            "card_id": "card_MjehkeMkNIzhOb",
            "card": {
              "id": "card_MjehkeMkNIzhOb",
              "entity": "card",
              "name": "",
              "last4": "0153",
              "network": "Visa",
              "type": "debit",
              "issuer": null,
              "international": false,
              "emi": false,
              "sub_type": "consumer",
              "token_iin": null
            },
            "bank": null,
            "wallet": null,
            "vpa": null,
            "email": "gaurav.kumar@example.com",
            "contact": "+919876543210",
            "notes": [],
            "fee": 10,
            "tax": 0,
            "error_code": null,
            "error_description": null,
            "error_source": null,
            "error_step": null,
            "error_reason": null,
            "acquirer_data": {
              "auth_code": "486881"
            },
            "created_at": 1696318958
          }
        ]
      },
      "offer_id": null,
      "status": "paid",
      "attempts": 1,
      "notes": [],
      "created_at": 1696318929
    }
  ]
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The api key provided is invalid",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
    }
}
```

### Parameters

`expand[]=payments.card` _optional_
: `string` Use to expand the card payments made for an order.

### Parameters

`id`
: `string` The unique identifier of the order.

`entity`
: `string` Name of the entity. Here, it is `order`.

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`status`
: `string` The status of the order. Possible values:
   - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
   - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
   - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.

`payments`
: `object` Details of the payment.

    `id`
    : `string` Unique identifier of the payment.

    `entity`
    : `string` Indicates the type of entity.

    `amount`
    : `integer` The payment amount in currency subunits. For example, for an amount of  enter 100.

    `currency`
    : `string` The currency in which the payment is made.

    `status`
    : `string` The status of the payment. Possible values:
      - `created`
      - `authorized`
      - `captured`
      - `refunded`
      - `failed`

    

    `method`
    : `string` The payment method used for making the payment. Possible values:- `card`
- `netbanking`
- `wallet`
- `upi`
- `emi`

    

    

    

    
    

    `order_id`
    : `string` Order id, if provided. Know more about [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders.md).

    `description`
    : `string` Description of the payment, if any.

    `international`
    : `boolean` Indicates whether the payment is done via an international card or a domestic one. Possible values:
        - `true`: Payment made using international card.
        - `false`: Payment not made using international card.

    `refund_status`
    : `string` The refund status of the payment. Possible values:
       - `null`
       - `partial` 
       - `full`

    `amount_refunded`
    : `integer` The amount refunded in currency subunits. For example, if `amount_refunded = 100`, it is equal to .

    `captured`
    : `boolean` Indicates if the payment is captured.

    `email`
    : `string` Customer email address used for the payment.

    `contact`
    : `string` Customer contact number used for the payment.

    `fee`
    : `integer` Fee (including tax) charged by us.

    `tax`
    : `integer` Tax charged for the payment.

    `error_code`
    : `string` Error that occurred during payment. For example, `BAD_REQUEST_ERROR`.

    `error_description`
    : `string` Description of the error that occurred during payment. For example, `Payment processing failed because of incorrect OTP`.

    `error_source`
    : `string` The point of failure. For example, `customer`.

    `error_step`
    : `string` The stage where the transaction failure occurred. The stages can vary depending on the payment method used to complete the transaction. For example, `payment_authentication`.

    `error_reason`
    : `string` The exact error reason. For example, `incorrect_otp`.

    `notes`
    : `json object` Contains user-defined fields, stored for reference purposes.

    `created_at`
    : `integer` Timestamp, in UNIX format, on which the payment was created.

    `card_id`
    : `string` The unique identifier of the card used by the customer to make the payment.

    

    `wallet`
    : `string` The name of the wallet used by the customer to make the payment. For example, `payzapp`.

     

     

    `acquirer_data`
    : `array` A dynamic array consisting of a unique reference numbers. 

        `rrn`
        : `string` A unique bank reference number provided by the banking partner when a refund is processed. This reference number can be used by the customer to track the status of the refund with the bank.

        

        `authentication_reference_number`
        : `string` A unique reference number generated for RuPay card payments.
        
        `bank_transaction_id`
        : `string` A unique reference number provided by the banking partner in case of netbanking payments.

         

        

    

    `bank`
    : `string` The 4-character bank code which the customer's account is associated with. For example, `UTIB` for HSBC Bank.

    

    

    
    
     

    `upi`
    : `object` Details of the UPI payment received. Applicable if `method` is `upi`.

        `payer_account_type`
        : `string` The payment method used for making the payment. Possible values:
            - `bank_account`
            - `credit_card`
            - `wallet`

        `vpa`
        : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

    `vpa`
    : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.
    
    

    

    `card`
    : `object` Details of the card used to make the payment.

        `id`
        : `string` The unique identifier of the card used by the customer to make the payment.

        `entity`
        : `string` The name of the entity. Here, it is `card`.

        `name`
        : `string` Name of the cardholder.

        `last4`
        : `integer` The last 4 digits of the card number. 
      

        `network`
        : `string` The card network. Possible values:- `MasterCard`
- `Visa`
- `RuPay`
- `American Express`
- `Diners Club`
- `Maestro`
- `Unknown`

      `type`
      : `string` The card type. Possible values:
         - `credit`
         - `debit`
         - `prepaid`
         - `unknown`

      `issuer`
      : `string` The card issuer. The 4-character code denotes the issuing bank. This attribute will not be set for the card issued by a foreign bank.

      `emi`
      : `boolean` Determines if card can be used for EMI payments. `true` if EMI payments are supported on card. `false` if EMI payments are not supported on card.

      `sub_type`
      : `string` The sub-type of the customer's card. Possible values:
         - `customer` 
         - `business`
           
           

           Know how to accept payments made by customers using [corporate cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/corporate-cards.md).

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
