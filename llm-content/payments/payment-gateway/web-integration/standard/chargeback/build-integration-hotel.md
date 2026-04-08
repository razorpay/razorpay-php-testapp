---
title: 1. Hotel Build Integration
description: Steps to integrate the Standard Checkout form on your website.
---

# 1. Hotel Build Integration

Follow these steps to integrate the standard checkout form on your website:

**1.1** [Generate API Keys](#11-generate-api-keys). 

**1.2** [Create an order in server](#12-create-an-order-in-server). 

**1.3** [Integrate with checkout on client-side](#13-integrate-with-checkout-on-client-side). 

**1.4** [Handle payment success and failure](#14-handle-payment-success-and-failure). 

**1.5** [Store fields in server](#15-store-fields-in-your-server). 

**1.6** [Verify payment signature](#16-verify-payment-signature). 

**1.7** [Verify payment status](#17-verify-payment-status).

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
         : `integer` UNIX timestamp when the customer account was created with the merchant. For example, `1234567890`.

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
             : `string` Brand name of the property. For example, `Marriott Group`.

             `address` _optional_
             : `json object` Details of the property address.

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

             `travellers` _optional_
             : `JSON object` Details associated with passengers/travellers/beneficiaries.

                 `name` _optional_
                 : `string` Name of the passenger/traveler/beneficiary.

                 `email` _optional_
                 : `string` Email address of the passenger/traveler/beneficiary.

                 `contact` _optional_
                 : `JSON object` Details associated with passengers/travelers/beneficiaries.

                 `age` _optional_
                 : `integer` UNIX timestamp of the date of birth of the individual. For example, `1234567890`.

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
    "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": "Gaurav Kumar", //your customer's name
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000" //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Razorpay Corporate Office"
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
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
        "name": "Gaurav Kumar", //your customer's name
        "email": "gaurav.kumar@example.com", 
        "contact": "9000090000"  //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Razorpay Corporate Office"
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

  
### Checkout Parameters

     `key` _mandatory_
     : `string` API Key ID generated from the Dashboard.

     `amount` _mandatory_
     : `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>        

     `currency` _mandatory_
     : `string` The currency in which the payment should be made by the customer. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

       
> **INFO**
>
> 
> 
>        **Handy Tips**
> 
>        Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>        

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
>        **Boost Conversions and Minimise Drop-offs**
> 
>        - Autofill customer contact details, especially phone number to ease form completion. Include customer’s phone number in the `contact` parameter of the JSON request's `prefill` object. Format: +(country code)(phone number). Example: "contact": "+919000090000".   
>        - This is not applicable if you do not collect customer contact details on your website before checkout, have Shopify stores or use any of the no-code apps.
> 
>        

       `name` _optional_
       : `string` Cardholder's name to be prefilled if customer is to make card payments on Checkout. For example, **Gaurav Kumar**.

       `email` _optional_
       : `string` Email address of the customer.

       `contact` _optional_
       : `string` Phone number of the customer. The expected format of the phone number is `+ {country code}{phone number}`. If the country code is not specified, `91` will be used as the default value. This is particularly important while prefilling `contact` of customers with phone numbers issued outside India. **Examples**:
           - +14155552671 (a valid non-Indian number)
           - +919977665544 (a valid Indian number). 
If 9977665544 is entered, `+91` is added to it as +919977665544.

       `method` _optional_
       : `string` Pre-selection of the payment method for the customer. Will only work if `contact` and `email` are also prefilled. Possible values:
           
           - `card`

           - `netbanking`

           - `wallet`

           - `upi`

           - `emi`

           

     `notes` _optional_
     : `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

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
       : `function` Used to track the status of Checkout. You can pass a modal object with `ondismiss: function()\{\}` as options. This function is called when the modal is closed by the user. If `retry` is `false`, the `ondismiss` function is triggered when checkout closes, even after a failure.

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
       - [Local saved cards feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md#manage-saved-cards).
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
>          **Watch Out!**
>          
>          Some browsers may pause `JavaScript` timers when the user switches tabs, especially in power saver mode. This can cause the checkout session to stay active beyond the set timeout duration.
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
     : `boolean` Used to auto-read OTP for cards and netbanking pages. Applicable from Android SDK version 1.5.9 and above. Possible values:
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
           - `true` (default): Enables customers to retry payments.
           - `false`: Disables customers from retrying the payment.
       
       `max_count`
       : `integer` The number of times the customer can retry the payment. We recommend you to set this to 4. Having a larger number here can cause loops to occur.
           
> **WARN**
>
> 
>            **Watch Out!**
> 
>            Web Integration does not support the `max_count` parameter. It is applicable only in Android and iOS SDKs.
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
    

        

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/chargeback/test-integration.md)
