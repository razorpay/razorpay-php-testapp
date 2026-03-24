---
title: Integrate Checkout From Widget | Server-to-Server (S2S) Integration
heading: Integrate Checkout From Widget
description: Integrate Checkout from Affordability Widget using S2S and allow your customers to complete their purchase directly from the widget.
---

# Integrate Checkout From Widget

Integrate Checkout from Affordability Widget using S2S and provide customers with a direct and convenient avenue to complete their purchases within the widget itself. This helps businesses improve conversion rates and eliminate any friction or unnecessary steps in the buying process. 

> **WARN**
>
> 
> **Watch Out!**
> 
> - This is an on-demand feature. Write to us at [ affordability-widget@razorpay.com](mailto:affordability-widget@razorpay.com) to get this feature enabled on your account.
> - This feature is only supported on [Native Website](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/widget/native-web.md) integration.
> 

    
### Advantages

         - **Improved Conversion Rates** 
 
         The improved Affordability Widget simplifies the checkout process, leading to more customers completing their purchases and thus higher conversion rates.

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

       // Perform redirection to the cart page or any other preferred location as per your website’s checkout journey
     }
     ```
        
        
> **INFO**
>
> 
>         **Handy Tips**
>       
>         - Consider storing the prefill data as a component state if you use a frontend framework like React.
>         - Alternatively, you can store it in `localstorage` or use any other storage method.
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
     : `string` The currency in which the customer should make the payment. Check the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

     `checkout_callback` _mandatory_ 
     : `string` Customers are redirected to this URL.
    

  
### 1.3 Retrieve and Decode Option Selected

     Before opening the payment checkout for your customer with the selected option on the widget, retrieve `affordabilityWidgetPrefill` from your global store/localstorage or anywhere you stored it and decode it using the below function. 

     ```js: JavaScript
     function decodeAffordabilityWidgetPrefill(encodedPrefill) {
     const decodedPrefill = window.atob(encodedPrefill);

     return JSON.parse(decodedPrefill);
     }
     ```json: Card EMI Response
     {
       "method": "emi",
       "type": "debit",
       "issuer": "HDFC",
       "provider": null,
       "duration": 6,
       "offer_id": null
     }
     ```json: Cardless EMI Response
     {
       "method" :"cardless_emi",
       "type": null,
       "issuer" : null,
       "provider": "axio",
       "duration": 6,
       "offer_id": null
     }
     ```json: Pay Later Response
     {
       "method" :"paylater",
       "type": null,
       "issuer" : null,
       "provider": "simpl",
       "duration": null,
       "offer_id": null
     }
     ```json: Offer Response
     {
       "offer_id": "offer_JHD834hjbxzhXXXX",
       "method" : null,
       "type": null,
       "issuer" : null,
       "provider": null,
       "duration": null,
     }
     ```
     
     ### Response Parameters

     `method` 
     : `string` Payment methods on which eligibility check is required. It is mandatory if the `offer_id` is null. Possible values:
         - `emi`
         - `cardless_emi`
         - `paylater`

     `issuers`
     : `string` List of EMI issuers. Possible value is `HDFC`.

     `type`
     : `string` Type of card. Possible value:
         - `debit`
         - `credit`
    
     `provider` 
     : `string` List of Cardless EMI providers. Possible values for `cardless_emi`:
         - `hdfc`
         - `icic`
         - `idfb`
         - `kkbk`
         - `earlysalary`
         - `walnut369`

         List of Pay Later providers. Possible values for `paylater`:
         - `lazypay`
         - `paypal`
     
     `duration`
     : `number` EMI tenure selected by the customer on the widget. 

     `offer_id`
     : `string` Unique identifier of the offer the customer selects on the widget. It is mandatory if the `method` is null.
    

  
### 1.4 Initiate Payment Checkout with Option Selected

     Pre-select the payment option or `offer_id` on your payment page so the customer can complete the payment.
