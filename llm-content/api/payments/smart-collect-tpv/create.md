---
title: Create a Customer Identifier With TPV
description: Create a Customer Identifier using the Razorpay Smart Collect API.
---

# Create a Customer Identifier With TPV

## Create a Customer Identifier With TPV

Use this endpoint to create a Customer Identifier. While sharing the details of CIs (created using RBL bank) with the customers, ensure that the fifth character in the IFSC is number `0` and not the letter O. For example, valid IFSC is `RATN0VAAPIS` and not `RATNOVAAPIS`.

### Request

@include smart-collect/api-tpv/create

### Response

@include smart-collect/api-tpv/create-res-code

### Parameters

@include smart-collect/api-tpv/create-req

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
: `integer` UNIX timestamp at which the Customer Identifier is scheduled to be automatically closed. This is returned only if the UNIX timestamp was specified during the Customer Identifier creation. There is no expiry time for a Customer Identifier unless specified during creation.

`closed_at`
: `integer` UNIX timestamp at which the Customer Identifier is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the Customer Identifier was created.

### Errors

The API `` provided is invalid.
* code: 4xx
* description:  -  Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard. 
 -  `customer_id` is not correct. 
 
* solution:  -  Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the API keys. 
 -  Make sure that the `customer_id` and the API keys used belong to the same account and same mode, whether test or live respectively. 
 
 
The `field name` is required
* code: 400
* description: Occurs when a mandatory field is empty.
* solution: Make sure that all the mandatory fields are filled.

The id provided does not exist
* code: 400
* description: Occurs when the `customer_id` passed is wrong or does not belong to the identifier associated to the API keys used.
* solution: Make sure that the `customer_id` and the API keys used belong to the same identifier and same mode, whether test or live respectively.

only 10 allowed payers can be added
* code: 400
* description: Occurs when more than 10 allowed payers are added in the Dashboard.
* solution: When creating the Customer Identifier, allowed payers cannot be more than 10.

Account validation is only applicable on bank account as receiver type.
* code: 400
* description: This error occurs when you try to add an allowed payer account on a Customer Identifier with VPA added as a receiver (with or without a Bank account).
* solution: Allowed payers must have bank account details and not VPA.

The bank account IFSC field is required when the bank is present ( in allowed payers)
* code: 400
* description: This error occurs when you do not pass the IFSC code in the request.
* solution: Provide IFSC code for the allowed payers bank account.

Invalid IFSC OR IFSC must be 11 Characters
* code: 400
* description: This error occurs when you pass an incorrect IFSC code in the request. An IFSC must be 11 characters.
* solution: Pass the correct IFSC code of the allowed payers bank account.
