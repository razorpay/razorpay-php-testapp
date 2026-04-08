---
title: Additional Support for Payment Methods
description: Additional support features available for card, netbanking, wallets and more.
---

# Additional Support for Payment Methods

Use the Razorpay Android Custom SDK to integrate supported payment methods on the Checkout form of your Android app as per your business requirements. Here are some **additional methods** provided by the SDK for the integration and usage of payment methods:

- [Card Utilities](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/additional-features.md#card-utilities)
- [Validate VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/additional-features.md#validate-vpa)
- [Fetch Logo](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/additional-features.md#logo)
- [Validate Data](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/additional-features.md#data-validation)
- [Custom `WebViewClient` and `WebChromeClient`](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/additional-features.md#custom-webviewclient-and-webchromeclient)
- [Save Customer Data](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/additional-features.md#save-customer-data)

## Card Utilities

You can use these methods for card payment method integration.

#### Fetch Card Network

                             
The SDK provides a method to get the card network name of the provided card number. 

- At least 6 digits of the card number are required to identify the network. 

- Possible values returned by this method are, `visa`,  `mastercard`, `maestro16`, `amex`, `rupay`, `maestro`, `diners` and `unknown`.

- If it is not able to identify the network it returns `unknown`.

```java: Java
razorpay.getCardNetwork(cardNumber);
```

## Card Number Validation

The SDK provides a checksum-based method to determine if the entered card number is valid or not.

```java: Java
razorpay.isValidCardNumber(cardNumber);
```
#### Fetch Card Number Length for Card Network

The SDK provides a method to get the length of the card number for a specific card network.

```java: Java
razorpay.getCardNetworkLength(cardNetworkName);
```

## Validate VPA

The SDK provides a method to determine if the entered Virtual Payment Address (VPA) is valid or not. A failure response is triggered when the `vpaAddress` is empty or the device is not connected to data to make the validation.

```java: Java
razorpay.isValidVpa("9000090000@ybl", new ValidateVpaCallback() {
            @Override
            public void onResponse(JSONObject response) {
              if(response.has("error")){
                    //VPA validation error: Invalid VPA
                }else if(response.has("success")){
                    //VPA Validation Successful: Valid VPA
                }
            }

            @Override
            public void onFailure() {
               //called in cases where the vpaAddress is empty or when the device is not connected to data to make the validation. 
            }
});
```java: Valid VPA
{
  "vpa": "9000090000@okaxis",
  "success": true,
  "customer_name": null
}
```java: Invalid VPA
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Invalid VPA. Please enter a valid Virtual Payment Address",
    "source": "customer",
    "step": "payment_initiation",
    "reason": "invalid_vpa",
    "metadata": {},
    "field": "vpa"
  }
}
```

## Logo

#### Fetch Bank Logo URL

The SDK provides a method to fetch the bank logo's URL, here `bankCode` is the code of bank, you will be able to get it from the response received in `onPaymentMethodsReceived` callback.

```java: Java
razorpay.getBankLogoUrl(bankCode);
```

#### Fetch Wallet Logo URL

The SDK provides a method to get the wallet logo's URL.

```java: Java
razorpay.getWalletLogoUrl(walletName);
```

#### Fetch Wallet Square Logo URL

The SDK provides a method to get the wallet's square-shaped logo's URL.

```java: Java
razorpay.getWalletSqLogoUrl(walletName);
```

## Data Validation

The SDK provides basic validation for the payment data `JSONObject`. In case of a validation error, the SDK returns an error map in the `onValidationError` callback function.

#### Sample Code

The sample code shown below describes a validation error on the `contact` field:

```java: Java
razorpay.validateFields(payload, new ValidationListener() {
   @Override
   public void onValidationSuccess() {
       try {
           webview.setVisibility(View.VISIBLE);
           outerBox.setVisibility(View.GONE);
           razorpay.submit(payload, PaymentOptions.this);
       } catch (Exception e) {
           Log.e("com.example", "Exception: ", e);
       }
   }

   @Override
   public void onValidationError(Map error) {
       Log.d("com.example", "Validation failed: " + error.get("field") + " " + error.get("description"));
       Toast.makeText(PaymentOptions.this, "Validation: " + error.get("field") + " " + error.get("description"), Toast.LENGTH_SHORT).show();
   }
});
```

## Custom WebViewClient and WebChromeClient

Our SDK sets an instance of `RazorpayWebViewClient` and `RazorpayWebChromeClient` to the WebView passed to facilitate bank page optimizations. If you want to set your own custom `WebViewClient` you have to extend `RazorpayWebViewClient` and pass it to our SDK.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> This step is optional and is only required when you want to set a custom `WebViewClient`/`WebChromeClient`
> 

#### Sample Code

The sample code given below shows how to customize the `RazorpayWebViewClient`:

```java: Java
/**
 * Extend the RazorpayWebViewClient for your custom hooks
 */
razorpay.setWebviewClient(new RazorpayWebViewClient(razorpay){

  @Override
  public void onPageStarted(WebView view, String url, Bitmap favicon) {
      // Make sure you do not forget to call the super method
      super.onPageStarted(view, url, favicon);
      Log.d(TAG, "Custom client onPageStarted");
  }

  @Override
  public void onPageFinished(WebView view, String url) {
      // Make sure you do not forget to call the super method
      super.onPageFinished(view, url);
      Log.d(TAG, "Custom client onPageFinished");
  }
});
```

Similarly, you can set your own `WebChromeClient`:

```java: Java
/**
 * Extend the RazorpayWebChromeClient for your custom hooks
 */
razorpay.setWebChromeClient(new RazorpayWebChromeClient() {
	@Override
	public void onProgressChanged(WebView view, int newProgress) {
		// Make sure you do not forget to call the super method
		super.onProgressChanged(view, newProgress);
		customProgressBar.setProgress(newProgress);
	}
});

```

## Save Customer Data

You can associate card details with a saved customer or create payments using tokens for saved cards. To use this functionality, you must use [customer APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) at server side.

#### Create a Payment With New Card

While creating a payment with new card, you would need to pass the `customer_id` and `save` as extra fields, along with the other fields as shown below:

```java: JAVA
JSONObject data = new JSONObject();
data.put("amount", 29935);
data.put("customer_id", "cust_4lsdkfldlteskf");
data.put("save", 1);
data.put("method", "card");
data.put("card[name]", "Gaurav Kumar");
data.put("card[number]", "4386289407660153");
data.put("card[expiry_month]", "12");
data.put("card[expiry_year]", "20");
data.put("card[cvv]", "100");
```

#### Create a Payment With Existing Saved Card

To create a payment with an existing saved card, you have to pass the token instead of the card number, expiry and card holder's name fields as shown below:

```java: JAVA
JSONObject data = new JSONObject();
data.put("amount", 29935);
data.put("customer_id", "cust_4lsdkfldlteskf");
data.put("token", "token_4zwefDSCC829ma");
data.put("method", "card");
data.put("card[cvv]", "100");
```
