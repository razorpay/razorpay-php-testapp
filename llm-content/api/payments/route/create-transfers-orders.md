---
title: Create Transfers From Orders
description: Initiate Transfers when creating an Order using the Razorpay API.
---

# Create Transfers From Orders

## Create Transfers From Orders

Use this endpoint to set up transfer of funds while creating an order. This can be done by passing the transfers parameters as part of the request body.

- You cannot create transfers on orders which has the `partial_payment` parameter enabled. Ensure that this parameter is set to `0`.
- You cannot create transfers on orders for international currencies. Currently, this feature only supports orders created using INR.

### Request

@include route/api/transfer-via-order-code

### Response

@include route/api/transfer-via-order-res-code

### Parameters

@include route/api/transfer-via-order

### Parameters

@include route/api/transfer-via-order-res

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
The amount must be at least INR 1.00
* code: 400
* description: This error occurs when the amount is less than the minimum amount. The transaction amount expressed in the currency subunit, such as paise (in INR) should always be greater than or equal to 100.
* solution: Make sure the amount is equal to or greater than the minimum amount of ₹100.

The input field is required
* code: 400
* description: This error occurs when a mandatory field is empty.
* solution: Make sure to fill in all the mandatory fields.

The currency should be INR for transfers
* code: 400
* description: This error occurs when the currency is anything other than `INR`.
* solution: Ensure the currency value is `INR` as we support only `INR` for Route transactions.

Keys sent in linked_account_notes must exist in notes
* code: 400
* description: This error occurs when there is a mismatch between the key passed in the `linked_account_notes` array and the key from the `notes` object.
* solution: Make sure the key passed in the `linked_account_notes` array always matches the key from the `notes` object.

on_hold_until must be between 946684800 and 4765046400
* code: 400
* description: This error occurs when the time stamp provided for the `on_hold_until` entity is not correct or if it is not between `946684800` and `4765046400`.
* solution: Make sure to enter the relevant `on_hold_until` entity time stamp. It should also be within the time `946684800` and `4765046400`.

input is an invalid account_code.
* code: 400
* description: This error occurs when the `account_code` passed is invalid or does not belong to the requested merchant.
* solution: Make sure to pass the valid `account_code`.

Transfer cannot be made due to insufficient balance
* code: 400
* description: This error occurs when the total balance is less than or equal to the transfer amount.
* solution: Make sure you have enough balance. You can also [add funds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/balances#add-funds-to-your-reserve-balance.md) to the account and then try doing the transfer.

The sum of amount requested for transfer is greater than the captured amount
* code: 400
* description: This error occurs when the total transferred amount exceeds the captured payment amount.
* solution: Make sure the transfer amount is less than the captured payment.
