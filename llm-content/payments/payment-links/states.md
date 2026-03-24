---
title: Payment Link States
description: List of states of a Razorpay Payment Link and their significance.
---

# Payment Link States

A Payment Link starts in the `issued` state and moves through several states in its life cycle. The life cycle differs for [Standard](#standard-payment-links) and [UPI](#upi-payment-links) Payment Links.

## Standard Payment Links

After a Standard Payment Link is created, you can track its status on your Dashboard on the Payment Link page. The diagram given below illustrates the life cycle of a Payment Link.

The table below lists the various states and their descriptions in the Payment Link life cycle:

## UPI Payment Links

After you create a UPI Payment Link, you can track its status on your Dashboard on the **Payment Links** page. The diagram given below illustrates the life cycle of a UPI Payment Link.

![life cycle - upi payment links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-upi-link-cycle.jpg.md)

The table below lists the various states and their descriptions in the UPI Payment Link life cycle:

Status | Description | Next Steps
---
Created | Indicates that the Payment Link has been created. Know more about [creating a UPI Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md#create-a-standard-payment-link-from-dashboard). | Start accepting payments by sending the Payment Link to the customers.
---
Paid | Indicates that the Payment Link has been paid in full. | NA
---
Cancelled | Indicates that you have cancelled the Payment Link. Know more about [ cancelling Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/cancel.md). | Customers can no longer pay using this Payment Link. Create a new Payment Link to start accepting payments (If required).
---
Expired | The payment link has expired. You can set the expiry date and time while creating the payment link. Know more about [creating a UPI Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md#create-a-upi-payment-link).| This link is no longer accessible to the customers. Create a new Payment Link to start accepting payments (if required).

> **INFO**
>
> 
> 
> **Partial Payments Not Supported**
> 
> UPI Payment Links do not support partial payments. Hence, the `partially_paid` state does not exist.
> 

#### Related Information

- [How Payment Links Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/how-it-works.md)

- [Create a Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md)

- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/faqs.md)
