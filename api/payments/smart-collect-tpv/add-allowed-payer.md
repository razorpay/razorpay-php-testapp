---
title: Add an Allowed Payer Account
description: Add an Allowed Payer Account using the Razorpay **Smart Collect TPV** APIs.
---

# Add an Allowed Payer Account

## Add an Allowed Payer With TPV

Use this endpoint to add an allowed payer's account.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts/{va_id}/allowed_payers \
-H "Content-Type: application/json" \
-d '{
   "type":"bank_account",
   "bank_account":{
      "ifsc":"UTIB0000013",
      "account_number":"914010012345679"
   }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String virtualId = "va_Di5gbNptcWV8fQ";

JSONObject virtualRequest = new JSONObject();
virtualRequest.put("type","bank_account");
JSONObject vpa = new JSONObject();
vpa.put("ifsc","UTIB0000013");
vpa.put("account_number","914011112345679");
virtualRequest.put("bank_account",vpa);

VirtualAccount virtualaccount = instance.virtualAccounts.addAllowedPayers(virtualId,virtualRequest);

```php: PHP
$api = new Api($api_key, $api_secret);

$api->virtualAccount->fetch($virtualId)->addAllowedPayer(array('types' => 'bank_account','bank_account' => array('ifsc'=>'UTIB0000013','account_number'=>'914010012345679')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.virtualAccounts.allowedPayer(virtualId,{
  types: "bank_account",
  bank_account: {
    ifsc: "UTIB0000013",
    account_number: "914010012345679"
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.virtual_account.add_allowed_player(virtualId,{
  "types": "bank_account",
  "bank_account": {
    "ifsc": "UTIB0000013",
    "account_number": 914010012345679
  }
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

virtualId = "va_Di5gbNptcWV8fQ"

para_attr = {
  "type": "bank_account",
  "bank_account": {
    "ifsc": "UTIB0000013",
    "account_number": 914010012345679
  }
}

Razorpay::VirtualAccount.allowed_payer(virtualId, para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

types := make(map[string]interface{})
types["0"] = "vpa"

 data:= map[string]interface{}{
	"type": types,
	"vpa": map[string]interface{}{
	  "descriptor": "gaurikumari",
	},
  }
body, err := client.VirtualAccount.AllowedPayer("", data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]

String virtualId = "va_Z6t7VFTb9xHeOs";

Dictionary virtualRequest = new Dictionary();
virtualRequest.Add("type", "bank_account");
Dictionary vpa = new Dictionary();
vpa.Add("ifsc", "UTIB0000013");
vpa.Add("account_number", "914012112345679");
virtualRequest.Add("bank_account", vpa);

VirtualAccount refund = client.VirtualAccount.Fetch("va_MaxCJzVjbKRBAr").AddAllowedPayers(virtualRequest);
```

### Response

```json: Success
{
  "id": "va_IUVQ3usNTeteGl",
  "name": "Smart Grofers",
  "entity": "virtual_account",
  "status": "active",
  "description": "Customer Identifier created for Raftar Soft",
  "amount_expected": null,
  "notes": {
    "project_name": "Banking Software"
  },
  "amount_paid": 10000,
  "customer_id": null,
  "receivers": [
    {
      "id": "ba_IUVQ424tVVobzZ",
      "entity": "bank_account",
      "ifsc": "RAZR0000001",
      "bank_name": null,
      "name": "Smart Grofers",
      "notes": [],
      "account_number": "1112220007297133"
    },
    {
      "id": "vpa_IUVRKM3WejBvhc",
      "entity": "vpa",
      "username": "rzr.payto000007005195066",
      "handle": "icic",
      "address": "rzr.payto000007005195066@icic"
    }
  ],
  "allowed_payers": [
    {
      "type": "bank_account",
      "id": "ba_JRSigCQ3MUCBYn",
      "bank_account": {
        "ifsc": "UTIB0000013",
        "account_number": "914010012345679"
      }
    }
  ],
  "close_by": 1681615838,
  "closed_at": null,
  "created_at": 1638862811
}
```json: Failure
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"Only 10 allowed payer accounts can be added",
      "field":"allowed_payers",
      "source":"business",
      "step":"virtual_account_edit",
      "reason":"allowed_payer_limit_exceeded",
      "metadata":[]
   }
}
```

### Parameters

`va_id` _mandatory_
: `string` The unique identifier of the Customer Identifier to which you want to add `allowed_payers` account details.

### Parameters

`type` _mandatory_
: `string` The type of account. Possible value is `bank_account`.

`bank_account` _mandatory_
: `object` Indicates the bank account details such as `ifsc` and `account_number`.

    `ifsc` _mandatory_
    : `string` The IFSC associated with the bank account.

    `account_number` _mandatory_
    : `string` The bank account number.
      
> **INFO**
>
> 
>       **Handy Tips**
> 
>       SBI account numbers can contain zeros preceding actual numbers. You should enter the complete account number, including these zeros, or else the transaction will fail, and the amount will be refunded automatically.
> 
>       For example, if the account number is 00000022234631312, add the complete account number and not just 22234631312.
>       

### Parameters

`id`
: `string` The unique identifier of the Customer Identifier.

`name`
: `string` The `merchant billing label` as it appears on the Dashboard.

`entity`
: `string` Indicates the type of entity. Here, it is `virtual account`.

`status`
: `string` Indicates whether the Customer Identifier is in `active` or `closed` state.

`description`
: `string` A brief description about the Customer Identifier.

`amount_expected`
: `integer` The amount expected by the merchant.

`amount_paid`
: `integer` The amount paid by the customer into the Customer Identifier.

`notes`
: `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Check the [Notes section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to know more.

`customer_id`
: `string` Unique identifier of the customer the Customer Identifier is linked with. Check the [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) section to know more.

`receivers`
: `json object` Configuration of desired receivers for the Customer Identifier.

    `id`
    : `string` The unique identifier of the Customer Identifier. Sample id for Customer Identifier is `ba_Di5gbQsGn0QSz3`

    `entity`
    : `string` Name of the entity. Possible value is `bank_account`.

    `ifsc`
    : `string` The IFSC for the Customer Identifier created. For example, `RAZR0000001`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `bank_name`
    : `string` The bank associated with the Customer Identifier. For example, `RAZR0000001`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `account_number`
    : `string` The unique account number provided by the bank. For example, `1112220061746877`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `name`
    : `string` The `merchant billing label` as it appears on the Dashboard. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `notes`
    : `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Check the [Notes section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to know more. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

`allowed_payers`
: `array` Details of customer bank accounts which will be allowed to make payments to your Customer Identifier. The parent parameter under which the customer bank account details must be passed as child parameters. You can add account details of 10 allowed payers for a Customer Identifier. For more details, refer to the [Third Party Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/third-party-validation.md) section.

    `type`
    : `string` The type of account through which the customer will make the payment. Possible value is `bank_account`.

    `id`
    : `string` The unique identifier of the `allowed_payers` account.

    `bank_account`
    : `object` Indicates the bank account details such as `ifsc` and `account_number`.

        `ifsc`
        : `string` The IFSC associated with the bank account through which the customer is expected to make the payment.

        `account_number`
        : `string` The bank account number through which the customer is expected to make the payment.

`close_by`
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30). Any request beyond `2147483647` UNIX timestamp will fail.

`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

Account validation is only applicable on bank account as a receiver type
* code: 400
* description: This error occurs when you try to add an allowed payer account on a Customer Identifier with VPA added as a receiver (with or without a Bank account).
* solution: You cannot add an allowed payer account on a Customer Identifier with VPA added as a receiver (with or without a Bank account).

Only 10 allowed payer accounts can be added.
* code: 400
* description: This error occurs when you try to add new allowed payer accounts when the overall `allowed_payers` limit is exceeded. You can only add up to 10 allowed payer accounts.
* solution: Do not add more than 10 allowed payers.

The bank account.account number field is required when bank account is present.
* code: 400
* description: This error occurs when you do not pass the bank account number in the request.
* solution: Make sure to pass the bank account number in the request.

The bank account.ifsc field is required when bank account is present
* code: 400
* description: This error occurs when you do not pass the IFSC in the request.
* solution: Make sure to pass the IFSC in the request.

The ifsc must be 11 characters.
* code: 400
* description: This error occurs when you pass an incorrect IFSC in the request. An IFSC must be 11 characters.
* solution: Make sure to pass a valid IFSC in the request.

Payer detail already exist for virtual account.
* code: 400
* description: This error occurs when you try to add a duplicate allowed payer's account with the same IFSC and account number that already exists.
* solution: Make sure to add a valid allowed payer's account.

Bharat QR not supported for Customer Identifier.
* code: 400
* description: Passing the receivers as `qr`.
* solution: We have deprecated the `qr` receiver type from our APIs. From now on, only `vpa` and `bank_account` will be supported. (Jun 2022).
 
Bharat QR not enabled.
* code: 400
* description: If you are a new merchant trying to create a Bharat QR code.
* solution: We have deprecated the `bharat_qr` type for QR v2 product.
