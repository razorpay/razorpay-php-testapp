---
title: Payment Gateway | CS-Cart - Integration Steps
heading: Integration Steps
description: Steps to integrate your CS-Cart website with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your CS-Cart website.

  - **1. Build Integration**: Install and configure the CS-Cart plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/voiOPS2av6I]

## 1. Build Integration

Follow the steps given below:

   
### 1.1 Installation

       1. Ensure you have the latest version of CS-Cart installed.
       2. Download the latest [Source code zip file](https://github.com/razorpay/razorpay-cscart/releases) from the releases section. Unzip the repository.
       3. Run the `install.razorpay.sql` file, which can be found inside the unzipped package, against your CS-Cart database. To do this, you can either:
          - Use phpMyAdmin to import the file into your CS-Cart database.
          - Copy and paste the content and run it directly in your MySQL shell.
       4. Upload the rest of the plugin's contents to your CS-Cart Installation directory.
          1. The app folder's content goes into your CS-Cart Installation directory.
          2. The content of the design folder goes into the design folder in your CS-Cart Installation directory.
      

   
### 1.2 Configuration

       1. Log in to CS-Cart as administrator.
       2. Navigate to **Administration** → **Payment Methods**.
       3. Add a new payment method.
       4. Select **Razorpay** from the list and then click **Save**. Select `cc_outside.tpl` for the template.
       5. Navigate to the **Configure** tab.
       6. Add your [KEY_ID] and [KEY_SECRET] generated from the Razorpay Dashboard.
      

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Webhook is auto-configured when you enter and save the API key ID and secret on the plugin settings page. You need to verify that webhooks are enabled on your Razorpay [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/cs-cart/troubleshooting-faqs/#2-how-can-i-verify-if-webhooks-are.md). However, for versions lower than 1.4.0, you need to [manually configure webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/cs-cart/troubleshooting-faqs/#1-my-webhooks-are-not-auto-configured-since-i.md).
> 
> 

## 2. Test Integration

After the integration, Razorpay is added as a payment option on your web page/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual customer payments once the test is successful.

![](/docs/assets/images/pg-cs-cart-plugin.jpg)

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
