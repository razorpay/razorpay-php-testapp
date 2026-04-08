---
title: Check UPI Number Availability
description: Check if a mobile UPI number is available.
---

# Check UPI Number Availability

## Check UPI Number Availability

 Use this endpoint to check if a specific Mobile UPI Number is available. 

### Request

```curl: Curl 
-X POST 'https://api.rzp..com/v1/upi/tpap/upi_number/available' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-Type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: cust_ref" \
-d '{
  "upi_number": "1234567890",
  "vpa": "gaurav.kumar@exampleupi",
  "action": "create",
  "consent": true
}'
```

### Response

```json: Success
{
  "upi_number": "1234567890",
  "type": "mobile",
  "vpa": "gaurav.kumar@exampleupi",
  "upi_transaction_id": "123qwert12",
  "available": true,
  "existing_vpa": "olduser@upi"
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
: `string` VPA to which the number is mapped.

`action` _mandatory_
: `string` Action to be performed on UPI Number. Possible values:
    - `create`
    - `port`

`consent` _mandatory_
: `boolean` Consent of the user to check the UPI number is available. Possible values:
  - `true`: The user has given the consent.
  - `false`: The user has not given the consent.

### Parameters

`upi_number`
: `string` Unique id mapped to the customer's VPA.

`type`
: `string` Type of number. For example, mobile or numeric.

`vpa`
: `string` VPA linked to the UPI number.

`upi_transaction_id`
: `string` Unique transaction id created by the originator.

`available`
: `boolean` Indicates if the number is available.
  - `true`: Number is available.
  - `false`: Number is not available.

`existing_vpa`
: `string` VPA linked with the UPI number.
