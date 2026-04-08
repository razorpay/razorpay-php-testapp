---
title: Create a Normal Refund (Idempotent Request)
description: Retry or send the same normal refund request multiple times safely using the Razorpay API.
---

# Create a Normal Refund (Idempotent Request)

## Create a Normal Refund (Idempotent Request)

Idempotency allows you to safely retry or send the same request multiple times without fear of repeating the normal refund request more than once.

- When you try to create a normal refund, in some cases due to network downtimes, you may not get a response from our servers. As a consequence, you will not be aware of the refund id or its state. In such cases, you can safely retry the transaction using the same idempotency key without risk of double-refund or duplication.
- To make a normal refund request idempotent, add the header `X-Refund-Idempotency` to the request and pass an idempotency key against it. The idempotency key must be at least 10 character long and can contain alphabets, numbers, hyphens and underscores only. For example, `550e8400-e29b-41d4-a716-446655440000`.
- Idempotency is supported for both Normal and Instant Refunds APIs.

> **INFO**
>
> 
> **Handy Tips**
> 
> - When retrying a request, the request body must be the same as the first request for idempotency to work. A different payload will be rejected as a `BAD_REQUEST`.
> - The idempotency key in retries must be the same as the original request.
> - Use unique idempotency keys for each unique request.
> - If a request is received while a prior request is still being processed, the system will return a 409 Conflict status code. You may retry the request upon receiving this response.
> 

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/pay_29QQoUBi66xm2f/refund \
-H 'Content-Type: application/json' \
-H 'X-Refund-Idempotency: 550e8400-e29b-41d4-a716-446655440000' \
-d '{
  "amount": 500100
}'
```

### Response

```json: Success
{
  "id": "rfnd_FP8QHiV938haTz",
  "entity": "refund",
  "amount": 500100,
  "receipt": "Receipt No. 31",
  "currency": "",
  "payment_id": "pay_29QQoUBi66xm2f",
  "notes": {},
  "acquirer_data": {
    "arn": null
  },
  "created_at": 1597078866,
  "batch_id": null,
  "status": "processed",
  "speed_processed": "normal",
  "speed_requested": "normal"
}
```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Different request with the same idempotency key has already been processed.",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the payment which needs to be refunded.

### Parameters

`amount` _optional_
: `integer` The amount to be refunded. Amount should be in the smallest unit of the currency in which the payment was made. In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as `295`.
  - For a **partial refund**, enter a value lesser than the payment amount. For example, if the payment amount is  and you want to refund only , you must pass `50000`.
  - For **full refund**, enter the entire payment amount. If the `amount` parameter is not passed, the entire payment amount will be refunded.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`speed` _optional_
: `string` The speed at which the refund is to be processed. The default value is `normal`. Refund will be processed via the normal speed, and the customer will receive the refund within 5-7 working days.

`notes` _optional_
: `json object` Key-value pairs used to store additional information. A maximum of 15 key-value pairs can be included.

`receipt` _optional_
: `string` A unique identifier provided by you for your internal reference.

### Parameters

`id`
: `string` The unique identifier of the refund. For example, `rfnd_FgRAHdNOM4ZVbO`.

`entity`
: `string` Indicates the type of entity. Here, it is `refund`.

`amount`
: `integer` The amount to be refunded (in the smallest unit of currency). 
 For example, if the refund value is  it will be `3000`.

`currency`
: `string` The currency of payment amount for which the refund is initiated. Check the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`payment_id`
: `string` The unique identifier of the payment for which a refund is initiated. For example, `pay_FgR9UMzgmKDJRi`.

`created_at`
: `integer` Unix timestamp at which the refund was created. For example, `1600856650`.

`batch_id`
: `string` This parameter is populated if the refund was created as part of a batch upload. For example, `batch_00000000000001`.

`notes`
: `json object` Key-value store for storing your reference data. A maximum of 15 key-value pairs can be included. For example, `"note_key": "Beam me up Scotty"`.

`receipt`
: `string` A unique identifier provided by you for your internal reference.

`acquirer_data`
: `array` A dynamic array consisting of a unique reference number (either RRN, ARN or UTR) that is provided by the banking partner when a refund is processed. This reference number can be used by the customer to track the status of the refund with the bank.

`status`
: `string` Indicates the state of the refund. Possible values:
  - `pending`: This state indicates that Razorpay is attempting to process the refund.
  - `processed`: This is the final state of the refund.
  - `failed`: A refund can attain the failed state in the following scenarios:

     - Normal refund is not possible for a payment which is more than 6 months old.

     - Instant Refund can sometimes fail because of customer's account or bank-related issues.

`speed_requested`
: `string` The processing mode of the refund seen in the refund response. 
 This attribute is seen in the refund response only if the `speed` parameter is set in the refund request.
Possible values:
  - `normal`: Indicates that the refund will be processed via the normal speed. The refund will take 5-7 working days.
  - `optimum`: Indicates that the refund will be processed at an optimal speed based on Razorpay's internal fund transfer logic.
     - If the refund can be processed instantly, Razorpay will do so, irrespective of the payment method used to make the payment.
     - If an instant refund is not possible, Razorpay will initiate a refund that is processed at the normal speed.

`speed_processed`
: `string` This is a parameter in the response which describes the mode used to process a refund. 
 This attribute is seen in the refund response only if the `speed` parameter is set in the refund request. Possible values:
  - `instant`: Indicates that the refund has been processed instantly via fund transfer.
  - `normal`: Indicates that the refund has been processed by the payment processing partner. The refund will take 5-7 working days.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

\{Payment_id\} is not a valid id.
* code: 400
* description: The `payment_id` provided is invalid.
* solution: Use a valid `payment_id`.

The requested URL was not found on the server.
* code: 400
* description: Possible reasons: - The URL is wrong or is missing something.
- A POST API is executed by GET method.

* solution: - Ensure that the URL is correct and complete.
- Use the correct method, that is, POST.

\{any Extra field\} is/are not required and should not be sent.
* code: 400
* description: An additional or unrequired parameter is passed.
* solution: Ensure that you only pass the required parameters in the request body.

The refund amount provided is greater than amount captured.
* code: 400
* description: The refund amount entered is more than the amount captured.
* solution: Enter an amount equal to or less than the amount captured.

The amount must be at least INR 1.00.
* code: 400
* description: The refund amount entered is less than .
* solution: Enter an amount of at least .

The payment has been fully refunded already.
* code: 400
* description: The `payment_id` has already been refunded fully.
* solution: Use a `payment_id` that has not been fully refunded.

Different request with the same idempotency key has already been processed.
* code: 409
* description: Another refund request with different parameters has been processed using the same idempotency key.
* solution: Use a unique idempotency key for the new request and retry.

Another request with the same idempotency key is still in progress.
* code: 409
* description: A refund request with the same idempotency key is currently being processed and has not yet returned a response.
* solution: Wait for the previous request to complete or use a different idempotency key.

Internal server error - Failed to fetch idempotency record
* code: 500
* description: The server encountered an error while retrieving the idempotency record.
* solution: Retry the request after some time. If the issue persists, contact [Razorpay Support](https://razorpay.com/support).

Internal server error - Failed to parse request body
* code: 500
* description: The server failed to parse the request body to generate the request hash.
* solution: Ensure the request body is properly formatted as valid JSON. If the issue persists, contact [Razorpay Support](https://razorpay.com/support).

The idempotency key must be at least 10 characters long.
* code: 400
* description: The idempotency key provided is less than 10 characters in length.
* solution: Use an idempotency key that is at least 10 characters long.

The idempotency key must only contain alphanumeric characters, underscores, and hyphens
* code: 400
* description: The idempotency key contains invalid special characters.
* solution: Ensure the idempotency key only contains alphanumeric characters (A-Z, a-z, 0-9), underscores (_), and hyphens (-).

Merchant id not found in authentication
* code: 500
* description: The request contains an idempotency key but the merchant authentication is invalid or missing.
* solution: Ensure you are using valid API credentials (Key ID and Key Secret) for authentication. If the issue persists, contact [Razorpay Support](https://razorpay.com/support).
