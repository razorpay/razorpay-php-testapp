---
title: Integrate Razorpay Magic Checkout on Website
heading: Integrate Magic Checkout on Website
description: Steps to integrate Magic Checkout on your Website.
---

# Integrate Magic Checkout on Website

Follow these steps to integrate the Razorpay Magic Checkout on your website.

#### Prerequisites

- [Create a Razorpay account](https://dashboard.razorpay.com/).
- Generate [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

## Integration Steps

Follow the steps given below:

    
### 1.1 Enable/Disable Magic Checkout and Cash on Delivery

     
       
         Raise a request with your Razorpay SPOC to get this feature enabled on your account.
         Once this feature is enabled, the customer address saving and coupon features are enabled. 
       
       
         Raise a request with our [Support team](https://razorpay.com/support/) to enable this feature for your account.
       
     
    

  
### 1.2 Create Promotions and Shipping Info API Endpoints

     Follow the steps given below to create promotions and shipping info API endpoints: 
     
     
> **WARN**
>
> 
>      **Watch Out!**
>      
>      Ensure that the URLs are publicly accessible, require no authentication and are hosted on your server.
>      

     
     1. Log in to the Dashboard and navigate to **Magic Checkout**.  
     2. In the **Platform Setup**, select **Custom E-Commerce Platform** from the drop-down list and click **Next**.
         ![Choose custom platform](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-custom-platform.jpg.md)
     3. In the **Setup & Settings** section, click **Checkout Settings**. 
     4. In the **Coupon Settings** section, enter the following:
        1. **URL for get promotions**: The API URL should return a list of promotions applicable to the specified order_id and customer. Magic Checkout uses this endpoint to fetch these promotions from your server and display them to your customers in the checkout modal.
        2. **URL for apply promotions**: The API URL validates the promotion code applied by the customer and should return the discount amount. Magic Checkout uses this endpoint to apply promotions via your server.
     5. Click **Save settings**.
        ![Add promotion URLs](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-web-promo-url.jpg.md)
     6. Navigate to **Shipping Setup**.
     7. Select **API** as the Shipping Service type from the drop-down list.
     8. Enter the **URL for shipping info**. The API URL should return shipping serviceability, COD serviceability, shipping fees and COD fees for a given list of customer addresses. Magic Checkout uses this endpoint to retrieve shipping information from your server. 
     9. Click **Save Settings**.
        ![Add shipping URL](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-web-shipping-url.jpg.md)
    

  
### 1.3 Create an Order

     @include magic/order-creation
    

  
### 1.4 Interact with Shipping Info API

     This API should return shipping serviceability, COD serviceability, shipping fees and COD fees for a given list of customer addresses.

     /your-server-url/shipping-info-api-path

     ```curl: Request
     {
      "order_id": "SomeReceiptValue", // This is the receipt field set in the Razorpay order
      "razorpay_order_id": "EKwxwAgItmXXXX", // This is the RZP order created without the `order_` prefix
      "email": "", // Email field will be set if the customer enters an email
      "contact": "+919000090000", // Customer phone number with country code
      "addresses": [{
        "id": "0", 
        "zipcode": "560060",
        "state_code": "KA",
        "country": "IN"
      }]
     }

     ```json: Response
     {
       "addresses": [
         {
           "id": "0",
           "zipcode": "560000",
           "state_code": "KA",
           "country": "IN",
           "shipping_methods": [
             {
               "id": "1",
               "description": "Free shipping",
               "name": "Delivery within 5 days",
               "serviceable": true,
               "shipping_fee": 1000, // in paise. Here 1000 = 1000 paise, which equals to ₹10
               "cod": true,
               "cod_fee": 1000 // in paise. Here 1000 = 1000 paise, which equals to ₹10
             },
             {
               "id": "2",
               "description": "Standard Delivery",
               "name": "Delivered on the same day",
               "serviceable": true,
               "shipping_fee": 1000, // in paise. Here 1000 = 1000 paise, which equals to ₹10
               "cod": false,
               "cod_fee": 0 // in paise. Here 1000 = 1000 paise, which equals to ₹10
             }
           ]
         }
       ]
     }
     ```
     
      
        Request Parameters
        
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#13-create-an-order).

`razorpay_order_id` _mandatory_
: `string` Unique identifier for the order returned by Checkout.

`email` _optional_
: `string` Customer's email address.

`contact` _mandatory_
: `string` Customer's phone number.

`addresses` _mandatory_
: `array` Customer's address details.

  `id` _mandatory_
  : `string` Unique identifier of the customer's address.

  `zipcode` _mandatory_
  : `string` Customer's zipcode.

  `state_code` _optional_
  : `string` The code of the state where the customer resides.

  `country` _mandatory_
  : `string` Country where the customer resides. The length cannot exceed 2 characters.
        

      
### Response Parameters

`addresses` _mandatory_
: `array` Customer's address details.

  `id` _mandatory_
  : `string` Unique identifier of the customer's address.

  `zipcode` _mandatory_
  : `string` Customer's zipcode.

  `country` _mandatory_
  : `string` Country where the customer resides. The length cannot exceed 2 characters.

  `shipping_methods` _mandatory_
  : `array` Details regarding the shipping methods.

    `id` _mandatory_
    : `string` Unique identifier of the shipping method.

    `description`
    : `integer` Brief description of the shipping method.

    `name` _mandatory_
    : `string` Name of the shipping method.

    `serviceable` _mandatory_
    : `boolean` Indicates whether you deliver orders to the  zipcode entered by the customer. This is based on the zipcodes you have added in the serviceability setting on the Razorpay Dashboard. Possible values:
        - `true`: Orders can be delivered to the added zipcodes.
        - `false`: Orders cannot be delivered to the added zipcodes.

    `shipping_fee` _mandatory_
    : `integer` Shipping charge in paise applicable to be paid by the customer.

    `cod` _mandatory_
    : `boolean` Indicates whether you support cash on delivery on this order.
        - `true`: COD payment method is supported.
        - `false`: COD payment method is not supported.

    `cod_fee` _mandatory_ : `integer` Cash on Delivery fee charged in paise. This amount is based on the COD settings configured in your Razorpay Dashboard.

    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     If the `cod` field is false, set the `cod_fee` field to 0.
>     

    
        

     
    
  
  
### 1.5 Interact with Get Promotions API

     This API should return the list of promotions applicable for the given `order_id` and customer.

     /your-server-url/create-promotions-api-path

     ```curl: Request
     {
       "order_id": "SomeReceiptValue", // this is the receipt field set in Razorpay order
       "contact": "+919000090000", 
       "email": ""
     }
     ```json: Response
     {
        "promotions": [
          {
            "code": "10%OFF",
            "summary": "10% off on total cart value",
            "description": "10% on total cart value upto ₹300"
          },
          {
            "code": "500OFF",
            "summary": "₹500 off on total cart value",
            "description": "₹500 off on a minimum cart value of ₹1500"
          }
        ]
      }
     ```
     
      
        Request Parameters
        
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#13-create-an-order).

`contact` _optional_
: `string` Customer's phone number.

`email` _optional_
: `string` Customer's email address.
        

      
### Response Parameters

`promotions` _mandatory_
: `array` Details of the promotions created.

  `code` _mandatory_
  : `string` Unique identifier of the promotion.

  `summary` _mandatory_
  : `string` Summary about the promotion. For example, 10% off on total cart value.

  `description` _optional_
  : `string` Brief description of the promotion. For example, 10% on total cart value upto ₹300.
        

      
### 1.5.1 Interact with Apply Promotions API

         This API should validate the promotion code applied by the customer and return the discount amount.

         /your-server-url/create-promotions-api-path

         ```curl: Request
         {
           "order_id": "SomeReceiptValue", // this is the receipt field set in Razorpay order
           "contact": "+919000090000",
           "email": "",
           "code": "500OFF"
         }

         ```json: Success Response
         {
           "promotion": {
           "reference_id": "3rvff", 
           "type": "offer",
           "code": "500OFF", 
           "value": 50000, 
           "value_type": "fixed_amount", 
           "description": "New Year Sale Offer"
           } 
         }
         ```json: Failure Response
         {
          "failure_code": "LOGIN_REQUIRED",
          "failure_reason": “promotion Code has expired" 
         }
         ```

         
           
             Request Parameters
             
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#13-create-an-order).

`contact` _optional_
: `string` Customer's phone number.

`email` _optional_
: `string` Customer's email address.

`code` _mandatory_
: `string` Promotion code used to avail discount on checkout.
             

           
### Response Parameters

`promotion` _mandatory_
: `object` Used to pass all offer or discount-related information, including promotion code discount, method discount and so on.

  `reference_id` _mandatory_
  : `string` Identifier of the offer you create. 

  `code` _optional_
  : `string` Promotion code used to avail discount on checkout.

  `type` _optional_
  : `string` Type of offer. Possible values: 
    - `coupon`: A discount applied by customers during checkout. For example, customers can use a coupon like `Diwali Sale 500 Off` to get ₹500 off the total cart value.
    - `offer`: A promotion you create for your customers. For example, you create an offer `Buy 4 t-shirts and get 2 free`. In this case, when customers add 4 t-shirts to their cart, the 2 additional t-shirts will be automatically added for free.

  `value` _optional_
  : `integer` The offer value that needs to be applied in paise. For example, if you want to offer a discount of ₹500, enter 50000.

  `value_type` _optional_
  : `string` The type of value like:
    - `fixed_amount`: A fixed amount discount value in the currency of the order. For example, ₹500.
    - `percentage`: A percentage discount value. For example, 10%.
    - `BXGY`: Buy X and Get Y. For example, if you buy 2 t-shirts, you a get a cap for free or at a discounted value.

     
> **INFO**
>
> 
>      **Handy Tips**
>      
>      Regardless of the `value_type`, the amount specified in the `value` parameter is applied as-is. For example, if `value_type` is percentage and the `value` is 5000, 5000 is considered in currency subunits (paise).
>      

     
  `description` _optional_
  : `string` Description of the promotion applied. For example, `New Year Sale Offer`.
             

           
### Error Code, Description and Next Steps

              
              Code | Description | Next Steps
              ---
              INVALID_PROMOTION | The specified promotion code is not recognised or does not exist in the system. | Please verify the code and try again.
              ---
              LOGIN_REQUIRED | This coupon is specifically assigned to a registered customer. | To redeem it, the customer must log in to their account and authenticate their identity.
              ---
              REQUIREMENT_NOT_MET | The current cart conditions do not meet the requirements for this promotion to be valid. For example, the promotion may require a minimum cart value of ₹1,000, but the cart total is ₹800. | Review the promotion's terms and adjust the cart contents accordingly.
              
             

         
        
      
     
    
  
  
### 1.6 Integrate with Magic Checkout on Client-Side

     Add the Pay button on your web page using the handler function or callback URL.

     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      If your website is running on WooCommerce or Shopify, please integrate with the Razorpay [WooCommerce](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/woocommerce.md) or [Shopify](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/shopify.md) plugin based on your requirement.
>      

     
      
       Advanced Checkout Features
       
        Before implementing the basic integration, understand these advanced features available in Magic Checkout:

        
          
            Pre-discount Implementation
            
             Display custom discounts (coupons, gift cards, loyalty points) in the checkout order summary before customers enter the checkout flow:

             For example, customer adds items to cart:
             - T-shirt: ₹499
             - Applies gift card (discount): ₹49  
             - Final amount: ₹450

             You can follow the steps given below:
             1. Create an order with amount 45000 (₹450 in paise).
             2. Add pre-discount in checkout with the following
                - `label`: Gift Card (5AA3Y-E9TZE-82EGJ)
                - `value`: ₹49.
             3. Customer views the discount applied in the checkout and pays ₹450.

             ![View pre-discount on checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-web-pre-discount-checkout.jpg.md)

             ```javascript
             "prefill": {
               "prediscount": [
                 {
                   "label": "Gift Card (5AA3Y-E9TZE-82EGJ)", 
                   "value": "₹49",
                   "gift_card_applied": true  // Required for gift cards
                 }
               ]
             }
             ```

             
> **WARN**
>
> 
>              **Watch Out!**
> 
>              Pre-discounts are for display only and do not affect the payment amount.
> 
>              - No calculations are required. Magic Checkout handles everything automatically.
>              - Payment amount is determined by your Razorpay order, not these display values.
>              - Pre-discounts show existing discounts only and do not apply new ones.
>              

             #### Discount Types

             
              
              Use for coupons, promotional codes, loyalty points: 
               ```javascript
               {
                 "label": "WELCOME20",
                 "value": "₹ 200"
               }
               ```
              
              
               You must include `gift_card_applied: true` for proper tracking and UI display:
               ```javascript
               {
                 "label": "Gift Card (5AA3Y-E9TZE-82EGJ)",
                 "value": "₹ 49",
                 "gift_card_applied": true  // Critical for gift cards
               }
               ```
              
             
            

          
### Promotional Tags

             Add promotional badges to specific products:
             ```javascript
             "prefill": {
               "promotional_tag": [
                 {
                   "tag": "free gift item",
                   "variant_id": "1234"
                 }
               ]
             }
             ```

             Below is an example of a promotional tag:

             ![Checkout promotion tag](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/magic-web-promotion-tag1.jpg.md)
            

         
       
      
     
     
       
### 1.6.1 Handler Function and Callback URL

          
          **Callback URL** | **Handler Function**
          ---
          When you use this: - On successful payment, the customer is redirected to the specified URL, for example, a payment success page.
- On failure, the customer is asked to retry the payment.
 | When you use this: - On successful payment, the customer is shown your web page.
- On failure, the customer is notified of the failure and asked to retry the payment.

          
         

       
### 1.6.2 Code to Add Pay Button

          Copy-paste the parameters as `options` in your code:
          ```html: Callback URL (JS) Checkout Code
          Pay
          
          
          var options = {
              "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
              "one_click_checkout": true,
              "name": "Acme Corp", // your business name
              "order_id": "order_EKwxwAgItmXXXX", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1; mandatory
              "show_coupons": true, // default true; false if coupon widget should be hidden
              "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
              "redirect": "true",
              "prefill": { // We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                  "name": "", // your customer's name
                  "email": "",
                  "contact": "9000090000", // Provide the customer's phone number for better conversion rates
                  "coupon_code": "500OFF" // any valid coupon code that gets auto-applied once magic opens
              },
              "notes": {
                  "address": "ABC Office"
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
              "one_click_checkout": true,
              "name": "Acme Corp", // your business name
              "order_id": "order_EKwxwAgItmXXXX", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
              "show_coupons": true, // default true; false if coupon widget should be hidden
              "handler": function (response){
                  alert(response.razorpay_payment_id);
                  alert(response.razorpay_order_id);
                  alert(response.razorpay_signature)
              },
              "prefill": { // We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
                  "name": "", // your customer's name
                  "email": "", 
                  "contact": "9000090000"  // Provide the customer's phone number for better conversion rates 
              },
              "notes": {
                  "address": "ABC Office"
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
         

       
### Checkout Options

          @include checkout-parameters/magic-checkout
         

     
    
  
  
### 1.7 Verify Payment Signature

     @include integration-steps/verify-signature

     Here are the links to our [SDKs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/#github-and-documentation-links-for-sdks.md) for the supported platforms.
    

  
### 1.8 Verify Payment Status

     Verify the payment status using the APIs and webhooks.
     
       
         You can fetch the payment details using the [Fetch Payments API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/fetch-with-id.md).

          The different payment states are given below:

          
          Payment State | Description
          ---
          `created` | When the customer starts the payment.
          ---
          `pending` | When the customer finally places the order. 
          ---
          `authorized` | The payment moves to the failed state if money is not captured within 45 days. It moves to the captured state when you confirm that the money is received. 
          ---
          `captured` | When you receive the money. 
          ---
          `refunded` | When the refund request is initiated.
          ---
          `failed` | When the payment is failed.
          
       
       
         You should [set up webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md) on the Razorpay Dashboard to receive notifications when certain events occur.

         #### Orders Events

         We recommend you to subscribe to these orders events:

          
          Webhook Event | Description
          ---
          **order.created** | Triggered when an order is successfully created.
          ---
          **order.placed** | Triggered when a COD order is successfully placed.
          ---
          **order.paid** | Triggered when a prepaid order has been successfully completed.
          ---
          **order.expired** | Triggered when an order has expired.
          
         
         #### Payments Events

         We recommend you to subscribe to these payments events:

          
          Webhook Event | Description
          ---
          **payment.pending** | Triggered when a COD payment is moved to pending state. 
          ---
          **payment.captured** | Triggered when a payment is successfully captured.
          ---
          **payment.failed** | Triggered when a payment fails.
          
         
         #### Fulfillment Events
         
         We recommend you to subscribe to these fulfillment events: 

         
         Webhook Event | Description
         ---
         **fulfillment.to_be_shipped** | Triggered when the business needs to act on the order
         ---
         **fulfillment.ready_to_ship** | Triggered when the order needs to be picked by the logistics partner.
         ---
         **fulfillment.in_transit** | Triggered when the order is picked by the logistics partner.
         ---
         **fulfillment.rto** | Triggered when the order is returned to origin because of customer unavailability or decline.
         ---
         **fulfillment.delivered** | Triggered when the order is delivered.
         ---
         **fulfillment.customer_refunded** | Triggered when the order is picked for return as part of the refund. 
         
       
     
    

  
### 1.9 Perform Post Payment Processing

     @include magic/post-payment
    

  
### 1.10 Analytics Integration (Advanced Feature)

    Track customer journey events to understand customer behavior and optimise conversion rates.

    Magic Checkout provides detailed analytics events that help you analyse the checkout funnel and identify optimisation opportunities.

    ```javascript
    // Use the same Razorpay instance for analytics
    var rzp1 = new Razorpay(options);

    // Register analytics event listener
    rzp1.on('mx-analytics', function(data) {
      if (data && data.event) {
        console.log('Analytics Event:', data.event, data);
        
        // Send to your analytics platform
        sendToAnalytics(data);
      }
    });

    function sendToAnalytics(eventData) {
      // Example: Send to Google Analytics
      if (typeof gtag !== 'undefined') {
        gtag('event', eventData.event, {
          'event_category': 'Magic Checkout',
          'event_label': eventData.paymentMode,
          'value': eventData.latestTotal
        });
      }
      
      // Example: Send to your custom analytics
      fetch('/analytics-endpoint', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(eventData)
      });
    }
    ```

    #### Events

    
    Event | Description | Triggered
    ---
    `initiate` | Checkout started | Customer opens checkout modal
    ---
    `otp_initiated` | Phone verification | Customer enters phone number
    ---
    `payment_initiated` | Payment attempt | Customer clicks pay button
    ---
    `checkout_abandoned` | Checkout closed | Customer exits without paying
    ---
    `coupon_applied` | Discount applied | Valid coupon code used
    ---
    `payment_failed` | Payment unsuccessful | Payment attempt fails
    

    Use these examples to implement event tracking and purchase analytics:
    
     
      Track checkout journey events as they occur:

      ```javascript
      rzp1.on('mx-analytics', function(data) {
        switch(data.event) {
          case 'initiate':
            console.log('Checkout opened for amount:', data.totalAmount);
            break;
            
          case 'payment_initiated':
            console.log('Payment started via:', data.paymentMethod);
            break;
            
          case 'payment_failed':
            console.log('Payment failed for order:', data.totalAmount);
            // Show retry message or track failure reasons
            break;
            
          case 'checkout_abandoned':
            console.log('Customer left after:', data.time_since_open, 'milliseconds');
            // Track abandonment funnel for optimisation
            break;
            
          case 'coupon_applied':
            console.log('Coupon applied:', data.couponCode, 'Discount:', data.couponDiscountValue);
            break;
        }
      });
      ```
     
     
      Track successful payment completion in your handler function:

      ```javascript
      "handler": function(response) {
        // Payment successful
        console.log('Purchase completed:', response);
        
        // Track purchase event
        sendToAnalytics({
          event: 'purchase',
          payment_id: response.razorpay_payment_id,
          order_id: response.razorpay_order_id,
          amount: /* your order amount */,
          currency: 'INR'
        });
        
        // Redirect to success page
        window.location.href = '/payment-success?payment_id=' + response.razorpay_payment_id;
      }
      ```
     
    
   

## Go-Live Best Practices

Before going live, make sure to check the following:

- If you configured the above settings in Test Mode, ensure you replicate them in Live Mode.
- Ensure you use API keys generated in Live Mode.
- If you have multiple Razorpay accounts, ensure you use the Live key from the correct account you intend to go live with.

### Related Information
[Troubleshoot and FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/troubleshooting-faqs/#web.md)
