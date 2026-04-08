---
title: Delete an Allowed Payer Account
description: Delete an Allowed Payer Account using the Razorpay Smart Collect API.
---

# Delete an Allowed Payer Account

## Delete an Allowed Payer With TPV

Use this endpoint to delete the allowed payer's account details added to a Customer Identifier. You can delete one account detail in a single request.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/virtual_accounts/va_DlGmm7jInLudH9/allowed_payers/ba_DlGmm9mSj8fjRM \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String virtualId = "va_Di5gbNptcWV8fQ";

String allowedPlayer = "ba_DlGmm9mSj8fjRM";

VirtualAccount virtualaccount = instance.VirtualAccounts.deleteAllowedPayer(virtualId,allowedPayersId);

```php: PHP
$api = new Api($api_key, $api_secret);

$api->virtualAccount->fetch($virtualId)->deleteAllowedPayer($allowedPayersId);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.virtualAccounts.deleteAllowedPayer(virtualId,allowedPayersId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.virtual_account.delete_allowed_player(virtualId,allowedPayersId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

virtualId = "va_Di5gbNptcWV8fQ"

allowedPayersId = "ba_J0XikIKgezi6PC"

Razorpay::VirtualAccount.delete_allowed_payer(virtualId,allowedPayersId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.VirtualAccount.DeleteAllowedPayer("", "", nil, nil)
```

### Response

```json: Response
null
```

### Parameters

`va_id` _mandatory_
: `string` The unique identifier of the Customer Identifier from which the `allowed_payers` account details should be deleted.

`id` _mandatory_
: `string` The unique identifier of the `allowed_payers` account that has to be deleted.

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

### Errors

Account validation is only applicable on bank account as a receiver type
* code: 400
* description: This error occurs when you try to add an allowed payer account on a Customer Identifier with VPA added as a receiver (with or without a Bank account).
* solution: You cannot add an allowed payer account on a Customer Identifier with VPA added as a receiver (with or without a Bank account).

Only 10 allowed payer accounts can be added.
* code: 400
* description: This error occurs when you try to add new allowed payer accounts when the overall `allowed_payers` limit is exceeded. You can only add up to 10 allowed payer accounts.
* solution: Make sure you do not add more than 10 allowed payers.

The bank account.account number field is required when bank account is present.
* code: 400
* description: This error occurs when you do not pass the bank account number in the request.
* solution: Make sure to pass the bank account number in the request.

Payer detail already exist for virtual account.
* code: 400
* description: This error occurs when you try to add a duplicate allowed payer's account with the same IFSC and account number that already exists.
* solution: Make sure to add a valid allowed payer's account.
