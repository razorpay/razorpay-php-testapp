---
title: Set Or Reset UPI PIN
description: Set or reset UPI PIN using the Razorpay TPAP Pro API.
---

# Set Or Reset UPI PIN

## Set Or Reset UPI PIN

Customer’s card details and OTP are required to set or reset UPI PIN. These details are validated at the payment source provider’s (bank) end before allowing to set the PIN. Use this endpoint to generate the OTP via the remitter bank while setting the UPI PIN.

### Request

```curl: Curl
curl -X POST 'api.rzp..com/v1/upi/tpap/fundsources/:id/upi_pin?expand[]=vpas' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "action":"set",
  "upi_credentials":{
      // credentials received from CL 
  },
  "upi_transaction_id":"123qwert12",
  "vpa":"abc@upiexample",
  "card":{
    "last6":"123456",
    "expiry_month":"02",
    "expiry_year":"26"
    },
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
    "mobile_registration_format":"FORMAT1",
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

`action` _mandatory_
: `enum` Indicates whether the action is a set or reset. Both set and reset happen from the same API, so we should specify the action to distinguish between them. Possible values:
   - `set`
   - `reset`

`upi_credentials` _mandatory_
: `string` The encrypted UPI PIN. NPCI credentials is the output from the WebCL page.

`upi_transaction_id` _mandatory_
: `string` The unique identifier of the transaction across all entities, created by the originator.

`card` _mandatory_
: `object` Card details.

  `last6`
  : `string` Last 6 digits of the card which the fundsource provider will verify before setting the PIN.

  `expiry_month`
  : `string` Expiry month of the card in `MM` format.

  `expiry_year`
  : `string` Expiry year of the card in `YY` format.

`vpa`  _mandatory_
: `string` VPA of the customer for which the PIN is set.

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
: `string` Masked account number.

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
