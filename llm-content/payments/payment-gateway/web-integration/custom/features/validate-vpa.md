---
title: Custom Web Integration - Validate VPA
description: Validate VPA feature for Custom Web Integration.
---

# Custom Web Integration - Validate VPA

If the selected payment method is `upi`,  the user has to enter the `vpa` in the Checkout form. You can check if the entered `vpa` is valid or not using the following code:

@include payment-methods/upi-collect-deprecated/custom

#### Sample Code

```js
var razorpay = new Razorpay({
  key: 'YOUR_KEY_ID',
});
razorpay.verifyVpa(vpa)
  .then(() => {
    // VPA is valid, ask the user to click Pay
  })
  .catch(() => {
    // VPA is invalid, show an error to the user
  });
```
