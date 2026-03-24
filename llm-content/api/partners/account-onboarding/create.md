---
title: Create an Account | Sub-Merchant Onboarding APIs
heading: Create an Account
description: Onboard sub-merchants by creating an account using Razorpay Partners APIs.
---

# Create an Account

## Create an Account

Use this endpoint to create an account.

### Request

```Curl: Curl
curl -X POST https://api.razorpay.com/v2/accounts \
-u  \
-H "Content-Type: application/json" \
-d '{
  "email": "gauriagain.kumar@example.org",
  "phone": "9000090000",
  "legal_business_name": "Acme Corp",
  "business_type": "partnership",
  "customer_facing_business_name": "Example",
  "profile": {
    "category": "healthcare",
    "subcategory": "clinic",
    "description": "Healthcare E-commerce platform",
    "addresses": {
      "operation": {
        "street1": "507, Koramangala 6th block",
        "street2": "Kormanagala",
        "city": "Bengaluru",
        "state": "Karnataka",
        "postal_code": 560047,
        "country": "IN"
      },
      "registered": {
        "street1": "507, Koramangala 1st block",
        "street2": "MG Road",
        "city": "Bengaluru",
        "state": "Karnataka",
        "postal_code": 560034,
        "country": "IN"
      }
    },
    "business_model": "Online Clothing ( men, women, ethnic, modern ) fashion and lifestyle, accessories, t-shirt, shirt, track pant, shoes."
  },
  "legal_info": {
    "pan": "AAACL1234C",
    "gst": "18AABCU9603R1ZM"
  },
  "brand": {
    "color": "FFFFFF"
  },
  "notes": {
    "internal_ref_id": "123123"
  },
  "contact_name": "Gaurav Kumar",
  "contact_info": {
    "chargeback": {
      "email": "cb@example.org"
    },
    "refund": {
      "email": "cb@example.org"
    },
    "support": {
      "email": "support@example.org",
      "phone": "9999999998",
      "policy_url": "https://www.google.com"
    }
  },
  "apps": {
    "websites": [
      "https://www.example.org"
    ],
    "android": [
      {
        "url": "playstore.example.org",
        "name": "Example"
      }
    ],
    "ios": [
      {
        "url": "appstore.example.org",
        "name": "Example"
      }
    ]
  }
}'

```java: Java

RazorpayClient razorpay = new RazorpayClient("[ACCESS_TOKEN]");

JSONObject accountRequest = new JSONObject();
accountRequest.put("email","gauriagain.kumar@example.org");
accountRequest.put("phone","9000090000");
accountRequest.put("legal_business_name","Acme Corp");
accountRequest.put("business_type","partnership");
accountRequest.put("customer_facing_business_name","Example");
JSONObject profile = new JSONObject();
profile.put("category","healthcare");
profile.put("subcategory","clinic");
profile.put("description","Healthcare E-commerce platform");

JSONObject operation = new JSONObject();
operation.put("street1","507, Koramangala 6th block");
operation.put("street2","507, Koramangala");
operation.put("city","Bengaluru");
operation.put("state","Karnataka");
operation.put("postal_code","560047");
operation.put("country","IN");

JSONObject registered = new JSONObject();
registered.put("street1","507, Koramangala 1th block");
registered.put("street2","MG Road");
registered.put("city","Bengaluru");
registered.put("state","Karnataka");
registered.put("postal_code","560034");
registered.put("country","IN");

JSONObject addresses = new JSONObject();
addresses.put("operation",operation);
addresses.put("registered",registered);

profile.put("addresses",addresses);
profile.put("business_model","Online Clothing ( men, women, ethnic, modern ) fashion and lifestyle, accessories, t-shirt, shirt, track pant, shoes.");

JSONObject legalInfo = new JSONObject();
legalInfo.put("pan","AAACL1234C");
legalInfo.put("gst","18AABCU9603R1ZM");

accountRequest.put("profile",profile);
accountRequest.put("legal_info",legalInfo);

