---
title: Transfer Funds to Linked Accounts
description: Transfer funds via Orders, Payments or directly to your Linked Accounts.
---

# Transfer Funds to Linked Accounts

You can transfer funds to your Linked Accounts using the following methods:

  - **Orders**: Transfer funds to Linked Accounts at the time of order creation.

  - **Payments**: Transfer funds to Linked Accounts from the payment received from a customer.

- **Direct Transfer**: Transfer funds to Linked Accounts directly from your account balance using Direct Transfers.

#### Prerequisites

1. Create Linked Accounts. **Linked Accounts have a cooling period of 24 hours after which you can initiate transfers.**
2. Provide [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/linked-account.md) access to the Linked Account to ensure transparency between the two parties, such as:
    - Linked Account holders can also download reports for further processing and reconciliation.
    - Linked Account holders can view all transactions reflected on one single dashboard.
3. Ensure the Direct Transfer feature is enabled for your account. Contact our [support team](https://razorpay.com/support/#request) for more information.

## Transfer Funds to Linked Account via Orders

The transfers can be set up at the time of order creation. After the payment is captured and the order is paid, the transfer is automatically created and settled to the respective Linked Accounts.

This eliminates the extra step of triggering the [Direct Transfers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/direct-transfers.md) or [Transfers via Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/create-transfers-payments.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> The Transfers set up during order creation can only be done using APIs.
> 

To initiate transfers while creating orders:
1. Create an Order using the [Transfer via Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/create-transfers-orders.md).
2. [Capture the Payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md#capture-payments).
3. Set up the [webhook event `transfer.processed`](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> - You cannot create transfer on an order which has `partial_payment` parameter enabled. Ensure that this parameter is set to `false`.
> - You cannot create transfers on an order for international currencies. This feature is available for INR currency only.
> - If a **Transfer via Order** initiated by you fails, we will retry this transfer starting from the next day on consecutive days. There will be a maximum of 3 retries.
> 

## Transfers Funds to Linked Accounts via Payments

You can initiate a transfer from a payment received from a customer. This can be done from the Dashboard or using the [Create Transfers from Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/create-transfers-payments.md).

### Transfers Funds to Linked Accounts via Payments Using Dashboard

**Checklist for Dashboard Operation**

- The currency of the payment should be INR.
- The payment through which you want to make a transfer should be in the `captured` state.
- The amount should not exceed the initial payment amount.
- The amount you want to transfer to a Linked Account is less than the initial amount.

    

> **WARN**
>
> 
>     **Watch Out!**
> 
>     You must subtract fees and tax to calculate the amount that is to be allowed to transfer.
>     

Watch this video to see how to transfer funds to a Linked Account from the payment received from the customer.

### To initiate a transfer via payment from the Dashboard:

1. Log in to the Dashboard and click **Route** under **PAYMENT PRODUCTS**.
2. Under the **Payments** tab, click the relevant **Payment ID**.
3. On the Payment details pane,
    1. Select the Linked Account to which you want to transfer payment.
    2. Enter the billing amount. It can be a full or partial transfer.
    3. Select either of the following **Settlement Schedule** option:
        1. **Settle Now**: Use this to settle the payment in the next settlement slot. If your schedule is T+3, the transfer will happen accordingly.
        2. **Schedule Settlement On**: Select this to schedule the transfer to a later date using the calendar.
        3. **Put on Hold**: Use this to defer the transfer until specified otherwise.
4. Add internal notes relevant to the transfer if any. You can choose to share the note with your Linked Account.
5. Click **Create Transfer**.

## Transfer Funds to Linked Accounts Via Direct Transfers

You can transfer funds to your Linked Accounts directly from your account balance using Direct Transfers. You can make direct transfers from the Dashboard or using the [Direct Transfer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route/direct-transfers.md).

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your account.
> - For Dashboard operation, ensure the nodal account has sufficient balance for the amount to be transferred.
> 

Watch this video to see how to direct transfer funds to a Linked Account.

### To initiate a direct transfer from the Dashboard:

1. Log in to the Dashboard and click **Route** under **PAYMENT PRODUCTS**.
2. Under the **Transfers** tab, click **+Create Direct Transfer**.
    
3. On the **Create Direct Transfer** pop-up page, provide the following details:
    1. **Account**: Select the Linked Account to whom the amount should be transferred.
    2. **Billing Amount**: Enter the amount to be transferred.
    3. **Settlement Schedule**: The following options are available:
        1. **Settle Now**: Settle the transfer in the next settlement cycle.
        2. **Schedule Settlement on**: Settle the amount on a scheduled date.
        3. **Put on hold**: Put the settlement on hold indefinitely.
    4. **Notes**: You can add any additional information regarding the transfer.
4. Click **Create Transfer**.
    

## Transfer Status

The following table lists transfer statuses and their description:

Status | Description
---
`created` | As soon as the transfer is initiated, it moves to the `created` state. Transfers via payments and direct transfers will immediately move to the `pending` state from the `created` state. However, the transfer will stay in the `created` state for transfers via orders until the order is paid.
---
`pending` | The transfer will be in the `pending` state till the transfer is waiting to be processed.
---
`processed` | Once the transfer is processed, the status will change from `pending` to `processed`. 
 You can initiate the reversal if required.
---
`failed` | If the transfer processing fails because of errors like insufficient balance, the transfer status will change to the `failed` state. 
 You can proceed to create a new transfer request.
---
`reversed` | If the complete reversal is done for the transfer, then it will be marked as `reversed`.
---
`partially_reversed` | If the partial reversal is done on transfer, it will be marked as `partially_reversed`.
---

### Related Information
- [Transfers and Related Fees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/transfer-fees-example.md)
- [Schedule Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/schedule-settlement.md)
- [Payment Reversals](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/reversal.md)
- [Refund to Customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/refund.md)
