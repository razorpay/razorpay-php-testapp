---
title: Linked Accounts Creation Via Batch
description: Create Linked Accounts in batch using your Razorpay Dashboard.
---

# Linked Accounts Creation Via Batch

If you want to create linked accounts in a batch or in bulk, contact our [Support Team](https://razorpay.com/support/#request). 

## Steps

- Create a CSV file containing rows with the linked account's data. The file format and the data per row must be as described below.
- Raise a request to process the file on the [support page](https://razorpay.com/support/#request) as an existing customer. Also, share Razorpay merchant Id in the email body.
- After the file is processed from our side, we will share the same file with you which contains a few new columns appended per row. For every row, the first column will have success or failure values. If successful, the second column will have Razorpay account Id (newly created linked account). In case of failure, the subsequent column will contain an error description. These accounts will also be available on the Dashboard.

## Handle error-ed rows

You are requested to create a new file using the error rows from the processed file and fix the errors as per the description. Remove the extra error columns, and then share the same file with us again.

If you find any linked accounts with incorrect bank account details, create a file with corrected values and provide Razorpay account Id in the last column of the row (as described below). We will update the existing linked account with the new bank account details.

## File format and data constraints

- Provided file must be a valid CSV with no heading values.
- Every row should contain values as per linked account in order and described as following:

Field | Description | Type & Validation
---
business_name | Name of the vendor | string, Max length - 255
---
bank_account_type | Type of account (savings/current) | string (alphabets and spaces), Max length - 20
---
bank_account_name | Bank account name | string (alphanumeric and spaces), Max length - 120
---
bank_branch_ifsc | Bank IFSC | string (alphanumeric), Length - 11 characters
---
bank_account_number | Account number | string (alphanumeric), Min length - 5, Max Length - 20
---
reference_id | Identifier for the account on your systems (We don't store this reference) | string, Max length - 255
---
account_id | Razorpay account id for newly created linked account (This should be empty in provided file) | string, Length - 18

 Some sample rows shown here for your understanding.

```csv
ABC Corp,current,ABC Crop Bank Account Name,HDFC0000060,12345678910121,INTERNAL_REF,
XYZ Corp,current,XYZ Crop Bank Account Name,HDFC0000060,12345678910121,INTERNAL_REF,
```

Contact our [Support Team](https://razorpay.com/support) for any queries.
