---
title: Items Dashboard
description: Create, update and delete Items using Razorpay Dashboard.
---

# Items Dashboard

Items are products or services that you can add to [Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) and charge to customers. You can create an item on your Dashboard from **Invoice** → **Items**. Once created, it appears on the list of items in the Dashboard.

## Create an Item

To create an item via Dashboard:

1. Log in to the Dashboard.
1. Navigate to **Invoices** → **Items**.
1. Click **New Item**.
1. Enter the following:
	1. **Name**
	1. **Rate**
	1. **Description**

![Create an item in dashboard fill details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/items-add-item.jpg.md)

Once an item is created, it will appear on the list of created item and also in the drop-down menu at the time of invoice creation.

![List of created items](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/items-item-list.jpg.md)

## Edit an Item

To update the details of an item:

1. Navigate to **Invoices** → **Items**.
1. In the item list, click on the desired **Item Id**.
	![](/docs/assets/images/items-item-list.jpg)
1. In the **Edit Item** page, enter the following:
	1. **Name**
	1. **Rate**
	1. **Description**
1. Click **Save**.

## Delete an Item

To delete an item:
1. Navigate to **Invoices** → **Items**.
1. Hover over the desired item and click **delete**.

![Delete items option](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/items-delete-item.jpg.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot delete an item with which invoices have already been created.
>
