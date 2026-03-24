---
title: Standard Checkout - Integration Steps | Razorpay Payment Gateway
heading: Integration Steps
description: Steps to integrate the Standard Checkout form on your website.
---

# Integration Steps

Follow these steps to integrate the Standard Checkout form on your website:

  - **1. Build Integration**: Integrate Web Standard Checkout.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/SFHbcs-lSio]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Create an Order in Server

         Given below are the order states and the corresponding payment states:

         

         Payment Stages | Order State | Payment State | Description
         ---
         Stage I | created | created | The customer submits the payment information, which is sent to Razorpay. The payment is **not processed** at this stage.
         ---
         Stage II | attempted | authorized/failed | An order moves from **created** to **attempted** state when payment is first attempted. It remains in this state until a payment associated with the order is captured.
         ---
         Stage III | paid | captured | After the payment moves to the **captured** state, the order moves to the **paid** state. - No more payment requests are allowed after an order moves to the **paid** state. 
-  The order continues to be in this state even if the payment for this order is **refunded**.

         

         
> **INFO**
>
> 
>          **Capture Payments Automatically**
> 
>          You can capture payments automatically with the one-time [Payment Capture setting configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) on the Dashboard.
>          

         @include integration-steps/order-creation-v2
        

    
### 1.2 Integrate with Checkout on Client-Side

         Add the Pay button on your web page using the checkout code. You can use the handler function or callback URL.

         

         
            
                1.2.1 Handler Function or Callback URL
                
                    

                    **Handler Function** | **Callback URL**
                    ---
                    When you use this: - On successful payment, the customer is shown your web page. 
-  On failure, the customer is notified of the failure and asked to retry the payment.
 | When you use this: - On successful payment, the customer is redirected to the specified URL, for example, a payment success page. 
