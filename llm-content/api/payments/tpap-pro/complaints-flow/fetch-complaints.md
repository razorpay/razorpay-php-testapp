---
title: Fetch Complaints
description: Retrieve the status of a specific complaint or fetch all complaints for a customer.
---

# Fetch Complaints

## Fetch Complaints

Use this endpoint to fetch the status of a specific complaint or retrieve a list of complaints.

### Request

```curl: Curl
curl -X GET 'https://api.rzp..com/v1/complaints?upi_transaction_id=1232341412&refresh=true&limit=4&offset=10&status=success' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "Authorization: Bearer " \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
```

 

### Response

```json: Success
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "entity": "upi.complaint",
      "reference_id": "123214121",
      "upi_reference_id": "123214121",
      "request_adjustment_amount": 500,
      "request_adjustment_code": "U010",
      "request_adjustment_flag": "PBRB",
      "upi_customer_reference_number": "CRN987654321",
      "adjustment_amount": 500,
      "adjustment_code": "102",
      "adjustment_flag": "PR2C",
      "payee": {
        "vpa": "acme.corp@rzp",
        "name": "AcmeCorp Pvt. Ltd."
      },
      "status": "success",
      "description": "Complaint for failed transaction under review",
      "upi_transaction_id": "1232341412",
      "upi_original_transaction_id": "1232341412",
      "created_at": 1705411200
    }
  ]
}
```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "upi_original_transaction_id is mandatory",
    "source": "internal",
    "step": "",
    "reason": "",
    "field": "upi_original_transaction_id",
    "metadata": null
  }
}
```

 

### Parameters

`upi_transaction_id` 
: `string` Fetch the complaint status for the specific transaction id.

   
> **WARN**
>
> 
>    **Watch Out!**
> 
>    This value should be alphanumeric and a maximum of 35 characters are allowed. The value should start with a prefix given by NPCI to Switch.
>    

`refresh` 
: `boolean` Determines whether to fetch payment status from NPCI. Possible values:
  - `true`: If set to true, fetch payment status from NPCI.
  - `false` (default): If set to false, return payment from the local database.

`limit` 
: `integer` Maximum number of records to return. Used for pagination.

`offset` 
: `integer` Offset value for pagination.

`status` 
: `string` The status of the complaint. Possible values: 
  - `initiated` 
  - `success` 
  - `failure`

### Parameters

`entity`
: `string` The entity type. Here, it is `collection`.

`count`
: `integer` Indicates the number of items in the entity type.

`items`
: `object` The complaint details.

  `entity` 
  : `string` Entity type. Here it is `upi.complaint`.

  `reference_id` 
  : `string` Business-generated complaint reference id.

  `upi_reference_id`
  : `string` Identifier returned by Razorpay for the complaint.

  `request_adjustment_amount`
  : `integer` The amount of the transaction sent by NPCI (in paise), when the complaint was raised.

  `request_adjustment_code`
  : `string` Code representing complaint reason from NPCI, when the complaint was raised..

  `request_adjustment_flag` 
  : `string` Flag associated with the complaint reason from NPCI, when the complaint was raised..

  `upi_customer_reference_number`
  : `string` Complaint id shared by NPCI.

  `adjustment_amount`
  : `integer` The amount of the transaction sent by NPCI, in paise.

  `adjustment_code`
  : `string` Code representing complaint reason from NPCI.

  `adjustment_flag` 
  : `string` Flag associated with the complaint reason from NPCI.

  `payee`
  : `object` The payee details.

    `vpa`
    : `string` The VPA of the payee.
    
    `name`
    : `string` The name of the payee.

  `status`
  : `string` Indicates the complaint status. Possible values:
    - `initiated`
    - `active`
    - `completed`
    - `paused`
    - `failed`

  `description`
  : `string` Acknowledgement or status description.

  `upi_transaction_id` 
  : `string` UPI transaction id related to the complaint.

  `upi_original_transaction_id`
  : `string` Original UPI transaction id used at the time of payment.

  `created_at`
  : `string` The UNIX timestamp at which the complaint was created.
