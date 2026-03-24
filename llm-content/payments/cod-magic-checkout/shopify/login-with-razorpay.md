---
title: Login With Razorpay Setup | Razorpay COD & Magic Checkout
heading: Login With Razorpay Setup (SSO)
description: Boost conversions and gain customer insights with Magic SSO. Simplify login and create personalised shopping experiences for your Shopify store.
---

# Login With Razorpay Setup (SSO)

Razorpay Magic SSO (Single Sign-On) offers a seamless login experience, helping you enhance conversions and gain valuable insights into user behaviour.

    
### Advantages

         - **Seamless Login and Personalisation**: OTP-based login with incentives like discounts, enabling auto-login across stores for a frictionless and personalised experience.
         - **Expanded Customer Data and Insights**: Higher login rates provide you with deep insights into customer behaviour before checkout, improving engagement and retention.
         - **Improved Conversion Rates**: Pre-logged-in users experience smoother checkouts, early coupon discovery, and personalised offers, driving higher sales.
         - **Stronger Abandoned Cart Recovery**: Captures abandoned carts before checkout, allowing you to re-engage users who showed purchase intent.
         - **Customisable and Compliant**: Fully brandable UI with explicit consent collection for retargeting, ensuring compliance and trust.
        

## Prerequisites 

Follow the steps given below:
1. Log in to the [Shopify Store](https://accounts.shopify.com/store-login) and navigate to **Settings** → **Customer accounts**.
2. In the **Login Links** section, select **Legacy**. 
3. Click **Switch to legacy customer accounts** to confirm.
     ![Switch to legacy customer accounts on shopify store](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-sso-legacy-account.gif.md)
4. On the home page, navigate to **Online Store** → **Preferences** in the **Sales channels** section.
5. Scroll down to the **Spam Protection** section and disable the captcha settings:
     - **Enable on contact and comment forms**
     - **Enable on login, create account and password recovery pages**
6. Click **Save**.
     ![Disable captcha settings on shopify store](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-sso-captcha-disable.gif.md)

## Enable Login with Razorpay Setup

Set up easy login into your website with single sign-on for your customers across the Razorpay network. To enable login with Razorpay setup:

1. Log in to the Dashboard navigate to **Magic Checkout** → **Setup & Settings**. 
2. Navigate to **Login with Razorpay Setup**.
3. Turn on **Enable Login with Razorpay**.
     ![Enable Login with Razorpay](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-enable.jpg.md)
4. You will be able to view the following options for the SSO widget: 
    - [Settings](#settings)
    - [Customise](#customise)
![Settings and customisation options on SSO](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-settings.jpg.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> If you have added a custom domain for the account page, SSO will not work. You must revert to the default domain for the SSO settings to function.
> 

### Settings

You can configure the following:

    
### Where should we display login screen?

         Select where you want to show the login screen, if the user is not logged in. 
         
         
> **WARN**
>
> 
>          **Watch Out!**
>          
>          This is a multi select configuration, if a customer does not login the first time a login screen is dispayed, the login screen will reappear based on the options you select below.
>          

        
         - **The first page your customer sees**: Useful for encouraging early login during browsing. Select the checkbox and schedule when the login widget shows up (in seconds). For example, show the login widget 5 seconds after the page loads.
         - **When a customer adds their very first item to the cart**: Prompt login after the customer adds their first item to the cart. Select the checkbox and schedule when the login widget should show up (in seconds). 
         - **When a customer begins the checkout process**: Display the login screen when they proceed to checkout, just before payment. Select the checkbox.
             - **Make Login mandatory pre-Checkout**: Ensure that users cannot proceed to checkout without logging in. Select the checkbox to enforce mandatory login.
             ![Display login screen](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-display-login.jpg.md)
        

    
### Ask consent from customer for marketing communication

         Select how you want to seek permission from your customer for marketing communication. 

         - **Single selector for Email, WhatsApp, and SMS**: Use one unified checkbox to capture consent for all three channels together.
         - **Separate selectors for Email, WhatsApp, and SMS**: Use separate checkboxes to capture consent for each channel individually.
         - **Do not ask for consent**: No explicit consent prompt is displayed for marketing communications.
             ![Ask consent from customer for marketing communication](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-ask-consent.jpg.md)
        

    
### Collect missing emails from everyone

         You can choose to collect missing emails during the login.
         - **Email-Less Customers**: Allow users to log in without providing an email address.
         - **Collect Missing Emails (recommended)**: Prompt users to enter their email during login if it is not already available.
             ![Collect missing emails](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-collect-emails.jpg.md)
        

After completing the configuration, click **Save Changes** to apply the updates.

> **INFO**
>
> 
> **Handy Tips**
> 
> The widget includes a consent prompt for users at the bottom, with terms and conditions listed.
> 

### Customise

Customise the widget to suit your brand. The default configuration flows from the configurations on checkout settings.

1. In the **Customise** section, The preview turns into edit mode. You can edit the following:
     
         
             Enter the widget heading as per your preference.
             ![Edit widget heading](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-widget-heading.gif.md)
         
         
             Hover over the emoji you want to change and click the edit icon. Press `Command + Control + Space` to open the emoji picker and select your preferred emoji.
             ![change emojis](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-emoji.gif.md)
         
         
             Click **Change Background Colour** and choose a colour of your choice.
             ![Customise background colour](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-background-colour.gif.md)
         
         
             Click **Change Button Colour** and choose a colour of your choice.
             ![Customise button colour](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-button-colour.gif.md)
         
         
             Click **Change Font** and choose a font of your choice from the drop-down list.
             ![Change Font](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-font.gif.md)
         
     
2. Click **Save**.

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can switch between mobile and desktop views to preview changes.
> - You can also preview how the widget will appear on **Live Mode**.
> ![Mobile/Desktop view and Live Mode](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cod-magic-sso-view-mode.jpg.md)
> 

## Login Rewards

You can offer discounts or coupons to encourage customers to log in to your website.

> **INFO**
>
> 
> **Handy Tips**
> 
> This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account. Ensure your coupon is created on the [Coupon Engine](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/cod-magic-checkout/shopify/coupons.md) and include the following details in your request: 
> - Coupon code
> - A brief description
> - Any additional message you want to display 
> 

### Related Information

- [Automatic Customer Tagging for Retargeting](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/cod-magic-checkout/shopify/login-with-razorpay/automation-tags.md)
- [Customer Analytics](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/cod-magic-checkout/shopify/login-with-razorpay/customer-analytics.md)
