---
title: S2S UPI Collect Flow
description: Collect UPI payments from your customers using the Razorpay S2S UPI Collect Flow API.
---

# S2S UPI Collect Flow

UPI payments enable customers to make payments using a Virtual Payment Address (VPA) without entering bank information.

Customers enter their VPAs on your UI, open the respective UPI apps and complete the payment after 2-factor authentication (UPI PIN and MPIN) on their mobile devices. Customers are redirected to your website or app after successful payment.

In this flow, customers likely enter invalid VPAs or forget their VPAs, which could lead to higher drop-off rates. To overcome this problem, Razorpay enables you to validate and save the VPAs of a customer. Know more about [Saved VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/saved-vpa.md).

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md).
> 

**NPCI Restrictions for UPI Collect Flow**

As per NPCI guidelines, the following MCC codes are restricted and cannot accept UPI Collect payments:

  
### Restricted MCC Codes

     
     MCC Code | Category
     ---
     5816 | Digital Goods: Games
     ---
     6540 | POI Funding Transactions (excluding MoneySend)
     ---
     4812 | Telecommunication Equipment and Telephone Sales
     ---
     4814 | Telecommunication Services
     ---
     7408 | Lending Platform
     ---
     6513 | Real Estate Agents and Managers - Rentals
     ---
     7995 | Betting/Lottery
     ---
     5412 | Grocery Stores, Supermarkets
     ---
     5413 | Grocery Stores, Supermarkets
     
    

### Best Practices

Follow these best practices to accept online payments using the UPI collect flow:
- [Validate the VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/validate-vpa.md) before initiating the payment request.
- Add a custom UPI Collect expiry based on the business requirement to provide enough time for the customer to complete the payment.
- Use the [Saved VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/saved-vpa.md) feature offered by Razorpay to provide a better customer experience.

## Prerequisites

