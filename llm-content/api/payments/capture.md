---
title: Capture a Payment
description: Create a Payment using Razorpay Payments API.
---

# Capture a Payment

## Capture a Payment

Use this endpoint to change the payment status from `authorized` to `captured`. Attempting to capture a payment whose status is not `authorized` will produce an error.
- After the customer's bank authorises the payment, you must verify if the authorised amount deducted from the customer's account is the same as the amount paid by the customer on your website or app.
- You can [configure automatic capture](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings/#auto-capture-all-payments.md) of payments on the Dashboard.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json' \
-X POST https://api.razorpay.com/v1/payments/pay_29QQoUBi66xm2f/capture \
-d '{
  "amount": 1000,
  "currency": "INR"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_29QQoUBi66xm2f";

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 1000);
paymentRequest.put("currency", "INR");
        
Payment payment = razorpay.payments.capture(paymentId, paymentRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.capture(paymentId,{
  "amount" : 1000,
  "currency" : "INR"
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

paymentId := "pay_29QQoUBi66xm2f"
amount := 1000

data := map[string]interface{}{
  "currency": "INR",
}

body, err := client.Payment.Capture(paymentId, amount, data, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId)->capture(array('amount'=>$amount,'currency' => 'INR'));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymentId = "pay_29QQoUBi66xm2f"

para_attr = {
    "amount": 1000,
    "currency" : "INR"
}
Razorpay::Payment.capture(paymentId, para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.capture(pay_29QQoUBi66xm2f, 1000, INR)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
Payment payment = client.Payment.Fetch(paymentId);

Dictionary options = new Dictionary();
options.Add("amount", "");
options.Add ("currency", "");
Payment paymentCaptured = payment.Capture(options);
```

### Response

```json: Success
{
  "id": "pay_G3P9vcIhRs3NV4",
  "entity": "payment",
  "amount": 1000,
  "currency": "INR",
  "status": "captured",
  "order_id": "order_GjCr5oKh4AVC51",
  "invoice_id": null,
  "international": false,
  "method": "card",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": "Payment for Adidas shoes",
  "card_id": "card_KOdY30ajbuyOYN",
  "bank": null,
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "customer_id": "cust_K6fNE0WJZWGqtN",
  "token_id": "token_KOdY$DBYQOv08n",
  "notes": [],
  "fee": 1,
  "tax": 0,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "authentication_reference_number": "100222021120200000000742753928"
  },
  "created_at": 1605871409,
  "provider": null,
  "upi": {
      "payer_account_type": "credit_card",
      "vpa": "gaurav.kumar@examplebank",
      "flow": "intent"
  },
  "reward": null
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The amount must be an integer.",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "amount"
    }
}
```

### Parameters

`id` _mandatory_
: `string` Unique identifier of the payment to be captured.

### Parameters

`amount` _mandatory_
: `integer` The amount to be captured (should be equal to  the order amount, in the smallest unit of the currency). While creating a capture request, in the `amount` field, enter only the amount associated with the order that is stored in your database.

  

`currency` _mandatory_
: `string` ISO code of the currency in which the payment was made. Refer to the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

### Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity.

`amount`
: `integer` The payment amount in currency subunits. For example, for an amount of  enter 100.

`currency`
: `string` The currency in which the payment is made. Refer to the list of [international currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md) that we support.

`status`
: `string` The status of the payment. Possible values:
  - `created`
  - `authorized`
  - `captured`
  - `refunded`
  - `failed`

`method`
: `string` The payment method used for making the payment. Possible values:
  - `card`
  - `netbanking`
  - `wallet`
  - `emi`
  - `upi`

`order_id`
: `string` Order id, if provided. Know more about [Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/orders.md).

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
: `boolean` Indicates if the payment is captured. Possible values:
    - `true`: Payment has been captured.
    - `false`: Payment has not been captured.

`email`
: `string` Customer email address used for the payment.

`contact`
: `string` Customer contact number used for the payment.

`fee`
: `integer` Fee (including GST) charged by Razorpay.

`tax`
: `integer` GST charged for the payment.

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
  : `string` The card network. Possible values:
    - `American Express`
    - `Diners Club`
    - `Maestro`
    - `MasterCard`
    - `RuPay`
    - `Unknown`
    - `Visa`

  `type`
  : `string` The card type. Possible values:
    - `credit`
    - `debit`
    - `prepaid`
    - `unknown`

  `issuer`
  : `string` The card issuer. The 4-character code denotes the issuing bank. This attribute will not be set for the card issued by a foreign bank.

  `emi`
  : `boolean` Indicates whether the card can be used for EMI payment method. Possible values:
    - `true`: Card can be used for EMI payments.
    - `false`: Card cannot be used for EMI payments.

  `sub_type`
  : `string` The sub-type of the customer's card. Possible values:
    - `customer` 
    - `business`

    
    Know how to accept payments made by customers using [corporate cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/corporate-cards.md).

`upi`
: `object` Details of the UPI payment received. Only applicable if `method` is `upi`.

  `payer_account_type`
  : `string` The payment method used for making the payment. Possible values:
    - `bank_account`
    - `credit_card`
    - `wallet`
    - `credit_line`

  `vpa`
  : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

  `flow` 
  : `string` The type of UPI flow. Possible values:
    - `intent`: When a UPI app is selected and user is redirected to it.
    - `collect`: The user enters their UPI ID and receives a notification from the UPI app. They open the app and complete the payment.
    - `in_app` In case of Turbo UPI Payments.

`bank`
: `string` The 4-character bank code which the customer's account is associated with. For example, `UTIB` for Axis Bank.

`vpa`
: `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

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

  

### Errors

The API `` provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

Capture amount must be equal to the amount authorized.
* code: 400
* description: - The capture amount is incorrect.
- The amount you are trying to capture differs from the authorised amount .

* solution: - Enter the correct capture amount.
- Ensure that the amount to be captured is equal to the authorised amount.

Your payment has been declined as the order is already paid. Please initiate the payment with a new order.
* code: 400
* description: This payment has already been captured.
* solution: Ensure that the payment is in the `authorized` state to capture it successfully.

The id provided does not exist
* code: 400
* description: The `payment_id` provided is incorrect.
* solution: Enter the correct `payment_id`.

The requested URL was not found on the server.
* code: 400
* description: The URL is incorrect.
* solution: Use the correct URL.

The amount must be an integer
* code: 400
* description: The amount specified is incorrect.
* solution: Enter the correct amount without any decimal points.
