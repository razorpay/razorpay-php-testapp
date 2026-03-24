---
title: Fetch Balance
description: Fetch Account Balances
---

# Fetch Balance

## Fetch Account Balances 

Use this endpoint to retrieve the balances of all accounts.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/banking_balances
```

### Response

```json: Success

{
  "entity": "collection",
  "count": 4,
  "items": [
    {
      "entity": "banking_balance",
      "currency": "INR",
      "account_number": "409001396356",
      "account_type": "current_account",
      "bank_name": "RBL Bank",
      "bank_code": "RATN",
      "amount": 186682638,
      "available_amount": 186682638,
      "refreshed_at": 1721889110
    },
    {
      "entity": "banking_balance",
      "currency": "INR",
      "account_number": "002281300049209",
      "account_type": "current_account",
      "bank_name": "Yes Bank",
      "bank_code": "YESB",
      "amount": 10489829,
      "available_amount": 186682638,
      "refreshed_at": 1696419847
    },
    {
      "entity": "banking_balance",
      "currency": "INR",
      "account_number": "002281300012871",
      "account_type": "fixed_deposit",
      "bank_name": "Yes Bank",
      "bank_code": "YESB",
      "amount": 10489829,
      "available_amount": 186682638,
      "refreshed_at": 1696419847
    },
    {
      "entity": "banking_balance",
      "currency": "INR",
      "account_number": "984539953520846",
      "account_type": "razorpayx_lite",
      "bank_name": null,
      "bank": null,
      "amount": 1029,
      "available_amount": 1029,
      "refreshed_at": 1729847660
    }
  ]
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The selected account type is invalid.",
    "source": "business",
    "step": null,
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "account_type"
  }
}
```

### Parameters

@include rzpx/fund-accounts/balance-fetch-query-params

### Parameters

@include rzpx/fund-accounts/balance-fetch-response-params

### Errors

 
`The selected account type is invalid`
* code: 400
* description: Query parameter `account_type` is incorrectly passed.
* solution: Enter the `account_type` as `current_account` or `razorpayx_lite` only. The query parameter is case sensitive.

`Invalid channel name: rbl`
* code: 400
* description: Query parameter `bank_code` is incorrectly passed.
* solution: Enter the `bank_code` in the correct format. This should be the first four characters of IFSC for any bank, and is case sensitive.

`The count may not be greater than 100`
* code: 400
* description: The `count` passed in the query parameter is greater than 100.
* solution: The maximum value that can be passed here is `100`.

`The count must be an integer`
* code: 400
* description: The `count` passed in the query parameter is not an integer
* solution: Enter only integer values.

`Authentication failed` 
* code: 401
* description: Incorrect Key or Secret.
* solution: Enter the correct Key and Secret as per the request body.

`Throttling Error`
* code: 429
* description: The server is processing too many requests at once and is unable to process your request.
* solution: Retry the request after some time. 

`We are facing some trouble completing your request at the moment. Please try again shortly.`
* code: 500
* description: Internal Server Error. The server has encountered a situation it does not know how to handle.
* solution: Retry the request after some time.

`Bad Gateway`
* code: 502
* description: The server got an invalid response while working as a gateway to get a response needed to handle the request.
* solution: Retry the request after some time.

`Service Unavailable`
* code: 503
* description: The server is not ready to handle the request. Common causes are a server that is down for maintenance or is overloaded.
* solution: Retry the request after some time.

`Gateway Timeout`
* code: 504
* description: This error response is given when the server acts as a gateway and cannot get a timely response.
* solution: Retry the request after some time.
