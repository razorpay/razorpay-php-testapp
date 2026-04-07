---
title: Fetch Payment Sources
description: Fetch payment sources using the Razorpay TPAP Pro API.
---

# Fetch Payment Sources

## Fetch Payment Sources

Payment sources are any payment account (Bank Account, PPI, Wallets, Mobile Money, and so on) offered by a regulated entity where money can be held, debited, and credited. Use this endpoint to fetch banks or fundsource providers. After a customer selects a bank, TPAP uses this API to fetch a list of payment sources.  Based on the query parameters, the TPAP has the option to get fundsources in real time for NPCI, or get only VPA-linked fundsource or get only fundsources for a particular bank.

### Request

```curl: Curl
curl -X GET 'api.rzp..com/v1/upi/tpap/fundsources?refresh=true&linked=true&upi_iin=7078129&skip=0&count=10&device_ip=198.1.1.1&device_geocode=1234.1213' \
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
      "id":"fs_1234",
      "entity":"upi.fundsource",
      "type":"savings",
      "customer_name":"Gaurav Kumar",
      "masked_account_number":"XXXXXX5199",
      "account_reference_number":"999988126236990",
      "ifsc":"HDFC000001",
      "upi_pin_set":true,
      "upi_pin_length":6,
      "otp_length":6,
      "atm_pin_length":4,
      "fundsource_provider":{
        "name":"HDFC Bank",
        "upi_iin":"600007",
        "upi_enabled":false,
        "mobile_registration_format":"format1",
        "logo_url":""
      },
      "vpas":{
        "entity":"upi.collection",
        "count":1,
        "items":[
          {
            "mobile":"9999999999",
            "address":"vpa@handle",
            "status":"active",
            "primary":true
          }
        ]
      }
    }
  ]
}
```

### Parameters

`refresh` _optional_
: `boolean` Possible values:
   - `true`: If set to `true`, data is fetched via NPCI. We recommend passing this as `true` when customers are trying to link their bank accounts. 
   - `false`: Data stored at PSP is fetched.

`upi_iin` _mandatory_
: `string` IIN of the bank returned in the response of the Fetch Fund Source Providers API. Use the IIN of the bank selected by the customer. IIN is not mandatory if this parameter value is `false`.

`skip` _optional_
: `integer` Number of entities to skip. Default is `10`. You can use this parameter for pagination in combination with skip.

`count` _optional_
: `integer` Number of entities to fetch. Default is `0`. You can use this parameter for pagination in combination with count.

`device_ip` _optional_
: `string` IP address of the device. For example, `123.456.123.123`.

`device_geocode` _optional_
: `string` Location coordinates of the device. For example, `12.9667,77.5667`.

### Parameters

`entity`
: `string` This refers to the collection of entity. Here, it is `collection`.

`count`
: `integer` Indicates the number of items in the entity type.

`items`
: `array` Indicates a list of objects.

  `entity`
  : `string` Indicates the entity type name. In this case `fundsource`.

  `id`
  : `string` A unique identifier of the entity.

  `type`
  : `string` Type of account. For example, savings, credit and so on.

  `customer_name`
  : `string` Account holder's name.

  `masked_account_number`
  : `string` Masked account number.

  `account_reference_number`
  : `string` Indicates the account reference number.

  `ifsc`
  : `string` IFSC of the bank.

  `upi_pin_set`
  : `boolean` Indicates if the UPI PIN is set. Possible values:
    - `true`: PIN is set.
    - `false`: PIN is not set.

  `upi_pin_length`
  : `integer` Indicates the length of the UPI PIN.

  `otp_length`
  : `integer` Indicates the length of the OTP.

  `atm_pin_length`
  : `integer` Indicates the length of the ATM PIN.

  `fundsource_provider`
  : `object` Payment sources provider details. If the payment source is a bank, payment source providers will be bank account information.

    `name`
    : `string` Name of the payment source (bank account) provider.

    `upi_iin`
    : `string` The UPI Issuer Identification Numbers (IIN) of the payment source provider issued by NPCI.

    `upi_enabled`
    : `boolean` Indicates if UPI is enabled. Possible values:
       - `true`: UPI is enabled.
       - `false`: UPI is not enabled.

    `mobile_registration_format`
    : `string` Indicates the format as defined by NPCI - `format1`, `format2` and so on.

    `logo_url`
    : `string` Field to take the bank URL input.

  `vpas`
  : `array` The collection of the VPAs linked to the payment source.

    `entity`
    : `string` The entity type name. Here, it is `collection`.

    `count`
    : `integer` Indicates the number of items in the entity type.

    `items`
    : `array` UPI details.

      `mobile`
      : `string` The mobile number of the VPA linked to the payment source.

      `address`
      : `string` The address of the VPA linked to the payment source.

      `status`
      : `string` The status of the VPA linked to the payment source.

      `primary`
      : `boolean` Indicates if the VPA is linked to the payment source marked as primary. Possible values:
        - `true`: VPA is linked to the payment source.
        - `false`: VPA is not linked to the payment source.
