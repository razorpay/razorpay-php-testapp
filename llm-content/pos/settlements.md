---
title: Settlements on Razorpay POS
heading: About Settlements
description: Check how Razorpay settles money received from your customers to your bank account- Settlement Cycle, Partial Settlements and Settlement States.
---

# About Settlements

Settlement is the process in which the money received from your customers is settled in your bank account. Settlements for all payments are done in INR (Indian Rupees), irrespective of the currency in which the customer made the payment. Once Razorpay receives the amount, it is settled in your bank account after deducting fees.

#### Prerequisites

Following are some of the prerequisites for settlements of payments from customers to your bank account:
- Your account must be KYC approved.
- Your account must be fully activated for payments to be settled to your bank account. Know more about [KYC Verification](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up/#2-submit-kyc-details.md).

## Settlement Cycle

We automatically settle captured payments to the bank account you submitted to us during your [KYC verification](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up/#2-submit-kyc-details.md) following our settlement cycle. The settlement cycle is subject to bank approval and can vary based on your business vertical, risk factors and so on.

![Checkout screen with details of Settlement Cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settlement_cycle.jpg.md)

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Working days do not include the bank holidays.
> 

## Domestic Settlements

The standard settlement cycle for domestic payments is `T+1` working days (where `T` is the date of transaction capture).

    
### Example

         You captured 20 payments on February 02, 2019, at 9:00 a.m., and your settlement schedule is `T+1` days. The payments you captured on February 02, 2019, were settled in your bank account on February 03, 2019, at 9:00 a.m. If the settlement day is a bank holiday, the settlement is made on the next working day after the bank holiday.
        

## Partial Settlements

Razorpay initiates partial settlements when your settleable amount exceeds your current live balance (when the settlement is scheduled). Razorpay accurately calculates the settleable amount based on the live balance, ensuring that settlements are not skipped. When settling transactions, we will only choose the ones that add up to your current live balance.

This ensures that your settlements are timely and regular and you can maintain stable cash flow.

    
### Example 1

         You captured a payment of ₹1000 on July 02, 2023, and your settlement schedule is T+1 days, 5:00 p.m. Hence, the live balance is ₹1000, which will be the settlement amount. 
         
         However, on July 02, 2023, you had to refund your customer ₹100. Due to this, your live balance is ₹900. As the current live balance is lesser than the settlement scheduled, Razorpay will initiate partial settlements and settle your current live balance of ₹900.
        

    
### Example 2

         You captured three payments of P1 - ₹500, P2 - ₹300 and P3 - ₹200 on July 02, 2023, and your settlement schedule is T+1 days, 5:00 p.m. Hence, the live balance is ₹1000, which will be the settlement amount.

         However, on July 02, 2023, you had to refund your customer ₹100. Due to this, your live balance is ₹900. As the current live balance is lesser than the settlement scheduled, Razorpay will initiate partial settlements and settle transactions P1 and P2 on T+2 as it adds up to ₹900. P3 will be scheduled for the next day, shown as an upcoming settlement, and paid in the next slot.
        

## Settlement States

@include settlements/settlement-life-cycle

## Dashboard Actions

You can perform the following actions from the Razorpay Dashboard:

- [View settlement details](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/settlements/dashboard/#view-settlements-using-dashboard.md)
- [Check settlements break-up](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/settlements/dashboard/#settlements-break-up-description.md)
- [Enable settlements on hold](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/settlements/dashboard/#enable-settlements-placed-on-hold.md)
- [View reports related to settlements](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/settlements/dashboard/#reports.md)

### Related Information

- [Settlement FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/settlements/faqs.md)
