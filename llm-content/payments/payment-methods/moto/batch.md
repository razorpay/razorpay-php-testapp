---
title: MOTO Batch Card Payments
description: Create MOTO card payments in batches from the Razorpay Dashboard.
---

# MOTO Batch Card Payments

You can use the MOTO (Mail-Order-Telephone-Order) payment method to charge a customer's credit card without CVV or 2-factor authentication.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

#### PCI-DSS Compliance

You must be PCI-compliant to accept and process customers' card details using the MOTO payment method. The compliance certificate should be updated as per the yearly renewal cycle.

## Steps to Create Batch Card Payments

Following are the steps to create MOTO card payments in batch:

1. [Download sample batch file](#step-1-download-sample-batch-file).
2. [Fill in card and payment details](#step-2-fill-in-card-and-payment).
3. [Upload the filled batch file](#step-3-upload-the-filled-batch-file).
4. [Preview and confirm uploaded file](#step-4-preview-and-confirm-uploaded-file).
5. [View and download Batch Payment Report](#step-5-download-batch-payment-report).

### Step 1: Download Sample Batch File

1. Log in to the Dashboard.
2. Navigate to **Transactions** → **Batch Payments** and click **Download Sample File**.

![](/docs/assets/images/batch_payments-1.jpg)

[Download the sample template](https://cdn.razorpay.com/dashboard/sample_batch_payments.csv) to fill in the requisite details.

### Step 2: Fill in Card and Payment Details

In the downloaded file, fill the necessary details while ensuring that the header row is not modified.

A sample data row is shown below:

![](/docs/assets/images/batch-card-payment-sample-file.jpg)

> **INFO**
>
> 
> **Feature Request**
> 
> MOTO payments can also be processed using Razorpay token id if you are using tokenisation or a [saved card](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md) feature.
> This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> 

    
### Batch File Details

         Different fields that need your input are listed below:

            `Header` _mandatory_
            : `string` Description of the batch file.

            `email` _mandatory_
            : `string` Customer's email address. For example, `gaurav.kumar@example.com`.

            `contact` _mandatory_
            : `integer` Customer's contact number. For example, `+919988998899`.

            `card_number` _mandatory_
            : `integer` Customer's card number or token id. For example, cards - `4386289407660153` and token id - `token_Kb9yf1HWGiZMhu`.

            `expiry_year` _conditionally mandatory_
            : `integer` Expiry year for the card in `YYYY` format. Mandatory only for cards. For example, `2022`.

            `expiry_month` _conditionally mandatory_
            : `integer` Expiry month for the card in `MM` format. Mandatory only for cards. For example, `08`.

            `cardholder_name` _conditionally mandatory_
            : `string` Cardholder's name. Mandatory only for cards. For example, `Gaurav Kumar`.

            `amount` _mandatory_
            : `integer` Amount that is to be charged to the customer. The amount should be in the currency subunit. For example, for an amount of ₹234.56, enter the value `23456`.

            `currency` _mandatory_
            : `string` The currency in which the payment is to be charged. For example, `INR`.
You can select any one of the [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments.md).

            `receipt` _optional_
            : `string` Unique reference entered by you the payment. For example, `#566`.

            `description` _optional_
            : `string` Description for the payment. For example, `Towards purchase of encyclopedia`.

            `notes` _optional_
            : `json object` Set of key-value pairs that can be associated with the payment. This can be useful for storing additional information about the payment. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported.

        

> **INFO**
>
> 
> **Handy Tips**
> 
> To fetch the token id, go to Reports on your Dashboard and download the **Custom Token Report**.
> 

### Step 3: Upload the Filled Batch File

To upload a batch payment file:

1. On the Dashboard, navigate to **Transactions** → **Batch Payments**.

    ![](/docs/assets/images/batch_payments-1.jpg)
1. Upload the filled-in template by clicking the **Click here to upload** button. Currently, CSV, XLS and XLSX file formats are supported.

    ![](/docs/assets/images/batch_payments-2.jpg)

### Step 4: Preview and Confirm Uploaded File

If the batch file is successfully uploaded with appropriate headers and attributes, you will be able to preview the first three rows of the uploaded document. After verifying the accuracy of the data, click **Process Payments** to confirm the upload.

![](/docs/assets/images/batch_payments-3.jpg)

### Step 5: Download Batch Payment Report

After the file is processed, you can download a batch file report. The report includes the final state of each payment request. Click **Download** for the relevant **Batch Id**.

![](/docs/assets/images/batch_payments-4.jpg)

    
### Batch Status

         The uploaded file can be in the following states:

            - `Created`: This is the initial state of the file when it is uploaded. It indicates that the upload is successful, and will be picked up for processing.

            - `Processed`: This is the final state of the file. Payments in a file in this state can either be successfully authorised or have errors during authorisation. There is a chance that a few of the payments did not get authorised due to issues such as invalid cards or an invalid expiry date. Download the file to check the status of the payments.

            The output file is the same as the uploaded file with additional columns added, which are as follows:

            `order_id`
            : `razorpay_order_id` linked to the payment.

            `payment_id`
            : `payment id` used to process the payment.

            `status`
            : Indicates the status of the payment. Possible values:
                - `success`
                - `failed`

            `error_code`
            : If the payment failed due to an error, this column will have an error code.

            `error_description`
            : If the payment failed due to an error, this column will have the reason for the failure.
        

## Frequently Asked Questions

    
### 1. What card types or issuers can be used with MOTO?

         You can use the MOTO feature for all Visa and Mastercard credit cards.
        

    
### 2. What is the payment flow for MOTO?

         All payments are authorised without card CVV data and 2-factor authentication.
        

    
### 3. How many rows can I upload in a single batch file?

         You can upload a maximum of 500 rows in a single batch file.
        

    
### 4. Once the batch file is uploaded, how long will it take for all the payments to be processed?

         Typically, all the payments are processed within 60 minutes after the batch file is uploaded successfully.
        

    
### 5. Can duplicate transactions be included in the same file?

         Yes. Each row in the batch file is treated as a unique entry and processed without additional validation checks.