-  On failure, the customer is asked to retry the payment.

                    
                

         
         
            
### 1.2.2 Code to Add Pay Button

                 Copy-paste the parameters as `options` in your code:

                 ```html: Callback URL (JS) Checkout Code
                 Pay
                 
                 
                 var options = {
                     "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
                     "amount": "50000", // Amount is in currency subunits. 
                     "currency": "",
                     "name": "Acme Corp", //your business name
                     "description": "Test Transaction",
                     "image": "https://example.com/your_logo",
                     "order_id": "order_9A33XWu170gUtm", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                     "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
                     "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                         "name": "", //your customer's name
                         "email": "",
                         "contact": "" //Provide the customer's phone number for better conversion rates 
                     },
                     "notes": {
                         "address": "Razorpay Corporate Office"
                     },
                     "theme": {
                         "color": "#3399cc"
                     }
                 };
                 var rzp1 = new Razorpay(options);
                 document.getElementById('rzp-button1').onclick = function(e){
                     rzp1.open();
                     e.preventDefault();
                 }
                 
                 ```html: Handler Functions (JS) Checkout Code
                 Pay
                 
                 
                 var options = {
                     "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
                     "amount": "50000", // Amount is in currency subunits.
                     "currency": "",
                     "name": "Acme Corp", //your business name
                     "description": "Test Transaction",
                     "image": "https://example.com/your_logo",
                     "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                     "handler": function (response){
                         alert(response.razorpay_payment_id);
                         alert(response.razorpay_order_id);
                         alert(response.razorpay_signature)
                     },
                     "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
                         "name": "", //your customer's name
                         "email": "", 
                         "contact": ""  //Provide the customer's phone number for better conversion rates 
                     },
                     "notes": {
                         "address": "Razorpay Corporate Office"
                     },
                     "theme": {
                         "color": "#3399cc"
                     }
                 };
                 var rzp1 = new Razorpay(options);
                 rzp1.on('payment.failed', function (response){
                         alert(response.error.code);
                         alert(response.error.description);
                         alert(response.error.source);
                         alert(response.error.step);
                         alert(response.error.reason);
                         alert(response.error.metadata.order_id);
                         alert(response.error.metadata.payment_id);
                 });
                 document.getElementById('rzp-button1').onclick = function(e){
                     rzp1.open();
                     e.preventDefault();
                 }
                 
                 ```
                 
                 
> **INFO**
>
>                
> 
>                  **Handy Tips**
> 
>                  Test your integration using these [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#2-test-integration).
>                  

                
             
            
### 1.2.3 Checkout Options

                 @include checkout-parameters/standard

                 
> **INFO**
>
> 
> 
>                  **Handy Tips**
> 
>                  The open method of Razorpay object (`rzp1.open()`) must be invoked by your site's JavaScript, which may or may not be a user-driven action such as a click.
>                  

                

            
### 1.2.4 Errors

                 Given below is a list of errors you may face while integrating with checkout on the client-side.

                 

                 Error | Cause | Solution
                 ---
                 The id provided does not exist. | Occurs when there is a mismatch between the API keys used while creating the `order_id`/`customer_id` and the API key passed in the checkout. | Make sure that the API keys passed in the checkout are the same as the API keys used while creating the `order_id`/`customer_id`.
                 ---
                 Blocked by CORS policy. | Occurs when the server-to-server request is hit from the front end instead. | Make sure that the API calls are made from the server side and not the client side.
                 
                

            
            
### 1.2.5 Configure Payment Methods *(Optional)*

                 Multiple payment methods are available on the Razorpay Web Standard Checkout.
                 - The payment methods are **fixed** and cannot be changed.
                 - You can configure the order or make certain payment methods prominent. Know more about [configuring payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).
                 

            
         
        
    
    
### 1.3 Handle Payment Success and Failure

         The way the Payment Success and Failure scenarios are handled depends on the [Checkout Sample Code](#122-code-to-add-pay-button) you used in the last step.

         ### Checkout with Handler Function

         If you used the sample code with the handler function:

         
             
                 #### On Payment Success

                 The customer sees your website page. The checkout returns the response object of the successful payment (**razorpay_payment_id**, **razorpay_order_id** and **razorpay_signature**). Collect these and send them to your server.
             

             

                 #### On Payment Failure

                 The customer is notified about payment failure and asked to retry the payment. Know about the [error parameters.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md#response-parameters)
                     ```js: Failure Handling Code
                     rzp1.on('payment.failed', function (response){
                         alert(response.error.code);
                         alert(response.error.description);
                         alert(response.error.source);
                         alert(response.error.step);
                         alert(response.error.reason);
                         alert(response.error.metadata.order_id);
                         alert(response.error.metadata.payment_id);
                     }
                     ```
             
         
         ### Checkout with Callback URL

         If you used the sample code with the callback URL:

         
             
                 #### On Payment Success 

                 Razorpay makes a POST call to the callback URL with the **razorpay_payment_id**, **razorpay_order_id** and **razorpay_signature** in the response object of the successful payment. Only successful authorisations are auto-submitted.
             
             
                 #### On Payment Failure

                 In case of failed payments, the checkout is displayed again to facilitate payment retry.
             
         
        

    
### 1.4 Store Fields in Your Server

         @include integration-steps/store-fields
        

    
### 1.5 Verify Payment Signature

         @include integration-steps/verify-signature

         

         Here are the links to our [SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md#client-libraries) for the supported platforms.
         
        

    
### 1.6 Verify Payment Status

         @include integration-steps/verify-payment-status
        

## 2. Test Integration

@include integration-steps/next-steps

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Web Standard Checkout integration. Consider these steps before taking the integration live.

    
### 3.1 Accept Live Payments

         Perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you are switching your test API keys with API keys generated in Live Mode.
> 

To generate API Keys in Live Mode on your Razorpay Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        

    
### 3.2 Payment Capture

         @include integration-steps/capture-settings
        

    
### 3.3 Set Up Webhooks

         @include integration-steps/set-up-webhooks
        

 Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        
    
    
### 3.2 Set Up Webhooks

         @include integration-steps/set-up-webhooks
