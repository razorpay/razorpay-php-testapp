---
title: Upload Data on Payment Pages in Batches
description: Share Razorpay Payment Page Link in bulk with customers via email and SMS.
---

# Upload Data on Payment Pages in Batches

You can add or change fields on the Batch Payments Page to show important information for your business. Then, upload a file with the data. Your customers will see the data specific to them and can make a payment based on it.

 to get this feature activated on your Razorpay account.

## How it Works

1. **Payment Pages Creation and Customer Data Upload**: Businesses can create individualised Payment Pages with an option to upload a file containing specific customer data for their customer base. You can use this data to personalise the payment page for each customer.
2. **Automated Notifications**: After the business uploads the data, an automated system will send the Payment Page URLs to the customers via their registered email and mobile number. You can simply embed the page URL on your website if you do not wish to send notifications.
3. **Customer Validation**: Once customers click on the link, they are validated based on a predefined reference parameters that can be as per your, that is, the Business's requirement. This parameter forms part of the data initially uploaded by the business while creating the page. The validation step ensures a secure transaction environment and that only the intended customer can view their respective Payment Page.
4. **Customer-specific Details Access**: After successful validation, customers can view the specific details on their personalised Payment Page as per what was uploaded by you during the batch upload.

## Steps to Create Payment Pages in Batches

To create Payment Pages in batches:

### 1. Create a Payment Page

To create a Payment Page:

1. Log in to the Dashboard and navigate to Payment Pages.
2. Select **Batch Payment Pages** and click **+ Create Payment Pages**.
3. Add Business Details to your Payment Page. Know more about how to add [Business Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/create.md#add-business-details) to your Payment Page.
4. Add payment details to your Payment Page:
    1. Primary Reference Id and Secondary Reference Id are input fields that your customers will use to validate themselves on the page link shared.
    2. Modify the label of these fields as per your requirement.
    2. The Primary Reference Id and Secondary Reference Id input fields are mandatory and cannot be deleted from the page.
        ![Shows the option to select an input field as a secondary reference Id.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pp-batch-secondary-reference-id.jpg.md)
5. Click **Save and Proceed to next Step**. You can download the sample file from here or do it later from the Dashboard.
    ![Shows the interim step before publishing a Payment Page.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pp-batch-step-2.jpg.md)
6. Click **Create and Publish Page** to create the Payment Page.

### 2. Download the Custom Sample Batch File and add details to the Batch File

1. Navigate to **Batch Payment Pages** and select the Payment Page you have created.  
2. Click **View Batch Details** and download the sample file by clicking **Download Sample File**. 

    ![Shows the Download Sample File button on the Razorpay Dashboard.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pp-batch-download-sample.jpg.md)

    
    
3. The batch file contains all the input fields you added in the Payment Details section of your Payment Page. 

4. Fill in the details in the batch file and save. Make sure you do not make any changes to the column labels as that will lead to batch upload failure later.

### 3. Upload Batch File on Dashboard

#### Upload Batch File

1. Select **Click here to Upload** to upload the batch file.
2. On the pop-up page, drag and drop the file over the highlighted area. Alternatively, select the **click to upload** option to select your file from your system.
    ![Pop-up that indicates where to upload Batch Upload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pp-batch-uploadhere.jpg.md)

The file is validated and uploaded to the Razorpay server. After the file is successfully uploaded, a snippet view of the file is displayed in the **Batch Upload** pop-up page.

#### Add Details to the Batch File

To add details to Batch upload:
1. Enter a relevant file name in the **BATCH FILE NAME** field.
2. Follow these steps to determine whether the links should be sent immediately or later. Also, select the medium of link sharing:
    - If you want to send links immediately, select **via SMS** and/or **via Email** next to the **NOTIFY** check box options and click **Create**.
    - If you want to send them later, do not select any medium and click **Create**.
    ![Adding Batch details to a Batch File.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pp-batch-details.jpg.md)

### 4. Perform Post-batch Creation Actions

After the batch is created, you can see a **Batch Created Successfully** pop-up page. Click **Close** and reload the page. The newly created batch file will appear in the list of **Batch Uploads**. The **Batch Uploads** screen displays the following fields:

![Shows the Batch file in processed state.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pp-batch-fields.jpg.md)

Field | Descriptions
---
Batch Id | Unique identifier of a batch upload.
---
Batch Name |  Name of the batch file.
---
Count | The number of processed rows in a batch.
---
Status | Current [state](#batch-file-states) of the batch file.
---
Actions | The operations you can perform on a particular batch file. For example, Download Report File and Send all links.

#### Batch File States

The batch file states are explained in the table given below:

State | Description
---
**Created** | You have successfully uploaded the file. We have not performed any action on the file.
---
**Processing** | We are processing the file.
---
**Processed** | We have processed this file.

### 5. Handle Errors

If there are any errors, they are mentioned in the batch file. Check the batch file, make the necessary corrections and upload the batch file again.

### Related Information

- [Create a Payment Page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/create.md)
- [Search for a Payment Page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/search.md)
- [Manage Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/manage.md)
