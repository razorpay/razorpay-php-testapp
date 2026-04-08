---
title: Fetch UPI Numbers
description: Retrieve all UPI numbers associated with a customer, along with their statuses and available slots.
---

# Fetch UPI Numbers

## Fetch UPI Numbers

 Use this endpoint to retrieve the list of UPI numbers mapped to a customer along with their statuses and available slots. 

### Request

```curl: Curl 
-X GET 'https://api.rzp..com/v1/upi/tpap/upi_number' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-Type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: cust_ref" \
```

### Response

```json: Response
{
  "entity": "collection",
  "mobile_linked": true,
  "available_slots": 1,
  "upi_numbers": [
    {
      "number": "9234567890",
      "type": "mobile",
      "vpa": "dummyuser2@upi",
      "status": "active"
    },
    {
      "number": "123456780",
      "type": "numeric",
      "vpa": "gaurav.kumar@exampleupi",
      "status": "inactive"
    }
  ]
}

```json: Failure
{
  "error": {
    "code": "INTERNAL_SERVER_ERROR",
    "description": "record not found",
    "source": "internal",
    "reason": "record not found"
  }
}
```

### Parameters

`entity`
: `string` Collection of entity. Here it is `upi_number`.

`mobile_linked`
: `boolean` Indicates if a mobile number is already linked.
  - `true`: Mobile number is linked.
  - `false`: Mobile number is not linked.

`available_slots`
: `integer` Number of available slots left (maximum is 3 per customer).

`upi_number`
: `string` Unique id mapped to the customer's VPA.

    `number`
    : `string` The UPI number.

    `type`
    : `string` Type of number. For example, mobile or numeric.

    `status`
    : `string` Status of the UPI number. Possible values:
        - `active`
        - `inactive`
        - `deregistered`

    `vpa`
    : `string` VPA linked to the UPI number.
