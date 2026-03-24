---
title: Create Recurring Card Payments with Partner Auth
description: Steps to integrate Recurring Card Payments with Partner Auth using Razorpay APIs.
---

# Create Recurring Card Payments with Partner Auth

Use Razorpay [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments.md) APIs to seamlessly schedule and manage recurring card payments for your customers, with full control over payment intervals and frequency.

### Token Sharing for Partnership Auth Model

Token sharing eliminates the need for customers to re-enter card details when making purchases across different businesses under the same legal entity, creating a seamless payment experience. This feature allows tokens created under any merchant ID (MID) to be automatically shared across all MIDs within the same entity, significantly improving customer convenience and reducing checkout friction. Know more about [token sharing for partnership auth model](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/partner-auth/token-sharing.md#token-sharing-in-partnership-model).

## Integration Steps

Given below are the integration steps.

> **INFO**
>
> 
> **Handy Tips**
> 
> To use Partner Auth in APIs, you must:
> - Add the basic auth with partner credentials (client_id and client_secret).
> - Add the `account_id` of the sub-merchant using X-Razorpay-Account in the header. For example, `-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"`
> 

### 1. Create a Customer
Razorpay links recurring tokens to customers via a unique identifier. You can generate this identifier using the Customer API.

You can create customers with basic information such as email and contact and use them for various Razorpay offerings. The following endpoint creates a customer.

/customers

```curl: Request
curl -X POST https://api.razorpay.com/v1/customers \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9876543210",
  "fail_existing": "0",
  "notes":{
    "note_key_1": "November Rains.",
    "note_key_2": "Snow on the beach."
  }
}'
```json: Response
{
  "id": "cust_KhOZydVZbcThjW",
  "entity": "customer",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9876543210",
  "gstin": null,
  "notes": {
    "note_key_1": "November Rains.",
    "note_key_2": "Snow on the beach."
  },
  "created_at": 1668751317
}
```

  
### Request Parameters

`name` _mandatory_
: `string` The name of the customer. For example, `Gaurav Kumar`.

`email` _mandatory_
: `string` The email id of the customer. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The phone number of the customer. For example, `9876543210`.

`fail_existing` _optional_
: `string` The request throws an exception by default if a customer with the exact details already exists. You can pass an additional parameter `fail_existing` to get the existing customer's details in the response. Possible values:
     - `1` (default): If a customer with the same details already exists, throws an error.
     - `0`: If a customer with the same details already exists, fetches details of the existing customer.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, "note_key_1": November Rains".
    

  
### Response Parameters

`id`
: `string` The unique identifier of the customer. For example, `cust_1Aa00000000001`.

`entity`
: `string` The name of the entity. Here, it is `customer`.

`name`
: `string` The name of the customer. For example, `Gaurav Kumar`.

`email`
: `string` The email id of the customer. For example, `gaurav.kumar@example.com`.

`contact`
: `string` The phone number of the customer. For example, `9876543210`.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, For example, "note_key_1": November Rains".

`created_at`
: `integer` A Unix timestamp, at which the customer was created.
    

### 2. Create a Registration Payment

You can create the registration payment using:
- Consolidated Orders and Payments API
- Individual [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/authorization-transaction.md#112-create-an-order) and [Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/authorization-transaction.md#113-create-an-authorization-payment) APIs

Given below is the sample code for the **Consolidated Orders and Payments API**.

/orders

```curl: Request
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET] \
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "customer_id": "cust_KhOZydVZbcThjW",
  "notes": {
    "key1": "notes debugging 1",
    "key2": "notes debugging 2"
  },
  "token": {
    "max_amount": 200,
    "expire_at": 2709971120,
    "frequency": "monthly"
  },
  "payment": {
    "amount": 100,
    "email": "gaurav.kumar@example.com",
    "contact": "9876543210",
    "method": "card",
    "notes": {
      "key1": "paymentvalue3",
      "key2": "paymentvalue2"
    },
    "customer_id": "cust_KhOZydVZbcThjW",
    "recurring": 1,
    "card": {
      "name": "Gaurav Kumar",
      "number": "4718609108204366",
      "cvv": "092",
      "expiry_month": "11",
      "expiry_year": "30"
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
    "ip": "105.107.107.100",
    "referer": "https://merchansite.com/example/paybill"
  }
}'
```json: Response
{
  "amount": 100,
  "amount_due": 100,
  "amount_paid": 0,
  "attempts": 1,
  "created_at": 1753362819,
  "currency": "INR",
  "entity": "order",
  "id": "order_Qwuuv0jAsYfLuR",
  "method": null,
  "notes": {
    "key1": "notes debugging 1",
    "key2": "notes debugging 2"
  },
  "offer_id": null,
  "payment_workflow": {
    "next": [
      {
        "action": "redirect",
        "url": "https://api.razorpay.com/pg_router/v1/payments/QwuuwwlU9Ggkwp/authenticate"
      },
      {
        "action": "otp_generate",
        "url": "https://api.razorpay.com/pg_router/v1/payments/pay_QwuuwwlU9Ggkwp/otp_generate?key_id=rzp_live_partner_XXXXXXXXXXXXXX-acc_HoWj8Mya219s8Z"
      }
    ],
    "razorpay_payment_id": "pay_QwuuwwlU9Ggkwp"
  },
  "receipt": null,
  "status": "attempted",
  "token": {
    "expire_at": 2709971120,
    "frequency": null,
    "max_amount": 200
  }
}
```

  
### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the amount should be `100` (₹1).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. We support INR only.

