---
title: Payment Gateway | Wix - FAQs
heading: Troubleshooting & FAQs
description: Find answers to frequently asked questions about Wix plugin.
---

# Troubleshooting & FAQs

### 1. I am unable to connect to my Razorpay account even after providing the API key and the secret on the Wix Dashboard. What could be the reason?

         **Cause**: Before connecting your account with the Wix platform, you need to set up Webhooks on the Dashboard. If you do not set up Webhooks, there may be connection errors.

         **Resolution**: Set up webhooks.

         To set up Webhooks:
         1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
         2. In the **Website and app settings** section, click **Webhooks**.
            ![Navigate to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/account-settings-webhooks.jpg.md)
         3. Click **+ Add New Webhook**.
            ![](/docs/assets/images/webhooks-webhook-creation-1.jpg)
         4. In the **Webhook Setup** pop-up page:
            1. Enter the **Website URL** as `https://express.razorpay.com/wix/v1/webhook-handler`.
            2. Enter a **Secret** for the Webhook endpoint. The secret is used for validation purposes.
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 The secret that you enter here can validate that the Webhooks are from Razorpay. Do not expose the secret publicly.
>                 

            3. Select the following events from the list of **Active Events**:
            - `order.paid`
            - `refund.processed`
            - `payment.failed`
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 If you use this Razorpay account to accept payments on your Wix site, **you can set up only one Webhook** on the Dashboard.
>                 

         5. Click **Save** to enable Webhooks.
        

    
### 2. I am getting the following error during Wix plugin integration, "We are not able to connect your account. Please try again later."

         **Cause**: This error message is displayed if the Webhook is not configured correctly on the Dashboard.

         **Resolution**: To fix this error, check the reasons and their solutions as mentioned below:

         
         Issue [columWidth="90"] | Solution [columWidth="10"]
         ---
         You have provided your own Webhook URL. | You must provide `"https://express.razorpay.com/wix/v1/webhook-handler"` as the Webhook URL.
         ---
         You have provided the correct URL but have subscribed to all the Webhook events.| You must subscribe to only the `order.paid`, `refund.processed` and `payment.failed` events.
         ---
         You have provided the correct URL and subscribed to the correct events but have not entered the secret. | You must enter the secret for the Webhook.
         
        

    
### 3. Does Wix support Subscriptions?

         No. Wix does not support Subscriptions. The plugins that support subscriptions are Woocommerce, Magento and OpenCart.
        

    
### 4. What troubleshooting procedures should be carried out prior to initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Reinstall the Razorpay Wix plugin and ensure that your system meets all the requirements mentioned [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/wix/integration-steps.md).
         2. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - Wix version
            - Razorpay for Wix plugin version
            - PHP version
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Staging website credentials (login URL, login id, and password)
        

    
### 5. Does the Wix plugin support 3 or 0 decimal unit currencies?

         The Wix plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
        

    
### 6. How can I verify if webhooks are auto-configured?

 
         To verify if webhooks are enabled:
         1. Log in to the Razorpay Dashboard and navigate to **Accounts and Settings**.
         2. Go to **Webhooks** (Under Website and app settings).
            ![Navigate to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/account-settings-webhooks.jpg.md)
         3. Select the relevant webhook **URL**.
         4. On the right panel, check if the status for `order.paid`, `refund.processed` and `payment.failed` is enabled.
            ![List of webhooks created](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/plugin-webhook-faq.jpg.md)
        

 Dashboard and navigate to **Account & Settings**.
         2. In the **Website and app settings** section, click **Webhooks**.
            ![Navigate to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/account-settings-webhooks.jpg.md)
         3. Click **+ Add New Webhook**.
            ![](/docs/assets/images/webhooks-webhook-creation-1.jpg)
         4. In the **Webhook Setup** pop-up page:
            1. Enter the **Website URL** as `https://express.razorpay.com/wix/v1/webhook-handler`.
            2. Enter a **Secret** for the Webhook endpoint. The secret is used for validation purposes.
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 The secret that you enter here can validate that the Webhooks are from Razorpay. Do not expose the secret publicly.
>                 

            3. Select the following events from the list of **Active Events**:
            - `order.paid`
            - `refund.processed`
            - `payment.failed`
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 If you use this Razorpay account to accept payments on your Wix site, **you can set up only one Webhook** on the Razorpay Dashboard.
>                 

         5. Click **Save** to enable Webhooks.
        
    
    
### 2. I am getting the following error during Wix plugin integration, "We are not able to connect your account. Please try again later."

         **Cause**: This error message is displayed if the Webhook is not configured correctly on the Dashboard.

         **Resolution**: To fix this error, check the reasons and their solutions as mentioned below:

         
         Issue [columWidth="90"] | Solution [columWidth="10"]
         ---
         You have provided your own Webhook URL. | You must provide `"https://express.razorpay.com/wix/v1/webhook-handler"` as the Webhook URL.
         ---
         You have provided the correct URL but have subscribed to all the Webhook events.| You must subscribe to only the `order.paid`, `refund.processed` and `payment.failed` events.
         ---
         You have provided the correct URL and subscribed to the correct events but have not entered the secret. | You must enter the secret for the Webhook.
         
        

    
### 3. What troubleshooting procedures should be carried out prior to initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Reinstall the Razorpay Wix plugin and ensure that your system meets all the requirements mentioned [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/wix/integration-steps.md).
         2. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - Wix version
            - Razorpay for Wix plugin version
            - PHP version
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Staging website credentials (login URL, login id, and password)
        

    
### 4. Does the Wix plugin support 3 or 0 decimal unit currencies?

         The Wix plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
        

    
### 5. How can I verify if webhooks are auto-configured?

 
         To verify if webhooks are enabled:
         1. Log in to the Razorpay Dashboard and navigate to **Accounts and Settings**.
         2. Go to **Webhooks** (Under Website and app settings).
            ![Navigate to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/account-settings-webhooks.jpg.md)
         3. Select the relevant webhook **URL**.
         4. On the right panel, check if the status for `order.paid`, `refund.processed` and `payment.failed` is enabled.
            ![List of webhooks created](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/plugin-webhook-faq.jpg.md)
