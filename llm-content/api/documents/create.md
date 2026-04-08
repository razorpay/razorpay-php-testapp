---
title: Create a Document
description: Create a Document using Razorpays API.
---

# Create a Document

## Create a Document

Use this endpoint to upload a document onto the Razorpay ecosystem. After a document is successfully uploaded, the corresponding document id (present in response) can be provided in cases such as dispute evidence submission.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST 'https://api.razorpay.com/v1/documents' \
-H "Content-Type: multipart/form-data" \
-F 'purpose=dispute_evidence' \
-F 'file=@/Users/your_name/sample_uploaded.jpeg'

```java: Java

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject request = new JSONObject();
request.put("file", "/Users/your_name/Downloads/sample_uploaded.jpeg");
request.put("purpose", "dispute_evidence");

Document document = instance.document.create(request);

```python: Python

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

file = open("/Users/your_name/Downloads/sample_uploaded.jpeg", "rb")

x = client.document.create({"file": file, "purpose": "dispute_evidence"})

```php: PHP

$api = new Api($key_id, $secret);

$payload = array(
    'file'=> '/Users/your_name/Downloads/sample_uploaded.pdf'
    "purpose" => "dispute_evidence");

$api->document->create($payload);

```ruby: Ruby

require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Document.create({
  "file": File.new("/Users/your_name/Downloads/sample_uploaded.jpeg"),
  "purpose": "dispute_evidence"
});

```javascript: Node.js

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var formData = {
	'file': {
		'value': fs.createReadStream('/Users/your_name/Downloads/sample_uploaded.pdf'),
		'options': {
			'filename': 'sample_uploaded.pdf',
			'contentType': null
		}
	},
	'purpose': 'dispute_evidence'
};

instance.documents.create(formData);

```go: Go

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

filePath := "/Users/your_name/Downloads/sample_uploaded.jpeg"
  file, err := os.Open(filePath)

 fields := map[string]string{
     "purpose": "dispute_evidence",
 }

 params := requests.FileUploadParams{
     File:   file,
     Fields: fields,
 }
 ```

### Response

```json: Success
{
  "id": "doc_EsyWjHrfzb59Re",
  "entity": "document",
  "purpose": "dispute_evidence",
  "name": "doc_19_12_2020.jpg",
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
* code: 401
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.- Different keys for test mode and live modes.
- Expired API key.

* solution: The API keys must be active and entered correctly with no whitespace before or after the keys.
