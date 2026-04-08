---
title: Save customer card details on Custom Checkout
description: Securely store the card details of the customer as tokens, which can be used for repeat transactions made by the customer.
---

# Save customer card details on Custom Checkout

You can save sensitive card information entered by the customer as "tokens" in Razorpay. On a repeat visit, the customers will be able to pay directly just by entering the cvv of the card. This saves the customer the hassle of entering the card details again for every transaction.

## Prerequisites

- Sign up for a Razorpay account.
- [Generate the API Keys on Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#api-keys).

Watch the video to see how to generate API key in Test Mode.

[Video: https://www.youtube.com/embed/6mJnOWZDhDo]

- [Integrate with our Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md).

> **WARN**
>
> 
> **PCI DSS Certification**
> 
> A customer's payment information should never reach your servers, unless you are PCI DSS certified.
> 

## Workflow

1. [Enable Flash Checkout on Dashboard](#step-1-enable-flash-checkout-on-razorpay-dashboard).
2. [Create a Customer](#step-2-create-a-customer).
3. [Save Card Details on Checkout](#step-3-save-the-card-details-on-checkout).
4. [Fetch all Tokens of Customer](#step-4-fetch-all-tokens-of-customer).
5. [Create Payments using Saved Card](#step-5-create-payments-using-saved-card).

### Step 1: Enable Flash Checkout on Dashboard

Flash Checkout enables you to save customer card details right on Standard Checkout. Authentication is done using PCI DSS compliant technology to ensure that all the card information is stored with maximum possible security.

**Read more:** [Learn more about Flash Checkout.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#flash-checkout)

Watch this video to see how to enable or disable Flash Checkout:

[Video: https://www.youtube.com/embed/Vm_8yjjmN3I]

### Step 2: Create a Customer

Create a customer whose card details should be saved, from the Dashboard or using the Customers API. You can create customers with basic details such as `email` and `contact` using the following endpoint:

The following endpoint creates or add a customer with basic details such as name and contact details. You can use this API for various Razorpay Solution offerings.

/customers

```cURL: Curl

curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/customers \
-H "Content-Type: application/json" \
-d '{
    "name": "",
    "contact": "",
    "email": "",
    "fail_existing": "0",
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
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
  "name": "",
  "contact": "",
  "email": "",
  "fail_existing": "0",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
    "name": "",
    "contact": "",
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

$api->customer->create(array('name' => '', 'email' => '','contact'=>'','notes'=> array('notes_key_1'=> 'Tea, Earl Grey, Hot','notes_key_2'=> 'Tea, Earl Grey… decaf'));

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

Razorpay::Customer.create({
  "name": "",
  "contact": "",
  "email": "",
  "fail_existing": "0",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
})

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

```json: Success Response
{
  "id" : "cust_1Aa00000000004",
  "entity": "customer",
  "name" : "",
  "email" : "",
  "contact" : "",
  "gstin": null,
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "created_at ": 1234567890
}
```json: Failure Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Contact number should be at least 8 digits, including country code",
    "source": "business",
    "step": "NA",
    "reason": "invalid_contact_number",
    "metadata": {},
    "field": "contact"
  }
}
```

#### Request Parameters

`name` _optional_
: `string` Customer's name. Alphanumeric value with period (.), apostrophe ('), forward slash (/), at (@) and parentheses are allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

`contact ` _optional_
: `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

`email ` _optional_
: `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

`fail_existing` _optional_
: `string` Possible values:
     - `1` (default): If a customer with the same details already exists, throws an error.
     - `0`: If a customer with the same details already exists, fetches details of the existing customer.
   

`gstin` _optional_
: `string` Customer's GST number, if available. For example, `29XAbbA4369J1PA`.

`notes` _optional_
: `object` This is a key-value pair that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

**Read More**: [Learn more about Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

### Step 3: Save the Card Details on Checkout

While making the payment, the customer enters the card details in the Checkout form. If the card details should be saved by Razorpay, pass `customer_id` and `save=1` along with the other parameters into the Checkout form.

```js: Custom Checkout

  Pay
  
       var razorpay = new Razorpay({
        key: "",
        image: "https://i.imgur.com/n5tjHFD.jpg",
        name: "Crime Master Gogo",
       });
       var data = {
        amount: 6666,
        currency: "INR",
        email: "gaurav.kumar@example.com",
        contact: 9123456780,
        notes: {
          address: "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
        },
        customer_id: "cust_1Aa00000000001",
        save: 1,
        method: "card",
        'card[number]': '4242424242424242',
        'card[expiry_month]': '11',
        'card[expiry_year]': '23',
        'card[cvv]': '123',
        'card[name]': 'Gaurav Kumar'
       };

       document.getElementById("rzp-button1").onclick = function(){
        razorpay.createPayment(data);
        razorpay.on("payment.success", function(resp) {
          alert(resp.razorpay_payment_id)
          });
        razorpay.on("payment.error", function(resp){alert(resp.error.description)});
}

```

Once the payment is complete, token is generated with these card details.

#### Request Parameters

`customer_id` _mandatory_
: `string` Unique identifier of the customer. This can be obtained from the response of the previous step.

`save` _mandatory_
: `integer` Specifies if the card details should be stored as tokens. Possible values are:
  - `1`: Saves the card details.
  - `0` (default): Does not save the card details.

`card`
: The details of the card that should be entered while making the payment.

    `number` _mandatory_
    : `integer` Unformatted card number.

    `name` _mandatory_
    : `string` The name of the cardholder.

    `expiry_month` _mandatory_
    : `integer` Expiry month for card in MM format.

    `expiry_year` _mandatory_
    : `integer` Expiry year for card in YY format.

    `cvv` _mandatory_
    : `integer` CVV printed on the back of the card.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     - CVV is not required by default for tokenised cards across all networks.
>     - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>     - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>     - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>     - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.        
>     

**Read more:** [Learn about the other Checkout parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md) for web integration.

### Step 4: Fetch all Tokens of Customer

To display all the tokens created for a customer, fetch them as follows:

/customers/:customer_id/tokens

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/customers/:customer_id/tokens
```json: Response
{
  "entity" : "collection",
  "count" : 2,
  "items" : [
    {
      "id" : "token_4lsdksD31GaZ09",
      "entity" : "token",
      "method" : "card",
      "card" : {
        "entity" : "card",
        "name" : "Gaurav Kumar",
        "last4" : 1111,
        "network" : "Visa",
        "expiry_month" : 12,
        "expiry_year" : 2021,
        "emi" : true,
        "issuer" : "HDFC"
      },
      "used_at" : 1473765044,
      "created_at" : 1473765044
    },
    {
      "id" : "token_4zwefDSCC829ma",
      "entity" : "token",
      "method" : "card",
      "card" : {
        "entity": "card",
        "name": " Gaurav Kumar",
        "network": "MasterCard",
        "international": false,
        "expiry_month": 9,
        "expiry_year": 2020,
        "last4" : 1221,
        "emi": false
      },
      "used_at": null,
      "created_at" : 1473765043
    }
  ]
}
```

#### Path Parameter

`customer_id`
: `string` Unique identifier of the customer.

### Step 5: Create Payments using Saved Card

After the card is saved, for every online transaction thereafter, customers can quickly complete the payment by entering only the `cvv`. If the card details should be saved by Razorpay, the following additional parameters should be passed into the Checkout form.

```js: Custom Checkout

  Pay
  
       var razorpay = new Razorpay({
        key: "",
        image: "https://i.imgur.com/n5tjHFD.jpg",
        name: "Crime Master Gogo",
       });
       var data = {
        amount: 6666,
        currency: "INR",
        email: "gaurav.kumar@example.com",
        contact: 9123456780,
        notes: {
          address: "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
        },
        customer_id: "cust_1Aa00000000001",
        token:"token_4zwefDSCC829ma",
        method: "card",
        'card[cvv]': '123'
       };

       document.getElementById("rzp-button1").onclick = function(){
        razorpay.createPayment(data);
        razorpay.on("payment.success", function(resp) {
          alert(resp.razorpay_payment_id)
          });
        razorpay.on("payment.error", function(resp){alert(resp.error.description)});
}

```

#### Request Parameters

`customer_id`
: `string` Unique identifier of the customer.

`token`
: `string` Token of the saved method. This is generated by Razorpay.

`card[cvv]`
: `integer` cvv for the card. 
  
> **INFO**
>
> 
>   **Handy Tips**
> 
>     - CVV is not required by default for tokenised cards across all networks.
>     - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>     - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>     - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>     - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.        
>   

### Delete Tokens

In situations where your customers want to remove the saved cards from their respective accounts, you can do the same by deleting the tokens at your end.

/customers/:customer_id/tokens/:token_id

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/customers/cust_1Aa00000000001/tokens/token_4zwefDSCC829ma
```json: Response
{
    "deleted": true
}
```

#### Path Parameters

`customer_id`
: `string` Unique identifier of the customer.

`token`
: `string` Token of the saved method that needs to be deleted.

Customers can [delete their card details by visiting this link and following the on-screen instructions](https://razorpay.com/flashcheckout/manage/).
