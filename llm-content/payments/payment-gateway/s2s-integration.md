---
title: Server-to-Server Integration
description: Directly integrate your server with Razorpay Payment Gateway using S2S Redirect, JSON V1, or JSON V2 APIs.
---

# Server-to-Server Integration

You can use Server-to-Server (S2S) payments integration to communicate directly with the Razorpay servers and seamlessly integrate the service in your web application. You can capture payment details on your server and process the payments at your end. You have complete control over the look and feel of the payment experience for your customers.

Razorpay supports two flavors of server-to-server integration. Choose the one that best suits your needs.

  
### S2S JSON API (Recommended)

     If you want more control over the way the customer is redirected, you can use the JSON API. You can decide where the customer should enter the transaction OTP to complete the payment - on your website or on the bank's page.

     - [S2S JSON V2 (Latest)](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md)
     - [S2S JSON V1](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v1.md)
       
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

     This is our default [server-to-server integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/redirect.md). The payment creation request returns a variety of responses, which must be rendered on your customer's browser to proceed with the payment. These responses typically result in the browser being redirected to a bank or gateway page to complete payment authentication.
    

@include payment-methods/upi-collect-deprecated/s2s

## Prerequisite

PCI-DSS certification is required for all entities seeking to store, process, and transmit cardholder data.

### Related Information

- [Integration Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/best-practices.md)