`customer_id` _mandatory_
: `string` The unique identifier of the customer to be charged. For example, cust_D0cs04OIpPPU1F.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each.

`token` _mandatory_
: `json object` Details related to the authorisation such as max amount and bank account information.

    `max_amount` _optional_
    : `integer` The maximum amount in paise a customer can be charged in a transaction. The value can range from 500 to 100000000. The default value is 9999900 (₹99,999).

    `expire_at` _optional_
    : `integer` The Unix timestamp to indicate till when you can use the token (authorisation on the payment method) to charge the customer upcoming payments.

    `frequency` _mandatory_
    : `string` The frequency at which you can charge your customer. Currently supported frequencies are `as_presented` and `monthly`. The support for other frequencies is expected to be live soon.

`payment` _mandatory_
: `json object` Details related to the payment.

    `amount` _mandatory_
    : `integer` Payment amount in the smallest currency unit. For example, paise for INR.

    `email` _mandatory_
    : `string` Customer's email address for payment notifications and receipts.
    
    `contact` _mandatory_
    : `string` Customer's phone number.
    
    `method` _mandatory_
    : `string` Payment method used for the payment. Here, it is `card`.
    
    `notes` _optional_
    : `json object` Key-value pairs for storing custom metadata related to the payment.

    `customer_id` _optional_
    : `string` Unique identifier of the customer.

    `recurring` _optional_
    : `integer` Indicates whether the payment is of recurring nature. Possible values are:
        - `1`: Recurring payment.
        - `0`: One-time payment.

  `card` _conditional_
  : `json object` Card details object (required when method is card).

    `name` _mandatory_
    : `string` Cardholder's name as printed on the card.

    `number` _mandatory_
    : `string` The card number.

    `cvv` _mandatory_
    : `string` 3-digit number printed at the back of the card.
    
    `expiry_month` _mandatory_
    : `string` Card expiry month in `MM` format.
    
    `expiry_year` _mandatory_
    : `string` Card expiry year in `YY` format.

`authentication` _optional_
: `json object` Authentication parameters for enhanced security.

    `authentication_channel` _optional_
    : `string` Channel used for authentication. Possible values are `browser` and `app`.

