---
title: Payment Gateway | Shopify | Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common errors and find answers to frequently asked questions about Shopify.
---

# Troubleshooting & FAQs

## Integration & Setup

    
### 1. How do I integrate 1 Razorpay with my Shopify store?

         Follow the [build integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md#1-build-integration) steps to integrate 1 Razorpay with your Shopify store.
        

    
### 2. Do I need API keys to integrate a payment app with Shopify?

         No, API keys are not required to integrate a payment app with Shopify. OAuth is used to handle the authentication process.
        

    
### 3. I tried connecting 1 Razorpay to my Razorpay account but was unsuccessful. When I try to reconnect, the screen appears different. How should I proceed?

         Follow the steps given below to connect 1 Razorpay with your Razorpay account:
         1. When you try to reconnect, you will get the following screen. Click **Manage**.
            
         2. You will be redirected to a landing page. Click **I am an existing user**.

            
            
         3. Scroll down and click **Login**. 
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             Make sure you log in with **owner** credentials to connect Razorpay with Shopify successfully.
>             

            
            
          
         4. Click **Activate** on the activation screen on your Shopify Dashboard. 

            

         1 Razorpay now appears as a Payment Gateway on your Shopify Store checkout.

            
          
         This completes your integration.
        

    
### 4. Why is the Activate button disabled?

         The Activate button may be disabled due to the plugin being integrated into another account or keyless authentication not being enabled. To enable the Activate button:

         - **Check for Integration with Another Account:** Verify if you have integrated your Shopify Store with a different Razorpay MID. If yes, revoke access under applications and retry the 1 Razorpay [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md#1-build-integration). 

         - **Enable Keyless Authentication:** Ensure keyless authentication is enabled from Razorpay's end. To enable keyless authentication contact our [Support team](https://razorpay.com/support/).
        

    
### 5. I am getting the following error message, "Email ID Mismatch." Why?

         This error occurs when there is a discrepancy between the email IDs used in Shopify and Razorpay.

         You can [update the email ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/account-details.md#update-login-email) on Razorpay to match the one used in Shopify. Verify that the email ID associated with owner access on Razorpay matches the one used in Shopify.
        

    
### 6. I get a blank screen when I try to log in to the Razorpay account while integrating/migrating 1 Razorpay, and I am unable to proceed further. How to proceed further?

         A blank screen appears when the email id used to log in to Razorpay doesn't match the email ID registered with owner access on Razorpay. Make sure that you log in using the correct email ID.
        

    
### 7. How do I uninstall Razorpay payment apps from Shopify?

         To uninstall any Razorpay payment app from your Shopify store, follow these steps:
         1. Log in to your Shopify admin panel and navigate to **Settings**→**Payments**.
         2. Click **Add payment methods**.
         3. Click Search by provider and type **Razorpay**. This will show all the Razorpay payment apps installed on your Shopify store. Click the Razorpay app that you wish to uninstall.
            
         4. Scroll down to the bottom and click the **Uninstall** button to remove the app from your Shopify store.
            
         This will successfully uninstall the selected Razorpay payment app from your Shopify store.
        

    
### 8. What should I do if I am confused between legacy and current plugin versions?

         To avoid confusion, uninstall the legacy version of the plugin and [re-install](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md#1-build-integration) the current plugin version (1 Razorpay).
        

    
### 9. Our Payment Gateway stopped displaying after migrating to Shopify. How can we reactivate it?

         After migrating your website to Shopify, you need to integrate with the official Shopify 1 Razorpay plugin, as your previous Payment Gateway integration from the old platform will not be carried over. Follow the [integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md) and once activated, your payment gateway will be displayed at checkout, allowing you to accept payments.
        

## Migration to 1 Razorpay

    
### 10. Why do I need to upgrade to 1 Razorpay?

         Shopify has launched a new payment platform, which requires existing and new payment apps to meet a new set of secure guidelines. Razorpay has built a new app, 1 Razorpay, that complies with these new rules. 
            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Your customers' payments will fail if you do not upgrade to the 1 Razorpay app at the earliest. So, you must upgrade to 1 Razorpay to provide an uninterrupted payment experience to your customers.
>             

        

    
### 11. How do I upgrade to 1 Razorpay?

         You can upgrade to 1 Razorpay by following a simple migration process. Know more about [how to migrate to 1 Razorpay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/migration-steps.md).
        

    
### 12. Who all need to migrate to 1 Razorpay app?

         All Shopify and Shopify Plus merchants must migrate to the 1 Razorpay payments app to continue accepting payments without service disruptions.
        

    
### 13. Who can perform the migration process for 1 Razorpay app?

         Only a Shopify Store Owner or Administrator can complete the migration for a Shopify account. They will need Razorpay account credentials to connect the two applications.
        

    
### 14. What changes for me as a Razorpay merchant after I upgrade to 1 Razorpay?

         Nothing will change for you or your customers if you upgrade to the 1 Razorpay app. If you do not migrate, Razorpay will not appear as a payment option for your customers once the old Razorpay app is deprecated.
        

    
### 15. What if I do not deactivate the older Razorpay plugin?

         If you do not deactivate the older Razorpay plugin, two Razorpay payment gateways will be visible to your customers on your store checkout, which may lead to confusion.
        

## Checkout and Payment Issues

    
### 16. My customer is getting the following error when they make payments on my Shopify store, "There was an issue processing your payment. Try again or use a different payment method." What should I do?

         Your customers may get the following error when making payments. 
            
         Uninstall and reinstall the 1 Razorpay App from your Shopify store to resolve the error. 

         To uninstall the app: 
         1. Open your Shopify store in incognito mode. 
         2. Navigate to **Settings** → **Payments**. Click **Manage on 1 Razorpay**.
         3. Go to **Deactivate 1 Razorpay** and click **Uninstall 1 Razorpay**. This uninstalls the 1 Razorpay app. 

         Follow the [build integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md#1-build-integration) steps to install the plugin again. 

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          Ensure you uninstall and reinstall the app instead of only deactivating it. 
>          

         If your plugin still does not accept payments, contact [Support team](https://razorpay.com/support/).
        

    
### 17. Why is my Shopify checkout showing only Razorpay Direct (cards) instead of all payment methods?

         You might have only integrated with Razorpay Direct - Credit Card Plugin, which supports card payments only. To accept UPI, Netbanking, Wallets and Cards at checkout, you need to [integrate with 1 Razorpay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md), which is Razorpay's full payment gateway app for Shopify.
        

    
### 18. The Razorpay payment option has disappeared from my Shopify checkout after I added another payment provider. Even after removing it, Razorpay does not show up and I see the error "This store can't accept payments right now." What should I do?

         Active payment method customisations typically cause this issue in your Shopify admin. When adding multiple payment providers, these customisations may conflict and prevent Razorpay from appearing at checkout.

         To fix this, follow the steps below:
         1. Navigate to **Shopify Admin** → **Settings** → **Payments** → **Payment Method Customizations**.
         2. **Disable or remove all customizations** listed under this section.
         3. Save the changes and refresh the checkout page.

         Once the payment customizations are removed, the Razorpay payment option should reappear at checkout.

         If the issue persists, contact our [Support team](https://razorpay.com/support/).
        

    
### 19. How can I test a payment for 1 Razorpay on the Shopify store?

         You can test a payment for 1 Razorpay on the Shopify store by switching to test mode. Know more about [how to test a transaction in test mode.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md#21-make-a-test-transaction-in-test-mode)
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             Once you successfully make a test transaction, ensure you uncheck the **Enable test mode** option to accept live payments.
>             

        

    
### 20. After migrating to 1 Razorpay, the checkout option for 1 Razorpay appears at the bottom of the list of gateways. Is it possible to move the Razorpay checkout option to the top of the list of gateways?

         No. It is not possible to rearrange the order payment options via the store settings of the Shopify Dashboard as it is a limitation from Shopify's end.
        

    
### 21. How can I enable automated payment receipts with GST split?

         Razorpay facilitates only payment collection. The partner is solely responsible for sending invoices or payment receipts with GST details to customers. To provide GST-compliant receipts, partners can use [Razorpay Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) product when collecting payments.
        

## Account Management

    
### 22. Can I connect two merchant ids (MIDs) to the same Shopify Store?

         No, currently you can connect only one MID to your Shopify Store. 
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             Make sure you log in using the correct Razorpay merchant id (MID) credentials via the Shopify Dashboard.
>             

        

    
### 23. Can I integrate a second Razorpay account with my Shopify store?

         No, Shopify currently supports only one Razorpay account integration per store. If you want to integrate a different Razorpay account, you need to [deactivate](#7-how-do-i-uninstall-razorpay-payment-apps) the existing integration first and then [activate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md) the new account.
        

    
### 24. I have two ecommerce websites owned by my company. If I connect both websites to my Razorpay account, will the customers be redirected to the correct webpage after payment?

         Yes, when customers pay through Razorpay on either of your connected websites, they will be redirected to the website they purchased from.
        

## Pricing and Settlements

    
### 25. Will I be charged extra for integrating/migrating to 1 Razorpay app?

         No, there will be no additional charges. Your pricing plan will remain the same as earlier.
        

    
### 26. When will my funds be settled?

         Funds will be settled as per the existing settlement schedule. There will be no change to it.
        

## Features and Limitations

    
### 27. Can I enable Subscriptions on my Shopify store?

         No, Shopify does not support Subscriptions. The Ecommerce platforms that support Subscriptions are Woocommerce, Magento, and Open Cart.
        

    
### 28. Does the Shopify 1 Razorpay plugin support 3 or 0 decimal unit currencies?

         The Shopify 1 Razorpay plugin currently supports only currencies that use 2 decimal units. For example: USD, EUR, INR. It does not support currencies with 0 decimal (for example, JPY) or 3 decimal units (for example, BHD).
        

    
### 29. How do I integrate Meta Pixel to accept payments through Meta Ads?

         Razorpay does not provide a direct plugin integration for accepting payments through Meta Ads. However, you can use Razorpay Payment Pages with [Facebook Pixel and Google Tracking ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/plugins-add-ons.md) to track payments and conversions from your Ad campaigns.
        

    
### 30. Can I use Razorpay Route API with my Shopify store?

         No, Razorpay Route API is not supported for Shopify integration. Only the [1 Razorpay plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/integration-steps.md) is supported for Shopify stores.
