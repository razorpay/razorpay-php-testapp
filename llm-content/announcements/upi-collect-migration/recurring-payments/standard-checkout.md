---
title: Migrate from UPI Collect to UPI Intent - Standard Checkout
description: Steps to migrate to UPI Intent/QR code flows for Standard Checkout integrations across Web, mWeb and mobile app platforms.
---

# Migrate from UPI Collect to UPI Intent - Standard Checkout

According to NPCI guidelines, the UPI Collect flow (Pay with UPI ID/Number) is being deprecated for new UPI Autopay registrations and will no longer be supported after 28 February 2026. 
- Customers can no longer register UPI mandates by manually entering VPA/UPI id/mobile numbers. 
- Save VPA and Validate VPA features will not be available after migration as these features work only with the UPI Collect flow.

> **INFO**
>
> 
> **Handy Tips**
> 
> Subsequent debits for existing mandates created via UPI Collect will continue to be executed without any change. No immediate action is required for these.
> 

**Exemptions**

UPI Collect will continue to be supported for:
- MCC 6012 & 6211 (IPO and secondary market transactions)
- iOS mobile app and mobile web transactions (exempted until further notice)
- UPI Mandates (execute/modify/revoke operations only)
- eRupi vouchers
- PACB businesses (cross-border/international payments)

**Action Required**

Remove the UPI Collect option from your checkout by 28 February 2026 and continue to support Intent-based UPI payments. This applies to payments made via all desktop browsers and Android devices (mWeb and mobile app). Failure to comply with the deadline will result in a disruption to your payments experience.

- If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md).
- If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent to continue accepting UPI payments if:
    - You currently accept UPI payments via Collect flow on Standard Checkout.
    - Your checkout displays a "Pay with UPI ID/Number" input field.

> **INFO**
>
> 
> **Handy Tips**
> 
> For Standard Checkout integrations, Razorpay will automatically disable UPI Collect flows. However, you are also encouraged to make the changes at your end as described below.
> 

## Prerequisite

Contact [Razorpay support](https://razorpay.com/support/) to enable UPI Intent for your Razorpay account if it is not already enabled.

## Migration Steps by Platform

    
### Web

 
         You can only use UPI QR code to accept UPI payments. This is because UPI Intent is not supported on desktop web and UPI Collect will not be available after the NPCI deadline. UPI QR code is enabled by default on your Razorpay account. You do not need to make any changes to your integration.
        

    
### mWeb

         You can use UPI Intent and/or UPI QR code to accept UPI payments on mWeb. 

         **Change Needed:**

         Contact [Razorpay support](https://razorpay.com/support/) to get UPI QR code feature enabled on your Razorpay account.
         
        

    
### WebView

         For WebView integrations, you can display UPI Intent and optionally enable QR code.

                  
         **Change Needed:**

         1. Additional integration steps are needed for UPI Intent to work on WebView for [Android](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-android.md) and [iOS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-ios.md).

         2. Contact [Razorpay support](https://razorpay.com/support/) to get UPI QR code feature enabled on your Razorpay account.
        

## Related Information

- [UPI Payment Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md)
- [Recurring Payments - UPI Autopay Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi.md)
