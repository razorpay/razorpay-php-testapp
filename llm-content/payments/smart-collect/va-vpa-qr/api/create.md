---
title: Create a Customer Identifier
description: Learn how you can use Smart Collect APIs to create virtual bank accounts and virtual UPI IDs linked to specific customers.
---

# Create a Customer Identifier

You can create a new virtual bank account, virtual UPI ID or QR code using this API. You can choose to link it to a specific customer.

> **INFO**
>
> 
> **Note**
> 
> Currently, we support creation of virtual UPI IDs in the live mode only. However, virtual bank accounts can be created in the test and live modes.
> 

## Request Parameters

> **INFO**
>
> 
> **Custom Descriptor**
> 
> You can customize the descriptor of the vpa as per your business requirements. This is an on-demand feature and is not available by default. To enable creation of custom descriptors, raise a request on our [Support Portal](https://razorpay.com/support/#request).
> 

`receivers` _mandatory_
: `json object` Configuration of desired receivers for the virtual account.

    `types`
    : `array` List of desired receiver types. Possible values are: 
 - `bank_account` 
 - `vpa` 
 - `qr_code`

    `vpa` _optional_
    : `json object` Descriptor details for the virtual UPI ID. This is to be passed only when `vpa` is passed as the receiver `types`.

      `descriptor`
      : `string` You can provide a custom descriptor for the UPI ID. This is a unique identifier provided by you to identify the customer. For example, `gaurikumari` and `akashkumar` are the descriptors in the usernames `rpy.payto00000gaurikumari` and `rpy.payto00000akashkumar` respectively. The combination of merchant prefix and descriptor must be 20 characters. The length of the merchant prefix can vary between 4-10 characters, and the length of descriptor from 10-16 characters.

`description` _optional_
: `string` A brief description of the virtual account.

`customer_id` _optional_
: `string` Unique identifier of the customer to whom the virtual account must be tagged. Refer to the [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) documentation to learn how to create a customer.

`notes` _optional_
: `json object` Any custom notes you might want to add to the virtual account can be entered here. Refer to the [Notes section of the API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to learn more.

`close_by` _optional_
: `integer` UNIX timestamp at which the virtual account is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

> **INFO**
>
> **Note**:
Any request beyond `2147483647` UNIX timestamp will fail.

> **INFO**
>
> 
> **Note**
> 
> While sharing the details of VAs (created using RBL bank) with the customers, ensure that the fifth character in the IFSC is number `0` and not the letter O. For example, valid IFSC is `RATN0VAAPIS` and not `RATNOVAAPIS`.
> 

```curl: Request - bank_account
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts \
-H "Content-Type: application/json" \
-d '{
    "receivers": {
        "types": [
            "bank_account"
        ]
    },
    "description": "Virtual Account created for Raftar Soft",
    "customer_id": "cust_CaVDm8eDRSXYME",
    "close_by": 1681615838,
    "notes": {
        "project_name": "Banking Software"
    }
}' 
```json: Response
{
  "id":"va_DlGmm7jInLudH9",
  "name":"Acme Corp",
  "entity":"virtual_account",
  "status":"active",
  "description":"Virtual Account created for Raftar Soft",
  "amount_expected":null,
  "notes":{
    "project_name":"Banking Software"
  },
  "amount_paid":0,
  "customer_id":"cust_CaVDm8eDRSXYME",
  "receivers":[
    {
      "id":"ba_DlGmm9mSj8fjRM",
      "entity":"bank_account",
      "ifsc":"RATN0VAAPIS",
      "bank_name": "RBL Bank",
      "name":"Acme Corp",
      "notes":[],
      "account_number":"2223330099089860"
    }
  ],
  "close_by":1681615838,
  "closed_at":null,
  "created_at":1574837626
}
``` curl: Request - vpa
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts \
-H "Content-Type: application/json" \
-d '{
  "receivers": {
    "types": [
      "vpa"
    ],
    "vpa": { // Pass this only for custom descriptor.
      "descriptor": "gaurikumari"
    }
  },
  "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
  "customer_id": "cust_BM8NbnFAk1BVDA",
  "close_by": 1681615838
}'
```json: Response
{
  "id": "va_DzaBLzIz494C64",
  "name": "Acme Corp",
  "entity": "virtual_account",
  "status": "active",
  "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
  "amount_expected": null,
  "notes": [],
  "amount_paid": 0,
  "customer_id": "cust_BM8NbnFAk1BVDA",
  "receivers": [
    {
      "id": "vpa_DzaBM9AEJew8H1",
      "entity": "vpa",
      "username": "rpy.payto00000gaurikumari",
      "handle": "icici",
      "address": "rpy.payto00000gaurikumari@icici"
    }
  ],
  "close_by": 1681615838,
  "closed_at": null,
  "created_at": 1577962694
}
``` curl: Request - qr_code
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts \
-H "Content-Type: application/json" \
-d '{
    "receivers": {
        "types": [
            "qr_code"
        ]
    },
    "description": "Virtual Account created for Raftar Soft",
    "customer_id": "cust_BM8NbnFAk1BVDA",
    "close_by": 1681615838,
    "notes": {
        "project_name": "Banking Software"
    }
}'
```json: Response
{
  "id": "va_F7BtWoDKRnOzkt",
  "name": "Intuit India",
  "entity": "virtual_account",
  "status": "active",
  "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
  "amount_expected": null,
  "notes": {
    "project_name": "Banking Software"
  },
  "amount_paid": 0,
  "customer_id": "cust_BM8NbnFAk1BVDA",
  "receivers": [
    {
      "id": "qr_F7BtWoRgpM7eOn",
      "entity": "qr_code",
      "reference": "F7BtWoRgpM7eOn",
      "short_url": "https://rzp.io/i/y0hrZw2",
      "created_at": 1593160971
    }
  ],
  "close_by": 1681615838,
  "closed_at": null,
  "created_at": 1593160971
}
```

Here is a sample request and response which can be used to create a virtual account with all the receiver types `bank_account`, `vpa` and `qr_code`.

```curl: Request - All types
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts \
-H "Content-Type: application/json" \
-d '{
  "receivers": {
    "types": [
      "vpa",
      "bank_account",
      "qr_code"
    ]
  },
  "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
  "customer_id": "cust_BM8NbnFAk1BVDA",
  "close_by": 1681615838
}'
```json: Response
{
  "id": "va_DzaznJGgvduD1R",
  "name": "Acme Corp",
  "entity": "virtual_account",
  "status": "active",
  "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
  "amount_expected": null,
  "notes": [],
  "amount_paid": 0,
  "customer_id": "cust_BM8NbnFAk1BVDA",
  "receivers": [
    {
      "id": "ba_Dzaznb0XK1yx1l",
      "entity": "bank_account",
      "ifsc": "RATN0VAAPIS",
      "bank_name": "RBL Bank",
      "name": "Acme Corp",
      "notes": [],
      "account_number": "2223333226676435"
    },
    {
      "id": "vpa_DzaznS24HKkTBY",
      "entity": "vpa",
      "username": "rpy.payto000005138396165",
      "handle": "icici",
      "address": "rpy.payto000005138396165@icici"
    },
    {
      "id": "qr_F7BtWoRgpM7eOn",
      "entity": "qr_code",
      "reference": "F7BtWoRgpM7eOn",
      "short_url": "https://rzp.io/i/y0hrZw2",
    }
  ],
  "close_by": 1681615838,
  "closed_at": null,
  "created_at": 1577965559
}
```