JSONObject brand = new JSONObject();
brand.put("color","FFFFFF");

accountRequest.put("brand",brand);

JSONObject notes = new JSONObject();
notes.put("internal_ref_id","123123");

accountRequest.put("notes",notes);
accountRequest.put("contact_name","Gaurav Kumar");

JSONObject contactInfo = new JSONObject();
JSONObject chargeback = new JSONObject();
chargeback.put("email","cb@example.org");

JSONObject refund = new JSONObject();
refund.put("email","cb@example.org");

JSONObject support = new JSONObject();
support.put("email","support@example.org");
support.put("phone","9999999998");
support.put("policy_url","https://www.google.com");

contactInfo.put("chargeback",chargeback);
contactInfo.put("refund",refund);
contactInfo.put("support",support);
accountRequest.put("contact_info",contactInfo);

JSONObject apps = new JSONObject();
ArrayList url = new ArrayList();
url.add("https://www.example.org");

apps.put("websites",url);
ArrayList android = new ArrayList();
JSONObject android_details = new JSONObject();
android_details.put("url","playstore.example.org");
android_details.put("name","Example");

apps.put("android",android);
android.add(android_details);
ArrayList ios = new ArrayList();
JSONObject ios_details = new JSONObject();
ios_details.put("url","appstore.example.org");
ios_details.put("name","Example");
ios.add(ios_details);
apps.put("android",android);
apps.put("ios",ios);

Account account = instance.account.create(accountRequest);

```php: PHP
$api = new Api(null, null, "");

$api->account->create(array(
   "email" => "gauriagain.kumar@example.org",
   "phone" => "9000090000",
   "legal_business_name" => "Acme Corp",
   "business_type" => "partnership",
   "customer_facing_business_name" => "Example",
   "profile" => array(
       "category" => "healthcare",
       "subcategory" => "clinic",
       "description" => "Healthcare E-commerce platform",
       "addresses" => array(
           "operation" => array(
               "street1" => "507, Koramangala 6th block",
               "street2" => "Kormanagala",
               "city" => "Bengaluru",
               "state" => "Karnataka",
               "postal_code" => 560047,
               "country" => "IN"
           ),
           "registered" => array(
               "street1" => "507, Koramangala 1st block",
               "street2" => "MG Road",
               "city" => "Bengaluru",
               "state" => "Karnataka",
               "postal_code" => 560034,
               "country" => "IN"
           )
       ),
       "business_model" => "Online Clothing ( men, women, ethnic, modern ) fashion and lifestyle, accessories, t-shirt, shirt, track pant, shoes."
   ),
   "legal_info" => array(
       "pan" => "AAACL1234C",
       "gst" => "18AABCU9603R1ZM"
   ),
   "brand" => array(
       "color" => "FFFFFF"
   ),
   "notes" => array(
       "internal_ref_id" => "123123"
   ),
   "contact_name" => "Gaurav Kumar",
   "contact_info" => array(
       "chargeback" => array(
           "email" => "cb@example.org"
       ),
       "refund" => array(
           "email" => "cb@example.org"
       ),
       "support" => array(
           "email" => "support@example.org",
           "phone" => "9999999998",
           "policy_url" => "https://www.google.com"
       )
   ),
   "apps" => array(
       "websites" => array(
           "https://www.example.org"
       ),
       "android" => array(
           array(
               "url" => "playstore.example.org",
               "name" => "Example"
           )
       ),
       "ios" => array(
           array(
               "url" => "appstore.example.org",
               "name" => "Example"
           )
       )
   )
));

```javascript: Node.js

