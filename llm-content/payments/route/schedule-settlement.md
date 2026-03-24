---
title: Schedule Settlements
description: Schedule settlements for your Linked Accounts.
---

# Schedule Settlements

You can assign a settlement schedule for your linked accounts and update it anytime. By default, every new Linked Account is created with the same settlement schedule assigned to your main account. 

**Example**

If your main Razorpay account has a T+2 schedule, all Linked Accounts you create will also have a T+2 schedule by default.

> **INFO**
>
> 
> **Settlement Schedule for Linked Accounts**
> 
> - Reach out to our [Support team](https://razorpay.com/support/#request) to set or update the settlement schedule of your Linked Accounts.
> - Settlement schedule for the Linked Accounts can only exceed or be equal to the settlement schedule of the main account. For example, if the main account settlement schedule is set to T+2, the Linked Account's settlement schedule should not be lesser than T+2.
> 

## Settlement Settings for Linked Accounts

In addition to the account-level schedule explained above, you can also define the settlement of the individual transfer using the following options:

    
        By default, all payment transfers are settled according to the settlement schedule defined for the Linked Account. You can choose to defer settlements for a transfer indefinitely by putting it on hold. In this case, the settlement for the transfer happens once you allow it. 
    
    
        You can set a time until which the settlement for the transfer should defer. Once this time has elapsed, Razorpay settles the funds to the Linked Account on the next business day. 

        For example, if you have set an `on_hold_until.` timestamp corresponding to 7:00 PM on 23/03/2021, we will settle the amount to the Linked Account on 24/03/2021.

        You can modify the above mentioned transfer settlement options via the API or Dashboard. On enabling the settlement, the initially defined settlement schedule will apply.

        **Example**
        A Linked Account follows a T+2 cycle settlement schedule.

        - If a transfer is created with `settle = false` and is set to `true` after 10 days, the settlement for that transfer happens immediately (during bank business hours).
        - If the transfer settlement is allowed on T+1, the settlement happens only on T+2.
    

### Settlement Status

The following table lists settlement statuses and their description:

Status | Description
---
`pending` | This status indicates that the transfer is processed and the settlement is pending. You can create the reversal if required.
---
`on_hold` | If you have used the `on_hold` parameter to hold settlements for the transfer and do not pass the `on_hold_until` parameter to define till when it should be `on_hold`, the transfer will be on hold indefinitely. We will mark such transfers as `on_hold.`
---
`settled` | When the transfer is settled to the Linked Account.
---

### Related Information
- [Transfer Funds to Linked Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/transfer-funds-to-linked-accounts.md)
- [Transfers and Related Fees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/transfer-fees-example.md)
- [Payment Reversals](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/reversal.md)
- [Refund to Customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/refund.md)
