---
title: Integrate Razorpay Magic Checkout on Android App
heading: Integrate Magic Checkout on Android App
description: Steps to integrate Magic Checkout on your Android app using the Razorpay Android Standard SDK.
---

# Integrate Magic Checkout on Android App

Follow these steps to integrate the Razorpay Magic Checkout on your Android application.

#### Prerequisites

- Create a Razorpay account.
- Generate [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/#api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

  - **1. Build Integration**:  Integrate with Android App.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

## 1. Build Integration

  
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
    

  
### 1.3 Install Razorpay Android Standard SDK

     To install the SDK in your Android project, add the following code to your project's top-level build.gradle file. This provides access to the SDK library.
     ```json: dependencies
     repositories {
         mavenCentral()
     }

     dependencies {
         implementation 'com.razorpay:checkout:1.6.41'
     }
     ```
    

  
### 1.4 Initialise Razorpay Android Standard SDK

     Use the `setKeyId()` method of the Checkout class to dynamically add your API key id. You can generate your API keys from the [Razorpay Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md).

     To ensure the Checkout form loads quickly, call the `preload()` method early in your payment flow. The time taken to load resources may vary based on your network bandwidth.
     
     ```java: Java
     public class PaymentActivity extends Activity {

         // ...

         @Override
         public void onCreate(Bundle savedInstanceState) {
             super.onCreate(savedInstanceState);

             /**
             * Preload payment resources
             */
             Checkout.preload(getApplicationContext());

             // ...

             checkout.setKeyID("");

             // ...
         }
     }
     ```kotlin: kotlin
     class PaymentActivity: Activity(), PaymentResultWithDataListener, ExternalWalletListener {
         // .....
         override fun onCreate(savedInstanceState: Bundle?) {
             super.onCreate(savedInstanceState)
             setContentView(R.layout.activity_payment)
             /*
             * To ensure faster loading of the Checkout form,
             * call this method as early as possible in your checkout flow
             * */
             Checkout.preload(applicationContext)
             val co = Checkout()
             // apart from setting it in AndroidManifest.xml, keyId can also be set
             // programmatically during runtime
             co.setKeyID("rzp_live_XXXXXXXXXXXXXX")
         }
         //......
     }
     ```

     
> **WARN**
>
> 
> 
>      **Watch Out!**
> 
>      It is recommended to send the API Key ID from your server-side as app-related metadata fetch. Do not add API Keys in the `AndroidManifest` file.
>      

    

  
### 1.5 Create an Order

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
              
             

         
        
      
     
    
  

  
### 1.8 Initiate Payment and Display Checkout Form

     Create an instance of the `Checkout` and pass the payment details and options as a `JSONObject`. Ensure that you add the `order_id` generated in [Step 5](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/android-integration/#15-create-an-order.md).

     ```java: Java
     public void startPayment() {
     checkout.setKeyID("");
     /**
      * Instantiate Checkout
      */
     Checkout checkout = new Checkout();

     /**
      * Set your logo here
      */
     checkout.setImage(R.drawable.logo);

     /**
      * Reference to current activity
      */
     final Activity activity = this;

     /**
      * Pass your payment options to the Razorpay Checkout as a JSONObject
      */
     try {
         JSONObject options = new JSONObject();

         options.put("name", "");
         options.put("description", "Reference No. #123456");
         options.put("image", "http://example.com/image/rzp.jpg");
         options.put("order_id", "order_DBJOWzybf0sJbb");//from response of step 3.
         options.put("theme.color", "#3399cc");
         options.put("currency", "");
         options.put("amount", "50000");//pass amount in currency subunits
         options.put("prefill.email", "");
         options.put("prefill.contact","");
         c
         JSONObject retryObj = new JSONObject();
         retryObj.put("enabled", true);
         retryObj.put("max_count", 4);
         options.put("retry", retryObj);

         checkout.open(activity, options);

     } catch(Exception e) {
         Log.e(TAG, "Error in starting Razorpay Checkout", e);
     }
     }
     ```java: Kotlin
     private fun startPayment() {
             /*
             *  You need to pass the current activity to let Razorpay create CheckoutActivity
             * */
             val activity:Activity = this
             val co = Checkout()

             try {
                 val options = JSONObject()
                 options.put("name","Razorpay Corp")
                 options.put("description","Demoing Charges")
                 //You can omit the image option to fetch the image from the Dashboard
                 options.put("image","http://example.com/image/rzp.jpg")
                 options.put("theme.color", "#3399cc");
                 options.put("currency","");
                 options.put("order_id", "order_DBJOWzybfXXXX");
                 options.put("amount","50000")//pass amount in currency subunits

                 val retryObj = new JSONObject();
                 retryObj.put("enabled", true);
                 retryObj.put("max_count", 4);
                 options.put("retry", retryObj);

                 val prefill = JSONObject()
                 prefill.put("email","")
                 prefill.put("contact","9876543210")
                 options.put("one_click_checkout",true) // magic checkout
                 options.put("show_coupons", true) // magic checkout

                 options.put("prefill",prefill)
                 co.open(activity,options)
             }catch (e: Exception){
                 Toast.makeText(activity,"Error in payment: "+ e.message,Toast.LENGTH_LONG).show()
                 e.printStackTrace()
             }
         }
     ```
     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      When you paste the checkout options given above, the following error message appears: '`TAG` has private access in `androidx.fragment.app.FragmentActivity`'. You can resolve this by adding the following code:
> 
>      ```java: Resolve TAG has private access
>      public class MainActivity extends AppCompatActivity implements PaymentResultListener {
>      private static final String TAG = MainActivity.class.getSimpleName();
>      ```
>      

     `Checkout.open()` launches the Checkout form where the customer completes the payment and returns the payment result via appropriate callbacks on the `PaymentResultListener`.

     **Payment Options in JSONObject**:
     All available options in the `Standard Web Checkout` are also available in Android.

     
        
            Checkout Options
            
             @include checkout-parameters/magic-sdk

             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              If you call the payment start method inside a fragment, ensure that the `fragment`'s parent `activity` implements the `PaymentResultListener` interface.
>              

            

     
    
  

  
### 1.9 Handle Success and Error Events

     You have the option to implement `PaymentResultListener` or `PaymentResultWithDataListener` to receive callbacks for the payment result.

     - `PaymentResultListener` provides only `payment_id` as the payment result.
     - `PaymentResultWithDataListener` provides additional payment data such as email and contact of the customer, along with the `order_id`, `payment_id`, `signature` and more.

     Use the code below to import the function in your `.java` file. This should be added at the beginning of the file.

     ```java: PaymentResultListener
     import com.razorpay.PaymentResultListener
     ```java: PaymentResultWithDataListener
     import com.razorpay.PaymentResultWithDataListener;
     ```

     Given below are the sample codes for implementation:

     ```java: Java - PaymentResultListener
     public class PaymentActivity extends Activity implements PaymentResultListener {
     // ...

     @Override
     public void onPaymentSuccess(String razorpayPaymentID) {
         /**
         * Add your logic here for a successful payment response
         */
     }

     @Override
     public void onPaymentError(int code, String response) {
         /**
         * Add your logic here for a failed payment response
         */
     }
     }
     ```kotlin: Kotlin - PaymentResultListener
     class PaymentActivity: Activity(), PaymentResultListener {
     // ...
         override fun onPaymentError(errorCode: Int, response: String?) {
         /**
         * Add your logic here for a failed payment response
         */
         }

         override fun onPaymentSuccess(razorpayPaymentId: String?) {
         /**
         * Add your logic here for a successful payment response
         */
         }

     ```

     ```java: Java - PaymentResultWithDataListener
     public class PaymentActivity extends Activity implements PaymentResultWithDataListener {
     // ...
     @Override
     public void onPaymentSuccess(String razorpayPaymentID, PaymentData paymentData) {
         /**
         * Add your logic here for a successful payment response
         */
     }
     @Override
     public void onPaymentError(int code, String response) {
         /**
         * Add your logic here for a failed payment response
         */
     }
     }
     ```kotlin: Kotlin - PaymentResultWithDataListener
     class PaymentActivity: Activity(), PaymentResultWithDataListener {
     // ...
         override fun onPaymentError(errorCode: Int, response: String?) {
         /**
         * Add your logic here for a failed payment response
         */
         }
         override fun onPaymentSuccess(razorpayPaymentId: String?, PaymentData: PaymentData) {
         /**
         * Add your logic here for a successful payment response
         */
         }
     ```

     
> **WARN**
>
> 
> 
>      **Watch Out!**
> 
>      - Razorpay's payment process takes place in a new activity. Since there are two activities involved, your activity can get corrupted or destroyed if the device is low on memory. These two methods should not depend on any variables not set through your life cycle hooks.
>      - It is recommended that you test everything by enabling "Don't Keep Activities" in **Developer Options** under **Settings**.
>      

     
        
            Error Codes
            
             The error codes are returned in the `onPaymentError` method:

             
             Error_Code | Description
             ---
             `Checkout.NETWORK_ERROR` | There was a network error, for example, loss of internet connectivity.
             ---
             `Checkout.INVALID_OPTIONS` | An issue with options passed in `checkout.open`.
             ---
             `Checkout.PAYMENT_CANCELED` | The user canceled the payment.
             ---
             `Checkout.TLS_ERROR` | The device does not support TLS v1.1 or TLS v1.2.
             
            

        
### 1.9.1 Erase User Data from SDK

             The SDK stores customer-specific data such as email, contact number, and user-session cookies if the customer wants to make another payment in the same session. You can delete such sensitive information before another customer logs into the app.

             To erase customer data from the app, you can call the following method anywhere in your app.

             ```java: Erase Customer Data
             Checkout.clearUserData(Context)
             ```
            

     
    
  
  
### 1.10 Store Fields in Your Server

      @include integration-steps/store-fields
    
 
  
### 1.11 Verify Payment Signature

      @include integration-steps/verify-signature
    
 
  
### 1.12 Verify Payment Status

      @include integration-steps/verify-payment-status
    
 
  
### 1.13 Perform Post Payment Processing

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

[Android Standard Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard.md)
