---
title: Terms and Conditions Entity
description: Entity parameters and sample code for Terms and Conditions API.
---

# Terms and Conditions Entity

The Terms and Conditions entity has the following parameters:

### Response

```json: Entity
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
