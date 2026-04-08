---
title: Create or Port UPI Number
description: Create a new UPI Number or port an existing mobile number from another TPAP.
---

# Create or Port UPI Number

## Create or Port UPI Number

 Use this endpoint to create a new UPI Number or port a mobile number to a new VPA. 

### Request

```curl: Curl 
-X POST 'https://api.rzp..com/v1/upi/tpap/upi_number' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-Type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: cust_ref" \
-d '{
  "upi_number": "1234567890",
  "vpa": "gaurav.kumar@exampleupi",
  "action": "create",
  "existing_vpa": "olduser@upi",
  "consent": true
}'
```

### Response

```json: Response
{
  "entity": "upi_number",
  "upi_transaction_id": "123qwert12",
  "upi_number": "1234567890",
  "type": "mobile",
  "status": "initiated",
  "vpa": "gaurav.kumar@exampleupi"
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Consent is mandatory",
    "source": "internal",
    "step": "",
    "reason": "user consent must be true",
    "field": "consent",
    "metadata": null
  }
}
```

### Parameters

`upi_number` _mandatory_
: `string` The UPI number to check for availability (mobile or numeric id).

`vpa` _mandatory_
: `string` VPA to which the UPI number has to be linked.

`action` _optional_
: `string` Action to be performed on UPI Number. Possible values:
    - `create`
    - `port`

`existing_vpa` _optional_
: `string` VPA linked with the UPI number (Only in case of PORT).

`consent` _mandatory_
: `boolean` Consent of the user to create a new UPI Number or port a mobile number to a new VPA. Possible values:
  - `true`: The user has given the consent.
  - `false`: The user has not given the consent.

### Parameters

`entity`
: `string` Collection of entity. Here it is `upi_number`.

`upi_transaction_id`
: `string` Unique transaction id created by the originator.

`upi_number`
: `string` Unique id mapped to the customer's VPA.

`type`
: `string` Type of number. For example, mobile or numeric.

`status`
: `string` Status of the UPI number. Possible values:
  - `initiated`
  - `active`

`vpa`
: `string` VPA linked to the UPI number.
