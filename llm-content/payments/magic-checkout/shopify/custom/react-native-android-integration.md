---
title: Integrate Razorpay Magic Checkout on React Native Android App - Shopify
heading: Integrate Magic Checkout on React Native Android App - Shopify
description: Steps to integrate Magic Checkout on your React Native Android app using the Razorpay React Native Android Standard SDK - Shopify integration.
---

# Integrate Magic Checkout on React Native Android App - Shopify

Follow these steps to integrate the Razorpay Magic Checkout on your React Native Android application when using Shopify as your e-commerce platform.

## Prerequisites

- Ensure you enable [Magic Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/troubleshooting-faqs/#3-how-do-i-check-if-magic-checkout.md) on your account.
- Integrate [Magic Checkout With Shopify Store](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/shopify.md).
- Integrate with [React Native: Android Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/react-native-android-integration.md).
- Generate [Live API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/#api-keys.md) from the Dashboard.

> **INFO**
>
> 
> **Handy Tips**
> 
> The **compileSdkVersion** is the version of Android. Increase the value of **minSdkVersion** to at least 19 in the build.gradle file in the Android folder to work with the latest Android SDK Build Tools version. Using it with a lower **minSdkVersion** version will lead to errors.
> 

  - **1. Build Integration**:  Integrate with React Native Android App for Shopify.

  - **2. Test Integration**: Test the integration by making a test payment.

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Create a Checkout id

     Generate a unique cart identifier to initiate the Magic Checkout process.
     
     
> **INFO**
>
> 
>      **Important**
>      
>      Ensure you create the Shopify cart before making this request as the cart token must be included in the payload.
>      

     /magic/checkout/shopify?key_id=rzp_live_XXXXXX

     ```curl: Request
     curl -X POST https://api.razorpay.com/v1/magic/checkout/shopify?key_id=rzp_live_XXXXXX \
       -H "Content-Type: application/json" \
       -H "Accept: application/json" \
       -d '{
         "cart": {
           "token": "ashgad?key=abasab",
           "note": null,
           "attributes": {},
           "item_count": 1,
           "items": [
             {
               "id": 100000000001,
               "quantity": 1,
               "product_id": 832938123321,
               "variant_id": 100000000001,
               "properties": {}
             }
           ]
         }
       }'
     ```json: Response
     {
       "shopify_checkout_id": "gid://shopify/Cart/ashgad?key=abasab",
       "tax_details": {
         "total_tax": 0,
         "taxes_included": true
       }
     }
     ```

     
        
            Request Parameters
            
`cart` _mandatory_
: `object` Complete cart object from Shopify.

`cart.token` _mandatory_
: `string` Unique cart token from Shopify cart creation.

`cart.note` _optional_
: `string|null` Customer notes or special instructions.

`cart.attributes` _optional_
: `object` Custom attributes for the cart (key-value pairs).

`cart.item_count` _mandatory_
: `integer` Total number of items in the cart.

`cart.items` _mandatory_
: `array` Array of cart items.

`cart.items[].id` _mandatory_
: `integer` Unique item identifier.

`cart.items[].quantity` _mandatory_
: `integer` Quantity of the item.

`cart.items[].product_id` _mandatory_
: `integer` Shopify product identifier.

`cart.items[].variant_id` _mandatory_
: `integer` Shopify variant identifier.

`cart.items[].properties` _optional_
: `object` Custom item properties.
            

        
### Response Parameters

`shopify_checkout_id`
: `string` Unique checkout identifier for Shopify integration.

`tax_details`
: `object` Tax information for the checkout.

    `total_tax`
    : `integer` Total tax amount in smallest currency unit (paise).

    `taxes_included`
    : `boolean` Whether taxes are included in item prices. Possible values:
      - `true`: Taxes are included in item prices.
      - `false`: Taxes are separate from item prices.

     
    
  
  
### 1.2 Create Order id on Server

     Create a Razorpay order id required for the payment modal. This API requires the `shopify_checkout_id` from [Step 1.1](#11-create-a-checkout-id).
     
     /magic/order/shopify?key_id=rzp_live_XXXXXX

     ```curl: Request
     curl -X POST https://api.razorpay.com/v1/magic/order/shopify?key_id=rzp_live_XXXXXX \
       -H "Content-Type: application/json" \
       -H "Accept: */*" \
       -H "Origin: https://api.razorpay.com" \
       -d '{
         "shopify_checkout_id": "gid://shopify/Cart/ashgad?key=abasab",
         "ga_id": "GA1.1.xxxxxxx.xxxxxxxx",
         "fb_analytics": {
           "external_id": "unique_fb_external_id",
           "fbp": "fb.1.xxxxxxx.xxxxxxxx",
           "fbc": "",
           "event_source_url": "https://your-store.com/"
         },
         "utm_parameters": {
           "landing_page_url": "https://your-store.com/",
           "user_agent": "Mozilla/5.0 (Linux; Android 12; SM-G991B)..."
         },
         "analytics": {
           "fb_analytics": {
             "external_id": "unique_fb_external_id",
             "fbp": "fb.1.xxxxxxx.xxxxxxxx",
             "fbc": ""
           },
           "ga4": {
             "session_ids": {
               "_ga_XXXXXXXXXX": "GS1.1.xxxxxxxx.x.x.x.x.x"
             },
             "client_id": "GA1.1.xxxxxxxx.xxxxxxxx"
           },
           "google_ads": {
             "gclid": "",
             "wbraid": "",
             "gbraid": ""
           },
           "source_url": "https://your-store.com/"
         }
       }'
     ```json: Response
     {
       "preferences": null,
       "order_id": "order_EKwxwAgItmmXdp"
     }
     ```

     
        
            Request Parameters
            
`shopify_checkout_id` _mandatory_
: `string` Checkout id from [Step 1.1](#11-create-a-checkout-id).

`ga_id` _optional_
: `string` Google Analytics client identifier.

`fb_analytics` _optional_
: `object` Facebook Analytics parameters.

    `external_id` _optional_
    : `string` Unique external id for Facebook tracking.

    `fbp` _optional_
    : `string` Facebook browser pixel id.

    `fbc` _optional_
    : `string` Facebook click id.

    `event_source_url` _optional_
    : `string` Source URL for the event.

`utm_parameters` _optional_
: `object` UTM tracking parameters.

    `landing_page_url` _optional_
    : `string` Landing page URL.

    `user_agent` _optional_
    : `string` Browser user agent string.

`analytics` _optional_
: `object` Comprehensive analytics data.

    `fb_analytics` _optional_
    : `object` Facebook Analytics configuration.

        `external_id` _optional_
        : `string` Unique external id for Facebook tracking.

        `fbp` _optional_
        : `string` Facebook browser pixel id.

        `fbc` _optional_
        : `string` Facebook click id.

    `ga4` _optional_
    : `object` Google Analytics 4 configuration.

        `session_ids` _optional_
        : `object` GA4 session identifiers.

        `client_id` _optional_
        : `string` GA4 client identifier.

    `google_ads` _optional_
    : `object` Google Ads tracking parameters.

        `gclid` _optional_
        : `string` Google Click Identifier.

        `wbraid` _optional_
        : `string` Web-to-app measurement parameter.

        `gbraid` _optional_
        : `string` Google Ads Broad match parameter.

    `source_url` _optional_
    : `string` Source URL for analytics.
            

        
### Response Parameters

`preferences`
: `object|null` Customer preferences. Returns `null` if no preferences are set.

`order_id`
: `string` Unique Razorpay order identifier. For example, `order_EKwxwAgItmmXdp`.
            

     
    
  
  
### 1.3 Install Razorpay React Native SDK

     Install the SDK using the following `npm` command in the **Terminal** window. If you are using Windows, use **Git Bash** instead of the **Command Prompt** window. Ensure you run this code within your React Native project folder in the **Terminal** window. 

     ```node:Installation Code
     //using npm
     $ npm install react-native-razorpay --save
     ```

     Additionally, run the code given below if you are using `yarn` or `expo`:

     ```node:Installation Code using yarn 
     // using yarn
     $ yarn add react-native-razorpay
     ```

     ```node:Installation Code using expo
     // for expo
     $ npx expo install react-native-razorpay
     ```
    

  
### 1.4 Run React Native App

     Run the React Native app.

     ```node: Run
     npx react-native run-android
     ```

     This links the SDK with your React Native project.

     
      
        Expo Application
        
         After adding the `react-native-razorpay` package, use the option to prebuild the app. This generates the **android** platform folders in the project to use native-modules. 

         ```node: Run
         npx expo prebuild
         ```

         The application is installed on the device/emulator.

         ```node:
         npx expo run:[android] --device
         ```
        

     
    
  
  
### 1.5 Coupon Handling

     Since this is an SDK integration, Shopify coupons will not auto-apply like they do on the website. You must explicitly pass coupon codes to Magic Checkout. When initialising Magic Checkout, include the coupon code in the prefill options:

     ```javascript
     const options = {
       key: 'rzp_live_XXXXXX',
       order_id: 'order_EKwxwAgItmmXdp',
       // ... other options
       
       prefill: {
         coupon_code: 'MY_COUPON_NAME',  // Coupon from your cart to auto-apply
       },
     };

     // Initialize Magic Checkout with options
     MagicCheckout.open(options);
     ```

     Your app captures the coupon applied on the cart page, then passes the coupon code in the `prefill.coupon_code` field. The SDK internally calls `applyCoupon('MY_COUPON_NAME')`, and if the coupon is valid, it is automatically applied in Magic Checkout.
    

  
### 1.6 Add Razorpay Checkout Options to .js File

     To integrate the Razorpay Checkout with your React Native app, you must add the Checkout Display Options in the **.js** file.

     Open the **.js** file in your project folder and perform the following:

     1. Import the `RazorpayCheckout` module to your component.

           ```js: Import Razorpay Checkout Module
           import RazorpayCheckout from 'react-native-razorpay';
           ```

     2. Call the `RazorpayCheckout.open` method with the payment options. The method returns a JS Promise where the `then` part corresponds to a successful payment and the `catch` part corresponds to payment failure.

     Add the following code: 

     ```Javascript: Checkout Options
      {
         var options = {
         description: 'Credits towards consultation',
         image: 'https://i.imgur.com/3g7nmJC.jpg',
         currency: '',
         key: '',
         amount: '5000',
         name: 'Acme Corp',
         order_id: 'order_EKwxwAgItmmXdp',//Replace this with order_id from Step 1.2
         prefill: {
           email: '',
           contact: '',
           name: '',
           coupon_code: 'MY_COUPON_NAME' // Coupon from your cart to auto-apply (as explained in Step 1.6)
         },
         show_coupons: true, // magic checkout
         theme: {color: '#53a20e'}
       }
       RazorpayCheckout.open(options).then((data) => {
         // handle success
         alert(`Success: ${data.razorpay_payment_id}`);
       }).catch((error) => {
         // handle failure
         alert(`Error: ${error.code} | ${error.description}`);
       });
     }}>
     ```

     
        
            Checkout Options
            
             @include checkout-parameters/magic-sdk

             You must pass these parameters in Checkout to initiate the payment.

             
> **WARN**
>
> 
> 
>              **Watch Out!**
> 
>              To support theme colour in the progress bar, please pass HEX colour values only.
>              

            

     
    
  
  
### 1.7 Perform Post Payment Processing

     @include magic/post-payment
    

  
### 1.8 Complete Checkout Call

     After a successful payment, call the complete checkout API to create the order in Shopify. You must make the call from the callback handler implemented when importing the react SDK. Ensure you redirect the user to the `order_status_url` to show them the order success page on Shopify.

     /1cc/shopify/complete?key_id=rzp_live_XXXXXX

     ```curl: Request
     curl -X POST https://api.razorpay.com/v1/1cc/shopify/complete?key_id=rzp_live_XXXXXX \
       -H "Content-Type: application/json" \
       -H "Accept: application/json" \
       -d '{
         "razorpay_payment_id": "pay_Rk3b76fSqXXXXX",
         "razorpay_order_id": "order_Rk3UmCXXW5XXXX"
       }'
     ```json: Response
     {
       "id": 65157213390123,
       "order_id": "#32697",
       "payment_id": "pay_Rk3b76fSqXXXXX",
       "payment_method": "netbanking",
       "payment_currency": "",
       "total_amount": 659430,
       "total_tax": "543.91",
       "shipping_fee": 700,
       "cod_fee": 0,
       "promotions": [
         {
           "reference_id": "Auto Order Amount Discount",
           "code": "Auto Order Amount Discount",
           "type": "automatic",
           "value": 100000,
           "source": "shopify"
         }
       ],
       "shipping_country": "in",
       "customer_details": {
         "email": "",
         "contact": "",
         "shipping_address": {
           "name": "",
           "line1": "123 Main Street",
           "city": "Bengaluru",
           "state": "KARNATAKA",
           "zipcode": "560049",
           "country": "in"
         }
       },
       "order_status_url": "https://your-store.myshopify.com/orders/...",
       "is_new_customer": false
     }
     ```

     
        
            Request Parameters
            
`razorpay_payment_id` _mandatory_
: `string` Unique payment identifier. Format: `pay_` followed by 14 characters.

`razorpay_order_id` _mandatory_
: `string` Unique order identifier from Step 1.2. Format: `order_` followed by 14 characters.
            

        
### Response Parameters

`id`
: `integer` Unique Shopify order identifier. For example, `65157213390123`.

`order_id`
: `string` Human-readable order number. For example, `#32697`.

`payment_id`
: `string` Razorpay payment identifier. For example, `pay_Rk3b76fSqXXXXX`.

`payment_method`
: `string` Payment method used. Possible values include:
  - `netbanking`
  - `upi`
  - `card`
  - `wallet`

`payment_currency`
: `string` The 3-letter ISO currency code. For example, `INR`.

`total_amount`
: `integer` Total order amount in smallest currency unit (paise). For example, `659430` for ₹6594.30.

`total_tax`
: `string` Total tax amount as string. For example, `543.91`.

`shipping_fee`
: `integer` Shipping charges in smallest currency unit (paise). For example, `700` for ₹7.

`cod_fee`
: `integer` Cash on Delivery fee in smallest currency unit (paise). For example, `0` indicates no COD fee.

`promotions`
: `array` Array of applied promotions/discounts.

    `reference_id`
    : `string` Internal reference for the promotion.

    `code`
    : `string` Promotion code used.

    `type`
    : `string` Type of promotion. Possible values:
      - `automatic`: Automatically applied discount.
      - `coupon`: Coupon-based discount.

    `value`
    : `integer` Discount value in smallest currency unit (paise). For example, `100000` for ₹1000.

    `source`
    : `string` Source of the promotion. For example, `shopify`.

`shipping_country`
: `string` Country code for shipping destination. For example, `in`.

`customer_details`
: `object` Complete customer information.

    `email`
    : `string` Customer's email address.

    `contact`
    : `string` Customer's phone number.

    `shipping_address`
    : `object` Complete shipping address information.

        `name`
        : `string` Recipient name.

        `line1`
        : `string` Address line 1.

        `city`
        : `string` City name.

        `state`
        : `string` State name.

        `zipcode`
        : `string` Postal code.

        `country`
        : `string` Country code. For example, `in`.

`order_status_url`
: `string` Shopify order status page URL for customer.

`is_new_customer`
: `boolean` Whether this is a new customer's first order. Possible values:
  - `true`: New customer's first order.
  - `false`: Existing customer order.

     
    
  
 

#### Pass Additional Attributes to Shopify Orders

Shopify orders support Tags and Additional Attributes (note attributes). Include the attributes in the Shopify cart's attributes object before initiating checkout:

```javascript
// When creating/updating Shopify cart
const cartPayload = {
  cart: {
    token: "your_cart_token",
    note: "Customer special instructions",
    attributes: {
      "Source": "Mobile App",
      "App Version": "2.1.0",
      "Campaign": "Summer Sale 2025",
      "Custom Field": "Your custom value"
    },
    item_count: 1,
    items: [/* ... */]
  },
  key: "rzp_live_XXXXXX"
};
```

These attributes will flow through to the Shopify order and appear in the additional attributes section in Shopify Admin.

## 2. Test Integration

Check the following checklist below: 

- Shopify cart creation is working correctly.
- Checkout id is generated successfully.
- Order id is created with analytics parameters.
- Magic Checkout SDK opens without errors.
- Coupons apply correctly via prefill.
- Payment flow completes successfully.
- Complete Checkout API creates order in Shopify.
- Order appears in Shopify Admin with correct details.
- Additional attributes appear correctly in Shopify order.

## Error Handling

Error Scenario | Recommended Action 
---
Invalid cart token | Ensure Shopify cart exists before [Step 1.1](#11-create-a-checkout-id).
---
Payment not captured | Verify payment status before complete checkout.
---
Invalid signature | Regenerate signature using Razorpay's signature verification.
---
Coupon invalid | Handle error callback and notify user.

> **WARN**
>
> 
> **Fallback to Shopify Checkout**
> 
> If any Magic Checkout API fails, redirect users to the standard Shopify checkout to ensure customers can still complete their purchase.
> 

## Support

For integration support, reach out to your Razorpay account manager or raise a request with our [support team](https://razorpay.com/support/#request).
