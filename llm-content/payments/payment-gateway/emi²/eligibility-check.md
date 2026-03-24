---
title: Eligibility Check API
description: Check if the customer is eligible for EMI² payment instruments using the Eligibility Check API.
---

# Eligibility Check API

Use the Eligibility Check API to verify your customer's eligibility for EMI²-related payment instruments such as Debit Card EMI, Cardless EMI, and Pay Later. This check helps you display only relevant payment methods to your customers, reducing the chances of failed transactions.

> **WARN**
>
> 
> **Watch Out!** 
> 
> This is an on-demand feature. Please raise a request with us at [ affordability-widget@razorpay.com](mailto:affordability-widget@razorpay.com) to get this feature activated.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can check customer and transaction eligibility only for Debit Card EMI, Cardless EMI and Pay Later, not for Credit Card EMI.
> - You can perform the eligibility check on methods and instruments enabled for your account. Know how to [check the payment methods enabled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md#view-payment-methods) for your account.
> 

## Use Case

Before your customer navigates to the checkout, you can do an eligibility check on all the available EMI² instruments and display only those that apply to the customer. This helps reduce payment failures and drop-offs and enhances the customer experience.

## Eligibility Check States

Following are the various states of an eligibility check:

![Different states of the eligibility check process](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/affordability-eligibility-check.jpg.md)

States | Description
---
`pending` | When you check eligibility, it stays in the `pending` state if the provider does not respond within the expected time.
---
`eligible` | When the eligibility check is successful, and the provider approves the customer for the required order amount.
---
`ineligible` | When the eligibility check is successful, the provider does not approve the customer for the required order amount.
---
`failed` | When the eligibility check fails, it can be re-attempted via a new request. 

## Eligibility Check Entity 

The eligibility check entity has the following parameters:

`inquiry` 
: `string` Types of methods or instruments on which eligibility check is required. Possible value is `affordability`.

`currency` 
: `string` A three-letter ISO code for the currency for which you want to accept the payment. Possible value is `INR`. 

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of ₹295, enter `29500`. The customer makes a payment for this amount against the order; hence, eligibility is checked for the amount.

`customer` 
: `object` Customer details.

  `id` 
  : `string` Unique identifier of the customer created using [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md). For example, `cust_1Aa00000000004`.

  `contact` 
  : `string` The customer's phone number. A maximum length of 15 characters, including country code. For example, `+919000090000`.

  `ip` 
  : `string` Customer's IP address from where the order is placed. For example, `105.106.107.108`.

  `referrer` 
  : `string` Referrer header passed by the client's browser.

  `user_agent` 
  : `string` Customer user-agent.

`instruments` 
: `array` Payment Instruments on which eligibility check is performed. Use the `instruments` array to check eligibility on specific methods instruments.

  `method`
  : `string` Payment methods on which eligibility check is performed. Possible values: 
    - `cardless_emi` 
    - `emi`
    - `paylater`

  `provider`
  : `string` List of Cardless EMI providers. Possible values for `cardless_emi`:
    - `hdfc`
    - `icic`
    - `idfb`
    - `kkbk`
    - `earlysalary`
    - `walnut369`

    List of Pay Later providers. Possible values for `paylater`:
    - `lazypay`
    - `paypal`

  `issuer`
  : `string` List of EMI issuers. Possible value is `hdfc`.

  `type`
  : `string` Type of card. Possible value is `debit`.

  `eligibility_req_id`
  : `string` A unique identifier of the eligibility check request on a specific instrument. For example, `elig_F1cxDoHWD4fkQt`.

  `eligibility`
  : `object` Defines the customer's eligibility status and shows the associated error code in case of failure.

    `status`
    : `string` Displays the current state of the eligibility check performed on each payment instrument. Possible values:
      - `eligible` 
      - `ineligible`
      - `pending`
      - `failed`

    `error`
    : `object` The error object.

      `code`
      : `string` The type of error.

      `description`
      : `string` Descriptive text about the error.

      `source`
      : `string` Point of failure in a specific operation. For example, customers, businesses, and so on.

      `step`
      : `string` The stage where the error occurred. Stages can vary depending on the payment method.

      `reason`
      : `string` The exact reason for the error.

## Eligibility Check API

You can initiate a request for an eligibility check using the endpoint and the following mandatory parameters: 
- Customer contact details.
- Transaction amount.

customers/eligibility

```curl: Request
-X POST 'https://api.razorpay.com/v1/customers/eligibility' \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H "content-type: application/json"
-d '{
  "inquiry": "affordability",
  "amount": 500000, // mandatory
  "currency": "INR", // mandatory
  "customer": {
    "id": "cust_KhP5dO1dKmc0Rm",
    "contact": "+918220276214", // mandatory
    "ip": "105.106.107.108",
    "referrer": "https://merchansite.com/example/paybill",
    "user_agent": "Mozilla/5.0"
  }
}'
```curl: Success Response
{
  "amount": "500000",
  "customer": {
    "id": "KkBhM9EC1Y0HTm",
    "contact": "+918220722114"
  },
  "instruments": [
    {
      "method": "emi",
      "issuer": "HDFC",
      "type": "debit",
      "eligibility_req_id": "elig_KkCNLzlNeMYQyZ",
      "eligibility": {
        "status": "eligible"
      }
    },
    {
      "method": "paylater",
      "provider": "getsimpl",
      "eligibility_req_id": "elig_KkCNLzlNeMYQyZ",
      "eligibility": {
        "status": "eligible"
      }
    },
    {
      "method": "paylater",
      "provider": "icic",
      "eligibility_req_id": "elig_KkCNLzlNeMYQyZ",
      "eligibility": {
        "status": "eligible"
      }
    },
    {
      "method": "cardless_emi",
      "provider": "walnut369",
      "eligibility_req_id": "elig_KkCNLzlNeMYQyZ",
      "eligibility": {
        "status": "ineligible",
        "error": {
          "code": "GATEWAY_ERROR",
          "description": "The customer has not been approved by the partner.",
          "source": "business",
          "step": "inquiry",
          "reason": "user_not_approved"
        }
      }
    },
    {
      "method": "cardless_emi",
      "provider": "zestmoney",
      "eligibility_req_id": "elig_KkCNLzlNeMYQyZ",
      "eligibility": {
        "status": "ineligible",
        "error": {
          "code": "GATEWAY_ERROR",
          "description": "The customer has exhausted their credit limit.",
          "source": "business",
          "step": "inquiry",
          "reason": "credit_limit_exhausted"
        }
      }
    },
    {
      "method": "paylater",
      "provider": "lazypay",
      "eligibility_req_id": "elig_KkCNLzlNeMYQyZ",
      "eligibility": {
        "status": "ineligible",
        "error": {
          "code": "GATEWAY_ERROR",
          "description": "The order amount is less than the minimum transaction amount.",
          "source": "business",
          "step": "inquiry",
          "reason": "min_amt_required"
        }
      }
    }
  ]
}

```curl: Failure Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The provider is invalid.",
    "source": "business",
    "step": "inquiry",
    "reason": "invalid_provider"
  }
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Amount is required.",
    "source": "business",
    "step": "inquiry",
    "reason": "amount_required"
  }
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The provider is not enabled for you.",
    "source": "business",
    "step": "inquiry",
    "reason": "instrument_not_enabled"
  }
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Contact number should be at least 8 digits, including country code.",
    "source": "business",
    "step": "inquiry",
    "reason": "invalid_mobile_number"
  }
}
```

### Request Parameters

`inquiry` _optional_
: `string` List of methods or instruments on which eligibility check is required. Possible value is `affordability`.

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of ₹295, enter `29500`. The user makes a payment for this amount against the order; hence, eligibility is checked for the amount.

`currency` _mandatory_
: `string` A three-letter ISO code for the currency for which you want to accept the payment. Possible value is `INR`. 

`customer` 
: `object` Customer details.

  `id` _optional_
  : `string` Unique identifier of the customer created using [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md). For example, `cust_1Aa00000000004`.

  `contact` _mandatory_
  : `string` The customer's phone number. A maximum length of 15 characters, including country code. For example, `+919000090000`.

  `ip` _optional_
  : `string` Customer's IP address from where the order is placed. For example, `105.106.107.108`.

  `referrer` _optional_
  : `string` Referrer header passed by the client's browser.

  `user_agent` _optional_
  : `string` Customer user-agent.

`instruments` _optional_
: `array` Payment instruments on which an eligibility check is required.

  `method` 
  : `string` Payment methods on which an eligibility check is required. Possible Values :
    - `emi`
    - `cardless_emi`
    - `paylater`

  `issuers`
  : `string` List of EMI issuers. Possible value is `HDFC`.

  `types`
  : `string` Type of card. Possible value is `debit`.
  
  `providers` 
  : `string` List of Cardless EMI providers. Possible values for `cardless_emi`:
    - `hdfc`
    - `icic`
    - `idfb`
    - `kkbk`
    - `earlysalary`
    - `walnut369`

    List of Pay Later providers. Possible values for `paylater`:
    - `lazypay`
    - `paypal`

> **INFO**
>
> 
> **Configure Payment Methods or Instruments** 
> 
> Refer to the [Configurations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/eligibility-check/configurations.md) doc for eligibility checks on specific methods or instruments.
> 

### Response Parameters

Descriptions for the response parameters are present in the [Eligibility Check Entity](#eligibility-check-entity) parameters table.

### Error Response Parameters

Given below is the list of errors for eligibility check.

> **INFO**
>
> 
> **Handy Tips** 
> 
> [Standard Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md) for Razorpay APIs are applicable.
> 

  
### Bad Request Errors

      
        
          invalid_inquiry
          
            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The inquiry parameter is invalid.
            - **Next Steps**: Retry with a valid inquiry parameter.
          

        
### invalid_currency

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The currency is invalid.
            - **Next Steps**: Retry with a valid currency.
          

        
### currency_required

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The currency field is required.
            - **Next Steps**: Retry with required fields.
          

        
### invalid_user_agent

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The user agent is invalid.
            - **Next Steps**: Retry with a valid user agent.
          

        
### invalid_ip

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The IP is invalid.
            - **Next Steps**: Retry with a valid IP.
          

        
### mobile_number_required

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: Contact number is required.
            - **Next Steps**: Retry with required fields.
          

        
### invalid_mobile_number

            
              
                15 digits max
                
                  - **Source**: business
                  - **Error Cause**: Request
                  - **Description**: Contact number should not be greater than 15 digits, including country code.
                  - **Next Steps**: Retry with a valid mobile number.
                

              
### digits and + symbol only

                  - **Source**: business
                  - **Error Cause**: Request
                  - **Description**: Contact number can only contain digits and + symbol.
                  - **Next Steps**: Retry with a valid mobile number.
                

              
### 8 digits minimum

                 - **Source**: business
                 - **Error Cause**: Request
                 - **Description**: Contact number should be at least 8 digits, including country code.
                 - **Next Steps**: Retry with a valid mobile number.
                

            
          
        

        
### amount_required

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: Amount is required.
            - **Next Steps**: Retry with required fields.
          

        
### invalid_amount

            
              
                amount is not an integer
                
                 - **Source**: business
                 - **Error Cause**: Request
                 - **Description**: The amount must be an integer.
                 - **Next Steps**: Retry with a valid amount.
                

              
### amount should be minimum INR 1.00

                 - **Source**: business
                 - **Error Cause**: Request
                 - **Description**: The amount must be at least INR 1.00.
                 - **Next Steps**: Retry with a valid amount.
                

            
          
        

        
### invalid_customer_id

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The customer ID is invalid.
            - **Next Steps**: Retry with a valid customer ID.
          

        
### customer_id_does_not_exist

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The customer ID does not exist.
            - **Next Steps**: Retry with a valid customer ID.
          

        
### invalid_instruments

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The instruments array is invalid.
            - **Next Steps**: Retry with a valid instruments array.
          

        
### method_not_applicable

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The eligibility check is not applicable on this method.
            - **Next Steps**: Retry with a valid method.
          

        
### provider_not_applicable

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The eligibility check is not applicable on this provider.
            - **Next Steps**: Retry with a valid provider.
          

        
### card_type_not_applicable

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The eligibility check is not applicable on this card type.
            - **Next Steps**: Retry with a valid card type.
          

        
### issuer_not_applicable

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The eligibility check is not applicable on this issuer.
            - **Next Steps**: Retry with a valid issuer.
          

        
### invalid_method

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The method is invalid.
            - **Next Steps**: Retry with a valid method.
          

        
### invalid_provider

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The provider is invalid.
            - **Next Steps**: Retry with a valid provider.
          

        
### invalid_card_type

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The card type is invalid.
            - **Next Steps**: Retry with a valid card type.
          

        
### invalid_issuer

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The issuer is invalid.
            - **Next Steps**: Retry with a valid issuer.
          

        
### method_not_enabled

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The method is not enabled for you.
            - **Next Steps**: No Retry.
          

        
### instrument_not_enabled

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The provider is not enabled for you.
            - **Next Steps**: No Retry.
          

        
### max_issuers_limit

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The number of issuers passed in the request must be less than 30.
            - **Next Steps**: No Retry.
          

        
### max_providers_limit

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The number of providers passed in the request must be less than 30.
            - **Next Steps**: No Retry.
          

        
### max_networks_limit

            - **Source**: business
            - **Error Cause**: Request
            - **Description**: The number of networks passed in the request must be less than 5.
            - **Next Steps**: No Retry.
          

      
    
  

  
### Gateway Errors

      
        
          timed_out
          
            - **Source**: gateway
            - **Error Cause**: All Gateways
            - **Description**: The payment provider could not revert with a suitable response in time.
            - **Next Steps**: Please retry after some time.
          

        
### gateway_technical_error

            - **Source**: gateway
            - **Error Cause**: All Gateways
            - **Description**: We are facing some trouble completing your request at the moment. Please try again shortly.
            - **Next Steps**: Please retry after some time.
          

        
### account_does_not_exist

            - **Source**: gateway
            - **Error Cause**: getSimpl, lazypay, icic paylater
            - **Description**: The customer doesn’t have an existing account with the provider.
            - **Next Steps**: No Retry.
          

        
### user_not_approved

            - **Source**: gateway
            - **Error Cause**: instacred, zestmoney, axio
            - **Description**: The customer has not been approved by the partner.
            - **Next Steps**: No Retry.
          

        
### credit_limit_expired

            - **Source**: gateway
            - **Error Cause**: earlysalary
            - **Description**: The customer’s credit limit has expired.
            - **Next Steps**: No Retry.
          

        
### credit_limit_exhausted

            - **Source**: gateway
            - **Error Cause**: getSimpl, lazypay
            - **Description**: The customer has exhausted their credit limit.
            - **Next Steps**: No Retry.
          

        
### credit_limit_inactive

            - **Source**: gateway
            - **Error Cause**: zestmoney
            - **Description**: The customer's credit limit is inactive.
            - **Next Steps**: No Retry.
          

        
### min_amt_required

            - **Source**: gateway
            - **Error Cause**: All Gateways
            - **Description**: The order amount is less than the minimum transaction amount.
            - **Next Steps**: No Retry.
          

        
### max_amt_limit

            - **Source**: gateway
            - **Error Cause**: All Gateways
            - **Description**: The order amount is above the maximum transaction amount limit.
            - **Next Steps**: No Retry.
          

        
### eligibility_check_within_payment_flow

            - **Source**: gateway
            - **Error Cause**: All Gateways
            - **Description**: The eligibility will be checked at the time of payment.
            - **Next Steps**: No Retry.
          

        
### account_blocked

            - **Source**: gateway
            - **Error Cause**: lazypay, icic paylater
            - **Description**: The customer's account has been blocked by the partner.
            - **Next Steps**: No Retry.
          

        
### account_disabled

            - **Source**: gateway
            - **Error Cause**: lazypay
            - **Description**: The customer's account has been disabled by the partner.
            - **Next Steps**: No Retry.
          

        
### transaction_suspended

            - **Source**: gateway
            - **Error Cause**: lazypay
            - **Description**: Transaction for this merchant are temporary suspended by gateway.
            - **Next Steps**: No Retry.
          

        
### merchant_account_disabled

            - **Source**: gateway
            - **Error Cause**: lazypay
            - **Description**: Gateway has disabled the account for this merchant.
            - **Next Steps**: No Retry.
          

       
    
  

## Fetch Eligibility by id

The following endpoint retrieves the details of the eligibility check. Add the `eligibility_req_id` received in response previously.

customers/eligibility/:eligibility_req_id

```curl: Request
-X GET 'https://api.razorpay.com/v1/customers/eligibility/elig_F1cxDoHWD4fkQt' \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H "content-type: application/json"
```curl: Success Response
{
  "instruments": [
    {
      "method": "paylater",
      "provider": "lazypay",
      "eligibility_req_id": "elig_LBwGKVvS2X48Lq",
      "eligibility": {
        "status": "eligible"
      }
    },
    {
      "method": "paylater",
      "provider": "getsimpl",
      "eligibility_req_id": "elig_LBwGKVvS2X48Lq",
      "eligibility": {
        "status": "ineligible",
        "error": {
          "code": "GATEWAY_ERROR",
          "description": "The customer has exhausted their credit limit",
          "source": "gateway",
          "step": "inquiry",
          "reason": "credit_limit_exhausted"
        }
      }
    }
  ]
}
```curl: Failure Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The eligibility id is invalid",
    "source": "business",
    "step": "inquiry",
    "reason": "invalid_eligibility_id"
  }
}
```
### Path Parameter

`eligibility_req_id` 
: `string` The unique identifier of the eligibility request to be retrieved. 

### Response Parameters

Descriptions for the response parameters are present in the [Eligibility Check Entity](#eligibility-check-entity) parameters table.

### Error Response Parameters

Given below is a list of possible errors you may face while fetching eligibility.

Error Code | Error | Source | Cause | Description | Solution
---
BAD_REQUEST_ERROR | `invalid_eligibility_id` | business | Request | The eligibility id is invalid.  | Retry with a valid mobile number.
---
BAD_REQUEST_ERROR | `eligibility_id_does_not_exist` | business | Request | The eligibility id does not exist. | Retry with a valid amount.

## Test Details

You can test the eligibility using our test phone numbers.

  
  
  Provider | Provider Code | Test Phone Numbers
  ---
  HDFC Bank | hdfc | `+917887578479`, `+918066317208`, `+916127912480`, `+917511365863`
  ---
  
  
  
  
  Provider | Provider Code | Test Phone Numbers
  ---
  axio | walnut369 | `+917887578479`, `+918066317208`, `+918708408282`, `+916127912480`
  ---
  Fibe | earlysalary | `+917887578479`, `+918066317208`, `+918708408282`, `+916127912480`
  ---
  HDFC Bank | hdfc | `+917887578479`, `+918066317208`, `+918708408282`, `+916127912480`
  ---
  Kotak Bank| kkbk | `+917887578479`, `+918066317208`, `+918708408282`, `+916127912480`
  ---
  ICICI Bank | icic | `+917887578479`,`+918066317208`,`+918708408282`,`+916127912480`
  ---
  IDFC Bank | idfb | `+917887578479`, `+918066317208`, `+918708408282`, `+916127912480`
  
  
  
    
  Provider | Provider Code | Test Phone Numbers
  ---
  LazyPay | lazypay | `+917887578479`, `+918066317208`, `+918708408282`, `+916127912480`
  ---
  GetSimpl | getsimpl | `+917887578479`, `+918066317208`, `+918708408282`, `+916127912480`
  ---
  ICICI Bank | icic | `+917887578479`, `+918066317208`, `+918708408282`, `+916127912480`
  
  

Know the interest rates and minimum order amount for:
- [Debit Card EMI Providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#5-can-you-provide-a-list-of-the)
- [Cardless EMI Providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#1-what-are-the-standard-interest-rates-charged)
- [Pay Later Providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#2-what-are-the-standard-interest-rates-charged)