- Reach out to our [Support Team](https://razorpay.com/support/#raise-a-request) to enable VPA validation and saved VPA features for your account.
- Keep the API keys (`Key_Id` and `Key_Secret`) handy for integration. 
- [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.

## User Flow

Let us understand the process for accepting payments via the UPI collect flow:

1. The customer selects UPI as the payment method and enters the VPA of their choice on the UI.
 Razorpay validates the entered VPA.
2. The customer saves the entered VPA details while completing the payment.
Razorpay saves all the valid VPA details as **tokens**.
3. On a repeat visit, the customer selects the VPA token to complete the payment.

## Create VPA Tokens

Given below are the steps to create VPA tokens:

1. [Create a customer](#step-1-create-a-customer) or fetch the customer for whom the VPA should be saved.
2. [Create an order](#step-2-create-an-order).
3. [Validate the VPA](#step-3-validate-the-vpa) entered by the customer.
4. [Initiate payment](#step-4-initiate-a-payment) with a collect request on the provided VPA.
5. [Handle Payment Success and Error Events](#step-5-handle-payment-success-and-error-events).

### Step 1: Create a Customer

> **INFO**
>
> 
> **Handy Tips**
> 
> Skip this step if you already have customers created in your account.
> 

Create a customer whose VPAs should be saved, with details such as `email` and `contact`.

/customers

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/customers \
-H "Content-Type: application/json" \
-d '{
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "fail_existing": "0"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject customerRequest = new JSONObject();
customerRequest.put("name","Gaurav Kumar");
customerRequest.put("contact","9123456780");
customerRequest.put("email","gaurav.kumar@example.com");
customerRequest.put("fail_existing","0");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
customerRequest.put("notes",notes);

Customer customer = razorpay.customers.create(customerRequest);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.create({
  "name": "Gaurav Kumar",
  "contact": 9123456780,
  "email": "gaurav.kumar@example.com",
  "fail_existing": "0",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->create(array('name' => 'Gaurav Kumar', 'email' => 'gaurav.kumar@example.com','contact'=>'9123456780','notes'=> array('notes_key_1'=> 'Tea, Earl Grey, Hot','notes_key_2'=> 'Tea, Earl Grey… decaf'));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();

options.Add("name", "Gaurav Kumar"); 
options.Add("contact", "9123456780"); 
options.Add("email", "gaurav.kumar@example.com"); 
options.Add("fail_existing", "0"); 

Customer customer = Customer.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Customer.create({
  "name": "Gaurav Kumar",
  "contact": 9123456780,
  "email": "gaurav.kumar@example.com",
  "fail_existing": "0",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
})

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.create({
  name: "Gaurav Kumar",
  contact: 9123456780,
  email: "gaurav.kumar@example.com",
  fail_existing: "0",
  notes: {
    notes_key_1: "Tea, Earl Grey, Hot",
    notes_key_2: "Tea, Earl Grey… decaf."
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
    "name": "Gaurav Kumar",
    "contact": 9123456780,
    "email": "gaurav.kumar@example.com",
    "fail_existing": "0",
    "notes": map[string]interface{}{
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf.",
	},
}

body, err := client.Customer.Create(data, nil)
```

```json: Response
{
  "id": "cust_EIW4T2etiweBmG",
  "entity": "customer",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "gstin": null,
  "created_at": 1234567890
}
```

#### Request Parameters

`name` _mandatory_
: `string` The name of the customer.

`email` _optional_
: `string` The email id of the customer.

`contact` _optional_
: `string` The phone number of the customer.

`fail_existing` _optional_
: `string` The request throws an exception by default if a customer with the exact details already exists. You can pass an additional parameter `fail_existing` to get the existing customer's details in the response. Possible values:
     - `1` (default): If a customer with the same details already exists, throws an error.
     - `0`: If a customer with the same details already exists, fetches details of the existing customer.

`notes` _optional_
: `json object` Set of key-value pairs that can be associated with an entity. This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported.

### Step 2: Create an Order

You should create an order before initiating a payment at your end.

/orders

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 200,
  "currency": "INR"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount",50000);
orderRequest.put("currency","INR");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_1","Tea, Earl Grey, Hot");
orderRequest.put("notes",notes);

Order order = razorpay.orders.create(orderRequest);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$$api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "order_rcptid_11");
options.Add("currency", "INR");
Order order = client.Order.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}

Razorpay::Order.create(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "INR",
  receipt: "receipt#1",
  notes: {
    key1: "value3",
    key2: "value2"
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 50000,
  "currency": "INR",
  "receipt": "some_receipt_id",
  "partial_payment": false,
  "notes": map[string]interface{}{
      "key1": "value1",
      "key2": "value2",
    } 
}
body, err := client.Order.Create(data, nil)
```

```json: Response
{
  "id": "order_Ee0biRtLOqzRjP",
  "entity": "order",
  "amount": 200,
  "amount_paid": 0,
  "amount_due": 200,
  "currency": "INR",
  "receipt": null,
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1586789358
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of ₹295, enter `29500`.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. Only `INR` is supported.

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Maximum length of 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

### Step 3: Validate the VPA

Collect the VPA details of the customer and validate it as follows:

/payments/validate/vpa

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payments/validate/vpa \
-H "Content-Type: application/json" \
-d '{
  "vpa": "gauravkumar@exampleupi"
}'

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("vpa", "gauravkumar@exampleupi");

Payment payment = client.Payment.ValidateUpi(paymentRequest)
```

```json: Response
{
  "vpa": "gauravkumar@exampleupi",
  "success": true,
  "customer_name": "Gaurav Kumar"
}
```

#### Request Parameters

`vpa` _mandatory_
: `string` The virtual payment address (VPA) you want to validate. For example, `gauravkumar@exampleupi`.

  
> **WARN**
>
> 
>   **Deprecation Notice**
> 
>   UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md) to switch to UPI Intent.
>   

### Step 4: Initiate a Payment

Once validated, you can now save the VPA provided by the customer. Create a payment with the valid `vpa` as follows:

/payments/create/upi

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/upi \
-H "Content-Type: application/json" \
-d '{
  "amount": 200,
  "currency": "INR",
  "order_id": "order_Ee0biRtLOqzRjP",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "upi",
  "customer_id": "cust_EIW4T2etiweBmG",
  "save": true,
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "note_key": "value1"
  },
  "upi":
  {
   "flow": "collect",
   "vpa": "gauravkumar@exampleupi",
   "expiry_time": 5
  }
}'

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient instance = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 500);
paymentRequest.put("currency", "INR");
paymentRequest.put("order_id", "order_JZluwjknyWdhnU");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9123456789");
paymentRequest.put("method", "upi");
paymentRequest.put("customer_id", "cust_EIW4T2etiweBmG");
paymentRequest.put("save", true);
paymentRequest.put("ip", "192.168.0.103");
paymentRequest.put("referer", "http");
paymentRequest.put("user_agent", "Mozilla/5.0");
paymentRequest.put("description", "Test flow");

JSONObject notes = new JSONObject();
notes.put("note_key", "value1");
paymentRequest.put("notes", notes);

JSONObject upi = new JSONObject();
upi.put("flow", "collect");
upi.put("vpa", "gauravkumar@exampleupi");
upi.put("expiry_time", 5);
paymentRequest.put("upi", upi);

Payment payment = instance.payments.createUpi(paymentRequest);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": 200,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "customer_id": "cust_EIW4T2etiweBmG",
    "save": true,
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
        "note_key": "value1"
    },
    "upi": {
        "flow": "collect",
        "vpa": "gauravkumar@exampleupi",
        "expiry_time": 5
    }
};

instance.payments.createUpi(data);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
    "amount": 200,
    "currency": "INR",
    "order_id": "order_GAWRjlWkVcRh0V",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456789",
    "method": "upi",
    "customer_id": "cust_EIW4T2etiweBmG",
    "save": True,
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
        "note_key": "value1"
    },
    "upi": {
        "flow": "collect",
        "vpa": "gauravkumar@exampleupi",
        "expiry_time": 5
    }
}

client.payment.createUpi(data)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 200,
  "currency": "INR",
  "order_id": "order_GAWRjlWkVcRh0V",
  "email": "gaurav.kumar@example.com",
  "contact": "9123456789",
  "method": "upi",
  "customer_id": "cust_EIW4T2etiweBmG",
  "save": 1,
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "note_key": "value1"
  },
  "upi": {
    "flow": "collect",
    "vpa": "gauravkumar@exampleupi",
    "expiry_time": 5
  }
}

Razorpay::Payment.create_upi(para_attr)

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createUpi(array(
    "amount" => 200,
    "currency" => "INR",
    "order_id" => "order_Jhgp4wIVHQrg5H",
    "email" => "gaurav.kumar@example.com",
    "contact" => "9123456789",
    "method" => "upi",
    "customer_id" => "cust_EIW4T2etiweBmG",
    "save" => true,
    "ip" => "192.168.0.103",
    "referer" => "http",
    "user_agent" => "Mozilla/5.0",
    "description" => "Test flow",
    "notes" => array(
        "note_key" => "value1"
    ),
    "upi" => array(
        "flow" => "collect",
        "vpa" => "gauravkumar@exampleupi",
        "expiry_time" => 5
    )
));

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
    "amount": 200,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "customer_id": "cust_EIW4T2etiweBmG",
    "save": true,
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": map[string]interface{}{
        "note_key": "value1",
    },
    "upi": map[string]interface{}{
        "flow": "collect",
        "vpa": "gauravkumar@exampleupi",
        "expiry_time": 5,
    },
}

