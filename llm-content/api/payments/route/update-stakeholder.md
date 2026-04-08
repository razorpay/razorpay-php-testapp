---
title: Update a Stakeholder Account
description: Update a stakeholder account using the Razorpay API.
---

# Update a Stakeholder Account

## Update a Stakeholder Account

Use this endpoint to update a stakeholder account.

### Request

```curl: Curl 
curl -X PATCH 'https://api.razorpay.com/v2/accounts/acc_GLGeLkU2JUeyDZ/stakeholders/sth_GOQ4Eftlz62TSL' \
     -u [YOUR_KEY_ID]:[YOUR_SECRET] \
     -H "Content-type: application/json" \
     -d '{
   "addresses":{
      "residential":{
         "street":"507, Koramangala 1st block",
         "city":"Bangalore",
         "state":"Karnataka",
         "postal_code":"560035",
         "country":"IN"
      }
   },
   "kyc":{
      "pan":"AVOPBXXXXX"
   }
}'

```java: Java

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String accountId = "acc_GLGeLkU2JUeyDZ";

String stakeholderId = "sth_GOQ4Eftlz62TSL";

JSONObject residential = new JSONObject();
residential.put("street","507, Koramangala 1st block");
residential.put("city","Bengaluru");
residential.put("state","Karnataka");
residential.put("postal_code","560035");
residential.put("country","IN");

JSONObject addresses = new JSONObject();
addresses.put("residential",residential);
StakeRequest.put("addresses",addresses);

JSONObject kyc = new JSONObject();
kyc.put("pan","AVOPBXXXXX");

StakeRequest.put("kyc",kyc);

Stakeholder stakeholder = instance.stakeholder.edit(accountId, stakeholderId, StakeRequest);

```python: Python

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

accountId = "acc_GLGeLkU2JUeyDZ"
stakeholderId = "sth_GOQ4Eftlz62TSL"

client.stakeholder.edit(accountId, stakeholderId, {
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
    "pan": "AVOPBXXXXX"
  }
})

```php: PHP

$api = new Api($key_id, $secret);

$accountId = "acc_GLGeLkU2JUeyDZ";
$stakeholderId = "sth_GOQ4Eftlz62TSL";

$api->account->fetch($accountId)->stakeholders()->edit($stakeholderId, array(
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
        "pan" => "AVOPBXXXXX"
    )
));

```csharp: .NET

RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

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
kyc.Add("pan", "AVOPBXXXXX");

StakeRequest.Add("kyc", kyc);

string accountId = "acc_GLGeLkU2JUeyDZ";
string stakeholderId = "sth_GOQ4Eftlz62TSL";

Stakeholder stakeholder = client.Stakeholder.Fetch(accountId, stakeholderId).Edit(accountId, StakeRequest);

```ruby: Ruby

require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

accountId = "acc_GLGeLkU2JUeyDZ";
stakeholderId = "sth_GOQ4Eftlz62TSL";

Razorpay::Stakeholder.edit(accountId, stakeholderId, {
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
    "pan": "AVOPBXXXXX"
  }
})

```javascript: Node.js

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var accountId = "acc_GLGeLkU2JUeyDZ";
var stakeholderId = "sth_GOQ4Eftlz62TSL";

instance.stakeholders.edit(accountId, stakeholderId, {
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
    "pan": "AVOPBXXXXX"
  }
});

```go: Go

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

accountId := "acc_GLGeLkU2JUeyDZ"
stakeholderId := "sth_GOQ4Eftlz62TSL"

data := map[string]interface{}{
    "addresses": map[string]interface{}{
        "residential": map[string]interface{}{
        "street": "507, Koramangala 1st block",
        "city": "Bengaluru",
        "state": "Karnataka",
        "postal_code": "560035",
        "country": "IN",
        },
    },
    "kyc": map[string]interface{}{
        "pan": "AVOPBXXXXX",
    }
}
body, err := client.Stakeholder.Edit(accoundId, stakeholderId, data, nil)
```

### Response

```json: Success
{
  "entity": "stakeholder",
  "relationship": {
    "executive": true
  },
  "phone": {
    "primary": "9000090000",
    "secondary": "9000090000"
  },
  "notes": {
    "random_key_by_partner": "random_value"
  },
  "kyc": {
    "pan": "AVOPB1111K"
  },
  "id": "sth_GLGgm8fFCKc92m",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "percentage_ownership": 10,
  "addresses": {
    "residential": {
      "street": "506, Koramangala 1st block",
      "city": "Bengaluru",
      "state": "Karnataka",
      "postal_code": "560034",
      "country": "IN"
    }
  }
}

