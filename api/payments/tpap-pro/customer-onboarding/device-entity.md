---
title: Device Entity
description: Know about device entity parameters and their description.
---

# Device Entity

## Device Entity

The Device entity has the following parameters.

### Response

```json: Entity
{
  "entity":"device",
  "mobile":"999999999",
  "uuid":"",
  "app":"test.merchant.upi.com",
  "ssid":"123456789",
  "manufacturer":"samsung",
  "model":"Galaxy S23",
  "os":"android",
  "os_version":"Dev12345",
  "ip":"ip of the device",
  "geocode":"geocode of the device",
  "status":"mobile_verification_pending"
}
```

### Parameters

`entity`
: `string` Indicates the type of entity. Here, it is `device`.

`mobile`
: `string` The mobile number of the customer.

`uuid`
:  `string` A unique identifier for the device. For example, `advertising_id` or `android_id`.

`app`
: `string` The package name for the app.

`ssid`
: `string` Identifier of the SIM used to send the SMS.

`manufacturer`
: `string` Manufacturer of the device.

`model`
: `string` The device model.

`os`
: `string` The operating system running on the device.

`os_version`
: `string` Version of the operating system on the device.

`ip`
: `string` The IP address of the device.
      
`geocode`
: `string` The geocode of the device.

`status`
: `string` The device binding status.
