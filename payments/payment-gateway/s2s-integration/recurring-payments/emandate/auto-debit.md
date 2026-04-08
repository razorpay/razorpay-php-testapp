---
title: Register Emandate and Charge First Payment Together
description: Register a customer's mandate and charge them the first recurring payment as part of the same transaction via Emandate.
---

# Register Emandate and Charge First Payment Together

## 1. Create an Authorisation Transaction

> **INFO**
>
> 
> **Authorisation transaction + auto-charge first payment**
> 
> You can register a customer's mandate **AND** charge them the first recurring payment as part of the same transaction. To do this all you have to do is pass the `first_payment_amount` parameter while creating the order.
> 

You can create an authorisation transaction using the [Razorpay APIs](#11-using-razorpay-apis) or [Registration Link](#12-using-a-registration-link).

### 1.1. Using Razorpay APIs

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Create a Customer](#111-create-a-customer).
2. [Create an Order](#112-create-an-order).
3. [Create Authorisation Payment using Razorpay APIs](#113-create-an-authorisation-payment).

#### 1.1.1. Create a Customer

Razorpay links recurring tokens to customers using a unique identifier generated through the Customer API.

You can create [customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) with basic information such as `email` and `contact` and use them for various Razorpay offerings. The following endpoint creates a customer.

/customers

  
### Sample Code

     
      ```cURL: Curl
      curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
      -X POST https://api.razorpay.com/v1/customers \
      -H "Content-Type: application/json" \
      -d '{
        "name": "",
        "email": "",
        "contact": "",
        "fail_existing": "0",
        "notes":{
          "note_key_1": "September",
          "note_key_2": "Make it so."
        }
      }'

      ```java: Java
      RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      JSONObject customerRequest = new JSONObject();
      customerRequest.put("name","");
      customerRequest.put("contact","");
      customerRequest.put("email","");
      customerRequest.put("fail_existing", "0");
      JSONObject notes = new JSONObject();
      notes.put("notes_key_1","Tea, Earl Grey, Hot");
      notes.put("notes_key_2","Tea, Earl Grey… decaf.");
      customerRequest.put("notes",notes);

      Customer customer = razorpay.customers.create(customerRequest);

      ```python: Python
      import razorpay
      client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

      client.customer.create({
          'name': '',
          'email': '',
          'contact': '',
          'fail_existing': "0",
          'notes': {'note_key_1': 'September', 'note_key_2': 'Make it so.'}
          })

      ```go: Go
      import ( razorpay "github.com/razorpay/razorpay-go" )
      client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

      data := map[string]interface{}{
          "name": "",
          "contact": ,
          "email": "",
          "fail_existing": "0",
          "notes": map[string]interface{}{
              "notes_key_1": "Tea, Earl Grey, Hot",
              "notes_key_2": "Tea, Earl Grey… decaf.",
          },
      }
      body, err := client.Customer.Create(data, nil)

      ```php: PHP
      $api = new Api($key_id, $secret);

      $api->customer->create(array('name' => '', 'email' => '','contact'=>'','fail_existing' => "0", 'notes'=> array('notes_key_1'=> 'Tea, Earl Grey, Hot','notes_key_2'=> 'Tea, Earl Grey… decaf'));
      ```csharp: .NET
      RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      Dictionary options = new Dictionary();

      options.Add("name", ""); 
      options.Add("contact", ""); 
      options.Add("email", ""); 
      options.Add("fail_existing", "0"); 

      Customer customer = Customer.Create(options);

      ```ruby: Ruby
      require "razorpay"
      Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

      para_attr = {
        "name": "",
        "contact": "",
        "email": "",
        "fail_existing": "0",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        }
      }

      Razorpay::Customer.create(para_attr)

      ```javascript: Node.js
      var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

      instance.customers.create({
        name: "",
        contact: "",
        email: "",
        fail_existing: "0",
        notes: {
          notes_key_1: "Tea, Earl Grey, Hot",
          notes_key_2: "Tea, Earl Grey… decaf."
        }
      })
      ```

      ```json: Response
      {
        "id":"cust_1Aa00000000001",
        "entity":"customer",
        "name":"",
        "email":"",
        "contact":"",
        "gstin":null,
        "notes":{
            "note_key_1":"September",
            "note_key_2":"Make it so."
        },
        "created_at ":1234567890
      }
      ```
      
    

##### Request Parameters

`name`
: `string` The name of the customer. For example, `Gaurav Kumar`.

`email`
: `string` The email address of the customer. For example, `gaurav.kumar@example.com`.

`contact`
: `string` The phone number of the customer. For example, `9876543210`.

`fail_existing` _optional_
: `string` The request throws an exception by default if a customer with the exact details already exists. You can pass an additional parameter `fail_existing` to get the existing customer's details in the response. Possible values:
     - `1` (default): If a customer with the same details already exists, throws an error.
     - `0`: If a customer with the same details already exists, fetches details of the existing customer.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### 1.1.2. Create an Order

Use the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md) to create a unique Razorpay `order_id` that is associated with the authorisation transaction. The following endpoint creates an order.

/orders

#### Emandate via Netbanking 

```curl: Emandate via Netbanking
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 0,
  "currency": "INR",
  "method": "emandate",
  "customer_id": "cust_1Aa00000000001",
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "token": {
    "first_payment_amount": 100,
    "auth_type": "netbanking",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001"
    }
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 0);
orderRequest.put("currency", "INR");
orderRequest.put("customer_id", "cust_1Aa00000000001");
orderRequest.put("method", "emandate");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.put("notes", notes);
JSONObject token = new JSONObject();
token.put("first_payment_amount",100);
token.put("auth_type","netbanking");
token.put("max_amount","9999900");
token.put("expire_at","2709971120");
JSONObject tokenNotes = new JSONObject();
tokenNotes.put("notes_key_1","Tea, Earl Grey, Hot");
tokenNotes.put("notes_key_2","Tea, Earl Grey… decaf.");
token.put("notes",tokenNotes);
orderRequest.put("token", token);
JSONObject bankAccount = new JSONObject();
bankAccount.put("beneficiary_name","Gaurav Kumar");
bankAccount.put("account_number","11214311215411");
bankAccount.put("account_type","savings");
bankAccount.put("ifsc_code","HDFC0001233");
token.put("bank_account",bankAccount);

Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'currency' => 'INR', 'method'=>'emandate', 'customer_id'=>$customerId, 'receipt'=>'Receipt No. 5', 'notes'=> array('note_key 1'=> 'Beam me up Scotty','note_key 2'=> 'Engage'), 'token'=>array('first_payment_amount'=>10000, 'auth_type'=>'netbanking' ,'max_amount'=>'9999900','expire_at'=>'4102444799', 'notes'=>array('note_key 1'=> 'Tea, Earl Grey… decaf.','note_key 2'=> 'Tea. Earl Gray. Hot.'), 'bank_account'=>array('beneficiary_name'=>'Gaurav Kumar', 'account_number'=>'11214311215411', 'account_type'=>'savings', 'ifsc_code'=>'HDFC0001233'))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 100,
  currency: "INR",
  method: "emandate",
  receipt: "Receipt No. 5",
  notes: {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Engage"
  },
  token: {
    first_payment_amount: 10000,
    auth_type: "netbanking",
    max_amount: 9999900,
    expire_at: 4102444799,
    notes: {
      "note_key 1": "Tea, Earl Grey… decaf.",
      "note_key 2": "Tea. Earl Gray. Hot."
    },
    bank_account: {
      beneficiary_name: "Gaurav Kumar",
      account_number: "11214311215411",
      account_type: "savings",
      ifsc_code: "HDFC0001233"
    }
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
    'amount': 0,
    'currency': 'INR',
    'method': 'emandate',
    'customer_id': 'cust_1Aa00000000001',
    'receipt': 'Receipt No. 1',
    'notes': {'notes_key_1': 'Beam me up Scotty',
              'notes_key_2': 'Engage'},
    'token': {
        'auth_type': 'netbanking',
        'max_amount': 9999900,
        'expire_at': 4102444799,
        'notes': {'notes_key_1': 'Tea, Earl Grey, Hot',
                  'notes_key_2': 'Tea, Earl Grey... decaf.'},
        'bank_account': {
            'beneficiary_name': 'Gaurav Kumar',
            'account_number': 1121431121541121,
            'account_type': 'savings',
            'ifsc_code': 'HDFC0000001'
            }
        }
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 100,
  "currency": "INR",
  "method": "emandate",
  "receipt": "Receipt No. 5",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Engage"
  },
  "token": {
    "first_payment_amount": 10000,
    "auth_type": "netbanking",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "note_key 1": "Tea, Earl Grey… decaf.",
      "note_key 2": "Tea. Earl Gray. Hot."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": 11214311215411,
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  }
}
Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 0,
  "currency": "INR",
  "payment_capture": true,
  "method": "emandate",
  "customer_id": "cust_1Aa00000000001",
  "receipt": "Receipt No. 1",
  "notes": map[string]interface{}{
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage",
  },
  "token": map[string]interface{}{
    "first_payment_amount": 100,
    "auth_type": "netbanking",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf.",
    },
    "bank_account": map[string]interface{}{
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001",
    },
  },
}
body, err := client.Order.Create(data, nil)
  
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 0);
orderRequest.Add("currency", "INR");
orderRequest.Add("customer_id", "cust_JDdNazagOgg9Ig");
orderRequest.Add("method", "emandate");
orderRequest.Add("receipt", "receipt#1");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1","Tea, Earl Grey, Hot");
notes.Add("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.Add("notes", notes);
Dictionary token = new Dictionary();
token.Add("first_payment_amount",100);
token.Add("auth_type","netbanking");
token.Add("max_amount","10000000");
token.Add("expire_at","2709971120");
Dictionary tokenNotes = new Dictionary();
tokenNotes.Add("notes_key_1","Tea, Earl Grey, Hot");
tokenNotes.Add("notes_key_2","Tea, Earl Grey… decaf.");
token.Add("notes",tokenNotes);
orderRequest.Add("token", token);
Dictionary bankAccount = new Dictionary();
bankAccount.Add("beneficiary_name","Gaurav Kumar");
bankAccount.Add("account_number","11214311215411");
bankAccount.Add("account_type","savings");
bankAccount.Add("ifsc_code","HDFC0001233");
token.Add("bank_account",bankAccount);

Order order = client.Order.Create(orderRequest);

```json: Response
{
  "id": "order_1Aa00000000001",
  "entity": "order",
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "receipt": "Receipt No. 1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "created_at": 1579700597,
  "token": {
    "method": "emandate",
    "recurring_status": null,
    "failure_reason": null,
    "currency": "INR",
    "max_amount": 9999900,
    "auth_type": "netbanking",
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "bank_account": {
      "ifsc": "HDFC0000001",
      "bank_name": "HDFC Bank",
      "name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "beneficiary_email": "gaurav.kumar@example.com",
      "beneficiary_mobile": "9000090000"
    },
    "first_payment_amount": 100
  }
}
```

#### Emandate via Debit Card

```curl: Emandate via Debit Card
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 0,
  "currency": "INR",
  "method": "emandate",
  "customer_id": "cust_1Aa00000000001",
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "token": {
    "first_payment_amount": 100,
    "auth_type": "debitcard",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001"
    }
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 0);
orderRequest.put("currency", "INR");
orderRequest.put("customer_id", "cust_1Aa00000000001");
orderRequest.put("method", "emandate");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.put("notes", notes);
JSONObject token = new JSONObject();
token.put("first_payment_amount",100);
token.put("auth_type","debitcard");
token.put("max_amount","9999900");
token.put("expire_at","2709971120");
JSONObject tokenNotes = new JSONObject();
tokenNotes.put("notes_key_1","Tea, Earl Grey, Hot");
tokenNotes.put("notes_key_2","Tea, Earl Grey… decaf.");
token.put("notes",tokenNotes);
orderRequest.put("token", token);
JSONObject bankAccount = new JSONObject();
bankAccount.put("beneficiary_name","Gaurav Kumar");
bankAccount.put("account_number","11214311215411");
bankAccount.put("account_type","savings");
bankAccount.put("ifsc_code","HDFC0001233");
token.put("bank_account",bankAccount);

Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'currency' => 'INR', 'method'=>'emandate', 'customer_id'=>$customerId, 'receipt'=>'Receipt No. 5', 'notes'=> array('note_key 1'=> 'Beam me up Scotty','note_key 2'=> 'Engage'), 'token'=>array('first_payment_amount'=>10000, 'auth_type'=>'debitcard' ,'max_amount'=>'9999900','expire_at'=>'4102444799', 'notes'=>array('note_key 1'=> 'Tea, Earl Grey… decaf.','note_key 2'=> 'Tea. Earl Gray. Hot.'), 'bank_account'=>array('beneficiary_name'=>'Gaurav Kumar', 'account_number'=>'11214311215411', 'account_type'=>'savings', 'ifsc_code'=>'HDFC0001233'))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 100,
  currency: "INR",
  method: "emandate",
  receipt: "Receipt No. 5",
  notes: {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Engage"
  },
  token: {
    first_payment_amount: 10000,
    auth_type: "debitcard",
    max_amount: 9999900,
    expire_at: 4102444799,
    notes: {
      "note_key 1": "Tea, Earl Grey… decaf.",
      "note_key 2": "Tea. Earl Gray. Hot."
    },
    bank_account: {
      beneficiary_name: "Gaurav Kumar",
      account_number: "11214311215411",
      account_type: "savings",
      ifsc_code: "HDFC0001233"
    }
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
    'amount': 0,
    'currency': 'INR',
    'method': 'emandate',
    'customer_id': 'cust_1Aa00000000001',
    'receipt': 'Receipt No. 1',
    'notes': {'notes_key_1': 'Beam me up Scotty',
              'notes_key_2': 'Engage'},
    'token': {
        'auth_type': 'debitcard',
        'max_amount': 9999900,
        'expire_at': 4102444799,
        'notes': {'notes_key_1': 'Tea, Earl Grey, Hot',
                  'notes_key_2': 'Tea, Earl Grey... decaf.'},
        'bank_account': {
            'beneficiary_name': 'Gaurav Kumar',
            'account_number': 1121431121541121,
            'account_type': 'savings',
            'ifsc_code': 'HDFC0000001'
            }
        }
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 100,
  "currency": "INR",
  "method": "emandate",
  "receipt": "Receipt No. 5",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Engage"
  },
  "token": {
    "first_payment_amount": 10000,
    "auth_type": "debitcard",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "note_key 1": "Tea, Earl Grey… decaf.",
      "note_key 2": "Tea. Earl Gray. Hot."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": 11214311215411,
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  }
}
Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 0,
  "currency": "INR",
  "payment_capture": true,
  "method": "emandate",
  "customer_id": "cust_1Aa00000000001",
  "receipt": "Receipt No. 1",
  "notes": map[string]interface{}{
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage",
  },
  "token": map[string]interface{}{
    "first_payment_amount": 100,
    "auth_type": "debitcard",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf.",
    },
    "bank_account": map[string]interface{}{
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001",
    },
  },
}
body, err := client.Order.Create(data, nil)

```json: Response
{
  "id": "order_1Aa00000000001",
  "entity": "order",
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "receipt": "Receipt No. 1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "created_at": 1579700597,
  "token": {
    "method": "emandate",
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "recurring_status": null,
    "failure_reason": null,
    "currency": "INR",
    "max_amount": 9999900,
    "auth_type": "debitcard",
    "expire_at": 4102444799,
    "bank_account": {
      "ifsc": "HDFC0000001",
      "bank_name": "HDFC Bank",
      "name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "beneficiary_email": "gaurav.kumar@example.com",
      "beneficiary_mobile": "9000090000"
    },
    "first_payment_amount": 100
  }
}
```

#### Emandate via Aadhaar

```curl: Emandate via Aadhaar
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 0,
  "currency": "INR",
  "method": "emandate",
  "customer_id": "cust_1Aa00000000001",
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "token": {
    "first_payment_amount": 100,
    "auth_type": "aadhaar",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001"
    }
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 0);
orderRequest.put("currency", "INR");
orderRequest.put("customer_id", "cust_1Aa00000000001");
orderRequest.put("method", "emandate");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.put("notes", notes);
JSONObject token = new JSONObject();
token.put("first_payment_amount",100);
token.put("auth_type","aadhaar");
token.put("max_amount","9999900");
token.put("expire_at","2709971120");
JSONObject tokenNotes = new JSONObject();
tokenNotes.put("notes_key_1","Tea, Earl Grey, Hot");
tokenNotes.put("notes_key_2","Tea, Earl Grey… decaf.");
token.put("notes",tokenNotes);
orderRequest.put("token", token);
JSONObject bankAccount = new JSONObject();
bankAccount.put("beneficiary_name","Gaurav Kumar");
bankAccount.put("account_number","11214311215411");
bankAccount.put("account_type","savings");
bankAccount.put("ifsc_code","HDFC0001233");
token.put("bank_account",bankAccount);

Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'currency' => 'INR', 'method'=>'emandate', 'customer_id'=>$customerId, 'receipt'=>'Receipt No. 5', 'notes'=> array('note_key 1'=> 'Beam me up Scotty','note_key 2'=> 'Engage'), 'token'=>array('first_payment_amount'=>10000, 'auth_type'=>'aadhaar' ,'max_amount'=>'9999900','expire_at'=>'4102444799', 'notes'=>array('note_key 1'=> 'Tea, Earl Grey… decaf.','note_key 2'=> 'Tea. Earl Gray. Hot.'), 'bank_account'=>array('beneficiary_name'=>'Gaurav Kumar', 'account_number'=>'11214311215411', 'account_type'=>'savings', 'ifsc_code'=>'HDFC0001233'))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 100,
  currency: "INR",
  method: "emandate",
  receipt: "Receipt No. 5",
  notes: {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Engage"
  },
  token: {
    first_payment_amount: 10000,
    auth_type: "aadhaar",
    max_amount: 9999900,
    expire_at: 4102444799,
    notes: {
      "note_key 1": "Tea, Earl Grey… decaf.",
      "note_key 2": "Tea. Earl Gray. Hot."
    },
    bank_account: {
      beneficiary_name: "Gaurav Kumar",
      account_number: "11214311215411",
      account_type: "savings",
      ifsc_code: "HDFC0001233"
    }
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
    'amount': 0,
    'currency': 'INR',
    'method': 'emandate',
    'customer_id': 'cust_1Aa00000000001',
    'receipt': 'Receipt No. 1',
    'notes': {'notes_key_1': 'Beam me up Scotty',
              'notes_key_2': 'Engage'},
    'token': {
        'auth_type': 'aadhaar',
        'max_amount': 9999900,
        'expire_at': 4102444799,
        'notes': {'notes_key_1': 'Tea, Earl Grey, Hot',
                  'notes_key_2': 'Tea, Earl Grey... decaf.'},
        'bank_account': {
            'beneficiary_name': 'Gaurav Kumar',
            'account_number': 1121431121541121,
            'account_type': 'savings',
            'ifsc_code': 'HDFC0000001'
            }
        }
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 100,
  "currency": "INR",
  "method": "emandate",
  "receipt": "Receipt No. 5",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Engage"
  },
  "token": {
    "first_payment_amount": 10000,
    "auth_type": "aadhaar",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "note_key 1": "Tea, Earl Grey… decaf.",
      "note_key 2": "Tea. Earl Gray. Hot."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": 11214311215411,
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  }
}
Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 0,
  "currency": "INR",
  "payment_capture": true,
  "method": "emandate",
  "customer_id": "cust_1Aa00000000001",
  "receipt": "Receipt No. 1",
  "notes": map[string]interface{}{
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage",
  },
  "token": map[string]interface{}{
    "first_payment_amount": 100,
    "auth_type": "aadhaar",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf.",
    },
    "bank_account": map[string]interface{}{
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001",
    },
  },
}
body, err := client.Order.Create(data, nil)
```json: Response
{
  "id": "order_1Aa00000000001",
  "entity": "order",
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "receipt": "Receipt No. 1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "created_at": 1579700597,
  "token": {
    "method": "emandate",
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "recurring_status": null,
    "failure_reason": null,
    "currency": "INR",
    "max_amount": 9999900,
    "auth_type": "aadhaar",
    "expire_at": 4102444799,
    "bank_account": {
      "ifsc": "HDFC0000001",
      "bank_name": "HDFC Bank",
      "name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "beneficiary_email": "gaurav.kumar@example.com",
      "beneficiary_mobile": "9000090000"
    },
    "first_payment_amount": 100
  }
}
```

##### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For emandate, the amount should be `0`.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`payment_capture` _mandatory_
: `boolean` Determines whether tha payment status should be changed to `captured` automatically or not. Possible values:
  - `true`: Payments are captured automatically.
  - `false`: Payments are not captured automatically. You can manually capture payments using the [Manually Capture Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment).

`method` _mandatory_
: `string` The authorisation method. Here, it is `emandate`.

`customer_id` _mandatory_
: `string` The unique identifier of the customer to be charged. For example, `cust_D0cs04OIpPPU1F`.

`receipt` _optional_
: `string` A user-entered unique identifier of the order. For example, `rcptid #1`. You should map this parameter to the `order_id` sent by Razorpay.

`notes`_optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`token`
: `object` Details related to the authorisation such as max amount and bank account information. Pass a value in the `first_payment_amount` parameter if you want to auto-charge the customer the first payment immediately after authorisation using the same `order_id`. The first payment will be created automatically and executed within 2 days of emandate token confirmation.

  `first_payment_amount` _optional_
  : `integer` The amount, in paise, that should be auto-charged in addition to the authorization amount. For example, `100000`.

`auth_type` _optional_
  : `string` Emandate type used to make the authorisation payment. Possible values:
    - `netbanking`
    - `debitcard`
    - `aadhaar`

  `max_amount` _optional_
  : `integer` The maximum amount in paise a customer can be charged in a transaction. Know about the [maximum and default values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/faqs.md#2-what-is-the-maximum-amount-which-can).

  `expire_at` _optional_
  : `integer` The Unix timestamp to indicate till when you can use the token (authorisation on the payment method) to charge the customer subsequent payments. Defaults to 40 years. The maximum value you can set is 40 years from the current date. Any value beyond this will throw an error. 

  `notes`_optional_
  : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

  `bank_account`
  : Customer's bank account details that should be pre-filled on the checkout.

    `account_number` _optional_
    : `string` Customer's bank account number.

    `account_type` _optional_
    : `string` Customer's bank account type. Possible values:
      - `savings` (default)
      - `current`

    `ifsc_code` _optional_
    : `string` Customer's bank IFSC. For example `UTIB0000001`.

    `beneficiary_name` _optional_
    : `string` Name of the beneficiary. For example, `Gaurav Kumar`.
    
> **WARN**
>
> 
>     **Watch Out!**
>   
>     The `beneficiary_name` should be between 4 to 120 characters.
>     

#### 1.1.3. Create an Authorisation Payment

Once an order is created, your next step is to create a payment. Use the below endpoint to create a payment with payment method `netbanking`.

/payments/create/json

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": 0,
  "currency": "INR",
  "contact": 9876543210,
  "email": "gaurav.kumar@example.com",
  "order_id": "order_KigZxUK9GxJPW2",
  "customer_id": "cust_K39wXdBlhqNk0B",
  "recurring": true,
  "method": "emandate",
  "bank": "HDFC",
  "auth_type": "netbanking",
  "bank_account": {
    "name": "Gaurav Kumar",
    "account_number": "1121431121541121",
    "account_type": "savings",
    "ifsc": "HDFC0000001"
  }
}'
```json: Response
{
  "razorpay_payment_id": "pay_FVptEVkDdNzFx8",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/FVptEs3cSWX1fs/authorize"
    }
  ]
}
```

##### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For netbanking, the amount has to be `0` (₹0).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`order_id` _mandatory_
: `string` The unique identifier of the order created using in [Step 1.1.2](#112-create-an-order).

`customer_id` _mandatory_
: `string` The unique identifier of the customer to be charged. For example, `cust_K39wXdBlhqNk0B`.

`recurring` _mandatory_
: `boolean` Possible values:
  - `true`: Recurring payment is enabled.
  - `false`: Recurring payment is not enabled.
  
`auth_type` _optional_
: `string` Emandate type used to make the authorisation payment. Possible values:
  - `netbanking`
  - `debitcard`
  - `aadhaar`

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `8888888888`.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `emandate`.

`bank` _mandatory_
: `string` The customer's bank name. The bank code used here should match the bank details used in [Step 1.1.2](#112-create-an-order). Use the [Method API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/methods-api.md) to check the bank code.

    `account_number` 
    : `string` Customer's bank account number.

    `account_type` 
    : `string` Customer's bank account type. Possible values:
      - `savings` (default)
      - `current`

    `ifsc_code`
    : `string` Customer's bank IFSC. For example `HDFC0000001`.

##### Response Parameters

If the payment request is valid, the response contains the following fields. Refer to the [S2S Json V2 integration document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md#step-2-create-a-payment_) for more details.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. The value here is `redirect` - Use this URL to redirect customer to the bank page.

    `url`
    : `string`  URL to be used for the action indicated.

### 1.2. Using a Registration Link

Registration Links are an alternate way of creating an authorisation transaction. If you create a registration link, you need not create a customer or an order.

When you create a registration link, an [invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) is automatically issued to the customer. The customer can use the invoice to make the Authorisation Payment.

Know how to [create Registration Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md) using the Dashboard.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use webhooks to get notifications about successful payments against a registration link. Know more about [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-authorization-link-status-using-webhooks).
> 

A registration link must always have an amount (in paise) that the customer will be charged when making the authorisation payment. In the case of emandate, the order amount must be `0`.

#### 1.2.1. Create a Registration Link

The following endpoint creates a registration link.

/subscription_registration/auth_links

#### Emandate via Netbanking

```cURL: Emandate via Netbanking
curl -u :
-X POST https://api.razorpay.com/v1/subscription_registration/auth_links
-H "Content-Type: application/json" \
-d '{
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780"
  },
  "type": "link",
  "amount": 0,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": {
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "netbanking",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject registrationLinkRequest = new JSONObject();
JSONObject customer = new JSONObject();
customer.put("name","Gaurav Kumar");
customer.put("email","gaurav.kumar@example.com");
customer.put("contact","9123456780");
registrationLinkRequest.put("customer", customer);
registrationLinkRequest.put("type", "link");
registrationLinkRequest.put("amount", 0);
registrationLinkRequest.put("currency", "INR");
registrationLinkRequest.put("description", "12 p.m. Meals");
JSONObject subscriptionRegistration = new JSONObject();
subscriptionRegistration.put("method","emandate");
subscriptionRegistration.put("auth_type","netbanking");
subscriptionRegistration.put("max_amount",50000);
subscriptionRegistration.put("expire_at",1609423824);
JSONObject bankAccount = new JSONObject();
bankAccount.put("beneficiary_name","Gaurav Kumar");
bankAccount.put("account_number","11214311215411");
bankAccount.put("account_type","savings");
bankAccount.put("ifsc_code","HDFC0001233");
subscriptionRegistration.put("bank_account",bankAccount);
registrationLinkRequest.put("subscription_registration", subscriptionRegistration);
registrationLinkRequest.put("receipt", "Receipt No. 1");
registrationLinkRequest.put("email_notify", true);
registrationLinkRequest.put("sms_notify", true);
registrationLinkRequest.put("expire_by", 1580479824);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
registrationLinkRequest.put("notes", notes);

Invoice invoice = razorpay.invoices.createRegistrationLink(registrationLinkRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->createSubscriptionRegistration(array('customer'=>array('name'=>'Gaurav Kumar','email'=>'gaurav.kumar@example.com','contact'=>'9123456780'),'type'=>'link','amount'=>100,'currency'=>'INR','description'=>'Registration Link for Gaurav Kumar','subscription_registration'=>array('first_payment_amount'=>100, 'method'=>'emandate', 'auth_type'=>'netbanking' ,'max_amount'=>'50000','expire_at'=>'1634215992','bank_account'=>array('beneficiary_name'=>'Gaurav Kumar', 'account_number'=>'11214311215411', 'account_type'=>'savings', 'ifsc_code'=>'HDFC0001233')),'receipt'=>'Receipt No. 5','email_notify'=>true,'sms_notify'=>true,'expire_by'=>1634215992, 'notes'=> array('note_key 1'=> 'Beam me up Scotty','note_key 2'=> 'Tea. Earl Gray. Hot.'))   );

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createRegistrationLink({
  customer: {
    name: "Gaurav Kumar",
    email: "gaurav.kumar@example.com",
    contact: 9123456780
  },
  type: "link",
  amount: 100,
  currency: "INR",
  description: "Registration Link for Gaurav Kumar",
  subscription_registration: {
    first_payment_amount: 100,
    method: "emandate",
    auth_type: "netbanking",
    max_amount: 50000,
    expire_at: 1634215992,
    bank_account: {
      beneficiary_name: "Gaurav Kumar",
      account_number: "11214311215411",
      account_type: "savings",
      ifsc_code: "HDFC0001233"
    }
  },
  receipt: "Receipt No. 5",
  email_notify: true,
  sms_notify: true,
  expire_by: 1634215992,
  notes: {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.registration_link.create({
    'customer': {'name': 'Gaurav Kumar',
                 'email': 'gaurav.kumar@example.com',
                 'contact': 9123456780},
    'type': 'link',
    'amount': 0,
    'currency': 'INR',
    'description': '12 p.m. Meals',
    'subscription_registration': {
        'method': 'emandate',
        'auth_type': 'netbanking',
        'expire_at': 1580480689,
        'max_amount': 50000,
        'bank_account': {
            'beneficiary_name': 'Gaurav Kumar',
            'account_number': 11214311215411,
            'account_type': 'savings',
            'ifsc_code': 'HDFC0001233',
            },
        },
    'receipt': 'Receipt no. 1',
    'expire_by': 1880480689,
    'sms_notify': True,
    'email_notify': True,
    'notes': {'note_key 1': 'Beam me up Scotty',
              'note_key 2': 'Tea. Earl Gray. Hot.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": 9123456780
  },
  "type": "link",
  "amount": 100,
  "currency": "INR",
  "description": "Registration Link for Gaurav Kumar",
  "subscription_registration": {
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "netbanking",
    "max_amount": 50000,
    "expire_at": 1634215992,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": 11214311215411,
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt No. 5",
  "email_notify": 1,
  "sms_notify": 1,
  "expire_by": 1634215992,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}
Razorpay::SubscriptionRegistration.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "customer": map[string]interface{}{
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
  },
  "type": "link",
  "amount": 100,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": map[string]interface{}{
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "netbanking",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": map[string]interface{}{
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233",
    },
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": map[string]interface{}{
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot.",
  },
}

body, err := client.Invoice.CreateRegistrationLink(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary registrationLinkRequest = new Dictionary();
Dictionary customer = new Dictionary();
customer.Add("name","Gaurav Kumar");
customer.Add("email","gaurav.kumar@example.com");
customer.Add("contact","9123456780");
registrationLinkRequest.Add("customer", customer);
registrationLinkRequest.Add("type", "link");
registrationLinkRequest.Add("amount", 0);
registrationLinkRequest.Add("currency", "INR");
registrationLinkRequest.Add("description", "12 p.m. Meals");
Dictionary subscriptionRegistration = new Dictionary();
subscriptionRegistration.Add("method","emandate");
subscriptionRegistration.Add("auth_type","netbanking");
subscriptionRegistration.Add("max_amount",50000);
subscriptionRegistration.Add("expire_at",1609423824);
Dictionary bankAccount = new Dictionary();
bankAccount.Add("beneficiary_name","Gaurav Kumar");
bankAccount.Add("account_number","11214311215411");
bankAccount.Add("account_type","savings");
bankAccount.Add("ifsc_code","HDFC0001233");
subscriptionRegistration.Add("bank_account",bankAccount);
registrationLinkRequest.Add("subscription_registration", subscriptionRegistration);
registrationLinkRequest.Add("receipt", "Receipt No. 1");
registrationLinkRequest.Add("email_notify", true);
registrationLinkRequest.Add("sms_notify", true);
registrationLinkRequest.Add("expire_by", 1580479824);
Dictionary notes = new Dictionary();
notes.Add("notes_key_1","Tea, Earl Grey, Hot");
notes.Add("notes_key_2","Tea, Earl Grey… decaf.");
registrationLinkRequest.Add("notes", notes);

Invoice invoice = client.Invoice.CreateRegistrationLink(registrationLinkRequest);

```json: Response
{
  "id": "inv_FHrY6tDtVP2dHg",
  "entity": "invoice",
  "receipt": "Receipt no. 25",
  "invoice_number": "Receipt no. 25",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrY6tiC2y7NNN",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1880480689,
  "issued_at": 1595491063,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491063,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 0,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "test registration link",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/DxEcNtR",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491063,
  "idempotency_key": null
}
```

#### Emandate via Debit Card

```cURL: Emandate via Debit Card
curl -u :
-X POST https://api.razorpay.com/v1/subscription_registration/auth_links
-H "Content-Type: application/json" \
-d '{
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780"
  },
  "type": "link",
  "amount": 0,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": {
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "debitcard",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject registrationLinkRequest = new JSONObject();
JSONObject customer = new JSONObject();
customer.put("name","Gaurav Kumar");
customer.put("email","gaurav.kumar@example.com");
customer.put("contact","9123456780");
registrationLinkRequest.put("customer", customer);
registrationLinkRequest.put("type", "link");
registrationLinkRequest.put("amount", 0);
registrationLinkRequest.put("currency", "INR");
registrationLinkRequest.put("description", "12 p.m. Meals");
JSONObject subscriptionRegistration = new JSONObject();
subscriptionRegistration.put("method","emandate");
subscriptionRegistration.put("auth_type","debitcard");
subscriptionRegistration.put("max_amount",50000);
subscriptionRegistration.put("expire_at",1609423824);
JSONObject bankAccount = new JSONObject();
bankAccount.put("beneficiary_name","Gaurav Kumar");
bankAccount.put("account_number","11214311215411");
bankAccount.put("account_type","savings");
bankAccount.put("ifsc_code","HDFC0001233");
subscriptionRegistration.put("bank_account",bankAccount);
registrationLinkRequest.put("subscription_registration", subscriptionRegistration);
registrationLinkRequest.put("receipt", "Receipt No. 1");
registrationLinkRequest.put("email_notify", true);
registrationLinkRequest.put("sms_notify", true);
registrationLinkRequest.put("expire_by", 1580479824);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
registrationLinkRequest.put("notes", notes);

Invoice invoice = razorpay.invoices.createRegistrationLink(registrationLinkRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->createSubscriptionRegistration(array('customer'=>array('name'=>'Gaurav Kumar','email'=>'gaurav.kumar@example.com','contact'=>'9123456780'),'type'=>'link','amount'=>100,'currency'=>'INR','description'=>'Registration Link for Gaurav Kumar','subscription_registration'=>array('first_payment_amount'=>100, 'method'=>'emandate', 'auth_type'=>'debitcard' ,'max_amount'=>'50000','expire_at'=>'1634215992','bank_account'=>array('beneficiary_name'=>'Gaurav Kumar', 'account_number'=>'11214311215411', 'account_type'=>'savings', 'ifsc_code'=>'HDFC0001233')),'receipt'=>'Receipt No. 5','email_notify'=>true,'sms_notify'=>true,'expire_by'=>1634215992, 'notes'=> array('note_key 1'=> 'Beam me up Scotty','note_key 2'=> 'Tea. Earl Gray. Hot.'))   );

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createRegistrationLink({
  customer: {
    name: "Gaurav Kumar",
    email: "gaurav.kumar@example.com",
    contact: 9123456780
  },
  type: "link",
  amount: 100,
  currency: "INR",
  description: "Registration Link for Gaurav Kumar",
  subscription_registration: {
    first_payment_amount: 100,
    method: "emandate",
    auth_type: "debitcard",
    max_amount: 50000,
    expire_at: 1634215992,
    bank_account: {
      beneficiary_name: "Gaurav Kumar",
      account_number: "11214311215411",
      account_type: "savings",
      ifsc_code: "HDFC0001233"
    }
  },
  receipt: "Receipt No. 5",
  email_notify: true,
  sms_notify: true,
  expire_by: 1634215992,
  notes: {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.registration_link.create({
    'customer': {'name': 'Gaurav Kumar',
                 'email': 'gaurav.kumar@example.com',
                 'contact': 9123456780},
    'type': 'link',
    'amount': 0,
    'currency': 'INR',
    'description': '12 p.m. Meals',
    'subscription_registration': {
        'method': 'emandate',
        'auth_type': 'debitcard',
        'expire_at': 1580480689,
        'max_amount': 50000,
        'bank_account': {
            'beneficiary_name': 'Gaurav Kumar',
            'account_number': 11214311215411,
            'account_type': 'savings',
            'ifsc_code': 'HDFC0001233',
            },
        },
    'receipt': 'Receipt no. 1',
    'expire_by': 1880480689,
    'sms_notify': True,
    'email_notify': True,
    'notes': {'note_key 1': 'Beam me up Scotty',
              'note_key 2': 'Tea. Earl Gray. Hot.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": 9123456780
  },
  "type": "link",
  "amount": 100,
  "currency": "INR",
  "description": "Registration Link for Gaurav Kumar",
  "subscription_registration": {
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "debitcard",
    "max_amount": 50000,
    "expire_at": 1634215992,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": 11214311215411,
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt No. 5",
  "email_notify": 1,
  "sms_notify": 1,
  "expire_by": 1634215992,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}
Razorpay::SubscriptionRegistration.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "customer": map[string]interface{}{
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
  },
  "type": "link",
  "amount": 100,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": map[string]interface{}{
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "debitcard",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": map[string]interface{}{
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233",
    },
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": map[string]interface{}{
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot.",
  },
}

body, err := client.Invoice.CreateRegistrationLink(data, nil)

```json: Response
{
  "id": "inv_FHrZAOeCuB9HtK",
  "entity": "invoice",
  "receipt": "Receipt no. 26",
  "invoice_number": "Receipt no. 26",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrZAPOStKd4xS",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1880480689,
  "issued_at": 1595491123,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491123,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 0,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "test registration link",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/RllVOmA",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491123,
  "idempotency_key": null
}
```

#### Emandate via Aadhaar

```cURL: Emandate via Aadhaar
curl -u :
-X POST https://api.razorpay.com/v1/subscription_registration/auth_links
-H "Content-Type: application/json" \
-d '{
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780"
  },
  "type": "link",
  "amount": 0,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": {
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "aadhaar",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject registrationLinkRequest = new JSONObject();
JSONObject customer = new JSONObject();
customer.put("name","Gaurav Kumar");
customer.put("email","gaurav.kumar@example.com");
customer.put("contact","9123456780");
registrationLinkRequest.put("customer", customer);
registrationLinkRequest.put("type", "link");
registrationLinkRequest.put("amount", 0);
registrationLinkRequest.put("currency", "INR");
registrationLinkRequest.put("description", "12 p.m. Meals");
JSONObject subscriptionRegistration = new JSONObject();
subscriptionRegistration.put("method","emandate");
subscriptionRegistration.put("auth_type","aadhaar");
subscriptionRegistration.put("max_amount",50000);
subscriptionRegistration.put("expire_at",1609423824);
JSONObject bankAccount = new JSONObject();
bankAccount.put("beneficiary_name","Gaurav Kumar");
bankAccount.put("account_number","11214311215411");
bankAccount.put("account_type","savings");
bankAccount.put("ifsc_code","HDFC0001233");
subscriptionRegistration.put("bank_account",bankAccount);
registrationLinkRequest.put("subscription_registration", subscriptionRegistration);
registrationLinkRequest.put("receipt", "Receipt No. 1");
registrationLinkRequest.put("email_notify", true);
registrationLinkRequest.put("sms_notify", true);
registrationLinkRequest.put("expire_by", 1580479824);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
registrationLinkRequest.put("notes", notes);

Invoice invoice = razorpay.invoices.createRegistrationLink(registrationLinkRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->createSubscriptionRegistration(array('customer'=>array('name'=>'Gaurav Kumar','email'=>'gaurav.kumar@example.com','contact'=>'9123456780'),'type'=>'link','amount'=>100,'currency'=>'INR','description'=>'Registration Link for Gaurav Kumar','subscription_registration'=>array('first_payment_amount'=>100, 'method'=>'emandate', 'auth_type'=>'aadhaar' ,'max_amount'=>'50000','expire_at'=>'1634215992','bank_account'=>array('beneficiary_name'=>'Gaurav Kumar', 'account_number'=>'11214311215411', 'account_type'=>'savings', 'ifsc_code'=>'HDFC0001233')),'receipt'=>'Receipt No. 5','email_notify'=>true,'sms_notify'=>true,'expire_by'=>1634215992, 'notes'=> array('note_key 1'=> 'Beam me up Scotty','note_key 2'=> 'Tea. Earl Gray. Hot.'))   );

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createRegistrationLink({
  customer: {
    name: "Gaurav Kumar",
    email: "gaurav.kumar@example.com",
    contact: 9123456780
  },
  type: "link",
  amount: 100,
  currency: "INR",
  description: "Registration Link for Gaurav Kumar",
  subscription_registration: {
    first_payment_amount: 100,
    method: "emandate",
    auth_type: "aadhaar",
    max_amount: 50000,
    expire_at: 1634215992,
    bank_account: {
      beneficiary_name: "Gaurav Kumar",
      account_number: "11214311215411",
      account_type: "savings",
      ifsc_code: "HDFC0001233"
    }
  },
  receipt: "Receipt No. 5",
  email_notify: true,
  sms_notify: true,
  expire_by: 1634215992,
  notes: {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.registration_link.create({
    'customer': {'name': 'Gaurav Kumar',
                 'email': 'gaurav.kumar@example.com',
                 'contact': 9123456780},
    'type': 'link',
    'amount': 0,
    'currency': 'INR',
    'description': '12 p.m. Meals',
    'subscription_registration': {
        'method': 'emandate',
        'auth_type': 'aadhaar',
        'expire_at': 1580480689,
        'max_amount': 50000,
        'bank_account': {
            'beneficiary_name': 'Gaurav Kumar',
            'account_number': 11214311215411,
            'account_type': 'savings',
            'ifsc_code': 'HDFC0001233',
            },
        },
    'receipt': 'Receipt no. 1',
    'expire_by': 1880480689,
    'sms_notify': True,
    'email_notify': True,
    'notes': {'note_key 1': 'Beam me up Scotty',
              'note_key 2': 'Tea. Earl Gray. Hot.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": 9123456780
  },
  "type": "link",
  "amount": 100,
  "currency": "INR",
  "description": "Registration Link for Gaurav Kumar",
  "subscription_registration": {
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "aadhaar",
    "max_amount": 50000,
    "expire_at": 1634215992,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": 11214311215411,
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt No. 5",
  "email_notify": 1,
  "sms_notify": 1,
  "expire_by": 1634215992,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}
Razorpay::SubscriptionRegistration.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "customer": map[string]interface{}{
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
  },
  "type": "link",
  "amount": 100,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": map[string]interface{}{
    "first_payment_amount": 100,
    "method": "emandate",
    "auth_type": "aadhaar",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": map[string]interface{}{
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233",
    },
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": map[string]interface{}{
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot.",
  },
}

body, err := client.Invoice.CreateRegistrationLink(data, nil)

```json: Response
{
  "id": "inv_FHrZAOeCuB9HtK",
  "entity": "invoice",
  "receipt": "Receipt no. 26",
  "invoice_number": "Receipt no. 26",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrZAPOStKd4xS",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1880480689,
  "issued_at": 1595491123,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491123,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 0,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "test registration link",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/RllVOmA",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491123,
  "idempotency_key": null
}
```

##### Request Parameters

`customer`
: `object` Details of the customer to whom the registration link is sent.

    `name` _mandatory_
    : `string` Customer's name.

    `email` _mandatory_
    : `string` Customer's email address.

    `contact`_mandatory_
    : `integer` Customer's contact number.

`type` _mandatory_
: `string` In this case, the value is `link`.

`amount` _mandatory_
: `integer` The payment amount in the smallest currency sub-unit.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment.

`description` _mandatory_
: `string` A description that appears on the hosted page.

`subscription_registration`
: Details of the authorisation payment.

  `method` _mandatory_
  : `string` The authorization method. Here, it is `emandate`.

  `auth_type` _optional_
  : `string` Possible values:
    - `netbanking`
    - `debitcard`
    - `aadhaar`

`first_payment_amount` _optional_
  : `integer` The amount, in paise, the customer should be auto-charged in addition to the authorization amount. For example, `100000`.

`max_amount` _optional_
  : `integer` The maximum amount, in paise, a customer can be charged in a transaction. Know about [maximum and default values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/faqs.md#2-what-is-the-maximum-amount-which-can).

  `expire_at` _optional_
  : `integer` The Unix timestamp indicates till when you can use the token (authorization on the payment method) to charge the customer their subsequent payments. Defaults to `40 years`. The maximum value you can set is 40 years from the current date. Any value beyond this will throw an error.

  `bank_account`
  : The customer's bank account details.

    `beneficiary_name` _optional_
    : `string` Name on the beneficiary. For example `Gaurav Kumar`.
    
> **WARN**
>
> 
>     **Watch Out!**
>   
>     The `beneficiary_name` should be between 4 to 120 characters.
>     

    `account_number` _optional_
    : `string` Customer's bank account number. For example `11214311215411`.

    `account_type` _optional_
    : `string` Customer's bank account type. Possible values:
        - `savings` (default)
        - `current`

    `ifsc_code` _optional_
    : `string` Customer's bank IFSC. For example `HDFC0000001`.

`sms_notify` _optional_
: `boolean` Indicates if SMS notifications are to be sent by Razorpay. Possible values:
    - `true` (default): Notifications are sent by Razorpay .
    - `false`: Notifications are not sent by Razorpay.

`email_notify` _optional_
: `boolean` Indicates if email notifications are to be sent by Razorpay. Possible values:
    - `true` (default): Notifications are sent by Razorpay .
    - `false`: Notifications are not sent by Razorpay.

`expire_by` _optional_
: `integer` The Unix timestamp indicates the expiry of the registration link.

`receipt` _optional_
: `string` A unique identifier entered by you for the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`notes` _optional_
: `object` This is a key-value pair that is used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### 1.2.2. Send/Resend Notifications

The following endpoint sends/resends notifications with the short URL to the customer:

/invoices/:id/notify_by/:medium

  
### Sample Code

     ```cURL: Curl
      curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
      -X POST https://api.razorpay.com/v1/invoices/inv_1Aa00000000001/notify_by/sms

      ```java: Java
      RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      String invoiceId = "inv_1Aa00000000001";

      String medium = "sms";

      Invoice invoice = razorpay.invoices.notifyBy(invoiceId, medium);

      ```php: PHP
      $api = new Api($key_id, $secret);

      $api->invoice->fetch($invoiceId)->notify($medium);

      ```javascript: Node.js
      var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

      instance.invoices.notifyBy(invoiceId, medium)

      ```python: Python
      client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

      client.invoice.notify_by(invoiceId, medium)

      ```ruby: Ruby
      require "razorpay"
      Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

      invoiceId = "inv_JDdNb4xdf4gxQ7"

      medium = "email" 

      Razorpay::Invoice.notify_by(invoiceId, medium)

      ```go: Go
      import ( razorpay "github.com/razorpay/razorpay-go" )
      client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

      body, err := client.Invoice.Notify("", "", nil, nil)

      ```csharp: .NET
      RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      string invoiceId = "inv_Z6t7VFTb9xHeOs";

      string medium = "sms";

      Invoice invoice = client.Invoice.Fetch(invoiceId).NotifyBy(medium);
      ```

      ```json: Response
      {
        "success": true
      }
      ```
    

##### Path Parameters

`id`_mandatory_
: `string` The unique identifier of the invoice linked to the registration link for which you want to send the notification. For example, `inv_1Aa00000000001`.

`medium` _mandatory_
: `string` Determines through which medium you want to resend the notification. Possible values:
        - `sms`
        - `email`

#### 1.2.3. Cancel a Registration Link

The following endpoint cancels a registration link.

/invoices/:id/cancel

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You can only cancel registration link in the `issued` state.
> 

  
### Sample Code

     ```cURL: Curl
      curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
      -X POST https://api.razorpay.com/v1/invoices/inv_1Aa00000000001/cancel

      ```java: Java
      RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      String invoiceId = "inv_1Aa00000000001";

      Invoice invoice = razorpay.invoices.cancel(invoiceId);

      ```php:PHP
      $api = new Api($key_id, $secret);

      $api->invoice->fetch($invoiceId)->cancel();
      ```javascript: Node.js
      var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

      instance.invoices.cancel(invoiceId)

      ```python: Python
      client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

      client.invoice.cancel(invoiceId)

      ```ruby: Ruby
      require "razorpay"
      Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

      invoiceId = "inv_1Aa00000000001"

      Razorpay::Invoice.cancel(invoiceId)

      ```go: Go
      import ( razorpay "github.com/razorpay/razorpay-go" )
      client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

      body, err := client.Invoice.Cancel("", nil, nil)

      ```csharp: .NET
      RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      string invoiceId = "inv_Z6t7VFTb9xHeOs";

      Invoice invoice = client.Invoice.Fetch(invoiceId).Cancel();
      ```

      

      ```json: Response
      {
        "id": "inv_FHrfRupD2ouKIt",
        "entity": "invoice",
        "receipt": "Receipt No. 1",
        "invoice_number": "Receipt No. 1",
        "customer_id": "cust_BMB3EwbqnqZ2EI",
        "customer_details": {
            "id": "cust_BMB3EwbqnqZ2EI",
            "name": "",
            "email": "",
            "contact": "",
            "gstin": null,
            "billing_address": null,
            "shipping_address": null,
            "customer_name": "",
            "customer_email": "",
            "customer_contact": ""
        },
        "order_id": "order_FHrfRw4TZU5Q2L",
        "line_items": [],
        "payment_id": null,
        "status": "cancelled",
        "expire_by": 4102444799,
        "issued_at": 1595491479,
        "paid_at": null,
        "cancelled_at": 1595491488,
        "expired_at": null,
        "sms_status": "sent",
        "email_status": "sent",
        "date": 1595491479,
        "terms": null,
        "partial_payment": false,
        "gross_amount": 100,
        "tax_amount": 0,
        "taxable_amount": 0,
        "amount": 100,
        "amount_paid": 0,
        "amount_due": 100,
        "currency": "",
        "currency_symbol": "₹",
        "description": "Registration Link for Gaurav Kumar",
        "notes": {
            "note_key 1": "Beam me up Scotty",
            "note_key 2": "Tea. Earl Gray. Hot."
        },
        "comment": null,
        "short_url": "https://rzp.io/i/QlfexTj",
        "view_less": true,
        "billing_start": null,
        "billing_end": null,
        "type": "link",
        "group_taxes_discounts": false,
        "created_at": 1595491480,
        "idempotency_key": null
      }

      ```
      

      

      

      
    

##### Path Parameter

`id` _mandatory_
: `string` The unique identifier for the invoice linked to the registration link that you want to cancel. For example, `inv_1Aa00000000001`.

## 2. Fetch and Manage Tokens

Once you capture a payment, Razorpay Checkout returns a `razorpay_payment_id`. You can use this id to fetch the `token_id`, which is used to create and charge subsequent payments.

You can retrieve the `token_id` using the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#3-search-for-the-token) or the APIs given below.

### 2.1. Fetch Token by Payment ID

The following endpoint retrieves the `token_id` using a `payment_id`.

/payments/:id

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/payments/pay_1Aa00000000002

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_1Aa00000000002";

Payment payment = razorpay.payments.fetch(paymentId);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId);
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.fetch(paymentId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.fetch(paymentId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymentId = "pay_1Aa00000000002"

Razorpay::Payment.fetch(paymentId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Payment.Fetch("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string paymentId = "pay_Z6t7VFTb9xHeOs";

Payment payment = client.Payment.Fetch(paymentId);

```json: Response
{
  "id": "pay_FHf9a7AO0iXM9I",
  "entity": "payment",
  "amount": 0,
  "currency": "INR",
  "status": "captured",
  "order_id": "order_FHf9OwSeyetnKC",
  "invoice_id": "inv_FHf9P2hhXEti7i",
  "international": false,
  "method": "emandate",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": null,
  "card_id": null,
  "bank": "HDFC",
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "customer_id": "cust_DtHaBuooGHTuyZ",
  "token_id": "token_FHf9aAZR9hWJkq",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "fee": 0,
  "tax": 0,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {},
  "created_at": 1595447410
}
```

#### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the payment to be retrieved. For example, `pay_1Aa00000000002`.

### 2.2. Fetch Tokens by Customer ID

A customer can have multiple tokens and these tokens can be used to create subsequent payments for multiple products or services. The following endpoint retrieves tokens linked to a customer.

> **WARN**
>
> 
> **Watch Out!**
> 
> This endpoint will not fetch the details of expired and unused tokens.
> 

/customers/:id/tokens

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/customers/cust_1Aa00000000002/tokens

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_1Aa00000000002";

Customer customer = razorpay.customers.fetchTokens(customerId);

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->all();
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.fetchTokens(customerId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.all(customerId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000002 "

Razorpay::Customer.fetchTokens(customerId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Token.All("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string customerId = "cust_1Aa00000000001";

List token = client.Customer.Fetch(customerId).Tokens();

```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "token_FHf94Uym9tdYFJ",
      "entity": "token",
      "token": "2wDPM7VAlXtjAR",
      "bank": "HDFC",
      "wallet": null,
      "method": "emandate",
      "vpa": null,
      "recurring": true,
      "recurring_details": {
        "status": "confirmed",
        "failure_reason": null
      },
      "auth_type": "netbanking",
      "mrn": null,
      "used_at": 1595447381,
      "created_at": 1595447381,
      "bank_details": {
        "beneficiary_name": "Gaurav Kumar",
        "account_number": "1121431121541121",
        "ifsc": "HDFC0000001",
        "account_type": "savings"
      },
      "max_amount": 9999900,
      "expired_at": 1689971140,
      "dcc_enabled": false
    },
    {
      "id": "token_FHf9aAZR9hWJkq",
      "entity": "token",
      "token": "AwAwIFBmDSJ4p6",
      "bank": "HDFC",
      "wallet": null,
      "method": "emandate",
      "vpa": null,
      "recurring": true,
      "recurring_details": {
        "status": "confirmed",
        "failure_reason": null
      },
      "auth_type": "debitcard",
      "mrn": null,
      "used_at": 1595447410,
      "created_at": 1595447410,
      "bank_details": {
        "beneficiary_name": "Gaurav Kumar",
        "account_number": "1121431121541121",
        "ifsc": "HDFC0000001",
        "account_type": "savings"
      },
      "max_amount": 9999900,
      "expired_at": 4102444799,
      "dcc_enabled": false
    }
  ]
}
```

#### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the customer for whom tokens are to be retrieved. For example, `cust_1Aa00000000002`.

### 2.3. Delete Tokens

The following endpoint deletes a token.

/customers/:customer_id/tokens/:token_id

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/customers/cust_1Aa00000000002/tokens/token_1Aa00000000001

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_1Aa00000000002";

String tokenId = "token_1Aa00000000001";

Customer customer = razorpay.customers.deleteToken(customerId, tokenId);

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->delete($tokenId);
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.deleteToken(customerId, tokenId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.delete(customerId, tokenId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000004"

tokenId = "token_Hxe0skTXLeg9pF"

Razorpay::Customer.fetch(customerId).deleteToken(tokenId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Token.Delete("", "", nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000004"

tokenId = "token_Hxe0skTXLeg9pF"

Razorpay::fetch(customerId).deleteToken(tokenId)

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_DtHaBuooGHTuyZ";

String tokenId = "token_HouA2OQR5Z2jTL";

Customer customer = instance.customers.deleteToken(customerId, tokenId);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string customerId = "cust_Z6t7VFTb9xHeOs";

string tokenId = "token_1Aa00000000001";

Customer customer = client.Customer.Fetch(customerId).DeleteToken(tokenId);
```
```json: Response
{
    "deleted": true
}
```

#### Path Parameter

`customer_id` _mandatory_
: `string` The unique identifier of the customer with whom the token is linked. For example, `cust_1Aa00000000002`.

`token_id` _mandatory_
: `string` The unique identifier of the token that is to be deleted. For example, `token_1Aa00000000001`.

## 3. Create Subsequent Payments

You should perform the following steps to create and charge your customer subsequent payments:

1. [Create an order to charge the customer](#31-create-an-order-to-charge-the-customer)
1. [Create a recurring payment](#32-create-a-recurring-payment)

### 3.1. Create an Order to Charge the Customer

You have to create a new order every time you want to charge your customers. This order is different from the one created during the authorisation transaction.

The following endpoint creates an order.

/orders

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 1000);
orderRequest.put("currency", "");
orderRequest.put("payment_capture", true);
orderRequest.put("receipt", "Receipt No. 1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.put("notes", notes);

Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => '123', 'amount' => 100, 'payment_capture' => true, 'currency' => '', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
    'amount': 1000,
    'currency': '',
    'payment_capture': True,
    'receipt': 'Receipt No. 1',
    'notes': {'notes_key_1': 'Tea, Earl Grey, Hot',
              'notes_key_2': 'Tea, Earl Grey... decaf.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 1000,
  "currency": "",
  "payment_capture": true,
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}

Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_S ECRET")

data:= map[string]interface{}{
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notes": map[string]interface{}{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf.",
  },
}
body, err := client.Order.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("currency", "");
orderRequest.Add("receipt", "receipt#12b");
orderRequest.Add("payment_capture", true);
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
orderRequest.Add("notes", notes);

Order order = client.Order.Create(orderRequest);

```

```json: Success Response
{
   "id":"order_1Aa00000000002",
   "entity":"order",
   "amount":1000,
   "amount_paid":0,
   "amount_due":1000,
   "currency":"",
   "receipt":"Receipt No. 1",
   "offer_id":null,
   "status":"created",
   "attempts":0,
   "notes":{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey… decaf."
   },
   "created_at":1579782776
}

```json: Failure Response
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"The id provided does not exist",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
   }
}
```

### 3.2. Create a Recurring Payment

Once you have generated an `order_id`, use it with the `token_id` to create a payment and charge the customer. The following endpoint creates a payment to charge the customer.

/payments/create/recurring

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/recurring \
-H "Content-Type: application/json" \
-d '{
  "email": "",
  "contact": "",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("email", "");
paymentRequest.put("contact", "");
paymentRequest.put("amount", 1000);
paymentRequest.put("currency", "");
paymentRequest.put("order_id", "order_1Aa00000000002");
paymentRequest.put("customer_id", "cust_1Aa00000000001");
paymentRequest.put("token", "token_1Aa00000000001");
paymentRequest.put("recurring", true);
paymentRequest.put("description", "Creating recurring payment for Gaurav Kumar");
JSONObject notes = new JSONObject();
paymentRequest.put("notes_key_1","Tea, Earl Grey, Hot");
paymentRequest.put("notes_key_2","Tea, Earl Grey… decaf.");

Payment payment = razorpay.payments.createRecurringPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createRecurring(array('email'=>'','contact'=>'','amount'=>100,'currency'=>'','order_id'=>'order_1Aa00000000002','customer_id'=>'cust_1Aa00000000001','token'=>'token_1Aa00000000001','recurring'=>true,'description'=>'Creating recurring payment for Gaurav Kumar'));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createRecurringPayment({
  "email": "",
  "contact": "",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.createRecurring({
    'email': '',
    'contact': ,
    'amount': 1000,
    'currency': '',
    'order_id': "order_1Aa00000000002",
    'customer_id': "cust_1Aa00000000001",
    'token': 'token_1Aa00000000001',
    'recurring': True,
    'description': 'Creating recurring payment for Gaurav Kumar',
    'notes': {'note_key 1': 'Beam me up Scotty',
              'note_key 2': 'Tea. Earl Gray. Hot.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "email": "",
  "contact": "",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}
Razorpay::Payment.create_recurring_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "email": "",
  "contact": "",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": map[string]interface{}{
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot.",
  },
}
body, err := Client.Payment.CreateRecurringPayment(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("email", "");
paymentRequest.Add("contact", "");
paymentRequest.Add("amount", 1000);
paymentRequest.Add("currency", "");
paymentRequest.Add("order_id", "order_MZ35KPxZaqxfXq");
paymentRequest.Add("customer_id", "cust_KUyah9o60OPhfj");
paymentRequest.Add("token", "token_MZ37MsnhLNH4tN");
paymentRequest.Add("recurring", true);
paymentRequest.Add("description", "Creating recurring payment for Gaurav Kumar");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
paymentRequest.Add("notes", notes);

Payment payment = client.Payment.CreateRecurringPayment(paymentRequest);
```

```json: Success Response
{
  "razorpay_payment_id" : "pay_1Aa00000000001"
}

```json: Failure Response
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"Amount exceeds maximum amount allowed",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
   }
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The amount you want to charge your customer. This should be the same as the order amount.

`order_id`_mandatory_
: `string` The unique identifier of the order created. For example, `order_1Aa00000000002`.

`customer_id` _mandatory_
: `string` The unique identifier of the customer you want to charge. For example, `cust_1Aa00000000002`.

`token` _mandatory_
: `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

`recurring` _mandatory_
: `boolean` Determines whether recurring payment is enabled or not.
    - `true`: Recurring payment is enabled.
    - `false`: Recurring payment is not enabled.

`notes`_optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.
