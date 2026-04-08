---
title: Manage Payment Pages
description: Edit content, change settings or deactivate your Payment Page.
---

# Manage Payment Pages

You can perform the following Payment Page actions:

### Modify Payment Page Content

To modify the Payment Page content:
1. Navigate to **Payment Pages** on the Dashboard.
2. In the list of pages that appear, click on the link of the page that you want to modify.
3. In the top right corner of the page, click the **Edit Page** button.
    ![Edit Button - Manage Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-v3-update_stock.jpg.md)
    
4. The page appears in edit mode. You can now edit any of the fields to update the details, including the price fields.

### Update Stock

1. Navigate to **Payment Pages** on the Dashboard and select **Payment Pages**.
    ![Dashboard Page type selection](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/dashboard-pp-page-selection.jpg.md)
2. In the list of **Payment Pages** that appears, select the page you wish to modify.
3. In the top right corner, the different price fields are displayed. Click **Update Stock** against the relevant price item.
4. You can either make the stock quantity unlimited, using **No Limit** or enter an amount in the box given below.
5. Click **Save**.

### Modify Settings

To modify Payment Page settings:
1. Navigate to **Payment Pages** on the Dashboard and select **Payment Pages**.
2. Click on the page id. This opens the page details panel where you can perform the following actions:

Action | Effect
---
**Edit** the page | Editing reopens the editor with saved details. You can make changes to the page content.
---
**Deactivate** the page | Deactivating a page makes it inaccessible to your customers.
---
Configure **Expires on** | This option enables you to set the page's expiry date and time using the date and time picker. You can also select the **No Expiry** checkbox to run the page indefinitely.
---
**Add New** notes on the page | You can add up to 5 custom notes on the Payment Page.

![Modify Settings - Manage Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-v3-edit_pp_2.jpg.md)

> **INFO**
>
> 
> **Best Practices**
> 
> - To avoid confusion, ensure that no two pages have the same **Title**.
> - You can edit an expired or inactive Payment Page and republish it with new changes. This helps avoid page duplication and allows you to query the system efficiently.
> 

### Deactivate Payment Page

A Payment Page can have two states, active and inactive.

Status | Description
---
`active` | The Page is published and live.
---
`inactive` | The Page goes inactive due to one of the following actions:- Manual deactivation
- Page expiry
- Items out-of-stock

You can make an existing page inactive if you no longer wish to accept payments using it.

Manual Deactivation

To deactivate manually:
1. Log in to Dashboard and navigate to **Payment Pages**.
2. Select **Payment Pages**.
3. Select the page you wish to deactivate.
4. In the page details screen, go to **Page Status** field and click **Deactivate**.
5. In the dialogue box that appears, confirm the action by clicking the **Yes, deactivate** button.

![Deactivate Button - Manage Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-v3-edit_pp.jpg.md)

### Deactivation Using Expiry Date

You can also automate page deactivation by setting an expiry date for the page. You can set expiry date:

Know how to [set the page's expiry date](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/create.md#step-3-configure-page-settings) at the time of creation.

To set the expiry mode of a page from the list of **Payment Pages**:
1. Navigate to **Dashboard** → **Payment Pages**.
2. Select **Payment Pages**.
3. In the list of **Payment Pages** that appears, Select the page you wish to set expiry for.
4. In the page details screen, go to **Expires On** field and click **Change**.
5. The field now shows a **No Expiry** checkbox selected. Unselect the box for the calendar to appear.
6. In the calendar, set the date and time of expiry and click **Save**.

![Save Button - Exipry Date - Manage Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-v3-edit_pp_2.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The expiry time must be at least 15 minutes after the current time.
> 

### Related Information

- [Create a Payment Page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/create.md)
- [Search for Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/search.md)
- [Configure Payment Pages Receipt](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/receipt.md)
- [Configure Goal Tracker](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/goal-tracker.md)
- [Subscribe to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/subscribe-to-webhooks.md)
