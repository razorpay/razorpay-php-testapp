---
title: Integrate RazorpayX Vendor Payments with Zoho Books
heading: Integrate Vendor Payments with Zoho Books
description: Integrate and Sync RazorpayX Vendor Payments with Zoho Books.
---

# Integrate Vendor Payments with Zoho Books

Zoho Books may require more information than originally provided while making a vendor payment. With this integration and the initial configuration, the process of filling up the required details is automated. You can make configurations with [**Rules & Configurations**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/accounting/zohobooks.md#rules-configuration) under General, Account Mapping and Contact Mapping to start. [Vendor Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments.md) are recorded as **Bills** under Accounting. They are recorded here as soon as the invoice is created. The invoice need not be in `paid` state for the sync to occur.

![Accounting Bills](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-accounting-bills.jpg.md)

You can filter and view the **Bills** by:
- Payment Status
- Zoho Books Account

## Life Cycle

Each vendor payment appears under Accounting Bills after it is `processed`. 

- It is first visible under the **Categorise** tab. 
- Once you enter the required information, it moves to the **Review** tab. 
- After you review the vendor payment, it moves to the **Sync** tab, which means that the particular vendor payment has been synced with your Zoho Books account.

![Accounting lifecycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/accounting-zoho-lifecycle.jpg.md)
 
### Categorise

Certain invoices are not synced with Zoho Books due to information unavailability. These vendor payments show up in the **Categorise** tab. To provide complete information:

1. Click on the entry you want to categoise.
2. In the right pane, click **CATEGORISE**.
3. Select your Zoho Books **Expense Account** and **Ledger** from the drop-down menu.
4. Select the **Tax Slab**.

The vendor payment moves to the **Review** tab.

You can automate this process to an extent by setting [**Contact Rules**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/accounting/zohobooks.md#rules). This means that you can select a corresponding **Zoho Books Expense Account** to which you want the vendor payments made to that particular vendor, to sync. 

**Example**: 

- Vendor **Contact** name: `Gaurav Kumar`
- **Zoho Books Expenses Account** selected under Purpose Rules: `Regular Vendor`

This means, everytime a payment is made to `Gaurav Kumar` via RazorpayX, we automatically sync it to the `Regular Vendor` Expenses Account on Zoho Books. Hence, the vendor payment directly appears on the **Review** tab instead of the **Categorise** tab and reduces the manual effort of categorising each time.

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can also choose to **EXCLUDE** the entry. With this, the vendor payment will not be categorised in RazorpayX. It will remain in an intermediatory state and you can categorise it later directly on Zoho Books. 
> - It is also automatically excluded when the categorisation fails to sync. You can see the **Exclude** tab to check on any missed expenses on Zoho Books.
> 

### Review

If all the information is present, the vendor payment is showed in the review tab. Select the vendor payment you want to review and click **SYNC NOW** to sync the vendor payment with Zoho Books. You can also select multiple or all vendor payments in the Review tab and sync them. 

![Accounting Review](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-accounting-review.jpg.md)

### Sync

The **Sync** tab has all the vendor payments that were synced to your Zoho Books account. Select the particular vendor payment to view more details, including the timelines and find them in the right pane. You can also find the sync status of an entry under the **Vendor Payments** tab.

![Accounting Sync](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-accounting-sync.jpg.md)

In case the sync fails, you can either **FIX & RETRY SYNC** or **EXCLUDE** the entry. If you choose to exclude, the payout will not be categorised. It will remain in an intermediatory state and you can categorise it later directly on Zoho Books.

![Zoho accounting sync fail](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-accounting-sync-failed.jpg.md)
