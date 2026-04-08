---
title: Create Subscriptions via Links
description: Create a Subscription link from the Razorpay Dashboard.
---

# Create Subscriptions via Links

If you do not have a website or app, you can still create and send Subscriptions to customers using a link. When the customer opens the link, they are taken to a checkout page hosted by Razorpay, where they make the authorisation payment. You can also use this feature to create and send custom Subscriptions to customers. 

Subscription Links can be created from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-subscription-links.md#create-a-subscription-link-from-dashboard) or using [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-subscription-links.md#create-a-subscription-link-using-api).

## Subscriptions via Links Flow

Below is a high-level overview of Subscriptions via links.

To create a Subscriptions link from the Dashboard, you need to:
1. [Create a plan](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-plans.md#create-a-plan).
1. [Create and send a Subscription link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-subscription-links.md#create-a-subscription-link).

## Create a Subscription Link From Dashboard

Watch this video to see how to create Subscription Links.

[Video: https://www.youtube-nocookie.com/embed/PgvzuvbNQlM]

    
### To create a Subscription Link:

         1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
         1. Click **+ Create New Subscription**. The **Create Subscription** screen displays.
         1. Select the required plan from the **Select Plan** drop-down list.
         1. Select the **Subscription Start Date**.
            
> **INFO**
>
> 
>             **Trial Period**
> 
>             To create a trial period for your customers, all you need to provide is a future start date. The actual billing cycle automatically starts at the specified date, essentially creating a trial period.
>             

         1. Enter the **Total Count**. This defines how many times the customer should be charged (the number of billing cycles).

            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             You can create a Subscription for a maximum of 30 years, and the **Total Count** differs depending on the selected plan. For example, If you select a monthly plan, the **Total Count** is calculated as per the below formula:
> 
>             *Monthly=>(Number of months in a year(12) * Number of Years supported (30)) / Interval (1 as every month in this example)*
> 
>             As per this formula, the **Total Count** for the monthly Subscription should be, *(12 * 30)/1 = 1200*
>             

         1. Select the required offer from the **Offer** drop-down and click **Next**.
         1. Select **I want to add an upfront amount**.
         1. Click the drop-down and click **+Create New Item**. The **Add Upfront Amount** screen appears in a pop-out window.
         1. Add the following details and click **Save**.
            - **Name**
            - **Rate per unit**
            - **Description** (optional)
         1. You can add additional items using the **Add New Item** option.
         1. Click **Next** once you have added all items tagged as upfront amount.

            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             - All the created add-on items display in the **Select Item to Add** drop-down.
>             - The upfront amount and add-ons will have the same currency as the plan.
>             

         1. Enter the customer's mobile number and/or email address.
         1. Select the **Notify Customer** check box if you want Razorpay to automatically send the Subscription Link to the customer via email to make the authorisation payment.
         1. Set an expiry date for the link.
         1. Add internal notes, if required.
         1. Click **Next** once you have entered all the required details.

            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             If the **Notify Customer** check box is **not** selected, Razorpay does not send the customer the Subscription Link to make the authorisation payment.
>             

         1. Review the details and click **Create Subscription Link** to send the link to the customer.
        

## Create a Subscription Link Using API

You can create a Subscription Links using [Create a Subscription Link API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions/create-subscription-link.md).

### Related Information

- [Create and View Plans](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-plans.md)
- [Charge a Card Manually](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/manually-charge-card.md)
- [Update a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/update.md)
- [Subscriptions Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/settings.md)
