---
title: Link an Offer to a Subscription
description: Link an Offer to a Subscription on the Razorpay Dashboard.
---

# Link an Offer to a Subscription

After creating an Offer and a Subscription Plan, you need to link the Offer to a Subscription.

- [Link an Offer while creating a Subscription](#link-an-offer-when-creating-a-subscription)
- [Link an Offer to an active Subscription](#link-an-offer-to-an-existing-subscription)

You can also [delete an Offer linked to a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers/delete.md).

## Link an Offer While Creating a Subscription

Watch this video to see how to link an Offer to a Subscription.

[Video: https://www.youtube.com/embed/SoGr8jsfp24]

You can link an Offer while creating a Subscription from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers/link/#link-an-offer-while-creating-a-subscription-from.md) or using [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers/link/#link-an-offer-while-creating-a-subscription-using.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Offers for Subscriptions are only available when using Razorpay Standard Checkout.
> 

### Link an Offer While Creating a Subscription From Dashboard

You can link an Offer to a Subscription by selecting the required Offer using the **Offer** drop-down list when creating the Subscription.

![link offer when creating a subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/subscriptions-offers-link_offer_when_creating_subscription.jpg.md)

Know more about [Subscription Links](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-subscription-links.md).

### Link an Offer While Creating a Subscription Using APIs

Use the [Link an Offer to a Subscription API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/#link-an-offer-to-a-subscription.md).

## Link an Offer to an Existing Subscription

You can link an Offer to a Subscription or update the Offer linked to a Subscription from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers/link/#link-an-offer-to-an-existing-subscription-from.md) or using [API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers/link/#link-an-offer-to-an-existing-subscription-using.md).

- This is possible only if the Subscription is in the `active` state and not in any other state.
- The Offer is applied to the Subscription at the end of the current billing cycle. It is not possible to update an Offer linked to a Subscription immediately.

### Link an Offer to an Existing Subscription From Dashboard

You can link an Offer to an existing active Subscription by selecting the required Offer using the **Offer** drop-down when updating the Subscription.

![link an offer to an existing active subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/subscriptions-offers-link_offer_to_existing_subscription.jpg.md)

Know more about [updating a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/update.md).

### Link an Offer to an Existing Subscription Using APIs

Use the [Update a Subscription API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/#update-a-subscription.md) to link an Offer to an existing active Subscription by passing the `offer_id: ` in the request body.

### Related Information

- [About Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers.md)
- [Create Subscription Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers/create.md)
- [Update an Offer Linked to a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers/update.md)
- [Delete an Offer Linked to a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers/delete.md)
