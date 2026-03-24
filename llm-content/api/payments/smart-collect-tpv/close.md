---
title: Close a Customer Identifier (TPV)
description: Close a Customer Identifier using the Razorpay **Smart Collect TPV** API.
---

# Close a Customer Identifier (TPV)

## Close a Customer Identifier

Use this endpoint to close a Customer Identifier.

### Request

@include smart-collect/api-tpv/close

### Response

@include smart-collect/api-tpv/close-res-code

### Parameters

@include smart-collect/api-tpv/close-path

### Parameters

`id`
: `string` The unique identifier of the Customer Identifier.

`name`
: `string` The `merchant billing label` as it appears on the Dashboard.

`entity`
: `string` Indicates the type of entity. Here, it is `virtual account`.

`status`
: `string` Indicates whether the Customer Identifier is in `active` or `closed` state.

`description`
: `string` A brief description about the Customer Identifier.

`amount_expected`
: `integer` The amount expected by the merchant.

`amount_paid`
: `integer` The amount paid by the customer into the Customer Identifier.

`notes`
: `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Check the [Notes section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to know more.

`customer_id`
: `string` Unique identifier of the customer the Customer Identifier is linked with. Check the [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) section to know more.

`receivers`
: `json object` Configuration of desired receivers for the Customer Identifier.

    `id`
    : `string` The unique identifier of the Customer Identifier. Sample id for Customer Identifier is `ba_Di5gbQsGn0QSz3`

    `entity`
    : `string` Name of the entity. Possible value is `bank_account`.

    `ifsc`
    : `string` The IFSC for the Customer Identifier created. For example, `RAZR0000001`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `bank_name`
    : `string` The bank associated with the Customer Identifier. For example, `RAZR0000001`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `account_number`
    : `string` The unique account number provided by the bank. For example, `1112220061746877`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `name`
    : `string` The `merchant billing label` as it appears on the Dashboard. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `notes`
    : `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Check the [Notes section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to know more. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

`allowed_payers`
: `array` Details of customer bank accounts which will be allowed to make payments to your Customer Identifier. The parent parameter under which the customer bank account details must be passed as child parameters. You can add account details of 10 allowed payers for a Customer Identifier. For more details, refer to the [Third Party Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/third-party-validation.md) section.

    `type`
    : `string` The type of account through which the customer will make the payment. Possible value is `bank_account`.

    `id`
    : `string` The unique identifier of the `allowed_payers` account.

    `bank_account`
    : `object` Indicates the bank account details such as `ifsc` and `account_number`.

        `ifsc`
        : `string` The IFSC associated with the bank account through which the customer is expected to make the payment.

        `account_number`
        : `string` The bank account number through which the customer is expected to make the payment.

`close_by`
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30). Any request beyond `2147483647` UNIX timestamp will fail.

`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the dashboard.
* solution: Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the keys.
