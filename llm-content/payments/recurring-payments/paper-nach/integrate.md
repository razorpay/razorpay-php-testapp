---
title: Integrate Recurring Payments Using Paper NACH
description: Integrate Recurring Payments using Paper NACH as a payment method.
---

# Integrate Recurring Payments Using Paper NACH

Recurring Payment integration involves the following steps:

1. [NACH Mandate Registration](#nach-mandate-registration)
2. [Fetch NACH Mandate Registration Details](#fetch-nach-mandate-registration-details)
3. [Charge Customers](#charge-customers)

## Prerequisites

- Raise a request with our [Support team](https://razorpay.com/support/#request) to get Recurring Payments (NACH) activated on your account you are trying to integrate.
- Check if the NACH is enabled using the [Fetch Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/supported-banks/#fetch-supported-methods.md) API.

## NACH Mandate Registration

Mandate registration is a process of creating a payment checkout form for customers to make **Authorisation Transaction** and register their NACH mandate. A token will be generated once a customer makes this transaction.

Using this authorisation transaction, we can authenticate the customer's NACH mandate and ensure that we can charge them recurring payments.

The flow to complete an authorisation transaction using paper NACH is a little different from the regular recurring payment flow. The flow when using paper NACH is:

1. Create a customer.
2. Create an order by passing the `customer_id` and method `nach`. When you do this, Razorpay generates a NACH form with the customer information pre-filled and ready to sign.
3. The customer signs the form. The customer can obtain the form in one of the following ways:
    - You can download the form from the Dashboard and send it to the customer.
    - Download from the Hosted page (in the case of registration links).
4. The signed form is uploaded to Razorpay. This can be done in one of the following ways:
    - Using the Standard Checkout page.
    - Hosted page (in the case of registration links).
    - The customer can send you the form and you can upload the form for the customer. The acceptable image formats and size are:
        - .jpeg
        - .jpg
        - .png
        - Maximum accepted size is 6 MB.

Once the details are validated, the authorisation transaction is completed and a token is generated. You can charge your customer as per your business model once the token status changes to `confirmed`.

The authorisation transaction can be created using the following methods:

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

1. [**Create a customer**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction/#111-create-a-customer.md) 
This returns a `customer_id`.
1. [**Create an order**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction/#112-create-an-order.md) 
This returns an `order_id`.
1. [**Create authorisation transaction**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction/#113-create-an-authorization-payment.md) 
Pass the `customer_id`, `order_id` and a few additional parameters in your checkout to create the authorisation payment. The customer completes the authorisation payment, which generates a `token`.

### Using a Registration Link

Following is the authorisation transaction flow for Razorpay registration link method:

![Recurring Payments Using Registration Link](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/recurring-payments-recurring_payments_registration_link.jpg.md)

For customers to complete the authorisation transaction via a registration link, you should **Create a registration link and send it to your customer**.

You can create a Registration Link using:

- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction/#121-create-a-registration-link.md)
- [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#1-create-a-registration-link.md)

The customer completes the authorisation payment, which generates a `token`.

> **INFO**
>
> 
> **No Need to Create a Customer and Order Separately**
> 
> If you use a registration link to create the authorisation transaction, Razorpay automatically creates a customer and the order for you.
> 

#### Registration Link Statuses

@include recurring-payments/registration-link-states

### Authorisation Payment Statuses

@include recurring-payments/authorization-payment-states

## Fetch NACH Mandate Registration Details

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

- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/paper-nach/tokens.md)
- [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#3-search-for-the-token.md)
- [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks#check-token-status-using-webhooks.md)

### Token Statuses

As the authorisation transaction moves through its different states, the token that is generated also undergoes state changes. Following is the life cycle of a token:

![ Token life cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rec-pmnts-2_1_1_1.jpg.md)

@include recurring-payments/token-states

Know more about the turnaround time (TAT) for NACH from the [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/paper-nach/faqs/#7-for-physical-mandates-how-long-does-it.md).

## Charge Customers

This is the process of charging customers the actual subsequent amount using the fetched token and customer details.

You can create subsequent payments using:

- [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/paper-nach/integrate/#using-the-dashboard.md)
- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/paper-nach/integrate/#using-apis.md)

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

1. [**Create a new Order**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/paper-nach/create-subsequent-payments/#31-create-an-order-to-charge-the-customer.md). 
Like any other payment, each subsequent payment is tied to a unique order id. Associating a payment with an order id makes it easier to query Razorpay systems and handle multiple payment attempts and allows automatic capturing of payments.
2. [**Create a Payment**](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/paper-nach/create-subsequent-payments/#32-create-a-recurring-payment.md). 
Once the order is created, you can create a payment for it. 
After our system validates the payment along with `token_id`, a `razorpay_payment_id` is returned. In some cases, the payment entity returned is in the created state and may take 1 working day for confirmation.

### Related Information
- [Paper NACH APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/paper-nach/apis.md)
