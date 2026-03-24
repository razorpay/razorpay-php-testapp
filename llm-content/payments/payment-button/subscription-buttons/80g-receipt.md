---
title: 80 G-enabled Payment Receipt
description: Configure 80G compliant automatic and manual payment receipts for the payments made using your Razorpay Subscription Button.
---

# 80 G-enabled Payment Receipt

As an NGO using Subscription Button to accept donations from patrons, you can share payment receipts with 80 G details to customers via email once they make the payment.

## PDF Receipt to Customers

**Setting Up Payment Receipt**:

Payment Receipts can be generated and shared:
- [Automatically](#automated-receipt)
- [Manually](#manual-receipt)

## Automated Receipt

When you use this feature, the payment receipt will be automatically shared with customers via email and SMS using the details they provided at the time of payment. An auto-generated reference number will be added by Razorpay.

Follow these steps to configure automated payment receipts:

1. While creating or editing the Subscription Button, select the **Payment Receipts** feature available on the top menu ribbon.
2. In the **Payment Receipts Settings** modal, select **Send Automated Receipts**.
3. You can show an input field such as `Name`, `Address` and its associated value on the Receipt. To do this:
    1. Enable the **Show an Input Field on Receipt** feature. 
    2. In the drop-down list, select one of the custom input fields such as `Name`, `Address` or `Landmark`, used on the Subscription Button. For example, if you have selected `Name`, the patron's name `Gaurav Kumar` will appear on the payment receipt.

    ![](/docs/assets/images/payment-pages-receipt-pp-receipt-80g-setting.gif)

4. To issue receipts with 80-G details, enable the **Issue 80-G Receipts** option.
5. Use the **Click here** link to add relevant 80-G text to be displayed in the payment receipt. This opens the **Manage 80-G** modal where you can add a description and upload the signature of the authorized signatory.
    1. Enter the description. For example:
    
    Donation eligible for exemption under 80-G under IT Act 1861 .. with ID DIT(E)/2009-2010/W-110/15XX dated 24.09.2009

    2. Upload an image of the signature in the **Authorized Signatory** field and click **Save**.

    ![](/docs/assets/images/payment-pages-receipt-pp-receipt-80g-sign.gif)
6. Click **Save**.

### Resend and Download Payment Receipt

@include payment-button/download

## Manual Receipt

If you choose this option, you must manually add a reference number to the receipt and share it with your customers.

Follow the steps given below to configure Manual payment receipt:

1. In the Subscription Button creation screen, select the **Payment Receipts** feature available on the top menu ribbon.
2. In the **Payment Receipts Settings** modal, select **Send Manual Receipts**.
3. You can show an input field such as `Name`, `Address` and its associated value on the Receipt. To do this:
    1. Enable the **Show an Input Field on Receipt** feature. 
    2. In the drop-down list, select one of the custom input fields such as `Name`, `Address` or `Landmark`, used on the Subscription Button. For example, if you have selected `Name`, the patron's name `Gaurav Kumar` will appear on the payment receipt.

    ![](/docs/assets/images/payment-pages-receipt-80g-manual-pp-receipt.gif)

4. To issue receipts with 80-G details, enable the **Issue 80-G Receipts** option.
5. Use the **Click here** link to add relevant 80-G text to be displayed in the payment receipt. This opens the **Manage 80-G** modal where you can add a description and upload the signature of the authorized signatory.
    1. Enter the description. For example:

    Donation eligible for exemption under 80-G under IT Act 1861 .. with ID DIT(E)/2009-2010/W-110/15XX dated 24.09.2009
    2. Upload an image of the signature in the **Authorized Signatory** field and click **Save**.

    ![](/docs/assets/images/payment-pages-receipt-80g-manual-pp-receipt-sign.gif)

6. Click **Done**.
7. Navigate to the page's **Transactions Details** screen. All the payments made using the Subscription Button are listed here.
    ![](/docs/assets/images/payment-pages-receipt-pp-transactions-send.jpg)

8. Click the Payment ID to view the payment details.
9. In the **Payment Receipt** field, click the **Send** button.
10. Enter a reference number for the receipt as per your business requirements.
    ![](/docs/assets/images/payment-pages-receipt-pp-manual-ref.jpg)

11. Click **Send**.

You can resend the receipt using the **Send** button. Also, you can download the payment receipt using the **Download** button.

## Email Notification to Customers

Payment receipts are sent to customers via email as a PDF attachment.

Also, the details entered by the customer on the Subscription Button appear on the email body.
