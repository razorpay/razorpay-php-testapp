---
title: Subscriptions | OpenCart | Build Integration
heading: 1. Build Integration
description: A step-by-step guide on how to integrate OpenCart enabled site with Razorpay.
---

# 1. Build Integration

Follow the steps given below to integrate Razorpay Payment Gateway with your OpenCart enabled site using the Razorpay Subscription for OpenCart plugin.

## Integration Steps

Follow these steps to complete the integration:

### On Your OpenCart Site
1. [Install the Razorpay Subscriptions for OpenCart Plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/opencart/build-integration.md#step-1-install-razorpay-subscriptions-for-opencart-plugin).
1. [Configure OpenCart Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/opencart/build-integration.md#step-2-configure-opencart-settings).
1. [Create a Plan for Subscriptions product](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/opencart/build-integration.md#step-3-create-a-plan-for-subscriptions-product).
1. [Test integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/opencart/test-integration.md).

1. [Enable Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/opencart/build-integration.md#subscribe-to-webhook-events).

#### Step 1: Install Razorpay Subscriptions for OpenCart Plugin

To install Razorpay Subscriptions for OpenCart plugin:
1. Download the latest source code ZIP file of the Razorpay OpenCart Subscriptions plugin from the repository on Github.
    1. [OpenCart 3](https://github.com/razorpay/razorpay-opencart/releases)
    2. [OpenCart 2](https://github.com/razorpay/razorpay-opencart/releases/tag/opencart2-3.0.0)
    3. [OpenCart 1.5](https://github.com/razorpay/razorpay-opencart/releases/tag/opencart1.5-1.0.0)

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Subscriptions is available only on [OpenCart 3](https://github.com/razorpay/razorpay-opencart/releases).
>     

2. Copy all files/folders recursively to the OpenCart installation directory.

#### Step 2: Configure OpenCart Settings

#### Step 3: Create a Plan for Subscriptions Product

> **WARN**
>
> 
> **Watch Out!**
> 
> You can enable or disable plans only after creating them.
> 

To create a Plan for Subscriptions product:
1. Go to the **Admin Panel** → **Razorpay Subscription**  → **Plans** to add a new Plan.
2. Click **Add new** to create a new Plan.
3. Enter the required details and click **Save** to save the Plan.

    ![](/docs/assets/images/opencart-create-plan.jpg)

### Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/opencart/test-integration.md)
