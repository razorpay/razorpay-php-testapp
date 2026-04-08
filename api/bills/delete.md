---
title: Delete a Bill
description: Delete Bills with this endpoint.
---

# Delete a Bill

## Delete a Bill

Use this endpoint to delete a Bill.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X DELETE https://api.razorpay.com/v1/bills/bill_4a5e9ulyzk1mk2
```

### Response

```json: Success
{"status": "deleted"}

```json: Failure
{
  "error": {
    "code": "UNAUTHORISED",
    "description": "client not authorised to update",
    "field": null,
    "source": "business",
    "step": "authentication",
    "reason": "unauthorised",
    "metadata": {}
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the bill that must be deleted.

### Errors

client not authorised to update
* code: 401
* description: The client credentials are unauthorised to make changes to this bill.
* solution: Use authorised credentials to make changes to the bill.

Operation failed
* code: 500
* description: There is an internal server error
* solution: There is a server issue. Raise a support ticket with us to get this resolved.
