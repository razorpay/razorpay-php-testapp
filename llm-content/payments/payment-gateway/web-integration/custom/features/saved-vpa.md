---
title: Saved VPA
description: Check the Saved VPA feature for Custom Web Integration.
---

# Saved VPA

Razorpay enables you to save the VPAs of a customer. The VPAs entered by the customer is stored and secured as tokens in Razorpay. The customers can select the saved VPA and complete the payment on subsequent visits.
- This saves the customer the hassle of entering the VPA again for every transaction.
- Without Saved VPAs, the customers may enter invalid VPAs or forget their VPAs, which could lead to higher drop-off rates.

@include payment-methods/upi-collect-deprecated/custom

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## User Flow

The user flow for accepting payments using tokens is as follows:

1. The customer enters VPA to make UPI payments at your checkout.
2. The entered **VPAs are saved as tokens** by Razorpay.
3. On a repeat visit to your site, all the tokens saved for a customer are displayed on your checkout.
4. From the displayed list of VPAs, the customer selects VPAs of their choice to complete the payment.

## Prerequisites

To authenticate API requests sent to Razorpay servers, send the API key, a combination of `Key_Id` and `Key_Secret`, in the request header. [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.

## Integration Steps

The steps required to integrate tokens in the payment flow are as follows:

### 1.1 Create a Customer

Create a customer, whose VPAs should be saved, with details such as `email` and `contact`.

/customers

```cURL: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/customers \
-H "Content-Type: application/json" \
-d '{
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9900000000",
  "fail_existing": "0"
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject request = new JSONObject();
request.put("name", );
request.put("email", );

Customer customer = razorpayClient.Customers.create(request);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.create(data=data)

```php: PHP
$api = new Api($key_id, $secret);

$customer = $api->customer->create(array('name' => 'Razorpay User', 'email' => 'customer@razorpay.com')); 

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();

options.Add("name", "customer name"); 
options.Add("contact", "9000090000"); 
options.Add("email", "foo@example.com"); 
options.Add("fail_existing", "0"); 

Customer customer = Customer.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customer = Razorpay::Customer.create email: 'test@razorpay.com', contact: '9876543210'
puts customer.id #cust_6vRXClWqnLhV14

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.create({name, email, contact, notes})

```json: Response
{
  "id" : "cust_EIW4T2etiweBmG",
  "entity": "customer",
  "name" : "Gaurav Kumar",
  "email" : "gaurav.kumar@example.com",
  "contact" : "9900000000",
  "gstin": null,
  "created_at ": 1234567890
}
```

Know more about [Customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md).

### 1.2 Create an Order

An order must be created before initiating payment on your Checkout.

/orders

```cURL: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 200,
  "currency": "INR"
}'
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

Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

### 1.3 Create Tokens for a Customer

While making the UPI collect payment, the customer enters the VPA on the checkout. To save the VPA, send `customer_id` and `save` attributes along with the other [Checkout fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md#checkout-options) as shown below:

```js: Custom Checkout Sample Code
razorpay.createPayment({
  amount: 200,
  contact: '9900000000',
  email_id: 'gaurav.kumar@example.com',
  customer_id: 'cust_EIW4T2etiweBmG',
  save: 1,
  order_id: 'order_Ee0biRtLOqzRjP',
  method: 'upi'
  vpa: '9900000000@upi'
});
```

`customer_id`
: `string` Unique identifier of the customer. This can be obtained from the response of [Step 1](#step-1-create-a-customer).

`save`
: `integer` Specifies if the VPA should be stored as tokens. Possible values are:
  - `1`: Saves the VPA details.
  - `0`(default): Does not save the VPA details.

### 1.4 Fetch all Tokens of the Customer

All the VPA tokens of a customer can be retrieved as follows:

/customers/:customer_id/tokens

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
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
        "username": "9900000000",
        "handle": "upi",
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
        "expiry_year": 2022,
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

### 1.5 Create Payments Using Tokens

Once the VPAs are tokenized, in all the repeat transactions on your website, customers can complete their UPI payments without having to enter their VPAs again.

In subsequent payments, instead of `vpa`, pass `customer_id` and `token` attributes along with the other [Checkout fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md#checkout-options) as shown below:

```js: Custom Checkout Sample Code
.... //beginning of your custom code
razorpay.createPayment({
  amount: 100,
  contact: '9900000000',
  email_id: 'gaurav.kumar@example.com',
  customer_id: 'cust_EIW4T2etiweBmG',
  order_id: 'order_EAFrKULhM6Eopk',
  method: 'upi',
  token: 'token_EeO65VIv8BXZg5'
});
...... //rest of the code
```

`customer_id`
: `string` Unique identifier of the customer.

`token`
: `string` Token of the saved VPA obtained in the [previous step](#14-fetch-all-tokens-of-the-customer).
