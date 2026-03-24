---
title: Quickstart Guide
description: Complete guide to get started with Razorpay's payments platform.
---

# Quickstart Guide

Welcome to Razorpay! This guide will walk you through setting up your account and choosing the right products for your business needs.

## Step 1: Create an Account

Sign up for a [Razorpay account](https://razorpay.com/signup) and complete the KYC process.

- Start using our products or SDK/API integration in Test Mode during the KYC verification process.
- After KYC completion and testing, live mode unlocks for real payments.

### Test Mode vs Live Mode

  
    
     - Start integration immediately without KYC completion.

     - Use test transactions with dummy data. No real money involved.

     - API keys begin with `rzp_test_`.

     - Perfect for development and testing.

    
   

  
    
     - Requires KYC verification (24-48 hours).

     - Accept real customer payments.

     - API keys begin with `rzp_live_`.

     - Full access to all features.

    
   

## Step 2: Select Product

[Choose Razorpay products](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md) based on your business requirements.

    
### Online Payments vs. Offline Payments

         Choose between digital payment processing for ecommerce and websites using [Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md), [Magic Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout.md) and [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md) or physical payment solutions for retail stores and face-to-face transactions with [Razorpay POS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos.md). Know more about [online and offline payment options](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md#accept-payments).
        

    
### One-time Payments vs. Recurring Payments

         Select single transaction processing for individual purchases using [Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md), [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md) and [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md) or automated recurring billing for subscriptions and regular services with [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md). Know more about [one-time and recurring payment solutions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md#accept-payments).
        

    
### No-code Products vs. Products with Coding Requirements

         Pick ready-to-use payment solutions with simple setup like [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md), [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md), [Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) or refer to our [Payment Gateway SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md#integrate-payment-gateway-web-mobile-ecommerce-plugins) for advanced integration needs. Explore [no-code and developer-friendly options](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md#accept-payments).
        

    
### Solutions by Industry

         Find tailored payment solutions designed for your industry: [Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md) for ecommerce, [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md) for SaaS, [Route](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route.md) for marketplaces or [Razorpay POS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos.md) for traditional retail businesses. View [industry-specific payment solutions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md#solutions-by-industry).
        

    
### Solutions by Platform

         Integrate payments seamlessly with popular ecommerce platforms like Shopify, WooCommerce, Magento using [Payment Gateway ecommerce plugins](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md#integrate-payment-gateway-web-mobile-ecommerce-plugins) or build custom solutions using our [Checkout SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md#integrate-payment-gateway-web-mobile-ecommerce-plugins) for Go, PHP, Python, Node.js and [mobile platforms](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md#integrate-payment-gateway-web-mobile-ecommerce-plugins) (Android, iOS, React Native, Flutter, Cordova, Capacitor). Browse [platform-specific integration guides](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md#solutions-by-platform).
        

## Step 3: Key Dashboard Actions

    
### Generate API Keys

            If you are using our APIs, SDKs or plugins, follow these steps to generate API keys for the integration:
            1. Log in to Dashboard.
            2. Navigate to **Account & Settings** → **API Keys** under Website and app settings.
            3. Click **Generate Key**.
            4. Download and save **Key ID** and **Key Secret** securely.

            **Important:**
            - Only Owner and Admin roles can access API keys.
            - Generate separate keys for Test and Live modes.
            - Key Secret is only visible at generation time.

            [API Keys Documentation →](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md)
        

    
### Add Team Members

            Follow these steps:
            1. Log in to the Dashboard.
            2. Navigate to **Account & Settings** → **Business settings** → **Manage Team**.
            3. Click **Invite New Member**.
            4. Enter their email address and select role from the dropdown.
            4. Click **Send Invitation**.

            [Team Management Guide →](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/manage-team.md)
        

    
### Configure Webhooks

            We recommend setting up webhooks to receive notifications, if you are integrating with our APIs or SDKs.  
            1. Log in to the Dashboard.
            1. Navigate to **Account & Settings** → **Webhooks**.
            2. Click **Add New Webhook**.
            3. Enter your endpoint URL.
            4. Select events to monitor.
            5. Add webhook secret for signature verification.
            6. Save and activate.

            [Webhooks Documentation →](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md)
        

    
### Payment Capture Settings

            Log in to the Dashboard. Navigate to the **Account & Settings** option and scroll to the **Payments Capture** section.

            
            Option	| Description
            ---
            Auto-capture all payments	| All payments authorized within 3 days from the time of creation are auto-captured.
            ---
            Auto-capture timeouts | - Allows you to define custom auto-capture timeout.
- The minimum value is 12 minutes.
- The maximum value (default) is 3 days.

            ---
            Manual capture timeout | - Allows you to define custom manual capture timeout.
- 
The minimum value is 12 minutes.- The maximum value (default) is 3 days.

            ---
            Auto-refund speed | Payments in the authorized state are auto-refunded after the timeout. With the Normal Refund option, your payment is refunded to your customer in 5-7 working days. The refund speed selected here is only applicable to payments that are auto-refunded.
            
            

            [Payment Capture Guide →](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md)
        

## Next Steps

Once your account is created:

1. **Complete KYC**: [Submit KYC documents](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md#2-submit-kyc-details) for live mode activation.
2. **Choose Product/Integration Method**: Select based on your business needs and technical capabilities.
3. **Test Thoroughly**: Use test mode before going live.
4. **Go Live**: Switch to live mode when ready. Use live mode keys if integrating with our APIs/SDKs/plugins.
