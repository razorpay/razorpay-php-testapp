---
title: Resolve VPAs
description: Resolve VPAs using the Razorpay API.
---

# Resolve VPAs

## Resolve VPAs

TPAP resolves a VPA address to find the name of the entity to which the VPA belongs and its source before collecting a payment. Below are the expected responses:
- Payment source information such as `name`, `ifsc` and `upi_iin` are sent in response only when NPCI responds to switch as the  VPA is verified.
- `isMerchantVerified`, `mcc` and `merchantType` are sent in response only when the VPA of a merchant is verified.

Use this endpoint to Resolve a VPA.

### Request

```curl: Curl
curl -X POST 'api.rzp..com/v1/upi/tpap/vpa/resolve' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "vpa": "pay2me@okhdfbank",
  "device": {
    "geocode": "1234.1213",
    "ip": "198.1.1.1"
  }
}'
```

### Response

```json: Response
{
  "entity":"upi.vpa",
  "upi_transaction_id":"TXNxmms",
  "address":"kunal-1@rzpa",
  "fundsource":{
    "customer_name":"kunal1",
    "ifsc":"SBI00001",
    "upi_iin":""
  },
  "is_merchant_vpa":true,
  "is_merchant_verified":true,
  "mcc":"string",
  "merchant":{
    "identifier":{
      "subcode":"string",
      "mid":"string",
      "sid":"string",
      "tid":"string",
      "merchant_type":"string",
      "merchant_genre":"string",
      "onboarding_type":"string"
    },
    "name":{
      "brand":"string",
      "legal":"string",
      "franchise":"string"
    },
    "ownership":{
      "type":"string"
    }
  },
  "feature_tags":[
    "string"
  ]
}
```

### Parameters

`vpa` _mandatory_
: `string` VPA that is to be resolved.

`device` _optional_
: `string` Device details.

  `ip`
  : `string` The IP address of the device.

  `geocode`
  : `string` The location coordinates of the device. For example, `12.9667,77.5667`.

### Parameters

`entity`
: `string` Name of the entity.

`upi_transaction_id`
: `string` The transaction identifier of UPI.

`address`
: `string` The VPA address being resolved.

`fundsource`
: `object` The payment source details.

    `customer_name`
    : `string` Name of the account holder.

    `ifsc`
    : `string` IFSC of the account linked to the VPA.

    `upi_iin`
    : `string` UPI Issuer Identification Numbers (IIN) of the payment source provider issued by NPCI.

`is_merchant_vpa`
: `boolean` Indicates whether the VPA belongs to merchant. Possible values:
  - `true`: Merchant VPA.
  - `false`: Not merchant VPA.

`is_merchant_verified`
: `boolean` Indicates whether merchant is verified. Possible values:
  - `true`: Merchant is verified.
  - `false`: Merchant is not verified.

`mcc`
: `string` The merchant category code for the merchant.

`merchant`
: `object` Business details.

    `identifier`
    : `object` Merchant identifier details.

        `subcode`
        : `string` The merchant sub code. This is populated only when the VPA is from the merchant.

        `mid`
        : `string` The merchant identifier. This is populated only when the VPA is from the merchant.

        `sid`
        : `string` The SID of the merchant. This is populated only when the VPA is from the merchant.

        `tid`
        : `string` The TID of the merchant. This is populated only when the VPA is from the merchant.

        `merchant_type`
        : `string` Type of the merchant. This is populated only when the VPA is from the merchant.

        `merchant_genre`
        : `string` This is populated only when the VPA is from the merchant.

        `onboarding_type`
        : `string` The onboarding type. This is populated only when the VPA is from the merchant.

    `name`
    : `object` The merchant business details.

        `brand`
        : `string` The merchant brand. This is populated only when the VPA is from the merchant.

        `legal`
        : `string` The merchant legal information. This is populated only when the VPA is from the merchant.

        `franchise`
        : `string` The merchant franchise. This is populated only when the VPA is from the merchant.

    `ownership`
    : `object` The ownership details.

        `type`
        : `string` The ownership type.

`feature_tags`
: `string` Indicates an array of feature values. Each has its significance as decided by NPCI. Possible values:
  - `mandate`
  - `credit`
  - `ppi`
  - `uod`
  - `voucher`
