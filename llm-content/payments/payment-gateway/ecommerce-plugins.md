---
title: About Ecommerce Plugins
description: Check the list of Razorpay Ecommerce Plugins to integrate with the plugin of your choice and accept payments from your customers.
---

# About Ecommerce Plugins

Integrate seamlessly with ecommerce platforms through our robust and secure plugins. You can accept payments via a range of payment methods like debit cards, credit cards, netbanking (supports 3D Secure), UPI and so on. 

## List of Ecommerce Plugins and Supported Platforms

Following are the various ecommerce plugins and supported platforms:

    

     **Payment Gateway Ecommerce Plugins** provide a convenient checkout experience and expand the payment options available to businesses.

        
        Plugins | Payment Gateway | Route | Subscriptions
        ---
        [Arastta](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/arastta.md) | ✓ | x | x 
        ---
        [BigCommerce](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/bigcommerce.md) | ✓ | x | x 
        ---
        [CS-Cart](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/cs-cart.md) | ✓ | x | x 
        ---
        [Drupal Commerce](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/drupal-commerce.md) | ✓ | x | x 
        ---
        [Easy Digital Downloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/easy-digital-downloads.md) | ✓ | x | x 
        ---
        [Gravity Forms](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/gravity-forms.md) | ✓ | x | x 
        ---
        [ Magento](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/magento.md) | ✓ | x | ✓ 
        ---
        [OpenCart](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/open-cart.md) | ✓ | x | ✓ 
        ---
        [PrestaShop](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/prestashop.md) | ✓ | x | x 
        ---
        [Shopify](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify.md) | ✓ | x | x 
        ---
        [WHMCS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/whmcs.md) | ✓ | x | x 
        ---
        [Wix](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/wix.md) | ✓ | x | x 
        ---
        [WooCommerce](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/woocommerce.md) | ✓ | ✓ | ✓ 
        ---
        [WordPress](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/wordpress.md) | ✓ | x | x 
        
    
    
     **Other Ecommerce Plugins** are in-platform or native plugins, built-in features integrated directly into the e-commerce platform. 
        
        Plugins | Payment Gateway | Route | Subscriptions
        ---
        [Razorpay Direct - Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/razorpay-direct-credit-card.md) | x | x | x 
        ---
        [Shopify - Appmaker](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/shopify-appmaker.md) | x | x | x 
        
    

You can [build your own plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/build-your-own.md) in case the plugin you are looking for is not listed above.

### Frequently Asked Questions

    
### 1. Does Razorpay provide integration support for all ecommerce platforms?

         Razorpay offers official plugins for the following platforms: 

         - Shopify
         - WooCommerce
         - Wix
         - Magento
         - BigCommerce
         - OpenCart
         - PrestaShop
         - WHMCS
         - WordPress
         - Drupal Commerce
         - CS-Cart
         - Arastta
         - Easy Digital Downloads
         - Gravity Forms
         
         For platforms without an official Razorpay plugin, integration support is managed by the respective platform's support team. This ensures you receive the best assistance for platform-specific requirements and configurations.
        

    
### 2. I am using a platform not listed in Razorpay's plugin directory. How do I integrate Razorpay?

         For platforms without an official Razorpay plugin, you have two options: contact your platform's support team to check if they offer Razorpay integration support, or use Razorpay's APIs to [build a custom integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/build-your-own.md).
        

    
### 3. Why am I seeing only a "Pay with Credit/Debit Card" option instead of the full Razorpay Checkout?

         This usually indicates malicious code (malware) injected into your website that is hijacking the checkout. To verify and fix this:
         1. Test your API keys on the Razorpay test page or set up a fresh installation of your ecommerce platform and test the integration there. If checkout loads correctly, the issue is with your current website code.
         2. Run a full malware scan on your website using security tools appropriate for your platform.
         3. Remove any suspicious or recently added plugins/extensions and check theme files for unknown JavaScript code.
         4. After cleanup, reinstall the Razorpay plugin from the official source.

         If the issue persists even after following these steps, contact our [Support team](https://razorpay.com/support/).
        

### Related Information

- [How Payment Gateway Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md)
- [Features](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/features.md)
- [Supported Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md#supported-payment-methods)
