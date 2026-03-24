---
title: Fetch Customer Identifiers
description: Learn how to fetch Customer Identifiers and payments made to specific Customer Identifiers using the Smart Collect APIs.
---

# Fetch Customer Identifiers

You can retrieve details of Customer Identifiers and payments made to Customer Identifiers using these APIs.

APIs are available to:
- [Fetch Customer Identifier by ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/fetch.md#fetch-virtual-account-by-id)
- [Fetch All Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/fetch.md#fetch-all-virtual-accounts)
- [Fetch Payments made to a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/fetch.md#fetch-payments-made-to-a-virtual-account)
- [Fetch Payment Details using ID and Transfer Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/fetch.md#fetch-payment-details-using-id-and-transfer-method)

## Fetch Customer Identifier by ID

/virtual_accounts/:id

Retrieves a specific Customer Identifier using its ID.

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/virtual_accounts/va_D6Vw6zyJ0OmRZg \
```json: Response - bank_account
{
  "id": "va_D6Vw6zyJ0OmRZg",
  "name": "Acme Corp",
  "entity": "virtual_account",
  "status": "active",
  "description": "Virtual Account for Raftar Soft",
  "amount_expected": 5000,
  "notes": [],
  "amount_paid": null,
  "customer_id": "cust_9xnHzNGIEY4TAV",
  "receivers": [
    {
      "id": "ba_D6Vw76RrHA3DC9",
      "entity": "bank_account",
      "ifsc": "RATN0VAAPIS",
      "bank_name": "RBL Bank",
      "name": "Acme Corp",
      "notes": [],
      "account_number": "2223330025991681"
    }
  ],
  "close_by": null,
  "closed_at": 1568109789,
  "created_at": 1565939036
}
```json: Response - vpa
{
  "id": "va_D6Vw6zyJ0OmRZg",
  "name": "Acme Corp",
  "entity": "virtual_account",
  "status": "active",
  "description": "Virtual Account for Raftar Soft",
  "notes": [],
  "amount_paid": 5000,
  "customer_id": "cust_9xnHzNGIEY4TAV",
  "receivers": [
    {
      "id": "vpa_CkTmLXqVYPkbxx",
      "entity": "vpa",
      "username": "rpy.payto00000gaurikumari",
      "handle": "icici",
      "address": "rpy.payto00000gaurikumari@icici"
    }
  ],
  "close_by": null,
  "closed_at": 1568109789,
  "created_at": 1565939036
}
```json: Both types
{
  "id": "va_D6Vw6zyJ0OmRZg",
  "name": "Acme Corp",
  "entity": "virtual_account",
  "status": "active",
  "description": "Virtual Account for Raftar Soft",
  "notes": [],
  "amount_paid": 5000,
  "customer_id": "cust_9xnHzNGIEY4TAV",
  "receivers": [
    {
      "id": "ba_D6Vw76RrHA3DC9",
      "entity": "bank_account",
      "ifsc": "RATN0VAAPIS",
      "bank_name": "RBL Bank",
      "name": "Acme Corp",
      "notes": [],
      "account_number": "2223330025991681"
    },
    {
      "id": "vpa_CkTmLXqVYPkbxx",
      "entity": "vpa",
      "username": "rpy.payto00000gaurikumari",
      "handle": "icici",
      "address": "rpy.payto00000gaurikumari@icici"
    }
  ],
  "close_by": null,
  "closed_at": 1568109789,
  "created_at": 1565939036
}
```

## Path Parameter

`id` _mandatory_
: `string` The unique identifier of the virtual account whose details are to be fetched.

## Fetch All Customer Identifiers

/virtual_accounts

Retrieves all the Customer Identifiers that are created by you.

```cURL:Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/virtual_accounts \
```json:Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "va_Di5gbNptcWV8fQ",
      "name": "Acme Corp",
      "entity": "virtual_account",
      "status": "closed",
      "description": "Virtual Account created for M/S ABC Exports",
      "amount_expected": 2300,
      "notes": {
        "material": "teakwood"
      },
      "amount_paid": 239000,
      "customer_id": "cust_DOMUFFiGdCaCUJ",
      "receivers": [
        {
          "id": "ba_Di5gbQsGn0QSz3",
          "entity": "bank_account",
          "ifsc": "RATN0VAAPIS",
          "bank_name": "RBL Bank",
          "name": "Acme Corp",
          "notes": [],
          "account_number": "1112220061746877"
        }
      ],
      "close_by": 1574427237,
      "closed_at": 1574164078,
      "created_at": 1574143517
    },
    {
      "id": "va_Dho86Avmdw6h09",
      "name": "Acme Corp",
      "entity": "virtual_account",
      "status": "active",
      "description": "Virtual Account created for Raftar Soft",
      "amount_expected": null,
      "notes": {
        "material": "oakwood"
      },
      "amount_paid": 0,
      "customer_id": "cust_DOMUFFiGdCaDNK",
      "receivers": [
        {
          "id": "ba_Dho86DoV16LqiO",
          "entity": "bank_account",
          "ifsc": "RATN0VAAPIS",
          "bank_name": "RBL Bank",
          "name": "Acme Corp",
          "notes": [],
          "account_number": "1112220046254840"
        }
      ],
      "close_by": 1574427237,
      "closed_at": null,
      "created_at": 1574081690
    }
  ]
}
```

## Query Parameters

`from`
: `integer` Timestamp, in seconds, from when virtual accounts are to be fetched.

`to`
: `integer` Timestamp, in seconds, till when virtual accounts are to be fetched.

`count`
: `integer` Number of virtual accounts to be fetched. The default value is 10 and the maximum value is 100. This can be used for pagination, in combination with `skip`. 

`skip`
: `integer` Number of records to be skipped while fetching the virtual accounts. This can be used for pagination, in combination with `count`.

## Fetch Payments made to a Customer Identifier

/virtual_accounts/:id/payments

Retrieves all the payments made to a specific Customer Identifier for a given ID.

```cURL:Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/virtual_accounts/va_CminDKtoToBGmd/payments \
```json:Response
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "pay_Di5iqCqA1WEHq6",
      "entity": "payment",
      "amount": 239000,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "bank_transfer",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "",
      "card_id": null,
      "bank": null,
      "wallet": null,
      "vpa": null,
      "email": "saurav.kumar@example.com",
      "contact": "+919876543210",
      "customer_id": "cust_DOMUFFiGdCaCUJ",
      "notes": [],
      "fee": 2820,
      "tax": 430,
      "error_code": null,
      "error_description": null,
      "created_at": 1574143644
    }
  ]
}
```

## Path Parameter

`id` _mandatory_
: `string` The unique identifier of the virtual account for which the payment details are to be fetched.

The response parameters are the same as those mentioned in [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md).

## Query Parameters

`from`
: `integer` Timestamp, in seconds, from when payments are to be fetched.

`to`
: `integer` Timestamp, in seconds, till when payments are to be fetched.

`count`
: `integer` Number of payments to be fetched. The default value is 10 and the maximum value is 100. This can be used for pagination, in combination with `skip`. 

`skip`
: `integer` Number of records to be skipped while fetching the payments. This can be used for pagination, in combination with `count`.

## Fetch Payment Details using ID and Transfer Method

Retrieve the payment details for a given payment ID and transfer method.

### Bank Transfer

/payments/:id/bank_transfer

Retrieves the bank transfer details of a given payment ID.

```cURL:Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/payments/pay_CmiztqmYJPtDAu/bank_transfer \
```json:Response
{
  "id": "bt_Di5iqCElVyRlCb",
  "entity": "bank_transfer",
  "payment_id": "pay_Di5iqCqA1WEHq6",
  "mode": "NEFT",
  "bank_reference": "157414364471",
  "amount": 239000,
  "payer_bank_account": {
    "id": "ba_Di5iqSxtYrTzPU",
    "entity": "bank_account",
    "ifsc": null,
    "bank_name": null,
    "name": "Acme Corp",
    "notes": [],
    "account_number": "765432123456789"
  },
  "virtual_account_id": "va_Di5gbNptcWV8fQ",
  "virtual_account": {
    "id": "va_Di5gbNptcWV8fQ",
    "name": "Acme Corp",
    "entity": "virtual_account",
    "status": "closed",
    "description": "Virtual Account created for M/S ABC Exports",
    "amount_expected": 2300,
    "notes": {
      "material": "teakwood"
    },
    "amount_paid": 239000,
    "customer_id": "cust_DOMUFFiGdCaCUJ",
    "receivers": [
      {
        "id": "ba_Di5gbQsGn0QSz3",
        "entity": "bank_account",
        "ifsc": "RATN0VAAPIS",
        "bank_name": "RBL Bank",
        "name": "Acme Corp",
        "notes": [],
        "account_number": "1112220061746877"
      }
    ],
    "close_by": 1574427237,
    "closed_at": 1574164078,
    "created_at": 1574143517
  }
}
```

> **INFO**
>
> 
> **Note**
> 
> If Razorpay does not receive the bank account information of the customer from the remitting bank, the `payer_bank_account` key will be set to null.
> 

### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the payment made to the virtual account.

### Response Parameters

`id`
: `string` The unique identifier of the bank transfer.

`entity`
: `string` The name of the entity. Here, it is `bank_transfer`.

`payment_id`
: `string` The unique identifier of the payment.

`mode`
: `string` The mode of bank transfer used. Possible values are:
  
- `NEFT`
  
- `RTGS`
  
- `IMPS`
  
- `UPI`

`bank_reference`
: `string` Unique reference number provided by the bank for the transaction.

`payer_bank_account`
: `object` The payer bank account details from which payment is received.

    `id`
    : `string` The unique identifier of the customer's bank account.

    `entity`
    : `string` The name of the entity. Here, it is `bank_account`.

    `ifsc`
    : `string` The IFSC associated with the bank account.

    `bank_name`
    : `string` The name of the bank in which the customer has an account.

    `notes`
    : `object` Any custom notes added to the virtual bank account.

    `account_number`
    : `string` The unique account number of the customer.

`virtual_account_id`
: `string` The unique identifier of the virtual account.

`virtual_account`
: `object` Details of the virtual account.

    `id`
    : `string` The unique identifier of the virtual account.

    `name`
    : `string` The `merchant billing label` as it appears on Dashboard.

    `entity`
    : `string` The name of the entity. Here, it is `virtual account`.

    `status`
    : `string` Indicates the status of the virtual account. Possible values are: 
- `active`
- `closed`

    `description`
    : `string` A brief description about the virtual account.
    
    `amount_paid`
    : `integer` The amount paid by the customer to the virtual account.

    `notes`
    : `object` Any custom notes added during the creation of the virtual account.

    `customer_id`
    : `string` The unique identifier of the customer the virtual account is linked with. For more details, refer to the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

    `receivers`
    : `object` Configuration of desired receivers for the virtual account.

        `id`
        : `string` The unique identifier of the virtual bank account. For example,  `ba_Di5gbQsGn0QSz3`.

        `entity`
        : `string` The name of the entity. Here, it is `bank_account`.

        `ifsc`
        : `string` The IFSC for the virtual bank account created. For example, `RATN0VAAPIS`.

        `bank_name`
        : `string` The bank associated with the virtual bank account. For example, `RBL Bank`.

        `account_number`
        : `string` The unique account number provided by the bank. For example, `1112220061746877`.

        `name`
        : `string` The `merchant billing label` as it appears on Dashboard.

        `notes`
        : `object` Any custom notes added during the creation of the virtual account..

    `close_by`
    : `integer` UNIX timestamp at which the virtual account is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

> **INFO**
>
> **Note**:
Any request beyond `2147483647` UNIX timestamp will fail.

    `closed_at`
    : `integer` UNIX timestamp at which the virtual account is automatically closed.

    `created_at`
    : `integer` UNIX timestamp at which the virtual account was created.

### UPI

/payments/:id/upi_transfer

Retrieves the UPI transfer details of a given payment ID.

```cURL:Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/payments/pay_E5YETrWuVgP3fI/upi_transfer \
```json:Response
{
  "id": "ut_E5YEUKb9yA0YvX",
  "entity": "upi_transfer",
  "amount": 100,
  "payer_vpa": "gauravkumar@exampleupi",
  "payer_bank": "HDFC BANK LTD",
  "payer_account": "50100093961111",
  "payer_ifsc": "HDFC0000004",
  "payment_id": "pay_E5YETrWuVgP3fI",
  "npci_reference_id": "001718859181",
  "virtual_account_id": "va_E5V3Rb3sQaMS5v",
  "virtual_account": {
    "id": "va_E5V3Rb3sQaMS5v",
    "name": "Acme Corp",
    "entity": "virtual_account",
    "status": "active",
    "description": "First Virtual Account",
    "amount_expected": null,
    "notes": [],
    "amount_paid": 200,
    "customer_id": "cust_9xnHzNGIEY4TAV",
    "receivers": [
      {
        "id": "vpa_E5V3RsO1g4QK7t",
        "entity": "vpa",
        "username": "rpy.payto00000gaurikumari",
        "handle": "icici",
        "address": "rpy.payto00000gaurikumari@icici"
      }
    ],
    "close_by": null,
    "closed_at": null,
    "created_at": 1579254678
  }
}
```

### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the payment made to the virtual account.

### Response Parameters

`id`
: `string` The unique identifier of the UPI transfer.

`entity`
: `string` The name of the entity. Here, it is `upi_transfer`.

`amount`
: `integer` The amount paid by the customer.

`payer_vpa`
: `string` The UPI ID of the customer that is used to make the payment.

`payer_bank`
: `string` The name of the customer's bank.

`payer_account`
: `string` The bank account number of the customer that is linked to the UPI ID.

`payer_ifsc`
: `string` The IFSC associated with the bank account.

`payment_id`
: `string` The unique identifier of the payment made by the customer.

`npci_reference_id`
: `string` The unique reference number provided by NPCI for the payment.

`virtual_account_id`
: `string` The unique identifier of the virtual account.

`virtual_account`
: `object` Details of the virtual account.

    `id`
    : `string` The unique identifier of the virtual account.

    `name`
    : `string` The `merchant billing label` as it appears on Dashboard.

    `entity`
    : `string` The name of the entity. Here, it is `virtual account`.

    `status`
    : `string` Indicates the status of the virtual account. Possible values are: 
- `active`
- `closed`

    `description`
    : `string` A brief description about the virtual account.

    `amount_paid`
    : `integer` The amount paid by the customer into the virtual account.

    `notes`
    : `object` Any custom notes added during the creation of the virtual account.

    `customer_id`
    : `string` The unique identifier of the customer the virtual account is linked with. For more details, refer to the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

    `receivers`
    : `object` Configuration of desired receivers for the virtual account.

        `id`
        : `string` The unique identifier of the virtual UPI ID. For example, `vpa_CkTmLXqVYPkbxx`.

        `entity`
        : `string` The name of the entity. Here, it is `vpa`.

        `username`
        : `string` The unique identifier which forms the first half of the virtual UPI ID. For example, `rpy.payto00000gaurikumari`.

        `handle`
        : `string` The bank name that forms the second half of the virtual UPI ID. For example, `icici`.

        `address`
        : `string` The UPI ID that combines the `username` and the `handle` with the `@` symbol. For example, `rpy.payto00000gaurikumari@icici`. This parameter appears in the response only when `vpa` is passed as the receiver `type`.

    `close_by`
    : `integer` UNIX timestamp at which the virtual account is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

> **INFO**
>
> **Note**:
Any request beyond `2147483647` UNIX timestamp will fail.

    `closed_at`
    : `integer` UNIX timestamp at which the virtual account is automatically closed.

    `created_at`
    : `integer` UNIX timestamp at which the virtual account was created.
