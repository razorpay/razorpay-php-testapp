---
title: Fetch Instant Settlement With ID
description: Fetch Instant Settlement with ID using Razorpay Payments API.
---

# Fetch Instant Settlement With ID

## Fetch Instant Settlement With ID

Use this endpoint to retrieve the details of a particular Instant Settlement.

### Request

```cURL: Curl
curl -u :\
- X GET \
https://api.razorpay.com/v1/settlements/ondemand/setlod_FNj7g2YS5J67Rz

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String settlementId = "setlod_FNj7g2YS5J67Rz";

Settlement settlement = razorpay.settlement.fetchDemandSettlement(settlementId);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.settlement.fetch_ondemand_settlement_id(settlementId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

settlementId = "setlod_FNj7g2YS5J67Rz"

para_attr = {
  "expand[]": "ondemand_payouts"
}

Razorpay::Settlement.fetch_ondemand_settlement_by_id(settlementId, para_attr);

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Settlement.FetchOnDemandSettlementById("", nil, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->settlement->fetch($settlementId)->fetchOndemandSettlementById();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.settlements.fetchOndemandSettlementById(settlementId);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string settlementId = "setl_Z6t7VFTb9xXXXX";

Settlement settlement = client.Settlement.FetchDemandSettlement(settlementId);
```

### Response

```json: Success
{
  "id": "setlod_FNj7g2YS5J67Rz",
  "entity": "settlement.ondemand",
  "amount_requested": 200000,
  "amount_settled": 199410,
  "amount_pending": 0,
  "amount_reversed": 0,
  "fees": 590,
  "tax": 90,
  "currency": "INR",
  "settle_full_balance": false,
  "status": "processed",
  "description": "Need this to make vendor payments.",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey, decaf."
  },
  "created_at": 1596771429
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The id provided does not exist",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {}
    }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier for the instant settlement transaction. For example, `setlod_FNj7g2YS5J67Rz`.

### Parameters

`id`
: `string` The unique identifier of the instant settlement transaction. For example, `setlod_FNj7g2YS5J67Rz`.

`entity`
: `string` Indicates the type of entity. Here it is `settlement.ondemand`.

`amount_requested`
: `integer` The settlement amount, in paise, requested by you. For example, `200000`.

`amount_settled`
: `integer` Total amount (minus fees and tax), in paise, settled to the bank account. For example, `199410`.

`amount_pending`
: `integer` Portion of the requested amount, in paise, yet to be settled to you.

`amount_reversed`
: `integer` Portion of the requested amount, in paise, that was not settled to you. This amount is reversed to your PG current balance.

`fees`
: `integer` Total amount (fees+tax), in paise, deducted for the instant settlement. For example, `590`.

`tax`
: `integer` Total tax, in paise, charged for the fee component. For example, `90`.

`currency`
: `string` The 3-letter ISO currency code for the settlement. Here it is `INR`.

`settle_full_balance`
: `boolean` Possible values:
  - `true`:  Razorpay will settle the maximum amount possible. Values passed in the `amount` parameter are ignored.
  - `false` (default): Razorpay will settle the amount requested in the `amount` parameter.

`status`
: `string` Indicates the state of the instant settlement. Possible values:
  - `created`: The instant settlement request has been created.
  - `initiated`: The instant settlement process has been initiated.
  - `partially_processed`: The instant settlement is being processed.
  - `processed`: The instant settlement has been processed and the amount has been transferred to your bank account.
  - `reversed`: The instant settlement could not be processed for some reason and the amount has been transferred back to your PG balance.

`description`
: `string` This is a custom note you can pass for the instant settlement for your reference. For example, `Need this to make vendor payments.`.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Unix timestamp at which the instant settlement was created. For example, `1596771429`.

`ondemand_payouts`
: `object` List of payouts created for the instant settlement.

  `entity`
  : `string` Indicates the type of `ondemand_payouts` entity. Here it is `collection`.

  `count`
  : `integer` The number of items in the array. For example, `1`.

  `items`
  : `array` List of payouts created for the instant settlement.

    `id`
    : `string` The unique identifier for the payout. For example, `setlodp_FNj7g2cbvw8ueO`.

    `entity`
    : `string` Indicates the type of `items` entity. Here it is `settlement.ondemand_payout`.

    `initiated_at`
    : `integer` Unix timestamp at which the payout was initiated. For example, `1596771430`.

    `processed_at`
    : `integer` Unix timestamp at which the payout was processed. For example, `1596778752`.

    `reversed_at`
    : `integer` Unix timestamp at which the payout was reversed. For example, `1596778752`.

    `amount`
    : `integer` The amount, in paise, settled through this payout. For example, `200000`.

    `amount_settled`
    : `integer` Amount (minus fees and tax), in paise, settled through this payout. For example, `199410`.

    `fees`
    : `integer` Amount (fees+tax), in paise, deducted for this payout. For example, `590`.

    `tax`
    : `integer` Tax charged, in paise, for the fee component. For example, `90`.

    `utr`
    : `string` The unique transaction number linked to a payout.

    `status`
    : `string` Status of the payout. Possible values:
      - `created`: The payout has been created.
      - `initiated`: The payout has been initiated.
      - `processed`: The payout has been processed. The amount has been transferred to your bank account.
      - `reversed`: The payout has been reversed. The amount has been transferred back to your PG balance.

    `created_at`
    : `integer` Unix timestamp at which the payout was created.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

The id provided does not exist
* code: 400
* description: The settlement id does not belong to the requestor or does not exist.
* solution: Use a valid settlement id that belongs to the requestor.
