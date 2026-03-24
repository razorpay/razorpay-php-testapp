---
title: RazorpayX Bulk Upload Report
heading: Bulk Upload Report
description: Download the Payouts Bulk Upload report for a summary of the Payouts, Contacts and Fund Accounts created, along with the failure reasons.
---

# Bulk Upload Report

Download the Bulk Upload report from the [RazorpayX Dashboard](https://x.razorpay.com/) after your bulk upload file gets [processed](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts/uploads#bulk-upload-status.md).  

## Fields in the Report

The report contains: 
- A summary of the processed file.
- The Contacts, Fund Accounts and Payouts created and related information.
- Additional details as per the [fields populated in the Bulk Upload file](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts#sample-template.md).

The report has the following additional coulmns you can use to check if the individual payouts were created and processed. 

![bulk upload report excel file showing payout ids and its related error descriptions.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-bulk_upload_report.jpg.md)

Payout Id and Error Description mention the reasons for when the payouts process has failed.

`Payout Id`
: `string` Unique identifier for the payout. Value is returned only if the payout is successfully created. For example, `pout_FMfjLUuRS9Hlzc`.

`Error Description`
: `string` The reason for the error. For example, `The id provided does not exist.`

To troubleshoot the errors that appear in the report, see [Bulk Uploads Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts.md).

### Related Information 

- [About Bulk Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts.md)
- [Bulk Payouts Life Cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts/life-cycle.md)
