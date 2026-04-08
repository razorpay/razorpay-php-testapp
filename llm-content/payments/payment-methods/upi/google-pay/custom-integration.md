---
title: Google Pay Integration - Custom Checkout
description: Integrate Google Pay at Razorpay's Custom Checkout page for desktop, mobile-web (M-Web) and Android apps.
---

# Google Pay Integration - Custom Checkout

To enable Google Pay at your Custom Checkout:

1. Show Google Pay as a separate option.
2. Trigger payment when the user clicks Google Pay at your checkout.

Google Pay, [previously Google Tez](https://pay.google.com/intl/en_in/about/), can be integrated using two types of UPI flows:

- **Collect Request Flow**: This flow is available on desktop and mobile browsers. The customers enter their Google Pay VPA on the checkout form. Upon triggering a payment request via Razorpay’s `upi` method, the Collect request reaches the customer’s Google Pay application. The customer then completes the payment.

- **Intent-based Payment**: This flow is applicable only to mobile and mobile-web payments. In these cases, the customer is redirected to Google Pay’s application to complete the payment. Intent-based payments are available on the Android SDK and on Google Chrome for Android (v56 and above, but not on Google Chrome WebViews).

## Prerequisites

1. [Sign up](https://support.google.com/pay/business/answer/7684271?hl=en&ref_topic=7684388) for a business account with Google Pay.
1. [Contact our Support Team](https://razorpay.com/support/#request) and have them whitelist your VPA (UPI ID).
1. Verify your VPA (UPI ID) details on the [Google Merchant Console](https://support.google.com/pay/business/answer/7684398?hl=en&ref_topic=7684388). Google deposits a small amount into the bank account linked to your VPA (UPI ID).
1. You should have already integrated one of the following:
    - [Razorpay Web Integration - Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md).
    - [Razorpay Android Integration - Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom.md).
1. [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.

### General Branding Guidelines

Refer to [Google's Branding Guidelines](https://developers.google.com/pay/api/web/guides/brand-guidelines) to learn about the general branding guidelines for Google Pay on the front-end of your websites and apps.

## Desktop Integration

On desktop browsers, the Collect request flow works the same way as [Razorpay's UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#upi).

1. Collect the customer's VPA and pass it in the payment request with method as `upi`.
2. Razorpay then triggers a Collect request. The collection request is sent to the customer's Google Pay application where they can make the payment.

## Mobile-Web Integration (Google Chrome)

> **INFO**
>
> 
> **Handy Tips**
> 
> As the APIs exposed by Google Pay are available only in Chrome's JavaScript engine, you will need to use our JavaScript-based integration.
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is only available for webpages running on HTTPS.
> 

On mobile-web, for intent-based payments, the flow should be as follows:

1. Check if Google Pay is installed on the user’s device. If installed, show the necessary UI elements.
1. Once the user chooses to pay using Google Pay, you can initiate an intent-based payment from your checkout.
1. Google Chrome will request the user to make a payment using Google Pay.

### Detect Google Pay Installation on Device

1. Add Razorpay.js to your website

    ```html
    
    ```

    Know more about [Custom Web Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md).

1. Instantiate Razorpay

    ```js
    var razorpay = new Razorpay({  key: '' });
    ```

1. Detect if Google Pay on available on the device

    ```js
    razorpay.checkPaymentAdapter('gpay')
      .then(() => {
        // Google Pay is available, show the payment option
      })
      .catch(() => {
        // Google Pay is unavailable
      });
    ```

### Initiate Payment Using Google Pay

1. Create a payment through Google Pay. Skip passing the `vpa` field in the payment data and pass `{ gpay: true }` as the second argument to `createPayment`.

    ```js
    var paymentData = {
      amount: 100000, //pass in paise (amount: 100000 equals ₹1000)
      method: 'upi',
      contact: '9000090000',  // customer's mobile number
      email: 'gaurav.kumar@example.com',  //customer's email address
      order_id: 'order_00000000000001'//..  and other payment parameters, as usual
    };
    razorpay.createPayment(paymentData, { gpay: true });
    .on('payment.success', function(response) {
      // response.razorpay_payment_id
      // response.razorpay_order_id
    })
    .on('payment.error', function(error) {
      // display error to customer
    })
    ```

Refer to the [Success/Error Callbacks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md#14-store-fields-in-your-server) section for more details.

## Android Integration

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#intent-flow). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md).
> 

### Intent-Based Integration

On Android, for intent-based payments, first you need to check if Google Pay is installed on the user’s device. You can use the `razorpay.getAppsWhichSupportUpi` method to retrieve the list of apps that support intent-based payments installed on a phone.

When a user selects Google Pay as the payment method, you need to submit the Google Pay's package name along with other checkout options to the Razorpay function `razorpay.submit`:

```java
try
{
  JSONObject data = new JSONObject();
  data.put("amount", 100000); //pass in paise (amount: 100000 equals ₹1000)
  data.put("email", "gaurav.kumar@example.com");  //customer's email address
  data.put("contact", "9876543210");  //customer's mobile number
  data.put("order_id", "order_00000000000001");  //Razorpay Order id
  JSONObject notes = new JSONObject();
  notes.put("custom_field", "Make it so.");  //notes for the payment, if any
  data.put("notes", notes);

  data.put("method", "upi");  //Method specific fields
  data.put("_[flow]", "intent");
  data.put("upi_app_package_name", "com.google.android.apps.nbu.paisa.user");
  razorpay.submit(data, new PaymentResultWithDataListener()

  {
    @Override
      public void onPaymentSuccess(String razorpayPaymentId, PaymentData data)
      {
        // Razorpay payment ID, Razorpay order ID and Razorpay Signature is passed here after a successful payment
        // You will need the payment ID to capture the payment on your end
      }

    @Override
    public void onPaymentError(int code, String description)
    {
    // Error code and description is passed here
    }
  });
}
catch (Exception e)
{
  Log.e(TAG, "Error in submitting payment details", e);
}
```

Additionally, if you want to open Google Pay within your application for customers to make the payment without any redirection, you can do so by integrating with [Google Pay SDK](#intent-based-integration-using-google-pay-sdk).

#### Intent-Based Integration Using Google Pay SDK

You also have the option to integrate Google Pay with the Custom Checkout on your Android app using Google's SDK.

This offers the advantage of letting you open Google Pay within your application for customers to make the payment without any redirection, improving the user experience.

### Collect-Based Integration

This is the same as the existing [UPI Collect Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods.md#collect-flow).

1. Collect the customer's VPA and pass it in the payment request, with method as `upi`.
2. Razorpay then triggers a collect request. The collection request is sent to the customer's Google Pay application, where they can make the payment.

**NPCI Restrictions for UPI Collect Flow**

As per NPCI guidelines, the following MCC codes are restricted and cannot accept UPI Collect payments:

  
### Restricted MCC Codes

     
     MCC Code | Category
     ---
     5816 | Digital Goods: Games
     ---
     6540 | POI Funding Transactions (excluding MoneySend)
     ---
     4812 | Telecommunication Equipment and Telephone Sales
     ---
     4814 | Telecommunication Services
     ---
     7408 | Lending Platform
     ---
     6513 | Real Estate Agents and Managers - Rentals
     ---
     7995 | Betting/Lottery
     ---
     5412 | Grocery Stores, Supermarkets
     ---
     5413 | Grocery Stores, Supermarkets
     
    

To integrate Google Pay with the Checkout on your Android app using Google's SDK:

1. Download the [Google Pay SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/google-pay-client-api-1.0.0.aar) and add the `.aar` files to the application library.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     The Razorpay-Google Pay SDK acts as a wrapper over the native Google-SDK. This SDK connects Razorpay's SDK with the Google SDK. You need all the 3 SDKs (listed below) for the flow to work.
>     - Razorpay Android SDK
>     - Google Pay SDK
>     - Razorpay-Google Pay SDK
>     

1. Add the following lines of code to the `build.gradle` file of your application:

    ```java: build.gradle
        dependencies {
          implementation(name: 'razorpay-googlepay-1.3.0', ext: 'aar')
          implementation(name:'google-pay-client-api-1.0.0  ', ext:'aar')
          implementation 'com.android.support:customtabs:26.1.0'
          implementation 'com.google.android.gms:play-services-tasks:15.0.1
        }
    ```

This adds the dependencies for the SDK and creates a Google Pay UPI payment method on your Checkout form.
