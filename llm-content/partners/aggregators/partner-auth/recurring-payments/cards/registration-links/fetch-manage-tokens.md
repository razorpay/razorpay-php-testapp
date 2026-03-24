---
title: 2. Fetch and Manage Tokens
description: Retrieve tokens using Razorpay APIs to create subsequent payments.
---

# 2. Fetch and Manage Tokens

Once you capture a payment, Razorpay Checkout returns a `razorpay_payment_id`. You can use this id to fetch the token_id, which is used to create and charge subsequent payments.

You can retrieve the `token_id` in the following ways:
- API
- [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#3-search-for-the-token.md)

Know more about [Tokens](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/cards/integrate#fetch-card-mandate-registration-details.md).

## 2.1. Fetch Token by Payment id
The following endpoint retrieves the `token_id` using a `payment_id`.

/payments/:id

```curl: Curl
curl -X GET https://api.razorpay.com/v1/payments/pay_FHfqtkRzWvxky4 \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" 
```json: Response
{
  "id": "pay_FHfqtkRzWvxky4",
  "entity": "payment",
  "amount": 100,
  "currency": "INR",
  "status": "captured",
  "order_id": "order_FHfnswDdfu96HQ",
  "invoice_id": null,
  "international": false,
  "method": "card",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": null,
  "card_id": "card_F0zoXUp4IPPGoI",
  "bank": null,
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "customer_id": "cust_DtHaBuooGHTuyZ",
  "token_id": "token_FHfn3rIiM1Z8nr",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "fee": 0,
  "tax": 0,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "auth_code": "541898"
  },
  "created_at": 1595449871
}
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier of the payment to be retrieved. For example, pay_1Aa00000000002.

#### Response Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity. Here, it is payment.

`amount`
: `integer` The payment amount represented in smallest unit of the currency passed. For example, amount = 100 translates to 100 paise, that is ₹1 (default currency is INR).

`currency`
: `string` The currency in which the payment is made.

`status`
: `string` The status of the payment. Possible values:
    - `created`
    - `authorized`
    - `captured`
    - `refunded`
    - `failed`

`order_id`
: `string` The unique identifier of the order.

`invoice_id`
: `string` The unique identifier of the invoice.

`international`
: `boolean` Indicates whether the payment is done via an international card or a domestic one. Possible values:
    - `true`: Payment made using international card.
    - `false`: Payment not made using international card.

`method`
: `string` The payment method used for making the payment. Possible values:
   - `card`
   - `netbanking`
   - `wallet`
   - `emi`
   - `upi`

`amount_refunded`
: `integer` The amount refunded in smallest unit of the currency passed.

`refund_status`
: `string` The refund status of the payment. Possible values:
   - `null`
   - `partial`
   - `full`

`captured`
: `boolean` Indicates if the payment is captured. Possible values:
    - `true`: Payment has been captured.
    - `false`: Payment has not been captured.

`description`
: `string` Description of the payment, if any.

`email`
: `string` Customer email address used for the payment.

`contact`
: `integer` Customer contact number used for the payment.

`customer_id`
: `string` The unique identifier of the customer.

`token_id`
: `string` The unique identifier of the token.

`notes`
: `object` Contains user-defined fields, stored for reference purposes.

`fee`
: `integer` Fee (including GST) charged by Razorpay.

`tax`
: `integer` GST charged for the payment.

`error_code`
: `string` Error that occurred during payment. For example, BAD_REQUEST_ERROR.

`error_description`
: `string` Description of the error that occurred during payment. For example, Payment processing failed because of incorrect OTP.

`error_source`
: `string` The point of failure. For example, customer.

`error_step`
: `string` The stage where the transaction failure occurred. The stages can vary depending on the payment method used to complete the transaction. For example, payment_authentication.

`error_reason`
: string The exact error reason. For example, incorrect_otp.

`created_at`
: `integer` Timestamp, in UNIX format, on which the payment was created.

## 2.2. Fetch All Tokens by Customer id
A customer can have multiple tokens and these tokens can be used to create subsequent payments for multiple products or services. The following endpoint retrieves all tokens linked to a customer.

/customers/:id/tokens

```curl: Curl
curl -X GET https://api.razorpay.com/v1/customers/cust_DtHaBuooGHTuyZ/tokens \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
```json: Response
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "token_HouA2OQR5Z2jTL",
      "entity": "token",
      "token": "2JPRk664pZHUWG",
      "bank": null,
      "wallet": null,
      "method": "card",
      "card": {
        "entity": "card",
        "name": "Gaurav Kumar",
        "last4": "8950",
        "network": "Visa",
        "type": "credit",
        "issuer": "STCB",
        "international": false,
        "emi": false,
        "sub_type": "consumer",
        "expiry_month": 12,
        "expiry_year": 2021,
        "flows": {
          "otp": true,
          "recurring": true
        }
      },
      "recurring": true,
      "recurring_details": {
        "status": "confirmed",
        "failure_reason": null
      },
      "auth_type": null,
      "mrn": null,
      "used_at": 1629779657,
      "created_at": 1629779657,
      "expired_at": 1640975399,
      "dcc_enabled": false,
      "billing_address": null
    }
  ]
}
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier of the customer for whom tokens are to be retrieved. For example, cust_1Aa00000000002.

