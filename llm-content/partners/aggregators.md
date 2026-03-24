---
title: About Aggregators
description: Razorpay Aggregators are the Partners who provide managed services to their clients through digital offerings such as an online platform and manage their transactions including payments, refunds and settlements.
---

# About Aggregators

Razorpay Aggregator Partners are businesses that: 
- Provide a platform to their clients.
- Manage their transactions. 
- Collect payments.
- Create refunds.
- View settlements on behalf of their clients via API and Dashboard access.

### Example

Acme Corp wants to manage payments on its application for its client *Gekko & Co*. Since *Acme* cannot natively do so, it signs up with Razorpay as a Partner and creates a sub-merchant account (affiliate account) for *Gekko*.
Once the account for *Gekko* is activated, *Acme Corp* can use its account credentials to access *Gekko's*  Dashboard and create and manage transactions on behalf of *Gekko*. As a Razorpay merchant, *Gekko* can also transact and access account details using its own API keys and Dashboard.

## Become an Aggregator

After onboarding as a Razorpay Partner, you need to request a Partner type switch to [become an Aggregator](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/become-aggregator.md).

## Add Sub-merchants

You can add your affiliate partners/sub-merchants directly using the Dashboard. Know more about [adding sub-merchants](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/add-submerchants.md).

### Sub-merchant Account Activation

You or the sub-merchant can activate the sub-merchant account.

The newly added sub-merchants will appear on the Partner Dashboard merchant list with a default **Activation Status** as **Not Submitted**.
![partner 2](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partn_2.jpg.md)

The activation will follow the standard process according to which the **Activation Status** will move from **Under Review** to **Activated**.

![partner 4](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partn_4.jpg.md)

> **INFO**
>
> 
> **Failed Account Activation**
> 
> If the account activation has failed due to some invalidation, it must be rectified and resubmitted.
> 

## Switch Dashboards

After a sub-merchant is added, you can anytime switch to the sub-merchant Dashboard. To switch to a Dashboard of a particular sub-merchant:
1. Log in to the Dashboard.
2. Click on **Switch Merchant** on the top right.
3. Search the sub-merchant using:
    1. **Merchant ID**
    2. **Merchant Name**
    3. **Mail ID**

4. On the merchant list, click the merchant you want switch to and go to the Dashboard of that sub-merchant.

> **INFOR**
>
> 
> **Switch between Dashboards Quickly**
> 
> You can also quickly switch between Dashboards from the **Switch Merchant** drop-down list. The drop-down list displays the list of all your sub-merchants.
> ![partner 8](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partn_8.jpg.md)
> 

## User Access

As an Aggregator Partner, you will have **owner** access to the sub-merchant's Dashboard.

Know more about [user roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/manage-team.md#standard-user-roles).

## Settings

Under the **Settings** option, you have **Partner Credentials** and **Webhooks** settings for the sub-merchant account.

> **WARN**
>
> 
> 
> **Watch Out!** 
> 
> In the Aggregator model, you will receive the commission only when your sub-merchants will use your partner key and not their own account key.
> 
> 

![partner 7](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partn_ag_7.jpg.md)

### Partner Credentials

You can use partner credentials to make API requests to Razorpay on behalf of the sub-merchant account. The Partner credentials will have a different format from the regular account.

![partner 8](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partn_ag_8.jpg.md)

Two sets of credentials are provided, one for **Test** and **Live** mode.

Know more about [using the Partner credentials](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> The mode here corresponds to the sub-merchant’s mode. You can call a Fetch a Payment API using Partner’s test credentials, which will attribute to the sub-merchant’s test mode account.
> 

### Webhooks

You can also set up webhooks for specific events on the sub-merchant account. Know more about [webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

1. Log in to your Dashboard.
2. Click **Partner** on the Dashboard.
    ![partner ag](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partners-partn_ag_0000.jpg.md)
3. Under the **Affiliated Accounts** tab, click **Settings**.
    ![partner 2](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partners-aggregators-partners-2.jpg.md)
4. In the Webhooks section, you can set up webhooks from your Dashboard for live mode and test mode. 
5. Enter the **Webhook URL** where you will receive the webhook payload when the event is triggered.
6. Enter **Secret**. This field is optional.
7. Select appropriate events from the list of **Active Events** you would like to activate.
    ![webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partners-aggregators-webhook.jpg.md)
8. Click **Save** to enable the webhook.

## Reports

Razorpay provides various reports that help you monitor your business's money flow. You can export all your transaction data for a particular day using one of the reports listed in the below table.

Report Name| Description
---
Combined Report| This report helps you reconcile all your transactions. It provides details of transactions (payments, refunds, adjustments and transfers) and settlements made in the selected period. The transaction may or may not be settled. Refer to the `Settled at` column for the date on which the settlement was or will be initiated. The report includes transaction type, id, date, amount, Razorpay fee, tax and more.
---
Settlement Recon| This report helps you reconcile your transactions and corresponding settlements. It provides a detailed list of transactions (payments, refunds, adjustments and transfers) related to every settlement for the selected period. The report includes details such as transaction type, id, method, settlement id, settlement date, settlement UTR and more.
---
Daily Earnings| This report provides details of your daily earnings from referred accounts. Base earnings indicate the amount you earn from the platform fee, while Add-on earnings show any additional platform charge that may have been added to your accounts.
---
Per Transaction Earnings Report | This report provides details of your earnings from each transaction on your referred accounts.
---
Payments| This report provides details of payments created in the selected period. It includes details such as payment id, status, method, issuer name, date, amount and more.
---
Settlements| This report provides a list of the settlements for the selected period. However, it does not include details of the transactions that were settled. The report includes details such as settlement id, date, UTR and more.
---
Refunds| This report provides details of refunds initiated in the selected period. It includes details such as refund id, amount, date, corresponding payment id and more.

### Related Information

- [Aggregators - Add Sub-merchants](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/add-submerchants.md)
- [Partners](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners.md)
