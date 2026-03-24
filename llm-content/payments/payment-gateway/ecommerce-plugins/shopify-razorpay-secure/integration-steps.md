---
title: Shopify Razorpay Secure Integration Steps | Payment Gateway Setup
heading: Integration Steps
description: Step-by-step guide to integrate Razorpay Payment Gateway with Shopify. Install Razorpay Secure app and start accepting payments on your Shopify store.
---

# Integration Steps

Follow the steps given below to integrate 1 Razorpay App on your Shopify store.

  - **1. Build Integration**: Install the 1 Razorpay App.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Installation

         1. Sign up for a .
         2. Once your Razorpay account is activated, click on [this link](https://apps.shopify.com/razorpay-secure) to access the Razorpay Secure App on your Shopify store. Click **Install**.
            ![Shopify Install](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-razorpay-secure-install-new.jpg.md)
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

            ![Shopify Activate](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-1razorpay-activate.jpg.md)

         Razorpay Secure now appears as a Payment Gateway on your Shopify Store checkout. This completes your integration. For more information, see [Shopify FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify-razorpay-secure/faqs.md).

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          **Shopify Plus** merchants can use the [**Shopify Script**](https://help.shopify.com/en/manual/checkout-settings/script-editor/examples/payment-gateway-scripts#reorder-gateways) to modify their plugins. 

>          For example, you can: 
 
>             - Change the order of the payment methods on your checkout.
>             - Select the relevant payment methods on your checkout.
>             - Modify the payment option title on your checkout.
>                 
>          

        

## 2. Test Integration

After the integration of **Shopify - Razorpay Secure** on your Shopify store is complete, follow the steps given below:

    
### 2.1 Make a Test Transaction in Test Mode

         After completing the integration, you must ensure it is working as expected. You can start accepting actual payments from your customers once the test mode transaction is successful.

         Follow the steps given below to test a transaction in test mode:

         

         

         

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
            ![Shopify Checkout v2](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-checkout-v2.jpg.md)

         
> **INFO**
>
> 
> 
>          **Handy Tips**
> 
>          Your customer's email ID is prefilled during checkout, but the `phone number` must be entered manually.
>          

        

    
### 2.3 Verify Payment Status

         You can track the payment status from the  Dashboard or by polling APIs.
            
                
                1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
                2. Check if a `payment_ID` has been generated and note the status. In case of a successful payment, the status is marked as `captured`. 
                    
                
                
                [Poll Payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-multiple-payments.md) to check the payment status.
                
            
        

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
### 3.1 Switch from Test mode to Live mode

         You can perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the installation and integration is working as expected, switch to the Live Mode and start accepting payments from customers. 

         Watch this short animation to know how to switch from **Test Mode** to **Live Mode** on your Shopify store.

         ![Shopify Go Live](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-go-live-v2.gif.md)

         To switch from **Test Mode** to **Live Mode**:
         1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
         2. Navigate to **Settings** → **Payments**. 
         3. On the **Supported payment methods** section, click **Manage** on the **1 Razorpay** app.
            ![Shopify go live v2](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-go-live-v2.jpg.md)
         4. At the bottom of the page, untick the **Enable test mode** option and click **Save**.
            ![Shopify go live v2 save](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-go-live-save.jpg.md)
         You can now start accepting actual payments on your Shopify store.
