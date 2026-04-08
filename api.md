---
title: Razorpay API Documentation
heading: API Reference Guide
description: Get started with Razorpay APIs and test them on Postman. Generate API Keys in Test and Live Modes.
---

# API Reference Guide

Razorpay APIs are completely RESTful, and all our responses are returned in JSON.

> **INFO**
>
> 
> **Integrations**
> 
> - Looking to integrate your website, ecommerce store or mobile app with Razorpay Payment Gateway? Find the [right integration method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md#integration-types).
> - Accept payments [**without** a website or app](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md#accept-payments) using other Razorpay products, such as Payment Links, Payment Pages, Subscription Links, Invoices and Smart Collect.
> - For S2S integration, contact the [Support team](https://razorpay.com/support/#request) with your requirements.
> 

  

   Our APIs are present on the Razorpay [Postman Public Workspace](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/collection/12492020-952c7295-118c-400f-8f2c-5266ef6f689a). Watch the video to know how to fork APIs and save them to your private workspace for testing.
   

  
   Test Razorpay APIs using Postman. Watch the video to know how to get started. 
   
   All Razorpay APIs are authenticated using Basic Authentication. You must [generate test API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md) on the Dashboard before trying the APIs.
   

## API Gateway URL

For most of the Razorpay APIs, the Gateway URL is `https://api.razorpay.com/v1`. You need to include this before each API endpoint to make API calls. However, certain APIs are on V2. Hence, the gateway URL may differ for certain APIs.

    
### Example

            

            - Use the URL `https://api.razorpay.com/v1/payments` to access payment resources.

            - Use the URL `https://api.razorpay.com/v2/accounts` to access Route (Linked Account)-related resources.

            

            
        

### Related Information

- [Understand Razorpay APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md)
- [API Authentication](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md)
- [Sandbox Setup](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/sandbox-setup.md)
- [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)
- [API Best Practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/best-practices.md)
- [API Glossary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/glossary.md)
