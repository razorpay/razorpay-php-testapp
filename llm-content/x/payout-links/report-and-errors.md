---
title: Bulk Payout Links Report and Errors on RazorpayX
heading: Bulk Payout Links Report and Errors
description: Download the RazorpayX Payout Links Bulk Upload report and troubleshoot the errors.
---

# Bulk Payout Links Report and Errors

After processing your [Payout Links bulk upload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/bulk.md#process-bulk-payout-links) file, RazorpayX generates a Bulk Upload report. The report shows the: 
- Summary of Payout Links created.
- List of Payout Links not created/failed to create.
- Errors and reasons for the failure.

## Bulk Payout Links Report

After a bulk upload is processed, download the report from the [RazorpayX Dashboard](https://x.razorpay.com/payout-links).

### Fields in the Report

The report contains: 
- A summary of the processed file.
- The Contacts, Fund Accounts and Payout Links created as per the contact details the recipient/owner has provided.
- Additional details as per the [fields requested](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/bulk.md#requested-fields-in-template) in the sample template for Payout Links.

The report has the following additional fields that you can check to see if the individual payouts were created and processed.

![Processed Bulk Report Example with Payout Id, Error Code and Error Description.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-buk_upload_payouts_processed.jpg.md)

`Payout Id`
: `string` Unique identifier for the payout. Value is returned only if the payout is successfully created. For example, `pout_FMfjLUuRS9Hlzc`.

`Error Code`
: `string` The error code for the failure. For example, `BAD_REQUEST_ERROR`.

`Error Description`
: `string` The reason for the error. For example, `No db records found.`

## Errors in Bulk Upload

In some cases, the Payout Links are not created. The reason for failure is shown in the Error Code, whose description you can use to resolve the error. 

The table below lists possible errors and corresponding error messages.

**S.No** | **Error Message** | **Description**
---
1 | Invalid Expiry Date format, should be DD/MM/YYYY | Expiry date is not in the DD/MM/YYYY format. Change in batch file and upload again.
---
2 | Invalid Expiry Time format, should be HH:MM | Expiry time is not in the hh:mm format. Change in batch file and upload again.
---
3 | Expiry Date missing, but Expiry Time present | Expiry time has been entered but not the expiry date. Enter expiry date in the batch file and upload again. Know about [Payout Link Expiry](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/set-expiry.md).
---
4 | Invalid value for field(s): `expire_by`. Cannot be less than the current time + 15min | Expiry date and time cannot be in the past. Enter a value which is at least 15 minutes ahead of the present time.

### Related Information 

- [Create Bulk Payout Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/bulk.md)  
- [Payout Links Life Cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/life-cycle.md)  
- [Payout Links FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/faqs.md)
