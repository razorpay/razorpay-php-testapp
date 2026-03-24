---
title: Quickstart Guide
description: Complete guide to get started with Razorpay's Banking platform.
---

# Quickstart Guide

Welcome to Razorpay! This guide will walk you through setting up your account and how to use our solutions for your business needs.

## Step 1: Create an Account

You can [sign up for a RazorpayX account](https://x.razorpay.com/auth/signup) or if you are already a Razorpay user, use your existing credentials to sign in. After KYC completion and testing, live mode unlocks for real payments.

### Test Mode vs Live Mode

  
    
     - Start without KYC completion.

     - Use test transactions with dummy data. No real money involved.

     - API keys begin with `rzp_test_`.

     - Perfect for development and testing.

    
   

  
    
     - Requires KYC verification (24-48 hours).

     - Start creating real customer payouts.

     - API keys begin with `rzp_live_`.

     - Full access to all features.

    
   

## Step 2: Select Solutions

Choose solutions based on your business requirements.

    
### Payouts

         With the Payouts module, you can:
         - Make instant Payouts individually or in bulk for chargebacks or cashbacks.
         - Use IMPS, NEFT, RTGS, UPI or Bank Transfer to pay. Know more about [ creating a payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#create-a-payout).
        

    
### Payout Links

         Send funds to anyone, even when you do not have their bank account details. You just need to enter the recipient's name, phone number or email, and the amount to be paid to create a Payout Link. [Know more about Payout Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links.md).
        

    
### RazorpayX Vendor Payouts

         Manage your vendor payments effortlessly with Vendor Payouts. You can choose to settle the dues against all the invoices raised by the vendor in one go, or make selective payments. [Explore Vendor Payment capabilities on RazorpayX](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md).
        

    
### RazorpayX Tax Payments

         Use RazorpayX to automate direct tax payments via a user-friendly interface. Know more about [RazorpayX Tax Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments.md).
        

    
### RazorpayX Payroll

         You can manage payroll, attendance, reimbursements and compliances - all in a single Dashboard! RazorpayX Payroll fully automates payroll solutions for you., including tax and filings. Know more about [RazorpayX Payroll.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll.md).
        

## Step 3: Key Dashboard Actions

    
### Generate API Keys

            If you are using our APIs, follow these steps to [generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x.md) for the integration:
            1. Log in to Dashboard.
            2. Navigate to the user icon in the top-right corner of the screen and click **My Profile** → **My Accounts & Settings**.
            3. Navigate to **Developer Controls** and click **Generate Key**.
            4. Download and save **Key ID** and **Key Secret** securely.

            **Important:**
            - Only Owner and Admin roles can access API keys.
            - Generate separate keys for Test and Live modes.
            - Key Secret is only visible at generation time.
        

    
### Add Team Members

            Follow these steps:
            1. Log in to the Dashboard.
            2. Navigate to **My Account & Settings** → **Team Management** → **Manage Team**.
            3. Click **+ Team Member**.
            4. Enter their email address and select role from the dropdown.
            4. Click **Send Invite**.
        

    
### Configure Webhooks

            We recommend setting up webhooks to receive notifications, if you are integrating with our APIs.
            1. Log in to the Dashboard.
            1. Navigate to **My Account & Settings** → **Developer Controls**.
            2. Click **Add Webhooks**.
            3. Enter your endpoint URL.
            4. Select events to monitor.
            5. Add webhook secret for signature verification.
            6. Click **SAVE** to enable the webhook.

            [Webhooks Documentation →](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md)
        

## Next Steps

Once your account is created:

1. **Complete KYC**: [Submit KYC documents](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md#2-submit-kyc-details) for live mode activation.
2. **Choose Solution**: Select solutions based on your business needs and technical capabilities.
3. **Test Thoroughly**: Use test mode before going live.
4. **Go Live**: Switch to live mode when ready. Use live mode keys with our APIs.
