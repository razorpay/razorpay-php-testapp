---
title: Integrate Recurring Payments Using UPI
description: Know how to integrate Recurring Payments using UPI as a payment method.
---

# Integrate Recurring Payments Using UPI

The Recurring Payment integration involves the following steps:

1. [Mandate Registration](#1-mandate-registration)
2. [Fetch Mandate Registration Details](#2-fetch-emandate-registration-details)
3. [Charge Customers](#3-charge-customers)

## Prerequisites

- Raise a request with our [Support team](https://razorpay.com/support/#request) to get Recurring Payments activated on your account you are trying to integrate.
- Check if the UPI is enabled using the [Fetch Supported Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upi/supported-banks/#fetch-supported-methods.md) API. Also, check the list of [supported banks and apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upi/supported-banks.md) for UPI Recurring and enable it for your account.

## 1. Mandate Registration

Mandate registration is a process of creating a payment checkout form for customers to make **Authorisation Transaction** and register their UPI. A token will be generated once a customer makes this transaction.

Using this authorisation transaction, we can authenticate the customer's UPI and ensure that we can charge them recurring payments. The authorisation transaction can be created using Razorpay Standard Checkout or Registration Link.

> **INFO**
>
> 
> **Handy Tips**
> 
> The lending businesses can restrict their customers from pausing and cancelling the mandate by enabling OC125 functionality. Raise a request with our [Support team](https://razorpay.com/support/#request) to enable the same.
> 

    
        Following is the authorisation transaction flow for Razorpay Standard Checkout method.

        

        

        To create checkout form for customers to complete authorisation transaction using the Razorpay Standard Checkout method:

        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         The authorisation transaction using standard checkout can be created only using Razorpay APIs.
>         

        1. [**Create a customer**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction/#111-create-a-customer.md) 
This returns a `customer_id`.
        1. [**Create an order**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction/#112-create-an-order.md) 
This returns an `order_id`. The order must be created for:
        1. [**Create authorisation transaction**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction/#113-create-an-authorization-payment.md) 
Pass the `customer_id`, `order_id` and a few additional parameters in your checkout to create the authorization payment. The customer completes the authorization payment, which generates a `token`.
    
    

        Registration Links are securely generated web addresses that allow your customers to complete the authorisation transaction. Registration links can be sent via SMS or email.

        Following is the authorisation transaction flow for Razorpay registration link method:

        ![Recurring Payments Using Registration Link](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/recurring-payments-recurring_payments_registration_link.jpg.md)

        For customers to complete the authorisation transaction via a registration link, you should **Create a registration link and send it to your customer**. When the customer completes the authorisation payment, a `token` is generated.

        You can create a Registration Link using:

        - [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction/#121-create-a-registration-link.md)
        - [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#1-create-a-registration-link.md)

        
> **INFO**
>
> 
>         **No Need to Create a Customer and Order Separately**
> 
>         If you use a registration link to create the authorization transaction, Razorpay automatically creates a customer and the order for you.
>         

        #### Registration Link Statuses

        @include recurring-payments/registration-link-states

    

### Authorisation Payment Statuses

@include recurring-payments/authorization-payment-states

## 2. Fetch Mandate Registration Details

This is a process of fetching the token that contains the registration details of the customer and checking its status.

A token represents a mandate registration and is generated after the authorisation transaction is successfully captured. A token contains customer's payment details stored by Razorpay and is used to create a recurring payment.

> **INFO**
>
> 
> **Handy Tips**
> 
> For simplicity, tokens are considered to be mandates. Hence, the status of the token determines the status of the mandate registration.
> 

You can search for the tokens using the following:

- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/tokens.md)
- [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#3-search-for-the-token.md)
- [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks#check-token-status-using-webhooks.md)

### Token Statuses

As the authorisation transaction moves through its different states, the token that is generated also undergoes state changes. Following is the life cycle of a token:

![ Token life cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rec-pmnts-2_1_1_1.jpg.md)

@include recurring-payments/token-states

Know more about the turnaround time (TAT) for UPI from the [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upi/faqs.md).

## 3. Charge Customers

This is the process of charging customers the actual subsequent amount using the fetched token and customer details.

> **WARN**
>
> 
> **Watch Out!**
> 
> - It may take 24-36 hours for the subsequent payment to reflect on your Dashboard. This is because of the failure of pre-debit notification and/or any retries that we attempt for the payment.
> - **Do not** create subsequent payments on the last day of the cycle. This will cause the payment to fail.
> 
> - Subsequent payments can be charged without the need of any intervention from the customer. However, subsequent payments need to be created manually by you.
> 

Once a token goes to the confirmed state, you can start creating recurring payments for the customer as per your business requirements.

You can create subsequent payments using Dashboard or APIs.

    
       To create subsequent payments using the Dashboard:
        1. [**Search for the token and check its status**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#3-search-for-the-token.md) 
After the authorisation transaction is complete, a token is generated. You can use the search feature on the Dashboard to find the required token and check its status.
        1. [**Charge the token**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#4-charge-the-token.md) 
After you have found the required confirmed token, you can create a subsequent payment by charging the token according to your business needs.

        
> **INFO**
>
> 
>         **Order is Created Automatically**
> 
>         While creating a subsequent charge using the Dashboard, Razorpay automatically creates an order for you when you charge a token. There is no need to create an order separately.
>         

    
    
        ![](/docs/assets/images/rec-pmnts-4_1.jpg)

        To create subsequent payments using APIs:

        1. [**Create a new Order**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-subsequent-payments#31-create-an-order-to-charge-the-customer.md) 
Like any other payment, each subsequent payment is tied to a unique order id. Associating a payment with an order id makes it easier to query Razorpay systems and handle multiple payment attempts and allows automatic capturing of payments.
        2. [**Create a Payment**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-subsequent-payments#32-create-a-recurring-payment.md) 
Once the order is created, you can create a payment for it. 
After our system validates the payment along with `token_id`, a `razorpay_payment_id` is returned. In some cases, the payment entity returned is in the created state and may take 1 working day for confirmation.
