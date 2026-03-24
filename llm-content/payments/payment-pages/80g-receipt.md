---
title: Payment Pages | Configure 80G Receipts
heading: Configure 80G-Enabled Payment Pages Receipt
description: Generate, download and share 80G-enabled receipts for donations on NGO Payment Pages. Send email notifications and PDF receipts to your customers.
---

# Configure 80G-Enabled Payment Pages Receipt

If you are an NGO using Payment Pages to accept donations, you can share payment receipts with 80G details to your customers via email once they make the payment.

## Set Up Payment Receipt

Payment Receipts can be generated and shared using **Automated Rececipts** or **Manual Receipts**.

Watch this video on how to configure 80G-enabled Payment Receipts.

[Video: https://www.youtube.com/embed/fLF3dOdi1CM]

You can automatically share the payment receipt with customers via email and SMS. An auto-generated reference number is added by Razorpay.

To configure automated Payment Page receipts:

1. While creating or editing the Payment Page, select **Payment Receipts** from the top menu ribbon.
    ![Edit an 80G-enabled Payment Page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-pp-receipt.jpg.md)
2. On the **Payment Receipts Settings** pop-up page, select **Send Automated Receipts**.
3. To show an input field such as `Name`, `Address` and its associated value on the receipt:
    1. Enable the **Show an Input Field on Receipt** option.
    2. In the drop-down list, select one of the custom input fields such as `Name`, `Address` or `Landmark`, used on the Payment Page. For example, if you selected `Name`, the patron's name `Gaurav Kumar` will appear on the payment receipt.

    ![Send automated receipts from 80G-enabled Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-pp-receipt-80g-setting.gif.md)

4. To issue receipts with 80G details, enable the **Show 80G Details** option.
5. Use the **Click here** link to add relevant 80-G text to be displayed in the payment receipt. This opens the **Manage 80-G** pop-up page where you can add a description and upload the signature of the authorised signatory.
    1. Enter the description. For example:

    `Donation eligible for exemption under 80-G under IT Act 1861 .. with ID DIT(E)/2009-2010/W-110/15XX dated 24.09.2009`
    2. Upload an image of the **Signature of Authorized Signatory** field and click **Save**.

    ![Resend payment receipt from Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-pp-receipt-80g-sign.gif.md)
6. Click **Save**.

You can also manually add a reference number to the receipt and share it with your customers.

To configure manual Payment Page receipt:

1. On the Payment Page creation page, select **Payment Receipts** from the top menu ribbon.
    ![Edit an 80G-enabled Payment Page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-pp-receipt.jpg.md)
2. On the **Payment Receipts Settings** pop-up page, select **Send Manual Receipts**.
3. To show an input field such as `Name`, `Address` and its associated value on the receipt:
    1. Enable the **Show an Input Field on Receipt** feature.
    2. In the drop-down list, select one of the custom input fields such as `Name`, `Address` or `Landmark`, used on the Payment Page. For example, if you select `Name`, the patron's name `Gaurav Kumar` will appear on the payment receipt.

    ![Send manual receipts from 80G-enabled Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-80g-manual-pp-receipt.gif.md)

4. To issue receipts with 80G details, enable the **Issue 80G Receipts** option.
5. Use the **Click here** link to add relevant 80-G text to be displayed in the payment receipt. This opens the **Manage 80G** pop-up page where you can add a description and upload the signature of the authorised signatory.
    1. Enter the description. For example:

    `Donation eligible for exemption under 80G under IT Act 1861 .. with ID DIT(E)/2009-2010/W-110/15XX dated 24.09.2009`
    2. Upload an image of the signature in the **Signature of the Authorised Signatory** field and click **Save**.

    ![Add 80G description and signature of the authorised signatory to send manual receipts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-80g-manual-pp-receipt-sign.gif.md)

6. Click **Save**.
7. Navigate to the page's **Transactions Details** page. All the payments made using the Payment Page are listed here.
    ![Transaction details of payments made using 80G-enabled Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-pp-transactions-send.jpg.md)

8. Click the Payment id to view the payment details.
9. In the **Payment Receipt** field, click the **Send** button.
10. Enter a reference number for the receipt as per your business requirements.
    ![Add a reference number for an 80G payment receipt](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-pp-manual-ref.jpg.md)

11. Click **Send**.

You can also download the payment receipt using the **Download** button.

### Resend and Download Payment Receipt

@include payment-pages/download

### Email Notification to Customers

After your customers complete the payment using the Payment Page, the payment receipt is sent to them via email as a PDF attachment. The details entered by the customer on the Payment Page appear on the email body as shown below:

![80G Payment receipt sent via email notification to a customer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-email.jpg.md)

### PDF Receipt to Customers

Here is a sample PDF of the payment receipt.

### Related Information
[Configure Payment Pages Receipt](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/receipt.md)