`browser` _mandatory_
: `json object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

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

`ip` _mandatory_
: `string` Client's browser IP address. For example, **117.217.74.98**.

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser. For example, **https://example.com/**.
    

  
### Response Parameters

`id`
: `string` A unique identifier of the order created. For example order_1Aa00000000001.

`entity`
: `string` The entity that has been created. Here it is order.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order. For example, `1`.

`amount`
: `integer` Amount in currency subunits. For cards, the amount should be 100 (₹1).

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to be paid.

`currency`
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`receipt`
: `string` A user-entered unique identifier of the order. For example, rcptid #1. You should map this parameter to the `order_id` sent by Razorpay.

`status`
: `string` The status of the order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` The Unix timestamp at which the order was created.

`method`
: `string` The authorisation method. Here, it is `card`.

`customer_id`
: `string` The unique identifier of the customer. For example, cust_4xbQrmEoA5WJ01.

`offer_id` 
: `string` Unique identifier of the offer.

`payment_workflow`
: `json object` Details of the payment workflow.
    
    `razorpay_payment_id`
    : `string` Unique identifier of the payment. Present for all responses.

      `next`
      : `array` A list of action objects available to continue the payment process. Present when the payment requires further processing.

      `action`
      : `string` An indication of the next step available for payment processing. Possible values:
        - `otp_generate`: Use this URL to allow the customer to generate the OTP.
        - `redirect`: Use this URL to redirect the customer to payment page to complete the payment.
      
      `url`
      : `string` URL to be used for the action indicated.
    

### 3. Fetch Recurring token

You can fetch the recurring token using the Fetch Payments API or by subscribing to the `payment.authorized` and `token.confirmed` webhook events. Use this recurring token to initiate subsequent debits.

#### Fetch Payments API
Use this endpoint to fetch the payment details with the `payment_id` generated in the response of the previous step.

/v1/payments/:id

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/payments/pay_QwuuwwlU9Ggkwp
```json: Response
{
 "id": "pay_QwuuwwlU9Ggkwp",
 "entity": "payment",
 "amount": 100,
 "currency": "INR",
 "status": "captured",
 "order_id": "order_Qwuuv0jAsYfLuR",
 "invoice_id": null,
 "international": false,
 "method": "card",
 "amount_refunded": 0,
 "refund_status": null,
 "captured": true,
 "description": "Payment for Adidas shoes",
 "card_id": "card_KOdY30ajbuyOYN",
 "bank": null,
 "wallet": null,
 "vpa": null,
 "email": "gaurav.kumar@example.com",
 "contact": "9876543210",
 "customer_id": "cust_KhOZydVZbcThjW",
 "token_id": "token_KOdY$DBYQOv08n",
 "notes": [],
 "fee": 1,
 "tax": 0,
 "error_code": null,
 "error_description": null,
 "error_source": null,
 "error_step": null,
 "error_reason": null,
 "acquirer_data": {
     "auth_code": "064381",
     "arn": "74119663031031075351326",
     "rrn": "303107535132"
 },
 "created_at": 1605871409
}
```

#### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the payment to be retrieved.

    
### Response Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity.

`amount`
: `integer` The payment amount in currency subunits. For example, for an amount of ₹1.00 enter 100.

`currency`
: `string` The currency in which the payment is made.

`status`
: `string` The status of the payment. Possible values:
     - `created`
     - `authorized`
     - `captured`
     - `refunded`
     - `failed`

`method`
: `string` The payment method used for making the payment. Here, it is `card`.

`order_id`
: `string` Order id, if provided.

`description`
: `string` Description of the payment, if any.

`international`
: `boolean` Indicates whether the payment is done via an international card or a domestic one. Possible values:
 - `true`: Payment made using international card.
 - `false`: Payment not made using international card.

`refund_status`
: `string` The refund status of the payment. Possible values:
 - `null`
 - `partial`
 - `full`

`amount_refunded`
: `integer` The amount refunded in currency subunits. For example, if amount_refunded = 100, it is equal to ₹1.00.

`captured`
: `boolean` Indicates if the payment is captured. Possible values:
 - `true`: Payment has been captured.
 - `false`: Payment has not been captured.

`email`
: `string` Customer email address used for the payment.

