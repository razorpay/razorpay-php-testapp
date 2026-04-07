---
title: Payment Gateway | OpenCart - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common errors and find answers to frequently asked questions about OpenCart Ecommerce Plugin integration.
---

# Troubleshooting & FAQs

### 1. My Webhooks are not auto-configured since I am not using the upgraded version of OpenCart. How do I manually configure webhooks?

         To set up webhooks:
            1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
            1. In the **Website and app settings** section, click **Webhooks**.
                
            1. Click **+ Add New Webhook**.

                
            1. In the **Webhook Setup** pop-up page:
                1. Enter the **URL** where you want to receive the webhook payload when an event is triggered. We recommended using an HTTPS URL.
                    
> **INFO**
>
> 
>                     **Handy Tips**
> 
>                     You can set up to **10 URLs** to receive Webhook notifications. Webhooks can only be delivered to public URLs. If you attempt to save a localhost endpoint as part of a webhook setup, you will notice an error. Know more about [testing Webhooks on an application running on localhost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md#application-running-on-localhost).
>                     

                1. Enter a **Secret** for the webhook endpoint. The secret is used to validate that the webhook is from Razorpay. Do not expose the secret publicly. Know more about [how to validate webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md).
                    
> **INFO**
>
> 
>                     **Handy Tips**
> 
>                     - When setting up the webhook, you will be asked to specify a secret. Using this secret, you can validate that the webhook is from Razorpay. Entering the secret is optional but recommended. The secret should never be exposed publicly.
>                     - The webhook secret does not need to be the merchant secret key provided by Razorpay.
>                     

                1. In the **Alert Email** field, enter the email address to which the notifications should be sent in case of webhook failure. You will receive webhook deactivation notifications to this email address.
                1. Select the required events from the list of **Active Events**.
                    
            1. Click **Create Webhook**.
            1. After you set up a webhook, it appears on the list of webhooks. 

        

    
### 2. How can I verify if webhooks are enabled?

         To verify if webhooks are enabled:
            1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
            2. In the **Website and app settings**, click **Webhooks**.
                
            3. Select the relevant webhook **URL**.
            4. On the right panel, check if the status for `payment.authorized`, `refund.created` and `virtual_account.credited` is enabled.
                

         List of Events to Subscribe

         You must subscribe to the following events:

         
         OpenCart Plugin Version | Webhook Events Supported
         ---
         OpenCart 1.5 | None
         ---
         OpenCart 2.x | `order.paid`
         ---
         OpenCart 3.x | `order.paid` and `payment.authorized`
         
        

    
### 3. What troubleshooting procedures should be carried out prior to initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Reinstall the Razorpay Opencart plugin and ensure that your system meets all the requirements mentioned [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/open-cart/integration-steps.md).
         2. We recommend you to keep your Razorpay Opencart plugin up to date. You can find the latest versions [here](https://github.com/razorpay/razorpay-opencart/releases).
         3. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - Razorpay Opencart plugin version (4, 3, 2, or 1.5)
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Staging website credentials (login URL, login id, and password)
        

    
### 4. Does the Open-Cart plugin support 3 or 0 decimal unit currencies?

         The Open-Cart plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
