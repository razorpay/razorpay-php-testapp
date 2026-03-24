---
title: Payments | Refunds - FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Refunds via Razorpay and IRCTC refunds.
---

# Frequently Asked Questions (FAQs)

## General FAQs

   
### 1. How do I initiate a refund?

       You can issue partial or full refund using:
       - [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/issue.md#issue-refunds).
       - [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md).

       By default, the entire amount is refunded. If you issue a partial refund, ensure the partial refund option is selected and enter the desired value in INR.

       
> **WARN**
>
> 
> 
>        **Watch Out!**
> 
>        Razorpay issues immediate refunds. Once a refund is issued, it cannot be canceled or reversed.
>        

      

   
### 2. Do you charge for refund?

       - **Refunds**

       No, we do not charge for the regular refunds. However, fees and taxes charged for a captured payment are not reversed.
       - **Instant Refunds**

       Yes, we charge a small fee to issue instant refunds. Know more about [instant refund pricing](https://razorpay.com/pricing/).
      

   
### 3. I am unable to refund a payment. What do I do?

       If your current balance is less than the amount you are trying to refund, you can either initiate the refund once you receive further payments or you can [add funds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#add-funds) to your account from the Dashboard.
      

   
### 4. When a refund is initiated, can its status remain 'pending' until settlement? How should I track the final status (processed/failed)?

      Yes, a refund status can remain in a 'pending' state, particularly when the refund cannot be processed instantly. This state indicates that the refund has been accepted by Razorpay but is still being processed by the bank or payment network.

      The **`refund.processed` webhook** is the **most reliable and recommended** way to receive the final status update (Processed, Failed or Reversed).
      
      We strongly suggest implementing **both** the Refund API response handler (for immediate status) and the **`refund.processed` webhook** (for the definitive final status update) to ensure reliable status tracking and update your inventory/ledger accurately.
    

   
### 5. Do all refunds (including Instant Refunds) always return a 'processed' status instantly via the Refund API?

      No, not all refunds return 'processed' instantly.

      - **Instant Refunds (Optimum Speed):** If the refund is successfully processed instantly, the API response will typically show a `processed` status immediately or shortly after.
      - **Normal Refunds (Standard Speed) or Failed Instant Refunds:** If the refund defaults to the normal processing speed (5-7 business days) or if the API call is synchronous but the bank processing takes time, the initial API response might return a **`pending`** status.
   
      In all scenarios, rely on the **`refund.processed` webhook** for the final, verified status update to ensure your application records are correct.
      

## IRCTC Customers

   
### 1. I have cancelled my ticket. When will I receive my refund?

       After you cancel a booking, IRCTC has to initiate the refund. You will receive the credit in your account within 7-10 working days from the date of refund.
      

   
### 2. How can I check the status of my transaction if I have not received a confirmation mail?

       If you have not received the email, check your booking status directly on the IRCTC portal or contact IRCTC support.
      

   
### 3. My account has been debited but I have not received my tickets. How do I proceed?

       If you have not received your booking confirmation mail from IRCTC after paying for your tickets, it means your payment was unsuccessful. 

       In such cases, your money is credited back to your account within 7-10 working days from the transaction date. Know more about the [refund timelines](https://razorpay.com/blog/why-do-refunds-take-time/).

       If you have not received the amount even after 10 days, [contact support](https://razorpay.com/support/) with the following details:

       - IRCTC transaction id.
       - A copy of the bank statement from the date of debit to the current date.
       - UPI Reference number (if the transaction is via UPI).
      

.

       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        Razorpay issues immediate refunds. Once a refund is issued, it cannot be canceled or reversed.
>        

      
   
   
### 2. Do you charge for a refund?

       No, we do not charge for the regular refunds. However, fees charged for a captured payment are not reversed.
      

   
### 3. I am unable to refund a payment. What do I do?

       If your current balance is less than the amount you are trying to refund, you can initiate the refund once you receive further payments.
      

   
### 4. When a refund is initiated, can its status remain 'pending' until settlement? How should I track the final status (processed/failed)?

      Yes, a refund status can remain in a 'pending' state, particularly when the refund cannot be processed instantly. This state indicates that the refund has been accepted by Razorpay but is still being processed by the bank or payment network.

      The **`refund.processed` webhook** is the **most reliable and recommended** way to receive the final status update (Processed, Failed or Reversed).
      
      We strongly suggest implementing **both** the Refund API response handler (for immediate status) and the **`refund.processed` webhook** (for the definitive final status update) to ensure reliable status tracking and update your inventory/ledger accurately.
    

   
### 5. Do all refunds (including Instant Refunds) always return a 'processed' status instantly via the Refund API?

      No, not all refunds return 'processed' instantly.

      - **Instant Refunds (Optimum Speed):** If the refund is successfully processed instantly, the API response will typically show a `processed` status immediately or shortly after.
      - **Normal Refunds (Standard Speed) or Failed Instant Refunds:** If the refund defaults to the normal processing speed (5-7 business days) or if the API call is synchronous but the bank processing takes time, the initial API response might return a **`pending`** status.
   
      In all scenarios, rely on the **`refund.processed` webhook** for the final, verified status update to ensure your application records are correct.
      

.

       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        Razorpay issues immediate refunds. Once a refund is issued, it cannot be canceled or reversed.
>        

      
   
   
### 2. I am unable to refund a payment. What do I do?

       If your current balance is less than the amount you are trying to refund, you can initiate the refund once you receive further payments.
      

   
### 4. When a refund is initiated, can its status remain 'pending' until settlement? How should I track the final status (processed/failed)?

      Yes, a refund status can remain in a 'pending' state, particularly when the refund cannot be processed instantly. This state indicates that the refund has been accepted by Razorpay but is still being processed by the bank or payment network.

      The **`refund.processed` webhook** is the **most reliable and recommended** way to receive the final status update (Processed, Failed or Reversed).
      
      We strongly suggest implementing **both** the Refund API response handler (for immediate status) and the **`refund.processed` webhook** (for the definitive final status update) to ensure reliable status tracking and update your inventory/ledger accurately.
    

   
### 5. Do all refunds (including Instant Refunds) always return a 'processed' status instantly via the Refund API?

      No, not all refunds return 'processed' instantly.

      - **Instant Refunds (Optimum Speed):** If the refund is successfully processed instantly, the API response will typically show a `processed` status immediately or shortly after.
      - **Normal Refunds (Standard Speed) or Failed Instant Refunds:** If the refund defaults to the normal processing speed (5-7 business days) or if the API call is synchronous but the bank processing takes time, the initial API response might return a **`pending`** status.
   
      In all scenarios, rely on the **`refund.processed` webhook** for the final, verified status update to ensure your application records are correct.
