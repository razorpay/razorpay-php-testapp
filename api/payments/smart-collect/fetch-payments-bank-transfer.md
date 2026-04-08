---
title: Fetch Payments Made Using Bank Transfer
description: Fetch Payments made using Bank Transfer payment method.
---

# Fetch Payments Made Using Bank Transfer

## Fetch Payments Made By Bank Transfer

Use this endpoint to retrieve details of payments made using the bank transfer method.

If Razorpay does not receive the bank account information of the customer from the remitting bank, the `payer_bank_account` parameter will be set to null.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/payments/pay_CmiztqmYJPtDAu/bank_transfer \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_CmiztqmYJPtDAu";

Payment payment = instance.payments.fetchBankTransfers(paymentId)

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($virtualId)->bankTransfer();

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

paymend_id = "pay_Di5iqCqA1WEHq6"

Razorpay::Payment.fetch(paymend_id).bank_transfer

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.bank_transfer(paymentId)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.bankTransfer(paymentId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Payment.BankTransfer("", nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymend_id = "pay_Di5iqCqA1WEHq6"

Razorpay::Razorpay::Payment.fetch(paymend_id).bank_transfer

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]

string paymentId = "pay_Z6t7VFTb9xHeOs";

BankTransfer virtualaccount = client.Payment.Fetch(paymentId).BankTransfers();
```

### Response

```json: Success
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
    "ifsc": "UTIB0003198",
    "bank_name": "Axis Bank",
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
    "description": "Customer Identifier created for M/S ABC Exports",
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

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The api key provided is invalid",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the payment made to the Customer Identifier.

### Parameters

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
    : `object` Any custom notes added to the Customer Identifier.

    `account_number`
    : `string` The unique account number of the customer.

`virtual_account_id`
: `string` The unique identifier of the Customer Identifier.

`virtual_account`
: `object` Details of the Customer Identifier.

    `id`
    : `string` The unique identifier of the Customer Identifier.

    `name`
    : `string` The `merchant billing label` as it appears on Dashboard.

    `entity`
    : `string` The name of the entity. Here, it is `virtual account`.

    `status`
    : `string` Indicates the status of the Customer Identifier. Possible values are: 
        - `active`
        - `closed`

    `description`
    : `string` A brief description about the Customer Identifier.

    `amount_expected`
    : `integer` The amount expected by the merchant.

    `amount_paid`
    : `integer` The amount paid by the customer to the Customer Identifier.

    `notes`
    : `object` Any custom notes added during the creation of the Customer Identifier.

    `customer_id`
    : `string` The unique identifier of the customer the Customer Identifier is linked with. Know more about [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

    `receivers`
    : `object` Configuration of desired receivers for the Customer Identifier.

        `id`
        : `string` The unique identifier of the Customer Identifier. For example,  `ba_Di5gbQsGn0QSz3`.

        `entity`
        : `string` The name of the entity. Here, it is `bank_account`.

        `ifsc`
        : `string` The IFSC for the Customer Identifier created. For example, `RATN0VAAPIS`.

        `bank_name`
        : `string` The bank associated with the Customer Identifier. For example, `RBL`.

        `account_number`
        : `string` The unique account number provided by the bank. For example, `1112220061746877`.

        `name`
        : `string` The `merchant billing label` as it appears on Dashboard.

        `notes`
        : `object` Any custom notes added during the creation of the Customer Identifier.

    `close_by`
    : `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30). Any request beyond `2147483647` UNIX timestamp will fail.

    `closed_at`
    : `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

    `created_at`
    : `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the dashboard.
* solution: Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the keys.
