---
title: Integrate RazorpayX Payouts with Zoho Books
heading: Integrate Payouts with Zoho Books
description: Integrate and Sync RazorpayX Payouts with Zoho Books.
---

# Integrate Payouts with Zoho Books

Zoho Books may require more information than originally provided while making a payout. With this integration and the initial configuration, the process of filling up the required details is automated. You can make configurations with [**Rules & Configurations**](@/Applications/MAMP/htdocs/new-docs/llm-content/x/accounting/zohobooks/#rules-configuration.md) under General and Account Mapping to start. [Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md) made via your RazorpayX account are recorded as **Expenses** under Accounting.

![Accounting Expenses](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-accounting-expenses.jpg.md)

You can filter and view the **Expenses** by:
- Debit Account
- Payment Method
- Payout Purpose
- Zoho Books Account

## Life Cycle

Each payout appears under Accounting Expenses after it is `processed`. 

- It is first visible under the **Categorise** tab. 
- Once you enter the required information, it moves to the **Review** tab. 
- After you review the payout, it moves to the **Sync** tab, which means that the particular payout has been synced with your Zoho Books account.

![Accounting lifecycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/accounting-payout-zoho-lifecycle.jpg.md)
 
### Categorise

Certain payouts are not synced with Zoho Books due to information unavailability. These payouts show up in the **Categorise** tab. To provide complete information:

1. Click on the entry you want to categoise.
2. In the right pane, click **CATEGORISE**.
3. Select your Zoho Books **Expense Account** and **Ledger** from the drop-down menu.
4. Select the **Tax Slab**.

The payout moves to the **Review** tab.

You can automate this process to an extent by setting [**Purpose Rules**](@/Applications/MAMP/htdocs/new-docs/llm-content/x/accounting/zohobooks/#rules.md). This means that you can select a corresponding **Tax Slab** and the **Zoho Books Expense Account** to which you want the payouts, with that particular purpose, to sync. 

**Example**: 

- Payouts **Purpose**: `Payslip`
- **Tax Slab** selected under Purpose Rules: `12%`
- **Zoho Books Expenses Account** selected under Purpose Rules: `Employee Costs`

This means, everytime a payout's purpose is recorded a `Payslip` while making the payout, we automatically sync it to the `Employee Costs` Expenses Account on Zoho with a `12%` Tax Slab. Hence, the payout directly appears on the **Review** tab instead of the **Categorise** tab and reduces the manual effort of categorising each time.

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can also choose to **EXCLUDE** the entry. With this, the payout will not be categorised in RazorpayX. It will remain in an intermediatory state and you can categorise it later directly on Zoho Books. 
> - It is also automatically excluded when the categorisation fails to sync. You can see the **Exclude** tab to check on any missed expenses on Zoho Books.
> 

### Review

If all the information is present, the payout is showed in the review tab. Select the payout you want to review and click **SYNC NOW** to sync the payout with Zoho Books. You can also select multiple or all payouts in the Review tab and sync them.

![Accounting Review](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-accounting-review.jpg.md)

### Sync

The **Sync** tab has all the payouts that were synced to your Zoho Books account. Select the particular payout to view more details, including the timelines and find them in the right pane. You can also find the sync status of an entry under the **Payouts** tab.

![Accounting Sync](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-accounting-sync.jpg.md)

In case the sync fails, you can either **FIX & RETRY SYNC** or **EXCLUDE** the entry. If you choose to exclude, the payout will not be categorised. It will remain in an intermediatory state and you can categorise it later directly on Zoho Books.

![Zoho accounting sync fail](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-accounting-sync-failed.jpg.md)
