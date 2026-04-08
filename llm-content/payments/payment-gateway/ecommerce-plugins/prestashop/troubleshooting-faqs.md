---
title: Payment Gateway | PrestaShop - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common errors and find answers to frequently asked questions about PrestaShop Ecommerce Plugin integration.
---

# Troubleshooting & FAQs

### 1. My Webhooks are not auto-configured since I am not using the upgraded version of PrestaShop. How do I manually configure webhooks?

        To set up webhooks:
         1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
         2. In the **Website and app settings** section, click **Webhooks**.
             ![Navigate to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/account-settings-webhooks.jpg.md)
         3. Click **+ Add New Webhook**.
             ![](/docs/assets/images/webhooks-webhook-creation-1.jpg)
         4. In the **Webhook Setup** pop-up page:
             1. Enter the **URL** where you want to receive the webhook payload when an event is triggered. We recommended using an HTTPS URL.
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 You can set up to **10 URLs** to receive Webhook notifications. Webhooks can only be delivered to public URLs. If you attempt to save a localhost endpoint as part of a webhook setup, you will notice an error. Know more about [testing webhooks on an application running on localhost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md#application-running-on-localhost).
>                 

             2. Enter a **Secret** for the webhook endpoint. The secret is used to validate that the webhook is from Razorpay. Do not expose the secret publicly. Know more about [how to validate webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md).
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 - When setting up the webhook, you will be asked to specify a secret. Using this secret, you can validate that the webhook is from Razorpay. Entering the secret is optional but recommended. The secret should never be exposed publicly.
>                 - The webhook secret does not need to be the merchant secret key provided by Razorpay.
>                 

             3. In the **Alert Email** field, enter the email address to which the notifications should be sent in case of webhook failure. You will receive webhook deactivation notifications to this email address.
             4. Select the required events from the list of **Active Events**.
             5. Click **Create Webhook**.
                 ![](/docs/assets/images/webhooks-webhook-creation-2.jpg)
         5. After you set a webhook, it appears on the list of webhooks. 

        

    
### 2. How can I verify if webhooks are enabled?

         To verify if webhooks are enabled:
            1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
            2. In the **Website and app settings**, click **Webhooks**.
                ![Navigate to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/account-settings-webhooks.jpg.md)
            3. Select the relevant webhook **URL**.
            4. On the right panel, check if the status for `payment.authorized`, `refund.created` and `virtual_account.credited` is enabled.
                ![List of webhooks created](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/plugin-webhook-faq.jpg.md)
        

    
### 3. What troubleshooting procedures should be carried out prior to initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Reinstall the Razorpay Prestashop plugin and ensure that your system meets all the requirements mentioned [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/prestashop/integration-steps.md#installation-and-configuration).
         2. We recommend you to keep your Razorpay Prestashop plugin up to date. You can find the latest versions [here](https://github.com/razorpay/razorpay-prestashop/releases).
         3. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - Razorpay Prestashop plugin version (PrestaShop 1.7.x, PrestaShop 1.6.x)
            - PHP version
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Staging website credentials (login URL, login id, and password)
        

    
### 4. Does the Prestashop plugin support 3 or 0 decimal unit currencies?

         The Prestashop plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
        

    
### 5. Why is the PAY button not visible when Razorpay is selected as a payment method?

         If the PAY button is not visible. Follow the steps given below:
         1. Verify if the Razorpay scripts are loading.
            - Place an order and select **Razorpay** as the payment option.
            - Right-click on the page and choose **Inspect** → **Sources**.
            - Check if **script.js** and **checkout.js** are loading under the loaded modules.
                ![Prestashop Razorpay pay button inspect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/prestashop-script-checkout.jpg.md)
         2. If the scripts are not loading check hook configuration in Prestashop database:
            - Open the Prestashop database and navigate to the **hook_alias** table.
            - Ensure that the name `displayHeader` has the alias set to `Header`.
         3. Update Razorpay module code (if the above step didn't work):
            - In the Razorpay module code, ensure the hook name matches your alias name (e.g., `displayHeader` or its custom alias and function name as `hookDisplayHeader`).
            - Re-zip the Razorpay module and re-install it in your Prestashop.

         
         Following these steps should make the Pay button appear correctly. If the issue persists, contact our [Support team](https://razorpay.com/support/).
