---
title: Bank Accounts
description: Add, and delete Customer's bank account details using Razorpay APIs.
---

# Bank Accounts

Add or delete customer's bank account with basic details such as name, email and contact details. You can then offer various Razorpay solutions to your customers. Edit customer details as needed.

## Use Cases

1. [Add Bank Account of Customer](#1-add-bank-account-of-customer) 
2. [Delete Bank Account of Customer.](#2-delete-bank-account-of-customer)

## 1. Add Bank Account of Customer

The following endpoint adds the customer's bank accounts.

customers/:customer_id/bank_account

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/customers/:customer_id/bank_account \
-H "Content-Type: application/json" \
-d '{
    "ifsc_code" : "UTIB0000194",
    "account_number"         :"916010080000000",
    "beneficiary_name"      : "Gaurav Kumar",
    "beneficiary_address1"  : "address 1",
    "beneficiary_address2"  : "address 2",
    "beneficiary_address3"  : "address 3",
    "beneficiary_address4"  : "address 4",
    "beneficiary_email"     : "gaurav.kumar@example.com",
    "beneficiary_mobile"    : "1234567890",
    "beneficiary_city"      :"Bangalore",
    "beneficiary_state"     : "KA",
    "beneficiary_country"   : "IN"
}' 

```java: Java

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_N5mywh91sXB69O"

JSONObject customerRequest = new JSONObject();
customerRequest.put("ifsc_code","UTIB0000194");
customerRequest.put("account_number","916010080000000");
customerRequest.put("beneficiary_name","Gaurav Kumar");
customerRequest.put("beneficiary_address1","address 1");
customerRequest.put("beneficiary_address2","address 2");
customerRequest.put("beneficiary_address3","address 3");
customerRequest.put("beneficiary_address4","address 4");
customerRequest.put("beneficiary_email","gaurav.kumar@example.com");
customerRequest.put("beneficiary_mobile","1234567890");
customerRequest.put("beneficiary_city","Bangalore");
customerRequest.put("beneficiary_state","KA");
customerRequest.put("beneficiary_country","IN");

BankAccount bankaccount = instance.customers.addBankAccount(customerId, customerRequest)

```python: Python

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

customerId = "cust_N5mywh91sXB69O"

client.customer.addBankAccount(customerId, {
    "ifsc_code" : "UTIB0000194",
    "account_number"         :"916010080000000",
    "beneficiary_name"      : "Gaurav Kumar",
    "beneficiary_address1"  : "address 1",
    "beneficiary_address2"  : "address 2",
    "beneficiary_address3"  : "address 3",
    "beneficiary_address4"  : "address 4",
    "beneficiary_email"     : "gaurav.kumar@example.com",
    "beneficiary_mobile"    : "1234567890",
    "beneficiary_city"      :"Bangalore",
    "beneficiary_state"     : "KA",
    "beneficiary_country"   : "IN"
})

```php: PHP

$api = new Api($key_id, $secret);

$customerId = "cust_N5mywh91sXB69O"

$api->customer->fetch($customerId)->addBankAccount([
  "ifsc_code" => "UTIB0000194",
  "account_number" => "916010080000000",
  "beneficiary_name" => "Gaurav Kumar",
  "beneficiary_address1" => "address 1",
  "beneficiary_address2" => "address 2",
  "beneficiary_address3" => "address 3",
  "beneficiary_address4" => "address 4",
  "beneficiary_email" => "gaurav.kumar@example.com",
  "beneficiary_mobile" => "1234567890",
  "beneficiary_city" => "Bangalore",
  "beneficiary_state" => "KA",
  "beneficiary_country" => "IN",
]);

```csharp: .NET

RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

string customerId = "cust_N5mywh91sXB69O";

Dictionary customerRequest = new Dictionary();
customerRequest.Add("ifsc_code", "UTIB0000194");
customerRequest.Add("account_number", "916010080000000");
customerRequest.Add("beneficiary_name", "Gaurav Kumar");
customerRequest.Add("beneficiary_address1", "address 1");
customerRequest.Add("beneficiary_address2", "address 2");
customerRequest.Add("beneficiary_address3", "address 3");
customerRequest.Add("beneficiary_address4", "address 4");
customerRequest.Add("beneficiary_email", "gaurav.kumar@example.com");
customerRequest.Add("beneficiary_mobile", "1234567890");
customerRequest.Add("beneficiary_city", "Bangalore");
customerRequest.Add("beneficiary_state", "KA");
customerRequest.Add("beneficiary_country", "IN");

BankAccount refund = client.Customer.Fetch(customerId).AddBankAccount(customerRequest);

```ruby: Ruby

require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_N5mywh91sXB69O"

Razorpay::Customer.add_bank_account(customerId,{
    "ifsc_code": "UTIB0000194",
    "account_number": "916010080000000",
    "beneficiary_name": "Gaurav Kumar",
    "beneficiary_address1": "address 1",
    "beneficiary_address2": "address 2",
    "beneficiary_address3": "address 3",
    "beneficiary_address4": "address 4",
    "beneficiary_email": "gaurav.kumar@example.com",
    "beneficiary_mobile": "1234567890",
    "beneficiary_city": "Bangalore",
    "beneficiary_state": "KA",
    "beneficiary_country": "IN"
})

```javascript: Node.js

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var customerId = "cust_N5mywh91sXB69O"

instance.customers.addBankAccount(customerId, {
    "ifsc_code" : "UTIB0000194",
    "account_number"         :"916010080000000",
    "beneficiary_name"      : "Gaurav Kumar",
    "beneficiary_address1"  : "address 1",
    "beneficiary_address2"  : "address 2",
    "beneficiary_address3"  : "address 3",
    "beneficiary_address4"  : "address 4",
    "beneficiary_email"     : "gaurav.kumar@example.com",
    "beneficiary_mobile"    : "1234567890",
    "beneficiary_city"      :"Bangalore",
    "beneficiary_state"     : "KA",
    "beneficiary_country"   : "IN"
});

```go: Go

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

customerId := "cust_N5mywh91sXB69O"

body, err := client.Customer.AddBankAccount(customerId, data, nil)
```

```json: Response
{
    "id": "ba_LSZht1Cm7xFTwF",
    "entity": "bank_account",
    "ifsc": "ICIC0001207",
    "bank_name": "ICICI Bank",
    "name": "Gaurav Kumar",
    "notes": [],
    "account_number": "XXXXXXXXXXXXXXX0434"
}
```

### Request Parameters

`account_number` 
: `integer` Customer's bank account number. For example, `916010080000000`.

`beneficiary_name`
:`string` The name of the beneficiary associated with the bank account.

`beneficiary_address1`
: `string` The virtual payment address.

`beneficiary_email`
: `string` Email address of the beneficiary. For example, `gaurav.kumar@example.com`.

`beneficiary_mobile`
: `integer` Mobile number of the beneficiary.

`beneficiary_city`
: `string` The name of the city of the beneficiary.

`beneficiary_state`
: `string` The state of the beneficiary.

`beneficiary_country`
: `string` The country of the beneficiary.

`beneficiary_pin`
: `integer`  The pin code of the beneficiary's address.

`ifsc_code`
: `string` The IFSC code of the bank branch associated with the account.

### Response Parameters

`bank_accounts`
: `array` An array containing bank account details.

     `id`
     : `string` Unique identifier of the bank account.

     `entity`
     : `string` The type of entity, which in this case is `bank_account`.

     `ifsc`
     : `string` The IFSC code of the bank branch associated with the account.

     `bank_name`
     : `string` The name of the bank.

     `name`
     : `string` The name associated with the bank account.

     `notes`
     : `object` Set of key-value pairs that can be used to store additional information about the payment.

     `account_number`
     : `integer` Customer's bank account number. For example, `916010080000000`.

## 2. Delete Bank Account of Customer

You can also delete customer's bank accounts. Use the following endpoint to delete.

customers/:customer_id/bank_account/:bank_id

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/customers/:customer_id/bank_account/:bank_id

```java: Java

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_N5mywh91sXB69O"

String bankAccountId = "ba_N6aM8uo64IzxHu"

Customer customer = instance.customers.deleteBankAccount(customerId, bankaccountId)

```python: Python

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

customerId = "cust_N5mywh91sXB69O"

bankAccountId = "ba_N6aM8uo64IzxHu"

client.customer.deleteBankAccount(customerId, bankaccountId)

```php: PHP
$api = new Api($key_id, $secret);

$customerId = "cust_N5mywh91sXB69O"

$bankAccountId = "ba_N6aM8uo64IzxHu"

$api->customer->fetch($customerId)->deleteBankAccount($bankAccountId);

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

string customerId = "cust_N5mywh91sXB69O"

String bankAccountId = "ba_N6aM8uo64IzxHu"

Customer refund = client.Customer.Fetch(customerId).DeleteBankAccount(bankAccountId);

```ruby: Ruby

require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_N5mywh91sXB69O"

bankAccountId = "ba_N6aM8uo64IzxHu"

Razorpay::Customer.delete_bank_account(customerId, bankAccountId)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var customerId = "cust_N5mywh91sXB69O"

var bankAccountId = "ba_N6aM8uo64IzxHu"

instance.customers.deleteBankAccount(customerId, bankAccountId);

```go: Go

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

bankAccountId := "ba_N6aM8uo64IzxHu"

customerId := "cust_N5mywh91sXB69O"

body, err := client.Customer.DeleteBankAccount(customerId, bankAccountId, nil, nil)
```

```json: Response
{
    "id": "ba_Evg09Ll05SIPSD",
    "ifsc": "ICIC0001207",
    "bank_name": "ICICI Bank",
    "name": "Test R4zorpay",
    "account_number": "XXXXXXXXXXXXXXX0434",
    "status": "deleted"
}
```

### Path Parameters

`customer_id` _mandatory_
: `string` Customer id of the customer whose bank account is to be deleted.

`bank_id` _mandatory_
: `string` The bank_id that needs to be deleted.

### Response Parameters
         
`id` 
: `string` Bank_id that is deleted.

`ifsc` 
: `string` IFSC code of bank.

`bank_name` 
: `string` Bank name.

`name` 
: `string` Account holder name.

`account_number` 
: `string` Bank account number.

`status`
: `string` Status of the bank in bank_account entity.
