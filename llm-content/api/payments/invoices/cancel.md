---
title: Cancel an Invoice
description: Cancel an invoice using this endpoint.
---

# Cancel an Invoice

## Cancel an Invoice

Use this endpoint to cancel an invoice. Invoices in the `paid` state cannot be cancelled.

### Request

@include invoices-api/cancel-req

### Response

@include invoices-api/cancel-res

### Parameters

@include invoices-api/path-param

### Parameters

@include invoices-api/response-param

### Errors

Operation not allowed for Invoice in cancelled status.
* code: 400
* description: You are trying to cancel an invoice which is already in the cancelled status.
* solution: You can only cancel an unpaid issued invoice.
