---
title: Fetch All Instant Settlements With Payout Details
description: Fetch All Instant Settlements with Payout Details using Razorpay Payments API.
---

# Fetch All Instant Settlements With Payout Details

## Fetch All Instant Settlements With Payout Details

Use this endpoint to retrieve payout details as part of the response for all instant settlements.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]\
- X GET \
https://api.razorpay.com/v1/settlements/ondemand?expand[]=ondemand_payouts

```java: Java

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject option = new JSONObject();
option("expand[], "ondemand_payouts");

List settlement = instance.settlement.fetchAllDemand(options);

```ruby: Ruby

require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {"expand[]": "ondemand_payouts"}

Razorpay::Settlement.fetch_all_ondemand_settlement(para_attr)

```php: PHP

$api = new Api($key_id, $secret);

$api->settlement->fetchAllOndemandSettlement(["expand[]"=> "ondemand_payouts"]);

```javascript: Node.js

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

options = {"expand[]": "ondemand_payouts"}

instance.settlements.fetchAllOndemandSettlement(options)

```python: Python

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

param = {
 "expand[]": "ondemand_payouts"
}

client.settlement.fetch_all_ondemand_settlement(options)

```go: Go

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

param:= map[string]interface{}{
 "expand[]": "ondemand_payouts",
}

body, err := client.Settlement.FetchAllOnDemandSettlement(param, nil)

```csharp: .NET

RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

Dictionary settlementRequest = new Dictionary();
settlementRequest.Add("expand[]", "ondemand_payouts");

List settlement = client.Settlement.FetchAllDemand(settlementRequest);
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
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
      "created_at": 1596771429,
      "ondemand_payouts": {
        "entity": "collection",
        "count": 1,
        "items": [
          {
            "id": "setlodp_FNj7g2cbvw8ueO",
            "entity": "settlement.ondemand_payout",
            "initiated_at": 1596771430,
            "processed_at": 1596778752,
            "reversed_at": null,
            "amount": 200000,
            "amount_settled": 199410,
            "fees": 590,
            "tax": 90,
            "utr": "022011173948",
            "status": "processed",
            "created_at": 1596771429
          }
        ]
      }
    },
    {
      "id": "setlod_FJOp0jOWlalIvt",
      "entity": "settlement.ondemand",
      "amount_requested": 300000,
      "amount_settled": 299114,
      "amount_pending": 0,
      "amount_reversed": 0,
      "fees": 886,
      "tax": 136,
      "currency": "INR",
      "settle_full_balance": false,
      "status": "processed",
      "description": "Need this to buy stock.",
      "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey, decaf."
      },
      "created_at": 1595826576,
      "ondemand_payouts": {
        "entity": "collection",
        "count": 1,
        "items": [
          {
            "id": "setlodp_FJOp0jTqoZdGen",
            "entity": "settlement.ondemand_payout",
            "initiated_at": 1595826577,
            "processed_at": 1595826588,
            "reversed_at": null,
            "amount": 300000,
            "amount_settled": 299114,
            "fees": 886,
            "tax": 136,
            "utr": "020910199316",
            "status": "processed",
            "created_at": 1595826576
          }
        ]
      }
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

`expand[]=ondemand_payouts` _optional_
: `string` Pass this if you want to fetch payout details as part of the response for all instant settlements.

`from` _optional_
: `integer` Unix timestamp (in seconds) from when instant settlements are to be retrieved.

`to` _optional_
: `integer` Unix timestamp (in seconds) till when instant settlements are to be retrieved.

`count` _optional_
: `integer` Number of instant settlement records to be retrieved. 
  - Default value: `10`.
  - Possible values: `1` to `100`.
  - This can be used for pagination, in combination with `skip`.

`skip` _optional_
: `integer` Number of instant settlement records to be skipped. 
  - Default value: `0`.
  - This can be used for pagination, in combination with `count`.

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
