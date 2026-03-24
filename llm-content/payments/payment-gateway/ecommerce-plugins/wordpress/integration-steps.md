---
title: Payment Gateway | WordPress - Integration Steps
heading: Integration Steps
description: Steps to integrate your WordPress website with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your WordPress website.

  - **1. Build Integration**: Install and configure the WordPress plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/a1mAm6EiZ6I]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Installation and Configuration

         
> **WARN**
>
> 
>           **Watch Out!**
> 
>             This plugin does not support dynamic amount calculation from your webpage. You can accept only fixed amounts using this plugin. Explore our [WooCommerce plugin](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce.md) or [Payment Button plugin](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/supported-platforms/wordpress.md) for your use case.
>          

         1. [Download the plugin](https://wordpress.org/plugins/razorpay-quick-payments/) from the WordPress Plugin Directory.
         1. Open your WordPress site and navigate to **Plugins** → **Add New**.
         1. Upload the plugin.
                ![Upload plugin screen](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-upload-plugin.jpg.md)
         1. Click **Activate Plugin**.
                ![Activate plugin](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-activate-plugin.jpg.md)
         1. Click **Settings**.
                ![Plugin settings](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-click-settings.jpg.md)
         1. Make the following changes in the **Edit Settings** screen:
                1. Select **Enable Razorpay Payment Module**.
                2. Edit **Title** and **Description** as required.
                3. Add your [KEY_ID] and [KEY_SECRET]. These can be generated from your Razorpay Dashboard.
                4. Set the **Payment Action** to **Authorize and Capture** to auto-capture payments.
                5. Click **Save Changes**.
                ![Razorpay PG save settings](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-edit-settings.jpg.md)
        

    
### 1.2 Add Custom Fields

         1. In your WordPress site, open the page or blog post where you want the button to appear.
         1. Click the more icon and select **Preferences**.
                ![Select Preferences](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-options.jpg.md)
         1. Click **Panels** and enable the **Custom Fields** checkbox in the **Additional** section. Now you will have the option to add custom fields on your page/blog post.
                ![Preferences custom fields](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-custom-fields.jpg.md)
         1. Scroll down the current page till you see the **Custom fields** section.
                ![Custom field section](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-custom-fields-scroll.jpg.md)
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 If you are using WordPress 4.8 or later, the custom fields can be added via **Screen Option**. If you are still not able to view the custom field, refer to the [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/wordpress/faqs#1-i-am-unable-to-view-the-custom.md).
> 
>               

        1. Add the following three custom fields as metadata:
             1. amount (in INR).
             1. name (name of the product).
             1. description (description of the product that is being sold).
             ![Custom fields amount name description](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-custom-fields-added.jpg.md)
        1. Add the `[RZP]`(shortcode indicated by square brackets) in the content section to display the **Pay with Razorpay** button anywhere.
              ![RZP shortcode](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-shortcode.jpg.md)
        1. Publish or update the page. The page appears with the **Pay with Razorpay** button.
             ![Razorpay checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ecommerce-plugins-wordpress-checkout.gif.md)

                
> **WARN**
>
> 
>                 **Watch Out!**
>                 
>                 If the payment button does not appear, ensure the Button script is placed inside the `` tag. This issue might be caused by certain cache plugins (for example, SpeedyCache) or Optimizer plugins (for example, SiteGround Optimizer). To resolve it, please deactivate these plugins. Once they are deactivated, the payment button should work properly.
>                 
>                 
   
        

## 2. Test Integration

After the integration, a **Pay** button will appear on your web page/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual payments from your customers once the test is successful.

![Pay with Razorpay button](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/wordpress-pay.jpg.md)

You can make test payments using one of the payment methods configured at the Checkout.
- No money is deducted from the customer's account as this is a simulated transaction.
- Ensure you have entered the API keys generated in the test mode in the Checkout code.

    
### Supported Payment Methods

         @include integration-steps/next-steps
        

    
### Verify Payment Status

        @include integration-steps/verify-payment-status
     

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
### 3.1 Accept Live Payments

         
        Perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you are switching your test API keys with API keys generated in Live Mode.
> 

To generate API Keys in Live Mode on your Razorpay Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        

    
### 3.2 Payment Capture

         @include integration-steps/capture-settings
