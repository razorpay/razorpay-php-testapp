---
title: Withdraw and repay Razorpay Cash Advance Loan
heading: About Cash Advance
description: Check how to withdraw from Razorpay Cash Advance Loan and the repayment steps.
---

# About Cash Advance

> **SUCCESS**
>
> 
> **What's New**
> 
> Cash Advance is now available on the [RazorpayX Dashboard](https://x.razorpay.com/auth)! 
> 

Razorpay Cash Advance Loan is a self-serve loan portal offering low-interest, very short-term loans with a tenure between a few days and a few weeks.

Upon withdrawal, you can choose your repayment schedule. We deduct from your [settlement's current balance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/dashboard.md#view-settlements-using-dashboard) to repay the loan instalments automatically. You can also make repayments manually. 

    
### Necessary Terminology

         Following is a glossary of terms you frequently come across when using Cash Advance.
         
            Term | Description
            ---
            **Total Withdrawable Balance** | The original amount made available Cash Advance limit is approved.
            ---
            **Available Withdrawable Balance** | Available Withdrawable Balance is the maximum available balance you can withdraw from your line of credit. 
 
 `**Available Withdrawable Balance** = Total Withdrawable Balance - Amount Due.`
            ---
            **Due Repayments** | This is the amount you have withdrawn and must repay.
 `Due Repayments = Amount Withdrawn + Interest`. 
        
        

    
### Example of Withdrawal and Repayment

         Assume your Available Withdrawable Balance is ₹20,000 and your Available Withdrawable Amount is ₹10,000.

            
            | Available Withdrawable Balance | Due Repayments
            ---
            Opening Balance | ₹20,000 | ₹0
            ---
            Withdraw ₹5,000 | ₹15,000 | ₹5,025 (Amount Withdrawn + Interest)
            ---
            Withdraw ₹10,000 | ₹5,000 | ₹15,075 (Pending Balance + Amount Withdrawn + Interest)
            ---
            Repay ₹3,000 | ₹8,000 | ₹12,075 (Pending Balance - Amount Repaid)
            ---
            Withdraw ₹8,000 | ₹0 | ₹20,115 (Pending Balance + Amount Withdrawn + Interest)
            ---
            Repay ₹12,500 | ₹12,500 | ₹7,615 (Pending Balance - Amount Repaid)
            
        

Explore the following: 
- [How to apply for Razorpay Cash Advance Loan](#apply-for-cash-advance). 
- [Process for withdrawing from Cash Advance](#make-withdrawals). 
- [Automatic and manual repayment methods](#make-repayments). 
- [Pre-close Cash Advance Withdrawal from the RazorpayX Dashboard](#pre-close-withdrawal). 

## Apply For Cash Advance

To apply for a Cash Advance:

1. Visit the [Line of Credit](https://razorpay.com/x/line-of-credit/) page. You can also apply from the [Razorpay Dashboard](https://dashboard.razorpay.com/app/dashboard)/[RazorpayX Dashboard](https://x.razorpay.com/auth).
1. Follow these steps to apply for a [Line of Credit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit.md#apply-for-line-of-credit). The process is the same. 

Once the credit limit is approved, you can withdraw the amount from the [RazorpayX Dashboard](https://x.razorpay.com/auth). 

> **INFO**
>
> 
> **Handy Tips**
> 
> If you are an existing Razorpay user, follow the on-screen instructions to switch to the new Dashboard. 
> 

## Make Withdrawals

To make a Cash Advance withdrawal:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
1. Navigate to **Cash Advance** from the left menu. 
1. Click **Withdraw Funds** on the Cash Advance home page. 
    
1. Enter the amount you want to withdraw from your available withdrawable balance. Click **Proceed**. 
1. Select the tenure in days. You can view the instalment amount in the modal under your selection. Click **Proceed**.
1. Review the withdrawal details, such as the repayment schedule, interest rate and repayment method, total amount credited after the processing fee deduction, and more. 
    
1. Click **Confirm & withdraw** to proceed with the withdrawal. 

You have successfully made a withdrawal from your available Cash Advance limit.

> **WARN**
>
> 
> **Watch Out!**
> 
> Withdrawing from your Available Withdrawable limit is not permitted if you have overdue repayments. Repay your dues to withdraw again.
> 

## Make Repayments 

There are two ways to make repayments: 
- Daily Deductions (Automated and recommended)
- Manual Repayments

### Daily Deductions

By default, your repayments are automated via daily deductions. We debit your settlement balance on the due date to repay the Cash Advance loan's instalment. 

This happens on a daily basis and we recommend this for businesses using other [Razorpay products](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> We only deduct from your Razorpay [settlement's current balance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/dashboard.md#view-settlements-using-dashboard) and not your linked bank account.
> 

    
### Example

         Assume you withdrew ₹10,000 on July 02 and selected July 12 as the repayment date. The interest on this loan for 10 days is ₹20. The calculation then is as follows:

            - `Principle + total Interest for 10 days` = `₹10,000 + ₹20`
            - `Tenure` = `10 Days`
            - Daily Instalment: `(Principle + Interest)/Tenure` = `10,020/10` = ₹1,002/day

          ₹1,002 is collected daily from your settlement balance from July 03 till July 12.
        

### Manual Repayments

You can also repay the loan instalments manually in two ways:
- From the Overview page. 
- From the Withdrawal pane. 

To make repayments:
1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
1. You can do either of the following:
    
        
            1. Click **Repay Dues**. 
            1. Select the instalment to pay off in the **Repayment** pop-up modal. 
            1. Click **Confirm Amount**. 
            1. Select between your Razorpay [settlement's current balance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/dashboard.md#view-settlements-using-dashboard) for us to deduct your instalment amount or pay using UPI/Debit Card/Netbanking. 
            1. Follow the on-screen checkout instructions to complete the payment.

            This is helpful when you prefer to pay off multiple instalments at once.  
        
        
            1. Navigate to and select the specific instalment due yet to pay off.
            1. In the right pane, click **Repay Dues**. 
                
            1. Repay using UPI/Debit Card/Netbanking or your settlement balance. 
        
    

You have successfully repaid a Cash Advance loan instalment. 

## Pre-close Withdrawal 

You can pre-close a Cash Advance withdrawal on the RazorpayX Dashboard. 

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
1. Navigate to **Cash Advance** in the left menu → specific withdrawal to pre-close. 
1. In the right pane, click **Pre-close Withdrawal**. 
    
1. Review the preclosure details in the Pre-close Withdrawal pop-up modal and click **Pre-close Withdrawal**. 
1. Pay the remaining amount due using settlement balance or UPI/Debit Card/Netbanking. 

You have successfully pre-closed the withdrawal. 

#### Withdrawal Request Status

Status | Description
---
`initiated` | When you request a withdrawal on your Dashboard, the withdrawal is in this status. 
---
`processed` | Your withdrawal is in this status when our lending partners acknowledge your request, and Razorpay prepares the instalment plan chosen.
---
`disbursed` | When the funds requested are available in your account, the withdrawal reaches this status. 
---
`partially repaid` | If you repay less than the total due amount when [making repayments](#make-repayments), this is the status. For example, you withdrew ₹10,000 and repaid ₹6,000.
---
`repaid` | This is the withdrawal status when you have repaid the withdrawn amount in full. 
---
`overdue` | This is the status if you have not paid the instalment amount after the due date. [Repay your overdue instalments](#make-repayments) to withdraw from your Razorpay Cash Advance loan limit.
---
`failed` | Sometimes, your disbursal or repayments may fail due to unavoidable server downtimes. Retry the withdrawal/repayment process. You can [contact support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md#razorpayx-capital) from the RazorpayX Dashboard for any queries. 
---

## FAQs

    
### 1. What is Cash Advance?

         Razorpay Cash Advance is a self-serve, short-term loan portal that gives you an unsecured line of credit. 

         You can withdraw an amount of your choice from this credit limit as per your needs, which is then converted to a short-term loan.
        

    
### 2. How do I apply for a Cash Advance?

         To apply for a Cash Advance: 
            1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
            2. Navigate to **Cash Advance** in the left menu. 
            3. Fill in a few details and submit your application. 
        

    
### 3. How do I make withdrawals?

         You can [make withdrawals](#make-withdrawals) on the [RazorpayX Dashboard](https://x.razorpay.com/auth) at your convenience.
        

    
### 4. How often can I make withdrawals?

         You can make as many withdrawals as you wish, provided:
            - You have sufficient balance.
            - You withdraw less than your **Available Withdrawable Amount**.
        

    
### 5. How do I repay the money I withdrew?

         There are two types of repayments.
            - Daily deductions from your settlement amount.
            - Manual repayments made by you. This is in addition to the daily deductions from your settlement amount.
            Refer to the [Make Repayments](#make-repayments) section for more details.
        

    
### 6. Can I withdraw my entire line of credit in a single transaction?

         Yes. There is a limit to how much you can withdraw in a single withdrawal. This is defined by the **Available Withdrawable Amount** parameter.
            Refer to the [Credit Details - Necessary Terminology](#necessary-terminology) section for more details.
        

    
### 7. Is there a limit to how much I can withdraw in a single withdrawal?

         Yes. There is a limit to how much you can withdraw in a single withdrawal. This is defined by the **Available Withdrawable Amount** parameter.
            Refer to the [Credit Details - Necessary Terminology](#necessary-terminology) section for more details.
        

    
### 8. What is the interest on the Cash Advance loans?

         The interest rates start at 0.05% per day.
        

    
### 9. My question is not answered here.

         [Raise a request](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/support.md#raise-a-new-ticket) from your [RazorpayX Dashboard](https://x.razorpay.com/auth) in case of any queries.
        

#### Related Information

- [Razorpay Capital Use Cases](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit.md#use-cases)
