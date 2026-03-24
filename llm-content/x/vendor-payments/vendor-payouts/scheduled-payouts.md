---
title: RazorpayX | Vendor Payments - Scheduled Payouts
heading: Scheduled Payouts
description: Explore when and how you can schedule payouts to vendors in RazorpayX Vendor Payments app.
---

# Scheduled Payouts

Scheduling payouts helps to manage your payments in a more organised way. You can use the [Vendor Payments app in RazorpayX](https://x.razorpay.com/vendor-payments) to schedule payouts.
 
Here are some typical business use cases where you can schedule payouts:
 
- You receive an invoice from your vendor with a due date against it. You decide to pay the invoice exactly on the due date.
- You wish to pay all the invoices of a particular vendor in a specific time range at the end of the fortnight/month or payment cycles.
- You receive an invoice based on some payment terms agreed with the vendor, which mandates payment to be made exactly after `x` days post the invoice date.
 
In all these cases, you can schedule the payout accordingly.
 
## Schedule Payouts
 
To schedule a payout:
 
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/vendor-payments).
2. Navigate to **Menu** → **Vendor Payments**.
3. Click **+ INVOICE**.
4. Continue to upload the invoice or click **CONTINUE WITHOUT UPLOAD** to manually enter the details.
5. Add the Invoice Details, Vendor Details, and Amount Details.
6. Click **REVIEW INVOICE** to cross-check the payout details.
7. Click **Pay/Schedule Invoice** as shown here:
    ![Edit Invoice screen showing all the invoice details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-vp-partial-payouts-edit-invoice.jpg.md)
8. It takes you to the **New Payout** window. Here you can finalise the payout details. Once done, click **Schedule Payout**, as shown.
      ![Schedule payout in New Payout window in RazorpayX](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-vp-schedule-payouts.jpg.md)
    Once you click **Schedule Payout**, you see the calendar and time options on your screen. Select the date on the calendar and also the time of day when you want RazorpayX to process your scheduled payout, as shown.
      ![Update the calendar and the time to schedule payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-vp-schedule-payouts-calendar-time.jpg.md)
9.  Click **CONFIRM**.
10. Authenticate the transaction using OTP.
 
After you schedule a payout, the invoice status changes to `Scheduled`.

### Related Information
- [Bulk Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/vendor-payouts/bulk.md)
- [Partial Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/vendor-payouts/partial-payouts.md)
- [Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/invoices.md)
- [Invoice Life Cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/life-cycle.md)
- [Advances](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/advances.md)
- [Purchase Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/purchase-order.md)
