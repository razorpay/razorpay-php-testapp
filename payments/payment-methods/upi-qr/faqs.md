---
title: FAQs - UPI QR Code
description: Frequently asked questions about UPI QR Code.
---

# FAQs - UPI QR Code

## QR Creation

    
### 1. Can I create a static QR Code with the UPI QR API?

         It is not possible to create a static QR code that you can print to accept offline payments from your customers. You can create a one-time, non-reusable dynamic QR code to accept digital payments from your customers.
        

    
### 2. For how long will the UPI QR Code be active?

         UPI QR code displayed will remain active as long as the virtual account is `active`.
        

    
### 3. Is it possible to generate UPI QR Code from Dashboard?

         No, you cannot create UPI QR codes from the Dashboard. UPI QR codes can only be generated using APIs.
        

## Payments

    
### 1.  Can customers make payments using debit or credit cards using UPI QR Code?

         No, the supported payment method is **UPI** only, and customers can make payments from any UPI app installed on their mobile devices.
        

    
### 2.  Can I use the same QR Code to accept payments from different customers?

         It is not possible to accept multiple payments from different customers using the same QR Code.
        

    
### 3.  Can a customer make multiple partial payments using the same UPI QR Code?

         A payment is marked successful only if a customer pays the expected amount in full. The customer cannot make multiple payments for the same UPI QR Code.
        

    
### 4.  If the customer has made the same payment twice using the UPI QR Code, what happens next?

         In case of duplicate payments, only the first successful payment is honored by Razorpay, and all the subsequent payments are refunded to the customer's account within 3-5 business days.
        

## Reconciliation

    
### 1. My customer claims to have made a payment using the QR Code. However, I am unable to view the payment on the Dashboard. What could be the reason?

         This could happen in situations where though the customer's account is debited, the transaction is still processing or yet to reach Razorpay’s partner bank account. Therefore, the payment is not created and does not reflect on the Dashboard. There are two possible cases:
             - The transaction has failed, and the money will be refunded back to the customer by the customer’s bank.

             - The transaction is successful. However, our banking partner failed to send the confirmation to Razorpay. In such cases, the payment will be created and authorised within 24 hours. This is done to ensure end-to-end visibility of transactions for you and the customer. Additionally, this will enable you to take refund-related actions on your own.
        

## Post Payment Actions

    
### 1. What should I do once I receive the payment from a customer?

         You have to close the virtual account after the virtual account is credited successfully with the payment. You can either manually close the virtual account or set the time by when the virtual account should be closed.
        

    
### 2. What happens to payments made to a closed virtual account?

         All the payments made to a closed virtual account are refunded to the customer's account within 4-7 business days.
