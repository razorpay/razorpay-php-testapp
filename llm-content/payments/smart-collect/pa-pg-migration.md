---
title: Account Migration - New PA/PG Guidelines
description: Update your setup to work with our new banking partners.
---

# Account Migration - New PA/PG Guidelines

RBI [revised guidelines](https://www.rbi.org.in/scripts/FS_Notification.aspx?Id=11822&fn=9&Mode=0) for PA/PG requires Razorpay to have an escrow account with RBL as banking partner. Existing Customer Identifiers with Yes Bank and ICICI Bank will be shut down, and all banking ops moved to RBL escrow account. Dashboard shows both old and newly created Customer Identifier until Jan 31, 2022.

## API Interface Post Migration

Post migration, new virtual response for Customer Identifier built on Yes Bank/ICICI Bank will contain two objects in receivers array, one for new RBL CI and one for existing Yes Bank/ICICI Bank CI. Confirm new RBL CI by checking IFSC Code `RATN0VAAPIS`.

The following sample response code can be used as a reference:

```json: API Sample Response Code
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "va_IirUUD9dDm4G4i",
      "name": "Test Account",
      "entity": "virtual_account",
      "status": "active",
      "description": "Vishnu Jangid",
      "amount_expected": null,
      "notes": {
        "project_name": "Vishnu Jangid"
      },
      "amount_paid": 0,
      "customer_id": null,
      "receivers": [
        {
          "id": "ba_IirUUYO8caNoK5",
          "entity": "bank_account",
          "ifsc": "YESB0CMSNOC",
          "bank_name": "Yes Bank",
          "name": "Test Account",
          "notes": [],
          "account_number": "2223330053041804"
        },
        {
          "id": "ba_IirUUYO8sh1602",
          "entity": "bank_account",
          "ifsc": "RATN0VAAPIS",
          "bank_name": "RBL Bank",
          "name": "Test Account",
          "notes": [],
          "account_number": "2223330053041804"
        }
      ],
      "close_by": 1681615838,
      "closed_at": null,
      "created_at": 1641997300
    }
  ]
}
```

## Frequently Asked Questions (FAQs)

  
### 1. Does this impact the Customer Identifiers I create?

     All existing Smart Collect merchants who create Customer Identifiers with Yes Bank or ICICI are impacted. Merchants with Customer Identifiers through RBL Bank are not impacted.
    

  
### 2. Are all the Customer Identifiers migrated to RBL Bank?

     Only Customer Identifiers created with Yes Bank and ICICI Bank are migrated to RBL Bank.
    

  
### 3. What is the impact on my Customer Identifiers?

     The Customer Identifiers created with Yes Bank and ICICI bank have been shut down on 31st January 2022. Post that, transfer of any funds to these Customer Identifiers are not being processed.
    

  
### 4. What if I specifically want a Customer Identifier with Yes Bank or ICICI Bank?

     Due to revised guidelines, we do not support issuing Customer Identifiers with Yes Bank or ICICI Bank.
    

  
### 5. Can I continue using my existing Customer Identifiers?

     After 31st January 2022, you cannot receive payments on the existing Customer Identifiers.
    

  
### 6. What actions do I need to take?

    - The account number and/or IFSC codes for all impacted Customer Identifiers change.
    - You must inform your customers so they can add the new Customer Identifiers as beneficiaries for NEFT/IMPS/RTGS payments.
    - Until 31st January 2022, incoming payments were being received on both old and new Customer Identifiers.
    - Post 31st January 2022, fund transfers to old Customer Identifiers are not being processed.
    

### Related Information
- [Razorpay Smart Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md)
- [How Smart Collect Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/how-it-works.md)
- [Customer Identifier States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/states.md)
- [Smart Collect APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md)
- [Subscribe to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/subscribe-to-webhooks.md)
