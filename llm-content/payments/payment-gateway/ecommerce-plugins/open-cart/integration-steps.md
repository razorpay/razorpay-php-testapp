---
title: Payment Gateway | OpenCart - Integration Steps
heading: Integration Steps
description: Steps to integrate your OpenCart Extension with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your OpenCart Extension.

  - **1. Build Integration**: Install and configure the OpenCart plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/lVzskQnl170]

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Install Plugin

     1. Download the latest Source code zip file of the required version of the plugin.
      1. Download the latest release of the OpenCart 4 plugin from the [Releases section](https://github.com/razorpay/razorpay-opencart/releases) in GitHub. Tags for OpenCart 4 are opencart4-6.x.y.

          
> **WARN**
>
> 
>           **Watch Out!**
> 
>           When installing the Razorpay plugin for Opencart 4, ensure that your zip folder only contains the following folders and file, with no hidden files:
>           - `admin/`
>           - `catalog/`
>           - `system/`
>           - `install.json`
>           

      1. Download the latest release of the OpenCart 3 plugin from the [Releases section](https://github.com/razorpay/razorpay-opencart/releases) in GitHub. Tags for OpenCart 3 are opencart3-1.x.y.
      1. For OpenCart 2, [download this release](https://github.com/razorpay/razorpay-opencart/releases/tag/opencart2-3.0.0) from GitHub. Tags for OpenCart 2 are opencart2-3.x.y.
      1. For OpenCart 1.5, [download this release](https://github.com/razorpay/razorpay-opencart/releases/tag/opencart1.5-1.0.0) from GitHub. Tags for OpenCart 1.5 are opencart1.5-1.x.y.
    2. Navigate to **Extensions** → **Installer** and click **Upload**. Choose the zip file.
    

  
### 1.2 Configure OpenCart

     Configure OpenCart as given below:
      1. Log in to [OpenCart](https://www.opencart.com/).
      1. Navigate to the **Admin Panel** → **Extensions** → **Payments** to install the Razorpay Payment Gateway extension.
      1. Click **Edit**. Complete the following steps:
          1. Add in your Key_ID and Key_Secret generated from the Razorpay Dashboard.
          1. Change extension status to **Enabled**.
          1. Click **Save** to save the extension settings.

          
> **INFO**
>
> 
> 
>           **Handy Tips**
> 
>           Webhook is auto-configured on OpenCart 3 (versions 5.0.0 and above) and OpenCart 4 when you enter and save the API key ID and secret on the plugin settings page. You need to verify if webhooks are enabled on your Razorpay [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/open-cart/troubleshooting-faqs/#2-how-can-i-verify-if-webhooks-are.md). 

>           However, for versions lower than 5.0.0, you must [configure webhooks manually](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/open-cart/troubleshooting-faqs/#1-my-webhooks-are-not-auto-configured-since-i.md).
>           

          #### Create Cron for OpenCart 3

          Create a Cron for Webhook using cpanel, follow the steps given below:

          1. Log on to your cPanel Interface.
          2. Go to **Advanced** section.
          3. Click **Cron Jobs**.
          4. Select the specific time from the lists provided (every 5 minutes).
          5. Enter `https:///index.php?route=extension/payment/razorpay/rzpWebhookCron/` in the **Command** field.

          For more information about Cron, refer to [OpenCart Crons](https://docs.opencart.com/developer-guide/cron-jobs).
    

## 2. Test Integration

After the integration, Razorpay will appear as a payment option on your webpage/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual payments from your customers once the test is successful.

![Open Cart](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/pg-opencart-plugin-test.jpg.md)

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
