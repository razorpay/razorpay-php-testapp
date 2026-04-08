---
title: Integrate Razorpay Magic Checkout With Shopify Store
heading: Integrate Magic Checkout With Shopify Store
description: Steps to integrate Magic Checkout on your Shopify Store.
---

# Integrate Magic Checkout With Shopify Store

- **Shopify Integration Changelog**: Discover new features, updates and deprecations related to the Shopify Integration with Magic Checkout (since Jan 2024).

  - **Troubleshooting & FAQs**: Troubleshoot common error scenarios and find answers to frequently asked questions about Shopify Integration.

Follow the steps given below to integrate Razorpay Magic Checkout with your Shopify Store.

    
### Video Tutorial

         Watch this video to know how to integrate Razorpay Magic Checkout with your Shopify Store.
         
        

## Prerequisites

Fill in the [form](https://razorpay.typeform.com/to/peQh9Pwx#name=xxxxx) and share the following details:
- Email address
- Mobile number 
- Razorpay MID: You can find your MID on the top-right corner of the Dashboard.
- Razorpay API keys: Generate the [API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard by navigating to **Account & Settings** → **Website and app settings** → **API keys**. 
- If you are a Shopify Native user
- If you offer COD
- 4 digit-Shopify collaborator code:
    1. Log in to the [Shopify Store](https://accounts.shopify.com/store-login) using your admin credentials.
    2. Navigate to **Settings** → **User and permissions**.
    3. Scroll down to the **Collaborators** section and copy the **Collaborator Request Code**.
        
- Test Shopify theme name: Magic Checkout will be enabled on this test theme; you can then publish this on your live theme post-integration.

> **INFO**
>
> 
> **Handy Tips**
> 
> Once you share the above details, it takes a maximum of 48 working hours to enable the feature on your account.
> 

## Integration Steps

Follow the steps given below:

    
### 1. Shopify Dashboard

         1. Log in to the [Shopify Store](https://accounts.shopify.com/store-login) and navigate to **Products**.
         2. Select all the products and click **Include in sales channels**.
             
         3. Select the **Magic Checkout** check box and click **Include products**.
         4. Navigate to **Settings** → **Taxes and duties**.
         5. Scroll down to the **Global settings** section and select the **Include sales tax in product price and shipping rate** check box. Click **Save**.
             
         6. In the **Settings** section, navigate to **Checkout**.
         7. Scroll down to the **Order status page additional scripts** section and add the following code in the **Additional scripts** section:
         ```js
         
         if (((document.getElementById("phone") && document.getElementById("phone").value) || (document.getElementById("email") && document.getElementById("email").value)) && document.getElementById("order_number") && document.getElementById("order_number").value) {
         document.querySelector('form > div.section__content > div > button.btn').click();
         }
         
         ```

         
> **WARN**
>
> 
>          **Watch Out!**
>                     
>          After customers place their order, they are redirected to an order status page confirming the order placement. Shopify adds two fields and a login button for extra security:
> 
>          - Phone number or Email
>          - Order number
> 
>          The above details are prefilled; customers only need to click the login button to view their address, order, and payment confirmation. If the script mentioned above is added, this login will be automated. 
>                     
>          For some users on the Shopify basic plan, the **Additional Scripts** tab is disabled. In this case, customers must manually click the login button.
>          
   
        

    
### 2. Razorpay Dashboard

         1. Log in to the Dashboard.  
         2. Navigate to **Account & Settings**.
         3. In the **Checkout settings** section, you can customise the checkout style and features based on your requirement.
        

## Next Steps

After successfully integrating your Shopify website with Magic Checkout, you can perform the following configurations on the Razorpay Dashboard to suit your business needs:
- [Cash on Delivery](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#cash-on-delivery): Enable COD and configure rules for specific locations, products, and order amounts, catering to customer preferences and logistical needs to increase sales.
- [Partial Cash on Delivery](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#partial-cash-on-delivery): Enable customers to pay a partial order amount online and use cash on delivery for the remaining balance to reduce order cancellation risk.
- [RTO](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#rto): Use automated COD intelligence or manual review to decide whether to offer COD based on customer buying history, thus reducing RTO rates.
- [Convert COD Orders to Prepaid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#convert-cod-orders-to-prepaid): Encourage COD customers to switch to prepaid by offering discounts or incentives, reducing cash handling risks.
- [Shipping Options](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#shipping-options): Set up shipping rates at the product, zone and method levels to optimise costs and improve delivery efficiency.
- [International Shipping](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#international-shipping): Allow customers to enter international PIN codes, expanding your market reach globally.
- [Coupons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#coupons): Provide discounts via coupons to enhance engagement and reduce cart abandonment.
- [Login with Razorpay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#login-with-razorpay): Razorpay Magic SSO (Single Sign-On) offers a seamless login experience, helping you enhance conversions and gain valuable insights into user behaviour.
- [Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#offers): Create prepaid offers that appear on the Magic Checkout payment page, boosting conversions and average order value.
- [Google Analytics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#google-analytics): Integrate Google Analytics for insights into customer behaviour and optimised marketing strategies.
- [Google Ads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#google-ads): Integrate Google Ads to attract more visitors and increase sales.
- [Facebook Ads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#facebook-ads): Integrate Facebook Ads to expand your reach and drive traffic to your store.
- [Gift Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/configuration.md#gift-card-settings): Enable gift card settings to allow multiple gift cards or restrict their combination with coupons or COD, boosting sales through gift purchases.
- [Abandoned Cart Webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/abandoned-cart.md): Track when a customer drops off during the checkout journey and retarget them using their contact information, recovering potentially lost sales.

> **WARN**
>
> 
> **Watch Out!**
> 
> Once the integration is successful:
> - Updates regarding conversions will only be visible in the [Order Analytics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify/order-analytics.md) tab on the Razorpay Dashboard and not in Shopify Analytics.
> - You can edit order details like size, colour, and more on the Razorpay Dashboard using the **Action** tab.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> If you have any queries or are facing issues with the integration, write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com).
> 

### Related Information
[Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/troubleshooting-faqs.md#shopify)