#### Response Parameters

`entity`
: `string` The entity being created. Here, it is a collection.

`count`
: `integer` The number of tokens to be fetched.

`items`
: Details related to token such as token id and bank information.

    `id`
    : `string` The unique identifier linked to an item. In this example, it is token_id.

    `entity`
    : `string` The entity being created. Here, it is a token.

    `token`
    : `string` The token is being fetched.

    `bank`
    : `string` Card issuing bank details.

    `wallet`
    : `string` Provides wallet information.

    `method`
    : `string` The payment method used to make the transaction.

    `card`
    : Details related to card used to make the transaction.

        `entity`
        : `string` The entity being created. Here, it is card.

        `name`
        : `string` Name of the cardholder.

        `last4`
        : `integer` Last 4 digits of the card.

        `network`
        : `string` Name of the payment processor. Here it is Visa.

        `type`
        : `string` Card type (debit or credit). In this example, it is credit.

        `issuer`
        : `string` Name of the card-issuing bank.

        `international`
        : `string` Card usage restriction. Possible values:
            - `true`: Supports international transactions.
            - `false`: International transactions are not supported.

        `emi`
        : `string` Card EMI status. Possible values.
            - `true`: The card is on EMI.
            - `false`: The card is not on EMI.

        `sub_type`
        : `string` Type of the customer.

        `expiry_month`
        : `integer` Month on which the card expires.

        `expiry_year`
        : `integer` Year on which the card expires.

        `flows`
        : The transaction flow details.

            `otp`
            : `string` Whether the OTP function is enabled or not. Possible values:
                - `true`: The OTP function is enabled.
                - `false`: The OTP function is not enabled.

            `recurring`
            : `string` Whether the recurring for this payment method is enabled or not. Possible Values:
                - `true`: Recurring is enabled.
                - `false`: Recurring is not enabled.

    `vpa`
    : `string` The VPA details. There are no VPA details in this example.

`recurring`
: `string` This represents whether recurring is enabled for this token or not. Possible values:
    - `true`: Recurring is enabled.
    - `false`: Recurring is not enabled.

`auth_type`
: `string` The authorization type details.

`mrn`
: `string` The unique identifier issued by the payment gateway during customer registration. This can be Gateway Reference Number or Gateway Token.

`used_at`
: `integer` The card usage timestamp.

`created_at`
: `integer` The card creation timestamp.

`expired_at`
: `integer` The card expiry date timestamp.

`dcc_enabled`
: `string` Indicates whether the option to change currency is enabled or not. Possible values.
    - `true`: The option to change currency is enabled
    - `false`: The option to change currency is not enabled.

## 2.3 Fetch a Token by Customer id

The following endpoint fetches a particular token linked to a customer.

/customers/:customer_id/tokens/:token_id

