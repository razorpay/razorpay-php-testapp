---
title: Update a Customer Identifier
description: Update a Customer Identifier using the Razorpay API
---

# Update a Customer Identifier

## Update a Customer Identifier

Use this endpoint to update your Customer Identifier. You cannot update the expiry date of a Customer Identifier that has been closed.

### Request

@include smart-collect/api/update-vpa

### Response

@include smart-collect/api/update-vpa-res-code

### Parameters

@include smart-collect/api/update-path

### Parameters

@include smart-collect/api/update-req

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
: `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes).

`customer_id`
: `string` Unique identifier of the customer the Customer Identifier is linked with. Know more about [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`receivers`
: `json object` Configuration of desired receivers for the Customer Identifier.

    `id`
    : `string` The unique identifier of the virtual bank account. Sample IDs for:
      - Virtual bank account: `ba_Di5gbQsGn0QSz3`
      - Virtual UPI ID: `vpa_CkTmLXqVYPkbxx`

    `entity`
    : `string` Name of the entity. Possible values:
      - `bank_account`
      - `vpa`

    `ifsc`
    : `string` The IFSC for the virtual bank account created. For example, `RAZR0000001`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `bank_name`
    : `string` The bank associated with the virtual bank account. For example, `RBL Bank`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `account_number`
    : `string` The unique account number provided by the bank. For example, `1112220061746877`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `name`
    : `string` The `merchant billing label` as it appears on the Dashboard. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

    `notes`
    : `json object` Any custom notes you might want to add to the virtual bank account can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes). This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

`close_by`
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).
  - Any request beyond `2147483647` UNIX timestamp will fail.
  - A Customer Identifier API that has not been used for 90 days will be automatically closed even if no `close_by` date has been set.

`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

 
Customer Identifier cannot be updated
* code: 400
* description: If you have created a Customer Identifier with only a VPA receiver, you cannot replace or update it.
* solution: Create a new Customer Identifier with bank account details.

Bank account Receiver already exists
* code: 400
* description: If you have created a Customer Identifier with a receiver, for example, bank account, you cannot add another bank account receiver or replace it.
* solution: Create a new Customer Identifier for new banking details of receiver.

close by date should be atleast 15 min after current time
* code: 400
* description: The epoch time passed is less than current time.
* solution: Send the correct `close_by` time. And the `close_by` time should be more than 15 minutes from the current time.
