---
title: Payment Gateway | Arastta - Integration Steps
heading: Integration Steps
description: Steps to integrate your Arastta website with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your Arastta website.

  - **1. Build Integration**: Install and configure the Arastta Commerce plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/p7gDH2h3rgg?si=71SaBoJOpNxrhUK7]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Installation

         1. Download a ZIP of the [repository](https://github.com/razorpay/razorpay-arastta/archive/master.zip). The master branch holds the plugin for the latest Arastta version.
            ![](/docs/assets/images/ecommerce-plugins-arastta-1.jpg)
            

         2. Copy all files and folders recursively to Arastta installation directory.
         3. Log in to [Arastta](https://arastta.org/).
         4. Navigate to the **Admin Panel** → **Marketplace** → **Payments** and enable the Razorpay extension.
         5. Click **Edit** next to Razorpay and complete the following actions:
            1. Add your Razorpay `[KEY_ID]` and `[KEY_SECRET]`. These can be generated from your Razorpay [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).
            2. Change plugin status to **Enabled**.
            3. Click **Save** to save the plugin settings.
        

## 2. Test Integration

After the integration is complete, a **Pay** button will appear on your web page/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual payments from your customers once the test is successful.

![](/docs/assets/images/arastta-pay-button.jpg)

You can make test payments using one of the payment methods configured at the Checkout.
- No money is deducted from the customer's account as this is a simulated transaction.
- Ensure you have entered the API keys generated in the test mode in the Checkout code.

    
### Supported Payment Methods

         @include integration-steps/next-steps
        

    
### Verify Payment Status

         @include integration-steps/verify-payment-status
        

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
### Accept Live Payments

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