const instance = new Razorpay({
  oauthToken: ""
);

instance.accounts.create({
    "email": "gauriagain.kumar@example.org",
    "phone": "9000090000",
    "legal_business_name": "Acme Corp",
    "business_type": "partnership",
    "customer_facing_business_name": "Example",
    "profile": {
      "category": "healthcare",
      "subcategory": "clinic",
      "description": "Healthcare E-commerce platform",
      "addresses": {
        "operation": {
          "street1": "507, Koramangala 6th block",
          "street2": "Kormanagala",
          "city": "Bengaluru",
          "state": "Karnataka",
          "postal_code": 560047,
          "country": "IN"
        },
        "registered": {
          "street1": "507, Koramangala 1st block",
          "street2": "MG Road",
          "city": "Bengaluru",
          "state": "Karnataka",
          "postal_code": 560034,
          "country": "IN"
        }
      },
      "business_model": "Online Clothing ( men, women, ethnic, modern ) fashion and lifestyle, accessories, t-shirt, shirt, track pant, shoes."
    },
    "legal_info": {
      "pan": "AAACL1234C",
      "gst": "18AABCU9603R1ZM"
    },
    "brand": {
      "color": "FFFFFF"
    },
    "notes": {
      "internal_ref_id": "123123"
    },
    "contact_name": "Gaurav Kumar",
    "contact_info": {
      "chargeback": {
        "email": "cb@example.org"
      },
      "refund": {
        "email": "cb@example.org"
      },
      "support": {
        "email": "support@example.org",
        "phone": "9999999998",
        "policy_url": "https://www.google.com"
      }
    },
    "apps": {
      "websites": [
        "https://www.example.org"
      ],
      "android": [
        {
          "url": "playstore.example.org",
          "name": "Example"
        }
      ],
      "ios": [
        {
          "url": "appstore.example.org",
          "name": "Example"
        }
      ]
    }
  })

```ruby: Ruby

require "razorpay"
Razorpay._with_oauth('access_token')
Razorpay::Account.create({
  "email": "gauriagain.kumar@example.org",
  "phone": "9000090000",
  "legal_business_name": "Acme Corp",
  "business_type": "partnership",
  "customer_facing_business_name": "Example",
  "profile": {
    "category": "healthcare",
    "subcategory": "clinic",
    "description": "Healthcare E-commerce platform",
    "addresses": {
      "operation": {
        "street1": "507, Koramangala 6th block",
        "street2": "Kormanagala",
        "city": "Bengaluru",
        "state": "Karnataka",
        "postal_code": 560047,
        "country": "IN"
      },
      "registered": {
        "street1": "507, Koramangala 1st block",
        "street2": "MG Road",
        "city": "Bengaluru",
        "state": "Karnataka",
        "postal_code": 560034,
        "country": "IN"
      }
    },
    "business_model": "Online Clothing ( men, women, ethnic, modern ) fashion and lifestyle, accessories, t-shirt, shirt, track pant, shoes."
  },
  "legal_info": {
    "pan": "AAACL1234C",
    "gst": "18AABCU9603R1ZM"
  },
  "brand": {
    "color": "FFFFFF"
  },
  "notes": {
    "internal_ref_id": "123123"
  },
  "contact_name": "Gaurav Kumar",
  "contact_info": {
    "chargeback": {
      "email": "cb@example.org"
    },
    "refund": {
      "email": "cb@example.org"
    },
    "support": {
      "email": "support@example.org",
      "phone": "9999999998",
      "policy_url": "https://www.google.com"
    }
  },
  "apps": {
    "websites": [
      "https://www.example.org"
    ],
    "android": [
      {
        "url": "playstore.example.org",
        "name": "Example"
      }
    ],
    "ios": [
      {
        "url": "appstore.example.org",
        "name": "Example"
      }
    ]
  }
})

```csharp: .NET
RazorpayClient client = new RazorpayClient("[ACCESS_TOKEN]");

Dictionary accountRequest = new Dictionary();
accountRequest.Add("email", "gauriagain_n21.kumar@example.org");
accountRequest.Add("phone", "9000090000");
accountRequest.Add("legal_business_name", "Acme Corp");
accountRequest.Add("business_type", "partnership");
accountRequest.Add("customer_facing_business_name", "Example");
Dictionary profile = new Dictionary();
profile.Add("category", "healthcare");
profile.Add("subcategory", "clinic");
profile.Add("description", "Healthcare E-commerce platform");

Dictionary operation = new Dictionary();
operation.Add("street1", "507, Koramangala 6th block");
operation.Add("street2", "507, Koramangala");
operation.Add("city", "Bengaluru");
operation.Add("state", "Karnataka");
operation.Add("postal_code", "560047");
operation.Add("country", "IN");

Dictionary registered = new Dictionary();
registered.Add("street1", "507, Koramangala 1th block");
registered.Add("street2", "MG Road");
registered.Add("city", "Bengaluru");
registered.Add("state", "Karnataka");
registered.Add("postal_code", "560034");
registered.Add("country", "IN");

Dictionary addresses = new Dictionary();
addresses.Add("operation", operation);
addresses.Add("registered", registered);

profile.Add("addresses", addresses);
profile.Add("business_model", "Online Clothing ( men, women, ethnic, modern ) fashion and lifestyle, accessories, t-shirt, shirt, track pant, shoes.");

Dictionary legalInfo = new Dictionary();
legalInfo.Add("pan", "AAACL1234C");
legalInfo.Add("gst", "18AABCU9603R1ZM");

accountRequest.Add("profile", profile);
accountRequest.Add("legal_info", legalInfo);

Dictionary brand = new Dictionary();
brand.Add("color", "FFFFFF");

accountRequest.Add("brand", brand);

Dictionary notes = new Dictionary();
notes.Add("internal_ref_id", "123123");

accountRequest.Add("notes", notes);
accountRequest.Add("contact_name", "Gaurav Kumar");

Dictionary contactInfo = new Dictionary();
Dictionary chargeback = new Dictionary();
chargeback.Add("email", "cb@example.org");

Dictionary refund = new Dictionary();
refund.Add("email", "cb@example.org");

Dictionary support = new Dictionary();
support.Add("email", "support@example.org");
support.Add("phone", "9999999998");
support.Add("policy_url", "https://www.google.com");

contactInfo.Add("chargeback", chargeback);
contactInfo.Add("refund", refund);
contactInfo.Add("support", support);
accountRequest.Add("contact_info", contactInfo);

Dictionary apps = new Dictionary();
List url = new List();
url.Add("https://www.example.org");

apps.Add("websites", url);
Dictionary android_details = new Dictionary();
android_details.Add("url", "playstore.example.org");
android_details.Add("name", "Example");
List> android = new List>();
android.Add(android_details);
apps.Add("android", android);

Dictionary ios_details = new Dictionary();
ios_details.Add("url", "appstore.example.org");
ios_details.Add("name", "Example");
List> ios = new List>();
ios.Add(ios_details);
apps.Add("ios", ios);
accountRequest.Add("apps", apps);

Account payment = client.Account.Create(accountRequest);

```

### Response

```json: Success
{
  "id": "acc_GRWKk7qQsLnDjX",
  "type": "standard",
  "status": "created",
  "email": "gauriagain.kumar@example.org",
  "profile": {
    "category": "healthcare",
    "subcategory": "clinic",
    "addresses": {
      "registered": {
        "street1": "507, Koramangala 1st block",
        "street2": "MG Road",
        "city": "Bengaluru",
        "state": "KARNATAKA",
        "postal_code": 560034,
        "country": "IN"
      },
      "operation": {
        "street1": "507, Koramangala 6th block",
        "street2": "Kormanagalo",
        "city": "Bengaluru",
        "state": "KARNATAKA",
        "country": "IN",
        "postal_code": 560047
      }
    },
    "business_model": "Online Clothing ( men, women, ethnic, modern ) fashion and lifestyle, accessories, t-shirt, shirt, track pant, shoes."
  },
  "notes": {
    "internal_ref_id": "123123"
  },
  "created_at": 1611136837,
  "phone": "9000090000",
  "business_type": "partnership",
  "legal_business_name": "Acme Corp",
  "customer_facing_business_name": "Example",
  "legal_info": {
    "pan": "AAACL1234C",
    "gst": "18AABCU9603R1ZM"
  },
  "apps": {
    "websites": [
      "https://www.example.org"
    ],
    "android": [
      {
        "url": "playstore.example.org",
        "name": "Example"
      }
    ],
    "ios": [
      {
        "url": "appstore.example.org",
        "name": "Example"
      }
    ]
  },
  "brand": {
    "color": "#FFFFFF"
  },
  "contact_info": {
    "chargeback": {
      "email": "cb@example.org",
      "phone": null,
      "policy_url": null
    },
    "refund": {
      "email": "cb@example.org",
      "phone": null,
      "policy_url": null
    },
    "support": {
      "email": "support@example.org",
      "phone": "9999999998",
      "policy_url": "https://www.google.com"
    }
  }
}
```

### Parameters

`email`_mandatory_
: `string` The sub-merchant's business email address.

`phone`_mandatory_
: `integer` The sub-merchant's business phone number, without the country code. The minimum length is 8 characters and the maximum length is 15. For example, `9876543210`.

`legal_business_name` _mandatory_
: `string` The name of the sub-merchant's business. For example, `Acme Corp`. The minimum length is 4 characters and the maximum length is 200.

`customer_facing_business_name` _optional_
: `string` The sub-merchant billing label as it appears on the Dashboard. The minimum length is 1 character and the maximum length is 255.

`business_type` _mandatory_
: `string` The type of business operated by the sub-merchant. Possible values: [Business Types](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md).

`reference_id` _optional_
: `string` Partner's external account reference id. The minimum length is 1 character and the maximum length is 512.

`profile`
: `object` The business details of the sub-merchant's account.

    `category` _mandatory_
    : `string` The business category of the sub-merchant. Possible values: [List of Business Categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#business-category).

    `subcategory` _mandatory_
    : `string` The business sub-category of the sub-merchant. Possible values: [List of Business Sub-Categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#business-sub-category).

    `description` _deprecated_
    : `string` This parameter has been deprecated. Pass the description using the `business_model` parameter.

    `business_model` _optional_
    : `string` The business description. The character limit between 1-255 characters.

    `addresses`
    : `object` Details of sub-merchant's address.

        `operation` _optional_
        : `object` Details of the sub-merchant's operational address.

            `street1` 
            : `string` Address, line 1. The maximum length is 100 characters.

            `street2`
            : `string` Address, line 2. The maximum length is 100 characters.

            `city`
            : `string` The city. The maximum length is 100 characters.

            `state`
            : `string` The state. The minimum length is 2 and the maximum length is 32.

            `postal_code`
            : `integer` The postal code. This should be exactly 6 characters.

            `country`
            : `string` The country. The minimum length is 2 and the maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`. [List of supported Countries](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#country-list).

        `registered` _mandatory_
        : `object` Details of the sub-merchant's registered address.

            `street1` 
            : `string` Address, line 1. The maximum length is 100 characters.

            `street2` 
            : `string` Address, line 2. The maximum length is 100 characters.

            `city`
            : `string` The city. The maximum length is 100 characters.

            `state`
            : `string` The state. The minimum length is 2 and the maximum length is 32.

            `postal_code`
            : `integer` The postal code. This should be exactly 6 characters.

            `country`
            : `string` The country. The minimum length is 2 and the maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`. [List of supported Countries](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#country-list).

`legal_info` _optional_
: `object` The legal details about the sub-merchant's business.

    `pan` _optional_
    : `string` Valid PAN number details of the sub-merchant's business. 
        - This is a 10-digit alphanumeric code. For example, `AVOJB1111K`. 
        - The 4th digit should be either of 'C', 'H', 'F', 'A', 'T', 'B', 'J', 'G', 'L'. 
        - The regex for Company PAN is `/^[a-zA-z]{5}\d{4}[a-zA-Z]{1}$/`.

    `gst` _optional_
    : `string` Valid GSTIN number details of the sub-merchant. 
        - This is a 15-digit PAN-based unique identification number. 
        - The Regex for GSTIN is `/^[0123][0-9][a-z]{5}[0-9]{4}[a-z][0-9][a-z0-9][a-z0-9]$/gi`

    `cin` _optional_
    : `string` CIN is for Private Limited and Public Limited, whereas LLPIN is for LLP business type.
        - This is a 21-digit alpha-numeric number.
        - The Regex for CIN is `/^([a-z]{3}-\d{4}|[ul]\d{5}[a-z]{2}\d{4}[a-z]{3}\d{6})$/i`.

`brand` _optional_
: `object` The branding details of the sub-merchant's business.

    `color` _optional_
    : `string` The color code of sub-merchant's business brand. This is a 6-character hex code (Regex: [a-fA-F0-9]\{6\}).

`notes` _optional_
: `object` Contains user-defined fields stored by the partner for reference purposes.

`contact_name` _mandatory_
: `string` The name of the contact. The minimum length is 4 and the maximum length is 255 characters.

`contact_info` _optional_
: `object` Options available for contact support.

    `chargeback`
    : `object` The type of contact support.

        `email` _optional_
        : `string` The email id of chargeback POC. The maximum length is:
          - local part (before @): 64 characters. 
          - domain part (after @): 68 characters. 
 The total character length supported is 132.

        `phone` _optional_
        : `string` The phone number of chargeback POC. The minimum length is 8 and the maximum length is 10 characters.

        `policy_url` _optional_
        : `string` The URL of chargeback policy.

    `refund`
    : `object` The type of contact support.

        `email` _optional_
        : `string` The email id of refund POC. The maximum length is:
          - local part (before @): 64 characters. 
          - domain part (after @): 68 characters. 
 The total character length supported is 132.

        `phone` _optional_
        : `string` The phone number of refund POC. The minimum length is 8 and the maximum length is 10 characters.

        `policy_url` _optional_
        : `string` The URL of refund policy.

    `support`
    : `object` The type of contact support.

        `email` _optional_
        : `string` The email id of support POC. The maximum length is:
          - local part (before @): 64 characters. 
          - domain part (after @): 68 characters. 
 The total character length supported is 132.

        `phone` _optional_
        : `string` The phone number of support POC. The minimum length is 8 and the maximum length is 10 characters.

        `policy_url` _optional_
        : `string` The URL of support policy.

`apps` _optional_
: `object` The website/app details of the sub-merchant's business.

    `websites` _optional_
    : `array` The websites for the sub-merchant's business. A minimum of 1 website is required.

    `android` _optional_
    : `array` Android app details

        `url`_optional_
        : `string` The link of the Android app. Regex is (protocol://``:port/resource path?querystring#fragementid) 
 protocol-both http/https allowed.

        `name` _optional_
        : `string` The name of the Android app.

    `ios` _optional_
    : `array` iOS app details

        `url` _optional_
        : `string` The link of the iOS app. Regex is (protocol://``:port/resource path?querystring#fragementid) 
 protocol-both http/https allowed.

        `name` _optional_
        : `string` The name of the iOS app.

### Parameters

`id`
: `string` The unique identifier of a sub-merchant account generated by Razorpay. The maximum length is 18 characters. For example, `acc_GLGeLkU2JUeyDZ`.

`type`
: `string` The account type. Possible value is `standard`.

`status`
: `string` The status of the account. Possible values:
  - `created`: Account status when the merchant account is created.
  - `activated`: Account status when the merchant KYC is approved.
  - `needs_clarification`: Account status when the merchant is asked to provide clarifications related to the KYC details submitted.
  - `under_review`: Account status when the merchant submits all the KYC requirements.
  - `suspended`: Account status when the merchant account is identified as potentially fraudulent and is suspended.
  - `rejected`: Account status when the KYC details submitted by the merchant are rejected during manual review. 

`email`
: `string` The sub-merchant's business email address.

`phone`
: `integer` The sub-merchant's business phone number. The minimum length is 8 characters and the maximum length is 15.

`legal_business_name`
: `string` The name of the sub-merchant's business. For example, `Acme Corp`. The minimum length is 4 characters and the maximum length is 200.

`customer_facing_business_name`
: `string` The sub-merchant billing label as it appears on the Dashboard. The minimum length is 1 character and the maximum length is 255. This parameter might be required to complete the KYC process. However, it is optional for this API.

`business_type`
: `string` The type of business operated by the sub-merchant. Possible values: [Business Types](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md).

`reference_id`
: `string` Partner's external account reference id. The minimum length is 1 character and the maximum length is 512.

`profile`
: `object` The business details of the sub-merchant's account.

    `category`
    : `string` The business category of the sub-merchant. Possible values: [Business Category](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#business-category)

    `subcategory`
    : `string` The business sub-category of the sub-merchant. Possible values: [Business Sub-Category](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#business-sub-category)
    
    `description` _deprecated_
    : `string` This parameter has been deprecated. Pass the description using the `business_model` parameter.

    `business_model`
    : `string` The business description. The minimum length is 1 character and the maximum length is 255.

    `addresses`
    : `object` Details of sub-merchant's address.
  

        `operation`
        : `object` Details of the sub-merchant's operational address. This parameter might be required to complete the KYC process. However, it is optional for this API.

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
            : `string` The country. The minimum length is 2 and the maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`. [List of supported Countries](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#country-list).

        `registered`
        : `object` Details of the sub-merchant's registered address.

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
            : `string` The country. The minimum length is 2 and the maximum length is 64. This can either be a country code in capital letters or the full name of the country in lower case letters. For example, for India, you must write either `IN` or `india`. [List of supported Countries](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md#country-list).

`legal_info`
: `object` The legal details about the sub-merchant's business.

    `pan`
    : `string` Valid PAN number details of the sub-merchant's business. 
        - This is a 10-digit alphanumeric code. For example, `AVOJB1111K`. 
        - The 4th digit should be either of 'C', 'H', 'F', 'A', 'T', 'B', 'J', 'G', 'L'. 
        - The regex for Company PAN is `/^[a-zA-z]{5}\d{4}[a-zA-Z]{1}$/`.
 This parameter might be required to complete the KYC process. However, it is optional for this API. Business types like proprietorship and individual (`not_yet_registered`), do not require Business PAN.

    `gst`
    : `string` Valid GSTIN number details of the sub-merchant. 
        - This is a 15-digit PAN-based unique identification number. 
        - The Regex to validate GSTIN is `/^[0123][0-9][a-z]{5}[0-9]{4}[a-z][0-9][a-z0-9][a-z0-9]$/gi`.

    `cin`
    : `string` CIN is for Private Limited and Public Limited, whereas LLPIN is for LLP business type.
        - This is a 21-digit alpha-numeric number.
        - The Regex to validate CIN is `/^([a-z]{3}-\d{4}|[ul]\d{5}[a-z]{2}\d{4}[a-z]{3}\d{6})$/i`.

`brand`
: `object` The branding details of the sub-merchant's business.

    `color`
    : `string` The color code of sub-merchant's business brand. This is a 6-character hex code (Regex: [a-fA-F0-9]\{6\}).

`notes`
: `object` Contains user-defined fields stored by the partner for reference purposes.

`contact_name`
: `string` The name of the contact. The minimum length is 4 and the maximum length is 255 characters.

`contact_info`
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

`apps`
: `object` The app details of the sub-merchant's business

    `websites`
    : `array` The website/app for the sub-merchant's business. A minimum of 1 website is required.

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

`activated_at`
: `integer` Unix timestamp that indicates when the merchant account was activated. This parameter has `null` value till the account is activated.

`live`
: `boolean` Indicates the payments acceptance status of the merchant account. Possible values:
  - `true`:  Merchant can start accepting customer payments.
  - `false`: Merchant cannot accept customer payments.

`hold_funds`
: `boolean` Indicates the settlements status of the merchant account. Possible values:
  - `true`:  Settlement are on hold. Funds are not transferred to the merchant account.
  - `false`: Settlements can be transferred to the merchant account.
