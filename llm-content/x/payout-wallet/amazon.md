---
title: RazorpayX | Amazon Payout Gift Card
heading: About Amazon Payout Gift Card
description: Make payouts to an Amazon Pay Gift Card via the RazorpayX Dashboard and understand the terms and conditions applicable.
---

# About Amazon Payout Gift Card

You can make payouts to Amazon Pay Gift Cards using your [RazorpayX Lite](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/razorpayx-lite.md). Once you process the payout, the amount gets instantly credited to your end customer's Amazon Pay Gift Card balance. 

You can make payouts of up to ₹10,000 (per transaction) to the beneficiary. There is no limit to the number of transactions you can make. 

All you need to create and process the payout is the beneficiary's phone number. The beneficiaries do not need to have their KYC completed on their Amazon Pay account to receive the Amazon Pay Gift Card balance.

## Making Payouts to Amazon Pay Gift Card Wallet

> **INFO**
>
> 
> **Handy Tips**
> 
> - This feature is available only on [RazorpayX Lite](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/razorpayx-lite.md).
>     - You cannot make payouts to Amazon Pay directly from your RazorpayX - Current Account. You must add funds to RazorpayX Lite and make payouts.
> - Transaction limit is ₹10,000/- per transaction.
>     - There is no limit on the balance an end customer can have in their Amazon Pay Gift Card balance.
> - Amazon Pay Gift Card balance works same as the Amazon Pay Wallet balance.
> 

## How it Works

1. Create a [Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts/#create-a-contact-with-fund-account.md).
2. Create a Fund account with `type: wallet` and `provider: amazonpay`.
3. Create a payout with `mode: amazonpay`.
4. The money is credited to the Amazon Pay Gift Card balance linked to the beneficiary's phone number.

## Payout Life Cycle

See: [Payout states and life cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle.md).

## Actions

Action | API | Dashboard | Bulk Upload
---
Create a payout via Amazon Pay | ✓ | ✓ | x
---
View payout details | ✓ | ✓ | x

Know more about [creating a Fund account via API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-wallet/create/fund-account.md) with `type: wallet` and `provider: amazonpay` and [creating payouts via Amazon Pay](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-wallet/create/payout.md).

## Terms and Conditions

Amazon Pay Gift Cards are issued by Pine Labs Private Limited under the brand name of Qwikcilver and co-branded with Amazon Pay (India) Private Limited. Below are the terms and conditions when making a payout via an Amazon Pay gift card:

- Any unused Gift Card balance will remain associated with the redeemers Amazon Pay balance account and applied to purchases in order of earliest expiration date. 
- Gift Cards, including any unused Gift Card balances, expire one year from the date of issuance. You may request for revalidation of any expired Gift Cards. Upon receipt of such request, the Gift Card may be revalidated after due verification and subject to applicable terms and conditions. 
- Gift Cards may only be purchased in denominations ranging from ₹10 to ₹ 10,000, or such other limits as Pine Labs may determine.
- Gift Cards cannot be used to purchase other gift cards. 
- Gift Cards cannot be reloaded, resold, transferred for value or redeemed for cash. Except as provided hereunder or as per applicable law, amount in your Gift Cards will not be refunded to you under any circumstances. No refund will be provided in cash, at any point of time. 
- Pine Labs is not responsible if a Gift Card is lost, stolen, destroyed or used without permission.
- For complete terms and conditions, see the [Amazon India Gift Card Terms and Conditions](https://www.amazon.in/gp/help/customer/display.html?nodeId=201522810).
- You can view your [gift card transaction statement](https://amazonbal.qwikcilver.com).

## Branding Guidelines

The Amazon brand is a valuable company asset to Amazon. You can use the Amazon name, logo and wallet image in a limited capacity within the requirements outlined by Amazon. 

Know more about to the [Amazon Branding Guidelines](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-wallet/amazon/branding-guidelines.md).

> **INFO**
>
> 
> **Payouts Demo**
> 
> [Check out the RazorpayX Payouts Demo](https://x.razorpay.com/demo?utm_source=docs&utm_medium=fold&utm_id=demo) to understand how to create and make payouts in 4 simple steps. Experience making payouts in a jiffy, without having to sign up!
> 
> [![Payouts Dashboard Demo](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-payouts-demo.gif.md)](https://x.razorpay.com/demo?utm_source=docs&utm_medium=fold&utm_id=demo)
> 

### Related Information

- [Amazon Brand Guidelines](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-wallet/amazon/branding-guidelines.md)
- [Amazon Payout APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-wallet.md)
