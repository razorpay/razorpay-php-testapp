---
title: Fetch Mandates
description: Fetch mandates using the Razorpay TPAP Pro API.
---

# Fetch Mandates

## Fetch Mandates

&refresh=true">
Use this endpoint to fetch all mandates.

### Request

```curl: Curl
curl -X GET 'api.rzp..com/v1/upi/tpap/mandate?umn=&refresh=true' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
```

### Response

```json: Success
{
  "entity": "upi.mandate",
  "reference_id": "TXN1234567",
  "upi_transaction_id": "RZP1KuSUGrp2l6MmPuT0163789452QPAY02",
  "amount": 1722,
  "amount_rule": "exact | max",
  "currency": "inr",
  "payee": {
    "vpa": "acme.corp@rzp",
    "name": "AcmeCorp Pvt. Ltd.",
    "mcc": "6765"
  },
  "payer": {
    "vpa": "7262093972.stage@rzp",
    "fundsource": {
      "id": "fs_1234567"
    }
  },
  "name": "Name of the Mandate",
  "expire_at": 1722317078,
  "block_fund": false,
  "revocable_by_payer": true,
  "recurrence": {
    "period": "onetime|daily|weekly|fortnightly|monthly|bimonthly|quarterly|halfyearly|yearly|aspresented",
    "rule": "on | before | after",
    "value": 1
  },
  "validity": {
    "start_at": 1722317078,
    "end_at": 1722317078
  },
  "upi_reference_category": "02",
  "upi_reference_url": "https://www.abcxyz.com/",
  "description": "Sample Mandate Request",
  "upi_credentials": {}, // Upi credentials received from WebCL
  "upi_initiation_mode": "00",
  "upi_purpose_code": "00",
  "share_to_payee": true,
  "umn": "umn"
}
```json: Failure
{
  "error":{
    "code":"BAD_REQUEST_ERROR",
    "description":"Amount if mandatory",
    "source":"internal",
    "step":"",
    "reason":"Amount must be greater than 0",
    "field":"amount",
    "metadata":null
  }
}
```

### Parameters

`umn` _mandatory_
: `string` The Unique Mandate Number returned in the create mandate API response.

### Parameters

`entity`
: `string` The entity type.

`umn`
: `string` The Unique Mandate Number, assigned to each mandate, used to track, manage, and reference specific mandates. The switch will create a UUID-based UMN of 32 characters. The UMN should be random, unique, secure, and active. For example, `XYZa977ccabb11e7abc4cec278b6b50a@mypsp`. The total length of the UMN address should be 70 digits.

`reference_id`
: `string` Indicates your reference ID. In mandates, it is mandate id stored at the business side.

`upi_transaction_id`
: `string` The unique identifier of the transaction across all entities in UPI is created by the originator. In payments, the lifecycle starts from CL, so it is mandatory for the originator to create it. All further actions regarding this payment will be done using this ID.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   This value should be alphanumeric and a maximum of 35 characters are allowed. The value must start with a prefix given by NPCI to Switch.
>   

`amount`
: `integer` The amount of the mandate.

`amount_rule` _mandatory_
: `string` If this parameter value is max, the mandated amount can be less than or equal to the specified amount. If it is set to exact, the mandated amount should be the exact amount specified.

`currency`
: `string` The currency of the mandate. Here, it is `INR`.

`payee`
: `object` The payee details.

  `vpa`
  : `string` The VPA of the payee.
  
  `name`
  : `string` The name of the payee.

  `mcc`
  : `string` The merchant categorisation code of the payee.

`payer`
: `object` The payer details.

  `vpa`
  : `string` The VPA of the payer.

`name`
: `string` The name of the mandate.

`expire_at`
: `integer` The UNIX timestamp indicating the expiry date of the mandate.

`block_fund`
: `boolean` Indicates whether the customer's funds should be blocked. This is applicable only for one-time mandates. For recurring, it always must be set to false. For one-time mandates, it can be either true or false. The default is.
  - `true`: The customer must be blocked.
  - `false`: The customer must not be blocked.

`revocable_by_payer`
: `boolean` Indicates whether the payer can revoke the mandate. This is applicable only for one-time mandates. For recurring, it always must be set to true. For one-time mandates, it can be either true or false. Default is true.
  - `true`: The payer can revoke the mandate.
  - `false`: The payer cannot revoke the mandate.

`recurrence`
: `object` The recurring details of the mandate.

  `period`
  : `string` Indicates how often you can execute the mandate. Possible values:
    - `onetime`: This is for a one-time mandate. The customer provides authorisation to debit their account a single time for a specific amount.
    - `daily`: Recurring mandate. The customer provides authorisation to debit their account daily for a specific amount.
    - `weekly`: Recurring mandate. Authorisation given by a customer to debit their account weekly once for a specified amount.
    - `fortnightly`: Recurring mandate. The customer provides authorisation to debit their account fortnightly for a specific amount.
    - `monthly`: Recurring mandate. The customer provides authorisation to debit their account monthly for a specific amount.
    - `bimonthly`: Recurring mandate. The customer provides authorisation to debit their account bimonthly for a specific amount.
    - `quarterly`: Recurring mandate. The customer provides authorisation to debit their account quarterly for a specific amount.
    - `halfyearly`: Recurring mandate. The customer provides authorisation to debit their account once in every 6 months for a specific amount.
    - `yearly`: Recurring mandate. The customer provides authorisation to debit their account once a year for a specific amount.
    - `aspresented`: In this case the  mandates are triggered by merchants when they want to. The customer provides authorisation to debit their account whenever there is an execution request.

  `rule`
  : `string` Indicates the recurrence rule of the mandate. This rule is not required for `onetime`, `daily`, and `aspresented` recurrence patterns. Possible values: 
    - `on`
    - `before`
    - `after`

  `value`
  : `integer` The recurrence value of the mandate. It is not required for `onetime`, `daily` and `aspresented` frequencies. Possible values:
    - `weekly`: The value should be 1-Monday to 7-Sunday.
    - `fortnightly`: The value should be 1 to 15/16 days.
    - `monthly`, `bimonthly`, `quarterly`, `halfyearly` or `yearly`: The value should be 1 to 30/31 days.

`validity`
: `object` The mandate validity details.

  `start_at`
  : `integer` The UNIX timestamp indicating the start date of the mandate.

  `end_at`
  : `integer` The UNIX timestamp indicating the end date of the mandate.

`upi_reference_category`
: `string` The 2-digit code defined by NPCI present in the intent URL or QR codes. Possible values:
  - `00`: NULL
  - `01`: Advertisement
  - `02`: Invoice

`upi_reference_url`
: `string` Indicates a URL that, upon clicking, provides the customer with further transaction details such as bill details, bill copy, order copy, ticket details, and so on. When used, this URL should be related to the particular transaction and not be used to send unsolicited information irrelevant to the transaction.

`description`
: `string` The description of the mandate.

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

`upi_response_code`
: `string` The response code issued by NPCI to the payer.

`share_to_payee`
: `boolean` Indicates whether the mandate is shared with the payee. This is required only for onetime mandates initiated by the payer. For recurring mandates, you must set it to true. For onetime mandates, it can be either `true` or `false`. Default is true. Possible values:
  - `true`: Mandate is shared.
  - `false`: Mandate is not shared.

`status`
: `string` Indicates the mandate status. Possible values:
  - `initiated`: The mandate has been created and is awaiting a status update from NPCI.
  - `active`: The mandate creation is successful. The mandate becomes active when NPCI sends a successful response in RespMandate.
  - `completed`: This is a terminal state. The mandate can be completed in two cases.
    - If the mandate reaches its validity end date.
    - If the mandate has been revoked by a payer or a payee.
  - `paused`: The customer has paused the mandate.
  - `failed`: The mandate creation was unsuccessful. This is a terminal state, the client has to create a new mandate if failed.
