---
title: Delete an Invoice
description: Delete an invoice using this endpoint.
---

# Delete an Invoice

## Delete an Invoice

Use this endpoint to delete invoices. You can only delete an invoice that is in the `draft` state. 

### Request

@include invoices-api/delete-req

### Response

@include invoices-api/delete-res

### Parameters

@include invoices-api/path-param

### Errors

Operation not allowed for Invoice in cancelled status.
* code: 400
* description: You are trying to delete an invoice that is not in the `Draft` status.
* solution: Try deleting an invoice in `Draft`status.
