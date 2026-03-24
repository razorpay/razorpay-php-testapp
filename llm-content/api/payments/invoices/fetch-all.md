---
title: Fetch All Invoices
description: Fetch the details of all Invoices using this endpoint.
---

# Fetch All Invoices

## Fetch All Invoices

Use this endpoint to retrieve the details of all invoices.

### Request

@include invoices-api/fetch-req

### Response

@include invoices-api/fetch-res

### Parameters

@include invoices-api/fetch-query-param

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
