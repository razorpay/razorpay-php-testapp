---
title: Create Add-ons
description: Create add-ons for Subscriptions from the Razorpay Dashboard.
---

# Create Add-ons

Add-ons can be charged to your customers at any time during the life of a Subscription. Add-ons are typically charged for extra services taken by a customer during the billing cycle.

### Example
Consider, Acme Corp. is providing DTH services. A customer wants to add the sports channel pack, which costs an additional , to his Subscription only for the next month.

Before the next billing cycle, Acme Corp. can add  to the customer's current bill amount as an add-on.

Add-ons can be created:
- [Using APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#create-an-add-on).
- [Using the Dashboard](#create-add-ons-from-dashboard).

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - You can only add an Add-on to an upcoming invoice and not to the ones already created.
> - You can charge Add-ons for a single billing cycle only. They are not recurring in nature and will not automatically be added to any future invoices.
> 

## Create Add-ons From Dashboard

Watch this video to see how to add add-ons to the Subscriptions.

To create an add-on:
1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
1. Click on the **Subscription Id** for which you want to create an add-on. Details of the Subscription appear in the right pane. Click the next invoice listed under the **Invoices detail** section.
1.  Click **+ Include Add-on**.
1. Enter the following details:
	1. **Name** for the add-on.
	1. **Description** for the add-on, this is optional.
	1. **Price per unit** for the add-on. This is in the same currency as the plan.
	1. **Quantity**, that is the number of times the customer wants to avail the add-on during the billing cycle.
1. Click **Include**. The add-on amount is added to the Subscription amount and the total is updated.

## Create Add-on Using APIs
You can create add-ons for the Subscriptions using [Create an Add-on](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#create-an-add-on) API.

### Related Information

- [Create and view Plans](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-plans.md)
- [Create Subscriptions via Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-subscription-links.md)
- [Charge a Card Manually](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/manually-charge-card.md)
- [Update a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/update.md)
- [Subscriptions Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/settings.md)
