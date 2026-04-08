---
title: De-register Devices
description: De-register devices using the Razorpay TPAP Pro API.
---

# De-register Devices

## De-register Devices

TPAP should de-register the device at Razorpay's end by calling this API whenever the customer removes the SIM from their mobile application. It can also be used in general to de-register the device. On de-registration, the customer's device binding, all VPAs, all fund sources, and their mappings are deleted. Use this endpoint to de-register the device.

### Request

```curl: Curl
curl -X POST 'api.rzp..com/v1/upi/tpap/devices/deregister' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
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
  "status": "device_deregistered",
  "mobile": "987654321",
  "uuid": "",
  "app": "test.merchant.upi.com",
  "ssid": "123456789",
  "manufacturer": "samsung",
  "model": "Galaxy S23",
  "os": "android",
  "os_version": "Dev12345"
}

```

### Parameters

`uuid` _mandatory_
: `string ` The unique identifier of the device. For example, `advertising_id` or `android_id`.

`app` _mandatory_
: `string` The application package name.

`ssid` _mandatory_
: `string` The SIM identifier.

`manufacturer` _mandatory_
: `string` The device manufacturer.

`model` _mandatory_
: `string` The model of the device.

`os` _mandatory_
: `string` The operating system running on the device.

`os_version` _mandatory_
: `string` The version of the operating system.

### Parameters

`status`
: `enum` Status of the de-registration. Possible values:
    - `device_deregistered`
    - `device_deregisteration_failed`

`uuid`
: `string` The unique identifier of the device. For example, `advertising_id` or `android_id`.

`app`
: `string` The application package name.

`ssid`
: `string` The SIM identifier.

`manufacturer`
: `string` The phone manufacturer.

`model`
: `string` The model of the phone.

`os`
: `string` The operating system running on the device.

`os_version`
: `string` The version of the operating system on the device.
