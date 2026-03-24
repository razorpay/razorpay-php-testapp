---
title: Issue an Invoice
description: Issue an invoice using this endpoint.
---

# Issue an Invoice

## Issue an Invoice

Use this endpoint to issue invoices to your customers. Only an invoice in the `draft` state can be issued.

### Request

@include invoices-api/issue-req

### Response

@include invoices-api/issue-res

### Parameters

@include invoices-api/path-param

### Parameters

@include invoices-api/response-param

### Errors

The API `` provided is invalid.
* code: 400
* description: There is a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: - Ensure that the API Keys are active and entered correctly.
- There should be no whitespaces before or after the keys.

line_items is required.
* code: 400
* description: Items and customer details are missing.
* solution: Add items and customer details.

Operation not allowed for Invoice in issued status.
* code: 400
* description: You are trying to issue an invoice that is already issued.
* solution: Issue an invoice in the draft state.

The id provided does not exist.
* code: 400
* description: There is an error in the invoice id. It may be incorrect or invalid.
* solution: Check that you have entered a valid invoice id.
