---
title: Approvals On Invoices with RazorpayX
heading: Approvals On Invoices
description: Establish an approval workflow for your invoices through the RazorpayX Dashboard.
---

# Approvals On Invoices

Some vendor payouts may require multiple levels of approval by business stakeholders before they can be sent for the final review. To facilitate this approval process, you can add the approvers while uploading the invoice on the RazorpayX Dashboard. The invoices move to [`UNPAID` state](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/life-cycle#unpaid.md) after the invoice is approved. You can make the payment once you receive the approval/s.

Watch the video below to know how to enable the approval workflow and approve invoices.

[Video: https://www.youtube.com/embed/shWddDzbml0]

## Enable Invoice Approval Workflow

To enable the Business Approval Workflow:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Select **Vendor Payments** on the left navigation menu.
3. Click the ellipsis icon **⋮** and select **Invoice Approval Setting** as shown below.
    ![Invoice approval setting](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-vp-invoice-approval-setting.jpg.md)
4. Alternately, you can also navigate to **My Account & Settings** → **Workflow** → **Invoices** and select  **Invoice Approval Setting**.
5. Use the toggle button to enable **Approvals on Invoices** as shown below.
    ![Enable approval invoice workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-vp-enable-approval-invoice.jpg.md)

You can also toggle on **Skip approval for individual invoices** to allow your team member to upload invoice without requiring approval. 

> **WARN**
>
> 
> **Watch Out!**
> 
> An invoice cannot be edited once sent for approval or approved. You must create a new invoice if your invoice is rejected.
> 

### How it Works

First, [add invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/invoices.md) on the RazorpayX Dashboard.

1. Enter the details and click **Add Approvers**. 
    ![Add Approvers](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-vp-add-approvers.jpg.md)
   If you decide to **Skip** sending the invoice for approval, enter the reason for doing it.
    ![Skip approval email](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-vp-skip-approval-mail.jpg.md)
2. Enter the email of the approver. You can either add more approvers or click **Save**.
    ![Enter approver email](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-vp-approver-email.jpg.md)

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     - Once the approver(s) is added, they are considered default approvers for the respective vendor. However, you can [change the approver](#edit-approvers) at anytime.
>     - The approvers are added in an hierarchial order. That is, unless the first approver has approved the invoice, the approval mail is not sent to the next approver and the payment will not go through without receiving all the approvals.
>     - To maintain the control and correct audit trail on the invoice, you cannot edit invoices sent for approval. In case an invoice is rejected, you must be recreate the invoice and make the changes again before sending the invoice for approval.
>     

3. Click **Send** to email the invoice for approval.

You can also skip the approval workflow after invoice creation, when the invoice is `in approval` state and move it to the `UNPAID` state. 

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to **Vendor Payments** on the left navigation.
3. Select the `IN APPROVAL` invoice for which you want to skip the approval workflow.
4. Click the skip icon in the right pane with invoice details.
    ![specific and meaningful image title](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-vp-skip-approval.jpg.md)
5. Enter the reason for skipping th approval workflow and click **Skip approval**.

## Edit Approvers

To change the approvers, click **Change** and edit the email/s.

![Change approval email](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-vp-send-approval-mail.jpg.md)

## Invoice Status

Once the mail is sent for approval, the invoice status changes to`IN APPROVAL`, post which it is either `REJECTED` or `UNPAID` if the invoice is approved. To view the audit trail, navigate to **Vendor Payments** → **Invoices** and select the respective invoice to view the details.

![Invoice in approval](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-vp-invoice-in-approval.jpg.md)

Know more about the [Invoice Life Cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/life-cycle.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> In case an [accounting integration](@/Applications/MAMP/htdocs/new-docs/llm-content/x/accounting.md) is enabled, the invoices sync only post-approval.
> 

Know how to [approve or reject invoices via email](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/approve-invoices.md).

### Related Information

- [Invoices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/invoices.md)
- [Vendor Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments.md)
- [Approve Invoices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/approve-invoices.md)
