---
title: UPI Intent on Mobile Web
description: Let your customers make UPI Intent payments on your mobile websites.
---

# UPI Intent on Mobile Web

Integrate UPI Intent on your mobile app. UPI Intent works for UPI PSP apps and is available on Android and iOS.

> **WARN**
>
> 
> **Watch Out!**
> 
> Razorpay UPI Intent is currently not available on CFB (Customer Fee Bearer) model.
> 

## Prerequisites
- [Sign up](https://dashboard.razorpay.com/#/access/signup) for a Razorpay account.
- [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.
- Integrate with [Razorpay Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md).

## Integration Steps

Follow the steps given below to integrate UPI intent on your mobile app:

**1.1** [Show Available Apps](#11-show-available-apps)

**1.2** [Initiate Payments Using the Intent App](#12-initiate-payment-using-the-intent-app)

### 1.1 Show Available Apps

Follow the steps given below to show the available UPI intent apps to your customers:

1. Add Razorpay.js file to your website. Skip this step if you have already completed it.

    ```js: JavaScript
    
    ```

2. Instantiate Razorpay with your Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys). Skip this step if you have already completed it.

    ```js: JavaScript
    var razorpay = new Razorpay({  key: '' });
    ```

3. Call the `getSupportedUpiIntentApps` method to get a list of the supported UPI Intent apps. 

    ```js: JavaScript
    razorpay.getSupportedUpiIntentApps()
    .then(() => {
      // get list of apps available for payment
    })
    .catch(() => {
      // no apps available
    });
    ```

    We recommend calling the above function and showing only these options to your customers: 

    
      
### List of Supported UPI Apps - One-Time Payments

         
         Android | iOS
         ---
         - gpay
- phonepe
- paytm
- cred
- bhim
- popclubapp
- mobikwik
- super_money
- moneyview
- icici
- navi
- payzapp
- any
 | - gpay
- phonepe
- paytm
- cred
- bhim
- popclubapp
- mobikwik
- super_money

         

         
> **INFO**
>
> 
>           **Handy Tips**
> 
>           The below functionality is only available for Android.
>           
>           - The `any` option triggers the other UPI payment apps installed on your customer's mobile. 
>           -  You can use `razorpay.checkPaymentAdapter` to check if Gpay is available on your customer's mobile device. You can show only a specific app using the following:
>       
>             ```js: Gpay
>             razorpay.checkPaymentAdapter('gpay')
>             .then(() => {
>               // gpay is installed
>             })
>             .catch(() => {
>               // gpay app not installed
>             });
>             ```
>           

        

      
### List of Supported UPI Apps - Recurring Payments

        
        Android | iOS
        ---
        - Google Pay
- BHIM
- PhonePe
- PayTM
- Amazon Pay
| - Google Pay
- PhonePe
- PayTM

        
        

    

        
### 1.2 Initiate Payment Using the Intent App

Use the code below to initiate UPI intent payments from your app:

```js: JavaScript
var paymentData = {
    amount: 100000, //pass in paise (amount: 100000 equals ₹1000)
    method: 'upi',
    contact: '9000090000',  // customer's mobile number
    email: 'gaurav.kumar@example.com',  //customer's email address
    order_id: 'order_00000000000001' //.. and other payment parameters, as usual
  };
  razorpay.createPayment(paymentData, { app: 'phonepe'});
   razorpay.on('payment.success', function(response) {
   // response.razorpay_payment_id
   // response.razorpay_order_id
  });
  razorpay..on('payment.error', function(error) {
   // display error to customer
  });
```

## List of Possible Errors

Below is a list of errors you might face while initiating payments:

```js: JSON
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Payment failed with selected app.",
    "reason": "intent_no_apps_error"
  },
  "_silent": false
}

{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "UPI transactions are not enabled for the merchant",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  },
  "status_code": 400
}

{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Payment failed with selected app.",
    "reason": "intent_no_apps_error"
  },
  "_silent": false
}

{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "You may have cancelled the payment or there was a delay in response from the UPI app.",
    "source": "customer",
    "step": "payment_authentication",
    "reason": "payment_cancelled",
    "metadata": {
      "payment_id": "pay_LA4ZngnumqsKFW"
    }
  },
  "status_code": 400,
  "_silent": false
}
```

#### Error Response Parameters

Given below is a list of possible errors, and their causes:

Error | Cause 
---
Payment failed with selected app | The app passed in create payments methods is not supported
Example: If you pass 'phone' instead of  'phonepe'. 
---
UPI transactions are not enabled for the merchant | UPI and UPI Intent methods are not supported.
---
Payment failed with selected app | Razorpay is not able to open the selected app.
---
Payment Canceled | Customer calls `cancelPayment` by triggering the exposed method.

### Best Practices

Follow these best practices while integrating Razorpay UPI intent with your mobile website: 

1. Only activate the UPI payment intent when a customer initiates it rather than when the page loads.
2. Create a payment immediately after the customer clicks the pay button without extended async operations between these two steps.
3. When a customer chooses a UPI payment method, pass the value into `razorpay.createPayment(paymentData, {app: 'phonepe'})`.
4. Display a loading screen after starting the UPI payment intent flow. Wait until you receive a "success" or "failure" response before cancelling the flow. 

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     If you have enabled `redirect: true` on your end, you will receive the success or failure case as a POST request on the callback URL.
>     

  
5. We recommend you provide an option to cancel the payment to your customers on the loading screen.
6. Call the `razorpay.emit('payment.cancel')` method to cancel the payment. You can also call this method if a customer exits your app without completing the transaction. Razorpay will then terminate the payment.
