---
title: Server-to-Server Integration
description: Directly integrate your server with Razorpay Payment Gateway using S2S Redirect, JSON V1, or JSON V2 APIs.
---

# Server-to-Server Integration

You can use Server-to-Server (S2S) payments integration to communicate directly with the Razorpay servers and seamlessly integrate the service in your web application. You can capture payment details on your server and process the payments at your end. You have complete control over the look and feel of the payment experience for your customers.

Razorpay supports two flavors of server-to-server integration. Choose the one that best suits your needs.

  
### S2S JSON API (Recommended)

     If you want more control over the way the customer is redirected, you can use the JSON API. You can decide where the customer should enter the transaction OTP to complete the payment - on your website or on the bank's page.

     - [S2S JSON V2 (Latest)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md)
     - [S2S JSON V1](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v1.md)
       
> **INFO**
>
> 
>        **Handy Tips**
> 
>        While we have two JSON API versions, we recommend you to use V2 version. Using this API:
>        - Helps avoid multiple API calls.
>        - Provides a greater control over native OTP.
>        - Reduces payment timeout issues.
>        

    

  
### S2S Redirect API

     This is our default [server-to-server integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect.md). The payment creation request returns a variety of responses, which must be rendered on your customer's browser to proceed with the payment. These responses typically result in the browser being redirected to a bank or gateway page to complete payment authentication.
    

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md).
> 

## Prerequisite

PCI-DSS certification is required for all entities seeking to store, process, and transmit cardholder data.

### Related Information

- [Integration Best Practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/best-practices.md)
