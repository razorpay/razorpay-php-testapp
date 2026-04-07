---
title: Payment Gateway | WordPress - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Find answers to frequently asked questions about WordPress plugin.
---

# Troubleshooting & FAQs

### 1. I am unable to view the custom fields under the screen options menu. What should I do?

         In case the custom fields do not appear under the **Screen Option** menu:
         - Check if the [Advanced Custom Fields plugin](https://www.google.com/url?q=https://wordpress.org/plugins/advanced-custom-fields/&sa=D&source=docs&ust=1681120916936709&usg=AOvVaw1OBFrHD68J87tNpMeGNIfp) is activated on your website. If yes, then deactivate it from your WordPress plugins list.
         - Or add the following code to your WordPress theme’s **functions.php** file:

            ```php: Add custom fields
            add_filter('acf/settings/remove_wp_meta_box', '__return_false');
            ```
        

    
### 2. What troubleshooting procedures should be carried out prior to initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Reinstall the Razorpay Quick Payments plugin.
         2. We recommend you to keep your WordPress and Razorpay Quick Payments plugins up to date. You can find the latest versions [here](https://github.com/razorpay/razorpay-quick-payments/releases).
         3. Ensure your current theme is compatible with the Razorpay Quick Payments plugin. If not, switch to the default WordPress theme and provide us with the name of your current theme.
         4. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - WordPress version
            - Razorpay Quick Payments plugin version
            - PHP version
            - WordPress theme
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Staging website credentials (login URL, login id, and password)
        

    
### 3. Does the Wordpress plugin support 3 or 0 decimal unit currencies?

         The Wordpress plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
