---
title: Fund Accounts on RazorpayX
heading: About Fund Accounts
description: Create, Update and View Fund Accounts on the RazorpayX Dashboard.
---

# About Fund Accounts

Fund accounts are accounts associated with a [Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md) (similar to a *beneficiary* in your netbanking portal).
- To make a payout to a Contact, you must add a Fund Account to the Contact. 
- There is no limitation to the number of Fund accounts a Contact can have.

## Fund Account Types

Fund accounts are associated with a Contact. Payouts are made to the Fund accounts. There are three types of fund accounts:

- **Bank account**: Make payouts to a beneficiary's bank account via bank transfer using one of the available such as NEFT or IMPS.
- **UPI ID (VPA)**: Make payouts to a beneficiary's UPI ID via a UPI transfer.
- **Cards**: Know more about [Payouts to Cards](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts-cards.md).
    - **Credit Card**: Make payouts directly to a beneficiary's credit card by bank transfer using NEFT or IMPS.
    - **Debit Card or Prepaid Card**: Make payouts directly to a beneficiary's debit card or prepaid card using the 'card' mode.
- **Wallet**: Make payouts to your beneficiary's wallet. You can make payouts to a beneficiary via an Amazon Pay gift card. Know more about [Payouts to Amazon Pay Wallet](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-wallet.md).

Know about the [payout modes available for each Fund account type](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts#payout-modes-and-tat.md) and the [ list of banks/cards supported](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/cards/#banks.md).

## Fund Account Actions

The following table lists down the actions that can be performed on Fund accounts using APIs, Dashboard and Bulk Upload:

Action | API | Dashboard | Bulk Upload
---
Create a fund account | ✓ | ✓ | ✓
---
View fund account details | ✓ | ✓ | ✓
---
Mark as inactive | ✓ | ✓ | x

You can create Fund accounts using APIs either with [bank account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts/create/bank-account.md) details or [VPA](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts/create/vpa.md), or [create contacts in bulk](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts/bulk-uploads.md).

## Dashboard Actions

After logging in to your RazorpayX account, you can start creating a contact and its associated fund account. Refer below for steps on how to create a contact with a fund account, and how to update it.

### Create a Contact with Fund Account 

To create a Contact with Fund Account from the Dashboard:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **Contacts**.
3. Click **+ CONTACT**.
4. Fill Contact details and click **NEXT**.
5. Add Fund Account details.
6. Click **SAVE AND CLOSE**.

### Add New Fund Account

To add a new Fund Account to an existing Contact from the Dashboard:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **Contacts**.
3. Select the Contact you want to edit.
4. Click **ADD FUND ACCOUNT**.
5. Add the Fund Account details.
6. Click **SAVE AND CLOSE**.

You can also [create and update Fund Account using APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts/#list-of-endpoints.md). 

### Next Steps

- [Fund Account Validation](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-account-validation.md)

### Related Information

- [Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md)
- [Contacts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md)
- [Fund Account APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts/api.md)