`contact`
: `string` Customer contact number used for the payment.

`fee`
: `integer` Fee (including GST) charged by Razorpay.

`tax`
: `integer` GST charged for the payment.

`error_code`
: `string` Error that occurred during payment. For example, `BAD_REQUEST_ERROR`.

`error_description`
: `string` Description of the error which occurred during payment. For example, `Payment processing failed because of incorrect OTP`.

`error_source`
: `string` The point of failure. For example, `customer`.

`error_step`
: `string` The stage where the transaction failure occurred. The stages can vary depending on the payment method used to complete the transaction. For example, `payment_authentication`.

`error_reason`
: `string` The exact error reason. For example, `incorrect_otp`.

`notes`
: `json object` Contains user-defined fields, stored for reference purposes.

`created_at`
: `integer` Timestamp, in UNIX format, at which the payment was created.

`card_id`
: `string` The unique identifier of the card used by the customer to make the payment.

`customer_id`
: `string` Unique identifier of the customer created in step 1.

`token_id`
: `string` Unique identifier of the token.

`bank`
: `string` The 4-character bank code which the customer's account is associated with. For example, UTIB for Axis Bank.

`vpa`
: `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

`wallet`
: `string` The name of the wallet used by the customer to make the payment. For example, `payzapp`.

`acquirer_data`
: `json object` A dynamic array consisting of a unique reference numbers.

   `rrn`
   : `string` A unique bank reference number provided by the banking partner when a refund is processed. This reference number can be used by the customer to track the status of the refund with the bank.

   `auth_code`
   : `string` Authorisation code from the issuing bank indicating transaction approval or decline status. Used to verify that the transaction was authorised by the bank.

   `arn`
   : `string` A unique reference number provided by the banking partner.
        

#### Subscribe to payment.authorized Webhook Event 

The `token_id` is also present in the `payment.authorized` webhook event payload.

```json: payment.authorized payload
{
  "entity": "event",
  "account_id": "acc_Mry13iaFNn27XW",
  "event": "payment.authorized",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_QwuuwwlU9Ggkwp",
        "entity": "payment",
        "amount": 100,
        "currency": "INR",
        "status": "authorized",
        "order_id": "order_QloPPTNjf8WjPQ",
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": false,
        "description": "CallHippo",
        "card_id": "card_QloPRIDXIi8dNw",
        "card": {
          "id": "card_QloPRIDXIi8dNw",
          "entity": "card",
          "name": "Gaurav Kumar",
          "iin": "471860",
          "last4": "4366",
          "network": "Visa",
          "type": "credit",
          "issuer": "SBIN",
          "international": false,
          "emi": false,
          "sub_type": "consumer"
        },
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "CONTACT_MASKED",
        "customer_id": "cust_Qj2d4VFyopkOSI",
        "token_id": "token_KOdY$DBYQOv08n",
        "notes": [],
        "fee": 0,
        "tax": 0,
        "error_code": "",
        "error_description": "",
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "auth_code": "071340",
          "rrn": "517717392745"
        },
        "created_at": 1750938160
      }
    }
  },
  "created_at": 1750938245
}
```

#### Subscribe to token.confirmed Webhook Event 

Check the token activation status from the `token.confirmed` webhook event payload.

```json: token.confirmed payload
{
  "payload": {
    "entity": "event",
    "account_id": "acc_4bnk7yysqr5Wx5",
    "event": "token.confirmed",
    "contains": [
      "token"
    ],
    "payload": {
      "token": {
        "entity": {
          "id": "token_Qno09XPByBrRUI",
          "entity": "token",
          "token": "B50RIktG4yQUIz",
          "bank": null,
          "wallet": null,
          "method": "card",
          "card": {
            "entity": "card",
            "name": "",
            "iin": "999999",
            "last4": "2002",
            "network": "Visa",
            "type": "credit",
            "issuer": "ICIC",
            "international": false,
            "emi": true,
            "sub_type": "consumer",
            "token_iin": "482028343",
            "expiry_month": "01",
            "expiry_year": "2099",
            "flows": {
              "otp": true,
              "recurring": true
            },
            "cobranding_partner": null
          },
          "recurring": true,
          "recurring_details": {
            "status": "confirmed",
            "failure_reason": null
          },
          "auth_type": null,
          "mrn": null,
          "used_at": 1751373404,
          "created_at": 1751373404,
          "expired_at": 1896114599,
          "status": "active",
          "notes": [],
          "error_description": null,
          "source": "business",
          "entity_id": null,
          "dcc_enabled": false,
          "max_amount": 87500,
          "error_code": null,
          "compliant_with_tokenisation_guidelines": true
        }
      }
    },
    "created_at": 1751373407
  }
}
```

### 4. Retrieve Saved Card Token by Subscribing to Webhooks

Subscribe to the `token.service_provider_token.activated` webhook event to automatically retrieve saved card tokens. These tokens streamline the card addition process across sub-merchant accounts and reduce user friction. When triggered, this webhook notifies the parent account, which can then cascade the information to all associated child accounts.

- Partner has to retrieve the card network information to assess if it is a Visa, Mastercard or Rupay card.
- If the card is of Visa or Mastercard network, then partner can enable the composite API using the saved card token id received in this webhook,
- If the network is Rupay, the partner should follow the normal Composite Order API flow shared above in Step 2 as Rupay does not support mandate registration using saved card token.

```json: token.service_provider_token.activated
{
  "entity": "event",
  "account_id": "acc_4bnk7yysqr5Wx5",
  "event": "token.service_provider_token.activated",
  "contains": [
    "service_provider_token",
    "token"
  ],
  "payload": {
    "service_provider_token": {
      "entity": {
        "id": "spt_1234abcd",
        "entity": "service_provider_token",
        "provider_type": "network",
        "provider_name": "Visa",
        "interoperable": true,
        "status": "active",
        "provider_data": {
          "token_reference_number": "sas7wqaoidasdfssdjjk",
          "card_reference_number": "8324ssdas7wqaoidassdjjk",
          "token_iin": "453335",
          "token_expiry_month": 12,
          "token_expiry_year": 2028
        }
      },
      "token": {
        "entity": {
          "id": "token_4lsdksD31GaZ09",
          "entity": "token",
          "customer_id": "cust_1Aa00000000001",
          "method": "card",
          "card": {
            "last4": "3335",
            "network": "Visa",
            "type": "debit",
            "issuer": "HDFC",
            "international": false,
            "emi": true,
            "sub_type": "consumer",
            "token_iin": "453335"
          },
          "compliant_with_tokenisation_guidelines": true,
          "service_provider_tokens": [
            {
              "id": "spt_1234abcd",
              "entity": "service_provider_token",
              "provider_type": "network",
              "provider_name": "Visa",
              "interoperable": true,
              "status": "active",
              "provider_data": {
                "token_reference_number": "sas7wqaoidasdfssdjjk",
                "card_reference_number": "8324ssdas7wqaoidassdjjk",
                "token_iin": "453335",
                "token_expiry_month": 12,
                "token_expiry_year": 2028
              }
            },
            {
              "id": "spt_1234abcd",
              "entity": "service_provider_token",
              "provider_type": "aggregator",
              "provider_name": "razorpay",
              "interoperable": false,
              "status": "activated",
              "provider_data": {
                "expired_at": 1748716199
              }
            }
          ],
          "expired_at": 1748716199,
          "status": "active",
          "notes": []
        }
      }
    }
  }
}
```

### 5. Create a Registration Payment using Saved Card Token with Composite Order  API 

Use the Composite Order API to create a registration payment using saved card token.

> **WARN**
>
> 
> **Watch Out!**
> 
> Rupay does not support registration payment using a saved card token.
> 
> 

/orders

```curl: Request
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET] \
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d'{
  "amount": 100,
  "currency": "INR",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  },
  "payment": {
    "amount": 100,
    "email": "gaurav.kumar@example.com",
    "contact": "9876543210",
    "method": "card",
    "notes": {
      "key1": "value3",
      "key2": "value2"
    },
    "customer_id": "cust_P6BCqqddZzNkJa",
    "recurring": 1,
    "token": "token_QqsJMAhHRmIPio",
    "save": 1,
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
    "referer": "https://merchansite.com/example/paybill"
  }
}'
```

```json: Success Response
{
  "amount": 100,
  "amount_due": 100,
  "amount_paid": 0,
  "attempts": 1,
  "created_at": 1752043784,
  "currency": "INR",
  "entity": "order",
  "id": "order_QqsMZ12p7MytBA",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  },
  "offer_id": null,
  "payment_workflow": {
    "next": [
      {
        "action": "redirect",
        "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/authorize"
      },
      {
        "action": "otp_generate",
        "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
      }
    ],
    "razorpay_payment_id": "pay_QqsMa9GhrUxvtx"
  },
  "receipt": null,
  "status": "attempted"
}
```json: Failure Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Mandate registrations through tokenised card is not allowed for Rupay. Please register using the full card number.",
    "source": "internal",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {}
  }
}
```

  
### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the amount should be `100` (₹1).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. We support INR only.

