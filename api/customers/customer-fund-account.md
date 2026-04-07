---
title: Customer Fund Account APIs
description: Create and fetch a Fund account for a Customer.
---

# Customer Fund Account APIs

Using Razorpay APIs, you can create a fund account for a customer. Know more about [customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md).

## Create a Fund Account

You can use the below endpoint to create a fund account for a customer.

/fund_accounts

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/fund_accounts \
-H "Content-Type: application/json" \
-d '{
  "customer_id":"cust_Aa000000000001",
  "account_type":"bank_account",
  "bank_account":{
    "name":"Gaurav Kumar",
    "account_number":"11214311215411",
    "ifsc":"HDFC0000053"
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject fundAccountRequest = new JSONObject();
fundAccountRequest.put("customer_id", "cust_JDdNazagOgg9Ig");
fundAccountRequest.put("account_type", "bank_account");
JSONObject bankAccount = new JSONObject();
bankAccount.put("name","Gaurav Kumar");
bankAccount.put("account_number","11214311215411");
bankAccount.put("ifsc","HDFC0000053");
fundAccountRequest.put("bank_account", bankAccount);

FundAccount fundaccount = razorpay.fundAccount.create(fundAccountRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.fund_account.create({
  "customer_id":"cust_Aa000000000001",
  "account_type":"bank_account",
  "bank_account":{
    "name":"Gaurav Kumar",
    "account_number":"11214311215411",
    "ifsc":"HDFC0000053"
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$api->fundAccount->create(array('customer_id'=>$customerId,'account_type'=>'bank_account','bank_account'=>array('name'=>'Gaurav Kumar', 'account_number'=>'11214311215411', 'ifsc'=>'HDFC0000053')))

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "customer_id":"cust_Aa000000000001",
  "account_type":"bank_account",
  "bank_account":{
    "name":"Gaurav Kumar",
    "account_number":"11214311215411",
    "ifsc":"HDFC0000053"
  }
}

Razorpay::FundAccount.create(data)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.fundAccount.create({
  "customer_id":"cust_Aa000000000001",
  "account_type":"bank_account",
  "bank_account":{
    "name":"Gaurav Kumar",
    "account_number":"11214311215411",
    "ifsc":"HDFC0000053"
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "customer_id":"cust_Aa000000000001",
  "account_type":"bank_account",
  "bank_account":map[string]interface{}{
    "name":"Gaurav Kumar",
    "account_number":"11214311215411",
    "ifsc":"HDFC0000053",
  },
}
body, err := client.FundAccount.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary fundAccountRequest = new Dictionary();
fundAccountRequest.Add("customer_id", "cust_Z6t7VFTb9xHeOs");
fundAccountRequest.Add("account_type", "bank_account");
Dictionary bankAccount = new Dictionary();
bankAccount.Add("name","Gaurav Kumar");
bankAccount.Add("account_number","11214311215411");
bankAccount.Add("ifsc","HDFC0000053");
fundAccountRequest.Add("bank_account", bankAccount);

FundAccount fundaccount = client.FundAccount.Create(fundAccountRequest);

```json: Response
{
  "id": "fa_JiT6rz7uEpG3B4",
  "entity": "fund_account",
  "customer_id": "cust_JfrT7i6et3JjFf",
  "account_type": "bank_account",
  "bank_account": {
    "ifsc": "HDFC0000053",
    "bank_name": "HDFC Bank",
    "name": "Gaurav Kumar",
    "notes": [],
    "account_number": "11214311215411"
  },
  "batch_id": null,
  "active": true,
  "created_at": 1655448526
}
```

### Request Parameters

`customer_id` _mandatory_
: `string` This is the unique ID linked to a customer. For example, `cust_Aa000000000001`.

`account_type` _mandatory_
: `string` The type of account to be linked to the customer ID. In this case it will be `bank_account`.

`bank_account`
: `object` Customer bank account details.

    `name` _mandatory_
    : `string` Name of account holder as per bank records. For example, `Gaurav Kumar`.

    `ifsc` _mandatory_
    : `string` Customer's bank IFSC. For example, `HDFC0000053`.

    `account_number` _mandatory_
    : `string` Beneficiary account number. For example, `11214311215411`.

### Response Parameters

`id`
: `string` The unique ID linked to the fund account. For example, `fa_Aa000000000001`.

`entity`
: `string` The name of the Razorpay entity. In this case it will be `fund_account`.

`customer_id`
: `string` This is the unique ID linked to a customer. For example, `cust_Aa000000000001`.

`account_type`
: `string` The type of account to be linked to the customer ID. In this case it will be `bank_account`.

`bank_account`
: `object` Customer bank account details.

    `name`
    : `string` Name of account holder as per bank records. For example, `Gaurav Kumar`.

    `account_number`
    : `string` Beneficiary account number. For example, `11214311215411`.

    `ifsc`
    : `string` Customer's bank IFSC. For example, `HDFC0000053`.

    `bank_name`
    : `string` Customer's bank name. For example `HDFC`.

`active`
: `string` Status of the fund account. Possible values:
    - `true`: Fund account is active.
    - `false`: Fund account is inactive.

`created_at`
: `integer` The time at which the account was created at Razorpay. The output for this parameter is date and time in the Unix format, for example, `1543650891`.

## Fetch all Fund Accounts

You can use the below endpoint to fetch all fund accounts linked to your account.

```curl: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/fund_accounts?customer_id=cust_Aa000000000001

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_Aa000000000001";

FundAccount fundaccount = razorpay.fundAccount.fetch(customerId);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.fund_account.fetch(customerId)

```php: PHP
$api = new Api($key_id, $secret);

$api->fundAccount->all(array('customer_id'=>$customerIds));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
    "customer_id": "cust_Aa000000000001"
}
Razorpay::FundAccount.all(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.fundAccount.fetch(customerId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
    "customer_id":"cust_Aa000000000001",
}
body, err := client.FundAccount.All(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary fundAccountRequest = new Dictionary();
fundAccountRequest.Add("customer_id","cust_Z6t7VFTb9xHeOs");

List fundaccount = client.FundAccount.All(fundAccountRequest);

```json: Response
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "fa_JiT6rz7uEpG3B4",
      "entity": "fund_account",
      "customer_id": "cust_Aa000000000001",
      "account_type": "bank_account",
      "bank_account": {
        "ifsc": "HDFC0000053",
        "bank_name": "HDFC Bank",
        "name": "Gaurav Kumar",
        "notes": [],
        "account_number": "11214311215411"
      },
      "batch_id": null,
      "active": true,
      "created_at": 1655448526
    }
  ]
}
```
### Query Parameter

`customer_id` _mandatory_
: `string` This is the unique ID linked to a customer. For example, `cust_Aa000000000001`.
