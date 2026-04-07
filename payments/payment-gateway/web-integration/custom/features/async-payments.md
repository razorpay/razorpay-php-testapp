---
title: Create Async Payment
description: Create Async Payments for Custom Web Integration.
---

# Create Async Payment

The `createPayment` method must be called synchronously within user-initiated action. Hence, this method doesn't work if the pop-up blocker is enabled. You can decouple pop-up opening and payment creation if you need to perform any asynchronous operation such as sending an AJAX request before starting payment. Check the code below:

```js
rp.createPayment(data, {
   paused: true,
   message: 'Confirming order..'
});
```
After you make AJAX requests, emit resume or cancel the event using this code:

```js
if(ajax_success) {
  rp.emit('payment.resume');
} else {
  rp.emit('payment.cancel');
}
```

## Format of Data Object and Success/Error Handlers

`payment.resume`
: Event initiates the usual payment process and emits `payment.success`
or `payment.error` events according to the payment result.

`payment.cancel`
: Razorpay will not initiate the payment.
