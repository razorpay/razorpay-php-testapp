---
title: Aggregator Partners | Sub-Merchant Onboarding APIs
heading: Sub-Merchant Onboarding APIs
description: Use various Sub-Merchant Onboarding APIs to seamlessly onboard merchants from your platform.
---

# Sub-Merchant Onboarding APIs

As a Partner, you can use the Sub-Merchant Onboarding APIs to onboard merchants from your platform. The sub-merchants can complete the KYC process in the Partner's platform itself and need not log in to Razorpay's platform.

- Razorpay Sub-Merchant Onboarding APIs are RESTful. All our responses are returned in JSON.
- You can use Razorpay APIs in two modes, Test and Live. The [API key](#generate-api-key) is different for each mode.
- To complete the onboarding process for the sub-merchant, check the [KYC document requirements](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/appendix/#kyc-requirements.md).
- You can try out our APIs on the Razorpay Postman Public Workspace.

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-983cba7e-7605-4fbe-ad85-9c4529ba7392)

## Video Tutorial

Watch this video to know how you can onboard sub-merchants using the Sub-Merchant Onboarding APIs.

[Video: https://www.youtube.com/embed/_a9XP-7x3X4]

## API Gateway URL

The Razorpay API Gateway URL is `https://api.razorpay.com/v2`. You need to include this before each API endpoint to make API calls.

> **INFO**
>
> 
> **Handy Tips**
> 
> While sending API requests to Razorpay servers, it is recommended to honor the TTL of the entries and not cache the DNS aggressively at your end. This is applicable when you are not using Razorpay SDKs. However, if you are using Razorpay SDKs, be informed that our SDKs can handle DNS caching and honor the TTLs set in the records. 
> 

## API Authentication

You can use Partners APIs using either [Partner Auth](#use-partner-auth)  or [OAuth](#use-oauth).

> **WARN**
>
> 
> **Watch Out!**
> 
> Do not share your API Key secret or access token with anyone or on any public platforms. This can pose security threats for your Razorpay account.
> 

### Use Partner Auth

Partner Auth uses `Basic Auth`. Basic auth requires the following:
- `[YOUR_KEY_ID]`
- `[YOUR_KEY_SECRET]`

Basic auth expects an `Authorization` header for each request in the `Basic base64token` format. Here, `base64token` is a base64 encoded string of `YOUR_KEY_ID:YOUR_KEY_SECRET`. 

> **WARN**
>
> 
> **Watch Out!**
> 
> The `Authorization` header value should strictly adhere to the format mentioned above. Invalid formats will result in authentication failures.
> Few examples of **invalid** headers are: `BASIC base64token`, `basic base64token`, `Basic "base64token"` and `Basic $base64token`.
> 

Watch this video to see how to generate the API keys.

[Video: https://www.youtube.com/embed/AwooCt4ezQ4]

Follow these steps to generate API Keys:

1. Log in to your Dashboard with appropriate credentials.
2. Select the mode (**Test** or **Live**) for which you want to generate the API key.
   
> **INFO**
>
> 
>     **Handy Tips**
> 
>     You have to generate separate Partner Credentials for the test and live modes. No real money is used in test mode.
>     

3. Navigate to **Settings** section to generate the key for the selected mode.

### Use OAuth

OAuth uses `Bearer Auth`. Know more about [OAuth](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth.md).

To use OAuth for Partners APIs:
1. [Enable cobranded_onboarding](#1-enable-cobranded-onboarding)
2. [Generate Access Token](#2-generate-access-token)
3. [Use Access Token to Authenticate](#3-use-access-token-to-authenticate)

#### 1. Enable cobranded_onboarding

Raise a request with our [Support team](https://razorpay.com/support/#request) to get the **cobranded_onboarding** feature activated on your account. The cobranded_onboarding feature also enables:
- Access to [sub-merchant account status webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/status.md).
- [Onboarding UI configurator](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/settings.md) on Partner Dashboard.

#### 2. Generate Access Token

Generate your access token using the below endpoint. You can generate it for test or live mode. Use the `client_id` and `client_secret` of the **OAuth application** for test and live modes.

`https://auth.razorpay.com/token`

```curl: Request
curl --location 'https://auth.razorpay.com/token' \
--header 'Content-Type: application/json' \
--data '{
    "grant_type": "client_credentials",
    "mode": "test",
    "client_id": "",
    "client_secret": ""
}'

```json: Response
{
    "public_token": "rzp_test_oauth_XXXXXXXXXXXXXX",
    "razorpay_account_id": "acc_Dhk2qDbmu6FwZH",
    "token_type": "Bearer",
    "expires_in": 7862400,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IkY1Z0NQYkhhRzRjcUpnIn0.eyJhdWQiOiJGNFNNeEgxanMxbkpPZiIsImp0aSI6IkY1Z0NQYkhhRzRjcUpnIiwiaWF0IjoxNTkyODMxMDExLCJuYmYiOjE1OTI4MzEwMTEsInN1YiI6IiIsImV4cCI6MTYwMDc3OTgxMSwidXNlcl9pZCI6IkYycVBpejJEdzRPRVFwIiwibWVyY2hhbnRfaWQiOiJGMnFQaVZ3N0lNV01GSyIsInNjb3BlcyI6WyJyZWFkX29ubHkiXX0.Wwqt5czhoWpVzP5_aoiymKXoGj-ydo-4A_X2jf_7rrSvk4pXdqzbA5BMrHxPdPbeFQWV6vsnsgbf99Q3g-W4kalHyH67LfAzc3qnJ-mkYDkFY93tkeG-MCco6GJW-Jm8xhaV9EPUak7z9J9jcdluu9rNXYMtd5qxD8auyRYhEgs"
}
```

  
### Request Parameters

`grant_type`  _mandatory_
:  `string` Defines the grant type for the request. Possible value is `client_credentials`.

`mode` _optional_
: `string` The type of mode. Possible values: 
  - `test`
  - `live` (default)

`client_id` _mandatory_
: `string` Unique client identifier. Use the `client_id` of the **OAuth application**.

`client_secret`  _mandatory_
: `string` Client secret string. Use the `client_secret` of the **OAuth application**.
    

  
### Response Parmeters

`expires_in`
: `integer` Represents the TTL of the access token in seconds. You will have to regenerate the access token after expiry.

`token_type`
: `string` Defines the type of access token. Possible value is `Bearer`.

`public_token`
: `string` A public key is used only for public routes such as Checkout or Payments.

`razorpay_account_id`
: `string` Razorpay account id for which the access token is generated.

`access_token`
: `string` A private key used to authenticate for Razorpay APIs.
    

#### 3. Use Access Token to Authenticate

You can use your OAuth access token to authenticate and use Partners APIs.

Given below is a sample code for the [Fetch an Account API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/fetch.md).

```curl: Request
curl -X GET https://api.razorpay.com/v2/accounts/acc_GP4lfNA0iIMn5B
-H "Authorization: Bearer "

```js: Response
{
  "id": "acc_GP4lfNA0iIMn5B",
  "type": "standard",
  "status": "created",
  "email": "gauri@example.org",
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
  "customer_facing_business_name": "Example Pvt. Ltd."
}
```

## List of Sub-Merchant Onboarding APIs

You can use the Sub-Merchant Onboarding APIs to perform various actions. 

API | Description
---
[Account APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding.md) | Create, view, update and delete sub-merchant accounts.
---
[Stakeholders APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder.md) | Create, view and update stakeholders.
---
[Product Configuration APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration.md) | Request, view and update a product configuration.
---
[Documents APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document.md) | Upload and view account and stakeholder documents.
---
[Webhooks APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/webhooks.md) | Create, view, update and delete webhook events.
---
[Terms and Conditions APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/terms-conditions.md) | View and accept terms and conditions.

## Account Activation 

    
        Given below is the complete end-to-end flow explaining the transition among statuses:
        ![Account Activation Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/account-activation-flow.jpg.md)
    
    

Status | Description
---
Created | The account is created.
---
Under Review | Your account moves to **Under Review** when all the required details are submitted. Our team will review the details and reach out for clarifications.
---
Needs Clarification | We might require clarifications regarding the KYC details submitted during the review process. All the details about fields that need clarification will be present in the product configuration API.
---
Activated | Your account will be activated once all of the information provided has been approved. You will be able to start accepting payments and receive settlements in your registered bank accounts.
--- 
Suspended | During the KYC review, your account can be suspended if it is identified as potentially fraudulent. Please reach out to our [support team](https://razorpay.com/support/#request) for the next steps.  
---
Rejected | The account attains this status when the KYC details submitted by the merchant are rejected during manual review. 

    

## Product Activation Status and Updates Permitted

For the following APIs, the updates permitted depend on the product activation status:
- [Update Settlement Account Details](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration/update-settlement-account-details.md)
- [Update a Stakeholder](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/update.md)

- [Upload Documents](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document.md)

Activation Status | Update Permitted
---
`requested` | You can update the details for all the fields.
---
`needs_clarification` | The fields you can update depend on the reason_code mentioned in the requirements object in the [Request a Product Activation API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration/request.md): - **document_missing** or **field_missing**: You can update all the fields.
- **needs_clarification**: You can update only the specific field for which Razorpay is seeking clarification for.

---
`under_review` | You cannot update any fields.
---
`activated` | You cannot use this API to update any fields as your account is already active.

### Use Cases to Update a Product Configuration

You can update the following details for Payment Gateway and Payment Links using the Update a Product Configuration API. However, whether the details can be updated or not depends upon the [**product activation status**](#product-activation-status-and-updates-permitted).

- Settlement Bank Account Details: You can update the `settlement` object with the new bank account details based on the product activation status.

- Request Additional Payment Methods: You can request various payment methods and related instruments to be enabled using the `payment_methods` object. However, you can request for only one payment method at a time. For example, if you want to enable HDFC Netbanking and Rupay Domestic Card payment methods, you should send two separate API requests. You cannot send a consolidated request using this API.

- Update Notifications Settings: You can update the email, WhatsApp and SMS settings using the `notifications` object.  

- Configure Checkout Features: You can change the checkout theme colour, add a logo and enable the saving of customer card details using the `checkout` object.

- Configure Refund Speed: You can configure the default refund speed using the `refund` object.

- Accept of Terms and Conditions: You can accept Razorpay terms and conditions.

## Terms and Conditions Workflow

Given below is the workflow:
1. As a partner, it is your responsibility to show respective terms and conditions to the sub-merchants before you start onboarding to a product. The APIs used for it will be [Fetch Terms and Conditions for a Sub-Merchant](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/terms-conditions/fetch.md).
2. You should display these web pages to your sub-merchants on your interface.
3. Record the acceptance of terms and transmit that to Razorpay using either [Request a Product Configuration API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration/request.md) or [Update a Product Configuration API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration/update-settlement-account-details.md).

### Related Information

- [Sub-Merchant Onboarding APIs Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/workflow.md)
- [Subscribe to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
- [Appendix](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/appendix.md)
