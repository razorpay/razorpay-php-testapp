---
title: How QR Codes Work
description: Create and share QR Codes to receive payments. Track payments and generate reports.
---

# How QR Codes Work

Given below is a complete end-to-end flow about how you can use QR Codes to accept payments.

![QR Codes Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/qr-codes-flow.jpg.md)

## QR Codes Workflow

To accept payments using Razorpay QR Codes:

  - **1. Create a QR Code**: Create a QR Code that you can share with your customers to accept payments.

 - **2. Share the QR Code**: Print or download the QR Code to share with your customers to accept payments.

  - **3. Receive Payments**: Receive payments after your customer scans the QR Codes and makes payments.

 - **4. Track QR Code Payments and Reports**: Receive notifications, check payments and view reports for QR Code payments.

### 1. Create a QR Code

[Create a QR Code](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/create.md) by providing all the required details. You can set a close by date and enable multiple payments.

The QR Code is in `active` status. Know more about [QR Code states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/states.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> You can close a QR Code from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/close.md) or with the [Close a QR Code API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/qr-codes#close-a-qr-code.md).
> 
> 

### 2. Share the QR Code

Print and download the QR Code to share it with the customers. Customers can scan the code and complete the payment using their preferred UPI PSP apps. Check the [supported UPI apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/#supported-upi-apps.md).

### 3. Receive Payments

Customer scans the QR Code with their UPI PSP app and completes the payment. They can make multiple payments if the option was enabled at the time of QR creation. You receive a notification about the payment.

> **INFO**
>
> 
> **Handy Tips**
> 
> After the payment is captured, the amount is settled to your account as per the settlement schedule. Know more about [payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments.md), [settlements](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements.md), [ refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds.md) and [disputes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/disputes.md).
> 

### 4. Track QR Code Payments and Reports

- Notifications: Receive notifications regarding activity on QR Code via email and webhooks. Know more about [subscribing to QR Code webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/subscribe-to-webhooks.md).
- Track Payments: Track payments made using the QR Code on the Dashboard. Click **QR Codes** from the left menu and select **Payments**. All the payments received on your QR Codes are listed with their status.
- Reports: Gain detailed insights using reports and real-time data on the Dashboard. These reports can then be used for accounting and reconciliation purposes. Know more about [reports](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/reports.md).

### Related Information

- [QR Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes.md)
- [QR Codes States](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/states.md)
- [Create a QR Code](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/create.md)
- [Subscribe to QR Code Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/subscribe-to-webhooks.md)
- [QR Codes APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/apis.md)
