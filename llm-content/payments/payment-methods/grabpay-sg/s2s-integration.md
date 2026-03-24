---
title: GrabPay (Singapore) - S2S Integration
description: Let your customers make payments using GrabPay on your website or app with S2S Integration.
---

# GrabPay (Singapore) - S2S Integration

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
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Prerequisites

1. [Sign up](https://dashboard.razorpay.com/#/access/signup) for a Razorpay account.
2. Generate API Keys.
   
[Video: https://www.youtube.com/embed/6mJnOWZDhDo]

3. Follow the [Razorpay S2S Integration documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration.md).

## Integrate GrabPay on S2S 

Create an Order and a Payment. And pass `method` and `provider` parameters in the create an order and a payment API.

### Create an Order and a Payment

Create an order along with payment using the consolidated order and payment API. This single API call combines order and payment creation, resulting in a more efficient and faster transaction process.

Create an order along with payment by:

- Making a single API call to Razorpay, combining order and payment creation.
- Authenticating using the provided credentials, ensuring access to the consolidated payment API.
- Manually integrating the API sample codes on your server.

The following API will create an order along with payment with `wallet` as the payment method:

/orders

```curl: Request
curl -X POST https://api.razorpay.com/v1/orders 
-U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
  "amount": 50000,
  "currency": "SGD",
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
    },
    "shipping_address": {
      "line1": "Mantri apartment",
      "line2": "Koramangala",
      "city": "Bengaluru",
      "country": "IND",
      "state": "Karnataka",
      "zipcode": "560032",
      "latitude": null,
      "longitude": null
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
  "shipping_details": {
    "method": "sameday",
    "gift_wrap": false
  },
  "line_items_total": 5000,
  "line_items": [
    {
      "type": "e_commerce",
      "sku": "1gr367",
      "name": "TEST",
      "description": "TEST",
      "quantity": 1,
      "image_url": "http://url",
      "product_url": "http://url",
      "price": 5000,
      "offer_price": 5000,
      "tax_amount": 0,
      "e_commerce": {
        "other_product_codes": {
          "upc": "12r34",
          "ean": "123r4",
          "unspsc": "123s4"
        }
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
    "provider": "grabpay"
  }
}'

```json: Success
{
  "amount": 50000,
  "amount_due": 50000,
  "amount_paid": 0,
  "attempts": 10,
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
        "url": "https://api.razorpay.com/v1/payments/O0NSBQgY0BbC4b/authenticate"
      }
    ],
    "razorpay_payment_id": "pay_O0NSBQgY0BbC4b"
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
     : `string` The currency in which the transaction should be made. View the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). The length must be 3 characters.

      
> **INFO**
>
> 
> 
>       **Handy Tips**
> 
>       Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
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

       `shipping_address` _optional_
       : `Json object` This will have details about the order's shipping address.

         `line1` _optional_
         : `string` Address Line 1 of the address

         `line2` _optional_
         : `string` Address Line 2 of the address

         `city` _optional_
         : `string` city of the address. For example, `Bengaluru`.

         `country` _optional_
         : `string` ISO3 country code of the billing address. For example, `IND`.

         `state` _optional_
         : `string` name of the state. For example, `KA`.

         `zipcode` _optional_
         : `string` Zipcode of the state. For example, `560068`.

         `latitude` _optional_
         : `float` Latitude of the position expressed in decimal degrees (WSG 84), e.g. 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

         `longitude` _optional_
         : `float` Longitude of the position expressed in decimal degrees (WSG 84), e.g. -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

       `billing_address` _mandatory_
        : `Json object` This will have details about the billing address of the customer/user.

         `line1` _optional_
         : `string` Address Line 1 of the address

         `line2` _optional_
         : `string` Address Line 2 of the address

         `city` _optional_
         : `string` city of the address. For example, `Bengaluru`.

         `country` _optional_
         : `string` ISO3 country code of the billing address. For example, `IND`.

         `state` _optional_
         : `string` name of the state. For example, `KA`.

         `zipcode` _optional_
         : `string` Zipcode of the state. For example, `560001`.

         `latitude` _optional_
         : `float` Latitude of the position expressed in decimal degrees (WSG 84), e.g. 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

         `longitude` _optional_
         : `float` Longitude of the position expressed in decimal degrees (WSG 84), e.g. -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

     `shipping_details` _optional_
     : `Json object` This will have the order's shipping details.

       `method` _optional_
       : `enum` Shipping method for the product. Possible values:
         - `lowcost`: Lowest-cost service.
         - `sameday`: Courier or same-day service.
         - `oneday`: Next-day or overnight service.
         - `twoday`: Two-day service.
         - `threeday`: Three-day service.
         - `pickup`: Store pick-up.
         - `other`: Other shipping method.
         - `none`: No shipping method because the product is a service or subscription.

       `gift_wrap` _optional_
       : `boolean`  Indicates whether the customer requested gift wrapping for this purchase. This field can contain one of the following values:
          - `true`: The customer requested gift wrapping.
          - `false`: The customer did not request gift wrapping.

     `line_items_total` _optional_
     : `integer` Total sum of the cart value.

     `line_items` _mandatory_
     : `json object` Details about the specific items added to the cart.

       `type` _mandatory_
       : `string` Defines the category type. Possible values: 
         - `travel`
         - `hotel`
         - `e_commerce`
         - `mutual_fund`

       `sku` _optional_
       : `string` The unique product id defined by the business.

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
       : `integer` Offer price of the product. The offer price can be lower than the price if the business runs a discount on the product.

       `tax_amount` _optional_
       : `integer` Tax amount that needs to be added to the product. In case the **offer_price** is tax-inclusive, keep it blank.

       `e_commerce` _optional_
       : `json object` Details about the type-specific data points. Will vary based on the type selected.

         `other_product_codes` _optional_
         : `object` Array to collect different codes that can identify the item type. Possible values:
        
             `upc`
             : `string` Universal Product Code (UPC; redundantly: UPC code) is a barcode symbology used worldwide to track trade items in stores. UPC consists of 12 numeric digits that are uniquely assigned to each trade item
           
             `ean`
             : `string` European Article Numbers (EAN) is a type of barcode that encodes an article number. Contains 8 (EAN-8) or 13 (EAN-13) numerical digits.
          
             `unspsc`
             : `string` The United Nations Standard Products and Services Code (UNSPSC) is a taxonomy of products and services used in eCommerce. It is a four-level hierarchy coded as an eight-digit number, with an optional fifth level adding two more digits.
     
     `payment_config` _optional_
     : `array` Payment capture settings for the payment. The options sent here override the [account level auto-capture settings](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.

      `capture` _mandatory_
      : `string` Option to automatically capture payment. Possible values:
        - `automatic`: Payments are auto-captured according to the configurations specified in the `capture_options` array.
        - `manual`: You have to manually capture payments using our [Capture API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/capture.md) or from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/dashboard/#manually-capture-payments.md).

      `capture_options` _optional_
      : `array` Use this array to determine the expiry period for automatic and [manual capture](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings/api.md) of payments and the refund speed in the case of non-capture.

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
            - `optimum`: We try to process the refund instantly. We charge a small fee for this. If it is not possible to process an instant refund, we will process a normal refund in 5-7 working days. [Know more about instant refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/#how-instant-refunds-work.md).
            - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/#setting-the-default-speed-of-refunds.md).

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

       `provider` _mandatory_
       : The wallet provider. Here, it should be `grabpay`.
    

  
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
     : `string` The currency in which the transaction should be made. View the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). Length must be of 3 characters.

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

     The error response parameters are available in the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md).
