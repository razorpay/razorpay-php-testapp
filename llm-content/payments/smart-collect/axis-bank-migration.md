---
title: Account Migration - Axis Bank
description: Update your setup to work with our new banking partners.
---

# Account Migration - Axis Bank

To continue delivering the best services, we are switching our banking partner in Smart Collect. This upgrade will help us deliver a superior experience with bank transfers. 

## 1. Account Migration - Change in IFSC Code for Existing Customer Identifiers 

Your existing Smart Collect Customer Identifiers will undergo a transition to our new banking partner, Axis Bank. Though the account number associated with these customer identifiers remains unchanged, the previous IFSC code will be replaced with a new one. You must communicate this change to your customers, directing them to use the updated IFSC code for subsequent payments.

The migration process will encompass all current Customer Identifiers. Post-migration, the new IFSC code will be displayed on the Dashboard and provided through the API alongside a reference to the original IFSC code.

> **WARN**
>
> 
> **Watch Out!**
> 
> Transfers using IMPS mode via PSP apps (such as Google Pay, PhonePe etc.) are not supported for recipients with Axis Bank virtual bank accounts.
> 

## 2. New Customer Identifier Creation With Axis Bank

Going forward, all new Customer Identifiers for unregulated merchants will be created with Axis Bank as the banking partner. All new Customer Identifiers created with Axis Bank will have no dormancy and will remain active until you close them.

> **WARN**
>
> 
> **Watch Out!**
> 
> Notify your customers with your Customer Identifiers that they can add a new beneficiary with updated IFSC code, but the same bank account number.
> 

## Impact Overview

1. All active Customer Identifiers will be migrated from RBL Bank to Axis Bank within 2 days from the date of confirmation from your side.
    1. The Bank Account number will stay the same.
    2. The IFSC code will be changed to `UTIB000RAZP`.
2. All new Customer Identifiers will be created with Axis Bank as the banking partner.
3. Inform your customers using your Customer Identifiers about the newly migrated Customer Identifier details, which retains the same bank account number but features an updated IFSC code.

> **WARN**
>
> 
> **Watch Out!**
> 
> Post **30th September 2024**, the IFSC Code for all newly issued Customer Identifiers will be `UTIB000RAZP`. The account number will stay the same.
> 

## API Interface

The updated API response will include two entries in the receiver's array: 
1. The former RBL Bank Customer Identifier
2. The new Axis Bank Customer Identifier. 

To verify the new Axis Customer Identifier, look for the IFSC Code `UTIB000RAZP`.

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
          "ifsc": "RATN0VAAPIS",
          "bank_name": "RBL Bank",
          "name": "Test Account",
          "notes": [],
          "account_number": "2223330053041804"
        },
        {
          "id": "ba_IirUUYO8sh1602",
          "entity": "bank_account",
          "ifsc": "UTIB000RAZP",
          "bank_name": "Axis Bank",
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

## Dashboard Interface

After the migration, you can view the previous and updated Customer Identifier details by selecting the Customer Identifier. While the new identifier maintains the same account number, its IFSC code has been changed to `UTIB000RAZP`.

![Customer Identifier Dasboard view post migration.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sc-migration-axis.jpg.md)

## Frequently Asked Questions

    
### 1. What changes can I expect in the Customer Identifiers, and what information should I communicate to my customers?

         The main change in the Customer Identifiers will be the IFSC code, which will update to `UTIB000RAZP`, even though the account number remains the same. You should inform your customers about this updated IFSC code while emphasising that the account number remains unchanged.
        

    
### 2. When is the shutdown date for the old Customer Identifiers?

         Shutdown for all merchants will happen soon.
        

    
### 3. How will I identify the new Bank Account details in the API response?

         The IFSC code serves as an identifier for the new bank account. In the API response, all new Customer Identifiers will display `UTIB000RAZP` as their IFSC code.
