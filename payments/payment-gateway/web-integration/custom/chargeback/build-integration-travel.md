---
title: 1. Travel Build Integration
description: Steps to integrate the Custom Checkout form on your website.
---

# 1. Travel Build Integration

Follow the steps to integrate Custom Checkout in your site:

**1.1** [Generate API Keys](#11-generate-api-keys).

**1.2** [Create an Order in Server](#12-create-an-order-in-server).

**1.3** [Fetch Payment Methods](#13-fetch-payment-methods).

**1.4** [Invoke Checkout and Pass Order Id and Other Options to it](#14-invoke-checkout-and-pass-order-id-and).

  **1.4.1** [Include JavaScript code in your Webpage](#141-include-javascript-code-in-your-webpage).

  **1.4.2** [Instantiate Custom Checkout](#142-instantiate-custom-checkout).

  **1.4.3** [Submit Payment Details](#143-submit-payment-details).

**1.5** [Store Fields in Your Server](#15-store-fields-in-your-server).

**1.6** [Verify Payment Signature](#16-verify-payment-signature).

**1.7** [Verify Payment Status](#17-verify-payment-status).

## 1.1 Generate API Keys

Follow these steps to generate API keys:

  
   Watch this video to see how to generate API keys in the Test mode.

   
  

  
   Watch this video to see how to generate API keys in the Live mode.

   
  

1. Log in to your Dashboard with the appropriate credentials.
2. Select the mode (**Test** or **Live**) for which you want to generate the API key. 
    - **Test Mode**: The test mode is a simulation mode that you can use to test your integration flow. **Your customers will not be able to make payments in this mode**. 
    - **Live Mode**: When your integration is complete, switch to live mode and generate live mode API keys. In the integration, **replace test mode keys with live mode keys to accept customer payments**.
3. Navigate to **Account & Settings** → **API Keys** (under **Website and app settings**) → **Generate Key** to generate key for the selected mode.

> **WARN**
>
> 
> **Watch Out!**
> 
> - After generating the keys from the Dashboard, download and save them securely. You can use only one set of API keys. If you do not remember your API keys, you must [regenerate them](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#regenerate-api-keys) from the Dashboard and update them wherever the previous keys were used for payment gateway integrations. 
> - API Keys are universal; that is, they are applicable to all websites and apps that you have whitelisted for your Merchant ID.
> - **Do not share your API Key secret** with anyone or on any public platforms. **This can pose security threats to your Razorpay account**.
> - Once you generate the API Keys, only the **Key Id** is visible on the Dashboard, **not the Key secret**, as it can pose security threats to your Razorpay account.
> - Use the **Live API Keys** to accept live payments and the **Test API Keys** for test transactions.
> 

Once generated, you will be able to see the Key id, the date the key was created and the expiry date for the API Key on screen. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Save your Key ID and Key Secret securely (never expose the Key Secret in client-side code).
> 

## 1.2 Create an Order in Server

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call.  Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) Orders API.  
- The order_id received in the response should be passed to the checkout. This ties the Order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

#### API Sample Code

The following is a sample API request and response for creating an order:

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1111",
  "partial_payment": false,
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
    },
    "billing_address": {
      "line1": "Mantri apartment",
      "line2": "Koramangala",
      "city": "Bengaluru",
      "country": "IND",
      "state": "Karnataka",
      "zipcode": "560032",
      "latitude": null,
      "longitude": null
    }
  },
  "line_items_total": 5000,
  "line_items": [
    {
      "sku": "1gr367",
      "name": "Flight Ticket",
      "description": "Flight tickets",
      "quantity": 2,
      "type": "travel",
      "image_url": "http://url",
      "product_url": "http://url",
      "price": 5000,
      "offer_price": 5000,
      "tax_amount": 0,
      "travel": {
        "mode": "flight",
        "sub_type": "ticket",
        "carrier_code": "AA123",
        "departure_city": "UAM",
        "departure_timestamp": "1234567890",
        "arrival_city": "UAM",
        "travellers": [
          {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "+919000090000",
            "age": 18,
            "nationality": "IND",
            "class": "business",
            "identity": {
              "unique_national_id": "ABCDE12345Z",
              "tax_id": "ABCDE12345Z"
            }
          },
          {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "+919000090000",
            "age": 18,
            "nationality": "IND",
            "class": "business",
            "identity": {
              "unique_national_id": "ABCDE12345Z",
              "tax_id": "ABCDE12345Z"
            }
          }
        ]
      }
    },
    {
      "sku": "1gr368",
      "name": "Travel_Insurance",
      "description": "Flight_Travel_Insurance",
      "quantity": 1,
      "image_url": "http://url",
      "product_url": "http://url",
      "price": 5000,
      "offer_price": 5000,
      "tax_amount": 0,
      "type": "travel",
      "travel": {
        "mode": "flight",
        "sub_type": "insurance",
        "travellers": [
          {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "+919000090000",
            "age": 18,
            "nationality": "IND",
            "class": "business",
            "identity": {
              "unique_national_id": "ABCDE12345Z",
              "tax_id": "ABCDE12345Z"
            }
          }
        ]
      }
    }
  ],
  "payment_config": {
    "capture": "automatic",
    "capture_options": {
      "automatic_expiry_period": 12,
      "manual_expiry_period": 7200,
      "refund_speed": "optimum"
    }
  },
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

```json: Response
{
  "id": "order_QU1wpqJfs7smfR",
  "entity": "order",
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "INR",
  "receipt": "receipt#1111",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "key1": "value3",
    "key2": "value2"
  },
  "created_at": 1747055716
}
```

  
### Request Parameters

     `amount` _mandatory_
     : `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>       

     `currency` _mandatory_
     : `string` The currency in which the transaction should be made. View the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). The length must be 3 characters.

      
> **INFO**
>
> 
> 
>       **Handy Tips**
> 
>       Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>       

     `receipt` _optional_
     : `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

     `partial_payment` _optional_
     : `boolean` Indicates whether the customer can make a partial payment. Possible values:
          - `true`: The customer can make partial payments.
          - `false` (default): The customer cannot make partial payments.

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
           `true`: If the user is logged into the account.
           `false`: If the user is on guest checkout.

         `registered_at` _optional_
         : `integer` UNIX timestamp when the customer account was created with the business. For example, 1234567890.

       `billing_address` _optional_
       : `Json object` This will have details about the billing address of the customer/user.

         `line1` _optional_
         : `string` Address Line 1 of the address.

         `line2` _optional_
         : `string` Address Line 2 of the address.

         `city` _optional_
         : `string` City of the address. For example, `Bengaluru`.

         `country` _optional_
         : `string` ISO3 country code of the billing address. For example, `IND`.

         `state` _optional_
         : `string` Name of the state. For example, `KA`.

         `zipcode` _optional_
         : `string` Zipcode of the state. For example, `560001`.

         `latitude` _optional_
         : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

         `longitude` _optional_
         : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

     `line_items_total` _optional_
     : `integer` Total sum of the cart value.

     `line_items` _mandatory_
     : `json object` Details about the specific items added to the cart.

       `sku` _optional_
       : `string ` Unique product id defined by the business.

       `name` _optional_
       : `string` The name of the product.

       `description` _optional_
       : `string` Description of the product.

       `quantity` _optional_
       : `integer` Number of tickets/items/quantity to be purchased.

       `type` _mandatory_
       : `string` Defines the category type. Possible values: 
         - `travel`
         - `hotel`
         - `e_commerce`
         - `mutual_fund`

       `image_url` _optional_
       : `string` URL of the product image.

       `product_url` _optional_
       : `string` URL of the product’s listing page.

       `price` _optional_
       : `integer` Unit price of the product in paisa (needs to be inclusive of tax).

       `offer_price` _optional_
       : `integer` Offer price of the product. The offer price can be lower than the price if the business is running any discount on the product.

       `tax_amount` _optional_
       : `integer` Tax amount that needs to be added to the product. In case the **offer_price** is tax-inclusive, keep it blank.

       `travel` _optional_
       : `json object` Details about the type-specific data points. Will vary based on the type selected. 
          
         `mode` _optional_
         : `string` The mode of travel. Possible values:  
           - `flight`
           - `train`
           - `bus`
           - `cab`
           - `others`

         `sub_type` _optional_
         : `string` The subtype of the line item. Possible values:   
           - `ticket`
           - `meal`
           - `insurance`
           - `preferred_seat`
           - `others`

         `carrier_code` _optional_
         : `string` Full flight number for this leg of the journey. For example, `AA123`.

         `departure_city` _optional_
         : `string` 3 letter IATA airport code, also known as an IATA location identifier, IATA station code. For example, CPH for Copenhagen.

         `departure_timestamp` _optional_
         : `integer` UNIX timestamp. For example, `1234567890`.

         `arrival_city` _optional_
         : `string` 3 letter IATA airport code, also known as an IATA location identifier, IATA station code. For example, CPH for Copenhagen

         `travellers` _optional_
         : `JSON object` Details associated with passengers/travellers/beneficiaries.

           `name` _optional_
           : `string` Name of the passenger/traveler/beneficiary.

           `email` _optional_
           : `string` Email address of the passenger/traveler/beneficiary.

           `age` _optional_
           : `integer` UNIX timestamp of the date of birth of the individual. For example, `1234567890`.

           `nationality` _optional_
           : `string` ISO3 country code to share the nationality of the individual. For example, `IND`.

           `class` _optional_
           : `string` Type of the flight ticket. Possible values:  
             - `economy`
             - `premium_economy`
             - `business`
             - `SL`
             - `3A`
             - `2A`
             - `1A`
             - `CC`
             - `others`

           `identity` _optional_
           : `JSON object` Identity details of the passenger/beneficiary.

             `tax_id` _optional_
             : `string` Tax ID number. For example, PAN number for India.

             `unique_national_id` _optional_
             : `string` National ID number.  For example, Adhaar number for India.

     `payment_config` _optional_
     : `array` Payment capture settings for the payment. The options sent here override the [account level auto-capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.

      `capture` _mandatory_
      : `string` Option to automatically capture payment. Possible values:
        - `automatic`: Payments are auto-captured according to the configurations specified in the `capture_options` array.
        - `manual`: You have to manually capture payments using our [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/capture.md) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments).

      `capture_options` _optional_
      : `array` Use this array to determine the expiry period for automatic and [manual capture](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings/api.md) of payments and the refund speed in the case of non-capture.

          `automatic_expiry_period` _mandatory if capture = automatic_
          : `integer` Time in minutes till when payments in the `authorized` state should be auto-captured.
            Minimum value `12` minutes. This parameter is mandatory only if the value of the `capture` parameter is `automatic`.

          `manual_expiry_period` _optional_ 
          : `integer` Time in minutes till when you can manually capture payments in the `authorized` state.
            - Must be equal to or greater than the `automatic_expiry_period` value.
            - Default value `7200` minutes.
            - Maximum value `7200` minutes.
            - Payments in the `authorized` state after the `manual_expiry_period` are auto-refunded.

          `refund_speed` _mandatory_
          : `string` Refund speed for payments that were not captured (automatically or manually). Possible values:
            - `optimum`: We try to process the refund instantly. We charge a small fee for this. If it is not possible to process an instant refund, we will process a normal refund in 5-7 working days. [Learn more about instant refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#how-instant-refunds-work).
            - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#setting-the-default-speed-of-refunds).

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
        : `string` The referrer of the marketing event. Example values: 
           - `google`
           - `newsletter`

        `medium` _optional_
        : `string` The medium that the campaign is using. Example values: 
           - `cpc` 
           - `banner`

     `notes` _optional_
     : `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
    

  
### Response Parameters

     `amount`
     : `integer` The transaction amount, expressed in the currency subunit. For example, for an actual amount of , the value of this field should be `29935`.

     `amount_due`
     : `integer` The amount pending against the order.

     `amount_paid`
     : `integer` The amount paid against the order.

     `attempts`
     : `integer` The number of payment attempts, successful and failed, that have been made against this order.

     `created_at`
     : `integer` The UNIX timestamp at which the order is created.

     `currency` _mandatory_
     : `string` The currency in which the transaction should be made. View the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

     `entity`
     : `string` Name of the entity. Here, it is `order`.

     `id`
     : `string` The unique identifier of the order. 

     `notes`
     : `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

     `offer_id`
     : `string` The unique identifier of the offer.

     `receipt`
     : `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

     `status`
     : `string` The status of the order. Possible values:
        - `created`: When you create an order, it is in the `created` state. It stays in this state till a payment is attempted on it.
        - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
        - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.
    

  
### Error Response Parameters

     The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
    

## 1.3 Fetch Payment Methods

When creating a custom checkout form, display only the activated methods to the customer. Use the below methods to fetch all payments methods available to you:

```js: Request
var razorpay = new Razorpay({
  key: '',
    // logo, displayed in the popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
});
razorpay.once('ready', function(response) {
  console.log(response.methods);
})
```js: Response
{
  "methods": {
    "entity": "methods",
    "card": true,
    "debit_card": true,
    "credit_card": true,
    "prepaid_card": true,
    "card_networks": {
      "AMEX": 0,
      "DICL": 1,
      "MC": 1,
      "MAES": 1,
      "VISA": 1,
      "JCB": 1,
      "RUPAY": 1,
      "BAJAJ": 0
    },
    "amex": false,
    "netbanking": {
      ...
      ...
      "HDFC": "HDFC Bank",
      "ICIC": "ICICI Bank"
      ...
      ...
    },
    "wallet": {
      "payzapp": true
    },
    "emi": true,
    "upi": true,
    "cardless_emi": [],
    "paylater": [],
    "emi_subvention": "customer",
    "emi_options": {
      ...
      ...
      "ICIC": [
        {
          "duration": 3,
          "interest": 13,
          "subvention": "customer",
          "min_amount": 150000
        },
        {
          "duration": 6,
          "interest": 13,
          "subvention": "customer",
          "min_amount": 150000
        }
        ...// rest of the emi plans
      ],
      "HDFC": [
        {
          "duration": 12,
          "interest": 14,
          "subvention": "customer",
          "min_amount": 300000
        },
        {
          "duration": 18,
          "interest": 15,
          "subvention": "customer",
          "min_amount": 300000
        }
        ...
        ...// rest of the emi plans
      ]
    }
  }
}
```

Know more about [the various payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md) offered by Razorpay.

## 1.4 Invoke Checkout and Pass Order Id and Other Options to it

### 1.4.1 Include JavaScript code in your Webpage

Include the following script, preferably in the `` section of your page:

```html: Index HTML

```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Include the script from `https://checkout.razorpay.com/v1/razorpay.js` instead of serving a copy from your server. This allows the library's new updates and bug fixes to fit your application automatically.
> - We always maintain backward compatibility with our code.
> 

### 1.4.2 Instantiate Custom Checkout

#### Single Instance on a Page

```js: Invoke a Single Instance
var razorpay = new Razorpay({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
});
```

#### Multiple Instances on Same Page

If you need multiple Razorpay instances on the same page, you can globally set some of the options:

```js: Invoke Multiple Instances
Razorpay.configure({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
})
new Razorpay({}); // will inherit key and image from above.
```

#### Checkout Options

While building a custom UI for accepting payments from your customers, you should be familiar with the fields supported in the `razorpay.js` script.

  
### Checkout Parameters

     
     `key` _mandatory_
     : `string` API Key ID generated from **Dashboard** → **Account & Settings** → [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

     `amount` _mandatory_
     : `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.999, pass the value as `295999`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        As per VISA Guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>        

     

     

     

     `currency` _mandatory_
     : `string` The currency in which the payment should be made by the customer. For example, `INR`. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

       
> **INFO**
>
> 
> 
>        **Handy Tips**
> 
>        Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (April 2023).
>        

     

     

     

     `description` _optional_
     : `string` Description of the product shown in the Checkout form. It must start with an alphanumeric character.

     `image` _optional_
     : `string` Link to an image (usually your business logo) shown in the Checkout form. Can also be a **base64** string, if loading the image from a network is not desirable.

     `order_id` _mandatory_
     : `string` Order ID generated via the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

     `notes` _optional_
     : `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

     

     `method` _mandatory_
     : `string` The payment method used by the customer on Checkout. 
Possible values:
         - `card` (default)
         - `upi` (default)
         - `netbanking` (default)
         - `wallet` (default)
         - `emi` (default)
         - `cardless_emi` (requires [approval](https://razorpay.com/support/#request))
         - `paylater` (requires [approval](https://razorpay.com/support/#request))
         - `emandate` (requires [approval](https://razorpay.com/support/#request))

     

     

     

     

     `card` _mandatory if method=card/emi_
     : `object` The details of the card that should be entered while making the payment.

         `number` 
         : `integer` Unformatted card number.

         `name`
         : `string` The name of the cardholder.

         `expiry_month`
         : `integer` Expiry month for card in MM format.

         `expiry_year`
         : `integer` Expiry year for card in YY format.

         `cvv`
         : `integer` CVV printed on the back of the card.
         
> **INFO**
>
> 
>          **Handy Tips**
> 
>           - CVV is not required by default for tokenised cards across all networks.
>           - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>           - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>           - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>           - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.       
>          

         `emi_duration`
         : `integer` Defines the number of months in the EMI plan.

     

     

     

     

     `bank_account` _mandatory if method=emandate_
     : The details of the bank account that should be passed in the request. These details include bank account number, IFSC code and the name of the customer associated with the bank account.

         `account_number`
         : `string` Bank account number used to initiate the payment.

         `ifsc`
         : `string` IFSC of the bank used to initiate the payment.

         `name`
         : `string` Name associated with the bank account used to initiate the payment.

     `bank` _mandatory if method=netbanking_
     : `string` Bank code. List of available banks enabled for your account can be fetched via [**methods**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#fetch-supported-methods).

     

     

     

     `wallet` _mandatory if method=wallet_
     : `string` Wallet code for the wallet used for the payment. Possible values:
         - `payzapp` (default)
         - `olamoney` (requires [approval](https://razorpay.com/support/#request))
         - `phonepe` (requires [approval](https://razorpay.com/support/#request))
         - `airtelmoney` (requires [approval](https://razorpay.com/support/#request))
         - `mobikwik` (requires [approval](https://razorpay.com/support/#request))
         - `jiomoney` (requires [approval](https://razorpay.com/support/#request))
         - `amazonpay` (requires [approval](https://razorpay.com/support/#request))
         - `paypal` (requires [approval](https://razorpay.com/support/#request))
         - `phonepeswitch` (requires [approval](https://razorpay.com/support/#request))

     

     

     `provider` _mandatory if method=cardless_emi/paylater_
     : `string`  Name of the cardless EMI provider partnered with Razorpay.

       Available options for Cardless EMI (requires [approval](https://razorpay.com/support/#request)):
         - `hdfc`
         - `icic`
         - `idfb`
         - `kkbk`
         - `zestmoney`
         - `earlysalary`
         - `walnut369`

       Available options for Pay Later:
         - `lazypay`
         - `paypal`

     `vpa` _mandatory if method=upi_
     : `string`  UPI ID used for making the payment on the UPI app.

        
> **WARN**
>
> 
>         **Deprecation Notice**
> 
>         UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md) to switch to UPI Intent.
>         

     

     

`callback_url` _optional_
: `string` The URL to which the customer must be redirected upon completion of payment. The URL must accept incoming `POST` requests. The callback URL will have `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` as the request parameters for a successful payment.

`redirect` _conditionally mandatory_
: `boolean` Determines whether customer should be redirected to the URL mentioned in the `callback_url` parameter. This is mandatory if `callback_url` parameter is used. Possible values:
     - `true`: Customer will be redirected to the `callback_url`.
     - `false`: Customer will not be redirected to the `callback_url`.

### 1.4.3 Submit Payment Details

After creating an order and obtaining the customer's payment details, send the information to Razorpay to complete the payment. The data that needs to be submitted depends on the customer's payment method. You can do this by invoking `createPayment` method.

Know more about [sample codes for various payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md).

```js: createPayment with handler function
var data = {
  amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
  currency: "INR",// Default is INR. We support more than 90 currencies.
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_CuEzONfnOI86Ab',// Replace with Order ID generated in Step 4
  method: 'netbanking',

  // method specific fields
  bank: 'HDFC'
};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
  // has to be placed within user initiated context, such as click, in order for popup to open.
  razorpay.createPayment(data);

  razorpay.on('payment.success', function(resp) {
    alert(resp.razorpay_payment_id),
    alert(resp.razorpay_order_id),
    alert(resp.razorpay_signature)}); // will pass payment ID, order ID, and Razorpay signature to success handler.

  razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler

})

```js: createPayment with callback URL
var data = {
  callback_url: 'https://www.examplecallbackurl.com/',
  amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
  currency: "INR",// Default is INR. We support more than 90 currencies.
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_CuEzONfnOI86Ab',// Replace with Order ID generated in Step 4
  method: 'netbanking',

  // method specific fields
  bank: 'HDFC'
};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
  // has to be placed within user initiated context, such as click, in order for popup to open.
  razorpay.createPayment(data);

})
```

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> The `createPayment` method should be called within an event listener triggered by user action to prevent the popup from being blocked. For example:
> 

> ```js
> $('button').click( function (){ razorpay.createPayment(...) })
> ```
> 

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - **Handler Function**
>   
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server.
> - **Callback URL**
>   
When you use a callback URL, Razorpay makes a post call to the callback URL, with the `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` in the response object of the successful payment (`razorpay_payment_id` and `razorpay_order_id`). 
> 

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
    

  
### Failure Response

A failed payment returns an error response.

```json: Sample Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Authentication failed due to incorrect otp",
    "field": null,
    "source": "customer",
    "step": "payment_authentication",
    "reason": "invalid_otp",
    "metadata": {
      "payment_id": "pay_EDNBKIP31Y4jl8",
      "order_id": "order_DBJKIP31Y4jl8"
    }
  }
}
```

Know more about [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md).
    

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
    

        

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/chargeback/test-integration.md)
