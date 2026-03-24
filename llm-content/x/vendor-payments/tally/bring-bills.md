---
title: Bring Invoices from RazorpayX to Tally
heading: Bring Invoices to Tally
description: Automate invoice sourcing and bookkeeping process in Tally and improve journal entry narrations using ledger mapping.
---

# Bring Invoices to Tally

With the accounting assistant, the [RazorpayX-Tally Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/tally.md), you can: 
- Source invoices from the Vendor Payments App to Tally. 
- Automate the bookkeeping process, that is, creating the bill → the payment → reconciliation of the bill. 
- Map the bills generated to the tax and Vendor Expenses ledgers in Tally.

## How it Works

Watch the video below to understand the advantages and the process of automating the bookkeeping process or read along.

[Video: https://www.youtube.com/embed/FjtAbWzQuYE?list=PLCwKlvaW1shYSe38ZxPE2e_jfuuxxwGmq]

You can also watch the [Bring Bills from RazorpayX to Tally video in Hindi](https://www.youtube.com/watch?v=56rUlfPlUbM). 

1. Source the bills received and paid through your RazorpayX Vendor Payments App to Tally. 
2. The bills received from the below-mentioned modes are auto-read by the RazorpayX AI OCR reader. You can create bills in RazorpayX via: - [Vendor Portal](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/portal/business.md)
- [Bulk drag and drop](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/bulk-invoices.md)
- [Email Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/invoices/#add-invoices-through-email.md)
 You can pay bills in RazorpayX via: - [Bulk Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/vendor-payouts/bulk.md)
- [Partial Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/vendor-payouts/partial-payouts.md)
- [Scheduled Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments/vendor-payouts/scheduled-payouts.md)

3. Review the invoices and sync them to Tally, which automatically creates the journal entries. Tally then maps the entries to the ledgers. 
4. Verify the journal entries and map them to the respective ledgers, if necessary. 
5. After your CA/Finance team has reviewed and approved them, post them to Tally. 

## Advantages 

Following are the advantages of automating the bookkeeping process. With the RazorpayX-Tally integration, you can:

- Reduce your data entry effort by up to 40%. 
- Eliminate errors of omission or repetition. 
- Remove the pain of manual cross-verification between multiple Excel sheets.
- Choose when, who and how the journal entries are synced to Tally.
- Need not worry about making manual changes as per approvals and audit changes your CA suggests. 
- The OCR reader scans the bills uploaded from [all the bill creation modes](#how-it-works), so you do not have to focus on entering the correct details. The bills paid are also easily synced.

## Setup Workflow 

To source and map the bills sourced from RazorapyX, you must set up: 
1. [RazorpayX to Tally workflow](#enable-setting). 
2. [Ledger and Mapping mechanism](#ledger-and-mapping).

## Enable Setting

To bring the bills from RazorpayX to Tally: 

1. Open your Tally application to show the **Gateway of Tally** page. 
1. Click **R:RazorpayX Settings** from the right menu.
    ![Click R:Razorpay Settings from the right menu in the Tally application](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-tally-int-razorpayx-settings.jpg.md)
1. Enter **Yes** against the following settings to enable the feature: 
    
   Settings | Value
   ---
   **Bring invoices from RazorpayX to Tally** | Yes
   ---
   **Sync on Receipt** | Yes
   ---
   
   ![Change the settings against bringing invoices and syncing receipts on Tally](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-tally-int-bring-bills1.jpg.md)
1. Enter the OTP you receive at your email address and save the settings. 

You have successfully enabled the feature to bring bills from RazorpayX to Tally. 

## Ledger and Mapping 

When you [generate an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments.md) in Vendor Payments, you can automate bringing that bill to Tally. 

You can also choose to automate mapping those bills to the ledgers present in Tally as per the conditions matched. This is a one-time setting only. 

There are two ledgers you map your bills to:
- [Vendor Expense Mapping](#1-vendor-expense-mapping). 
- [Tax Ledger Mapping](#2-tax-ledger-mapping). 

#### How it Works

1. Set up the necessary ledgers and map the expenses and tax accordingly. 
2. When you bring a bill from RazorpayX, Tally maps that transaction to the respective ledger. 
3. You can manually change the mapping to a different ledger if necessary. 

Suppose you run a clothing business and make the following payments from RazorpayX regularly:
- To a supplier who provides readymade clothing items.
- To a different supplier who provides unstitched dress material. 
- To a logistics company that offers home delivery on all orders received.
- To suppliers who provide housekeeping, canteen, packaging, sundry expenses and many other services.
- Pay tax incurred on these transactions as per the relevant tax categories. And so on.  

For all such cases and more, you can:
- Create Expense Ledger. This maps the expenses you frequently incur.
- Create Vendor Ledger. You collate a list of Vendors to whom you regularly make payments to.
- Use Tax Ledger to map the tax paid and credited.

Now, map the expense to the vendor and vice versa in the **Vendor Expense Mapping** ledger. When moving the transactions to Tally, the ledgers automatically map the transaction to the expense incurred per the vendor to whom you have paid. 

#### Example 

Suppose Pankhuri Traders is one such supplier. 
- You incur Canteen Expenses regularly from them and make payments to them. 
- In such cases, you can map Canteen Expenses to Pankhuri Traders in your Tally ledger. 

When you create an invoice in RazorpayX for Pankhuri Traders and sync the bill in Tally, the narration for the journal entry in Tally gets automatically updated to Canteen Expenses. This is because the vendor, Pankhuri Traders, is already mapped to Canteen Expenses. 

You can also map one vendor to many expenses in the expense ledger.

#### Advantages 

- **Understand banking transactions from a business perspective** 
 
    - When you make payments using RazorpayX, you can use Payout Notes, Contact type and name, Payout Purpose, and more, to generate a banking narration. 
    - When syncing to Tally, the banking narration can help to automate mapping the tax, vendor or expense entry to Tally when it matches with the ledger entry. 
    - If many teams handle your vendor business and reconciliation, they can understand the transactions easily in this way. 
- **Create context-specific journal entries** 

    When the transactions are specific to context about when, how and why you have made the payment, you improve the narration of your journal entry automatically.
- **Automates the process** 

    uppose you create an invoice against a specific vendor already mapped to an expense in the Vendor Expense mapping ledger. The narration automatically syncs the invoice in Tally to its mapped expense. 

    Due to not manually making the entries, you save time and effort. You can verify, repeat and reduce errors easily. 
- **One-time process** 

    It is a one-time process. Every time you select a type of expense or a specific vendor, the expense gets updated to match the mapping you have set. If necessary, you can still map the expense manually to a different expense.

### 1. Vendor Expense Mapping 

To set up your Vendor Expense ledger:
1. Open your Tally application to show the **Gateway of Tally** page.
1. Go to **UTILITIES** → **RazorpayX**. 
1. In the **RazorpayX** menu, click **RazorpayX Cashflow**.
1. In **RazorpayX Cashflow**, click **Settings**. 
1. Here, click **Vendor Expense Mapping**. 

    ![Process showing the vendor expense mapping mechanism](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-tally-bring-bills-ve.gif.md)

In the **Vendor Expense Mapping** window, you can map your Vendors and sundry creditors to the expense ledger on a one-to-one basis. This is a one-time process.

![Example of a Vendor Expense Ledger](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-tally-int-bring-bills.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> When you add a bill from a new vendor and map it to an expense in the Vendor Expense ledger, Tally automatically maps the vendor to that expense category for all future invoices from them.
> 

### 2. Tax Ledger Mapping 

You can map your TDS Credit and GST Debit settings to the Tax ledgers in Tally as applicable. This is also a one-time process. To do so:

1. Open your Tally application to show the **Gateway of Tally** page.
1. Go to **UTILITIES** → **RazorpayX**. 
1. In the **RazorpayX** menu, click **RazorpayX Cashflow**.
1. In **RazorpayX Cashflow**, click **Settings**. 
1. Here, go to **Tax Ledger Mapping**. 

![Workflow to setup tax ledger and mapping](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-tally-bring-bills-tl.gif.md)

In the **Tax Ledger Mapping** page, map the **GST - Debit** and **TDS - Credit** to the respective Tally ledgers as per the tax categories applicable. 

![Example of a Tax Ledger](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-tally-int-bring-bills-tl-example.jpg.md)

## Bring Bills to Tally

After you enable the settings in your Tally application, you can test the automation. Once you source an invoice from RazorpayX to Tally, you can:

- [Sync the bill](#sync-bills).
- [Post the bill](#post-to-tally).

## Sync Bills  

After you [create an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments.md) in Vendor Payments, sync the bill in Tally. To do so: 

1. In your Tally application, go to **UTILITIES** → **RazorpayX**. 
1. In the **RazorpayX** menu, click **RazorpayX Cashflow** → **Sync Entries from RX**.
    ![Enable the sync entries from RX setting](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-tally-bring-bills-sync.jpg.md)
1. Click **Yes** and confirm your action to finish sync. 

The bills you have created in RazorpayX are now synced in Tally. Check the journal entries, get your CA's approval, and post them in Tally.

## Post to Tally 

After you sync the invoices, you can review the entries and prepare them for your CA's approval. Your CA reviews the:
1. Invoice sourced into Tally.
1. Journal entry created in Tally for that invoice. 
1. Details of the ledgers the expense is mapped to. 

You/CA can review the bill by following these steps:

1. In your Tally application, go to **UTILITIES** → **RazorpayX**.
1. In the **RazorpayX** menu, click **RazorpayX Cashflow**.
1. In **RazorpayX Cashflow**, go to **Not Posted**. 
    ![Open the bills created but not posted to Tally](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-tally-int-bring-bills-3.jpg.md)
    The **Bills to RazorpayX** page appears. 
1. Review the bill you have created. 

You will find that the bill created has mapped to the expense you generally incur from that vendor, as [explained in the example](#example). You can edit the expense and map it to a different expense ledger if necessary. 

After review, you can approve the entries by clicking **F5:Approval** from the right menu.

> **WARN**
>
> 
> **Watch Out!**
> 
> RazorpayX **never** posts the entries into Tally directly. Always get the entries approved from CA and then ask the CA to post them. This is a manual process.
> 

Suppose you pay the invoice after creating it. You can [sync the bills in Tally](#sync-bills-in-tally) and check the payment entry in the bill details. After reviewing the bill, you can [post them again to Tally](#post-to-tally). 

### Related Information

- [Vendor Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/x/vendor-payments.md)
- Keyboard shortcuts in [Tally Prime](https://help.tallysolutions.com/tally-prime/keyboard-shortcuts/keyboard-shortcuts-tally-prime/)
