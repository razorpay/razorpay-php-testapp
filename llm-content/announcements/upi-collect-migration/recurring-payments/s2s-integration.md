---
title: Migrate from UPI Collect to UPI Intent - S2S APIs
description: Steps to migrate from UPI Collect to UPI Intent/QR code flows for Server-to-Server (S2S) API integrations across Desktop Web, mWeb and WebView platforms.
---

# Migrate from UPI Collect to UPI Intent - S2S APIs

According to NPCI guidelines, the UPI Collect flow is being deprecated from 28 February 2026. 
- Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers. 
- Save VPA and Validate VPA features will not be available after migration as these features work only with the UPI Collect flow. 

**Exemptions**

UPI Collect will continue to be supported for:
- MCC 6012 & 6211 (IPO and secondary market transactions)
- iOS mobile app and mobile web transactions
- UPI Mandates (execute/modify/revoke operations only)
- eRupi vouchers
- PACB businesses (cross-border/international payments)

**Action Required**

- If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md).
- If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments if:      
    - You use Server-to-Server (S2S) API integration for UPI payments
    - Your API calls include `"flow": "collect"` parameter
    - You use the `/v1/payments/create/upi` endpoint with Collect flow
    - Your users enter UPI id/VPAs for payment

## Prerequisite

Contact [Razorpay support](https://razorpay.com/support/) to enable UPI Intent for your Razorpay account if it is not already enabled.

## Migration Steps by Platform

    
### Desktop Web

         Migrate from the Collect flow API to the Intent flow API. Once the intent URL is generated, you should embed this URL into the QR code that you generate at your end.

         **Change Needed**

         1. Update your API call to use UPI Intent flow instead of UPI Collect flow. Remove `vpa` and `expiry_time` parameters from the request body. Replace `collect` with `intent` as the value of the `upi.flow` parameter. Refer to the [UPI Intent guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-intent/authorization-transaction.md#113-create-an-authorisation-payment) for further information.

            ```curl: Replace UPI Collect with Intent
            curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
            -H 'content-type: application/json' \
            -X POST https://api.razorpay.com/v1/payments/create/upi
            -d '{
                "amount": 50000,
                "currency": "INR",
                "order_id": "order_9A33XWu170gUtm",
                "email": "gaurav.kumar@example.com",
                "contact": "9123456789",
                "method": "upi",
                // Remove these Collect parameters
                //"upi": {
                //    "flow": "collect",
                //    "vpa": "gauravkumar@exampleupi",
                //    "expiry_time": 5
                //},
                // Add this Intent parameter
                "upi": {
                    "flow": "intent"
                }
            }'
            ```

         2. The API returns an intent URL in the response. Embed this intent URL into a QR code on your end and display it to customers on desktop.

            ```json: API Response
            {
              "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
              "link": "upi://pay?pa=merchant@upi&pn=Merchant&am=500.00&tr=rzp_FVmAstJWfsD3SO&tn=Payment",
              "status": "created"
            }
            ```

         3. Use [webhooks to get payment status updates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md).
        

    
### mWeb & WebView

         On mobile web and WebView, you must migrate from UPI Collect to UPI Intent. UPI Intent returns a deeplink that launches UPI apps for payment completion. 
        
         **Change Needed**

         1. Update your API call to use UPI Intent flow instead of UPI Collect flow. Remove `vpa` and `expiry_time` parameters from the request body. Replace `collect` with `intent` as the value of the `upi.flow` parameter.

            ```curl: Replace UPI Collect with Intent
            curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
            -H 'content-type: application/json' \
            -X POST https://api.razorpay.com/v1/payments/create/upi
            -d '{
                "amount": 50000,
                "currency": "INR",
                "order_id": "order_9A33XWu170gUtm",
                "email": "gaurav.kumar@example.com",
                "contact": "9123456789",
                "method": "upi",
                // Remove these Collect parameters
                //"upi": {
                //    "flow": "collect",
                //    "vpa": "gauravkumar@exampleupi",
                //    "expiry_time": 5
                //},
                // Add this Intent parameter
                "upi": {
                    "flow": "intent"
                }
            }'
            ```

         2. The API returns an intent URL in the response. Embed this intent URL into a QR code on your end and display it to customers on mobile.

            ```json: API Response
            {
              "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
              "link": "upi://pay?pa=merchant@upi&pn=Merchant&am=500.00&tr=rzp_FVmAstJWfsD3SO&tn=Payment",
              "status": "created"
            }
            ```

         3. Use [webhooks to get payment status updates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md).
        

## Related Information

- [UPI Payment Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md)
- [Recurring Payments - UPI Autopay S2S Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-intent/authorization-transaction.md)
