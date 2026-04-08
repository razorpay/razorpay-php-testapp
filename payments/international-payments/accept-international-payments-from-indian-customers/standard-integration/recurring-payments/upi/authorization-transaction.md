---
title: 1. Create the Authorisation Transaction
description: Steps to create an authorisation transaction for UPI.
---

# 1. Create the Authorisation Transaction

Given below are the steps to create an authorisation transaction using the Razorpay APIs.

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
    "method": "upi",
    "token": {
        "max_amount": 200000,
        "expire_at": 1709971120,
        "frequency": "monthly",
        "recurring_value": 8,
        "recurring_type": "on"
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
        "notes_key_2": "Tea, Earl Grey… decaf."
    }
}'
```
```json: Success
{
    "amount": 1000,
    "amount_due": 1000,
    "amount_paid": 0,
    "attempts": 0,
    "created_at": 1707391377,
    "currency": "INR",
    "entity": "order",
    "id": "order_NYMptG6ChGaFgj",
    "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "offer_id": null,
    "receipt": "Receipt No. 1",
    "status": "created"
}

```json: Failure
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"The api key provided is invalid",
      "source":"NA",
      "step":"NA",
      "reason":"NA",
      "metadata":{
         
      }
   }
}
```

> **INFO**
>
> 
> **Handy Tips**
> 
> The subsequent payment frequency is displayed on your customer's PSP. They can select the required frequency while registering for the mandate.
> 

  
### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`merchant_id` _mandatory_
: `string` This is the Razorpay merchant ID for your Razorpay account. You can find this by logging in to the Dashboard and clicking the user icon in the top right corner.

`customer_id` _mandatory_
: `string` The unique identifier of the customer. For example, `cust_4xbQrmEoA5WJ01`.

`method` _mandatory_
: `string` The authorisation method. Here, it is `upi`.

`token`
: `object` Details related to the authorisation such as max amount, frequency and expiry information.

  `max_amount` _mandatory_
  : `integer` The maximum amount that can be debited in a single charge.
    
    MCC | Category | Min Value | Max Value
    ---
    6211 | Financial Services | `100` (₹1) | `20000000` (₹2,00,000)
    ---
    6300 | Financial Services | `100` (₹1) | `20000000` (₹2,00,000)
    ---
    7322 | Financial Services | `100` (₹1) | `20000000` (₹2,00,000)
    ---
    6529 | Financial Services | `100` (₹1) | `20000000` (₹2,00,000)
    ---
    5960 | Services | `100` (₹1) | `20000000` (₹2,00,000)
    

  For other categories and MCCs, the minimum value is `100` (₹1) and maximum value is 9999900 (₹99,999).

  `expire_at` _mandatory_
  : `integer` The Unix timestamp that indicates when the authorisation transaction must expire. The default value is 10 years, and the maximum value allowed is 30 years.

  `frequency` _mandatory_
  : `string` The frequency at which you can charge your customer. Possible values:
    - `daily`
    - `weekly`
    - `fortnightly`
    - `bimonthly`
    - `monthly`
    - `quarterly`
    - `half_yearly`
    - `yearly`
    - `as_presented`

  `recurring_value` _optional_
  : `integer` Determines the exact date or range of dates for recurring debits. Possible values are:
    - 1-7 for `weekly` frequency
    - 1-31 for `fortnightly` frequency
    - 1-31 for `bimonthly` frequency
    - 1-31 for `monthly` frequency
    - 1-31 for `quarterly` frequency
    - 1-31 for `half_yearly` frequency
    - 1-31 for `yearly` frequency and is not applicable for the `as_presented` frequency.
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     If the date entered for the recurring debit is not available for a month, then the last day of the month is considered by default. For example, if the date entered is 31 and the month has only 28 days, then the date 28 is considered.
>     

  `recurring_type` _optional_
  : `string` Determines when the recurring debit can be done. Possible values are:
    - `on`: Recurring debit happens on the exact day of every month.
      
> **INFO**
>
> 
>       **Handy Tips**
>   
>       For creating an order with `recurring_type`=`on`, set the `recurring_value` parameter to the current date.
>       

    - `before`: Recurring debit can happen any time before the specified date.
    - `after`: Recurring debit can happen any time after the specified date.
    
    For example, if the `frequency` is `monthly`, `recurring_value` is `17`, and `recurring_type` is `before`, recurring debit can happen between the month's 1st and 17th. Similarly, if `recurring_type` is `after`, recurring debit can only happen on or after the 17th of the month.

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
       `- 1`: If the user is logged into the account.
       `- 0`: If the user is on guest checkout.

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

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`receipt`
: `string` A user-entered unique identifier of the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`status`
: `string` The status of the order. 
    

  
### Error Response Parameters

Given below is a list of possible errors you may face while creating an Order.

