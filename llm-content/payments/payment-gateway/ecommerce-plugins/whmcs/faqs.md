---
title: Payment Gateway | WHMCS - FAQs
heading: Troubleshooting & FAQs
description: Find answers to frequently asked questions about WHMCS plugin.
---

# Troubleshooting & FAQs

### 1. My customer made a payment on my WHMCS site. However, the payment is in the authorized state and did not get captured. The payment status is not reflecting on WHMCS. How to resolve this?

         - Cause: This error occurs with Modulesgarden-enabled WHMCS installation. Modulesgarden plugins update `system_url` from example.com to example.com/, which changes the URL from `"example.com/modules/gateways/callback/razorpay.php"` to `"example.com/modules/gateways/callback/razorpay.php"`.
         Due to this, the HTTP POST request stops working.
         
         - Resolution: To solve this issue, remove "/" in `"/modules/gateways/callback/razorpay.php"`.
        

    
### 2. What troubleshooting procedures should be carried out prior to initiating a support ticket?

         Follow the troubleshooting steps given below:
         1. Reinstall the Razorpay WHMCS plugin and ensure that your system meets all the requirements mentioned [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/whmcs/integration-steps.md).
         2. We recommend you to keep your Razorpay WHMCS plugin up to date. You can find the latest versions [here](https://github.com/razorpay/razorpay-whmcs/releases).
         3. If the issue persists after following these steps, contact our [Support team](https://razorpay.com/support/). Provide the following information while creating a ticket:
            - Razorpay WHMCS plugin version
            - Steps to reproduce the issue (Screen recording/Screenshots)
            - Error logs, if any
            - Staging website credentials (login URL, login id, and password)
        

    
### 3. Does the WHMCS plugin support 3 or 0 decimal unit currencies?

         The WHMCS plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
