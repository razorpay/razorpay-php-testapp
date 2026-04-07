---
title: Automatic TDS with RazorpayX
heading: Automatic TDS
description: Explore the merits of setting up automatic TDS payments in RazorpayX.
---

# Automatic TDS

Tax Deducted at Source (TDS) is a deduction mandated by the government. When you upload an invoice to [RazorpayX Vendor Payment Portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md#vendor-portal), you have the option to calculate and deduct tax at source. 

TDS is calculated for all invoices uploaded to RazorpayX Vendor Payments, irrespective of how you have made the payment. This means, TDS is calculated even for invoices that are in `Mark as Paid` state. Explore [when an invoice is marked as paid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md#mark-invoice-as-paid).

## Advantages

Following are the advantages of using RazorpayX Tax Payments to pay your taxes automatically:

- RazorpayX automatically calculates the TDS when you upload an invoice on [RazorpayX Vendor Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md).
- It also automatically enters the TDS data on the Tax Payments application.
- The TDS payments are automatically made before the due date. No need to worry about late fees and penalties.
- You can avoid data entry errors.
- CIN and CRN numbers are available on the Dashboard after the payment.
- It saves you time and effort.

## How it Works

Watch the following video to know about to automated tax payments, or read on.

1. When you create a vendor on the RazorpayX Dashboard, you set a [TDS category](#tds-categories) for the vendor.
1. When you upload an invoice and select the vendor, the TDS component is auto-calculated according to the TDS rate selected for the vendor.
1. When you make a vendor payment, the TDS amount is recorded against the relevant category. The TDS amount is **NOT** deducted from your account balance at this stage.
1. On the 1st of every month, RazorpayX sends a reminder to you, informing of the total TDS you owe on your vendor payments. You must ensure there is sufficient balance in your account to make the tax payments.
1. TDS payment for the previous month will be paid automatically on the **4th of every month**. The TDS amount is deducted from your account balance at this stage.
1. After the TDS is successfully paid, you can download the challan from the [income tax portal](https://www.incometax.gov.in/iec/foportal/). 
1. File the TDS as per your convenience.

> **WARN**
>
> 
> **Watch Out!**
> 
> - RazorpayX Tax Payments **does not file TDS**. It only facilitates monthly payments.
> - We have moved to TIN 2.0, with effect from 1st November, 2022. 
> - Challans are **not** available on the RazorpayX Dashboard. To download challans, visit [https://www.incometax.gov.in/iec/foportal/](https://www.incometax.gov.in/iec/foportal/) and log in to your account. 
>    1. Go to **e-File** → **E-Pay Tax** → **Payment History**. 

>    2. Under the **Actions** tab, click on the 3 dot menu for the challan you want, and click **Download**.
> - If you do not have an existing account, follow [these steps](https://www.incometax.gov.in/iec/foportal/help/taxdeductor/registration) to e-register on the Income Tax Portal.
> 

## Automatic TDS Actions in RazorpayX

In your RazorpayX Dashboard, you can perform the following actions to automate your TDS payments.

> **WARN**
>
> 
> **Watch Out!**
> 
> - RazorpayX automatically creates the tax payment even if the auto TDS setting is disabled. 
> - The actual tax payment is made only when the auto TDS setting is enabled.
> 

### Set Up 

To set up the tax payments, you must provide your business details such as your TAN number and business address. 

To set up tax payments:
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
1. Navigate to **Menu** → **Tax Payments**.
1. Click **Setup TDS Payments** and enter the required details such as TAN number and business address in the pop-up and click **Confirm**.
1. We recommend you to select [**Deduct TDS on Invoice Date**](#deduct-tds-on-invoice-date) under **Setup TDS deduction date**. You can also select [**Deduct TDS on Payment Date**](#deduct-tds-on-payment-date).
1. Click **Enable Auto-Pay**, select the auto-debit account (Razorpay Lite or Current account) and click **Enable Auto-Pay**.
1. Enter the OTP you receive on your registered mobile number and click **Confirm**.

> **WARN**
>
> 
> **Watch Out!**
> 
> In **Automatic** Tax Payments, the default tax applicable is `Non-Company Deductees`. This cannot be changed.
> 

### Change Details

You can change your TAN and business address details from the RazorpayX Dashboard. 

To change the details:
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/vendor-payments).
1. Navigate to **Menu** → **My Account & Settings** → **Business Profile**.
1. Click **EDIT DETAILS** in the **TAX DETAILS** section to edit your TAN and business address details.

> **WARN**
>
> 
> **Watch Out!**
> 
> - If you have chosen to **Deduct TDS on Invoice Date**, editing of the invoice date, amount and TDS is not possible after the 4th of the subsequent month. 
> - The TDS will be deducted based on the invoice date for the invoices created after setting the TDS deduction date to **Deduct TDS on Invoice Date**. The TDS deduction for previous invoices will be done based on the payment date itself.
> 

### Setup TDS Deduction Date

To setup the TDS deduction date:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/vendor-payments).
1. Navigate to **Menu** → **My Account & Settings** → **Business Profile**.
1. Next to **Setup TDS deduction date**, click **CHANGE** under **TAX DETAILS**.
   
1. Select the TDS deduction date as per your requirement. We recommend you to select [**Deduct TDS on Invoice Date**](#deduct-tds-on-invoice-date).
   
1. Click **Save**.

You can also change the TDS deduction date from payment date to invoice date for vendors individually. 

1. Select the vendor you want to make the change in TDS deduction setting.
1. In the right side panel, click **Change**.
   
1. Click **Yes**.
   

### Disable Automatic Tax Payments

You can disable tax payments at any time if you want. To disable automatic tax payments:
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/vendor-payments).
1. Navigate to **Menu** → **My Account & Settings** → **Business Profile**.
1. Use the **Auto-Debit for TDS on Vendor Payment** toggle the **TAX DETAILS** section to disable tax payments.

### Mark As Paid

There is a possibility that you paid TDS using some other method. In such cases, you can mark a TDS payment as paid from the [RazorpayX Dashboard](https://x.razorpay.com/).

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can only mark a TDS payment as **paid** after the 1st of the following month.
> - You need to pay if there is any Late Fees.
> 

Sometimes payments do not go through automatically. It could be because:
- The Partner Bank is facing technical error.
- There are insufficient funds in your account.
- Auto TDS is disabled.

Hence, the amount must be paid manually and updated on the Dashboard. To mark a payment as paid, select the check box against the relevant payment and click **MARK AS PAID** on the top right.

## TDS Categories

Download the TDS categories and rates available to you.

> **INFO**
>
> 
> **Handy Tips**
> 
> The TDS rates are subject to change as per government guidelines. Refer to the [income tax website](https://www.incometax.gov.in/iec/foportal/) for the latest TDS updates.
> 

### TDS Calculation

TDS is calculated on the Invoice Subtotal, that is, the invoice amount without GST, cess and other taxes. 

Assume TDS for a vendor is set to 7.5%. 

Invoice Subtotal = Invoice amount - (GST + Cess + Other Taxes)

Field | Amount
---
Invoice Subtotal | ₹5,000
---
TDS | ₹5,000 x 7.5%
---
TDS to be paid | **₹375**

We calculate the TDS and add it to the running balance of Auto TDS. The time at which TDS gets added to the Auto TDS balance depends on the date of deduction.

#### Example

To understand the difference between the dates of deduction, refer to the examples given below.

#### Deduct TDS on Payment Date

If the invoice is dated 15th December, 2022 and paid on 15th January, 2023; the TDS will be paid after the payment, i.e. 4th February, 2023.

#### Deduct TDS on Invoice Date

If the invoice is dated 15th December, 2022 and paid on 15th January, 2023; the TDS will be paid on 4th January, 2023, based on the date of the invoice, irrespective of when the payment is made.

### Related Information

- [Tax Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments.md)
- [Tax Payment Life Cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments/life-cycle.md)
- [Goods and Services Tax (GST)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments/gst.md)
