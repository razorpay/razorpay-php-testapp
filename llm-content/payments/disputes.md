---
title: About Disputes
description: Create Disputes and Chargebacks from the Razorpay Dashboard. Check the notifications and how disputes are handled for international payments.
---

# About Disputes

A dispute is a situation where a customer or the issuing bank questions the validity of payments. It may arise due to unauthorised charges, failure to deliver the promised merchandise or excessive charges levied by the business.

## Dispute Phases

A dispute can be in any of the following phases:

Phase | Description
---
**Fraud** | A dispute is raised by the bank when it suspects a transaction to be fraudulent based on the risk analysis.
---
**Retrieval** | A request is initiated by the customer with their issuer bank for additional information about a transaction. This is essentially a "soft" chargeback.
---
**Chargeback** | A refund claim initiated by the customers with their issuer banks. In such cases, the bank starts an official inquiry.
---
**Pre-Arbitration** | A chargeback that you have won and is again challenged by the customer for the second time.
---
**Arbitration** | A chargeback that you have won and is rechallenged for the third time by the customer, and the card networks directly get involved. These disputes are usually costly.

> **INFO**
>
> 
> **Handy Tips**
> 
> The pre-arbitration and arbitration dispute phases are usually long-drawn, complicated, and challenging. It is advised to take remedial action during the retrievals and chargeback phases to avoid complications.
> 

## Dispute States

A dispute can have any of the following statuses (in the Razorpay system).

![Dispute States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/dispute-status.jpg.md)

Status | Description
---
**Open** | Indicates that the dispute has been created.
---
**Under Review** | Indicates that the issuing bank has reviewed the dispute.
---
**Won** | Indicates that the bank has accepted the remedial documents, and you have won the chargeback.
---
**Lost** | Indicates that the bank did not accept the remedial documents and you have lost the chargeback.
---
**Closed** | Indicates the state when a fraudulent transaction is closed after you provide details of the transaction or make a refund to the customer. This is seen in fraudulent transactions only.

## Disputes Process Flow

Following is the process flow for disputes:

1. A dispute can be initiated in any of the following ways:
    1. **Initiated by the issuing bank**: The issuing bank suspects a fraudulent transaction and asks for your justification.
    1. **Initiated by the customer**: The customer claims that the transaction was unauthorised and raises it with the issuing bank.

2. You will be [notified about the dispute.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md#notifications)
    - **Accept** the dispute.  The customer is refunded. In the case of fraud, you must refund the amount. In other cases, Razorpay will auto-refund the amount.
    - [ Contest the dispute by submitting evidence](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/submit-evidence.md) to prove that the transaction was fair.
        - If you contest, the documents are sent to the customer’s bank. The bank reviews the case and provides a verdict.
        - If you lose the dispute, the amount would be deducted from your account and is sent to the customer.

## Notifications

Notifications are sent when disputes are created. These notifications are in the form of:
- **Emails**
You will receive an email notification when a dispute is created. The email contains details of the transaction, amount and cause of dispute.
- **Webhooks**
You can [subscribe to Webhook events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/dashboard.md#subscribe-to-webhook-events) to receive alerts whenever a dispute is created or there is a change in status.

## Dashboard Actions

You can perform the following actions using the Dashboard:
- [View disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/dashboard.md#view-disputes-using-dashboard)
- [Accept disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/dashboard.md#accept-disputes-using-dashboard)
- [Contest disputes and submit evidence](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/dashboard.md#contest-disputes-using-dashboard)
- [ Subscribe to Webhook Events related to disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/dashboard.md#subscribe-to-webhook-events)

### Related Information

- [Submit Evidence](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/submit-evidence.md)
- [View Disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/dashboard.md#view-disputes-using-dashboard)
- [Disputes - Dashboard Actions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/dashboard.md)
- [Dispute FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/faqs.md)
- [Dispute APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/apis.md)
- [Contact Support](https://razorpay.com/support/#request) for additional help with disputes.
