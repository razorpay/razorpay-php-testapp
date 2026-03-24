---
title: Products
description: Send additional information regarding products added by customers to their carts using the Products API.
---

# Products

You can now store additional information on the products that customers add to their cart while shopping on your website or app, using the Products API. 

The Products API is based on the Orders API and uses the same endpoint. Along with the existing Orders parameters, you must use the `products` array to pass additional, domain-specific product information such as type, price, and so on. 

## List of Endpoints

API Endpoint | Description
---
[Create an Order with Product Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/products/create-with-details.md) | Creates an Order with the transaction details and the domain-specific product details.
---
[Create a Payment Link with Product Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/products/create-pl-with-details.md) | Create a Payment Link to store additional information about the products purchased by customers while accepting payments using Payment Links Third-Party Validation.

## Product Entity

The product parameters vary based on its `type`. Right now, only `mutual_fund` is supported. 

### Type: Mutual Funds

Businesses in this sector can use the `products` array to detail mutual fund investments in one order.

> **WARN**
>
> 
> **Watch Out!**
> 
> - SEBI mandates Razorpay to report investments for Stock Brokers and Mutual Fund Distributors. Some details are thus mandatory. But for AMCs or Exchange platforms, these parameters are optional.
> - Always include mandatory parameters as required by the receiving entity. Razorpay won't validate them, and missing parameters can lead to transaction rejection.
> 

### Other Product Types

The `products` array allows businesses to detail customer purchases in one order.

> **INFO**
>
> 
> **Handy Tips**
> 
> Currently, only `mutual_funds` is supported. To request other types, contact our [Support team](https://razorpay.com/support/#request).
> 

The `products` array has the following parameters:

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
: `string` Unique Member ID as issued by the mutual fund platform. Can have a maximum length of 20 characters.

`mf_user_id` _mandatory_
: `string` Unique User or Client ID as issued by the mutual fund platform. Can have a maximum length of 10 characters.

`mf_partner` _mandatory_
: `string` The mutual fund platform being used to enable the purchase. Possible values are: - `cams`
 - `kfin`
 - `bse`
 - `nse`
 Can have a maximum length of 4 characters.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   Do not use values apart from the ones given above. It will not be accepted.
>   

`mf_investment_type` _mandatory_
: `string` The type of investment. Possible values are: - `L`: Lump sum
 - `S`: SIP
 Can have a maximum length of 7 characters.

`mf_amc_code` _mandatory for RTA_
: `string` The AMC code for the mutual fund. Can have a maximum length of 5 characters. [List of possible values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/products/appendix.md).

```json: Sample Entity 
{
  "products": [
    {
      "type": "mutual_fund",
      "plan": "GD",
      "folio": "9104927822",
      "amount": "1400",
      "option": "G",
      "scheme": "LT",
      "receipt": "77407",
      "mf_member_id": "123445",
      "mf_user_id": "77407",
      "mf_partner": "cams",
      "mf_investment_type": "L",
      "mf_amc_code": "UTB"
    },
    {
      "type": "mutual_fund",
      "plan": "SS",
      "folio": "414117335676",
      "amount": "2400",
      "option": "G",
      "scheme": "BP",
      "receipt": "77407",
      "mf_member_id": "990445",
      "mf_user_id": "99407",
      "mf_partner": "kfin",
      "mf_investment_type": "S",
      "mf_amc_code": "MIR"
    }
  ]
}
```
