---
title: 3. Create Subsequent Payments
description: Create and charge subsequent payments using Razorpay APIs after the customer's selected payment method is authorised.
---

# 3. Create Subsequent Payments

Given below are the steps to create and charge your customer subsequent payments:

## 3.1 Create an Order to Charge the Customer 

You have to create a new order every time you want to charge your customers. This order is different from the one created during the authorisation transaction.

The following endpoint creates an order.

/orders

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount":1000,
  "currency":"INR",
  "merchant_id": "D2eavTHExqy97j",
  "customer_id":"cust_N8fv8Nftx5hato",
  "customer_details":{
    "name":"Gaurav Kumar",
    "email":"gaurav.kumar@example.com",
    "contact":"9000090000",
    "shipping_address":{
      "line1":"Mantri apartment",
      "line2":"Koramangala",
      "city":"Bengaluru",
      "country":"IND",
      "state":"Karnataka",
      "zipcode":"560032",
      "latitude":"123123",
      "longitude":"1231231"
    },
    "insights":{
      "order_count":"22",
      "chargeback_count":"4",
      "tier":"gold",
      "booking_channel":"agent",
      "has_account":true,
      "registered_at":1234567890
    }
  },
  "receipt":"Receipt No. 1",
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey... decaf."
  }
}'
```
```json: Success
{
  "amount":1000,
  "amount_due":1000,
  "amount_paid":0,
  "attempts":0,
  "created_at":1707389202,
  "currency":"INR",
  "entity":"order",
  "id":"order_NYMDbygGb1DuDd",
  "method":"card",
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey... decaf."
  },
  "offer_id":null,
  "receipt":"Receipt No. 1",
  "status":"created"
}

```json: Failure
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"The id provided does not exist",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
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
             - `1`: If the user is logged into the account.
             - `0`: If the user is on guest checkout.

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

You can create a payment against the `order_id` after you create an order.
    

  
### Error Response Parameters

Given below is a list of possible errors you may face while creating an Order.

Error | Cause | Solution
---
The api key provided is invalid | This error occurs when you enter the wrong API key or secret. | Make sure to enter the valid API key and secret.
---
The amount must be at least INR 1.00. | This error occurs when you enter an amount less than INR 1. | Make sure the entered amount is atleast INR 1.00.
---
The currency should be INR when method is upi | This error occurs when you enter a currency other than INR | Make sure the currency is INR.
---

    

## 3.2 Create a Recurring Payment 

Once you have generated an `order_id`, use it to create a payment and charge the customer. The following endpoint creates a payment to charge the customer.

/payments/create/recurring

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/recurring \
-H "Content-Type: application/json" \
-d '{
    "amount": 1000,
    "currency": "INR",
    "order_id": "order_NYMptG6ChGaFgj",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "customer_id": "cust_N8fv8Nftx5hato",
    "token": "token_NZveVUfP5fn0fq",
    "recurring": "1",
    "notes": {
        "invoice_number": "IRS1245",
        "goods_description": "Digital Lamp"
    }
}'
```
```json: Success
{
  "razorpay_payment_id" : "pay_1Aa00000000001"
}

```json: Failure
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"Amount exceeds maximum amount allowed",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
   }
}
```

> **INFO**
>
> 
> **UPI Payments**
> 
> - We recommend sending a pre-debit notification to the customer 48 hours before the debit date.
> - For UPI, it may take between 24-36 hours for the subsequent payment to reflect on your Dashboard.
> - This is because of the failure of pre-debit notification and/or any retries that we attempt for the payment.
> - Do not create another subsequent payment until you get the status of the previous one.
> 

> **WARN**
>
> 
> **UPI Payments**
> 
> For UPI, **do not** create subsequent payments on the last day of the cycle. This will cause the payment to fail.
> 

  
### Request Parameters

`amount` _mandatory_
: `integer` The amount associated with the payment in smallest unit of the supported currency. For example, `2000` means ₹20. Must match the amount in [Create an order to charge the customer](#21-create-an-order-to-charge-the-customer).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`order_id` _mandatory_
: `string` The unique identifier of the order created in [Create an order to charge the customer](#21-create-an-order-to-charge-the-customer).

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `9000090000`.

`customer_id` _mandatory_
: `string` Unique identifier of the customer, obtained from the response of Customer API.

`token` _mandatory_
: `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

