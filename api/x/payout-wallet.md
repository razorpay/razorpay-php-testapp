---
title: Payout Wallet - Amazon
description: Find APIs to make payouts via an Amazon Pay Gift Card.
---

# Payout Wallet - Amazon

With Payout Wallet APIs, make payouts to your Contact's Amazon Pay Gift Card wallet from [RazorpayX Lite](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/razorpayx-lite.md). You can process payouts up to ₹10,000 per transaction multiple times in a day. Know more about [Amazon Gift Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-wallet/amazon.md).

Creating the Contact and Fund account before making a payout helps you improve payout processing time. You can continue to use the Contact and Fund account details (instead of Ids) in the composite API to make payouts. This does not create duplicate Contacts or Fund accounts in your system. 

Idempotency allows you to safely retry or send the same request multiple times without the fear of performing the same action more than once. Know more about [Payout Idempotency](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency.md).

Fork the Razorpay Postman Public Workspace and try the Payout Wallet API using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/api-keys.md).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-1706cd68-1bcc-4879-ba60-90b4289449bd)

### Related Guides

[About Amazon Payout Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-wallet/amazon.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md)
[Amazon Brand Guidelines](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-wallet/amazon/branding-guidelines.md)

### Endpoints

- **post** `/v1/contacts` - Create a Contact: 
    Creates contact for Amazon Pay Gift Card.

- **post** `/v1/fund-accounts/` - Create a Fund Account of type `wallet`: 
    Creates a `wallet` fund account for your Contact to receive Amazon Pay Gift Card.

- **post** `/v1/payouts` - Create a Payout: 
    Creates a normal payout to your Contact's Amazon Pay Gift Card.

- **post** `/v1/payouts` - Make Payouts to Amazon Pay Wallet Using Composite API: 
    Create a Contact, Fund Account and make the payout to your Contact's Amazon Pay Gift Card in a single API call.
