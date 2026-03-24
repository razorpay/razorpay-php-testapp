---
title: Balances
description: Details about various balances available and how you can add funds and maintain them from the Razorpay Dashboard.
---

# Balances

There are two types of balances available on the Dashboard: 

- [Available Balance](#available-balance)
    - [Negative Available Balance](#negative-available-balance)
- [Reserve Balance](#reserve-balance)

## Available Balance

After the deduction of fees and tax, the payments received from your customers are added to your **Available Balance**. 
- This accumulated amount is settled to your bank account as per your settlement cycle.
- We use your available balance to process chargebacks, refunds to your customers and settlements to your linked accounts. 

Always maintain sufficient available balance in your account to ensure your transactions do not fail.

Your available balance is now segregated based on the channel type that is, **Online (Domestic transactions + International Cards), In-person and International**.

![account settings balances razorpay](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/account-settings-balances.jpg.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> - Refunds processed using your available balance incur no extra charges. We only deduct the refund amount. 
> - Fees and taxes from the original transaction are not reversed in you refund. As a result, you refund amount can be lesser than the original transaction.
> 

#### Negative Available Balance

Negative available balance is when your available balance becomes less than zero.
- If opening balance is ₹0, your negative balance is -₹500 (due to 0-500).
- If opening balance is ₹300, your negative balance is -₹200 (due to 300-500).

Negative balance impacts your customer satisfaction. Ensure you maintain sufficient available balance or add Reserve Balance. 

## Reserve Balance

Reserve Balance allows you to process refunds or settlements to linked accounts when you do not have a sufficient available balance/have [negative available balance](#negative-current-balance). The amount you add as the reserve balance becomes the maximum negative limit for your account. Your transactions up to this limit do not fail. 

### How does Reserve Balance Work

When your available balance becomes 0, we use your reserve balance to process transactions up to this limit, that is, ₹1000. Your transactions will not fail.

- To increase your negative balance limit, you can [add funds to your reserve balance](#add-funds-to-reserve-balance) from the Dashboard. You will have to transfer funds to your reserve balance only once in most cases.
- You can add funds to Reserve Balance using the Dashboard through either [UPI](#add-funds-to-reserve-balance) or [Bank Transfer](#add-funds-to-reserve-balance).

> **WARN**
>
> 
> **Watch Out!**
> 
> Add funds only through the settlement account registered with us.
> 

## Example of Available Balance and Reserve Balance

Let us say you have an available balance of ₹0 and a reserve balance of ₹1,000

Scenario | Without Reserve Balance | With Reserve Balance
---
Opening Balance | Available Balance → ₹0
Reserve Balance → ₹0| Available Balance → ₹0
Reserve Balance → ₹1,000
---
You receive and capture payment of ₹1000.

Let us say we charge a fee of ₹5 to process this transaction. | Available Balance → ₹995
Reserve Balance → ₹0| Available Balance → ₹995
Reserve Balance → ₹1,000
---
You process a full refund of ₹1000 for the above payment. | The refund fails since you do not have a sufficient available balance. | The refund is successfully processed.

Available Balance → negative ₹5
Reserve Balance → ₹1,000

### Add Funds to Reserve Balance

You can add funds to Reserve balance through UPI or bank transfer payment methods.

    
        To add funds to Reserve balance using UPI:
        1. Log in to the Dashboard.
        2. Click **Account & Settings** in the left navigation.
        3. Click **Balances** under **Payments and refunds** section.
        4. Click **Add Funds**.
            
            ![Add Reserve balance](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/reserve-balance.jpg.md)
            
        5. Select **UPI**.
        6. Enter the description and amount to be added.
        7. Click **Add Credits**.
        8. Enter the email and contact number on the checkout pop-up page and click **Proceed**.
        9. Select UPI, enter UPI ID or scan the QR, click **Pay Now** and complete the payment. 

        Your Reserve balance is updated.
        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         It may take 2-3 hours for the Reserve balance to reflect in your  Account.
>         

    
    
        To add funds to Reserve balance using bank transfer:
        1. Log in to the Dashboard.
        2. Click **Account & Settings** in the left navigation.
        3. Click **Balances** under **Payments and refunds** section.
        4. Click **Add Funds**.
        5. Select **Bank Transfer**.
        6. Copy the account number and IFSC code.
            
            ![Copy IFSC and account number](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/copy-ifsc.jpg.md)
            
        7. Open your netbanking portal, create a beneficiary with these details and transfer the amount.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         It may take 2-3 hours for the Reserve balance to reflect in your  Account.
>         

    

 300 is applicable. 

- If Opening balance is  0, your Negative balance is - 500 (due to 0-500).
- If Opening balance is  300, your Negative balance is - 200 (due to 300-500).

Because Negative balance impacts your customer satisfaction, ensure you maintain sufficient Current balance. 

## Add Funds to Current Balance

To add funds to your Current balance:

1. Log in to the Dashboard.
1. Navigate to **Account & Settings** and click **Balances** under **Payments and refunds** section.
1. Click **Add Funds** in the Current Balance section and follow the on-screen instructions.

> **INFO**
>
> 
> **Handy Tips**
> 
> When you add funds to your Current balance, fees and tax are deducted and the remaining amount is added to your Current balance. The fees and tax charged are the same as what is charged on payments received from customers.
> 
> For example, according to your pricing plan for a  1,000 payment, the fees and tax is  5. When you add  1,000 to your current balance,  5 (fees and tax) is deducted and  995 is added to your current balance.
> 

**Example 1**

Let us say you have a Current balance of  1,000.

Scenario | Current Balance
---
Opening balance |  1,000
---
You receive and capture a payment of  1,000.

Let us assume we charge a fee of  5 to process this transaction. |  1995

( 1,000 + ( 1,000 -  5))
---
You process a full refund of  1,000 for the above payment. |  995

( 1995 -  1,000)

**Example 2**

Let us say you have a Current balance of  0.

Scenario | Current Balance
---
Opening balance |  0
---
You receive and capture a payment of  1,000.

Let us say a fee of  5 is charged by us to process this transaction. |  995

( 0 + ( 1,000 -  5))
---
You try to process a full refund of  1,000 for the above payment. | The refund fails since you do not have a sufficient Current balance.

## Segregated Balances

Razorpay now supports balance segregation based on payment channel type. If you are an omni-channel business (PG + POS) or a cross-border business, your balances are maintained separately for each channel type.

    
### Benefits

        - **No cross-channel fund mixing**: Complete isolation between Online (Domestic transactions + International Cards), In-Person and APM International funds.
        - **Regulatory compliance**: Adherence to RBI guidelines on fund segregation.
        - **Zero settlement failures**: Settlements never fail due to cross-channel balance issues.
        - **Instant Settlements for all businesses**: Instant Settlements now available for omni-channel and cross-border businesses.
        - **Automated POS rental collection**: Device rentals deducted only from In-Person balance.
        - **Better visibility**: Clear channel-wise and balance view.
        

### Types of Segregated Balances

Channel Type | Description | Transactions Included | Additional Details
---
Online (Domestic transactions + International Cards) | Domestic online payments and international card transactions | PG domestic transactions (cards, UPI, netbanking and wallets), international card payments | Supports Instant Settlements.
---
In-Person | POS terminal transactions | All POS/offline transactions | POS device rentals are automatically collected from this balance. Operates independently from online transactions.
---
Alternate Payment Method (International) | Balance from international payment methods such as PayPal, Stripe and other cross-border payment methods | International bank transfers, cross-border payments via supported APM providers | Settled separately from domestic balances. Subject to forex conversion and international settlement timelines.

### How Segregated Balances Work

With balance segregation:

- **Credit Operations**: When a payment is captured, it is credited to the appropriate balance based on the payment channel:
  - Domestic online payment → Online balance
  - International card payment → Online balance
  - POS transaction → In-Person balance
  - International APM payment → APM (International) balance
- **Debit Operations**: Settlements, refunds, chargebacks and adjustments are processed only from the respective balance account. A refund for a POS payment will only debit from your PG In-Person balance.
- **Independent Settlements**: Each balance account has its own settlement cycle and can have Instant Settlements enabled independently.

### View Segregated Balances

You can view your segregated balances on the Dashboard:

1. Log in to the Dashboard.
2. On the Home Page, you will see separate balance cards for each active balance account.
3. Navigate to **Account & Settings** → **Balances** for a detailed view.

Each balance card displays:

- Current balance amount.
- Channel type (Online (Domestic transactions + International Cards), In-Person or APM International).
- Next settlement date.
- Link to view settlement history.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> With segregated balances, your POS operations and online payments work completely independently. A high volume of online refunds will never affect your POS settlements and vice versa.
> 
> 

## FAQs

    
### 1. Can I transfer funds between my segregated balances?

         No, inter-channel fund transfers are not supported to maintain regulatory compliance and fund isolation.
        

    
### 2. How are refunds handled with segregated balances?

         Refunds are debited from the same balance where the original payment was credited. For example, an In-Person payment refund will debit from your In-Person balance, not your Online (Domestic transactions + International Cards) balance.
        

    
### 3. Why are international card payments in the Online balance but international APM in a separate balance?

         International card transactions flow through similar payment rails as domestic cards, so they are grouped in the Online (Domestic transactions + International Cards) balance. International Alternate Payment Methods use different payment flows and are therefore maintained in a separate APM (International) balance for proper fund isolation.
        

    
### 4. Will my Reserve Balance work with segregated balances?

         Reserve Balance functionality remains available. Contact our [support team](https://razorpay.com/support/)  for specific configuration based on your balance structure.
        

### Related Information 

- [About Account and Settings](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings.md)
- [About Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard.md)
