---
title: Troubleshooting & FAQs
description: Know how to troubleshoot some of the common error messages and find answers to frequently asked questions for Magento extensions.
---

# Troubleshooting & FAQs

Know how to troubleshoot some of the common error messages for Magento 1.x and 2.x extensions.

## Troubleshooting for Magento 1.x Extension

Below are some common error messages and the possible reasons and fixes:

Error | Cause | Fix
---
Bad request error | The API keys ([KEY_ID] and [KEY_SECRET]) are not configured correctly.| Make sure that the API Keys are active and entered correctly on the Magento Settings page.
---
Bad request error | You might be using a custom checkout theme like IWD and Firecheckout.| Make sure that you are using the GitHub/master branch.
---
cURL error | You do not have PHP-cURL installed on your server. | Ensure that you have PHP-cURL installed on your server.
---
cURL error | Port 443 is blocked. | Contact your hosting service to unblock the port.

## Troubleshooting for Magento 2.x Extension

Below are some common error messages and the possible reasons and fixes:

Error [columWidth="50"] | Cause | Fix
---
Bad request error | The API Keys ([KEY_ID] and [KEY_SECRET]) are not configured correctly.| Make sure that the API Keys are active and entered correctly on the Magento Settings page.
---
Bad request error | You may be using a custom checkout theme like IWD and Firecheckout. | Make sure that you are using the GitHub/master branch.
---
cURL error | You do not have PHP-cURL installed on your server. | Ensure that you have PHP-cURL installed on your server.
---
cURL error | Port 443 is blocked. | Contact your hosting service to unblock the port.
---
Undefined index: Razorpay in /app/code/Razorpay/Magento/ Observer/AfterConfigSaveObserver.php | This issue is due to an error in module compilation. | Run `run bin/magento setup:di:compile` to recompile.
---
The following modules are outdated: 
• Razorpay_Magento schema: Current Version - None, Required Version - 3.6.2 
• Razorpay_Magento data: Current Version - None, Required Version - 3.6.2 | The Razorpay Magento plugin version is outdated. | [Download](https://github.com/razorpay/razorpay-magento) and install the latest Razorpay Magento Plugin.
---
Column not found: 1054 Unknown column "'main_table.rzp_webhook_notified_at' in 'field list', query was: SELECT main_table.entity_id, main_table.rzp_webhook_notified_at FROM sales_order AS main_table." | The Razorpay Magento plugin version is outdated. | Make sure that you update the plugin to the latest version.

## FAQs

    
### 1. What troubleshooting procedures should be carried out prior to initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Ensure that your system meets all the requirements mentioned [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/magento.md).
         2. We recommend you to keep your Magento and Razorpay plugins up to date. You can find the latest versions [here](https://github.com/razorpay/razorpay-magento/releases).
         3. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - Magento version (1.x/2.x)
            - Razorpay Magento plugin version
            - PHP version
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Magento staging website credentials (login URL, login id, and password)
            - SSH/FTP access to the staging server
        

    
### 2. Is PWA (Progressive Web Apps) supported for Magento Plugin?

         Yes, Magento Plugin supports Progressive Web Apps (PWA) through GraphQL.
        

    
### 3. If you initiate a refund on the Razorpay Dashboard, will the same status reflect on the Magento Dashboard?

         Initiating a refund on the Razorpay Dashboard does not automatically update the status on Magento. The refund process is typically managed through the Magento Dashboard. The status changes made on the Magento Dashboard are then reflected on the Razorpay Dashboard.
        

    
### 4. How can I create a Custom Order Status in Razorpay Magento?

         Below are the steps to create a Custom Order Status in Razorpay Magento:

         **Step 1: Create a customer order status.**
         1. Go to **Stores** → **Order Status** (under Settings) on the Magento Admin Dashboard.
            
         2. On **Order Status** page, click **Create New Status**.
            
         3. On the **Create New Order Status** page:
            - Insert a **Status Code** under the **Order Status Information** section for internal reference.
         
            
> **INFO**
>
> 
>             **Handy Tips**
>          
>             This field must contain letters (a-z), numbers (0-9), and the underscore. You must use letters at the first character. The rest can be a combination of letters and numbers.
>             

            - Set the **Status Label** for Admin and storefront.
            - Set the **Default Store View** under **Store View Specific Labels** for each store view.
            
         4. Click **Save Status** to complete.
            

         **Step 2: Un-assign existing status.**

         1. Un-assign the existing status code that is in use.
            - If State Code and Title is `processing[Processing]`, the `processing` status is already in use for state `processing`.
            - Un-assign this status from the existing state code `processing`, so the state will be available for your custom status code.

            
> **WARN**
>
> 
>             **Watch Out!**
>             
>             If you get the following error "The status can't be unassigned because the status is currently used by an order.", directly move to step 3.
>             

            

         **Step 3: Assign an order status to a state.**
         1. Go to the **Order Status** page, and click **Assign Status to State**.
            
         2. On the **Assign Order Status to State** page:
            - Select the **Order Status** to assign from the existing order status list.
            - Select the **Order State** as `processing` to include the order status you have just assigned.
            - Select the **Use Order Status As Default** checkbox to accept the Order Status as a default.
            - Select the **Visible On Storefront** checkbox to enable the order status on the storefront.
            
         3. Click **Save Status Assignment** to complete.
            

         **Step 4: Using custom order status for Razorpay Magento.**
         1. On the Magento Admin Dashboard, open Razorpay payment method settings.
         2. On the **Configuration** page:
            - At **Enable Custom Paid Order Status** field, select **Yes** to enable custom order status, and select **No** to disable custom order status.
            - Insert **Custom Paid Order Status** value in the input field, providing the same value as the Status Code while creating custom status.
            
         3. Click **Save Config** and refresh the cache.
            
        

    
### 5. I am getting the following error message "Column not found: 1054 Unknown column 'main_table.rzp_webhook_notified_at' in 'field list', query was: SELECT main_table.entity_id, main_table.rzp_webhook_notified_at FROM sales_order AS main_table."

         If you encounter this error message, [update](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/magento/integration-steps.md#step-1-download-and-install-extension) the plugin to the latest version to resolve the issue.
        

    
### 6. Does the Magento plugin support 3 or 0 decimal unit currencies?

         The Magento plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
