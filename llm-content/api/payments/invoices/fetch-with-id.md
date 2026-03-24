---
title: Fetch an Invoice With ID
description: Fetch the details of an Invoice using this endpoint.
---

# Fetch an Invoice With ID

## Fetch an Invoice With ID

Use this endpoint to retrieve all the details of an invoice.

### Request

@include invoices-api/fetch-id-req

### Response

@include invoices-api/fetch-id-res

### Parameters

@include invoices-api/path-param

### Parameters

@include invoices-api/response-param

### Errors

The API `` provided is invalid.
* code: 4xx
* description: The API key or secret are not entered or an invalid API key is used.
* solution: Use and enter the correct API details while executing the API.

The id provided does not exist.
* code: 400
* description: The invoice id entered is either invalid or does not belong to the requester account.
* solution: Enter a valid invoice id.
