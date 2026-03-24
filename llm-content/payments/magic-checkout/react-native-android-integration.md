---
title: Integrate Razorpay Magic Checkout on React Native Android App
heading: Integrate Magic Checkout on React Native Android App
description: Steps to integrate Magic Checkout on your React Native using the Razorpay React Native Android Standard SDK.
---

# Integrate Magic Checkout on React Native Android App

Follow these steps to integrate the Razorpay Magic Checkout on your React Native Android application.

#### Prerequisites

- Create a Razorpay account.
- Generate [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

> **INFO**
>
> 
> **Handy Tips**
> 
> The **compileSdkVersion** is the version of Android. Increase the value of **minSdkVersion** to at least 19 in the build.gradle file in the Android folder to work with the latest Android SDK Build Tools version. Using it with a lower **minSdkVersion** version will lead to errors.
> 

  - **1. Build Integration**:  Integrate with React Native Android App.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow the steps given below:

> **WARN**
>
> 
> **Watch Out!**
> 
> If you use M1 MacBook, you need to make [these changes](#m1-macbook-changes) in your `podfile`.
> 

  
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
         ![Choose custom platform](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-custom-platform.jpg.md)
     3. In the **Setup & Settings** section, click **Checkout Settings**. 
     4. In the **Coupon Settings** section, enter the following:
        1. **URL for get promotions**: The API URL should return a list of promotions applicable to the specified order_id and customer. Magic Checkout uses this endpoint to fetch these promotions from your server and display them to your customers in the checkout modal.
        2. **URL for apply promotions**: The API URL validates the promotion code applied by the customer and should return the discount amount. Magic Checkout uses this endpoint to apply promotions via your server.
     5. Click **Save settings**.
        ![Add promotion URLs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-web-promo-url.jpg.md)
     6. Navigate to **Shipping Setup**.
     7. Select **API** as the Shipping Service type from the drop-down list.
     8. Enter the **URL for shipping info**. The API URL should return shipping serviceability, COD serviceability, shipping fees and COD fees for a given list of customer addresses. Magic Checkout uses this endpoint to retrieve shipping information from your server. 
     9. Click **Save Settings**.
        ![Add shipping URL](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-web-shipping-url.jpg.md)
    

  
### 1.3 Install Razorpay React Native SDK

     Install the SDK using the following `npm` command in the **Terminal** window. If you are using Windows, please use **Git Bash** instead of the **Command Prompt** window. Ensure that you run this code within your React Native project folder in the **Terminal** window. 

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
        

     
    
  
  
### 1.5 Create an Order in Server

     @include magic/order-creation
    

  
### 1.6 Interact with Shipping Info API

     This API should return shipping serviceability, COD serviceability, shipping fees and COD fees for a given list of customer addresses.

     /your-server-url/shipping-info-api-path

     ```curl: Request
     {
        "order_id": "SomeReceiptValue", // This is the receipt field set in the Razorpay order
        "razorpay_order_id": "EKwxwAgItmmXdp", // This is the RZP order created without the `order_` prefix
        "email": "", // Email field will be set if the customer enters an email
        "contact": "+919900000000", // Customer phone number with country code
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
: `string` Unique identifier of the order created [previously](#15-create-an-order).

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
  : `string` Customer's ZIP code.

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
  : `string` Customer's ZIP code.

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
    : `boolean` Indicates whether you deliver orders to the  zipcode entered by the customer. This is based on the ZIP codes you have added in the serviceability setting on the Razorpay Dashboard. Possible values:
        - `true`: Orders can be delivered to the added ZIP codes.
        - `false`: Orders cannot be delivered to the added ZIP codes.

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

        

     
    
  
  
### 1.7 Interact with Get Promotions API

     This API should return the list of promotions applicable for the given `order_id` and customer.

     /your-server-url/create-promotions-api-path

     ```curl: Request
     {
       "order_id": "SomeReceiptValue", // this is the receipt field set in Razorpay order
       "contact": "+919000090000", 
       "email": ""
     }'
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
: `string` Unique identifier of the order created [previously](#15-create-an-order).

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
        

      
### 1.7.1 Interact with Apply Promotions API

         This API should validate the promotion code applied by the customer and return the discount amount.

         /your-server-url/create-promotions-api-path

         ```curl: Request
         {
           "order_id": "SomeReceiptValue", // this is the receipt field set in Razorpay order
           "contact": "+919000090000",
           "email": "",
           "code": "500OFF"
           }'

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
: `string` Unique identifier of the order created [previously](#15-create-an-order).

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
              LOGIN_REQUIRED | 	This coupon is specifically assigned to a registered customer. | To redeem it, the customer must log in to their account and authenticate their identity.
              ---
              REQUIREMENT_NOT_MET | The current cart conditions do not meet the requirements for this promotion to be valid. For example, the promotion may require a minimum cart value of ₹1,000, but the cart total is ₹800. | Review the promotion's terms and adjust the cart contents accordingly.
              
             

         
        
      
     
    
  

  
### 1.8 Add Razorpay Checkout Options to .js File

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
         amount: '50000',
         name: 'Acme Corp',
         order_id: 'order_DslnoIgkIDL8Zt',//Replace this with an order_id created using Orders API.
         prefill: {
           email: '',
           contact: '9191919191',
           name: ''
         },
         one_click_checkout: true, // magic checkout
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

            

     
    
  
  
### 1.9 Store Fields in Your Server

      @include integration-steps/store-fields
    
 
  
### 1.10 Verify Payment Signature

      @include integration-steps/verify-signature

      
        
          M1 MacBook Changes
          
           If you use M1 MacBook, you need to make the following changes in your podfile.

           
> **INFO**
>
> 
>            **Handy Tips**
> 
>            Add the following code inside `post_install do |installer|`.
>            

           ```js: podfile
           installer.pods_project.build_configurations.each do |config|
             config.build_settings["EXCLUDED_ARCHS[sdk=iphonesimulator*]"] = "arm64"
           end
           ```
          

      
    
   
  
### 1.11 Verify Payment Status

      @include integration-steps/verify-payment-status
    
 
  
### 1.12 Perform Post Payment Processing

     @include magic/post-payment
    

 

## 2. Test Integration

@include integration-steps/next-steps-magic

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Magic Checkout integration. Consider these steps before taking the integration live.

    
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
        

## Related Information

[React Native: Android Standard Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/react-native-integration/standard/integration-steps-android.md)
