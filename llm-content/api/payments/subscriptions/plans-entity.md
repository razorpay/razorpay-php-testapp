---
title: Plans Entity
description: Know about the Plan entity and the associated parameter descriptions.
---

# Plans Entity

## Plans Entity

The Plans entity has the following parameters.

### Response

```json: Entity
{
  "entity":"collection",
  "count":2,
  "items":[
    {
      "id":"plan_00000000000008",
      "entity":"plan",
      "interval":1,
      "period":"weekly",
      "item":{
        "id":"item_00000000000005",
        "active":true,
        "name":"Test plan - Monthly",
        "description":"Description for the test plan - Monthly",
        "amount":89900,
        "unit_amount":89900,
        "currency":"",
        "type":"plan",
        "unit":null,
        "tax_inclusive":false,
        "hsn_code":null,
        "sac_code":null,
        "tax_rate":null,
        "tax_id":null,
        "tax_group_id":null,
        "created_at":1580220461,
        "updated_at":1580220481
      },
      "notes":{
        "notes_key_1":"Tea, Earl Grey, Hot",
        "notes_key_2":"Tea, Earl Grey… decaf."
      },
      "created_at":1580220481
    },
    {
      "id":"plan_00000000000009",
      "entity":"plan",
      "interval":1,
      "period":"monthly",
      "item":{
        "id":"item_00000000000002",
        "active":true,
        "name":"Test plan - Annual",
        "description":null,
        "amount":79900,
        "unit_amount":79900,
        "currency":"",
        "type":"plan",
        "unit":null,
        "tax_inclusive":false,
        "hsn_code":null,
        "sac_code":null,
        "tax_rate":null,
        "tax_id":null,
        "tax_group_id":null,
        "created_at":1580220493,
        "updated_at":1580220493
      },
      "notes":[
        
      ],
      "created_at":1580220493
    }
  ]
}
```

### Parameters

`id`
: `string` The unique identifier linked to a plan. This is used when creating a Subscription for customers.

`entity`
: `string` The entity being created. Here, it is `plan`.

`interval`
: `integer` This, combined with `period`, defines the frequency. If the billing cycle is 2 months, the value should be `2`.
  
> **INFO**
>
> 
>   **Handy Tips**
> 
>   For daily plans, the minimum value should be `7`.
>   
 

`period`
: `string` This, combined with `interval`, defines the frequency. Possible values:
    - `daily`
    - `weekly`
    - `monthly`
    - `quarterly`
    - `yearly`

  If the billing cycle is 2 months, the value should be `monthly`.

  

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   We allow custom frequencies while creating a plan (for example, once in 3 weeks).
>   - For UPI, all undefined frequencies except `daily`, `weekly`, `monthly`, `quarterly` and `yearly` are considered `as-presented`.
>   - For domestic cards, all undefined frequencies except `weekly`, `monthly` and `yearly` are considered `as-presented` while registering the mandate with banks.
>   

  

`item`
: `object` Details of the plan.

    `id`
    : `string` The unique identifier linked to an item. For example, `item_00000000000001`.

    `name`
    : `string` Name of the plan. For example, `Test Plan`.

    `amount`
    : `integer` Amount for the plan. When you use this plan to create a Subscription, the customer will be charged this amount periodically. 
    
    
    
    In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of `295.991`, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as `295`.

      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>       

    

    `currency`
    : `string` Currency for the payment. Defaults to `INR`. 
    
    
    
    You can accept payment in any of the  [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

      
> **INFO**
>
> 
> 
>       **Handy Tips**
> 
>       Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>       

    

    `description`
    : `string` Description of the plan. For example, `Description of the test plan`.

`notes`
: `object` Notes you can enter for the contact for future reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Monthly Gym"`.

`created_at`
: `integer` The Unix timestamp at which the plan was created.
