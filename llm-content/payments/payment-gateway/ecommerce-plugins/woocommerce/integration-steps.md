---
title: WooCommerce Razorpay Integration Steps | Payment Gateway Setup Guide
heading: Integration Steps
description: Step-by-step guide to integrate Razorpay Payment Gateway with WooCommerce. Install Razorpay WooCommerce plugin and start accepting payments on WordPress.
---

# Integration Steps

Integrate Razorpay Payment Gateway with your WooCommerce website using our official WooCommerce plugin. This step-by-step guide covers installation, configuration, testing and going live with Razorpay on WordPress WooCommerce stores.

Follow the steps given below to integrate Razorpay Payment Gateway with your WooCommerce website.

  - **1. Build Integration**: Install and configure the WordPress plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/p2YMdxZMyxQ]

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Install Plugin

     There are two methods to install our WooCommerce plugin:

      
        
          1. [Download the plugin](https://wordpress.org/plugins/woo-razorpay/).
          1. Install it from the WordPress Plugin Directory.
        
        
          1. Download the [latest Source code zip file](https://github.com/razorpay/razorpay-woocommerce/releases/latest) from the Releases section in GitHub.
          1. Unzip and upload the contents of the extension to your `/wp-content/plugins/` directory.
        
      
    

  
### 1.2 Configure WooCommerce

      1. Log in to your [WordPress account](https://wordpress.com/log-in) and activate the Razorpay plugin in the **WordPress Plugin Manager**.
      2. Log in to your [WooCommerce account](https://woocommerce.com/), navigate to **Settings** and click the **Checkout/Payment Gateways** tab.
      3. Click **Razorpay** to edit the settings.
      4. Enable the Payment Method, name it Credit Card/Debit Card/Internet Banking. This is shown on the Payment page your customer sees.
        
          
> **INFO**
>
> 
>           **Handy Tips**
> 
>           If you cannot see the Razorpay payment option during WooCommerce checkout, update the plugin to the [latest](https://github.com/razorpay/razorpay-woocommerce/releases/latest) version.
>           ![Payments option error](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/Woocommerce-payment-error.jpg.md)
> 
>           

        
      5. Add in your [KEY_ID] and [KEY_SECRET] generated from the Razorpay Dashboard.
      6. Set the **Payment Action** to **Authorize and Capture** to auto-capture payments. If you want to capture payments manually from the Dashboard after manual verification, set the Payment Method to **Authorize**.
    

> **INFO**
>
> 
> 
> **Configure Webhooks**
> 
> Webhook is [auto-configured](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce/troubleshooting-faqs/#1-how-are-webhooks-aut-configured.md) when you enter and save the API key ID and secret on the plugin settings page. You need to verify if webhooks are enabled on your Razorpay [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce/troubleshooting-faqs/#3-how-can-i-verify-if-webhooks-are.md). However, for versions lower than 3.5.0, you need to [configure webhooks manually](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce/troubleshooting-faqs/#2-my-webhooks-are-not-auto-configured-since-i.md).
> 

## 2. Test Integration

After the integration is complete, a **Pay** button will appear on your web page/app. You need to click the button and make a test transaction to ensure that the integration is working as expected. You can start accepting actual payments from your customers once the test is successful.

You can make test payments using one of the payment methods configured at the Checkout.
- No money is deducted from the customer's account as this is a simulated transaction.
- Ensure you have entered the API keys generated in the test mode in the Checkout code.

    
### Supported Payment Methods

         @include integration-steps/next-steps
        

    
### Verify Payment Status

        You can track the payment status from the Dashboard or by polling APIs.
        
            
                1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
                2. Check if a `payment_ID` has been generated and note the status. In case of a successful payment, the status is marked as `captured`.
                
                    ![](/docs/assets/images/testpayment.jpg)
            
            
                  [Poll Payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-multiple-payments.md) to check the payment status.
            
        
        

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
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
