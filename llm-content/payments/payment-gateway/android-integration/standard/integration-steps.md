---
title: Android SDK - Integration Steps | Razorpay Payment Gateway
heading: Integration Steps
description: Steps to integrate your Android application with Razorpay Android Standard SDK.
---

# Integration Steps

Follow these steps to integrate your Android application:

  - **1. Build Integration**: Integrate Android Standard Checkout.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/MFQ3tz6P5Vw]

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> The Android app must have a `minSDKversion` of 19 or higher. If you want to support devices below API level 19, you must override `minSDKversion`. Use the sample code below to override `minSDKversion`: 
> 
> ```java: Override minSDK
>              tools:overrideLibrary="com.razorpay"/>
> ```
> 

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Install Razorpay Android Standard SDK

     To install the SDK in your Android project:

     Add the code given below to your project's top-level `build.gradle` file: 

     This gives access to the SDK library.

     ```java: build.gradle
     repositories {
         mavenCentral()
     }

     dependencies {
         implementation 'com.razorpay:checkout:1.6.40'
     }
     ```

     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      From version 1.6.40 onwards, the latest version is automatically updated, eliminating the need for manual updates.
>      

    

  
### 1.2 Initialize Razorpay Android Standard SDK

     Add your `` dynamically using Checkout's `setKeyId()` method. You can generate the [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md) from the Dashboard.

     To quickly load the `Checkout` form, the `preload` method of `Checkout` must be called much earlier than the other methods in the payment flow. The loading time of the preload resources can vary depending on your network's bandwidth.

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
     ```java: Kotlin
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
>      **Watch Out!**
> 
>      It is recommended to send the API Key ID from your server-side as app-related metadata fetch. Do not add API Keys in the `AndroidManifest` file.
> 
>      
>       
>        Proguard Rules
>        
>         If you are using Proguard for your builds, you must add the following lines to your `proguard-rules.pro` file.
> 
>         ```java:
>         -keepclassmembers class * {
>             @android.webkit.JavascriptInterface ;
>         }
> 
>         -keepattributes JavascriptInterface
>         -keepattributes *Annotation*
> 
>         -dontwarn com.razorpay.**
>         -keep class com.razorpay.** {*;}
> 
>         -optimizations !method/inlining/*
> 
>         -keepclasseswithmembers class * {
>           public void onPayment*(...);
>         }
>         ```
>        
>       
>       
>        SDK Integration Check
>        
>         Call `Checkout.sdkCheckIntegration(activity)` to check the health of integration. This will also let you know if the SDK version is outdated. This will only appear in debug mode and not in the release.
>        
>       
>      
>      

    

  
### 1.3 Create an Order in Server

     @include integration-steps/order-creation-v2
    

  
### 1.4 Initiate Payment and Display Checkout Form

     There are two ways to pass the checkout parameters. You can either use `payloadhelper` or the `JSONObject` options. We recommend using `payloadhelper` to ensure that the right data types are used for the parameter values.

     
      
        PayloadHelper
        
         Create a `JSONObject` to send it to the SDK.

         ```java: Java
         PayloadHelper payloadHelper = new PayloadHelper("", 100, "order_XXXXXXXXX");
               payloadHelper.setName("");
               payloadHelper.setDescription("Description");
               payloadHelper.setPrefillEmail("");
               payloadHelper.setPrefillContact("");
               payloadHelper.setPrefillCardNum("");
               payloadHelper.setPrefillCardCvv("111");
               payloadHelper.setPrefillCardExp("11/30");
               payloadHelper.setPrefillMethod("card");
               payloadHelper.setPrefillName("MerchantName");
               payloadHelper.setSendSmsHash(true);
               payloadHelper.setRetryMaxCount(4);
               payloadHelper.setRetryEnabled(true);
               payloadHelper.setColor("#000000");
               payloadHelper.setAllowRotation(true);
               payloadHelper.setRememberCustomer(true);
               payloadHelper.setTimeout(10);
               payloadHelper.setRedirect(true);
               payloadHelper.setRecurring("1");
               payloadHelper.setSubscriptionCardChange(true);
               payloadHelper.setCustomerId("cust_XXXXXXXXXX");
               payloadHelper.setCallbackUrl("https://accepts-posts.request");
               payloadHelper.setSubscriptionId("sub_XXXXXXXXXX");
               payloadHelper.setModalConfirmClose(true);
               payloadHelper.setBackDropColor("#ffffff");
               payloadHelper.setHideTopBar(true);
               payloadHelper.setNotes(new JSONObject("{\"remarks\":\"Discount to customer\"}"));
               payloadHelper.setReadOnlyEmail(true);
               payloadHelper.setReadOnlyContact(true);
               payloadHelper.setReadOnlyName(true);
               payloadHelper.setImage("https://www.razorpay.com");
               payloadHelper.setAmount(100);
               payloadHelper.setCurrency("");
               payloadHelper.setOrderId("order_XXXXXXXXXXXXXX");
         ```java: Kotlin
         val payloadHelper = PayloadHelper("", 100, "order_XXXXXXXXX")
                 payloadHelper.name = ""
                 payloadHelper.description = "Description"
                 payloadHelper.prefillEmail = ""
                 payloadHelper.prefillContact = ""
                 payloadHelper.prefillCardNum = ""
                 payloadHelper.prefillCardCvv = "111"
                 payloadHelper.prefillCardExp = "11/30"
                 payloadHelper.prefillMethod = "card"
                 payloadHelper.prefillName = "MerchantName"
                 payloadHelper.sendSmsHash = true
                 payloadHelper.retryMaxCount = 4
                 payloadHelper.retryEnabled = true
                 payloadHelper.color = "#000000"
                 payloadHelper.allowRotation = true
                 payloadHelper.rememberCustomer = true
                 payloadHelper.timeout = 10
                 payloadHelper.redirect = true
                 payloadHelper.recurring = "1"
                 payloadHelper.subscriptionCardChange = true
                 payloadHelper.customerId = "cust_XXXXXXXXXX"
                 payloadHelper.callbackUrl = "https://accepts-posts.request"
                 payloadHelper.subscriptionId = "sub_XXXXXXXXXX"
                 payloadHelper.modalConfirmClose = true
                 payloadHelper.backDropColor = "#ffffff"
                 payloadHelper.hideTopBar = true
                 payloadHelper.notes = JSONObject("{\"remarks\":\"Discount to customer\"}")
                 payloadHelper.readOnlyEmail = true
                 payloadHelper.readOnlyContact = true
                 payloadHelper.readOnlyName = true
                 payloadHelper.image = "https://www.razorpay.com"
                 // these values are set mandatorily during object initialization. Those values can be overridden like this
                 payloadHelper.amount=100
                 payloadHelper.currency=""
                 payloadHelper.orderId = "order_XXXXXXXXXXXXXX"
         ```

         If you want to create certain options that are not available, add them to the `JSONObject` we get from `payloadHelper.getJson()`.
        

      
### JSONObject

         You can alternatively use the JSONObject options given below.

         Create an instance of the `Checkout` and pass the payment details and options as a `JSONObject`. Ensure that you add the `order_id` generated in [Step 3](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard/integration-steps/#13-create-an-order-in-server.md).

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

               options.put("name", "Merchant Name");
               options.put("description", "Reference No. #123456");
               options.put("image", "http://example.com/image/rzp.jpg");
               options.put("order_id", "order_DBJOWzybf0sJbb");//from response of step 3.
               options.put("theme.color", "#3399cc");
               options.put("currency", "");
               options.put("amount", "50000");//pass amount in currency subunits
               options.put("prefill.email", "");
               options.put("prefill.contact","");
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
                     options.put("order_id", "order_DBJOWzybf0sJbb");
                     options.put("amount","50000")//pass amount in currency subunits

                     val retryObj = new JSONObject();
                     retryObj.put("enabled", true);
                     retryObj.put("max_count", 4);
                     options.put("retry", retryObj);

                     val prefill = JSONObject()
                     prefill.put("email","")
                     prefill.put("contact","")

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

     
      
### Checkout Options

        You must pass these parameters in Checkout to initiate the payment.
        
        @include checkout-parameters/standard
        
> **INFO**
>
> 
> 
>         **Handy Tips**
> 
>         If you call the payment start method inside a fragment, ensure that the `fragment`'s parent `activity` implements the `PaymentResultListener` interface.
>         

       

     
    
  
  
### 1.5 Handle Success and Error Events

     You have the option to implement `PaymentResultListener` or `PaymentResultWithDataListener` to receive callbacks for the payment result.

     - `PaymentResultListener` provides only `payment_id` as the payment result.
     - `PaymentResultWithDataListener` provides additional payment data such as email and contact of the customer, along with the `order_id`, `payment_id`, `signature` and more.

     Use the code below to import the function in your `.java` file. This should be added at the beginning of the file.

     ```java: PaymentResultListener
     import com.razorpay.PaymentResultListener
     ```java: PaymentResultWithDataListener
     import com.razorpay.PaymentResultWithDataListener;
     ```

     
      
        1.5.1 Sample Code
        
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
>          **Watch Out!**
> 
>          - Razorpay's payment process takes place in a new activity. Since there are two activities involved, your activity can get corrupted or destroyed if the device is low on memory. These two methods should not depend on any variables not set through your life cycle hooks.
>          - It is recommended that you test everything by enabling "Don't Keep Activities" in **Developer Options** under **Settings**.
>          

        

      
### Error Codes

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
         
        

      
### 1.5.2 Erase User Data from SDK

         The SDK stores customer-specific data such as email, contact number, and user-session cookies if the customer wants to make another payment in the same session. You can delete such sensitive information before another customer logs into the app.

         To erase customer data from the app, you can call the following method anywhere in your app.

         ```java: Erase Customer Data
         Checkout.clearUserData(Context)
         ```
        

     
    
  
  
### 1.6 Store Fields in Your Server

     @include integration-steps/store-fields
    

  
### 1.7 Verify Payment Signature

     @include integration-steps/verify-signature
    

  
### 1.8 Verify Payment Status

     @include integration-steps/verify-payment-status
    

## 2. Test Integration

@include integration-steps/next-steps

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Android Standard SDK. Consider these steps before taking the integration live.

    
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
        

### Related Information
[Google Play's Data Safety](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard/google-data-safety.md)
