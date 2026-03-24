---
title: Apple Pay - Custom Integration (Beta)
description: Accept Apple Pay payments from international customers with Razorpay Custom Checkout Integration.
---

# Apple Pay - Custom Integration (Beta)

Apple Pay is a secure, contactless payment method that allows customers to pay using their Apple devices with Face ID/Touch ID authentication. Once integrated, Apple Pay provides customers with a seamless and high-trust checkout experience. Know more about [Apple Pay](https://www.apple.com/apple-pay/).

Apple Pay integration works seamlessly with your existing international card payment flow, add our Apple Pay button to your Razorpay Custom Checkout and include one additional parameter in your payment request.

  
### Advantages

     - Accept payments in over 120 currencies from international customers.
     - Reduce checkout time by up to 75% with one-touch payments.
     - Leverage biometric authentication (Face ID/Touch ID) for enhanced security.
     - Go live quickly with minimal code changes to your existing S2S integration.
     - No need to handle Apple certificates or domain verification - Razorpay manages it all.
    

## Prerequisites

Before you begin the integration, ensure you have:

- [**Existing Razorpay Custom Checkout Integration**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md): Active Custom Checkout integration with Razorpay.
- **International Payments Enabled**: Must be activated on your Razorpay account.
- **HTTPS Protocol**: Your website must be served over HTTPS for security compliance.
- Generate the [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

## Integration Steps

Follow the steps given below to integrate Custom Checkout in your site:

## 1.1 Create an Order in Server

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call. Know how to [authenticate](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) Orders API.
- The order_id received in the response should be passed to the checkout. This ties the Order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

  
### API Sample Code

The following is a sample API request and response for creating an order:

     /orders

     ```curl: Request
     curl -X POST https://api.razorpay.com/v1/orders 
     -U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
     -H 'content-type:application/json'
     -d '{
       "amount": 10000,
       "currency": "",
       "receipt": "receipt#1111",
       "partial_payment": false,
       "customer_details": {
         "name": "",
         "contact": "",
         "email": "",
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
         "key1": "value1",
         "key2": "value2"
       }
     }'
    
     ```json: Response
     {
       "amount": 10000,
       "amount_due": 10000,
       "amount_paid": 0,
       "attempts": 0,
       "created_at": 1737699908,
       "currency": "",
       "entity": "order",
       "id": "order_PnBGZvFBDU81VZ",
       "notes": {
         "key1": "value3",
         "key2": "value2"
       },
       "offer_id": null,
       "receipt": "receipt#11111",
       "status": "created"
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
>       As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KWD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>       

     `currency` _mandatory_
     : `string` The currency in which the transaction should be made. View the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). The length must be 3 characters.

      
> **INFO**
>
> 
> 
>       **Handy Tips**
> 
>       Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
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
       : `string` The customer’s name. For example, `Gaurav Kumar`.

       `contact` _optional_
       : `string` The customer's phone number. A maximum length of 15 characters, including country code. For example, `9876543210`.

       `email` _optional_
       : `string` The customer’s email address. For example, `gaurav.kumar@example.com`.

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

       `shipping_address` _optional_
       : `json object` This will have details about the order's shipping address.

         `line1` _optional_
         : `string` Address Line 1 of the address.

         `line2` _optional_
         : `string` Address Line 2 of the address.

         `city` _optional_
         : `string` city of the address. For example, `Bengaluru`.

         `country` _optional_
         : `string` ISO3 country code of the billing address. For example, `IND`.

         `state` _optional_
         : `string` name of the state. For example, `Bengaluru`.

         `zipcode` _optional_
         : `string` Zipcode of the state. For example, `560001`.

         `latitude` _optional_
         : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

         `longitude` _optional_
         : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

       `billing_address` _optional_
        : `json object` This will have details about the billing address of the customer/user.

         `line1` _optional_
         : `string` Address Line 1 of the address.

         `line2` _optional_
         : `string` Address Line 2 of the address.

         `city` _optional_
         : `string` city of the address. For example, `Bengaluru`.

         `country` _optional_
         : `string` ISO3 country code of the billing address. For example, `IND`.

         `state` _optional_
         : `string` name of the state. For example, `Bengaluru`.

         `zipcode` _optional_
         : `string` Zipcode of the state. For example, `560001`.

         `latitude` _optional_
         : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

         `longitude` _optional_
         : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

     `shipping_details` _optional_
     : `json object` This will have the order's shipping details.

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
       : `string ` The unique product id defined by the business.

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
          - `optimum`: We try to process the refund instantly. We charge a small fee for this. If it is not possible to process an instant refund, we will process a normal refund in 5-7 working days. [Learn more about instant refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/#how-instant-refunds-work.md).
          - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/#setting-the-default-speed-of-refunds.md).

     `refund_allowed` _optional_
     : `string` Denotes if the cart items are refundable or not. Possible values: 
       - `full`
       - `partial`
       - `not_allowed`

     `campaign` _optional_
     : `json object` Details of the campaign. *Can be extended to share UTM parameters.

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
     : `string` The currency in which the transaction should be made. View the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). Length must be of 3 characters.

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

     The error response parameters are available in the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md).
    

## 1.2 Fetch Payment Methods

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

Know more about [the various payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods.md) offered by Razorpay.

## 1.3 Invoke Checkout and Pass Order Id and Other Options to it

### 1.3.1 Include JavaScript code in your Webpage

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

### 1.3.2 Add Apple Pay Button to Your Checkout

Add the Apple Pay button to your checkout page to provide customers with the payment option.

 
### Button Design Guidelines

   
> **WARN**
>
> 
>    **Watch Out!**
> 
>    Use only Razorpay-provided Apple Pay button designs for both web and SDK implementations.
>    

   - Follow official [Apple Pay guidelines](https://developer.apple.com/apple-pay/marketing/) for button usage and placement.
   - Use Apple Pay button designs provided by Razorpay (see design below).
       ![Apple Pay Button design](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/apple-pay-button.jpg.md)
   - Maintain consistent sizing with other payment options.
   - Position prominently in your payment methods section.
  

 
### When to Display the Button

   
     
       1. Integrate [Apple Pay JS API](https://developer.apple.com/documentation/applepayontheweb/apple-pay-js-api).
       2. Perform [Apple Pay capabilities](https://developer.apple.com/documentation/applepayontheweb/applepaysession/applepaycapabilities) check.
       3. Follow the display conditions below:
         - If it returns `paymentCredentialsAvailable`, show button.
         - If it returns `paymentCredentialStatusUnknown`, optionally show button (use this option only if you want customers to go through adding a new card journey, not recommended in the initial 2 months due to increased friction).
     
     
       1. Integrate [PassKit SDK](https://developer.apple.com/documentation/passkit/apple-pay) (internal SDK to iOS above iOS 6, has no size impact).
       2. Perform `canMakePayments(usingNetworks: [Visa, Mastercard])` check.
       3. Follow the display conditions below.
       
       Device Capability Check | Action | Reasoning
       ---
       `PKPaymentAuthorizationController.canMakePayments() = true` | Show | Device supports Apple Pay with specified networks.
       ---
       `PKPaymentAuthorizationController.canMakePayments() = false` | Hide | Device does not support Apple Pay.
       

       
> **WARN**
>
> 
>        **Watch Out!**
>        
>        PassKit SDK is an internal SDK to iOS (available on iOS 6 and above) and has no size impact on your application.
>        

     
   
  

### 1.3.3 Instantiate Custom Checkout

  
    ```js: Invoke a Single Instance
    var razorpay = new Razorpay({
      key: '',
        // logo, displayed in the payment processing popup
      image: 'https://i.imgur.com/n5tjHFD.jpg',
    });
    ```
  
  
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
     : `string` The currency in which the payment should be made by the customer. For example, `INR`. See the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

       
> **INFO**
>
> 
> 
>        **Handy Tips**
> 
>        Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (April 2023).
>        

     

     

     

     

     

     `description` _optional_
     : `string` Description of the product shown in the Checkout form. It must start with an alphanumeric character.

     `image` _optional_
     : `string` Link to an image (usually your business logo) shown in the Checkout form. Can also be a **base64** string, if loading the image from a network is not desirable.

     `order_id` _mandatory_
     : `string` Order ID generated via the [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

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

     

     

     

     `method` _mandatory_
     : `string` Name of the payment method. Possible value is `card`.

       `app` _mandatory_
       : `object` Container object for payment app configuration.

         `name` _mandatory_
         : `string` Name of the app. Here it is `apple_pay`.

     

     `bank_account` _mandatory if method=emandate_
     : The details of the bank account that should be passed in the request. These details include bank account number, IFSC code and the name of the customer associated with the bank account.

         `account_number`
         : `string` Bank account number used to initiate the payment.

         `ifsc`
         : `string` IFSC of the bank used to initiate the payment.

         `name`
         : `string` Name associated with the bank account used to initiate the payment.

     `bank` _mandatory if method=netbanking_
     : `string` Bank code. List of available banks enabled for your account can be fetched via [**methods**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods/#fetch-supported-methods.md).

     

     

     

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
>         UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [ migration documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/custom-integration.md) to switch to UPI Intent.
>         

     

     

     

     `callback_url` _optional_
     : `string` The URL to which the customer must be redirected upon completion of payment. The URL must accept incoming `POST` requests. The callback URL will have `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` as the request parameters for a successful payment.

     `redirect` _conditionally mandatory_
     : `boolean` Determines whether customer should be redirected to the URL mentioned in the
     `callback_url` parameter. This is mandatory if `callback_url` parameter is used. Possible values:
         - `true`: Customer will be redirected to the `callback_url`.
         - `false`: Customer will not be redirected to the `callback_url`

     

     
    

### 1.3.4 Submit Payment Details

After creating an order and obtaining the customer's payment details, send the information to Razorpay to complete the payment. The data that needs to be submitted depends on the customer's payment method. You can do this by invoking `createPayment` method.

```js: createPayment with handler function
var data = {
  amount: 1000,
  currency: "",
  email: '',
  contact: '',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_CuEzONfnOI86Ab',// Replace with Order ID generated in Step 4
  method: 'card',
  // method specific fields
  app: {
    name: "apple_pay"
  }
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
  amount: 1000,
  currency: "",
  email: '',
  contact: '',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_CuEzONfnOI86Ab',// Replace with Order ID generated in Step 4
  method: 'card',
  // method specific fields
  app: {
    name: "apple_pay"
  }
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

## 1.4 Store Fields in Your Server

@include integration-steps/store-fields

@include integration-steps/payment-failure

## 1.5 Verify Payment Signature

@include integration-steps/verify-signature

## 1.6 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/test-integration.md)
