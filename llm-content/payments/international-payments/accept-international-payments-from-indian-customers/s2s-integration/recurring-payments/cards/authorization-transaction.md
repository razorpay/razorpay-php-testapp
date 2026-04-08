---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for cards using Razorpay APIs.
---

# 1. Create the Authorisation Transaction

Given below are the steps to create an authorisation transaction using the Razorpay APIs.

> **INFO**
>
> 
> **Handy Tips**
> 
> Bank downtime can affect success rates when processing recurring payments via debit cards.
> 

## 1.1 Create a Customer 

Razorpay links recurring tokens to customers using a unique identifier generated through the Customer API.

You can create [customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) with basic information such as `email` and `contact` and use them for various Razorpay offerings. The following endpoint creates a customer.

/customers

  
### Sample Code

     
      ```cURL: Curl
      curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
      -X POST https://api.razorpay.com/v1/customers \
      -H "Content-Type: application/json" \
      -d '{
        "name": "",
        "email": "",
        "contact": "",
        "fail_existing": "0",
        "notes":{
          "note_key_1": "September",
          "note_key_2": "Make it so."
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
          'name': '',
          'email': '',
          'contact': '',
          'fail_existing': "0",
          'notes': {'note_key_1': 'September', 'note_key_2': 'Make it so.'}
          })

      ```go: Go
      import ( razorpay "github.com/razorpay/razorpay-go" )
      client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

      data := map[string]interface{}{
          "name": "",
          "contact": ,
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

      $api->customer->create(array('name' => '', 'email' => '','contact'=>'','fail_existing' => "0", 'notes'=> array('notes_key_1'=> 'Tea, Earl Grey, Hot','notes_key_2'=> 'Tea, Earl Grey… decaf'));
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

      para_attr = {
        "name": "",
        "contact": "",
        "email": "",
        "fail_existing": "0",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        }
      }

      Razorpay::Customer.create(para_attr)

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

      ```json: Response
      {
        "id":"cust_1Aa00000000001",
        "entity":"customer",
        "name":"",
        "email":"",
        "contact":"",
        "gstin":null,
        "notes":{
            "note_key_1":"September",
            "note_key_2":"Make it so."
        },
        "created_at ":1234567890
      }
      ```
      
    

    
### Request Parameters

`name`
: `string` The name of the customer. For example, `Gaurav Kumar`.

`email`
: `string` The email address of the customer. For example, `gaurav.kumar@example.com`.

`contact`
: `string` The phone number of the customer. For example, `9876543210`.

`fail_existing` _optional_
: `string` The request throws an exception by default if a customer with the exact details already exists. You can pass an additional parameter `fail_existing` to get the existing customer's details in the response. Possible values:
     - `1` (default): If a customer with the same details already exists, throws an error.
     - `0`: If a customer with the same details already exists, fetches details of the existing customer.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`. 
        

    
### Response Parameters

`id`
: `string` The unique identifier of the customer. For example `cust_1Aa00000000001`.

`entity`
: `string` The name of the entity. Here, it is `customer`.

`name`
: `string` The name of the customer. For example, `Gaurav Kumar`.

`email`
: `string` The email address of the customer. For example, `gaurav.kumar@example.com`.

`contact`
: `string` The phone number of the customer. For example, `9876543210`.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` A Unix timestamp, at which the customer was created.

You can create an order once you create a customer for the payment authorisation.
        

## 1.2 Create an Order 

Use the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md) to create a unique Razorpay `order_id` that is associated with the authorisation transaction. The following endpoint creates an order.

/orders

