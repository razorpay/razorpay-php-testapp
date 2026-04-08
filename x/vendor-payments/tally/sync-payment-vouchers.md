---
title: Sync Payment Vouchers with RazorpayX
heading: Sync Payment Vouchers
description: Set up the mechanism to send and sync Payment Vouchers uploaded in Tally with RazorpayX.
---

# Sync Payment Vouchers

After you [set up and configure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/set-up.md) the integration, you can send your [Payment Vouchers](#send-and-sync-payment-vouchers-to-razorpayx) to RazorpayX and sync them for reconciliation. 

## How it Works

To set up the Payment Vouchers workflow, you must: 
1. [Send the Payment Vouchers to RazorpayX](#1-send-payment-voucher). 
2. [Sync the voucher in RazorpayX](#2-sync-payment-voucher).
3. [Make payments as per the invoices created in RazorpayX](#pay-invoices). 

Watch the video below to understand how you can send Payment Vouchers to RazorpayX, or keep reading for the instructions. 

You can also watch the [Send Payment Vouchers to RazorpayX video in Hindi](https://youtu.be/s1FgaTHXBas). 

## Advantages

Following are the advantages of using the sync payment vouchers flow:

- Make expense or vendor payments in Tally. RazorpayX syncs the entries with additional payment details in the transaction, such as TDS, GST, and more.
- Pay, process and reconcile the payments three times faster.
- You need not maintain tedious Excel sheets, import and export them and verify details between both of them. 
-  Removes the need to add IFSC and bank account numbers multiple times. This prevents errors of repetition.

## Send and Sync Workflow

Check the process to send and sync payment vouchers to RazorpayX. 

## 1. Send Payment Voucher
 
To send Purchase Vouchers to RazorpayX, you must change the settings in Tally.
1. Open your Tally application to show the **Gateway of Tally** page. 
1. Click **R:RazorpayX Settings** from the right menu.
   
   The **RazorpayX Configuration (in Developer Mode)** page appears. 
1. On this page: 
   - Enter **Yes** against **Invoice Sync Settings**. 
   - Change the following settings: 

      
      Settings | Value
      ---
      **Send puchase vouchers to RazorpayX** | No
      ---
      **Send payment vouchers to RazorpayX** | Yes
      ---
      

   Set the payment voucher setting to **Yes**.

   
1. After selecting, enter the OTP sent to your registered email. Check your spam folder if you do not find the OTP in your primary inbox. 
1. Save your changes.

You have successully configured the settings to send Payment Vouchers to RazorpayX. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Select either **Purchase vouchers** or **Payment vouchers**. You **cannot** choose **Yes** for both Purchase vouchers and Payment vouchers. If you do so, Tally shows an error.
> 

## 2. Sync Payment Voucher

To create a payment voucher in Tally and sync it in RazorpayX: 

1. Go to **Gateway of Tally** → **TRANSACTIONS** → **Vouchers**.
   
   The **Accounting Voucher Creation (In Developer Mode)** page appears.
1. Select **F5:Payments**. Enter the invoice details to create a Payment Voucher and add a Purchase Voucher or an older bill as a reference.
   
1. Create the payment voucher and add the bank account from which the payment must be debited. 
1. Select the invoice against which payment has to be made. Enter the details and click **Yes** when prompted.
1. Go to the **Gateway of Tally**. Click **RazorpayX** → **Ready for Bank**.
   
   
   The **RXEPayment (In Developer Mode)** appears. Tally displays particulars about payments with the number of payment invoices that are:
      - **Ready for sending to RazorpayX**
      - **Sent to RazorpayX (unpaid & partially paid)**
      - **Fully paid in RazorpayX & Reconciled transactions**

   Here is a sample screenshot of payments as seen on Tally. Click on each of the rows for more information. You can also filter the results based on the displayed fields.
      
1. Select **Ready for sending to RazorpayX** and press Enter. 
1. Sync all of these entries by clicking on **A:Sync All Bills** in the right menu as shown below.
   

After syncing, return to **Ready for Bank** page. Here, you can find that the number of bills in **Ready for sending to RazorpayX** has reduced, and the bills in **Sent to RazorpayX (unpaid & partially paid)** have increased. 

Go to RazorpayX and pay your invoices as per the standard [vendor payment flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md).

## Pay Invoices

After you send and sync the vouchers in RazorpayX, you can pay the invoices in the following ways:
- [Pay your vendor immediately](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md).
- [Pay vendor partially](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/vendor-payouts/partial-payouts.md).
- [Schedule the vendor payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/vendor-payouts/scheduled-payouts.md).
- [Make vendor payouts in bulk](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/vendor-payouts/bulk.md).

All the payments made can be brought back to Tally. Know more about [bringing bills to Tally](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/bring-bills.md) from RazorpayX.

### Related Information 

- [Bring Bills to Tally](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/bring-bills.md) 
- Keyboard shortcuts in [Tally Prime](https://help.tallysolutions.com/tally-prime/keyboard-shortcuts/keyboard-shortcuts-tally-prime/)
