---
title: Razorpay Credit Line make withdrawals and repayments | Razorpay Capital
heading: Make Withdrawals & Repayments
description: Make Line of Credit withdrawals for custom tenures and repay or pre-close EMIs on your RazorpayX Dashboard.
---

# Make Withdrawals & Repayments

After your [credit limit](@/Applications/MAMP/htdocs/new-docs/llm-content/x/capital/line-of-credit#how-it-works.md) is available to you, you can start withdrawing from your credit line on the [RazorpayX Dashboard](https://x.razorpay.com/auth). Here you can:
- View your Line of Credit information, such as Withdrawal balance and Credit limit.
- [Make Withdrawals](#make-withdrawals). 
    - View your withdrawal summary.
    - View your repayment schedule/EMI summary for the selected tenure. 
- [Make Repayments](#make-repayments). 
    - Auto-repay your withdrawals. 
    - Manually repay your withdrawals. 
- [Pre-close Withdrawals](#pre-close-withdrawal). 

## Make Withdrawals 

To make withdrawals:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
1. Navigate to **Line of Credit** from the left menu.
1. On the **Overview** page, click **Withdraw Funds**. 
    ![Click Withdraw Funds on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/loc-withdraw-funds.jpg.md)
1. On the funds withdrawal screen:
    1. Enter your withdrawal amount and click **Proceed**. 
    1. Choose the EMI tenure for repayment. You can either: 
        - Select from the available tenures shown.
        - Click **Custom Tenure** to customise your repayment tenure in months. 
            ![Select from the tenures provided or choose a custom tenure](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/loc-fund-withdrawal-select-tenure.jpg.md)
        
> **WARN**
>
> 
>         **Watch Out!**
>         
>         Some tenure options are unavailable when the withdrawal amount is too large. Change the preferred tenure or select from the suggested tenures to proceed.
>         

    1. Click **Proceed**. 
1. In the **EMI Details** screen, you can preview some of the [withdrawal details](#view-withdrawal-summary).
    1. Click **See complete EMI schedule →** to view the repayment details and schedule. Following is a sample EMI schedule.
    ![EMI Withdrawal summary](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/loc-withdrawal-details.jpg.md)
1. After reviewing the EMI details, click **Confirm & withdraw** to proceed with the withdrawal request. 

When the **Withdrawal Initiated** success message appears, you have successfully made a withdrawal. 

### View Withdrawal Summary

The withdrawal summary is available in the **Withdrawals** section on the Dashboard, as shown. 
    ![EMI withdrawal summary shown in the right pane on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/withdrawal-summary-1.jpg.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> - The minimum withdrawal amount is ₹ 1,000.
> - Interest payable includes delayed charges, if applicable. It is shown using an ⓘ against the EMI amount.
> 

## Make Repayments 

You make EMI repayments in two ways from the RazorpayX Dashboard:
- [Autopay using NACH](#autopay-using-nach).
- [Make manual EMI Repayments](#manual-emi-payments).

### Autopay Using NACH 

By default, EMI repayments are automated. On the 5th of every month, the EMI due amount is automatically debited from your account balance via NACH. You need to ensure there is sufficient balance in your account for the NACH to debit. 

- In case of insufficient balance, the automatic collection fails and you incur delayed interest. RazorpayX sends you reminders via email as you near the due date. View your upcoming dues on the Line of Credit Overview page. 
    ![Repay Dues on LOC Overview Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/loc-repay-dues-emi.jpg.md)
- When the NACH is created, you can view that information on your LOC Dashboard. 
- Once the amount is debited, the withdrawal status is updated as per the [withdrawal workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/capital/line-of-credit#withdrawal-workflow.md).

### Manual EMI Payments  

You can pay your EMIs manually the following ways:

- Pay from the Overview page.
- Pay from the Withdrawal tab.

    
        When you want to repay more than one EMI at once, you can pay your EMIs directly from the Overview tab on the [RazorpayX Dashboard](https://x.razorpay.com/auth). 

            To repay from the **Overview** tab: 
            
            1. Navigate to **Line of Credit** from the left menu. 
            1. Click **Repay Dues** as shown. 
                ![Repay Dues on LOC Overview Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/loc-repay-dues-emi.jpg.md)
            1. The **Repayment** pop-up window opens. Review the total amount payable and the amount breakup by clicking the **View breakup** drop-down.
                ![LOC Repayment pop-up](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/pay-via-emi-overview.jpg.md)
            1. Select or unselect the EMIs you want to pay. After reviewing, click **Confirm Amount** to initiate the EMI repayment.
                ![Confirm Amount after reviewing EMIs payable](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/pay-emi-overview-select-deselect.jpg.md)
            1. Enter your contact details and make a successful payment. 

            After receiving your payment, the instalment history gets updated as per the [withdrawal workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/capital/line-of-credit#withdrawal-workflow.md).
    
    
        If you want to repay a single withdrawal EMI before the due date:
            1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth) → **Line of Credit** from the left menu.
            1. In the **Overview** page, go to the **Withdrawals** section. 
            1. Click the withdrawal you want to pay off. In the right pane that opens, you can view the summary of the withdrawal along with the repayment history.
            1. Click **Repay Dues** in that pane. 
                ![Click Repay Dues to make a single EMI payment](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/pay-from-withdrawal-tab.jpg.md)
            1. Enter your contact details and make a successful payment. 

            Once we receive your payment, the instalment history gets updated as per the [withdrawal workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/capital/line-of-credit#withdrawal-workflow.md).
    

## Pre-close Withdrawal

When you have the funds to pay off a withdrawal completely, you can choose to pre-close that withdrawal from the Dashboard. 
- There are no pre-closure charges when you do so. 
- This is a manual process. 

To pre-close withdrawal:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth) → **Line of Credit**.
1. Select the withdrawal EMI you want to pre-close from the Withdrawals section. The withdrawal summary pane opens to the right. 
1. Click **Pre-close withdrawal** to the bottom-right.
    ![Preclose your withdrawal from the withdrawal tab](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-loc-preclose-withdrawal.jpg.md)
1. In the pre-closure summary pop-up page, review the total amount and interest payable. Click **Preclose Withdrawal**. 
1. Enter your contact details and make a successful payment. 

Once we receive your payment, the instalment history gets updated as per the [withdrawal workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/capital/line-of-credit#withdrawal-workflow.md). You can withdraw 48 hours after pre-closing your EMI.

### Related Information 

- [Razorpay Capital Use Cases](@/Applications/MAMP/htdocs/new-docs/llm-content/x/capital/line-of-credit/#use-cases.md)
- [Top 10 Advantages of a Business Line of Credit](https://razorpay.com/learn/business-banking/why-is-line-of-credit-necessary-for-businesses/)
- [Line of Credit FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/capital/line-of-credit/faqs.md)
