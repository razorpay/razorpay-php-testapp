---
title: Change UPI PIN
description: Change UPI PIN using the Razorpay TPAP Pro API.
---

# Change UPI PIN

## Change UPI PIN

Use this endpoint to change the UPI PIN.

> **WARN**
>
> 
> **Watch Out!**
> 
> The user should remember the current PIN.
> 

### Request

```curl: Curl
curl -X PATCH 'api.rzp..com/v1/upi/tpap/fundsources/:id/upi_pin?expand[]=vpas' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "upi_transaction_id":"123qwert12",
  "upi_credentials":{
      // credentials received from WebCL 
  },
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
  "entity":"upi.fundsource",
  "id":"fs_1234",
  "type":"savings",
  "customer_name":"name",
  "masked_account_number":"xx9987",
  "ifsc":"IFSC001",
  "upi_pin_set":true,
  "upi_pin_length":4,
  "otp_length":4,
  "atm_pin_length":4,
  "fundsource_provider":{
    "name":"HDFC Bank",
    "upi_iin":"600007",
    "upi_enabled":false,
    "mobile_registration_format":"format1",
    "logo_url":""
  },
  "vpas":{
    "entity":"collection",
    "count":1,
    "items":[
      {
        "mobile":"9999999999",
        "address":"anc@handle",
        "status":"active",
        "primary":true
      }
    ]
  }
}
```

### Parameters

`id`
: `string` The payment source identifier.

### Parameters

`upi_credentials` _mandatory_
: `string` The encrypted UPI PIN. NPCI credentials is the output from the WebCL page.

`upi_transaction_id` _mandatory_
: `string` The unique identifier of the transaction across all entities, created by the originator.

`device` _optional_
: `string` Device details.

  `ip`
  : `string` The IP address of the device.

  `geocode`
  : `string` The location coordinates of the device. For example, `12.9667,77.5667`.

### Parameters

`entity`
: `string` Name of the entity. Here, it is `fundsource`.

`id`
: `string` Unique identifier of the entity.

`type`
: `string` Type of account.

`customer_name`
: `string` Name of the account holder.

`masked_account_number`
: `string` Masked account number of the customer.

`ifsc`
: `string` IFSC of the bank.

`upi_iin`
: `string` UPI Issuer Identification Numbers (iin) of the payment source provider issued by NPCI.

`upi_pin_set`
: `boolean` Indicates whether the UPI PIN is set. Possible values:
   - `true`: UPI PIN is set.
   - `false`: UPI PIN is not set.

`upi_pin_length`
: `integer` Length of the UPI PIN.

`otp_length`
: `integer` Length of the OTP.

`atm_pin_length`
: `integer` Length of the ATM PIN.

`fundsource_provider`
: `object` Payment source provider details. Here, if the payment source is a bank, payment source providers will be bank information.

    `name`
    : `string` Name of the payment source.

    `upi_iin`
    : `string` UPI Issuer Identification Numbers (upi_iin) of the payment source provider issued by NPCI.

    `upi_enabled`
    : `boolean` Indicates whether the provider has UPI enabled. Possible values:
       - `true`: UPI is enabled.
       - `false`: UPI is not enabled.

    `mobile_registration_format`
    : `string` Indicates the format as defined by NPCI - `format1`, `format2` and so on. 

    `logo_url`
    : `string` The URL of the bank logo.

`vpas`
: `array` Details of the VPAs linked to the payment source.

  `entity`
  : `string` The entity type name. Here, it is `collection`.

  `count`
  : `integer` Indicates the number of items in the entity type.

  `items`
  : `object` VPA details.

     `mobile`
     : `string` The mobile number of the VPA linked to the payment source.

     `address`
     : `string` The address of the VPA linked to the payment source.

     `status`
     : `string` The status of the VPA linked to the payment source.

     `primary`
     : `boolean` Indicates if the VPA linked to the payment source marked as primary.
        - `true`: VPA is linked to the payment source.
        - `false`: VPA is not linked to the payment source.
