---
title: Bulk Upload on RazorpayX
heading: Bulk Upload - Contact and Fund Account
description: Create Contacts and Fund Accounts in bulk from your RazorpayX Dashboard using bulk upload.
---

# Bulk Upload - Contact and Fund Account

You can use the bulk upload feature to create Contacts and Fund accounts in bulk from the Dashboard. You can also use this feature to add Fund account details to existing Contacts. Export the existing Contacts and add the beneficiary details.

> **WARN**
>
> 
> **Watch Out!**
> 
> - It is not possible to create new Contacts without adding Fund account details. When you create a Contact using bulk upload, you must also upload the Fund account details for the Contact.
> - You cannot use this feature to edit existing Contact or Fund account details.
> 

## Bulk Upload Contacts and Fund Accounts

Create Contacts and their respective Fund accounts in bulk. Check the sample template to input the details, how to upload the template and the required fields.

To create Contacts and Fund accounts in bulk:

1. Download the required [sample template](#sample-template).
2. Add the [required data in the template](#requested-fields-in-template).
3. Upload the template via the Dashboard.

### Sample Template

Download .csv file Sample Template

### Requested Fields in Template

Use the [sample template](#sample-template) to create Contacts and Fund accounts using bulk upload. This contains some example data to help you.

  
### Fields and Descriptions

     The table below lists the various fields in the template and gives a brief description of each field.

     `Fund Account Type` _conditionally mandatory_
     : `string` The type of account to be linked to the Contact id. Possible values:
       - `bank_account`
       - `vpa`

     `Fund Account Name` _conditionally mandatory_
     : `string` Name of the account holder as per bank records. For example, `Gaurav Kumar`.

     `Fund Account Ifsc` _conditionally mandatory (Mandatory if Fund Account Type = bank_account)_
     : `string` Bank IFSC of the account number. For example, `HDFC0000053`.

     `Fund Account Number` _conditionally mandatory (Mandatory if Fund Account Type = bank_account)_
     : `string` Beneficiary account number. For example, `765432123456789`.

     `Fund Account Vpa` _conditionally mandatory (Mandatory if Fund Account Type = vpa)_
     : `string` The virtual payment address.

       For example, `gauravkumar@upi`.

     `Fund Account Phone Number`_optional_
     : `number` Phone number of the contact associated with the given Fund account.

     `Fund Account Email` _optional_
     : `string` Email of the contact associated with the given fund account.

     `Fund Account Provider` _optional_
     : `string` The bank/wallet  providing the user with a fund account.
Possible values: 
- `amazonpay`

     `Contact Id` _conditionally mandatory_
     : `number` This is the unique Contact id to which payouts are to be made.

     `Contact Type` _mandatory if Contact id is not given_
     : `string` The classification of Contact that is being created. For example, `employee`.

      
> **INFO**
>
> 
>       **Handy Tips**
> 
>       - Additional classifications can be created via the Dashboard.
>       - This field is case-sensitive.
>      

      The following classifications are available in the system by default:
      - `vendor`
      - `customer`
      - `employee`
      - `self`

     `Contact Name` _conditionally mandatory_
     : `string` Name of the person to whom payout is to be made. For example, `Gaurav Kumar`.

     `Contact Email` _mandatory_
     : `string` Email address of the Contact to whom the payout has to be made.

     `Contact Mobile` _mandatory_
     : `number` Mobile number of the Contact to whom the payout has to be made.

     `Contact Reference ID` _optional_
     : `string` Reference ID of the Contact, if any.

     `notes[example text]` _optional_
     : `string` Notes for the details being imported. You can replace the `example text` in the header with text of your choice. You can add up to 15 notes. Text in the header is the title and text in the cell is the value for the note.

    

## Upload and Process Bulk File 

  
### To upload the bulk file containing Contacts and the respective Fund accounts:

     1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
     2. Navigate to **Contacts** → **Import Contacts**. Here, click **+ IMPORT**.
         
     3. Click [**DOWNLOAD SAMPLE FILE**](#sample-template).
     4. Add the required data to the sample template file. Ensure the data is formatted correctly and save the file.
     5. Select **Click to Upload** and choose the file you want to import.
         
     6. Click **NEXT** and preview the uploaded contacts.
     7. Name the batch of contacts and click **CREATE**.
         
    

## Bulk Upload Report

After a bulk upload is processed, you can download the processed bulk report from the Dashboard. The report has the following additional fields that you can check to see if the contacts/fund accounts were created successfully.

`Fund Account Id`
: `string` Unique identifier for the Fund account. Value is returned only when the Fund account is successfully created. For example, `fa_ECDexvVvKxbQDK`.

`Error Code`
: `string` The error code for the failure. For example, `BAD_REQUEST_ERROR`.

`Error Description`
: `string` The reason for the error. For example, `Invalid IFSC Code in Bank Account`

### Related Information

- [Contacts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/contacts.md)
- [Fund Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-accounts.md)
- [Bulk Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts.md)
