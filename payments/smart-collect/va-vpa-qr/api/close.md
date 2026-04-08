---
title: Close a Customer Identifier
description: This API helps you close a Customer Identifier.
---

# Close a Customer Identifier

Once you have received the payment, you may choose to close the Customer Identifier. 

/virtual_accounts/:id/close

## Path Parameter

`id` _mandatory_
: `string` The unique identifier of the virtual account that is to be closed.

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts/va_Di5gbNptcWV8fQ/close
```json: Response
{
    "id": "va_Di5gbNptcWV8fQ",
    "name":"Acme Corp",
    "entity": "virtual_account",
    "status": "closed",
    "description":"Virtual Account created for M/S ABC Exports",
    "amount_expected": null,
    "notes":{
    "material":"teakwood"
    },
    "amount_paid": 239000,
    "customer_id": "cust_DOMUFFiGdCaCUJ",
    "receivers": [
        {
            "id": "ba_F8M0o4ZdaeR1q8",
            "entity": "bank_account",
            "ifsc": "YESB0CMSNOC",
            "bank_name": "Yes Bank",
            "name": "Intuit India",
            "notes": [],
            "account_number": "2223333259705413"
        },
        {
            "id": "vpa_F8M0npsLNjnZcL",
            "entity": "vpa",
            "username": "rpy.payto00000gaurikumari",
            "handle": "icici",
            "address": "rpy.payto00000gaurikumari@icici"
        },
        {
            "id": "qr_F8M0o50kAJjqIE",
            "entity": "qr_code",
            "reference": "F8M0o50kAJjqIE",
            "short_url": "https://rzp.io/i/jpiGilg",
            "created_at": 1593414941
        }
    ],
    "close_by": 1681615838,
    "closed_at": 1593422551,
    "created_at": 1593414941
}
```
