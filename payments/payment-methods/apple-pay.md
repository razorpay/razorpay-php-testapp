---
title: Apple Pay
description: Accept Apple Pay payments from international customers with Razorpay Checkout.
---

# Apple Pay

Apple Pay is a secure, contactless payment method that allows customers to pay using their Apple devices with Face ID/Touch ID authentication. Once Apple Pay is enabled and integrated, it appears on your Checkout page as a payment option, providing a frictionless checkout experience for international customers. Know more about [Apple Pay](https://www.apple.com/apple-pay/).

> **INFO**
>
> 
> 
> **Feature Request**
> 
> This is an on-demand feature. Please fill out the [form](https://razorpay.typeform.com/to/ALhOQrHG?utm_source=techdocs) to get this feature activated on your account. to get this feature activated on your account.
> 
> 

    
### Advantages

         Integrating Apple Pay as a payment method on Checkout offers you the following advantages:

         - **Higher Conversion Rates**: Up to 58% improvement in checkout conversion rates for international customers.
         - **Reduced Friction**: Eliminate manual card entry with biometric authentication (Face ID/Touch ID).
         - **Enhanced Security**: Benefit from Apple's tokenisation and liability shift protection.
         - **Faster Checkout**: 45% reduction in checkout time for Apple device users.
         - **Increased Average Order Value**: Potential 12% increase in transaction value.
         - **Global Reach**: Accept payments from customers in 70+ countries.
        

## Prerequisites

Before enabling Apple Pay, ensure you have:

- Razorpay Standard Checkout with international payments feature enabled.
- HTTPS-enabled website with TLS 1.2 or higher.
- Access to your web server to upload verification files.
- Registered business entity (non-profit organisations are not eligible).
- Display the Apple Pay [brand mark](https://developer.apple.com/apple-pay/marketing/Apple-Pay-Mark.zip) on your website in the payment methods section. Follow [Apple's official marketing guidelines](https://developer.apple.com/apple-pay/marketing/) to display the Apple Pay brand mark to indicate support before checkout.

## Integrate Apple Pay on Standard Checkout

Follow the steps given below:

   
### Step 1: Domain Registration and Verification

       Apple Pay needs you to host a file in your domain. To find the list of these domains, please log in to the [dashboard](https://dashboard.razorpay.com/app/payment-methods/apple-pay).
       
       
> **INFO**
>
> 
>        **Handy Tip**
> 
>        Only domains whitelisted with the accounts service will be visible here. Similar domains are visible as well. Please contact our [Support team](https://razorpay.com/support/) if you cannot find your Apple Pay showing domain here. You need to whitelist your URL.
>        

       

       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        - The file path must be exactly as specified (case-sensitive).
>        - File hosting is required on websites where Razorpay Checkout loads as an overlay/iframe. This includes:
>          - WooCommerce, Magento and other ecommerce platforms where Razorpay appears as an overlay. Any website where `checkout.razorpay.com` iframe is embedded.
>        - No file hosting required on:
>          - Shopify, Mobile SDKs (Flutter, Native iOS, React Native) and Razorpay no-code solutions, such as [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md), [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md), [Payment Handles (razorpay.me)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/mobile-app/accept-payments/razorpay-me.md) and [Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md).
>        - File hosting is required if you use both hosted checkouts and overlay iframe integration (a non-Shopify website where an iframe loads as an overlay and Payment Buttons) on your business id. Please do not activate Apple Pay if you have both these kinds of checkouts unless you have hosted the file at the exact path.
>        

       #### Domain Verification Process:

       1. Download the verification file.

       2. Host the file on your server.
          - Upload the file to this exact path on your website:
          ```
          /.well-known/apple-developer-merchantid-domain-association
          ```
          - For example, if your domain is `https://www.yourstorename.com`, the file must be accessible at:
          ```
          https://www.yourstorename.com/.well-known/apple-developer-merchantid-domain-association
          ```

       3. Ensure correct configuration. When setting up Apple Pay domain verification, follow these requirements:

          File Path and Response
             - The verification file must be accessible at the exact path, `/.well-known/apple-developer-merchantid-domain-association`.
             - The file must return a direct HTTP 200 status code and not a 301, 302 or any 3xx redirects.
             - Apple does not support HTTP URL redirects for the domain association file.

          Server Configuration
             - The file must be served via HTTPS 1.1 protocol.
             - The file must have Content-Type: text/plain in the header.
             - The file must be externally accessible (not behind authentication).
             - The file must not be password protected.
             - The file must not be behind a proxy or redirect.

          Network Access
             - Ensure the file is not behind a firewall or access restrictions.
             - If using a firewall, configure it to allow Apple's [IP addresses](https://developer.apple.com/documentation/applepayontheweb/setting-up-your-server).

       4. 
          Dashboard Configuration and Verification
          - Log in to the Dashboard and navigate to **Account & Settings** → **International payments** (under Payment methods). Click [**Apple Pay**](https://dashboard.razorpay.com/app/payment-methods/apple-pay).
            
            
> **WARN**
>
> 
>             **Important**
>             
>             This will only be visible if the business has International payments activated. If you do not have international payments active, you will not see Apple Pay.
>             

          - You will see a list of domains associated with your business account:
             - **Verified domains**: Ready for Apple Pay.
             - **Unverified domains**: Require file hosting and verification.
          - Click **Verify domains** for any unverified domains.
          - Domain status will change to "Verified" once file hosting is correctly configured.
          
           to enable Apple Pay.
          
      

   
### Step 2: Accept Terms and Conditions

       If you have uploaded the file or have not requested to opt out of Apple Pay, we will assume you are okay with [Apple's guidelines](https://developer.apple.com/apple-pay/acceptable-use-guidelines-for-websites/).
      

   
### Step 3: Configuration (Automatic)

       Once domain verification is complete and terms are accepted:
         - Apple Pay will automatically appear on your checkout when accessed by eligible customers.
         - No code changes are required for Standard Checkout integration.
         - The payment button displays dynamically based on device compatibility.
      

## Payment Flow For Customers

Given below is the payment flow for Apple Pay at Razorpay Checkout:

1. The customer selects **Apple Pay** at checkout.
    
2. Apple Pay displays their default card, billing address and the payment amount.
3. They authenticate using Face ID, Touch ID or double-click the side button following the on-screen prompt **Double Click to Pay**.
    
4. Upon successful authentication, the payment processes instantly and the customer is returned to your website or app with a confirmation.

## Frequently Asked Questions

   
### 1. Why is Apple Pay button not appearing on my checkout page?

       If the Apple Pay button is not appearing, check for these common issues:
       - Verify that your domain verification file is correctly hosted and accessible.
       - Ensure your website is using HTTPS with proper TLS configuration.
       - Confirm that international payments feature is enabled.
       - Check if the customer's device supports Apple Pay.
      

   
### 2. Why is my Apple Pay domain verification failing?

       Domain verification failures typically occur due to the following reasons:
       - The verification file must return an HTTP 200 status code (not 301 or 302 redirects).
       - The file path must be exactly `/.well-known/apple-developer-merchantid-domain-association`.
       - The file must be accessible via HTTPS (not HTTP).
       - The file content must exactly match what Razorpay provided, with no modifications or extra characters.
      

   
### 3. Do I need to make any code changes to support Apple Pay on Standard Checkout?

       No code changes are required for Standard Checkout integration. Once domain verification is complete and Apple Pay is enabled on your account, it will automatically appear as a payment option for eligible customers.
      

   
### 4. What is the additional cost for accepting Apple Pay?

       There are no additional charges for Apple Pay transactions. Standard Razorpay payment processing rates apply, same as regular card transactions.
      

   
### 5. Can customers save their Apple Pay details for future purchases?

       Apple Pay uses device-specific tokens that are automatically available for repeat purchases. Customers do not need to manually save payment details as their Apple Wallet handles this seamlessly.
      

   
### 6. How do I identify an Apple Pay transaction in my system?

       Apple Pay transactions can be identified by checking the payment `notes` field in the API response or webhook payload:

       ```json
          "notes": {
            "provider": "apple_pay"
          }
       ```

       This `provider` field will always contain `apple_pay` for Apple Pay transactions, making it easy to distinguish them from regular card payments.
      

   
### 7. What is the difference between Apple Pay and card payment webhooks?

       There are structural differences between Apple Pay and standard card payment webhook events: 

       Apple Pay Payment:
       
       ```json       
          "notes": {
            "provider": "apple_pay"
          }
       ```

       Card Payment:
       
       ```json       
          "notes": [],
            "token_id": "token_RIa2YPNM92wfzv"
       ```
       Key differences:
        - Apple Pay includes `provider: "apple_pay"` in the `notes` field.
        - Card payments may include a `token_id` for saved cards.
      

   
### 8. I am not able to verify my URL via the self-serve dashboard. What should I do?

    Check if the file is hosted correctly at your domain by visiting:
    `https://www.yourstorename.com/.well-known/apple-developer-merchantid-domain-association`.
    
    Follow the [Apple Pay documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/apple-pay.md) and ensure the file is publicly accessible.
    

  
### 9. How do I check if Apple Pay is active on my checkout?

    On Mobile:
    - Open Safari in incognito mode on an iPhone with Apple Pay configured.
    - Visit your checkout page.
    - Apple Pay should appear at the top of payment options and under the cards menu.
    
    On Desktop:
    - Use Safari on macOS with Apple Pay configured.
    - Ensure you are signed into your Apple account.
    - Apple Pay will be visible if you have cards linked to your Apple account.
    

  
### 10. Will Apple Pay work in test mode?

    No, Apple Pay does not work in test mode.
    

  
### 11. I cannot see Apple Pay on desktop. What should I do?

    Apple Pay will be visible on desktop under the following conditions:
    
    macOS Requirements:
    - Customer must have Apple Pay cards linked to their Apple account.
    - User must be signed into their Apple account on their macOS device.
    
    Alternative scenarios:
    - If the transaction is initiated in a non-INR currency.
    
    

### Related Information

- [Apple Pay S2S Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/apple-pay/s2s-integration.md)
- [Apple Pay Custom Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/apple-pay/custom-integration.md)
