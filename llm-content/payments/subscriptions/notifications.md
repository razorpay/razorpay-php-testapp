---
title: Subscriptions | Notifications
heading: Notifications
description: Check the types of notifications available for Subscriptions, how they work and the steps to set up webhook events.
---

# Notifications

There are three types of notifications for Subscriptions: Email, SMS and Webhook notifications.

## Email and SMS

Your customers will receive an email and SMS at various events such as:

- The start of the Subscription.
- When a payment is successfully charged.
- When a payment fails.
- Action required by the customer in the event of a payment failure
- When the card linked to a Subscription is changed or updated.
- When a Subscription is moved to the `halted` state post 3 retry attempts of payment failure.
- When a Subscription is cancelled.
- When the details of a Subscription (such as plan, quantity or billing frequency) are updated.

### Types of Emails and SMS

Razorpay sends emails and SMS to customers at 8 different stages during the life cycle of a Subscription. 

Stage | Description
---
`Created`| An email and SMS is sent when you create and send a new Subscription link to a customer to make the authentication payment. The authenticated amount depends on the `upfront_amount` for the Subscriptions.
---
`Initialized`| An email and SMS is sent after the customer successfully makes the authentication payment.
---
`Charged Successfully`| An email and SMS is sent when we make a successful automated charge on the Subscription as per the billing cycle.
---
`Completed` | An email and SMS is sent to the customer when the Subscription moves to the `completed` state. There is no notification sent if the Subscription moves to the same state. This is because the Subscription is already in the `completed` state, and a charge was made on an older invoice.
---
`Charged Failed`| An email and SMS is sent when a charge on a card fails. When an automated charge on a Subscription fails, we retry an auto-charge on the card. If the retries are not exhausted, the Subscription moves to the `pending` state. We send out a notification (email and SMS) every time the Subscription moves to the `pending` state. The email and SMS contains an **Update Card** option for the customer to change the card details associated with the Subscription.
---
`Card Updated` | An email and SMS is sent whenever a customer changes the card details associated with the Subscription. This notification notifies the customer that their new card details are now successfully updated.
---
`Invoice Charge`| An email and SMS is sent when a manual charge is made on an old Subscription invoice (either by you or the customer). If the Subscription was in the `halted` state, we also mention that the Subscription is now `active`, and we will resume the automated charges from the next cycle onwards in the notification.
---
`Halted`| When an automated charge on a Subscription fails, we retry an auto-charge on the card. When all the retries are exhausted, it moves to the `halted` state. We send out a notification (email and SMS) every time the Subscription moves to the `halted` state. These notifications contain the **Update Card** option to change the card linked to the Subscription.
---
`Cancelled`| An email and SMS is sent when the Subscription moves to the `cancelled` state. This happens because either you or your customer cancelled the Subscription.
---
`Subscription Updated`| An email and SMS is sent when the Subscription is successfully updated. There is no state change when a Subscription is updated.

## Webhooks

Know more about [how to set up and subscribe to Subscriptions webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/subscribe-to-webhooks.md).

### Related Information

- [Subscription Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/workflow.md)
- [Subscription States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/states.md)
- [Create Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create.md)
- [Test Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/test.md)
- [Subscriptions APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/apis.md)
