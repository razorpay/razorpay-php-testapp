---
title: Create Payment Links in Batches
description: Generate Razorpay Payment Links in bulk using the Batch Upload feature.
---

# Create Payment Links in Batches

You can generate and process Payment Links in batches on the Dashboard and save time, eliminating the hassle of creating multiple individual links.

 to get this feature activated on your Razorpay account.

## Workflow

    
### 1. Download Batch File Format

         Download the sample batch file from the Dashboard. The batch file is a simple **.xlsx** or **.csv** file.
         
         
         ![Download Sample file from Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/batch-pl-download.jpg.md)

         
        

    
### 2. Add Payment Details in Batch File

         
> **INFO**
>
> 
> 
>          **Handy Tips**
> 
>          - The size of a batch file can be up to 10 MB. You can add up to 50,000 rows in a particular file. The Payment Links are processed in the same sequence as listed in the file.
>          - The Field names/headers in a batch should not be modified. Modifications can cause upload failure.
>          

         

         Watch this video to see how to add payment details in the batch file.

         
[Video: https://www.youtube.com/embed/aMsG7zDLbww]

         

         The batch file contains all the necessary details to create Payment Links. Given below are the required fields for creating a batch file:

         `Reference Id` _optional_
         : Enter a unique number for each Payment Link. This is mapped to the `receipt` value provided while creating an Order on your server-side. This field has a limit of 40 characters.

         `Customer Name` _optional_
         : Name of the customer. This field has a limit of 40 characters.

         `Customer Email` _optional_
         : Email address of the customer.

         

         `Customer Contact` _optional_
         : Contact number of the customer. You can enter domestic as well as international numbers. The expected format of the phone number is `+ {country code}{phone number}`. If the country code is not specified, `91` will be used as the default value.

         `Upi Link` _mandatory_
         : Determines the type of Payment Link to be created. Possible values:
             - `0`: Indicates a Standard Payment Link will be created.
             - `1`: Indicates a UPI Payment Link will be created.

         `Currency` _optional_
         : Defaults to `INR`. We also accept payments in international currencies.

         `Amount` _mandatory_
         : Amount to be paid by the customer in currency subunits. That is, if currency selected is 'INR', the amount must be in paise. For example, enter 29995 for an amount of ₹299.95. The minimum amount should be ₹100, that is 10000.
         

         

         

         `Description` _mandatory_
         : Brief description of the Payment Link.

         `Expire by` _optional_
         : Date and Time at which the Payment Link expires. Supported formats:
`DD-MM-YYYY HH:mm:ss` (For example, 14-12-2018 18:45:00)
`DD-MM-YYYY HH:mm`
`DD-MM-YYYY`

         

         `Partial Payment` _optional_
         : Indicates whether partial payments are enabled. Set to `1` to enable partial payments and `0` to disable.
 
> **INFO**
>
> **Handy Tips**
Partial payments are not allowed for UPI Payment Links.

         `First Payment Min Amount (In Paise)` _optional_
         : Minimum amount to be paid by the customer as the first partial payment. For example, if an amount of ₹7,000 is to be received from the customer in two installments of #1 - ₹5,000 and #2 - ₹2,000, you can set this value as `500000`.
          

         `Notes` _optional_
         : The notes object is a set of key-value pairs used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, each 255 characters long (maximum).

         

         Ensure that the date format does not get modified. Watch this video to see how to fix date formatting issues:

         ![Fix date formatting issues in batch file](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-batch-batch-pl.gif.md)

         
        

    
### 3. Upload Batch File on Dashboard

         **To upload a batch file:**

         1. Navigate to **Payment Links** → **Batch Uploads**.
         2. Click the **Click here to upload** button.
             

             ![Upload batch file button on Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pl-batch-upload-click.jpg.md)

             

         3. On the pop-up page, drag and drop the file over the highlighted area. Alternatively, click the **Click to Upload** option to select your file from your system.

         

         ![Batch upload page with Click to Upload button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/batch_pl.jpg.md)

         

         The file is validated and uploaded to the Razorpay server. After the file is successfully uploaded, a snippet view of the file is displayed in the **Batch Upload** pop-up page.

         #### Add Details to Batch Upload Pop-up Page

         **To add details to Batch upload:**

         1. Enter a relevant file name in the **BATCH FILE NAME** field.
         2. Select **Send auto reminders** if you want to send automatic reminders for all Payment Links. By default, reminders are not enabled during batch creation of Payment Links.
         3. Follow these steps to determine whether the links should be sent immediately or later. Also, select the medium of link sharing:

             - If you want to send links immediately, select **via SMS** and/or **via Email** next to the **NOTIFY** check box options and click **Create**.
             - If you want to send them later, do not select any medium and click **Create**.

         

         ![Add details to batch upload pop-up page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/batch_create_pl.jpg.md)

         

         Know how to [handle errors](#step-5-handle-errors) that occur during batch upload.
        

     
### 4. Perform Post-batch Creation Actions

         After the batch is created, you can see a **Batch Created Successfully** pop-up page. Click **Close** and reload the page. The newly created batch file will appear in the list of **Batch Uploads**. 

         The **Batch Uploads** screen displays the following fields:

         

         ![Perform Post batch creation actions page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-batch-screen.jpg.md)

         

         

         

         Field | Descriptions
         ---
         Batch ID | Unique identifier of a batch upload.
         ---
         Batch Name |  Name of the batch file.
         ---
         Count | The number of processed rows in a batch.
         ---
         Status | Current [state](#batch-file-states) of the batch file.
         ---
         Actions | The operations you can perform on a particular batch file. For example, Download Report File and Send all links.
         

             

             Watch this video to see how to generate the batch file report:

             
[Video: https://www.youtube.com/embed/IobQMjW0XUs]

             

              **To view more details about the batch file:**

             1. Click the **Download** button to download the **Batch File Report**. This report provides you with details of the links created. Also, it displays any errors that occurred during the process.

                
                    
                        Batch File States
                        
                        The batch file states are explained in the table given below:

                        

                        State | Description
                        ---
                        **Created** | You have successfully uploaded the file. No action has been performed on the file by us.
                        ---
                        **Processing** | We are processing the file.
                        ---
                        **Processed** | The file has been processed by us.
                        

                        
> **INFO**
>
> 
> 
>                         **Handy Tips**
> 
>                         - The **Processed** state does not mean all rows in the file were successfully processed. It just means the file was successfully processed, with or without errors.
>                         - Download the **Bulk Upload** report to check for errors. You can correct these errors and upload the data again in another file.
>                         

                        

                 

             2. Click the Batch ID to view the **Total rows processed**, **Payment Links created**, and the number of **Paid** and **Expired** links. You can also view the **Status** and **Created At** information of the batch. The details of individual Payment Links created from the batch are also displayed here.

             ![Batch file status page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/batch_details.jpg.md)

             
                 
### Send Unsent Payment Links

                      After a batch is successfully created and is in the **Processed** state, you can see either an **All links sent** or a **Send all links** option under the **Actions** based on your notification choice above.

                      To send the Payment Links: 

                      1. Click the **Send all links** button. 
                      2. Select **Send SMS** and/or **Send Email** on the **Send Reminder?** pop-up page that appears.
                      3. Click **Yes, Send all**. This enables Razorpay to process and issue Payment Links to their respective recipients as defined in the batch file.
                     

             
        
    
    
### 5. Handle Errors

         Batch file errors are detected during file upload. You can also download the batch file report after the upload to check for errors.

         A processed batch file does not necessarily mean that all Payment Links were created successfully. There is a chance that a few Payment Links did not get created because of certain issues in the entered data. For example, data was missing in a few fields.

         Download the **Batch Report** to understand the reason for the error. This contains the following additional fields to help you check if a Payment Link was issued for a row or not.

         
         Additional Fields | Datatype | Description
         ---
         Status | _string/null_ | This indicates the processing status of the row. It can either be "success" or "failed".
         ---
         Payment Link ID | _string/null_ | The unique identifier of the Payment Link. This is null/empty if there are errors during the creation.
         ---
         Payment Link Short URL | _string/null_ | The URL of the Payment Link. This is null/empty if there are errors during the creation.
         ---
         Error Code | _string/null_ | In case of an error, this column has an error code.
         ---
         Error Description | _string/null_ | In case of an error, this column has the error message.
         

         To fix the errors, make the required changes and re-upload the batch file.

         

         Watch this video to see how to handle errors found on the batch file report.

         
[Video: https://www.youtube.com/embed/N2_lrWc-rEw]

         
        

### Related Information

- [How Payment Links Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/how-it-works.md)
- [Payment Links States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/states.md)
- [Create a Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md)
- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/faqs.md)
