---
title: Update a Stakeholder | Sub-Merchant Onboarding APIs
heading: Update a Stakeholder
description: Update a Stakeholder using Razorpay Partners APIs.
---

# Update a Stakeholder

## Update a Stakeholder

Use this endpoint to update the details of a stakeholder. Know about the [various error responses](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/partners/errors.md) for this API. 

The information you can update for a stakeholder using the Update a Stakeholder API differs based on the [product activation status](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md#product-activation-status-and-updates-permitted).

> **WARN**
>
> 
> Currently, we do not support making concurrent requests to the following Onboarding APIs including their combination on the same `account_id`:
> - [Update Account API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/partners/account-onboarding/update.md)
> - Update Stakeholder API
> - [Update Product Configuration API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/partners/product-configuration/update-settlement-account-details.md)
> 
> Please wait for the response of these APIs before making subsequent requests.
> 

### Request

```cURL: Curl
curl -X PATCH https://api.razorpay.com/v2/accounts/acc_GLGeLkU2JUeyDZ/stakeholders/sth_GOQ4Eftlz62TSL \
-u  \
-H "Content-Type: application/json" \
-d '{
  "percentage_ownership": 20,
  "name": "Gauri Kumar",
  "relationship": {
    "director": false,
    "executive": true
  },
  "phone": {
    "primary": "9000090000",
    "secondary": "9000090000"
  },
  "addresses": {
    "residential": {
      "street": "507, Koramangala 1st block",
      "city": "Bangalore",
      "state": "Karnataka",
      "postal_code": "560035",
      "country": "IN"
    }
  },
  "kyc": {
    "pan": "AVOPB1111J"
  },
  "notes": {
    "random_key_by_partner": "random_value2"
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[ACCESS_TOKEN]");

String accountId = "acc_GP4lfNA0iIMn5B";

String stakeholderId = "sth_GOQ4Eftlz62TSL";

JSONObject StakeRequest = new JSONObject();
StakeRequest.put("email","gauri.kumari@example.com");
StakeRequest.put("percentage_ownership",10);
StakeRequest.put("name","Gauri Kumari");

JSONObject relationship = new JSONObject();
relationship.put("director",true);
relationship.put("executive",false);

StakeRequest.put("relationship",relationship);

JSONObject phone = new JSONObject();
phone.put("primary","9000090000");
phone.put("secondary","9000090000");

StakeRequest.put("phone",phone);

JSONObject residential = new JSONObject();
residential.put("street","507, Koramangala 6th block");
residential.put("city","Bengaluru");
residential.put("state","Karnataka");
residential.put("postal_code","560047");
residential.put("country","IN");

JSONObject addresses = new JSONObject();
addresses.put("residential",residential);
StakeRequest.put("addresses",addresses);

JSONObject kyc = new JSONObject();
kyc.put("pan","AVOPB1111K");

StakeRequest.put("kyc",kyc);

JSONObject notes = new JSONObject();
notes.put("random_key_by_partner","random_value");

StakeRequest.put("notes",notes);

Stakeholder stakeholder = instance.stakeholder.edit(accountId, stakeholderId, StakeRequest);

```php: PHP
$api = new Api(null, null, "");

$accountId = "acc_GP4lfNA0iIMn5B";
$stakeholderId = "sth_GOQ4Eftlz62TSL";

$stakeholders = $api->account->fetch($accountId)->stakeholders();

$stakeholders->edit($stakeholderId, array(
   "percentage_ownership" => 20,
   "name" => "Gauri Kumar",
   "relationship" => array(
       "director" => false,
       "executive" => true
   ),
   "phone" => array(
       "primary" => "9898989898",
       "secondary" => "9898989898"
   ),
   "addresses" => array(
       "residential" => array(
           "street" => "507, Koramangala 1st block",
           "city" => "Bangalore",
           "state" => "Karnataka",
           "postal_code" => "560035",
           "country" => "IN"
       )
   ),
   "kyc" => array(
       "pan" => "AVOPB1111J"
   ),
   "notes" => array(
       "random_key_by_partner" => "random_value2"
   )
));

```javascript: Node.js

const instance = new Razorpay({
  oauthToken: ""
);

const accountId = "acc_GP4lfNA0iIMn5B";
const stakeholderId = "sth_GOQ4Eftlz62TSL";

instance.stakeholders.edit(accountId, stakeholderId, {
  "percentage_ownership": 20,
  "name": "Gauri Kumar",
  "relationship": {
    "director": false,
    "executive": true
  },
  "phone": {
    "primary": "9898989898",
    "secondary": "9898989898"
  },
  "addresses": {
    "residential": {
      "street": "507, Koramangala 1st block",
      "city": "Bangalore",
      "state": "Karnataka",
      "postal_code": "560035",
      "country": "IN"
    }
  },
  "kyc": {
    "pan": "AVOPB1111J"
  },
  "notes": {
    "random_key_by_partner": "random_value2"
  }
});

```ruby: Ruby
require "razorpay"
Razorpay.setup('ACCESS_TOKEN')
accountId = "acc_GP4lfNA0iIMn5B";
stakeholderId = "sth_GOQ4Eftlz62TSL";

Razorpay::Stakeholder.edit(accountId, stakeholderId, {
  "percentage_ownership": 20,
  "name": "Gauri Kumar",
  "relationship": {
    "director": 0,
    "executive": 1
  },
  "phone": {
    "primary": "9898989898",
    "secondary": "9898989898"
  },
  "addresses": {
    "residential": {
      "street": "507, Koramangala 1st block",
      "city": "Bangalore",
      "state": "Karnataka",
      "postal_code": "560035",
      "country": "IN"
    }
  },
  "kyc": {
    "pan": "AVOPB1111J"
  },
  "notes": {
    "random_key_by_partner": "random_value2"
  }
})

```csharp: .NET
RazorpayClient client = new RazorpayClient("[ACCESS_TOKEN]");

Dictionary StakeRequest = new Dictionary();
StakeRequest.Add("percentage_ownership", 10);
StakeRequest.Add("name", "Gaurav Kumar");

Dictionary relationship = new Dictionary();
relationship.Add("director", true);
relationship.Add("executive", false);

StakeRequest.Add("relationship", relationship);

Dictionary phone = new Dictionary();
phone.Add("primary", "9999999999");
phone.Add("secondary", "9999999999");

StakeRequest.Add("phone", phone);

Dictionary residential = new Dictionary();
residential.Add("street", "507, Koramangala 6th block");
residential.Add("city", "Bengaluru");
residential.Add("state", "Karnataka");
residential.Add("postal_code", "560047");
residential.Add("country", "IN");

Dictionary addresses = new Dictionary();
addresses.Add("residential", residential);
StakeRequest.Add("addresses", addresses);

Dictionary kyc = new Dictionary();
kyc.Add("pan", "AVOPB1111K");

StakeRequest.Add("kyc", kyc);

Dictionary notes = new Dictionary();
notes.Add("random_key_by_partner", "random_value");

StakeRequest.Add("notes", notes);

string accountId = "acc_ua2tBezhcEBvap";
string stakeholderId = "sth_ua2tBezhcEBvap";

Stakeholder stakeholder = client.Stakeholder.Fetch(accountId, stakeholderId).Edit(accountId, StakeRequest);
```

### Response

```json: Success
{
  "id": "acc_GP4lfNA0iIMn5B",
  "type": "standard",
  "status": "created",
  "email": "gauri.kumari@example.com",
  "profile": {
    "category": "healthcare",
    "subcategory": "clinic",
    "addresses": {
      "registered": {
        "street1": "507, Koramangala 1st block",
        "street2": "MG Road-1",
        "city": "Bengalore",
        "state": "KARNATAKA",
        "postal_code": "560034",
        "country": "IN"
      }
    }
  },
  "notes": [],
  "created_at": 1610603081,
  "phone": "9000090000",
  "reference_id": "randomId",
  "business_type": "partnership",
  "legal_business_name": "Acme Corp",
  "customer_facing_business_name": "ABCD Ltd"
}
```

### Parameters

`account_id` _mandatory_
: `string` The unique identifier of a sub-merchant account generated by Razorpay. For example, `acc_GLGeLkU2JUeyDZ`

`id` _mandatory_
: `string` The unique identifier of the stakeholder whose details are to be updated. For example, `sth_GOQ4Eftlz62TSL`

### Parameters

`percentage_ownership`_optional_
: `float` The stakeholder's ownership of the business in percentage. Only two decimal places are allowed. For example, `87.55`. The maximum length is 100 characters.

`name` _optional_
: `string` The stakeholder's name as per the PAN card. The maximum length is 255 characters.

`relationship`
: `object` The stakeholder's relationship with the account's business.
    `director`
    : `boolean` Determines if stakeholder is a director of the account's legal entity.  
        - `true`: Stakeholder is a director.
        - `false` (default): Stakeholder is not a director.
    `executive`
    : `boolean` Determines if the stakeholder is an executive of the account's legal entity.
        - `true`: Stakeholder is an executive. 
        - `false` (false): Stakeholder is not an executive.

`phone` _optional_
: `object` The stakeholder's phone number.

    `primary`_optional_
    : `integer` The primary contact number of the stakeholder. The minimum length is 8 characters and the maximum length is 11.

    `secondary`_optional_
    : `integer` The secondary contact number of the stakeholder. The minimum length is 8 characters and the maximum length is 11.

`addresses` _optional_
: `object` Details of stakeholder's address.

    `residential`
    : `object` Details of the stakeholder's residential address.

        `street` _optional_
        : `string` The stakeholder's street address. The minimum length is 10 characters and maximum length is 255.

        `city` _optional_
        : `string` The city. The minimum length is 2 and maximum length is 32.

        `state` _optional_
        : `string` The state. The minimum length is 2 and maximum length is 32.
         
        `postal_code` _optional_
        : `string` The postal code. The minimum length is 2 and maximum length is 10.
         
        `country` _optional_
        : `string` The country. The minimum length is 2 and maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`. [List of supported Countries](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#country-list).

`kyc` _conditional_
: `object` The type of document required to establish the stakeholder's identity.

    `pan`
    : `string` The PAN number of the stakeholder.
 
      - This is a 10-digit alphanumeric code. For example, `AVOPB1111K`. 
      - **Regex to validate Stakeholder PAN**: `/^[a-zA-z]{5}\d{4}[a-zA-Z]{1}$/`.
      - **Validation for Stakeholder PAN**: The 4th digit should be 'P'.
      - If the business type is HUF, the karta's PAN should be provided.

`notes` _optional_
: `object` Contains user-defined fields stored by the partner for reference purposes. Maximum 15 key-value pairs, 512 characters (maximum) each. 

### Parameters

`id`
: `string` The unique identifier of a stakeholder generated by Razorpay, used to fetch or update a stakeholder. For example, `sth_GLGgm8fFCKc92m`. Maximum length supported is 18 characters. 

`percentage_ownership`
: `float` The stakeholder's ownership of the business in percentage. Only two decimal places are allowed. For example, `87.55`. The maximum length is 100 characters.

`name`
: `string` The stakeholder's name as per the PAN card. The maximum length is 255 characters.

`email`
: `string` The stakeholder's email address. The maximum length is:
  - local part (before @): 64 characters. 
  - domain part (after @): 68 characters. 
 The total character length supported is 132.

`relationship`
: `object` The stakeholder's relationship with the account's business.
    `director`
    : `boolean` Determines if stakeholder is a director of the account's legal entity.  
        - `true`: Stakeholder is a director.
        - `false` (default): Stakeholder is not a director.
    `executive`
    : `boolean` Determines if the stakeholder is an executive of the account's legal entity.
        - `true`: Stakeholder is an executive. 
        - `false` (false): Stakeholder is not an executive.

`phone`
: `object` The stakeholder's phone number.

    `primary`
    : `integer` The primary contact number of the stakeholder. The minimum length is 8 characters and the maximum length is 11.

    `secondary`
    : `integer` The secondary contact number of the stakeholder. The minimum length is 8 characters and the maximum length is 11.

`addresses`
: `object` Details of stakeholder's address.

    `residential`
    : `string` Details of the stakeholder's residential address.

        `street`
        : `string` The stakeholder's street address. The minimum length is 10 characters and maximum length is 255.

        `city`
        : `string` The city. The minimum length is 2 and maximum length is 32.

        `state`
        : `string` The state. The minimum length is 2 and maximum length is 32.

        `postal_code`
        : `string` The postal code. The minimum length is 2 and maximum length is 10.

        `country`
        : `string` The country. The minimum length is 2 and maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`. [List of supported Countries](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#country-list).

`kyc`
: `object` The type of document required to establish the stakeholder's identity.

    `pan`
    : `string` The PAN number of the stakeholder.
 
      - This is a 10-digit alphanumeric code. For example, `AVOPB1111K`. 
      - **Regex to validate Stakeholder PAN**: `/^[a-zA-z]{5}\d{4}[a-zA-Z]{1}$/`
      - **Validation for Stakeholder PAN**: The 4th digit should be 'P'.

      - If the business type is HUF, the karta's PAN should be provided.
      - This API parameter might be required to complete the KYC process, however, it is optional for this API.

`notes`
: `object` Contains user-defined fields stored by the partner for reference purposes. It can hold a maximum of 15 key-value pairs, 512 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.