```curl: Curl
curl -X GET https://api.razorpay.com/v1/customers/cust_IjsVsJ7d27hxOs/tokens/token_J0BgMu8YDVusZa \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
```json: Response
{
  "id": "token_J0BgMu8YDVusZa",
  "entity": "token",
  "token": "ya5olMAYU0ap4F",
  "bank": null,
  "wallet": null,
  "method": "card",
  "card": {
    "entity": "card",
    "name": "Maitreyi Bodake",
    "last4": "7558",
    "network": "Visa",
    "type": "credit",
    "issuer": "FDRL",
    "international": false,
    "emi": true,
    "sub_type": "consumer",
    "token_iin": null,
    "expiry_month": 1,
    "expiry_year": 2027,
    "flows": {
      "recurring": true
    }
  },
  "recurring": true,
  "recurring_details": {
    "status": "confirmed",
    "failure_reason": null
  },
  "auth_type": null,
  "mrn": null,
  "used_at": 1645780406,
  "created_at": 1645780188,
  "expired_at": 2709971120,
  "status": null,
  "notes": [],
  "dcc_enabled": false,
  "compliant_with_tokenisation_guidelines": false
}
```

#### Path Parameters

`customer_id` _mandatory_
: `string` The unique identifier of the customer for whom tokens are to be retrieved. For example, cust_IjsVsJ7d27hxOs.

`token_id` _mandatory_
: `string` The unique identifier of the token that should be retrieved. For example, token_J0BgMu8YDVusZa.

#### Response Parameters

`id`
: `string` The unique identifier of the token.

`entity`
: `string` The entity being created. Here, it is token.

`items`
: Details related to token such as token id and bank information.

    `id`
    : `string` The unique identifier linked to an item. In this example, it is token_id.

    `entity`
    : `string` The entity being created. Here, it is a token.

    `token`
    : `string` The token is being fetched.

    `bank`
    : `string` Card issuing bank details.

    `wallet`
    : `string` Provides wallet information.

    `method`
    : `string` The payment method used to make the transaction.

    `card`
    : Details related to card used to make the transaction.

        `entity`
        : `string` The entity being created. Here, it is card.

        `name`
        : `string` Name of the cardholder.

        `last4`
        : `integer` Last 4 digits of the card.

        `network`
        : `string` Name of the payment processor. Here it is Visa.

        `type`
        : `string` Card type (debit or credit). In this example, it is credit.

        `issuer`
        : `string` Name of the card-issuing bank.

        `international`
        : `string` Card usage restriction. Possible values:
            - `true`: Supports international transactions.
            - `false`: International transactions are not supported.

        `emi`
        : `string` Card EMI status. Possible values.
            - `true`: The card is on EMI.
            - `false`: The card is not on EMI.

        `sub_type`
        : `string` Type of the customer.

        `expiry_month`
        : `integer` Month on which the card expires.

        `expiry_year`
        : `integer` Year on which the card expires.

        `flows`
        : The transaction flow details.

            `otp`
            : `string` Whether the OTP function is enabled or not. Possible values:
                - `true`: The OTP function is enabled.
                - `false`: The OTP function is not enabled.

            `recurring`
            : `string` Whether the recurring for this payment method is enabled or not. Possible Values:
                - `true`: Recurring is enabled.
                - `false`: Recurring is not enabled.

`vpa`
: `string` The VPA details. There are no VPA details in this example.

`recurring`
: `string` This represents whether recurring is enabled for this token or not. Possible values:
    - `true`: Recurring is enabled.
    - `false`: Recurring is not enabled.

`auth_type`
: `string` The authorization type details.

`mrn`
: `string` The unique identifier issued by the payment gateway during customer registration. This can be Gateway Reference Number or Gateway Token.

`used_at`
: `integer` The card usage timestamp.

`created_at`
: `integer` The card creation timestamp.

`expired_at`
: `integer` The card expiry date timestamp.

`dcc_enabled`
: `string` Indicates whether the option to change currency is enabled or not. Possible values.
    - `true`: The option to change currency is enabled
    - `false`: The option to change currency is not enabled.

## 2.4 Delete Tokens
The following endpoint deletes a token.

/customers/:customer_id/tokens/:token_id

```curl: Curl
curl -X DELETE https://api.razorpay.com/v1/customers/cust_DtHaBuooGHTuyZ/tokens/token_FHf94Uym9tdYFJ \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" 
```json: Response
{
    "deleted": true
}
```

#### Path Parameters

`customer_id` _mandatory_
: `string` The unique identifier of the customer with whom the token is linked. For example, cust_1Aa00000000002.

`token_id` _mandatory_
: `string` The unique identifier of the token that is to be deleted. For example, token_1Aa00000000001.

#### Response Parameters

`deleted`
: `boolean` Indicates whether the token is deleted. Possible values:
    - `true`: The token is deleted successfully.
    - `false`: The token was not deleted.
