---
title: Migrate from UPI Collect to UPI Intent/QR Code - S2S Integration
description: According to NPCI guidelines, the UPI Collect flow is deprecated. Update your S2S integration to use UPI Intent or UPI QR code.
---

# Migrate from UPI Collect to UPI Intent/QR Code - S2S Integration

According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026 to align with the latest ecosystem compliance standards and ensure higher transaction success rates. Customers can no longer make payments by manually entering VPA/UPI id/mobile numbers.

- If you are a new customer, use [UPI Intent](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md). 
- If you are an existing customer, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments.

#### Exemptions

UPI Collect will continue to be supported for:
- MCC 6012 & 6211 (IPO and secondary market transactions).
- iOS mobile app and mobile web transactions.
- UPI Mandates (execute/modify/revoke operations only)
- eRupi vouchers.
- PACB businesses (cross-border/international payments).

## UPI Collect Flow Configuration

To migrate from UPI Collect, you need to remove the UPI Collect flow configuration from your API calls and replace it with UPI Intent.

### Step 1: Remove UPI Collect

Based on your API endpoint, remove the following UPI Collect configuration:

- For `/v1/payments/create/json` and `/v1/orders` endpoints:
```json
// Remove this configuration
"upi": {
  "flow": "collect",
  "vpa": "user@upi"
}
```

- For `/v1/payments/create/upi` endpoint:
```json
// Remove this configuration
"upi": {
  "flow": "collect",
  "vpa": "gauravkumar@exampleupi",
  "expiry_time": 5
}
```

### Step 2: Add UPI Intent

Replace the above configuration with UPI Intent:
```json
"upi": {
  "flow": "intent"
}
```

## Migration Steps by Platform

Follow the platform-specific implementation details below:

    
### Web (Desktop Web)

         After updating your API configuration to use UPI Intent (as shown above), the UPI QR code will be generated for desktop web users.

         **Supported API Endpoints:**
         - `https://api.razorpay.com/v1/payments/create/json`
         - `https://api.razorpay.com/v1/orders`
         - `https://api.razorpay.com/v1/payments/create/upi`

         Refer to the [UPI Intent documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md) for implementation details.
        

    
### Mobile Web and WebView

         After updating your API configuration to use UPI Intent (as shown above), follow these additional steps:

         1. Use the Intent flow API instead of the Collect flow API.
         2. Once the intent URL is generated, you can:
            - Embed the URL into a QR code that you generate on your end, or
            - Use the returned deeplink directly to initiate the UPI Intent flow.

         Refer to the [UPI Intent documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md) for implementation details.