`notes` _optional_
: `json object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`payment` _mandatory_
: `json object` Details related to the payment.

    `amount` _mandatory_
    : `integer` Payment amount in the smallest currency unit. For example, paise for INR.

    `email` _mandatory_
    : `string` Customer's email address for payment notifications and receipts.
    
    `contact` _mandatory_
    : `string` Customer's phone number.
    
    `method` _mandatory_
    : `string` Payment method used for the payment. Here, it is `card`.
    
    `notes` _optional_
    : `json object` Key-value pairs for storing custom metadata related to the payment.

    `customer_id` _optional_
    : `string` Unique identifier of the customer.

    `recurring` _optional_
    : `integer` Indicates whether the payment is of recurring nature. Possible values are:
        - `1`: Recurring payment.
        - `0`: One-time payment.
    
    `token_id` _mandatory_
    : `string` Unique identifier of the token.

    `save` _mandatory_
    : `integer` Determines whether to save the card details. Possible values:
            - `1`: Save the card details.
            - `0`: Do not save the card details.

`authentication` _optional_
: `json object` Authentication parameters for enhanced security.

    `authentication_channel` _optional_
    : `string` Channel used for authentication. Possible values: browser, mobile_app, api.

`browser` _mandatory_
: `json object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

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

`ip` _mandatory_
: `string` Client's browser IP address. For example, **117.217.74.98**.

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser. For example, **https://example.com/**.
    

  
### Response Parameters

