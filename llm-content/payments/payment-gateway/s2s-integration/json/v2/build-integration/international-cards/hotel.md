---
title: 1. Build Integration for International Cards (Hotel)
description: Steps to integrate S2S JSON API and accept payments using international cards, with Razorpay Chargeback Guarantee Program.
---

# 1. Build Integration for International Cards (Hotel)

You can integrate with Razorpay APIs to start accepting international card payments.

Razorpay Chargeback Guarantee Program on international cards safeguards businesses from fraud chargeback. Businesses provide additional category-specific details to enhance our risk model's ability to detect risky transactions. Razorpay uses this information to enhance risk assessment for international cards, aiming to achieve the highest success rate while minimising fraud.

> **WARN**
>
> 
> **Watch Out!**
> 
> - Category-specific risk rules will not be effective unless you provide additional details.
> 
> - You must have a PCI compliance certificate to enable this feature on your account.
> 

## Integration Steps

Follow the steps given below to integrate S2S JSON API with browser flow and accept payments using cards.

**1.1** [Integrate Razorpay Shield JS](#11-integrate-razorpay-shield-js)

**1.2** [Create Order and Payment](#12-create-order-and-payment)

**1.3** [Handle Payment Success and Error Events](#13-handle-payment-success-and-error-events)

**1.4** [Verify Payment Signature](#14-verify-payment-signature)

**1.5** [Integrate Payments Rainy Day Kit](#15-integrate-payments-rainy-day-kit)

**1.6** [Verify Payment Status](#16-verify-payment-status)

### 1.1 Integrate Razorpay Shield JS

Integrate SHIELD JS and pass session_id in [Create Order and Payment](#12-create-order-and-payment). 

```Curl: JavaScript

// later, at the time of payment initialization:
const checkout_session_id = await RazorpayShield.getCheckoutSessionId() // pass it to your backend

```

### 1.2 Create Order and Payment

This step demonstrates creating an Order and processing a Payment using Razorpay APIs. Depending on your integration type, you can choose between:

  
### 1. Consolidated Order and Payment API

Create an order along with payment using the consolidated order and payment API. This single API call combines order and payment creation, resulting in a more efficient and faster transaction process.

Create an order along with payment by:

- Making a single API call to Razorpay, combining order and payment creation.
- Authenticating using the provided credentials, ensuring access to the consolidated payment API.
- Manually integrating the API sample codes on your server.

The following API will create an order along with payment with `card` as the payment method:

/orders

```curl: Request
curl -X POST https://api.razorpay.com/v1/orders 
-U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
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
  },
  "payment": {
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com",
    "callback_url": "https://merchant_callback_url..",
    "method": "card",
    "card": {
      "number": "4386289407660153",
      "name": "Gaurav",
      "expiry_month": "11",
      "expiry_year": "30",
      "cvv": "100",
      "billing_address": {
        "line1": "Mantri apartment",
        "line2": "Koramangala",
        "city": "Bengaluru",
        "country": "IND",
        "State": "Karnataka",
        "zipcode": "560032"
      }
    },
    "authentication": {
      "authentication_channel": "browser"
    },
    "device_fingerprint": {
      "checkout_session_id": "qwerty12345",
      "browser": {
        "java_enabled": false,
        "javascript_enabled": false,
        "timezone_offset": 11,
        "color_depth": 23,
        "screen_width": 23,
        "screen_height": 100,
        "referer": "https://merchansite.com/example/paybill",
        "user_agent": "Mozilla/5.0"
      },
      "ip": "105.106.107.108"
    }
  }
}'
```

```json: Response
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
  "payment_workflow": {
    "next": [
      {
        "action": "redirect",
        "url": "https://api.razorpay.com/v1/payments/O0NTY9HhENv91s/authenticate"
      }
    ],
    "razorpay_payment_id": "pay_O0NTY9HhENv91s"
  },
  "receipt": "receipt#1111",
  "status": "attempted"
}
```

  
    Request Parameters
    
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
       : `string` The customer’s email address. For example, `gaurav.kumar@example.com`.

       `insights ` _optional_
       : `json object` Additional details of the customer, including past transaction data.

         `order_count ` _optional_
         : `integer` Total orders placed by the account so far on the merchant platform. For example, `22`.

         `chargeback_count ` _optional_
         : `integer` Total chargeback received for the customer account on the merchant platform. For example, `4`.

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

       `billing_address` _optional_
       : `json object` This will have details about the billing address of the customer/user.

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
             : `string` Represents an ISO 8601-encoded date string. For example, September 7, 2019 is represented as `2019-07-16`.

             `checkout_date` _optional_
             : `string` Represents an ISO 8601-encoded date string. For example, September 7, 2019 is represented as `2019-07-16`.

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
             : `json object` Details of the property address.

                 `line1` _optional_
                 : `string` Address Line 1 of the address.

                 `line2` _optional_
                 : `string` Address Line 2 of the address.

                 `city` _optional_
                 : `string` city of the address. For example, `Bengaluru`.

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
        Minimum value `12` minutes. This parameter is mandatory only if the value of `capture` parameter is `automatic`.

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
        : `string` Unique identifier of the campaign. For example, `PQR12453`.
        
        `name` _optional_
        : `string` Name of the campaign.

        `description` _optional_
        : `string` A human-readable description of the campaign.

        `channel` _optional_
        : `string` The marketing channel used.

        `source` _optional_
        : `string` The referrer of the marketing event. Example values: `google`, `newsletter`.

        `medium` _optional_
        : `string` The medium that the campaign is using. Example values: `cpc`, `banner`, etc.

     `notes` _optional_
     : `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

     `payment` _mandatory_
     : `json object` Details about the payment.

       `contact` _mandatory_
       : `string` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

       `email` _mandatory_
       : `string` Email address of the customer. The maximum length supported is 40 characters.

       `callback_url` _optional_
       : `string` URL endpoint where Razorpay will submit the final payment status.

       `method` _mandatory_
       : `string` Name of the payment method. Possible value is `card`.

       `card` _mandatory_
       : `object` Details associated with the card.

         `number` _mandatory_
         : `string` Unformatted card number.

         `name` _mandatory_
         : `string` Name of the cardholder.

         `expiry_month` _mandatory_
         : `integer` Expiry month for the card in `MM` format.

         `expiry_year` _mandatory_
         : `string` Expiry year for the card in `YY` format.

         `cvv` _mandatory_
         : `string` CVV printed on the back of the card.
          
           
> **INFO**
>
> 
>            **Handy Tips**
> 
>            - CVV is not required by default for tokenised cards across all networks.
>            - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>            - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>            - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>            - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.        
>            

          
         `billing_address` _optional_
         : `json object` This will have details about the billing address of the customer/user.

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

       `authentication` _optional_
       : `object` Details of the authentication channel.

         `authentication_channel`
         : `string` The authentication channel for the payment. Possible values:
           - `browser` (default)
           - `app`

       `device_fingerprint` _mandatory_
       : `string` Details of the device fingerprint.

         `checkout_session_id` _mandatory_
         : `object` id of the checkout entity that is created.

         `browser` _mandatory_
         : `object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.
    
           `java_enabled`
           : `boolean` Indicates whether the customer's browser supports Java. Obtained from the `navigator` HTML DOM object. Possible values:
             - `true`: Customer's browser supports Java.
             - `false`: Customer's browser does not support Java.

           `javascript_enabled`
           : `boolean` Indicates whether the customer's browser can execute JavaScript. Obtained from the `navigator` HTML DOM object. Possible values:
              - `true`: Customer's browser can execute JavaScript.
              - `false`: Customer's browser cannot execute JavaScript.

           `timezone_offset`
           : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

           `color_depth`
           : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

           `screen_width`
           : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

           `screen_height`
           : `integer` Obtained from the `navigator` HTML DOM object.

           `referrer` _optional_
           : `string` Referrer header passed by the client's browser.

           `user-agent` _mandatory_
           : `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.

         `ip` _mandatory_
         : `string` The customer's IP address.
    

  
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

     `next`
     : `array` A list of action objects available to continue the payment process. Present when the payment requires further processing.

       `action`
       : `string` Indicates the next step to continue the payment process. Possible values:
         - `otp_generate`: Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
         - `redirect`: Use this URL to redirect the customer to submit the OTP on the bank page.

       `url`
       : `string` URL to be used for the action indicated.

     `razorpay_payment_id`
     : `string` Unique identifier of the payment. Present for all responses.

     `receipt`
     : `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

     `status`
     : `string` The status of the order. Possible values:
        - `created`: When you create an order, it is in the `created` state. It stays in this state till a payment is attempted on it.
        - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
        - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.
    

  
### Error Response Parameters

     The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
    

    
  
  
### 2. Separate Order and Payment APIs

     If you are using separate APIs to create Order and process Payment, follow the steps given below:

  
    Step 1: Create an Order
    
Use the Orders API to create an order before initiating a payment.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1101",
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

      
        Request Parameters
          
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
       : `string` The customer’s email address. For example, `gaurav.kumar@example.com`.

       `insights ` _optional_
       : `json object` Additional details of the customer, including past transaction data.

         `order_count ` _optional_
         : `integer` Total orders placed by the account so far on the merchant platform. For example, `22`.

         `chargeback_count ` _optional_
         : `integer` Total chargeback received for the customer account on the merchant platform. For example, `4`.

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

       `billing_address` _optional_
       : `json object` This will have details about the billing address of the customer/user.

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
             : `string` Represents an ISO 8601-encoded date string. For example, September 7, 2019 is represented as `2019-07-16`.

             `checkout_date` _optional_
             : `string` Represents an ISO 8601-encoded date string. For example, September 7, 2019 is represented as `2019-07-16`.

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
             : `json object` Details of the property address.

                 `line1` _optional_
                 : `string` Address Line 1 of the address.

                 `line2` _optional_
                 : `string` Address Line 2 of the address.

                 `city` _optional_
                 : `string` city of the address. For example, `Bengaluru`.

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
        Minimum value `12` minutes. This parameter is mandatory only if the value of `capture` parameter is `automatic`.

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
        : `string` Unique identifier of the campaign. For example, `PQR12453`.
        
        `name` _optional_
        : `string` Name of the campaign.

        `description` _optional_
        : `string` A human-readable description of the campaign.

        `channel` _optional_
        : `string` The marketing channel used.

        `source` _optional_
        : `string` The referrer of the marketing event. Example values: `google`, `newsletter`.

        `medium` _optional_
        : `string` The medium that the campaign is using. Example values: `cpc`, `banner`, etc.

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
        

     
    
  
  
### Step 2: Create a Payment

     Once the order is created, pass the `order_id` from the Orders API response to the Payments API.

/payments/create/json

```curl: Request
curl -X POST \
https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
  "amount": 10000,
  "currency": "INR",
  "contact": "9900008989",
  "email": "gaurav.kumar@example.com",
  "order_id": "order_PrcuyJDT7uSwaf",
  "callback_url": "https://merchant_callback_url..",
  "method": "card",
  "card": {
    "number": "4111111111111111",
    "name": "Gaurav",
    "expiry_month": "11",
    "expiry_year": "30",
    "cvv": "100"
  },
  "authentication": {
    "authentication_channel": "browser"
  },
  "browser": {
    "java_enabled": false,
    "javascript_enabled": false,
    "timezone_offset": 11,
    "color_depth": 23,
    "screen_width": 23,
    "screen_height": 100
  },
  "ip": "105.106.107.108",
  "referer": "https://merchansite.com/example/paybill",
  "user_agent": "Mozilla/5.0"
}'

```

```json: Response
{
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/pg_router/v1/payments/pay_Ps0cnb0OrxFcSH/dcc_info"
    }
  ],
  "razorpay_payment_id": "pay_Ps0cnb0OrxFcSH"
}
```

     
      
        Request Parameters
          
     

     `amount` _mandatory_
     : `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>        

     `currency` _mandatory_
     : `string` Currency code for the currency in which you want to accept the payment. For example, INR. Refer to the list of supported currencies. The length must be 3 characters.

       
> **INFO**
>
> 
> 
>        **Handy Tips**
> 
>        Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>        

     

     

     `order_id` _mandatory_
     : `string` Unique identifier of the Order.

     `email` _mandatory_
     : `string` Email address of the customer. The maximum length supported is 40 characters.

     `contact` _mandatory_
     : `string` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

     `method` _mandatory_
     : `string` Name of the payment method. Possible value is `card`.

     

     `card` _mandatory_
     : `object` Details associated with the card.

         `number`
         : `string` Unformatted card number.

         `name`
         : `string` Name of the cardholder.

         `expiry_month`
         : `string` Expiry month for the card in MM format.

         `expiry_year`
         : `string` Expiry year for the card in YY format.

         `cvv`
         : `string` CVV printed on the back of the card.
           
> **INFO**
>
> 
>            **Handy Tips**
> 
>              - CVV is not required by default for tokenised cards across all networks.
>              - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>              - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>              - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>              - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.   
>            

     

     

     `user-agent` _mandatory_
     : `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.

     `ip` _mandatory_
     : `string` The customer's IP address.

     `authentication` _optional_
     : `object` Details of the authentication channel.

         `authentication_channel`
         : `string` The authentication channel for the payment. Possible values:
           - `browser` (default)
           - `app`

     `browser` _mandatory_
     : `object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

         `java_enabled`
         : `boolean` Indicates whether the customer's browser supports Java. Obtained from the `navigator` HTML DOM object. Possible values:
             - `true`: Customer's browser supports Java.
             - `false`: Customer's browser does not support Java.

         `javascript_enabled`
         : `boolean` Indicates whether the customer's browser can execute JavaScript. Obtained from the `navigator` HTML DOM object. Possible values:
             - `true`: Customer's browser can execute JavaScript.
             - `false`: Customer's browser cannot execute JavaScript.

         `timezone_offset`
         : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

         `screen_width`
         : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

         `screen_height`
         : `integer` Obtained from the `navigator` HTML DOM object.

         `color_depth`
         : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

         `language`
         : `string` Obtained from the payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

     `notes` _optional_
     : `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

     `callback_url` _optional_
     : `string` URL endpoint where Razorpay will submit the final payment status.

     `referrer` _optional_
     : `string` Referrer header passed by the client's browser.
        

      
### Response Parameters

     `next`
     : `array` A list of action objects available to continue the payment process. Present when the payment requires further processing.

       `action`
       : `string` Indicates the next step to continue the payment process. Possible values:
           - `otp_generate`: Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
           - `redirect`: Use this URL to redirect the customer to submit the OTP on the bank page.

       `url`
       : `string` URL to be used for the action indicated.

     `razorpay_payment_id`
     : `string` Unique identifier of the payment. Present for all responses.
        

      
### Error Response Parameters

           The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
        

     
    
  

    
  

### 1.3 Handle Payment Success and Error Events

Once the payment is completed by the customer, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

#### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) for details.

### 1.4 Verify Payment Signature
Signature verification is a mandatory step to ensure that the callback is sent by Razorpay. The `razorpay_signature` contained in the callback can be regenerated by your system and verified as follows.

Create a string to be hashed using the `razorpay_payment_id` contained in the callback and the Order ID generated in the first step, separated by a `|`. Hash this string using SHA256 and your API Secret.

```
generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

if (generated_signature == razorpay_signature) {
    payment is successful
}
```

#### Generate Signature on your Server

    
### Sample code

```java: Java
/**
* This class defines common routines for generating
* authentication signatures for Razorpay Webhook requests.
*/
public class Signature
{
    private static final String HMAC_SHA256_ALGORITHM = "HmacSHA256";
    /**
    * Computes RFC 2104-compliant HMAC signature.
    * * @param data
    * The data to be signed.
    * @param key
    * The signing key.
    * @return
    * The Base64-encoded RFC 2104-compliant HMAC signature.
    * @throws
    * java.security.SignatureException when signature generation fails
    */
    public static String calculateRFC2104HMAC(String data, String secret)
    throws java.security.SignatureException
    {
        String result;
        try {

            // get an hmac_sha256 key from the raw secret bytes
            SecretKeySpec signingKey = new SecretKeySpec(secret.getBytes(), HMAC_SHA256_ALGORITHM);

            // get an hmac_sha256 Mac instance and initialize with the signing key
            Mac mac = Mac.getInstance(HMAC_SHA256_ALGORITHM);
            mac.init(signingKey);

            // compute the hmac on input data bytes
            byte[] rawHmac = mac.doFinal(data.getBytes());

            // base64-encode the hmac
            result = DatatypeConverter.printHexBinary(rawHmac).toLowerCase();

        } catch (Exception e) {
            throw new SignatureException("Failed to generate HMAC : " + e.getMessage());
        }
        return result;
    }
}

```php: PHP
use Razorpay\Api\Api;
$api = new Api($key_id, $key_secret);
$attributes  = array('razorpay_signature'  => '23233',  'razorpay_payment_id'  => '332' ,  'razorpay_order_id' => '12122');
$order  = $api->utility->verifyPaymentSignature($attributes)

```ruby: Ruby
require 'razorpay'
Razorpay.setup('key_id', 'key_secret')
payment_response = {
  'razorpay_order_id': '12122',
  'razorpay_payment_id': '332',
  'razorpay_signature': '23233'
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
 Dictionary attributes = new Dictionary();

            attributes.Add("razorpay_payment_id", paymentId);
            attributes.Add("razorpay_order_id", Request.Form["razorpay_order_id"]);
            attributes.Add("razorpay_signature", Request.Form["razorpay_signature"]);

            Utils.verifyPaymentSignature(attributes);
```nodejs: Node.js
var { validatePaymentVerification } = require('./dist/utils/razorpay-utils');

validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);
```Go: Go
import (
	"crypto/hmac"
	"crypto/sha256"
	"crypto/subtle"
	"encoding/hex"
	"fmt"
)

func main()  {
	signature := "477d1cdb3f8122a7b0963704b9bcbf294f65a03841a5f1d7a4f3ed8cd1810f9b"
	secret := "qp3zKxwLZxbMORJgEVWi3Gou"
	data := "order_J2AeF1ZpvfqRGH|pay_J2AfAxNHgqqBiI"
	//fmt.Printf("Secret: %s Data: %s\n", secret, data)
	
	// Create a new HMAC by defining the hash type and the key (as byte array)
	h := hmac.New(sha256.New, []byte(secret))
	
	// Write Data to it
	_, err := h.Write([]byte(data))
	
	if err != nil {
		panic(err)
	}
	
	// Get result and encode as hexadecimal string
	sha := hex.EncodeToString(h.Sum(nil))
	
	fmt.Printf("Result: %s\n", sha)
	
	if subtle.ConstantTimeCompare([]byte(sha), []byte(signature)) == 1 {
		fmt.Println("Works")
	}
}
```
        

### 1.5 Integrate Payments Rainy Day Kit

Use Payments Rainy Day kit to overcome payments exceptions such as:
- [Late Authorisation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md)
- [Payment Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md)
- [Payment Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)

### 1.6 Verify Payment Status

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
        ![](/docs/assets/images/testpayment.jpg)
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
