---
title: Resolve UPI Number
description: Resolve a UPI number to its VPA, customer name, and merchant information.
---

# Resolve UPI Number

## Resolve UPI Number

 Use this endpoint to resolve a UPI number into VPA, name, IFSC, and business information. 

### Request

```curl: Curl 
-X POST 'https://api.rzp..com/v1/upi/tpap/upi_number/resolve' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-Type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: cust_ref" \
-d '{
  "upi_number": "9898989898",
  "device": {
    "geocode": "12.34,77.13",
    "ip": "198.1.1.1"
  }
}'
```

### Response

```json: Response
{
  "entity": "upi_number",
  "number": "9898989898",
  "upi_transaction_id": "TXNxmms",
  "vpa": "gaurav.kumar@rzpa",
  "fundsource": {
    "customer_name": "kunal1",
    "ifsc": "SBI00001",
    "upi_iin": ""
  },
  "is_merchant_vpa": true,
  "is_merchant_verified": true,
  "mcc": "6765",
  "merchant": {
    "identifier": {
      "subcode": "string",
      "mid": "string",
      "sid": "string",
      "tid": "string",
      "merchant_type": "string",
      "merchant_genre": "string",
      "onboarding_type": "string"
    },
    "name": {
      "brand": "Brand Name",
      "legal": "Legal Name",
      "franchise": "Franchise Name"
    },
    "ownership": {
      "type": "Private"
    }
  },
  "feature_tags": [
    "mandate",
    "credit"
  ]
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Device Ip is mandatory",
    "source": "internal",
    "reason": "Device Ip is required",
    "field": "ip"
  }
}
```

### Parameters

`upi_number` _mandatory_
: `string` The UPI number to check for availability (mobile or numeric id).

`device` _mandatory_
: `object` The device details.

  `geocode`
  : `string` The location coordinates of the device.

  `ip`
  : `string` The IP address of the device.

### Parameters

`entity`
: `string` Collection of entity. Here it is `upi_number`.

`number`
: `string` The UPI number.

`upi_transaction_id`
: `string` Unique transaction id created by the originator.

`vpa`
: `string` VPA linked to the UPI number.

`fundsource`
: `string` The fundsource details.

    `customer_name` 
    : `string` Name of the customer.

    `ifsc` 
    : `string` IFSC code of the account linked to the VPA.

    `upi_iin`
    : `string` The UPI Issuer Identification Numbers (IIN) of the payment source provider issued by NPCI.

`is_merchant_vpa`
: `boolean` Indicates if the VPA is a business VPA.
  - `true`: VPA is a business VPA.
  - `false`: VPA is not a business VPA.

`is_merchant_verified`
: `boolean` Indicates if the merchant is verified.
  - `true`: Merchant is verified.
  - `false`: Merchant is not verified.

`mcc`
: `string` Merchant Category Code.

`merchant`
: `object` Merchant details.

    `identifier`
    : `string` Unique merchant identifiers.

      `mid`
      : `string` Merchant id.

      `sid`
      : `string` Sub-merchant id.

      `tid`
      : `string` Terminal id.

      `merchant_type`
      : `string` Type of merchant.

      `merchant_genre`
      : `string` Business vertical or segment.

      `onboarding_type`
      : `string` How the merchant was onboarded.

    `name`
    : `object` Merchant's business and legal names.

      `brand`
      : `string` Merchant's brand name.

      `legal`
      : `string` Merchant's legal registered name.

      `franchise`
      : `string` Franchise name if applicable.

    `ownership`
    : `object` Merchant ownership details.

      `type`
      : `string` Type of ownership.

`feature`
: `array` List of special features tagged with this VPA.
