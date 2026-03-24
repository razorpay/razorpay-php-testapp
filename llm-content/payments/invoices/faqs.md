---
title: Invoices | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay Invoices.
---

# Frequently Asked Questions (FAQs)

### 1. Can I raise GST-compliant invoices using Razorpay Invoices?

         Yes, you can raise both non-GST and GST-compliant invoices using Razorpay Invoices. You can use the Dashboard to create non-GST and GST compliant invoices. Using APIs, you can only create a non-GST invoice. Know more about [creating an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/create.md).
        

    
### 2. Can I raise invoices in international currency using Razorpay Invoices?

         Yes, you can create non-GST invoices in any of the [supported international currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md) using the Dashboard or APIs.
        

    
### 3. I have raised an invoice. How do I make changes to it?

         You can make any changes to an invoice in `draft` status. Know more about [updating an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/update.md).

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          If an invoice is issued to a customer, you can make only limited changes such as Expiry Date, Customer Comments and Terms and Conditions. If you need to make other changes to an `issued` invoice, [cancel the invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/cancel.md) and [create a new invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/create.md) with the revised details. However, you can cancel an **unpaid** issued invoice.
>          

        

    
### 4. I want to set a date by which the customer should make the payment. How do I do that?

         You can set an Expiry Date for invoices. The customer should make a payment against the invoice within this Expiry Date. The customer cannot make payments for an expired invoice. Know more about [setting Expiry Date for an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/create/#create-an-invoice-from-dashboard.md).
        

    
### 5. What is the difference between Issue Date and Expiry Date?

         See: [Glossary](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/glossary.md)
        

    
### 6. The customer wants to make payments in parts. How do I raise such invoices?

         You can allow partial payments on invoices while raising an invoice or updating an invoice. The customers can also view the history of partial payments they have made by clicking the invoice link shared with them. Know more about [creating an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/create.md) and [updating an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/update.md).
        

    
### 7. What are the various payment methods available to the customer?

         A wide range of payment options is available to the customer. Know more about [list of supported payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/#list-of-supported-payment-methods.md).
        

    
### 8. Where do I track the invoices and their status?

         You get instant notifications about the invoices. You can also subscribe to webhook events and generate reports. Know more about [tracking invoices and viewing reports](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/how-it-works/#step-4-track-invoices-and-reports.md).
        

    
### 9. The customer wants a hard copy of the invoice.

         Your customers can download a PDF copy of the invoice sent to them via email. Open the invoice and click **Download PDF**.
        

    
### 10. Can I add more than one billing address for a customer?

         You can add a maximum of three billing addresses for one customer ID.
        

    
### 11. What is the maximum permissible amount limit that can be accepted from payments across all Razorpay Invoices?

         The maximum permissible amount limit that can be accepted from payments across all Razorpay Invoices is ₹5,00,000, which cannot be increased.
        

    
### 12. Can I use Razorpay to automatically generate invoices/receipts for customers after they complete payment on my mobile app or website?

         No, [Razorpay Invoices](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices.md) is designed to initiate and collect payments, not to generate accounting invoices or receipts after payment completion.
