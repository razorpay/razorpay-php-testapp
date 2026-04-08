---
title: Create a VPA and Link to Payment Source
description: Create a VPA and link it to the payment source using the Razorpay TPAP Pro API.
---

# Create a VPA and Link to Payment Source

## Create a VPA and Link to Payment Source

If not already linked, create a VPA and link it with a list of payment sources. The expansion in the request URL returns the expanded payment source if it is passed in the query parameters. Use this endpoint to create a VPA and link it to a payment source.

### Request

```curl: Curl
curl -X POST 'api.rzp..com/v1/upi/tpap/vpa/link?expand[]=fundsources' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "vpa":"customer@handle",
  "fundsources":[
    {
    "fundsource_id":"fs_1234",
    "primary":true
    }
  ]
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
        }
      }
    ]
  }
}
```

### Parameters

`vpa` _mandatory_
: `string` The VPA that should be linked.

`fundsources` _mandatory_
: `array` The list of payment sources that should be linked with the requested VPA.

  `fundsource_id` _mandatory_
  : `string` The payment source identifier.

  `primary` _optional_
  : `boolean` The field to set the given VPA payment source link as primary.
        - `true`: VPA is linked to the payment source.
        - `false`: VPA is not linked to the payment source.

### Parameters

`entity`
: `string` The name of the entity. Here, it is `upi.vpa`.

`customer_reference`
: `string` The customer identifier. You must pass the customer identifier at the TPAP end in this attribute.

`mobile`
: `string` The mobile number of the VPA linked to the payment source.

`address`
: `string` The VPA of the customer.

`status`
: `string` The VPA and payment source linking status. Possible values:
  - `active`
  - `inactive`

`fundsources`
: `object` Collection of payment sources.

  `entity`
  : `string` Indicates the name of the entity.

  `count`
  : `integer` Indicates the number of items in the entity type.

  `items`
  : `object` Payment source and payment source provider details.

    `primary`
    : `boolean` Indicates whether VPA payment source is linked primary.
        - `true`: VPA is linked to the payment source.
        - `false`: VPA is not linked to the payment source.

    `id`
    : `string` Unique identifier of the payment source.

    `customer_name`
    : `string` Customer name.

    `masked_account_number`
    : `string` Masked account number of the payment source.

    `account_reference_number`
    : `string` The account reference number.

    `type`
    : `enum` Type of the payment source. Possible values:
      - `savings`
      - `current`
      - `non resident ordinary`
      - `non resident ordinary`
      - `secured overdraft`
      - `credit`
      - `ppi`

    `ifsc`
    : `string` IFSC of the bank.

    `upi_pin_set`
    : `boolean` Indicates whether UPI PIN is set for payment source. Possible values:
      - `true`: UPI PIN is set.
      - `false`: UPI PIN is not set.

    `upi_pin_length`
    : `integer` Length of the UPI PIN of the payment source allowed.

    `otp_length`
    : `integer` Length of the OTP PIN of the payment source allowed.

    `atm_pin_length`
    : `integer` ATM PIN length of the payment source allowed.

    `fundsource_provider`
    : `object` Payment source provider details.

      `upi_iin`
      : `string` UPI Issuer Identification Numbers (iin) of the payment source provider issued by NPCI.

      `name`
      : `string` Name of the payment source (bank account) provider.

      `upi_enabled`
      : `boolean` Indicates whether UPI is enabled to the payment source provider. Possible values:
        - `true`: UPI is enabled.
        - `false`: UPI is not enabled.

      `mobile_registration_format`
      : `string` Indicates the format as defined by NPCI: `format1`, `format2` and so on.

      `logo_url`
      : `string` Indicates the URL of the bank logo.
