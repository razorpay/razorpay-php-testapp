---
title: 2. Fetch and Manage Tokens
description: Retrieve tokens using Razorpay APIs to create subsequent payments.
---

# 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

Know about about [Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi/integrate.md#fetch-emandate-registration-details).

## 2.1. Fetch Token by Payment ID

@include recurring-payments/upi/token-by-payment

### Path Parameter

@include recurring-payments/fetch-token-pay-path-api

## 2.2. Fetch Tokens by Customer ID

@include recurring-payments/upi/token-by-customer

### Path Parameter

@include recurring-payments/fetch-token-cust-path-api

## 2.3. Delete Tokens

> **WARN**
>
> 
> **Watch Out!**
> 
> Deleting a token removes it from Razorpay's database. The deleted token will not appear on the Dashboard or when all tokens are fetched. However, it does not cancel the mandate. If you wish to cancel the mandate from NPCI, use the [Cancel Token API](#24-cancel-token).
> 

@include recurring-payments/fetch-token-delete-api

  
### Path Parameters

     @include recurring-payments/delete-token-path
    

  
### Response Parameters

    
`deleted`
: `boolean` Indicates whether the token is deleted. Possible values:
    - `true`: The token is deleted successfully.
    - `false`: The token was not deleted.
    

## 2.4. Cancel Token
The following endpoint initiates cancellation of the mandate from NPCI.

/customers/:customer_id/tokens/:token_id/cancel

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X PUT https://api.razorpay.com/v1/customers/cust_1Aa00000000002/tokens/token_1Aa00000000001/cancel
```json: Response
{
      "status": "cancellation_initiated”
}
```

  
### Path Parameters

    
`customer_id` _mandatory_
: `string` The unique identifier of the customer with whom the token is linked. For example, `cust_1Aa00000000002`.

`token_id` _mandatory_
: `string` The unique identifier of the token that is to be cancelled. For example, `token_1Aa00000000001`.
