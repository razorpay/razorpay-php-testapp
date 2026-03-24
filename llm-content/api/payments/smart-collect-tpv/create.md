---
title: Create a Customer Identifier With TPV
description: Create a Customer Identifier using the Razorpay Smart Collect API.
---

# Create a Customer Identifier With TPV

## Create a Customer Identifier With TPV

Use this endpoint to create a Customer Identifier. While sharing the details of CIs (created using RBL bank) with the customers, ensure that the fifth character in the IFSC is number `0` and not the letter O. For example, valid IFSC is `RATN0VAAPIS` and not `RATNOVAAPIS`.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts \
-H "Content-Type: application/json" \
-d '{
    "receivers": {
        "types": [
            "bank_account"
        ],
        "bank_account":
        {
            "descriptor": "1234567890"
        }

    },
    "allowed_payers": [
      {
        "type": "bank_account",
        "bank_account": {
          "ifsc": "UTIB0000013",
          "account_number": "914010012345679"
        }
      },
      {
        "type": "bank_account",
        "bank_account": {
          "ifsc": "UTIB0000014",
          "account_number": "914010012345680"
        }
      }
    ],
    "description": "Customer Identifier created for Raftar Soft",
    "customer_id": "cust_CaVDm8eDRSXYME",
    "close_by": 1681615838,
    "notes": {
        "project_name": "Banking Software"
    }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject virtualRequest = new JSONObject();
List types = new ArrayList<>();
JSONObject typesParam = new JSONObject();
types.add("bank_account");
typesParam.put("types",types);
virtualRequest.put("receivers",typesParam);
List allowedPayer = new ArrayList<>();
JSONObject allowedPayerParams = new JSONObject();
allowedPayerParams.put("type","bank_account");
JSONObject bankAccount = new JSONObject();
bankAccount.put("ifsc","UTIB0000013");
bankAccount.put("account_number","914010012345679");
allowedPayer.add(allowedPayerParams);
allowedPayerParams.put("bank_account",bankAccount);
virtualRequest.put("allowed_payers",allowedPayer);
virtualRequest.put("description","Customer Identifier created for Raftar Soft");
virtualRequest.put("customer_id","cust_JDdNazagOgg9Ig");
virtualRequest.put("close_by",1681615838);
JSONObject notes = new JSONObject();
notes.put("project_name","Banking Software");
virtualRequest.put("notes", notes);

VirtualAccount virtualaccount = instance.virtualAccounts.create(virtualRequest);

```php: PHP
$api = new Api($api_key, $api_secret);

$api->virtualAccount->create(array('receivers' => array('types'=> array('bank_account')),'allowed_payers' => array(array('type'=>'bank_account','bank_account'=>array('ifsc'=>'RATN0VAAPIS','account_number'=>'2223330027558515'))),'description' => 'Customer Identifier created for Raftar Soft','customer_id' => 'cust_HssUOFiOd2b1TJ', 'notes' => array('project_name' => 'Banking Software')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.virtualAccounts.create({
  receivers: {
    types: [
      "bank_account"
    ]
  },
  allowed_payers: [
    {
      type: "bank_account",
      bank_account: {
        ifsc: "RATN0VAAPIS",
        account_number: "2223330027558515"
      }
    }
  ],
  description: "Customer Identifier created for Raftar Soft",
  customer_id: "cust_HssUOFiOd2b1TJ",
  notes: {
    project_name: "Banking Software"
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.virtual_account.create({
  "receivers": {
    "types": [
      "bank_account"
    ]
  },
  "allowed_payers": [
    {
      "type": "bank_account",
      "bank_account": {
        "ifsc": "RATN0VAAPIS",
        "account_number": 2223330027558515
      }
    }
  ],
  "description": "Customer Identifier created for Raftar Soft",
  "customer_id": "cust_HssUOFiOd2b1TJ",
  "notes": {
    "project_name": "Banking Software"
  }
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::VirtualAccount.create({
  "receivers": {
    "types": [
      "bank_account"
    ]
  },
  "allowed_payers": [
    {
      "type": "bank_account",
      "bank_account": {
        "ifsc": "RATN0VAAPIS",
        "account_number": 2223330027558515
      }
    }
  ],
  "description": "Customer Identifier created for Raftar Soft",
  "customer_id": "cust_HssUOFiOd2b1TJ",
  "notes": {
    "project_name": "Banking Software"
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

types := make(map[string]interface{})
types["0"] = "bank_account"

allowed_payers := make(map[string]interface{})
allowed_payers["0"] = map[string]interface{}{
      "type": "bank_account",
      "bank_account": map[string]interface{}{
        "ifsc": "RATN0VAAPIS",
        "account_number": 2223330099089860,
      },
    }

data:= map[string]interface{}{
  "receivers": map[string]interface{}{
    "types": types,
  },
  "allowed_payers" : allowed_payers,
  "description": "Customer Identifier created for Raftar Soft",
  "customer_id": "cust_CaVDm8eDRSXYME",
  "close_by": 1681615838,
  "notes": map[string]interface{}{
    "project_name": "Banking Software",
  },
}

body, err := client.VirtualAccount.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]

Dictionary virtualRequest = new Dictionary();
List types = new List();
Dictionary typesParam = new Dictionary();
types.Add("bank_account");
typesParam.Add("types", types);
virtualRequest.Add("receivers", typesParam);
List> allowedPayer = new List>();
Dictionary allowedPayerParams = new Dictionary();
allowedPayerParams.Add("type", "bank_account");
Dictionary bankAccount = new Dictionary();
bankAccount.Add("ifsc", "UTIB0000013");
bankAccount.Add("account_number", "914010012345679");
allowedPayer.Add(allowedPayerParams);
allowedPayerParams.Add("bank_account", bankAccount);
virtualRequest.Add("allowed_payers", allowedPayer);
virtualRequest.Add("description", "Virtual Account created for Raftar Soft");
virtualRequest.Add("customer_id", "cust_JDdNazagOgg9Ig");
virtualRequest.Add("close_by", 1681615838);
Dictionary notes = new Dictionary();
notes.Add("project_name", "Banking Software");
virtualRequest.Add("notes", notes);

VirtualAccount virtualaccount = client.VirtualAccount.Create(virtualRequest);

```

