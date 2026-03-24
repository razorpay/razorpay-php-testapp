---
title: Fetch Payment Downtime Details With ID
description: Fetch Payment Downtime Details With id using Razorpay Payments Downtime API.
---

# Fetch Payment Downtime Details With ID

## Fetch Payment Downtime Details With ID

Use this endpoint to fetch downtime status if you have not received any webhook notifications due to technical issues. Usually, downtime webhook payloads are delivered within few seconds of the event. However, in some cases, this can be delayed by few minutes due to various reasons.

### Response

```json: Netbanking
{
  "id": "down_F1cxDoHWD4fkQt",
  "method": "netbanking",
  "begin": 1591946222,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "bank": "COSB"
  },
  "created_at": 1591946223,
  "updated_at": 1591946297
}
```json: UPI Handle
{
  "id": "down_F8LCfthx90fMOo",
  "method": "upi",
  "begin": 1593412063,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "vpa_handle": "oksbi"
  },
  "created_at": 1593412092,
  "updated_at": 1593412092
}
```json: UPI PSP
{
  "id": "down_F8LCfthx90fMOo",
  "method": "upi",
  "begin": 1593412063,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "psp": "bhim",
    "flow": "collect"
  },
  "created_at": 1593412092,
  "updated_at": 1593412092
}
```json: Turbo UPI
{
  "id": "down_F1cxDoHWD4fkQt",
  "method": "upi",
  "begin": 1593412063,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "flow": "in_app"
  },
  "created_at": 1593412092,
  "updated_at": 1593412092
}
```json: Card - Issuer
{
  "id": "down_F7LroRQAAFuswd",
  "method": "card",
  "begin": 1593196031,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "issuer": "SBIN",
    "card_type": "credit"
  },
  "created_at": 1593196089,
  "updated_at": 1593196089
}
```json: Card - Network
{
  "id": "down_F7LroRQAAFuswd",
  "method": "card",
  "begin": 1593196031,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "network": "VISA",
    "card_type": "credit"
  },
  "created_at": 1593196089,
  "updated_at": 1593196089
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

`id` _mandatory_
: `string` Unique identifier of the downtime.

### Parameters

`id`
: `string` Unique identifier of the downtime's occurrence.

`entity`
: `string` Here, it will be `payment.downtime`.

`method`
: `string` The payment method that is experiencing the downtime. Possible values include:
  - `card`
  - `netbanking`
  - `upi`

`begin`
: `integer` Timestamp (in Unix) that indicates the start of the downtime. Applicable for both scheduled and unscheduled downtimes.

`end`
: `integer` Timestamp (in Unix) that indicates the end of the downtime.
 Available only for scheduled downtimes, where the end-time is known. Set to `null` when the end-time is unknown, possibly during unscheduled downtimes.

`status`
: `string` Status of the downtime.
Possible statuses are.
  - `scheduled`: A downtime is scheduled to happen at a later time.
  - `started`: The downtime has started and is ongoing.
  - `resolved`: The downtime is resolved.
  - `updated`: An ongoing downtime that has been updated after its start. For example, when the severity of the downtime changes from medium to high.

`scheduled`
: `boolean` Possible values:
   - `true`: This is a scheduled downtime by the issuer, network, or the bank, which was informed to Razorpay.
   - `false`: This is an unscheduled downtime.

`severity`
: `string` Severity of the downtime.
Possible values:
  -  `high`: Possible when all the payment methods are affected by downtime. Observed when the issuer, bank or network is down.
  - `medium`: Possible when a higher number of declines in transactions or low success rates are observed with the payment methods.
  - `low`: Possible when the reason for the downtime is unknown. Impact on payment methods is minimal.

`instrument`
: `string` Payment method that is underperforming.

  `bank` _if method=netbanking_
  : `string` Bank code of the affected bank. Possible values:
    - `HDFC`
    - `ICIC`
    - `SBIN`
    - `KKBK`
    - `UTIB`
    - `PUNB`

  `network` _if method=card_
  : `string` Card network. Possible values:
    - `AMEX`
    - `DICL`
    - `MC`
    - `RUPAY`
    - `VISA`
    - `ALL`

  `issuer` _if method=card_
  : `string` The 4-character issuer code unique to each issuing bank in India. Possible values:
    - `SBIN`
    - `HDFC`
    - `ICIC`
    - `UTIB`
    - `CITI`
    - `PUNB`  
    - `KKBK`
    - `CNRB`
    - `BKID`
    - `BARB`
    - `JAKA`
    - `UBIN`

  `psp` _if method=upi_
  : `string` Code of the affected Payment Service Provider (PSP). This is populated only when VPA handles associated with the PSP are down. If a PSP is associated with multiple VPA handles, it is marked down only when **all** the handles associated with it are down. For example, `google_pay` is marked down only when all Google Pay handles - `oksbi`, `okhdfcbank`, `okicici` and `okaxis` are down. Possible values for this parameter are:
    - `google_pay`
    - `phonepe`
    - `paytm`
    - `bhim`

  `vpa_handle` _if method=upi_
  : `string` Affected VPA handle. For example, `@oksbi`. To learn about the possible values, refer to the [list of handles supported by NPCI](https://www.npci.org.in/what-we-do/upi/3rd-party-apps). If the entire UPI system is experiencing a downtime, the value `ALL` is displayed.

  `card_type` _if method=card_
  : `string` The card type used to process the payment. Possible values:
    - `credit`
    - `debit`  

  `flow`
  : `string` Indicates the UPI payments flow being used during the downtime event. Possible values:
    - `collect`
    - `intent` 
    - `in_app` Only applicable for Turbo UPI payments.

`created_at`
: `integer` Timestamp (in Unix) that indicates the time at which the downtime was recorded in Razorpay servers.

`updated_at`
: `integer` Timestamp (in Unix) that indicates the time at which the downtime record was updated in Razorpay servers. 

Know more about [the possible values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
