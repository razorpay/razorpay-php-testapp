---
title: Integrate Tally with RazorpayX
heading: Integrate Tally
description: Integrate Tally with RazorpayX to sync account statement, vendor payments and payouts for easy reconciliation while accounting.
---

# Integrate Tally

Tally is widely used accounting software known for its user-friendly interface. It helps businesses manage financial transactions, track inventory and comply with tax regulations. Tally provides customizable reports, ensures data security, and supports multi-user collaboration.

Integrate RazorpayX with Tally to streamline your financial processes. It enables automatic reconciliation of payments, simplifies expense tracking and enhances overall financial management. This integration facilitates seamless data flow between your accounting and payment systems, reducing manual efforts and minimizing errors in your financial records.

## Prerequisites

You must ensure a few things on your tally software.

1. You can either install the Tally plugin file or share your tally license number if you want us to enable it for you.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Ensure your Tally is up to date. If not, navigate to **Help** → **Manage License** → **Update**. Enter your Tally net Id and password. 
>     

2. Back up your Tally data before starting the integration process.
2. Navigate **Manage** → select the company you want sync with RazorpayX.
3. Create 0% ledgers for mapping where relevant ledgers are not available. (GST ledgers)
3. Go to **Enable RazorpayX Integration** and type **YES**.
4. **Enable Scheduler** for automatic timely data sync.
5. Click **RazorpayX Settings** and enter your MID and registered email ID (of the owner, admin or finance team) in lowercase, press enter. Authentication OTP is sent on your registered email. Enter the OTP, and start the integration on the RazorpayX Dashboard.

## Tally Integration

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to **My Accounts & Settings** → **Integrations** → **Tally**.
        
        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         - If you do not find relevant ledgers, click **Change** on the top of the screen and select all the relevant ledgers/groups and click **Apply Changes**. Only the selected group's ledgers appear to map with RazorpayX.
>         - Click on the drop-down value that appears otherwise the mapping will not save.
>         

        
3. **Configure Bank Ledgers**. Select the relevant bank Ledger to map with RazorpayX Lite account, and similarly map the relevant ledgers with your listed bank accounts. You can search in the drop-down. Click **Next**. 
4. **Configure GST ledgers**. Select the relevant ledgers that records CGST, SGST and IGST- In case you have a common ledger, you can select the same ledger multiple times. Selecting GST ledgers are mandatory. 
5. **Configure TDS Ledgers**. You can map the required TDS ledgers from the drop-down or click **Next** to skip TDS ledgers.
6. **Import Vendors from Tally**. You can either **Map Existing Vendors** or **Import all Vendors**. If you have an existing account on RazorpayX and Tally, we recommend you to **Map Existing Vendors** to avoid duplication. RazorpayX vendor list is displayed, select the relevant tally ledger for each vendor, manually. After the process is complete, click **Next**.
7. **Import Items from Tally**. You can either **Map Existing Items** or **Import all Items**. After the process is complete, click **Next**.
8. **Configure Indirect Income Ledgers**. Select the relevant ledger for **Discounts** and **Adjustments**. Click **Next**.
9. **Setup Expense and Purchase Ledgers**. Click **Change**, select the relevant ledger and click **Apply Changes** for purchase ledger and expense ledger, respectively. Click **Next**.

Your Tally integration with RazorpayX is successful. The time it takes to sync depends on the number of ledgers you have on tally. It syncs only for the specific company that you choose and not all the companies stored in your tally account. 

The [**Accounting** tab](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/accounting.md) appears on your RazorpayX Dashboard left navigation. You can change the existing settings from **Accounting** → [**Rules & Configuration**](#rules--configuration) at any time.

> **INFO**
>
> 
> **Handy Tips**
> 
> We recommend you to hard refresh your RazorpayX Dashboard to ensure the synced data is updated at all times. 
> - **Hard refresh for**:
>     - **Mac users**: command ⌘ + shift + R
>     - **Windows users**: Ctrl + F5
> 

Go to Tally and click **RazorpayX Sync**. 

## Accounting on RazorpayX Dashboard

After you integrate with Tally, navigate to the Accounting tab from the [RazorpayX Dashboard](https://x.razorpay.com/). You can sync your payouts and vendor payments to Tally here.

Payouts are listed under the **Expenses** tab and Vendor Payments are listed under the **Bills** tab. (update image to tally)

## Rules & Configuration

The following are the available settings for your Tally Integration:

   
### General

       You can choose to disable or enable the following options:

         - Sync and Categorise [Vendor Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/accounting/zohobooks/vendor-payments.md) from RazorpayX to Tally
         - Sync and Categorise [Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/accounting/zohobooks/payouts.md) from RazorpayX to Tally

       You can also **Refresh** Tally Expense Accounts, Bank Ledgers and Tax Groups.
      

   
### Rules

       Setting rules will automate categorisation and hence reduce the manual effort drastically. You can set the following rules:
       - Contact Rules
         - Set contact rules for [categorisation of Vendor Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/accounting/zohobooks/vendor-payments.md#categorise).
         - Select the drop-down under Tally Expense Account and choose the relevant Account for the particular contact. You can also **Add Contact +** and add a new rule for it.
         
       - Purpose Rules
         - Set purpose rules for [categorisation of Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/accounting/zohobooks/payouts.md#categorise).
         - Select the drop-down under Tally Expense Account and choose the relevant Account for the particular RazorpayX Purpose and select the relevant Tax Slab. You can also **Add Purpose +**.
         
      

   
### Contact Mapping

       Select the relevant Tally Vendor from the drop-down menu or **+ Create New Vendor** to map it to the particular RazorpayX Contact to avoid duplication of vendors on Tally.

         
      

   
### Account Mapping

       Setup ledgers in Tally for RazorpayX accounts. Select the Tally Expense Account you want to map with the particular RazorpayX Account.
