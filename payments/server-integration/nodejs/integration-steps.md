---
title: Integration Steps | Node.js SDK
heading: Integration Steps
description: Integrate your Node.js-based website with our SDK to start accepting payments using the Razorpay Payment Gateway.
---

# Integration Steps

- **Payment Gateway**: Integrate with Razorpay Payment Gateway.

  - **Other Razorpay Products**: Integrate with other Razorpay products using API sample codes.

## Integrate With Razorpay Payment Gateway

Start accepting domestic and international payments from customers on your website using the Razorpay Payment Gateway. Razorpay has developed the Standard Checkout method and manages it. You can configure **payment methods, orders, company logo** and also select **custom colour** based on your convenience. Razorpay supports these [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md) and [international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

Watch this video to know how to integrate Razorpay Payment Gateway on your Node.js app.

   
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

- Generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

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
     - You can create an order using the [Orders API](#api-sample-code) in the **app.js** file. It is a server-side API call.  Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) Orders API.  
     - The `order_id` received in the response should be passed to checkout in the **index.html** file. This ties the Order with the payment and secures the request from being tampered.
     
     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      You can capture payments automatically with one-time [Payment Capture setting configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration/nodejs/integration-steps.md#3-go-live-checklist) on the Dashboard.
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

          Here is the list of parameters for creating an order:

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be 3 characters.

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`first_payment_min_amount` _optional_
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of 7000 is to be received from the customer in two installments of #1 - 5000, #2 - 2000 then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).
          

       
### 1.2.3 Response Parameters

            Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) table.
          

       
### 1.2.4 Error Response Parameters

            The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#error-response-parameters).
          

     
    
  
  
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
>           You can also integrate the Razorpay Checkout with [React.js](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration/nodejs/troubleshooting-faqs.md#3-can-i-integrate-razorpay-checkout-with-reactjs) using the sample code.
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
                    name: 'Gaurav Kumar',
                    email: 'gaurav.kumar@example.com',
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
                  "name": "Gaurav Kumar",
                  "email": "gaurav.kumar@example.com",
                  "contact": "+919876543210"
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
                  "name": "Gaurav Kumar",
                  "email": "gaurav.kumar@example.com",
                  "contact": "+919876543210"
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
>           Test the integration using these [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration/nodejs/integration-steps.md#2-test-integration).
>           

         

       
### 1.3.3 Checkout Options

          `key` _mandatory_
: `string` API Key ID generated from the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is , enter `222250` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

   
> **WARN**
>
> 
>    **Watch Out!**
> 
>    As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>    

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

   
> **INFO**
>
> 
> 
>    **Handy Tips**
> 
>    Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>    

`name` _mandatory_
: `string` Your Business/Enterprise name shown on the Checkout form. For example, **Acme Corp**.

`description` _optional_
: `string` Description of the purchase item shown on the Checkout form. It should start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown on the Checkout form. Can also be a **base64** string if you are not loading the image from a network.

`order_id` _mandatory_
: `string` Order ID generated via [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`prefill`
: `object` You can prefill the following details at Checkout.

   
> **INFO**
>
> 
>    **Boost Conversions and Minimise Drop-offs**
> 
>    - Autofill customer contact details, especially phone number to ease form completion. Include customer’s phone number in the `contact` parameter of the JSON request's `prefill` object. Format: +(country code)(phone number). Example: "contact": "+919000090000".   
>    - This is not applicable if you do not collect customer contact details on your website before checkout, have Shopify stores or use any of the no-code apps.
> 
>    

   `name` _optional_
   : `string` Cardholder's name to be prefilled if customer is to make card payments on Checkout. For example, **Gaurav Kumar**.

   `email` _optional_
   : `string` Email address of the customer.

   `contact` _optional_
   : `string` Phone number of the customer. The expected format of the phone number is `+ {country code}{phone number}`. If the country code is not specified, `91` will be used as the default value. This is particularly important while prefilling `contact` of customers with phone numbers issued outside India. **Examples**:
       - +14155552671 (a valid non-Indian number)
       - +919977665544 (a valid Indian number). 
If 9977665544 is entered, `+91` is added to it as +919977665544.

   `method` _optional_
   : `string` Pre-selection of the payment method for the customer. Will only work if `contact` and `email` are also prefilled. Possible values:
       
       - `card`

       - `netbanking`

       - `wallet`

       - `upi`

       - `emi`

       

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`theme`
: `object` Thematic options to modify the appearance of Checkout.

   `color` _optional_
   : `string` Enter your brand colour's HEX code to alter the text, payment method icons and CTA (call-to-action) button colour of the Checkout form.

   `backdrop_color` _optional_
   : `string` Enter a HEX code to change the Checkout's backdrop colour.

`modal`
: `object` Options to handle the Checkout modal.

   `backdropclose` _optional_
   : `boolean` Indicates whether clicking the translucent blank space outside the Checkout form should close the form. Possible values:
       - `true`: Closes the form when your customer clicks outside the checkout form.
       - `false` (default): Does not close the form when customer clicks outside the checkout form.

   `escape` _optional_
   : `boolean` Indicates whether pressing the **escape** key should close the Checkout form. Possible values:
       - `true` (default): Closes the form when the customer presses the **escape** key.
       - `false`: Does not close the form when the customer presses the **escape** key.

   `handleback` _optional_
   : `boolean` Determines whether Checkout must behave similar to the browser when back button is pressed. Possible values:
       - `true` (default): Checkout behaves similarly to the browser. That is, when the browser's back button is pressed, the Checkout also simulates a back press. This happens as long as the Checkout modal is open.
       - `false`: Checkout does not simulate a back press when browser's back button is pressed.

   `confirm_close` _optional_
   : `boolean` Determines whether a confirmation dialog box should be shown if customers attempts to close Checkout. Possible values:
       - `true`: Confirmation dialog box is shown.
       - `false` (default): Confirmation dialog box is not shown.
  
   `ondismiss` _optional_
   : `function` Used to track the status of Checkout. You can pass a modal object with `ondismiss: function()\{\}` as options. This function is called when the modal is closed by the user. If `retry` is `false`, the `ondismiss` function is triggered when checkout closes, even after a failure.

   `animation` _optional_
   : `boolean` Shows an animation before loading of Checkout. Possible values:
       - `true`(default): Animation appears.
       - `false`: Animation does not appear.

`subscription_id` _optional_
: `string` If you are accepting recurring payments using Razorpay Checkout, you should pass the relevant `subscription_id` to the Checkout. Know more about [Subscriptions on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#checkout-integration).

`subscription_card_change` _optional_
: `boolean` Permit or restrict customer from changing the card linked to the subscription. You can also do this from the [hosted page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/payment-retries.md#update-the-payment-method-via-our-hosted-page). Possible values:
   - `true`: Allow the customer to change the card from Checkout.
   - `false` (default): Do not allow the customer to change the card from Checkout.

`recurring` _optional_
: `boolean` Determines if you are accepting [recurring (charge-at-will) payments on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md) via instruments such as emandate, paper NACH and so on. Possible values:
   - `true`: You are accepting recurring payments.
   - `false` (default): You are not accepting recurring payments.

`callback_url` _optional_
: `string` Customers will be redirected to this URL on successful payment. Ensure that the domain of the Callback URL is allowlisted.

`redirect` _optional_
: `boolean` Determines whether to post a response to the event handler post payment completion or redirect to Callback URL. `callback_url` must be passed while using this parameter. Possible values:
   - `true`: Customer is redirected to the specified callback URL in case of payment failure.
   - `false` (default): Customer is shown the Checkout popup to retry the payment with the suggested next best option.

`customer_id` _optional_
: `string` Unique identifier of customer. Used for:

   - [Local saved cards feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md#manage-saved-cards).
   - Static bank account details on Checkout in case of [Bank Transfer payment method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md).

`remember_customer` _optional_
: `boolean` Determines whether to allow saving of cards. Can also be configured via the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#flash-checkout). Possible values:
   - `true`: Enables card saving feature.
   - `false` (default): Disables card saving feature.

`timeout` _optional_
: `integer` Sets a timeout on Checkout, in seconds. After the specified time limit, the customer will not be able to use Checkout.

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     Some browsers may pause `JavaScript` timers when the user switches tabs, especially in power saver mode. This can cause the checkout session to stay active beyond the set timeout duration.
>     

`readonly`
: `object` Marks fields as read-only.

   `contact` _optional_
   : `boolean` Used to set the `contact` field as readonly. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as readonly. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.
      
   `name` _optional_
   : `boolean` Used to set the `name` field as readonly. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

`hidden`
: `object` Hides the contact details.

   `contact` _optional_
   : `boolean` Used to set the `contact` field as optional. Possible values:
       - `true`: Customer will not be able to view this field.
       - `false` (default): Customer will be able to view this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as optional. Possible values:
       - `true`: Customer will not be able to view this field.
       - `false` (default): Customer will be able to view this field.

`send_sms_hash` _optional_
: `boolean` Used to auto-read OTP for cards and netbanking pages. Applicable from Android SDK version 1.5.9 and above. Possible values:
   - `true`: OTP is auto-read.
   - `false` (default): OTP is not auto-read.

`allow_rotation` _optional_
: `boolean` Used to rotate payment page as per screen orientation. Applicable from Android SDK version 1.6.4 and above. Possible values:
   - `true`: Payment page can be rotated.
   - `false` (default): Payment page cannot be rotated.

`retry` _optional_
: `object` Parameters that enable retry of payment on the checkout.

   `enabled`
   : `boolean` Determines whether the customers can retry payments on the checkout. Possible values:
       - `true` (default): Enables customers to retry payments.
       - `false`: Disables customers from retrying the payment.
  
   `max_count`
   : `integer` The number of times the customer can retry the payment. We recommend you to set this to 4. Having a larger number here can cause loops to occur.
       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        Web Integration does not support the `max_count` parameter. It is applicable only in Android and iOS SDKs.
>        

  
`config` _optional_
: `object` Parameters that enable checkout configuration. Know more about how to [configure payment methods on Razorpay standard checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).
  
   `display`
   : `object` Child parameter that enables configuration of checkout display language.

       `language`
       : `string` The language in which checkout should be displayed. Possible values:
           - `en`: English
           - `ben`: Bengali
           - `hi`: Hindi
           - `mar`: Marathi
           - `guj`: Gujarati
           - `tam`: Tamil
           - `tel`: Telugu

         

       
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
          - You can configure the order or make certain payment methods prominent. Know more about configuring payment methods. Know more about [configuring payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).
         

     
    
  
  
### 1.4 Store Fields in Your Server

     A successful payment returns the following fields to the Checkout form.

  
    Success Callback
    
- You need to store these fields in your server.
- You can confirm the authenticity of these details by verifying the signature in the next step.

```json: Success Callback
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
    

    
  
  
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
        `key_secret` | Available in your server. The `key_secret` that was generated from the  [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).  
        
        
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
>      On the Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
>      

     You can track the payment status in three ways:
     
        
          To verify the payment status from the Dashboard:

          1. Log in to the Dashboard and navigate to **Transactions** → **Payments**.
          2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**. 
          
          

          
        
        
          You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

          #### Example
          If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.

          Given below is the webhook signature verification sample code.

          ```javascript: Node.js
          /* NODE SDK: https://github.com/razorpay/razorpay-node */
          const {validateWebhookSignature} = require('razorpay/dist/utils/razorpay-utils')

          validateWebhookSignature(JSON.stringify(webhookBody), webhookSignature, webhookSecret)
          #webhook_body should be raw webhook request body

          ```
        
        
          [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments) to check the payment status.
        
     
    

### 2. Test Integration 

After the integration is complete, a **Pay** button appears on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test transaction is successful.

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

Following are all the payment modes that the customer can use to complete the payment on the Checkout. Some of them are available by default, while others may require approval from us. Raise a request from the Dashboard to enable such payment methods.

Payment Method | Code | Availability
---
[Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `debit` | ✓
---
[Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `credit` | ✓
---
[Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md) | `netbanking`| ✓
---
[UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md) | `upi` | ✓
---
EMI - [Credit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md), [Debit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md) and [No Cost EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/no-cost-emi.md) | `emi` | ✓
---
[Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md) | `wallet` | ✓
---
[Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md) | `cardless_emi` | Requires [Approval](https://razorpay.com/support).
---
[Bank Transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md) | `bank_transfer` | Requires [Approval](https://razorpay.com/support) and Integration.
---
[Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md) | `emandate` | Requires [Approval](https://razorpay.com/support) and Integration.
---
[Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md)| `paylater` | Requires [Approval](https://razorpay.com/support).

You can make test payments using one of the payment methods configured at the Checkout.

    
### Netbanking

         You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.

         Check the list of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md#supported-banks).
        

    
### UPI

         You can enter one of the following UPI IDs:

         - `success@razorpay`: To make the payment successful. 
         - `failure@razorpay`: To fail the payment.

         Check the list of [supported UPI flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
>          

        

    
### Cards

         You can use the following test cards to test transactions for your integration in Test Mode.

         ### Domestic Cards

         Use the following test cards for Indian payments:

         
         Network | Card Number | CVV & Expiry Date
         ---
         Visa  | 4100 2800 0000 1007 | Use a random CVV and any future date ^^^^^
         ---
         Mastercard | 5500 6700 0000 1002 | 
         ---
         RuPay | 6527 6589 0000 1005 | 
         ---
         Diners | 3608 280009 1007 | 
         ---
         Amex | 3402 560004 01007 | 
         

         #### Error Scenarios

         Use these test cards to simulate payment errors. See the [complete list](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#error-scenario-test-cards) of error test cards with detailed scenarios.
         Check the following lists: 
         - [Supported Card Networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
         - [Cards Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/cards.md).

         ### International Cards

         Use the following test cards to test international payments. Use any valid expiration date in the future in the MM/YY format and any random CVV to create a successful payment.

         
         Card Network | Card Number | CVV & Expiry Date
         ---
         Mastercard | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 | Use a random CVV and any future date ^^
         ---
         Visa | 4012 8888 8888 1881 |
         

         Check the list of [supported card networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
        

    
### Wallet

         You can select any of the listed wallets. After choosing a wallet, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the wallet login portals.

         Check the list of [supported wallets](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).
        

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

         After payment is `authorized`, you need to capture it to settle the amount to your bank account as per the settlement schedule. Payments that are not captured are auto-refunded after a fixed time.

> **WARN**
>
> 
> 
> **Watch Out**
> 
> - You should deliver the products or services to your customers only after the payment is captured. Razorpay automatically refunds all the uncaptured payments.
> - You can track the payment status using our [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-a-payment) or webhooks.
> 

  
    Authorized payments can be automatically captured. You can auto-capture all payments [using global settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments) on the Razorpay Dashboard. Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Payment capture settings work only if you have integrated with Orders API on your server side. Know more about the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
>     

  
  
    Each authorized payment can also be captured individually. You can manually capture payments using [Payment Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments). Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
  

        

    
### 3.3 Set Up Webhooks

         Ensure you have [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) in the live mode and configured the events for which you want to receive notifications.

         
> **WARN**
>
> 
>          **Implementation Considerations**
> 
>          Webhooks are the primary and most efficient method for event notifications. They are delivered asynchronously in near real-time. For critical user-facing flows that need instant confirmation (like showing "Payment Successful" immediately), supplement webhooks with API verification.
> 
>          **Recommended approach** 

>          - Rely on webhooks for all automation, which can be asynchronous.
>          - If a critical user-facing flow requires instant status, but the webhook notification has not arrived within the time mandated by your business needs, perform an immediate API Fetch call ([Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md), [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-with-id.md) and [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds/fetch-specific-refund-payment.md)) to verify the status.
>          

        

## Integrate With Other Razorpay Products

Razorpay offers a range of [payment products](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md) to meet your business requirements. Visit our  [GitHub repository](https://github.com/razorpay/razorpay-node) for the sample codes.

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

[Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration/nodejs/troubleshooting-faqs.md)
