---
title: Create a Payment Link
description: Create Standard Payment Links and UPI Payment Links.
---

# Create a Payment Link

You can create 2 types of Payment Links using the Razorpay Dashboard:
- [Standard Payment Links](#create-a-standard-payment-link-from-dashboard)
- [UPI Payment Links](#create-a-upi-payment-link-from-dashboard)

## Create a Standard Payment Link From Dashboard

You can create a Standard Payment Link to accept payments from your customers. When you create a Payment Link, it moves to **Issued** state by default. 

Watch this video to see how to create a Standard Payment Link.

    
### To create a Standard Payment Link:

         1. Log in to the Dashboard.
         2. Go to the **PAYMENT PRODUCTS** section and click **Payment Links**.
         3. Click **+ Create Payment Link**.
         4. Enter the required details in the Standard Payment Link pop-up page.
            
            - **Amount** (Mandatory): Select the currency and amount for the Payment Link. For example, select `₹` and enter`1000` for ₹1,000. You can also accept payments in [international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

            - **Payment For** (Optional): Enter a description entered. For example, `School fees for Gaurav Kumar - Class XII B`.

            - **Customer Details** (Optional): Enter the customer's email and phone number. For example, `9876543210` and `gaurav.kumar@example.com`.

            - **Notify via Email** (Optional): Select this option if you want us to send the Payment Link to the customer via email. Available only if you have entered the customer's email.
 
Customers receive email in the following format: 
              
            - **Notify via SMS** (Optional): Select this option if you want us to send the Payment Link to the customer via SMS. Available only if you have entered the customer's phone number. 
 Customers receive SMS in the following format: 
            For example, `Acme Corp has requested payment of INR 100. You can pay through this link: https://rzp.io/rzp/D6W1Xk3u - Razorpay`

            - **Reference Id** (Optional): Provide a unique reference number for the link. For example, `Adbb001`.

            
            
            - **Notes** (Optional): Provide the internal notes for the Payment Link. For example:
Title (key): Acme Corp.
- Description (value): Birthday cake Feb.

            - Review the details and click **Create Payment Link**.

            
        

## Create a UPI Payment Link From Dashboard

You can create a UPI Payment Link to collect funds from your customers via the Dashboard. When you create a Payment Link, it moves to the **Issued** state by default.

Watch this video to see how to create a UPI Payment Link.

    
### To create a UPI Payment Link:

         1. Log in to the Dashboard.
         1. Navigate to **Payment Links**.
         1. Click **Create Payment Link**.
         1. Click **UPI Payment Link**.
         1. Enter the required details in the UPI Payment Link pop-up page.
            
            - **Amount** (Mandatory): Select the currency and amount for the Payment Link. For example, select `₹` and enter`1000` for ₹1,000.

            - **Payment For**: Enter a description entered. For example, `School fees for Gaurav Kumar - Class XII B`.

            - **Customer Details**: Enter the customer's email and phone number. For example, `9876543210` and `gaurav.kumar@example.com`.

            - **Notify via Email** (Optional): Select this option if you want us to send the Payment Link to the customer via email. Available only if you have entered the customer's email.
 
Customers receive email in the following format: 
              
            - **Notify via SMS** (Optional): Select this option if you want us to send the Payment Link to the customer via SMS. Available only if you have entered the customer's phone number. 
Customers receive SMS in the following format: 
            For example, `Acme Corp has requested payment of INR 100. You can pay through this link: https://rzp.io/rzp/D6W1Xk3u - Razorpay`

            - **Reference Id**: Provide a unique reference number for the link. For example, `Adbb001`.

            - **Link Expiry**: The date and time at which the Payment Link should expire.

            - **Internal Notes**: Provide the internal notes for the Payment Link. For example:Title (key): Acme Corp.
- Description (value): Birthday cake Feb.

            
        1. Review the details and click **Create Payment Link**.

        After a UPI Payment Link created, it appears in the list of Payment Links.
        

## Make Test Payments for Payment Links

> **INFO**
>
> 
> **Handy Tips**
> 
> We recommend you to create Payment Links in **Test Mode** for testing purposes.
> 

    
### To make test payments for Payment Links:

         1. Log in to the Dashboard. 
         2. Navigate to **Payment Links**.
         3. Select the Payment Links you wish to test.
         4. Copy the link URL and open it in your browser.
             
         5. Select the payment method of your choice and proceed with the payment.
         6. Select **Success** or **Failure**, depending on which flow you wish to test.
             
         7. You should see a confirmation message depending on the flow you have selected.
             
        

## Create a Payment Link Using API

You can create a Payment Link using:
- [Create a Standard Payment Link API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/create-standard.md)
- [Create a UPI Payment Link API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/create-upi.md)

#### Related Information
