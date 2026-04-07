---
title: RazorpayX Payout Links Life Cycle
heading: Payout Links Life Cycle
description: Check the RazorpayX Payout Link life cycle and its states from start to end.
---

# Payout Links Life Cycle

A Payout Link can have the following statuses during its life cycle:

- `pending`
- `issued`
- `processing`
- `processed`
- `cancelled`
- `expired`
- `rejected`

### Pending

As soon as a Payout Link is created, it immediately moves to the `pending` state as shown in the image below. The Payout Link remains in this state until it is sent for approval. This status is applicable only for cases where [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) is enabled.

For cases where workflow is not applicable, Payout Link status is updated to `issued` immediately.

### Issued

This is the first state a Payout Link acquires when you create and send it to your Contact. The Payout Link remains in the `issued` state until your Contact takes any action.

From the `issued` state, a Payout Link can move to the following states:
  - `processing`: moves to this state when your Contact provides their Fund account details.
  - `cancelled`: moves to this state when you cancel the Payout Link.

### Processing

A Payout Link moves to this state from the `issued` state when your Contact provides their Fund account details. From the `processing` state, a Payout Link moves to the following states:
  - `processed`: moves to this state when the payout to your contact is completed.
  - `issued`: moves to this state if the underlying Payout fails. The Contact can try to enter their Fund account details again. No action is required by you.

### Processed

A Payout Link moves to this state from the `processing` state when the payout to your contact is completed. This is the last state of the Payout Link.

### Cancelled

A Payout Link moves to this state if you cancel it. A Payout Link can move to this state from the `issued` state.

This is a last state for the Payout Link.

### Expired

A Payout Link moves to this state when the payout amount is not claimed by your contact within the stipulated date and time. A Payout Link that has expired can be duplicated to create another Payout Link without having to enter contact or amount details.

Know how you can [set Payout Links to expire](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/set-expiry.md) after a certain duration. 

### Rejected

A Payout Link moves to the `rejected` state if it is rejected by the Approver. This status is applicable only for cases where [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) is enabled.

## Payout Life Cycle

Once your contact clicks on a Payout Link and enters their details, a payout is created. These payouts an have the following statuses during its life cycle:

- `pending`
- `queued`
- `processing`
- `processed`
- `reversed`
- `cancelled`
- `rejected`
- `failed`

Refer to [Payout Life Cycle and States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#payout-life-cycle) for more information.

### Related Information

- [About Payout Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links.md)
- [Bulk Payout Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/bulk.md)
- [Shopify Payout Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/shopify.md)
