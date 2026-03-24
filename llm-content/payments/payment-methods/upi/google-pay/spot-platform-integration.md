---
title: Google Spot Platform Integration
description: Accept payments using your app on the Google Pay Spot Platform at the Razorpay Custom Checkout.
---

# Google Spot Platform Integration

You can use your existing Razorpay custom integration to accept payments via your app on the Google Pay Spot platform.

## What is Google Pay Spot Platform

You can use the Google Pay Spot Platform to set up your Spot on Google Pay. A Spot is a digital storefront that you can create, brand and host, the way you want.

Know more about [Google Spot Platform](https://developers.google.com/pay/spot/).

## Advantages

Given below are the advantages:
- You need not handle reconciliation separately.
- You do not have to integrate directly with Google Pay.

## Workflow

Following are the payment flow steps:

1. The customer logs into the Google Pay app.
1. The customer clicks on your app, selects a product or service, and clicks the **Pay** button.
1. The Razorpay Custom Checkout creates and sends a payment request to Google Pay.
1. The customer completes the payment on the Google Pay app.
1. After the payment is complete, the customer receives an order confirmation (After you get a payment confirmation from Custom Checkout).

## Prerequisites

1. Contact our [Support Team](https://razorpay.com/support/#request) to get a dedicated VPA (UPI ID). This VPA is for Google Spot Platform Integration.
1. [Sign up](https://support.google.com/pay/business/answer/7684271?hl=en&ref_topic=7684388) for a business account with Google Pay.
1. Verify your VPA (UPI ID) details on the [Google Merchant Console](https://support.google.com/pay/business/answer/7684398?hl=en&ref_topic=7684388). Here, Google deposits a small amount into the bank account linked to your VPA (UPI ID). It might take up to 48 hours for the money to reflect in your account.
    
> **INFO**
>
> 
>     **Tips for Multiple VPAs**
> 
>     If you have multiple VPAs, you need to verify all of them individually on the Google Merchant Console.
>     

1. [Generate API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from the Dashboard.

## Integration Steps

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is available only on the Chrome browser on your Android mobile devices.
> 

### Step 1: Create an Order

@include integration-steps/order-creation

### Step 2: Invoke Checkout and Pass Order ID and Other Options to it

#### Step 2.1: Include the Razorpay Custom Checkout JavaScript

Include the following script, preferably in the `` section of your page:

```html: razorpay.js

```

> **INFO**
>
> 
> **Include the Javascript, Not the Library**
> 
> Include the script from https://checkout.razorpay.com/v1/razorpay.js instead of serving a copy from your server. This allows new updates and bug fixes to the library to get automatically served to your application.
> 
> We always maintain backward compatibility with our code.
> 

#### Step 2.2: Include the Google Spot JavaScript

Include the following script, preferably in the `` section of your page:

```html: microapps.js

```

#### Step 2.3: Instantiate Razorpay Custom Checkout

#### Single Instance on a Page

```js
var razorpay = new Razorpay({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
});
```

#### Multiple Instances on Same Page

If you need multiple Razorpay instances on the same page, you can globally set some of the options:

```js
Razorpay.configure({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
})
new Razorpay({}); // will inherit key and image from above.
```

#### Step 2.4: Submit Payment Details

Once the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. The data that needs to be submitted depends upon the payment method selected by the customer.

You can do this by invoking the `createPayment` method.

The checkout parameters are listed [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/google-pay/spot-platform-integration/checkout-parameters.md).

#### Apply Offers

During checkout, if there is a co-branded offer run by GooglePay, you should apply the discount, and pass on the offer details to Google. Use [these offers parameters](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/google-pay/spot-platform-integration/checkout-parameters/#offers-parameters.md) to pass the offer details.

The `razorpay.js` file receives this data and appends this to the existing data being shared with Google.

> **INFO**
>
> 
> **Handy Tips**
> 
> Razorpay will be agnostic to whatever data is passed within this additional information section. You must structure the data as per Google's formats.
> 

```js: CreatePayment with handler function
var data = {
  amount: 100, // in paise, 1000 equals ₹10, // in paise, 100 equals ₹1
  email: 'gaurav.kumar@example.com',
  contact: '9876543210',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_F8RF6kSs1NXHJZ',
  method: 'upi',
  customer_id: 'cust_00000000000001',
  additional_info: { //used to pass offer details to Google
       "displayItems": [{
        "type": "SUBTOTAL",
        "price": "20.00",
      },
      {
        "type": "DISCOUNT",
        "price": "-10.00",
      }],
      "offerInfo": {
          "offers": [{
              "redemptionCode": "DISCOUNT10",
          }
        ],
      }
  }
}
};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
    // has to be placed within user initiated context, such as click, in order for popup to open.
  window.onload = function(){
      var paymentData = data;
      razorpay.checkPaymentAdapter('microapps.gpay')
        .then(() => {
          // Google Pay Microapps API is available, show the payment option
          pay();
        })
        .catch(() => {
          console.log('Gpay adapter not available');
        });
      function pay(){
        var paymentData = data;
          razorpay.createPayment(paymentData, { microapps: { gpay: true } });
          razorpay.on('payment.success', function(resp) {
            alert(resp.razorpay_payment_id),
            alert(resp.razorpay_order_id),
            alert(resp.razorpay_signature),
            alert(resp.transaction_reference)}); // will pass payment ID, order ID, Razorpay signature and transaction reference to success handler.
          razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler
          razorpay.on('payment.cancel', function(resp){alert(resp.error.description)});
        }
})
```js: CreatePayment with callback URL
var data = {
  callback_url: 'https://www.examplecallbackurl.com/',
  amount: 100, // in paise, 1000 equals ₹10, // in paise, 100 equals ₹1
  email: 'gaurav.kumar@example.com',
  contact: '9876543210',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_F8RF6kSs1NXHJZ',
  method: 'upi',
  customer_id: 'cust_00000000000001',
  additional_info: { // Used to pass offer details to Google
       "displayItems": [{
        "type": "SUBTOTAL",
        "price": "20.00",
      },
      {
        "type": "DISCOUNT",
        "price": "-10.00",
      }],
      "offerInfo": {
          "offers": [{
              "redemptionCode": "DISCOUNT10",
          }
        ],
      }
  }
}

};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
    // has to be placed within user initiated context, such as click, in order for popup to open.
  window.onload = function(){
      var paymentData = data;
      razorpay.checkPaymentAdapter('microapps.gpay')
        .then(() => {
          // Google Pay Microapps API is available, show the payment option
          pay();
        })
        .catch(() => {
          console.log('Gpay adapter not available');
        });
      function pay(){
        var paymentData = data;
          razorpay.createPayment(paymentData, { microapps: { gpay: true } });
          razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler
          razorpay.on('payment.cancel', function(resp){alert(resp.error.description)});
        }
})
```

### Step 3: Store fields in your Database

@include integration-steps/store-fields

### Step 4: Verify the Signature

@include integration-steps/verify-signature

### Step 5: Send Payment Details to Google

Once the payment is complete and signature verified, you must pass the **UPI reference ID** to Google.

1. Copy the **UPI reference ID** from `resp.transaction_reference` which you will receive as part of the `payment.success` response in [step 2.4](#step-24-submit-payment-details).
1. Add it as the value for the `transactionReferenceId` parameter in the Google Spot Orders API.
1. Fire the Google Spot Orders API.

> **INFO**
>
> 
> **Handy Tips**
> 
> You need to be signed in with a whitelisted ID to view the Google Spot Orders API document.
> 
> If you get a 404 error on the above link, contact [Google Support](mailto:spot-support@google.com) and ask them to whitelist your ID.
> 

### Payment Capture Settings

@include integration-steps/capture-settings

## Test Integration

Now that the integration is complete, you must ensure that your integration works as expected.

Make a test transaction, verify the payment status from Dashboard, APIs or subscribe to related Webhook events to take appropriate actions at your end. After testing the integration, you can start accepting payments from your customers in real-time.

> **INFO**
>
> 
> **Handy Tips**
> 
> - The Google Pay Spot Platform only supported UPI payments.
> - Testing can only be done with real money. You can make low-value transactions to test the integration.
> 

#### Verify Payment Status

You can track the payment status from the Dashboard or subscribe to the Webhook event or poll our APIs.

#### From Dashboard

1. Log in to the Dashboard and navigate to **Transactions** → **Payments**.
1. Look if a `payment_ID` has been generated.  If no `payment_ID` has been generated, it means that the transaction has failed.
  ![](/docs/assets/images/testpayment.jpg)

#### Subscribe to Webhook events

You can subscribe to a Webhook event that is generated when a specific event happens in our server. When one of those events is triggered, Razorpay sends the Webhook payload to the configured URL.

Know more about how to [set up Webhooks.](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)

When the customer makes a successful payment on the Checkout, the `payment.authorized` event is created in Razorpay.

#### Poll APIs

You can retrieve the status of the payments by polling our [Payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-multiple-payments.md).

### Related Information

@include integration-steps/related-info