```json: Failure
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"Linked account does not exist",
      "source":"",
      "step":"",
      "reason":"linked_account_id_does_not_exist",
      "metadata":{
         
      }
   }
}
```

### Parameters

`account_id`
: `string` The unique identifier of the account generated by Razorpay. For example, `acc_GLGeLkU2JUeyDZ`. This id is used to fetch or update a stakeholder.

`stakeholder_id`
: `string` The unique of the stakeholder account created. For example, `sth_GOQ4Eftlz62TSL`.

### Parameters

`name` _mandatory_
: `string` The stakeholder's name as per the PAN card. The maximum length is 255 characters.

`email` _mandatory_
: `string` The stakeholder's email address. The maximum length is:
  - local part (before @): 64 characters. 
  - domain part (after @): 68 characters. 
 The total character length supported is 132.

`percentage_ownership`_optional_
: `float` The stakeholder's ownership of the business in percentage. Only two decimal places are allowed. For example, `87.55`. The maximum length is 100 characters.

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
        : `string` The country. The minimum length is 2 and maximum length is 64. For example, for India, you must write either `IN` or `india`.

`kyc` _conditional_
: `object` The type of document required to establish the stakeholder's identity.

   `pan`
   : `string` The PAN number of the stakeholder.
      - This is a 10-digit alphanumeric code. For example, `AVOPB1111K`. 
      - **Regex for Stakeholder PAN**: `/^[a-zA-z]{5}\d{4}[a-zA-Z]{1}$/`.
      - **Validation for Stakeholder PAN**: The 4th digit should be `P`.

`notes` _optional_
: `object` Contains user-defined fields stored for reference purposes. Maximum 15 key-value pairs, 512 characters (maximum) each.

### Parameters

`id`
: `string` The unique identifier of a stakeholder generated by Razorpay, used to fetch or update a stakeholder. For example, `sth_GLGgm8fFCKc92m`. Maximum length supported is 18 characters. 

`entity`
: `string` Here it is `stakeholder`.

`percentage_ownership`
: `float` The stakeholder's ownership of the business in percentage. Only two decimal places are allowed. For example, `87.55`. The maximum length is 100 characters.

`name`
: `string` The stakeholder's name as per the PAN card. The maximum length is 255 characters.

`email`
: `string` The stakeholder's email address. The maximum length is:
  - local part (before @): 64 characters. 
  - domain part (after @): 68 characters.

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
        : `string` The country. The minimum length is 2 and maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`.

`kyc`
: `object` The type of document required to establish the stakeholder's identity.

    `pan`
    : `string` The PAN of the stakeholder.
 
      - This is a 10-digit alphanumeric code. For example, `AVOPB1111K`. 
      - **Regex for Stakeholder PAN**: `/^[a-zA-z]{5}\d{4}[a-zA-Z]{1}$/`
      - **Validation for Stakeholder PAN**: The 4th digit should be 'P'.

      
> **INFO**
>
> 
>       **Handy Tip**
>       

>       To complete the KYC process, this API parameter might be required, but it is optional for this API.
>       
 

`notes`
: `object` Contains user-defined fields stored by the partner for reference purposes. It can hold a maximum of 15 key-value pairs, 512 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.

### Errors

Linked account does not exist.
* code: 400
* description: This error occurs when the requester is not the parent of the child account, or the child account does not exist.
* solution: Ensure the Linked Account id exists before proceeding with the update API.
 
The id provided does not exist.
* code: 400
* description: This error occurs when the stakeholder does not belong to the account provided.
* solution: Ensure you provide a valid id with the existing account.

Merchant activation form has been locked for editing by admin.
* code: 400
* description: This error occurs when the submitted extra fields are under the review stage.
* solution: You can wait for the review to be successful.
