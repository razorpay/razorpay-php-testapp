---
title: Payment Gateway | WHMCS - Integration Steps
heading: Integration Steps
description: Steps to integrate your WHMCS website with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your WHMCS website.

  - **1. Build Integration**: Install and configure the WordPress plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/BjRz4vg38gA]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Installation and Configuration

         1. Ensure you have installed the latest version of WHMCS.
         1. Download the Source code zip file of the required version of the plugin from the Releases section in GitHub.
            - If you are using WHMCS 5, download the release tagged [version 1.0.3](https://github.com/razorpay/razorpay-whmcs/releases/tag/v1.0.3).
            - If you are using WHMCS 6, 7 or 8, download the release tagged [version 2.0.1](https://github.com/razorpay/razorpay-whmcs/releases/tag/2.0.1).
         1. Unzip and upload the repository contents to your WHMCS Installation directory. That is, the contents of the module folder from the repository go into the module folder of your WHMCS Installation directory.
         1. Log in to your site as the WHMCS administrator. This is done by adding `/admin` to the URL where you have installed WHMCS, for example, `www.example.com/whmcs/admin`.
         1. Navigate to **Setup** → **Payments** → **Payment Gateways**.
         1. Select Razorpay from the drop-down list and **Activate** it.
         1. Enter the [KEY_ID] and [KEY_SECRET]. You can generate these from your Razorpay Dashboard.
         1. Set **Convert for Processing** to INR if your store has a different default currency. In this case, update the Exchange Rate in your currency management settings.
         1. Click **Save Changes**.
        

    
### 1.2 Configure Webhooks

            To receive webhook notifications, you should configure webhooks on your WHMCS site and the Razorpay Dashboard.

           
            
            To set up webhooks in the WHMCS site:
            1. Log in to your site as the WHMCS administrator.
            2. Navigate to **System Settings** → **Payment Gateways**.
            3. Click **Manage Existing Gateways**.
            4. Select the **Enable Webhook** option.
            5. Copy the URL that appears on the screen. In the Razorpay Dashboard, configure this URL in **Accounts & Settings** → **Webhooks**. Know more about how to [setup webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).
            6. Enter the secret.

            ![Setting up Webhooks on WHMCS site](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-whmcs-whmcs-webhooks.jpg.md)

            
            
                To set up webhooks in the Razorpay Dashboard:
                1. Log in to the Razorpay Dashboard.
                2. Navigate to **Accounts & Settings** → **Webhooks**.
                3. Click + Add New Webhook.
                4. In the Webhook Setup modal:
                     - Paste the URL copied from the WHMCS site.
                      
> **INFO**
>
> 
>                       **Handy Tips**
>             
>                       Webhooks can only be delivered to public URLs. You will notice an error if you attempt to save a localhost endpoint as part of a webhook setup. Know about [validating and testing webhooks for alternatives to localhost](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/validate-test/#test-webhooks.md).
>                       

                     - Enter the Secret you provided on the WHMCS site. The secret is used to validate where the webhook is from Razorpay. Do not expose the secret publicly. Know about how to [validate webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/validate-test/#validate-webhooks.md).
                     - In the **Alert Email field**, enter the email address to which notifications must be sent in case of webhook failure.
                     - Select the `order.paid` event from the list of **Active Events**.

                5. Click **Create Webhook**. 

                 ![Setting up Webhooks on Razorpay Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-whmcs-rzp-webhooks.jpg.md)
            
           
        

## 2. Test Integration

After the integration, a **Pay** button will appear on your web page/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual payments from your customers once the test is successful.

You can make test payments using one of the payment methods configured at the Checkout.
- No money is deducted from the customer's account as this is a simulated transaction.
- Ensure you have entered the API keys generated in the test mode in the Checkout code.

 
    
### Supported Payment Methods

         @include integration-steps/next-steps
        

    
### Verify Payment Status

         @include integration-steps/verify-payment-status
        

 

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
