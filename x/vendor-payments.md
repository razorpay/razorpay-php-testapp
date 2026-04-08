---
title: RazorpayX | Vendor Payments
heading: About Vendor Payments
description: Explore the Dashboard actions for invoices and vendors in the RazorpayX Vendor Payments app. Manage user roles, set up a vendor portal and create end-to-end solutions.
---

# About Vendor Payments

When you purchase goods or avail services from a vendor, it is usually on credit. The vendor sends you an invoice and expects payments as per the agreed payment terms. You make the payment after deducting TDS, if any.
 
There are many features you can utilise to make your invoice creation process, reconciliation and automation simple and swift. With RazorpayX, you can do the following:

## Invoices and Advances

You can use the [RazorpayX Vendor Payments](https://x.razorpay.com/vendor-payments) to automate the process of making payments to your vendors in three simple steps:
 
1. [Upload an invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/invoices.md#add-invoices) on the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Add the vendor/s details.
3. Make the payment as per your business requirements.

You can also pay an [advance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/advances.md) to your vendor via RazorpayX without worrying about reconciliation because we take care of that for you, when you pay for the invoice.
 
## TDS and GST Details
 
While creating an invoice, you can select from the existing TDS categories on RazorpayX. The calculations are based on the chosen category’s percentage. However, for some cases, the TDS might differ, so you can edit the amount manually:
- To deduct flat 20% TDS when the PAN of the vendor is unknown.
- To deduct TDS at a lower rate based on a certificate from the government for a particular vendor.
- To deduct TDS on a cumulative basis when the contractor’s yearly income goes over a certain threshold.
 
GST breakup is one of the vital pieces of information on the invoice. It is necessary to keep a record of this. RazorpayX enables you to select the type of breakup and edit the amount accordingly. It also records the GST split in the report for accurate bookkeeping.
 
Given below are 2 ways to apply GST:
- Intrastate purchase
 - Levies CGST and SGST
- Interstate purchase
 - Levies IGST
 
For example, the invoice amount is ₹100 and the subtotal is ₹80.
- Intrastate - CGST - ₹10; SGST - ₹10;
- Interstate - IGST - ₹20;
 
## Input Tax Credit Checker

RazorpayX automatically checks if your vendors have filed their GST, identify discrepancies in the filing and control your vendor payouts to recover previously lost credit dues. Know more about [Input Tax Credit Checker](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/gst-credit-checker.md).

## Vendor Portal
 
The RazorpayX Vendor Portal is a platform created for your vendors where they can upload the invoices and receive updates to the payment. Know more about how to [setup a Vendor Portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/portal/business.md) and how your Vendors can use the [RazorpayX Vendor Portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/portal.md).
 
## Manage Teams
 
You can assign assign users roles to limit their access to the RazorpayX Dashboard as per your business requirements. Know more about [User Roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams.md#vendor-payments).
 
### Related Information
 
- [Bulk Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/bulk-invoices.md)
- [Tally Accrual](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/sync-purchase-vouchers.md)
