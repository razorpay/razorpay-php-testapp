---
title: How Subscriptions Work
description: Check the Plans, free trial period, upfront (delivery or set up) amount, Subscriptions, checkout integration for Subscriptions and Subscription links.
---

# How Subscriptions Work

Understand the Subscription flow and how to create Subscriptions from the Checkout or using links. 

## Subscription Life Cycle

1. [Create a Plan](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create/#plan.md).
1. After the Plan is created, you can then [create a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create/#subscription.md) for your customer.
1. Customer makes the [Authentication Transaction](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create/#authentication-transaction.md).
1. The Subscription becomes active when the billing cycle starts.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - You do not need to capture any Subscriptions-related payment. All payments related to Subscriptions (except the authorisation payment) are **auto-captured**. The authorisation payment used to validate a customer's card is **auto-refunded**.
> - There is no need to create a customer when using Razorpay Subscriptions. Razorpay automatically creates a customer when the authentication payment is made.
> 

## Authentication Transaction

The **authentication transaction** amount is the first amount you charge on the customer's card. The authentication transaction can either be a token amount that is refunded to the customer or an upfront amount or the plan amount that is not refunded to the customer. Based on your business needs, you can decide on the authentication transaction amount.

> **INFO**
>
> 
> 
> **Immediate Start Dates**
> 
> In case of immediate start dates, the authentication transaction amount is not refunded and invoices are generated in all the three scenarios.
> 

  
### Authentication Amount - Various Combinations

     The following table below explains what authentication amount is collected from customers for various combinations of start date and the upfront amount.

      
      Start Date | Upfront Amount | Authentication Amount
      ---
      Immediate | x | Plan Amount
      ---
      Future | x |  (auto refunded)
      ---
      Immediate | ✓ | Upfront Amount + Plan Amount
      ---
      Future | ✓ | Upfront Amount
      
    

You can collect the authentication transaction using Subscription via Checkout or using Subscription Links.

  
    
> **INFO**
>
> 
> 
>     **Handy Tips**
> 
>     You can [integrate Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/integration-guide.md) into your checkout only using [Subscriptions APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions.md).
>     

    You can integrate Razorpay Subscriptions with your Razorpay Checkout Form on your website or application. Customers can select their desired Subscription Plan on your website or application and proceed to make the authentication payment using Razorpay's Checkout.

    1. [Create a Plan](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create/#plan.md).
    1. The customer selects the Plan from your website or application.
    1. After the customer selects a Plan, a Subscription is created in Razorpay and the `subscription_id` received in the response, is passed on to the Razorpay Checkout via the checkout options.
    1. On the Checkout form, the customer makes the payment using the card details.
    1. This acts as an **authentication transaction**. On a successful payment, a customer is created and linked to the Subscription.
    1. Automated charges on the Subscription are now made as per the schedule that you defined while creating the plan.

  
  
    You can create a custom Subscription for a customer and send a [Subscription link](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-subscription-links.md) to them. Customers click the link and are taken to a checkout page hosted by Razorpay where they make the authentication payment via Razorpay's checkout page. There is no need to host the link on your website or application.

    1. [Create a Plan](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create/#plan.md).
    1. You create a Subscription link by:
        - Selecting a Plan.
        - Adding an upfront amount.
        - Adding customer details.
    1. The Subscription link is sent to the customer via email and/or SMS.
    1. The customer clicks the link and is taken to the Razorpay Checkout form.
    1. The customer enters the card details and clicks **Pay** to make the payment. This acts as an **authentication transaction**. On a successful payment, a customer is created and linked to the Subscription.
    1. Automated charges on the Subscription are now made as per the schedule that you defined while creating the plan.

  

## Subscriptions Actions

You can perform the following actions on Subscriptions that are active:
- [Update a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/update.md)
- [Pause and Resume a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/pause-resume-cancel.md)
- [Cancel a Subscription](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/pause-resume-cancel/#cancel-a-subscription-via-the-dashboard.md)

## Invoice

Invoices are automatically created for Subscriptions. Invoice includes details such as plan, amount, date of charge including merchant details. Invoices are created for every charge made on the customer's card for recurring payments, including the authentication transaction.

- An invoice is generated at the beginning of each billing cycle for the defined plan and amount.
- A charge is attempted on the invoice. The invoice is in `issued` state on your Dashboard.
- If the charge is successful:
  - An email is sent to the customer.
  - The invoice is moved to `paid` state on your Dashboard.
  - The `invoice.paid` webhook is fired.
  

Know more about the [Subscription states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/states.md).

> **WARN**
>
> 
> **Watch Out!**
>   
> Along with the invoice state, we recommend you check the Subscription charge status of the defined billing frequency before providing or continuing services to your customers.
> 

  
### Invoice - Various Combinations

     The following table indicates when an invoice is sent for various combinations of start date and upfront amount.

      

      Start Date | Upfront Amount | Invoice sent
      ---
      Immediate | x | Yes
      ---
      Future | x | No (Reason: Auth transaction)
      ---
      Immediate | ✓ | Yes
      --- 
      Future | ✓ | Yes
      
    

### Related Information

- [Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions.md)
- [Subscription States](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/states.md)
- [Create Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create.md)
- [Test Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/test.md)
- [Payment Retries](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/payment-retries.md)
