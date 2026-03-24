---
title: Create a QR Code
description: Create a QR Code, add a custom brand name and view Payments from the Razorpay Dashboard.
---

# Create a QR Code

Razorpay QR Code is a QR-based solution that enables you to accept digital payments from your customers. You can create a QR Code using the Dashboard or the API and share it with your customers. Customers then scan the code and complete the payment.

## Create a QR Code from the Dashboard

Here is a short video on how to create QR Codes on the Dashboard.

[Video: https://www.youtube.com/embed/YUAU8C1PRDc]

To create a QR Code:
1. Log in to the Dashboard.
1. Go to the **PAYMENT PRODUCTS** section and click **QR Codes** → **+Create QR Codes**.
    ![Create QR codes on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-create-qrcode.jpg.md)
1. Provide the following details:
    
        
### QR Usage

            You can configure the QR Code to receive a single payment or multiple payments.
            - **Multiple Payments**: Enables QR Code to receive multiple payments. 
            - **Single Payment**: Enables QR Code to receive only one payment. Once this payment is received, the QR Code is automatically closed.
            
            
> **WARN**
>
> 
>             **Watch Out!**
>             
>             - QR Codes that support multiple payments cannot be closed. 
>             - You can only accept a fixed amount for single payment QR Codes.
>             

            

        
### Accept only fixed amount on this QR?

            You can decide whether to accept fixed amount or let the customer decide the amount:
            - **Yes**: Set to **Yes** and specify the fixed amount you want to receive from customers. Customers will not be able to pay an amount greater than or lesser than the specified amount.
            - **No**: Set to **No** to allow customers to pay an amount of their choice.
            

        
### Description [Optional]

            Add a description for your reference.
            ![Add a description while creating a QR code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-add-details.jpg.md)
            - Details added in description will show up in the QR Image.
                ![QR Image with description](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-code-image.jpg.md)
            

        
### Advanced Options

            Click **View Advanced Options** to view and configure advanced options.
            ![View advanced options while creating a QR code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-view-advanced-options.jpg.md)
            - **Close By (Optional)**: Set a closure date for the QR Code. Select the **Close this QR Code after** option to select the date and time at which the account must be automatically closed. Ensure that the time specified is at least 15 minutes after the QR Code creation time.
            
            
> **WARN**
>
> 
>             **Watch Out!**
>             
>             The **Close By** feature is not available for QR Codes accepting **Multiple Payments**.
>             

            
            - **Customer**: Select the customer from the drop-down list. You can also [create a new customer](#create-a-new-customer-while-creating-qr-code) while creating the QR Code.

            
> **INFO**
>
> 
>             **Handy Tip**
> 
>             You may skip this step and proceed with creation, if you do not wish to tag it to a specific customer. However, you cannot modify the QR Code and tag it to a customer later.
>             

            

         
### Name

            Add a name for the QR Code for your reference. This will appear on your Dashboard.
            
> **INFO**
>
> 
>             **Handy Tip**
> 
>             This is for your reference only and will not be visible to the end user.
>             

            

         
### Add Internal Note

            Add notes for internal reference.
            ![Add customer, name and internal notes while creating a QR code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-configure.jpg.md)
            - This helps with reconciliation and will be available in the payments reports for the payments captured via QR.
                ![Internal notes of a payment captured via QR code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-internal-notes.jpg.md)
            

    
 
1. Click **Create QR Code**. The QR Code is created. 

![QR code created successfully](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-generated.jpg.md)

You can download and share the QR Code image with your customers. The QR Code appears in the list.

![List of QR codes on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-create-qrcode.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> - If you create a QR Code in **Test Mode** through the payment gateway flow, the QR Code will disappear after two seconds.
> - You can scan QR Codes that are created only in **Live Mode**.
> 

### Create a New Customer While Creating a QR Code

To create a customer while creating a QR Code:

1. Click **View Advanced Options**. 
1. In the **Customers** field, click **+Add New**.
    ![Create a new customer while creating a QR code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-add-new-customer.jpg.md)
1. Specify details such as **Company/Individual Name**, **Email** and
**Contact No.**
    ![Add details to create a new customer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-add-customer-details.jpg.md)
1. Click **Create and add this customer**.

The details of the newly created customer are auto-populated on the QR Code. This customer name is also displayed under the **Customers** menu, and you can create more QR Codes for them in the future.

Know more about [customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md).

### Add a Custom Brand Name to Your QR Codes

You can increase your brand outreach using QR Codes by customising your brand name. Customers who scan the QR Code will see your custom Business Name after they make the payment. Know more about how you can add a [brand name and logo](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-styling.md#brand-name-and-logo) from the Dashboard.

## View Payments

The payments received on QR Codes appear on the **Payments** tab.

To view payments made for QR Codes:

1. Click **Payments**.
2. Select the **Payment Id** from the list.
     ![List of payments made via QR codes on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-payment.jpg.md)
3. The payment details appear in the right pane. You can perform the following operations from this tab:
    1. **Create Transfer**: Transfer the payment to a linked account. Know more about [Route](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route.md).
    2. **Create Refund**: Refund the payment to the customer. Know more about [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md).
     ![Create a transfer or a refund for a payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-create-payment-details.jpg.md)

## What Next
Once you have created the QR Code, you can share the short URL with the customer. You can also print or download it and send the image. You can also choose to [close the QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/close.md).

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> The position of the Business name on the scanned screen will depend on the PSP app.
> 

### Related information
- [QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes.md)
- [How QR Codes Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/how-it-works.md)
- [Search a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/search.md)
- [Close a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/close.md)
