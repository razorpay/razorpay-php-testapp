---
title: Create an Order With Product Details
description: Create an Order with the transaction details and the domain-specific product details.
---

# Create an Order With Product Details

/v1/orders

Use this endpoint to create an Order with the transaction details and the domain-specific product details.

> **INFO**
>
> 
> **Handy Tips**
> 
> We have an optional feature called **Amount Check**, which will reject your order request if the sum of all the products is not equal to the amount passed in the order. To get this feature enabled, raise a request to our [Support team](https://razorpay.com/support/#request).
> 
> 
> 

  
### Request Parameters

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`. Payment can only be made for this amount against the Order.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. Refer to the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).  

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Can have a maximum length of 40 characters and has to be unique.

`products` _mandatory_
: `array` Details of the products.

    `type` _mandatory_
    : `string` The type of product. Currently, the only supported value is `mutual_fund`.

    `plan` _if type=mutual_fund_ _optional_
    : `string` The name of the mutual fund plan selected by the customer. For example, `GD`.
    

    `folio` _if type=mutual_fund_ _optional_
    : `string` Unique identifier of the customer's account with the mutual fund. For example, `9104927822`.
    

    `amount` _if type=mutual_fund_ _mandatory_
    : `string` The amount paid by the customer for the plan. Sum of the individual cart amount must be equal to total order amount. It must be in paise. For example, `1400`.
    

    `option` _if type=mutual_fund_ _optional_
    : `string` Mutual fund plan option. For example, `G`.

    `scheme` _if type=mutual_fund_ _mandatory for RTA_
    : `string` The type of mutual fund scheme you chose. 
    For example, `LT`, `BP`.
     

    `receipt` _if type=mutual_fund_ _mandatory_
    : `string` Unique reference number (Order Number) generated at the merchant’s name. For example, `77407`.

    `mf_member_id` _mandatory_
    : `string` Unique member id as issued by the mutual fund platform. Can have a maximum length of 20 characters.

    `mf_user_id` _mandatory_
    : `string` Unique user or client id as issued by the mutual fund platform. Can have a maximum length of 10 characters.

    `mf_partner` _mandatory_
    : `string` The mutual fund platform being used to enable the purchase. Possible values are: - `cams`
 - `kfin`
 - `bse`
 - `nse`
 Can have a maximum length of 4 characters.
        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         Do not use values apart from the ones given above. It will not be accepted.
>         

    `mf_investment_type` _mandatory_
    : `string` The type of investment. Possible values are: - `L`: Lump sum
 - `S`: SIP
 Can have a maximum length of 7 characters.

    `mf_amc_code` _mandatory for RTA_
    : `string` The AMC code for the mutual fund. Can have a maximum length of 5 characters. [List of possible values](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/products/appendix.md).
    

  
### Response Parameters

`id`
: `string` The unique identifier of the order.

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

`currency`
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

`products` _mandatory_
: `array` Details of the products.

    `type` _mandatory_
    : `string` The type of product. Currently, the only supported value is `mutual_fund`.

    `plan` _if type=mutual_fund_ _optional_
    : `string` The name of the mutual fund plan selected by the customer. For example, `GD`.
    

    `folio` _if type=mutual_fund_ _optional_
    : `string` Unique identifier of the customer's account with the mutual fund. For example, `9104927822`.
    

    `amount` _if type=mutual_fund_ _mandatory_
    : `string` The amount paid by the customer for the plan. Sum of the individual cart amount must be equal to total order amount. It must be in paise. For example, `1400`.
    

    `option` _if type=mutual_fund_ _optional_
    : `string` Mutual fund plan option. For example, `G`.

    `scheme` _if type=mutual_fund_ _mandatory for RTA_
    : `string` The type of mutual fund scheme you chose. 
    For example, `LT`, `BP`.
     

    `receipt` _if type=mutual_fund_ _mandatory_
    : `string` Unique reference number (Order Number) generated at the merchant’s name. For example, `77407`.

    `mf_member_id` _mandatory_
    : `string` Unique member id as issued by the mutual fund platform. Can have a maximum length of 20 characters.

    `mf_user_id` _mandatory_
    : `string` Unique user or client id as issued by the mutual fund platform. Can have a maximum length of 10 characters.

    `mf_partner` _mandatory_
    : `string` The mutual fund platform being used to enable the purchase. Possible values are: - `cams`
 - `kfin`
 - `bse`
 - `nse`
 Can have a maximum length of 4 characters.
        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         Do not use values apart from the ones given above. It will not be accepted.
>         

    `mf_investment_type` _mandatory_
    : `string` The type of investment. Possible values are: - `L`: Lump sum
 - `S`: SIP
 Can have a maximum length of 7 characters.

    `mf_amc_code` _mandatory for RTA_
    : `string` The AMC code for the mutual fund. Can have a maximum length of 5 characters. [List of possible values](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/products/appendix.md)
