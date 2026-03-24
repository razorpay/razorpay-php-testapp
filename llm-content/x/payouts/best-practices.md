---
title: RazorpayX Payouts Best Practices
heading: Payouts Best Practices
description: Check the best practices when integrating RazorpayX payouts.
---

# Payouts Best Practices

The following table lists the best practices for integrating RazorpayX payouts:

Guideline | Description
---
[Types of Payout API](#types-of-payout-apis) | Select how you want to create payouts using APIs.
---
[API guidelines](#api-guidelines) | Guidelines to follow when making API calls.
---
[API key guidelines](#api-key-guidelines) | Save and manage your API keys.
---
[Payout states](#payout-states) | Best way to check the payout state.
---
[Payout Status Details](#payout-status-details) | Provides additional details about each payouts' status.
---
[Fund account validation](#fund-account-validation) | Ensure payouts are never made to the wrong account.
---
[Workflows](#workflows) | Reduce human error when creating payouts.
---
[Intelligent Payouts](#intelligent-payouts) | Enhances the overall payout success rate.
---
[Low balance alerts](#low-balance-alerts) | Get notified when your RazorpayX account balance drops below a set threshold.
---
[Queued payouts](#queued-payouts) | Ensure payouts do not fail due to insufficient balance in your RazorpayX account.
---
[Handling 5XX Errors & Idempotency](#handling-5xx-errors-and-idempotency) | Handle 5XX Errors efficiently. Safely retry the same request multiple times without fear of performing the same action more than once.
---
[IP Allowlisting](#ip-allowlisting) | Add a layer of security by ensuring API calls are only made from allowlisted IPs.

## API Guidelines

Guidelines to follow while making API calls:

- All the API calls have to be server-to-server calls. API calls made from an Android application or website frontend will fail.
- Ensure all the calls are made within a range of 5-10 transactions per sec (TPS).
- Pass your RazorpayX bank account number against the `account_number` parameter in the Payout API/Composite Payout API.
    - **DO NOT** pass your beneficiary account number here. The payout will fail.
    - Use your customer identifier to make payouts from RazorpayX Lite.
    - Use your current account number to make payouts from your RazorpayX powered Current Account.
    - Navigate to **My Account and Settings** → **Banking** to get your RazorpayX bank account number.
- We recommend using your internal `transaction_id` as the `reference_id` value in a Payout API request.
- In some cases, a webhook can be triggered more than once. We recommend you to apply deduplication while consuming webhooks based on the Payout ID and the payout status.

### API Key Guidelines

- Ensure that your API key, that is the `` and ``, is not publicly available. Limited people should have access to this. We recommend you store them as environment variables.
- Ensure you download and save your API key when you generate them. We do not store these at our end. If you lose them, you will have to regenerate your API key.
- The API keys are the same for Payment Gateway and RazorpayX. Regenerating the keys will affect both PG and Payout APIs.

### Types of Payout APIs
There are two types of APIs to create payouts.

- Normal Payout API
- Composite Payout API

#### Normal Payout API

You can use Normal Payout API to:
1. Create a [Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/create.md). You receive a Contact id in the response.
1. Create a Fund account using the Contact id. The Fund account can be a [bank account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts/create/bank-account.md) or [VPA](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts/create/vpa.md).
1. Create a Payout to [bank account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts/create/bank-account.md) or [VPA](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts/create/vpa.md) using the Fund account id.

#### Composite Payout API

You can use the Composite Payout API to create a Contact, Fund account and payout in a single API call.

## Payout States

- After a payout is created, a payout can remain in the **processing** state for T+3 working days, where **T** is the transaction time. From the **processing** state, a payout can move to the **processed** or **reversed** state.
- It is possible for a payout in the **processed** state to move to the **reversed** state. This can happen in a maximum time of T+3 working days. This happens in very rare occasions.

Know more about [payout states and life cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle.md).

### Payout Status Details

[Status details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md) are sent as part of the fetch payout API response and webhook payloads. It provides additional details about each payout status. A payout update webhook is sent every time an attribute in status details changes.

#### Check Payout Status

- API calls are asynchronous. We **DO NOT** recommend using the Fetch Payout API to check the status of the payouts. 
- We recommend subscribing to our [webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/x/apis/subscribe.md) to get instant notifications. Webhooks are triggered whenever there is a change in the status of the payout. You can update your database using the webhook payload.

## Others Guidelines

### Fund Account Validation

Always validate your customer's Fund account to ensure it is the account number where your user wants to receive the amount. Know more about [Fund account validation](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/account-validation.md). 

> **WARN**
>
> 
> **Watch Out!**
> 
> If your user provides an account number by mistake which is not where the user wants the amount, the payout gets processed if the account number exists. Hence, we recommend you to validate the Fund accounts before making a payout.
> 

### Workflows

We recommend that you enable workflows on your account. This allows you to set up a maker-checker process. You can have 1 person create a payout and save it as a draft. Next, you can have someone from the financial team check the payouts before they are processed. Know more about [RazorpayX Maker-Checker](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md).

### Intelligent Payouts

Intelligent Payouts automatically detects the degradation of beneficiary bank or NPCI and queues the payout in the system for a pre-defined SLA, thereby reducing the chances of payouts being [deemed success](https://razorpay.com/blog/business-banking/payout-processing-imps-upi-transactions-deemed-success-npci/), preventing money from getting blocked for T+3 days. 

This feature is enabled by default. You just have to consume the `payout.failed` event to utilise this feature. Know more about [Intelligent Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/intelligent-payouts.md).

### Low Balance Alerts

We recommend that you set low balance alerts on your RazorpayX account. Once set, we will notify you when your RazorpayX account balance drops below the set threshold. Know more about [Low balance alerts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/#low-balance-email-alerts.md).

### Queued Payouts

If your RazorpayX account does not have sufficient funds to process a payout, the payout fails.

To avoid such scenarios, we recommend passing `queue_if_low_balance: true` in the Payout API request. When you pass the parameter, if you do not have sufficient balance to process the payout, the payout is queued instead of failing. The queued payouts are automatically processed when you add funds to your RazorpayX account. Know more about [Queued Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/queued.md).

### Handling 5XX Errors and Idempotency

We recommend you ensure your payout API requests are idempotent. Idempotency allows you to safely retry or send the same request multiple times without fear of performing the same action more than once. Know more about [RazorpayX Idempotency](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> [Idempotency key](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) is mandatory to make a successful payout.
> 

**Example**

You made a request, but were unable to read/save the response sent by Razorpay. In such cases, you make another payout request. Assuming the first request was successful, your account will be debited twice. Making your payout requests idempotent helps you avoid such scenarios. 

To make a request idempotent: 
1. Add the header `X-Payout-Idempotency` to the request and pass an idempotency key against it. When a payout request is idempotent, you can make the same call multiple times, but the amount will be deducted only once. 
2. If a duplicate request is found with the same idempotency key, we return the payout's latest state.

Know more about [Handling 5XX Errors](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x#handling-5xx-errors.md) and [Idempotency](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md).

### IP Allowlisting

It is mandatory to [get your IP address allowlisted](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md). This means we will process the API calls made from the allowlisted IPs only.

### Related Information

- [About Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md)
- [Payout Life Cycle and States](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle.md)
- [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
