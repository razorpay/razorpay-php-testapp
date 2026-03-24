---
title: Manual TDS on RazorpayX
heading: Manual TDS
description: Check how manual TDS payments work, how to make them and the various TDS categories.
---

# Manual TDS

Tax Deducted at Source (TDS) is mandated by the government. You can upload TDS data to [RazorpayX Tax Payments](https://x.razorpay.com/tax-payments) and make payments. You can set up an automated method to pay taxes. Know more about [Automatic TDS payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments/automatic-tds.md).

However, you can also choose to make manual payments before the due date. Take a look at the [advantages of using RazorpayX Tax Payments](#advantages) to make manual TDS payments.  

## Advantages

Following are the advantages of using RazorpayX Tax Payments to pay your taxes manually:

- RazorpayX automatically populates data such as TAN and address. This avoids data entry errors.
- You can save your work and edit it at a later time.
- You enter the data now and make TDS payments at a later date.
- You can make one-click payments. No need to enter your bank details for each TDS payment.
- CIN and CRN numbers are available on the Dashboard after the payment.
- It saves your time and effort.

> **WARN**
>
> 
> **Watch Out!**
> 
> - We have moved to TIN 2.0, in effect from 1st November, 2022. 
> - Challans are **not** available on the RazorpayX Dashboard. To download challans, visit [https://www.incometax.gov.in/iec/foportal/](https://www.incometax.gov.in/iec/foportal/) and log in to your account. 
>    1. Go to **e-File** → **E-Pay Tax** → **Payment History**. 

>    2. Under the **Actions** tab, click on the 3 dot menu for the challan you want, and click **Download**.
> - If you do not have an existing account, follow [these steps](https://www.incometax.gov.in/iec/foportal/help/taxdeductor/registration) to register.
> 

## How it Works

1. You manually input the TDS details on RazorpayX Tax Payments.
1. Enter the payment details such as the RazorpayX account from which money will be deducted, that is, either RazorpayX Lite or your Current Account.
1. You can either:
    - Save the payment and pay it at a later time.
    - Make the payment immediately.
1. After you make the payment, it follows the [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) set on your RazorpayX account.
1. Once the TDS is successfully paid, you can download the challan from the [income tax portal](https://www.incometax.gov.in/iec/foportal/).
1. You can download the challan and file the TDS as per your convenience.

## Manual TDS Actions in RazorpayX

In your RazorpayX Dashboard, you can perform the following actions to manually pay your TDS. 

### Set Up 

To set up the tax payments, we will need a few details, such as your TAN number and business address. 

To set up tax payments:
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
1. Navigate to **Menu** → **Tax Payments**.
1. Click **Setup Tax Payments** and enter the required details such as TAN number and business address and click **Continue**.

### Change Details

You can change your TAN and business address details from the RazorpayX Dashboard. 

To change details:
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/vendor-payments).
1. Navigate to **Menu** → **My Account & Settings** → **Business Profile**.
1. Click **EDIT DETAILS** in the **TAX DETAILS** section to edit your TAN and business address details.

### Mark As Paid

There is a possibility that you paid TDS using some other method. In such cases, you can mark a TDS payment as paid from the [RazorpayX Dashboard](https://x.razorpay.com/vendor-payments).

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can only mark a TDS payment as **paid** after the 1st of the following month.
> - You need to pay if there is any Late Fees.
> 

## TDS Fields

Following are the various fields you have to fill when uploading TDS data to the RazorpayX Tax Payment app:

Field | Description
---
Tax Applicable | - Company Deductees (0020): When TDS is deducted against businesses - if the vendor is a business or a registered company
-  Non-Company Deductees (0021): When TDS is deducted against individuals, if the vendor is a contractor or an individual.

---
Tax Type (TDS/TCS) | - (200) TDS/TCS Payable by Taxpayer: Selected if the TDS/ TCS is a regular transaction.
-  (400) TDS/TCS Regular Assessment: Selected if the payment is being made for a demand raised by the income tax authorities.

---
Tax Category | When TDS is deducted, it is deducted based on the selected TDS code. Know more about [TDS Categories](#tds-categories).
---
Assessment Year | Assessment year when the TDS should be considered for income tax returns.
---
Tax Amount | TDS to be paid to the government before the addition of late fees and penalties.
---
Interest | Interest amount to be paid if TDS is deducted, but not paid within the due date.
---
Surcharge | Surcharge to be paid by the business if TDS is not paid for the whole quarter. Surcharge depends on the turnover of the company.
---
Educational Cess | Educational cess is levied by the government on income tax.
---
Fee | As per section 234E, where a person fails to file the TDS/TCS return on or before the due date
---
Penalty | Penalty to be paid if the business does not deduct TDS on a payment.
---
Penalty Payment Code | - 11C - All penalties under section 271(1)(c). 
-  N11C - All penalties other than section 271(1)(c).

---
Others | Any other fee, penalties or amount to be paid.
---
Total Amount | Total amount to be paid to the government with late fees and penalties.

## TDS Categories

Download the TDS categories and rates available to you.

> **INFO**
>
> 
> **Handy Tips**
> 
> The TDS rates are subject to change as per government guidelines. Refer to the [income tax website](https://www.incometax.gov.in/iec/foportal/) for the latest TDS updates.
> 

### Related Information

- [Tax Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments.md)
- [Advance Tax Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments/advance.md)
- [Goods and Services Tax (GST)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments/gst.md)
