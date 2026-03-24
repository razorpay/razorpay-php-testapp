---
title: RazorpayX Payroll Integration with RazorpayX - Current Account
heading: Integrate with Current Account
description: Integrate RazorpayX Payroll with RazorpayX powered Current Account for easier transactions.
---

# Integrate with Current Account

You can integrate your RazorpayX powered Current Account  with Payroll integration to make transactions and reconciliation easier.  

Here's a rewritten version that removes the invite-basis requirement:

RazorpayX powered Current Account integration is available for all eligible customers. To enable the integration, [contact support](mailto:Payroll@razorpay.com) and our Payroll team will assist with setting up the integration from our end.

## Prerequisites

- You must have a [RazorpayX - Current Account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/current-account.md).
- Share your Razorpay MID when you request for the integration. You can find this on the [RazorpayX Dashboard](https://x.razorpay.com/auth) on the top-right corner under **Profile**.
    ![RazorpayX Dashboard- Profile](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payroll-ca-int-profile-dashboard.jpg.md)

- There should not be any `Pending` transactions in the ledger for your organization (**Reports** → **Ledger**). You cannot integrate if there are pending transactions. 
- There should be no balance in your Payroll account before integration. 
    - If there is any balance, add the Current Account as a [Contractor](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/administrator#differences-between-employee-and-contractor.md) and [transfer funds](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/payroll-payouts#transfer-funds.md) to this account. 
    - Select **Reimbursement** / **No TDS** for the transfer.

 
## Points To Remember

The integration process is easy and does not require much effort. However, there are a few things to keep in mind before you request for the integration. They are listed as follows: 

### Approval Workflows

Approval Workflows or maker-checkers in RazorpayX provide different permissions to the team members. As such, you might have **Transactions Pending for Approval** on the Payroll Dashboard.

- If you have [approval workflows (maker-checker)](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) enabled on your RazorpayX account, the same is applicable to all transactions originating from Payroll by default.
- The transactions made in Payroll (salary, contractor payments, reimbursements, advance salaries, and compliance payments) follow the Approval Workflow (in terms of both amount and approvers) that you have set up on RazorpayX. 
- These transactions are not executed until they are approved from the [RazorpayX Dashboard](https://x.razorpay.com/auth). 

Watch this video to know more about the approval process on RazorpayX.

![X Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payroll-approval-workflow.gif.md)

[Contact support](mailto:Payroll@razorpay.com) if you wish to remove the approval workflow functionality for payouts happening via Payroll.

### Visibility Of Transactions On RazorpayX Dashboard

With the integration, all your transactions will happen via your RazorpayX account. These are visible on the RazorpayX Dashboard under **Payouts** and **Account Statements**.
- Every user who has access to your RazorpayX account can view the transactions that originate from Payroll on the RazorpayX Dashboard.
- All transactions, like salary transfers, contractor payments, reimbursements, salary advances and compliance payments, among others, are visible on the RazorpayX Dashboard.

## Post Integration

Once your RazorpayX powered Current Account is integrated with Payroll:

- Your RBL Current Account balance replaces the Payroll Account on the Payroll Dashboard, as shown.  
    ![Payroll Account Balance](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payroll-ca-int-acc-balance.jpg.md)

    You will see the balance of the current account.

- Your Payroll Account becomes non-functional. 
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Do not transfer any funds to your Payroll account after the integration since you cannot access this account.
>     

- All your transactions and payments from Payroll will now happen from your Current Account.
- For your employees, your company name reflects on the bank transfer narrations. 
- You do not have to transfer funds between multiple accounts.

## Remove Integration

You can choose to remove the integration between Payroll and RazorpayX powered Current Account.

> **WARN**
>
> 
> **Watch Out!**
> 
> The integration can be disconnected only when there are no `Pending` transactions in your Payroll account. If there are `Pending` transactions, then wait to clear them before disconnecting the accounts. 
> 

[Contact support](mailto:Payroll@razorpay.com) to disconnect the integration.

### Related Information

- [RazorpayX - Current Account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/current-account.md)
- [Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) 
- [Integrations](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/integrations.md)
