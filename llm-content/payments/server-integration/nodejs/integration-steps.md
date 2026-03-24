---
title: Integration Steps | Node.js SDK
heading: Integration Steps
description: Integrate your Node.js-based website with our SDK to start accepting payments using the Razorpay Payment Gateway.
---

# Integration Steps

- **Payment Gateway**: Integrate with Razorpay Payment Gateway.

  - **Other Razorpay Products**: Integrate with other Razorpay products using API sample codes.

## Integrate With Razorpay Payment Gateway

Start accepting domestic and international payments from customers on your website using the Razorpay Payment Gateway. Razorpay has developed the Standard Checkout method and manages it. You can configure **payment methods, orders, company logo** and also select **custom colour** based on your convenience. Razorpay supports these [payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods.md) and [ international currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

![Configure node.js integrated payment gateway checkout based on your requirement](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/web-integration-checkout-new.jpg.md)

Watch this video to know how to integrate Razorpay Payment Gateway on your Node.js app.

[Video: https://www.youtube.com/embed/6OyFk8Snb9g]

   
  We recommend you check the Node.js Sample App, created using the video tutorial.
  

  
  Download the latest [razorpay-node.zip](https://github.com/razorpay/razorpay-node/releases/) file from GitHub. It is pre-compiled to include all dependencies.
  

### Project Structure

Before you begin, we recommend you check the Node.js Sample App, created using the video tutorial, and verify that your project contains the following files:

File Name | Purpose
---
index.html | Contains Checkout code.
---
app.js | Contains Orders API and payment verification code.
---
success.html | A page to redirect users once the payment is successful.

**Before you proceed:**
         

- Create a [Razorpay account](https://dashboard.razorpay.com/signup). 

- Generate the [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

  - **1. Build Integration**: Integrate with your Node.js-based website.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

### 1. Build Integration 

  
### 1.1 Instantiate Razorpay

     In your server file, instantiate the Razorpay instance with your `key_id` and `key_secret`. You should generate the API keys on the Dashboard and add them here.

     Given below is the command:

     ```js: Instantiate the Razorpay Instance
     var instance = new Razorpay({
       key_id: 'YOUR_KEY_ID',
       key_secret: 'YOUR_KEY_SECRET',
     });
     ```

     The resources can be accessed using the instance. All the methods invocations follow the namespaced signature:

     ```js: Resource
     // API signature
     // {razorpayInstance}.{resourceName}.{methodName}(resourceId [, params])
     // example

     instance.payments.fetch(paymentId)
     ```

     Every resource method returns a promise.

     ```js: Promise
     instance.payments.all({
       from: '2016-08-01',
       to: '2016-08-20'
     }).then((response) => {
       // handle success
     }).catch((error) => {
       // handle error
     })
     ```

     If you want to use callbacks instead of promises, every resource method accepts a callback function as the last parameter. The callback function acts as **Error First Callbacks**.

     ```js: Callbacks
     instance.payments.all({
       from: '2016-08-01',
       to: '2016-08-20'
     }, (error, response) => {
       if (error) {
         // handle error
       } else {
         // handle success
       }
     })
     ```
    

  
### 1.2 Create an Order in Server

     Order is an important step in the payment process.
     - An order should be created for every payment.
     - You can create an order using the [Orders API](#api-sample-code) in the **app.js** file. It is a server-side API call.  Know how to [authenticate](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) Orders API.  
     - The `order_id` received in the response should be passed to checkout in the **index.html** file. This ties the Order with the payment and secures the request from being tampered.
     
     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      You can capture payments automatically with one-time [Payment Capture setting configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/server-integration/nodejs/integration-steps/#3-go-live-checklist.md) on the Dashboard.
>      

     

     
       
         1.2.1 Sample Code
         
          In the sample app, the **app.js** file contains the code for order creation using Orders API.

          ```nodejs: Request
          const Razorpay = require('razorpay');
          var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

          var options = {
            amount: 50000,  // Amount is in currency subunits. 
            currency: "",
            receipt: "order_rcptid_11"
          };
          instance.orders.create(options, function(err, order) {
            console.log(order);
          });
          ```json: Response
          {
            "id": "order_DBJOWzybf0sJbb",
            "entity": "order",
            "amount": 50000,
            "amount_paid": 0,
            "amount_due": 50000,
            "currency": "",
            "receipt": "order_rcptid_11",
            "status": "created",
            "attempts": 0,
            "notes": [],
            "created_at": 1566986570
          }
          ```

         

       
### 1.2.2 Request Parameters

          @include server-integration/request-parameters
          

       
### 1.2.3 Response Parameters

            Descriptions for the response parameters are present in the [Orders Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/entity.md) table.
          

       
### 1.2.4 Error Response Parameters

            The error response parameters are available in the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders#error-response-parameters.md).
          

     
    
  
  
### 1.3 Add Checkout Options

     Add the Razorpay Checkout options to your project. For example, if you are using HTML for your frontend, create a page called **index.html** and add the Pay button on your web page using the checkout code and either the callback URL or handler function.

     
       
         1.3.1 Callback URL or Handler Function
         
          
          **Callback URL** | **Handler Function**
          ---
          When you use this: 
-  On successful payment, the customer is redirected to the specified URL, for example, a payment success page. 

-  On failure, the customer is asked to retry the payment.
 | When you use this: 
-  On successful payment, the customer is shown your web page.

-  On failure, the customer is notified of the failure and asked to retry the payment.
 
          

          
         

     
     
       
### 1.3.2 Code to Add Pay Button

          Copy-paste the parameters as options in your code:

          
> **INFO**
>
> 
>           **Handy Tips**
> 
>           You can also integrate the Razorpay Checkout with [React.js](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/server-integration/nodejs/troubleshooting-faqs#3-can-i-integrate-razorpay-checkout-with-reactjs.md) using the sample code.
>           

          ```html: Node.js Checkout Code
          
          
          
            
            
            Razorpay Payment
          
          
            Razorpay Payment Gateway Integration
            
              Amount:
              
              Pay Now
            

            
            
              async function payNow() {
                const amount = document.getElementById('amount').value;

                // Create order by calling the server endpoint
                const response = await fetch('/create-order', {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({ amount, currency: '', receipt: 'receipt#1', notes: {} })
                });

                const order = await response.json();

                // Open Razorpay Checkout
                const options = {
                  key: 'YOUR_KEY_ID', // Replace with your Razorpay key_id
                  amount: '50000', // Amount is in currency subunits.
                  currency: '',
                  name: 'Acme Corp',
                  description: 'Test Transaction',
                  order_id: 'order_IluGWxBm9U8zJ8', // This is the order_id created in the backend
                  callback_url: 'http://localhost:3000/payment-success', // Your success URL
                  prefill: {
                    name: '',
                    email: '',
                    contact: '9999999999'
                  },
                  theme: {
                    color: '#F37254'
                  },
                };

                const rzp = new Razorpay(options);
                rzp.open();
              }
            
          
          

          ```html: Callback URL (JS) Checkout Code
          Pay with Razorpay
          
          
          var options = {
              "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
              "amount": "50000", // Amount is in currency subunits. 
              "currency": "",
              "name": "Acme Corp",
              "description": "Test Transaction",
              "image": "https://example.com/your_logo",
              "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
              "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
              "prefill": {
                  "name": "",
                  "email": "",
                  "contact": ""
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
          

          ```html: Handler Function (JS) Checkout Code
          Pay with Razorpay
          
          
          var options = {
              "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
              "amount": "50000", // Amount is in currency subunits. 
              "currency": "",
              "name": "Acme Corp",
              "description": "Test Transaction",
              "image": "https://example.com/your_logo",
              "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
              "handler": function (response){
                  alert(response.razorpay_payment_id);
                  alert(response.razorpay_order_id);
                  alert(response.razorpay_signature)
              },
              "prefill": {
                  "name": "",
                  "email": "",
                  "contact": ""
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
>           **Handy Tips**
> 
>           Test the integration using these [test cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/server-integration/nodejs/integration-steps/#2-test-integration.md).
>           

         

       
### 1.3.3 Checkout Options

          @include checkout-parameters/standard
         

       
### 1.3.4 Handle Payment Success and Failure

          The way the Payment Success and Failure scenarios are handled depends on the [Checkout Sample Code](#132-code-to-add-pay-button) you used in the last step.

          
            
              Checkout with Callback URL
              
                If you used the sample code with the callback URL:

                
                  
                    Razorpay makes a POST call to the callback URL with the **razorpay_payment_id**, **razorpay_order_id** and **razorpay_signature** in the response object of the successful payment. Only successful authorisations are auto-submitted.
                  
                  
                    In case of failed payments, the checkout is displayed again to facilitate payment retry.
                  
                
              

            
### Checkout with Handler Function

                If you used the sample code with the handler function:
                
                  
                    The customer sees your website page. The checkout returns the response object of the successful payment (**razorpay_payment_id**, **razorpay_order_id** and **razorpay_signature**). Collect these and send them to your server.
                  
                  
                    The customer is notified about payment failure and asked to retry the payment.
                  
                

                Use the Success/Failure Handling code given below:

                ```js: Success Handling Code
                "handler": function (response){
                    alert(response.razorpay_payment_id);
                    alert(response.razorpay_order_id);
                    alert(response.razorpay_signature)}
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
              

          
         
       
       
### 1.3.5 Configure Payment Methods *(Optional)*

          Multiple payment methods are available on Razorpay Standard Checkout.
          - The payment methods are **fixed** and cannot be changed.
          - You can configure the order or make certain payment methods prominent. Know more about configuring payment methods. Know more about [configuring payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).
         

     
    
  
  
### 1.4 Store Fields in Your Server

     @include integration-steps/store-fields
    

  
### 1.5 Verify Payment Signature

     This is a mandatory step that allows you to confirm the authenticity of the details returned to the checkout for successful payments.

     To verify the `razorpay_signature` returned to you by the checkout:
     1. Create a signature in your server using the following attributes:
        
        Attribute | Description
        ---
        `order_id` | Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by checkout.
        ---
        `razorpay_payment_id` | Returned during checkout.
        ---
        `key_secret` | Available in your server. The `key_secret` that was generated from the  [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md).  
        
        
      2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct an HMAC hex digest as shown below:

         ```
         generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

             if (generated_signature == razorpay_signature) {
             payment is successful
              }
         ```

      3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the checkout, the payment received is from an authentic source.

         Use the code given below to generate signature on your server:

         ```nodejs: Verify Payment Signature
         var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

         var { validatePaymentVerification, validateWebhookSignature } = require('./dist/utils/razorpay-utils');
         validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);
         ```

         Add the following code in the front-end:

         ```nodejs: Call Signature Validate Method
         var settings = {
           "url": "/api/payment/verify",
           "method": "POST",
           "timeout": 0,
           "headers": {
            "Content-Type": "application/json"
           },
           "data": JSON.stringify({response}),
         }
         ```
    

  
### 1.6 Verify Payment Status

     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      On the Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings.md).
>      

     You can track the payment status in three ways:
     
        
          To verify the payment status from the Dashboard:

          1. Log in to the Dashboard and navigate to **Transactions** → **Payments**.
          2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**. 
          
          ![Check if the payment id is generated and the status is captured](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/testpayment.jpg.md)

          
        
        
          You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md)

          #### Example
          If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.

          Given below is the webhook signature verification sample code.

          ```javascript: Node.js
          /* NODE SDK: https://github.com/razorpay/razorpay-node */
          const {validateWebhookSignature} = require('razorpay/dist/utils/razorpay-utils')

          validateWebhookSignature(JSON.stringify(webhookBody), webhookSignature, webhookSecret)
          #webhook_body should be raw webhook request body

          ```
        
        
          [Poll Payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-multiple-payments.md) to check the payment status.
        
     
    

### 2. Test Integration 

@include integration-steps/next-steps

### 3. Go-live Checklist

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
        

## Integrate With Other Razorpay Products

Razorpay offers a range of [payment products](@/Applications/MAMP/htdocs/new-docs/llm-content/payments.md) to meet your business requirements. Visit our  [GitHub repository](https://github.com/razorpay/razorpay-node) for the sample codes.

#### Partner Authentication

If you are a partner and want to use the API as a particular merchant, you must authenticate your account by passing an additional header `X-Razorpay-Account` with the merchant `account_id` as the value.

#### Example

```
var instance = new Razorpay({
  key_id: '',
  key_secret: '',
  headers: {
    "X-Razorpay-Account": ""
  }
});

instance.orders.all().then(console.log).catch(console.error);
```

### Related Information

[Troubleshooting and FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/server-integration/nodejs/troubleshooting-faqs.md)
