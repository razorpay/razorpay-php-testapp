---
title: Generate OTP for Payment Source
description: Generate OTP for payment source using the Razorpay TPAP Pro API.
---

# Generate OTP for Payment Source

## Generate OTP for Payment Source

Use this endpoint to generate the OTP via the remitter bank while setting the UPI PIN.

### Request

```curl: Curl
curl -X POST 'api.rzp..com/v1/upi/tpap/fundsources/:id/otp' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "vpa":"vpa@handle",
  "card":{
    "last6":"123456",
    "expiry_month":"02",
    "expiry_year":"26"
  },
  "upi_transaction_id":"123456",
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
  },
  "upi_transaction_id":"123456"
}
```

### Parameters

`id`
: `string` The payment source identifier generated as a response from the Create VPA API.

### Parameters

`vpa` _mandatory_
: `string` The VPA linked to the payment source.

`card` _mandatory_
: `object` The card details.

  `last6`
  : `string` The last 6 digits of the card, which the fund source provider will verify before setting the PIN.

  `expiry_month`
  : `string` The expiry month of the card in `MM` format.

  `expiry_year`
  : `string` The expiry year of the card in `YY` format.

`upi_transaction_id` _mandatory_
: `string` The UPI transaction identifier. For example, `123456`.

`device`  _optional_
: `object` The device details.

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

`upi_transaction_id`
: `string` Transaction ID of the outgoing request to gateway.
