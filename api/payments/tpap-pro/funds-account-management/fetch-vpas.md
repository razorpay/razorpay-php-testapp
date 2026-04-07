---
title: Fetch VPAs
description: Fetch VPAs using the Razorpay TPAP Pro API.
---

# Fetch VPAs

## Fetch VPAs

Use this endpoint to fetch all VPAs of a customer.

### Request

```curl: Curl
curl -X GET 'api.rzp..com/v1/upi/tpap/vpas?status=”active”&skip=0&count=10' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
```

### Response

```json: Response
{
  "entity":"collection",
  "count":1,
  "items":[
    {
      "id":"id",
      "entity":"vpa",
      "mobile":"999999999",
      "address":"kunal-1@rzpa",
      "status":"active",
      "fundsources":{
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
          }
        ]
      }
    }
  ]
}
```

### Parameters

`status` _optional_
: `enum` Indicates the VPA and payment source linking status. Possible values:
    - `active`
    - `inactive`

`skip` _optional_
: `integer` The number of entities to skip. Default is `0`. You can use this parameter for pagination in combination with skip.

`count` _optional_
: `integer` The number of entities to fetch. Default is `10`. You can use this for pagination in combination with count.

### Parameters

`entity`
: `string` This refers to the collection of entity. Here, it is `collection`.

`count`
: `integer` Indicates the number of items in the entity type.

`items`
: `array` Indicates a list of objects.

  `id`
  : `string` A unique identifier of the entity.

  `entity`
  : `string` Name of the entity.

  `mobile`
  : `string` The mobile number of customer.

  `address`
  : `string` The address of the customer.

  `status`
  : `string` The status of the VPA linked to the payment source. Possible values:
      - `active`
      - `inactive`

  `fundsources`
  : `object` Payment source details.

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
      : `string` The masked account number.

      `account_reference_number`
      : `string` The account reference number.

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
        : `string` The UPI Issuer Identification Numbers (IIN) of the payment source provider issued by NPCI.

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
