---
title: Payment Settlement Control API
---

# Payment Settlement Control API

The following section describes the API to control the payment settlement.

```json: Request Payload
{
    "on_hold": true,
    "on_hold_until": 1537872668
}
```

```json: Response
{
    "id": "pay_AsvVMXmaAwwMVl",
    "entity": "payment",
    "amount": 5000,
    "currency": "INR",
    "status": "authorized",
    "order_id": null,
    "invoice_id": null,
    "international": false,
    "method": "card",
    "amount_refunded": 0,
    "amount_transferred": 0,
    "refund_status": null,
    "captured": false,
    "description": null,
    "card_id": "card_AsvVMaZI125Eu2",
    "bank": null,
    "wallet": null,
    "vpa": null,
    "email": "gaurav.kumar@example.com",
    "contact": "+919123456780",
    "on_hold": true,
    "on_hold_until": 1537872668,
    "notes": [],
    "fee": null,
    "tax": null,
    "error_code": null,
    "error_description": null,
    "created_at": 1535898144
}
```

## Request Parameters

`on_hold` _boolean_
: Indicates whether settlement for the payment is on hold or not.

`on_hold_until` _integer_
: Timestamp indicating until which the settlement for the payment is to be kept on hold. The settlement will be initiated on the next business day after the timestamp. 
If this field is set, the `on_hold` field has to be set to `true`.
