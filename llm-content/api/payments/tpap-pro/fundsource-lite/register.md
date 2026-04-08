---
title: Register Fundsource Lite
description: Activate a UPI Lite service account using the Razorpay Fundsource Lite API.
---

# Register Fundsource Lite

## Register Fundsource Lite

Use this endpoint to activate a Fundsource Lite account.

### Request

```curl: Curl  
curl -X POST 'https://api.rzp..com/v1/upi/tpap/fundsource_lite' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: cust_ref" \
-d '{
  "upi_transaction_id": "123qwert12",
  "operation_type": "registration",
  "challenge": "string",
  "fundsource_id": "fs_id"
}'
```

### Response

```json: Success  
{
  "entity": "upi.fundsource_lite",
  "id": "lite_id",
  "upi_lite_reference_number": "1234567890",
  "upi_transaction_id": "RZP1KuSUGrp2l6MmPuT0163789452QPAY02",
  "status": "active",
  "upi_keys": "xml keys from NPCI without tampering",
  "fundsource": {
    "id": "fs_1234",
    "entity": "upi.fundsource",
    "type": "savings",
    "customer_name": "Gaurav Kumar",
    "masked_account_number": "XXXXXX5199",
    "account_reference_number": "999988126236990",
    "ifsc": "HDFC000001",
    "upi_pin_set": true,
    "upi_pin_length": 6,
    "otp_length": 6,
    "atm_pin_length": 4,
    "fundsource_provider": {
      "name": "HDFC Bank",
      "upi_iin": "600007",
      "upi_enabled": false,
      "mobile_registration_format": "format1",
      "logo_url": "",
      "upi_lite_allowed": true
    },
    "vpas": {
      "entity": "collection",
      "count": 1,
      "items": [
        {
          "mobile": "9999999999",
          "address": "vpa@handle",
          "status": "active",
          "primary": true
        }
      ]
    }
  }
}
```

### Parameters

`upi_transaction_id` _mandatory_
: `string` Unique identifier of the transaction across UPI entities. Must start with a Switch-issued prefix. For example, `123qwert12`.

`operation_type` _mandatory_
: `enum` Type of operation being performed. Possible values: 
    - `registration`
    - `rotation`

`challenge` _mandatory_ 
: `string` Challenge received from common library during get challenge process.

`fundsource_id` _mandatory_
: `string` Fundsource id for which Lite is to be enabled.

### Parameters

`entity`
: `string` Name of the entity. Here it is `upi.fundsource_lite`.

`id`
: `string` Unique identifier for the Fundsource Lite entity.

`upi_lite_reference_number`
: `string` Reference number for the Lite account, assigned by the originator.

`upi_transaction_id`
: `string` Unique UPI transaction identifier.

`status`
: `string` Current status of the UPI Lite account. Possible values: 
    - `initiated`
    - `active`
    - `deregistered`

`upi_keys`
: `string` XML credentials from NPCI used by common library.

`fundsource`
: `object` The fundsource for which Lite is enabled.

    `id`
    : `string` Unique identifier of the fundsource.

    `entity`
    : `string` Name of the entity. Here it is `fundsource`.

    `type`
    : `string` Account type.

    `customer_name`
    : `string` Name of the customer.

    `masked_account_number`
    : `string` Masked version of the customer's account number.

    `account_reference_number`
    : `string` Reference number assigned to the customer's account.

    `ifsc`
    : `string` IFSC code of the account.

    `upi_pin_set`
    : `boolean` Indicates whether UPI PIN is already set.
      - `true`: UPI PIN is already set.
      - `false`: UPI PIN is not set.

    `upi_pin_length`
    : `integer` Length of UPI PIN.

    `otp_length`
    : `integer` OTP length used during registration.

    `atm_pin_length`
    : `integer` ATM PIN length of the account.

    `fundsource_provider`
    : `object` Details of the bank.

        `name`
        : `string` Name of the bank.

        `upi_iin`
        : `string` UPI IIN code assigned to the provider by NPCI.

        `upi_enabled`
        : `boolean` Indicates whether UPI is enabled for the provider. Possible values:
          - `true`: UPI is enabled.
          - `false`: UPI is not enabled.

        `mobile_registration_format`
        : `string` Mobile registration format supported.

        `logo_url`
        : `string` URL to the provider's logo.

        `upi_lite_allowed`
        : `boolean` Indicates whether the UPI Lite is allowed by the bank. Possible values:
          - `true`: UPI Lite is allowed.
          - `false`: UPI Lite is not allowed.

    `vpas`
    : `object` Collection of VPAs for the fundsource.

        `entity`
        : `string` Name of the entity. Here it is `collection`.

        `count`
        : `integer` Total number of VPA items.

        `items`
        : `array` Array of VPA objects.

            `mobile`
            : `string` Registered mobile number.

            `address`
            : `string` UPI VPA address.

            `status`
            : `string` Status of the VPA. Possible values: 
                - `active`
                - `inactive`

            `primary`
            : `boolean` Indicates where the VPA is primary.
              - `true`: VPA is primary.
              - `false`: VPA is not primary.
