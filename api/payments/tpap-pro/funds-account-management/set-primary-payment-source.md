---
title: Set the Primary Payment Source
description: Set the primary payment source using the Razorpay TPAP Pro API.
---

# Set the Primary Payment Source

## Set the Primary Payment Source

Use this endpoint to set the primary payment source for the VPA.

### Request

```curl: Curl
curl -X PATCH 'api.rzp..com/v1/upi/tpap/vpa' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "vpa": "customer@handle",
  "primary_fundsource_id": "fs_1234"
  }'
```

### Response

```json: Response
{
  "entity":"upi.vpa",
  "customer_reference":"cust_1234",
  "mobile":"999999999",
  "address":"kunal-1@rzpa",
  "status":"active",
  "fundsources":{
    "entity":"collection",
    "count":2,
    "items":[
      {
        "id":"fs_1234",
        "customer_name":"kunal1",
        "masked_account_number":"xxxxxx8990",
        "account_reference_number":"999988126236990",
        "type":"savings",
        "ifsc":"SBI00001",
        "upi_pin_set":true,
        "upi_pin_length":4,
        "otp_length":4,
        "atm_pin_length":6,
        "fundsource_provider":{
          "name":"HDFC Bank",
          "upi_iin":"600007",
          "upi_enabled":false,
          "mobile_registration_format":"format1",
          "logo_url":""
        },
        "primary":true
      },
      {
        "id":"dummyfs1111112",
        "customer_name":"kunal1",
        "masked_account_number":"xxxxxx8990",
        "account_reference_number":"999988126236990",
        "type":"savings",
        "ifsc":"SBI00001",
        "upi_pin_set":true,
        "upi_pin_length":4,
        "otp_length":4,
        "atm_pin_length":6,
        "fundsource_provider":{
          "name":"HDFC Bank",
          "upi_iin":"600007",
          "upi_enabled":false,
          "mobile_registration_format":"format1",
          "logo_url":""
        },
        "primary":false
      }
    ]
  }
}
```

### Parameters

`vpa` _mandatory_
: `string ` The VPA whose link needs to be updated.

`primary_fundsource_id` _mandatory_
: `string` The unique identifier of the payment source.

### Parameters

`entity`
: `string` This refers to the collection of entity. Here, it is `vpa`.

`customer_reference`
: `string` The customer identifier. Pass this parameter at the TPAP end in this attribute.

`mobile`
: `string` The mobile number of the VPA linked to the payment source.

`address`
: `string` The VPA of the customer.

`status`
: `enum` Indicates the VPA and payment source linking status. Possible values:
  - `active`
  - `inactive`

`fundsources`
: `object` The payment source details.

  `entity`
  : `string` The type of entity. 

  `count`
  : `integer` Indicates the number of item in the entity.

  `items`
  : `object` The payment source object.

    `id`
    : `string` Unique identifier of the payment source.

    `customer_name`
    : `string` Name of the customer.

    `masked_account_number`
    : `string` Masked account number of the payment source.

    `account_reference_number`
    : `string` Account reference number of the payment source.

    `type`
    : `enum` Type of the payment source. Possible values:
        - `savings`
        - `current`
        - `non resident ordinary`
        - `non resident external`
        - `secured overdraft`
        - `credit`
        - `ppi`

    `ifsc`
    : `string` IFSC of the payment source.

    `fundsource_provider`
    : `object` The payment source provider details.

        `upi_iin`
        : `string` The UPI Issuer Identification Numbers (iin) of the payment source provider issued by NPCI.

        `name`
        : `string` Name of the payment source provider.

        `upi_enabled`
        : `boolean` Indicates if the payment source provider has UPI enabled.
           - `true`: UPI enabled.
           - `false`: UPI not enabled.

        `mobile_registration_format`
        : `string` Field to take the bank URL input.

        `logo_url`
        : `string` The URL of the bank logo.

    `upi_pin_set`
    : `boolean` Indicates if UPI PIN is set for payment source. Possible values:
        - `true`: UPI PIN is set.
        - `false`: UPI PIN is not set.

    `upi_pin_length`
    : `integer` The length of the UPI PIN allowed for payment source.

    `otp_length`
    : `integer` The length of the OTP PIN allowed for payment source.

    `atm_pin_length`
    : `integer` The ATM PIN length allowed for payment source.

    `primary`
    : `boolean` Indicates if vpa-payment source link is primary.
        - `true`: VPA is linked to the payment source.
        - `false`: VPA is not linked to the payment source.
