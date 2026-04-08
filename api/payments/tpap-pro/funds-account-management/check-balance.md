---
title: Check Balance of a Payment Source
description: Check balance of a payment source using the Razorpay TPAP Pro API.
---

# Check Balance of a Payment Source

## Check Balance of a Payment Source

Use this endpoint to check the balance of a payment source.

### Request

```curl: Curl
curl -X POST 'api.rzp..com/v1/upi/tpap/fundsources/:fundsource_id/balance' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "upi_credentials":{
      // credentials received from WebCL 
  },
  "upi_transaction_id":"123qwert12",
  "vpa":"abc@upiexample",
  "device":{
    "geocode":"1234.1213",
    "ip":"198.1.1.1"
    }
  }'
```

### Response

```json: Response
{
  "entity":"upi.fundsource.balance",
  "fundsource_id":"string",
  "currency":"string",
  "amount":"80000",
  "customer_reference":"SKALq2p",
  "upi_transaction_id":"TxnSLALQPl",
  "vpa":"string",
  "masked_account_number":"XXXXXXXXX1234",
  "upi_iin":"12MWKO02"
}
```

### Parameters

`fundsource_id` _mandatory_
: `string` The unique identifier of the payment source.

### Parameters

`upi_credentials` _mandatory_
: `string` The encrypted UPI PIN. NPCI credentials is the output from the WebCL page.

`upi_transaction_id` _mandatory_
: `string` The unique identifier of the transaction across all entities, created by the originator.

`vpa` _mandatory_
: `string` The VPA of the customer requesting the balance.

`device` _optional_
: `object` Device details.

  `ip`
  : `string` The IP address of the device.

  `geocode`
  : `string` The location coordinates of the device. For example, `12.9667,77.5667`.

### Parameters

`entity`
: `string` Name of the entity.

`fundsource_id`
: `string` Unique identifier of the payment source.

`currency`
: `string` Currency of the balance.

`amount`
: `string` The amount in the lowest denomination of the currency.

`customer_reference`
: `string` The customer reference that requested the balance.

`upi_transcation_id`
: `string` The transaction ID that brought the balance.

`vpa`
: `string` The VPA of the customer.

`masked_account_number`
: `string` The masked account number of the customer.

`upi_iin`
: `string` UPI Issuer Identification Numbers (upi_iin) of the payment source provider issued by NPCI.
