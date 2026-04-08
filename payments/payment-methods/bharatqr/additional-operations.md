---
title: Additional Operations
---

# Additional Operations

Razorpay lets you perform few additional operations around your BQR-based payment.

## Sharing

The QR code can be shared using `short_url`. The QR code gets downloaded by clicking on link.

```
short_url: rzp.io/i/XXXXX
```

The customer can embed the QR code image from this URL onto any preferred platform such as invoice, standee or ID card and start accepting payments.

## Refunds

You can create refunds for the payments received on your QR Code. When a payment is received via
UPI or Cards, it will be labeled as refund on the customer’s bank statement, crediting the refunded amount back to his/her account. Refunds are generally processed within 3-5 business days. The platform fee and GST charged on successful transactions will not be reversed in case of refunds.
