---
title: Payments | Refunds - FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Refunds via Razorpay and IRCTC refunds.
---

# Frequently Asked Questions (FAQs)

### 1. How do I initiate a refund?

       You can issue partial or full refund using:
       - [The Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/refunds/issue.md#issue-refunds).
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

      

   
### 2. Do you charge for refunds?

       No, we do not charge for the regular refunds. However, fees and taxes charged for a captured payment are not reversed.
      

   
### 3. I am unable to refund a payment. What do I do?

       If your current balance is less than the amount you are trying to refund, you can either initiate the refund once you receive further payments or you can [add funds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#add-funds) to your account from the Dashboard.
