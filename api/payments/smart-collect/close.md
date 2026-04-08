---
title: Close a Customer Identifier
description: Close a Customer Identifier using the Razorpay API
---

# Close a Customer Identifier

## Close a Customer Identifier

Use this endpoint to close a Customer Identifier.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts/va_Di5gbNptcWV8fQ/close

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String virtualId = "va_Di5gbNptcWV8fQ";

instance.virtualAccounts.close(virtualId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.virtual_account.close(virtualId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

virtualId = "va_Di5gbNptcWV8fQ"

Razorpay::VirtualAccount.close(virtualId)

```php: PHP
$api = new Api($key_id, $secret);

$api->virtualAccount->fetch($virtualId)->close();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.virtualAccounts.close(virtualId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.VirtualAccount.Close("", nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

virtualId = "va_Di5gbNptcWV8fQ"

Razorpay::VirtualAccount.close(virtualId)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]

string virtualId = "va_Z6t7VFTb9xHeOs";

VirtualAccount virtulaccount = client.VirtualAccount.Fetch("va_MaxCJzVjbKRBAr").Close();
```

### Response

```json: Success - bank account
{
  "id":"va_Di5gbNptcWV8fQ",
  "name":"Acme Corp",
  "entity":"virtual_account",
  "status":"closed",
  "description":"Customer Identifier created for M/S ABC Exports",
  "amount_expected":230000,
  "notes":{
    "material":"teakwood"
  },
  "amount_paid":239000,
  "customer_id":"cust_DOMUFFiGdCaCUJ",
  "receivers":[
    {
      "id":"ba_Di5gbQsGn0QSz3",
      "entity":"bank_account",
      "ifsc":"RATN0VAAPIS",
      "bank_name": "RBL Bank",
      "name":"Acme Corp",
      "notes":[],
      "account_number":"1112220061746877"
    }
  ],
  "close_by":1574427237,
  "closed_at":1574164078,
  "created_at":1574143517
}

```json: Success - vpa
{
  "id":"va_Di5gbNptcWV8fQ",
  "name":"Acme Corp",
  "entity":"virtual_account",
  "status":"closed",
  "description":"Customer Identifier created for M/S ABC Exports",
  "amount_expected":null,
  "notes":{
    "material":"teakwood"
  },
  "amount_paid":239000,
  "customer_id":"cust_DOMUFFiGdCaCUJ",
  "receivers":[
    {
      "id":"vpa_CkTmLXqVYPkbxx",
      "entity":"vpa",
      "username": "rpy.payto00000468657501",
      "handle": "icici",
      "address": "rpy.payto00000468657501@icici"
    }
  ],
  "close_by":1574427237,
  "closed_at":1574164078,
  "created_at":1574143517
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
: `string` The unique identifier of the Customer Identifier that is to be closed.

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
: `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes).

`customer_id`
: `string` Unique identifier of the customer the Customer Identifier is linked with. Know more about [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`receivers`
: `json object` Configuration of desired receivers for the Customer Identifier.

  `id`
  : `string` The unique identifier of the virtual bank account or virtual UPI ID. Sample IDs for:
    - Virtual bank account: `ba_Di5gbQsGn0QSz3`
    - Virtual UPI ID: `vpa_CkTmLXqVYPkbxx`

  `entity`
  : `string` Name of the entity. Possible values are:
    - `bank_account`
    - `vpa`

  `ifsc`
  : `string` The IFSC for the virtual bank account created. For example, `RAZR0000001`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `bank_name`
  : `string` The bank associated with the virtual bank account. For example, `RBL Bank`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `account_number`
  : `string` The unique account number provided by the bank. For example, `1112220061746877`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `name`
  : `string` The `merchant billing label` as it appears on the Dashboard. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `notes`
  : `json object` Any custom notes you might want to add to the virtual bank account or virtual UPI ID can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes). This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `username`
  : `string` The UPI ID consists of the username and the bank handle. The `username` consists of the `namespace` (assigned by the bank to Razorpay), the `merchant prefix` (which can be customised by you) and the `descriptor` (which you provide to identify the customer). The unique identifier which forms the first half of the virtual UPI ID. For example, `rpy.payto00000gaurikumari`. This parameter appears in the response only when `vpa` is passed as the receiver `type`. The descriptor can be 10 characters only.

  `handle`
  : `string` The bank name that forms the second half of the virtual UPI ID.  For example, `icici`. This parameter appears in the response only when `vpa` is passed as the receiver `type`.

  `address`
  : `string` The UPI ID that combines the `username` and the `handle` with the `@` symbol. For example, `rpy.payto00000gaurikumari@icici`. This parameter appears in the response only when `vpa` is passed as the receiver `type`.

`close_by`
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).
  
  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   - Any request beyond `2147483647` UNIX timestamp will fail.
>   - A Customer Identifier API that has not been used for 90 days will be automatically closed even if no `close_by` date has been set.
>   

  
`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the keys.
