---
title: Subscription Workflow Changes
description: Check the changes made by Razorpay on the Subscription workflow.
---

# Subscription Workflow Changes

Razorpay is committed to continuously innovating its products to provide the best payment experience to its customers. As a part of this endeavour, we have made certain modifications to our Subscription product to optimize customer experience and overall conversion.

## Workflow Changes

The standard procedure for mandate registration and subsequent debits remains unchanged. However, the following functionalities are deprecated:

### Domestic Cards

The following use cases are deprecated for Subscriptions activated using domestic cards.

**Manually Charge a Card From Dashboard**

You cannot manually charge a card from [dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/manually-charge-card.md#manually-charge-a-card-from-dashboard) for recurring debits. The **Atempt Charge** option is removed from the Dashboard.

![subscription manual charge removal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/subscription-manual-charge-removal.jpg.md)

You can ask customers to update the [payment method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/payment-retries.md#change-the-card-linked-to-the-subscription) or [create a new Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create.md#subscription).

**Update a Subscription**

You can [update](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/update.md) only the offer and not the following information of an active Subscription:
- Plan change
- Quantity change
- Start date change
- No of cycles

The options to update the above mentioned fields are disabled in the Dashboard.

![Domestic Card Update Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/subscription-update-card.jpg.md)

You get the following error if you try to update the Subscription using API.

```json: Error Response
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"Only offers can be updated for subscriptions when payment mode is domestic card",
      "field":"offer_id"
   }
}
```

**Create Add-ons**

You cannot create add-ons to the same Subscription. The customers can [create a new Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create.md#subscription) or bill it as a separate payment.

The option to create an add-on under **Upcoming Invoice** in the Dashboard is removed.

![Domestic Cards Create Add-ons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/create-add-ons.jpg.md)

You get the following error if you try to create an add-on to the same Subscription using API.

```json: Error Response
{
"error":{
    "code":"BAD_REQUEST_ERROR",
    "description":"Addons can't be added for subscriptions when payment mode is domestic card"
    }
}
```

**UPI Autopay**

The following use case is deprecated for Subscriptions activated using UPI autopay:

**Manually Charge a UPI Handle From Dashboard**

An option to manually retry recurring debits is disabled. You can ask customers to update the payment method or [create a new Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create.md#subscription).
