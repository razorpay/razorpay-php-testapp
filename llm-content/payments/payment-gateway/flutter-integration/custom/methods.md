---
title: Methods
description: Check the payment methods available for the Flutter plugin.
---

# Methods

Documented below are the methods for the Flutter plugin.

## Interface Methods

### getPaymentMethods

Use this method for fetching the payment methods:

```js: Get Payment Methods
onPressed: () {
   final paymentMethods = await _razorpay.getPaymentMethods();
}
```

### getAppsWhichSupportUpi
 
Use this method for fetching those apps on the customer's phone which support UPI payments:
 
```js: Get Apps which support UPI
onPressed: () {
   final supportedUpiApps = _razorpay.getAppsWhichSupportUpi();
}
```

### getCardNetwork

Use this method to get the card network. This function expects the card number as a parameter and returns the card network. For example, VISA, Mastercard, RuPay and so on:
 
```js: Get Card Network
onPressed: () {
   final cardNetwork = _razorpay.getCardsNetwork("");
}
```

 
### isValidCardNumber
 
Use this method to validate the card number. This function returns a boolean value that determines the card is valid or invalid:
 
```js: Is Valid Card Number
onPressed: () {
   final isValidCard = await _razorpay.isValidCardNumber('');
}
```

### getBankLogoUrl

You must use bank code as the method parameter returned in the `getPaymentMethod()` to fetch the bank logo URL. 
 
```js: Get Bank Logo URL
onPressed: () {
final bankLogoUrl = _razorpay.getBankLogoUrl("");
}
```

### changeApiKey

Use this method for changing the API keys:
 
```js: Change API Key
onPressed: () {
   _razorpay.changeApiKey(‘api-key’);
}
```

### getCardNetworkLength

Use this method for fetching the card network length:

```js: Get Card Network Length
onPressed: () {
   final length = await _razorpay.getCardNetworkLenght('VISA');
}
```

### getSubscriptionAmount

Use this method for fetching the subscription amount using the `subscription_id`:
 
```js: Get Subscription Amount
onPressed: () {
   final subAmount = await _razorpay.getSubscriptionAmount('sub_8tkmbhhROdiVSc');
}
```

### getWalletLogoUrl

Use this method for fetching the wallet logo URL:
 
```js: Get Wallet Logo URL
onPressed: () {
   final walletLogo = await _razorpay.getWalletLogoUrl('paytm');
}
```

### Submit

Use this method for submitting the payment details:

 
```js: Submit Payment Details
onPressed: () {
   var options = {
           'key': key,
           'amount': 100,
           'currency': '',
           'email': '',
           'contact': '',
           'method': 'netbanking',
           'bank': 'hdfc'
       };
   _razorpay.submit(options);
}
```

## Listening to Events

Events are triggered from the SDK for handling success or error on payments, Register for these events in the initState() method in their flutter apps as given below:

```js: Listening to Events
@override
void initState() {
  _razorpay = Razorpay();
  _razorpay.initilizeSDK(key);
  _razorpay.on(Razorpay.EVENT_PAYMENT_SUCCESS, _handlePaymentSuccess);
  _razorpay.on(Razorpay.EVENT_PAYMENT_ERROR, _handlePaymentError);
}

void _handlePaymentSuccess(Map response) {
  print('Payment Success Response : $response');
}

void _handlePaymentError(Map response) {
  print('Payment Error Response : $response');
}
```

## Error Codes

The error codes have been exposed as integers by the `Razorpay` class. The error code is available as the code field of the `PaymentFailureResponse` instance passed to the callback.

Error Code | Description
---
NETWORK_ERROR | There was a network error. For example, loss of internet connectivity.
---
INVALID_OPTIONS | An issue with options passed in `Razorpay.open`.
---
PAYMENT_CANCELLED | User cancelled the payment.
---
TLS_ERROR | Device does not support TLS v1.1 or TLS v1.2.
---
UNKNOWN_ERROR | An unknown error occurred.
