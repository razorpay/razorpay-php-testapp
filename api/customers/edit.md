---
title: Edit Customer Details
description: Edit Customer Details using Razorpay Customers API.
---

# Edit Customer Details

## Edit Customer Details

Use this endpoint to edit the customer details such as name, email and contact details. When editing a customer's details, ensure that the combination of the values in the `email` and `contact` attributes is unique for every customer.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X PUT https://api.razorpay.com/v1/customers/cust_1Aa00000000003 \
-H "Content-Type: application/json" \
-d '{
  "name": "",
  "email": "",
  "contact": ""
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_1Aa00000000003";

JSONObject customerRequest = new JSONObject();
customerRequest.put("name","");
customerRequest.put("contact","");
customerRequest.put("email","");

Customer customer = razorpay.customers.edit(customerId,customerRequest);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.edit(customerId,{
  "name": "",
  "email": "",
  "contact": 
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

customerId := "cust_1Aa00000000003"

data = map[string]interface{}{
  "name": "",
  "email": "",
  "contact": ,
}
body, err := client.Customer.Edit(customerId, data, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->edit(array('name' => '', 'email' => '', 'contact': '', 'notes'=> array('notes_key_1'=> 'Tea, Earl Grey, Hot','notes_key_2'=> 'Tea, Earl Grey… decaf')));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000003"

Razorpay::Customer.edit(customerId,{
  "name": "",
  "email": "",
  "contact": ,
})

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.edit(customerId,{
  name: "",
  email: "",
  contact: 
})

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string customerId = "cust_1Aa00000000003";

Dictionary customerRequest = new Dictionary();
customerRequest.Add("name", "");
customerRequest.Add("contact", "");
customerRequest.Add("email", "");

Customer card = client.Customer.Fetch(customerId).Edit(customerRequest);
```

### Parameters

`id` _mandatory_
: `string` The unique identifier linked to the customer.

### Parameters

`name` _optional_
: `string` Customer's name. Alphanumeric, with period (.), apostrophe ('), forward slash (/), at (@) and parentheses allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

`contact` _optional_
: `string` The customer's phone number. A maximum length of 15 characters. For example, `+919876543210`.

`email` _optional_
: `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

### Parameters

`id`
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

`entity` _optional_
: `string` Indicates the type of entity.

`name` 
: `string` Customer's name. Alphanumeric, with period (.), apostrophe (') and parentheses allowed. The name must be between 3-50 characters in length.

`contact`
: `string` The customer's phone number. A maximum length of 15 characters including country code.

`email`
: `string` The customer's email address. A maximum length of 64 characters.

`gstin`
: `string` GST number linked to the customer. For example, `29XAbbA4369J1PA`.

`notes`
: `string` This is a key-value pair that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` UNIX timestamp, when the customer was created. For example, `1234567890`.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.

* solution: The API keys must be active and entered correctly with no whitespace before or after the keys.
 
Contact number should be at least 8 digits, including country code.
* code: 400
* description: The contact number is less than 8 digits.
* solution: Enter a contact number that meets the validation criteria. It should have at least 8 digits, including the country code.

id is not a valid id.
* code: 400
* description: The `customer_id` passed is invalid.
* solution: Use a valid `customer_id`.
