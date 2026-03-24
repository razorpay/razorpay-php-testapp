---
title: 1. Build Integration
description: Steps to integrate with Razorpay Import Flow for a seamless payment solution for International Businesses.
---

# 1. Build Integration

Follow these steps to integrate the standard checkout form on your website:

**1.1** [Create a customer in server](#11-create-a-customer-in-server). 

**1.2** [Create an order in server](#12-create-an-order-in-server). 

**1.3** [Integrate with checkout on client-side](#13-integrate-with-checkout-on-client-side). 

**1.4** [Handle payment success and failure](#14-handle-payment-success-and-failure). 

**1.5** [Store fields in server](#15-store-fields-in-your-server). 

**1.6** [Verify payment signature](#16-verify-payment-signature). 

**1.7** [Verify payment status](#17-verify-payment-status). 

**1.8** [Invoice collection](#18-invoice-collection).

## 1.1 Create a Customer in Server

Use Customers API to create customers with basic details such as name, email and contact details.

You can try out our APIs on the Razorpay Postman Public Workspace. Fork the workspace and test the APIs with your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#test-mode-api-keys.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-85efcb7a-1506-4539-b26e-892169fe46f8)

/customers

```cURL: Curl

curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/customers \
-H "Content-Type: application/json" \
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
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject customerRequest = new JSONObject();
customerRequest.put("name","Gaurav Kumar");
customerRequest.put("contact","+919000090000");
customerRequest.put("email","gaurav.kumar@example.com");
customerRequest.put("fail_existing","0");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
customerRequest.put("notes",notes);

Customer customer = razorpay.customers.create(customerRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.create({
  "name": "Gaurav Kumar",
  "contact": +919000090000,
  "email": "gaurav.kumar@example.com",
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
    "name": "Gaurav Kumar",
    "contact": +919000090000,
    "email": "gaurav.kumar@example.com",
    "fail_existing": "0",
    "notes": map[string]interface{}{
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf.",
  },
}

body, err := client.Customer.Create(data, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->create(array('name' => 'Gaurav Kumar', 'email' => 'gaurav.kumar@example.com','contact'=>'+919000090000','notes'=> array('notes_key_1'=> 'Tea, Earl Grey, Hot','notes_key_2'=> 'Tea, Earl Grey… decaf'));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();

options.Add("name", "Gaurav Kumar"); 
options.Add("contact", "+919000090000"); 
options.Add("email", "gaurav.kumar@example.com"); 
options.Add("fail_existing", "0"); 

Customer customer = Customer.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Customer.create({
  "name": "Gaurav Kumar",
  "contact": +919000090000,
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
  contact: +919000090000,
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

      `name` _optional_
      : `string` Customer's name. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

      `contact` _mandatory_
      : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919000090000`.

      `email` _optional_
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
      : `string` Customer's name. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

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
 | The API keys must be active and entered correctly with no whitespace before or after the keys. Know how to [Generate API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md).
       ---
       Contact number should be at least 8 digits, including country code. | The contact number is less than 8 digits. | Enter contact number that meets the validation criteria. It should have at least 8 digits, including the country code. For example, "+919000090000".
       
      

## 1.2 Create an Order in Server

You can create an order using the following API and send the additional information required for Import Flow.

/orders

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1111",
  "customer_id": "cust_MpINfSkdEvtdxb",
  "customer_details": {
    "name": "Gaurav Kumar",
    "contact": "+919000090000",
    "email": "gauravkumar@example.com",
    "insights": {
      "order_count": "22",
      "chargeback_count": "4",
      "tier": "gold",
      "booking_channel": "agent",
      "has_account": true,
      "registered_at": 1234567890
    }
  },
  "line_items_total": 5000,
  "line_items": [
    {
      "type": "hotel",
      "sku": "1gr367",
      "name": "Grand Palace Hotel",
      "description": "2BHK villa",
      "quantity": 2,
      "image_url": "http://url",
      "product_url": "http://url",
      "price": 5000,
      "offer_price": 5000,
      "tax_amount": 0,
      "hotel": {
        "sub_type": "stay",
        "checkin_date": "2019-07-16",
        "checkout_date": "2019-07-16",
        "property_type": "",
        "star_rating": 5,
        "brand": "Grand Mercure",
        "address": {
          "line1": "Mantri apartment",
          "line2": "Koramangala",
          "city": "Bengaluru",
          "state": "Karnataka",
          "zipcode": "560032",
          "latitude": null,
          "longitude": null
        },
        "travellers": [
          {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "+919000090000",
            "age": 18,
            "class": "business",
            "identity": {
              "unique_national_id": "ABCDE1234Z",
              "tax_id": "ABCDE1234Z"
            }
          },
          {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "+919000090000",
            "age": 18,
            "class": "business",
            "identity": {
              "unique_national_id": "ABCDE1234Z",
              "tax_id": "ABCDE1234Z"
            }
          }
        ]
      }
    }
  ],
  "refund_allowed": "full",
  "campaign": {
    "external_campaign_id": "PQR1234",
    "name": "",
    "description": "",
    "channel": "",
    "source": "website",
    "medium": ""
  },
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}'
```

```json: Success
{
  "amount": 50000,
  "amount_due": 50000,
  "amount_paid": 0,
  "attempts": 11,
  "created_at": 1706507580,
  "currency": "INR",
  "entity": "order",
  "id": "order_NUJs9C1Luflzts",
  "notes": {
     "key1": "value3",
     "key2": "value2"
  },
  "offer_id": null,
  "receipt": "receipt#1111",
  "status": "attempted"
}

```json: Failure
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
```

  
### Request Parameters

      @include checkout-parameters/s2s-order-request-parameters-airbnb
      

  
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
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "customer_id": "cust_MpINfSkdEvtdxb",
    "order_id": "order_NGrgEcmYJsfUyl", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "notes": {
        "partner_reservation_id": "12345",
        "invoice_number": "order_NGrgEcmYJsfUyl",
        "partner_guest_id": "abcd"
    },
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

```html: Handler Functions (JS) Checkout Code
Pay

var options = {
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "customer_id": "cust_MpINfSkdEvtdxb",
    "order_id": "order_NGrgEcmYJsfUyl", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "notes": {
        "partner_reservation_id": "12345",
        "invoice_number": "order_NGrgEcmYJsfUyl"
    },
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
> Test your integration using these [test cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps/#2-test-integration.md).
> 

#### Supported Payment Methods

Following payment methods are supported under the Import Flow:
- Netbanking
- UPI
- Cards

    
### Request Parameters

         @include checkout-parameters/s2s-request-parameters-airbnb
        

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> The open method of Razorpay object (`rzp1.open()`) must be invoked by your site's JavaScript, which may or may not be a user-driven action such as a click.
> 

## Errors

Given below is a list of errors you may face while integrating with checkout on the client-side.

Error | Cause | Solution
---
The id provided does not exist. | Occurs when there is a mismatch between the API keys used while creating the `order_id`/`customer_id` and the API key passed in the checkout. | Make sure that the API keys passed in the checkout are the same as the API keys used while creating the `order_id`/`customer_id`.
---
Blocked by CORS policy. | Occurs when the server-to-server request is hit from the front end instead. | Make sure that the API calls are made from the server side and not the client side.

### Configure Payment Methods (Optional)

Multiple payment methods are available on the Razorpay Web Standard Checkout.
- The payment methods are **fixed** and cannot be changed.
- You can configure the order or make certain payment methods prominent. Know more about [configuring payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).

## 1.4 Handle Payment Success and Failure

The way the Payment Success and Failure scenarios are handled depends on the [Checkout Sample Code](#code-to-add-pay-button) you used in the last step.

### Checkout with Handler Function

If you used the sample code with the handler function:

 
   The customer sees your website page. The checkout returns the response object of the successful payment (**razorpay_payment_id**, **razorpay_order_id** and **razorpay_signature**). Collect these and send them to your server.
 

 

   The customer is notified about payment failure and asked to retry the payment. Know about the [error parameters.](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/#response-parameters.md)

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

@include integration-steps/store-fields

## 1.6 Verify Payment Signature

@include integration-steps/verify-signature

Here are the links to our [SDKs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#client-libraries.md) for the supported platforms.

## 1.7 Verify Payment Status

@include integration-steps/verify-payment-status

## 1.8 Invoice Collection

@include import-flow/invoice-collection

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/import-flow/standard-integration/test-integration.md)
