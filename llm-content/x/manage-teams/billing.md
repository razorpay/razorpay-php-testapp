---
title: RazorpayX | Fees and Taxes
heading: Billing - Fees and Taxes
description: Explore the fees and taxes charged for payouts in RazorpayX and download the related billing reports.
---

# Billing - Fees and Taxes

When you make a payout from your RazorpayX account, you are charged fees and taxes, which is deducted from your account balance.

- **Fees**: The fees that Razorpay charges you to make a payout. This is charged according to your pricing plan.

- **Tax**: This is the GST on the fees, as per government regulations. This is collected by the government.

## Billing for Payouts 

Fees and taxes are applicable to payouts made through RazorpayX Lite as well as Current Account. However, the billing cycle and structure varies.

- [Payouts from RazorpayX Lite](#payouts-from-razorpayx-lite).
- [Payouts from Current Account](#payouts-from-current-account).

### Payouts from RazorpayX Lite

When you make a payout using [RazorpayX Lite](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/razorpayx-lite.md), the fees and taxes are charged as a part of the payout in real-time.

#### Example
For a payout of ₹10,000, the fees applicable is ₹5 and the tax on this is ₹0.90. 

When you make a payout ₹10,000 from RazorpayX Lite:
- ₹10,005.90 (₹10,000+ ₹5 + ₹0.90) is deducted from RazorpayX Lite balance.
- ₹10,000 is credited to your contact.
- ₹5 (fees) is credited to Razorpay.
- ₹0.90 (tax) collected by the government.

In case of a [payout reversal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/states-life-cycle.md#reversal-transaction), the fees and tax are also reversed.

### Payouts from Current Account

When you make a payout from your [Current Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/current-account.md), you are charged a fee. The fees and taxes are collected once everyday and **appear as a payout** in your account statement. This is an automated process and does not require any action from you.

The invoice for Payout Fees deduction is generated on the 1st of every month. You can download the same from the RazorpayX Dashboard under **My Accounts & Settings** → **Billing**. Scroll down to the **Monthly Invoice** section and click **Download Invoice & Report** for the required month.

> **INFO**
>
> 
> **Handy Tips**
> 
> Ensure to maintain a sufficient balance at all times for uninterrupted transactions.
> 
> Fee and tax for reversals appear with a minus symbol. This is to indicate they are returned to you and also to help with reconciliation. Reversals are calculated as, `amount = (original payout amount + fees + tax).`
> 

## Billing Reports

There are 2 reports about your account's billing process you can download from the Dashboard: 
- [Invoice Reconciliation Report](#invoice-reconciliation-report).
- [Monthly Tax Invoice Report](#monthly-tax-invoice-report).

> **WARN**
>
> 
>     **Watch Out!**
> 
>     Invoices older than 1 year are not available on the dashboard. We recommend that you download your invoices periodically.
> 
  

### Invoice Reconciliation and Fee Recovery Report

The Invoice Reconciliation report contains details of fees and tax for payouts made using both **RazorpayX Lite and Current Accounts**.

Watch this video to know how you can download the Invoice Reconciliation and Fee Recovery Report.

[Video: https://www.youtube.com/embed/O4SfXNrG6pA]

To download the Invoice Reconciliation report:
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **My Account & Settings** → **Billing**. 
3. In the **MONTHLY INVOICE** section, click **REPORT** against a particular month in the **EXPORT** column.
4. Select the **Include charged and pending fee details** check box if required.

Apart from the various fields in the report containing details of each transaction, the following are two important fields:

- `fee_id`
    - **RazorpayX Lite**: `auto_paid`, because the fees and tax is collected as part of the payout.
    - **Current account**: This column contains a unique identifier associated with the fee and tax collected. This is because, for current accounts, fees and tax are collected on a regular frequency and not on a per payout basis. Multiple payouts can have the same `fee_id`.
- `fee_created_at`
    - **RazorpayX Lite**: This column will be blank because the fees and tax is collected as part of the payout.
    - **Current account**: The date and time when the fee and tax collection was initiated by RazorpayX.
- `fee_type`
  - `free_payout`: Indicates a Free Payout was used to process the payout. In such scenarios, you are not charged any fees and tax. Only the payout amount is deducted from your account balance.

###  Monthly Tax Invoice Report

This is a consolidated statement of all fees and taxes deducted from RazorpayX Lite and your current account.

To download the Monthly Tax Invoice: 

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **My Account & Settings** → **Billing**.
3. In the **MONTHLY INVOICE** section, click **INVOICE** against a particular month in the **EXPORT** column.

### Related Information

- [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md)
- [Chartered Accountant Portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/ca-portal.md)
