---
title: Payment Gateway | PrestaShop - Integration Steps
heading: Integration Steps
description: Steps to integrate your PrestaShop website with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your PrestaShop website.

  - **1. Build Integration**: Install and configure the PrestaShop plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/CTjA7fwOEys?si=HER--F3MzRuR775X]

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Installation and Configuration

     1. Download the Source code zip file of the required version of the plugin from the Releases section in GitHub.
        - For PrestaShop 1.6, download releases tagged 1.x.y. The latest release for PrestaShop 1.6 is [version 1.3.1](https://github.com/razorpay/razorpay-prestashop/releases/download/1.3.1/razorpay.zip).
        - For PrestaShop 1.7, download releases tagged 2.x.y. The latest release for PrestaShop 1.7 is [version 2.5.3](https://github.com/razorpay/razorpay-prestashop/releases/download/2.5.3/razorpay.zip).
        - For PrestaShop 8.0 and 8.1, download releases tagged 2.x.y. The latest release for PrestaShop 8.0 and 8.1 is [version 2.5.4](https://github.com/razorpay/razorpay-prestashop/releases).
  2. Log in to your [PrestaShop account](https://addons.prestashop.com/en/).
      ![Prestashop Login](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/prestashop-login.jpg.md)
  3. Navigate to the **Modules** tab and click **Add a New Module**.
  4. Click **Browse** to open the Windows search on your computer. Select the ZIP file that you have downloaded and click **OK**.
  5. Click **Upload this Module**.
  6. Click **Install** to install the module.
  7. Click **Configure** to configure the module.

  
> **WARN**
>
> 
> 
>   **Watch Out!**
> 
>   If the store is open while the module is not fully configured, deactivate it by clicking the green check. Reactivate the store by clicking the red X after the module configuration.
>   

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Webhook is auto-configured when you enter and save the API key ID and secret on the plugin settings page. You need to verify if webhooks are enabled on your Razorpay [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/prestashop/troubleshooting-faqs.md#2-how-can-i-verify-if-webhooks-are). However, for versions lower than 2.5.0, you need to [configure webhooks manually](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/prestashop/troubleshooting-faqs.md#1-my-webhooks-are-not-auto-configured-since-i).
>   

  If you face any errors, refer to the [PrestaShop guide](https://addons.prestashop.com/en/content/21-how-to).
    

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

         @include integration-steps/capture-settings