`id`
: `string` A unique identifier of the order created. For example order_1Aa00000000001.

`entity`
: `string` The entity that has been created. Here it is order.

`amount`
: `integer` Amount in currency subunits. For cards, the amount should be 100 (₹1).

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to be paid.

`currency`
: `string` The 3-letter ISO currency code for the payment. We support INR only.

`receipt`
: `string` A user-entered unique identifier of the order. For example, rcptid #1. You must map this parameter to the order_id sent by Razorpay.

`status`
: `string` The status of the order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` The Unix timestamp at which the order was created.

`method`
: `string` The authorisation method. Here, it is `card`.

`customer_id`
: `string` The unique identifier of the customer. For example, cust_4xbQrmEoA5WJ01.

`payment_workflow`
: `json object` Details of the payment workflow.
    
    `razorpay_payment_id`
    : `string` Unique identifier of the payment. Present for all responses.

      `next`
      : `array` A list of action objects available to continue the payment process. Present when the payment requires further processing.

      `action`
      : `string` An indication of the next step available for payment processing. Possible values:
        - `otp_generate`: Use this URL to allow the customer to generate the OTP.
        - `redirect`: Use this URL to redirect the customer to payment page to complete the payment.
      
      `url`
      : `string` URL to be used for the action indicated.
    

    
### Error Response Parameters

`error`
: `json object` The error object.

    `code`
    : `string` The type of error. Here, it is `BAD_REQUEST_ERROR`.

    `description`
    : `string` Descriptive text about the error.
    
    `source`
    : `string` The point of failure in the specific operation (payment in this case).

    `step`
    : `string` The stage where the transaction failure occurred.

    `reason`
    : `string` The exact error reason.  

    `metadata`
    : `json object` Contains additional information about the request.
        

**Submit OTP/Complete Redirection Flow for Successful Payment** 

Ensure the payment is completed successfully via OTP submission or redirection to the bank's OTP page. Razorpay supports both Native OTP (via Composite API response) and Non-Native OTP (bank's OTP page).

### 6. Create a Subsequent Payment

To create subsequent payments, you need to 
1. Create an Order using Orders API.
2. Create a Payment using Recurring Payments API.

#### 6.1 Create an Order

Create an Order using the Orders API. Pass the `customer_id` in the request body along with the other parameters.

/orders

```curl: Request
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET] \
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  },
  "customer_id": "cust_QqZY02dRJtOUEi"
}'
```json: Response
{
  "amount": 100,
  "amount_due": 100,
  "amount_paid": 0,
  "attempts": 0,
  "created_at": 1752237170,
  "currency": "INR",
  "entity": "order",
  "id": "order_QrlHEejkEUxseS",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  },
  "offer_id": null,
  "receipt": null,
  "status": "created"
}
```

    
### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. 

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment.

