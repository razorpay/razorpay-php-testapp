---
title: Settlements - Dashboard Actions
description: View settlement details, check the settlements break-up, enable settlements on hold and view reports from the Razorpay Dashboard.
---

# Settlements - Dashboard Actions

## View Settlements Using Dashboard

You can view details of settlements made to you from the Dashboard.

@include settlements/view-settlements

### View Channel-Wise Settlements

    
### Benefits of Channel-Wise Settlements

        - **Zero cross-channel failures**: POS settlements will not fail due to online refunds.
        - **Clear fund visibility**: Know exactly how much you have in each channel.
        

If you are an omni-channel business (Online (Domestic transactions + International Cards)) or cross-border business (Alternate Payment Method (International)), your settlements are processed separately for each channel type. This provides complete fund isolation and eliminates cross-channel settlement failures.

### Understand Segregated Settlements

With balance segregation, settlements are organised by channel type:

Channel Type | Description | Transactions Included | Additional Details
---
Online (Domestic transactions + International Cards) | Domestic online payments and international card transactions | PG domestic transactions (cards, UPI, netbanking and wallets), international card payments | Supports Instant Settlements.
---
In-Person | POS terminal transactions | All POS/offline transactions | POS device rentals are automatically collected from this balance. Operates independently from online transactions.
---
Alternate Payment Method (International) | Balance from international payment methods such as PayPal, Stripe and other cross-border payment methods | International bank transfers, cross-border payments via supported APM providers | Settled separately from domestic balances. Subject to forex conversion and international settlement timelines.

![razorpay settlements details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/account-settings-settlements-details-segg-bal.jpg.md)

Each channel type has its own settlement schedule and settlement history.

#### View Settlements by Channel

To view channel-wise settlements:

1. Log in to the Dashboard.
2. Navigate to **Settlements**.
3. Use the **Balance Type** filter to select the channel you want to view:

   - **Online (Domestic transactions + International Cards)** 
   - **In-Person** 
   - **Alternate Payment Method (International)** 

The settlements list will display only settlements for the selected channel.

#### Settlement Cards on Home Page

On the Dashboard home page, you will see separate settlement cards for each active balance:

- Each card shows the current balance, last settlement amount and next settlement date.
- Click on any card to view detailed settlement history for that channel.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> With segregated balances, you can now enable Instant Settlements for your PG Online balance even if you have POS or Cross-Border enabled. Previously, Instant setting were restricted for cross-border and omni-channel businesses.
> 
> 

### View Settlements Using API

You can view settlement details using the [Settlements API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/settlements.md).

### Settlements Break-Up Description

@include settlements/settlement-breakup

## View Settlement Timeline on Dashboard

You can view the settlement timeline to check when the settlement for a particular payment will be credited.

To view the settlement timeline:

1. Log in to the Dashboard.
2. Navigate to **Settlements**.
3. Click on the **details** of the settlement id for which you want to view the timeline.
4. You will be able to see the settlement timeline for that particular settlement id.

    ![Razorpay Dashboard - View settlement timeline](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/settlements-details-timeline.jpg.md)

5. Upon expanding the settlement timeline, you will be able to see the settlement schedule for that particular payment.
    

## Enable Settlements Placed On Hold

@include settlements/settlement-on-hold

## Reports

Detailed insights can be gained using reports and real-time data on the Dashboard. These reports can then be used for accounting and reconciliation purposes. Know more about [ reports.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/reports.md)

### Channel-Wise Settlement Reports

For businesses with segregated balances, settlement reports include:

- **Channel Type**: Identifies whether the transaction was from Online (Domestic transactions + International Cards), In-person and Alternate Payment Method (International).
- **Balance Account id**: Unique identifier for the specific balance account.

You can filter reports by channel type to reconcile settlements for each balance separately.

### Related Information

- [About Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md)
- [Settlements API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/apis.md)
- [ Settlement FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/faqs.md)
