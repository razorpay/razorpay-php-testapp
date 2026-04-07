---
title: RazorpayX | Invoices
heading: Invoices
description: Import invoices to your RazorpayX Dashboard for Vendor Payments.
---

# Invoices

On Vendor Payments, you can make payouts to vendors against the invoices you receive from them. You can receive and import the invoice through email, [Vendor Portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/portal/business.md), upload the PDF on RazorpayX Dashboard or enter the details manually.

## Add Invoices

Watch this video to know how to add an invoice on the RazorpayX Dashboard or read along. 

To add an invoice:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. You can navigate to Invoices in three ways:
    - Navigate to the drop-down menu on the top-right side of the Dashboard and click **Upload Invoice**.
    - Hover over **Vendor Payments** on the left navigation and click **+**.
    - You can also click **Vendor Payments** on the left navigation and then click **+ INVOICE** on the left side. 
3. Upload the invoice. The invoice details are auto-read and uploaded using the OCR technology. You can also click **Enter Details Manually** to add the details yourself.
4. Select an existing vendor or [create a new vendor](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/contacts.md#create-a-contact). The vendor is the person or entity to which you are making an payment to, basing an invoice received.
5. Select a Fund account for the vendor or [create a new Fund account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-accounts.md#create-a-contact-with-fund-account). These are the account details (bank account or UPI ID) to which the amount is transferred.
6. If you have opted to enter the details manually, fill the **Amount Details**, click **Next**. Enter the **Invoice Details** and click **Next**.
7. Review the **Invoice Details** such as due date, TDS category, GSTIN, PAN and Amount to Vendor.
8. You can either:
   - Save the invoice and pay it at a later time. RazorpayX sends reminders as you get closer to the due date.
   - Make the payment immediately.

Once you make the payment, it follows the [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) set on your RazorpayX account.
 
### Add Invoices through Email
 
When you add invoices in RazorpayX, you allow your vendors to send invoices to you via your business email. 

You have the option to forward these emails to the dedicated email address provided to you by RazorpayX. When you forward them to that email address, RazorpayX automatically generates a corresponding invoice on the Dashboard. You do not have to manually update the details, or upload invoices for the OCR to read them. 
 
1. Razorpay creates a unique email address for you to collect and create invoices.
2. Send this unique email address to your vendors for them to forward invoices.
3. You can forward invoices received through other email addresses as well to this uniquely generated email address.
4. Razorpay will read data in the email and automatically generate invoice. The invoice is displayed on the Vendor Payments Dashboard in the `draft` state.
5. You can add relevant details to the `draft` invoice and create payout or save it as an `unpaid` invoice.
6. You can accept or reject or schedule payouts for these invoices via the Vendor Payments Dashboard.
 
Your unique business email address is visible on the Vendor Payments Dashboard. You can forward all your invoices to the dedicated email address, as shown below:

## Mark Invoice as Paid
 
You may have uploaded an invoice on the Dashboard but paid it externally. In such cases, you can mark the invoice as `paid` via the RazorpayX Dashboard.

- The invoice moves to the `paid` state without creating a corresponding payout.
- When you mark an invoice as `paid`, you can select the external method you chose to pay the invoice (such as bank transfer, cheque or cash).
- Invoices marked as `paid` are considered for TDS payments. You can calculate and pay the TDS using [Tax Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments.md).

This makes Vendor Payments an end-to-end solution to track all your vendor payments, irrespective of the payment method and gives you an accurate bookkeeping summary.
 
Watch this video to know how to mark an invoice as `paid` or read along.
 

 
To mark an invoice as `paid`:
1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
1. Navigate to **Menu** → **Vendor Payments**.
1. Click on the relevant invoice from the list to mark as `paid` .
1. In the invoice summary page, hover on the downward arrow against the **PAY/SCHEDULE** button. Click **MARK AS PAID** from the drop-down list.
1. Choose the payment mode in the **Mark as paid** pop-up page and click **MARK PAID**.

You have successfully marked the invoice as `paid`. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Once marked as `paid`, you cannot change the invoice status to `unpaid`.
> 

## Replace an Invoice
 
To replace an invoice:
1. Log in to [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to **Menu** → **Vendor Payments**.
3. Select the required invoice and on the side panel, click the Edit icon.
4. Click **Replace File**. Details of the new invoice are auto-read and it replaces the details of the old invoice.
 
## Cancel an Invoice
 
To cancel an unpaid invoice:
1. Log in to [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to **Menu** → **Vendor Payments** and select the required invoice.
3. On the right pane, click the Cancel icon. The vendor payment is cancelled.
