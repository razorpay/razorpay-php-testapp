---
title: 1. Build Integration
description: Steps to integrate your Android application with Razorpay Android Custom SDK.
---

# 1. Build Integration

Follow these steps to integrate your Android application with Razorpay Android Custom SDK:

**1.1** [Install Razorpay Android Custom SDK](#11-install-razorpay-android-custom-sdk). 

**1.2** [Instantiate and Initialise Razorpay Android Custom SDK](#12-instantiate-and-initialise-razorpay-android-custom-sdk). 

**1.3** [Create an Order in Server](#13-create-an-order-in-server). 

**1.4** [Fetch Payment Methods](#14-fetch-payment-methods). 

**1.5** [Set Up WebView](#15-set-up-webview). 

**1.6** [Submit Payment Data and Handle Success and Error Events](#16-submit-payment-data-and-handle-success-and). 

**1.7** [Store Fields in Your Server](#17-store-fields-in-your-server). 

**1.8** [Verify Payment Signature](#18-verify-payment-signature). 

**1.9** [Verify Payment Status](#19-verify-payment-status).

## 1.1 Install Razorpay Android Custom SDK

Follow the steps given below to install the SDK in your Android project:

- Add the code given below to your project's top-level `build.gradle` file: 
 This gives access to the SDK library.

    ```java: Java
    dependencies {
    implementation 'com.razorpay:customui:3.9.22'
    }
    ```

    This adds the dependencies for the SDK.

- If you are using SDK version 3.9.5 or below, download the file and add it to the libs directory.

> **INFO**
>
> 
> **Handy Tips**
> 
> From version 3.9.22 onwards, the latest version is automatically updated, eliminating the need for manual updates.
> 

## 1.2  Instantiate and Initialise Razorpay Android Custom SDK

#### Instantiate

To instantiate Razorpay, pass a reference of your activity to the `Razorpay` constructor, as shown below:

```java
import com.razorpay.Razorpay

Razorpay razorpay = new Razorpay(activity);
```
#### Proguard Rules

If you are using Proguard for your builds, you need to add the following lines to your `proguard-rules.pro` file.

```java: Java
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

#### Initialise

Add your [API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) to `AndroidManifest.xml`.

  
> **WARN**
>
> 
> 
>   **Watch Out!**
> 
>   API keys should not be hardcoded in the app. It should be sent from your server-side as an app-related metadata fetch.
>   

#### Sample Code

For additional support on Payment Methods, such as fetching bank or wallet logos, fetching card network and information on how to validate card information,

```xml: XML

  
    
  

```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> The auto-OTP reading feature is available only for saved cards. Know more about [saved cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/checkout-features/#flash-checkout.md).
> 

To set your API key programmatically, that is, at the runtime instead of statically defining it in your `AndroidManifest.xml`, you can pass it as a parameter to the Razorpay constructor, as shown below:

```java
Razorpay razorpay = new Razorpay(activity, "YOUR_KEY_ID");
```

## 1.3 Create an Order in Server

@include integration-steps/order-creation-v2

## 1.4 Fetch Payment Methods

 You can accept payments through UPI, credit and debit cards, netbanking and wallets, as per the methods enabled on your account.   

    - When you use Razorpay Android Standard SDK, you do not have to handle the availability of different payment methods.

    - When creating a Custom checkout form, you must ensure that only the methods activated for your account are displayed to the customer. 

To get a list of available payment methods, call `getPaymentMethods`. This fetches the list of payment methods asynchronously and returns the result in JSON format in the `onPaymentMethodsReceived` callback.

#### Sample Code

The following is an API used to fetch all enabled payment methods for a given API Key ID:

```java: Payment Methods API
https://api.razorpay.com/v1/methods?key_id=[Your_Key_ID]
```

```java: Java
razorpay.getPaymentMethods(new PaymentMethodsCallback() {
	@Override
	public void onPaymentMethodsReceived(String result) {
		JSONObject paymentMethods = new JSONObject(result);
	}

	@Override
	public void onError(String error){

	}
	});
});
```kotlin: Kotlin
 razorpay?.getPaymentMethods(object : PaymentMethodsCallback {
            override fun onPaymentMethodsReceived(result: String?) {
                /**
                 * This returns JSON data
                 * The structure of this data can be seen at the following link:
                 * https://api.razorpay.com/v1/methods?key_id=rzp_test_XXXXXXXXXXXXXX
                 *
                 */
                Log.d("Result", "" + result)
                inflateLists(result)
            }

            override fun onError(error: String?) {
                Log.e("Get Payment error", error)
            }
        })
```

Check the various [payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods.md) available with Razorpay Android Custom SDK.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> If you are using Subscriptions, you can pass the `subscription_id` in the options, which fetches subscription-related details along with the payment method. This saves you a network call to get amount for that `subscription_id`. Know more about [Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions.md).
> 

## 1.5 Set Up WebView

The bank ACS pages are displayed to the user in a WebView.
You need to define a WebView in your layout and pass the reference to our SDK using `setWebView`, as shown below:

```java: Java
webview = findViewById(R.id.payment_webview);
// Hide the webview until the payment details are submitted
webview.setVisibility(View.GONE);
razorpay.setWebView(webview);
```kotlin: Kotlin
webView = findViewById(R.id.payment_webview)
private fun createWebView() {
        razorpay?.setWebView(webView)
    }
```

## 1.6 Submit Payment Data and Handle Success and Error Events

Once you have received the customer's payment information, it needs to be sent to our API to complete the `creation` step of the payment flow. You can do this by invoking `submit` method. Before invoking this method, you have to make your webview visible to the customer. The data that needs to be submitted in the form of a `JSONObject` is shown below.

```java: Java
try {

	JSONObject data = new JSONObject();
	data.put("amount", 50000); // pass in currency subunits.
    data.put("currency", ""); // pass the currency code.
	data.put("order_id", "order_DgZ26rHjbzLLY2");//sample order_id. Generate orders using Orders API
	data.put("email", "");
	data.put("contact", "");
	JSONObject notes = new JSONObject();
	notes.put("custom_field", "abc");
	data.put("notes", notes);
	data.put("method", "netbanking");
	// Method specific fields
	data.put("bank", "HDFC");

	// Make webview visible before submitting payment details
	webview.setVisibility(View.VISIBLE);

	razorpay.submit(data, new PaymentResultListener() {
		@Override
		public void onPaymentSuccess(String razorpayPaymentId) {
			// Razorpay payment ID is passed here after a successful payment
		}

		@Override
		public void onPaymentError(int code, String description) {
			// Error code and description is passed here
		}
	});

} catch (Exception e) {
	Log.e(TAG, "Error in submitting payment details", e);
}
```kotlin: Kotlin
try {
            payload = JSONObject(
                "{currency: ''}")
            payload.put("amount", "50000")
            payload.put("contact", "9000090000")
            payload.put("email", "")
        } catch (e: Exception) {
            e.printStackTrace()
        }
        try {
            payload.put("method", "netbanking")
            payload.put("bank", bankName)
            sendRequest()
        } catch (e: Exception) {
            e.printStackTrace()
        }
    }

	    override fun onPaymentError(errorCode: Int, errorDescription: String?) {
        webView?.visibility = View.GONE
        outerBox?.visibility = View.VISIBLE
        Toast.makeText(this@PaymentOptions, "Error $errorCode : $errorDescription",Toast.LENGTH_LONG).show()
        Log.e(TAG,"onError: $errorCode : $errorDescription")
    }

    /**
     * Is called if the payment was successful
     * You can now destroy the webview
     */
    override fun onPaymentSuccess(rzpPaymentId: String?) {
        webView?.visibility = View.GONE
        outerBox?.visibility = View.VISIBLE
        Toast.makeText(this@PaymentOptions, "Payment Successful: $rzpPaymentId",Toast.LENGTH_LONG).show()
    }

```

Below is a complete list of Checkout form parameters:

@include checkout-parameters/custom

> **INFO**
>
> 
> **Handy Tips**
> 
> To reuse the Razorpay Checkout web integration inside a web view on Android or iOS, pass a [callback_url](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/callback-url.md) along with other checkout options to process the desired payment.
> 

#### Use PaymentResultWithDataListener

You have the option to implement `PaymentResultListener` or `PaymentResultWithDataListener` to receive callbacks for the payment result.

- `PaymentResultListener` provides only `payment_id` as the payment result.

- `PaymentResultWithDataListener` provides additional payment data such as email and contact of the customer, along with the `order_id`, `payment_id`, `signature` and more.

```java: Java
razorpay.submit(data, new PaymentResultWithDataListener() {
        @Override
        public void onPaymentSuccess(String razorpayPaymentId, PaymentData paymentData) {
            // Razorpay payment ID and PaymentData passed here after a successful payment
        }

        @Override
        public void onPaymentError(int code, String description) {
            // Error code and description is passed here
        }
    });

} catch (Exception e) {
    Log.e(TAG, "Error in submitting payment details", e);
}
```kotlin: Kotlin
razorpay.submit(payload, object : PaymentResultWithDataListener {
    override fun onPaymentSuccess(p0: String?, p1: PaymentData?) {
        // Razorpay payment ID and PaymentData passed here after a successful payment
    }

    override fun onPaymentError(p0: Int, p1: String?, p2: PaymentData?) {
        // Error code and description is passed here
    }
})
```

## 1.7 Store Fields in Your Server

@include integration-steps/store-fields

## 1.8 Verify Payment Signature

@include integration-steps/verify-signature

## 1.9 Verify Payment Status

@include integration-steps/verify-payment-status

## Integrate Payments Rainy Day Kit

@include rainy-day/section

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/test-integration.md)

### Related Information
- [Integrate With Android Custom SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom.md)
- [Payment Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods.md)
- [Troubleshooting & FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/troubleshooting-faqs.md)

- [Additional Support for Payment Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/additional-features.md)
