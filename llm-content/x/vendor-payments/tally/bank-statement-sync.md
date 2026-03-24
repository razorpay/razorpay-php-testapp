---
title: RazorpayX Smart Bank Statement Sync with Tally
heading: Smart Bank Statement Sync
description: Sync all transactions from RazorpayX in Tally.
---

# Smart Bank Statement Sync

The Smart Bank Statement feature syncs transactions from your bank statements as entries in your Tally application. With this feature, you can understand your transactions from a business perspective than just a banking perspective. 

## How it Works 

1. Suppose you paid a vendor and it shows in your bank statement as a debit and a double-entry transaction only. 
2. When you sync the transaction using the RazorpayX-Tally Integration, you can use the Payout notes, Payout Purpose and other details from RazorpayX as a reference and update your journal entry narrations in TallyPrime. 
3. Create a journal entry and reconcile payments easily.

Watch the video below to understand the Smart Bank Statement process or read along. 

[Video: https://www.youtube.com/embed/fjJWqs8jK90?list=PLCwKlvaW1shasiBE6k7h1m8OoW0EgTg11]

## Advantages 

Following are the advantages of the bank statement sync flow:
- It automates a lot of your bookkeeping and data entry processes. 
- Reduce errors and inconsistency and save up on time. 
- You do not need to maintain and cross-verify data between many Excel sheets. 

## Setup Workflow

Enable the Smart Bank Statement setting to sync all the transactions made in RazorpayX to Tally.

1. Navigate to **R:RazorpayX Settings** from your **Gateway of Tally** page. 
    ![Top-right menu highlighting R:RazorpayX Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sbs-enable.jpg.md)
1. Select **Yes** against **Sync Entries from RazorpayX**. This is a one-time process.
    ![Select Yes in Tally to enable sync](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sbs-select-yes.jpg.md)

You have successfully enabled the setting to sync all transactions made in RazorpayX to Tally, regardless of the type of transaction.

Whether you [make a payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#how-to-make-payouts), or the money is debited as part of a [payout link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links.md), payroll, tax payments and more, **all transactions** can be synced in Tally. 

## Sync Transactions 

After you enable the [sync workflow](#setup-workflow) to allow Tally to sync all the transactions you make in RazorpayX. Follow 

- [Start sync](#start-sync). 
- [Create journal entries](#create-journal-entry).
- [Reconcile entries](#reconcile-entries). 

## Start Sync

To sync these transactions in Tally:
1. Open Tally to show the **Gateway of Tally** page.
1. Go to **UTILITIES** → **RazorpayX**.
    ![RazorpayX in utilities in Gateway of Tally menu](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-tally-menu.jpg.md)
1. In the **RazorpayX** menu, click **RazorpayX Bank Statement**. 
    ![RazorpayX Bank Statement in RazorpayX menu](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sbs-bank-statement.jpg.md)
1. Select **RazorpayX Account** when prompted to **Select Ledger**. The **RX_Statement** page appears. 

You have successfully moved all your transactions from RazorpayX to Tally. On this page, you find the list of transactions taken from all of RazorpayX. They appear marked as **NA___** under the **Particulars** column. 

![Transactions after syncing from RazorpayX](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/txn-after-sync.jpg.md)

## Create Journal Entry 

The **Status** of transaction synced reads **Not Booked**. This means that the journal entry is made but is incomplete in Tally. As such, it is also not posted to Tally. RazorpayX never posts journal entries directly to Tally. 

To create the journal entry:

1. Click on the relevant transaction synced to Tally. The **Accounting Voucher Alteration** page appears.
1. On this page, check the **Narration** to the bottom-left corner. The narration contains the transaction details you can use as a reference when creating a journal entry.  
    ![Select relevant incomplete journal entry and create entry using narration as reference.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sbs-create-journal entry.jpg.md)
1. Create the journal entries by clicking on the **By** and **To** fields. Map the fields to the entities as present in your ledgers. 
1. Review your journal entry. Once statisfactory, enter **Yes** against **Convert Voucher & Approval**. You have successfully created and updated the particulars and narration of your journal. You have also booked the entry in Tally.
    ![After the entry is created, you](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sbs-create-journal entry.jpg.md)
1. Go to the **RX_Statement** page. 
1. Click on **F10:Booked**. It shows all the booked entries in journal. The latest entry you have booked will appear in the booked page. 

You have successfully created a journal entry for your transaction.

## Reconcile Entries

To reconcile the entries:

1. Go to **Gateway of Tally**. 
1. Navigate to **UTILITIES** → **Banking** → **Bank Reconciliation**. 
1. Here, select the **Name of the Bank Ledger** as **RazorpayX A/c**.
    ![Select RazorpayX ledger](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/select-ledger.jpg.md)
1. Select the duration for which you want to view the entries by clicking **F2:Period**. 
1. Select **B:Basis of Values** and click **Include Reconciled transactions** from the drop-down list.
    ![Select option from the list to show reconciled trasactions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/include-recon-txn.jpg.md)

Tally registers the journal entry you have created with all the narration details and context. You do not have to worry about the origin and settlement of the transaction, or contact your Vendors and other entities to help in reconciliation process. 

### Related Information

- Keyboard shortcuts in [Tally Prime](https://help.tallysolutions.com/tally-prime/keyboard-shortcuts/keyboard-shortcuts-tally-prime/)
- [Bring bills from RazorpayX to Tally](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/bring-bills.md)
- Sync Vouchers in RazorpayX
   - [Purchase Vouchers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/sync-purchase-vouchers.md)
   - [Payment Vouchers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/sync-payment-vouchers.md)
