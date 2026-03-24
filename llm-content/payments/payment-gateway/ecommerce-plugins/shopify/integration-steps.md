---
title: Shopify Razorpay Integration Steps | Payment Gateway Setup
heading: Integration Steps
description: Step-by-step guide to integrate Razorpay Payment Gateway with Shopify. Install 1 Razorpay app and start accepting payments on your Shopify store.
---

# Integration Steps

Follow the steps given below to integrate 1 Razorpay App on your Shopify store.

  - **1. Build Integration**: Install the 1 Razorpay App.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/eFVzIr1lsdA]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Installation

         **Step 1: Sign up for a Razorpay account**.
         1. [Sign up](https://dashboard.razorpay.com/signup?) for a Razorpay account. If you already have an account, skip to Step 2.
         2. Submit your KYC, and if we need any further clarification, we will reach out to you on WhatsApp, SMS and email.
         3. Once our team completes KYC verification and you are enabled to accept payments, we will send a confirmation on WhatsApp, SMS and email.

         **Step 2: Access the 1Razorpay App on Shopify**.
         
         Once your Razorpay account is activated, you can install the app using either of these methods:

         
            
               1. Click on [this link](https://accounts.shopify.com/store-login?redirect=settings%2Fpayments%2Falternative-providers%2F1058839) to access the "1Razorpay - UPI, Cards, Wallets, NB" App directly on your Shopify store.
            
            
               1. Login to your Shopify store.
               2. Navigate to **Settings** → **Payments**.
               3. Click **Add payment method** under Additional payment methods.
                  ![Click Add payment method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-additional-payment-methods.jpg.md)
               4. Click **Search by provider** and search for "1Razorpay - UPI, Cards, Wallets, NB".
                  ![Search for 1Razorpay under search by provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-search-by-provider.jpg.md)
            
         

         **Step 3: Install and Activate the App**.
         1. Click **Install** on the app installation page.
            ![Shopify Install](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-1-razorpay-install-install.jpg.md)

         2. You will be redirected to a landing page. Click **I am an existing user**.
            ![Existing Merchant Shopify](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-existing-merchant.jpg.md)
         3. Scroll down and click **Login**.

            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             Make sure you log in with **store owner** credentials to connect Razorpay with Shopify successfully.
> 
>             

            ![Shopify login](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-login-v2.gif.md)

         4. Click **Activate** on the activation screen on your Shopify Dashboard.
            ![Shopify Activate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-1razorpay-activate.jpg.md)
         
         1 Razorpay now appears as a Payment Gateway on your Shopify Store checkout.
         ![Shopify Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-v2-checkout.jpg.md)

         This completes your integration. For more information, see [Shopify FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/faqs.md).
        

## 2. Test Integration

After the integration of **Shopify - 1 Razorpay** on your Shopify store is complete, follow the steps given below:

    
### 2.1 Make a Test Transaction in Test Mode

         After completing the integration, you must ensure it is working as expected. You can start accepting actual payments from your customers once the test mode transaction is successful.

         Follow the steps given below to test a transaction in test mode:

         1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
         2. Navigate to **Settings** → **Payments**. 
         3. On the **Supported payment methods** section, click **Manage** on the **1 Razorpay** app.
            ![Shopify go live v2](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-go-live-v2.jpg.md)
         4. At the bottom of the page, tick the **Enable test mode** option and click **Save**.
            ![Shopify go live v2 save test](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-go-live-test.jpg.md)
         5. On your Shopify store, add an item to your cart and click **Buy it now**.
            ![Shopify checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/buy-now-shopify.jpg.md)
         6. Fill in your **contact** and **shipping** details and click **Continue to shipping**.
            ![Shopify contact details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shipping-contact-details.jpg.md)
         7. Select **1 Razorpay** and click **Complete order**.
            ![Shopify complete order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/complete-order.jpg.md)
         8. On the checkout screen, enter your **phone number**, click **PROCEED**, and complete the payment.

         You can make test payments using one of the payment methods configured at the Checkout.
            - No money is deducted from the customer's account as this is a simulated transaction.
            - Ensure you have entered the API keys generated in the test mode in the Checkout code.

         
            
                Supported Payment Methods
                
                 @include integration-steps/next-steps
                

         
        
    
    
### 2.2 Update Checkout Settings

         Follow the steps given below for a smooth checkout experience:
         1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
         2. Navigate to **Settings** → **Checkout**. 
         3. On the **Customer contact method** section, click **Phone number or email** and click **Save**.
            ![Shopify Checkout v2](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-checkout-v2.jpg.md)

         
> **INFO**
>
> 
> 
>          **Handy Tips**
> 
>          Your customer's email ID is prefilled during checkout, but the `phone number` must be entered manually.
>          

        

    
### 2.3 Verify Payment Status

         You can track the payment status from the Razorpay Dashboard or by polling APIs.
            
                
                1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
                2. Check if a `payment_ID` has been generated and note the status. In case of a successful payment, the status is marked as `captured`. 
                ![Payment status on dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/testpayment.jpg.md)
                
                
                [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments) to check the payment status.
                
            
        

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
### 3.1 Switch from Test mode to Live mode

         You can perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the installation and integration is working as expected, switch to the Live Mode and start accepting payments from customers. 

         Watch this short animation to know how to switch from **Test Mode** to **Live Mode** on your Shopify store.

         ![Shopify Go Live](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-go-live-v2.gif.md)

         To switch from **Test Mode** to **Live Mode**:
         1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
         2. Navigate to **Settings** → **Payments**. 
         3. On the **Supported payment methods** section, click **Manage** on the **1 Razorpay** app.
            ![Shopify go live v2](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-go-live-v2.jpg.md)
         4. At the bottom of the page, select the **Enable test mode** option and click **Save**.
            ![Shopify go live v2 save](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-go-live-save.jpg.md)
         You can now start accepting actual payments on your Shopify store.
