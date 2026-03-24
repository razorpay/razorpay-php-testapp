---
title: Invoices | Items
heading: About Items
description: Create Items that can be billed using Razorpay Invoices.
---

# About Items

Items are products or services that you can add to [Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) and charge customers for. You can create an item on your Razorpay [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard.md) from **Invoice** → **Items** or using [Items API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices/create-item.md). When an item is created, it appears on the list of items in the Dashboard.

## Item Life Cycle

Status | Description
---
Active | Once created, an item is said to be in the active state. Items in this state can be added to an Invoice to be sent to customers.
---
Inactive | An item can be marked inactive. Once in this state, the item cannot be added to an Invoice.
---
Deleted | You cannot delete an item with which Invoices have been created already. You can only delete an item that has never been used before with an Invoice.

## API and Dashboard Actions
You can perform the following actions using Items APIs and on the Dashboard.

Actions | API Link | Dashboard Link
---
Create an item | [Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices/create-item.md) | [Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/create.md)
---
Update details of an item | [Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices/update-item.md) | [Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/update.md)
---
Retrieve details of items | [All items](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices/fetch-all-items.md)
[Specific item](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices/fetch-with-id-item.md) | NA
---
Delete an item | [Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices/delete-item.md) | [Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/delete.md)