`receipt`
: `string` Receipt number that corresponds to this order, set for your internal reference. Can have a maximum length of 40 characters and has to be unique.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.

`customer_id` _mandatory_
: `string` Unique identifier of the customer created in step 1.
        

    
### Response Parameters

`id`
: `string` The unique identifier of the order.

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of ₹295.00, enter 29500.

`entity`
: `string` Name of the entity. Here, it is order.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency`
: `string` The 3-digit ISO code for the currency in which you want to accept the payment.

`receipt`
: `string` Receipt number that corresponds to this order.

`status`
: `string` The status of the order. Possible values:
     - `created`: When you create an order it is in the created state. It stays in this state till a payment is attempted on it.
     - `attempted`: An order moves from created to attempted state when a payment is first attempted on it. It remains in the attempted state till one payment associated with that order is captured.
     - `paid`: After the successful capture of the payment, the order moves to the paid state. No further payment requests are permitted once the order moves to the paid state. The order stays in the paid state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.
        

#### 6.2 Create a Payment

Create a Payment using the Recurring Payments API. Use the recurring token fetched in step 3. 

/payments/create/recurring

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/create/recurring \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET] \
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "email": "gaurav.kumar@example.com",
  "contact": "9876543210",
  "amount": 100,
  "currency": "INR",
  "order_id": "order_QrlHEejkEUxseS",
  "customer_id": "cust_QqZY02dRJtOUEi",
  "token": "token_QqcPbYVLtQdbKh",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'
```json: Response
{
  "razorpay_payment_id": "pay_QrlM7jtb4oblN4",
  "razorpay_order_id": "order_QrlHEejkEUxseS",
  "razorpay_signature": "4cc00ec4744e200473a909759e3db53047a9150d7ccf00ae89d288beaa2cd456"
}
```

    
### Request Parameters

`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's phone number. 

`amount` _mandatory_
: `integer` The payment amount in currency subunits.

`currency` _mandatory_
: `string` The 3-digit ISO code for the currency in which you want to accept the payment.

`order_id` _mandatory_
: `string` Unique identifier of the order created in the previous step.

`customer_id` _mandatory_
: `string` Unique identifier of the customer created in step 1.

`token` _mandatory_
: `string` Unique identifier of the token.

`recurring` _optional_
: `boolean` Indicates whether the payment is of recurring nature. Possible values are:
     - `true`: Recurring payment.
     - `false`: One-time payment.

`description`
: `string` Description of the payment, if any.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each.
        

    
### Response Parameters

