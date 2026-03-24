---
title: QR Codes Webhook Events
description: List of QR Codes webhook events along with sample payloads.
---

# QR Codes Webhook Events

**QR Codes** are scannable two-dimensional barcodes that store payment details, enabling businesses to accept UPI payments seamlessly through customer scans.

## List of QR Codes Webhook Events

The table below lists the webhook events available for QR Codes.

Webhook Events | Description
---
`qr_code.created` | Triggered when a QR code is created.
---
`qr_code.credited` | Triggered when a payment is made using a QR code.
---
`qr_code.closed` | Triggered when a QR code is closed.

## Sample Payloads

Given below are the sample payloads for QR Codes webhook events.

### QR Code Created

@include qr-codes/qr-codes-created-payload

### QR Code Credited

@include qr-codes/qr-codes-credited-payload

### QR Code Closed

> **WARN**
>
> 
> **Watch Out!**
> 
> The webhook is activated only when the QR Code is closed manually. It is not triggered when the QR Code auto-expires.
> 

@include qr-codes/qr-codes-closed-payload
