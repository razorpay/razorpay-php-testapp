---
title: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay Payments.
---

# Frequently Asked Questions (FAQs)

## Payments

    
### 1. How does a customer make payments using the Razorpay Payment Gateway?

         Try [Razorpay Checkout](https://razorpay.com/demopg3/).
         
> **WARN**
>
> 
>          **Watch Out!**

>          This is a real transaction. The money will be deducted from your account when you complete the transaction. The money will be auto-refunded to your account in 4-5 days.
>          

        

    
### 2. How much does Razorpay charge per transaction?

         Under the standard plan designed for small and medium enterprises, Razorpay charges 2% per transaction. Razorpay also offers an enterprise plan designed for large volumes, which gives you the best prices possible for your business. Know more about [pricing](https://razorpay.com/pricing/).
        

    
### 3. Is GST mandatory to accept payments?

         No, GST is not mandatory if your business does not have an annual turnover of over ₹20 lakhs. However, if you do not provide your GST details, you would not be able to claim TDS at the time of filing your tax returns.
        

    
### 4. What is the applicable GST? How is it charged?

         18% GST is charged on the fee deducted for all payment methods except domestic card transactions of amount 
    
    
### 2. How can we test our website or mobile app integration with Razorpay Payment Gateway?

         Razorpay offers a sandbox environment where you can test integrations before going live. To test your integration, [generate test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) in test mode and implement them in your code. Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience. No money is deducted as these are simulated transactions.
        

    
### 3. What is Standard Capture?

         Standard capture is an authorisation followed by a `delayed` capture of the payment. In this scenario, if a customer makes a payment, the amount is deducted from the customer's bank account by Razorpay. The authorised amount is settled to your account only after you initiate a `capture` request.
        

    
### 4. How do I manually capture a payment?

         You can manually capture payments:
         - [From the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#manually-capture-payments)
         - [Using APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment)
        

    
### 5. How are payments made by my customers settled to my account? Is any action required from my end?

         No action is required from your end for the settlements. Razorpay automatically settles the captured payments to your account as per your settlement cycle.
        

    
### 6. A payment is marked as 'failed' on my Dashboard but money is debited from the customer’s account. What do I do?

         A payment is said to be in the 'failed' state when we do not receive a successful callback message on the transaction from the issuing bank. If the customer’s account is debited and we do not receive a successful callback, the amount will be auto-refunded by the customer’s issuing bank in  working days.

         In case of a failed payment, we verify the status with the bank at regular intervals. If there is a change in status, the payment moves to the `authorized` state, and a notification is sent to you and the customer.

         In such scenarios, you can choose to do any one of the following:
         - **Provide services**: Capture the payment and provide the service/good as was promised earlier to the customer.
         - **Refund the transaction**: If you are not able to provide service to the customer as per the agreed terms (Such as time of delivery, cost of purchase or inventory issues), refund the payment to the customer.
        

    
### 7. Is Razorpay PCI-DSS compliant?

         Yes, Razorpay is PCI-DSS compliant.
        

    
### 8. What is Late Authorisation?

 
         Late authorisation is a situation that arises when a payment is interrupted by external factors such as network issues or technical errors at customer's or bank's end. In such cases, funds may or may not get debited from the customer's bank account and Razorpay does not receive a payment status from the bank. Know more about [Late Authorisation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md).
