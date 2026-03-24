---
title: Create Bulk Payout Links on RazorpayX
heading: Create Bulk Payout Links
description: Create and process bulk Payout Links and know about the bulk Payout Links' status.
---

# Create Bulk Payout Links

Create Payout Links in bulk using the **Bulk Payout Links** feature. You can create Payout Links for:
- Recipients whose contact details you do not know. 
- Recipients whose contact details you know. 

You need your recipients' contact details to send the link. Once they receive the Payout Link, they can enter their account details. RazorpayX then creates a [Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md) and the respective [Fund Account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts.md). 

To create Bulk Payout Links from the RazorpayX Dashboard:
1. Download the [sample template](#sample-template).
1. Add data to the template as per the [required fields](#requested-fields-in-template).
1. Upload the template on the [Dashboard](https://x.razorpay.com/).

![Create Bulk Payout Links Process from uploaded → created → processed](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-bulk-upload.jpg.md)

## Sample Template

Download the sample template in `.csv` format. Check the fields you must populate to create corresponding Payout Links.

[Download .csv](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/sample_batch_payout_links.csv.md)

### Requested Fields in Template

The table below lists the requested fields listed in the [sample template](#sample-template) and describes each field.

`Name of Contact` _mandatory_
: `string` The contact's name. This field is case-sensitive. Has a minimum of 3 characters. and a maximum of 50 characters is allowed. The name cannot end with a special character, except `.`. Supported characters: `a-z`, `A-Z`, `0-9`, `space`, `’` , `-` , `_` , `/` , `(` , `)` and , `.`. For example, `Gaurav Kumar`.

`Payout Link Amount` _mandatory_
: `number` The amount, in paise, to be transferred to the contact. For example, `1000`. The minimum value is `100`.

`Contact Phone Number` _mandatory_
: `string` The contact's phone number. For example, `9000090000`.

`Contact Email ID` _mandatory_
: `string` The contact's email address. For example, `gaurav.kumar@example.com`.

`Send Link to Phone Number` _mandatory_
: `string` Determines who sends the Payout Link to the contact via SMS. Possible values:
  - `Yes`: Razorpay sends the Payout Link to the contact via SMS.
  - `No`: You send the Payout Link to the contact via SMS.

  The possible values are case-sensitive.

`Send Link to Mail ID` _mandatory_
: `string` Determines who sends the Payout Link to the contact via email. Possible values:
  - `Yes`: Razorpay sends the Payout Link to the contact via email.
  - `No`: You send the Payout Link to the contact via email.
  
  The possible values are case-sensitive.

`Contact Type` _mandatory_
: `string` The classification of contact that is being created. For example, `employee`. The following classifications are available by default:
  - `vendor`
  - `customer`
  - `employee`
  - `self`

> **INFO**
>
> **Handy Tips**
Additional classifications can be created from the Dashboard if required.

`Payout Purpose` _mandatory_
: `string` The purpose of the payout that is being created. The following classifications are available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`

> **INFO**
>
> **Handy Tips**-  Additional purposes for payouts can be created from the Dashboard if required.
- This field is case-sensitive.

`Payout Description` _mandatory_
: `string` The description for the Payout Link you have created. This appears on the Payout Link hosted page.

`Reference ID` _optional_
: `string` A user-generated reference given to the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction id, if any.

`Internal notes: Title` _optional_
: `string` You can enter custom notes for your reference. Enter the note title in this column. Notes are not visible to the contact. For example, `Refund 08 Feb 2021`.

`Internal notes: Description` _optional_
: `string` You can enter custom notes for your reference. Enter the note description in this column. Description is not visible to the contact. For example, `Evening Batch`.

`Expiry Date` _optional_
: `string` After you [enable expiry](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry/#enable-expiry.md), you can set the expiry date for the payout link. For example, `22/07/2021`. 

`Expiry Time` _optional_
: `string` After you [enable expiry](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry/#enable-expiry.md), you can enter the expiry time for the payout link. Input should be in the 24-hour format. For example, `14:52`.

## Process Bulk Payout Links

To upload and process a bulk file using the RazorpayX Dashboard:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
1. Navigate to **Payout Links** → **Bulk Payout Links** → **+ BULK PAYOUT LINK**.
   ![Navigating to uploading bulk Payout Links file on the X Dashboard.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-upload-payoutlink-bulkfile.jpg.md)
1. Download or upload the file. 
   - You can download the [.csv file sample template](#sample-template) from the Dashboard. 
   - Or if your template is ready, use **Click to Upload** and upload the file.
1. Click **NEXT**.
1. Select the account from which you want to process the amount. This can either be your:
   - RazorpayX Lite
   - RazorpayX powered Current Account
1. Enter the OTP sent to your registered mobile number/email address.
1. Click **CREATE PAYOUT LINK**.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You can also [set expiry on Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry.md).
> 

## Bulk Upload Status

After you upload the Payout Links Bulk Upload file, it moves through the following statuses:

> **WARN**
>
> 
> **Watch Out!**
> 
> The processed state means the bulk file was fully processed. To check the status of the individual Payout Links, download the [Bulk Payout Links Report](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/report-and-errors.md).
> 

![Bulk Payout Links Statuses](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-bulk-upload.jpg.md)

- `created`: 

  This is the initial status of the bulk upload and indicates that the bulk upload was created in the RazorpayX database and is ready to be processed. No processing is done at this point.
- `processed`: 

  This is the final status of a bulk upload where the uploaded details are processed.

## Bulk Payout Link Statuses

A Payout Link created using the bulk upload feature can have the following statuses during its life cycle:

- `issued`
- `processing`
- `processed`
- `cancelled`
- `expired`
![Payout Links States and Life Cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-payout_links_states.jpg.md)

Know more about [Payout Links Statuses](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md) and [Payout Statuses](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle/#payout-states.md).

### Related Information

- [About Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links.md)
- [Set Expiry for Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry.md)  
- [Shopify Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/shopify.md)
