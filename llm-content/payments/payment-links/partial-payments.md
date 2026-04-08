---
title: Enable Partial Payments | Enhance Customer Convenience
heading: Enable Partial Payments
description: Enable partial payments for Payment Links issued to customers from the Dashboard or APIs.
---

# Enable Partial Payments

You can configure the Standard Payment Links to receive partial payments from your customer for a particular order.

## When to Use Partial Payments

The **Partial Payment** feature comes in handy while dealing with large transactions, where the customer finds paying the total amount in parts more convenient than paying the entire amount upfront.

> **INFO**
>
> 
> **Handy Tips**
> 
> This feature is not available for UPI Payment Links.
> 

#### Example 

A tourism company, Acme Corp. offers expensive travel packages. As per the company's payment terms, a fixed booking amount should be collected from the customer before making any tour reservations. 

With the **Partial Payments** feature, Acme Corp. issues a Payment Link using which the customer pays the booking amount for an order. The customer can make multiple payments for the remaining balance amount for the same order using the same Payment Link.

## How Partial Payments Work

Here is how Partial Payments work:

![partial payment workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-partial-payments.jpg.md)

1. You create a Payment Link of .
2. The customer chooses to pay an amount of  out of the due amount mentioned in the Payment Link.
3. Since the customer pays less than the due amount, the Payment Link would show `partially_paid` status until the amount due is zero or until the link gets `expired` or `canceled`.
4. After the full amount has been paid, the status of the Payment Link changes to `paid`. 

Just like any other payment, each partial payment would have a unique `payment_id`, but will be tied to the same `order_id`, thereby allowing customers to easily make multiple payments for the same order using the same **Payment Link**. This makes it easier to track the status of a particular order. Know more about [Payment Links States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/states.md).

## Enable Partial Payments From Dashboard

You can enable partial payments while creating the Payment Link. You can also edit an issued Payment Link to allow partial payments. 

    
        
        Watch this video to see how to enable partial payments while creating the Payment Links.

        
[Video: https://www.youtube.com/embed/9f9bMw5rxEY]

        

        To enable partial payments during Payment Link creation:
        1. Log in to the Dashboard.
        1. Navigate to **Payment Links**.
        1. Click **+ Create Payment Link**.
        1. Enter the necessary details such as **Amount** and **Payment For**.
        1. Select the **Enable Partial Payments** option.
        1. Click **Create Payment Link**.

        
    
    
        To enable partial payments after Payment Link is issued:

        1. Log in to the Dashboard.
        1. Navigate to **Payment Links**.
        1. Click on the Payment Link for which you want to enable/disable partial payments.
        1. Select the **Enable Partial Payment** option.

        

        ![enable partial payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-partial-payments-once-issued.jpg.md)

        

        
    

#### Related Information

- [How Payment Links Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/how-it-works.md)

- [Payment Links States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/states.md)

- [Create a Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md)

- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/faqs.md)
