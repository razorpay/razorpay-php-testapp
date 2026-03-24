---
title: RazorpayX | Source Account Validation
heading: Source Account Validation
description: Validate bank accounts from which you can add funds to your RazorpayX Lite.
---

# Source Account Validation

You can add funds to your RazorpayX Lite through bank transfers. However, you can make these transfers **only through validated bank accounts**.

## Why Should I Validate Bank Accounts

For a safer and secure banking experience on RazorpayX, you need to validate the bank account through which you want to add funds to your RazorpayX Lite. This assures that the funds are flowing in from verified sources only.

## Validation Process

The source account validation process consists of three steps:

1. You add your bank account details on the RazorpayX Dashboard.
2. Razorpay validates these details and notifies you.
3. Once successfully validated, you use these accounts to add funds to your RazorpayX Lite.

### Step 1: Adding Bank Account Details

You need to add the bank account details on the Razorpay Dashboard. You can add a maximum of 5 bank accounts. Only **Owner** and **Admin** users can add bank account details for validation.

To add bank account details:
1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
2. Click **+ Add balance**.
    ![RazorpayX Dashboard. '+ Add balance' is available at the top-middle edge of the screen.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-rzpx-activated-account.jpg.md)
3. Click **+Add Account**.
   ![A pop-up screen from RazorpayX Dashboard after intiating '+ Add balance'. Click '+ Add Account' and then add funds as your account balance.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-add-account.jpg.md)
4. Enter the bank account details:
    1. **Account number**: Account from which you want to add funds. Enter the number again in the field given below.
    2. **IFSC**: The IFSC for the bank account branch.
    3. **Account holder**: Name of the bank account holder.
    4. **Type of account**: Add the account type. For example, `director account` or `own account`.
    5. **Upload Documents**: Upload supporting documents for the account. You can upload either a copy of a cancelled cheque or the account statement.
      ![Account details screen asking for Bank Account details like Account Number, IFSC, Account holder, Type of Account and Upload documents.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-account-details.jpg.md)
5. Click **Submit**.

### Step 2: Razorpay Validates Account Details

Once your account details are saved, a ticket is created. The account approval process can take up to 3 days. You will receive a notification once the validation process is complete. 

Or, you can also check the status of the bank account on your Dashboard:
  1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
  2. Navigate to **Settings** → **Banking**.
Here you will find all the bank accounts that you have validated, and or require validation. 

### Step 3: Add Funds from Validated Accounts

After the account details are validated, you can start adding funds to your RazorpayX Lite.

Know more about [adding funds to RazorpayX Lite](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/razorpayx-lite.md#add-funds).
