---
title: Delete an Offer Linked to a Subscription
description: Remove an Offer from a Subscrition using Dashboard or APIs.
---

# Delete an Offer Linked to a Subscription

You can delete an Offer linked to a Subscription from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/delete.md#delete-an-offer-linked-to-a-subscription-from) or using [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/delete.md#delete-an-offer-linked-to-a-subscription-using). The invoices generated after the offer is deleted will be charged in full.

## Delete an Offer Linked to a Subscription From Dashboard

To delete an Offer linked to a Subscription:

1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
1. Click on the **Subscription Id** for which you want to update the offer.
1. Click **Remove** against Offer.
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     The offer will be removed from the Subscription only at the end of the cycle. It is not possible to remove an offer linked to a Subscription immediately.
>     

1. Click **Yes, Remove**.
    

## Delete an Offer Linked to a Subscription Using APIs

Use the [Delete an offer Linked to a Subscription API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions/delete-offer.md).

@include subscriptions/subscriptions/subscriptions-delete-offer

### Related Information

- [About Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers.md)
- [Create Subscription Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/create.md)
- [Link an Offer to a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/link.md)
- [Update an Offer Linked to a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/update.md)
