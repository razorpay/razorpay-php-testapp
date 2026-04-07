---
title: Payment Gateway | WooCommerce - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common errors and find answers to frequently asked questions about WooCommerce Ecommerce Plugin integration.
---

# Troubleshooting & FAQs

### 1. How are webhooks auto-configured?

         - Auto-webhook support is available for Razorpay Woocommerce Plugin from v3.5.0 onwards. 
         - Once you save the changes on the Woocommerce Dashboard, webhooks are auto configured for events: `payment.authorized` and `refund.created`. You do not have to configure it on the Dashboard.

         To set up webhooks:
         1. In the WordPress Dashboard, click **WooCommerce** and navigate to **Settings**.
         2. In the **Payments** tab, enter the **Key ID** and **Key Secret**. 
            
         3. Click **Save Changes**.
            
        

    
### 2. My webhooks are not auto-configured since I am not using the upgraded version of the Razorpay WooCommerce plugin. How do I manually configure webhooks?

         If you are not using the upgraded version of Razorpay WooCommerce plugin, you can manually configure the following events:
         - `payment.authorized`
         - `payment.pending`
         - `refund.created`
         - `virtual_account.credited`
         - `subscription.cancelled`
         - `subscription.paused`
         - `subscription.resumed`

         To set up webhooks manually: 
         1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
         2. In the **Website and app settings** section, click **Webhooks**.
            
         3. Click **+ Add New Webhook**.
            
         4. In the **Webhook Setup** pop-up page:
            1. Enter the **URL** where you want to receive the webhook payload when an event is triggered. We recommend using an HTTPS URL.
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 You can set up to **30 URLs** to receive Webhook notifications. Webhooks can only be delivered to public URLs. If you attempt to save a localhost endpoint as part of a webhook setup, you will notice an error. Know more about [testing Webhooks on an application running on localhost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md#application-running-on-localhost).
>                 

    
            2. Enter a **Secret** for the webhook endpoint. The secret is used to validate that the webhook is from Razorpay. Do not expose the secret publicly. Know more about [how to validate webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md).

                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 - When setting up the webhook, you will be asked to specify a secret. Using this secret, you can validate that the webhook is from Razorpay. Entering the secret is optional but recommended. The secret should never be exposed publicly.
- The webhook secret does not need to be the merchant secret key provided by Razorpay.

>                 

    
            3. In the **Alert Email** field, enter the email address to which the notifications should be sent in case of webhook failure. You will receive webhook deactivation notifications to this email address.
            4. Select the required events from the list of **Active Events**.
                 

         5. Click **Create Webhook**. After you set a webhook, it appears on the list of webhooks.
            
         6. You can select the webhook and click **Edit** to make more changes.
        

    
### 3. How can I verify if webhooks are auto-configured?

         To verify if webhooks are enabled:
         1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
         2. In the **Website and app settings** section, click **Webhooks**.
            
         3. Select the relevant webhook **URL**.
         4. On the right panel, check if the status for `payment.authorized` and `refund.created` is enabled.
            
        

    
### 4. Can I make partial payments using WooCommerce?

         No, partial payments are not supported on WooCommerce. You can either choose to deduct the full amount or make two separate orders and the customer will have to pay twice for it.
        

    
### 5. I am getting the following error message "RAZORPAY ERROR: Order creation failed with the message: The API key provided is invalid". Why?

         Verify and confirm that the API keys you have provided within WordPress are accurate. If the issue persists, contact our [Support team](https://razorpay.com/support/).
        

    
### 6. I am getting the following php error in the Razorpay plugin:"PHP message: ORDER NUMBER 57999:webhook conflict over for razorpay order: order_LWVB71vGYh7nEr". Why?

         The message in the logs is not an error, it is a logged message. This message appears only when a webhook callback takes longer than 5 minutes to process. Our webhook mechanism includes a 5-minute waiting period to prevent the occurrence of duplicate orders.
        

    
### 7. Why am I getting the error message: "RAZORPAY ERROR: Order creation failed with the message "Authentication failed"."?

         "Authentication failed" error occurs when there is a discrepancy between the API keys. Verify the API key provided for your website and ensure that it matches with the key generated via Dashboard. 
        

    
### 8. I am getting the following error in WordPress: "Required parameter $razorpayPaymentId follows optional parameter $amount in /home/xxxcustom/public_html/wp-content/plugins/woo-razorpay/woo-razorpay.php on line 1353". Why?

         Follow the steps given below to resolve the issue:
         1. Deactivate and delete the Razorpay WooCommerce plugin from your [WordPress Dashboard](https://wordpress.com/log-in).
         2. Reinstall the [Razorpay WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/).
         3. For easy integration journey, watch the [Razorpay WooCommerce Integration tutorial](https://www.youtube.com/watch?v=p2YMdxZMyxQ).
        

        
### 9. I am getting the following error: "Plugin could not be activated because it triggered a fatal error.
         Parse error: syntax error, unexpected 'int' (T_STRING), expecting function (T_FUNCTION) or const (T_CONST) in /home4/yutihbjy/public_html/wp-content/plugins/woo-razorpay/includes/cron/one-click-checkout/one-cc-address-sync.php on line 12"

         If you encounter this error message while trying to activate the Razorpay for WooCommerce plugin, follow the steps given below to resolve the issue:
         1. Uninstall the Razorpay for WooCommerce plugin from your WordPress Dashboard. Ensure you delete the plugin entirely, not just deactivate it.
         2. Remove the WooCommerce webhook associated with Razorpay from the Dashboard. Know how to [delete a webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md#delete-a-webhook).
         3. After removing both the plugin and the webhook, install the latest version of the [Razorpay for WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/).

         If the issue persists even after following these steps, contact our [Support team](https://razorpay.com/support/) with the following information:

         - WooCommerce version
         - WordPress version
         - Razorpay for WooCommerce plugin version
         - A screen recording of the checkout flow (if possible)
         - Staging site credentials (if applicable)
         - Test Key and Secret from your Razorpay account
        

    
### 10. Why am I getting a "404 Page Not Found" error on the checkout when I select Razorpay as a payment option?

         If you encounter this error, follow the steps given below to resolve the issue:
         1. Log in to WordPress Dashboard, click **WooCommerce** and navigate to **Settings**.
         2. In the **Advanced** tab, look for the **Page Setup** section. Ensure that you have correctly linked the **Cart page** and **Checkout page**.
            
         3. Validate the **Checkout Endpoints** settings: 
         - For the **Pay** endpoint, set it to **order-pay**.
         - For the **Order Received** endpoint, set it to **order-received**.
            

         If the issue persists even after following these steps, contact our [Support team](https://razorpay.com/support/).
        

    
### 11. What troubleshooting procedures should be carried out before initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Ensure that your system meets all the requirements mentioned [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce.md#compatibilities-and-dependencies).
         2. We recommend you to keep your WordPress, WooCommerce, and Razorpay for WooCommerce plugins up to date. You can find the latest versions [here](https://github.com/razorpay/razorpay-woocommerce/releases).
         3. You can perform initial debugging. Follow the steps given below to debug:
             1. Deactivate all plugins except for Razorpay and WooCommerce.
             2. If you are using a paid theme, switch to a default WordPress theme and check if the issue persists.
             3. Verify if the Razorpay checkout is rendering correctly. If not, try reinstalling the Razorpay for WooCommerce plugin.
         4. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - WordPress version
            - WooCommerce version
            - Razorpay for WooCommerce plugin version
            - PHP version
            - WordPress theme
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Staging website credentials (login URL, login id, and password)
        

    
### 12. How do I reconfigure webhooks for Razorpay in WooCommerce?

         To reconfigure webhooks for Razorpay in WooCommerce, follow the steps given below:
         1. Deactivate and delete the Razorpay WooCommerce plugin from your [WordPress Dashboard](https://wordpress.com/log-in).
         2. Remove the WooCommerce webhook associated with Razorpay from the Dashboard. Know how to [delete a webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md#delete-a-webhook).
         3. After removing both the plugin and the webhook, install the latest version of the [Razorpay for WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/). 
        

    
### 13. How can I revert to the legacy order confirmation page on WooCommerce?

         Follow the steps given below to revert to the legacy order confirmation page:

         1. Open the Order Confirmation template in the Site Editor by navigating to **Appearance** → **Editor** → **Templates** → **Order Confirmation**.
         2. Open the **List View** and delete all the special Order Confirmation blocks.
             
             
> **INFO**
>
> 
>              **Handy Tips**
>              
>              Hold shift to select multiple blocks between the current selection and the block you click.
>              

         3. Open the **Block Inserter**, search for **Order Confirmation Block** and add it.
             
         4. Click **Save**.
        

    
### 14. Does Razorpay WooCommerce support High-Performance Order Storage(HPOS)?

         Yes, Razorpay WooCommerce supports High-Performance Order Storage(HPOS). It is recommended to enable this feature when there is minimal traffic in the store.
        

    
### 15. I am getting the error: "Invalid signature passed" when I trigger the webhook. What should I do?

         If you encounter this error message, follow the below steps to troubleshoot this issue:
         1. Uninstall the Razorpay for WooCommerce plugin from your WordPress Dashboard. Ensure you delete the plugin entirely, not just deactivate it.
         2. Remove the WooCommerce webhook associated with Razorpay from the Dashboard. Know how to [delete a webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md#delete-a-webhook).
         3. After removing both the plugin and the webhook, install the latest version of the [Razorpay for WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/).

         If the issue persists even after following these steps, contact our [Support team](https://razorpay.com/support/).
        

    
### 16. Does Razorpay WooCommerce support Checkout Blocks?

         Yes, Razorpay WooCommerce supports Checkout Blocks.
        

    
### 17. Is the WooCommerce subscription plugin free?

         No, the WooCommerce subscription plugin is only available in the paid version of WooCommerce.
        

    
### 18. Is it mandatory to set an expiry date for a subscription?

         Yes, it is mandatory. We do not support subscriptions with no expiry date on the WooCommerce plugin.
        

    
### 19. Does the WooCommerce plugin support 3 or 0 decimal unit currencies?

         The WooCommerce plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
        

    
### 20. How and where can I check the Razorpay logs in WooCommerce?

         To check the Razorpay logs on WooCommerce, follow these steps:
         1. Go to WordPress Admin and navigate to **WooCommerce**. Click **Status**.
            
         2. Select **Logs**. Locate and open **razorpay-logs** to view the logs.
            
        
        
> **WARN**
>
> 
>         **Watch Out!**
>         
>         A new log file is created every day, so be sure to check the most recent file for the latest logs.
>         

        
        

    
### 21. Why is the payment captured on Razorpay but not updated on WooCommerce for some orders?

         This issue may arise due to incorrect webhook configuration or domain allowlisting. To resolve this:
         1. Ensure that the [webhook is configured correctly](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce/troubleshooting-faqs.md#2-my-webhooks-are-not-auto-configured-since-i) in your Razorpay Dashboard.
         2. After placing an order, check the [WooCommerce site logs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce/troubleshooting-faqs.md#20-how-and-where-can-i-check-the) for entries such as:
            - `Webhook conflict due to early execution for razorpay order`
            - `Webhook conflict over for razorpay order`
            - `Webhook process finished the updateOrder function` 

         If these logs are missing, the issue might occur due to domain allowlisting. To resolve this, list [Razorpay's IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md#webhook-ips) in your server settings.
        

    
### 22. My Razorpay Payment Gateway is not working properly on WooCommerce. How do I fix integration issues?

         Follow the steps given below to resolve the issue:
         1. Deactivate and delete the Razorpay WooCommerce plugin from your [WordPress Dashboard](https://wordpress.com/log-in).
         2. Reinstall the [Razorpay WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/).
         3. For easy integration journey, watch the [Razorpay WooCommerce Integration video tutorial](https://www.youtube.com/watch?v=p2YMdxZMyxQ).
        

 Dashboard and navigate to **Account & Settings**.
         2. In the **Website and app settings** section, click **Webhooks**.
            
         3. Click **+ Add New Webhook**.
            
         4. In the **Webhook Setup** pop-up page:
            1. Enter the **URL** where you want to receive the webhook payload when an event is triggered. We recommend using an HTTPS URL.
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 You can set up to **30 URLs** to receive Webhook notifications. Webhooks can only be delivered to public URLs. If you attempt to save a localhost endpoint as part of a webhook setup, you will notice an error. Know more about [testing Webhooks on an application running on localhost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md#application-running-on-localhost).
>                 

    
            2. Enter a **Secret** for the webhook endpoint. The secret is used to validate that the webhook is from Razorpay. Do not expose the secret publicly. Know more about [how to validate webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md).

                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 - When setting up the webhook, you will be asked to specify a secret. Using this secret, you can validate that the webhook is from Razorpay. Entering the secret is optional but recommended. The secret should never be exposed publicly.
- The webhook secret does not need to be the merchant secret key provided by Razorpay.

>                 

    
            3. In the **Alert Email** field, enter the email address to which the notifications should be sent in case of webhook failure. You will receive webhook deactivation notifications to this email address.
            4. Select the required events from the list of **Active Events**.
                 

         5. Click **Create Webhook**. After you set a webhook, it appears on the list of webhooks.
            
         6. You can select the webhook and click **Edit** to make more changes.
        
    
    
### 3. How can I verify if webhooks are auto-configured?

         To verify if webhooks are enabled:
         1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
         2. In the **Website and app settings** section, click **Webhooks**.
            
         3. Select the relevant webhook **URL**.
         4. On the right panel, check if the status for `payment.authorized` and `refund.created` is enabled.
            
        

    
### 4. Can I make partial payments using WooCommerce?

         No, partial payments are not supported on WooCommerce. You can either choose to deduct the full amount or make two separate orders and the customer will have to pay twice for it.
        

    
### 5. I am getting the following error message "RAZORPAY ERROR: Order creation failed with the message: The API key provided is invalid". Why?

         Verify and confirm that the API keys you have provided within WordPress are accurate. If the issue persists, contact our [Support team](https://razorpay.com/support/).
        

    
### 6. I am getting the following php error in the Razorpay plugin:"PHP message: ORDER NUMBER 57999:webhook conflict over for razorpay order: order_LWVB71vGYh7nEr". Why?

         The message in the logs is not an error, it is a logged message. This message appears only when a webhook callback takes longer than 5 minutes to process. Our webhook mechanism includes a 5-minute waiting period to prevent the occurrence of duplicate orders.
        

    
### 7. Why am I getting the error message: "RAZORPAY ERROR: Order creation failed with the message "Authentication failed"."?

         "Authentication failed" error occurs when there is a discrepancy between the API keys. Verify the API key provided for your website and ensure that it matches with the key generated via Dashboard. 
        

    
### 8. I am getting the following error in WordPress: "Required parameter $razorpayPaymentId follows optional parameter $amount in /home/xxxcustom/public_html/wp-content/plugins/woo-razorpay/woo-razorpay.php on line 1353". Why?

         Follow the steps given below to resolve the issue:
         1. Deactivate and delete the Razorpay WooCommerce plugin from your [WordPress Dashboard](https://wordpress.com/log-in).
         2. Reinstall the [Razorpay WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/).
         3. For easy integration journey, watch the [Razorpay WooCommerce Integration tutorial](https://www.youtube.com/watch?v=p2YMdxZMyxQ).
        

        
### 9. I am getting the following error: "Plugin could not be activated because it triggered a fatal error.
         Parse error: syntax error, unexpected 'int' (T_STRING), expecting function (T_FUNCTION) or const (T_CONST) in /home4/yutihbjy/public_html/wp-content/plugins/woo-razorpay/includes/cron/one-click-checkout/one-cc-address-sync.php on line 12"

         If you encounter this error message while trying to activate the Razorpay for WooCommerce plugin, follow the steps given below to resolve the issue:
         1. Uninstall the Razorpay for WooCommerce plugin from your WordPress Dashboard. Ensure you delete the plugin entirely, not just deactivate it.
         2. Remove the WooCommerce webhook associated with Razorpay from the Dashboard. Know how to [delete a webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md#delete-a-webhook).
         3. After removing both the plugin and the webhook, install the latest version of the [Razorpay for WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/).

         If the issue persists even after following these steps, contact our [Support team](https://razorpay.com/support/) with the following information:

         - WooCommerce version
         - WordPress version
         - Razorpay for WooCommerce plugin version
         - A screen recording of the checkout flow (if possible)
         - Staging site credentials (if applicable)
         - Test Key and Secret from your Razorpay account
        

    
### 10. Why am I getting a "404 Page Not Found" error on the checkout when I select Razorpay as a payment option?

         If you encounter this error, follow the steps given below to resolve the issue:
         1. Log in to WordPress Dashboard, click **WooCommerce** and navigate to **Settings**.
         2. In the **Advanced** tab, look for the **Page Setup** section. Ensure that you have correctly linked the **Cart page** and **Checkout page**.
            
         3. Validate the **Checkout Endpoints** settings: 
         - For the **Pay** endpoint, set it to **order-pay**.
         - For the **Order Received** endpoint, set it to **order-received**.
            

         If the issue persists even after following these steps, contact our [Support team](https://razorpay.com/support/).
        

    
### 11. What troubleshooting procedures should be carried out before initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Ensure that your system meets all the requirements mentioned [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce.md#compatibilities-and-dependencies).
         2. We recommend you to keep your WordPress, WooCommerce, and Razorpay for WooCommerce plugins up to date. You can find the latest versions [here](https://github.com/razorpay/razorpay-woocommerce/releases).
         3. You can perform initial debugging. Follow the steps given below to debug:
             1. Deactivate all plugins except for Razorpay and WooCommerce.
             2. If you are using a paid theme, switch to a default WordPress theme and check if the issue persists.
             3. Verify if the Razorpay checkout is rendering correctly. If not, try reinstalling the Razorpay for WooCommerce plugin.
         4. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - WordPress version
            - WooCommerce version
            - Razorpay for WooCommerce plugin version
            - PHP version
            - WordPress theme
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Staging website credentials (login URL, login id, and password)
        

    
### 12. How do I reconfigure webhooks for Razorpay in WooCommerce?

         To reconfigure webhooks for Razorpay in WooCommerce, follow the steps given below:
         1. Deactivate and delete the Razorpay WooCommerce plugin from your [WordPress Dashboard](https://wordpress.com/log-in).
         2. Remove the WooCommerce webhook associated with Razorpay from the Dashboard. Know how to [delete a webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md#delete-a-webhook).
         3. After removing both the plugin and the webhook, install the latest version of the [Razorpay for WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/). 
        

    
### 13. How can I revert to the legacy order confirmation page on WooCommerce?

         Follow the steps given below to revert to the legacy order confirmation page:

         1. Open the Order Confirmation template in the Site Editor by navigating to **Appearance** → **Editor** → **Templates** → **Order Confirmation**.
         2. Open the **List View** and delete all the special Order Confirmation blocks.
             
             
> **INFO**
>
> 
>              **Handy Tips**
>              
>              Hold shift to select multiple blocks between the current selection and the block you click.
>              

         3. Open the **Block Inserter**, search for **Order Confirmation Block** and add it.
             
         4. Click **Save**.
        

    
### 14. Does Razorpay WooCommerce support High-Performance Order Storage(HPOS)?

         Yes, Razorpay WooCommerce supports High-Performance Order Storage(HPOS). It is recommended to enable this feature when there is minimal traffic in the store.
        

    
### 15. I am getting the error: "Invalid signature passed" when I trigger the webhook. What should I do?

         If you encounter this error message, follow the below steps to troubleshoot this issue:
         1. Uninstall the Razorpay for WooCommerce plugin from your WordPress Dashboard. Ensure you delete the plugin entirely, not just deactivate it.
         2. Remove the WooCommerce webhook associated with Razorpay from the Dashboard. Know how to [delete a webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md#delete-a-webhook).
         3. After removing both the plugin and the webhook, install the latest version of the [Razorpay for WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/).

         If the issue persists even after following these steps, contact our [Support team](https://razorpay.com/support/).
        

    
### 16. Does Razorpay WooCommerce support Checkout Blocks?

         Yes, Razorpay WooCommerce supports Checkout Blocks.
        

    
### 17. Does the WooCommerce plugin support 3 or 0 decimal unit currencies?

         The WooCommerce plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
        

    
### 18. How and where can I check the Razorpay logs in WooCommerce?

         To check the Razorpay logs on WooCommerce, follow these steps:
         1. Go to WordPress Admin and navigate to **WooCommerce**. Click **Status**.
            
         2. Select **Logs**. Locate and open **razorpay-logs** to view the logs.
            
        
        
> **WARN**
>
> 
>         **Watch Out!**
>         
>         A new log file is created every day, so be sure to check the most recent file for the latest logs.
>         

        
        

    
### 19. Why is the payment captured on Razorpay but not updated on WooCommerce for some orders?

         This issue may arise due to incorrect webhook configuration or domain allowlisting. To resolve this:
         1. Ensure that the [webhook is configured correctly](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce/troubleshooting-faqs.md#2-my-webhooks-are-not-auto-configured-since-i) in your Razorpay Dashboard.
         2. After placing an order, check the [WooCommerce site logs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce/troubleshooting-faqs.md#20-how-and-where-can-i-check-the) for entries such as:
            - `Webhook conflict due to early execution for razorpay order`
            - `Webhook conflict over for razorpay order`
            - `Webhook process finished the updateOrder function` 

         If these logs are missing, the issue might occur due to domain allowlisting. To resolve this, list [Razorpay's IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md#webhook-ips) in your server settings.
        

    
### 20. My Razorpay Payment Gateway is not working properly on WooCommerce. How do I fix integration issues?

         Follow the steps given below to resolve the issue:
         1. Deactivate and delete the Razorpay WooCommerce plugin from your [WordPress Dashboard](https://wordpress.com/log-in).
         2. Reinstall the [Razorpay WooCommerce plugin](https://wordpress.org/plugins/woo-razorpay/).
         3. For easy integration journey, watch the [Razorpay WooCommerce Integration video tutorial](https://www.youtube.com/watch?v=p2YMdxZMyxQ).
