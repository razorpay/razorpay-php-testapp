---
title: Payments | Settlements - FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay Payment Settlements.
---

# Frequently Asked Questions (FAQs)

### 1. What are settlements?

         Settlement is the process in which the money received from your customers is settled to your bank account. Settlements for all payments will be done in INR (Indian Rupees), irrespective of the currency in which the payment was made by the customer. Settlement cycle is subject to bank approval and can vary based on your business vertical, risk factor, and so on. Each settlement generated has a unique settlement id attached to it along with the amount settled. Know more about [Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/settlements.md).
        

    
### 2. What is the settlement cycle you offer?

         Our standard settlement cycle is T+1 working days, T being the date of transaction capture. This means that the captured payments are settled within 1 working days from the date of capture.
         
> **INFO**
>
> 
> 
>          **Handy Tips**
>  
>          Working days do not include second and fourth Saturdays, Sundays and bank holidays.
>          

        

    
### 3. How do I check settlements in my bank account?

         Each settlement has a Unique Transaction Reference (UTR) number, which is provided by our banking partners. You can see this number in the settlement section when you click on a particular settlement id. You can also download **Settlement Reports** from the **Reports** section to view UTR. This is a unique reference number available across banks, which can be used to track a specific settlement in your bank account.
         ![UTR](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/settlements-utr.jpg.md)
        

    
### 4. The status of my settlement shows as failed on the Dashboard. What do I do?

         Check if you have received an email from our Support Team. Please revert to the mail with the necessary details. If you have not received any email from Razorpay, please contact our [Support Team](https://razorpay.com/support/#request) for assistance.
        

    
### 5. How to reconcile settlements along with the transactions made?

         You can [download a daily or a monthly report](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/reports.md#generate-reports) for the **Settlement Reconciliation Report** from the **Reports** section on the Razorpay  Dashboard. The report contains transactions and the corresponding settlement ids.
