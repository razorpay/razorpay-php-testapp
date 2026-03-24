---
title: Integrate Recurring Payments Using Cards
description: Know how to integrate Recurring Payments using Card as a payment method.
---

# Integrate Recurring Payments Using Cards

In India, recurring payments were restrictive in the past because of the RBI's requirement for a two-step verification process where the customer required to enter a One-Time Password (OTP), received via email or SMS, to complete the payment. In recent times, due to the relaxation of this requirement, you can define the interval in which you can charge customers automatically.

    
### Tokenisation for Card based Recurring Payments

         To process recurring mandates, customer card details must be secured/tokenised in accordance with applicable laws. Razorpay Checkout explicitly collects customer consent for tokenising the card to process e-mandate/recurring transactions.

            ![Tokenisation for card based Recurring Payments on Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/caw-checkout.gif.md)
        

Recurring Payment integration involves the following steps:

1. [Register Card Mandate Registration](#1-register-card-mandate)
2. [Fetch Card Mandate Registration Details](#2-fetch-card-mandate-registration-details)
3. [Charge Customers](#3-charge-customers)

## 1. Register Card Mandate

Mandate registration is a process of creating a payment checkout form for customers to make **Authorisation Transaction** and register their card mandate. A token will be generated once a customer makes this transaction.

Using this authorisation transaction, we can authenticate the customer's card mandate and ensure that we can charge them recurring payments. The authorisation transaction can be created using the following methods:

    
        Following is the authorisation transaction flow for Razorpay Standard Checkout method.

        ![Authorisation transaction flow for Razorpay Standard Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/recurring-payments-authorization_transaction_standard_checkout.jpg.md)

        To create checkout form for customers to complete authorisation transaction using the Razorpay Standard Checkout method:

        
> **WARN**
>
> 
> 
>         **Watch Out!**
> 
>         The authorisation transaction using Standard Checkout can be created only using Razorpay APIs.
>         

        1. [**Create a customer**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/create-authorization-transaction/#111-create-a-customer.md) 
This returns a `customer_id`.
        2. [**Create an order**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/create-authorization-transaction/#112-create-an-order.md) 
This returns an `order_id`. The order must be created for:
        3. [**Create authorisation transaction**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/create-authorization-transaction/#113-create-an-authorization-payment.md) 
Pass the `customer_id`, `order_id` and a few additional parameters in your checkout to create the authorisation payment. The customer completes the authorisation payment, which generates a `token`.

    
    

        Registration Links are securely generated web addresses that allow your customers to complete the authorisation transaction. Registration links can be sent via SMS or email.

        Following is the authorisation transaction flow for Razorpay registration link method:

        ![Recurring Payments Using Registration Link](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/recurring-payments-recurring_payments_registration_link.jpg.md)

        For customers to complete the authorisation transaction via a registration link, you should **Create a registration link and send it to your customer**.

        You can create a Registration Link using:

        - [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/create-authorization-transaction/#121-create-a-registration-link.md)
        - [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#1-create-a-registration-link.md)

        The customer completes the authorisation payment, which generates a `token`.

        
> **INFO**
>
> 
> 
>         **No Need to Create a Customer and Order Separately**
> 
>         If you use a registration link to create the authorisation transaction, Razorpay automatically creates a customer and the order for you.
>         

        #### Registration Link Statuses

        @include recurring-payments/registration-link-states

    

## 2. Fetch Card Mandate Registration Details

This is a process of fetching the token that contains the registration details of the customer and checking its status.

A token represents a mandate registration and is generated after the authorisation transaction is successfully captured. A token contains customer's payment details stored by Razorpay and is used to create a recurring payment.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> For simplicity, tokens are considered to be mandates. Hence, the status of the token determines the status of the mandate registration.
> 

You can search for the tokens using:

- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/tokens.md)
- [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#3-search-for-the-token.md)
- [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/subscribe-to-webhooks/#token-states.md)

    
### Token Statuses

         As the authorisation transaction moves through its different states, the token that is generated also undergoes state changes. Following is the life cycle of a token:

         ![Token life cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rec-pmnts-2_1_1_1.jpg.md)

         @include recurring-payments/token-states

            
            Know more about the turnaround time (TAT) for cards from the [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/cards/faqs.md).
            
        

## 3. Charge Customers

This is the process of charging customers the actual subsequent amount using the fetched token and customer details.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Subsequent payments can be charged without the need of any intervention from the customer. However, subsequent payments need to be created manually by you.
> 
> - Once a token goes to the confirmed state, you can start creating recurring payments for the customer as per your business requirements.
> 
> 

You can create subsequent payments using Dashboard or APIs.

    
        To create subsequent payments using the Dashboard:

        1. [**Search for the token and check its status**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#3-search-for-the-token.md) 
After the authorisation transaction is complete, a token is generated. You can use the search feature on the Dashboard to find the required token and check its status.
        2. [**Charge the token**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#4-charge-the-token.md) 
After you have found the required confirmed token, you can create a subsequent payment by charging the token according to your business needs.

        
> **INFO**
>
> 
> 
>         **Order is Created Automatically**
> 
>         While creating a subsequent charge using the Dashboard, Razorpay automatically creates an order for you when you charge a token. There is no need to create an order separately.
>         

    
    
        

        ![Charge customers using APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rec-pmnts-4_1.jpg.md)
        

        To create subsequent payments using APIs:

        1. [**Create a new Order**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/create-subsequent-payments/#31-create-an-order-to-charge-the-customer.md) 
Like any other payment, each subsequent payment is tied to a unique order id. Associating a payment with an order id makes it easier to query Razorpay systems and handle multiple payment attempts and, allows automatic capturing of payments.
        2. [**Create a Payment**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/create-subsequent-payments/#32-create-a-recurring-payment.md) 
Once the order is created, you can create a payment for it. 
After our system validates the payment along with `token_id`, a `razorpay_payment_id` is returned. In some cases, the payment entity returned is in the created state and may take 1 working day for confirmation.
    

### Related Information
- [Supported Banks and Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/cards/supported-banks.md)
- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/cards/apis.md)
