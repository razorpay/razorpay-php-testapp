---
title: API Keys Generator on Razorpay Dashboard
heading: API Keys
description: Generate and regenerate Test and Live API Keys using the Razorpay Dashboard.
---

# API Keys

API keys are unique identifiers that let you securely connect your application to Razorpay's services. An API key is a combination of the `key_id` and `key_secret`, which are required to make any API request to Razorpay. You will need to add this API key to your code as part of your integration process, ensuring secure access to Razorpay's payment services while protecting your data. Essentially, API keys act like passwords for your app, providing safe access to Razorpay's payment and other services while protecting your data.

> **WARN**
>
> 
> **Watch Out!**
> 
> To generate API keys in **Live Mode**, you must provide the website details where you will collect payments. If you do not have the option to generate API keys in **Live Mode**. It may be because you are yet to provide your website details. We collect website information during the onboarding process. 
> 
> - If you have not shared your website yet, . We will verify your website within 3 working days. Once the verification is complete, you can generate API keys in **Live Mode**.
> 
> - If you have already shared your website details, and they have been verified, you can find the details on your Dashboard. Navigate to **Account & Settings** → **Website and app settings**.
> 
> - You can generate API keys in **Test Mode** without adding a website.
> 
> 
> 
> 
> 
> 

## Generate API Keys

Follow these steps to generate API keys:

  
   Watch this video to see how to generate API keys in the Test mode.

   
[Video: https://www.youtube.com/embed/VOn8JlGPG2I?si=WTAbAeLB3Hnp1n3r]

  

  
   Watch this video to see how to generate API keys in the Live mode.

   
[Video: https://www.youtube.com/embed/Cer8UfBGX_E?si=Libr1RXoFSEDfY1c]

  

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

## Regenerate API Keys

You also have the option to regenerate the key if required.

> **INFO**
>
> 
> **Two-Factor Authentication**
> 
> To regenerate API keys, you must validate your identity via OTP and send it to your registered mobile number. However, this step is skipped if you already performed OTP validation while logging in to the Dashboard.
> 
> If you have not set up two-factor authentication, you will be prompted to verify your mobile number before regenerating keys.
> 

To regenerate API key:

1. Log in to the Dashboard.
1. Select the mode from the menu ribbon for which you want to generate the API key.
1. Navigate to **Account & Settings** → **API Keys** (under **Website and app settings**) → **Generate new key** to generate key for the selected mode.

![Live mode API keys generated on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/settings-4.jpg.md)

This allows you to deactivate the old key immediately or within 24 hours.

## Frequently Asked Questions (FAQs)

### Common

    
### 1. Can I generate multiple API keys if I have only one MID?

         No, if you have only one MID, you can generate only one API key.
        

    
### 2. Can I generate multiple API keys if I have multiple MIDs?

         Yes, you can generate one API key for each MID if you have multiple MIDs.
        

    
### 3. Can I use my existing API key when expanding to new Razorpay platforms?

         Yes, if your existing API key is saved, you can continue using the same keys as you expand to new platforms.
        

    
### 4. What should I do if I do not have the previous API key saved?

         If you do not have the previous API key saved, you must [regenerate new API keys](#regenerate-api-keys) and relaunch all previous products or apps with the updated keys.
        

    
### 5. My account is activated but I cannot generate API keys as my website is not verified. What do I do?

         Website details are required to generate API keys. If you do not have the option to generate API keys, it may be because website details are yet to be provided. If you have not shared your website yet, . We will verify your website within 3 working days, and once the verification is complete, you can generate API keys.
        

    
### 6. Why am I unable to generate the API keys?

         Your website or app link must be verified to generate an API key. This step ensures that only verified sources (website/app) can collect payments through the payment gateway.
        

    
### 7. Who has access to the API Keys?

         Only users with the **Owner** or **Admin** role have access to the API keys. Know more about [standard user roles & permissions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/manage-team.md#standard-user-roles).
        

    
### 8. Can I use the same Razorpay API Keys on multiple websites or domains?

        Yes, you can use the same set of Live Mode API Keys on multiple websites or domains.

        The Live Mode keys are tied to your single Razorpay account, allowing them to process live transactions from any domain where they are implemented. Using the same keys on a new website **will not impact** the live payments running on your existing, whitelisted website.

        **For Testing:**

        We strongly recommend using your **Test Mode API Keys** when integrating Razorpay on any new website. Test payments are simulated and ensure that your live payment processing on existing sites remains unaffected during development.

        
> **WARN**
>
> 
>         **Watch Out!**
>         
>         Ensure your new website's domain is whitelisted in your Razorpay account to avoid payment disruptions once you switch to Live Mode.
>
