---
title: Integrate Recurring Payments Using Emandate
description: Know how to integrate Recurring Payments using Emandate as a payment method.
---

# Integrate Recurring Payments Using Emandate

The Recurring Payment integration involves the following steps:

1. [Emandate Registration](#emandate-registration)
2. [Fetch Emandate Registration Details](#fetch-emandate-registration-details)
3. [Charge Customers](#charge-customers)

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Prerequisites

- Check supported payment method for Emandate using the [Fetch Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/supported-banks/#fetch-supported-methods.md) API.
- Check the list of [Supported Banks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/supported-banks/#emandate.md) for Emandate and enable the same for your account.

## Emandate Registration

Emandate registration is a process of creating a payment checkout form for customers to make **Authorisation Transaction** and register their Emandate. A token will be generated once a customer makes this transaction.

Using this authorisation transaction, we can authenticate the customer's Emandate and ensure that we can charge them recurring payments. The authorisation transaction can be created using the following methods:

- [Razorpay Standard Checkout](#using-razorpay-standard-checkout).
- [Registration Link](#using-a-registration-link).

### Using Razorpay Standard Checkout

Following is the authorisation transaction flow for Razorpay Standard Checkout method.

To create checkout form for customers to complete authorisation transaction using the Razorpay Standard Checkout method:

> **WARN**
>
> 
> **Watch Out!**
> 
> The authorisation transaction using standard checkout can be created only using Razorpay APIs.
> 

1. [**Create a customer**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction/#111-create-a-customer.md) 
This returns a `customer_id`.
1. [**Create an order**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction/#112-create-an-order.md) 
This returns an `order_id`. The order must be created for:
1. [**Create authorisation transaction**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction/#113-create-an-authorization-payment.md) 
Pass the `customer_id`, `order_id` and a few additional parameters in your checkout to create the authorisation payment. The customer completes the authorisation payment, which generates a `token`.

#### Video Tutorial

Watch the below video to learn how to integrate recurring payments via the standard checkout method.

[Video: https://www.youtube.com/embed/66tHtGcJjfo]

### Using a Registration Link

Following is the authorisation transaction flow for Razorpay registration link method:

![Recurring Payments Using Registration Link](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/recurring-payments-recurring_payments_registration_link.jpg.md)

For customers to complete the authorisation transaction via a registration link, you should **create a registration link and send it to your customer**

You can create a Registration Link using:

- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction/#121-create-a-registration-link.md)
- [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#1-create-a-registration-link.md)

The customer completes the authorisation payment, which generates a `token`.

> **INFO**
>
> 
> **No Need to Create a Customer and Order Separately**
> 
> If you use a registration link to create the authorisation transaction, Razorpay automatically creates a customer and the order for you.
> 

#### Video Tutorials

**Using Dashboard**

Watch the below video to learn how to integrate recurring payments via the registration link method using Dashboard.

[Video: https://www.youtube.com/embed/fgYra3f0C74]

**Using APIs**

Watch the below video to learn how to integrate recurring payments via the registration link method using APIs.

[Video: https://www.youtube.com/embed/tQj5F3cotxs]

#### Registration Link Statuses

@include recurring-payments/registration-link-states

### Authorisation Payment Statuses

@include recurring-payments/authorization-payment-states

## Fetch Emandate Registration Details

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

- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md)
- [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#3-search-for-the-token.md)
- [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks#check-token-status-using-webhooks.md)

### Token Statuses

As the authorisation transaction moves through its different states, the token that is generated also undergoes state changes. Following is the life cycle of a token:

![ Token life cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rec-pmnts-2_1_1_1.jpg.md)

@include recurring-payments/token-states

Know more about the turnaround time (TAT) for Emandate from the [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/faqs/#5-what-is-the-timeline-for-emandate-token.md).

## Charge Customers

This is the process of charging customers the actual subsequent amount using the fetched token and customer details.

You can create subsequent payments using:

- [Dashboard](#using-the-dashboard)
- [APIs](#using-apis)

### Using the Dashboard

To create subsequent payments using the Dashboard:

1. [**Search for the token and check its status**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#3-search-for-the-token.md) 
After the authorisation transaction is complete, a token is generated. You can use the search feature on the Dashboard to find the required token and check its status.
1. [**Charge the token**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#4-charge-the-token.md) 
After you have found the required confirmed token, you can create a subsequent payment by charging the token according to your business needs.

> **INFO**
>
> 
> **Order is Created Automatically**
> 
> While creating a subsequent charge using the Dashboard, Razorpay automatically creates an order for you when you charge a token. There is no need to create an order separately.
> 

### Using APIs

![](/docs/assets/images/rec-pmnts-4_1.jpg)

To create subsequent payments using APIs:

1. [**Create a new Order**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/emandate/create-subsequent-payments#31-create-an-order-to-charge-the-customer.md) 
Like any other payment, each subsequent payment is tied to a unique order id. Associating a payment with an order id makes it easier to query Razorpay systems and handle multiple payment attempts and allows automatic capturing of payments.
2. [**Create a Payment**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/emandate/create-subsequent-payments#32-create-a-recurring-payment.md) 
Once the order is created, you can create a payment for it. 
After our system validates the payment along with `token_id`, a `razorpay_payment_id` is returned. In some cases, the payment entity returned is in the created state and may take 1 working day for confirmation.

### Related Information
- [Charge Customers During Registration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/charge-customer-during-registration.md)
- [Supported Banks and Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/supported-banks.md)
- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/apis.md)
- [Handle Errors](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/errors.md)
