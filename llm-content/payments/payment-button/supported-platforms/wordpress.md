---
title: Embed Payment Button on WordPress Website
description: Embed a Razorpay Payment Button on your WordPress website and accept payments from customers.
---

# Embed Payment Button on WordPress Website

- **Payment Button - Wordpress Changelog**:  Version 2.4.6 released for Payment Button Wordpress. This version fixes naming conflict in Razorpay section.

WordPress is one of the most popular Content Management Systems out there. You can quickly build a website using WordPress and embed the our Payment Button to accept payments from customers.

## WordPress Plan

    
        If you have built your website using `www.wordpress.com`, and are on a paid plan, you can directly install the Razorpay Payment Button Plugin from the WordPress Plugins store. 

        1. [Install the Razorpay Payment Button Plugin on your WordPress site](https://wordpress.org/plugins/razorpay-payment-button/).
        2. [Create a Payment Button on Dashboard](#step-2-create-a-payment-button-on-razorpay).
        3. [Embed the Payment Button on your WordPress site](#step-3-embed-the-payment-button-on-wordpress).

    
    
        If you are using WordPress with the free plan, you need to use MAMP to set up a local WordPress site and continue with the Payment Button 
        implementation. 

        1. [Set up WordPress site locally on your system](#step-1-set-up-wordpress-site-locally-on).
        2. [Create a Payment Button on Dashboard](#step-2-create-a-payment-button-on-razorpay).
        3. [Embed the Payment Button on your WordPress site](#step-3-embed-the-payment-button-on-wordpress).
    

## Prerequisites

1. Download the [Razorpay Payment Button WordPress Plugin](https://wordpress.org/plugins/razorpay-payment-button/).
2. Create a Razorpay account.
3. Navigate to **Settings** → **API Keys** and [generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) in the test mode.
 

Add the API key details in the Razorpay Payment Button plugin settings.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - When testing: Generate the keys in Test mode. 

> - To accept live payments: Generate the keys in Live mode and replace them in the Payment Button plugin settings.
> 

## Set Up a Payment Button Using Wordpress Plugin

Watch this video to see how to set up a Payment Button using Wordpress Plugin.

### 1. Set Up WordPress Site Locally on Your System

    
     See: [Installation Steps for Windows](https://documentation.mamp.info/en/MAMP-Windows/Installation/)
    
    
        To install WordPress on your Mac system:
        1. [Download the latest version of MAMP](https://www.mamp.info/en/downloads/) and install it on your Mac system. This software enables you to manage your websites locally.
        2. Install the downloaded file using the wizard and save MAMP in your **Applications** folder.
            
        3. Navigate to the **MAMP** folder.
            
            

            In the folder, click the **MAMP** icon:
            
        4. Click **Start Server** to run the server on your system.
            
            The server status appears green once they are ready.
            
        5. Click **Open WebStart Page**. The server starts running on your browser as shown:
            
        6. We must set up a MySQL database for the WordPress website. This is done using **phpMyAdmin**.
            
            a. Select the required database and click **Privileges**.

            
            b. Click **Add user account**.
            

            c. Enter the username and password, same as the WordPress account login credentials.

            

            d. Click **Go**.
            

        7. Navigate to the WordPress application you had downloaded.
        8. Rename the `WordPress` folder. Provide a name relevant to the site you will be building/testing locally. For example, `teafactory`. Add the `teafactory` folder in `htdocs` of your MAMP directory.
            

        9. Open the browser and type in the URL pointing to your site folder. For example, `localhost:8888/teafactory`. Select the language of your choice and click **Continue** → **Let's Go**.
            

        10. Enter your database details. Provide a name for the database, and enter `root` for both the database username and password. Click **Submit**.
            

        11. Provide the required general site information (which you can change later), as well as your login information in WordPress.
            

        12. Click the **Install WordPress** button. With this, your website is ready.
            

    

To accept payments on your WordPress site, you must create a Payment Button.

- [Quick Pay Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/quick-pay.md)
- [Buy Now Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/buy-now.md)
- [Donations Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/donations.md)
- [Custom Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/custom.md)

## 3. Embed the Payment Button on WordPress Site

To embed the Payment Button:

3.1 Download and install the Razorpay Payment Button Plugin. You can do this using either of these methods:
    - [Download the plugin from the WordPress Plugin Directory](https://wordpress.org/plugins/razorpay-payment-button/) and add the zip file to your WordPress website's **Plugins** folder.
    - Add the plugin directly onto your WordPress website from the **Plugin** page.

3.2 In your WordPress site, activate the plugin in the **WordPress Plugin Manager**. 
 

3.3 Navigate to **Razorpay Buttons** → **Settings** to add your Razorpay API key details and connect your Razorpay account to the plugin.
 

3.4 Navigate to **Razorpay Buttons**. A list of buttons you created on Razorpay are available here. Select the required button.
 

3.5 Click **Pages** and navigate to the page where you want to embed the Payment button.
 

3.6 Select **Add Block** → **Widgets** → **Razorpay: Payment Button** to embed the Payment button onto the page.
 

3.7 Choose the Payment Button using the drop-down and publish or update the page.
 

The Payment Button appears on the page.

You can now start accepting payments on your WordPress website using the Payment Button.

## FAQs

### Related Information

- [Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button.md)
- [Create a WordPress Website](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/supported-platforms/wordpress/create-website.md)
- [Payment Button Elementor Plugin for WordPress](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/supported-platforms/wordpress/elementor.md)
- [Payment Button SiteOrigin Plugin for WordPress](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/supported-platforms/wordpress/site-origin.md)
- [Payment Button Visual Composer Plugin for WordPress](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/supported-platforms/wordpress/visual-composer.md)
