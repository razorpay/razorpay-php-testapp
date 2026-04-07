---
title: Tally e-Payments via RazorpayX
heading: About Tally e-Payments
description: Integrate RazorpayX with TallyPrime and explore making payouts and settle dues to your vendors.
---

# About Tally e-Payments

Tally is one of the most used accounting software by small and medium enterprises. Businesses use it to maintain and track accounting transactions, finance, inventory, sales, and so on.

Razorpay offers an integration with TallyPrime to make payouts to vendors. SMEs and MSMEs who use TallyPrime can now use RazorpayX Payouts to make payments to their vendors, partners, and suppliers. 

## How it Works

Watch the video below to understand how to make Tally e-Payments with RazorpayX or read along.

## Process and Reconcile Payouts 

On TallyPrime (a Tally product), you can directly create payout instructions in CSV format readable by RazorpayX. 
- These payout instructions are imported to Tally Payouts and processed within seconds. 
- Once the payouts are processed, download the MIS and upload it on TallyPrime. This automatically reconciles the entire payout.

To process payouts using Tally e-Payments:

1. Open TallyPrime and [Create a RazorpayX Ledger.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/set-up.md)
   
> **INFO**
>
> 
>    **Handy Tips**
> 
>    If you are an existing Current Account user with a RazorpayX/RBL Bank account ledger in TallyPrime, [create a new ledger](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/set-up.md#create-a-ledger) for RazorpayX Bank. 
> 
>    All the existing unpaid bills that you wish to pay through RazorpayX using this integration is credited to the new RazorpayX ledger account.
>    

2. Credit all payable bills to the RazorpayX Bank Account Ledger.
   1. Download the [e-Payments' payout instructions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/export-approve-payouts.md#export-data-from-tallyprime-to-razorpayx) as a CSV file to export it to RazorpayX. 
   1. [Upload the payouts instructions file to RazorpayX](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/export-approve-payouts.md#upload-payout-data) in the Tally Payouts section. 
   1. [Review the payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/export-approve-payouts.md#view-payouts-and-download-reports) as created after uploading the file. Approve them as applicable. 
   1. [View the payouts processed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/export-approve-payouts.md#view-payouts-and-download-reports) and download the error report for the unprocessed payouts.
3. [Download and export the MIS file](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/reconcile-payouts.md) from RazorpayX to TallyPrime for automatic reconciliation of accounts.

### Next Steps

- [Create RazorpayX Ledger in TallyPrime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/set-up.md)
- [Export and Approve Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/export-approve-payouts.md)
- [Reconcile Payouts in TallyPrime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/reconcile-payouts.md)

### Related Information

- [Vendor Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md)
- [Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md)
