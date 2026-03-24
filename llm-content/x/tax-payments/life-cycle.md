---
title: Tax Payment Life Cycle on RazorpayX
heading: Tax Payment Life Cycle
description: Check the states of a tax payment and their significance.
---

# Tax Payment Life Cycle

Following are the 2 life cycles in tax payments:
- [Tax Payment Life Cycle](#tax-payment-life-cycle)
- [Payout Life Cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/states-life-cycle.md)

Following is the tax payment life cycle.

![tax payment life cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-tax-payments-tax-payments-life-cycle.jpg.md)

## Unpaid

The TDS payment is uploaded to our system. A payout may have been created, but not successfully made against the TDS payment.

Possible payout states:
-  Payout not yet created.
- `rejected`
- `cancelled`
- `failed`
- `reversed`

## Processing

The TDS payment is being processed. A payout is created and is being processed.

Possible payout states:
- `pending`
- `queued`
- `processing`

From the `processing` states, the payout can go back to the `unpaid` state if:
- If you cancel or reject the payout.
- If the payout fails or is reversed.

## Paid

The TDS payment was successful. Possible payout state: `processed`.

After the TDS is successfully paid, you can download the challan from the Dashboard and file the TDS as per your convenience.

## Cancelled

You have manually cancelled the TDS payment from the Dashboard.

- You can only cancel a TDS payment in the `unpaid` state.
- You cannot cancel a TDS payment after a payout is initiated for it.

### Related Information

- [Tax Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tax-payments.md)
- [Tax Payments - Standard User Roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams.md#tax-payments)
- [Payout Life Cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/states-life-cycle.md)