Error | Cause | Solution
---
The id provided does not exist | This error occurs when you enter an incorrect `customer_id.` | Make sure to enter a valid `customer_id`.
---
The api key provided is invalid | This error occurs when you enter the wrong API key or secret. | Make sure to enter a valid API key and secret.
---
The amount must be at least INR 1.00. | This error occurs when you enter an amount less than INR 1. | Make sure the entered amount is atleast INR 1.00.
---
The currency should be INR when method is upi | This error occurs when you enter a currency other than INR | Make sure the currency is INR.
---
The amount field is required. | This error occurs when you have not entered the amount or the `max_amount` value. | Make sure to enter the `max_amount` value.
---
The minimum transaction amount allowed is Re. 5. | This error occurs when you enter the maximum amount less than the minimum amount. | Make sure the `max_amount` value is more than the `min_amount` value.
---
The order amount cannot be greater than the token max amount for upi recurring. | This error occurs when the order amount exceeds the `token_max` amount passed in the API request payload. | Ensure the order amount is lesser than the `token_max` account. 

    

## 1.3 Create an Authorisation Payment 

Create a payment checkout form for customers to make Authorisation Transaction and register their mandate. You can use the Handler Function or Callback URL.

  
### Handler Function or Callback URL

**Handler Function** | **Callback URL**
---
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server. | When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Callback URL.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> The Callback URL is not supported for Recurring Payments created using the registration link.
> 

    

  
### Sample Code

```html: Checkout with handler functions
 Pay 
   
  
    var options = {
      "key": "[YOUR_KEY_ID]",
      "order_id": "order_1Aa00000000001",
      "customer_id": "cust_1Aa00000000001",
      "recurring": "1",
      "handler": function (response) {
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature);
      },
       "notes": {
         "invoice_number": "IRS1245",
         "goods_description": "Digital Lamp"
      },
      "theme": {
        "color": "#F37254"
      }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function (e) {
      rzp1.open();
      e.preventDefault();
    }
  
```html: Manual checkout with Callback URL
 Pay 
   
  
    var options = {
      "key": "[YOUR_KEY_ID]",
      "order_id": "order_1Aa00000000001",
      "customer_id": "cust_1Aa00000000001",
      "recurring": "1",
      "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
      "notes": {
        "invoice_number": "IRS1245",
        "goods_description": "Digital Lamp"
      },
      "theme": {
        "color": "#F37254"
      }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function (e) {
      rzp1.open();
      e.preventDefault();
    }
  
```

  
    Additional Checkout Fields
    
You should send the following additional parameters along with the existing checkout options as a part of the authorisation transaction.

`customer_id` _mandatory_
: `string` Unique identifier of the customer created in the [first step](#111-create-a-customer).

`order_id` _mandatory_
: `string` Unique identifier of the  order created in the [second step](#112-create-an-order).

`recurring` _mandatory_
: `string` Determines if the recurring payment is enabled or not. Possible values:
    - `1`: Recurring payment is enabled.
    - `preferred`: Use this if you want to allow **recurring payments** and **one-time payment** in the same flow.

`notes` _mandatory_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

    `invoice_number` _mandatory_
    : `string` Invoice number of the generated invoice. Ensure that each payment has a unique invoice number, with a length of fewer than 40 characters.

    `goods_description` _optional_
    : `string` Description of the goods. For example, `Digital Lamp`.
    

  
### Error Response Parameters

Given below is a list of possible errors you may face while making the authorisation payment.

Error | Cause | Solution
---
transaction_limit_exceeded | The customers have exceeded their account's credit or debit limit. This error usually occurs during high-value transactions. | You have reached the maximum transaction limit for this account. You can try again with a lower amount or use a different bank account.
---
payment_invalid_account | This error occurs when the customer's bank account is either closed or no longer valid. The customer or bank may have closed the account. | The payment could not be completed as the entered bank account details are incorrect. Try again with another account.
---
account_closed | This error occurs when the customer's bank account is either closed or no longer valid. The customer or bank may have closed the account. | The payment could not be completed as your bank account is closed. You can try again with another account or contact your bank for details.
---
invalid_withdrawer_data | This error occurs when the customer's bank account is either closed or no longer valid. The customer or bank may have closed the account. | The payment could not be completed as the customer's bank account is closed or blocked. You can try again with another account.
---
validation_failure | The bank could not validate the customer registration for debiting the customer. | The payment is declined due to a mismatch in account details. Try again with the account registered with the business only.
---
payment_account_withdrawal_frozen | The bank has temporarily blocked withdrawals on the customer's account. | The payment could not be completed as withdrawal for your bank account is locked. You can try again with another account or contact your bank for details.
---
No_DR_allowed | The bank has temporarily blocked withdrawals on the customer's account. | The payment could not be completed as withdrawal for your bank account is locked. You can try again with another account or contact your bank for details.
---
Payment_duplicate _request | A payment initiation request with the same parameters was passed to the gateway. The gateway is blocking duplicate requests. | You should retry after 30 minutes.
---
Registration already in progress | A payment initiation request with the same parameters was passed to the gateway. The gateway is blocking duplicate requests. | Your mandate registration is already in progress. Check the status in some time.
---
payment_risk_check_failed | Payment declined due to risk checks. Razorpay, Gateway and issuer bank perform these risk checks. The source parameter would give additional clarity on where the risk check failed. | The payment could not be completed due to a temporary technical issue. You can try again in sometime.
---

    

    
  

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> For the Authorisation Payment to be successful in a day (for example, 5th June), you should create an Order and the Authorisation Transaction on the same day (5th June) before 11:59 pm.
>
