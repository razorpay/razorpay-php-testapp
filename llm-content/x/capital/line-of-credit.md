---
title: Apply for and use Razorpay Credit Line | Razorpay Capital
heading: About Line of Credit
description: Explore the meaning, merits and workflow of Line of Credit withdrawals.
---

# About Line of Credit

Razorpay [Line of Credit](https://razorpay.com/x/line-of-credit/) (LOC) is a convenient working capital solution offering flexible repayment options for a 12-month tenure. You can choose your repayment tenure and pay interest only on the amount you have withdrawn via equated monthly instalments (EMI) at your own pace.

You can cover your planned and unexpected financial outflows with a Line of Credit and conveniently withdraw funds from your assigned credit limit. Explore the following about Line of Credit: 
- [Features](#features).
- [Line of Credit Uses](#line-of-credit-uses). 
- [Advantages](#advantages). 
- [How to apply](#apply-for-line-of-credit). 
- [Withdrawal statuses shown on the Dashboard](#withdrawal-workflow). 

## Get Started 

A Line of Credit is beneficial for your business's short-term monetary needs. Once the limit is sanctioned, you can withdraw and automate your repayments easily. 

    
### Features

         Razorpay Line of Credit offers the following features: 

            - Avail collateral-free Line of Credit.
            - Withdraw and repay from a single Dashboard, 24*7.
            - Better savings with automated repayments and zero pre-closure charges. 
            - Pay interest only on the borrowed amount.
            - Manual repayment options for increased flexibility. 
            - Low interest rate starting 1.5% per month. 
        

    
### Line of Credit Uses

         Businesses often need capital to cover expenses, cash flow gaps, equipment maintenance and more. Following are some use cases of Line of Credit:

            - A Line of Credit can be helpful for large inventory purchases where you can avail discounts when you make bulk purchases.
            - You can withdraw from your Line of Credit for short-term plans like marketing campaigns, product launches, festive bonuses, and more.  
            - In case of a business emergency or a tight cashflow situation, you can instantly use a Line of Credit to withdraw funds. 

            You can read more about [using Line of Credit](https://razorpay.com/learn/business-banking/how-a-line-of-credit-can-help-your-business/). 
        

    
### Advantages

          - **Fixed Due Date** 

            Pay EMIs on one fixed due date, no matter when in the month you have withdrawn. This induces better financial planning as you need not check if you have sufficient balance in your account for every different due date. 
        - **Automated Collection** 

            The EMI amount is auto-debited from your account balance on the 5th of every month via automated NACH. You need to ensure there are enough funds to make the repayments. You can also make [manual repayments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#manual-emi-payments) as you wish. RazorpayX reminds you as you approach the due date via email. 
        - **Flexible Withdrawal and Repayment** 

            Withdraw the necessary amount on any day of the month. Repay in monthly instalments as per your business needs.
        - **No Additional Costs** 

            There is no processing fee, pre-closure charges, or hidden charges when availing Line of Credit. You repay only the principal amount borrowed along with the interest payable on the due date. 
        

## Apply for Line of Credit

To apply for Line of Credit: 

1. Visit the [Line of Credit](https://razorpay.com/x/line-of-credit/) page. 
    1. Enter your mobile number and complete the OTP verification process. 
        ![Apply for Line of Credit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-loc-apply.jpg.md)
    1. Enter your name to create an account with Razorpay. You are then redirected to the LOC application form. 
1. Enter the necessary details required to complete the Line of Credit application.  
    1. Provide business and personal details applicable as per your business type. 
    1. Authorise Razorpay as a representative to conduct a credit check from CIBIL/Experian. 
    1. Submit the form. 
        ![Submit the LOC form after filling your details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-loc-apply-1.jpg.md)
1. After we receive your details, we perform a credit verification and eligibility check. 
    1. At this stage, you must either:
        - Manually upload your bank account statement. 
        - Upload bank account statement through netbanking via Perfios.
    1. We process and review your details, and ask you to confirm your email.  
1. Based on your eligibility, we evaluate an offer for you and show the sanctioned credit limit.
    ![Line of Credit offer page with limit of Rs. 5 Lakhs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-loc-offer.jpg.md)
1. After you have accepted the offer, submit your KYC details and sign the relevant agreement documents.
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Only registered businesses operating for at least 12 months with an annual turnover of ₹20 lakhs can avail Line of Credit.
>     

You can now log in to your [RazorpayX Dashboard](https://x.razorpay.com/auth) and: 
- [Withdraw funds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#make-withdrawals) from your line, 24/7. 
- Choose the tenure within which you want to repay the withdrawn amount, including the interest accumulated. 
- [Repay your withdrawals](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#make-repayments) in two different ways, or pre-close withdrawal.

## Withdrawal Workflow

In Line of Credit, you withdraw from an available credit limit and repay the amount withdrawn with interest. 

Following is the status flow for the withdrawal and repayment process:

Status | Description
---
`initiated` | When you request a withdrawal on your Dashboard, the withdrawal is in this status. 
---
`processed` | After requesting the withdrawal, our lending partner, Gromor, acknowledges it, and Razorpay prepares an EMI plan in this status.
---
`disbursed` | When the funds requested are available in your account, the withdrawal reaches this status. 
---
`partially repaid` | If you repay less than total due amount when [repaying a withdrawal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md#make-repayments), this is the status.
---
`repaid` | If you have completely repaid the withdrawn amount in full, the withdrawal status is `repaid`. 
---
`overdue` | This is the status if you have not paid the EMI amount after the due date. You can only make further withdrawals when you pay the overdue EMI.
---
`failed` | If your EMI repayment had failed, this is the status. This usually happens due to unavoidable server downtimes. Retry making the EMI payment. [Contact support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md#razorpayx-capital) from the Dashboard for any queries. 
---

You can always filter your EMIs basis their status using the **Quick Filters** menu, as shown.

![Quickfilters menu on the RazorpayX Line of Credit Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-loc-quickfilters.jpg.md)

### Calculations and Charges

There are NO hidden charges when you withdraw from the Line of Credit. 

- However, **overdue charges are applicable** when you do not pay the EMIs on the due date. 
 
 The interest accrued is shown on the right pane of the [withdrawal summary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/dashboard.md) with ⓘ and is inclusive of the overdue charges when you view it after the due date.
    ![tooltip icon that shows overdue charges when hovered over](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-loc-charges-tooltip.jpg.md)

- Delayed interest is an overdue charge applicable if you do not pay your EMI on the due date. This interest is charged on a daily basis on the outstanding EMI amount. 
- These calculations are specific to the credit line sanctioned and can be found in the Key Facts Statement and other loan agreement documents.

All interests (broken period, delayed interest, EMI interest) and EMIs are rounded to the nearest rupee. This adjusts the principal to a rounded-off amount. 

### Related Information 

- [Razorpay Capital Use Cases](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit.md#use-cases)
- [Top 10 Advantages of a Business Line of Credit](https://razorpay.com/learn/business-banking/why-is-line-of-credit-necessary-for-businesses/)
- [Line of Credit FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/capital/line-of-credit/faqs.md)
