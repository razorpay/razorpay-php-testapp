---
title: Update a Subscription
description: Update a Subscription - start date, plan, quantity, duration and the notify customer flag.
---

# Update a Subscription

You can update Subscriptions from the [Dashboard](#update-a-subscription-from-dashboard) or using [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/#update-a-subscription.md).

## What Can Be Updated in a Subscription

You can update following parameters of a Subscription that is `active`:

- `Plan` linked to the Subscription.
- `Quantity`, that is the number of times the amount should be charged to the customer per billing cycle. For example, this would be the number of users for a software product.
- `Subscription Start Date` for the updated Subscription details. This can either be immediate or any future date. You can choose to update a Subscription:
    - [Immediately](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/update/#update-subscriptions-immediately.md)
    - [At the end of the current billing cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/update/#update-subscription-at-the-end-of-the-current.md)
- `Total count`, that is the number of billing cycles. This determines the duration of the Subscription.

- `Offer`, this is the offer linked to the Subscription.
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     - For Subscriptions created using domestic cards, you can update only the offer that is linked to them.
>     - You can only update the offer linked to the Subscription at the end of the cycle. It is not possible to update an offer linked to a Subscription immediately.
>     

**Example**

A customer might want to update from a basic plan to an advanced plan that increases the frequency of your service, or they might want to decrease the number of users for a software product. You can update the Subscription for them in such cases, either immediately or at the end of the current billing cycle.

> **WARN**
>
> 
> 
> **Watch Out!**
> - You can only update Subscriptions in the `authenticated` and `active` states. Subscriptions in the `created`, `pending` or `halted` state cannot be updated. There is no state change when a Subscription is updated. Know more about the [Subscription states.](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/states.md)
> - You cannot update a Subscription if the difference amount after updating a Subscription (credit or refund) is less than the update quantity multiplied by the smallest currency subunit.
> 

## Update Subscriptions Immediately

When you update a Subscription immediately, you may have to perform the following:

- [Charge the customer an extra amount](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/update/#charge-a-customer-extra.md)
- [Refund an amount to the customer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/update/#refund-money-to-a-customer.md)

If the remaining amount for the original Subscription is the same as the amount to be charged for the updated Subscription, no charge or refund needs to be done.

> **INFO**
>
> 
> 
> **Handy Tips**
> - If you are updating a Subscription, ensure that the prorated amount difference between the existing and new plans is at least 50 currency subunits, that is, . You will get an error if the amount difference between the two plans is less than .
> - This is valid only when you update a Subscription immediately.
> 

### Charge a Customer Extra

When upgrading a plan or increasing the number of users, you may have to charge a customer an extra amount. In such scenarios, Razorpay creates an invoice and charges the customer the difference amount.

- If the charge is successful, the invoice is sent to the customer only if Razorpay handles the customer's notifications. You will be notified via the `subscription.updated` webhook.
- If the charge fails, the Subscription is not updated.

### Refund Money to a Customer

When downgrading a plan or reducing the number of users, you might have to give the customer a refund. In such scenarios, Razorpay refunds the amount to the customer. You will be notified about this via the `subscription.updated` webhook.

#### Credit Note

A refund to a customer is done using a Credit Note. Credit notes help you in reconciliation.

- Credit notes are not created against invoices. They are created against the total value of payments made by the customer. This means that only one credit note is created even if refunds have to be made against multiple invoices.
- You can view credit notes on the Dashboard against the respective Subscription.
- The credit notes are refunded automatically.

**Credit Note States**

A credit note can have two states:
- `created`: The initial state of a credit note. A credit note stays in this state until a full refund is made to the customer.
- `refunded`: The final state of a refund. A credit note moves to this state once the refund is successfully processed.

## Same Billing Frequency Example

In the below examples, the Subscription is updated immediately, and there is no change in its billing cycle.

    
### Example 1

         In the below example, we reduce the `plan amount` but increase the `quantity`. This change is done on the `1st` day the Subscription becomes `active`. The updates take effect immediately.

            
            Subscription Details | Original Plan | Updated Plan
            ---
            Plan amount |  | 
            ---
            Quantity | 1 | 2
            ---
            Billing Frequency | Monthly | Monthly
            ---
            Frequency at which the amount should be charged in days | 30 | 30
            ---
            Plan amount per day | (Plan amount x Quantity)/Frequency at which the amount should be charged in days =  | (Plan amount x Quantity)/Frequency at which the amount should be charged in days = 
            ---
            Plan change day | 1 | N/A
            ---
            Days to be charged | Plan change day - 1 = 0 days
(since customers are charged at the end of the day) | Remaining days (original plan) = 30
            ---
            Remaining days | Frequency at which the amount should be charged in days - Days to be charged = 30 | N/A
            ---
            Amount to be charged | Plan amount per day x Days to be charged =  | Plan amount per day x Days to be charged = 
            ---
            Remaining amount | Plan amount per day x Remaining days =  | N/A
            ---
            Amount to be charged/refunded | N/A | Amount to be charged (new plan) - Remaining Amount (original plan)  = 
            

            In this example, you neither have to charge the customer an extra amount nor give them a refund.
        

    
### Example 2

         
         In the below example, we reduce the `plan amount` but increase the `quantity`. This change is done on the `15th` day after the Subscription becomes `active`. The updates take effect immediately.

            
            Subscription Details | Original Plan | Updated Plan
            ---
            Plan amount |  | 
            ---
            Quantity | 1 | 2
            ---
            Billing Frequency | Monthly | Monthly
            ---
            Frequency at which the amount should be charged in days | 30 | 30
            ---
            Plan amount per day | (Plan amount x Quantity)/Frequency at which the amount should be charged in days =  | (Plan amount x Quantity)/Frequency at which the amount should be charged in days = 
            ---
            Plan change day | 15 | N/A
            ---
            Days to be charged | Plan change day - 1 = 14 days
(since customers are charged at the end of the day) | Remaining days (original plan) = 16
            ---
            Remaining days | Frequency at which the amount should be charged in days - Days to be charged = 16 | N/A
            ---
            Amount to be charged | Plan amount per day x Days to be charged =  | Plan amount per day x Days to be charged = 
            ---
            Remaining amount | Plan amount per day x Remaining days =  | N/A
            ---
            Amount to be charged/refunded | N/A | Amount to be charged (new plan) - Remaining Amount (original plan) = 
            

         In this example, you neither have to charge the customer an extra amount nor give them a refund.
        

    
### Example 3

         In the below example, we reduce the `plan amount` and the `quantity`. This change is done on the `6th` day after the Subscription becomes `active`. The updates take effect immediately.

            
            Subscription Details | Original Plan | Updated Plan
            ---
            Plan amount |  | 
            ---
            Quantity | 2 | 1
            ---
            BillingFrequency | Daily | Daily
            ---
            Frequency at which the amount should be charged in days | 8 | 8
            ---
            Plan amount per day | (Plan amount x Quantity)/Frequency at which the amount should be charged in days =  | (Plan amount x Quantity)/Frequency at which the amount should be charged in days = 
            ---
            Plan change day | 6 | N/A
            ---
            Days to be charged | Plan change day -1 = 5 days
(since customers are charged at the end of the day) | Remaining days (original plan) = 3
            ---
            Remaining days | Frequency at which the amount should be charged in days - Days to be charged = 3 | N/A 
            ---
            Amount to be charged | Plan amount per day x Days to be charged =  | Plan amount per day x Days to be charged = 
            ---
            Remaining amount | Plan amount per day x Remaining days =   | N/A
            ---
            Amount to be charged/refunded | N/A | Amount to be charged (new plan) - Remaining Amount (original plan) = -(refund)
            

         In this example, you have to refund the customer .

        

## Different Billing Frequency Example

In the below examples, the Subscription is updated immediately, and there is a change in the billing cycle.

    
### Example 1

         
         In the below example, we are increasing the `plan amount`, keeping the `quantity` same and reducing the `billing frequency`. This change is done on the `1st` day the Subscription becomes `active`. The updates take effect immediately.

            
            Subscription Details | Original Plan | Updated Plan
            ---
            Plan amount |  | 
            ---
            Quantity | 1 | 1
            ---
            Billing Frequency | Daily | Weekly
            ---
            Frequency at which the amount should be charged in days | 7 | 1
            ---
            Plan amount per day | (Plan amount x Quantity)/Frequency at which the amount should be charged in days =  | N/A
            ---
            Plan change day | 1 | N/A
            ---
            Days to be charged | Plan change day -1 = 0 days
(since customers are charged at the end of the day) | N/A
            ---
            Remaining days | Frequency at which the amount should be charged in days - Days to be charged = 7 | N/A
            ---
            Amount to be charged | Plan amount per day x Days to be charged =  | Plan amount x Quantity = 
            ---
            Remaining amount | Plan amount per day x Remaining days =  | N/A
            ---
            Amount to be charged/refunded | N/A | Amount to be charged (new plan) - Remaining Amount (original plan) = 
            

         In this example, you neither have to charge the customer an extra amount nor give them a refund.

        

    
### Example 2

         In the below example, we are increasing the `plan amount`, keeping the `quantity` same and reducing the `billing frequency`. This change is done on the `245th` day the Subscription becomes `active`. The updates take effect immediately.

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             If the plans have different billing cycles, the new plan is billed at the new interval, starting on the day of the change.
>             

            
            Subscription Details | Original Plan| Updated Plan
            ---
            Plan amount |  | 
            ---
            Quantity | 1 | 1
            ---
            Billing Frequency | Yearly | Monthly
            ---
            Frequency at which the amount should be charged in days | 365 | 30
            ---
            Plan amount per day | (Plan amount x Quantity)/Frequency at which the amount should be charged in days =  | N/A
            ---
            Plan change day | 245 | N/A
            ---
            Days to be charged | Plan change day -1 = 244 days
(since customers are charged at the end of the day) | Remaining days (original plan) = 121
            ---
            Remaining days | Frequency at which the amount should be charged in days - Days to be charged = 121 | N/A
            ---
            Amount to be charged | Plan amount per day x Days to be charged =  | Plan amount x Quantity = 
            ---
            Remaining amount | Plan amount per day x Remaining days =  | N/A
            ---
            Amount to be charged/refunded | N/A | Amount to be charged (new plan) - Remaining Amount (original plan) =  (charge)
            

         In this example, you have to charge the customer an extra amount of .

        

    
### Example 3

         In the below example, let us increase the `plan amount`, `quantity` and the `billing frequency`. This change is done on the `27th` day the Subscription becomes `active`. The updates take effect immediately.

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             If the plans have different billing cycles, the new plan is billed at the new interval, starting on the day of the change.
>             

            
            Subscription Details | Original Plan | New Plan
            ---
            Plan amount |  | 
            ---
            Quantity | 1 | 2
            ---
            Billing Frequency | Monthly | Quarterly
            ---
            Frequency at which the amount should be charged in days | 30 | 90
            ---
            Plan amount per day | (Plan amount x Quantity)/Frequency at which the amount should be charged in days =  | N/A
            ---
            Plan change day | 27 | N/A
            ---
            Days to be charged | Plan change day -1 = 26 days
(since customers are charged at the end of the day) | N/A
            ---
            Remaining days | Frequency at which the amount should be charged in days - Days to be charged = 4 | 90 days
            ---
            Amount to be charged | Plan amount per day x Days to be charged =  | Plan amount x Quantity = 
            ---
            Remaining amount | Plan amount per day x Remaining days =  | N/A
            ---
            Amount to be charged/refunded | N/A | Amount to be charged (new plan) - Remaining Amount (original plan) =  (charge)
            

         In this example, you have to charge the customer an extra amount of .

        

## Update Subscription at the End of the Current Billing Cycle

When you update a Subscription at the end of the current billing cycle, there is no need for any amount adjustment with the customer. The Subscription is updated with the new values when the current billing cycle ends.

## Update a Subscription From Dashboard

To update a Subscription:

1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
2. Click the **Subscription Id** you want to update. The details of the Subscription appear in the right pane. You can update the **Notify** flag from this tab. If enabled, notifications are sent to the customers. If disabled, you need to update the customer.
3. Click **Update** to update any of the following parameters:
    - Plan
    - Quantity
    - Subscription Start Date
    - Total count
    - Apply changes
    - Offer applied on the Subscription
4. Select **Immediately** or **End of Cycle** to update the offer immediately or at the end of the current billing cycle.
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     The new offer will be linked to the Subscription only at the end of the cycle. It is not possible to update an offer linked to a Subscription immediately.
>     

5. Click **Next**. Review the changes are made and click **Update**.

## Update a Subscription Using API

Use the [Update a Subscription API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/update-subscription.md) to update a Subscription.

## Cancel a Subscription Update

You can cancel an update pending on a Subscription from the Dashboard.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You can only cancel an update pending on a Subscription and not the live ones.
> 

Watch this video to see how to cancel an update for a Subscription.

[Video: https://www.youtube-nocookie.com/embed/SsNExzkjmDM]

To cancel a Subscription update:
1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
1. Click the **Subscription Id** for which you want to cancel the update and click **Cancel Update**.
1. Click **Yes, cancel**.

### Related Information

- [Create and View Plans](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-plans.md)
- [Create Subscriptions via Links](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-subscription-links.md)
- [Charge a Card Manually](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/manually-charge-card.md)
- [Subscriptions Settings](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/settings.md)
