---
title: Shopify | Razorpay Direct - Credit Card Plugin | Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common errors for Razorpay Direct - Credit Card Plugin Shopify integration. Find answers to frequently asked questions.
---

# Troubleshooting & FAQs

### 1. Is this new plugin only for businesses who have moved to Shopify’s 1-page checkout?

         No, Razorpay Direct - Credit Card plugin is independent of Shopify's 1-page checkout, therefore, anyone can use this plugin.
        

    
### 2. How can I install Razorpay Direct - Credit Card Plugin?

          Follow the [installation steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/razorpay-direct-credit-card.md#integration-steps) to install the plugin.
        

        
### 3. Can I use the same MID for Razorpay Direct - Credit Card Plugin and the Razorpay Payment Gateway app? 

          Yes, you can use the same MID for in-platform/onsite and other Payment Gateway apps (Razorpay Payment Gateway or other Payment Gateways).
        

        
### 4. Can I use two in-platform/onsite apps for card transactions?

          No, a business can only use one in-platform/onsite app. All their card transactions will go through that in-platform/onsite app only. 
        

        
### 5. What will the UI look like when an in-platform/onsite app and multiple offsite Payment Gateway apps are installed?

          The in-platform/onsite cards app always takes precedence and is listed first. All other Payment Gateway apps are listed below, similar to Shopify’s checkout UI. 
        

        
### 6. What if I am not a Razorpay Payment Gateway user? How can I start using the Razorpay Direct - Credit Card Plugin?

         You can create a Razorpay account and use the [Razorpay Direct - Credit Card Plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/razorpay-direct-credit-card.md) for credit card payments even if you are not currently a [Razorpay Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md) user.
        
  
        
### 7. How can I verify if webhooks are auto-configured?

 
         To verify if webhooks are enabled:
         1. Log in to the Dashboard and navigate to **Account & Settings**.
         2. In the **Website and app settings** section, click **Webhooks**.
            
         3. Select the relevant webhook **URL**.
         4. On the right panel, check if the status for `order.paid`, `payment.authorized`, `refund.processed` and `refund.failed` is enabled.
        

        
### 8. How can I accept payments?

 
         To accept **live** payments, follow the steps mentioned in the [Switch from Test Mode to Live Mode](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/razorpay-direct-credit-card.md#22-switch-from-test-mode-to-live-mode)  section.
