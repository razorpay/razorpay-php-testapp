---
title: Create a Linked Account
description: Create a Linked Account using the Razorpay API.
---

# Create a Linked Account

## Create a Linked Account

Use this endpoint to create a Linked Account.

### Request

```curl: Curl
curl -X POST 'https://api.razorpay.com/v2/accounts' \
     -u [YOUR_KEY_ID]:[YOUR_SECRET] \
     -H "Content-type: application/json" \
     -d '{
   "email":"gaurav.kumar@example.com",
   "phone":"9000090000",
   "type":"route",
   "reference_id":"124124",
   "legal_business_name":"Acme Corp",
   "business_type":"partnership",
   "contact_name":"Gaurav Kumar",
   "profile":{
      "category":"healthcare",
      "subcategory":"clinic",
      "addresses":{
         "registered":{
            "street1":"507, Koramangala 1st block",
            "street2":"MG Road",
            "city":"Bengaluru",
            "state":"KARNATAKA",
            "postal_code":"560034",
            "country":"IN"
         }
      }
   },
   "legal_info":{
      "pan":"AAACL1234C",
      "gst":"18AABCU9603R1ZM"
   }
}'
```

### Response

```json: Success
{
   "id":"acc_GRWKk7qQsLnDjX",
   "type":"route",
   "status":"created",
   "email":"gaurav.kumar@example.com",
   "profile":{
      "category":"healthcare",
      "subcategory":"clinic",
      "addresses":{
         "registered":{
            "street1":"507, Koramangala 1st block",
            "street2":"MG Road",
            "city":"Bengaluru",
            "state":"KARNATAKA",
            "postal_code":"560034",
            "country":"IN"
         }
      }
   },
   "notes":[
      
   ],
   "created_at":1611136837,
   "phone":"9000090000",
   "contact_name":"Gaurav Kumar",
   "reference_id":"124124",
   "business_type":"partnership",
   "legal_business_name":"Acme Corp",
   "customer_facing_business_name":"Acme Corp",
   "legal_info":{
      "pan":"AAACL1234C",
      "gst":"18AABCU9603R1ZM"
   }
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Invalid business type: xyz",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "business_type"
    }
}
```

### Parameters

`email`_mandatory_
: `string` The Linked Account's business email address.

`phone`_mandatory_
: `integer` The Linked Account's business phone number. The minimum length is 8 characters and the maximum length is 15.

`legal_business_name` _mandatory_
: `string` The name of the Linked Account's business. For example, `Acme Corp`. The minimum length is 4 characters and the maximum length is 200.

`customer_facing_business_name` _optional_
: `string` The Linked Account billing label as it appears on the Dashboard. The minimum length is 1 character and the maximum length is 255.