`recurring` _mandatory_
: `string` Possible values:
  - `1`: Recurring payment is enabled.
  - `preferred`: Use this when you want to support recurring payments and one-time payment in the same flow.

`notes` _mandatory_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

    `invoice_number` _mandatory_
    : `string` Invoice number of the generated invoice. Ensure that each payment has a unique invoice number, with a length of fewer than 40 characters.

    `goods_description` _optional_
    : `string` Description of the goods. For example, `Digital Lamp`.
    

  
### Error Response Parameters

Given below is a list of possible errors you may face while creating a Recurring Payment.

Error | Cause | Solution
---
Amount exceeds maximum amount allowed | This error occurs when you enter an amount greater than the authorized maximum amount. | Make sure the amount is equal to or less than the maximum amount for the particular token.
---
Your payment amount is different from your order amount. To pay successfully, please try using right amount. | This error occurs when you enter a different amount while creating a subsequent payment. | Make sure the order and the subsequent payment amounts are the same.
---
bank_account_invalid | This error occurs when The customer's bank account is either closed or no longer valid. The customer or bank may have closed the account. | The customer should re-register the mandate.
---
bank_account_validation_failed | This error occurs when the bank could not validate the customer registration for debiting the customer. | You can retry after some time or reach out to Razorpay.
---
bank_technical_error | The destination bank was facing technical problems at the time the payment was attempted. This error usually occurs when the Core Banking System encounters a technical error while processing the payment. | You can retry after some time or reach out to Razorpay.
---
debit_instrument_blocked | This error occurs when the bank temporarily blocks withdrawals on the customer's account. | The customer should reach out to their bank to get the account unblocked.
---
debit_instrument_inactive | This error occurs when the bank temporarily blocks withdrawals on the customer's account. | The customer should reach out to their bank to get the account unblocked.
---
gateway_technical_error | The payment failed due to a technical error at the gateway. This error usually occurs when the gateway server encounters a technical error while processing the payment. | You can retry after some time or reach out to Razorpay.
---
input_validation_failed | The payment failed due to the wrong request or input sent in the payment request. You can also get this error while creating a payment with incorrect parameter values on the Dashboard. | Rectify the validation issues and try again. Check the error description and field parameters for more information about the error.
Check your integration/payment request or reach out to Razorpay. Refer to the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
---
insufficient_funds | This error occurs when the customer does not have sufficient funds in the account to complete the payment. | You can retry after asking the customer to add funds to their bank account.
---
invalid_amount | This error occurs when the amount or currency passed in the payment request is not supported or invalid. This can arise when you pass a different variable type in the amount field or pass an unsupported amount value. | You can check your integration and payment request.
---
mandate_not_active | This error occurs when the registered mandate is no longer active. The customer or bank could have cancelled the mandate. | The customer should re-register the mandate.
---
payment_cancelled | This error occurs when the customer has explicitly cancelled the payment. The customer could have given a cancellation instruction to their banks. | You can retry after informing the customer to remove the cancellation request.
---
payment_declined | Destination Bank or Gateway has declined the payment due to business or technical reasons such as terminal and pricing. | You can retry after some time or reach out to Razorpay.
---
payment_failed | This error occurs when the destination Bank or Gateway has declined the payment due to business or technical reasons such as terminal and pricing. | You can retry after some time or reach out to Razorpay.
---
payment_mandate_not_active | This error occurs when the is not yet activated the registered mandate. Banks sometimes take longer to activate the mandates at their end. | You can retry after some time or reach out to Razorpay.
---
payment_timed_out | This error occurs when the bank with the registered mandate could not debit the customer's account in time. | You can retry after some time or reach out to Razorpay.
---
server_error | This error occurs when there is a technical error at Razorpay's server. | You can retry after some time or reach out to Razorpay.
---
transaction_limit_exceeded | This error occurs when customers exceed their account's credit or debit limit during high-value transactions. | You can retry after some time by informing the customer to update their transaction limits.
---
