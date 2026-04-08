---
title: Fetch All Invoices
description: Fetch the details of all Invoices using this endpoint.
---

# Fetch All Invoices

## Fetch All Invoices

Use this endpoint to retrieve the details of all invoices.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/invoices/

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

List invoice = razorpay.invoices.fetchAll();

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.invoice.all()

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

option := map[string]interface{}{
    "count" : 1,
}
body, err := client.Invoice.All(option, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Invoice.all(options)

```php: PHP
$api = new Api($key_id, $secret);

$api->invoice->all();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.invoices.all()

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

List invoice = client.Invoice.All();
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "inv_DAweOiQ7amIUVd",
      "entity": "invoice",
      "receipt": "#0961",
      "invoice_number": "#0961",
      "customer_id": "cust_DAtUWmvpktokrT",
      "customer_details": {
        "id": "cust_DAtUWmvpktokrT",
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "gstin": null,
        "billing_address": {
          "id": "addr_DAtUWoxgu91obl",
          "type": "billing_address",
          "primary": true,
          "line1": "Bakers Street",
          "line2": "Country Road",
          "zipcode": "400092",
          "city": "Mumbai",
          "state": "Maharashtra",
          "country": "in"
        },
        "shipping_address": null,
        "customer_name": "Gaurav Kumar",
        "customer_email": "gaurav.kumar@example.com",
        "customer_contact": "+919876543210"
      },
      "order_id": null,
      "line_items": [
        {
          "id": "li_DAweOizsysoJU6",
          "item_id": null,
          "name": "Book / English August - Updated name and quantity",
          "description": "150 points in Quidditch",
          "amount": 400,
          "unit_amount": 400,
          "gross_amount": 400,
          "tax_amount": 0,
          "taxable_amount": 400,
          "net_amount": 400,
          "currency": "",
          "type": "invoice",
          "tax_inclusive": false,
          "hsn_code": null,
          "sac_code": null,
          "tax_rate": null,
          "unit": null,
          "quantity": 1,
          "taxes": []
        },
        {
          "id": "li_DAwjWQUo07lnjF",
          "item_id": null,
          "name": "Book / A Wild Sheep Chase",
          "description": null,
          "amount": 200,
          "unit_amount": 200,
          "gross_amount": 200,
          "tax_amount": 0,
          "taxable_amount": 200,
          "net_amount": 200,
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
      "status": "draft",
      "expire_by": 1567103399,
      "issued_at": null,
      "paid_at": null,
      "cancelled_at": null,
      "expired_at": null,
      "sms_status": null,
      "email_status": null,
      "date": 1566891149,
      "terms": null,
      "partial_payment": false,
      "gross_amount": 600,
      "tax_amount": 0,
      "taxable_amount": 600,
      "amount": 600,
      "amount_paid": null,
      "amount_due": null,
      "currency": "",
      "currency_symbol": "",
      "description": "This is a test invoice.",
      "notes": {
        "updated-key": "An updated note."
      },
      "comment": null,
      "short_url": null,
      "view_less": true,
      "billing_start": null,
      "billing_end": null,
      "type": "invoice",
      "group_taxes_discounts": false,
      "created_at": 1566906474,
      "idempotency_key": null
    },
    {
      "id": "inv_DAul2TA6zodukS",
      "entity": "invoice",
      "receipt": null,
      "invoice_number": null,
      "customer_id": "cust_DAuFux32LnIsqJ",
      "customer_details": {
        "id": "cust_DAuFux32LnIsqJ",
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "gstin": null,
        "billing_address": {
          "id": "addr_DAuFuz499I5mgk",
          "type": "billing_address",
          "primary": true,
          "line1": "L-16, The Business Centre,",
          "line2": "61, Wellfield Road",
          "zipcode": "110001",
          "city": "New Delhi",
          "state": "Delhi",
          "country": "in"
        },
        "shipping_address": null,
        "customer_name": "Gaurav Kumar",
        "customer_email": "gaurav.kumar@example.com",
        "customer_contact": "+919876543210"
      },
      "order_id": "order_DAul2V0vnGXIML",
      "line_items": [
        {
          "id": "li_DAul2TuV4fhwd3",
          "item_id": "item_DAqThJ7v09UO3n",
          "name": "Magic Beans",
          "description": "Beans that make you go kaput!",
          "amount": 2000,
          "unit_amount": 2000,
          "gross_amount": 2000,
          "tax_amount": 0,
          "taxable_amount": 2000,
          "net_amount": 2000,
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
      "status": "cancelled",
      "expire_by": null,
      "issued_at": 1566899808,
      "paid_at": null,
      "cancelled_at": 1566973122,
      "expired_at": null,
      "sms_status": "sent",
      "email_status": "sent",
      "date": 1566994898,
      "terms": "Updated terms and conditions for Acme Corp",
      "partial_payment": false,
      "gross_amount": 2000,
      "tax_amount": 0,
      "taxable_amount": 2000,
      "amount": 2000,
      "amount_paid": 0,
      "amount_due": 2000,
      "currency": "",
      "description": null,
      "notes": [],
      "comment": "Updated comment on the Invoice",
      "short_url": "https://rzp.io/i/F7EPd9Q",
      "view_less": true,
      "billing_start": null,
      "billing_end": null,
      "type": "invoice",
      "group_taxes_discounts": false,
      "created_at": 1566899808,
      "idempotency_key": null
    }
  ]
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

`type` _optional_
: `string` Here, it is `invoice`.

`payment_id` _optional_
: `string` The unique identifier of the payment made by the customer against the invoice.

`receipt` _optional_
: `string` The unique receipt number that you entered for internal purposes.

`customer_id` _optional_
: `string` The unique identifier of the customer. When used, fetches all invoices generated for a customer.

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

The id provided does not exist.
* code: 400
* description: The invoice id entered is either invalid or does not belong to the requester account.
* solution: Enter a valid invoice id.
