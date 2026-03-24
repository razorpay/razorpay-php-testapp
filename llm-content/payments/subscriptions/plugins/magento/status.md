---
title: Subscriptions | Magento | Subscription Status
heading: Subscription Status
description: Comparison between the states of Razorpay Subscriptions and Magento.
---

# Subscription Status

## Understand the Subscription Status

The subscription status names used by Razorpay and Magento are different. The table below shows the mapping between the subscription statuses names used by Razorpay and Magento. Refer to the Razorpay Subscriptions status flow [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/states.md).

Magento Subscription Status | Razorpay Subscription Status | Description
---
Pending | Created | This is the initial status of the subscription before the authentication/first payment transaction is complete.
---
Active | Authenticated, Active | This is the Subscription status once the payment transaction has been completed.
---
On-hold | Pending | The subscription acquires this status when it has been suspended or halted. This is done when a charge on the customer's card is unsuccessful.
---
Cancelled | Cancelled | The `cancel` option is used to cancel the subscription altogether. Once a subscription is cancelled, it cannot be restarted.
---
Expired | Complete | The subscription acquires this status when the expiry period mentioned during the subscription creation comes to an end.
