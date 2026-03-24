---
title: Payment Gateway | Magento - Integration Steps
heading: Integration Steps
description: Steps to integrate your Magento Extensions with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your Magento website.

  - **1. Build Integration**: Install the Magento plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/22bvT3z1_98?si=e5cWAGO70V49zRHA]

## 1. Build Integration

Follow the steps given below to integrate Razorpay Payment Gateway with your Magento 1.x and 2.x Extensions.

    
### Integration Steps for Magento 1.x Extension

         
            
                Step 1: Download and Install via Repository
                
                 Follow the steps given below to download and install Magento 1.x Extension.

                 #### Download Repository

                 1. [Download](https://github.com/razorpay/razorpay-magento-v1/releases/latest) the `Razorpay-1.2.1.tgz` file from the latest release.
                 2. If you have **Onepage Checkout (IWD or Fire Checkout)**, [download](https://github.com/razorpay/razorpay-magento-v1/releases/latest) the Source Code zip from the latest release. With Onepage Checkout you can gather the required information from the shopper and complete the checkout process quickly. When Onepage Checkout is enabled, the entire checkout process takes place on a single page.

                 ### Install Repository

                 You can install the repository in two ways:

                 
                  
                     1. Go to Magento Connect Manager.
                     2. Go to `Direct package file upload`.
                     3. Click `Choose File` and select the TGZ file from Step 1.
                     4. Click `upload`.
                  
                  
                     1. Unzip and open the downloaded folder.
                     2. Copy the **app** folder.
                     3. Paste and merge it into the Magento root folder.
                     4. Copy the **js** folder.
                     5. Paste and merge it into the Magento root folder.
                  
                 

                 Once installed, navigate to **Configuration** and then to **Payment Gateways** and [configure the extension](#step-2-configure-magento-store-1x) to suit your needs.
                

            
### Step 2: Configure Magento Store 1.x

                 To configure your Magento store for Razorpay:

                 1. Log in to your [Magento store](https://business.adobe.com/products/magento/magento-commerce.html/).
                 2. Click on the **System** tab and then select **Configuration** option from the drop-down list.
                    ![](/docs/assets/images/ecommerce-plugins-magento1.x-3.jpg)
                 3. Click **Payment Methods** in the menu panel.
                 4. Scroll down. Click **Razorpay** and enter your test mode `[KEY_ID]` and `[KEY_SECRET]`.
                    ![](/docs/assets/images/ecommerce-plugins-magento1.x-4.jpg)
                 5. Select **Yes** for the **Enabled** option.
                 6. Click **Save Config** button. This activates your account in the Test Mode. You can use this account to make a few test payments to ensure a successful workflow.
                 
> **INFO**
>
> 
>                  **Handy Tips**
> 
>                  In test mode, no real money is deducted from your account.
>                  

                

         
        
    
    
### Integration Steps for Magento 2.x Extension

         
         
            
                Step 1: Download and Install Extension
                
                 You can install the extension through two ways:
                 
                 
                  
                     1. Install the extension on your Magento store using the Composer Package Manager. Composer is an application-level package manager for the PHP programming language that provides a standard format for managing dependencies of PHP software and required libraries.
                     2. Go to your installation root directory of Magento and execute the following command:

                        ``` bash: Command
                        composer require razorpay/magento
                        bin/magento module:enable Razorpay_Magento
                        ```
                     3. You can check if the installation was successful by executing the following command in the Magento root directory.

                        ``` bash: Command
                        bin/magento module:status
                        ```
                        
> **INFO**
>
> 
>                         **Handy Tips**
> 
>                         You should see `Razorpay_Magento` in the status. It might appear on the disabled modules list.
>                         

                     4. Enable and deploy the Razorpay module using commands:

                        ``` bash: Command
                        bin/magento module:enable Razorpay_Magento
                        bin/magento setup:di:compile
                        bin/magento setup:upgrade
                        bin/magento cache:flush
                        bin/magento setup:static-content:deploy
                        ```

                     

                     **Upgrade Magento Extension**

                     If you are an existing extension user, you can [upgrade](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/magento/#upgrade-magento-extension.md) to the latest version using the composer.
                     
                  
                  
                     1. Download the `code.zip` file from the [latest release](https://github.com/razorpay/razorpay-magento/releases/latest). Extract the zip.
                     2. Place the `code` folder from Step 1 in your `app` folder. If you're performing an update, replace/overwrite the existing `code` folder.
                     3. Enable and deploy the Razorpay module using commands:

                        ``` bash: Command
                        bin/magento module:enable Razorpay_Magento
                        bin/magento setup:upgrade
                        ```
                     4. Install Magento cron jobs using the command:

                        ``` bash: Command
                        bin/magento cron:install
                        ```
                     5. Enter the following command to compile the dependency code:

                        ``` bash: Command
                        bin/magento setup:di:compile
                        ```
                     6. Enter the following command to upgrade the Razorpay Magento module from the Magento installation folder:

                        ``` bash: Command
                        bin/magento setup:di:upgrade
                        ```
                     7. On the Magento Admin Dashboard, open Razorpay payment method settings and click **Save Config**.

                        
> **WARN**
>
> 
>                         **Watch Out!**
> 
>                         If you see the message `One or more of the Cache Types are invalidated: Page Cache.` highlighted in yellow on the Admin page, go to **Cache Management** and refresh cache types.
>                         

                     8. Run the following command:

                        ``` bash: Command
                        bin/magento cache:flush
                        ```
                  
                 
                

            
### Step 2: Configure Magento Store 2.x

                 To configure your Magento store for Razorpay:

                 1. Log in to your [Magento store](https://business.adobe.com/products/magento/magento-commerce.html/).
                 2. Choose **Stores** on the Admin sidebar to the left. Now go to **Settings** → **Configuration**.
                    ![](/docs/assets/images/plugins-magento-magento-2.x-1.jpg)
                 3. In the **Configuration** page, click on **Sales** on the left and choose **Payment Methods**.
                    ![](/docs/assets/images/plugins-magento-magento-2.x-2.jpg)
                 4. In the **Payment Methods** page, navigate to Razorpay.
                    ![](/docs/assets/images/plugins-magento-magento-2.x-1.jpg)
                 5. Enter your test mode [KEY_ID] and [KEY_SECRET]. These can be [generated from the Razorpay Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md).
                 6. Select **Yes** for the option **Enabled**.
                 7. Click **Save Config**. This activates your account in the test mode. You can use this account to make a few test payments and ensure a successful workflow.
                 
> **INFO**
>
> 
>                  **Handy Tips**
> 
>                  In test mode, no real money is deducted from your account.
>                  

                

            
### Step 3: Set Up Webhooks

                 Webhooks are triggered when certain events occur. Subscribe to webhook events to receive notification (in the form of a webhook payload) when these events occur.

                 Setting up webhooks makes your integration more robust, and guards against issues arising from poor connectivity. The webhook URL is available on the plugin's settings page. You must copy it from there and use it to set up webhook on the Razorpay Dashboard.

                 
> **INFO**
>
> 
> 
>                  **Handy Tips**
> 
>                  - If you are using Magento plugin version 3.4.1, ensure the webhook delay is set to a minimum of 300 seconds.
>                  - Webhook is auto-configured on Magento plugin version 3.8.1-beta and above. For versions lower than 3.8.1-beta, you should [configure webhooks manually](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/magento/integration-steps/#step-3-set-up-webhooks.md).
> 
>                  

                 To set up webhooks in the Razorpay Dashboard:
                 1. Log in to the Razorpay Dashboard.
                 2. Navigate to **Accounts & Settings** → **Webhooks**.
                 3. Click + Add New Webhook.
                 4. In the Webhook Setup modal:
                    - Paste the URL copied from the Magento site.
                        
> **INFO**
>
> 
>                         **Handy Tips**
>                 
>                         Webhooks can only be delivered to public URLs. If you attempt to save a localhost endpoint as part of a webhook set-up, you will notice an error. Please refer to the [test webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/validate-test.md) section for alternatives to localhost.
>                         

                    - Enter the Secret you had provided on the Magento site. The secret is used to validate that the webhook is from Razorpay. Do not expose the secret publicly. Know more about [webhooks validation](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/validate-test#validate-webhooks.md).
                    - In the **Alert Email field**, enter the email address to which notifications must be sent in case of webhook failure.
                    - Select only the `order.paid` event from the list of **Active Events**. 
                 5. Click **Create Webhook**. 

                 Know more about [webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).

                 
> **INFO**
>
> 
> 
>                  **Handy Tips**
> 
>                  If the notification says Razorpay table is not set up correctly, please contact our [Support team](https://razorpay.com/support/).
> 
>                  

                

            
### Step 4: Set Up Cron With Magento

                 Setup cron with Magento to execute Razorpay cronjobs for the following actions:

                 **Cancel Pending Orders** 

                 It will cancel the order created by Razorpay according to the timeout saved in the configuration if Cancel Pending Order is enabled.

                 **Update Order to Processing** 

                 Accepts response from Razorpay Webhook for events `payment.authorized` and `order.paid` and updates pending order to processing.

                 Install Magento cron jobs using the command:

                    ``` bash: Command
                    bin/magento cron:install
                    ```
                

         
        
    

## 2. Test Integration

After the integration, a **Pay** button will appear on your web page/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual payments from your customers once the test is successful.
![](/docs/assets/images/magento-pay.jpg)

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
