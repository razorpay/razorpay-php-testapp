---
title: Migrate from UPI Collect to UPI Intent/QR Code - Custom Checkout
description: According to NPCI guidelines, the UPI Collect flow is deprecated. Update your Custom Checkout integration to use UPI Intent or UPI QR code.
---

# Migrate from UPI Collect to UPI Intent/QR Code - Custom Checkout

According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026 to align with the latest ecosystem compliance standards and ensure higher transaction success rates. Customers can no longer make payments by manually entering VPA/UPI id/mobile numbers.

- If you are a new customer, use [UPI Intent](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods/#intent-flow.md). 
- If you are an existing customer, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments.

#### Exemptions

UPI Collect will continue to be supported for:
- MCC 6012 & 6211 (IPO and secondary market transactions).
- iOS mobile app and mobile web transactions.
- UPI Mandates (execute/modify/revoke operations only)
- eRupi vouchers.
- PACB businesses (cross-border/international payments).

## UPI Collect Flow Configuration

To migrate from UPI Collect, you need to remove the UPI Collect flow configuration from your `razorpay.js`:
```json
// Remove this configuration
upi: {
  vpa: "success@razorpay",
  flow: "collect"
}
```

This will disable the UPI Collect flow from your checkout.

## Migration Steps by Platform

Follow the platform-specific steps below to enable the alternative UPI payment method:

    
### Web

         After removing the UPI Collect configuration, enable [UPI QR code](https://razorpay.com/docs/payments/payment-gateway/web-integration/custom/payment-methods/#redirect-flow) to accept UPI payments.

         
> **WARN**
>
> 
>          **Important Note**
> 
>          UPI Intent is not supported on web.
>          

        

    
### Mobile Web

         After removing the UPI Collect configuration, integrate [UPI Intent on mobile web](https://razorpay.com/docs/payments/payment-gateway/web-integration/custom/payment-methods/upi-intent-mweb/).
        

    
### WebView

         After removing the UPI Collect configuration, enable [UPI Intent on webview](https://razorpay.com/docs/payments/payment-gateway/web-integration/custom/features/webview/upi-intent-android/).
        

> **INFO**
>
> 
> **Handy tips**
> 
> The **Save VPA** and **Validate VPA** features will not be available since the Collect flow is disabled. These features work only with the UPI Collect flow.
>
