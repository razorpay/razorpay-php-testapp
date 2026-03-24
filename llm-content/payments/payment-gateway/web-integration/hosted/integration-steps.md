---
title: Hosted Integration - Integration Steps | Razorpay Payment Gateway
heading: Integration Steps
description: Steps to integrate with Razorpay Hosted Web Integration.
---

# Integration Steps

### Video Tutorial

     Watch this video to know how to integrate Razorpay Hosted Checkout on your website. 
     
[Video: https://www.youtube.com/embed/5FdxeGK2Wfo?si]

    

Follow these steps to integrate the Hosted Checkout form on your website:

1. [Build Integration](#1-build-integration): Use the sample codes to integrate the Razorpay Hosted Integration on your website.
2. [Test Integration](#2-test-integration): Make a test payment using the payment methods configured at checkout to ensure the integration is working as expected.
3. [Go-live Checklist](#3-go-live-checklist): Check the go-live checklist before taking the integration live.

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Create an Order in Server

     @include integration-steps/order-creation-v2
    

  
### 1.2 Pass Payment Options to Hosted Checkout

     Add the Pay button on your web page using the checkout code given below. The hosted checkout page is displayed when the customers click the Pay button.
     
       
         1.2.1 Code to Add Pay Button
         
          The Checkout options are sent as form-data to the following URL in a POST request.

          `POST: https://api.razorpay.com/v1/checkout/embedded`

           

          The sample code is given below:

          ```html: Hosted Checkout
          
            
            
            
            
            
            
            
            
            
            
            
            
            
            Submit
          
          ```
          

          

          - For every successful payment, `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` are submitted via a POST request to the `callback_url` passed in payment options.
          - If your customer cancels the transaction or clicks the back button, they are redirected to the `cancel_url` via a GET request.
          - If the payment fails, a POST request is made to the `callback_url`, with the error fields as payload.
         

     
     
       
### 1.2.2 Checkout Options

`key_id` _mandatory_
: `string` Enter [YOUR_Key_ID] generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

`name` _mandatory_
: `string` The business name to be shown in the checkout form.

`description`_optional_
: `string` Description of the item purchased shown in the checkout form.

`image` _optional_
: `string` URL of the logo that must appear on the checkout form.

`order_id` _mandatory_
: `string` Unique identifier of the Order, created using the Orders API.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>     

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`. Refer to the [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies) for a list of supported international currencies.

    
> **INFO**
>
> 
> 
>     **Handy Tips**
> 
>     Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>     

`method` _optional_
: `string` Use this parameter to display a specific payment method in Checkout. Possible values:
  - `card`
  - `netbanking`
  - `wallet`
  - `upi`
  - `paylater`

`prefill`
: The fields that can be pre-populated in the Checkout form.

  `name` _optional_
  : `string` Name of the cardholder.

  `email` _mandatory_
  : `string` Email address of the customer.

  `contact` _mandatory_
  : `string` Customer's phone number.

`notes`_optional_
: `object` An additional set of fields that you want to associate with the payment. For example, you can add "shipping address" and "alternate contact" in the Notes field. You can specify up to 15 note fields.

  `Shipping address`
  : `string` 106, Razorpay, Bangalore

  `Alternate contact`
  : `string` 9000090000

`callback_url` _mandatory_
: `string` Page to which the customers are redirected to after a successful payment. `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` are sent as form-data through a `POST` request to the `callback_url`.

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     Callback URL is not required if you are using the native SDK for Android/iOS.
>     

`cancel_url`_optional_
: `string` The URL customers are redirected to after the cancellation of a payment.
         

     
    
  
  
### 1.3 Store Fields in Your Server

     @include integration-steps/store-fields
    

  
### 1.4 Verify Payment Signature

     @include integration-steps/verify-signature

     Here are the links to our [SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md#github-and-documentation-links-for-sdks) for the supported platforms.
    

  
### 1.5 Verify Payment Status

     @include integration-steps/verify-payment-status
    

## 2. Test Integration

After the integration is complete, a **Pay** button appears on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test transaction is successful.

You can make test payments using one of the payment methods configured at the Checkout.

> **WARN**
>
> 
> **Watch Out!**
> 
> This is a mock payment page that uses your test API keys, test card and payment details. 
> - Ensure you have entered only your [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) in the Checkout code. 
> - Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> 

    
### Supported Payment Methods

         Following are all the payment modes that the customer can use to complete the payment on the Checkout. Some of them are available by default, while others require approval from us. Raise a request from the Dashboard to enable such payment methods.

         

         
         Payment Method | Code | Availability
         ---
         [Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `debit` | ✓
         ---
         [Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `credit` | ✓
         ---
         [Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md) | `netbanking`| ✓
         ---
         [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md) | `upi` | ✓
         ---
         [Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md) | `wallet` | ✓
         ---
         [Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md)| `paylater` | Requires [Approval](https://razorpay.com/support).
         

         

         

         

         ###  Netbanking

         You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.

         Check the list of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md#supported-banks).

         ###  UPI

         You can enter one of the following UPI IDs:

         - `success@razorpay`: To make the payment successful. 
         - `failure@razorpay`: To fail the payment.

         Check the following lists: 
            - [Supported UPI Flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).
            - [UPI Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/upi.md).

         
> **INFO**
>
> 
> 
>          **Handy Tips**
> 
>          You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
>          

         ###  Cards

         You can use the following test cards to test transactions for your integration in Test Mode.

         #### Domestic Cards

         Use the following test cards for Indian payments:

         
         Network | Card Number | CVV & Expiry Date
         ---
         Visa  | 4100 2800 0000 1007 | Use a random CVV and any future date ^^^^^
         ---
         Mastercard | 5500 6700 0000 1002 | 
         ---
         RuPay | 6527 6589 0000 1005 | 
         ---
         Diners | 3608 280009 1007 | 
         ---
         Amex | 3402 560004 01007 | 
         

         Check the following lists: 
            - [Supported Card Networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
            - [Cards Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/cards.md).
            - [Test Error Scenarios](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#error-scenario-test-cards).

         #### International Cards

         Use the following test cards to test international payments. Use any valid expiration date in the future in the MM/YY format and any random CVV to create a successful payment.

         
         Card Network | Card Number | CVV & Expiry Date
         ---
         Mastercard | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 | Use a random CVV and any future date ^^
         ---
         Visa | 4012 8888 8888 1881 | 
         

         ###  Wallet

         You can select any of the listed wallets. After choosing a wallet, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the wallet login portals.

         Check the list of [supported wallets](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).

         

         
        

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Hosted Checkout integration. Consider these steps before taking the integration live.

    
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
