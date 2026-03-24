---
title: Create an Instant Refund
description: Create an Instant Refund using Razorpay Refunds API.
---

# Create an Instant Refund

## Create an Instant Refund

Use this endpoint to process refunds instantaneously to your customers. The instant refund is enabled by default for your account. You should set the refund speed to `optimum` when creating a refund request to ensure refunds are processed instantly. We will consider the default speed if you do not specify the same during the refund request. Know more about [setting the default speed](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/refund-speed.md) from the Dashboard.

- Refunds will be processed at an optimal speed based on Razorpay's internal fund transfer logic.
-  If the refund can be processed instantly, Razorpay will do so irrespective of the payment method used to make the payment.

**`speed` attribute in Request** | **`speed_processed` attribute in Response** | **Description**
---
`normal` | `normal` | Refund processed via `normal` speed.
---
`optimum` | `normal` | A faster speed was not available, so processed via `normal` speed.

Once the refund moves to the `processed` state, the refund response displays the `speed_processed` parameter, the final state of the refund.

### Response

```json: Success
{
  "id": "rfnd_FP8R8EGjGbPkVb",
  "entity": "refund",
  "amount": 500100,
  "currency": "INR",
  "payment_id": "pay_29QQoUBi66xm2f",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "receipt": "Receipt No. 31",
  "acquirer_data": {
    "arn": null
  },
  "created_at": 1597078914,
  "batch_id": null,
  "status": "processed",
  "speed_processed": "normal",
  "speed_requested": "optimum"
}
```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "_29QQoUBi66xm2f is not a valid id",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {}
    }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the payment which needs to be refunded.

### Parameters

`amount` _optional_
: `integer` The amount to be refunded. Amount should be in the smallest unit of the currency in which the payment was made. **Required in case of partial refund**.
  - For a **partial refund**, enter a value lesser than the payment amount. For example, if the payment amount is ₹1200, and you want to refund only ₹200, you must pass `20000`.
  - In case of a **full refund**, enter the full payment amount. If `amount` parameter is not passed, the entire payment amount will be refunded.

  
  
> **SUCCESS**
>
> 
>   **What's New**
> 
>   Refund amounts of ₹1 or lower are now supported.
> 
>   

  

`speed` _mandatory_
: `string` Here, it must be `optimum`. Indicates that the refund will be processed at an optimal speed based on Razorpay's internal fund transfer logic.
    - If the refund can be processed instantly, Razorpay will do so, irrespective of the payment method used to make the payment.
    - If an instant refund is not possible, Razorpay will initiate a refund that is processed at the normal speed.

`notes` _optional_
: `json object` This is a key-value pair that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

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
: `string` The currency of payment amount for which the refund is initiated. Check the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

`payment_id`
: `string` The unique identifier of the payment for which a refund is initiated. For example, `pay_FgR9UMzgmKDJRi`.

`created_at`
: `integer` Unix timestamp at which the refund was created. For example, `1600856650`.

`batch_id`
: `string` This parameter is populated if the refund was created as part of a batch upload. For example, `batch_00000000000001`.

`notes`
: `json object` Key-value store for storing your reference data. A maximum of 15 key-value pairs can be included. For example, `"note_key": "Beam me up Scotty”`.

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

The payment has been fully refunded already.
* code: 400
* description: The `payment_id` has already been refunded fully.
* solution: Use a `payment_id` that has not been fully refunded.
