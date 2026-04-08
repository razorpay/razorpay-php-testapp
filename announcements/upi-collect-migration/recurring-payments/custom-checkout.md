---
title: Migrate from UPI Collect to UPI Intent - Custom Checkout
description: Steps to migrate to UPI Intent/QR code flows for Custom Checkout integrations across Web, mWeb and WebView platforms.
---

# Migrate from UPI Collect to UPI Intent - Custom Checkout

According to NPCI guidelines, the UPI Collect flow (Pay with UPI id/VPA/Number) is being deprecated for new UPI Autopay registrations and will no longer be supported after 28 February 2026. 
- Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers. 
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
    - You currently accept UPI payments via Collect flow.
    - You use Razorpay Custom Checkout on Web, mWeb or WebView to accept Recurring Payments from customers.
    - Your integration includes UPI Collect parameters in `razorpay.js`.
    - Your users enter UPI id/VPAs for payment.

## Prerequisite

Contact [Razorpay support](https://razorpay.com/support/) to enable UPI Intent for your Razorpay account if it is not already enabled.

## Migration Steps by Platform

    
### Web

         You can only use UPI QR code to accept UPI payments. This is because UPI Intent is not supported on desktop web and UPI Collect will not be available after the NPCI deadline. 

         **Change Needed**

         1. If you were previously using UPI Collect, you must remove `upi[vpa]` parameter from `razorpay.js`. 
         
                ```js: Replace UPI Collect with UPI QR
                razorpay.createPayment({
                    amount: 5000,
                    email: 'gaurav.kumar@example.com',
                    contact: '+919000090000',
                    order_id: 'order_9A33XWu170XXXX',
                    // Remove the upi[vpa] parameter
                    //upi:
                    //{
                    //    vpa: 'gauravkumar@somebank',
                    //    flow: 'collect'
                    //}
                });
                ```
         2. Integrate with UPI QR code. Refer to the [UPI QR code Redirect Flow documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#redirect-flow) to complete the integration.
        

    
### mWeb

         On mobile web, UPI Intent allows users to complete payments through their preferred PSP apps.

         **Change Needed**

         1. If you were previously using UPI Collect, you must remove `upi[vpa]` parameter from `razorpay.js`.

                ```js: Remove UPI VPA Parameter
                var options = {
                    "key": "YOUR_KEY_ID",
                    "amount": "50000",
                    "currency": "INR",
                    "name": "Acme Corp",
                    "description": "Test Transaction",
                    "order_id": "order_9A33XWu170gUtm",
                    // Remove the upi[vpa] parameter
                    //upi:
                    //{
                    //    vpa: 'gauravkumar@somebank',
                    //    flow: 'collect'
                    //}
                };
                ```
         2. Integrate UPI Intent on mWeb. Refer to the [UPI Intent mWeb Integration Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods/upi-intent-mweb.md).
        

    
### WebView

         For WebView integrations, enable UPI Intent to display UPI apps for payment completion.

         **Change Needed**

         1. If you were previously using UPI Collect, you must remove `upi[vpa]` parameter from `razorpay.js`.

                ```js: Remove UPI Parameter
                var options = {
                    "key": "YOUR_KEY_ID",
                    "amount": "50000",
                    "currency": "INR",
                    "name": "Acme Corp",
                    "description": "Test Transaction",
                    "order_id": "order_9A33XWu170gUtm",
                    // Remove the upi[vpa] parameter
                    //upi:
                    //{
                    //    vpa: 'gauravkumar@somebank',
                    //    flow: 'collect'
                    //}
                };
                ```
         2. Integrate UPI Intent by following the UPI Webview Integration guide for [Android](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/webview/upi-intent-android.md) and [iOS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/webview/upi-intent-ios.md). Implement deep link handling in your Android/iOS app to launch UPI apps from WebView.
        

## Related Information

- [UPI Payment Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md)
- [Recurring Payments - UPI Autopay Custom Checkout Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/custom/upi/create-authorization-transaction.md)
