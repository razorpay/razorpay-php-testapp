---
title: Migrate from UPI Collect to UPI Intent/QR Code - Standard Checkout
description: According to NPCI guidelines, the UPI Collect flow is deprecated. Migrate to UPI Intent or UPI QR code to continue accepting UPI payments.
---

# Migrate from UPI Collect to UPI Intent/QR Code - Standard Checkout

According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026 to align with the latest ecosystem compliance standards and ensure higher transaction success rates. Customers can no longer make payments by manually entering VPA/UPI id/mobile numbers.

- If you are a new customer, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md). 
- If you are an existing customer, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments.

#### Exemptions

UPI Collect will continue to be supported for:
- MCC 6012 & 6211 (IPO and secondary market transactions).
- iOS mobile app and mobile web transactions.
- UPI Mandates (execute/modify/revoke operations only)
- eRupi vouchers.
- PACB businesses (cross-border/international payments).

## Hide UPI Collect Flow

To migrate from UPI Collect to UPI Intent or UPI QR Code, you must hide the UPI Collect flow in your checkout configuration. Add the following configuration in `checkout.js`:

```json
"config": {
  "display": {
    "hide": [
      {
        "method": "upi",
        "flows": ["collect"]
      }
    ]
  }
}
```

This will hide the UPI Collect flow and automatically display the appropriate UPI payment method based on your platform.

## Migration Steps 

Follow the steps given below based on your integration type and platform:

  
### Web

     Once you hide the UPI Collect flow using the above configuration, UPI QR code will be displayed automatically on desktop checkout. Know more about [UPI QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md#upi-qr-code).

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      UPI Intent is not supported on web.
>      

    

  
### Mobile Web

     Once you hide the UPI Collect flow using the above configuration, the following payment options are available:

     
       
         UPI Intent will be available by default once Collect is deprecated. Know more about [UPI Intent on mobile web](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md#integrate-on-android-ios-and-mobile-web).
       
       
         You also have the option to display UPI QR code. This is an on-demand feature. To show UPI QR code, raise a request with our support team to get this feature enabled on your account. Know more about [UPI QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md#upi-qr-code).
       
     
    

  
### WebView

     Once you hide the UPI Collect flow using the above configuration, the following payment options are available.

     
       
         UPI Intent will be available by default once Collect is deprecated. Know more about [UPI Intent on WebView](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-android.md).
       
       
         You also have the option to display UPI QR code. This is an on-demand feature. To show UPI QR code, raise a request with our support team to get this feature enabled on your account. Know more about [UPI QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md#upi-qr-code).
       
     
    

> **INFO**
>
> 
> **Handy tips**
> 
> The **Save VPA** and **Validate VPA** features will not be available since the Collect flow is disabled. These features work only with the UPI Collect flow.
>
