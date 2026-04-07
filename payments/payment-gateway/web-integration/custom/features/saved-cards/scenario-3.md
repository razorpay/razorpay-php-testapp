---
title: Business Seeks Consent from Some Customers Only
description: Procedure to follow if you are not able to collect consent from all customers.
---

# Business Seeks Consent from Some Customers Only

If you can collect consent from a few of your users (possibly, new app versions) but unable to collect consent for the rest of your users (possibly, on old app versions), follow the steps below.

## 1. On Dashboard

Follow these steps:

1. Log in to the Dashboard.
2. Navigate to **Settings** → **Configuration**.
3. Enable the **Collect Consent from Customers** feature. This means that Razorpay is responsible for collecting the customer consent.

## 2. In Integration Code

#### Business Collecting Customer Consent

If you are collecting customer consent, ensure that you pass the following parameters in the **Create Payment** request:

```js: Custom Checkout

  Pay
  
       var razorpay = new Razorpay({
        key: "",
        image: "https://i.imgur.com/n5tjHFD.jpg",
        name: "",
       });
       var data = {
        amount: 6666,
        currency: "",
        email: "",
        order_id: "order_ISsp1ekSCHgoAw",
        contact: ,
        notes: {
          address: "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
        },
        customer_id: "cust_1Aa00000000001",
        save: 1,
        consent_to_save_card: 1,
        method: "card",
        card[number]: '4242424242424242',
        card[expiry_month]: '11',
        card[expiry_year]: '23',
        card[cvv]: '123',
        card[name]: ''
       };

       document.getElementById("rzp-button1").onclick = function(){
        razorpay.createPayment(data);
        razorpay.on("payment.success", function(resp) {
          alert(resp.razorpay_payment_id)
          });
        razorpay.on("payment.error", function(resp){alert(resp.error.description)});
}

```

> **INFO**
>
> 
> **Handy Tips**
> 
> You can convert a token BIN received in response to an **actual BIN** using [token APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor/apis.md).
> 

#### Business Not Collecting Customer Consent

If you are not collecting customer consent, ensure that you pass the following parameters in the **Create Payment** request:

```js: Custom Checkout

  Pay
  
       var razorpay = new Razorpay({
        key: "",
        image: "https://i.imgur.com/n5tjHFD.jpg",
        name: "",
       });
       var data = {
        amount: 6666,
        currency: "",
        email: "",
        order_id: "order_ISsp1ekSCHgoAw",
        contact: ,
        notes: {
          address: "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
        },
        customer_id: "cust_1Aa00000000001",
        save: 1,
        method: "card",
        card[number]: '4242424242424242',
        card[expiry_month]: '11',
        card[expiry_year]: '23',
        card[cvv]: '123',
        card[name]: ''
       };

       document.getElementById("rzp-button1").onclick = function(){
        razorpay.createPayment(data);
        razorpay.on("payment.success", function(resp) {
          alert(resp.razorpay_payment_id)
          });
        razorpay.on("payment.error", function(resp){alert(resp.error.description)});
}

```

> **INFO**
>
> 
> **Handy Tips**
> 
> You can convert a token BIN received in response to an **actual BIN** using [token APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor/apis.md).
>