`razorpay_payment_id`
: `string` Unique identifier of the payment.

`razorpay_order_id`
: `string` Unique identifier of the order.

`razorpay_signature`
: `string` The signature generated for the payment.
        

#### 6.3 Subscribe to Webhook Events to Verify Payment Status

Subscribe to the `payment.captured` webhook event to confirm the payment. You may also subscribe to the `token.rejected` webhook to get notified in case the token is rejected.

#### payment.captured Webhook Event payload
Given below is the webhook payload for the `payment.captured` event.

```json: payment.captured
{
  "account_id": "acc_E7tq4f47sTz3Aw",
  "contains": [
    "payment"
  ],
  "created_at": 1751876065,
  "entity": "event",
  "event": "payment.captured",
  "payload": {
    "payment": {
      "entity": {
        "acquirer_data": {
          "auth_code": "000132",
          "rrn": "518808059702"
        },
        "amount": 100,
        "amount_refunded": 0,
        "amount_transferred": 0,
        "bank": null,
        "base_amount": 100,
        "captured": true,
        "card": {
          "emi": false,
          "entity": "card",
          "id": "card_Qq6j0s9wJMtcZa",
          "iin": "999999",
          "international": false,
          "issuer": "HSBC",
          "last4": "8825",
          "name": "",
          "network": "Visa",
          "sub_type": "consumer",
          "type": "credit"
        },
        "card_id": "card_Qq6j0s9wJMtcZa",
        "contact": "+919876543210",
        "created_at": 1751876022,
        "currency": "INR",
        "description": null,
        "email": "gaurav.kumar@example.com",
        "entity": "payment",
        "error_code": null,
        "error_description": null,
        "error_reason": null,
        "error_source": null,
        "error_step": null,
        "fee": 2,
        "id": "pay_Qq6j0s9wJMtcZa",
        "international": false,
        "invoice_id": null,
        "method": "card",
        "notes": {
          "key1": "OTP - Using Partner Key ",
          "key2": "value2"
        },
        "order_id": "order_Qq6j0iO7BmuXbq",
        "refund_status": null,
        "status": "captured",
        "tax": 0,
        "token_id": "token_Qq6jgr6xmNQWs0",
        "vpa": null,
        "wallet": null
      }
    }
  }
}
```

#### token.rejected Webhook Event payload
Given below is the webhook payload for the `token.rejected` event.

```json: token.rejected
{
  "entity": "event",
  "account_id": "acc_QAacr3KpeJigFb",
  "event": "token.rejected",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_QrGgCeVyxl4v15",
        "entity": "token",
        "token": "GBogvBJ1iOAnxk",
        "bank": null,
        "wallet": null,
        "method": "card",
        "card": {
          "entity": "card",
          "name": "",
          "last4": "5513",
          "network": "Visa",
          "type": "credit",
          "issuer": "INDB",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "462003186",
          "expiry_month": "01",
          "expiry_year": "2099",
          "flows": {
            "otp": true,
            "recurring": true,
            "iframe": false
          },
          "cobranding_partner": null
        },
        "recurring": true,
        "recurring_details": {
          "status": "rejected",
          "failure_reason": "Failed to tokenised the card"
        },
        "auth_type": null,
        "mrn": null,
        "used_at": 1752129420,
        "created_at": 1752129418,
        "customer": {
          "id": "cust_QrGgCAqdYytSZI",
          "entity": "customer",
          "name": null,
          "email": "gaurav.kumar@example.com",
          "contact": "CONTACT_MASKED",
          "gstin": null,
          "notes": [],
          "created_at": 1752129418
        },
        "expired_at": 1853951399,
        "status": null,
        "notes": [],
        "error_description": null,
        "source": "business",
        "entity_id": "QrGeNBOZIZdd0W",
        "dcc_enabled": false,
        "max_amount": null,
        "error_code": null,
        "compliant_with_tokenisation_guidelines": false
      }
    }
  },
  "created_at": 1752129649
}
```
