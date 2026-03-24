---
title: Generate API Keys from RazorpayX Dashboard
heading: Generate API Keys
description: Know how new and existing merchants can generate Test Mode and Live Mode API keys from the RazorpayX Dashboard.
---

# Generate API Keys

After you [set up your RazorpayX account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/set-up.md), you can generate API keys in both Test mode and Live mode. 

> **WARN**
>
> 
> **Watch Out!**
>     - If you have newly signed up for RazorpayX, you must generate a new set of API keys.
>     - If you are an existing Razorpay user, use your existing API key to fire Payout APIs. Do not regenerate your API Keys.
>     - API Keys generated in the Live mode will not work in test mode and vice versa.
>     - After generating the keys from the Dashboard, **DOWNLOAD KEY DETAILS** and save them securely. The Key secret is not visible on the Dashboard due to security reasons. If you have misplaced the key details, **regenerate** the keys and replace them wherever required.
> 

## Generate API Keys

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

         
[Video: https://www.youtube.com/embed/PS06fCIqRKI]

        

    
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

        

### Postman Collection

We have a Postman collection to make the integration quicker and easier. Click the **Run in Postman** button below to get started.

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-fcd32a4a-0c53-41a7-a879-d771de7e2804)

## Regenerate API Keys

You can regenerate API keys from the Dashboard.

To regenerate keys:
1. Log in to your [RazorpayX Account](https://x.razorpay.com/). 
2. Navigate to the user icon in the top-right corner of the screen and click `My Profile' → **My Accounts & Settings**. 
3. Navigate to **Developer Controls** and click **REGENERATE KEY**. 

This allows you to deactivate the old key immediately or within 24 hours.

### Next Steps

- [Allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md)

### Related Information

- [About RazorpayX](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x.md)
- [Payout APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/apis.md)
