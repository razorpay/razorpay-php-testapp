---
title: Fetch Terms and Conditions | Sub-Merchant Onboarding APIs
heading: Fetch Terms and Conditions
description: Fetch Terms and Conditions for a Sub-Merchant using Razorpay Partners APIs.
---

# Fetch Terms and Conditions

## Fetch Terms and Conditions

Use this endpoint to retrieve the terms and conditions of a sub-merchant. Know about the [various error responses](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/partners/errors.md) for this API.

### Request

```cURL: Curl
curl -u  \
-H "Content-Type: application/json" \
-X GET https://api.razorpay.com/v2/products/payments/tnc \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_ACCESS_TOKEN]");

String productName = "payments";

TncMap tncMap = instance.product.fetchTnc(productName);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ACCESS_TOKEN"))

productName = "payments"

client.product.fetchTnc(productName)

```go: Go

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_ACCESS_TOKEN")
productName := "payments"

body, err := client.Product.FetchTnc(productName, nil, nil)

```php: PHP

$api = new Api($access_token);

$productName = "payments";

$api->product->fetchTnc($productName);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_ACCESS_TOKEN')

productName = "payments"

Razorpay::Product.fetch_tnc(productName)

```js: Node.js

var instance = new Razorpay({ access_token: 'YOUR_ACCESS_TOKEN' })

var productName = "payments";

instance.products.fetchTnc(productName);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_ACCESS_TOKEN]");

string productName = "payments";

Tnc tnc = client.Tnc.Fetch(productName)
```

### Response

```json: Success
{
  "entity": "tnc_map",
  "product_name": "payments",
  "id": "tnc_map_HjOVhIdpVDZ0FB",
  "tnc": {
    "terms": "https://razorpay.com/terms",
    "privacy": "https://razorpay.com/privacy",
    "agreement": "https://razorpay.com/agreement"
  },
  "last_published_at": 1640589653
}
```

### Parameters

`product_name` _mandatory_
: `string` The product family for which the relevant product to be requested for the sub-merchant. Possible value is `payments`.

### Parameters

`entity`
: `string` The name of the entity. Here it is `tnc_map`.

`product_name`
: `string` Determines what business unit the terms and conditions belong to.

`id` 
: `string` Unique identifier of the terms and conditions belonging to a specific business unit.

`tnc`
: `object` The terms and conditions content.

  `terms`
  : `string` The terms and conditions webpage URL.

  `privacy`
  : `string` The privacy policy webpage URL.

  `agreement`
  : `string` The agreement webpage URL.

`last_published_at`
: `integer` The timestamp in Unix format, when the terms and conditions were created/last updated.
