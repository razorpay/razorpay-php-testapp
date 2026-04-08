---
title: Testing
description: Create and manage your Razorpay Customer Identifiers in test mode before you start making and receiving actual payments.
---

# Testing

You can create and manage your BQR code in test mode before you start receiving actual transactions.

## Test Payments
Test payments can be initiated towards any BQR code created in test mode, using the BharatQR test payment route.

### Request Parameters

`reference`
: `string` The unique identifier of the QR code that receives the test payment. Length should be 17. For example, `qr_4lsdkfldlteskf`.

`amount` 
: `integer` Amount of the payment in Paise.

`method` 
: `string` Payment method for the test payment. Can have the following values: `card` or `upi`.

```curl: Test Payment
curl -u : \
   -X POST https://api.razorpay.com/v1/bharatqr/pay/test \
   -H "Content-Type: application/json" \
   -d '
    {
      "reference": "qr_4lsdkfldlteskf",
      "amount": 500,
      "method": "card"
    }'
```

This will trigger the same webhook notifications that a live payment made via BharatQR code would.
