---
title: Account APIs [beta]
description: Create accounts directly from your website/ app using Razorpay Account APIs.
---

# Account APIs [beta]

Account APIs lets you dynamically create accounts with Razorpay directly from your site/app to quickly set a fully-functional payment ecosystem up and running. Our APIs use basic auth as authentication. Refer the [API Documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#authentication.md) section to know more.

You can perform the following operations with the Account APIs:

- [Create an Account](#create-an-account)
- [Fetch Accounts](#fetch-accounts)
- [Fetch Account by ID](#fetch-account-by-id)
- [Update bank account details](#update-bank-account-details)

## Account Entity

The account entity has the following fields.

`name`
: `string` Name of the account holder.

`email`
: `string` Email address of the account holder.

`tnc_accepted`
: `boolean` Indicates if the terms and conditions have been accepted or not. 
   - `true`: Terms and conditions have been accepted.
   - `false`: Terms and conditions have not been accepted.

`business_name`
: `string` Your company name.

`business_type`
: `string` Business type. Possible values: 
   - `llp`
   - `ngo`
   - `other`
   - `individual`
   - `partnership`
   - `proprietorship`
   - `public_limited`
   - `private_limited`
   - `trust`, `society`
   - `not_yet_registered`
   - `educational_institutes`

`ifsc_code`
: `string` The ifsc code of your bank account.

`beneficiary_name`
: `string` Name of the bank account holder.

`account number` _mandatory_
: `string` The bank account number.

`account_type`
: `string` The bank account type. For example, Current.

`id` 
: `string` Razorpay account ID. For example `acc_gHQwerty123ggd`.

`live` 
: `boolean` Indicates if an account is live or not.
   - `true`: Account is live.
   - `false`: Account is not live.

`managed`
: `boolean` Indicates if it is a Linked Account or not.

`status`
:  `string` Indicates the status of an account. Possible values: 
   - `activated`
   - `not_activated` 
   - `verification_failed` (penny testing enabled)
   - `verification_pending` (penny testing enabled)

`can_submit`
: `boolean` Indicates if the activation fields have been filled up or not. Possible values:
   - `true`: Activation fields are filled.
   - `false`: Activation fields are not filled.

`fields_pending`
: `array` Lists all the pending fields for activating the account.

`transaction_report_email`
: `array` List of emails to which the transaction email report will be sent.

`mobile` 
: `integer` Company mobile number.

`landline` 
: `integer` Company landline number.

`business_models`
: `string` The type of the business modes. Can accept these values: `B2B` or `B2C` or `B2B+B2C`.

`registered_address`
: The registered address of the company.

    `address` 
    : `string` The registered company address, at the time of account creation.

    `city` 
    : `string` The name of the city in your business address.

    `state` 
    : `string` The name of the state in your business address.

    `pin` 
    : `integer` The pin code of the area in your business address.

`operational_address`
: The operational address of the company.

    `address` 
    : `string` The current operational address of the company.

    `city` 
    : `string` The name of the city in your operational address.

    `state` 
    : `string` The name of the state in your operational address.
    
    `pin` 
    : `string` The pin code of the area in your operational address.

`date_establishment` 
: `integer` Date of establishment.

`transaction_volume`
: `string` Expected annual transaction volume (INR).

`average_transaction_size`
: `integer` Expected average transaction value.

`cin` 
: `string` Company CIN.

`gstin` 
: `string` GST Identification Number.

`p_gstin` 
: `string` Provisional GST Identification Number.

`pan` 
: `string` Company PAN.

`pan_name` 
: `string` Name of the account holder as given on PAN card.

`promoter_pan`
: `string` PAN of any 1 authorized signatory/promoter/director.

`promoter_pan_name` 
: `string` Name on the promoter's PAN Card.

`notes`
: `object` A key-value store present with every Razorpay entity like Account, Payment, Refund, etc. You can use this for storing additional data relating to the entity in a structured format. Refer [Notes section of API documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/api/understand#notes.md) to learn more.

`destination` 
: `string` The Id of the bank account entity created. For example, ba_gHQwerty123ggd

## Create an Account

Use the following endpoint to create an account.

beta/accounts

### Sample Request and Response

```curl: Sample Request
curl -XPOST 'https://api.razorpay.com/v1/beta/accounts' \
     -u [YOUR_KEY_ID]:[YOUR_SECRET] \
     -H "Content-type: application/json" \
     -d '{
           "name":"Gaurav Kumar",
           "email":"gaurav.kumar@example.com",
           "tnc_accepted":true,
           "account_details":{
              "business_name":"Acme Corporation",
              "business_type":"individual"
           },
           "bank_account":{
              "ifsc_code":"HDFC0CAGSBK",
              "beneficiary_name":"Gaurav Kumar",
              "account_type":"current",
              "account_number":1234567890123456
           }
        }'
```json: Response
{
    "id": "acc_gHQwerty123ggd",
    "entity": "account",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "live": false,
    "managed": true,
    "tnc_accepted": true,
    "activation_details": {
        "status": "activated",
        "activated_at": 1513681274,
        "can_submit": true,
        "fields_pending": [ ]
    },
    "secondary_emails": {
        "transaction_report_email": [ ]
    },
    "account_details": {
        "mobile": null,
        "landline": null,
        "business_name": "Acme Corporation",
        "business_type": "individual",
        "business_model": null,
        "registered_address": {
            "address": null,
            "city": null,
            "state": null,
            "pin": null
        },
        "operational_address": {
            "address": null,
            "city": null,
            "state": null,
            "pin": null
        },
        "date_established": null,
        "transaction_volume": null,
        "average_transaction_size": null,
        "kyc_details": {
            "cin": null,
            "gstin": null,
            "p_gstin": null,
            "pan": null,
            "pan_name": null,
            "promoter_pan": null,
            "promoter_pan_name": null,
            "business_proof_file": null,
            "address_proof_file": null
        }
    },
    "notes": { },
    "fund_transfer": {
        "destination": "ba_9EhChhUhhXdHBv"
    }
}
```json: Response - Penny testing enabled
{
    "id": "acc_gHQwerty123ggd",
    "entity": "account",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "live": false,
    "managed": true,
    "tnc_accepted": true,
    "activation_details": {
        "status": "activated",
        "bank_details_verification_error": null,
        "activated_at": 1513681274,
        "can_submit": true,
        "fields_pending": [ ]
    },
    "secondary_emails": {
        "transaction_report_email": [ ]
    },
    "account_details": {
        "mobile": null,
        "landline": null,
        "business_name": "Acme Corporation",
        "business_type": "individual",
        "business_model": null,
        "registered_address": {
            "address": null,
            "city": null,
            "state": null,
            "pin": null
        },
        "operational_address": {
            "address": null,
            "city": null,
            "state": null,
            "pin": null
        },
        "date_established": null,
        "transaction_volume": null,
        "average_transaction_size": null,
        "kyc_details": {
            "cin": null,
            "gstin": null,
            "p_gstin": null,
            "pan": null,
            "pan_name": null,
            "promoter_pan": null,
            "promoter_pan_name": null,
            "business_proof_file": null,
            "address_proof_file": null
        }
    },
    "notes": { },
    "fund_transfer": {
        "destination": "ba_9EhChhUhhXdHBv"
    }
}
```

> **INFO**
>
> 
> **Handy Tips**
> 
> All the JSON Input fields are mandatory in the request.
> 

## Fetch Accounts

The below API is used for fetching the details of all the accounts.

beta/accounts

### Sample Request and Response

The below API creates a Razorpay merchant account.

```curl: cURL
curl -X GET 'https://api.razorpay.com/v1/beta/accounts' \
     -u [YOUR_KEY_ID]:[YOUR_SECRET] \
```json: Response
{
   "entity":"collection",
   "count":2,
   "items":[
      {
         "id":"acc_gHQwerty123ggd",
         "entity":"account",
         "name":"Gaurav Kumar",
         "email":"gaurav.kumar@example.com",
         "live":false,
         "managed":true,
         "tnc_accepted":true,
         "activation_details":{
            "status":"activated",
            "activated_at":1513681274,
            "can_submit":true,
            "fields_pending":[
               
            ]
         },
         "secondary_emails":{
            "transaction_report_email":[
               
            ]
         },
         "account_details":{
            "mobile":null,
            "landline":null,
            "business_name":"Acme Corporation",
            "business_type":"individual",
            "paymentdetails":null,
            "business_model":null,
            "registered_address":{
               "address":null,
               "city":null,
               "state":null,
               "pin":null
            },
            "operational_address":{
               "address":null,
               "city":null,
               "state":null,
               "pin":null
            },
            "date_established":null,
            "transaction_volume":null,
            "average_transaction_size":null,
            "kyc_details":{
               "cin":null,
               "gstin":null,
               "p_gstin":null,
               "pan":null,
               "pan_name":null,
               "promoter_pan":null,
               "promoter_pan_name":null,
               "business_proof_file":null,
               "address_proof_file":null
            }
         },
         "notes":{
            "merchant_data_1":"some string"
         },
         "fund_transfer":{
            "destination":"ba_9EhChhUhhXdHBv"
         }
      },
      {
         "id":"acc_fHQwerty123ffe",
         "entity":"account",
         "name":"John Appleseed",
         "email":"johnappleseed@gmail.com",
         "live":true,
         "managed":true,
         "tnc_accepted":true,
         "activation_details":{
            "status":"activated",
            "activated_at":1513681274,
            "can_submit":true,
            "fields_pending":[
               
            ]
         },
         "secondary_emails":{
            "transaction_report_email":[
               
            ]
         },
         "account_details":{
            "mobile":null,
            "landline":null,
            "business_name":"XYZ software solutions",
            "business_type":"partnership",
            "paymentdetails":null,
            "business_model":null,
            "registered_address":{
               "address":null,
               "city":null,
               "state":null,
               "pin":null
            },
            "operational_address":{
               "address":null,
               "city":null,
               "state":null,
               "pin":null
            },
            "date_established":null,
            "transaction_volume":null,
            "average_transaction_size":null,
            "kyc_details":{
               "cin":null,
               "gstin":null,
               "p_gstin":null,
               "pan":null,
               "pan_name":null,
               "promoter_pan":null,
               "promoter_pan_name":null,
               "business_proof_file":null,
               "address_proof_file":null
            }
         },
         "notes":{
            "merchant_data_1":"some id"
         },
         "fund_transfer":{
            "destination":"ba_9FiDasQoewhnrs"
         }
      }
   ]
}
```json: Response - Penny testing enabled
{
    "entity": "collection",
    "count": 2,
    "items": [
        {
            "id": "acc_gHQwerty123ggd",
            "entity": "account",
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "live": false,
            "managed": true,
            "tnc_accepted": true,
            "activation_details": {
                "status": "activated",
                "bank_details_verification_error": null,
                "activated_at": 1513681274,
                "can_submit": true,
                "fields_pending": [ ]
            },
            "secondary_emails": {
                "transaction_report_email": [ ]
            },
            "account_details": {
                "mobile": null,
                "landline": null,
                "business_name": "Acme Corporation",
                "business_type": "individual",
                "paymentdetails": null,
                "business_model": null,
                "registered_address": {
                    "address": null,
                    "city": null,
                    "state": null,
                    "pin": null
                },
                "operational_address": {
                    "address": null,
                    "city": null,
                    "state": null,
                    "pin": null
                },
                "date_established": null,
                "transaction_volume": null,
                "average_transaction_size": null,
                "kyc_details": {
                    "cin": null,
                    "gstin": null,
                    "p_gstin": null,
                    "pan": null,
                    "pan_name": null,
                    "promoter_pan": null,
                    "promoter_pan_name": null,
                    "business_proof_file": null,
                    "address_proof_file": null
                }
            },
            "notes": {
                "merchant_data_1": "some string"
            },
            "fund_transfer": {
                "destination": "ba_9EhChhUhhXdHBv"
            }
        },
        {
            "id": "acc_fHQwerty123ffe",
            "entity": "account",
            "name": "John Appleseed",
            "email": "johnappleseed@gmail.com",
            "live": true,
            "managed": true,
            "tnc_accepted": true,
            "activation_details": {
                "status": "verfication_pending",
                "bank_details_verification_error": null,
                "activated_at": 1513681274,
                "can_submit": true,
                "fields_pending": [ ]
            },
            "secondary_emails": {
                "transaction_report_email": [ ]
            },
            "account_details": {
                "mobile": null,
                "landline": null,
                "business_name": "XYZ software solutions",
                "business_type": "partnership",
                "paymentdetails": null,
                "business_model": null,
                "registered_address": {
                    "address": null,
                    "city": null,
                    "state": null,
                    "pin": null
                },
                "operational_address": {
                    "address": null,
                    "city": null,
                    "state": null,
                    "pin": null
                },
                "date_established": null,
                "transaction_volume": null,
                "average_transaction_size": null,
                "kyc_details": {
                    "cin": null,
                    "gstin": null,
                    "p_gstin": null,
                    "pan": null,
                    "pan_name": null,
                    "promoter_pan": null,
                    "promoter_pan_name": null,
                    "business_proof_file": null,
                    "address_proof_file": null
                }
            },
            "notes": {
                "merchant_data_1": "some id"
            },
            "fund_transfer": {
                "destination": "ba_9FiDasQoewhnrs"
            }
        }
    ]
}
```

## Fetch Account by ID

The below API is used for fetching details of an account by ID.

beta/accounts/:id

### Sample Request and Response

The below API fetches the details of a Razorpay merchant account.

```curl:cURL
curl -XGET \
'https://api.razorpay.com/v1/beta/accounts/acc_gHQwerty123ggd' \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
```json: Response
{
   "id":"acc_gHQwerty123ggd",
   "entity":"account",
   "name":"Gaurav Kumar",
   "email":"gaurav.kumar@example.com",
   "live":false,
   "managed":true,
   "tnc_accepted":true,
   "activation_details":{
      "status":"activated",
      "activated_at":1513681274,
      "can_submit":true,
      "fields_pending":[
         
      ]
   },
   "secondary_emails":{
      "transaction_report_email":[
         
      ]
   },
   "account_details":{
      "mobile":null,
      "landline":null,
      "business_name":"Acme Corporation",
      "business_type":"individual",
      "paymentdetails":null,
      "business_model":null,
      "registered_address":{
         "address":null,
         "city":null,
         "state":null,
         "pin":null
      },
      "operational_address":{
         "address":null,
         "city":null,
         "state":null,
         "pin":null
      },
      "date_established":null,
      "transaction_volume":null,
      "average_transaction_size":null,
      "kyc_details":{
         "cin":null,
         "gstin":null,
         "p_gstin":null,
         "pan":null,
         "pan_name":null,
         "promoter_pan":null,
         "promoter_pan_name":null,
         "business_proof_file":null,
         "address_proof_file":null
      }
   },
   "notes":{
      "merchant_data_1":"some string"
   },
   "fund_transfer":{
      "destination":"ba_9EhChhUhhXdHBv"
   }
}
```json: Response - Penny testing Enabled
{
   "id":"acc_JMJ6qeTz3t2ukr",
   "entity":"account",
   "name":"Test PT 1",
   "email":"f20150054h@alumni.bits-pilani.ac.in",
   "live":true,
   "managed":true,
   "tnc_accepted":true,
   "activation_details":{
      "status":"verification_failed",
      "activated_at":null,
      "can_submit":true,
      "bank_details_verification_error":"KC03: INVALID BENEFICIARY ACCOUNT \/ IFSC",
      "fields_pending":[
         
      ]
   },
   "secondary_emails":{
      "transaction_report_email":[
         "f20150054h@alumni.bits-pilani.ac.in"
      ]
   },
   "account_details":{
      "mobile":null,
      "landline":null,
      "business_name":"Test PT 1",
      "business_type":"private_limited",
      "paymentdetails":null,
      "business_model":null,
      "registered_address":{
         "address":null,
         "city":null,
         "state":null,
         "pin":null
      },
      "operational_address":{
         "address":null,
         "city":null,
         "state":null,
         "pin":null
      },
      "date_established":null,
      "transaction_volume":null,
      "average_transaction_size":null,
      "kyc_details":{
         "cin":null,
         "gstin":null,
         "p_gstin":null,
         "pan":null,
         "pan_name":null,
         "promoter_pan":null,
         "promoter_pan_name":null,
         "business_proof_file":null,
         "address_proof_file":null
      }
   },
   "notes":[
      
   ],
   "fund_transfer":{
      "destination":"ba_JMJ6qju5KecEHu"
   },
   "dashboard_access":true,
   "allow_reversals":false
}
```

## Update Bank Account Details

Use the following endpoint to update bank account details of the Linked Account.

beta/accounts/:id/bank_account

```curl: Request
curl -XPATCH 'api.razorpay.com/v1/beta/accounts/:id/bank_account' \
     -u [YOUR_KEY_ID]:[YOUR_SECRET] \
     -H "Content-type: application/json" \
     -d '{
   "beneficiary_name":"Gaurav Kumar",
   "account_number":"1234567890123456",
   "ifsc_code":"HDFC0CAGSBK"
}'
```json: Response
{
   "status":"activated",
   "beneficiary_name":"Madishetty Saketh",
   "account_number":"41390812314",
   "ifsc_code":"ADCC0000014"
}
```json: Response - Penny testing enabled
{
   "status":"verification_pending",
   "beneficiary_name":"Madishetty Saketh",
   "account_number":"41390812314",
   "ifsc_code":"ADCC0000014"
}
```

### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the Linked Account.

### Request Parameters

`beneficiary_name` _mandatory_
: `string` Beneficiary account name.

`account number` _mandatory_
: `string` The bank account number.

`ifsc_code` _mandatory_
: `string` The ifsc code of your bank account.

### Response Parameters

`status`
:  `string` Indicates the status of a Linked Account. Possible values: 
   - `activated`
   - `verification_failed` (penny testing enabled)
   - `verification_pending` (penny testing enabled)

`beneficiary_name`
: `string` Beneficiary account name.

`account number`
: `string` The bank account number.

`ifsc_code`
: `string` The ifsc code of your bank account.

## Webhooks

The `account.updated` event is triggered for the Penny testing enabled Linked Accounts when the bank verification of the account fails or is successful.

### Sample Payload

The sample payload of the `account.updated` event is given below.

```json: verification_failed
{
   "entity":"event",
   "account_id":"acc_JxAdv7oWTvEleH",
   "event":"account.updated",
   "contains":[
      "account",
      "bank_account"
   ],
   "payload":{
      "account":{
         "entity":{
            "id":"acc_JxAdv7oWTvEleH",
            "entity":"account",
            "name":"Madishetty Saketh",
            "email":"siddharth.arora+1@razorpay.com",
            "live":true,
            "managed":true,
            "tnc_accepted":true,
            "activation_details":{
               "status":"verification_failed",
               "activated_at":null,
               "can_submit":true,
               "bank_details_verification_error":"KC03: INVALID BENEFICIARY ACCOUNT \/ IFSC",
               "fields_pending":[
                  
               ]
            },
            "secondary_emails":{
               "transaction_report_email":[
                  "siddharth.arora+1@razorpay.com"
               ]
            },
            "account_details":{
               "mobile":null,
               "landline":null,
               "business_name":"Madishetty Saketh",
               "business_type":"private_limited",
               "paymentdetails":null,
               "business_model":null,
               "registered_address":{
                  "address":null,
                  "city":null,
                  "state":null,
                  "pin":null
               },
               "operational_address":{
                  "address":null,
                  "city":null,
                  "state":null,
                  "pin":null
               },
               "date_established":null,
               "transaction_volume":null,
               "average_transaction_size":null,
               "kyc_details":{
                  "cin":null,
                  "gstin":null,
                  "p_gstin":null,
                  "pan":null,
                  "pan_name":null,
                  "promoter_pan":null,
                  "promoter_pan_name":null,
                  "business_proof_file":null,
                  "address_proof_file":null
               }
            },
            "notes":[
               
            ],
            "fund_transfer":{
               "destination":"ba_JxC2Ko0kZWRBGb"
            },
            "dashboard_access":false,
            "allow_reversals":false
         }
      },
      "bank_account":{
         "entity":{
            "id":"ba_JxC2Ko0kZWRBGb",
            "entity":"bank_account",
            "ifsc":"HDFC0004342",
            "bank_name":"HDFC Bank",
            "name":"Madishetty Saketh",
            "notes":[
               
            ],
            "account_number":"0123456789"
         }
      }
   },
   "created_at":1658659082
}
```json: verification_successful
{
   "entity":"event",
   "account_id":"acc_JxAdv7oWTvEleH",
   "event":"account.updated",
   "contains":[
      "account",
      "bank_account"
   ],
   "payload":{
      "account":{
         "entity":{
            "id":"acc_JxAdv7oWTvEleH",
            "entity":"account",
            "name":"Madishetty Saketh",
            "email":"siddharth.arora+1@razorpay.com",
            "live":true,
            "managed":true,
            "tnc_accepted":true,
            "activation_details":{
               "status":"activated",
               "activated_at":1658658648,
               "can_submit":true,
               "bank_details_verification_error":"",
               "fields_pending":[
                  
               ]
            },
            "secondary_emails":{
               "transaction_report_email":[
                  "siddharth.arora+1@razorpay.com"
               ]
            },
            "account_details":{
               "mobile":null,
               "landline":null,
               "business_name":"Madishetty Saketh",
               "business_type":"private_limited",
               "paymentdetails":null,
               "business_model":null,
               "registered_address":{
                  "address":null,
                  "city":null,
                  "state":null,
                  "pin":null
               },
               "operational_address":{
                  "address":null,
                  "city":null,
                  "state":null,
                  "pin":null
               },
               "date_established":null,
               "transaction_volume":null,
               "average_transaction_size":null,
               "kyc_details":{
                  "cin":null,
                  "gstin":null,
                  "p_gstin":null,
                  "pan":null,
                  "pan_name":null,
                  "promoter_pan":null,
                  "promoter_pan_name":null,
                  "business_proof_file":null,
                  "address_proof_file":null
               }
            },
            "notes":[
               
            ],
            "fund_transfer":{
               "destination":"ba_JxEpIAhUyVbcvc"
            },
            "dashboard_access":false,
            "allow_reversals":false
         }
      },
      "bank_account":{
         "entity":{
            "id":"ba_JxEpIAhUyVbcvc",
            "entity":"bank_account",
            "ifsc":"HDFC0004342",
            "bank_name":"HDFC Bank",
            "name":"Madishetty Saketh",
            "notes":[
               
            ],
            "account_number":"50100285259544"
         }
      }
   },
   "created_at":1658673286
}
```
