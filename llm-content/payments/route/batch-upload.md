---
title: Batch Upload for Linked Accounts and Transfers
description: Create Linked Accounts and transfers using the batch upload feature.
---

# Batch Upload for Linked Accounts and Transfers

Generate and process Linked Accounts and Transfers in bulk (batches) by uploading a batch file in the Dashboard. This simplifies the process of creating these individually. 

## Create Batches

To create batches:
1. Download the sample file from the Dashboard.
2. Update the file with the required information.
3. Upload the file back to the Dashboard.

> **WARN**
>
> 
> **Watch Out!**
> 
> The sample file should be in `.csv` or `.xlsx` format.
> 

#### Actions Using Batches

You can perform the following actions using batch upload:
- [Create Linked Accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/batch-upload/#create-linked-accounts-via-batch-upload.md)
- [Create Transfers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/batch-upload/#create-transfers-via-batch-upload.md)

### Batch Upload Statuses

The following table lists the upload statuses and their description.

Status | Description
---
Created | This is the initial state of the upload and indicates that the batch is created and processed in Razorpay database.
---
Processing | This state indicates that the uploaded batch file is under process.
---
Processed | This is the final state of the batch file and indicates that the batch file is successfully processed and individual rows could be processed successfully or with errors. You can check the details via the Batch Report.
---
Scheduled | This state indicates that the file is scheduled to be processed at a later time.
---
Cancelled | This state indicates that you cancelled the processing of the batch file. This applies only to Batches in processing or scheduled state.
---

### Create Linked Accounts via Batch Upload

You can create multiple linked accounts in bulk by uploading a batch file on the Dashboard.

> **WARN**
>
> 
> **Watch Out!**
> 
> For Mutual Funds Distributors (MFDs), Linked Accounts with their Asset Management Company (AMC) details are automatically created after they get access to the Route. MFDs do not need to create any Linked Accounts from the Dashboard. Please get in touch with our [support team](https://razorpay.com/support/) for any help on creating Linked Accounts.
> 

Watch this video to see how to create Linked Accounts in bulk using a batch file.

[Video: https://www.youtube.com/embed/gQ22EbqfwII]

### To create Linked Accounts using batch upload:

1. Log in to the Dashboard and click **Route** under **PAYMENT PRODUCTS**.
1. Click **Batch Upload**.
1. Hover on **Upload New Batch** and click **Linked Accounts**. The **Batch Upload** pop-up page appears.
1. Click **download sample file** to download the sample file.
1. Update and save the file with the following details. Refer to the [Linked Accounts Batch Fields](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/batch-upload/#linked-account-batch-fields.md) section for more information.
    - `account_name`
    - `account_email`
    - `dashboard_access`
    - `customer_refunds`
    - `business_name`
    - `business_type`
    - `ifsc_code`
    - `account_number`
    - `beneficiary_name`
1. Upload the updated file to the **Dashboard** in the **Batch Upload** pop-up page.
1. Verify the details and enter the file name in the **BATCH FILE NAME** text box.
1. You can choose to process the file immediately or schedule it for later.
1. Click **Create**.

You can view the status and other details of the upload under the **Batch Upload** section on the Dashboard.

### Linked Account Batch Fields

The following table lists the fields required to create linked accounts and their description.

Field | Description and Possible Values
---
`account_name` | Name for the linked account.
---
`account_email` | Email for the linked account. This is an optional filed.
---
`dashboard_access` | Option to choose whether to provide Dashboard access or not. Possible values are: - `0`: No
 - `1`: Yes

---
`customer_refunds` | Option to choose whether to allow refund or not. Possible values are: - `0`: No
 - `1`: Yes

---
`business_name` | Business name of the linked account.
---
`business_type` | Business type of the linked account. Possible values are: - `llp`
 - `ngo`
 - `individual`
 - `partnership`
 - `proprietorship`
 - `public_limited`
 - `private_limited`
 - `trust`
 - `society`
 - `not_yet_registered`
 - `educational_institutes`

---
`ifsc_code` | IFSC code of the linked account bank.
---
`account_number` | Account number of the linked account.
---
`beneficiary_name` | Beneficiary name of the linked account.
---

Download the sample input file of the Linked Account creation for reference.

### Batch File After Processing

Once a batch file is processed, you can view and download the processed file from the Dashboard. Click the **Batch Id** to view the details and click **Download** to download the file. Information such as the uploaded rows, successfully processed and failed rows are displayed in the file.

![Route processed batch file after processing](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/route-processed_batch_file.jpg.md)

The downloaded file has the following additional fields that provide information about the created linked accounts or the reason for failure.

Field | Description and Possible Values
---
`account_id` | Unique ID of the linked account in the `acc_FinZs6b5lL1Nmv` format.
---
`account_name` | Name for the linked account.
---
`account_email` | Email for the linked account.
---
`dashboard_access` | Option to choose whether to provide Dashboard access or not. Possible values are: - `0`: No
 - `1`: Yes

---
`customer_refunds` | Option to choose whether to allow refund or not. Possible values are: - `0`: No
 - `1`: Yes

---
`business_name` | Business name of the linked account.
---
`business_type` | Business type of the linked account.
---
`ifsc_code` | IFSC code of the linked account bank.
---
`account_number` | Account number of the linked account.
---
`beneficiary_name` | Beneficiary name of the linked account.
---
`account_status` | The status of the linked account. Possible values: - `success`
 - `failed`

---
`Error Code` | The error code for the failure. For example, `BAD_REQUEST_ERROR`.
---
`Error Description` | The reason for the error. For example, `The IFSC code field is required`.
---

### Create Transfers via Batch Upload

You can create transfers to Linked Accounts in bulk by uploading a batch file with the required details. Watch this video to see how to create transfers to linked accounts in bulk using a batch file.

[Video: https://www.youtube.com/embed/Brm1nGdy5cs]

    
### To create Transfers in bulk:

         1. Log in to the Dashboard and click **Route** under **PAYMENT PRODUCTS**.
        1. Click **Batch Upload**.
        1. Hover on **Upload New Batch** and click **Transfers**. The **Batch Upload** pop-up page appears.
        1. Click **download sample file** to download the sample file.
        1. Update and save the file with the following details. Refer to the Transfers Batch Fields section for more information.
            - `payment_id`
            - `account_id`
            - `amount`
            - `currency`
            - `transfer_notes`
            - `linked_account_notes`
            - `on_hold`
            - `on_hold_until`

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             You should enter the amount in paise. For example, if you want to transfer ₹500, then you should enter 50000.
>             

        1. Upload the updated file to the **Dashboard** in the **Batch Upload** pop-up page.
        1. Verify the details and enter the file name in the **BATCH FILE NAME** text box.
        1. You can choose to process the file immediately or schedule it for later.
        1. Click **Create**.

        You have successfully created transfers in bulk.
        

 
### Transfers Batch Fields

 The following table lists the fields required to create transfers and their description.

 

 Field | Description and Possible Values
    ---
    `payment_id` | `string` Unique identifier of the payment on which the transfer must be created. This field is required only in the case of Transfers via Payment.
    ---
    `amount` | `integer` The amount that has to be transferred to the linked account. For example, for an amount of ₹200.35, the value of this field should be 20035.
    ---
    `currency` | `string` The currency in which the transfer should be made. We support only INR for Route transactions.
    ---
    `account_id` | `string` Unique identifier of the linked account to which the transfer is to be made.
    ---
    `transfer_notes` | `json object` Set of key-value pairs that can be associated with an entity. These keys are useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported.
    ---
    `linked_account_notes` | `array` List of the keys from the notes object, which needs to be shown to linked accounts on their Dashboard.
    ---
    `on_hold` | `boolean` Indicates whether the account settlement for transfer is on hold. Possible values: - `1`: Puts the settlement on hold.
 - `0`: Releases the settlement.

    ---
    `on_hold_until` | `integer` Timestamp, in Unix, indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.
    ---
    

    Download the sample input file of Transfers creation for reference.

### Batch File After Processing

Once a batch file is processed, you can view and download the processed file from the Dashboard. Click the **Batch Id** to view the details and click **Download** to download the file. Information such as the uploaded rows, successfully processed and failed rows are displayed in the file.

![Route transfers Batch Upload report](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/route-transfers_Bu_report.jpg.md)

The downloaded file has the following additional fields that provide information about the created transfers or the reason for failure.

Field | Description and Possible Values
---
`transfer_id` | `string` Unique identifier of the transfer.
--- 
`payment_id` | `string` Unique identifier of the payment on which the transfer must be created. This field is required only in the case of Transfers via Payment.
---
`account_id` | `string` Unique identifier of the linked account to which the transfer is to be made.
---
`amount` | `integer` The amount that has to be transferred to the linked account. For example, for an amount of ₹200.35, the value of this field should be 20035.
---
`currency` | `string` The currency in which the transfer should be made. We support only INR for Route transactions.
---
`transfer_notes` | `json object` Set of key-value pairs that can be associated with an entity. These keys are useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported.
---
`linked_account_notes` | `array` List of the keys from the notes object, which needs to be shown to linked accounts on their Dashboard.
---
`on_hold` | `boolean` Indicates whether the account settlement for transfer is on hold. Possible values: - `1`: Puts the settlement on hold.
 - `0`: Releases the settlement.

---
`on_hold_until` | `integer` Timestamp, in Unix, indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.
---
`created_at` | Timestamp of when the transfer is created.
---
`Error Code` | The error code for the failure. For example, `BAD_REQUEST_ERROR`.
---
`Error Description` | The reason for the error. For example, `The IFSC code field is required`.
---

## View all Batches

    
### The Batch Upload section in the Dashboard displays the following fields:

         

            Field | Description
            ---
            Batch ID | ID of the newly uploaded batch.
            ---
            Batch Name | Business defined label for the batch.
            ---
            Count | Total number of rows uploaded.
            ---
            Type | Type of the uploaded file. The value can be either of the following: - Linked Account
 - Transfers

            ---
            Status | Status of the uploaded file. The value can be either of the following: - Created
 - Processed
 - Processing
 - Scheduled
 - Cancelled

            ---
            Actions | Action buttons for the uploaded file. Following are the available options: - Download
 - Cancel

            ---
            

            You can also search for the required batch file using the following search options:
            - Batch Upload Id: This option allows you to search using the upload ID.
            - Batch Type: This option lets you search using batch type. Select the required type from the **Batch Type** list.
            - Count: This option allows you to search using the number of rows uploaded.
        

## Schedule a Batch

You can choose to process the batch upload immediately or schedule it for later.

    
### To schedule a batch:

         1. Log in to the Dashboard and click **Route** under **PAYMENT PRODUCTS**.
         1. Click **Batch Upload**.
         1. Hover on **Upload New Batch** and click the required batch type. The **Batch Upload** pop-up page appears.
         1. Click **download sample file** to download the sample file.
         1. Update the file with the required details.
         1. Upload the updated file to the **Dashboard** in the **Batch Upload** pop-up page.
         1. Select **Schedule for Later** and select the date and time you want to start the batch upload.
            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Ensure the scheduled time is at least 1 hour from the current time.
>             

         1. Click **Create**.

         The batch upload starts at the scheduled time.
        

## Errors During and After Batch Upload

    
### Errors During Upload

          If any error happens in the data rows during the upload step, it will be displayed on the screen. You can also download the report from the Dashboard that contains errors and their reasons. This helps you to fix the errors and upload the file.

            Some of the common errors during upload are:
            - Same file uploaded multiple times
            - Uploaded file type not supported

            You can fix the errors by making the required changes in the file and re-upload it in the Dashboard. 
        

    
### Errors After Upload

         A processed batch file does not necessarily mean that all linked accounts and transfers were created successfully. Few rows may not get created because of certain issues in the entered data. 

            Download the Batch Report that contains the following additional fields to help you check if a link was issued for a row or not.

            

            Field | Description
            ---
            Status | The status of the Transfer. Possible values are: - Success
 - Failed

            ---
            Error Code | The error code for the failure. For example, `BAD_REQUEST_ERROR`.
            ---
            Error Description | The reason for the error. For example, `The IFSC code field is required`.
            ---
            Transfer Id/Linked Account Id | `string` Unique identifier of the transfer/linked account.
            ---
            
        

### Related Information

[Route FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/faqs.md)
