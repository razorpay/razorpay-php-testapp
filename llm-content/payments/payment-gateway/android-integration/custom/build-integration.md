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

Add your [API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) to `AndroidManifest.xml`.

  
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
> The auto-OTP reading feature is available only for saved cards. Know more about [saved cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#flash-checkout).
> 

To set your API key programmatically, that is, at the runtime instead of statically defining it in your `AndroidManifest.xml`, you can pass it as a parameter to the Razorpay constructor, as shown below:

```java
Razorpay razorpay = new Razorpay(activity, "YOUR_KEY_ID");
```

## 1.3 Create an Order in Server

**Order is an important step in the payment process.**

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call. Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) Orders API.
- The `order_id` received in the response should be passed to the checkout. This ties the order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

You can create an order using:

    
        Use this endpoint to create an order using the Orders API.

        /orders

        ```curl: Curl
        curl -X POST https://api.razorpay.com/v1/orders 
        -U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
        -H 'content-type:application/json'
        -d '{
            "amount": 50000,
            "currency": "",
            "receipt": "qwsaq1",
            "partial_payment": true,
            "first_payment_min_amount": 230
        }'
        ```java: Java
        RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 50000); // amount in the smallest currency unit
        orderRequest.put("currency", "");
        orderRequest.put("receipt", "order_rcptid_11");

        Order order = razorpay.Orders.create(orderRequest);
        } catch (RazorpayException e) {
        // Handle Exception
        System.out.println(e.getMessage());
        }
        ```Python: Python
        import razorpay
        client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

        DATA = {
            "amount": 50000,
            "currency": "",
            "receipt": "receipt#1",
            "notes": {
                "key1": "value3",
                "key2": "value2"
            }
        }
        client.order.create(data=DATA)
        ```php: PHP
        $api = new Api($key_id, $secret);

        $api->order->create(array('receipt' => '123', 'amount' => 50000, 'currency' => '', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
        ```csharp: .NET
        RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

        Dictionary options = new Dictionary();
        options.Add("amount", 50000); // amount in the smallest currency unit
        options.add("receipt", "order_rcptid_11");
        options.add("currency", "");
        Order order = client.Order.Create(options);
        ```ruby: Ruby
        require "razorpay"
        Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

        options = amount: 50000, currency: '', receipt: ''
        order = Razorpay::Order.create
        ```javascript: Node.js
        var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

        instance.orders.create({
        amount: 50000,
        currency: "",
        receipt: "receipt#1",
        notes: {
            key1: "value3",
            key2: "value2"
        }
        })
        ```go: Go
        import ( razorpay "github.com/razorpay/razorpay-go" )
        client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

        data := map[string]interface{}{
        "amount": 50000,
        "currency": "",
        "receipt": "some_receipt_id"
        }
        body, err := client.Order.Create(data)
        ```

        ```json: Success Response
        {
            "id": "order_IluGWxBm9U8zJ8",
            "entity": "order",
            "amount": 50000,
            "amount_paid": 0,
            "amount_due": 50000,
            "currency": "",
            "receipt": "rcptid_11",
            "offer_id": null,
            "status": "created",
            "attempts": 0,
            "notes": [],
            "created_at": 1642662092
        }
        ```json: Failure Response
        {
        "error": {
            "code": "BAD_REQUEST_ERROR",
            "description": "Order amount less than minimum amount allowed",
            "source": "business",
            "step": "payment_initiation",
            "reason": "input_validation_failed",
            "metadata": {},
            "field": "amount"
        }
        }
        ```
    
    
        You can use the Postman workspace below to create an order:

        [![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-6f15a901-06ea-4224-b396-15cd94c6148d)

        
> **INFO**
>
> 
> 
>         **Handy Tips**
> 
>         Under the **Authorization** section in Postman, select **Basic Auth** and add the Key Id and secret as the Username and Password, respectively.
>         

        You can create an order manually by integrating the API sample codes on your server.
    

    
### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit. For example, for an actual amount of , the value of this field should be `22225`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
     - `true`: The customer can make partial payments.
     - `false` (default): The customer cannot make partial payments.

`first_payment_min_amount` _optional_
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of ₹7,000 is to be received from the customer in two installments of #1 - ₹5,000, #2 - ₹2,000, then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

        

    
### Response Parameters

         Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) parameters table.
        

    
### Error Response Parameters

         The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
        

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

Check the various [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods.md) available with Razorpay Android Custom SDK.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> If you are using Subscriptions, you can pass the `subscription_id` in the options, which fetches subscription-related details along with the payment method. This saves you a network call to get amount for that `subscription_id`. Know more about [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md).
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

`key` _mandatory_
: `string` API Key ID generated from **Dashboard** → **Account & Settings** → [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `10000`. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>     

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. For example, `INR`. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

    
> **INFO**
>
> 
> 
>     **Handy Tips**
> 
>     Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>     

`description` _optional_
: `string` Description of the product shown in the Checkout form. It must start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown in the Checkout form. Can also be a **base64** string, if loading the image from a network is not desirable.

`order_id` _mandatory_
: `string` Order ID generated via the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`method` _mandatory_
: `string` The payment method used by the customer on Checkout. 
Possible values:
    - `card` (default)
    - `upi` (default)
    - `netbanking` (default)
    - `wallet` (default)
    - `emi` (default)
    - `cardless_emi` (requires [approval](https://razorpay.com/support/#request))
    - `paylater` (requires [approval](https://razorpay.com/support/#request))
    - `emandate` (requires [approval](https://razorpay.com/support/#request))

`card` _mandatory if method=card/emi_
: `object` The details of the card that should be entered while making the payment.

            `number` 
            : `integer` Unformatted card number.

            `name`
            : `string` The name of the cardholder.

            `expiry_month`
            : `integer` Expiry month for card in MM format.

            `expiry_year`
            : `integer` Expiry year for card in YY format.

            `cvv`
            : `integer` CVV printed on the back of the card.
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             - CVV is not required by default for tokenised cards across all networks.
>             - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>             - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>             - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>             - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.   
>             

            `emi_duration`
            : `integer` Defines the number of months in the EMI plan.

`bank_account` _mandatory if method=emandate_
: The details of the bank account that should be passed in the request. These details include bank account number, IFSC code and the name of the customer associated with the bank account.

    `account_number`
    : `string` Bank account number used to initiate the payment.

    `ifsc`
    : `string` IFSC of the bank used to initiate the payment.

    `name`
    : `string` Name associated with the bank account used to initiate the payment.

`bank` _mandatory if method=netbanking_
: `string` Bank code. List of available banks enabled for your account can be fetched via [**methods**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#fetch-supported-methods).

`wallet` _mandatory if method=wallet_
: `string` Wallet code for the wallet used for the payment. Possible values:
    - `payzapp` (default)
    - `olamoney` (requires [approval](https://razorpay.com/support/#request))
    - `phonepe` (requires [approval](https://razorpay.com/support/#request))
    - `airtelmoney` (requires [approval](https://razorpay.com/support/#request))
    - `mobikwik` (requires [approval](https://razorpay.com/support/#request))
    - `jiomoney` (requires [approval](https://razorpay.com/support/#request))
    - `amazonpay` (requires [approval](https://razorpay.com/support/#request))
    - `paypal` (requires [approval](https://razorpay.com/support/#request))
    - `phonepeswitch` (requires [approval](https://razorpay.com/support/#request))

`provider` _mandatory if method=cardless_emi/paylater_
: `string`  Name of the cardless EMI provider partnered with Razorpay.

  Available options for Cardless EMI (requires [approval](https://razorpay.com/support/#request)):
    - `hdfc`
    - `icic`
    - `idfb`
    - `kkbk`
    - `zestmoney`
    - `earlysalary`
    - `walnut369`

  Available options for Pay Later:
    - `lazypay`
    - `paypal`

`vpa` _mandatory if method=upi_
: `string`  UPI ID used for making the payment on the UPI app. 

    
> **WARN**
>
> 
>     **Deprecation Notice**
> 
>     UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [ migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md) to switch to UPI Intent.
>     

`callback_url` _optional_
: `string` The URL to which the customer must be redirected upon completion of payment. The URL must accept incoming `POST` requests. The callback URL will have `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` as the request parameters for a successful payment.

`redirect` _conditionally mandatory_
: `boolean` Determines whether customer should be redirected to the URL mentioned in the
`callback_url` parameter. This is mandatory if `callback_url` parameter is used. Possible values:
    - `true`: Customer will be redirected to the `callback_url`.
    - `false`: Customer will not be redirected to the `callback_url`

> **INFO**
>
> 
> **Handy Tips**
> 
> To reuse the Razorpay Checkout web integration inside a web view on Android or iOS, pass a [callback_url](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/callback-url.md) along with other checkout options to process the desired payment.
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

A successful payment returns the following fields to the Checkout form.

  
### Success Callback

- You need to store these fields in your server.
- You can confirm the authenticity of these details by verifying the signature in the next step.

```json: Success Callback
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
    

## 1.8 Verify Payment Signature

This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

  
### To verify the `razorpay_signature` returned to you by the Checkout form:

     1. Create a signature in your server using the following attributes:
        - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
        - `razorpay_payment_id`: Returned by Checkout.
        - `key_secret`: Available in your server. The `key_secret` that was generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

     2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

         ```html: HMAC Hex Digest
         generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

           if (generated_signature == razorpay_signature) {
             payment is successful
           }
         ```
         
     3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
    

  
### Generate Signature on Your Server

Given below is the sample code for payment signature verification:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

boolean status =  Utils.verifyPaymentSignature(options, secret);

```php: PHP
$api = new Api($key_id, $secret);

$api->utility->verifyPaymentSignature(array('razorpay_order_id' => $razorpayOrderId, 'razorpay_payment_id' => $razorpayPaymentId, 'razorpay_signature' => $razorpaySignature));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
       razorpay_order_id: 'order_IEIaMR65cu6nz3',
       razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
       razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
     }
Razorpay::Utility.verify_payment_signature(payment_response)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.utility.verify_payment_signature({
  'razorpay_order_id': razorpay_order_id,
  'razorpay_payment_id': razorpay_payment_id,
  'razorpay_signature': razorpay_signature
  })

```c: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("razorpay_order_id", "order_IEIaMR65");
options.Add("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.Add("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50");

Utils.verifyPaymentSignature(options);

```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var { validatePaymentVerification, validateWebhookSignature } = require('./dist/utils/razorpay-utils');
validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);

```Go: Go
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

    

  
### Post Signature Verification

After you have completed the integration, you can [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md), make test payments, replace the test key with the live key and integrate with other [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
    

## 1.9 Verify Payment Status

> **INFO**
>
> 
> **Handy Tips**
> 
> On the Razorpay Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
> 

    
### You can track the payment status in three ways:

    
        To verify the payment status from the Razorpay Dashboard:

        1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
        2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**.
        ![](/docs/assets/images/testpayment.jpg)
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

## Integrate Payments Rainy Day Kit

Use Payments Rainy Day kit to overcome payments exceptions such as:
- [Late Authorisation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md)
- [Payment Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md)
- [Payment Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/test-integration.md)

### Related Information
- [Integrate With Android Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom.md)
- [Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods.md)
- [Troubleshooting & FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/troubleshooting-faqs.md)

- [Additional Support for Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/additional-features.md)
