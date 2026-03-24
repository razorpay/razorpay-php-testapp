---
title: Subscriptions | WooCommerce | Build Integration
heading: 1. Build Integration
description: A step-by-step guide on how to integrate WooCommerce-enabled WordPress site with Razorpay.
---

# 1. Build Integration

Follow the steps given below to integrate Razorpay Payment Gateway to your WooCommerce-enabled WordPress site using the Razorpay Subscription for WooCommerce plugin.

## Integration Steps

Follow these steps to complete the integration:

### On Your WordPress Site

1. [Install the Razorpay Subscriptions for WooCommerce Plugin](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/woocommerce/build-integration/#step-1-install-razorpay-subscriptions-for-woocommerce-plugin.md).
1. [Configure WooCommerce Settings](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/woocommerce/build-integration/#step-2-configure-woocommerce-settings.md).
1. [Create a Subscriptions product using WooCommerce](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/woocommerce/build-integration/#step-3-create-a-subscriptions-products.md).
1. [Test integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/woocommerce/test-integration.md).

1. [Enable Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/woocommerce/build-integration/#you-can-track-the-payment-status-in-three.md). 
    These 3 webhooks are auto configured for woocommerce subscription plugin:
    - `subscription.cancelled`
    - `subscription.paused`
    - `subscription.resumed`

#### Step 1: Install Razorpay Subscriptions for WooCommerce Plugin

There are two methods to install the Razorpay Subscription for WooCommerce plugin:
- Install via WordPress Plugin Directory
- Manual Installation

#### Install via WordPress Plugin Directory

You can search for the plugin on the WordPress Admin Dashboard and add it.
1. In the **WordPress Admin Dashboard**, navigate to **Plugins** → **Add New**.
2. Search for **Razorpay Subscriptions for WooCommerce** and click **Install Now**.
    ![Install Razorpay Subscription via wordpress plugin directory](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-1.jpg.md)
3. Click **Activate**.

#### Manual Installation
1. [Download a ZIP file](https://github.com/razorpay/razorpay-woocommerce-subscriptions/releases) of the Razorpay WooCommerce Subscriptions Plugin from the repository on Github.
2. Unzip this file and upload the contents in `wp-content` → Plugins.
    ![Install Razorpay subscription via manual installation](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-2.jpg.md)
3. The plugin now appears in your **WordPress Dashboard** → **Plugins** folder.
4. Click **Activate**.

#### Step 2: Configure WooCommerce Settings

On your WordPress Dashboard, navigate to **WooCommerce** → **Settings** → **Payments** tab.

#### Settings for Razorpay Payment Gateway

1. Under the **Payments** tab, go to **Razorpay** → **Allow customers to securely pay via Razorpay** and click **Manage**.
    

    ![Configure Woocommerce settings on Razorpay Payments page](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-3.jpg.md)
2. On the **Razorpay Payment Gateway** page, fill in the following field details and click **Save**:

    
    Field | Description
    ---
    Enable/Disable | Ensure that the **Enable this module?** option is selected.
    ---
    Title | Add the title that is visible to the customer during checkout of a product with type - `Simple Product`.
    ---
    Description | Enter a short description that is visible to the customer during checkout.
    ---
    Key ID | Enter the Key ID generated from the Dashboard.
    ---
    Key Secret | Enter the API Key Secret generated from the Dashboard.
    ---
    Payment Action | To automatically capture successful payments, select `Authorize and Capture` option in the drop-down. Select `Authorize` if you want to capture payments manually from the [Razorpay Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/dashboard/#manual-capture-of-payments.md) or using [API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/capture.md).
    ---
    Order Completion Message | Enter the message that must be displayed after an order is successfully placed.
    ---
    Enable Webhook | Ensure that **Enable Razorpay Webhook** option is selected. [Set up webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md) from the Dashboard.
    ---
    Webhook Secret | Enter the webhook secret here. Webhook secret is used for webhook signature verification. This must match with the one added on the Razorpay Dashboard.
    ---
    
    

    ![Enter field details on Razorpay Payment Gateway page](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-19.jpg.md)

#### Settings for Razorpay Subscriptions

1. Under the **Payments** tab, go to **Razorpay Subscriptions** → **Allow customers to securely pay via Razorpay** and click **Manage**.
2. On the **Razorpay Subscriptions Payment Gateway** page, fill in the following field details and click **Save**:

    
    Field | Description
    ---
    Enable/Disable | Ensure that the **Enable this module?** option is selected.
    ---
    Title | Add the title that is visible to the customer during checkout of the subscription product with type `Simple Subscription`.
    ---
    Description | Enter a short description that is visible to the customer during checkout.
    ---
    
    

    ![Enter details on Razorpay Subscriptions Payment Gateway page](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-20.jpg.md)

#### Step 3: Create a Subscriptions Product

**Example:**
Let us assume Acme Corp. provides a streaming service called **GoFlicks**. There are two plans, **GoFlicks PremiumWatch** and **GoFlicks StandardWatch**. The details are mentioned below:

Plan Name | Rate/Month (₹) | Free Trial (days)
---
GoFlicks PremiumWatch HD | 999 | 15
---
GoFlicks StandardWatch | 499 | N/A

Let us create a Subscriptions product for **GoFlicks PremiumWatch HD**.

1. In the WordPress Dashboard, navigate to **Products** → **Add New**.
2. Enter the product name and add a brief description.
3. In the Product data section, enter the following details and click **Publish**:
    1. Select **Simple Subscription** as the product type in the drop-down list.
    2. Select **Virtual** check box as `GoFlicks` is a streaming service.
    3. Under the **General** tab, enter the following details:
        1. **Subscription Price:** Enter the price, select every as the **interval** and month as the **duration**.
        2. **Expire after:** Select the period after which the subscription will expire. This period is in addition to any free trial or time provided before a synchronised first renewal date. Do not select **Never Expire** as it is not supported by Razorpay. 
            
> **INFO**
>
> 
>             **Handy Tips**
>             
>             WooCommerce supports Subscriptions for a maximum of 24 months.
>             

        3. **Sign-up fee:** Add an amount to be charged at the outset of the subscription. This fee will be charged immediately, even if the product has a free trial.
        4. **Free trial:** Enter the period up to which the subscriber can use the product for free. The trial period cannot exceed 90 days, 52 weeks, 24 months or 5 years. A sign-up fee will still be charged from the outset of the subscription.
        5. **Sale Price:** Enter the discounted price at which you want to offer the product. For example, you may offer **GoFlicks PremiumWatch HD** at INR 899 per month for a limited period. You can schedule the special price by clicking **Schedule** and selecting the required dates on the calendar.

        ![Create a Subscriptions product for GoFlicks PremiumWatch HD](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-4.jpg.md)

The product is created successfully. Similarly, create another Subscriptions product for **GoFlicks StandardWatch**.
- Check that the products are visible on the website to the users so that they can add it to their cart.
- [Make a test transaction](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/woocommerce/test-integration.md) to ensure that the integration is working properly.

## Verify Payment Status

@include integration-steps/verify-payment-status

### Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/plugins/woocommerce/test-integration.md)
