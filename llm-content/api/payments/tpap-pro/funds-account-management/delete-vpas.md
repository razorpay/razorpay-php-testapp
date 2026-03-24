---
title: Delete VPAs
description: Delete VPAs using the Razorpay TPAP Pro API.
---

# Delete VPAs

## Delete VPAs

Use this endpoint to delete a VPA of a customer.

### Request

```curl: Curl
curl -X DELETE 'api.rzp..com/v1/upi/tpap/vpa?vpa=gaurav@okhdfcbank' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
```

### Response

```json: Response
{
  "entity":"upi.vpa",
  "customer_reference":"PXYZ",
  "vpa":"gaurav@okhdfcbank",
  "status":"deleted",
  "mobile":"999999999",
  "fundsources_unlinked":{
    "entity":"collection",
    "count":2,
    "items":[
      {
        "id":"dummyfs1111111",
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
        "id":"dummyfs1111111",
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
          "mobile_registration_format":"format2",
          "logo_url":""
        },
        "primary":true
      }
    ]
  }
}
```

### Parameters

`vpa` _mandatory_
: `string` The VPA that should be deleted.

### Parameters

`entity`
: `string` This refers to the collection of entity. Here, it is `vpa`.

`customer_reference`
: `string` The customer identifier.

`vpa`
: `string` This is the VPA which needs to be de-linked.

`status`
: `enum` Status of the action. Possible value is `deleted` if the VPA is deleted.

`mobile`
: `string` The mobile number of the customer.

`fundsources_unlinked`
: `array` The unlinked payment source details.

  `entity`
  : `string` The entity type.

  `count`
  : `integer` Indicates number of item in the entity type.

  `items`
  : `object` The items object.

    `id`
    : `string` The unique identifier of the payment source.

    `customer_name`
    : `string` Name of the customer.

    `masked_account_number`
    : `string` The masked account number of the payment source.

    `account_reference_number`
    : `string` The account reference number of the payment source.

    `type`
    : `enum` Type of the payment source. Possible values:
        - `savings`
        - `current`
        - `non_resident_ordinary`
        - `non_resident_external`
        - `secured_overdraft`
        - `credit`
        - `ppi`

    `ifsc`
    : `string` IFSC of the payment source.

    `upi_pin_set`
    : `boolean` Indicates if the UPI PIN is set for payment source. Possible values:
        - `true`: UPI PIN is set.
        - `false`: UPI PIN is not set.

    `upi_pin_length`
    : `integer` Indicates the length of the UPI PIN allowed for the payment source.

    `otp_length`
    : `integer` Indicates the length of the OTP allowed for the payment source.

    `atm_pin_length`
    : `integer` Indicates the length of the ATM PIN allowed for the payment source.

    `fundsource_provider`
    : `object` The payment source provider details.

      `upi_iin`
      : `string` The UPI Issuer Identification Numbers (iin) of the payment source provider issued by NPCI.

      `name`
      : `string` Name of the payment source (bank account) provider.

      `upi_enabled`
      : `boolean` Indicates if the provider has UPI enabled. Possible values:
          - `true`: UPI is enabled.
          - `false`: UPI is not enabled.

      `mobile_registration_format`
      : `string` The format as defined by NPCI - `format1`, `format2` and so on. 

      `logo_url`
      : `string` The URL of the bank logo.

    `primary`
    : `boolean` Indicates if the VPA is linked to the payment source marked as primary. Possible values:
        - `true`: VPA is linked to the payment source.
        - `false`: VPA is not linked to the payment source.
