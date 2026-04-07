---
title: RazorpayX Bulk Upload Status
heading: Bulk Upload Status
description: Check the status of your Payouts Bulk Upload file after you upload it on the RazorpayX Dashboard.
---

# Bulk Upload Status

Check the status of your Bulk Upload file after you [upload it to your RazorpayX Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts.md#upload-and-process-file).

## How it Works

The sample template can create fund accounts or process payouts in bulk. To do so:
1. Download the required template from the [Dashboard](https://x.razorpay.com/), or find the [sample template here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts.md#sample-template). 
2. Add the required data to the template.
3. Upload the template via the [RazorpayX Dashboard](https://x.razorpay.com/). 

## Bulk Upload Status

After you upload your Bulk Upload file to the Dashboard, it moves through the following statuses:

- `created`: 

    This is the initial status of the Bulk Upload. It indicates that the Bulk Upload is created in the RazorpayX database and is ready to be processed. 
 No processing is done at this point, that is, the payouts are not created.

- `processed`: 

    A Bulk Upload file reaches this final status when the uploaded details are processed. 

After the Bulk Upload is processed, you receive an email with a summary of how many rows of data were successfully processed. You can [download the Bulk Upload report](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts/report.md) to understand the summary in more detail.

> **WARN**
>
> 
> **Watch Out!**
> 
> - Bulk Upload having the `processed` status does not mean the Contacts, Fund accounts or the Payouts were created and processed. It just means that the bulk file was fully processed.
> - The Contacts, Fund account or Payouts may or may not have been created or processed. Download the [Bulk Upload report](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts/report.md) to check these details.
> 

### Related Information

- [About Bulk Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts.md)
- [Bulk Payouts Life Cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts/life-cycle.md)
