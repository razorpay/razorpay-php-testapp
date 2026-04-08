---
title: Top-up Fundsource Lite
description: Add balance to a UPI Lite account using the Razorpay TPAP Pro Fundsource Lite API
---

# Top-up Fundsource Lite

## Top-up Fundsource Lite

Use this endpoint to add balance to Fundsource Lite account.

### Request

```curl: Curl
curl -X POST 'https://api.rzp..com/v1/upi/tpap/payments/pay' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: cust_ref" \
-d '{
  "upi_transaction_id": "RZP1KuSUGrp2l6MmPuT0163789452QPAY02",
  "reference_id": "RSKwpINfSkdEvtdxf",
  "initiation_mode": "QR Code",
  "upi_purpose_code": "42",
  "purpose": "UPI Lite Top Up",
  "device": {
    "geocode": "12.9667,77.5667",
    "ip": "198.1.1.1"
  },
  "currency": "INR",
  "amount": 100,
  "type": "pay",
  "description": "Upi-lite registration",
  "payer": {
    "vpa": "9560137963.stage@rzp",
    "fundsource_id": "fs_Mock14charID"
  },
  "upi_credentials": {
    "MPIN": "{\"type\":\"PIN\",\"subType\":\"MPIN\",\"data\":{\"encryptedBase64String\":\"encrypted_string\",\"code\":\"NPCI\"}}",
    "ARQC": "{\"type\":\"ARQC\",\"subType\":\"initial\",\"data\":{\"encryptedBase64String\":\"encrypted_string\",\"code\":\"NPCI-LITE\"}}"
  },
  "payees": [
    {
      "fundsource_lite_id": "lite_id"
    }
  ]
}'
```

### Response

```json: Success  
{
  "entity": "upi.payment",
  "upi_transaction_id": "RZPc2ed455b797e4add8392110cfc528acc",
  "reference_id": "ord_somfv432nsa",
  "upi_customer_reference_number": "804813039157",
  "upi_reference_url": "https://www.test.com",
  "upi_reference_category": "00",
  "upi_initiation_mode": "00",
  "upi_purpose_code": "42",
  "currency": "INR",
  "amount": 100,
  "type": "pay",
  "description": "flight tickets",
  "payer": {
    "vpa": "gaurav.kumar@exampleupi",
    "fundsource": {
      "ifsc": "AXIS0000058",
      "masked_account_number": "XXXXXXXXXXX3000"
    },
    "name": "Gaurav Kumar",
    "mcc": "0000",
    "upi_response_code": "00",
    "upi_reversal_response_code": "00"
  },
  "payees": [
    {
      "fundsource_lite": {
        "id": "lite_id",
        "upi_lite_reference_number": "1234567890",
        "upi_lite_credentials": {
          "ARPC": "string"
        }
      },
      "name": "Gaurav Kumar",
      "mcc": "0000",
      "response_code": "00",
      "reversal_response_code": "00"
    }
  ],
  "status": "created",
  "created_at": "1653915355",
  "updated_at": "1691097057"
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

`upi_purpose_code` _optional_
: `enum` The 2-digit code defined by NPCI present in the intent URL or QR codes. Possible values:
  - `01`: SEBI
  - `02`: AMC
  - `03`: Travel
  - `04`: Hospitality
  - `05`: Hospital
  - `06`: Telecom
  - `07`: Insurance
  - `08`: Education
  - `09`: Gifting
  - `10`: BBPS
  - `11`: Global UPI
  - `12`: Metro ATM QR
  - `13`: Non-metro ATM QR
  - `14`: Standing Instruction
  - `15`: Corporate disbursement

`purpose` _mandatory_
: `string` The purpose of the payout.

`device`  _optional_
: `object` The device details.

  `ip`
  : `string` The IP address of the device.

  `geocode`
  : `string` The location coordinates of the device. For example, `12.9667,77.5667`.

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. For example, `INR`.

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `10000`

`type` _mandatory_
: `string` Type of transaction. Should be `pay`.

`description` _optional_
: `string` Description of the transaction.

`payer` _mandatory_
: `string` Payer details.

    `vpa` _mandatory_
    : `string` Payer’s VPA.

    `fundsource_id` _mandatory_
    : `string` Fundsource id of payer.

`upi_credentials` _mandatory_
: `object` MPIN and ARQC encrypted credentials.

`payees` _mandatory_
: `string` Payee details.

    `fundsource_lite_id` _mandatory_
    : `string` Fundsource Lite id of the payee.

### Parameters

`entity`
: `string` Name of entity. Here it is, `upi.payment`.

`upi_transaction_id`
: `string` UPI transaction id generated.

`reference_id`
: `string` Merchant reference id.

`upi_customer_reference_number`
: `string` Customer Reference number at NPCI.

`upi_reference_url`
: `string` URL for the payment reference.

`upi_reference_category`
: `string` UPI Reference Category Code.

`upi_initiation_mode`
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

`upi_purpose_code`
: `enum` The 2-digit code defined by NPCI present in the intent URL or QR codes. Possible values:
  - `01`: SEBI
  - `02`: AMC
  - `03`: Travel
  - `04`: Hospitality
  - `05`: Hospital
  - `06`: Telecom
  - `07`: Insurance
  - `08`: Education
  - `09`: Gifting
  - `10`: BBPS
  - `11`: Global UPI
  - `12`: Metro ATM QR
  - `13`: Non-metro ATM QR
  - `14`: Standing Instruction
  - `15`: Corporate disbursement

`currency`
: `string` Currency for transaction (INR).

`amount`
: `string` Transaction amount in paisa.

`type`
: `string` Transaction type.

`description`
: `string` Payment description.

`payer`
: `object` Payer details.

    `vpa`
    : `string` Payer's VPA.

    `fundsource`
    : `object` Payer's bank fundsource.

        `ifsc`
        : `string` Payer's IFSC code.

        `masked_account_number`
        : `string` Masked account number.

`payees`
: `array` List of payee objects.

    `fundsource_lite`
    : `string` Indicates the Lite details.

    `id`
    : `string` Fundsource Lite id.

    `upi_lite_reference_number`
    : `string` Reference number of Lite.

    `upi_lite_credentials`
    : `string` Contains encrypted ARPC proof.

        `ARPC`
        : `string` Authentication Response Code credential.

`status`
: `string` Transaction status. Possible values: 
    - `created`
    - `pending`
    - `success`
    - `failed`

`created_at`
: `integer` UNIX timestamp at which the payment was created.

`updated_at`
: `integer` UNIX timestamp at which the payment was updated.
