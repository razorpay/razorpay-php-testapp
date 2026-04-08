---
title: Approval Workflow on RazorpayX
heading: Approval Workflow
description: Assign user roles to create and approve payouts using the RazorpayX Approval Workflow.
---

# Approval Workflow

Approval Workflow, or the Maker-Checker, is a feature that can be used by organisations to have certain transactions go through an approval process.

You can create custom workflows for creation and approval, that allows you to have more control and scrutinise your payouts to reduce human errors. 

- There are no pre-set workflows that you need to follow.
- You can set up the Approval Workflow rules so that a payout created by a role can be approved by up to two different roles before it is sent for processing.

Approval Workflow can be applied to all payouts created on RazorpayX, whether they are created individually from the [RazorpayX Dashboard](https://x.razorpay.com/), using [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts.md) or using the [Bulk Payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts.md#payouts) feature.

> **WARN**
>
> 
> **Watch Out!**
> 
> The Approval Workflow feature is **not** available in the Test mode.
> 
> 

## Create a Workflow

To create an Approval Workflow:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
1. Navigate to **My Account & Settings** → **Workflow** → **Payouts**.
1. Click **Get Started**. You will be prompted with a sample template to create the workflow. Click **Awesome, got it** to continue.
    
1. You can start editing the template by entering the range and number of approvers required.
    - For example, for a range from ₹ 0 to ₹ 1,000 - No approval required.
    - ₹ 1,000 & 5,000 - Approval at Step 1.
    - ₹ 5,000 & Above - Approval at Step 1 and Step 2, and so on.
1. To add a range, click **+RANGE** between two ranges and to remove a range, click **-** along the listed range.
    
1. You can use the **+Approvers** to add an approval step.
1. Once you have clicked on **+Approvers**, you can add approvers in the step by selecting a desired role from the drop-down.
    
1. You can add multiple roles as approvers in a step by the `OR` or `AND` conditions.
    - For example, for a range - ₹ 1,000 & 5,000
        - If Step 1 approvers are Finance OR Admin, the payout in that range will be processed or move to the next step of approval on either Finance or Admin approval.
        - If Step 1 approvers are Finance AND Admin, the payout in that range will be processed or move to the next step of approval on both Finance and Admin approval.
        
1. Once you are done with all the changes, click **Save Workflow**.
1. Confirm saving workflow and [2FA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/2fa.md) to create workflow successfully.

> **INFO**
>
> 
> **Handy Tips**
> 
> While adding a role as an approver in the workflow, please make sure that the role has permission to view payouts. You will be able to view the permissions associated with a role in the **Roles and Permissions** tab of team management.
> 

## Edit Workflow

To edit an Approval Workflow:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
1. Navigate to **My Account & Settings** → **Workflow** → **Payouts**.
1. Click on the Edit Workflow icon as shown below.
    
1. If you don’t have any pending Payouts or Payout Links:
    - You will proceed directly to the workflow builder. Here you can add, edit or remove approval ranges, approvers and approval steps.
    - Once you are done with all the changes, click **Save Changes**.
    - An OTP is sent to your registered mobile number to confirm changes to the workflow.
5. If you have pending Payouts or Payout Links:
    - You are notified of the pending Payouts or Payout Links.
    - If you wish to review the Pending Payouts, you can do so by clicking **REVIEW**.
    - You can approve or reject these Pending Payouts before saving changes to workflow.
        
    - Click on **Got it, Proceed** to proceed to the workflow builder.
    - On the workflow builder, you can add, edit or remove approval ranges, approvers and approval steps.
    - Once you are done with the changes, click **Save Changes**.
    - An OTP is sent to your registered mobile number to confirm rejection of Pending Payouts or Payout Links and saving changes to the workflow.
        

### What happens once Approval Workflow is set up?

Approvers can approve or reject payouts and payout links from the [RazorpayX Dashboard](https://x.razorpay.com/), mobile app or RazorpayX Slack App. You can also select and approve multiple payouts at once from the Dashboard using the check box beside the payout.

Let us consider that you have set up a workflow where any payout above ₹10,001 has to be approved by the roles Finance L2 in Step 1 and Finance L3 in Step 2. Below is how the payout is created and approved:

Action by User | What Happens | Reason
---
Step 1: Payout is created. | The payout moves to the `pending` state. | Approval needed from Finance L2 (Step 1 Approver).
---
Step 2: Finance L2 approves the payout. | The payout remains in the `pending` state. | Approval needed from Finance L3 (Step 2 Approver).
---
Step 3: Finance L3 approves the payout. | - The payout moves to the processing state if there’s sufficient balance. 
- The payout moves to the queued state if there’s insufficient balance.
 | No further action required.

No further action is required by you to process the payout. That is, it can either be processed or reversed.

> **WARN**
>
> 
> **Watch Out!**
> 
> Any payout in `pending` or `queued` state for more than 3 months will automatically be `cancelled` or `rejected`.
> 
> 

## Disable Approval Workflow for Payouts Created Using APIs

When an approval workflow is created, it by default applies to API payouts as well.

You can disable Approval Workflow only for payouts created using APIs. Payouts and payout links created using the Dashboard or mobile will still follow the Approval Workflow as defined, before they are processed.

To disable Approval Workflows for payouts created using APIs from the RazorpayX Dashboard:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **My Account & Settings** → **Workflow** → **Payouts** and use the toggle button to disable the **Workflow on payouts created via API**

## Removing Approval Workflow

You can disable Approval Workflow anytime. On disabling, all the payouts in `pending` state are `rejected` automatically and the payouts are processed without approval.

To remove or disable the approval workflow:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **My Account & Settings** → **Workflow** → **Payouts**.
3. Click on the delete icon and click **Yes, Proceed**.
     
4. Enter the OTP sent to your registered email id and mobile number and click **Confirm**.

Your Approval Workflow is removed.

## Webhook Events

In addition to the [webhook events available for payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md), the Approval Workflow has the following events.

Event Name | Description
---
**payout.pending** | Triggered whenever a payout moves to the `pending` state. That is, the payout needs to be approved by a user for processing.
---
**payout.rejected** | Triggered whenever a payout moves to the `rejected` state. That is, the payout was rejected by a user.

### Related Information

- [Manage Teams](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams.md)
- [Chartered Accountant Portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/ca-portal.md)
- [Invoices - Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/approvals-on-invoices.md)
