---
title: Integration Steps | Go SDK
heading: Integration Steps
description: Integrate your Go-based website with our SDK to start accepting payments using the Razorpay Payment Gateway.
---

# Integration Steps

Start accepting domestic and international payments from customers on your website using the Razorpay Payment Gateway. Razorpay has developed the Standard Checkout method and manages it. You can configure **payment methods, orders, company logo** and also select **custom colour** based on your convenience. Razorpay supports these [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md) and [ international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

![Configure Go integrated payment gateway checkout based on your requirement](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/web-integration-checkout-new.jpg.md)

Watch this video to know how to integrate Razorpay Payment Gateway on your Go-based website.

[Video: https://www.youtube.com/embed/BXr6dGjbGrA]

   
  We recommend you check the Go Sample App, created using the video tutorial.
  

  
  Download the latest [razorpay-go.zip](https://github.com/razorpay/razorpay-go/releases) file from GitHub. It is pre-compiled to include all dependencies.
  

### Project Structure

Before you begin, we recommend you check the Go Sample App, created using the video tutorial, and verify that your project contains the following files:

File | Description
---
main.go | Main class, starts the Gin application.
---
go.mod | Manages project dependencies (adds Razorpay Go SDK).
---
.env | Configures the application.
---
config.go | Loads configuration from environment variables.
---
order.go | Handles server-side order logic (create order, get API key).
---
checkout.go | Handles checkout page rendering.
---
payment.go | Handles server-side payment logic (verify callback).
---
models/order.go | Defines order data structures.
---
index.html | Frontend payment page; initiates Razorpay Checkout via JS.
---
success.html | Displays payment success message to user post-verification.
---
failure.html | Displays payment failure message to user post-verification.

**Before you proceed:**
         

- Create a [Razorpay account](https://dashboard.razorpay.com/signup). 

- Generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

  - **1. Build Integration**: Integrate with your Go-based website.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

### 1. Build Integration 

    
### 1.1 Create an Order in Server

         Order is an important step in the payment process.
         - An order should be created for every payment.
         - You can create an order using the [Orders API](#api-sample-code) in the **app.js** file. It is a server-side API call.  Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) Orders API.  
         - The `order_id` received in the response should be passed to checkout in the **index.html** file. This ties the Order with the payment and secures the request from being tampered.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
>          

         

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          You can capture payments automatically with one-time [Payment Capture setting configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration/go/integration-steps.md#3-go-live-checklist) on the Dashboard.
>          

         

         
             
                 1.1.1 Sample Code
                 
                  Create a file, for example, `main.go` and add the API code given below:

                  ```go: Request
                  client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")
  
                  data := map[string]interface{}{
                  "amount": 50000, // Amount is in currency subunits. 
                  "currency": "",
                  "receipt": "some_receipt_id", 
                  }
                  body, err := client.Order.Create(data, nil)

                  ```json: Response
                  {
                  "id": "order_IluGWxBm9U8zJ8",
                  "entity": "order",
                  "amount": 50000,
                  "amount_paid": 0,
                  "amount_due": 50000,
                  "currency": "",
                  "receipt": "receipt#1",
                  "offer_id": null,
                  "status": "created",
                  "attempts": 0,
                  "notes": [],
                  "created_at": 1582628071
                  }
                  ```

                 

             
### 1.1.2 Request Parameters

                 @include server-integration/request-parameters
                 

             
### 1.1.3 Response Parameters

                  Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) table.
                 

             
### 1.1.4 Error Response Parameters

                  The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#error-response-parameters).
                 

         
        
    
    
### 1.2 Add Checkout Options

         Add the Razorpay Checkout options in your project. For example, if you are using HTML for your frontend, create a page called **app.html** and add the Pay button on your web page using the checkout code and either the callback URL or handler function.

         
             
                 1.2.1 Callback URL or Handler Function
                 
                  
                  **Callback URL** | **Handler Function**
                  ---
                  When you use this: 
-  On successful payment, the customer is redirected to the specified URL, for example, a payment success page. 

-  On failure, the customer is asked to retry the payment.
 | When you use this: 
-  On successful payment, the customer is shown your web page.

-  On failure, the customer is notified of the failure and asked to retry the payment.
 
                  

                  
                 

         
         
             
### 1.2.2 Code to Add Pay Button

                  Copy-paste the parameters as `options` in your code:

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
                  
                  ```html: Callback URL (JS) Checkout Code
                  Pay with Razorpay
                  
                  
                  var options = {
                      "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
                      "amount": "50000", // Amount is in currency subunits. Default currency is . Hence, 50000 refers to 50000 paise
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
                  
                  ```

                  
> **INFO**
>
> 
>                   **Handy Tips**
> 
>                   Test your integration using these [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/server-integration/go/integration-steps.md#2-test-integration).
>                   

                
  
             
### 1.2.3 Checkout Options

                  @include checkout-parameters/standard

                  
> **INFO**
>
> 
>                   **Handy Tips**
> 
>                   The open method of the Razorpay object (`rzp1.open()`) must be invoked by your site's JavaScript, which may or may not be a user-driven action such as a click.
>                   

                 

             
### 1.2.4 Handle Payment Success and Failure

                  The way the Payment Success and Failure scenarios are handled depends on the [Checkout Sample Code](#122-code-to-add-pay-button) you used in the last step.

                  
                      
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
                          

                  
                 
             
             
### 1.2.5 Configure Payment Methods *(Optional)*

                  Multiple payment methods are available on Razorpay Standard Checkout.
                  - The payment methods are **fixed** and cannot be changed.
                  - You can configure the order or make certain payment methods prominent. Know more about configuring payment methods. Know more about [configuring payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).
                 

         
        
    
    
### 1.3 Store Fields in Your Server

         @include integration-steps/store-fields
        

    
### 1.4 Verify Payment Signature

         This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments. 

         To verify the `razorpay_signature` returned to you by the Checkout form:
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

         3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.

         #### Generate Signature on Your Server

         Use the code given below to generate signature on your server:

         ```go: Verify Payment Signature
         import ( razorpay "github.com/razorpay/razorpay-go" )
         client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

         params := map[string]interface{}{
         "razorpay_order_id": "order_IEIaMR65cu6nz3",
         "razorpay_payment_id": "pay_IH4NVgf4Dreq1l",
         }

         signature := "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f";
         secret := "EnLs21M47BllR3X8PSFtjtbd";
         utils.VerifyPaymentSignature(params, signature, secret)
         ```
        

    
### 1.5 Verify Payment Status

         
         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          On the Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
>          

         You can track the payment status in three ways:
         
             
                 To verify the payment status from the Dashboard:

                 1. Log in to the Dashboard and navigate to **Transactions** → **Payments**.
                 2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**. 
                 
                 ![Check if the payment id is generated and the status is captured](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/testpayment.jpg.md)

                 
             
             
                 You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

                 #### Example
                 If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.

                 Given below is the webhook signature verification sample code.

                 ```go: Go
                 /* Go SDK: https://github.com/razorpay/razorpay-go */

                 webhookbody := `{"entity":"event","account_id":"acc_HVFD0PFnHPAzKj","event":"payment.authorized","contains":["payment"],"payload":{"payment":{"entity":{"id":"pay_JUEM4c0pSLpFEW","entity":"payment","amount":12300,"currency":"","status":"authorized","order_id":"order_JUELuT6cFaHkvd","invoice_id":null,"international":false,"method":"netbanking","amount_refunded":0,"refund_status":null,"captured":false,"description":"#JUELZ1z1EC0pwi","card_id":null,"bank":"SBIN","wallet":null,"vpa":null,"email":"","contact":"+919999999999","notes":[],"fee":null,"tax":null,"error_code":null,"error_description":null,"error_source":null,"error_step":null,"error_reason":null,"acquirer_data":{"bank_transaction_id":"6416615"},"created_at":1652339804}}},"created_at":1652339806}`;

                 signature := "56df260ab4647b07b729b0b48d2a95b71de42f109884949e5ec387a2bb8b6919";
                 webhook_secret := "123456";
                 body := utils.VerifyWebhookSignature(webhookbody, signature, webhook_secret)
                 ```
             
             
                 [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments) to check the payment status.
             
         
        

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
