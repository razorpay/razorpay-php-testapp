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

You can try out our APIs on the Razorpay Postman Public Workspace. Fork the workspace and test the APIs with your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#test-mode-api-keys).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-85efcb7a-1506-4539-b26e-892169fe46f8)

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
 | The API keys must be active and entered correctly with no whitespace before or after the keys. Know how to [Generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).
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

      `amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>     

`currency` _mandatory_
: `string` The currency in which the transaction should be made. View the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). The length must be 3 characters.

    
> **INFO**
>
> 
> 
>     **Handy Tips**
> 
>     Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>     

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`customer_id` _optional_
: `string` Unique identifier of customer received in response of Create Customer API. This will be `mandatory` field if you are creating a customer using Create Customer API. This is an `optional` field if you are directly creating an order without creating a customer.

`customer_details` _optional_
: `json object` Details about the customer/user.

    `name` _optional_
    : `string` The customer’s name. For example, Gaurav Kumar.

    `contact` _optional_
    : `string` The customer's phone number. A maximum length of 15 characters, including country code. For example, +919000090000.

    `email` _optional_
    : `string` The customer’s email address. For example, gaurav.kumar@example.com.

    `insights ` _optional_
    : `json object` Additional details of the customer, including past transaction data.

        `order_count ` _optional_
        : `integer` Total orders placed by the account so far on the merchant platform. For example, 22.

        `chargeback_count ` _optional_
        : `integer` Total chargeback received for the customer account on the merchant platform. For example, 4.

        `tier` _optional_
        : `string ` Your company's passenger classification, such as with a frequent flyer program. In this case, you might use values such as:
        - `standard`
        - `gold`
        - `platinum` 

        `booking_channel` _optional_
        : `string` To share if the user is an agent, corporate, or individual. Possible values:
        - `agent`
        - `corporate`
        - `individual`

        `has_account` _optional_
        : `boolean` To denote if the buyer is on guest checkout or has logged into the account. Possible values:
        - `true`: If the user is logged into the account.
        - `false`: If the user is on guest checkout.

        `registered_at` _optional_
        : `integer` UNIX timestamp when the customer account was created with the merchant. For example, 1234567890.

`line_items_total` _optional_
: `integer` Total sum of the cart value.

`line_items` _mandatory_
: `json object` Details about the specific items added to the cart.

    `type` _mandatory_
    : `string` Defines the category type. Possible values: 
        - `travel`
        - `hotel`
        - `e-commerce`
        - `mutual_fund`

    `sku` _optional_
    : `string ` unique product id defined by the business.

    `name` _optional_
    : `string` The name of the product.

    `description` _optional_
    : `string` Description of the product.

    `quantity` _optional_
    : `integer` Number of tickets/items/quantity to be purchased.

    `image_url` _optional_
    : `string` URL of the product image.

    `product_url` _optional_
    : `string` URL of the product’s listing page.

    `price` _optional_
    : `integer` Unit price of the product in paisa. (needs to be inclusive of tax)

    `offer_price` _optional_
    : `integer` Offer price of the product. The offer price can be lower than the price if the business is running any discount on the product.

    `tax_amount` _optional_
    : `integer` Tax amount that needs to be added to the product. In case the **offer_price** is tax-inclusive, keep it blank.

    `hotel` _optional_
    : `json object` Details about the type-specific data points. Will vary based on the type selected. 
    
        `sub_type` _optional_
        : `enum` The sub-type of the line item. Possible values:
        - `stay`
        - `breakfast`
        - `dinner`
        - `lunch`
        - `early_checkin`
        - `late_chechout`
        - `others`

        `checkin_date` _optional_
        : `string` Represents an ISO 8601-encoded date string. For example, September 7, 2019 is represented as "2019-07-16".

        `checkout_date` _optional_
        : `string` Represents an ISO 8601-encoded date string. For example, September 7, 2019 is represented as "2019-07-16".

        `property_type` _optional_
        : `string` Represents the type of the property. Possible values:
        - `resort`
        - `hostel`
        - `hotel`
        - `inn`
        - `lodge`
        - `motel`
        - `apartment`
        - `bed_and_breakfast`
        - `tent`
        - `villa`

        `star_rating` _optional_
        : `integer` Denotes the star rating of the property. Possible values: 1 to 7.

        `brand` _optional_
        : `string` Brand name of the property. For example, Marriott Group.

        `address` _optional_
        : `json object` details of the property address.

            `line1` _optional_
            : `string` Address Line 1 of the address

            `line2` _optional_
            : `string` Address Line 2 of the address

            `city` _optional_
            : `string` city of the address. For example, Bengaluru

            `country` _optional_
            : `string` ISO3 country code of the billing address. For example, IND

            `state` _optional_
            : `string` Name of the state. For example, KA

            `zipcode` _optional_
            : `string` Zipcode of the state. For example, 560001.

            `latitude` _optional_
            : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

            `longitude` _optional_
            : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

        `travellers` _optional_
        : `JSON object` Details associated with passengers/travellers/beneficiaries.

            `name` _optional_
            : `string` Name of the passenger/traveler/beneficiary.

            `email` _optional_
            : `string` Email address of the passenger/traveler/beneficiary.

            `contact` _optional_
            : `JSON object` Details associated with passengers/travelers/beneficiaries.

            `age` _optional_
            : `integer` UNIX timestamp of the date of birth of the individual. For example, 1234567890.

            `class` _optional_
            : `string` Type of the flight ticket. Possible values:
            - `Business`
            - `Suite`
            - `Premium`
            - `Deluxe`
            - `Standard`

            `identity` _optional_
            : `JSON object` Identity details of the passenger/beneficiary.

            `unique_national_id` _optional_
            : `string` National ID number. For example, Adhaar number for India.

            `tax_id` _optional_
            : `string` Passport number of the individual.

`refund_allowed` _optional_
: `string` Denotes if the cart items are refundable or not. Possible values: 
    - `full`
    - `partial`
    - `not_allowed`

`campaign` _optional_
: `JSON object` Details of the campaign. *Can be extended to share UTM parameters.

    `external_campaign_id` _optional_
    : `string` Unique identifier of the campaign. For example, PQR12453.

    `name` _optional_
    : `string` Name of the campaign.

    `description` _optional_
    : `string` A human-readable description of the campaign.

    `channel` _optional_
    : `string` The marketing channel used.

    `source` _optional_
    : `string` The referrer of the marketing event. Example values: google, newsletter.

    `medium` _optional_
    : `string` The medium that the campaign is using. Example values: cpc, banner, etc.

`notes` _mandatory_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
      

  
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
> Test your integration using these [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#2-test-integration).
> 

#### Supported Payment Methods

Following payment methods are supported under the Import Flow:
- Netbanking
- UPI
- Cards

    
### Request Parameters

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

`customer_id` _optional_
: `string` Unique identifier of the customer received in response of Create Customer API. This will be `mandatory` field if you are creating a customer using Create Customer API. This is an `optional` field if you are directly creating an order without creating a customer.

`order_id` _mandatory_
: `string` Unique identifier of the order received in response of Create Order API.

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

    `partner_reservation_id` _mandatory_
    : `string` unique identifier for reservation from the business.

    `invoice_number` _mandatory_
    : `string` Order ID received in response of the Create an Order API. Example `order_NGrgEcmYJsfUyl`.

    `partner_guest_id` _mandatory_
    : `string` Unique identifier from business end.
        

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
    

        

## 1.8 Invoice Collection

> **WARN**
>
> 
> **Watch Out!**
> 
> 1. Invoice collection is mandatory for any import payment to be eligible for settlement.
> 2. Turnaround Time (TAT) for settlement begins **only after a valid invoice** is uploaded.
> 3. Ensure each invoice contains the following details:
>    - Unique invoice number (Partner's invoice ID or Razorpay Order ID).
>    - Partner's or business name.
>    - Partner's or business address.
>    - Customer's complete address.
>    - Description of goods/services.
>    - Units sold (time period, quantity and so on).
>    - Amount in INR (2 decimal places only. For example, ).
>    - Taxes applied.
> 

## Invoice Submission via SFTP

You can automate invoice uploads using **Secure File Transfer Protocol (SFTP)**, enabling streamlined, secure file transfer.

### Steps to Connect with Razorpay via SFTP

   
### 1. Share Your Public Key

       - Required for setting up SFTP credentials and folder access.
       - Submit your SSH public key to your Razorpay point of contact.
       - **Supported SSH key formats**:
         - RSA (2048-bit or higher). For example, `ssh-rsa`.
         - ECDSA. For example, `ssh-ecdsa`.
         - Ed25519. For example, `ssh-ed25519`.
       - Ensure your key is in the correct format. Using an unsupported or incorrectly formatted key will result in authentication failure.
       
       
> **WARN**
>
> 
>        **Watch Out!**
>        
>        Never share your private key with anyone. Only the public key should be provided to Razorpay.
>        

      

   
### 2. IP Whitelisting

       - Only requests from your whitelisted IPs will be accepted.
       - Share a list of authorised outbound IPs to enable secure access.
       - Maximum of 4 IP addresses can be whitelisted.
       - SFTP access will work only from the whitelisted IPs. Attempting to connect from any other IP address will result in connection failure.
      

   
### 3. Credentials & Access Details

       - Razorpay will provide:
         - Hostname: `sftp.razorpay.com`
         - Port: `22`
         - Username
         - Path prefix (based on your `MID`)
       - Use your **private key** (corresponding to the public key you shared) to authenticate while connecting to Razorpay's SFTP.
       - Use an SFTP client to connect.
       - **Test your connection**: Run `telnet sftp.razorpay.com 22` to verify connectivity before attempting SFTP access.
      

## How to Share Invoices via SFTP

   
### File Path Format

Use the following folder and file structure:
"/invoiceUpload/automated//YYYY-MM-DD/InvoiceNumber.pdf." 

For example: `/invoiceUpload/automated/MDoeHNNpi0nB7m/2025-05-10/INV_09876.pdf`

> **WARN**
>
> 
> **Watch Out!**
> 
> - You must include your Merchant ID (MID) in the path.
> - You must include the date folder in `YYYY-MM-DD` format.
> - Missing either component will result in upload failure.
> - Once uploaded, invoices become read-only. You cannot edit, rename or delete files after you upload.
> - Do not attempt to upload the same invoice multiple times to the same path.
> 

      

   
### File Types and Flows

Direction | Filename Format | Description
---
Client → Razorpay | `InvoiceNumber.pdf` | Inbound File: This will be the invoices submitted by you to Razorpay. It should always be in PDF format. Example: `INV_09876.pdf`

      

## Invoice ID Validation Process

Razorpay enforces strong validation rules to prevent duplicate or invalid invoice usage.

   
### Successful Payments

       - **Status**: `Captured`
       - **Invoice Action**: Permanently blocked
       - **Note**: Same invoice ID cannot be reused.
      

   
### Failed Payments

       - **Status**: `Failed`
       - **Invoice Action**: Released
       - **Note**: Invoice ID can be reused.
      

   
### Payments in Intermediate States

       - **Status**: `Created` or `Authorised`
       - **Invoice Action**: Temporarily blocked
       - **Note**: Invoice ID is reusable only after final status (`Failed` or `Captured`) is reached.
      

### Refunded Payments

   
### Auto-Refunded (Never Captured)

       - **Status**: `Refunded`
       - **Action**: Invoice ID is released.
       - **Note**: ID can be reused.
      

   
### Merchant-Initiated Refund (Post-Capture)

       - **Status**: `Refunded`
       - **Action**: Invoice ID is permanently blocked.
       - **Note**: Cannot be reused.
      

Partial capture scenarios are not validated by default. Contact Razorpay [Support team](https://razorpay.com/support/).

## AML Screening Process

As per RBI regulations, payments to offshore accounts must undergo AML (Anti-Money Laundering) checks by Razorpay's Authorised Dealer (AD) Bank.

   
### Daily AML Communication

       - You will receive daily emails listing transactions **flagged** for additional details.
       - **Subject Line**: `Additional Details Required - [Business Name]_MDoeHNNpi0nB7m`.
      

   
### Turnaround Time

       - Share required information within **5 working days** to avoid auto-cancellation.
       - Information may include: Full name, address, ownership, percentage of ownership, nature of business, purpose of payment, business website, company, date of birth/incorporation, place of birth/incorporation and so on.
      

   
### Consequences of Delay

       Missing TAT results in:
         - Razorpay lien-marking the funds or
         - Refund initiation via Dashboard/API.
      

## Best Practices for Invoice IDs

To ensure seamless experience and compliance:

- **Always generate unique invoice IDs** per payment.
- Acceptable IDs:
  - Razorpay `order_id`.
  - Your internal unique invoice number.
- Do not reuse invoice IDs for different transactions unless the original payment has failed.

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/import-flow/standard-integration/test-integration.md)
