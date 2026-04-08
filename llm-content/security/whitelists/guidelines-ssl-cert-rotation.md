---
title: Guidelines for SSL Certificate Rotation
description: Technical guide for updating Razorpay SSL certificates. Steps for SSL pinning, certificate whitelisting and trust store updates to ensure uninterrupted payment processing.
---

# Guidelines for SSL Certificate Rotation

Razorpay is rotating its SSL certificates as part of regular security maintenance to ensure continued secure communication between your applications and Razorpay's services.  SSL certificate rotation is a standard security practice that involves replacing expiring certificates with new ones to maintain uninterrupted encrypted connections.

Given below are the technical steps required to update SSL certificates for Razorpay integrations.

## Important Information

Certificate Details| Valid From | Expiry | Action Required By
---
[X10.pem](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/certs-x10.pem.md) & [Chain](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/certs-x10-chain.pem.md) | October 9, 2025 | November 10, 2026 | November 24, 2025, 10:00 PM IST

## Prerequisites
Before proceeding, determine if your application uses:

- SSL certificate pinning
- Certificate whitelisting
- Custom certificate trust stores

If you have never manually updated Razorpay certificates in your applications or servers, **no action is required** as your systems will automatically update certificates.

> **INFO**
>
> 
> **No Action Needed for Third-Party Platform Users**
> 
> If you use a third-party platform (WooCommerce, Magento, CS Cart, OpenCart, Shopify, WHMCS, Arastta, Prestashop, WordPress, Easy Digital Downloads, WIX, BigCommerce or Drupal Commerce), you are not required to take any action. The platform handles SSL management. Read [FAQ #4](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists/guidelines-ssl-cert-rotation.md#4-how-do-i-check-whether-i-am) and [FAQ #5](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists/guidelines-ssl-cert-rotation.md#5-if-i-am-using-a-third-party-platform-am) for more details.
> 

## Update Procedures

### SSL Certificate Pinning
If your application has pinned the Razorpay certificate, you must pin the [new certificate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md#ssl-certificates) in addition to the current one.

### Certificate Trust Store Updates
If you have a certificate trust store in the server environment that is not configured to auto-update certificates, you must ensure that the certificate trust store contains the [new certificate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md#ssl-certificates).

Refer to this [manual](https://manuals.gfi.com/en/kerio/connect/content/server-configuration/ssl-certificates/adding-trusted-root-certificates-to-the-server-1605.html) to learn how to update trust stores in different environments.

## Additional Support

If you encounter any difficulties during the process, our support team is here to help:

1. Log in to the Dashboard.
2. Navigate to the **Help & Support** section at the bottom right.
3. Raise a ticket under the **Technical Assistance** category to contact our tech support team.

## FAQs

    
### 1. I have received an email about a certificate change from Razorpay. Am I required to take action?

        You are not required to take action if you have never manually updated our certificate in your applications or servers. Your systems will automatically update the certificate without any intervention.
        

    
### 2. How can you ensure my services remain uninterrupted after Razorpay's certificate rotation?

        You can test connectivity using the endpoint below, which has been updated with our latest certificate: `https://api-ssl-test.razorpay.com`

        
> **WARN**
>
> 
>         **Watch Out!**
>         
>         This is only a test domain and should not be used in production environments.
>         

        

    
### 3. I am a new Razorpay user. Do I need to take any action?

        If you are a new user and have ever updated our certificate on any of your applications or systems manually, you will be required to update it before **November 24, 2025, 10:00 PM IST**, to avoid impact on your payment system. Visit the  [certificates page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md#ssl-certificates) to download the new certificate. Use the X10.pem & Chain Valid From Oct 9th, 2025, Expiry Nov 10th, 2026.
        

    
### 4. How do I check whether I am using a third-party platform such as WooCommerce, Magento, CS Cart, OpenCart, Shopify, WHMCS, Arastta, Prestashop, WordPress, Easy Digital Downloads, WIX, BigCommerce or Drupal Commerce?

        If you are unsure about your integration setup, check if you use a custom admin panel provided by these third-party platforms to add stocks, offers or perform other tasks. If yes, you are using a third-party platform.
        

    
### 5. If I am using a third-party platform. Do I need to take action?

        If you use a third-party platform (WooCommerce, Magento, CS Cart, OpenCart, Shopify, WHMCS, Arastta, Prestashop, WordPress, Easy Digital Downloads, WIX, BigCommerce or Drupal Commerce), you are not required to take any action. The platform handles SSL management.
