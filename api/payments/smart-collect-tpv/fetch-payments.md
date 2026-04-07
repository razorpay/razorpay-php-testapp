---
title: Fetch Payments for a Customer Identifier With TPV
description: Fetch Payments for a Customer Identifier using the Razorpay **Smart Collect TPV** API.
---

# Fetch Payments for a Customer Identifier With TPV

## Fetch Payments for a Customer Identifier With TPV

Use this endpoint to fetch payments made against a particular Customer Identifier.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/virtual_accounts/va_CminDKtoToBGmd/payments \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String virtualId = "va_DlGmm7jInLudH9";

JSONObject params = new JSONObject();
params.put("count","1");
        
List payments = instance.virtualAccounts.fetchPayments(virtualId,params);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.virtual_account.payments(virtualId,options)

```php: PHP
$api = new Api('YOUR_KEY_ID, 'YOUR_KEY_SECRET');

$api->virtualAccount->fetch($virtualId)->payments($options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

virtualId = "va_IDDYE8gYTLJCEH"

options = {"count":1}

Razorpay::VirtualAccount.fetch(virtualId).payments(options)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.virtualAccounts.fetchPayments(virtualId,options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.VirtualAccount.Payments("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]

string virtualId = "va_Z6t7VFTb9xHeOs";

Dictionary param = new Dictionary();
param.Add("count","1");
        
List virtualaccount = client.VirtualAccount.Fetch(virtualId).Payments(param);
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "pay_JGmL38CqCHTyZZ",
      "entity": "payment",
      "amount": 1000,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "bank_transfer",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": null,
      "card_id": null,
      "bank": null,
      "wallet": null,
      "vpa": null,
      "email": "gaurav.kumar@example.com",
      "contact": "+919000090000",
      "customer_id": "cust_HWj3MjySAHSjtq",
      "notes": [],
      "fee": 12,
      "tax": 2,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "rrn": "209817848101"
      },
      "created_at": 1649402719
    }
  ]
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the Customer Identifier for which the payment details are to be fetched.

### Parameters

`from` _optional_
: `integer` Timestamp, in seconds, from when payments are to be fetched.

`to` _optional_
: `integer` Timestamp, in seconds, till when payments are to be fetched.

`count` _optional_
: `integer` Number of payments to be fetched. The default value is 10 and the maximum value is 100. This can be used for pagination, in combination with `skip`. 

`skip` _optional_
: `integer` Number of records to be skipped while fetching the payments. This can be used for pagination, in combination with `count`.

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
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30). Any request beyond `2147483647` UNIX timestamp will fail.

`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the dashboard.
* solution: Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the keys.
