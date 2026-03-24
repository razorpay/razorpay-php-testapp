---
title: 1. Native OTP Integration
description: Integrate the Razorpay Native OTP feature with iOS Custom Checkout.
---

# 1. Native OTP Integration

Razorpay payment gateway supports one-time passwords (OTPs) in the Checkout itself, preventing the customers from being redirected to the ACS page of their respective issuing banks.

## Advantages

Using the Native OTP feature, you can:
- Increase success rates.
- Reduce payment failures due to low internet speeds.
- Avoid failures due to redirects to bank pages.
- Offer a consistent experience on mobile and web checkout.

## Prerequisites

Before implementing the Native OTP feature, check the following prerequisites:

1. Log in to the Dashboard and generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md).
2. Integrate with the [Razorpay iOS Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom.md).

## Integration Steps

**1.1** [Initialise the Razorpay iOS Custom SDK](#11-initialise-the-razorpay-ios-custom-sdk)

**1.2** [Check Native OTP enablement using `getCardsFlow` function](#12-check-native-otp-enablement-using-the-getcardsflow)

**1.3** [Generate OTP using the `razorpay.getCardOtpData` function](#13-generate-otp-using-the-razorpaygetcardotpdata-function)

**1.4** [Handle Success and Error Events](#14-handle-success-and-error-events)

**1.5** [Store Details in Server](#15-store-the-fields-in-server)

**1.6** [Verify Payment Signature](#16-verify-payment-signature)

### 1.1 Initialise the Razorpay iOS Custom SDK

Use the code given below to initialise the SDK.

```swift:Initialise SDK
razorpay = RazorpayCheckout.initWithKey(,
andDelegate:,
withPaymentWebView:) 
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> WebView is used to fall back to the current Custom UI flow or redirect to bank flow.
> 
> 

### 1.2 Check Native OTP Enablement Using the getCardsFlow Function

Use the `getCardsFlow` function to determine whether the native OTP flow is enabled for the card BIN.

Given below is the sample code.

```swift: getCardsFlow
razorpay.getCardFlows(options){ otp in 
if otp == true { }  //Native OTP is enabled on the card
else { }            //Fallback to current Custom UI flow
}

```

The card details are passed in the options dictionary, as shown below:

```swift: Payment details
{
  "method": "card",
  "card": {
    "name": "Gaurav Kumar",
    "number": "4386289407660153",
    "cvv": "111",
    "expiry_month": "11",
    "expiry_year": "2023"
  },
  "amount": 100,
  "contact": "9000090000",
  "email": "gaurav.kumar@example.com",
  "currency": "INR"
}
```

### 1.3 Generate OTP Using the razorpay.getCardOtpData Function

If Native OTP is enabled for the BIN, you should call the `razorpay.getCardOtpData` function. The function callback returns a boolean and informs whether the OTP was successfully sent to the customer or not. Based on this information, you can display the generated OTP UI to the customer.

Given below is the sample code:

```swift: getCardOtpData
razorpay.getCardOtpData { otp_generated in 
if otp_generated == true { }    //Display Native OTP UI
else { } //Fallback to current Custom UI flow
}
```

After the OTP is generated, the customer can choose to:
- Submit the OTP.
- Request for the OTP to be resent.
- Cancel the OTP.
- Navigate to the bank page.

#### Submit the OTP

The customer needs to submit the OTP for authenticating the payment. The customer receives the OTP through your application frontend. For card payments, the customer receives the OTP via their preferred notification medium, SMS or email.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Do not perform any validation on the length of the OTP since this can vary across banks. However, the OTP should not be blank.
> 

Given below is the function to be invoked when customer clicks the submit button:
   
```swift: Submit OTP
func submitRazorpayOtp(otp){
    razorpay.submitOtp(otp)
}   
```

#### Resend OTP 

There could be situations when customers have to re-generate the OTP. Given below is the function to be invoked when the customer clicks the resend button: 
   
```swift: Resend OTP
func resendRazorpayOtp(){
    razorpay.resendOtp {otp_resent in
        if otp_resent {}
    }
}
```

#### Cancel the OTP

Cancel the payment by cancelling the OTP. 
Given below is the function to be invoked when customer clicks the cancel button:
   
```swift: Cancel OTP
func cancelRazorpayPayment(){
    razorpay.userCancelledPayment()
    }
```

#### Redirect to Bank Page

Customers can navigate to the bank page by clicking the redirect button. You need to:

1. Display the payment WebView passed earlier while initialising the SDK.
2. Invoke the `redirectToBankPage()` function.

```swift: Invoke redirect function
func redirectToBankPage(){
razorpay.redirectToBankPage()
}
```

### 1.4 Handle Success and Error Events

You must handle the payment success and error events using the `RazorpayPaymentCompletionProtocol` delegate methods:

```swift: Payment Success
func onPaymentSuccess(_ payment_id:String, andData response:[[AnyHashable]:Any])
```swift: Payment Failure
func onPaymentError(_ code: Int32, description:String, andData response:[[AnyHashable] :Any])
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> To reuse the Razorpay Checkout web integration inside a WebView on Android or iOS, pass a [callback_url](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/callback-url.md) along with other checkout options to process the desired payment.
> 

## 1.5 Store the Fields in Server

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
    

## 1.6 Verify Payment Signature

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
