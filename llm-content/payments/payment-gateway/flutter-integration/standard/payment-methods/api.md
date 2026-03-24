---
title: API Classes and Methods
description: API classes and methods available for the Flutter plugin.
---

# API Classes and Methods

Documented below is the API package for the plugin.

## Razorpay Class

### Method

`open(map options)`
: Opens the checkout.

`on(String eventName, Function listener)`
: Registers event listeners for payment events.- `eventName`: The name of the event.
- `listener`: The function to be called. The listener should accept a single argument of the following type: [PaymentSuccessResponse](#paymentsuccessresponse) for EVENT_PAYMENT_SUCCESS.
- [PaymentFailureResponse](#paymentfailureresponse) for EVENT_PAYMENT_FAILURE.
- [ExternalWalletResponse](#externalwalletresponse) for EVENT_EXTERNAL_WALLET. 
 

`clear()`
: Clears all listeners.

> **INFO**
>
> 
> **Handy Tips**
> 
> The `options` map has `key` as a required property in the open checkout method. All other properties are optional. Know about all the [options available on checkout form](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/standard/integration-steps#17-add-checkout-options.md).
> 

### Event Names

The event names have been exposed as `strings` by the `Razorpay` class.

Event Name | Description
---
EVENT_PAYMENT_SUCCESS | The payment was successful.
---
EVENT_PAYMENT_ERROR | The payment was not successful.
---
EVENT_EXTERNAL_WALLET | An external wallet was selected.

#### PaymentSuccessResponse

Field Name | Data Type | Description
---
`paymentId` | `string` | The ID for the payment.
---
`orderId` | `string` | The order ID if the payment was for an order, otherwise `null`.
---
`signature` | `string` | The signature to be used for payment verification. Only valid for orders, otherwise `null`.

#### PaymentFailureResponse

Field Name | Data Type | Description
---
`code` | `integer` | The [error code](#error-codes).
---
`message` | `string` | The [error message](#error-codes).

#### ExternalWalletResponse

Field Name | Data Type | Description
---
`walletName` | `string` | The name of the external wallet selected.

## Error Codes

The error codes are exposed as integers by the `Razorpay` class. The error code is available as the code field of the `PaymentFailureResponse` instance passed to the callback.

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
