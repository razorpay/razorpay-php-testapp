---
title: Refund Emails to Customers
heading: Refund Communication
description: Check the refund-related emails sent to your customers after the refunds are initiated.
---

# Refund Communication

If a customer is asking for a refund, the banking partner provides a unique reference number (either RRN, ARN or UTR) when a refund is processed. The customer can use this reference number to track the refund status with the bank. 

As a customer, you will be notified of the specific payment to be refunded in 7-10 working days.

> **INFO**
>
> 
> **Customer Looking for Refund**
> 
> If you are a customer looking for a refund, know more about [customer refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers/customer-refunds.md).
> 

## Refund Mailers

Razorpay sends you the following email communications for refunds:

- Refund Mailer
 After you process the refund, Razorpay sends you an email with the refund id and unique reference number (ARN, RRN or UTR) provided by the bank.

- RRN/ARN Update Mailer
 When you refund a credit card payment, the banking partner will share an ARN with Razorpay. Razorpay sends you an email with this ARN number.

 

> **INFO**
>
> 
> **Handy Tips**
> 
> Razorpay sends the **Refund** and **RRN/ARN Update** emailers only if the customer email is passed to us.
> 

### Related Information

- [Customer Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers/customer-refunds.md)
- [Refunds APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/apis.md)
