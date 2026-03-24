---
title: Third Party Validation (TPV) on Razorpay Standard Integration
description: Know how to integrate TPV on Razorpay Standard Integration.
---

# Third Party Validation (TPV) on Razorpay Standard Integration

[Third-Party Validation (TPV)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md) of bank accounts is a mandatory requirement for merchants in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. As per Securities and Exchange Board of India (SEBI) guidelines, transactions must be made by the customers **only** from those bank accounts, which are provided when they registered with your business. 

    
### Prerequisites

         Before you integrate TPV on Razorpay Standard integration, you should fulfill the following requirements:
         
         1. Set up your [Razorpay account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md), if you have not done already.
         2. Contact your dedicated support POC to enable the TPV feature for your account.
         3. [Generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) required to authenticate API requests sent to Razorpay servers.
         4. Check the [best practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/best-practices.md).
        

## 1. Build Integration

In the TPV integration flow, Razorpay maps the customers' bank accounts to ensure that the payment is processed only from their registered bank accounts. Follow the steps given below:

    
### 1.1 Collect Investor Bank Account details

         You should collect the bank account details provided by the investor at the time of registration.
        

    
### 1.2 Create an Order

         Pass the investor bank account details to the `bank_account` array of the Orders API. You can choose to make the investor pay using a certain payment method or permit them to choose any of the supported payment method, that is, netbanking, UPI or debit card.

         @include tpv/order-code-no-method

         #### Request and Response Parameters

         Create a request payload using the following attributes:

         @include tpv/order-request-response-parameters
        

    
### 1.3 Add Checkout Code

         Send the `order_id` obtained in the response of the previous step along with the other Checkout attributes to trigger Razorpay Checkout. 

         Following are two sample codes for Checkout:
         
             
                 -  On successful payment, your web page is displayed to the user. 
-  On payment failure, the customer is notified of the reason for failure and requested to retry the payment.

             
             
                 -  On successful payment, the customer is redirected to the specified URL. For example, a payment success page. 
-  On payment failure, the customer is requested to retry payment at Checkout.

             
         

         Copy-paste the form parameters as `options` in your HTML code:
 
         ```html: Checkout with Handler Function
         Pay
         
         
         var options = {
             "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
             "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
             "currency": "INR",
             "name": "Acme Corp",
             "description": "Test Transaction",
             "image": "https://example.com/your_logo",
             "order_id": "order_Dd3Wbag7QXDuuL", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
             "handler": function (response){
                 alert(response.razorpay_payment_id);
                 alert(response.razorpay_order_id);
                 alert(response.razorpay_signature)
             },
             "prefill": {
                 "name": "Gaurav Kumar",
                 "email": "gaurav.kumar@example.com",
                 "contact": "9000090000"
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
         
         ```html: Checkout with Callback URL
         Pay
         
         
         var options = {
             "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
             "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
             "currency": "INR",
             "name": "Acme Corp",
             "description": "Test Transaction",
             "image": "https://example.com/your_logo",
             "order_id": "order_Dd3Wbag7QXDuuL", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
             "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
             "prefill": {
                 "name": "Gaurav Kumar",
                 "email": "gaurav.kumar@example.com",
                 "contact": "9000090000"
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
         
         ```

         Know more about the[ Checkout Form Fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#checkout-options).

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          - The open method of the Razorpay object (`rzp1.open()`) should be invoked by your site's JavaScript. This may or may not be a user-driven action such as a click.
>          - UPI Intent Apps will appear on the standard checkout if the method is `upi` in the Orders API.
>          

        

    
### 1.4 Handle Payment Success and Failure

         The way you handle payment success and failure scenarios depends on the Checkout sample code you opted for in the previous step.

         #### Checkout with Handler Function
 
         If you used **Sample Code with Handler Function**:
 
         
             
                 Investor sees your application web page, and the Checkout returns the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`). You need to collect these and send them to your server.
 
                 ```js: Success Handling Code
                 "handler": function (response){
                 alert(response.razorpay_payment_id);
                 alert(response.razorpay_order_id);
                 alert(response.razorpay_signature)}
                 ```
             
             
                 On payment failure, the investor is notified about the reason for failure and requested to retry the payment.
 
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

                 Know more about[ the error parameters.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md#response-parameters)
             
         

         #### Checkout with Callback URL
 
         If you used the **Sample Code with the Callback URL**:

         
             
                 When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`,`razorpay_order_id` and `razorpay_signature`) is submitted to the Callback URL. Only successful authorisations are auto-submitted.
             
             
                 In case of failed payments, the Checkout Form is displayed again for payment retry.
             
         
        

    
### 1.5 Store Fields in Your Server

         @include integration-steps/store-fields
        

    
### 1.6 Verify Signature

         @include integration-steps/verify-signature
        

## 2. Test Integration

After the integration is complete, a **Pay** button will appear on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test is successful.

You can make test payments using netbanking, card or UPI payment methods configured at the Checkout.

> **WARN**
>
> 
> **Watch Out!**
> 
> This is a mock payment page that uses your test API keys, test card and payment details. 
> - Ensure you have entered only your [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) in the Checkout code. 
> - Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> 

## 3. Go-Live

Consider these steps before taking the integration live.

    
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

         After payment is `authorised`, you need to capture it to settle the amount to your bank account as per the settlement schedule. Payments that are not captured are auto-refunded after a fixed time.

         
> **WARN**
>
> 
> 
>          **Watch Out**
> 
>          - You should deliver the products or services to your customers only after the payment is captured. Razorpay automatically refunds all the uncaptured payments.
>          - You can track the payment status using our [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-a-payment) or webhooks.
>          

         #### How to Capture Payments

         - **Auto-capture payments (recommended)**
         
Authorised payments can be automatically captured. You can auto-capture all payments [using global settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments) on the Dashboard.
         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          Payment capture settings work only if you have integrated with Orders API on your server side. Know more about the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#create-an-order).
>          

         - **Manually capture payments**
         
Each authorised payment can also be captured individually. You can manually capture payments using:
             - [Payment Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment)
             - [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments)

         Know more about [Capture Settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
        

         Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        
    
    
### 3.2 Set Up Webhooks

         @include integration-steps/set-up-webhooks
        

    
      

### Related Information

@include integration-steps/related-info
