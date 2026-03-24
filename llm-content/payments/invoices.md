---
title: Invoices
heading: About Invoices
description: Issue Razorpay Invoices to your customers from the Razorpay Dashboard or using APIs and start accepting payments. Check the Payment Methods and International Currency support and more.
---

# About Invoices

An Invoice is a digital document that summarises the details of an order or a transaction and allows customers to initiate payments. A typical invoice contains sale transaction information such as the name of the ordered products or services, quantities, price breakup, receipt number, customer information and so on.

## About Razorpay Invoices

Use Razorpay Invoices to create, issue and track invoices, both via Dashboard and APIs. Once an invoice is issued, the customer can make the payment.

## Advantages
- Flexible invoicing
  
Create and add items sold, add detailed taxes, offer discounts on the invoice or individual items and add terms and conditions.
- Unlimited invoices
  
Create and send as many invoices as you want. You are charged when invoices get paid.
- GST-compliant invoices
  
Add GST, discounts and shipping details in the invoice, and Razorpay Invoicing solution does the necessary calculations.
- Embedded payment link
  
The customers receive a payment link on SMS or email using which they can easily pay.
- Set expiry date
  
Set due dates for invoices after which the invoices expire.
- Partial payments
  
You can allow your customers to make partial payments while creating the invoices from the Dashboard.
- Easy integration using APIs
  
The invoicing solution can be seamlessly integrated with existing billing and order management systems using APIs.
- Download invoices
  
Let your customers download a copy of the invoices for quick and easy references.
- Access control
  
You can create roles/teams for different levels of actions on invoices (create, view, edit and so on). Know more about [roles and actions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/manage-team.md).

You can perform all the actions on invoices from the Dashboard - create, issue, cancel, duplicate, search, update or delete. You can also subscribe to Webhook events for immediate notifications. You can perform most of these actions using [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/apis.md).

## List of Supported Payment Methods
- Online Payment
  
Customers can make online payments using [Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md), [Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md), [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md), [Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md), and **wallets**.

## International Currency Support

You can create non-GST invoices in any of the [supported international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies) using the Dashboard or APIs.

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot add tax rates for invoices created using international currencies.
> 

### Supported Platforms

Razorpay Invoices is supported on the following platforms:

  
    
    Web | Android | iOS | Webview
    ---
    ✓ | ✓ | ✓ | ✓
    
  
  
    
    Web | Android | iOS | Webview
    ---
    x | x | x | x
    
  

## Address Verification System

If you are accepting international payments, you can use Razorpay's Address Verification System (AVS). AVS verifies if a customer's billing address (postal code and the billing street address) matches the billing address on file with the card issuer. Based on the response from the issuer, Razorpay will accept or cancel the transaction. This helps in the prevention of fraud in international payments. Know more about [Address Verification System](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/address-verification-system.md).

## Get Started
Log in to the Dashboard and click **Invoices**.

### Integrate With Existing Systems
You can easily integrate Razorpay Invoices with your existing order management and billing solution. You can integrate using the Dashboard or using APIs. With API integration, an invoice can be created as soon as an order is created on your order management system.

### What Next
Understand [how you can use Razorpay Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/how-it-works.md) and the various [Invoice states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/states.md).

### Related Information
- [How Invoices Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/how-it-works.md)
- [Invoices States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/states.md)
- [Create an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/create.md)
- [Issue an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/issue.md)
- [Search an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/search.md)
- [Update an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/update.md)
- [Duplicate an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/duplicate.md)
- [Delete an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/delete.md)
- [Cancel an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/cancel.md)
- [Download and Print an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/download-print.md)
- [Subscribe to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/subscribe-to-webhooks.md)
- [Invoice APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/apis.md)
