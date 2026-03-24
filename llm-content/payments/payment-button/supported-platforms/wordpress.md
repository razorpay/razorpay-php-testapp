---
title: Embed Payment Button on WordPress Website
description: Embed a Razorpay Payment Button on your WordPress website and accept payments from customers.
---

# Embed Payment Button on WordPress Website

- **Payment Button - Wordpress Changelog**:  Version 2.4.6 released for Payment Button Wordpress. This version fixes naming conflict in Razorpay section.

WordPress is one of the most popular Content Management Systems out there. You can quickly build a website using WordPress and embed the our Payment Button to accept payments from customers.

![WordPress Homepage](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-wordpress-homepage.jpg.md)

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
3. Navigate to **Settings** → **API Keys** and [generate API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) in the test mode.
 
[Video: https://www.youtube.com/embed/6mJnOWZDhDo]

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

[Video: https://www.youtube.com/embed/xyk5FXSDdK4]

### 1. Set Up WordPress Site Locally on Your System

    
     See: [Installation Steps for Windows](https://documentation.mamp.info/en/MAMP-Windows/Installation/)
    
    
        To install WordPress on your Mac system:
        1. [Download the latest version of MAMP](https://www.mamp.info/en/downloads/) and install it on your Mac system. This software enables you to manage your websites locally.
        2. Install the downloaded file using the wizard and save MAMP in your **Applications** folder.
            ![Install MAMP](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-install-mamp.jpg.md)
        3. Navigate to the **MAMP** folder.
            ![Navigate to MAMP](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-mamp-folder.jpg.md)
            

            In the folder, click the **MAMP** icon:
            ![Click MAMP](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-mamp-icon.jpg.md)
        4. Click **Start Server** to run the server on your system.
            ![Start Server](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-start-server.jpg.md)
            The server status appears green once they are ready.
            ![Server in Ready State](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-server-running.jpg.md)
        5. Click **Open WebStart Page**. The server starts running on your browser as shown:
            ![Open WebStart Page](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-phpmyadmin.jpg.md)
        6. We must set up a MySQL database for the WordPress website. This is done using **phpMyAdmin**.
            ![Setup phpMyAdmin](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-setup-database.jpg.md)
            a. Select the required database and click **Privileges**.

            ![Add user account: phpMyAdmin](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-priviledges.jpg.md)
            b. Click **Add user account**.
            ![Add user account: phpMyAdmin](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-add-user-account.jpg.md)

            c. Enter the username and password, same as the WordPress account login credentials.

            ![Add user account: phpMyAdmin](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-username-password-priviledges.jpg.md)

            d. Click **Go**.
            ![user account added: phpMyAdmin](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-user-account-added.jpg.md)

        7. Navigate to the WordPress application you had downloaded.
        8. Rename the `WordPress` folder. Provide a name relevant to the site you will be building/testing locally. For example, `teafactory`. Add the `teafactory` folder in `htdocs` of your MAMP directory.
            ![Rename WordPress folder](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-htdocs.jpg.md)

        9. Open the browser and type in the URL pointing to your site folder. For example, `localhost:8888/teafactory`. Select the language of your choice and click **Continue** → **Let's Go**.
            ![Select Language](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-select-language.jpg.md)

        10. Enter your database details. Provide a name for the database, and enter `root` for both the database username and password. Click **Submit**.
            ![Log in](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-wp-login.jpg.md)

        11. Provide the required general site information (which you can change later), as well as your login information in WordPress.
            ![Setup Login Information](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-setup-login.jpg.md)

        12. Click the **Install WordPress** button. With this, your website is ready.
            ![Install WordPress](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-login.jpg.md)

    

To accept payments on your WordPress site, you must create a Payment Button.

- [Quick Pay Button](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/quick-pay.md)
- [Buy Now Button](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/buy-now.md)
- [Donations Button](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/donations.md)
- [Custom Button](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/custom.md)

## 3. Embed the Payment Button on WordPress Site

To embed the Payment Button:

3.1 Download and install the Razorpay Payment Button Plugin. You can do this using either of these methods:
    - [Download the plugin from the WordPress Plugin Directory](https://wordpress.org/plugins/razorpay-payment-button/) and add the zip file to your WordPress website's **Plugins** folder.
    - Add the plugin directly onto your WordPress website from the **Plugin** page.

3.2 In your WordPress site, activate the plugin in the **WordPress Plugin Manager**. 
 ![Activate Plugin](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-activate-plugin.jpg.md)

3.3 Navigate to **Razorpay Buttons** → **Settings** to add your Razorpay API key details and connect your Razorpay account to the plugin.
 ![Add Razorpay API Key](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-settings.jpg.md)

3.4 Navigate to **Razorpay Buttons**. A list of buttons you created on Razorpay are available here. Select the required button.
 ![List of Payment Buttons](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-view-buttons.jpg.md)

3.5 Click **Pages** and navigate to the page where you want to embed the Payment button.
 ![Select Page](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-shop-page.jpg.md)

3.6 Select **Add Block** → **Widgets** → **Razorpay: Payment Button** to embed the Payment button onto the page.
 ![Embed Button](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-add-pb-widget.jpg.md)

3.7 Choose the Payment Button using the drop-down and publish or update the page.
 ![Choose Payment Button](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-select-button.jpg.md)

The Payment Button appears on the page.

![Payment Button Appears](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-button-wordpress-pb.gif.md)

You can now start accepting payments on your WordPress website using the Payment Button.

## FAQs

### Related Information

- [Payment Button](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button.md)
- [Create a WordPress Website](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/supported-platforms/wordpress/create-website.md)
- [Payment Button Elementor Plugin for WordPress](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/supported-platforms/wordpress/elementor.md)
- [Payment Button SiteOrigin Plugin for WordPress](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/supported-platforms/wordpress/site-origin.md)
- [Payment Button Visual Composer Plugin for WordPress](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/supported-platforms/wordpress/visual-composer.md)
