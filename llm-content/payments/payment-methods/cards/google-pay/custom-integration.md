---
title: Google Pay Card Payments - Android Custom Integration
description: Know how to integrate Cards on Google Pay on your Razorpay Custom Integration.
---

# Google Pay Card Payments - Android Custom Integration

Using this feature, you can allow your customers to make payments on your Android app using the cards they have saved on Google Pay.

To support Google Pay Cards on your custom checkout implementation:

1. [Show Google Pay as a separate option when Google Pay is set-up on your customer’s device](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/google-pay/#onboarding-and-integration.md).
2. Trigger payment when the user clicks Google Pay Cards on your checkout.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Prerequisites
- You should have already integrated [Razorpay Custom Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom.md) on your Android app.
- Complete the onboarding process mentioned [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/google-pay.md).

## Integration Steps

1. [Add or update the Google SDKs](#step-1-add-or-update-the-google-sdks)
2. [Update the Razorpay Custom Integration SDK](#step-2-update-razorpay-custom-integration-sdk)
3. [Add dependencies in the Build Gradle file](#step-3-add-dependencies-in-build-gradle-file)
4. [Add metadata in the Android Manifest file](#step-4-add-metadata-in-android-manifest-file).
5. [Instantiate and initialize the Razorpay Android Custom SDK](#step-5-instantiate-and-initialize-razorpay-android-custom)
6. [Implement Orders API in your server-side](#step-6-implement-orders-api-in-your-server-side).
7. [Fetch payment methods](#step-7-fetch-payment-methods).
8. [Check if Google Pay Cards is setup on the customer's device](#step-8-check-if-google-pay-cards-is).
9. [Set up the WebView](#step-9-set-up-the-webview).
10. [Submit payment data and handle success and error events](#step-10-submit-payment-data-and-handle-success).
11. [Store fields in the server](#step-11-store-the-fields-in-the-server).
12. [Verify payment signature](#step-12-verify-payment-signature).

### Step 1: Add or Update the Google SDKs

You will need to integrate the Google SDK in your Android app. 

Import the SDK from our Maven repository by adding the following lines to your app's `build.gradle` file.

```java: build.gradle
repositories {
    mavenCentral()
}

dependencies {
    implementation 'com.razorpay:gpay:1.0.0'
}
```

### Step 2: Update Razorpay Custom Integration SDK

Google Pay Cards is supported on Razorpay Android - Custom Checkout version 3.8.8 and higher. If you are using an older version, you will need to update the same.

You can update the Custom Checkout version in your `build.gradle` file as shown below:

```java: Update Razorpay Checkout version
dependencies {
  ...
  implementation(name:'razorpay-android-3.8.8', ext: 'aar')’)
}
```

### Step 3: Add Dependencies in Build Gradle File

Add the following lines to your app's `build.gradle` file. 

```java: Dependencies
dependencies {
    ...
    implementation 'com.android.support:customtabs:26.1.0'
    implementation 'com.google.android.gms:play-services-tasks:15.0.1'
    implementation 'com.google.android.gms:play-services-wallet:18.0.0'
    ...
}
```

### Step 4: Add Metadata in Android Manifest File

Add the following lines inside the app’s `AndroidManifest.xml` file.

```xml: Adds Meta Data

```

### Step 5: Instantiate and Initialize Razorpay Android Custom SDK

#### Instantiate
To instantiate Razorpay, pass a reference of your activity to the Razorpay constructor, as shown below:

```java: Instantiate Razorpau
import com.razorpay.Razorpay
Razorpay razorpay = new Razorpay(activity);
```
	
#### Initialize
Add your Razorpay API keys to `AndroidManifest.xml`.
	

> **INFO**
>
> 
> **Handy Tips**
>  
> API keys should not be hardcoded in the app. It should be sent from your server-side as an app-related metadata fetch.
> 

	
The sample `AndroidManifest.xml` file with auto-OTP reading feature enabled is shown below:

```xml: AndroidManifest.xml file

  
    
  

```

To set your API key programmatically, that is, at the runtime instead of statically defining it in your `AndroidManifest.xml`, you can pass it as a parameter to the Razorpay constructor, as shown below:

```java: Set API Key Programmatically
Razorpay razorpay = new Razorpay(activity, "YOUR_KEY_ID");
```

### Step 6: Implement Orders API in your Server-side

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call.  Know how to [authenticate](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) Orders API.  
- The order_id received in the response should be passed to the checkout. This ties the Order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

#### API Sample Code

The following is a sample API request and response for creating an order:

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
    "amount": 50000,
    "currency": "INR",
    "receipt": "rcptid_11",
    "partial_payment": true,
    "first_payment_min_amount": 23000
}'
```java: Java
try {
  JSONObject orderRequest = new JSONObject();
  orderRequest.put("amount", 50000); // amount in the smallest currency unit
  orderRequest.put("currency", "INR");
  orderRequest.put("receipt", "order_rcptid_11");

  Order order = razorpay.Orders.create(orderRequest);
} catch (RazorpayException e) {
  // Handle Exception
  System.out.println(e.getMessage());
}
```Python: Python
import razorpay
client = razorpay.Client(auth=("api_key", "api_secret"))

DATA = {
    "amount": 50000,
    "currency": "INR",
    "receipt": "receipt#1",
    "notes": {
        "key1": "value3",
        "key2": "value2"
    }
}
client.order.create(data=DATA)
```php: PHP
$order  = $client->order->create([
  'receipt'         => 'order_rcptid_11',
  'amount'          => 50000, // amount in the smallest currency unit
  'currency'        => 'INR'// [See the list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).)
]);
```csharp: .NET
Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.add("receipt", "order_rcptid_11");
options.add("currency", "INR");
Order order = client.Order.Create(options);
```ruby: Ruby
options = amount: 50000, currency: 'INR', receipt: ''
order = Razorpay::Order.create
```javascript: Node.js
var options = {
  amount: 50000,  // amount in the smallest currency unit
  currency: "INR",
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
    "currency": "INR",
    "receipt": "rcptid_11",
    "status": "created",
    "attempts": 0,
    "notes": [],
    "created_at": 1566986570
}
```

#### Request Parameters

Here is the list of parameters and their description for creating an order:

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
: `string` The currency in which the transaction should be made. See the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). Length must be 3 characters.

  
  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY and three decimal currencies, such as KWD, BHD and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

  

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`id` _mandatory_
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

Know more about [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

#### Response Parameters

Descriptions for the response parameters are present in the [Orders Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/entity.md) table.

#### Error Response Parameters

The error response parameters are available in the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md).

The `razorpay_order_id`, returned on successful creation of the order, should be sent to the Checkout form.

### Step 7: Fetch Payment Methods

To get a list of available payment methods, call `getPaymentMethods`. This fetches the list of payment methods asynchronously and returns the result in JSON format in the `onPaymentMethodsReceived` callback. For the structure of the JSON result, you can refer: https://api.razorpay.com/v1/methods?key_id=`{Your_Key_ID}`

```java: Java
razorpay.getPaymentMethods(new Razorpay.PaymentMethodsCallback() {
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

Know [how to integrate the different payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods.md) using Razorpay Android Custom SDK in detail.

### Step 8: Check if Google Pay Cards is Setup on Customer's Device
	

> **INFO**
>
> 
> **Handy Tips**
> 
> Ensure the Google Pay Cards feature is enabled for your account. If it is not enabled, [get in touch](https://razorpay.com/support/) with us to get it enabled on your account.
> 

Use the code given below to check if Google Pay cards are setup on your customer’s device. 

```java: Java
razorpay.isUserRegisteredOnGpay(this, new GPayCardsRegisteredListener(){
	@Override
	public void isUserRegisteredOnGpay(boolean status){
		//status of user 
	}
}
```kotlin: Kotlin
Razorpay.isUserRegisteredOnGpay(this, object:GpayCardsRegisteredListener() {
  fun isUserRegisteredOnGpay(response:Boolean) {
    isUserRegisteredOnGpay = response
  }
})
```

You should show Google Pay cards method to your customers only when `isUserRegisteredOnGpay` returns true.

### Step 9: Set Up the WebView

The bank ACS pages are displayed to the user in a WebView.
You need to define a WebView in your layout and pass the reference to our SDK using `setWebView`, as shown below:

```java: Java
webview = findViewById(R.id.payment_webview);
// Hide the WebView until the payment details are submitted
webview.setVisibility(View.GONE);
razorpay.setWebView(webview);
```kotlin: Kotlin
webView = findViewById(R.id.payment_webview)
private fun createWebView() {
        razorpay?.setWebView(webView)
    }
```

### Step 10: Submit Payment Data and Handle Success and Error Events

Once you have received the customer's payment information, it needs to be sent to Razorpay to complete the `creation` step of the payment flow. You can do this by invoking the `submit` method. Before invoking this method, you have to make your WebView visible to the customer. The data that needs to be submitted in the form of a `JSONObject` is shown below:

```java: Java
try {

	JSONObject data = new JSONObject();
	data.put("amount", 1000); // pass in currency subunits. For example, paise. Amount: 1000 equals ₹10
	data.put("order_id", "order_DgZ26rHjbzLLY2");//sample order_id. Generate orders using Orders API
	data.put("email", "gaurav.kumar@example.com");
	data.put("contact", "9876543210");
	JSONObject notes = new JSONObject();
	notes.put("custom_field", "abc");
	data.put("notes", notes);
	data.put("provider", "google_pay");

	// Make WebView visible before submitting payment details
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
            payload = JSONObject("{currency: 'INR'}")
            payload.put("amount", "100")
            payload.put("contact", "9000090000")
            payload.put("email", "customer@name.com")
        } catch (e: Exception) {
            e.printStackTrace()
        }
        try {
            payload.put("provider", "google_pay")
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

> **INFO**
>
> 
> **Handy Tips**
> 
> To reuse the Razorpay Checkout web integration inside a web view on Android or iOS, pass a [callback_url](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/callback-url.md) along with other checkout options to process the desired payment.
> 

#### Using `PaymentResultWithDataListener`

You have the option to implement `PaymentResultListener` or `PaymentResultWithDataListener` to receive callbacks for the payment result.

`PaymentResultListener` provides only `payment_id` as the payment result.
`PaymentResultWithDataListener` provides additional payment data, such as `email` and `contact` of the customer, along with the `order_id`, `payment_id`, `signature` and more.

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
```

### Step 11: Store the Fields in the Server

@include integration-steps/store-fields

### Step 12: Verify Payment Signature

@include integration-steps/verify-signature
