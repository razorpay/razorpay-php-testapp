---
title: Quick Integration - Steps | Razorpay Payment Gateway
heading: Integration Steps
description: Steps to integrate with Razorpay Quick Integration.
---

# Integration Steps

Follow these steps to integrate the standard checkout form on your website:

  - **1. Build Integration**: Integrate Standard Checkout form on website.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Create an Order in Server

         @include integration-steps/order-creation-v2
        

    
### 1.2 Pass Order ID and Other Options to Checkout

         - This integration method provides a default **Pay with Razorpay** button that invokes the Checkout form.
         - Pass Checkout form options as data attributes inside a `` tag. You can add any additional hidden or visible fields to the form, which will be submitted along with the form.
         - Send Checkout options as form-data to the following URL in a POST request.

         
            
                1.2.1 Code to Add Pay Button
                
                 /https://www.example.com/success/

                 The following sample code passes the Razorpay checkout options as HTML data attributes:

                 
                 ```html: Quick Integration
                 
                 
                 
                 
                 ```
                 

                 
                
             
            
### 1.2.2 Handle Payment Success and Failure

                 The way the payment success and failure scenarios are handled depends on the [Checkout Sample Code](#122-code-to-add-pay-button) you used in the previous step.

                 
                     
                         #### On Payment Success 

                         Razorpay makes a POST call to the callback URL with the **razorpay_payment_id**, **razorpay_order_id** and **razorpay_signature** in the response object of the successful payment. Only successful authorisations are auto-submitted.
                     
                     
                         #### On Payment Failure

                         In case of failed payments, the checkout is displayed again to facilitate payment retry.
                     
                 
                

            
### 1.2.3 Checkout Options

                 @include checkout-parameters/quick
                

         
        
    
    
### 1.3 Store Fields in Your Server

         @include integration-steps/store-fields
        

    
### 1.4 Verify Payment Signature

         @include integration-steps/verify-signature

         Here are the links to our [SDKs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/#github-and-documentation-links-for-sdks.md) for the supported platforms.
        

    
### 1.6 Verify Payment Status

         @include integration-steps/verify-payment-status
        

## 2. Test Integration

@include integration-steps/next-steps

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Web Standard Checkout integration. Consider these steps before taking the integration live.

    
### 3.1 Accept Live Payments

         Perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you are switching your test API keys with API keys generated in Live Mode.
> 

To generate API Keys in Live Mode on your Razorpay Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        

    
### 3.2 Payment Capture

         @include integration-steps/capture-settings
        

    
### 3.3 Set Up Webhooks

         @include integration-steps/set-up-webhooks