body, err := client.Payment.CreateUpi(para_attr, nil)
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", 100);
paymentRequest.Add("currency", "INR");
paymentRequest.Add("order_id", "order_MSd9LNbSEB2Gnv");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9999999999");
paymentRequest.Add("method", "upi");
paymentRequest.Add("customer_id", "cust_Z6t7VFTb9xHeOs");
paymentRequest.Add("save", true);
paymentRequest.Add("ip", "192.168.0.103");
paymentRequest.Add("referer", "http");
paymentRequest.Add("user_agent", "Mozilla/5.0");
paymentRequest.Add("description", "Test flow");
Dictionary notes = new Dictionary();
notes.Add("note_key", "value1");
Dictionary upi = new Dictionary();
upi.Add("flow", "collect");
upi.Add("vpa", "gauravkumar@exampleupi");
upi.Add("expiry_time", 5);
paymentRequest.Add("notes", notes);
paymentRequest.Add("upi", upi);

Payment payment = client.Payment.CreateUpi(paymentRequest);
```

```json: Response
{
  "razorpay_payment_id": "pay_ERGVHAXaLNV1y5"
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The amount associated with the payment in the smallest unit of the supported currency. For example, `2000` means ₹20.

`currency` _mandatory_
: `string` ISO code of the currency associated with the payment amount. Only `INR` is supported.

`order_id` _mandatory_
: `string` Unique identifier of the order obtained in the response of the previous step.

`notes` _optional_
: `json object` Key-value pairs that can hold additional information about the payment. 
 Refer to the [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) section of the API Reference Guide.

`description` _optional_
: `string` Descriptive text of the payment.

`contact` _mandatory_
: `string` Phone number of the customer.

`email` _mandatory_
: `string` Email address of the customer.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   The `email` field is mandatory by default. However, you can contact the [support team](https://razorpay.com/support/#request) to make it optional using a feature flag.
>   

`save`
: `boolean` Specifies if the VPA should be stored as tokens. Possible values are:
   - `true`: Saves the VPA details.
   - `false`(default): Does not save the VPA details.

`customer_id` _mandatory_
: `string` Unique identifier of the customer, obtained from the response of [Step 1](#step-1-create-a-customer).

`ip` _mandatory_
: `string` The client's browser IP address. For example, `117.217.74.98`.

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser. For example, `https://example.com/`

`user_agent` _mandatory_
: `string` Value of `user_agent` header passed by the client's browser. 
For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**

`upi` 
: `object` Details of the collect expiry.

    `flow` _mandatory_
    : `string` Specify the type of the UPI payment flow. 
 Possible values are:
      - `collect` (default)
      - `intent`

     `vpa` _mandatory_
    : `string` The customer's VPA to which the collect request will be sent.

    `expiry_time` _mandatory_
    : `integer` The number of minutes after which the link will expire. The default value is `5`. Maximum value is `5760`.

#### Response Parameters

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout only for successful payments.

### Step 5: Handle Payment Success and Error Events

Once the customer completes the payment, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

#### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/payment-methods-error-parameters.md#upi) for details.

## Create Payments using Tokens

The customer can make payments using the VPA tokens (which were saved earlier) on a repeat transaction.

1. [Create an order](#step-1-create-an-order).
2. [Fetch all tokens of a customer](#step-2-fetch-vpa-tokens-of-a-customer).
3. [Initiate a payment](#step-3-initiate-a-payment-using-vpa-token) with the token selected by the customer.
4. [Handle Payment Success and Error Events](#step-4-handle-payment-success-and-error-events).

### Step 1: Create an Order

You should create an order before initiating the payment.

/orders

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 600,
  "currency": "INR"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount",50000);
orderRequest.put("currency","INR");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_1","Tea, Earl Grey, Hot");
orderRequest.put("notes",notes);

Order order = razorpay.orders.create(orderRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$$api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "order_rcptid_11");
options.Add("currency", "INR");
Order order = client.Order.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}

Razorpay::Order.create(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "INR",
  receipt: "receipt#1",
  notes: {
    key1: "value3",
    key2: "value2"
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 50000,
  "currency": "INR",
  "receipt": "some_receipt_id",
  "partial_payment": false,
  "notes": map[string]interface{}{
      "key1": "value1",
      "key2": "value2",
    } 
}
body, err := client.Order.Create(data, nil)
```

```json: Response
{
  "id": "order_ExhN1Y0100Dkjw",
  "entity": "order",
  "amount": 600,
  "amount_paid": 0,
  "amount_due": 600,
  "currency": "INR",
  "receipt": null,
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1586789358
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of ₹295, enter `29500`. Payment can only be made for this amount against the order.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. Refer the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Can have a maximum length of 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Step 2: Fetch VPA Tokens of a Customer

Use the API given below to retrieve all the card (if saved earlier) and VPA tokens of a customer.

/customers/:customer_id/tokens

```curl: Request
curl -u : \
-X GET https://api.razorpay.com/v1/customers/cust_EIW4T2etiweBmG/tokens

```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "token_EeO65VIv8BXZg5",
      "entity": "token",
      "token": "D7Qun28CcPwNVy",
      "bank": null,
      "wallet": null,
      "method": "upi",
      "vpa": {
        "username": "gauravkumar",
        "handle": "exampleupi",
        "name": null
      },
      "recurring": false,
      "recurring_details": {
        "status": "not_applicable",
        "failure_reason": null
      },
      "auth_type": null,
      "mrn": null,
      "used_at": 1586872080,
      "created_at": 1586872080,
      "start_time": null,
      "dcc_enabled": false
    },
    {
      "id": "token_EeroOjvOvorT5L",
      "entity": "token",
      "token": "4ydxm47GQjrIEx",
      "bank": null,
      "wallet": null,
      "method": "card",
      "card": {
        "entity": "card",
        "name": "Gaurav Kumar",
        "last4": "8430",
        "network": "Visa",
        "type": "credit",
        "issuer": "HDFC",
        "international": false,
        "emi": true,
        "expiry_month": 12,
        "expiry_year": 2030,
        "flows": {
          "otp": true,
          "recurring": true
        }
      },
      "vpa": null,
      "recurring": false,
      "auth_type": null,
      "mrn": null,
      "used_at": 1586976724,
      "created_at": 1586976724,
      "expired_at": 1672511399,
      "dcc_enabled": false
    }
  ]
}
```

### Step 3: Initiate a Payment Using VPA Token

In each payment create request, instead of the `vpa` field, pass the `customer_id` and `token` attributes:

/payments/create/upi

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/upi \
-H "Content-Type: application/json" \
-d '{
  "amount": 600,
  "currency": "INR",
  "order_id": "order_ExhN1Y0100Dkjw",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "upi",
  "customer_id": "cust_EIW4T2etiweBmG",
  "token": "token_EeO65VIv8BXZg5"
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "note_key": "value1"
  }
}'
```json: Response
{
  "razorpay_payment_id": "pay_ERGVHAXaLNV1y5",
    "next": [
      {
        "action": "poll",
        "url": "https://api.razorpay.com/v1/payments/pay_ERGVHAXaLNV1y5"
      }
    ]
}
```

#### Request Parameters

`customer_id`
: `string` Unique identifier of the customer.

`token`
: `string` Token of the saved VPA.

#### Response Parameters

Once the payment is successfully created, you will receive a response containing the `next` array. This array tells you the next steps that you should take to process the payment:

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout only for successful payments.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` The action that you need to perform further. In this case, the value is `poll`

    `url`
    : `string` Contains the URL that you must poll to fetch the status of the payment, either `authorized` or `failed`.

### Step 4: Handle Payment Success and Error Events

Once the customer completes the payment, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

#### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/payment-methods-error-parameters.md#upi) for details.

#### Verify Payment Status

You can verify the status of the payments using any of the following methods:

- Poll Razorpay servers periodically for the [payments made for the order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-payments.md) using our Fetch Payment APIs.
- Subscribe to the webhook events created in our system for each of the following entities:

  - [payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md)
  - [orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/orders.md)

#### Payment failure and re-initiating payment

If the Order is not marked `paid` within 2-3 minutes, then you can re-initiate payment for the same.

### Related Information

- [UPI Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/payment-methods-error-parameters.md#upi)
- [UPI Transaction Limits](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/transaction-limits/upi.md)
