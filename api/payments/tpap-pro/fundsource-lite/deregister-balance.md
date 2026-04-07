---
title: Deregister Fundsource Lite with Balance
description: Move balance back to user account and deregister Fundsource Lite account using Razorpay Fundsource Lite API.
---

# Deregister Fundsource Lite with Balance

## Deregister Fundsource Lite with Balance

Use this endpoint to deregister a Fundsource Lite account with balance and move the remaining balance to the user's bank account.

### Request

```curl: Curl
curl -X POST 'https://api.rzp..com/v1/upi/tpap/fundsource_lite/{:lite_id}/deregister' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: cust_ref" \
-d '{
  "upi_transaction_id": "RZP1KuSUGrp2l6MmPuT0163789452QPAY02",
  "reference_id": "RSKwpINfSkdEvtdxf",
  "initiation_mode": "00",
  "device": {
    "geocode": "12.9667,77.5668",
    "ip": "198.1.1.3"
  },
  "currency": "INR",
  "amount": 100,
  "description": "Deregister active Lite account",
  "upi_credentials": {
    "ARQC": "{\"type\":\"ARQC\",\"subType\":\"initial\",\"data\":{\"encryptedBase64String\":\"encrypted_string\",\"code\":\"NPCI-LITE\"}}"
  },
  "payees": [
    {
      "fundsource_id": "fs_Mock14charID"
    }
  ]
}'
```

### Response

```json: Success
{
  "entity": "upi.fundsource_lite",
  "id": "lite_id",
  "upi_lite_reference_number": "1234567890",
  "upi_transaction_id": "RZPc2ed455b797e4add8392110cfc528acc",
  "status": "deregistered",
  "upi_lite_credentials": {
    "ARQC": "string"
  },
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
: `string` Unique UPI transaction id.

`reference_id` _optional_
: `string` Merchant reference id.

`upi_initiation_mode` _optional_
: `enum` Indicates the 2-digit code defined by NPCI. Possible values:
  - `00`: Default - When no specific code is assigned or for general default scenarios.
  - `01`: QR Code - For making payments by scanning a standard QR code.
  - `02`: Secure QR Code - For payments that require additional security with QR codes.
  - `03`: Bharat QR Code - For interoperable payments across various payment networks using Bharat QR.
  - `04`: Intent - For payments initiated by an intent from an application or browser.
  - `05`: Secure Intent - For payments initiated by a secure intent from an app or browser.
  - `06`: NFC (Near Field Communication) - For contactless payments using NFC technology.
  - `07`: BLE (Bluetooth) - For payments made through Bluetooth Low Energy technology.
  - `08`: UHF (Ultra High Frequency) - For payments made using UHF technology, typically for toll payments.
  - `09`: Aadhaar - For payments authenticated using an Aadhaar number and biometric verification.
  - `10`: SDK (Software Development Kit) - For payments initiated through an SDK embedded in an app.
  - `11`: UPI-Mandate - For setting up recurring payments or mandates using UPI.
  - `12`: FIR (Foreign Inward Remittance) - For receiving remittances from foreign countries.
  - `13`: QR Mandate - For setting up recurring payments using a QR code.
  - `14`: BBPS - For making bill payments through the Bharat Bill Payment System.

`device`  _mandatory_
: `object` The device details.

  `ip` _mandatory_
  : `string` The IP address of the device.

  `geocode` _mandatory_
  : `string` The location coordinates of the device. For example, `12.9667,77.5667`.

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. For example, `INR`.

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `10000`

`description` _optional_
: `string` Description of the payment.

`upi_credentials` _mandatory_
: `object` ARQC encrypted credential for authorisation.

  `ARPC`
  : `string` Authentication Response Code credential.

payees _mandatory_
: `string` Payee details.

    `fundsource_id` _mandatory_
    : `string` Fundsource id of the payee.

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

`upi_lite_credentials`
: `object` ARQC encrypted credential for authorisation.

    `ARPC`
    : `string` Authentication Response Code credential.

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
