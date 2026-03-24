---
title: Direct Settlements
description: Overview of how Razorpay manages Direct Settlements. Know how the money gets settled in your bank account.
---

# Direct Settlements

In Direct Settlements, the bank settles the amount directly to your bank account. Razorpay does not have access to your funds as the bank directly settles the amount into your account.

## Advantages

With Razorpay Direct Settlements, you can:

- Accept payments via multiple payment modes, such as net banking, UPI, or certain credit and debit cards.
- Look forward to faster settlements as it facilitates the bank to settle money directly to your account.
- Expect clean fee management. This is the fee that Razorpay charges for the amount settled in your account.

## Prerequisites

To facilitate a successful end-to-end Direct Settlement transaction:
- Create a Razorpay Account.
- Ensure to have a banking account after successful [KYC verification](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up/#kyc-verification.md).

## Direct Settlement Flow

Unlike [Razorpay Settlements](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements.md), the **Direct Settlement** process skips the flow of money into your Razorpay account. It lets the partner payment gateway or an acquiring bank settle funds directly into your account. As this is a merchant-level configuration, it prevents settlement creation for payments received on your Razorpay account.

Following is the Direct Settlement flow diagram:

![direct settlement cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-direct-settlement-cycle.jpg.md)

The credits settled to your account are authorized by Razorpay, regardless of the settlement transaction data available in the Razorpay system.

> **INFO**
>
> 
> **Handy Tips**
> 
> Any payments for Direct Settlements are auto-captured irrespective of using the Orders API.
> 

## Managing Credits

Following are the two scenarios on how Razorpay manages extra credits for Direct Settlement merchants:

- **Scenario 1** 

Where the payment is marked as `failed` by the Razorpay system but is settled to your account, Razorpay can forcefully authorise the transaction as per the confirmation from the bank.
- **Scenario 2** 

Sometimes, multiple payments with the same Payment ID get created due to the **payment retry option** provided by Payment Service Provider (PSP)/bank gateway. These payments never reach Razorpay and are directly settled to your account. As Razorpay does not receive the payment information, your Dashboard does not reflect such payments. Due to this, you are also unable to refund the payment. To tackle such situations, Razorpay will create new payments and authorise them for the extra credits. You will have complete control over refunding such transactions.

## Payment Methods

We support the following payment methods for Direct Settlements. The banks that support Direct Settlements are based on the payment methods. You can accept payments using the following payment methods:

### Netbanking

We support direct settlements for netbanking payments made from the following banks:

Bank Name | Bank Code
---
Axis Bank | `UTIB`
---
HDFC Bank | `HDFC`
---
ICICI Bank | `ICIC`
---
IDFC First Bank | `IDFB`
---
IndusInd Bank | `INDB`
---
Kotak Bank | `KKBK`
---
State Bank of India | `SBIN`
---
YES Bank | `YESB`

### Debit and Credit Cards

We support direct settlements for debit and credit card payments made from the following banks:

Bank Name | Bank Code
---
American Express | `AMEX`
---
HDFC Bank | `HDFC`

### UPI

We support direct settlements for UPI payments made from the following bank:

Bank Name | Bank Code | TPV flow
---
Axis Bank | UTIB | Collect
---
ICICI Bank | ICIC | Intent and Collect

## Handling Fees
Following are the two models in which Razorpay charges the fees:

- **Prepaid model**: The fee amount is either subtracted from your account balance or adjusted with fee credits. Razorpay settles the entire transaction amount to your account.
- **Postpaid model**: Razorpay settles the entire transaction amount to your account and raises an invoice at the end of the month for fees due on all the transactions.

## Handling Refunds

Direct Settlement refunds are handled by banks, and Razorpay has no control over them. Following are the two ways in which we support refunds for Direct Settlements:

- **Direct Settlements with Refund**
    - Settlements for payments are credited to your bank account.
    - The refund amount is instantly debited from your bank account.
- **Direct Settlements without Refund**
    - Settlements for payments are credited to your bank account.
    - The refund amount is instantly debited from your Razorpay account balance and is debited from the net settlements in the subsequent settlement cycle between Razorpay and merchants.

## Use Cases

Refer to the following scenarios about how Direct Settlements helps you to accept payments.

- **Acceptance of Payments Using Various Modes**

    You can accept payments from various payment methods. Integrate with Razorpay to enable payments for those modes for which Razorpay cannot become an acquirer.

- **Time-bound Settlements**

    These settlements require the money to be settled to them before a particular time of the day.

    ### Example
    Acme Corporation offers various mutual fund products and brokerage services to its customers. They require the money to be settled to them before a certain time of the day, without fail, for the customer to get the NAV (Net Asset Value) of that particular day. With Razorpay, Acme Corporation opts for Direct Settlements, as it expects funds immediately for NAV bookings. It saves time as the Direct Settlement process skips the step of flowing money into your Razorpay account and lets the partner payment gateway/PSP or an acquiring bank settle funds directly.
