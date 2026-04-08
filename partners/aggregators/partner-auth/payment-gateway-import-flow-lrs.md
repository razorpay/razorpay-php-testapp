---
title: Partner Auth | Payment Gateway (Import Flow - LRS)
heading: Payment Gateway (Import Flow - Liberalised Remittance Scheme)
description: Integrate Razorpay Payment Gateway using Partner Auth.
---

# Payment Gateway (Import Flow - Liberalised Remittance Scheme)

Follow these steps to integrate the standard checkout form on your website:

**1.1** [Create a customer in server](#11-create-a-customer-in-server) 

**1.2** [Create an order in server](#12-create-an-order-in-server) 

**1.3** [Integrate with checkout on client-side](#13-integrate-with-checkout-on-client-side) 

**1.4** [Handle payment success and failure](#14-handle-payment-success-and-failure) 

**1.5** [Store fields in server](#15-store-fields-in-your-server) 

**1.6** [Verify payment signature](#16-verify-payment-signature) 

**1.7** [Verify payment status](#17-verify-payment-status)

## 1.1 Create a Customer in Server

Creating a customer generates a unique `customer_id` by collecting basic details such as name, email and contact details. This `customer_id` must be included when creating a payment request to link the payment to the customer. Use the following API to create a customer.

You can try out our APIs on the Razorpay Postman Public Workspace. Fork the workspace and test the APIs with your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#test-mode-api-keys).

/customers

```cURL: Curl

curl -u [CLIENT_ID]:[CLIENT_SECRET] \  //This will be Partners Key and Secret.
-X POST https://api.razorpay.com/v1/customers \
-H "Content-Type: application/json" \
-H "X-Razorpay-Account: acc_Ef7ArBsdU5t9XL" //Sub-merchant’s account number (acc_xxxxxxxx) must be passed in the header.
-d '{
    "name": "Gaurav Kumar",
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com",
    "fail_existing": "0",
    "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey… decaf."
    }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[CLIENT_ID]", "[CLIENT_SECRET]");

JSONObject customerRequest = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArBsdU5t9XL");
instance.addHeaders(headers);
customerRequest.put("name","Gaurav Kumar");
customerRequest.put("contact","+919000090000");
customerRequest.put("email","gaurav.kumar@example.com");
customerRequest.put("fail_existing", "0");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
customerRequest.put("notes",notes);

Customer customer = razorpay.customers.create(customerRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("CLIENT_ID", "CLIENT_SECRET"))

headers = {"headers": {"X-Razorpay-Account": "acc_Ef7ArBsdU5t9XL"}}

client.customer.create({
  "name": "Gaurav Kumar",
  "contact": "+919000090000",
  "email": "gaurav.kumar@example.com",
  "fail_existing": "0",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("CLIENT_ID", "CLIENT_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArBsdU5t9XL",
    }

data := map[string]interface{}{
    "name": "Gaurav Kumar",
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com",
    "fail_existing": "0",
    "notes": map[string]interface{}{
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf.",
  },
}

body, err := client.Customer.Create(data, nil)

```php: PHP
$api = new Api($client_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArBsdU5t9XL");

$api->customer->create(array('name' => 'Gaurav Kumar', 'email' => 'gaurav.kumar@example.com','contact'=>'+919000090000','notes'=> array('notes_key_1'=> 'Tea, Earl Grey, Hot','notes_key_2'=> 'Tea, Earl Grey… decaf'));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[CLIENT_ID]", "[CLIENT_SECRET]");

client.addHeader("X-Razorpay-Account", "acc_Ef7ArBsdU5t9XL");

Dictionary options = new Dictionary();

options.Add("name", "Gaurav Kumar"); 
options.Add("contact", "+919000090000"); 
options.Add("email", "gaurav.kumar@example.com"); 
options.Add("fail_existing", "0"); 

Customer customer = Customer.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('CLIENT_ID', 'CLIENT_SECRET')

Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArBsdU5t9XL"}

Razorpay::Customer.create({
  "name": "Gaurav Kumar",
  "contact": "+919000090000",
  "email": "gaurav.kumar@example.com",
  "fail_existing": "0",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
})

```javascript: Node.js
var instance = new Razorpay({ key_id: 'CLIENT_ID', key_secret: 'CLIENT_SECRET' })
var instance = new Razorpay({headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"})

instance.customers.create({
  name: "Gaurav Kumar",
  contact: "+919000090000",
  email: "gaurav.kumar@example.com",
  fail_existing: "0",
  notes: {
    notes_key_1: "Tea, Earl Grey, Hot",
    notes_key_2: "Tea, Earl Grey… decaf."
  }
})
```

```json: Success
{
  "id": "cust_MpINfSkdEvtdxb",
  "entity": "customer",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "+919000090000",
  "gstin": null,
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "created_at": 1697550382
}
```json: Failure
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

  
### Request Parameters

      `name` _mandatory_
      : `string` Customer's name.
        - **Character length**: Between 5 and 50 characters.
        - **Allowed characters**: Uppercase letters (A-Z), lowercase letters (a-z) and spaces (not at the beginning).
        - **Not allowed characters**: Numbers, special characters (For example, @, ", ,, . and so on.), Unicode characters, emojis and non-Latin scripts or regional languages.
        - **Prohibited names**: Names must be meaningful and contextually appropriate.
            - Avoid using repetitive patterns (For example, aaa, xyz, kkk kk).
            - Names like "litri litri", "Hfg Gh" or "husi husi" are not permitted.
            - Curse words or offensive names are not prohibited.
        - **Example**: `Gaurav Kumar`.

      `contact` _mandatory_
      : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919000090000`.

      `email` _mandatory_
      : `string` The customer's email address. A maximum length of 64 characters for the username. For example, in "gaurav.kumar@example.com", "gaurav.kumar" must not exceed 64 characters.

      `fail_existing` _optional_
      : `string` The request throws an exception by default if a customer with the exact details already exists. You can pass an additional parameter `fail_existing` to get the existing customer's details in the response. Possible values:
          - `1` (default): If a customer with the same details already exists, throws an error.
          - `0`: If a customer with the same details already exists, fetches details of the existing customer.

      `gstin` _optional_
      : `string` Customer's GST number, if available. 
 For example, `29XAbbA4369J1PA`.

      `notes` _optional_
      : `object` Key-value pair used to store additional information about the entity. Holds 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
      

  
### Response Parameters

      `id`
      : `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

      `entity`
      : `string` Indicates the type of entity.

      `name`
      : `string` Customer's name.
        - **Character length**: Between 5 and 50 characters.
        - **Allowed characters**: Uppercase letters (A-Z), lowercase letters (a-z) and spaces (not at the beginning).
        - **Not allowed characters**: Numbers, special characters (For example, @, ", ,, . and so on.), Unicode characters, emojis and non-Latin scripts or regional languages.
        - **Prohibited names**: Names must be meaningful and contextually appropriate.
            - Avoid using repetitive patterns (For example, aaa, xyz, kkk kk).
            - Names like "litri litri", "Hfg Gh" or "husi husi" are not permitted.
            - Curse words or offensive names are not prohibited.
        - **Example**: `Gaurav Kumar`.

      `contact`
      : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919000090000`.

      `email`
      : `string` The customer's email address. A maximum length of 64 characters for the username. For example, in "gaurav.kumar@example.com", "gaurav.kumar" must not exceed 64 characters.

      `gstin`
      : `string` GST number linked to the customer. 
 For example, `29XAbbA4369J1PA`.

      `notes`
      : `object` Key-value pair used to store additional information about the entity. Holds 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

      `created_at`
      : `integer` UNIX timestamp, when the customer was created. For example, `1234567890`.
      

  
### Error Response Parameters

       
       Error | Cause | Solution
       ---
       The API `` provided is invalid. | The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.
 | The API keys must be active and entered correctly with no whitespace before or after the keys. Know how to [Generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).
       ---
       Contact number should be at least 8 digits, including country code. | The contact number is less than 8 digits. | Enter contact number that meets the validation criteria. It should have at least 8 digits, including the country code. For example, "+919000090000".
       
      

## 1.2 Create an Order in Server

After a customer is created, an order needs to be generated using the Orders API. This order contains details such as the payment amount, currency, customer details, tax-related information and other custom notes.

After the order is created, an `order_id` is generated, for example, `order_NGrgEcmYJsfUyl`. You must pass this `order_id` in the checkout code to associate this order with the payment. Learn more about [Order and Payment states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders.md#order-states).

Use the API sample code given below to create an order.

/orders

```cURL: Curl
curl -u [CLIENT_ID]:[CLIENT_SECRET] \  //This will be Partners Key and Secret.
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-H "X-Razorpay-Account: acc_Ef7ArBsdU5t9XL" //Sub-merchant’s account number (acc_xxxxxxxx) must be passed in the header.
-d '{
  "amount": 50000,
  "currency": "",
  "receipt": "receipt#1",
  "customer_id": "cust_MpINfSkdEvtdxb",
  "customer_details": {
    "name": "Gaurav Kumar"
  },
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "line_items": [
    {
      "type": "lrs_hotel",
      "name": "Acme hotel",
      "description": "hotel booking",
      "quantity": 1
    }
  ]
}'
```

```json: Success
{
  "id": "order_IluGWxBm9U8zJ8",
  "entity": "order",
  "amount": 5000,
  "amount_paid": 0,
  "amount_due": 5000,
  "currency": "INR",
  "receipt": "rcptid_11",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1642662092
}

```json: Failure - Amount
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The amount must be at least INR 1.00",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "amount"
  }
}
```json: Failure - Customer Name
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "customer name is invalid",
    "metadata": {},
    "reason": "input_validation_failed",
    "source": "business",
    "step": "payment_initiation"
  }
}
```

> **WARN**
>
> 
> **Watch Out!**
> 
> - **Customer Information Collection**: PAN, DOB and TCS declaration will be collected from customers at checkout.
> - **TCS Calculation**: Razorpay will automatically calculate TCS based on the line items passed in the Create Order API and apply the required TCS on customer payments according to the following slabs:
> 
> 
> Payment Purpose | LRS Limit  ---
> Travel Booking | 0% | 20%
> ---
> Tour Booking | 5% | 20%
> ---
> Education (Loan-funded) | 0% | 0%
> ---
> Education (Self-funded) | 0% | 5%
> ---
> 
> 

  
### Request Parameters

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`. Payment can only be made for this amount against the Order.

`currency` _mandatory_
: `string` The currency code. The default length is 3 characters. For example, `INR`.

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Can have a maximum length of 40 characters and has to be unique.

`customer_id` _optional_
: `string` Unique identifier of customer.

`customer_details` _mandatory_
: `object` This contains details about the customer details of the order.

    `name` _mandatory_
    : `string` Customer's name.
      - Character length: Between 5 and 50 characters.
      - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z) and spaces (not at the beginning).
      - Not allowed characters: Numbers, special characters (For example, @, ", ,, ., etc.), Unicode characters, emojis and non-Latin scripts or regional languages.
      - Prohibited names: Names must be meaningful and contextually appropriate.
          - Avoid using repetitive patterns (For example, aaa, xyz, kkk kk).
          - Names like "litri litri", "Hfg Gh" or "husi husi" are not permitted.
          - Curse words or offensive names are prohibited.
      - Example: `Gaurav Kumar`.

`notes` _optional_
: `json object` Key-value pair used to store additional information about the entity. Holds 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

`line_items` _mandatory_
: `object` Contains the details of the booking itinerary.

    `type` _mandatory_
    : `string` Contains the type of item of booking. Possible values:
        - `lrs_travel`
        - `lrs_experience`
        - `lrs_hotel`

    `name` _optional_
    : `string` Contains the name of the booking. For example, the name of the hotel, flight and so on.

    `description` _optional_
    : `string` Contains the description of the booking.

    `quantity` _optional_
    : `integer` Contains the quantity of the booking. For example, 1 flight or 2 rooms.
      

  
### Response Parameters

      `amount`
      : `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

      `amount_due`
      : `integer` The amount pending against the order.

      `amount_paid`
      : `integer` The amount paid against the order.

      `attempts`
      : `integer` The number of payment attempts, successful and failed, that have been made against this order.

      `created_at`
      : `integer` Indicates the Unix timestamp when this order was created.

      `currency`
      : `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

      `entity`
      : `string` Name of the entity. Here, it is `order`.

      `id`
      : `string` The unique identifier of the order.

      `notes`
      : `object` Key-value pair used to store additional information about the entity. Holds 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

      `offer_id`
      : `string` The unique identifier of the offer. For example, `offer_JHD834hjbxzhd38d`.

      `receipt`
      : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

      `status`
      : `string` The status of the order. Possible values:
         - `created`: When you create an order, it is in the `created` state. It stays in this state till a payment is attempted on it.
         - `attempted`: An order changes to the `attempted` state following the first payment attempt and remains in this state until at least one payment is successfully processed and captured.
         - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. 
 The order stays in the `paid` state even if the payment associated with the order is refunded.
      

  
### Error Response Parameters

   
   Error | Cause | Solution
   ---
   The API `` provided is invalid. | The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.
 | The API keys must be active and entered correctly with no whitespace before or after the keys.
   ---
   The amount must be at least INR 1.00. | The amount specified is less than the minimum amount. Currency subunits, such as paise (in the case of INR), should always be greater than 100. | Enter an amount equal to or greater than the minimum amount, that is 100.
   ---
   The **field name** is required. | A mandatory field is missing. | Ensure all mandatory fields and values are present.
   ---
   Only english alphabets are allowed in customer name. | The customer name provided in the request contains characters other than English alphabets, such as numbers, special characters, regional language characters or emojis. | Ensure that the name field in the request contains only English letters (A-Z, a-z) and meets the validation criteria: - Verify that the name does not include numerical characters, special characters (For example, @, #, $, etc.) or non-Latin scripts.
- Confirm that there are no extra spaces at the beginning or end of the name.

   ---
   Customer name should be between 5 and 50 characters. | The `name` field provided in the request does not meet the required character length. It is either shorter than 5 characters or exceeds 50 characters. | - Ensure that the `name` field in the request is between 5 and 50 characters long.
- Check that no extra spaces are included at the beginning or end of the name, which might affect the character count.

   ---
   Customer name is invalid. | The `name` field provided in the request does not meet the validation requirements. This could be due to the presence of disallowed characters, such as special characters, numbers, regional language characters or the use of non-Latin scripts. | - Ensure that the `name` field only contains English letters (A-Z, a-z) and spaces (not at the beginning).
- Verify that the name does not include special characters, numerical digits, emojis or regional language characters.
- Check for unintended characters that may have been included by mistake (For example, trailing spaces or special symbols).

   
  

## 1.3 Integrate with Checkout on Client-Side

Add the Pay button on your web page using the checkout code, Handler Function or Callback URL.

  
### Handler Function or Callback URL

**Handler Function** | **Callback URL**
---
When you use this: - On successful payment, the customer is shown your web page. 
-  On failure, the customer is notified of the failure and asked to retry the payment.
 | When you use this: - On successful payment, the customer is redirected to the specified URL, for example, a payment success page. 
-  On failure, the customer is asked to retry the payment.

    

### Code to Add Pay Button

Copy-paste the parameters as `options` in your code:

```html: Callback URL (JS) Checkout Code
Pay

var options = {
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Partners Dashboard.
    "amount": "50000", // Amount is in currency subunits.
    "currency": "",
    "name": "Acme Corp", //your business name.
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "customer_id": "cust_MpINfSkdEvtdxb",
    "order_id": "order_NGrgEcmYJsfUyl", //This is a sample Order ID. Pass the `id` obtained in the response of Step 2.
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number.
        "name": "Gaurav Kumar", //your customer's name.
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210" //Provide the customer's phone number for better conversion rates.
    },
    "notes": {
        "invoice_number": "IRS1245",
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

```html: Handler Functions (JS) Checkout Code
Pay

var options = {
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard.
    "amount": "50000", // Amount is in currency subunits.
    "currency": "",
    "name": "Acme Corp", //your business name.
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "customer_id": "cust_MpINfSkdEvtdxb",
    "order_id": "order_NGrgEcmYJsfUyl", //This is a sample Order ID. Pass the `id` obtained in the response of Step 2.
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number.
        "name": "Gaurav Kumar", //your customer's name.
        "email": "gaurav.kumar@example.com", 
        "contact": "+919876543210"  //Provide the customer's phone number for better conversion rates.
    },
    "notes": {
        "invoice_number": "IRS1245",
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Test your integration using these [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/test-integration.md#Cards).
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> - The `invoice_number` field is mandatory for all payment methods. Ensure each payment has a unique invoice number.
> - The `createPayment` method should be called within an event listener triggered by user action to prevent the popup from being blocked. For example:
> ```js
> $('button').click( function (){ razorpay.createPayment(...) })
> ```
> 

#### Supported Payment Methods

Following payment methods are supported under the Import Flow:
- Netbanking
- UPI
- Cards
- [Recurring](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/recurring-payments.md) 

For recurring payments, additional integration is needed. Cards, UPI and UPI with TPV are supported as a payment methods.

    
### Checkout Parameters

         `key` _mandatory_
: `string` API Key ID generated from the Razorpay Dashboard.

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `50000`.

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`name` _mandatory_
: `string` Your Business/Enterprise name shown on the Checkout form. For example, **Acme Corp**.

`description` _optional_
: `string` Description of the purchase item shown on the Checkout form. It should start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown on the Checkout form. Can also be a **base64** string if you are not loading the image from a network.

`order_id` _mandatory_
: `string` Order ID generated via [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`prefill` 
: `object` You can prefill the following details at Checkout. 

    
> **INFO**
>
> 
>     **Boost Conversions and Minimise Drop-offs**
> 
>     - Autofill customer contact details, especially phone number to ease form completion. Include customer’s phone number in the `contact` parameter of the JSON request's `prefill` object. Format: +(country code)(phone number). Example: “contact": "+919000090000").    
>     - This is not applicable if you do not collect customer contact details on your website before checkout, have Shopify stores or use any of the no-code apps.
> 
>     

    
    `name` _optional_
    : `string` Cardholder's name to be pre-filled if customer is to make card payments on Checkout. For example, **Gaurav Kumar**.

    `email` _optional_
    : `string` Email address of the customer.

    `contact` _optional_
    : `string` Phone number of the customer. The expected format of the phone number is `+ {country code}{phone number}`. If the country code is not specified, `91` will be used as the default value. This is particularly important while prefilling `contact` of customers with phone numbers issued outside India. **Examples**:
        - +14155552671 (a valid non-Indian number)
        - +919977665544 (a valid Indian number). 
If 9977665544 is entered, `+91` is added to it as +919977665544. 

    `method` _optional_
    : `string` Pre-selection of the payment method for the customer. Will only work if `contact` and `email` are also pre-filled. Possible values:
        - `card`
        - `netbanking`
        - `wallet`
        - `emi`
        - `upi`

`theme` 
: `object` Thematic options to modify the appearance of Checkout.

    `color` _optional_
    : `string` Enter your brand colour's HEX code to alter the text, payment method icons and CTA (call-to-action) button colour of the Checkout form.

    `backdrop_color` _optional_
    : `string` Enter a HEX code to change the Checkout's backdrop colour.

`modal` 
: `object` Options to handle the Checkout modal.

    `backdropclose` _optional_
    : `boolean` Indicates whether clicking the translucent blank space outside the Checkout form should close the form. Possible values:
        - `true`: Closes the form when your customer clicks outside the checkout form.
        - `false` (default): Does not close the form when customer clicks outside the checkout form.

    `escape` _optional_
    : `boolean` Indicates whether pressing the **escape** key should close the Checkout form. Possible values:
        - `true` (default): Closes the form when the customer presses the **escape** key.
        - `false`: Does not close the form when the customer presses the **escape** key.

    `handleback` _optional_
    : `boolean` Determines whether Checkout must behave similar to the browser when back button is pressed. Possible values:
        - `true` (default): Checkout behaves similarly to the browser. That is, when the browser's back button is pressed, the Checkout also simulates a back press. This happens as long as the Checkout modal is open.
        - `false`: Checkout does not simulate a back press when browser's back button is pressed.

    `confirm_close` _optional_
    : `boolean` Determines whether a confirmation dialog box should be shown if customers attempts to close Checkout. Possible values:
        - `true`: Confirmation dialog box is shown.
        - `false` (default): Confirmation dialog box is not shown.
    
    `ondismiss` _optional_
    : `function` Used to track the status of Checkout. You can pass a modal object with `ondismiss: function()\{\}` as options. This function is called when the modal is closed by the user.

    `animation` _optional_
    : `boolean` Shows an animation before loading of Checkout. Possible values:
        - `true`(default): Animation appears.
        - `false`: Animation does not appear.

`subscription_id` _optional_
: `string` If you are accepting recurring payments using Razorpay Checkout, you should pass the relevant `subscription_id` to the Checkout. Know more about [Subscriptions on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#checkout-integration).

`subscription_card_change` _optional_
: `boolean` Permit or restrict customer from changing the card linked to the subscription. You can also do this from the [hosted page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/payment-retries.md#update-the-payment-method-via-our-hosted-page). Possible values:
    - `true`: Allow the customer to change the card from Checkout.
    - `false` (default): Do not allow the customer to change the card from Checkout.

`recurring` _optional_
: `boolean` Determines if you are accepting [recurring (charge-at-will) payments on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md) via instruments such as emandate, paper NACH and so on. Possible values:
    - `true`: You are accepting recurring payments.
    - `false` (default): You are not accepting recurring payments.

`callback_url` _optional_
: `string` Customers will be redirected to this URL on successful payment. Ensure that the domain of the Callback URL is allowlisted.

`redirect` _optional_
: `boolean` Determines whether to post a response to the event handler post payment completion or redirect to Callback URL. `callback_url` must be passed while using this parameter. Possible values:
    - `true`: Customer is redirected to the specified callback URL in case of payment failure.
    - `false` (default): Customer is shown the Checkout popup to retry the payment with the suggested next best option.

`customer_id` _optional_
: `string` Unique identifier of customer. Used for:
    - [Local saved cards feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md#save-card-details).
    - Static bank account details on Checkout in case of [Bank Transfer payment method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md).

`remember_customer` _optional_
: `boolean` Determines whether to allow saving of cards. Can also be configured via the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#flash-checkout). Possible values:
    - `true`: Enables card saving feature.
    - `false` (default): Disables card saving feature.

`timeout` _optional_
: `integer` Sets a timeout on Checkout, in seconds. After the specified time limit, the customer will not be able to use Checkout. 

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     Some browsers may pause `JavaScript` timers when the user switches tabs, especially in power saver mode. This can cause the checkout session to stay active beyond the set timeout duration.
>     

`readonly`
: `object` Marks fields as read-only.

    `contact` _optional_
    : `boolean` Used to set the `contact` field as readonly. Possible values:
        - `true`: Customer will not be able to edit this field.
        - `false` (default): Customer will be able to edit this field.

    `email` _optional_
    : `boolean` Used to set the `email` field as readonly. Possible values:
        - `true`: Customer will not be able to edit this field.
        - `false` (default): Customer will be able to edit this field.
        
    `name` _optional_
    : `boolean` Used to set the `name` field as readonly. Possible values:
        - `true`: Customer will not be able to edit this field.
        - `false` (default): Customer will be able to edit this field.

`hidden`
: `object` Hides the contact details.

    `contact` _optional_
    : `boolean` Used to set the `contact` field as optional. Possible values:
        - `true`: Customer will not be able to view this field.
        - `false` (default): Customer will be able to view this field.

    `email` _optional_
    : `boolean` Used to set the `email` field as optional. Possible values:
        - `true`: Customer will not be able to view this field.
        - `false` (default): Customer will be able to view this field.

`send_sms_hash` _optional_
: `boolean` Used to auto-read OTP for cards and net banking pages. Applicable from Android SDK version 1.5.9 and above. Possible values:
    - `true`: OTP is auto-read.
    - `false` (default): OTP is not auto-read.

`allow_rotation` _optional_
: `boolean` Used to rotate payment page as per screen orientation. Applicable from Android SDK version 1.6.4 and above. Possible values:
    - `true`: Payment page can be rotated.
    - `false` (default): Payment page cannot be rotated.

`retry` _optional_
: `object` Parameters that enable retry of payment on the checkout.

    `enabled`
    : `boolean` Determines whether the customers can retry payments on the checkout. Possible values:
        - `true` (default): Enables customers to retry payments with the suggested next best option.
        - `false`: Disables customers from retrying the payment.
    
    `max_count` 
    : `integer` The number of times the customer can retry the payment with the suggested next best option. We recommend you to set this to 4. Having a larger number here can cause loops to occur.
        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         Web Integration does not support the `max_count` parameter. It is applicable only in Android and iOS SDKs.
>         

    
`config` _optional_
: `object` Parameters that enable checkout configuration.
    
    `display`
    : `object` Child parameter that enables configuration of checkout display language.

        `language`
        : `string` The language in which checkout should be displayed. Possible values:
            - `en`: English
            - `ben`: Bengali
            - `hi`: Hindi
            - `mar`: Marathi
            - `guj`: Gujarati
            - `tam`: Tamil
            - `tel`: Telugu

`notes` _mandatory_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

    `invoice_number` _mandatory_
    : `string` Invoice number of the invoice generated. Ensure each payment has a unique invoice number.
        

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> The open method of Razorpay object (`rzp1.open()`) must be invoked by your site's JavaScript, which may or may not be a user-driven action such as a click.
> 

  
### Errors

Given below is a list of errors you may face while integrating with checkout on the client-side.

Error | Cause | Solution
---
The id provided does not exist. | Occurs when there is a mismatch between the API keys used while creating the `order_id`/`customer_id` and the API key passed in the checkout. | Make sure that the API keys passed in the checkout are the same as the API keys used while creating the `order_id`/`customer_id`.
---
Blocked by CORS policy. | Occurs when the server-to-server request is hit from the front end instead. | Make sure that the API calls are made from the server side and not the client side.

    

### Configure Payment Methods (Optional)

Multiple payment methods are available on the Razorpay Web Standard Checkout.
- The payment methods are **fixed** and cannot be changed.
- You can configure the order or make certain payment methods prominent. Know more about [configuring payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).

## 1.4 Handle Payment Success and Failure

The way the Payment Success and Failure scenarios are handled depends on the [Checkout Sample Code](#code-to-add-pay-button) you used in the last step.

  
### Checkout with Handler Function

If you used the sample code with the handler function:

 
   The customer sees your website page. The checkout returns the response object of the successful payment (**razorpay_payment_id**, **razorpay_order_id** and **razorpay_signature**). Collect these and send them to your server.
 

 

   The customer is notified about payment failure and asked to retry the payment. Know about the [error parameters.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md#response-parameters)

    ```js: Failure Handling Code
    rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
    }
    ```
  

    

  
### Checkout with Callback URL

If you used the sample code with the callback URL:

 

   Razorpay makes a POST call to the callback URL with the **razorpay_payment_id**, **razorpay_order_id** and **razorpay_signature** in the response object of the successful payment. Only successful authorisations are auto-submitted.
 

 

  In case of failed payments, the checkout is displayed again to facilitate payment retry.
 

    

## 1.5 Store Fields in Your Server

A successful payment returns the following fields to the Checkout form.

  
### Success Callback

- You need to store these fields in your server.
- You can confirm the authenticity of these details by verifying the signature in the next step.

```json: Success Callback
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
    

## 1.6 Verify Payment Signature

This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

  
### To verify the `razorpay_signature` returned to you by the Checkout form:

     1. Create a signature in your server using the following attributes:
        - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
        - `razorpay_payment_id`: Returned by Checkout.
        - `key_secret`: Available in your server. The `key_secret` that was generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

     2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

         ```html: HMAC Hex Digest
         generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

           if (generated_signature == razorpay_signature) {
             payment is successful
           }
         ```
         
     3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
    

  
### Generate Signature on Your Server

Given below is the sample code for payment signature verification:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

boolean status =  Utils.verifyPaymentSignature(options, secret);

```php: PHP
$api = new Api($key_id, $secret);

$api->utility->verifyPaymentSignature(array('razorpay_order_id' => $razorpayOrderId, 'razorpay_payment_id' => $razorpayPaymentId, 'razorpay_signature' => $razorpaySignature));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
       razorpay_order_id: 'order_IEIaMR65cu6nz3',
       razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
       razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
     }
Razorpay::Utility.verify_payment_signature(payment_response)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.utility.verify_payment_signature({
  'razorpay_order_id': razorpay_order_id,
  'razorpay_payment_id': razorpay_payment_id,
  'razorpay_signature': razorpay_signature
  })

```c: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("razorpay_order_id", "order_IEIaMR65");
options.Add("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.Add("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50");

Utils.verifyPaymentSignature(options);

```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var { validatePaymentVerification, validateWebhookSignature } = require('./dist/utils/razorpay-utils');
validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);

```Go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

params := map[string]interface{}{
 "razorpay_order_id": "order_IEIaMR65cu6nz3",
 "razorpay_payment_id": "pay_IH4NVgf4Dreq1l",
}

signature := "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f";
secret := "EnLs21M47BllR3X8PSFtjtbd";
utils.VerifyPaymentSignature(params, signature, secret)
```

    

  
### Post Signature Verification

After you have completed the integration, you can [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md), make test payments, replace the test key with the live key and integrate with other [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
    

Here are the links to our [SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#client-libraries) for the supported platforms.

## 1.7 Verify Payment Status

> **INFO**
>
> 
> **Handy Tips**
> 
> On the Razorpay Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
> 

    
### You can track the payment status in three ways:

    
        To verify the payment status from the Razorpay Dashboard:

        1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
        2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**.
        
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

### Related information

- [Invoice Collection](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/outward-remittances/standard-integration/invoice-collection.md)
- [Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/outward-remittances/standard-integration/test-integration.md)
