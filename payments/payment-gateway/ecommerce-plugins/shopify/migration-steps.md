---
title: Migration Steps for Existing Users
description: Follow the step-by-step guide on migrating from the existing Razorpay App to 1 Razorpay App on your Shopify store.
---

# Migration Steps for Existing Users

If you are using Razorpay to accept payments, you can now upgrade to the **1 Razorpay App** on your Shopify Store. Watch the [video tutorial](#video-tutorial) or follow the [migration steps](#migration-steps) to migrate to 1 Razorpay App. Know more about why you need to [upgrade to 1 Razorpay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/faqs.md#1-why-do-i-need-to-upgrade-to). 

## Video Tutorial

Watch this video to know how to migrate from the existing Razorpay App to 1 Razorpay App on your Shopify store. 

## Migration Steps

Follow the steps given below to migrate from the existing Razorpay App to 1 Razorpay App.

    
### Migration

         1. Click on [this link](https://accounts.shopify.com/store-login?redirect=settings%2Fpayments%2Falternative-providers%2F1058839) to access the 1 Razorpay App on your Shopify store. 
         2. Click **Install**.
            
         3. You will be redirected to a landing page. Click **I am an existing user**.
            
         4. Scroll down and click **Login**. 
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             Make sure you log in with **owner** credentials to connect Razorpay with Shopify successfully.
>             

            
         5. Click **Activate** on the activation screen on your Shopify Dashboard. 

            

         1 Razorpay now appears as a Payment Gateway on your Shopify Store checkout.

         

         
> **WARN**
>
> 
> 
>          **Watch Out!**
> 
>          Ensure you deactivate the existing Razorpay App after activating the new **1 Razorpay** App.
> 
>          

        

    
### Deactivation

         To deactivate the existing Razorpay App:

         1. Click on [this link](https://accounts.shopify.com/store-login?redirect=settings/payments/alternative-providers/1030400) to access the existing Razorpay App on your Shopify store.
         2. Click **Deactivate Razorpay** to deactivate the existing Razorpay App on your Shopify store.
            

         For more information, see [Shopify FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/faqs.md).
        

## Reconcile Payments on 1 Razorpay

You can reconcile payments for 1 Razorpay using the **Payment Id** provided at the Shopify checkout.
Know more about how to [reconcile Shopify orders on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/reconcile-payments.md). 

## Difference in Order Information Between Old Razorpay App and 1 Razorpay App

Check the table below to understand the difference in data about the gateway provided by the Old Razorpay App and 1 Razorpay App.

**Old Razorpay App** [columWidth="50"] | **1 Razorpay App**
---
- Razorpay account details.
- Razorpay reference number.
-  Currency
- Amount
-  Gateway reference Id
-  Timestamp
- Signature
 | - Payment Id

The image below shows the difference in data provided by the old Razorpay App and 1 Razorpay App.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> In the case of the old Razorpay app, multiple data were available to track payments, whereas, in the case of the 1 Razorpay app, only a single piece of data, the `Payment Id`, is provided by Shopify. Know more about [how to process a payment](https://shopify.dev/apps/payments/processing-a-payment#resolve-a-payment) on Shopify.
>
