---
title: Custom Web Integration - Bring a Popup to the Front
description: Display a pop-up as a visual reminder to the customer indicating that the payment is in progress.
---

# Custom Web Integration - Bring a Popup to the Front

You can bring a pop-up on the screen by calling the `focus` method. This helps as a visual reminder to the customer that the payment is ongoing.

#### Sample Code

```html

var rp = new Razorpay(..);
...

// after some time
Processing Payment...
Take me back to payment

  $('button').click(function(){
    rp.focus(); // will bring popup to top
  })

```
