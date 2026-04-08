---
title: Payment Gateway | Drupal Commerce - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Find answers to frequently asked questions about Drupal Commerce plugin.
---

# Troubleshooting & FAQs

### 1. How can I verify if webhooks are auto-configured?

         To verify if webhooks are enabled:
            1. Log in to the Razorpay Dashboard and navigate to **Account & Settings**.
            2. In the **Website and app settings** section, click **Webhooks**.
                ![Navigate to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/account-settings-webhooks.jpg.md)
            3. Select the relevant webhook **URL**.
            4. On the right panel, check if the status for `payment.authorized`, `payment.failed` and `refund.created` is enabled.
        

    
### 2. What is the difference between an Order Id and Order Number?

         **Order Id**: When a customer clicks the pay button on your app, an Order is created and a corresponding "order_id" is generated in the response. 
 
         **Order Number**: It simply acts like a serial number. You can search a particular order with the help of the Order Number.
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             To reconcile the payments, you can verify the Order Id from the Drupal Commerce Dashboard with **Order Id** mentioned on the Razorpay Dashboard. Navigate to **Transactions** → **Orders** or **Payments** on the Razorpay Dashboard to view the **Order Id**.
>             

        

    
### 3. How can I uninstall the plugin?

         Follow the step given below to uninstall the plugin:
            1. Log in to your [Drupal Commerce Dashboard](https://drupal.plugin.razorpay.in/).
            2. Navigate to **Extend** → **Uninstall**.
            3. Search for **Razorpay** in the **Filter** section.
            4. Select the check box and click **Uninstall**.
                ![Uninstall Drupal plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/drupal-uninstall.jpg.md)
        

    
### 4. Does the Drupal Commerce plugin support 3 or 0 decimal unit currencies?

         The Drupal Commerce plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
