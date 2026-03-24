---
title: API Changelog
description: List of changes made to Razorpay APIs.
---

# API Changelog

- **Payments Changelog**: Discover new releases and updates regarding Razorpay Payments products, SDKs and plugins.

  - **RazorpayX Changelog**: Discover new releases and updates regarding RazorpayX products.

The following table records changes made to Razorpay API since Jan 2024:

Month-Year | Product | Description
---
Mar 2026 | Razorpay MCP Server | Added support for the `detect_stack` and `integrate_razorpay_checkout` tools to the MCP server.
---
Oct 2025 | Razorpay n8n Node | Launched the [Razorpay n8n Community Node](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node.md) for no-code payment automation. Automate payment operations, process transactions, manage refunds and connect Razorpay with 400+ services like Google Sheets, Slack and WhatsApp using the n8n workflow platform.
---
Sep 2025 | Razorpay MCP Server | Added OAuth 2.0 support to the MCP server for secure user authentication and resource access.
---
Aug 2025 | Fund Account Validation | You will receive a UTR number in the API response for every successful Fund Account Validation ([Bank Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/composite-account-validation/bank-account.md) and [VPA](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/composite-account-validation/vpa.md)). 
---
Aug 2025 | Razorpay Remote MCP Server | Razorpay Remote MCP server now supports streamable HTTP responses, enabling chunked data transmission for improved performance.
---
Jun 2025 | Razorpay Remote MCP Server | Launched Razorpay Remote MCP – a fully hosted, self-serve AI-native payments infrastructure layer.
---
Apr 2025 | Razorpay MCP Server | Introduced Razorpay MCP Server. It provides seamless integration with Razorpay APIs, enabling developers to build advanced payment processing workflows and AI-powered tools. 
--- 
Apr 2025 | Smart Collect 2.0 | You can now use the upgraded [ Smart Collect 2.0 APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2.md) for more functions such as creating a Customer Identifier with VPA and Bank Account, adding a VPA to an existing Customer Identifier and fetching payments made using UPI.
---
Mar 2025 | Payouts | You can now send payouts to your customers' mobile numbers directly using the [Payouts to Phone Composite API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-composite/create/phone-number.md).
---
Feb 2025 | RazorpayX | Introduced [API for fetching account balance(s)](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/account-validation/balance-fetch.md).
---
Jul 2024 | Payouts | Made [idempotency header](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) mandatory for normal and composite Payouts APIs.
---
May 2024 | Payments | **Currency Subunit Changes** 
 - When using the amount parameter to accept or refund payments made using zero-decimal currencies (such as the Japanese Yen (JPY)), you do not need to pass the amount in currency subunits. For example, if the payment amount is JPY 295, pass the parameter value as 295.
- The change is applicable to [Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/entity.md), [Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/entity.md), [Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/api/refunds/entity.md), [Settlements](@/Applications/MAMP/htdocs/new-docs/llm-content/api/settlements/entity.md), [Payment Links](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/payment-links/entity.md), [Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/entity.md) and [Invoices](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/invoices/entity.md).

---
Feb 2024 | Payouts | [Introduced Composite Account Validation API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/composite-account-validation.md) to create contact, fund account and validate the bank account (using penny-drop/penniless) and VPA IDs of your customers, in a single API call.
