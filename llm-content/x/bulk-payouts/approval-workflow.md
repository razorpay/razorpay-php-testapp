---
title: Bulk Payouts Approvals
description: Explore the approvals process when you create bulk payout batches.
---

# Bulk Payouts Approvals

After you set up an [approval workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) and [create bulk payout](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts/#create-bulk-payout.md), you can review the bulk payout batch files and approve them with a single OTP. 

## How it Works

Assume you have set up an approval workflow where:

Total Amount Condition | Action
---
0 - ₹10,000 | No approval from Owner is needed.
---
₹10,000 - ₹50,000 | Approval from the Finance role is needed.
---
Greater than ₹50,000 | Approval from the role Finance and Administrator is needed. 

Suppose you have created a bulk payout batch of 15 payouts each worth ₹1,000. The batch's total is ₹15,000. Approval workflow is applicable on: 

- **The individual payout's amount in a batch**:

    In this case, the bulk payout batch is not sent for approval as the individual payout's amount is not greater than ₹10,000. 

    Only if there are individual payouts greater than ₹10,000 in a batch file, you must approve each payout.

- **The sum of all the payout amounts in a batch**:

    In this case, batch total is ₹15,000. This batch is sent for approval as the total batch amount is > ₹10,000.

Choose the second option in the [set up process](#set-up) to approve bulk payout batch with a single OTP. 

## Set Up

To approve bulk payout batches with a single OTP, enable the setting:  

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth) as an [Owner/Admin](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams.md) and go to **My Account & Settings** under the user profile icon. 
1. Navigate to **Workflows** from the left menu. 
1. Click the edit icon against **Approvals on Bulk Payouts** section. 
    ![Click edit on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-bulk-payouts-approvals-enable-setting.jpg.md)
1. Select **Approve entire batch at a go** and click **Save**.
    ![Enable setting to approve bulk payout with single OTP](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-bulk-payouts-approvals.jpg.md)

You have successfully enabled the setting to approve a batch of bulk payout with a single OTP. Your team can now create bulk payout batches using the [new templates](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts/#download-templates.md) and send them for approval.

## Review Bulk Payouts 

To approve/reject the bulk payout batches pending on you: 

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth) as an [Owner/Approver](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams.md).
1. To view bulk payout batches pending on the approver, you can: 
    1. Access the Dashboard from the approval request email sent to your registered email id. 
    1. Click the action items on the RazorpayX Dashboard Home Page.
        ![RazorpayX Dashboard Home Page showing pending bulk payout actions](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-bulk-payouts-approval-action-items.jpg.md) 
    1. Go to **Payouts** in the left menu → **Bulk** tab. Check batches with the `pending` status.

You can now approve or reject the bulk payout batches as necessary. 

## Approve Bulk Payout Batch 

To approve bulk payout batches:

1. Hover on the batch item line to click **APPROVE**. You can also click the batch to view more details and take action on the bulk payout request. 
1. Click **✓ Approve**.
    ![Approve or reject a bulk payout batch on RazorpayX](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-bulk-payouts-approval-approve-reject.jpg.md)
1. Review the batch file details and approval workflow in the **Approve Bulk Payout** pop-up window.
    ![Approve Bulk Payouts file on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-bulk-payouts-approvals-modal.jpg.md)
1. Click **Next** to enter the OTP and click **Approve**.

You have successfully approved the bulk payout batch file. After all the level of approvers have approved the batch, the file moves to the `processing` status. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Only the bulk payout batch file moves to the `processing` status. Know more about [Bulk Payouts batch processing vs Payout processing](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts/#bulk-payouts-batch-processing-vs-payouts-processing.md). 
> 

## Reject Bulk Payout Batch 

To reject the bulk payout batch file: 

1. Hover on the batch item line to click **REJECT**. You can also click the batch to view more details and take action on the bulk payout request. 
1. Click **× Reject**. 
    ![Approve or reject a bulk payout batch on RazorpayX](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-bulk-payouts-approval-approve-reject.jpg.md)
1. Review the batch file details in the **Reject Bulk Payout** pop-up window and provide remarks for rejecting the bulk payouts batch.  
    ![Reject Bulk Payout file on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-bulk-payouts-approvals-reject-modal.jpg.md)
1. Click **Reject**.

You have successfully rejected the bulk payout batch file post which the file moves to the `rejected` status.

You can view the bulk payout batch files' history on the Dashboard. Select **All** in **Quick Filters**.

![Bulk Payout files history in Quick Filters.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-bulk-payouts-approvals-filters.jpg.md)

### Related Information

- [Bulk Payouts Life Cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts/life-cycle.md)
- [Bulk Upload Report](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts/report.md)
