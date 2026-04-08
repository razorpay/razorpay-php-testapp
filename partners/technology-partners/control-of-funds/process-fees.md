---
title: Process Platform and Third-Party Fees | Technology Partners
heading: Process Platform and Third-Party Fees
description: Process platform and third-party fees and transfer them to your Linked Accounts.
---

# Process Platform and Third-Party Fees

After setting up the platform and third-party accounts, you can deduct your platform and third-party fees from the transaction amount while creating an order. After the payment is captured and the order is paid, transfers are automatically created and settled to the respective Linked Accounts.

## Create Transfers from Orders

You can transfer platform and third-party fees when creating an order using the Orders API. Pass the `transfers` parameters as a part of the Order API request body.

Use the `access_token` generated in the [build integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps.md#22-get-access-token) step to authenticate using `Bearer Auth`.

The following endpoint lets you transfer the funds while creating an order.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders \
-H 'Authorization: Bearer ' \
-H 'content-type: application/json'
-d '{
  "amount": 1000000,
  "currency": "INR",
  "transfers": [
    {
      "account": "acc_KD088uBnQf0XeK",
      "amount": 800000,
      "currency": "INR",
      "notes": {
        "account": "Seller Account"
      },
      "linked_account_notes": [
        "account"
      ]
    },
    {
      "account": "acc_KD097GTiIju5WG",
      "amount": 150000,
      "currency": "INR",
      "on_hold": true,
      "notes": {
        "account": "3PL Account"
      },
      "linked_account_notes": [
        "account"
      ]
    },
    {
      "account": "acc_KD09wcp6WYoLkC",
      "amount": 50000,
      "currency": "INR",
      "on_hold": true,
      "notes": {
        "account": "Acme Account"
      },
      "linked_account_notes": [
        "account"
      ]
    }
  ]
}'

```json: Response
{
  "id": "order_KIXh9qnUDSP2w1",
  "entity": "order",
  "amount": 1000000,
  "amount_paid": 0,
  "amount_due": 1000000,
  "currency": "INR",
  "receipt": null,
  "offer_id": null,
  "offers": {
    "entity": "collection",
    "count": 0,
    "items": []
  },
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1663324917,
  "transfers": [
    {
      "id": "trf_KIXh9v2aie0iPT",
      "entity": "transfer",
      "status": "created",
      "source": "order_KIXh9qnUDSP2w1",
      "recipient": "acc_KD088uBnQf0XeK",
      "amount": 800000,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "account": "Seller Account"
      },
      "linked_account_notes": [
        "account"
      ],
      "on_hold": false,
      "on_hold_until": null,
      "recipient_settlement_id": null,
      "created_at": 1663324917,
      "processed_at": null,
      "error": {
        "code": null,
        "description": null,
        "reason": null,
        "field": null,
        "step": null,
        "id": "trf_KIXh9v2aie0iPT",
        "source": null,
        "metadata": null
      }
    },
    {
      "id": "trf_KIXh9xbsUUaFwz",
      "entity": "transfer",
      "status": "created",
      "source": "order_KIXh9qnUDSP2w1",
      "recipient": "acc_KD097GTiIju5WG",
      "amount": 150000,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "account": "3PL Account"
      },
      "linked_account_notes": [
        "account"
      ],
      "on_hold": true,
      "on_hold_until": null,
      "recipient_settlement_id": null,
      "created_at": 1663324917,
      "processed_at": null,
      "error": {
        "code": null,
        "description": null,
        "reason": null,
        "field": null,
        "step": null,
        "id": "trf_KIXh9xbsUUaFwz",
        "source": null,
        "metadata": null
      }
    },
    {
      "id": "trf_KIXh9yfD5pSrmg",
      "entity": "transfer",
      "status": "created",
      "source": "order_KIXh9qnUDSP2w1",
      "recipient": "acc_KD09wcp6WYoLkC",
      "amount": 50000,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "account": "Acme Account"
      },
      "linked_account_notes": [
        "account"
      ],
      "on_hold": true,
      "on_hold_until": null,
      "recipient_settlement_id": null,
      "created_at": 1663324917,
      "processed_at": null,
      "error": {
        "code": null,
        "description": null,
        "reason": null,
        "field": null,
        "step": null,
        "id": "trf_KIXh9yfD5pSrmg",
        "source": null,
        "metadata": null
      }
    }
  ]
}
```

Pass the Linked Account id of the receiver of the transfer in the `account` parameter under the `transfers` object.
- To transfer the platform fees, add the Linked Account id of your platform.
- To transfer the third-party fees, add the Linked Account id of the corresponding third party.

The parameter descriptions and errors are present in the [Create Transfers from Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route.md) documentation.

## Set Up Webhooks

To receive notifications on when a transfer is processed, set up the [`transfer.processed` webhook event](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md). Check the [sample payload for Transfer Processed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/route.md#transfer-processed).

> **WARN**
>
> 
> **Watch Out!**
> 
> - You cannot create transfers on an order which has `partial_payment` parameter enabled. Ensure that this parameter is set to `0`.
> - You cannot create transfers on an order for international currencies. Currently, this feature is available for INR only.
> - If a **Transfer via Order** initiated by you fails, we will retry this transfer starting from the next day on consecutive days. There will be a maximum of 3 retries.
> 

## Related Information 

- [Set up Platform and Third-Party Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/control-of-funds/set-up-accounts.md)
- [Refunds and Reversals](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/control-of-funds/refunds-and-reversals.md)
