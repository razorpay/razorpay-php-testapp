---
title: Payment Gateway | BigCommerce - Integration Steps
heading: Integration Steps
description: Steps to integrate your BigCommerce website with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your BigCommerce website.

  - **1. Build Integration**: Install and configure the BigCommerce plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/UCH55jCpBg4]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Installation

            Follow the steps given below to install the plugin:
            1. Log in to your [BigCommerce account](https://login.bigcommerce.com/login). 
            2. Navigate to **Apps** → **Marketplace**.
                ![Navigate to Apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bigcommerce-apps.jpg.md)
            3. Click **BIGCOMMERCE.COM/APPS** and search for **Razorpay**.
                ![specific and meaningful image title](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bigcommerce-marketplace.jpg.md)
            4. Click **Razorpay** and click **GET THIS APP**.
                ![Install the app](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bigcommerce-get-app.gif.md)
            5. Enter the **API Key ID** generated from the [Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys). 

                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 To go live with the integration and start accepting real payments, generate [Live Mode API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) and replace the test key with the live key in the integration.
>                 
 

            6. Click **Submit**. 
            ![Submit detail to install the Razorpay plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bigcommerce-install1.jpg.md)

            You have successfully integrated the Razorpay Payment Gateway with your BigCommerce website.

            
            
            
> **INFO**
>
> 
> 
>             **Handy Tips**
> 
>             - Webhooks are auto-configured when you enter and submit the API key ID during the installation. You can verify if webhooks are enabled on your Razorpay Dashboard. 
>             - The `order.paid` and `refund.processed` events are auto-configured. You do not have to configure it on the Razorpay Dashboard. 
>             

            
        

## 2. Test Integration

After the integration is complete, a **RAZORPAY PAYMENTS** button will appear on your web page/app. You need to click the button and make a test transaction to ensure that the integration is working as expected. You can start accepting actual payments from your customers once the test is successful.

![Test the integration on your webpage/app](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bigcommerce-test.gif.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> This is a mock payment page that uses your test API keys, test card and payment details. 
> - Ensure you have entered only your [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) in the Checkout code. 
> - Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> 

    
### Supported Payment Methods

         @include integration-steps/next-steps
        

    
### Verify Payment Status

        You can track the payment status from the Dashboard or by polling APIs.
        
            
                1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
                2. Check if a `payment_ID` has been generated and note the status. In case of a successful payment, the status is marked as `captured`.
                
                    ![](/docs/assets/images/testpayment.jpg)
            
            
                  [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments) to check the payment status.
            
        
        

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

         After a payment is `authorized`, it is automatically captured and the amount is settled to your account as per the settlement schedule. Know more about [Auto-capture payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments).
