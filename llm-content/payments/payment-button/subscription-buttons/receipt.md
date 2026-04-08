---
title: Generic Payment Receipt
description: Configure automatic and manual payment receipts for the payments made using your Razorpay Subscription Button.
---

# Generic Payment Receipt

You can share payment receipts with customers via email once they complete payments using the Subscription Button.

## PDF Receipt to Customers

Here is a sample PDF of the payment receipt.

![](/docs/assets/images/payment-pages-receipt-receipt-example.jpg)

**Setting Up Payment Receipt**

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
    2. In the drop-down list, select one of the custom input fields such as `Name`, `Address` or `Landmark`, used on the Subscription Button. For example, if you have selected `Name`, the customer's name `Gaurav Kumar` will appear on the payment receipt.
4. Click **Save**.

![](/docs/assets/images/payment-pages-receipt-pp-receipt-auto-settings.gif)

### Resend and Download Payment Receipt

Watch this video to see how to resend and download a payment receipt.

[Video: https://www.youtube.com/embed/me-gVlb09cQ]

To resend and download a payment receipt:
1. Navigate to the button's **Transactions Details** page. All the payments made using the Payment Button are listed here.
2. Click on the Payment ID to view the payment details.
3. In the **Payment Receipt** field, click the **Send** button. This will resend the receipt to the customer.
4. You can download the payment receipt using the **Download** button.

## Manual Receipt

If you choose this option, you must manually add a reference number to the receipt and share it with your customers.

Follow the steps given below to configure manual payment receipt:

1. In the Subscription Button creation screen, select the **Payment Receipts** feature available on the top menu ribbon.
2. In the **Payment Receipts Settings** modal, select **Send Manual Receipts**.
3. You can show an input field such as `Name`, `Address` and its associated value on the Receipt. To do this:
    1. Enable the **Show an Input Field on Receipt** feature.
    2. In the drop-down list, select one of the custom input fields such as `Name`, `Address` or `Landmark`, used on the Subscription Button. For example, if you have selected `Name`, the customer's name `Gaurav Kumar` will appear on the payment receipt.
    ![](/docs/assets/images/payment-pages-receipt-manual-pp-receipt.gif)

4. Click **Save**.
5. Navigate to the page's **Transactions Details** screen. All the payments made using the Subscription Button are listed here.
    ![](/docs/assets/images/payment-pages-receipt-pp-transactions-send.jpg)

6. Click the Payment ID to view the payment details.
7. In the **Payment Receipt** field, click the **Send Receipt** button.
8. Enter a reference number for the receipt as per your business requirements.
    ![](/docs/assets/images/payment-pages-receipt-pp-manual-ref.jpg)

9. Click **Send**.

You can resend the receipt using the **Send** button. Also, you can download the payment receipt using the **Download** button.

## Email Notification to Customers

Payment receipts are sent to customers via email as a PDF attachment.

Also, the details entered by the customer while making the payment appear on the email body as shown:

![](/docs/assets/images/payment-pages-receipt-email-non80g.jpg)
