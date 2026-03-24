---
title: Payment Gateway | Gravity Forms - Integration Steps
heading: Integration Steps
description: Steps to integrate your WordPress website using the Gravity Forms plugin.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your Gravity Forms website.

  - **1. Build Integration**: Install and configure the WordPress plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/89GKc3z2JEc]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Download Razorpay Gravity Forms Plugin and Configure Settings

         Follow the steps given below:
         1. Download and install the Razorpay Gravity Forms Plugin. You can do this using either of these methods:
             - [Download the latest version of the plugin from the WordPress Plugin Directory](https://github.com/razorpay/razorpay-gravity-forms/releases/latest) and add the zip file to your WordPress website's **Plugins** folder.
             - Add the plugin directly on your WordPress website from the **Plugin** page.
                 ![add wordpress plugin on website](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-add-plugin-wordpress.jpg.md)
         1. On your WordPress site, activate the plugin in the **WordPress Plugin Manager**. 

            ![activate plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-activate-plugin.jpg.md) 

         1. Click **Settings**. 

            ![open plugin settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-plugin-settings.jpg.md) 

         1. Configure the following information and click **Update Settings**:
            - Add in your [KEY_ID] and [KEY_SECRET] generated from the Razorpay Dashboard.
            - **Payment Action**: Set this to **Authorize and Capture**.
         1. Select the currency in which the payment must be accepted. 
            1. Navigate to **Forms** → **Settings**.
            2. Under **General Settings**, go to the **Currency** field and choose the relevant currency. For this example, we will select **Indian Rupee**.
            ![change currency](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-change-currency.jpg.md)
        

    
### 1.2 Create a Gravity Form

         To create a Gravity Form:
         1. Navigate to **Forms** → **New Form** and click **Add New**.
         2. Enter the form title and description in the **Create a New Form** dialog box.
         3. Click **Create Form**.
         4. Before entering the product details, you must select whether you are selling a subscription or a product/service. Navigate to **Settings** → **Razorpay** and configure the **Razorpay Feed**.
            1. In the **Razorpay Feed** settings, click **Add New**.
            2. Add a name for the feed. For example, `Ooty Green Tea`.
            3. Select `Products and Services` as the **Transaction Type**.
            4. Click **Update Settings**.
                ![select products and services](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-feed-settings.jpg.md) 

         4. Click **Edit** to start adding product details:
            ![](/docs/assets/images/ecommerce-plugins-gravity-forms-edit-form.jpg) 

            1. Click **Pricing Fields** and select **Product**.
                ![configure gravity form](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-configure-form.jpg.md) 

            2. Click the form to enter the product details and click **Update**.
                1. **Field Label**: Enter the product name. For example, `Ooty Green Tea`.
                2. **Description**: Enter a description for the product.
                3. **Field Type**: Select the field type as required.
                4. **Price**: Enter the product price in INR. For example, `399.99`.
                5. **Disable Quantity Field**: Do not select this option if your customer wants to choose a quantity.
                6. **Rules**: Enable the **Required** check box to make the quantity field mandatory.
            ![add product details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-product-details.jpg.md) 

         The form is now ready to be added to your web pages.
        

    
### 1.3 Add the Form to a Webpage

         To add the form on a webpage:
         1. Click **Pages** to navigate to the relevant page.
         2. Add a block and click the form icon.
            ![click form icon](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-form-icon.jpg.md) 

         3. Select the form to be added to the page.
            ![select form](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ecommerce-plugins-gravity-forms-select-form.jpg.md) 

         4. Once the form is added, you can choose to hide the form title and description.
         5. Click **Publish** or **Update**.
        

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Webhook is auto-configured when you enter and save the API key ID and secret on the plugin settings page. You need to [verify if webhooks are enabled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/gravity-forms/troubleshooting-faqs.md#2-how-can-i-verify-if-webhooks-are) on your Razorpay Dashboard. However, for versions lower than 1.3.2, you need to [configure webhooks manually](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/gravity-forms/troubleshooting-faqs.md#1-my-webhooks-are-not-auto-configured-since-i).
> 

## 2. Test Integration

After the integration, Razorpay will appear as a payment option on your web page/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual payments from your customers once the test is successful.

![Gravity Forms](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pg-gravity-forms-plugin.jpg.md)

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
