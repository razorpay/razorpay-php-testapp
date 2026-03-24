---
title: Operations Reference
description: Complete reference for all available operations in the Razorpay n8n Community Node with detailed configuration and examples.
---

# Operations Reference

The Razorpay n8n Community Node provides comprehensive access to Razorpay APIs through multiple operations. Each operation corresponds to specific Razorpay API endpoints and enables you to automate payment workflows.

## Operations Overview

The n8n node provides **12 core operations** organised across the following categories:

> **INFO**
>
> 
> **Extended Operations via MCP Server**
> 
> The node can access an additional **28 operations** through the [Razorpay MCP Server](@/Applications/MAMP/htdocs/new-docs/llm-content/mcp-server.md) integration, bringing the total to 40 operations.
> 

## Complete Operations List

### Orders

Operation | Description | Required Parameters | Optional Parameters | API Documentation
---
Fetch All Orders | Retrieve a list of all orders with optional filtering | - | from, to, count, skip, authorized, receipt | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/fetch-all.md)

### Payment Links

Operation | Description | Required Parameters | Optional Parameters | API Documentation
---
Create Payment Link | Generate a Payment Link for customers | amount (paise), currency | description, customer details, notify, callback_url, callback_method | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/payment-links/create-standard.md)
---
Fetch Payment Link | Retrieve details of a specific Payment Link | payment_link_id | - | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/payment-links/fetch-id-standard.md)

### Payments

Operation | Description | Required Parameters | Optional Parameters | API Documentation
---
Fetch Payment by id | Get detailed information about a specific payment | payment_id | expand[] | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/fetch-with-id.md)
---
Fetch All Payments | Retrieve all payments with filtering options | - | from, to, count, skip, expand[] | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/fetch-all-payments.md)

### Refunds

Operation | Description | Required Parameters | Optional Parameters | API Documentation
---
Fetch All Refunds | Retrieve all refunds with filtering | - | from, to, count, skip, payment_id | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/refunds/fetch-all.md)

### Settlements

Operation | Description | Required Parameters | Optional Parameters | API Documentation
---
Fetch Settlement by id | Get details of a specific settlement | settlement_id | expand[] | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/settlements/fetch-with-id.md)
---
Fetch All Settlements | Retrieve all settlements with filtering | - | from, to, count, skip | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/settlements/fetch-all.md)

### Invoices

Operation | Description | Required Parameters | Optional Parameters | API Documentation
---
Fetch Invoices for Subscription | Get all invoices for a specific subscription | subscription_id | - | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/fetch-invoices.md)

### Disputes

Operation | Description | Required Parameters | Optional Parameters | API Documentation
---
Fetch All Disputes | Retrieve all customer disputes | - | from, to, count, skip, payment_id | [API Docs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/disputes/fetch-all.md)

## Best Practices

1. Use Pagination for Large Datasets: Always paginate when fetching large numbers of records to prevent timeout errors and reduce API load.

2. Filter by Date Range: Limit results using `from` and `to` parameters to improve response time and reduce data transfer.

3. Expand Selectively: Only expand necessary nested objects to reduce response size and improve performance.

4. Handle Errors Gracefully: Implement proper error handling to ensure workflow reliability and easier debugging.

5. Test Mode First: Always test workflows with test credentials to prevent accidental real transactions and charges.

6. Use Expressions for Dynamic Values: Reference data from previous nodes using expressions to create flexible, reusable workflows.

7. Implement Rate Limit Handling: Add delays between batch operations to prevent rate limit errors (429 responses).

8. Log Important Data: Use **Set** or **Function** nodes to log key information.

## Next Steps

- [View Use Cases & Examples](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node/use-cases.md)
- [Troubleshooting & FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node/troubleshooting-faqs.md)
