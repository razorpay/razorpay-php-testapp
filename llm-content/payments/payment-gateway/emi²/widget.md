---
title: About Affordability Widget
description: Use the Affordability Widget to influence your customer's purchase decision by displaying various affordable payment options and offers.
---

# About Affordability Widget

Use our Affordability Widget to spread awareness about the EMI²-based payment options (such as EMI, Cardless EMI, and Pay Later) and offers available to your customers before they checkout.

You can embed these payment options and offers on product listing pages, checkout pages, and other relevant screens to educate the customers and reduce cart abandonment.

![Glimpse of the default widget](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/default-widget1-v2.jpg.md)

A quick glimpse of Affordability Widget:
  
    
### On Web

      ![View affordability widget on web](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/affordability-widget-offers.jpg.md)
      

    
### On Mobile

      ![View affordability widget on mobile](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/affordability-widget-mobile.jpg.md)
      

  

> **INFO**
>
> 
> **Handy Tips**
> 
> - For Native users, you can [integrate the widget with checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/features/#checkout-from-widget.md).
> - For Shopify and WooCommerce user, this is a **view-only** widget. 
> - Only **offers** and **payment methods** configured via the Dashboard will appear on the widget.
> - The widget **does not** support Internet Explorer browser and iOS SDKs.
> 

 
  
### Advantages

      - **Initiate checkout from widget** 

        Customers can complete their purchase directly from the widget itself. The auto-selection functionality helps apply the chosen payment option/offer from the widget to the payment checkout page. 

      - **Enable discovery of affordable payment options early on** 

        Customers can discover affordable payment options and payment offers early on in the buying journey and `make an informed buying decision.

      - **Improve conversion rates** 

        The availability of affordable payment options such as [EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi.md) and [Pay Later](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later.md) help boost conversion rates.

      - **Increase Average Order Value** 

        Businesses typically see a 30% higher average order value with affordable payment options.

      - **Stand out from your competitors** 

        Cultivate customer loyalty and establish a distinctive brand identity that distinguishes you from the competition.

      - **Built for every business** 

        Whether you operate in e-commerce, education, healthcare, food and beverage, travel, hospitality, IT, or any other vertical, you can influence customers' purchasing decisions using the Affordability Widget.
    

 ## How Affordability Widget Works 

 The following diagram depicts the workflow:
 ![Know how Affordability Widget works](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/affordability-widget-workflow.jpg.md)

 The workflow involves the following:

 1. Set up your [Razorpay account](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up.md).
 2. Integrate the widget with your [custom built-website](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web.md), [WooCommerce website](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/woocommerce.md) or [Shopify store](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/shopify.md). 
 3. Once you successfully integrate the widget on your website, you can choose to customise the [offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web/customise/#1-offers.md), [payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web/customise/#2-payment-methods.md) and the [themes and colours](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web/customise/#3-themes-and-colours.md) based on your requirement.
 
 ## Customer Experience

 On the product page, the customer:

 1. Views the products on your website or app. 
 2. Clicks **View offers** to check the offers available on the widget.
 3. Clicks **View plans** to choose EMI or Pay Later as the payment option on the widget. 
    ![Glimpse of the default widget](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/default-widget1-v2.jpg.md)
    1. Enters the phone number and clicks **Check** to check their eligibility for payment options. 
    1. Enters the OTP sent to their phone number and clicks **Verify**. Our eligibility check is safeguarded by a secure OTP flow to eliminate the risk of unauthorised access.
        ![Verify phone number for eligibility check](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/aff-widget-eligibility-verify.jpg.md)
    1. They can clearly differentiate between the eligible and ineligible payment options.
        
      - **Eligible**: The customer selects an eligible payment instrument and proceeds to checkout.

      - **Ineligible**: The customer can view the reason for ineligibility as highlighted below.
          ![View reason for ineligibility](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/aff-widget-ineligible.jpg.md)
        To proceed with the payment in case of ineligibility, the customer can choose to:
        - Change the phone number for the chosen payment instrument and try again. 
        - Opt for an eligible payment instrument. 

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     [Eligibility Check on Widget](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/features/#eligibility-check.md) is an on-demand feature. Write to us at [ affordability-widget@razorpay.com](mailto:affordability-widget@razorpay.com) to get this feature enabled.
>     

 4. Chooses an eligible payment instrument or a relevant offer and clicks **Buy Now**. 

 5. They are redirected to your checkout page, where they enter their contact and address details and proceed to checkout.
 
 6. The customer is redirected to the Razorpay checkout if you have integrated the widget with our [Standard Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/standard-integration.md). If not, they are redirected to your custom-built checkout. Once redirected to our Standard Checkout, the payment option or offer the customer selects on the widget appears pre-selected on checkout. 

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     - [Checkout from the Widget](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/features/#checkout-from-widget.md) is an on-demand feature. Write to us at [ affordability-widget@razorpay.com](mailto:affordability-widget@razorpay.com) to get this feature enabled.
>     - If you have a [custom-built checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md), integrate with checkout from the widget using [Custom Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/custom-integration.md).
>     

 7. They enter the relevant details and complete the payment. 
    ![Initiate checkout from widget](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/aff-widget-checkout1.jpg.md)

 
> **WARN**
>
> 
>  **Watch Out!**
> 
>  For Shopify and WooCommerce users, this is a view-only widget. Customers can select their preferred offer and plan **only** at checkout.
>  

      
 ## Supported Platforms

 Razorpay Affordability Widget is supported on the following platforms:

  
    
    DWeb | MWeb | Android | iOS
    ---
    ✓ | ✓ | ✓ | x
    
  
  
    
    DWeb | MWeb | Android | iOS
    ---
    ✓ | ✓ | ✓ | x
    
  

 ## Next Steps 

 You can choose to: 
 - [Integrate Affordability Widget on Web](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web.md)
 - [ Integrate Affordability Widget on Woocommerce website](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/woocommerce.md)
 - [Integrate Affordability Widget on your Shopify store](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/shopify.md) 
 - [Integrate Affordability Widget on Android App](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/android.md)

 ### Related Information
 
 - [Features](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/features.md)
 - [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/faqs.md)
 - [Customise the Widget on Web](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web/customise.md)
 - [ Customise the Widget on WooCommerce](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/woocommerce/customise.md)
 - [Customise the Widget on Shopify](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/shopify/customise.md)
 - [Create Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers/create.md)
 - [Create No Cost EMI Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers/no-cost-emi/create.md)
 - [Create Low Cost EMI Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers/low-cost-emi/create.md)
 - [Payment Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/#payment-methods.md)
