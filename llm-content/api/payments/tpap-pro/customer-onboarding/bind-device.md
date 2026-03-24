---
title: Bind the Device
description: Bind the device using the Razorpay TPAP Pro API.
---

# Bind the Device

## Bind the Device

Use this endpoint to bind the device.

### Request

```curl: Request
curl -X POST 'api.rzp..com/v1/upi/tpap/devices/bind' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "mobile":"91999999999",
  "verification_type":"sms",
  "sms":{
    "content":"UPIACT ad56ef90396348bac56099"
  },
  "uuid":"",
  "app":"test.merchant.upi.com",
  "ssid":"123456789",
  "manufacturer":"samsung",
  "model":"Galaxy S23",
  "os":"android",
  "os_version":"Dev12345"
}'
```

### Response

```json: Response
{
  "entity":"upi.device",
  "mobile":"999999999",
  "uuid":"",
  "app":"test.merchant.upi.com",
  "ssid":"123456789",
  "manufacturer":"samsung",
  "model":"Galaxy S23",
  "os":"android",
  "os_version":"Dev12345",
  "status":"verified"
}
```

### Parameters

`mobile` _mandatory_
: `string` Mobile number of the customer.

`verification_type` _mandatory_
: `string` The verification type. Possible value is `sms`.

`sms` _mandatory_
: `object` The device details.

  `content`
  : `string` SMS content to be used for device binding of this token as returned by the [Get Verification Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/customer-onboarding/verification-token.md).

`device` _mandatory_
: `object` The device information. This should be the same information sent when you [get the verification token api](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/tpap-pro/customer-onboarding/verification-token.md).

  `uuid`
  : `string` The unique identifier of the device. For example, `advertising_id` or `android_id`.
  
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

### Parameters

`entity`
: `string` Indicates the type of entity. Here it is, `device`.

`mobile`
: `string` The mobile number of the customer.

`uuid`
: `string` The unique identifier of the device. For example, `advertising_id` or `android_id`.

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

`status`
: `string` Device binding status. Know more about the [device binding status](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/tpap-pro/integration-guide.md#device-binding-status).
