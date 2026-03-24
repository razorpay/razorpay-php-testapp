---
title: Multi Branch Management on RazorpayX Dashboard
heading: Multi Branch Management
description: Manage multiple business branches/locations and track the respective vendor payments from one RazorpayX account.
---

# Multi Branch Management

Multi Branch management enables you to set up multiple branches of your business under one RazorpayX account so that you can seamlessly manage:

- [Initiation of POs, GRNs and invoices for various branches](#auto-fill-branch-details-on-invoice-or-po).
- [Payment of invoices issued to respective branches](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/#invoices-and-advances.md).
- [Syncing respective branch related GST details to your accounting tool](#sync-gst-data-to-your-tally-ledgers).

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can configure the respective branches to have the same or different GSTINs. 
> - It is mandatory to create at least one branch if the multi branch management functionality is enabled for your RazorpayX account.
> 

## Create New Branch

You can create multiple branches and manage them from your RazorpayX account. To create a branch:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to the profile icon → **My Accounts & Settings** → **Branches**.
3. Click **+ New Branch**.
4. Enter the details and click **Save**.
    ![Create new branch](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-create-branch.jpg.md)
    - You can mark any one of your branches as the primary branch, if a majority of your invoices and POs are billed to that branch. This will automatically add the billing address on your POs and invoices. You can change your primary branch anytime by marking any other branch as the primary branch, if required.

## Edit Branch

To edit a branch:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to the profile icon → **My Accounts & Settings** → **Branches**.
3. Hover over the branch you want to edit, click ⋮ and **Edit**.
    ![Edit branch](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-edit-branch.jpg.md)
4. Edit the **Business Nickname**, **Name** or **Address**. You cannot edit the GSTIN. Click **Save**.
5. Click **Save Changes** on the pop-up window.

Your changes are saved. Invoices in `draft` state and POs in `created` state are updated with the changes made to the linked branch.

## Mark Branch Inactive

You can deactivate a branch if it is no longer required. This action is irreversible. To mark a branch inactive:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to the profile icon → **My Accounts & Settings** → **Branches**.
3. Hover over the branch you want to deactivate, click ⋮ and **Mark as Inactive**.
4. Click **Mark as Inactive**.
    ![Delete branch](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-mark-branch-inactive.jpg.md)

You cannot reuse an inactive branch. Create a new branch if required.

## Auto-fill Branch Details on Invoice or PO

You can select branches for your Invoices and POs on the **Invoice Details** tab and **PO Details** tab respectively, through the **Bill to** field. By default, the invoice/PO is auto-filled with the details of your primary branch. Click **Change** to update the **Bill to** field for your invoice/PO from your list of branches.

![Select Branch for PO](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-branches-PO-details.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> To change a PO linked invoice's branch, you must change the branch linked to the PO of that invoice. This is because invoices are linked to POs and you can only update the POs' branch on RazorpayX.
> 
> 

## Sync GST data to your Tally Ledgers

You can sync your respective GST data from RazorpayX to your Tally ledgers at branch level. To configure the sync: 

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to the profile icon → My Accounts & Settings → Integrations.
3. Click **Edit Configuration** → **Mappings** → **GST**.
4. Choose the branch for which you want to configure the Tally ledger mapping.
5. **Select Ledger** for all required GST types that you want to configure and select the ledger that you want to map.
6. Click **Save changes**.

Know more about [accounting integrations](@/Applications/MAMP/htdocs/new-docs/llm-content/x/accounting.md).
