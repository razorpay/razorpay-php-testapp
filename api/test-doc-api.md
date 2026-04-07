---
title: Testing doc Api
description: Sandbox setup for testing Razorpay APIs.
---

# Testing doc Api

### Testing Doc

The Razorpay Sandbox environment allows you to test your integration without using real money. It is a crucial step before going live with your Razorpay integration.

## Steps

Follow these steps to set up the sandbox environment.

    
### 1. Generate API Keys

         Follow these [steps to generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).
        

    
### 2. Use Sandbox URL & Client Libraries

         The base URL for the Razorpay Sandbox and production API is the same - `https://api.razorpay.com/v1/`. In case of certain APIs, it is `https://api.razorpay.com/v2`. 

         For testing APIs in the sandbox environment, use the test API keys. 
         
         How you use them depends on the programming language and the Razorpay SDK you are using. Refer to the relevant SDK documentation for specific instructions. The SDK documentation will have clear examples of how to initialise the Razorpay client with your Key ID and Key Secret.

         **Client Libraries** 

         For Razorpay Payments, the client SDK libraries are available on GitHub. You can use the API keys generated above to try out the API sample codes:

         

  
    - **Integrate**: 
    

    - **GitHub Repo**: 
    

  

   
    - **Integrate**: 
    

    - **GitHub Repo**: 
    

  

  
    - **Integrate**: 
    

    - **GitHub Repo**: 
    

  

  
    - **Integrate**: 
    

    - **GitHub Repo**: 
    

  

   
    - **Integrate**: 
    

    - **GitHub Repo**: 
    

  

  
    - **Integrate**: 
    

    - **GitHub Repo**: 
    

  

  
    - **Integrate**: 
    

    - **GitHub Repo**: 
    

  

 
         
        

    
### 3. Go live

         After testing is complete, generate [Live API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#live-mode-api-keys) from the dashboard. Ensure to replace the Test API keys in your integration with the Live API keys before going live. You can accept real money payments using the Live API Keys.
        

### Related Information

- [Understand Razorpay APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md)
- [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)
- [Best Practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/best-practices.md)
- [Glossary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/glossary.md)
