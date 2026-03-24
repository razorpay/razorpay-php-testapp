---
title: Export and Approve Payouts in RazorpayX
heading: Export and Approve Payouts
description: Export payout data file from TallyPrime, import to the Dashboard, approve in bulk, and view & download reports.
---

# Export and Approve Payouts

To make Tally e-Payments payouts using RazorpayX, you must export the payout data file from TallyPrime and import it to the RazorpayX Dashboard. 

You can approve these in bulk and then export the approved payouts back to TallyPrime to reconcile your payments automatically. Know more about [Tally e-Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments.md).

Following is the process to move the data between TallyPrime and RazorpayX. 

## Export Data

You must first [set up a RazorpayX ledger in TallyPrime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/set-up.md) and then export the CSV file data to RazorpayX.

To export the payout data you have on TallyPrime into RazorpayX:

1. Open TallyPrime and navigate to the Gateway.
2. Go to **Utilities** → **Banking**. 
3. Select **e-Payments**. The e-Payments screen is displayed.
4. Select the **Ready for sending to bank** row as shown below:
   ![Ready for Sending to bank line selected.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-rzpx-tally-rsb.jpg.md)
5. Select the transactions which you wish to export from the list.
6. On the top menu, select **Export** → **Payment Instructions**.
7. Click **Yes** to confirm.

You see a message after successful completion of the data export. Then you [upload the payout data](#upload-payout-data) into the RazorpayX Dashboard for review and approval.

## RazorpayX Dashboard Actions 

Switch to your RazorpayX Dashboard to upload and approve the payouts. 

## Upload Payout Data

To upload payout data:
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
1. Navigate to **Payouts** → **Tally Payouts**.
1. Click **Tally bulk import** under the **+ NEW** drop-down menu, as shown below.
   ![Select Tally Bulk import](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-import-tally-0.jpg.md)
1. Click **+ BULK PAYOUT**.
1. Upload the payouts data file exported from TallyPrime and click **Next**.
   ![Import payouts from Tally](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-import-tally-2.jpg.md)
1. Preview the payouts and click Next.
1. Enter the OTP sent to your registered mobile number and email address and click **Confirm Payouts**.
   ![Confirm Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-import-tally-3.jpg.md)

Bulk payouts are created and listed on the Tally Payouts screen.

## Approve Payouts

After the payouts are uploaded to the RazorpayX Dashboard, you can access the payout data for further review and approval.
 
To approve these payouts in bulk:
1. Go to **Payouts** → **Pending on you**.
   ![Payouts Pending on you selection on X Dashboard.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-rzpx-tally-approval.jpg.md)
2. All payouts pending on you are displayed in the **Payouts** page.
3. Use the check box to select the payouts you want to make.
4. Click **APPROVE** as shown below.
   ![Approve payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-rzpx-tallyepayments-approval.jpg.md)

RazorpayX shows a message confirming the payouts approval. You can now [view and download the payouts report](#view-payouts-and-download-reports).

## View Payouts and Download Reports

Click **VIEW PAYOUTS** to view all the processed payouts. Click **DOWNLOAD** to view information about unprocessed rows by downloading the error report.

![View and download MIS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tally-epayments-rzpx-tally-view-payouts.jpg.md)

You can then download the MIS report and [reconcile payouts in TallyPrime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/reconcile-payouts.md). 

### Next Steps

- [Reconcile Payouts in TallyPrime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/reconcile-payouts.md)

### Related Information

- [About Tally e-Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments.md)
- [Create RazorpayX Ledger in TallyPrime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/set-up.md)
