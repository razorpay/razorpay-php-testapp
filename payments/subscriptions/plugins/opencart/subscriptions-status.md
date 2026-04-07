---
title: Subscriptions | OpenCart | Subscription Status
heading: Subscription Status
description: Check the different Subscription statuses mapped between OpenCart and Razorpay Subscriptions.
---

# Subscription Status

## OpenCart Subscriptions Status And Razorpay Subscription Status Mapping

The subscription status names used by Razorpay and OpenCart are different. The table below shows the mapping between the subscription statuses names used by Razorpay and OpenCart. Know more about the [Razorpay Subscriptions states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/states.md).

OpenCart Subscription Status | Razorpay Subscription Status | Description
---
Pending | Created | This is the initial status of the subscription before the authentication/first payment transaction is complete.
---
Active | Authenticated, Active | This is the status of the subscription once the payment transaction is successfully completed.
---
On-hold | Pending | The subscription acquires this status when it is suspended or halted. This is done when a charge on the customer's card is unsuccessful.
---
Cancelled | Cancelled | The `cancel` option is used to cancel the subscription altogether. Once a subscription is cancelled, it cannot be restarted.
---
Expired | Complete | The subscription acquires this status when the expiry period mentioned during the subscription creation comes to an end.
