---
title: Add Bank Account Receiver to an Existing Customer Identifier
description: Integrate Bank Account Receiver to an existing Customer Identifier seamlessly using the Razorpay Smart Collect API. Ensure secure and efficient transactions with robust integration.
---

# Add Bank Account Receiver to an Existing Customer Identifier

## Add Bank Account Receiver to an Existing Customer Identifier

Use this endpoint to add a bank account receiver to an existing Customer Identifier. If you have created a Customer Identifier with a receiver, for example, bank account, you cannot add another bank account receiver or replace it using this endpoint.

> **INFO**
>
> 
> **Handy Tips**
> 
> - **Smart Collect 2.0** uses the same API endpoints as **Smart Collect.**
> - Use [Smart Collect TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv.md)  APIs to **Add an Allowed Payer** or **Delete an Allowed Payer**
> 
> 

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/virtual_accounts/va_DzaBLzIz494C64/receivers
-H 'content-type: application/json'
-d '{
  "types": [
    "bank_account"
  ]
}'

```php: PHP
$api = new Api('YOUR_KEY_ID, 'YOUR_KEY_SECRET');
$api->virtualAccount->fetch($virtualId)->addReceiver(array('types' => array('bank_account'),'bank_account' => array('descriptor'=>'gauravkumar')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.virtualAccounts.addReceiver(virtualId,{
  types: [
    "bank_account"
  ],
  bank_account: {
    descriptor: "gaurikumari"
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.virtual_account.add_receiver(virtualId,{
  "types": [
    "bank_account"
  ],
  "bank_account": {
    "descriptor": "gaurikumari"
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

types := make(map[string]interface{})
types["0"] = "bank_account"

data:= map[string]interface{}{
	"types": types,
	"bank_account": map[string]interface{}{
	  "descriptor": "gaurikumari",
	},
  }

body, err :=  client.VirtualAccount.AddReceiver("", data, nil)

```java: Java 
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String virtualId = "va_Di5gbNptcWV8fQ";

JSONObject virtualRequest = new JSONObject();
List types = new ArrayList<>();
types.add("vpa");
virtualRequest.put("types",types);
JSONObject vpa = new JSONObject();
vpa.put("descriptor","gaurikumari");
virtualRequest.put("bank_account",bank_account);

VirtualAccount virtualaccount = instance.virtualAccounts.addReceiver(virtualId,virtualRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary virtualRequest = new Dictionary();
List types = new List();
types.Add("bank_account");
virtualRequest.Add("types", types);

VirtualAccount refund = client.VirtualAccount.Fetch(virtualId).AddReceiver(virtualRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

virtualId = "va_Di5gbNptcWV8fQ"

para_attr = {
  "types": [
    "bank_account"
  ],
  "bank_account": {
    "descriptor": "gaurikumari"
  }
}

Razorpay::VirtualAccount.add_receiver(virtualId, para_attr)
```

### Response

```json: Success 
{
  "id": "va_DzaBLzIz494C64",
  "name": "Acme Corp",
  "entity": "virtual_account",
  "status": "active",
  "description": "Customer Identifier created for Raftar Soft",
  "amount_expected": null,
  "notes": [],
  "amount_paid": 0,
  "customer_id": "cust_Cp5BlkchbcN9vf",
  "receivers": [
    {
      "id": "ba_DzcfdIfpw37iUl",
      "entity": "bank_account",
      "ifsc": "YESB0CMSNOC",
      "bank_name": "Yes Bank",
      "name": "Acme Corp",
      "notes": [],
      "account_number": "2223333225458057"
    },
    {
      "id": "vpa_DzaBM9AEJew8H1",
      "entity": "bank_account",
      "username": "rpy.payto00000gaurikumari",
      "handle": "icici",
      "address": "rpy.payto00000gaurikumari@icici"
    }
  ],
  "close_by": 1581615838,
  "closed_at": null,
  "created_at": 1577962694
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the Customer Identifier to which another receiver type is to be added.

### Parameters

`types` _mandatory_
    : `array` The receiver type to be added to the Customer Identifier. Possible values are: 
      - `bank_account`
      - `vpa`

`vpa` _optional_
: `json object` Descriptor details for the virtual UPI ID. This is to be passed only when `vpa` is passed as the receiver `types`.

  `descriptor`
  : `string` You can provide a custom descriptor for the UPI ID. This is a unique identifier provided by you to identify the customer. For example, `gaurikumari` and `akashkumar` are the descriptors in the usernames `rpy.payto00000gaurikumari` and `rpy.payto00000akashkumar` respectively. The combination of merchant prefix and descriptor must be 20 characters. If you go ahead with the default merchant prefix, you will get 10 characters. Hence, the descriptor should be 10 characters only. If a user tries to input 11 or more characters in a descriptor, our API will throw an error for invalid character length.

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
: `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md).

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
  : `json object` Any custom notes you might want to add to the virtual bank account or virtual UPI ID can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md). This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

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