### Response

```json: Success
{
  "id":"va_DlGmm7jInLudH9",
  "name":"Acme Corp",
  "entity":"virtual_account",
  "status":"active",
  "description":"Customer Identifier created for Raftar Soft",
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
  "allowed_payers": [
    {
      "type": "bank_account",
      "id":"ba_DlGmm9mSj8fjRM",
      "bank_account": {
        "ifsc": "UTIB0000013",
        "account_number": "914010012345679"
      }
    },
    {
      "type": "bank_account",
      "id":"ba_Cmtnm5tSj6agUW",
      "bank_account": {
        "ifsc": "UTIB0000014",
        "account_number": "914010012345680"
      }
    }
  ],
  "close_by":1681615838,
  "closed_at":null,
  "created_at":1574837626
}
```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Account validation is only applicable on bank account as a receiver type",
    "field": "receivers",
    "source": "business",
    "step": "virtual_account_edit",
    "reason": "account_validation_not_supported_on_vpa",
    "metadata": []
  }
}
```

### Parameters

`receivers` _mandatory_
: `json object` Configuration of desired receivers for the Customer Identifier.

  `types`
  : `array` List of desired receiver types. Possible value is `bank_account`

  `bank_account` _mandatory_
    : `json object` Descriptor details for the Bank Account. This is to be passed only when `bank_account` is passed as the receiver `types`.

    `descriptor`
      : `string` A unique, numeric / alphanumeric custom descriptor defined by you for the bank account. The maximum length allowed is 10 digits.

> **INFO**
>
> **Handy Tips**
Please reach out to the [support team](https://razorpay.com/support/#request) if you are unable to pass the parameter with `bank_account`.

`allowed_payers` _mandatory_
: `array` Details of customer bank accounts which will be allowed to make payments to your Customer Identifier. The parent parameter under which the customer bank account details must be passed as child parameters. You can add account details of 10 allowed payers for a Customer Identifier. For more details, refer to the [Third Party Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/third-party-validation.md) section.

    `type` _mandatory_
    : `string` The type of account through which the customer will make the payment. Possible value is `bank_account`.

    `bank_account` _mandatory_
    : `object` Indicates the bank account details such as `ifsc` and `account_number`.

        `ifsc` _mandatory_
        : `string` The IFSC associated with the bank account through which the customer is expected to make the payment.

        `account_number` _mandatory_
        : `string` The bank account number through which the customer is expected to make the payment. SBI account numbers can contain zeros preceding actual numbers. You should enter the complete account number, including these zeros, or else the transaction will fail, and the amount will be refunded automatically. For example, if the account number is 00000022234631312, add the complete account number and not just 22234631312.

`description` _optional_
: `string` A brief description of the Customer Identifier.

`customer_id` _optional_
: `string` Unique identifier of the customer to whom the Customer Identifier must be tagged. Refer to the [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) documentation to learn how to create a customer.

`notes` _optional_
: `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Refer to the [Notes section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to learn more.

`close_by` _optional_
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. For example, `1681615838`. This needs to be passed only if you want the Customer Identifier to be temporary and auto-deleted after a specific usage time.

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
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. This is returned only if the UNIX timestamp was specified during the Customer Identifier creation. There is no expiry time for a Customer Identifier unless specified during creation.

`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

The API `` provided is invalid.
* code: 4xx
* description:  -  Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard. 
 -  `customer_id` is not correct. 
 
* solution:  -  Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the API keys. 
 -  Make sure that the `customer_id` and the API keys used belong to the same account and same mode, whether test or live respectively. 
 
 
The `field name` is required
* code: 400
* description: Occurs when a mandatory field is empty.
* solution: Make sure that all the mandatory fields are filled.

The id provided does not exist
* code: 400
* description: Occurs when the `customer_id` passed is wrong or does not belong to the identifier associated to the API keys used.
* solution: Make sure that the `customer_id` and the API keys used belong to the same identifier and same mode, whether test or live respectively.

only 10 allowed payers can be added
* code: 400
* description: Occurs when more than 10 allowed payers are added in the Dashboard.
* solution: When creating the Customer Identifier, allowed payers cannot be more than 10.

Account validation is only applicable on bank account as receiver type.
* code: 400
* description: This error occurs when you try to add an allowed payer account on a Customer Identifier with VPA added as a receiver (with or without a Bank account).
* solution: Allowed payers must have bank account details and not VPA.

The bank account IFSC field is required when the bank is present ( in allowed payers)
* code: 400
* description: This error occurs when you do not pass the IFSC code in the request.
* solution: Provide IFSC code for the allowed payers bank account.

Invalid IFSC OR IFSC must be 11 Characters
* code: 400
* description: This error occurs when you pass an incorrect IFSC code in the request. An IFSC must be 11 characters.
* solution: Pass the correct IFSC code of the allowed payers bank account.
