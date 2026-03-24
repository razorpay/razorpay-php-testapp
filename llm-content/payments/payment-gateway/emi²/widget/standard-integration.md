---
title: Integrate Checkout From Widget | Standard Integration
heading: Integrate Checkout From Widget
description: Integrate Checkout from Affordability Widget using Standard Integration and allow your customers to complete their purchase directly from the widget.
---

# Integrate Checkout From Widget

Integrate Checkout from Affordability Widget using Standard Integration and provide customers with a direct and convenient avenue to complete their purchases within the widget itself. This helps businesses improve conversion rates and eliminate any friction or unnecessary steps in the buying process. 

> **INFO**
>
> 
> **Handy Tips**
> 
> If you have a [custom-built checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md), integrate with checkout from widget using [Custom Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/custom-integration.md).
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> - This is an on-demand feature. Write to us at [ affordability-widget@razorpay.com](mailto:affordability-widget@razorpay.com) to get this feature enabled on your account.
> - This feature is only supported on [Native Website](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web.md) integration.
> 

    
### Advantages

         - **Improved Conversion Rates** 
 
         The improved Affordability Widget simplifies the checkout process, leading to more customers completing their purchases, resulting in higher conversion rates.

         - **Frictionless Customer Experience** 
 
         The widget provides a seamless and hassle-free experience, boosting customer confidence and encouraging them to finalise their purchases easily.

         - **Auto-Selection Convenience** 
 
         The widget's auto-selection functionality automatically applies the chosen payment option or offer to the checkout, reducing confusion and making the process more convenient.
        

## Prerequisites

## Integration Steps

Follow the integration steps given below on your website:

  
### 1.1 Define Checkout Callback Function

     Define a callback function that receives the `affordabilityWidgetPrefill` as an argument. This function is invoked when the customer clicks the **Buy Now** button on the widget.

     The prefill data is a string that contains the payment instrument details or `offer_id` used to invoke checkout from the widget. You can use any custom logic to save this data for the future. After saving the prefill data, you can seamlessly initiate your website’s checkout process and redirect the customer to the preferred location as per your website’s checkout journey.

     ```js: JavaScript
     function checkoutCallback(affordabilityWidgetPrefill) {
       // Your logic to save affordabilityWidgetPrefill 

       // Perform redirection to cart page or any other preferred location as per your website’s checkout journey
     }
     ```
        
       
> **INFO**
>
> 
>        **Handy Tips**
>       
>        - Consider storing the prefill data as a component state if you use a frontend framework like React.
>        - Alternatively, you can store it in `localstorage` or use any other storage method.
>        

    

  
### 1.2 Pass Function in Affordability Widget Configuration

     Pass the callback function [previously defined](#11-define-checkout-callback-function) to `widgetConfig` as `checkout_callback`, when initialising Razorpay Affordability Widget. 

     ```js: JavaScript
     window.addEventListener('DOMContentLoaded', () => {
         const widgetConfig = {
             key: 'YOUR_KEY_ID', // Replace it with your live Key ID generated from Razorpay Dashboard
             amount: 400000, // Amount in paise
             currency: 'INR', 
             checkout_callback: checkoutCallback // new
         };

         const rzpAffordabilityWidget = new RazorpayAffordabilitySuite(widgetConfig);
         rzpAffordabilityWidget.render();
     });
     ```

     `key` _mandatory_
     : `string` API Key ID generated from the Dashboard.

     `amount` _mandatory_
     : `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `50000`.

     `currency` _mandatory_
     : `string` The currency in which the customer should make the payment. Check the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

     `checkout_callback` _mandatory_ 
     : `function` The callback function is called when the user clicks the Buy button on the widget. This function receives `affordabilityWidgetPrefill` as an argument. 
    

  
### 1.3 Initiate Payment Checkout with Option Selected

     Before opening the payment checkout for your customer with the selected option on the widget, retrieve `affordabilityWidgetPrefill` from your global store/localstorage or anywhere you stored it and pass it in the checkout options that you use to open Razorpay Standard Checkout.

     ```js: JavaScript
     Pay
     
       // new
     
       var options = {
         "key": "YOUR_KEY_ID", 
         "amount": "400000", 
         "currency": "INR"
         // ... other options
       };
       options = RazorpayAffordabilitySuite.addPrefillToCheckoutOptions(options, affordabilityWidgetPrefill); // new
       var rzp1 = new Razorpay(options);
       document.getElementById('rzp-button1').onclick = function(e){
         rzp1.open();
         e.preventDefault();
       }
     
     ```
