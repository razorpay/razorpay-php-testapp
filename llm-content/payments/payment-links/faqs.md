---
title: Payment Links | FAQs
heading: FAQs (Frequently Asked Questions)
description: Find answers to frequently asked questions about Razorpay Payment Links.
---

# FAQs (Frequently Asked Questions)

## For Businesses 

  
### 1. I do not have a website or app. Can I still use Payment Links to accept payments from customers?

     Yes, you can. You do not need a website or mobile app to use Payment Links. You can create and send Payment Links in 3 easy steps:
     1. Log in to the Dashboard and create a Payment Link. 
     1. Send it to the customer via SMS and/or email. 
     1. The customer opens the link and completes the payment.
    

  
### 2. Can I create a Payment Link using which customers can pay an amount of their choice?

     No. You can create Payment Links with fixed amounts only. Customers cannot enter an amount of their choice. Use [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md) if you want to allow customers to enter an amount of their choice.
    

  
### 3. Can I accept recurring payments using Payment Links?

     No. Payment Links can only be used to accept one-time payments. Use [Razorpay Subscriptions](https://razorpay.com/docs/payments/subscriptions/) to collect recurring payments from customers.
    

  
### 4. Can I show support details such as helpline, support webpage and email address on the Payment Link?

     Yes, you can show support details on the Payment Link.

     Follow these steps:

     1. Log in to the Dashboard
     2. Navigate to **Account & Settings** → **Business settings**.
     3. In the **Customer support details** section, enter these details:
         - **Phone Number** 
         - **Email id** 
         - **Website/Contact us link** 
     4. Click **Submit**.
    

  
### 5. Why is there a Report Payment Link option on a Payment Link created for my business?

     As per Razorpay's risk policy, the **Report Payment Link** option will be displayed by default for all Payment Links.
    

  
### 6. Why is the customer email address and phone number I specified during Payment Link creation not auto-populating on the hosted payment page?

     As per our updated security policy, even if the customer's email address and phone number are provided while creating the Payment Link, these details are not auto-populated on the Checkout section of the Payment Link hosted page. The customer will have to enter these details manually while making the payment.
    

  
### 7. Why is there a Report Payment Link option on a Payment Link request email sent for my business?

     As per our risk policy, the **Report Payment Link** option will be displayed by default on all Payment Link request emails.
    

  
### 8. Can I set a minimum upfront payment amount when I enable Partial Payments for a Payment Link on the Dashboard?

     
    

  
### 9. Can I cancel a Payment Link if it is in "partially_paid" state?

     No. You cannot cancel a payment link if it is in `paid` or `partially_paid` state. You can only cancel a payment link if it is in `issued` state.
    

  
### 10. Can I automatically send an invoice to customers after they complete payment via a Payment Link using Razorpay Invoices?

     No, you cannot send an invoice automatically. [Razorpay's Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) is designed to initiate payments, not for post-payment invoicing. You need to handle invoice generation on your end after receiving payment confirmation.
    

  
### 11. Can I accept international payments using Payment Links?

     Yes, you can accept international payments using Payment Links. Know more about [international payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md).
    

  
### 12. Can I use a Payment Link to accept payments from multiple customers?

     No, you can only accept payments from a single customer using a Payment Link. Use [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md) if you want to use one link to accept payments from multiple customers.
    

  
### 13. Why is the "callback_url" not working for UPI Payment Links on Android?

     UPI Payment Links will not redirect to "callback_url" on an Android device even if the parameter is passed while creating a Payment Link.
    

  
### 14. Can the UPI Payment Link be used if the customer is the fee bearer?

     UPI Payment Links do not work if the customer is the fee bearer.
    

### 15. How do I get webhook notifications for Payment Links?

     To receive webhook notifications for Payment Link events, you need to set up Payment Link-specific webhook events in your Razorpay Dashboard. 
      1. Log in to the Dashboard.
      2. Navigate to **Account & Settings** → **Webhooks**. 
      3. Subscribe to events such as `payment_link.paid`, `payment_link.cancelled`, `payment_link.expired` and `payment_link.partially_paid`. 
    
     These events will notify you whenever a Payment Link status changes and include details like Payment Link id, amount, status and customer information. This allows you to track Payment Link transactions separately from regular payment or order events. For detailed implementation steps and payload structure, refer to the [Payment Link Webhooks documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/subscribe-to-webhooks.md).
    

### 16. Can I automate Payment Link generation from Salesforce and send them via WhatsApp?

     Yes, you can automate Payment Link generation using the [Payment Links API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/create-standard.md). Integrate the API into your Salesforce workflow to programmatically create links based on your business logic.

     Razorpay does not provide direct WhatsApp integration, but you can use the built-in SMS and email notification system by setting the `notify` parameters in the API request.
    

## For Bank Transfer Payments

    
### 1. What is a Customer Identifier?

         A Customer Identifier is a customisable virtual receiver (with customer identifier number and IFSC) created on top of your current/escrow account. You can share the Customer Identifier information with your customers/businesses and collect payments.

         Normally, reconciling online payments (like NEFT) requires significant time and manual effort. Customer Identifiers solve this by allowing you to accept payments via NEFT, RTGS, and IMPS through a dedicated virtual receiver.

         Since each payment transaction is automatically linked to a specific Customer Identifier, the reconciliation process becomes instant and effortless.
        

    
### 2. How will the payments made by customers be settled to my bank account?

         The net amount (payment minus fees and taxes) is transferred from the Customer Identifier to your bank account as per your settlement schedule.
        

    
### 3. If I enable Bank Transfers as a payment method for Payment Links, will it appear as a payment option on other Razorpay products as well?

         Yes, once this feature is enabled, it will appear in all instances of Razorpay Checkout, be it Invoices, Payment Pages or the Checkout integrated on your website . You cannot enable or disable it for specific products.
        

    
### 4. Will a new Customer Identifier be created for multiple partial payments made on a Payment Link?

         No. Each Payment Link will have only one Customer Identifier associated with it. Even if multiple partial payments are made against the link, the amount will be received by the same Customer Identifier.
        

## For Customers

  
### 1. I have received a Payment Link that looks suspicious and fraudulent. How can I report it?

     
     There are two ways by which you can report a fraudulent Payment Link:
     - Using the Payment Link hosted page.
     - Using the email notification you received.

     **Using the Payment Link Hosted Page** 

     Follow these steps:
     1. Click the Payment Link and open the hosted page.
     2. Click **Report Payment Link**.
       ![report payment link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-report-a-link.jpg.md)

     **Using an Email Notification You Received** 

     Follow these steps:
     1. Open the email received from the business.
     2. Click **Report Email**.
       ![Email Report Payment ink](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-email-report.jpg.md)

     **On Clicking Report Option** 

     After you click the report link, a form is displayed. Enter the following details: 
     1. **Reason to report this merchant**: Click the drop-down list to select the relevant reason. For example, **Reporting fake website/company**. 
     2. **Email ID**: Enter your email address at which we can contact you for additional information. 
     3. **Contact No** (optional): Enter your contact number.  
     4. **Name** (optional): Enter your name.
     5. Complete the captcha step and click **SUBMIT REPORT**.
     
        ![report payment link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-report-payment-link.jpg.md)

     **Additional Steps** 

     If you have already completed the payment, you can choose to:
     - Request a refund by contacting the business' support team. The support details are available on the Payment Link hosted page.
     - File a dispute against the business. Know more about [Disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md).
