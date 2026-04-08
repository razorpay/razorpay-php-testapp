---
title: QR Codes | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay QR Codes.
---

# Frequently Asked Questions (FAQs)

### 1. Can I use QR Codes to accept international payments using Razorpay QR Codes?

         No, you cannot use QR Codes to accept international payments.
        

    
### 2. I want to set a date by which the customer must make the payment. How do I do that?

         You can set a Close By Date for the QR Code. The customer should make a payment using the QR Code within this Close By Date. The customer cannot make payments for a closed QR Code. Know more about [setting Close By Date for QR Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/create.md#create-a-qr-code-from-dashboard/).
        

    
### 3. A customer wants to make payments in parts. How do I create such QR Codes?

         If a customer wants to pay in parts, during QR Code creation, you must ensure that:
            1. The full payment amount is entered in the **Total Amount Expected** field.
            2. The **Allow Multiple Payments on QR** option is enabled.
        

    
### 4. What are the payment methods available to customers?

         Customers can make payments using UPI PSP apps such as PhonePe, GooglePay only. If the QR Code type is `bharat_qr`, customers can also make payments using cards.
        

    
### 5. Where do I track the QR Code and their states?

         You get instant notifications about the QR Code. You can also subscribe to webhook events and generate reports. Know more about [tracking QR Code and viewing reports](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/how-it-works.md#step-4-track-qr-code-and-reports/).
        

    
### 6. My customer has made payments using Airtel Payments Bank. However, these payments are not getting settled to my account and are instead getting auto-refunded. Why?

         We do not support payments made using Airtel Payments Bank. Such payments will be auto-refunded to the customers. Please ask your customer to use another bank.
        

    
### 7. How can I get access to BharatQR?

          Once activated, you will see BharatQR as an option while generating a QR Code.
        

    
### 8. I created a QR Code in Test mode. Why am I not able to scan it?

         You can scan QR Codes that are created only in **Live Mode**.
        

    
### 9. How can I create a QR Code to receive multiple payments from different customers?

         You can create a multiple-use QR Code that accepts unlimited payments from different customers without expiring.

         **Via Dashboard:**
         1. Log in to the Dashboard and navigate to **QR Codes**.
         2. Click **+ Create QR Codes**
         3. Enable the **Multiple Payments** option under QR Usage.
         4. Complete the setup and generate the QR Code.

         **Via API:**
         Use the [Create QR Code API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/create.md) and set the `usage` parameter to `multiple_use`.

         Know more about [Create a QR Codes from Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/create.md) or [Create a QR Code using API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/create.md).
