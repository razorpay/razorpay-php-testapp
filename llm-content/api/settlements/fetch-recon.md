---
title: Fetch Settlement Recon Details
description: Settlement Recon using Razorpay Settlements API.
---

# Fetch Settlement Recon Details

## Fetch Settlement Recon Details

Use this endpoint to return a list of all transactions such as payments, refunds, transfers and adjustments settled to your account on a particular day or month. In the example request and response, we are fetching the settlement report for a particular day, that is `11/06/2022`.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/settlements/recon/combined?year=2022&month=06&day=11 \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("year", 2022);
params.put("month", 6);
params.put("day",11);
            
List settlements = razorpay.settlement.reports(params);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.settlement.report({
  "year": 2022,
  "month": 06,
  "day": 11
})

```php: PHP
$api = new Api($key_id, $secret);

$api->settlement->settlementRecon(array('year' => 2022, 'month' => 06, 'day'=>11));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.settlements.settlementRecon({
  "year": 2022,
  "month": 06,
  "day": 11
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "year": 2022,
  "month": 6,
  "day":11
}
Razorpay::Settlement.reports(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
    "year": 2022,
    "month": 6,
}
body, err := client.Settlement.Reports(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary settlementRequest = new Dictionary();
settlementRequest.Add("year", "2022");
settlementRequest.Add("month", "6");
settlementRequest.Add("day", "11");

List settlement = client.Settlement.Reports(settlementRequest);
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 4,
  "items": [
    {
      "entity_id": "pay_DEXrnipqTmWVGE",
      "type": "payment",
      "debit": 0,
      "credit": 97100,
      "amount": 100000,
      "currency": "INR",
      "fee": 2900,
      "tax": 0,
      "on_hold": false,
      "settled": true,
      "created_at": 1567692556,
      "settled_at": 1568176960,
      "settlement_id": "setl_DGlQ1Rj8os78Ec",
      "posted_at": null,
      "credit_type": "default",
      "description": "Recurring Payment via Subscription",
      "notes": "Beam me up Scotty.",
      "payment_id": null,
      "settlement_utr": "1568176960vxp0rj",
      "order_id": "order_DEXrnRiR3SNDHA",
      "order_receipt": null,
      "method": "card",
      "card_network": "MasterCard",
      "card_issuer": "KARB",
      "card_type": "credit",
      "dispute_id": null
    },
    {
      "entity_id": "rfnd_DGRcGzZSLyEdg1",
      "type": "refund",
      "debit": 242500,
      "credit": 0,
      "amount": 242500,
      "currency": "INR",
      "fee": 0,
      "tax": 0,
      "on_hold": false,
      "settled": true,
      "created_at": 1568107224,
      "settled_at": 1568176960,
      "settlement_id": "setl_DGlQ1Rj8os78Ec",
      "posted_at": null,
      "credit_type": "default",
      "description": null,
      "notes": "Beam me up Scotty.",
      "payment_id": "pay_DEXq1pACSqFxtS",
      "settlement_utr": "1568176960vxp0rj",
      "order_id": "order_DEXpmZgffXNvuI",
      "order_receipt": null,
      "method": "card",
      "card_network": "MasterCard",
      "card_issuer": "KARB",
      "card_type": "credit",
      "dispute_id": null
    },
    {
      "entity_id": "trf_DEUoCEtdsJgvl7",
      "type": "transfer",
      "debit": 100296,
      "credit": 0,
      "amount": 100000,
      "currency": "INR",
      "fee": 296,
      "tax": 46,
      "on_hold": false,
      "settled": true,
      "created_at": 1567681786,
      "settled_at": 1568176960,
      "settlement_id": "setl_DGlQ1Rj8os78Ec",
      "posted_at": null,
      "credit_type": "default",
      "description": null,
      "notes": null,
      "payment_id": "pay_DEApNNTR6xmqJy",
      "settlement_utr": "1568176960vxp0rj",
      "order_id": null,
      "order_receipt": null,
      "method": null,
      "card_network": null,
      "card_issuer": null,
      "card_type": null,
      "dispute_id": null
    },
    {
      "entity_id": "adj_EhcHONhX4ChgNC",
      "type": "adjustment",
      "debit": 0,
      "credit": 1012,
      "amount": 1012,
      "currency": "INR",
      "fee": 0,
      "tax": 0,
      "on_hold": false,
      "settled": true,
      "created_at": 1567681786,
      "settled_at": 1568176960,
      "settlement_id": "setl_DGlQ1Rj8os78Ec",
      "posted_at": null,
      "description": "test reason",
      "notes": null,
      "payment_id": null,
      "settlement_utr": null,
      "order_id": null,
      "order_receipt": null,
      "method": null,
      "card_network": null,
      "card_issuer": null,
      "card_type": null,
      "dispute_id": null
    }
  ]
}
```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The month is not a valid month.",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "month"
    }
}
```

### Parameters

`year` _mandatory_
: `integer` The year the settlement was received in the `YYYY` format. For example, `2022`.

`month` _mandatory_
: `integer` The month the settlement was received in the `MM` format. For example, `06`.

`day` _optional_
: `integer` The date on which the settlement was received in the `DD` format. For example, `11`.

`count` _optional_
: `integer` Specifies the number of available settlements to be fetched. Possible values: `1` to `1000`.

`skip` _optional_
: `integer` Specifies the number of available settlements to be skipped when fetching a count.

### Parameters

`entity_id`
: `string` The unique identifier of the transaction that has been settled.

`type`
: `string` Indicates the type of transaction. Possible values:
  - `payment`
  - `refund`
  - `transfer`
  - `adjustment`

`debit`
: `integer` The amount, in currency subunits, that has been debited from your account.

`credit`
: `integer` The amount, in currency subunits, that has been credited to your account.

`amount`
: `integer` The total amount, in currency subunits, debited or credited from your account.

`currency`
: `string` The 3-letter ISO currency code for the transaction.

`fee`
: `integer` The fees, in currency subunits, charged to process the transaction.

`tax`
: `integer` The tax on the fee, in currency subunits, charged to process the transaction.

`on_hold`
: `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
  - `true`: The settlement for transfer is on hold.
  - `false`: The settlement for transfer is released.

