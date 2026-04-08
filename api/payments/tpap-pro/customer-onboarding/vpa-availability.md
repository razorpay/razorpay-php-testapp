---
title: Check VPA Availability
description: Check if VPA is available using the Razorpay TPAP Pro API.
---

# Check VPA Availability

## Check VPA Availability

Use this endpoint to check if the VPA is available. If available, you can link it to the payment source. Otherwise, try searching for another available VPA before linking it.

The default VPA logic is (mobile number)@handle. For example, `9000090000@airtelbank`. Multiple TPAPs can use the same logic. Hence, the requested VPA may be not available. Therefore, we need to expose a functionality to check whether a VPA is available.

### Request

```curl: Curl
curl -X GET 'api.rzp..com/v1/upi/tpap/vpa/available' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H "Content-type: application/json" \
-H "x-device-fingerprint: " \
-H "x-device-fingerprint-timestamp: 1496918882000" \
-H "x-customer-reference: customer-id-from-customer" \
-d '{
  "vpa": "customer@handle"
  }'
```

### Response

```json: Response
{
  "available":true,
  "mobile":"919999999999",
  "vpa_suggestions":[
    "sample@vpa"
  ]
}
```

### Parameters

`vpa` _mandatory_
: `string` The VPA. You must generate this VPA for customers and check if it is available before trying to link it to the payment source (bank account).

### Parameters

`available`
: `boolean` Indicates whether the VPA is available. Possible values:
  - `true`: VPA is available.
  - `false`: VPA is not available.

`mobile`
: `string` Mobile number of the customer.

`vpa_suggestions`
: `array` List of VPA suggestions.
