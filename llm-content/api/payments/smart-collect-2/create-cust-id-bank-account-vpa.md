---
title: Create a Customer Identifier With VPA and Bank Account Receivers With Smart Collect 2.0
description: Create a Customer Identifier with both VPA and bank account receivers using the Razorpay API. Ensure seamless, secure transactions with efficient and reliable integration.
---

# Create a Customer Identifier With VPA and Bank Account Receivers With Smart Collect 2.0

## Create a Customer Identifier With VPA and Bank Account Receivers (Smart Collect 2.0)

Use this endpoint to create a Customer Identifier with both `bank_account` and `vpa` receiver types.

You can customise the merchant prefix of the vpa (`payto00000`) as per your business requirements. This is an on-demand feature and is not available by default. To enable creation of custom merchant prefix, raise a request on our [Support Portal](https://razorpay.com/support/#request).

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot create a Customer Identifier with VPA Receiver alone. You can only add VPA to an existing Customer Identifier.
> 

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts \
-H "Content-Type: application/json" \
-d '{
  "receivers": {
    "types": [
      "vpa",
      "bank_account"
    ],
        "bank_account": 
        {
          "descriptor": "1234567890"
        }
        "vpa": 
        {
          "descriptor": "gaurikumari"
        }
  },
  "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
  "customer_id": "cust_BM8NbnFAk1BVDA",
  "close_by": 1681615838
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject request = new JSONObject();
JSONArray receiverTypeArray = new JSONArray();
receiverTypeArray.put("vpa","bank_account");
request.put("receiver_types", receiverTypeArray);
JSONObject notes = new JSONObject();
notes.put("receiver_key", "receiver_value");
request.put("notes", notes);
request.put("description", "First Customer Identifier");

VirtualAccount virtualAccount = razorpayClient.VirtualAccounts.create(request);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.virtual_account.create({
  "receivers": {
    "types": [
      "vpa"
      "bank_account"
    ]
  },
  "description": "Customer Identifier created for Raftar Soft",
  "customer_id": "cust_CaVDm8eDRSXYME",
  "close_by": 1681615838,
  "notes": {
    "project_name": "Banking Software"
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$api->virtualAccount->create(array('receivers' => array('types'=> array('vpa','bank_account')),'allowed_payers' => array(array('type'=>'vpa','bank_account','vpa','bank_account'=>array('ifsc'=>'RATN0VAAPIS','account_number'=>'2223330027558515'))),'description' => 'Customer Identifier created for Raftar Soft','customer_id' => 'cust_HssUOFiOd2b1TJ', 'notes' => array('project_name' => 'Banking Software')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.virtualAccounts.create({
  receivers: {
    types: [
      "vpa"
      "bank_account"
    ]
  },
  description: "Customer Identifier created for Raftar Soft",
  customer_id: "cust_CaVDm8eDRSXYME",
  close_by: 1681615838,
  notes: {
    project_name: "Banking Software"
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

types := make(map[string]interface{})
types["0"] = "vpa","qr_code"

data:= map[string]interface{}{
  "receivers": map[string]interface{}{
    "types": types,
  },
  "description": "Customer Identifier created for Raftar Soft",
  "customer_id": "cust_CaVDm8eDRSXYME",
  "close_by": 1681615838,
  "notes": map[string]interface{}{
    "project_name": "Banking Software",
  },
}

body, err := client.VirtualAccount.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary virtualRequest = new Dictionary();
string[] types = { "vpa", "bank_account" };
Dictionary typesParam = new Dictionary();
typesParam.Add("types", types);
Dictionary vpaParam = new Dictionary();
vpaParam.Add("descriptor", "gaurikumar");
typesParam.Add("vpa", vpaParam);
virtualRequest.Add("receivers", typesParam);
virtualRequest.Add("description", "Virtual Account created for Raftar Soft");
virtualRequest.Add("customer_id", "cust_NBJmkv5lDFKnaH");
virtualRequest.Add("close_by", 1681615838);
Dictionary notes = new Dictionary();
notes.Add("project_name", "Banking Software");
virtualRequest.Add("notes", notes);

VirtualAccount virtualaccount = client.VirtualAccount.Create(virtualRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "receivers": {
    "types": [
      "vpa","bank_account"
    ]
  },
  "description": "Customer Identifier created for Raftar Soft",
  "customer_id": "cust_CaVDm8eDRSXYME",
  "close_by": 1681615838,
  "notes": {
    "project_name": "Banking Software"
  }
}

Razorpay::VirtualAccount.create(para_attr)

```

### Response

```json: Success
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
      "username": "rpy.payto00000gaurikumari",
      "handle": "icici",
      "address": "rpy.payto00000gaurikumari@icici"
    }
  ],
  "close_by": 1681615838,
  "closed_at": null,
  "created_at": 1577965559
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

`receivers` _mandatory_
: `json object` Configuration of desired receivers for the Customer Identifier.

    `types`
    : `array` List of desired receiver types. Possible values:
        - `bank_account`
        - `vpa`

    `vpa` _optional_
    : `json object` Descriptor details for the virtual UPI ID. This is to be passed only when `vpa` is passed as the receiver `types`.

      `descriptor`
      : `string` You can provide a custom descriptor for the UPI ID. This is a unique identifier provided by you to identify the customer. For example, `gaurikumari` and `akashkumar` are the descriptors in the usernames `rpy.payto00000gaurikumari` and `rpy.payto00000akashkumar` respectively. The combination of merchant prefix and descriptor must be 20 characters. The length of the merchant prefix can vary between 4-10 characters, and the length of descriptor from 10-16 characters.

    `bank_account` _optional_
    : `json object` Descriptor details for the Bank Account. This is to be passed only when `bank_account` is passed as the receiver `types`.

      `descriptor`_optional_
      : `string` A unique, numeric / alphanumeric custom descriptor defined by you for the bank account. The maximum length allowed is 10 digits.

> **INFO**
>
> **Handy Tips**
Please reach out to the [support team](https://razorpay.com/support/#request) if you are unable to pass the parameter with `bank_account`.

    
`description` _optional_
: `string` A brief description of the Customer Identifier.

`customer_id` _optional_
: `string` Unique identifier of the customer to whom the Customer Identifier must be tagged. Create a customer using the [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`notes` _optional_
: `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes).

`close_by` _optional_
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. For example, `1681615838`. This needs to be passed only if you want the Customer Identifier to be temporary and auto-deleted after a specific usage time. 

  
> **WARN**
>
> 
>   **Watch Out!**
>   - While sharing the details of Customer Identifiers (created using RBL bank) with the customers, ensure that the fifth character in the IFSC is number `0` and not the letter O. For example, valid IFSC is `RATN0VAAPIS` and not `RATNOVAAPIS`.
>   - A Customer Identifier will close automatically only if the UNIX timestamp is passed in the `close_by` request parameter.
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

`close_by`_optional_
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. This is returned only if the UNIX timestamp was specified during the Customer Identifier creation. There is no expiry time for a Customer Identifier unless specified during creation.

`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

The api `` provided is invalid
* code: 4xx
* description: Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the dashboard.
* solution: Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the keys.

The `field name` is required
* code: 400
* description: Occurs when a mandatory field is empty.
* solution: Make sure that all the mandatory fields are filled.

The id provided does not exist
* code: 400
* description: Occurs when the `customer_id` passed is wrong or does not belong to the identifier associated to the API Keys used.
* solution: Make sure that the `customer_id` and the API keys used belong to the same identifier and same mode, whether test or live respectively.

Receivers field is required
* code: 400
* description: Occurs when the receivers field is empty.
* solution: Make sure that the receivers field is populated with receiver type as either bank account or VPA according to your receiver requirement.

An active Customer Identifier with the same descriptor already exists for your account.
* code: 400
* description: The description provided by you already exists for another account.
* solution: Provide a different description, as the same description already exists for an account.
