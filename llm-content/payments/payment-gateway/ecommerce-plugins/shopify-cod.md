---
title: Integrate Razorpay Shopify - Cash on Delivery
heading: Integration Steps
description: Steps to integrate the Razorpay Payment Gateway with Shopify - Cash on Delivery.
---

# Integration Steps

> **WARN**
>
> 
> **Watch Out!**
> 
> This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to integrate Razorpay - Cash on Delivery with your Shopify website.
> 

**Before you proceed:**

- Sign up for [Razorpay account](https://dashboard.razorpay.com/signup)

- Sign up for a [Shopify account](https://www.shopify.in).

Follow the steps given below to integrate your Shopify website with the Razorpay - Cash on Delivery plugin.

  - **1. Build Integration**: Install and configure the Shopify COD plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Integration Steps

         

         

         
        

## 2. Test Integration

After the integration is complete, follow the steps given below:

    
### 2.1 Enable Test Mode in Shopify Dashboard

         After the integration is complete, you need to ensure the integration is working as expected. You can start accepting actual payments once the test mode transaction is successful.

         Follow the steps given below to test a transaction:

         1. Log in to [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
         2. Navigate to **Settings** → **Payments**. 
         3. Click **Manage** on the Razorpay - Cash on Delivery app on the **Supported payment methods** section.
            ![Shopify go live v2](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-cod-go-live-v2.jpg.md)
         4. Select **Enable test mode** and click **Save**.
             ![Shopify go live v2 save test](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-cod-go-live-test.jpg.md)
        

    
### 2.2 Make a Test Payment

         1. Click **Buy it now**.
             ![Shopify checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/buy-now-shopify-cod.jpg.md)
         2. Fill in your **Contact** and **Delivery** details.
             ![Shopify contact details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-shipping-contact-details.jpg.md)
             Select **Cash on Delivery** as Payment method and select **Billing address**.
             ![Shopify contact details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-cod-shipping-contact-details1.jpg.md)
         3. Click **Pay now** and the order is placed.
        

    
### 2.3 Verify Payment Status

         You can track the payment status from the Razorpay Dashboard, subscribe to the Webhook event or poll our APIs.

         **Verify Payment Status From Dashboard**

         1. Log in to the Dashboard and navigate to **Transactions** → **Payments**.
         2. Check if a `payment_ID` has been generated and note the status. In case of a successful payment, the status is marked as `captured`. 

        

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
### 3.1 Switch from Test mode to Live mode

         You can perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the installation and integration is working as expected, switch to the Live Mode and start accepting payments from customers. 

         To switch from **Test Mode** to **Live Mode**:
         1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
         2. Navigate to **Settings** → **Payments**. 
         3. On the **Supported payment methods** section, click **Manage** on the **Razorpay - Cash on Delivery** app.
            ![Shopify go live v2](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-cod-go-live-v2.jpg.md)
         4. Clear **Enable test mode** and click **Save**.
            ![Shopify go live v2 save](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/shopify-cod-go-live-test.jpg.md)
         You can now start accepting actual payments on your Shopify store.
        

## Support

Queries: If you have queries, raise a ticket on the [Razorpay Support Portal](https://razorpay.com/support/)

### Related Information

[Shopify - 1 Razorpay](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify.md)
