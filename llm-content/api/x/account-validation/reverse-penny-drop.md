---
title: Validate Bank Account (VPA) via Reverse Penny Drop
description: Validate your contact's bank account instantly via Reverse Penny Drop.
---

# Validate Bank Account (VPA) via Reverse Penny Drop

## Validate VPA using Reverse Penny Drop

Use this endpoint to validate the bank account details via Reverse Penny Drop. 

### Request

```curl: Curl
curl -u [YOUR_KEY]:[YOUR_SECRET] \
-X POST https://api.razorpay.com/v1/fund_accounts/validations \
-H "Content-Type: application/json" \
-d '{
  "source_account_number": "7878780080316316",
  "validation_type": "upi_intent",
  "reference_id": "112233",
  "notes": {
    "random_key_1": "Make it so",
    "random_key_2": "Tea. Earl Grey. Hot."
  }
}'
```

### Response

```json: Response - Initial
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "status": "created",
  "utr": "123456789012",
  "upi_intent": {
    "intent_url": "upi://pay?pa=razorpayx@citibank&pn=RZPX%20PRIVATE%20LTD&mc=7413&cu=INR&am=1.00&tn=BAV&ver=01&mode=04&qrMedium=02&tr=RjY7anDJFuKQOB",
    "phonepe_url": "phonepe://upi/pay?pa=razorpayx@citibank&pn=RZPX%20PRIVATE%20LTD&mc=7413&cu=INR&am=1.00&tn=BAV&ver=01&mode=04&qrMedium=02&tr=RjY7anDJFuKQOB",
    "gpay_url": "tez://upi/pay?pa=razorpayx@citibank&pn=RZPX%20PRIVATE%20LTD&mc=7413&cu=INR&am=1.00&tn=BAV&ver=01&mode=04&qrMedium=02&tr=RjY7anDJFuKQOB",
    "paytm_url": "paytmmp://upi/pay?pa=razorpayx@citibank&pn=RZPX%20PRIVATE%20LTD&mc=7413&cu=INR&am=1.00&tn=BAV&ver=01&mode=04&qrMedium=02&tr=RjY7anDJFuKQOB",
    "bhim_url": "bhim://upi/pay?pa=razorpayx@citibank&pn=RZPX%20PRIVATE%20LTD&mc=7413&cu=INR&am=1.00&tn=BAV&ver=01&mode=04&qrMedium=02&tr=RjY7anDJFuKQOB",
    "encoded_qr_code": "iVBORw0KGgoAAAANSUhEUgAAAQAAAAEAAQMAAABmvDolAAAABlBMVEX///8AAABVwtN+AAACWUlEQVR42uyYy3E7LRDEe4sDR0IglM1sH+"
  },
  "validation_results": {
    "account_status": null,
    "registered_name": null,
    "details": null,
    "name_match_score": null,
    "validated_account_type": null,
    "bank_account": {
      "bank_routing_code": null,
      "account_number": null,
      "bank_name": null,
      "account_type": null
    }
  },
  "status_details": {
    "description": "Validation request is created",
    "source": "internal",
    "reason": "validation_request_created"
  },
  "reference_id": "112233",
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
  }
}
```json: Response - After Payment
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "status": "completed",
  "utr": "123456789012",
  "validation_results": {
    "account_status": "active",
    "registered_name": "GAURAV KUMAR",
    "validated_account_type": "Bank_Account",
    "name_match_score": "00",
    "bank_account": {
      "bank_routing_code": "HDFC0000053",
      "account_number": "765432123456789",
      "bank_name": "HDFC Bank",
      "account_type": "SAVINGS"
    },
    "upi_intent": {
      "vpa": "example@upi"
    }
  }
}
```

### Parameters

`source_account_number` _mandatory_
: `string` Bank account number being validated. For example, `765432123456789`.

`validation_type` _mandatory_
: `string` The method used for validating the bank account. Here, it is `upi_intent`.

`reference_id` _optional_
: `string` Unique reference id of the fund account being validated. 

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each.

### Parameters

`id`
: `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

`entity`
: `string` Here it will be `fund_account.validation`.

`status`
: `string` The status of the fund account validation. For example, in the initial response, it could be `created` and in the after payment response, `completed`.

`utr`
: `string` The Unique Transaction Reference number assigned to the ₹1 UPI payment made by the end user. Use this to track or reconcile the transaction.

`upi_intent`
: `object` Contains deep links to launch specific UPI apps directly on the user's device, allowing them to complete the ₹1 payment without manually entering details.

  `intent_url`
  : `string` A generic UPI deep link that opens the user's default or available UPI app to initiate the payment.

  `phonepe_url`
  : `string` A deep link that launches the PhonePe app directly to complete the payment.

  `gpay_url`
  : `string` A deep link that launches Google Pay directly to complete the payment.

  `paytm_url`
  : `string` A deep link that launches the Paytm app directly to complete the payment.

  `bhim_url`
  : `string` A deep link that launches the BHIM app directly to complete the payment.

  `encoded_qr_code`
  : `string` A Base64-encoded QR code image. Display this on your interface so users can scan it using any UPI app to complete the ₹1 payment.

`validation_results`
: `object` Contains the verified account details extracted from the payer's bank after the ₹1 payment is received.

  `account_status`
  : `string` Indicates whether the bank account is active and valid. Possible values: `active`, `inactive`.

  `registered_name`
  : `string` The account holder's full name as registered with their bank.

  `validated_account_type`
  : `string` The type of account validated during the transaction. Possible values: `bank_account`, `vpa`.

  `name_match_score`
  : `integer` A numeric score indicating how closely the account holder's registered name matches the name provided during the request.

`bank_account`
: `object` Contains the verified bank account details of the payer.

  `bank_routing_code`
  : `string` The IFSC code of the payer's bank branch, used to identify and route transactions to the correct bank.

  `account_number`
  : `string` The payer's bank account number, as retrieved from the bank.

  `bank_name`
  : `string` The name of the payer's bank.

  `account_type`
  : `string` The type of bank account held by the payer. Possible values: `Savings`, `Current`.

`status_details`
: `object` Contains details about the status of the validation.

  `description`
  : `string` A short note about the validation status.

  `source`
  : `string` The source from which the validation was done.

  `reason`
  : `string` Reason for the validation.

`reference_id`
: `string` Unique reference id generated for the validation.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each.
