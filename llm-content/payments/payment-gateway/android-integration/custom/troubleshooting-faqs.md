---
title: Troubleshooting & FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions.
---

# Troubleshooting & FAQs

### 1. How to handle situations where a customer has pressed the Back button on the browser before the payment is complete?

		 You can use the `onBackPressed` method to handle a situation where the customer has pressed the Back button before completing the payment. This marks the payment as `failed` on the Dashboard.

		 ```java: onBackPressed Method
			 /**
			 * In your activity, you need to override onBackPressed
			 */
			 @Override
			 public void onBackPressed() {
				 if(razorpay != null){
				 	razorpay.onBackPressed();
				 }
				 super.onBackPressed();
			 }
		 ```
		

	
### 2. How to change API keys?

		 You can change API keys after you have already initialized the `Razorpay` object by calling `razorpay.changeMerchantKey(merchantKey)`. This is an optional method that overrides the existing API key. The new key is used for authenticating the requests sent to Razorpay.

		 ```java: API Key Change
		 /**
		 * change the API key
		 */
		 razorpay.changeMerchantKey("YOUR_KEY_ID");
		 ```
		

	
### 3. How can I check the Razorpay Android Custom SDK version?

		 To check the SDK version: 
		 1. Open your Android project in Android Studio.
		 2. Navigate to the `build.gradle` file of your app module (usually `app/build.gradle`).
		 3. Locate the `dependencies` block in the file.
		 4. Find the line that includes the Razorpay SDK dependency. The version number will be alongside the SDK name in the format`x.y.z`.

			 ```java: build.gradle
			 dependencies {
			 implementation 'com.razorpay:customui:3.9.22'
			 }
			 ```
		

	
### 4. How can I update the Razorpay Android Custom SDK version?

		 To update the Custom Android SDK, follow these steps:
		 1. Check the [latest SDK version](https://mvnrepository.com/artifact/com.razorpay/customui).
		 2. In the app-level gradle build file, update the SDK version to the latest release.

			 ```java: Update SDK
			 dependencies {
			 //    … other dependencies
			 //  For Razorpay checkout SDK
			 implementation ‘com.razorpay:customui:‘
			 //    … other dependencies
			
			 }
			 ```
		 3. After updating, sync gradle and check for any compile-time errors.
		 4. Ensure all changes are correctly integrated and the application functions as expected.

		 
> **INFO**
>
> 
> 		 **Handy Tips**
>  
> 		 From version 3.9.22 onwards, the latest version is automatically updated, eliminating the need for manual updates.
> 		 

		

	
### 5. I received a policy violation notice from Google Play Store when trying to publish my Razorpay-integrated app. How do I proceed? 

		 This error appeared due to an intent redirection issue that was present in the older versions of the Razorpay Android Custom SDK. To resolve this, please [upgrade](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom.md#step-1-install-razorpay-android-custom-sdk) to the latest SDK version.
		

	
### 6. How to fetch Subscription details?

		 If you are using [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md), you can use this code sample to fetch the subscription details:

		 ```java: Fetch Subscription
			 JSONObject options = new JSONObject();
			 options.put("subscription_id", subscription_id);
			 razorpay.getPaymentMethods(options, new PaymentMethodsCallback() {
				 @Override
				 public void onPaymentMethodsReceived(String result) {
				 	JSONObject paymentMethods = new JSONObject(result);
				 }

				 @Override
				 public void onError(String error){

				 }
				 });
			 });
		 ```
		

	
### 7. How to fetch Subscription amount?

		 If you are using [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md), you can fetch the subscription amount by calling the `getSubscriptionAmount` method.

		 ```java: Fetch Subscription Amount
		 razorpay.getSubscriptionAmount("sub_id", new SubscriptionAmountCallback() {
		 @Override
		 public void onSubscriptionAmountReceived(long amount) {
		 }

		 @Override
		 public void onError(String error) {
		 }
		 });
		```
