---
title: Razorpay Capital Line of Credit | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Line of Credit.
---

# Frequently Asked Questions (FAQs)

### 1. I am unable to make my EMI payment and the due date is close. What are the alternative ways in which I can make timely repayments?

         If you are unable to manually pay your EMIs from your Dashboard, it means we have already initiated a NACH to auto-debit the amount from your balance. 
         - If the autopay/NACH fails, we trigger a [Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md) to collect the overdue amount. The overdue amount is adjusted to include the [delayed interest](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit.md#delayed-interest) charges. 
         - If you still want to make a manual repayment, [contact support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md#razorpayx-capital). Any amount received from the NACH will be credited back to your account. 
        

    
### 2. How can I know if NACH is already initiated?

         
         You can view if the [NACH is initated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#autopay-using-nach) on your RazorpayX Dashboard. 
        

    
### 3. Where can I view my credit limit/balance?

         You can view it on your LOC [**Overview** page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#make-withdrawals). 
         - **Credit limit** is the maximum amount assigned to you from which you can withdraw.
         - **Credit balance** is the balance remaining after withdrawing any amount from the credit limit. 
        

    
### 4. What is the fixed due date for every withdrawal?

         The fixed due date for all the EMIs payable is the 5th of every month. 
        

    
### 5. Where can I view my EMI details?

         On your LOC **Overview** page, click on the withdrawal you want to know about. You can view your EMI details for that withdrawal in the pop-up pane that opens to the right. 
         
         Know more about [EMI details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#make-withdrawals).
        

    
### 6. What are my modes of repayment?

         Your primary mode of repayment is automated via NACH collection that happens on the 5th of every month. Alternatively, you can repay your EMIs via: 
         - [Manual EMI payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#manual-emi-payments).
         - [Pre-closing withdrawals](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#pre-close-withdrawal).
        

    
### 7. I am unable to withdraw money from my available credit limit. Why?

         There are two reasons for this: 
         1. You have an **overdue EMI**. 

            Repay your existing overdue EMI to start withdrawing from your Line of Credit again. 
         1. You are **making a fourth withdrawal**. 

            In the current LOC EMI model, you cannot have more than three active EMIs. If you are unable to withdraw money even though you have not exhausted your credit limit, this is the reason. 
            
            To withdraw again, close any one of the three active withdrawal EMIs. There are no [pre-closure charges](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#pre-close-withdrawal) for pre-payment.
