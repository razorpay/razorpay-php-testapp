---
title: Configure Generic Payment Button Receipt
description: Configure automatic and manual payment receipts for the payments made using your Razorpay Payment Button.
---

# Configure Generic Payment Button Receipt

You can share payment receipts with customers through email after they complete payments using the Payment Button. The payment receipts can be generated and shared [Automatically](#automated-receipt) or [Manually](#manual-receipt). 

Here is a sample PDF of the payment receipt.

![PDF Receipt](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-receipt-example.jpg.md)

## Automated Receipt

Automatically generate payment receipts and send them to the customers through email and SMS using the details they provided at the time of payment. An auto-generated reference number is be added by Razorpay.

Watch this video to see how to configure automated payment receipts.

[Video: https://www.youtube.com/embed/GOAZ1Q9wWQk]

To configure automated payment receipts:
1. While creating or editing the Payment Button, select the **Payment Receipts** feature available on the top menu ribbon.
2. On the **Payment Receipts Settings** pop-up page, select **Send Automated Receipts**.
3. You can show an input field such as `Name`, `Address` and its associated value on the Receipt. 
    1. Enable the **Show an Input Field on Receipt** feature.
    2. In the drop-down list, select one of the custom input fields such as `Name`, `Address` or `Landmark`, used on the Payment Button. For example, if you select `Name`, the customer's name `Gaurav Kumar` appears on the payment receipt.
4. Click **Save**.

## Manual Receipt

You can choose to send payment receipts to your customers manually. In this case, you must manually add a reference number to the receipt and share it with your customers.

Watch this video to see how to configure manual payment receipts.

[Video: https://www.youtube.com/embed/HiPcouqoj4c]

To configure manual payment receipts: 

1. On the Payment Button creation pop-up page, select the **Payment Receipts** feature available on the top menu ribbon.
2. On the **Payment Receipts Settings** pop-up page, select **Send Manual Receipts**.
3. You can show an input field such as `Name`, `Address` and its associated value on the Receipt. 
    1. Enable the **Show an Input Field on Receipt** feature.
    2. In the drop-down list, select one of the custom input fields such as `Name`, `Address` or `Landmark`, used on the Payment Button. For example, if you select `Name`, the customer's name `Gaurav Kumar` appears on the payment receipt.
4. Click **Save**.
5. Navigate to the page's **Transactions Details** section. All the payments made using the Payment Button are listed here.
    ![Transaction Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-pp-transactions-send.jpg.md)
6. Click the Payment ID to view the payment details.
7. In the **Payment Receipt** field, click the **Send Receipt** button.
8. Enter a reference number for the receipt as per your business requirements.
    ![Transaction Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-pp-manual-ref.jpg.md)
9. Click **Send**.

    
### Resend and Download Payment Receipt

         

Watch this video to see how to resend and download a payment receipt.

[Video: https://www.youtube.com/embed/me-gVlb09cQ]

To resend and download a payment receipt:
1. Navigate to the button's **Transactions Details** page. All the payments made using the Payment Button are listed here.
2. Click on the Payment ID to view the payment details.
3. In the **Payment Receipt** field, click the **Send** button. This will resend the receipt to the customer.
4. You can download the payment receipt using the **Download** button.

        

    
### Email Notification to Customers

Payment receipts are sent to customers via email as a PDF attachment. The details entered by the customer while making the payment also appear on the email body as shown below:

![Payment Receipt](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-receipt-email-non80g.jpg.md)

        

### Related Information

[Configure 80G-enabled Payment Button Receipt](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/80g-receipt.md)
