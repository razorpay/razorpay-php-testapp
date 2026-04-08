---
title: Manage Subscriptions
description: Reactivate, refund, cancel or put an existing Razorpay Subscription on hold for Magento plugin.
---

# Manage Subscriptions

## Update the Subscription Product

Razorpay Subscriptions plugin for Magento does not support updating an existing subscription product.

Creating a new subscription product is recommended instead of updating an existing one. You cannot update the details of a subscription for a customer or upgrade or downgrade the subscription for them once it has gone live.

If you modify the details of an existing subscription product on **WooCommerce** and make a test payment, it will appear as a **New Plan** on the . Hence, you must cancel the existing subscription and create a new one, and hereafter the customer will have to subscribe to the newly created subscription.

When a subscription has been put on hold, you can use the **reactivate** option to restart the subscription once you successfully charge the customer's card. This changes the subscription status to **active** on the . Note that the **reactivate** button will only be displayed where the payment is not due.

## Cancel a Subscription

The `cancel` option is used to cancel the subscription altogether. You can cancel a subscription:

- Immediately OR
- At the end of the current billing cycle

Following are the steps to cancel a subscription:

1. Navigate to **WooCommerce** → **Subscriptions**.
1. Hover over the subscription you want to put on hold and click **Cancel**.

Once an existing subscription is cancelled, it cannot be restarted.

## Pause a Subscription

The `suspend` option is used to pause the subscription.

When a store manager suspends a subscription, all payments will stop for the period the subscription is suspended.

Following are the steps to pause a subscription:

- Navigate to **WooCommerce** → **Subscriptions**.
- Hover over a subscription to see actions that can be performed on the subscription.
- To temporarily pause a subscription, click **Suspend**.

## Resume a Subscription
The `reactivate` option is used to resume the subscription.

When a subscription is reactivated, the payment schedule will continue as before the subscription was suspended. 

Following are the steps to pause a subscription:

- Navigate to **WooCommerce** → **Subscriptions**
- Hover over a subscription to see actions that can be performed on the subscription.
- To resume a suspended subscription, click **Reactivate**.

## Refund Subscription Amount

You also need to mark the subscription as refunded on [WooCommerce in WordPress Dashboard](https://docs.woocommerce.com/document/woocommerce-refunds/#section-4) by selecting the **Refunded** option from the **Order Status** drop-down list.
