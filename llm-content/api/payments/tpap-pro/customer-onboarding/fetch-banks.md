---
title: Fetch Banks
description: Fetch banks using the Razorpay TPAP Pro API.
---

# Fetch Banks

## Fetch Banks

NPCI will maintain the list of all fund source providers connected via a unified interface. A fund source provider is a Bank, Payment Bank, PPI, or any other RBI-regulated entity that is allowed to provide payment (credit/debit) services to individuals and entities. Use this endpoint to fetch banks or fundsource providers. Know more about the [Header information](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md#header-information).

### Request

```curl: Curl
curl -X GET 'api.rzp..com/v1/upi/tpap/fundsource_providers?skip=0&count=10&refresh=true' \
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
      "entity":"upi.fundsource_provider",
      "name":"HDFC Bank",
      "id":"psp generated id of fundsource provider",
      "upi_iin":"600007",
      "ifsc":"HDFC0000486",
      "upi_enabled":true,
      "logo_url":"",
      "products":[
        "nfs",
        "upi"
      ],
      "mobile_registration_format":"format1",
      "upi_versions_supported":[
        {
          "version":"1.0",
          "mandatory":false
        }
      ]
    },
    {
      "entity":"upi.fundsource_provider",
      "name":"ICICI Bank",
      "id":"psp generated id of fundsource provider",
      "upi_iin":"600008",
      "ifsc":"ICIC0000486",
      "upi_enabled":true,
      "logo_url":"",
      "products":[
        "nfs | upi"
      ],
      "mobile_registration_format":"format1",
      "upi_versions_supported":[
        {
          "version":"1.0",
          "mandatory":false
        }
      ]
    }
  ]
}
```

### Parameters

`count` _optional_
: `integer` Number of entities to fetch. Default is `10`. You can use this parameter for pagination in combination with `count`.

`skip` _optional_
: `integer` Number of entities to skip. Default is `0`. You can use this parameter for pagination in combination with `skip`.

### Parameters

`entity`
: `string` This refers to the collection of entity. Here, it is `collection`.

`count`
: `integer` Indicates the number of items in the entity type.

`items`
: `array` Indicates a list of objects.

  `entity`
  : `string` Indicates the entity type name. In this case `fundsource_provider`.

  `name`
  : `string` Indicates the fund source name. For example, HDFC bank.

  `upi_iin`
  : `string` Indicates the UPI Issuer Identification Numbers (IIN) of the fundsource provider issued by NPCI.

  `ifsc`
  : `string` IFSC of the bank.

  `upi_enabled`
  : `boolean` Indicates if UPI is enabled for the bank. Possible values:
     - `true`: UPI is enabled.
     - `false`: UPI is not enabled.

  `logo_url`
  : `string` The bank logo URL.

  `products`
  : `array` Indicates the list of products supported by the bank separated by a comma. For example, `aeps`, `imps`, `card` and `nfs`.

  `mobile_registration_format`
  : `string` Indicates the format as defined by NPCI - format1 and format2. This field is required when setting the UPI PIN.

  `upi_versions_supported`
  : `object` UPI version supported details.

    `version`
    : `string` The version of UPI supported. Possible values:
      - `1.0`
      - `2.0`

    `mandatory`
    : `boolean` Indicates that the PSP should be live in this version before going live with the next or any child versions. Possible values:
      - `true`: PSP is live.
      - `false`: PSP is not live.
