---
title: API | X - Payouts to Cards
heading: Payouts to Cards
description: Make payouts directly to a credit, debit or prepaid card using APIs.
---

# Payouts to Cards

With Payouts to Cards APIs, you can make payouts directly to a credit card, debit card or prepaid card. Payouts via **Visa Direct** and **MasterCard Send** are temporarily unavailable. Know more about the [supported networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/cards.md#supported-networks-and-banks).

> **INFO**
>
> 
> **Feature Request**
> 
> This is an on-demand feature and available only to PCI-compliant merchants. To enable this feature, raise a request using the [support form](https://razorpay.com/support/) on the RazorpayX Dashboard.
> 

Adhering to the RBI guidelines, you can either make a payout without saving card details or save a card details with a tokenisation service - [Razorpay TokenHQ](https://razorpay.com/card-tokenisation/) or any external token provider. Payouts to these tokenised cards can be made using the mode `card`. 

[Allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) that you use while making payouts via APIs and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency.md). [Create a Contact](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/contacts/create.md) and [Fund Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/fund-accounts.md) before creating payouts.

Fork the Razorpay Postman Public Workspace and try the Payouts to Cards APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/api-keys.md).

[](https://www.postman.com/razorpaydev/workspace/f960539b-c56c-41e5-810b-63d2a89d447e/folder/12492020-0a7f8d61-ca43-439c-80db-a6fb08877a5f)

### Related Guides

[About Payout to Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/cards.md)
[Set up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md)
[Webhooks Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md)
[Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md)

### Endpoints
 

- **post** `/v1/payouts` - Create a Payout: 
Make a payout to a card without saving the card details.

- **post** `/v1/fund_accounts` - Create Fund Account: 
Creates a fund account for a card tokenised by external token providers.

- **post** `/v1/payouts` - Create a Payout: 
Makes a payout to a card tokenised by external token providers.

- **post** `/v1/fund_accounts` - Create Fund Account: 
Creates a fund account for a card tokenised by Razorpay TokenHQ.

- **post** `/v1/payouts` - Create a Payout: 
Makes a payout to a card tokenised by Razorpay TokenHQ.
