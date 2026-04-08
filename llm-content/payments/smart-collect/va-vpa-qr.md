---
title: Razorpay Smart Collect
description: Learn about Razorpay Smart Collect with which you can create virtual bank accounts, UPI IDs and QR Codes on-demand, for customers to pay via NEFT, RTGS, IMPS and UPI.
---

# Razorpay Smart Collect

For years, businesses have been collecting large payments from customers in the form of bank transfers. Collecting is easy, but reconciling payments is a tough task as it is prone to human errors and increases administrative costs.

Using Razorpay Smart Collect, you can generate virtual bank accounts, virtual payment addresses (UPI IDs) and QR code on-demand and share the details with customers to accept payments via NEFT, RTGS, IMPS and UPI. These virtual bank accounts, UPI IDs and QR codes are linked to the bank account you have registered with Razorpay.

Since a new virtual bank account, UPI ID or QR code can be created for each customer, you can easily track payments made by them. Razorpay notifies you of payments made to any of your accounts, UPI IDs or QR codes and also handles the complexity of reconciling these payments on your behalf.

![](/docs/assets/images/smart-collect-smart-collect-flow1.jpg)

> **INFO**
>
> 
> **Note**
> 
> Payments made using Smart Collect largely follow existing Razorpay [payment flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md). If you are new to Razorpay, it is recommended to understand this flow before you proceed to read the document.
> 

## Advantages

- **Instant Creation**

    Generate virtual bank accounts, virtual UPI IDs and QR code tagged to individual customers in **real-time** via  Dashboard and APIs.

-  **Personalization** 

    Create custom UPI IDs to match your business need and branding. For example, `rpy.acmecellno8449472988@icici` and `rpy.acmevendorakashkumar@icici`.

- **Multiple Payment Avenues** 

    Enable customers to make payments via NEFT, RTGS, IMPS and QR Code UPI.

- **Automatic Reconciliation** 

    Eliminate the difficulty of manual reconciliation and save time and cost.

- **Account-level Visibility** 

    View and manage every payment received from customers.

- **Real-time Notifications** 

    Get real-time notifications on payments with Webhooks.

## Use Cases

Here are some examples of how Smart Collect enables you to accept payments.
- **Single, large one-time payments**

    If you want to accept a single, large one-time payment from a customer (preferably via NEFT, RTGS, IMPS or UPI), you can create a virtual bank account, UPI ID or QR code and share the generated account details (account number and IFSC), UPI ID or QR code. When the customer makes the payment, Razorpay notifies you so that the account can be closed.

- **Regular payments of large volume**

    If you want to send customers regular invoices for payments of large volume, you can create a virtual bank account, UPI ID or QR code for them and share the details. Customer:
    - Adds the bank account as a beneficiary on their preferred netbanking portal and transfers the money using NEFT, RTGS or IMPS
    - Adds the UPI ID on their UPI payment service provider app such as Google Pay and transfers the money using UPI.
    Razorpay notifies you every time a payment is made towards the account, thus simplifying the reconciliation process
    - Scans the QR code to make the payments.

- **Campaign or event-based payment**

    If you want to accept several payments from multiple sources for a range of campaigns or events, you can use Smart Collect to create a virtual bank account, UPI ID or QR code for each campaign and share details accordingly. For every payment made towards any of these accounts, UPI ID or QR code, Razorpay notifies you of the account, UPI ID or QR code used, thus eliminating the need to identify which campaign the payment was made for.

## How Smart Collect Works

1. Sign up for a Razorpay Account.
2. You create virtual bank accounts, virtual UPI IDs or QR code tagged to the customer.
3. Share account details (such as account number, IFSC and Name), UPI ID or QR code with the customer.
4. Customer:
    - Adds the bank account as a beneficiary on their preferred netbanking portal and transfers the money using NEFT, RTGS or IMPS
    - Adds the UPI ID on their UPI payment service provider app, such as Google Pay and transfers the money using UPI.
    - Scans the QR code to make the payments.
5. Payment deposited in these Virtual Accountss, UPI ID or QR code is settled into your bank account linked with Razorpay.

> **INFO**
>
> 
> **Payment Confirmation**
> 
> You can consider a payment to be successful only when you receive the notification from Razorpay. You can check the [payment status on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/dashboard/create.md#view-payments). Also, you can choose to configure [webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/notification.md) and subscribe to the `virtual_account.credited` event to receive notifications when customers make payments.
> 

![](/docs/assets/images/smart-collect-sc_workflow1.jpg)

## Virtual Accounts Format

Using Razorpay Smart Collect, you can create a unique virtual bank account number, UPI ID or QR code to be shared with your customers. The structure and components of these are explained below.

### Virtual Bank Account Number

The virtual bank account number consists of 16 digits.

```
Bank Account Number: 1112220040042526
```

### Virtual UPI ID

A UPI ID comprises of the following:
- Username

    The username comprises of the prefix, the merchant identifier and the descriptor. For example,`rpy.payto00000gaurikumari@icici` consists of:
    - Prefix  

    Static information. Value is `rpy`.
    - Merchant Prefix  
`payto00000` is the standard merchant prefix. You can opt for a custom, 4-10 character merchant prefix as per your brand requirements. For example, `acmevendor`. Contact [Razorpay Support](https://razorpay.com/support) to get this configured for your Razorpay account.
    - Descriptor  

    10-16 character unique identifier of your customer provided by you. For example, `gaurikumari`.
- Handle

    The name of the partner bank. For example, `@icici`.

![](/docs/assets/images/smart-collect-upiid_components.jpg)

> **SUCCESS**
>
> 
> **Merchant Identifier + Descriptor**
> 
> The combination of merchant identifier and custom descriptor **must be exactly 20 characters**. Special characters are not allowed in merchant identifier or descriptor.
> 

> **INFO**
>
> 
> **Note**
> 
> Razorpay will auto-generate the descriptor if it is not provided at the time of Virtual Accounts creation.
> 

### QR Code

Create Virtual Accounts API request, send the `receivers.types` as `qr_code`. From the API response, open the `short_url` in the browser to download the QR code for your account and share it with your customers.

![](/docs/assets/images/smart-collect-QrCode.jpeg)

## Life Cycle

There are two possible statuses for a Virtual Accounts: `active` and `closed`.

## Active

When first created via [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/dashboard/create.md) or [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/create.md), a Virtual Accounts is said to be in the `active` status. That is, it is ready to accept payments.

## Closed

A Virtual Accounts can be closed in two ways:
- Automatically, by using the `close_by` option at the time of Virtual Accounts creation, via [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/dashboard/create.md) or [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/create.md).
- Manually, from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/dashboard/close.md) or using the [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/close.md).

Once the account is in `closed` state, customers cannot make payments to that account.

 See [API Endpoints](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api.md) for more details.
