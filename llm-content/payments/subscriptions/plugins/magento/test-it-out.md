---
title: Test it out - Sign up for a Subscription
description: Make a test purchase of a Subscription on your Magento site without incurring any charges.
---

# Test it out - Sign up for a Subscription

Let us sign up for a subscription to **GoFlicks PremiumWatch HD**.

> **WARN**
>
> 
> **Watch Out!**
> 
> Use the Test API keys when testing the product so that no real money is used.
> 

1. In your Magento site, add the product to your cart and proceed to checkout.
2. The Razorpay Checkout pop-up appears.

    ![](/docs/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-6.jpg)

Since this is a test transaction, you can choose to make it a success or failure. Let us make this transaction a success.

![](/docs/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-7.jpg)

## On the Magento Site

### Customer View

The order success screen appears. The subscription amount has not been charged to the card because of the 15 days trial period. Once the trial period is over, the subscription amount of ₹999 will be charged to the customer's card.

An authentication charge of ₹5 is levied and is subsequently auto-refunded.

![](/docs/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-9.jpg)

Navigate to **My Account** → **My Subscriptions** to view the Subscription details.

### Admin View

As an **Admin**, you can view the subscription captured on the **Sales** → **Razorpay Subscription** page.
