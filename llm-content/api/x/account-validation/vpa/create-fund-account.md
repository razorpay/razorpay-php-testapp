---
title: Create a Fund Account of Type VPA
description: Create a Fund Account of the type VPA via API.
---

# Create a Fund Account of Type VPA

## Create a Fund Account of Type VPA

Use this endpoint to create a fund account with VPA details.- A new fund account is created if any combination of the following details is unique: `contact_id` and `vpa.address`.
- If **all** the above details match the details of an existing fund account, the API returns details of the existing fund account.
- You cannot edit the details of a fund account.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/fund_accounts \
-H "Content-Type: application/json" \
-d '{
  "account_type":"vpa",
  "contact_id":"cont_00000000000001",
  "vpa":{
    "address":"gaurav.kumar@exampleupi"
  }
}'
```

### Response

```json: Success
{
  "id": "fa_00000000000002",
  "entity": "fund_account",
  "contact_id": "cont_00000000000001",
  "account_type": "vpa",
  "vpa": {
    "username": "gaurav.kumar",
    "handle": "exampleupi",
    "address": "gaurav.kumar@exampleupi"
  },
  "active": true,
  "batch_id": null,
  "created_at": 1545223741
}
```

### Parameters

@include rzpx/fund-accounts/fund-account-create-vpa-req

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res
