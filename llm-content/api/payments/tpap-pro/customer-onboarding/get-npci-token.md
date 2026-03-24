---
title: Get the NPCI Token
description: Get the NPCI token using the Razorpay TPAP Pro API.
---

# Get the NPCI Token

## Get the NPCI Token

Use this endpoint to get the NPCI token.

### Request

```curl: Request
curl -X POST 'api.rzp..com/v1/upi/tpap/devices/token' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "upi_transaction_id": "123qwert12",
  "challenge": "challenge received from CL"
}'
```

### Response

```json: Response
{
  "mobile": "string",
  "token": "string"
}
```

### Parameters

`upi_transaction_id` _mandatory_
: `string` The unique identifier of the transaction across all UPI entities created by the originator.

`challenge` _mandatory_
: `string` TPAP when executing **Get Challenge** in CL to receive a challenge from the common library. You can fetch the NPCI token using this challenge.

### Parameters

`token`
: `string` The NPCI token received for the challenge. TPAP uses this token to register the application and communicate securely with CL and NPCI.

`mobile`
: `string` The mobile number of the customer.
