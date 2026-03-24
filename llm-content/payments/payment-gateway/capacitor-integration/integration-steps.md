---
title: Capacitor SDK - Integration Steps | Razorpay Payment Gateway
heading: Integration Steps
description: Steps to integrate the Capacitor application with Razorpay Payment Gateway.
---

# Integration Steps

Follow these steps to integrate your Capacitor application:

  - **1. Build Integration**: Integrate Capacitor Standard Checkout.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/fthj02JPZhs]

> **WARN**
>
> 
> **Watch Out!**
> 
> If you use M1 MacBook, you need to make [these changes](#16-verify-payment-signature) in your `podfile`. Add the following code inside `post_install do |installer|`:
> 
> ```js: podfile
> installer.pods_project.build_configurations.each do |config|
> config.build_settings["EXCLUDED_ARCHS[sdk=iphonesimulator*]"] = "arm64"
> end
> ```
> 

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Create an Order in Server

     @include integration-steps/order-creation-v2
    

  
### 1.2 Install Razorpay Capacitor Plugin

     Run the following command on your command prompt to install the plugin:

     ```yml: Install Capacitor
     npm i -S https://github.com/razorpay/razorpay-capacitor.git #installs plugin that supports Capacitor 6.0
     ```

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      We recommend you to use the latest plugin version (that works on Capacitor 6.0) as all the latest features will be made available only on this version. However, if you want to use the plugin that works on Capacitor 5.0, use the command given below:
> 
>      ```yml: Install Capacitor
>      npm i -S https://github.com/razorpay/razorpay-capacitor.git#76fd7d6b59f631eb44e6ecebc9188b2425168beb #installs plugin that supports Capacitor 5.0
>      ```
> 
>      If you want to use the plugin that works on other capacitor versions, refer to the [GitHub repository](https://github.com/razorpay/razorpay-capacitor).
> 
>      

     
        
            Proguard Rules
            
             If you are using Proguard for your builds, you must add the following lines to your `proguard-rules.pro` file.

             ```java:
             -keepclassmembers class * {
                 @android.webkit.JavascriptInterface ;
             }

             -keepattributes JavascriptInterface
             -keepattributes *Annotation*

             -dontwarn com.razorpay.**
             -keep class com.razorpay.** {*;}

             -optimizations !method/inlining/*

             -keepclasseswithmembers class * {
             public void onPayment*(...);
             }
             ```
            

     
    
  
  
### 1.3 Add Checkout Class in MainActivity.java (Android Only)

     Add the Checkout class to the ArrayList in the MainActivity class in `{{projectDir}}/android/src/main/MainActivity.java`. Below is the sample code:

     ```java: Add Checkout Class
     import com.ionicframework.capacitor.Checkout;

     public class MainActivity extends BridgeActivity {
       @Override
       public void onCreate(Bundle savedInstanceState) {
         super.onCreate(savedInstanceState);

         registerPlugin(Checkout.class);
       }
     }
     ```

     Check the [Capacitor 6.0 Official Updates](https://capacitorjs.com/docs/updating/6-0).
    

  
### 1.4 Add Checkout Code

     Add the Pay button on your web page using the checkout code given below. The checkout page is displayed when the customers click the Pay button. 
     
        
            1.4.1 Code to Add Pay Button
            
                 Add the Checkout code to your project. Ensure that you pass the `order_id` that you received in response to the first step.

                 ```js: Checkout Code
                 import { Checkout } from 'capacitor-razorpay';

                 @Component({
                 selector: 'app-home',
                 templateUrl: 'home.page.html',
                 styleUrls: ['home.page.scss'],
                 })
                 export class HomePage {

                 constructor(private alertController: AlertController) {}

                 async payWithRazorpay(){
                     const options = {
                     key: '[YOUR_KEY_ID]',
                     amount: '50000',
                     description: 'Great offers',
                     image: 'https://i.imgur.com/3g7nmJC.jpg',
                     order_id: 'order_Cp10EhSaf7wLbS',//Order ID generated in Step 1
                     currency: '',
                     name: 'Acme Corp',
                     prefill: {
                         email: '',
                         contact: ''
                     },
                     theme: {
                         color: '#3399cc'
                     }
                     }
                     try {
                     let data = (await Checkout.open(options));
                     console.log(data.response+"AcmeCorp");
                     console.log(JSON.stringify(data))
                     } catch (error) {
                     //it's paramount that you parse the data into a JSONObject
                     let errorObj = JSON.parse(error['code'])
                     alert(errorObj.description);
                     alert(errorObj.code);

                     alert(errorObj.reason);
                     alert(errorObj.step);
                     alert(errorObj.source);
                     alert(errorObj.metadata.order_id);
                     alert(errorObj.metadata.payment_id);

                     }

                 async presentAlert(response: string){
                     // let responseObj = JSON.parse(response)
                     console.log("message"+ response['razorpay_payment_id']);
                     const alert = await this.alertController.create({
                     message:response['razorpay_payment_id'],
                     backdropDismiss: true,
                     });

                     await alert.present();
                 }

                 }
                 ```
            

     
     
        
### Checkout Options

             You must pass these parameters in Checkout to initiate the payment.
             
             @include checkout-parameters/standard
            

        
        
### 1.4.2 Enable UPI Intent on iOS *(Optional)*

             @include integration-steps/ios-upi-intent
            

        
     
    
  
  
### 1.5 Store Fields in Your Server

     @include integration-steps/store-fields
    

   
### 1.6 Verify Payment Signature

     @include integration-steps/verify-signature
    

   
### 1.7 Verify Payment Status

     @include integration-steps/verify-payment-status
    

## 2. Test Integration

@include integration-steps/next-steps

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Capacitor integration. Consider these steps before taking the integration live.

    
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
