---
title: RazorpayX Test Mode
heading: Test Mode
description: Use test mode to test your integration, add funds, view fund details and execute a list of APIs.
---

# Test Mode

RazorpayX test mode is a replica of RazorpayX in a sandbox environment that allows you to test your integration before you switch to Live Mode.

You can perform the following actions to get started with RazorpayX Test Mode.
- [Switch to test mode](#switch-to-test-mode)
- [Generate API Keys in test mode](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/api-keys/#test-mode.md).
- [Add funds in the test mode](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode/#add-funds.md).
- [Payout Actions that can be performed in the Test Mode](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode#actions.md).

You can test the following using the Test Mode:

Feature | API | Dashboard | Bulk Upload
---
[Contacts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode/#contacts.md) | ✓ | ✓ | ✓
---
[Fund accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode/#fund-accounts.md) | ✓ | ✓ | ✓
---
[Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode/#payouts.md) | ✓ | ✓ | ✓
---
[Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode/#webhooks.md) | ✓ | ✓ | ✓

> **INFO**
>
> 
> **Handy Tips**
> 
> - Actions taken in the test mode have no consequences in your live environment. 
> - Contacts, Fund accounts and Payouts created in the Test Mode do not appear in the live environment. 
> - You can create Contacts and Fund accounts using real-world or dummy data.
> - Test Mode has its own dummy balance. **No real money is used in the Test Mode**.
> For example, a Contact created in the test mode does not carry over to the live mode and vice versa. Payouts made to a Fund account in the Test Mode uses funds from the test account balance, which is not real money.
> 

## Switch to Test Mode
Click on the user profile icon to switch to test mode. 

![Enable Test Mode](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rzpx-switch-to-test-mode.jpg.md)

### Add Funds

Just like in the live environment, you must add funds in the test mode before you can make payouts. Test mode uses its own dummy balance. You can type in any random amount as dummy balance. **No real money is used in the test mode.**

To add funds to your test mode, click **+ Add test balance** and follow the on-screen instructions.

![Add Test Balance from the RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-test-balance.gif.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The account details in the test mode are dummy details. Do not load real money to this account.
> 

### Contacts

To make a payout, you need to create a Contact. 
The table below lists the various Contact actions you can perform in the test mode:

Action | API | Dashboard | Bulk Upload
---
Create a contact | ✓ | ✓ | ✓
---
Update a contact | ✓ | ✓ | x
---
View contact details | ✓ | ✓ | x
---
Mark as inactive | ✓ | ✓ | x

You can [create Contacts using APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/create.md) and [create Contacts in bulk](@/Applications/MAMP/htdocs/new-docs/llm-content/x/bulk-payouts/#create-bulk-payout.md).

### Fund Accounts

After you create a Contact, you need to create a Fund account for the Contact. You can create Fund accounts in test mode by using contacts created in test mode only. Payouts are made to the Fund account linked to the Contact.

The table below lists the various Fund account actions you can perform in the test mode.

Action | API | Dashboard | Bulk Upload
---
Create a fund account | ✓ | ✓ | ✓
---
View fund account details | ✓ | ✓ | ✓
---
Mark as inactive | ✓ | ✓ | x

You can create Fund accounts using APIs with either [bank account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts/create/bank-account.md) details or [VPA](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts/create/vpa.md) and 
[create contacts in bulk](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts/bulk-uploads.md).

### Payouts

Payouts are transactions you can make to the fund accounts of your contacts. You can test payouts in the Test Mode, view its life cycle, its states and other details.

> **WARN**
>
> 
> **Watch Out!**
> 
> The [Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) is not available in the test mode. This means the `pending` and `rejected` states are not available in the test mode.
> 

#### Actions

The table below lists the various payout actions you can perform in the test mode.

Action | API | Dashboard | Bulk Upload
---
Create a payout | ✓ | ✓ | ✓
---
View payout details | ✓ | ✓ | x

You can [create contacts using APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts.md) and [create contacts in bulk](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts/bulk-uploads.md).

### Move a Payout to Next State

By default, Payouts created in the Test Mode acquire the `processing` state. However, if you do not have sufficient balance, the payout acquires the `queued` state. In this case, [add funds](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode/#add-funds.md) to move the payout to the `processing` state.

From the `processing` state, you will have to manually move the payout to the next state from the Dashboard. You can move it forward to any state in the payout lifecycle. Unlike the Live Mode, this does not happen automatically.

![Manually move a payout to the next state in test mode](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/change-payout-status.gif.md)

### Account Statements

The Test Mode has its own account statement based on transactions made in the Test Mode. You can view the account statement on the RazorpayX Dashboard or fetch details using the [Transaction APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/transactions.md).

## Webhooks

Know about [webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md), how to [set up and also edit them](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md). 

The following webhook events are available in the test mode:
- `payout.queued`
- `payout.initiated`
- `payout.processed`
- `payout.reversed`
- `transaction.created`

Find a more detailed list of [sample payloads available in RazorpayX](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).

### Related Information

- [About RazorpayX](@/Applications/MAMP/htdocs/new-docs/llm-content/x.md)
- [Set up your RazorpayX account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/set-up.md)
- [Generate API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/api-keys.md)
