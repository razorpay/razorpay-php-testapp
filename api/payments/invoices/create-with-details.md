---
title: Create an Invoice With Customer Details
description: Create an Invoice with basic details such as name and billing address.
---

# Create an Invoice With Customer Details

## Create an Invoice With Customer Details

Use this endpoint to create an invoice using details such as `name`, `billing_address` and `shipping_address`. 

> **INFO**
>
> 
> **Handy Tips**
> 
> You cannot create GST compliant invoices using APIs. This means you cannot add the following to the invoice when creating an invoice via APIs:

> - tax rate
> - cess
> - HSN code
> - SAC code
> 

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/invoices \
-H 'Content-type: application/json' \
-d '{
  "type": "invoice",
  "description": "Invoice for the month of January 2020",
  "partial_payment": true,
  "customer": {
    "name": "Gaurav Kumar",
    "contact": "+919876543210",
    "email": "gaurav.kumar@example.com",
    "billing_address": {
      "line1": "Bakers Street",
      "line2": "Country Road",
      "zipcode": "560068",
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    },
    "shipping_address": {
      "line1": "Bakers Street",
      "line2": "Country Road",
      "zipcode": "560068",
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "IN"
    }
  },
  "line_items": [
    {
      "name": "Master Cloud Computing in 30 Days",
      "description": "Book by Ravena Ravenclaw",
      "amount": 399,
      "currency": "",
      "quantity": 1
    }
  ],
  "sms_notify": true,
  "email_notify": false,
  "currency": "",
  "expire_by": 1589765167,
  "notes": {
    "key1": "Testing."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject invoiceRequest = new JSONObject();
invoiceRequest.put("type", "invoice");
invoiceRequest.put("description", "Invoice for the month of January 2020");
invoiceRequest.put("partial_payment",true);
JSONObject customer = new JSONObject();
customer.put("name","Gaurav Kumar");
customer.put("contact","+919876543210");
customer.put("email","gaurav.kumar@example.com");
JSONObject billingAddress = new JSONObject();
billingAddress.put("line1","Ground & 1st Floor, SJR Cyber Laskar");
billingAddress.put("line2","Hosur Road");
billingAddress.put("zipcode","560068");
billingAddress.put("city","Bengaluru");
billingAddress.put("state","Karnataka");
billingAddress.put("country","in");
customer.put("billing_address",billingAddress);
JSONObject shippingAddress = new JSONObject();
shippingAddress.put("line1","Ground & 1st Floor, SJR Cyber Laskar");
shippingAddress.put("line2","Hosur Road");
shippingAddress.put("zipcode","560068");
shippingAddress.put("city","Bengaluru");
shippingAddress.put("state","Karnataka");
shippingAddress.put("country","in");
customer.put("shipping_address",shippingAddress);
invoiceRequest.put("customer",customer);
List lines = new ArrayList<>();
JSONObject lineItems = new JSONObject();
lineItems.put("name","Master Cloud Computing in 30 Days");
lineItems.put("description","Book by Ravena Ravenclaw");
lineItems.put("amount",399);
lineItems.put("currency","");
lineItems.put("quantity",1);
lines.add(lineItems);
invoiceRequest.put("line_items",lines);
invoiceRequest.put("email_notify", true);
invoiceRequest.put("sms_notify", true);
invoiceRequest.put("currency","");
invoiceRequest.put("expire_by", 1580479824);

Invoice invoice = instance.invoices.create(invoiceRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.invoice.create({
  "type": "invoice",
  "description": "Invoice for the month of January 2020",
  "partial_payment": true,
  "customer": {
    "name": "Gaurav Kumar",
    "contact": "+919876543210",
    "email": "gaurav.kumar@example.com",
    "billing_address": {
      "line1": "Ground & 1st Floor, SJR Cyber Laskar",
      "line2": "Hosur Road",
      "zipcode": "560068",
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    },
    "shipping_address": {
      "line1": "Ground & 1st Floor, SJR Cyber Laskar",
      "line2": "Hosur Road",
      "zipcode": "560068",
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    }
  },
  "line_items": [
    {
      "name": "Master Cloud Computing in 30 Days",
      "description": "Book by Ravena Ravenclaw",
      "amount": 399,
      "currency": "",
      "quantity": 1
    }
  ],
  "sms_notify": True,
  "email_notify": True,
  "currency": "",
  "expire_by": 1589765167
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

line_items := make(map[string]interface{})
line_items["0"] = map[string]interface{}{
      "name": "Master Cloud Computing in 30 Days",
      "description": "Book by Ravena Ravenclaw",
      "amount": 399,
      "currency": "",
      "quantity": 1,
    }

data := map[string]interface{}{
  "type": "invoice",
  "description": "Invoice for the month of January 2020",
  "partial_payment": true,
  "customer": map[string]interface{}{
    "name": "Gaurav Kumar",
    "contact": "+919876543210",
    "email": "gaurav.kumar@example.com",
    "billing_address": map[string]interface{}{
      "line1": "Ground & 1st Floor, SJR Cyber Laskar",
      "line2": "Hosur Road",
      "zipcode": 560068,
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in",
    },
    "shipping_address": map[string]interface{}{
      "line1": "Ground & 1st Floor, SJR Cyber Laskar",
      "line2": "Hosur Road",
      "zipcode": 560068,
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in",
    },
  },
  "line_items": line_items,
  "sms_notify": true,
  "email_notify": true,
  "currency": "",
  "expire_by": 1589765167
}
body, err := client.Invoice.Create(data, nil)
```php: PHP
$api = new Api($key_id, $secret);

$api->invoice->create(array(
    'type' => 'invoice',
    'description' => 'Invoice for the month of January 2020',
    'partial_payment' => true,
    'customer' => array(
        'name' => 'Gaurav Kumar',
        'contact' => '+919876543210',
        'email' => 'gaurav.kumar@example.com',
        'billing_address' => array(
            'line1' => 'Ground & 1st Floor, SJR Cyber Laskar',
            'line2' => 'Hosur Road',
            'zipcode' => '560068',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'country' => 'in'
        ),
        'shipping_address' => array(
            'line1' => 'Ground & 1st Floor, SJR Cyber Laskar',
            'line2' => 'Hosur Road',
            'zipcode' => '560068',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'country' => 'in'
        )
    ),
    'line_items' => array(
        array(
            'name' => 'Master Cloud Computing in 30 Days',
            'description' => 'Book by Ravena Ravenclaw',
            'amount' => 399,
            'currency' => '',
            'quantity' => 1
        )
    ),
    'sms_notify' => true,
    'email_notify' => true,
    'currency' => '',
    'expire_by' => 1589765167
));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Invoice.create({
  "type": "invoice",
  "description": "Invoice for the month of January 2020",
  "partial_payment": true,
  "customer": {
    "name": "Gaurav Kumar",
    "contact": "+919876543210",
    "email": "gaurav.kumar@example.com",
    "billing_address": {
      "line1": "Ground & 1st Floor, SJR Cyber Laskar",
      "line2": "Hosur Road",
      "zipcode": 560068,
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    },
    "shipping_address": {
      "line1": "Ground & 1st Floor, SJR Cyber Laskar",
      "line2": "Hosur Road",
      "zipcode": 560068,
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    }
  },
  "line_items": [
    {
      "name": "Master Cloud Computing in 30 Days",
      "description": "Book by Ravena Ravenclaw",
      "amount": 399,
      "currency": "",
      "quantity": 1
    }
  ],
  "sms_notify": 1,
  "email_notify": 1,
  "currency": "",
  "expire_by": 1589765167
})

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.invoice.create({
  "type": "invoice",
  "description": "Invoice for the month of January 2020",
  "partial_payment": true,
  "customer": {
    "name": "Gaurav Kumar",
    "contact": "+919876543210",
    "email": "gaurav.kumar@example.com",
    "billing_address": {
      "line1": "Ground & 1st Floor, SJR Cyber Laskar",
      "line2": "Hosur Road",
      "zipcode": 560068,
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    },
    "shipping_address": {
      "line1": "Ground & 1st Floor, SJR Cyber Laskar",
      "line2": "Hosur Road",
      "zipcode": 560068,
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    }
  },
  "line_items": [
    {
      "name": "Master Cloud Computing in 30 Days",
      "description": "Book by Ravena Ravenclaw",
      "amount": 399,
      "currency": "",
      "quantity": 1
    }
  ],
  "sms_notify": true,
  "email_notify": true,
  "currency": "",
  "expire_by": 1589765167
})

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary invoiceRequest = new Dictionary();
invoiceRequest.Add("type", "invoice");
invoiceRequest.Add("description", "Invoice for the month of January 2020");
invoiceRequest.Add("partial_payment", true);
Dictionary customer = new Dictionary();
customer.Add("name", "Gaurav Kumar");
customer.Add("contact", "+919876543210");
customer.Add("email", "gaurav.kumar@example.com");
Dictionary billingAddress = new Dictionary();
billingAddress.Add("line1", "Bakers Street");
billingAddress.Add("line2", "Country Road");
billingAddress.Add("zipcode", "560068");
billingAddress.Add("city", "Bengaluru");
billingAddress.Add("state", "Karnataka");
billingAddress.Add("country", "in");
customer.Add("billing_address", billingAddress);
Dictionary shippingAddress = new Dictionary();
shippingAddress.Add("line1", "Bakers Street");
shippingAddress.Add("line2", "Country Road");
shippingAddress.Add("zipcode", "560068");
shippingAddress.Add("city", "Bengaluru");
shippingAddress.Add("state", "Karnataka");
shippingAddress.Add("country", "in");
customer.Add("shipping_address", shippingAddress);
invoiceRequest.Add("customer", customer);
List> lines = new List>();
Dictionary lineItems = new Dictionary();
lineItems.Add("name", "Master Cloud ComAdding in 30 Days");
lineItems.Add("description", "Book by Ravena Ravenclaw");
lineItems.Add("amount", 399);
lineItems.Add("currency", "");
lineItems.Add("quantity", 1);
lines.Add(lineItems);
invoiceRequest.Add("line_items", lines);
invoiceRequest.Add("email_notify", true);
invoiceRequest.Add("sms_notify", true);
invoiceRequest.Add("currency", "");
invoiceRequest.Add("expire_by", 1580479824);

Invoice invoice = client.Invoice.Create(invoiceRequest);
```

### Response

```json: Success 
{
  "id": "inv_E7q0tqkxBRzdau",
  "entity": "invoice",
  "receipt": null,
  "invoice_number": null,
  "customer_id": "cust_E7q0trFqXgExmT",
  "customer_details": {
    "id": "cust_E7q0trFqXgExmT",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "+919876543210",
    "gstin": null,
    "billing_address": {
      "id": "addr_E7q0ttqh4SGhAC",
      "type": "billing_address",
      "primary": true,
      "line1": "Bakers Street",
      "line2": "Country Road",
      "zipcode": "560068",
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    },
    "shipping_address": {
      "id": "addr_E7q0ttKwVA1h2V",
      "type": "shipping_address",
      "primary": true,
      "line1": "Bakers Street",
      "line2": "Country Road",
      "zipcode": "560068",
      "city": "Bengaluru",
      "state": "Karnataka",
      "country": "in"
    },
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "+919876543210"
  },
  "order_id": "order_E7q0tvRpC0WJwg",
  "line_items": [
    {
      "id": "li_E7q0tuPNg84VbZ",
      "item_id": null,
      "ref_id": null,
      "ref_type": null,
      "name": "Master Cloud Computing in 30 Days",
      "description": "Book by Ravena Ravenclaw",
      "amount": 399,
      "unit_amount": 399,
      "gross_amount": 399,
      "tax_amount": 0,
      "taxable_amount": 399,
      "net_amount": 399,
      "currency": "",
      "type": "invoice",
      "tax_inclusive": false,
      "hsn_code": null,
      "sac_code": null,
      "tax_rate": null,
      "unit": null,
      "quantity": 1,
      "taxes": []
    }
  ],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1589765167,
  "issued_at": 1579765167,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1579765167,
  "terms": null,
  "partial_payment": true,
  "gross_amount": 399,
  "tax_amount": 0,
  "taxable_amount": 399,
  "amount": 399,
  "amount_paid": 0,
  "amount_due": 399,
  "currency": "",
  "currency_symbol": "$",
  "description": "Invoice for the month of January 2020",
  "notes": [],
  "comment": null,
  "short_url": "https://rzp.io/i/2wxV8Xs",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "invoice",
  "group_taxes_discounts": false,
  "created_at": 1579765167
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

`type` _mandatory_
: `string` Indicates the type of entity. Here, it is `invoice`.

`description` _optional_
: `string` A brief description of the invoice.

`draft` _optional_
: `string` Invoice is created in `draft` state when value is set to `1`.

`customer_id` _mandatory_
: `string` You can pass the `customer_id` in this field, if you are using the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md). If not, you can pass the customer object described in the below fields.

`customer`
: `object` Customer details.

    `name` _mandatory_
    : `string` Customer's name. Alphanumeric, with period (.), apostrophe (') and parentheses allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

    `email` _optional_
    : `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

    `contact` _optional_
    : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

    `billing_address` 
    : `object` The customer's billing address.

      `line1` _mandatory_
      : `string` The first line of the customer's address.

      `line2` _optional_
      : `string` The second line of the customer's address.

      `city` _mandatory_
      : `string` The city

      `zipcode` _mandatory_
      : `string` The zipcode

      `state` _mandatory_
      : `string` The state

      `country` _mandatory_
      : `string` The country

    `shipping_address`
    : `object` The customer's shipping address.

      `line1` _mandatory_
      : `string` The first line of the customer's address.

      `line2` _optional_
      : `string` The second line of the customer's address.

      `city` _mandatory_
      : `string` The city

      `zipcode` _mandatory_
      : `string` The zipcode

      `state` _mandatory_
      : `string` The state

      `country` _mandatory_
      : `string` The country

`line_items`
: `object` Details of the line item that is billed in the invoice. Maximum of 50 line items.

    `item_id` _conditionally mandatory_
    : `string` If you are using the [Items API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices/create-item.md), you may use an existing item. You can choose to override details such as name, description by passing these along with `item_id`. While the invoice will show the updated details, the existing item will not be updated. This parameter is mandatory if you are not going to use any other parameter in the array.

    `name` _conditionally mandatory_
    : `string` The item name. Mandatory if `item_id` is not provided.

    `description` _optional_
    : `string` A brief description of the item.

    `amount` _conditionally mandatory_
    : `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is , pass the value as `30000`. Mandatory if `item_id` is not provided.

    `currency` _optional_
    : `string` The currency associated with the item. Defaults to `INR`. Know about the [list of supported international currencies.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies) This should match invoice currency.

    `quantity` _optional_
    : `integer` The number of units of the item billed in the invoice. Defaults to `1`.

.

    `quantity` _optional_
    : `integer` The number of units of the item billed in the invoice. Defaults to `1`.

`expire_by` _optional_
: `integer` Timestamp, in Unix format, at which the invoice will expire.

`sms_notify` _optional_
: `boolean` Defines who handles the SMS notification. Possible values:
   - `true` (default): Razorpay sends the notification to the customer.
   - `false`: You send the notification to the customer.

`email_notify` _optional_
: `boolean` Defines who handles the email notification. Possible values:
   - `true` (default): Razorpay sends the notification to the customer.
   - `false`: You send the notification to the customer.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
   - `true`: The customer can make partial payments.
   - `false` (default): The customer cannot make partial payments.

`currency` _conditionally mandatory_
: `string` The currency associated with the invoice. You must mandatorily pass this parameter if accepting international payments. If you have passed `currency` as a sub-parameter in the `line_item` object, you must ensure that the same currency is passed in both places. Know about the [list of supported international currencies.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies)

.

`notes` _optional_
: `string` Any custom notes added to the invoice. Maximum of 2048 characters.

### Parameters

`id`
: `string` The unique identifier of the invoice.

`entity`
: `string` Indicates the type of entity. Here, it is `invoice`.

`type`
: `string` Here, it should be `invoice`.

`invoice_number`
: `string` Unique number you added for internal reference. The minimum character length is 1 and maximum is 40.

`customer_id`
: `string` The unique identifier of the customer. You can create `customer_id` using the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md). Alternatively, you can pass the customer object described in the below fields.

`customer_details`
: `object` Details of the customer.

    `id`
    : `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

    `name`
    : `string` Customer's name. Alphanumeric, with period (.), apostrophe (') and parentheses allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

    `email`
    : `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

    `contact`
    : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

    `billing_address`
    : `object` Details of the customer's billing address.

        `id`
        : `string` The unique identifier generated for the customer's billing address.

        `type`
        : `string` The customer address type. Here it is `billing_address`.

        `primary`
        : `boolean` Defines if this is the primary address.
            - `true`: It is the customer's primary address.
            - `false`: It is not the customer's primary address.

        `line1`
        : `string` The first line of the customer's address.

        `line2`
        : `string` The second line of the customer's address.

        `city`
        : `string` The city.

        `zipcode`
        : `string` The zipcode.

        `state`
        : `string` The state.

        `country`
        : `string` The country.

    `shipping_address`
    : `object` Details of the customer's shipping address.

        `id`
        : `string` The unique identifier generated for the customer's shipping address.

        `type`
        : `string` The customer address type. Here it is `shipping_address`.

        `primary`
        : `boolean` Defines if this is the primary address.
            - `true`: It is the customer's primary address.
            - `false`: It is not the customer's primary address.

        `line1`
        : `string` The first line of the customer's address.

        `line2`
        : `string` The second line of the customer's address.

        `city`
        : `string` The city.

        `zipcode`
        : `string` The zipcode.

        `state`
        : `string` The state.

        `country`
        : `string` The country.

`order_id`
: `string` The unique identifier of the order associated with the invoice.

`line_items`
: `object` Details of the line item that is billed in the invoice. Maximum of 50 line items.

    `id`
    : `string` Unique identifier that is generated if a new item has been created while creating the invoice.

    `item_id`
    : `string` Unique identifier of the item generated using Items API that has been billed in the invoice.

    `name`
    : `string` The item's name.

    `description`
    : `string` A brief description of the item.

    `amount`
    : `integer` The price of the item.

    `currency`
    : `string` The currency associated with the item. Default is `INR`. Know about the [list of supported international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

    `type`
    : `string` Here, it is `invoice`.

    `quantity`
    : `integer` The quantity of the item billed in the invoice. Defaults to `1`.

.

    `type`
    : `string` Here, it is `invoice`.

    `quantity`
    : `integer` The quantity of the item billed in the invoice. Defaults to `1`.

`payment_id`
: `string` Unique identifier of a payment made against this invoice.

`status`
: `string` The status of the invoice. Know more about [Invoice States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/states.md). Possible values:
    - `draft`
    - `issued`
    - `partially_paid`
    - `paid`
    - `cancelled`
    - `expired`
    - `deleted`

`expire_by`
: `integer` Timestamp, in Unix format, at which the invoice will expire.

`issued_at`
: `integer` Timestamp, in Unix format, at which the invoice was issued to the customer.

`paid_at`
: `integer` Timestamp, in Unix format, at which the payment was made.

`cancelled_at`
: `integer` Timestamp, in Unix format, at which the invoice was cancelled.

`expired_at`
: `integer` Timestamp, in Unix format, at which the invoice expired.

`sms_status`
: `string` The delivery status of the SMS notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`email_status`
: `string` The delivery status of the email notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
  - `true`:  The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is , pass the value as `30000`.

`amount_paid`
: `integer` Amount paid by the customer against the invoice.

`amount_due`
: `integer` The remaining amount to be paid by the customer for the issued invoice.

`currency`
: `string` The currency associated with the invoice. You must mandatorily pass this parameter if accepting international payments. If you have passed `currency` as a sub-parameter in the `line_item` object, you must ensure that the same currency is passed in both places. Know about the [list of supported international currencies.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies)

.

`description`
: `string`  A brief description of the invoice. The maximum character length is 2048.

`notes`
: `object` Any custom notes added to the invoice. Maximum of 2048 characters.

`short_url`
: `string` The short URL that is generated. Share this link with customers to accept payments.

`date`
: `integer` Timestamp, in Unix format, that indicates the issue date of the invoice.

`terms`
: `string` Any terms to be included in the invoice. Maximum of 2048 characters.

`comment`
: `string` Any comments to be added in the invoice. Maximum of 2048 characters.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: The API key or secret are not entered or an invalid API key is used.
* solution: Use and enter the correct API details while executing the API.

customer is required.
* code: 400
* description: An invoice is issued without adding customer details.
* solution: Ensure that the customer details are entered.

the merchant doesn't have international activated.
* code: 400
* description: The line_items object has an international currency set. For example, USD, is not enabled for your account.
* solution: Ensure that your account has international payments enabled.

Currency of all items should be the same as of the invoice.
* code: 400
* description: There is a difference in currency entered between `line_items` and invoice currency.
* solution: Ensure that the `line_items` currency matches that of the invoice.

expire_by should be at least 15 minutes after current time.
* code: 400
* description: The expiry date is before or within 15 minutes of the current time
* solution: Ensure that the Expiry date is greater than the (current time + 15 minutes). For example, if the current time is 1 pm, the expiry date must be at least 1.15 pm.

line_items is required.
* code: 400
* description: A mandatory field is empty.
* solution: Ensure that you fill all the mandatory fields.
