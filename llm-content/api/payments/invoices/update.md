---
title: Update an Invoice
description: Update the details of the Invoice using this endpoint.
---

# Update an Invoice

## Update an Invoice

Use this endpoint to update the details of the invoice.

The following table displays ths updates allowed as per invoice states:

Status | Parameter Update Allowed
---
Draft | All parameters can be updated including the line items. You can also add new line items.
---
Issued | You can update the following parameters: - `partial_payment`
- `receipt`
- `comment`
- `terms`
- `notes`
- `expire_by`

---
Cancelled | Only `notes` can be updated.
---
Expired | Only `notes` can be updated.
---
Partially Paid | Only `notes` can be updated.
---
Paid | Only `notes` can be updated.

### Request

@include invoices-api/update-req

### Response

@include invoices-api/update-res

### Parameters

@include invoices-api/path-param

### Parameters

`type`
: `string` Indicates the type of entity. Here, it is `invoice`.

`description`
: `string` A brief description of the invoice.

`draft`
: `string` Invoice is created in `draft` state when value is set to `1`.

`customer_id`
: `string` You can pass the `customer_id` in this field, if you are using the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md). If not, you can pass the customer object described in the below fields.

`customer`
: `object` Customer details.

    `name` _mandatory_
    : `string` Customer's name. Alphanumeric, with period (.), apostrophe (') and parentheses allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

    `email` _optional_
    : `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

    `contact` _optional_
    : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

    `billing_address` 
    : `object` The customer's billing address.

      `line1` _mandatory_
      : `string` The first line of the customer's address.

      `line2` _optional_
      : `string` The second line of the customer's address.

      `city` _mandatory_
      : `string` The city

      `zipcode` _mandatory_
      : `string` The zipcode

      `state` _mandatory_
      : `string` The state

      `country` _mandatory_
      : `string` The country

    `shipping_address`
    : `object` The customer's shipping address.

      `line1` _mandatory_
      : `string` The first line of the customer's address.

      `line2` _optional_
      : `string` The second line of the customer's address.

      `city` _mandatory_
      : `string` The city

      `zipcode` _mandatory_
      : `string` The zipcode

      `state` _mandatory_
      : `string` The state

      `country` _mandatory_
      : `string` The country

`line_items`
: `object` Details of the line item that is billed in the invoice. Maximum of 50 line items.

    `item_id` _conditionally mandatory_
    : `string` If you are using the [Items API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices/create-item.md), you may use an existing item. You can choose to override details such as name, description by passing these along with `item_id`. While the invoice will show the updated details, the existing item will not be updated. This parameter is mandatory if you are not going to use any other parameter in the array.

    `name` _conditionally mandatory_
    : `string` The item name. Mandatory if `item_id` is not provided.

    `description` _optional_
    : `string` A brief description of the item.

    `amount` _conditionally mandatory_
    : `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is , pass the value as `30000`. Mandatory if `item_id` is not provided. In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as `295`.

      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>       

    `currency` _optional_
    : `string` The currency associated with the item. Defaults to `INR`. Know about the [list of supported international currencies.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies) This should match invoice currency.

      
> **INFO**
>
> 
> 
>       **Handy Tips**
> 
>       Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>       

    `quantity` _optional_
    : `integer` The number of units of the item billed in the invoice. Defaults to `1`.

`expire_by`
: `integer` Timestamp, in Unix format, at which the invoice will expire.

`sms_notify`
: `boolean` Defines who handles the SMS notification. Possible values:
  - `true` (default): Razorpay sends the notification to the customer.
  - `false`: You send the notification to the customer.

`email_notify`
: `boolean` Defines who handles the email notification. Possible values:
  - `true` (default): Razorpay sends the notification to the customer.
  - `false`: You send the notification to the customer.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`currency`
: `string` The currency associated with the invoice. You must mandatorily pass this parameter if accepting international payments. If you have passed `currency` as a sub-parameter in the `line_item` object, you must ensure that the same currency is passed in both places. Know about the [list of supported international currencies.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies)

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

### Parameters

@include invoices-api/response-param

### Errors

The api key provided is invalid
* code: 400
* description: The API key or secret are not entered or an invalid API key is used.
* solution: Use and enter the correct API details while executing the API.
 
customer, line_items, sms_notify, email_notify, draft, date is/are not required and should not be sent
* code: 400
* description: The mentioned parameters are not required for updating an invoice.
* solution: Pass only the required parameters in the Update Invoice API.

The amount field is required when item id is not present.
* code: 400
* description: Only name is entered without item id or amount.
* solution: Provide either the item id or the amount with the name.

The name field is required when item id is not present.
* code: 400
* description:  Possible reasons: - Only the amount field is entered without a name or item id.
- The amount, name or item id are not entered.

* solution: Provide the name field of the item when passing the amount.
