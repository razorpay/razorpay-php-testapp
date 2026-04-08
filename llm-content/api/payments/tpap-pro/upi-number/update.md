---
title: Update UPI Number
description: Update, deactivate, deregister, or activate a UPI Number.
---

# Update UPI Number

## Update UPI Number

 Use this endpoint to change VPA, deactivate, deregister, or activate an existing UPI number. 

### Request

```curl: Curl 
-X PATCH 'https://api.rzp..com/v1/upi/tpap/upi_number' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-Type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: cust_ref" \
-d '{
  "upi_number": "1234567890",
  "vpa": "newuser@upi",
  "action": "change_vpa",
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
  "status": "active",
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
: `string` The UPI number to be updated.

`vpa` _mandatory_
: `string` VPA to which the number is mapped.

`action` _mandatory_
: `string` Action to be performed on UPI number. Possible values:
    - `change_vpa`
    - `inactivate`
    - `deregister`
    - `activate`

`consent` _mandatory_
: `boolean` Consent of the user to update the UPI number.
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
: `string` Status of the UPI number.  Possible values:
    - `active`
    - `inactive`
    - `deregistered`

`vpa`
: `string` VPA linked to the UPI number.
