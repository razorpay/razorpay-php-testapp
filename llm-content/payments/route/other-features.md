---
title: Other Features
---

# Other Features

## Linked Account API Access

You can access the various Razorpay APIs as a linked account. This allows
you to, for example, fetch a list of all the payments received by a linked
account using the `GET \payments` API. To achieve this, you need to send the
linked account ID in the `X-Razorpay-Account` API request header, as shown in
the cURL example given below:

```curl
curl https://api.razorpay.com/v1/payments \
   -u {KEY}:{SECRET} \
   -H "X-Razorpay-Account: acc_a1b2c3d4e5f6g7"
```

The request given above will fetch the list of payments for account_id -
`acc_a1b2c3d4e5f6g7`
