---
title: Fetch Document Information
description: Fetch Document Information using Razorpays API.
---

# Fetch Document Information

## Fetch Document Information

Use this endpoint to retrieve the details of any document that was uploaded earlier.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/documents/doc_EsyWjHrfzb59Re

```java: Java

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String documentId = "doc_EsyWjHrfzb59Re";

Document document = instance.document.fetch(documentId);

```python: Python

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

documentId = "doc_NiyXWXXXXXXXXX"

client.document.fetch(documentId)

```php: PHP

$api = new Api($key_id, $secret);

$documentId = "";

$api->document->fetch($documentId);

```ruby: Ruby

require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

documentId = "doc_NiyXWXXXXXXXXX"

Razorpay::Document.fetch(documentId)

```javascript: Node.js

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var documentId = "doc_EsyWjHrfzb59Re";

instance.documents.fetch(documentId);

```go: Go

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

documentId = "doc_NiyXWXXXXXXXXX"

body, err := client.Document.Fetch(documentId, nil, nil)
```

### Response

```json: Success
{
  "id": "doc_EsyWjHrfzb59Re",
  "entity": "document",
  "purpose": "dispute_evidence",
  "name": "file_19_18_2020.jpg",
  "mime_type": "image/png",
  "size": 2863,
  "created_at": 1590604200
}
```json: Failure
{
  "error":{
    "status_code": 401,
    "description":"The API `` provided is invalid.",
    "code":"BAD_REQUEST_ERROR"
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the document.

### Parameters

`id`
: `string` The unique identifier of the document uploaded.

`entity`
: `string` Indicates the type of entity. In this case, it is `document`.

`purpose`
: `string` The reason you are uploading this document. Here, it is `dispute_evidence`.

`size`
: `integer` Indicates the size of the document in bytes.

`mime_type`
: `string` Indicates the nature and format in which the document is uploaded. Possible values include:
  - image/jpg
  - image/jpeg
  - image/png
  - application/pdf

`created_at`
: `integer` Unix timestamp at which the document was uploaded.

### Errors

The API `` provided is invalid.
* code: 400
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.- Different keys for test mode and live modes.
- Expired API key.

* solution: The API keys must be active and entered correctly with no whitespace before or after the keys.

_id is not a valid id.
* code: 400
* description: - The id is not 14 characters long.
- The id is not alphanumeric.

* solution: Use a valid document id.
