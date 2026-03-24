---
title: Add VPA Receiver to an Existing Customer Identifier
description: Add VPA Receiver to an existing Customer Identifier using the Razorpay API
---

# Add VPA Receiver to an Existing Customer Identifier

## Add VPA Receiver to an Existing Customer Identifier (Smart Collect 2.0)

Use this endpoint to add a VPA receiver to an existing Customer Identifier.
If you have created a Customer Identifier with only a VPA receiver, you cannot replace or update it using this endpoint.

### Request

@include smart-collect/api/add-receivers-vpa

### Response

@include smart-collect/api/add-receivers-vpa-res-code

### Parameters

@include smart-collect/api/add-receivers-path

### Parameters

@include smart-collect/api/add-receivers-req

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
: `json object` Any custom notes you might want to add to the Customer Identifier can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md).

`customer_id`
: `string` Unique identifier of the customer the Customer Identifier is linked with. Know more about [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`receivers`
: `json object` Configuration of desired receivers for the Customer Identifier.

  `id`
  : `string` The unique identifier of the virtual bank account or virtual UPI ID. Sample IDs for: 
    - Virtual bank account: `ba_Di5gbQsGn0QSz3`
    - Virtual UPI ID: `vpa_CkTmLXqVYPkbxx`

  `entity`
  : `string` Name of the entity. Possible values are:
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
  : `json object` Any custom notes you might want to add to the virtual bank account or virtual UPI ID can be entered here. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md). This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `username`
  : `string` The UPI ID consists of the username and the bank handle. The `username` consists of the `namespace` (assigned by the bank to Razorpay), the `merchant prefix` (which can be customised by you) and the `descriptor` (which you provide to identify the customer). The unique identifier which forms the first half of the virtual UPI ID. For example, `rpy.payto00000gaurikumari`. This parameter appears in the response only when `vpa` is passed as the receiver `type`. The descriptor can be 10 characters only.

  `handle`
  : `string` The bank name that forms the second half of the virtual UPI ID.  For example, `icici`. This parameter appears in the response only when `vpa` is passed as the receiver `type`.

  `address`
  : `string` The UPI ID that combines the `username` and the `handle` with the `@` symbol. For example, `rpy.payto00000gaurikumari@icici`. This parameter appears in the response only when `vpa` is passed as the receiver `type`.

`close_by`
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).
  
  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   - Any request beyond `2147483647` UNIX timestamp will fail.
>   - A Customer Identifier API that has not been used for 90 days will be automatically closed even if no `close_by` date has been set.
>   

`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.
