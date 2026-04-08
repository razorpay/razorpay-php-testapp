---
title: API Authentication
description: Authentication process for Razorpay APIs.
---

# API Authentication

Check how to authenticate the APIs.

## API Authentication

All Razorpay APIs are authenticated using `Basic Auth`. Basic auth requires the following:
- `[YOUR_KEY_ID]`
- `[YOUR_KEY_SECRET]`

Basic auth expects an `Authorization` header for each request in the `Basic base64token` format. Here, `base64token` is a base64 encoded string of `YOUR_KEY_ID:YOUR_KEY_SECRET`. 

> **WARN**
>
> 
> **Watch Out!**
> 
> The `Authorization` header value should strictly adhere to the format mentioned above. Invalid formats will result in authentication failures. 
> Few examples of **invalid** headers are: `BASIC base64token`, `basic base64token`, `Basic "base64token"` and `Basic $base64token`.
> 

## Generate API Keys

You can generate API Keys from the Dashboard.

    
        Follow these steps to generate API keys:

  
   Watch this video to see how to generate API keys in the Test mode.

   
  

  
   Watch this video to see how to generate API keys in the Live mode.

   
  

1. Log in to your Dashboard with the appropriate credentials.
2. Select the mode (**Test** or **Live**) for which you want to generate the API key. 
    - **Test Mode**: The test mode is a simulation mode that you can use to test your integration flow. **Your customers will not be able to make payments in this mode**. 
    - **Live Mode**: When your integration is complete, switch to live mode and generate live mode API keys. In the integration, **replace test mode keys with live mode keys to accept customer payments**.
3. Navigate to **Account & Settings** → **API Keys** (under **Website and app settings**) → **Generate Key** to generate key for the selected mode.

> **WARN**
>
> 
> **Watch Out!**
> 
> - After generating the keys from the Dashboard, download and save them securely. You can use only one set of API keys. If you do not remember your API keys, you must [regenerate them](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#regenerate-api-keys) from the Dashboard and update them wherever the previous keys were used for payment gateway integrations. 
> - API Keys are universal; that is, they are applicable to all websites and apps that you have whitelisted for your Merchant ID.
> - **Do not share your API Key secret** with anyone or on any public platforms. **This can pose security threats to your Razorpay account**.
> - Once you generate the API Keys, only the **Key Id** is visible on the Dashboard, **not the Key secret**, as it can pose security threats to your Razorpay account.
> - Use the **Live API Keys** to accept live payments and the **Test API Keys** for test transactions.
> 

    
    
        To generate API keys: 
1. Log in to your [RazorpayX Account](https://x.razorpay.com/). 
2. Navigate to the user icon in the top-right corner of the screen and click `My Profile' → **My Accounts & Settings**. 
3. Navigate to **Developer Controls** and click **Generate Key**. 
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     When generating API keys in Live mode, you must enter the OTP sent to you. This is to authroize the new user generating a new set of keys. 

>     The same is **not applicable** for Test Mode. 
>     

4. Download the keys when the pop-up appears. 

    
### Test Mode API Keys

         Watch this video to see how to generate API keys in the test mode.

         
        

    
### Live Mode API Keys

         
> **WARN**
>
> 
>          **Watch Out!**
>         
>          You must activate your account to make live payouts. To activate your account, provide the following KYC information from your Dashboard:
>          - Contact Info
>          - Business Details
>          - Your Bank Account Information
>          - Business Documents such as ID proof, Business Registration proof and Company PAN.
>          

        

    

1. Log in to your Dashboard with the appropriate credentials.
2. Select the mode (**Test** or **Live**) for which you want to generate the API key. 
    - **Test Mode**: The test mode is a simulation mode that you can use to test your integration flow. **Your customers will not be able to make payments in this mode**. 
    - **Live Mode**: When your integration is complete, switch to live mode and generate live mode API keys. In the integration, **replace test mode keys with live mode keys to accept customer payments**.
3. Navigate to **Account & Settings** → **API Keys** (under **Website and app settings**) → **Generate Key** to generate key for the selected mode.

> **WARN**
>
> 
> **Watch Out!**
> 
> - After generating the keys from the Dashboard, download and save them securely. You can use only one set of API keys. If you do not remember your API keys, you must [regenerate them](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#regenerate-api-keys) from the Dashboard and update them wherever the previous keys were used for payment gateway integrations. 
> - API Keys are universal; that is, they are applicable to all websites and apps that you have whitelisted for your Merchant ID.
> - **Do not share your API Key secret** with anyone or on any public platforms. **This can pose security threats to your Razorpay account**.
> - Once you generate the API Keys, only the **Key Id** is visible on the Dashboard, **not the Key secret**, as it can pose security threats to your Razorpay account.
> - Use the **Live API Keys** to accept live payments and the **Test API Keys** for test transactions.
> 

## Roll API Keys

You can roll the Live and Test mode API keys if you have lost them or exposed them. You can choose to regenerate the API keys by deactivating them immediately or after 24 hours.

    
      Know how to [regenerate Razorpay API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#regenerate-api-keys).
    
    
      Know how to [regenerate RazorpayX API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/api-keys.md#regenerate-api-keys).
    

### Related Information

- [Understand Razorpay APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md)
- [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)
- [Best Practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/best-practices.md)
- [Glossary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/glossary.md)