`settled`
: `boolean` Indicates whether the transaction has been settled or not. Possible values:
  - `true`
  - `false`

`created_at`
: `integer` Unix timestamp at which the transaction was created.

`settled_at`
: `integer` Unix timestamp when the transaction was settled.

`settlement_id`
: `string` The unique identifier of the settlement transaction.

`description`
: `string` Brief description about the transaction.

`notes`
: `object` Notes for the transaction. For example, `Beam me up Scotty.`

`payment_id`
: `string` The unique identifier of the payment linked to `refund` or `transfer` that has been settled. For example, `pay_DEApNNTR6xmqJy`. It is `null` for `payments`.

`settlement_utr`
: `string` The unique reference number linked to the settlement. For example, `KKBKH14156891582`.

`order_id`
: `string` Order id linked to the payment made by the customer that has been settled. For example, `order_DEXrnRiR3SNDHA`.

`order_receipt`
: `string` Receipt number entered while [creating the Order](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/#create-an-order.md).

`method`
: `string` The payment method used to complete the payment. Possible values:
  
    - `card`

    - `netbanking`

    - `wallet`

    - `upi`

    - `emi`

  

`card_network`
: `string` The card network used to process the payment. Possible values:
  - `American Express`
  - `Diners Club`
  - `Maestro`
  - `MasterCard`
  - `RuPay`
  - `Visa`
  - `unknown`

`card_issuer`
: `string` This is a 4-character code denoting the issuing bank. For example, `KARB`.

  This attribute will not be set for international cards, that is, for cards issued by foreign banks.

`card_type`
: `string` The card type used to process the payment. Possible values:
  - `credit`
  - `debit`

`dispute_id`
: `string` The unique identifier of any dispute, if any, for this transaction.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

The year must be 4 digits.
* code: 400
* description: An invalid year is entered.
* solution: Ensure that the year has exactly 4 digits.

The month is not a valid month.
* code: 400
* description: An invalid month is entered.
* solution: Enter a valid month between `01` and `12`.

The day must be between 1 and 2 digits.
* code: 400
* description: An invalid day is entered.
* solution: Ensure that the day has only 1 or 2 digits. Possible values: `1` to `31`.

The count must be at least 1.
* code: 400
* description: The count passed is `0`.
* solution: Ensure that count is at least `1`.
