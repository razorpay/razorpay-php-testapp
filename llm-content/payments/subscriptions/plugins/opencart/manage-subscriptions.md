---
title: Manage Subscriptions
description: Reactivate, cancel or put on hold an existing Razorpay Subscription plugin for OpenCart and initiate refunds.
---

# Manage Subscriptions

If you no longer want to use Subscriptions, you can cancel the product. You can also refund the subscription amount to your customers. If you want to update a Subscriptions product, you need to create a new Subscription product.

## View a Subscription Details

To view a Subscription details:

1. Log in to the [OpenCart](https://www.opencart.com/index.php?route=common/home) and go to **My Account**.
2. Click **My subscription** in the right menu to see the list of your Subscriptions.

    ![](/docs/assets/images/opencart-rzp-subs-plugin-sub-list.jpg)

3. Click on the red eye button against the required Subscription to see the details.

    ![](/docs/assets/images/opencart-rzp-subs-plugin-sub-details.jpg)

## Update Subscriptions Product

Razorpay Subscriptions plugin for OpenCart does not support updating an existing Subscription product. So, if you want to update a subscription product, you should create a new subscription product.

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot update the details of a Subscription for a customer or upgrade or downgrade the Subscription for them once it has gone live.
> - If you modify the details of an existing Subscription product on OpenCart and make a test payment, it will appear as a New Plan on the Razorpay Dashboard. Hence, you must cancel the existing Subscription and create a new one and ask your customer to subscribe to the newly created Subscription.
> - When a Subscription is put on-hold, you can use the **reactivate** option to restart the subscription, once you successfully charge the customer's card. This changes the Subscription status to active on the Razorpay Dashboard. The reactivate button will only be displayed where the payment is not due.
> 

![](/docs/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-16.jpg)

## Cancel a Subscription

The `cancel` option is used to cancel the Subscription. You can cancel a Subscription:

- Immediately
- At the end of the current billing cycle

To cancel a Subscription:

1. Navigate to **OpenCart** → **Subscriptions**.
1. Hover over the subscription you want to put on hold and click **Cancel**.

![](/docs/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-17.jpg)

> **WARN**
>
> 
> **Watch Out!**
> 
> After you cancel an existing Subscription, you cannot restart it.
> 

![](/docs/assets/images/rzp-subscriptions-plugin-rzp-subs-plugin-18.jpg)

## Refund Subscription Amount
