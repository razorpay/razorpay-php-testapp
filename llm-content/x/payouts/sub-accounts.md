---
title: Sub-Accounts on RazorpayX
heading: Sub-Accounts
description: Create and manage multiple sub-accounts with a single RazorpayX powered Current Account to manage funds with safety and in compliance.
---

# Sub-Accounts

The purpose of this feature is to allow the **master** account to create and manage multiple **sub**-**accounts** linked to their Current Account. The master can allocate amount limits to each sub-account. Each sub-account has its own RazorpayX Dashboard, API keys and Approval Workflows. Using this feature, businesses can create multiple sub-accounts and manage payouts for multiple use cases via a single bank account. It records the funds and makes reconciliation easier for the master as well as sub-account owners. 

When a sub-account holder initiates a payout, limit on the sub-account is reduced and the money is debited from the master's bank account. The limits assigned to the sub-accounts are static, the master has to reset the limits once the sub-account has exhausted its limit. The master account user can increase this limit anytime.

## Use case

The following is a basic use case for sub-accounts:

### Non-Banking Financial Companies

Non-Banking Financial Companys' (NBFCs) can use this feature to work with multiple Loan Service Provider (LSPs) on a single bank account. NBFCs can provide secure and restricted access to LSPs to enable loan disbursements to their customers and manage their payouts with sufficient checks and balances in place.

In compliance with the [digital lending guidelines](https://rbidocs.rbi.org.in/rdocs/notification/PDFs/GUIDELINESDIGITALLENDINGD5C35A71D8124A0E92AEB940A7D25BB3.PDF), NBFCs can ensure that the loan disbursals flow directly from their account to the borrower's account. However, these disbursals are triggered by the LSP on behalf of the NBFC. For both these steps to work together, the LSP needs access to initiate loan disbursals to their customers.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can [download reports](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard.md#reports) for your sub-accounts and see the real-time limit assigned to them.
> 

## How it Works

Different features are enabled for the **Master Account** and **Sub-Account** respectively. The process is as follows:

### Master Account

To create a master account:

1. [Sign Up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/set-up.md#new-users) on the RazorpayX Dashboard.
2. Open a [Current Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/current-account.md#current-account) using RazorpayX.

The master account functions like any other RazorpayX account. In addition to that, you can view all the linked sub-accounts on your RazorpayX Dashboard home screen.

#### Add Limit to Sub-Accounts

Use the master account to add limit to the sub-account via the Dashboard. To add limit to a sub-account:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Hover over the sub-account for which you want to increase the limit and click on the pencil icon.
	
3. Enter the amount you want to add to the limit and click **Save**.
	
4. Enter the OTP sent to your registered number and email. Click **Submit**.
	

#### View Past Limit of Sub-Accounts

To view the past limits assigned to the different sub-accounts:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Click **Sub-Account Limits** on the left navigation.
3. You can filter the sub-account for which you want to view the limits and choose the appropriate dates if required.
	
4. You can also export the data as `.csv` or `.xlsx`.

### Sub-Account

> **WARN**
>
> 
> **Watch Out!**
> 
> Sub-account holders can only make [Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#how-to-make-payouts). 
> 

The following functions are **not** available for sub-accounts:

- AmazonPay Payouts
- Payouts to Cards via card rails
- Tax Payments
- Payroll

The sub-account Name, Customer Identifier, Merchant ID and Live balance of the sub-accounts are visible to the Master account and the RazorpayX Lite accounts assigned to the sub-accounts get disabled. 

- The master account and sub-account have their own merchant IDs. 
- The master account can track the funds for the sub-accounts. 
- Only the master account can add fund limits to the sub-account.

> **WARN**
>
> 
> **Watch Out!**
> 
> Only users with access to initiate payouts can load funds to sub-accounts.
> 

#### Create a Sub-Account

To create a sub-account:

1. [Sign Up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/set-up.md#new-users) to the RazorpayX Dashboard.
2. Send an email to [x.support@razorpay.com](mailto:x.support@razorpay.com) and the owner of the master account to link your account with theirs.
3. Once the owner of the Master Account has approved and confirmed the debit account details for your account on the same mail, we will link the accounts.

#### Example

The NBFC ***Acme Crop.*** (master account holder) funds FinTech ***Bertie Botts*** (sub-account holder) with ₹1,00,000 via the add limit option.

- FinTech ***Bertie Botts*** lends the fund as follows:
	- ₹20,000 to *Gaurav* 
	- ₹30,000 to *John*
	- ₹40,000 to *Saurabh*
- **Acme Crop.** can view the balance on ***Bertie Botts***’s account (₹10,000).
- The ledger entry is made for ***Gaurav***, ***John*** and ***Saurabh*** for ***Acme Crop.*** as well as ***Bertie Botts***, respectively.
- The actual funds do **not** move from ***Acme Crop.*** to ***Bertie Botts***. The funds are only a limit allocation assigned to the ***Bertie Botts***.
- The actual funds flow directly from ***Acme Crop.*** to ***Gaurav***, ***John*** and ***Saurabh*** respectively.

### Related Information

- [Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md)
- [Current Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/current-account.md)
- [Support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md)
