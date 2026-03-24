---
title: Stakeholder Entity
description: Entity parameters and sample code for Stakeholders API.
---

# Stakeholder Entity

The Stakeholder entity has the following parameters:

### Response

```json: Entity
{
  "entity": "stakeholder",
  "relationship": {
    "executive": true
  },
  "phone": {
    "primary": "9000090000",
    "secondary": "9000090000"
  },
  "notes": {
    "random_key_by_partner": "random_value"
  },
  "kyc": {
    "pan": "AVOPB1111K"
  },
  "id": "sth_GLGgm8fFCKc92m",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "percentage_ownership": 10,
  "addresses": {
    "residential": {
      "street": "506, Koramangala 1st block",
      "city": "Bengaluru",
      "state": "Karnataka",
      "postal_code": "560034",
      "country": "IN"
    }
  }
}
```

### Parameters

@include partners-api/stakeholder/entity
