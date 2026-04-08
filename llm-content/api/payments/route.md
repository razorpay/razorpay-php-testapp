---
title: API | Route
heading: Route
description: Use Route to create APIs for Linked Accounts, Stakeholders, Product Configuration and Stakeholders.
---

# Route

You should create a linked account to integrate Route and start transferring payments to vendors.

 
 Below are the steps to integrate Route. You can also refer to our comprehensive [Route Integration guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md).

 1. [Create a Linked Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/create-linked-account.md)
 2. [Create a Stakeholder](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/create-stakeholder.md)
 3. [Request a Product Configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/request-product-config.md)
 4. [Update a Product Configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/update-product-config.md)
 5. Transfer funds to Linked Accounts using [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/create-transfers-orders.md), [Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/create-transfers-payments.md) or [Direct Transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/direct-transfers.md) methods.

 Fork the Razorpay Postman Public Workspace and try the Linked Account APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

 [](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-ee29e3a3-f06a-464c-b9f2-03a20e875591)

### Related Guides

[About Linked Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/linked-account.md)
[About Route](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route.md)
[Integrate With Route](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md)

### Endpoints

- **post** `/v2/accounts` - Create a Linked Account: 
 Creates a Linked Account.

- **patch** `/v2/accounts/:account_id` - Update a Linked Account: 
 Updates a Linked Account.

- **get** `/v2/accounts/:account_id` - Fetch a Linked Account With ID: 
 Fetches a Linked Account using a unique identifier.

- **post** `/v2/accounts/:account_id/stakeholders` - Create a Stakeholder: 
 Creates a Stakeholder.

- **patch** `/v2/accounts/:account_id/stakeholders/:stakeholder_id` - Update a Stakeholder Account: 
 Updates a Stakeholder account.

- **post** `/v2/accounts/:account_id/products` - Request a Product Configuration: 
 Requests a product configuration.

- **patch** `/v2/accounts/:account_id/products/:product_id` - Update a Product Configuration: 
 Updates a product configuration.

- **get** `/v2/accounts/:account_id/products/:product_id` - Fetch a Product Configuration: 
 Fetches a product configuration.

- **post** `/v1/orders` - Create Transfers from Orders: 
 Creates Transfers from orders.

- **post** `/v1/payments/:id/transfers` - Create Transfers from Payments: 
 Creates Transfers to Linked Accounts once the payments are captured.

- **post** `/v1/transfers` - Direct Transfers: 
 Transfers funds directly from your account balance to the Linked Accounts.

- **post** `/v1/transfers` - Create a Direct Transfer (Idempotent Request): 
 Transfers funds directly from your account balance to the Linked Accounts.

- **get** `/v1/payments/:id/transfers` - Fetch Transfers for a Payment: 
 Fetches transfers created for a specific payment.

- **get** `/v1/orders/:id/?expand[]=transfers&status=processing` - Fetch Transfer for an Order: 
 Fetches transfers created for a specific order.

- **get** `/v1/transfers/:id` - Fetch a Transfer With ID: 
 Displays specific transfer details.

- **get** `/v1/transfers?recipient_settlement_id=:id` - Fetch Transfers for a Settlement: 
 Retrieves the collection of transfers created for a particular Settlement ID.

- **get** `/v1/transfers?expand[]=recipient_settlement` - Fetch Settlement Details: 
 Displays the details of settlements made to Linked Accounts.

- **get** `/v1/payments/` - Fetch Payments of a Linked Account: 
 Displays all the payments received by a Linked Account.

- **post** `/v1/payments/:id/refund` - Refund Payments and Reverse Transfer from a Linked Account: 
 Initiates a payment refund to a customer.

- **post** `/v1/transfers/:id/reversals` - Reverse a Transfer: 
 Initiates a reversal of funds from the Linked Account to your account.

- **get** `/v1/transfers/:id/reversals` - Fetch Reversals for a Transfer: 
 Fetches reversals for a Transfer.

- **patch** `/v1/transfers/:id` - Modify Settlement Hold for Transfers: 
 Modifies the settlement configuration for a particular transfer id.
