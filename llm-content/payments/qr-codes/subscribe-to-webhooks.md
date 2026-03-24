---
title: QR Codes | Subscribe to Webhooks
heading: Subscribe to Webhooks
description: Subscribe to various webhook events related to QR Codes to receive instant notifications.
---

# Subscribe to Webhooks

Follow these steps to subscribe to webhook events:
1. Log in to the Dashboard.
2. Navigate to **Account & Settings** → **Webhooks** to subscribe to any of the events mentioned in the following section.

## Webhook Events and Descriptions

Webhook Events | Description
---
`qr_code.created` | Triggered when a QR Code is created.
---
`qr_code.credited` | Triggered when a payment is made using a QR Code.
---
`qr_code.closed` | Triggered when a QR Code is closed.

### Signature Validation

If you need to validate QR Code webhook payloads, please use the following Node.js code:

```nodejs: Node.js

const {validateWebhookSignature} = require('razorpay/dist/utils/razorpay-utils')

webhookBodyNew = JSON.stringify(webhookBody).replace(/\//g, "\\/") 

validateWebhookSignature(webhookBodyNew, webhookSignature, webhookSecret)
```

Know more about [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md) and check the [sample payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/qr-codes.md).

### Related Information
- [QR Code States](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/states.md)
- [QR Code APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/apis.md)
