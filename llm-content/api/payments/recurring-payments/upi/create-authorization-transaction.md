---
title: 1. Create an Authorisation Transaction
description: Create an authorisation transaction for UPI using Razorpay APIs and Registration Link.
---

# 1. Create an Authorisation Transaction

@include upi-collect-sunset-autopay/standard

@include recurring-payments/create-auth-tran-rr-custom-two-methods

## 1.1 Using Razorpay APIs

@include recurring-payments/create-auth-tran-rr-custom-checkout-intro

### 1.1.1 Create a Customer

@include recurring-payments/customer/api

  
### Request Parameters

     @include recurring-payments/customer/api-req
    

  
### Response Parameters

     @include recurring-payments/customer/api-res
    

### 1.1.2 Create an Order

@include recurring-payments/auth-order-api-intro

  
### Sample Code

     @include recurring-payments/upi/order-code
    

@include recurring-payments/upi/order-note-freq

  
### Request Parameters

     @include recurring-payments/upi/order-req
    

  
### Response Parameters

     @include recurring-payments/upi/order-res
    

  
### Error Response Parameters

     @include recurring-payments/upi/order-error-res
    

### 1.1.3. Create an Authorisation Payment

Create a payment checkout form for customers to make Authorisation Transaction and register their mandate. You can use the Handler Function or Callback URL.

**Handler Function** | **Callback URL**
---
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server. | When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Callback URL.

> **WARN**
>
> 
> **Watch Out!**
> 
> The callback URL is not supported for recurring payments created using the registration link.
> 

  
### UPI Intent

      UPI Intent is supported on **mWeb (Android)** and **Mobile App (WebView)**. On **Desktop Web**, as UPI Intent is not supported, a QR code is automatically displayed instead. 

      If UPI Intent is not enabled on your account, please reach out to the [support team](https://razorpay.com/support).

      
      Platform | Steps
      ---
      **mWeb** | Customers are redirected to their preferred UPI app to complete the payment. For the complete integration guide, refer to [UPI Intent on Mobile Web](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/upi-intent/#integrate-on-android-ios-and-mobile-web.md).
      ---
      **Mobile App (WebView)** | UPI Intent requires passing `webview_intent: true` in the checkout options and implementing deep link handling in your Android or iOS app. For the complete integration guide, refer to [UPI Intent in WebView — Android](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-android.md) and [UPI Intent in WebView — iOS](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-ios.md).
      ---
      **Desktop Web** | UPI Intent is not supported. A QR code is automatically displayed for customers to scan with their preferred UPI app. No additional code changes are required.
      
    

  
### UPI Collect

      
> **WARN**
>
> 
>       **Deprecation Notice**
> 
>       **UPI Collect is deprecated effective 28 February 2026.** This section is applicable only for exempted businesses. If you are an existing Razorpay user not covered by the exemptions, refer to the [migration documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/recurring-payments/standard-checkout.md) to switch to UPI Intent.
>       

     
      ```html: UPI Collect with handler functions
       Pay 
         
        
          var options = {
            "key": "[YOUR_KEY_ID]",
            "order_id": "order_1Aa00000000001",
            "customer_id": "cust_1Aa00000000001",
            "recurring": "1",
            "handler": function (response) {
              alert(response.razorpay_payment_id);
              alert(response.razorpay_order_id);
              alert(response.razorpay_signature);
            },
            "notes": {
              "note_key 1": "Beam me up Scotty",
              "note_key 2": "Tea. Earl Gray. Hot."
            },
            "theme": {
              "color": "#F37254"
            }
          };
          var rzp1 = new Razorpay(options);
          document.getElementById('rzp-button1').onclick = function (e) {
            rzp1.open();
            e.preventDefault();
          }
        
      ```html: UPI Collect with Callback URL
       Pay 
         
        
          var options = {
            "key": "[YOUR_KEY_ID]",
            "order_id": "order_1Aa00000000001",
            "customer_id": "cust_1Aa00000000001",
            "recurring": "1",
            "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
            "notes": {
              "note_key 1": "Beam me up Scotty",
              "note_key 2": "Tea. Earl Gray. Hot."
            },
            "theme": {
              "color": "#F37254"
            }
          };
          var rzp1 = new Razorpay(options);
          document.getElementById('rzp-button1').onclick = function (e) {
            rzp1.open();
            e.preventDefault();
          }
        
      ```
      
    

#### Additional Checkout Fields

@include recurring-payments/auth-payment-api-additional-fields

`recurring` _mandatory_
: `string` Determines if the recurring payment is enabled or not. Possible values:
    - `1`: Recurring payment is enabled.
    - `preferred`: Use this if you want to allow **recurring payments** and **one-time payment** in the same flow.

  
### Error Response Parameters

     @include recurring-payments/auth-payment-error-res
    

## 1.2 Using a Registration Link

Registration Link is an alternate way of creating an authorisation transaction. You can create a registration link using the [API](#121-create-a-registration-link) or [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#1-create-a-registration-link.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> You do not have to create a customer if you choose the registration link method for creating an authorisation transaction.
> 

- When you create a registration link, an [invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices.md) is automatically issued to the customer. They can use this invoice to make the authorisation payment.
- A registration link should always have an order amount (in paise) the customer is charged when making the authorisation payment. For UPI, the amount must be a minimum of `₹1`.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can [use Webhooks to get notifications about successful payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks/#check-registration-link-status-using-webhooks.md) against a registration link.
> 

### 1.2.1 Create a Registration Link

@include recurring-payments/upi/auth-link

  
### Request Parameters

     @include recurring-payments/auth-link-req-man

     @include recurring-payments/upi/auth-link-req

     @include recurring-payments/auth-link-req-opt
    

  
### Response Parameters

     @include recurring-payments/auth-link-res
    

### 1.2.2 Send/Resend Notifications

@include recurring-payments/send-notification-api

  
### Path Parameters

     @include recurring-payments/send-notification-path-api
    

  
### Response Parameters

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
    - `true`: The notifications were successfully sent via SMS, email or both.
    - `false`: The notifications were not sent.
    

### 1.2.3 Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

  
### Path Parameter

     @include recurring-payments/cancel-path
    

  
### Response Parameters

     @include recurring-payments/auth-link-res