`business_type` _mandatory_
: `string` The type of business operated by the Linked Account holder. List of possible values are available [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md#business-type).

`reference_id` _optional_
: `string` Partner's external account reference id. The minimum length is 1 character and the maximum length is 512.

`profile` _mandatory_
: `object` The business details of the Linked Account's account.

    `category` _mandatory_
    : `string` The business category of the Linked Account. Possible values: [List of Business Categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md#business-category).

    `subcategory` _mandatory_
    : `string` The business sub-category of the Linked Account. Possible values: [List of Business Sub-Categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md#business-sub-category).

    `business_model` _optional_
    : `string` The business description. The character limit between 1-255 characters.

    `addresses`
    : `object` Details of Linked Account's address.

        `registered` _mandatory_
        : `object` Details of the Linked Account's registered address.

            `street1` 
            : `string` Address, line 1. The maximum length is 100 characters.

            `street2` 
            : `string` Address, line 2. The maximum length is 100 characters.

            `city`
            : `string` The city. The maximum length is 100 characters.

            `state`
            : `string` The state. The minimum length is 2 and the maximum length is 32.

            

                
                Below are the list of supported Indian states:

                
                State Name | State Code
                ---
                ANDAMAN & NICOBAR ISLANDS | AN
                ---
                ANDAMAN AND NICOBAR ISLANDS | AN
                ---
                ANDHRA PRADESH | AP
                ---
                ARUNACHAL PRADESH | AR
                ---
                ASSAM | AS
                ---
                BIHAR | BI
                ---
                CHANDIGARH | CH
                ---
                CHHATTISGARH | CT
                ---
                DADRA & NAGAR HAVELI | DN
                ---
                DADRA AND NAGAR HAVELI | DN
                ---
                DAMAN & DIU | DD
                ---
                DAMAN AND DIU | DD
                ---
                DELHI | DL
                ---
                GOA | GO
                ---
                GUJARAT | GJ
                ---
                HARYANA | HA
                ---
                HIMACHAL PRADESH | HP
                ---
                JAMMU & KASHMIR | JK
                ---
                JAMMU AND KASHMIR | JK
                ---
                JHARKHAND | JH
                ---
                KARNATAKA | KA
                ---
                KERALA | KE
                ---
                LAKSHADWEEP | LD
                ---
                MADHYA PRADESH | MP
                ---
                MAHARASHTRA | MH
                ---
                MANIPUR | MA
                ---
                MEGHALAYA | ME
                ---
                MIZORAM | MI
                ---
                NAGALAND | NA
                ---
                ODISHA | OR
                ---
                PONDICHERRY | PO
                ---
                PUNJAB | PB
                ---
                RAJASTHAN | RJ
                ---
                SIKKIM | SK
                ---
                TAMIL NADU | TN
                ---
                TRIPURA | TR
                ---
                TELANGANA | TG
                ---
                UTTAR PRADESH | UP
                ---
                UTTARAKHAND | UT
                ---
                WEST BENGAL | WB
                

                
                
            `postal_code`
            : `integer` The postal code. This should be exactly 6 characters.

            `country`
            : `string` The country. The minimum length is 2 and the maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`.

        `operation` _optional_
        : `object` Details of the Linked Account's operational address.

            `street1` 
            : `string` Address, line 1. The maximum length is 100 characters.

            `street2`
            : `string` Address, line 2. The maximum length is 100 characters.

            `city`
            : `string` The city. The maximum length is 100 characters.

            `state`
            : `string` The state. The minimum length is 2 and the maximum length is 32. 
            
            

                
                Below are the list of supported Indian states:

                
                State Name | State Code
                ---
                ANDAMAN & NICOBAR ISLANDS | AN
                ---
                ANDAMAN AND NICOBAR ISLANDS | AN
                ---
                ANDHRA PRADESH | AP
                ---
                ARUNACHAL PRADESH | AR
                ---
                ASSAM | AS
                ---
                BIHAR | BI
                ---
                CHANDIGARH | CH
                ---
                CHHATTISGARH | CT
                ---
                DADRA & NAGAR HAVELI | DN
                ---
                DADRA AND NAGAR HAVELI | DN
                ---
                DAMAN & DIU | DD
                ---
                DAMAN AND DIU | DD
                ---
                DELHI | DL
                ---
                GOA | GO
                ---
                GUJARAT | GJ
                ---
                HARYANA | HA
                ---
                HIMACHAL PRADESH | HP
                ---
                JAMMU & KASHMIR | JK
                ---
                JAMMU AND KASHMIR | JK
                ---
                JHARKHAND | JH
                ---
                KARNATAKA | KA
                ---
                KERALA | KE
                ---
                LAKSHADWEEP | LD
                ---
                MADHYA PRADESH | MP
                ---
                MAHARASHTRA | MH
                ---
                MANIPUR | MA
                ---
                MEGHALAYA | ME
                ---
                MIZORAM | MI
                ---
                NAGALAND | NA
                ---
                ODISHA | OR
                ---
                PONDICHERRY | PO
                ---
                PUNJAB | PB
                ---
                RAJASTHAN | RJ
                ---
                SIKKIM | SK
                ---
                TAMIL NADU | TN
                ---
                TRIPURA | TR
                ---
                TELANGANA | TG
                ---
                UTTAR PRADESH | UP
                ---
                UTTARAKHAND | UT
                ---
                WEST BENGAL | WB
                

                

            `postal_code`
            : `integer` The postal code. This should be exactly 6 characters.

            `country`
            : `string` The country. The minimum length is 2 and the maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`.

`legal_info` _conditional_
: `object` The legal details about the Linked Account's business. The mandatory [KYC requirement](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md#kyc-requirements) parameters should be passed depending on the business requirements.

    `pan` _conditional_
    : `string` Valid PAN number details of the Linked Account's business. 
        - This is a 10-digit alphanumeric code. For example, `AVOJB1111K`. 
        - The 4th digit should be either of 'C', 'H', 'F', 'A', 'T', 'B', 'J', 'G', 'L'. 
        - The regex for Company PAN is `/^[a-zA-z]{5}\d{4}[a-zA-Z]{1}$/`.

    `gst` _conditional_
    : `string` Valid GSTIN number details of the Linked Account. 
        - This is a 15-digit PAN-based unique identification number. 
        - The Regex for GSTIN is `/^[0123][0-9][a-z]{5}[0-9]{4}[a-z][0-9][a-z0-9][a-z0-9]$/gi`.

`contact_info` _optional_
: `object` Options available for contact support.

    `chargeback`
    : `object` The type of contact support.

        `email`
        : `string` The email id of chargeback POC. The maximum length is:
          - local part (before @): 64 characters. 
          - domain part (after @): 68 characters. 
 The total character length supported is 132.

        `phone`
        : `integer` The phone number of chargeback POC. The maximum length is 10 characters.

        `policy_url`
        : `string` The URL of chargeback policy. Regex is (protocol://``:port/resource path?querystring#fragementid)
 protocol-both http/https allowed. Only domain name is mandatory.

    `refund`
    : `object` The type of contact support.

        `email`
        : `string` The email id of refund POC. The maximum length is:
          - local part (before @): 64 characters. 
          - domain part (after @): 68 characters. 
 The total character length supported is 132.

        `phone`
        : `integer` The phone number of refund POC. The maximum length is 10 characters.

        `policy_url`
        : `string` The URL of refund policy. Regex is (protocol://``:port/resource path?querystring#fragementid) 
 protocol-both http/https allowed.

    `support`
    : `array` The type of contact support.

        `email`
        : `string` The email id of support POC. The maximum length is:
          - local part (before @): 64 characters. 
          - domain part (after @): 68 characters. 
 The total character length supported is 132.

        `phone`
        : `integer` The phone number of support POC. The maximum length is 10 characters.

        `policy_url`
        : `string` The URL of support policy. Regex is (protocol://``:port/resource path?querystring#fragementid) 
 protocol-both http/https allowed.

`apps` _optional_
: `object` The app details of the account holder's business.

    `websites`
    : `array` The website/app for the account holder's business. A minimum of 1 website is required.

    `android`
    : `array` Android app details

        `url`
        : `string` The link of the Android app. Regex is (protocol://``:port/resource path?querystring#fragementid) 
 protocol-both http/https allowed.

        `name`
        : `string` The name of the Android app.

    `ios`
    : `array` iOS app details

        `url`
        : `string` The link of the iOS app. Regex is (protocol://``:port/resource path?querystring#fragementid) 
 protocol-both http/https allowed.

        `name`
        : `string` The name of the iOS app.

### Parameters

`id`
: `string` The unique identifier of the account generated by Razorpay. The maximum length is 18 characters. For example, `acc_GLGeLkU2JUeyDZ`.

`type`
: `string` The account type. Possible value is `route`.

`reference_id`
:  `string` The internal reference ID. This value can be maximum of 20 characters. For example, `123123`.

`status`
: `string` The status of the account. Possible values:
  - `created`
  - `suspended`

`email`
: `string` The account holder's email address.

`phone`
: `integer` The account holder's phone number. The minimum length is 8 characters and the maximum length is 15.

`legal_business_name`
: `string` The name of the account holder's business. For example, `Acme Corp`. The minimum length is 4 characters and the maximum length is 200.

`business_type`
: `string` The type of business operated by the account holder. Possible values: [Business Types](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md#business-type). 

`profile`
: `object` The account holder's business details.

    `category`
    : `string` The business category of the account holder. For example, `healthcare`. Possible values: [Business Category](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md#business-category).

    `subcategory`
    : `string` The business sub-category of the account holder. For example, `clinic`. Possible values: [Business Sub-Category](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md#business-sub-category).

    `addresses`
    : `object` Details of account holder's address.  

        `registered`
        : `object` Details of the account holder's registered address.

            `street1`
            : `string` Address, line 1. The maximum length is 100 characters.

            `street2`
            : `string` Address, line 2. The maximum length is 100 characters.

            `city`
            : `string` The city. The maximum length is 100 characters.

            `state`
            : `string` The state. The minimum length is 2 and the maximum length is 100.

            `postal_code`
            : `integer` The postal code. This should be exactly 6 characters.

            `country`
            : `string` The country. The minimum length is 2 and the maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`.

`legal_info`
: `object` The legal details about the account holder's business. The mandatory [KYC requirement](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/integration-guide.md#kyc-requirements) parameters should be passed depending on the business requirements.

    `pan`
    : `string` Valid PAN number details of the account holder's business. 
        - This is a 10-digit alphanumeric code. For example, `AVOJB1111K`. 
        - The 4th digit should be either of 'C', 'H', 'F', 'A', 'T', 'B', 'J', 'G', 'L'. 
        - The regex for Company PAN is `/^[a-zA-z]{5}\d{4}[a-zA-Z]{1}$/`.

        This parameter might be required to complete the KYC process. However, it is optional for this API.

    `gst`
    : `string` Valid GSTIN number details of the account holder. 
        - This is a 15-digit PAN-based unique identification number. 
        - The Regex for GSTIN is `/^[0123][0-9][a-z]{5}[0-9]{4}[a-z][0-9][a-z0-9][a-z0-9]$/gi`.

`notes`
: `object` Contains user-defined fields stored by the partner for reference purposes.

`contact_name`
: `string` The name of the contact. The minimum length is 4 and the maximum length is 255 characters.

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.

The input field is required
* code: 400
* description: This error occurs when a mandatory field is empty.
* solution: Make sure to fill in all the mandatory fields.

The requested URL was not found on the server.
* code: 400
* description: This error occurs when Marketplace feature is not enabled for merchants using private auth.
* solution: Ensure to enable Marketplace feature for merchants using private auth.

Invalid type: route
* code: 400
* description: This error occurs when the value of a parameter is invalid. For example, when the value of the `type` parameter is other than `route`.
* solution: Ensure to send correct values for parameters.

Route code Support feature not enabled to add account code.
* code: 400
* description: This error occurs when you pass the value for the `reference_id` parameter, but the `route_code_support` feature is not enabled for merchants.
* solution: Ensure to enable the `route_code_support` feature for merchants before passing the value for the `reference_id` parameter.

Merchant email already exists for account - BbHKlnuyZkf0xa.
* code: 400
* description: This error occurs when you try to create a Linked Account with an existing email address.
* solution: Make sure the email address is unique while creating a Linked Account.

Invalid IFSC Code
* code: 400
* description: This error occurs when you pass an invalid IFSC code.
* solution: Make sure you pass a valid IFSC code.

The name may only contain alphabets, digits and spaces
* code: 400
* description: This error occurs when the name field has anything other than alphabets, digits and spaces.
* solution: Make sure you enter a valid name without special characters.

The bank account number must be between 5 and 35 characters
* code: 400
* description: This error occurs when you pass an invalid bank account number.
* solution: Make sure to pass a valid account number.

Account_code -account_code is not allowed for this merchant
* code: 400
* description: This error occurs when the `account_code` feature is not enabled for the merchant.
* solution: Make sure to enable the correct feature for the merchant - `route_code_support`.

Please enter a valid name. Links, emails and HTML tags are not allowed.
* code: 400
* description: This error occurs when the Linked Account name contains URLs, HTML tags, emails and so on.
* solution: Ensure you don't send URLs, HTML tags and emails in the Linked Account name.

The code format is invalid.
* code: 400
* description: This error occurs when the `reference_id` format is invalid.
* solution: Ensure the `reference_id` format is valid.

The code must be at least 3 characters.
* code: 400
* description: This error occurs when the `reference_id` value has less than a minimum of 3 characters.
* solution: The `reference_id` value should be between 3 to 20 characters.
