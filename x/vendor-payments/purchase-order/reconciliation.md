---
title: Reconcile Purchase Orders on RazorpayX
heading: Reconcile Purchase Orders
description: Reconcile purchase orders on the RazorpayX Dashboard.
---

# Reconcile Purchase Orders

You can link purchase orders with invoices and advance payments on the RazorpayX Dashboard. This helps in reconciliation and interlinks the payments to avoid re-payments or other confusion.

For example, if you have `partially billed` a PO and have linked it to an invoice, only the balance amount displays as the final payable avoiding double payment.

## Vendor Advances and Purchase Orders

To pay advances to your vendors for whom you have created the PO:

1. Log in to the [RazorpayX Dashboard](http://x.razorpay.com/auth).
2. Navigate to **Vendor Payments** → **Purchase Orders**.
3. Select the PO for which you want to pay an advance. In the right pane, click **PAY ADVANCE**.

While making an [advance payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/advances.md), RazorpayX lists the PO that may be related to your payment. You can select the relevant PO to link it to the advance payment or you can choose **Advance is not against my PO**.

## Invoices and Purchase Orders

You can link POs to your invoices while [adding the invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/invoices.md#add-invoices). All the existing POs that are `issued`, `partially billed` or `billed` and related to the vendor are displayed and you can select the relevant PO. You can also select **No PO to link against this Invoice**, this is an irreversible action.

    
### Link Invoice while creating PO

         To link your PO to one or more invoices:

         1. Log in to the [RazorpayX Dashboard](http://x.razorpay.com/auth).
         2. Navigate to **Vendor Payments** → **Purchase Orders**.
         3. Select the PO you want to link to an invoice. In the right pane, click **LINK TO INVOICE**.
         
         4. A list of invoices in `unpaid` or `draft` state is displayed and you can choose the required invoices to link. If there are invoices in other states, remove the filter from the top of the page for all the invoices to be displayed.
