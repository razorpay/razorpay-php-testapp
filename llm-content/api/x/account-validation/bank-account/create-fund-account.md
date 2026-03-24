---
title: Create a Fund Account of Type Bank Account
description: Create a Fund Account of the type bank account via API.
---

# Create a Fund Account of Type Bank Account

## Create a Fund Account of Type Bank Account

Use this endpoint to create a fund account with bank account details.- A new fund account is created if any combination of the following details is unique: `contact_id`, `bank_account.name`, `bank_account.ifsc` and `bank_account.account_number`.
- If **all** the above details match the details of an existing fund account, the API returns details of the existing fund account.
- You cannot edit the details of a fund account.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/fund_accounts \
-H "Content-Type: application/json" \
-d '{
  "contact_id":"cont_00000000000001",
  "account_type":"bank_account",
  "bank_account":{
    "name":"Gaurav Kumar",
    "ifsc":"HDFC0000053",
    "account_number":"765432123456789"
  }
}'
```

### Response

```json: Success
{
  "id" : "fa_00000000000001",
  "entity": "fund_account",
  "contact_id" : "cont_00000000000001",
  "account_type": "bank_account",
  "bank_account": {
    "ifsc": "HDFC0000053",
    "bank_name": "HDFC Bank",
    "name": "Gaurav Kumar",
    "account_number": "765432123456789",
    "notes": []
  },
  "active": true,
  "batch_id": null,
  "created_at": 1543650891
}
```

### Parameters

@include rzpx/fund-accounts/fund-account-create-bank-req

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res
