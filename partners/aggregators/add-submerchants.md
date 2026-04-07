---
title: Aggregators - Add Sub-merchants
description: As an Aggregator, you can add sub-merchants using their email ids or by sharing a referral link from the Razorpay Dashboard (Razorpay Partnership).
---

# Aggregators - Add Sub-merchants

As an Aggregator, you provide managed services to your clients (sub-merchants or affiliate accounts) through your digital offerings. Along with providing a platform to your clients, you are also involved in managing the client's transactions. You can collect payments, create refunds and view settlements on behalf of your clients via API and Dashboard access.

In addition to this, you can also invite your affiliates to open Current Account with RazorpayX.

## Who is a Sub-merchant

Sub-merchants are the merchants who get onboarded on the Razorpay platform by a Partner. For example, Acme Corp. wants to manage payments on its application for its client *Gekko & Co*. Since *Acme* cannot natively do so, it signs up with Razorpay as a Partner and creates a sub-merchant account (affiliate account) for *Gekko*. In this scenario, "Gekko" is Acme's sub-merchant.

After *Gekko* account is activated, *Acme Corp* can use its account credentials to create and manage transactions on behalf of *Gekko*. It can also access Gekko’s  Dashboard. Since *Gekko* is also a registered Razorpay merchant, it will have the ability to transact and access account details using its own set of API keys and Dashboard.

## Add a Sub-merchant

You can add a sub-merchant from the Dashboard or using our [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md).

To add a sub-merchant from the Dashboard:

1. Log in to your Dashboard.
1. Click **Partner Dashboard**.
    
1. Under the **Affiliate Accounts** tab, click **+ Add New Clients**.
    
1. In the input-form, enter the:
    1. **Merchant Name** or the name of the business.
    1. **Merchant Email** address registered in your application. Razorpay will send a sign-up link to the specified email.
    

The newly added sub-merchants will appear on the Partner Dashboard merchant list.

### Related Information

- [About Aggregators](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators.md)
- [Testing Operations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/testing.md)
- [Know Your Commission](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/commissions.md)
- [Partners](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners.md)
