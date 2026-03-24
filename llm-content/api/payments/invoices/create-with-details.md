---
title: Create an Invoice With Customer Details
description: Create an Invoice with basic details such as name and billing address.
---

# Create an Invoice With Customer Details

## Create an Invoice With Customer Details

Use this endpoint to create an invoice using details such as `name`, `billing_address` and `shipping_address`. 

> **INFO**
>
> 
> **Handy Tips**
> 
> You cannot create GST compliant invoices using APIs. This means you cannot add the following to the invoice when creating an invoice via APIs:

> - tax rate
> - cess
> - HSN code
> - SAC code
> 

### Request

@include invoices-api/create-req-details

### Response

@include invoices-api/create-res-details

### Parameters

@include invoices-api/create-req-param

### Parameters

@include invoices-api/response-param

### Errors

The API `` provided is invalid.
* code: 4xx
* description: The API key or secret are not entered or an invalid API key is used.
* solution: Use and enter the correct API details while executing the API.

customer is required.
* code: 400
* description: An invoice is issued without adding customer details.
* solution: Ensure that the customer details are entered.

the merchant doesn't have international activated.
* code: 400
* description: The line_items object has an international currency set. For example, USD, is not enabled for your account.
* solution: Ensure that your account has international payments enabled.

Currency of all items should be the same as of the invoice.
* code: 400
* description: There is a difference in currency entered between `line_items` and invoice currency.
* solution: Ensure that the `line_items` currency matches that of the invoice.

expire_by should be at least 15 minutes after current time.
* code: 400
* description: The expiry date is before or within 15 minutes of the current time
* solution: Ensure that the Expiry date is greater than the (current time + 15 minutes). For example, if the current time is 1 pm, the expiry date must be at least 1.15 pm.

line_items is required.
* code: 400
* description: A mandatory field is empty.
* solution: Ensure that you fill all the mandatory fields.
