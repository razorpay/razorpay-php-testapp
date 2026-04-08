---
title: Get a Mobile Number Verification Token
description: Get a mobile number verification token using the Razorpay API.
---

# Get a Mobile Number Verification Token

## Get a Mobile Number Verification Token

Use this endpoint to get a mobile number verification token.

### Request

```curl: Request
curl -X POST 'api.rzp..com/v1/upi/tpap/mobile/verification' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-customer-reference: 919999999999" \
-d '{
  "device":{
    "uuid":"",
    "app":"app.merchant.upi.com",
    "ssid":"123456789",
    "manufacturer":"samsung",
    "model":"Galaxy S23",
    "os":"android",
    "os_version":"Dev12345",
    "ip":"ip of the device",
    "geocode":"geographical code of the device"
    },
  "verification_type":"sms",
  "mobile":"91999999999",
  "network_provider":"vodafone"
}'
```

### Response

```json: Response
{
  "verification_type":"sms",
  "sms":{
    "content":"UPIACT ad56ef90396348bac56099",
    "receiver_number":[
      {
        "network_provider":"vodafone",
        "mobile":"09988776655"
      },
      {
        "network_provider":"airtel",
        "mobile":"09876543210"
      }
    ]
  },
  "expire_at":1715836058
}
```

### Parameters

`customer_reference` _mandatory_
: `string` The unique identifier the merchant has created for the customer. This should be passed as a header. Know more about [headers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md#header-information).

`device` _mandatory_
: `object` The device details.

  `uuid`
  : `string` The unique identifier of the device. For example, `advertising_id`.

  `app`
  : `string` The package name for the app.

  `ssid`
  : `string` The service set identifier (unique network identifier).
  
  `manufacturer`
  : `string` The phone manufacturer.

  `model`
  : `string` The phone model. For example, `Galaxy S23`.

  `os`
  : `string` The operating system running on the device.

  `os_version`
  : `string` The version of the operating system.

  `ip`
  : `string` IP address of the device.

  `geocode`
  : `string` The geocode of the device.

`verification_type` _mandatory_
: `string` The verification type. Possible value is `sms`.

`mobile` _mandatory_
: `string` The mobile number.

`network_provider` _mandatory_
: `string` Network provider on the selected mobile number.

### Parameters

`verification_type`
: `string` The verification type.

`sms`
: `object` Details required for verification via SMS.

  `content`
  : `string` The SMS token sent through customer's phone to verify the mobile number.

  `receiver_number`
  : `list` Contains the data for receiver numbers to whom the SMS content should be sent to for verifying the mobile.

    `network_provider`
    : `string` Information about the network provider who verifies the mobile number.

    `mobile`
    : `string` The number of the network provider the SMS is sent to verify the mobile number.

`expire_at`
: `string` The expiry time of the verification request in UNIX timestamp.
