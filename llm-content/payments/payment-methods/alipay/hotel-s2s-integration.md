---
title: Alipay - Hotel S2S Integration
description: Let your customers make payments using Alipay on your website or app with S2S Integration.
---

# Alipay - Hotel S2S Integration

Secure Server-to-Server (S2S) integration that enables seamless and reliable processing and a smooth payment experience for your customers.

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

## Prerequisites

1. [Sign up](https://dashboard.razorpay.com/#/access/signup) for a Razorpay account.
2. Generate API Keys.
   
[Video: https://www.youtube.com/embed/6mJnOWZDhDo]

3. Follow the [Razorpay S2S Integration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration.md).

## Integrate Alipay on S2S 

Create an Order and a Payment. And pass `method` and `wallet` parameters in the create an order and a payment API.
### Create an Order and a Payment

Create an order along with payment using the consolidated order and payment API. This single API call combines order and payment creation, resulting in a more efficient and faster transaction process.

Create an order along with payment by:

- Making a single API call to Razorpay, combining order and payment creation.
- Authenticating using the provided credentials, ensuring access to the consolidated payment API.
- Manually integrating the API sample codes on your server.

The following API will create an order along with payment with `wallet` as the payment method:

#### API Sample Code

The following is a sample API request and response for creating an order and payment:

/orders

```curl: Request
curl -X POST https://api.razorpay.com/v1/orders 
-U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1111",
  "partial_payment": true,
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
        "checkin_date": "2030-07-16",
        "checkout_date": "2030-07-16",
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
    "contact": "9000090000",
    "email": "gaurav.kumar@example.com",
    "method": "wallet",
    "wallet": "alipay"
  }
}'

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

     `customer_details` _mandatory_
     : `json object` Details about the customer/user.

       `name` _mandatory_
       : `string` The customer’s name. For example, `Gaurav Kumar`.

       `contact` _mandatory_
       : `string` The customer's phone number. A maximum length of 15 characters, including country code. For example, `+919000090000`.

       `email` _mandatory_
       : `string` The customer’s email address. For example, `gaurav.kumar@example.com`.

       `insights ` _optional_
       : `json object` Additional details of the customer, including past transaction data.

         `order_count ` _optional_
         : `integer` Total orders placed by the account so far on the business platform. For example, 22.

         `chargeback_count ` _optional_
         : `integer` Total chargeback received for the customer account on the business platform. For example, 4.

         `tier` _optional_
         : `string` Your company's passenger classification, such as with a frequent flyer program. In this case, you might use values such as:
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

          `sku` _mandatory_
          : `string` unique product id defined by the business.

          `name` _mandatory_
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

          `hotel` _mandatory_
          : `json object` Details about the type-specific data points. Will vary based on the type selected. 
          
             `sub_type` _mandatory_
             : `enum` The sub-type of the line item. Possible values:
               - `stay`
               - `breakfast`
               - `dinner`
               - `lunch`
               - `early_checkin`
               - `late_chechout`
               - `others`

             `checkin_date` _optional_
             : `string` Represents an ISO 8601-encoded date string. For example, September 7, 2019 is represented as "2019-09-07".

             `checkout_date` _optional_
             : `string` Represents an ISO 8601-encoded date string. For example, September 7, 2019 is represented as "2019-09-07".

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
                 : `float` Latitude of the position expressed in decimal degrees (WSG 84), e.g. 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

                 `longitude` _optional_
                 : `float` Longitude of the position expressed in decimal degrees (WSG 84), e.g. -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

             `travellers` _mandatory_
             : `json object` Details associated with passengers/travellers/beneficiaries.

                 `name` _mandatory_
                 : `string` Name of the passenger/traveler/beneficiary.

                 `email` _optional_
                 : `string` Email address of the passenger/traveler/beneficiary.

                 `contact` _optional_
                 : `json object` Details associated with passengers/travelers/beneficiaries.

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
                 : `json object` Identity details of the passenger/beneficiary.

                   `unique_national_id` _optional_
                   : `string` National identification number. For example, Adhaar number for India.

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
     : `json object` Details of the campaign. Can be extended to share UTM parameters.

        `external_campaign_id` _optional_
        : `string` Unique identifier of the campaign. For example, PQR12453.
        
        `name` _optional_
        : `string` Name of the campaign.

        `description` _optional_
        : `string` A human-readable description of the campaign.

        `channel` _optional_
        : `string` The marketing channel used.

        `source` _optional_
        : `string` The referrer of the marketing event. Possible values: google, newsletter.

        `medium` _optional_
        : `string` The medium that the campaign is using. Example values: cpc, banner and so on.

     `notes` _optional_
     : `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

     `payment` _mandatory_
     : `json object` Details about the payment.

       `contact` _mandatory_
       : `string` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

       `email` _mandatory_
       : `string` Email address of the customer. The maximum length supported is 40 characters.

       `method` _mandatory_
       : `string` The method used to make the payment. Here, it should be `wallet`.

       `wallet` _mandatory_
       : `string` The wallet provider. Here, it should be `alipay`.
    

  
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

     `currency`
     : `string` The currency in which the transaction should be made. View the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length should be of 3 characters.

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
         - `redirect`: Use this URL to redirect the customer to submit the OTP on the provider page.

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
