---
title: Make a Payment
description: Make a payment using the Razorpay API.
---

# Make a Payment

## Make a Payment

Use this endpoint to make payments from a payer to a payee. The first step of making a payment is to capture the UPI PIN.

### Request

```curl: Curl
curl -X POST 'api.rzp..com/v1/payments/pay' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "upi_transaction_id": "RZP1KuSUGrp2l6MmPuT0163789452QPAY02",
  "reference_id": "RSKwpINfSkdEvtdxf",
  "upi_initiation_mode": "00",
  "upi_purpose_code": "00",
  "upi_reference_url": "https://www.test.com",
  "upi_reference_category": "00",
  "device": {
    "geocode": "1234.1213",
    "ip": "198.1.1.1"
  },
  "currency": "INR",
  "amount": 100,
  "description": "UPI transaction",
  "payer": {
    "fundsource_id": "fs_Mock14charID"
  },
  "upi_credentials": {},
  "payees": [
    {
      "vpa": "9560137963.stage@rzp"
    }
  ]
}'
```

### Response

```json: Response
{
  "entity":"upi.payment",
  "upi_transaction_id":"RZPc2ed455b797e4add8392110cfc528acc",
  "reference_id":"ord_somfv432nsa",
  "upi_customer_reference_number":"804813039157",
  "upi_reference_url":"https://www.test.com",
  "upi_reference_category":"00",
  "upi_initiation_mode":"00",
  "upi_purpose_code":"00",
  "currency":"INR",
  "amount":10024,
  "type":"pay | collect",
  "description":"flight tickets",
  "payer":{
    "vpa":"gaurav.kumar@exampleupi",
    "fundsource":{
      "ifsc":"AXIS0000058",
      "masked_account_number":"XXXXXXXXXXX3000"
    },
    "name":"Gaurav Kumar",
    "mcc":"0000",
    "upi_response_code":"00",
    "upi_reversal_response_code":"string"
  },
  "payees":[
    {
      "vpa":"acme.corp@rzp",
      "fundsource":{
        "ifsc":"HDFC0000058",
        "masked_account_number":"XXXXXXXXXXX6000"
      },
      "name":"AcmeCorp Pvt. Ltd.",
      "mcc":"6765",
      "upi_response_code":"00",
      "upi_reversal_response_code":"string"
    }
  ],
  "status":"pending | success | failed",
  "created_at":"1722317078"
}
```

### Parameters

`upi_transaction_id` _mandatory_
: `string` The unique identifier of the transaction across all entities in UPI is created by the originator. In payments, the lifecycle starts from CL, so it is mandatory for the originator to create it. All further actions regarding this payment will be done using this ID.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   This value should be alphanumeric and a maximum of 35 characters are allowed. The value should start with a prefix given by NPCI to Switch.
>   

`reference_id` _optional_
: `string` Indicates the transaction ID used by businesses for their reference. It is used at the business level and not in the UPI ecosystem. This value should be alphanumeric and between 1 and 35 characters.

`upi_initiation_mode` _optional_
: `enum` Indicates the 2-digit code defined by NPCI present in the intent URL or QR codes. Possible values:
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

`upi_reference_url` _mandatory_
: `string` Indicates a URL that, upon clicking, provides the customer with further transaction details such as bill details, bill copy, order copy, ticket details, and so on. When used, this URL should be related to the particular transaction and not be used to send unsolicited information irrelevant to the transaction.

`upi_reference_category` _mandatory_
: `string` The 2-digit code defined by NPCI present in the intent URL or QR codes. Possible values:
  - `00`: NULL
  - `01`: Advertisement
  - `02`: Invoice

`device` _mandatory_
: `object` The device details.

  `geocode`
  : `string` The location coordinates of the device.

  `ip`
  : `string` The IP address of the device.

`currency` _mandatory_
: `string` The currency of the amount. Here, it is `INR`.

`amount` _mandatory_
: `integer` The amount in paise.

`description` _optional_
: `string` The description of the payment.

`payer` _mandatory_
: `object` The payer details.

  `fundsource_id`
  : `string` The payment source identifier used to make the payment.

`upi_credentials` _mandatory_
: `object` Encrypted credentials as created by NPCI.

`payees` _mandatory_
: `array` The payee details.

`vpa`
: `string` The VPA of the payee.

### Parameters

`entity`
: `string` The entity type. Here, it is `payment`.

`upi_transaction_id`
: `string` The unique identifier of the transaction across all entities in UPI is created by the originator. In payments, the lifecycle starts from CL, so it is mandatory for the originator to create it. All further actions regarding this payment will be done using this ID.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   This value should be alphanumeric and a maximum of 35 characters are allowed. The value should start with a prefix given by NPCI to Switch.
>   

`reference_id`
: `string` Indicates the transaction ID used by merchants for their reference. It is used at the business level and not in the UPI ecosystem. This value should be alphanumeric and between 1 and 35 characters.

`upi_customer_reference_number`
: `string` Indicates the UPI customer reference number. This is present in bank account statements as UTR. Additionally, this ID is shared with customers on TPAPs.

`upi_reference_url`
: `string` Indicates a URL that, upon clicking, provides the customer with further transaction details such as bill details, bill copy, order copy, ticket details, and so on. When used, this URL should be related to the particular transaction and not be used to send unsolicited information irrelevant to the transaction.

`upi_reference_category`
: `string` The 2-digit code defined by NPCI present in the intent URL or QR codes. Possible values:
  - `00`: NULL
  - `01`: Advertisement
  - `02`: Invoice

`upi_initiation_mode`
: `enum` Indicates the 2-digit code defined by NPCI present in the intent URL or QR codes. Possible values:
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
: `string` The currency of the amount. Here, it is `INR`.

`amount`
: `integer` The amount in paise.

`type`
: `string` The type of the payment. Possible values:
  - `pay`
  - `collect`

`description`
: `string` The description of the payment.

`payer`
: `object` The payer details.

  `vpa`
  : `string` The VPA of the payer.

  `fundsource`
  : `object` The payer's payment source details.

    `ifsc`
    : `string` The IFSC of the payment source.

    `masked_account_number`
    : `string` The masked account number of the payment source.

  `name`
  : `string` The name of the payer.

  `mcc`
  : `string` The merchant categorisation code of the payer.

  `upi_response_code`
  : `string` The response code issued by NPCI to the payer.

  `upi_reversal_response_code`
  : `string` The reversal response code issued by NPCI to the payer. This is an optional parameter received as a response.

`payees`
: `object` The payee details.

  `vpa`
  : `string` The VPA of the payee.

  `fundsource`
  : `object` The payer's payment source details.

    `ifsc`
    : `string` The IFSC of the payment source.

    `masked_account_number`
    : `string` The masked account number of the payment source.
  
  `name`
  : `string` The name of the payee.

  `mcc`
  : `string` The merchant categorisation code of the payee.

  `upi_response_code`
  : `string` The response code issued by NPCI to the payee.

  `upi_reversal_response_code`
  : `string` The reversal response code issued by NPCI to the payee. This is an optional parameter received as a response.

`status`
: `string` The status of the payment. Possible values:
  - `created`
  - `initiated`
  - `pending`
  - `success`
  - `failed`

`created_at`
: `integer` The UNIX timestamp of the payment creation.
