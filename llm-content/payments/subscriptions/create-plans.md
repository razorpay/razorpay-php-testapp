---
title: Create and View Plans
description: Create a Subscription Plan and view a list of created plans.
---

# Create and View Plans

You must create a Plan before you create a Subscription.

> **INFO**
>
> 
> 
> **International Currency**
> 
> Create the plan in the currency you want to charge the customer. You can select any one of our [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md) to create a Plan.
> 

## Create a Plan

You can create a Plan in two ways: [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-plans/#create-a-plan-from-dashboard.md) and [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-plans/#create-a-plan-using-apis.md)

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - Plans with `daily` frequency should have the interval set to a value greater than 7.
> - Once a Plan is created, you cannot edit or delete it.
> 

### Create a Plan From Dashboard

Watch this video to see how to create a Plan from the Dashboard.

[Video content]

To create a plan:

1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
2. Go to **Plans** and click **+ New Plan**. The **New Plan** window displays.
3. Enter the following details:
    1. **Plan Name:** Name of the plan.
    1. **Plan Description:** A brief description for the plan. This is an optional field.
    1. **Billing Frequency:** How often should the customer be charged.
    1. **Billing Amount:** Amount to be charged. Refer to the [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md) page for information on currencies.
    1. **Internal Notes:** Any internal notes if required.
4. Click **Create Plan**.

### Create a Plan Using APIs

You can create a Subscription Plan using the [create a plan API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/#create-a-plan.md).

## View Plan Details

You can view Plan details in two ways: [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-plans/#view-plan-details-using-dashboard.md) and [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-plans/#view-plan-details-using-api.md)

### View Plan Details Using Dashboard

To view Plan details:

1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
2. Go to **Plans** and click on the required **Plan Id** to view its details.

![](/docs/assets/images/view_plan_details.jpg)

### View Plan Details Using API
- View all Plans using the [fetch all plans API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/#fetch-all-plans.md).
- View a Plan with an id using the [fetch a plan by id API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/#fetch-a-plan-by-id.md).

### Related Information

- [Create Subscriptions via Links](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-subscription-links.md)
- [Charge a Card Manually](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/manually-charge-card.md)
- [Update a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/update.md)
- [Subscriptions Settings](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/settings.md)
