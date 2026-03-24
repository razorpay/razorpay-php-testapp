---
title: Set up Platform and Third-Party Accounts | Technology Partners
heading: Set up Platform and Third-Party Accounts
description: Set up platform and third-party accounts and collect fees from customers.
---

# Set up Platform and Third-Party Accounts

To transfer funds to various third parties, sub-merchants, bank accounts or vendors, you need to add them as Linked Accounts.

You can create Linked Accounts using [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/linked-account#add-and-manage-linked-accounts.md) and [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route.md).

When you add a Linked Account, you gain complete visibility and control of all the fund movements such as transfers, reversals and refunds for each of your Linked Accounts.

Every Linked Account has a unique `account_id` which should be stored in your database. This ID should be sent in the various APIs described in other sections to identify the Linked Account.

> **WARN**
>
> 
> **Watch Out!**
> 
> After being added, the Linked Account gets activated immediately and funds can be transferred right away. However, it takes 2 working days for Linked Account settlements, irrespective of your settlement schedule.
> 

## Penny Testing

To avoid settlement failure, we will penny test Linked Accounts when added. Razorpay will transfer a nominal amount to the bank account details submitted to verify them. Transfers are allowed only on successful validation. This will be performed on the newly created Linked Accounts and the existing accounts when the bank account details are updated via the Dashboard.

Know more about [penny testing](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/faqs/#penny-testing.md).

## Required Details

We collect the following details while adding the account:

`Primary details`
: - Linked Account name
 - Contact number

`Bank details`
: - Account number
 - Account type
 - IFSC
 - Beneficiary name

## Add and Manage Linked Accounts

Watch this video to see how to add Linked Accounts.

[Video: https://www.youtube.com/embed/aLLI9UwNMl0?si=59o-Z7p8Z2gdvhl8]

> **WARN**
>
> 
> **Watch Out!**
> 
> For Mutual Funds Distributors (MFDs), Linked Accounts with their Asset Management Company (AMC) details are automatically created after they get access to the Route. MFDs do not need to create any Linked Accounts from the Dashboard. Please get in touch with our [support team](https://razorpay.com/support/) for any help on creating Linked Accounts.
> 

To create a Linked Account:

1. Log in to the Dashboard and click **Route** under **PAYMENT PRODUCTS**.
2. Click **Accounts** tab, and then click **+ Add Account**.

    ![](/docs/assets/images/route-account.jpg)
3. Enter the **Account Name** and **Account Email** in the **Add Account** pop-up page.
4. If you want to enable the Dashboard access for the Linked Account, turn on the toggle bar.
5. Click **Add**.

    ![](/docs/assets/images/route-add-linked-account.jpg)

6.  On the **KYC Form** pop-up page, enter **Business Details** and **Bank Account Details**, and then click **Submit Form**.

    ![](/docs/assets/images/route-add-account-kyc.jpg)

The Linked Account is added successfully.

## Grant Dashboard Access to Linked Accounts

You can grant Dashboard access to your Linked Accounts. The Linked Account can log in to the Dashboard with the email address provided at the onboarding time.

The recipient Linked Account is notified via an email along with a password reset option.

> **WARN**
>
> 
> **Watch Out!**
> 
> - While you can create a Linked Account without adding their email, you cannot grant them Dashboard access. The access can be granted or provided only after you add the email address of the Linked Account.
>   ![](/docs/assets/images/route-la-email.jpg)
> - As a Linked Account user, you cannot access the Linked Account Dashboard unless the primary account owner adds you as a team member from their Linked Account Dashboard.
> 

## Enable Refunds Capability

Due to government regulations, in certain cases, the Linked Accounts need to directly process refunds to customers. You can enable refunds capability while adding a new account.

To enable refunds capability for an existing account:
1. Navigate to the **Accounts** tab.
2. Turn on the **Allow Refunds** toggle against the relevant account.

## Enable Refund Credits

Refund Credits help the Linked Account to process customer refunds from a dedicated funds than using the unsettled balance. You can enable Refund Credits for a Linked Account by sending an email to your Razorpay account manager with these details:
- Linked account name
- Email ID
- Balance type (Refund Credit)

## Related Information

- [Process Platform and Third-Party Fees](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/control-of-funds/process-fees.md)
- [Refunds and Reversals](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/control-of-funds/refunds-and-reversals.md)
