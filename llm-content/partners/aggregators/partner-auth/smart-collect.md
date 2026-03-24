---
title: Partner Auth | Smart Collect
heading: Smart Collect
description: Integrate with Smart Collect APIs using partner auth.
---

# Smart Collect

Razorpay Smart Collect enables you to create virtual accounts to accept large payments from your customers in the form of bank transfers via NEFT, RTGS and IMPS.

Virtual accounts are similar to bank accounts wherein customers can transfer payments. You can create, retrieve and close virtual accounts using the Smart Collect APIs.

> **INFO**
>
> 
> **Handy Tips**
> 
> Consider these [prerequisites](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md#prerequisites) before getting started with Smart Collect.
> 

## Create a Virtual Account API

Given below is the sample code for the Create a Virtual Account API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. Refer to the [Smart Collect API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md).

/virtual_accounts

```curl: Curl
curl -X POST https://api.razorpay.com/v1/virtual_accounts \
-u [CLIENT_ID]:[CLIENT_SECRET] \
-H "Content-Type: application/json" \
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \
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
    },
}' 
```java: Java
RazorpayClient razorpay = new RazorpayClient("[CLIENT_ID]", "[CLIENT_SECRET]");

JSONObject request = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
JSONArray receiverTypeArray = new JSONArray();
receiverTypeArray.put("bank_account");
request.put("receiver_types", receiverTypeArray);
JSONObject notes = new JSONObject();
notes.put("receiver_key", "receiver_value");
request.put("notes", notes);
request.put("description", "First Virtual Account");

VirtualAccount virtualAccount = razorpayClient.VirtualAccounts.create(request);

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->virtualAccount->create(array('receivers' => array('types'=> array('bank_account')),'allowed_payers' => array(array('type'=>'bank_account','bank_account'=>array('ifsc'=>'RATN0VAAPIS','account_number'=>'2223330027558515'))),'description' => 'Virtual Account created for Raftar Soft','customer_id' => 'cust_HssUOFiOd2b1TJ', 'notes' => array('project_name' => 'Banking Software')));

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.virtualAccounts.create({
  receivers: {
    types: [
      "bank_account"
    ]
  },
  description: "Virtual Account created for Raftar Soft",
  customer_id: "cust_CaVDm8eDRSXYME",
  close_by: 1681615838,
  notes: {
    project_name: "Banking Software"
  }
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

para_attr = {
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
}

Razorpay::VirtualAccount.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("CLIENT_ID", "CLIENT_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

types := make(map[string]interface{})
types["0"] = "bank_account"

data:= map[string]interface{}{
  "receivers": map[string]interface{}{
    "types": types,
  },
  "description": "Virtual Account created for Raftar Soft",
  "customer_id": "cust_CaVDm8eDRSXYME",
  "close_by": 1681615838,
  "notes": map[string]interface{}{
    "project_name": "Banking Software",
  },
}

body, err := client.VirtualAccount.Create(data, extraHeaders)

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
```

### Request Parameters

`receivers` _mandatory_
: `json object` Configuration of desired receivers for the virtual account.

    `types`
    : `array` List of desired receiver types. Possible values:
        - `bank_account`
        - `vpa`
        - `qr_code`

    `vpa` _optional_
    : `json object` Descriptor details for the virtual UPI ID. This is to be passed only when `vpa` is passed as the receiver `types`.

      `descriptor`
      : `string` You can provide a custom descriptor for the UPI ID. This is a unique identifier provided by you to identify the customer. For example, `gaurikumari` and `akashkumar` are the descriptors in the usernames `rpy.payto00000gaurikumari` and `rpy.payto00000akashkumar` respectively. The combination of merchant prefix and descriptor must be 20 characters. The length of the merchant prefix can vary between 4-10 characters, and the length of descriptor from 10-16 characters.

    `qr_code` _optional_
    : `json object` Descriptor details for the QR code. This is to be passed only when `qr_code` is passed as the receiver `types`. [Know about the request parameters to be passed to create a QR code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md).

`description` _optional_
: `string` A brief description of the virtual account.

`customer_id` _optional_
: `string` Unique identifier of the customer to whom the virtual account must be tagged. Refer to the [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) documentation to learn how to create a customer.

`notes` _optional_
: `json object` Any custom notes you might want to add to the virtual account can be entered here. Refer to the [Notes section of the API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to know more.

`close_by` _optional_
: `integer` UNIX timestamp at which the virtual account is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

> **INFO**
>
> **Note**:
Any request beyond `2147483647` UNIX timestamp will fail.

> **INFO**
>
> 
> **Handy Tips**
> 
> While sharing the details of VAs (created using RBL bank) with the customers, ensure that the fifth character in the IFSC is number `0` and not the letter O. For example, valid IFSC is `RATN0VAAPIS` and not `RATNOVAAPIS`.
> 

## Fetch All Virtual Accounts

Given below is the sample code for Fetch all Virtual Accounts API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

/virtual_accounts

```cURL: Curl
curl -u [CLIENT_ID]:[CLIENT_SECRET] \
-X GET https://api.razorpay.com/v1/virtual_accounts \
-H "X-Razorpay-Account: acc_Ef7ArAsdU5t0XL" \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[CLIENT_ID]", "[CLIENT_SECRET]");

JSONObject request = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);

List virtualAccountList = razorpayClient.VirtualAccounts.fetchAll(options);

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->virtualAccount->all($options);

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.virtualAccounts.all(options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

options = {"count":1}

Razorpay::VirtualAccount.all(options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("CLIENT_ID", "CLIENT_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

body, err := client.VirtualAccount.All(nil, extraHeaders)

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

### Related Information

- [Smart Collect API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md).
