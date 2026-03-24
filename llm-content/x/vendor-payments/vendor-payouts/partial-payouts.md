---
title: Partial Payouts on RazorpayX Vendor Payments
heading: Partial Payouts
description: Make and understand how partial payouts work on RazorpayX Vendor Payments.
---

# Partial Payouts

Using RazorpayX, you can make partial payouts on a given invoice. The Partial Payouts feature eliminates the need for mulitple invoices and allows you to make many smaller payments on the same invoice.
 
## How it Works
 
Here is a typical business use case that explains how partial payments work:
 
1. You receive either a **proforma invoice** (an invoice which is provided before delivery of the goods/services) or **payment terms** (details of advances, due date, delivery date, and so on) before accepting/confirming the order.
2. Create a vendor payment with or without uploading a proforma invoice.
3. Pay an advance to the vendor based on payment terms.
4. You receive a second invoice post-delivery of goods/services.
5. Replace/Upload the latest invoice after receiving it.
6. Make a partial payment because one of the goods was not delivered or because of service quality issues.
7. The vendor rectifies/completes the pending transaction and sends an updated invoice.
8. Pay the remaining amount to match the new invoice amount.
 
## Make Partial Payouts
 
To make a partial payout:
 
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **Menu** → **Vendor Payments**.
3. Select the invoice you want to pay partially. A pop-up screen appears to the right side of the screen. 
4. In this window, click or hover over the options arrow next to the **PAY/SCHEDULE** button for the drop-down menu to appear. Here, click **PAY PARTIALLY**.
    ![Select Pay Partially in the pop-up window on RazorpayX](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-partial-payouts-select.jpg.md)
5. You must now create a payout. 
    - In the **New Payout** window, enter the Contact's valid details and [create a Fund Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/contacts.md#create-a-contact-with-fund-account) if the Contact doesn't have one. You can also select the [Contact type](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/contacts.md#contact-types) to be `Vendor`.
    - Your contact, fund account and payout progress is automatically saved in RazorpayX. If you quit the **New Payout** window, or click **BACK**, you can always restart from the **Edit Invoice Screen**, as shown. 
      ![Edit Invoice screen showing all the invoice details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-vp-partial-payouts-edit-invoice.jpg.md)
6. Finalise all the payout details and click **Next**.
    
> **INFO**
>
> 
>     **Handy Tips**
>     - If you click on **Pay in Full** instead of paying partially, the invoice gets updated to match the same. You can select **Pay Partially** once again to update the invoice.
>     - Ensure to enter the correct amount when making partial payout. This amount should **always** be less than the actual payment to be made.
>     

7. Enter OTP and complete the payment.
 
After you make a Partial Payout, the invoice status changes to `Partially Paid`.
 
### Related Information

- [Bulk Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/vendor-payouts/bulk.md)
- [Scheduled Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/vendor-payouts/scheduled-payouts.md)
- [Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/invoices.md)
- [Invoice Life Cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/life-cycle.md)
- [Advances](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/advances.md)
- [Purchase Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/purchase-order.md)