```cURL: Request
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
    "amount": 1000,
    "currency": "INR",
    "merchant_id": "D2eavTHExqy97j",
    "customer_id": "cust_N8fv8Nftx5hato",
    "method": "card",
    "token": {
        "max_amount": 100000000,
        "expire_at": 1709971120,
        "frequency": "monthly"
    },
    "customer_details": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000",
        "shipping_address": {
            "line1": "Mantri apartment",
            "line2": "Koramangala",
            "city": "Bengaluru",
            "country": "IND",
            "state": "Karnataka",
            "zipcode": "560032",
            "latitude": "123123",
            "longitude": "1231231"
        },
        "insights": {
            "order_count": "22",
            "chargeback_count": "4",
            "tier": "gold",
            "booking_channel": "agent",
            "has_account": true,
            "registered_at": 1234567890
        }
    },
    "receipt": "Receipt No. 1",
    "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey... decaf."
    }
}'
```json: Response
{
    "amount": 1000,
    "amount_due": 1000,
    "amount_paid": 0,
    "attempts": 0,
    "created_at": 1707389202,
    "currency": "INR",
    "entity": "order",
    "id": "order_NYMDbygGb1DuDd",
    "method": "card",
    "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey... decaf."
    },
    "offer_id": null,
    "receipt": "Receipt No. 1",
    "status": "created",
    "token": {
        "expire_at": 1709971120,
        "max_amount": 100000000
    }
}
```

    
### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the amount should be `100` ().

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`merchant_id` _mandatory_
: `string` This is the Razorpay merchant ID for your Razorpay account. You can find this by logging in to the Dashboard and clicking the user icon in the top right corner.

`customer_id` _mandatory_
: `string` The unique identifier of the customer. For example, `cust_4xbQrmEoA5WJ01`.

`method` _optional_
: `string` Payment method used to make the authorisation transaction. Here, it is `card`.

`token`
: `object` Details related to the authorisation such as max amount, frequency and expiry information.

  `max_amount` _mandatory_
  : `integer` The maximum amount that can be auto-debited in a single charge. The minimum value is `100` (₹1), and the maximum value is `100000000` (₹10,00,000). For an amount higher than this or the RBI limit of ₹15,000 (`1500000`), the cardholder should provide an Additional Factor of Authentication (AFA) as per RBI guidelines.

  `expire_at` _mandatory_
  : `integer` The Unix timestamp that indicates when the authorisation transaction must expire. The card's expiry year is considered a default value.

  `frequency` _mandatory_
  : `string` The frequency at which you can charge your customer. Possible values:
    - `weekly`
    - `monthly`
    - `yearly`
    - `as_presented`

`customer_details` _mandatory_
: `object` This contains details about the customer details of the order.

     `name` _mandatory_
     : `string` Customer's name.
      - Character length: Between 5 and 50 characters.
      - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z), and spaces (not at the beginning).
      - Not allowed characters: Numbers, special characters (e.g., @, ", ,, ., etc.), Unicode characters, emojis, and non-Latin scripts or regional languages.
      - Prohibited names: Names must be meaningful and contextually appropriate.
        - Avoid using repetitive patterns (e.g., aaa, xyz, kkk kk).
        - Names like litri litri, Hfg Gh, or husi husi are not permitted.
        - Curse words or offensive names are not prohibited.
      - Example: `Gaurav Kumar`.

     `email` _optional_
     : `string` The customer's email address. A maximum length of 64 characters for the username. For example, in "gaurav.kumar@example.com", "gaurav.kumar" must not exceed 64 characters.

     `contact` _optional_
     : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919000090000`.

     `shipping_address` _mandatory_
     : `object` This contains the shipping address of the order.
      
         `line1` _mandatory_
         : `string` Address Line 1 of the address.
            - Character length: Must be between 3 and 100 characters.
            - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z), numbers (0-9), spaces, and special characters (*&/-()#_+{}[]:'".,.).
            - Not allowed characters: Regional languages.

         `line2` _mandatory_
         : `string` Address Line 2 of the address.
            - Character length: Must be between 3 and 100 characters.
            - Allowed characters: Uppercase letters (A-Z), lowercase letters (a-z), numbers (0-9), spaces, and special characters (*&/-()#_+{}[]:'".,.).
            - Not allowed characters: Regional languages.

         `city` _mandatory_
         : `string` Name of the city. Must be between 3 and 50 characters in length and can only include uppercase (A-Z) and lowercase (a-z) English letters, and spaces.

         `country` _mandatory_
         : `string` ISO3 country code of the billing address. Only `IND` is allowed.

         `state` _mandatory_
         : `string` Name of the state. It must be between 3 and 50 characters extended and can only include uppercase (A-Z) and lowercase (a-z) English letters and spaces. Please send the full name of the state, for example, Madhya Pradesh.

         `zipcode` _mandatory_
         : `string` The ZIP code must consist of 6-digit numeric characters. Only valid Indian ZIP codes will be accepted. Refer to the list of supported ZIP codes.

         `latitude` _optional_
         : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits to represent the precision of the coordinate.

         `longitude` _optional_
         : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits to represent the precision of the coordinate.

     `insights ` _optional_
      : `json object` Additional details of the customer, including past transaction data.

          `order_count ` _optional_
          : `integer` Total orders placed by the account so far on the business platform. For example, 22.

          `chargeback_count ` _optional_
          : `integer` Total chargeback received for the customer account on the business platform. For example, 4.

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
             -` 1`: If the user is logged into the account.
             - `0`: If the user is on guest 

          `registered_at` _optional_
          : `integer` UNIX timestamp when the customer account was created. For example, 1234567890.

`receipt` _optional_
: `string` A user-entered unique identifier for the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`notes`_optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`. 
        

    
### Response Parameters

`amount`
: `integer` Amount in currency subunits. For cards, the amount should be `100` ().

`amount_due`
: `integer` The amount that the customer has yet to pay.

`amount_paid`
: `integer` The amount that has been paid.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`created_at`
: `integer` The Unix timestamp at which the order was created.

`currency`
: `string` The 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`entity`
: `string` Name of the entity. Here, it is `order`.

`id`
: `string` A unique identifier of the order created. For example `order_1Aa00000000002`.

`method`
: `string` Payment method used to make the authorisation transaction. Here, it is `card`.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`receipt`
: `string` A user-entered unique identifier of the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`status`
: `string` The status of the order.

`token`
: `details` Details related to the authorisation such as max amount and bank account information.

    `expire_at`
    : `integer` The Unix timestamp to indicate till when you can use the token (authorisation on the payment method) to charge the customer subsequent payments. The default value is 10 years for `emandate`. This value can range from the current date to 31-12-2099 (`4102444799`).

    `max_amount`
    : `integer` The maximum amount in paise a customer can be charged in a transaction. The value can range from `500` to `100000000`. The default value is `9999900` (₹99,999).

You can create a payment against the `order_id` after you create an order.
        

## 1.3 Create an Authorisation Payment 

Once an order is created, your next step is to create a payment. Use the below endpoint to create a payment with payment method `card`.

/payments/create/json

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
    "amount": "1000",
    "currency": "INR",
    "order_id": "order_NYMDbygGb1DuDd",
    "recurring": true,
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "card",
    "card": {
        "number": "4854980604708430",
        "cvv": "",
        "expiry_month": "12",
        "expiry_year": "25",
        "name": "Gaurav Kumar"
    },
    "notes": {
        "invoice_number": "IRS1245",
        "goods_description": "Digital Lamp"
    }
}'

```json: Response
{
    "razorpay_payment_id": "pay_NYMDsWdiF5QIor",
    "next": [
        {
            "action": "redirect",
            "url": "https://api.razorpay.com/v1/payments/NYMDsWdiF5QIor/authenticate"
        }
    ]
}
```

> **INFO**
>
> 
> **Handy Tips**
> 
> - To process recurring transactions, customer card details will need to be secured/tokenised in accordance with the applicable laws. The merchant will be solely responsible for obtaining informed consent from customers for the processing of e-mandates and such consent shall be explicit and not by way of a forced/default/automatic selection of check box, radio button etc.
> - When the merchant is  sharing `recurring: 1` or `preferred`, it is for tokenising the card as per applicable rules for recurring mandate creation.
>  If such consent is not shared during the payment flow, then Razorpay will not tokenise the card or process the e-mandate/ recurring transaction.
> 

    
### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100` (₹1).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`order_id` _mandatory_
: `string` The unique identifier of the order created in [Step 1.2 Create an Order](#12-create-an-order).

`recurring` _mandatory_
: `boolean` Possible values:
     - `true`: Recurring payment is enabled.
     - `false`: Recurring payment is not enabled.
   
   
    
> **INFO**
>
> 
>     **Handy Tips**
>    
>     You can also pass the value as 'preferred' when you want to support recurring payments and one-time payment in the same flow.
>     

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `9000090000`.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `card`.

`card`
: `object` The attributes associated with a card.

    `number` _mandatory_
    : `integer` Unformatted card number. This field is required if value of `method` is `card`. Use one of our [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md) to try out the payment flow.
    
    `cvv` _mandatory_
    : `integer` CVV printed on the back of the card.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>         - CVV is not required by default for tokenised cards across all networks.
>         - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>         - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>         - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>         - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.          
>     

    `expiry_month` _mandatory_
    : `integer` The expiry month of the card in `MM` format. For example, `01` for January and `12` for December.

    `expiry_year` _mandatory_
    : `integer` Expiry year for card in the `YY` format. For example, 2025 will be in format `25`.
   
    `name` _mandatory_
    : `string` The name of the cardholder.

`notes` _mandatory_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

    `invoice_number` _mandatory_
    : `string` Invoice number of the generated invoice. Ensure that each payment has a unique invoice number, with a length of fewer than 40 characters.

    `goods_description` _optional_
    : `string` Description of the goods. For example, `Digital Lamp`.
        

    
### Response Parameters

If the payment request is valid, the response contains the following fields. Refer to the [S2S Json V2 integration document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md#step-2-create-a-payment) for more details.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. Possible values:
      - `otp_generate` - Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
      - `redirect` - Use this URL to redirect the customer to submit the OTP on the bank page.

    `url`
    : `string` URL to be used for the action indicated.
