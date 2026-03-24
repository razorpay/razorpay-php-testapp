---
title: Razorpay MCP Tools Reference
description: Complete reference of all available tools in the Razorpay MCP Server with API mappings.
---

# Razorpay MCP Tools Reference

The Razorpay MCP Server provides comprehensive access to Razorpay APIs through the following tools. Each tool corresponds to specific Razorpay API endpoints and enables AI assistants to perform payment operations seamlessly.

## Tools Overview

The MCP server provides **35+ tools** organised across the following categories:

- **Payments** (5 tools): Core payment operations
- **Payment Links** (6 tools): Payment link management  
- **Orders** (5 tools): Order lifecycle management
- **Refunds** (6 tools): Refund processing and tracking
- **QR Codes** (7 tools): QR code payment operations
- **Settlements** (6 tools): Settlement and reconciliation
- **Payouts** (2 tools): Payout management
- **Standard Checkout**: Integrate Razorpay Standard Checkout for supported frameworks

## Complete Tools List

Tool | Description | API Link | Remote Server Support
---
`capture_payment` | Change the Payment status from authorised to captured. | [API](https://razorpay.com/docs/api/payments/capture/) | ✓
---
`fetch_payment` | Fetch Payment details with id. | [API](https://razorpay.com/docs/api/payments/fetch-with-id/) | ✓
---
`fetch_payment_card_details` | Fetch card details used for a Payment. | [API](https://razorpay.com/docs/api/payments/fetch-payment-expanded-card/) | ✓
---
`fetch_all_payments` | Fetch all Payments with filtering and pagination. | [API](https://razorpay.com/docs/api/payments/fetch-all-payments/) | ✓
---
`update_payment` | Update the notes field of a Payment. | [API](https://razorpay.com/docs/api/payments/update/) | ✓
---
`create_payment_link` | Creates a new Standard Payment Link. | [API](https://razorpay.com/docs/api/payments/payment-links/create-standard/) | ✓
---
`create_payment_link_upi` | Creates a new UPI Payment Link. | [API](https://razorpay.com/docs/api/payments/payment-links/create-upi/) | ✓
---
`fetch_all_payment_links` | Fetch all the Payment Links. | [API](https://razorpay.com/docs/api/payments/payment-links/fetch-all-standard/) | ✓
---
`fetch_payment_link` | Fetch details of a Payment Link. | [API](https://razorpay.com/docs/api/payments/payment-links/fetch-id-standard/) | ✓
---
`send_payment_link` | Send a Payment Link via SMS or email. | [API](https://razorpay.com/docs/api/payments/payment-links/resend/) | ✓
---
`update_payment_link` | Updates a new standard Payment Link. | [API](https://razorpay.com/docs/api/payments/payment-links/update-standard/) | ✓
---
`create_order` | Creates an Order. | [API](https://razorpay.com/docs/api/orders/create/) | ✓
---
`fetch_order` | Fetch Order with id. | [API](https://razorpay.com/docs/api/orders/fetch-with-id/) | ✓
---
`fetch_all_orders` | Fetch all Orders. | [API](https://razorpay.com/docs/api/orders/fetch-all/) | ✓
---
`update_order` | Update an Order. | [API](https://razorpay.com/docs/api/orders/update/) | ✓
---
`fetch_order_payments` | Fetch all Payments for an Order. | [API](https://razorpay.com/docs/api/orders/fetch-payments/) | ✓
---
`create_refund` | Creates a Refund. | [API](https://razorpay.com/docs/api/refunds/create-instant/) | ❌
---
`fetch_refund` | Fetch Refund details with id. | [API](https://razorpay.com/docs/api/refunds/fetch-with-id/) | ✓
---
`fetch_all_refunds` | Fetch all Refunds. | [API](https://razorpay.com/docs/api/refunds/fetch-all/) | ✓
---
`update_refund` | Update Refund notes with id. | [API](https://razorpay.com/docs/api/refunds/update/) | ✓
---
`fetch_multiple_refunds_for_payment` | Fetch multiple Refunds for a Payment. | [API](https://razorpay.com/docs/api/refunds/fetch-multiple-refund-payment/) | ✓
---
`fetch_specific_refund_for_payment` | Fetch a specific Refund for a Payment. | [API](https://razorpay.com/docs/api/refunds/fetch-specific-refund-payment/) | ✓
---
`create_qr_code` | Creates a QR Code. | [API](https://razorpay.com/docs/api/qr-codes/create/) | ✓
---
`fetch_qr_code` | Fetch QR Code with id. | [API](https://razorpay.com/docs/api/qr-codes/fetch-with-id/) | ✓
---
`fetch_all_qr_codes` | Fetch all QR Codes. | [API](https://razorpay.com/docs/api/qr-codes/fetch-all/) | ✓
---
`fetch_qr_codes_by_customer_id` | Fetch QR Codes with Customer id. | [API](https://razorpay.com/docs/api/qr-codes/fetch-customer-id/) | ✓
---
`fetch_qr_codes_by_payment_id` | Fetch QR Codes with Payment id. | [API](https://razorpay.com/docs/api/qr-codes/fetch-payment-id/) | ✓
---
`fetch_payments_for_qr_code` | Fetch Payments for a QR Code. | [API](https://razorpay.com/docs/api/qr-codes/fetch-payments/) | ✓
---
`close_qr_code` | Closes a QR Code. | [API](https://razorpay.com/docs/api/qr-codes/close/) | ❌
---
`fetch_all_settlements` | Fetch all Settlements. | [API](https://razorpay.com/docs/api/settlements/fetch-all/) | ✓
---
`fetch_settlement_with_id` | Fetch Settlement details. | [API](https://razorpay.com/docs/api/settlements/fetch-with-id/) | ✓
---
`fetch_settlement_recon_details` | Fetch Settlement reconciliation report. | [API](https://razorpay.com/docs/api/settlements/fetch-recon/) | ✓
---
`create_instant_settlement` | Create an Instant Settlement. | [API](https://razorpay.com/docs/api/settlements/instant/create/) | ❌
---
`fetch_all_instant_settlements` | Fetch all Instant Settlements. | [API](https://razorpay.com/docs/api/settlements/instant/fetch-all/) | ✓
---
`fetch_instant_settlement_with_id` | Fetch Instant Settlement with id. | [API](https://razorpay.com/docs/api/settlements/instant/fetch-with-id/) | ✓
---
`fetch_all_payouts` | Fetch all Payout details with account number. | [API](https://razorpay.com/docs/api/x/payouts/fetch-all/) | ✓
---
`fetch_payout_by_id` | Fetch the Payout details with Payout id. | [API](https://razorpay.com/docs/api/x/payouts/fetch-with-id/) | ✓
---
`detect_stack` | Detect project language/framework for checkout integration. | N/A (MCP Integration Helper) | ✓
---
`integrate_razorpay_checkout` | Generate end-to-end Razorpay Standard Checkout integration code for supported frameworks. | N/A (MCP Integration Helper) | ✓

- ✓ **Supported**: Available in both Remote and Local MCP servers.
- ❌ **Local Only**: Only available in Local MCP server deployment.

## Next Steps

- [Remote MCP Server](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/remote.md) (recommended)
- [Local MCP Server](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/local.md)
- [View Use Cases](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server/use-cases.md)
