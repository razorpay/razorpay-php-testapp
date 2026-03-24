---
title: Technology Partners | Integrate with Custom Onboarding SDK
heading: Custom Onboarding SDK
description: Integrate with Custom Onboarding SDK to create client accounts using APIs and prefill KYC details.
---

# Custom Onboarding SDK

With the Custom Onboarding SDK, you can streamline sub-merchant enrollment by handling the process on their behalf — they do not need to create individual accounts or complete KYC verification themselves. Use the APIs and generate access token for your sub-merchants. You can onboard multiple sub-merchants with a single application unless there is a difference of commissions amongst the sub-merchants.

To integrate with Custom Onboarding SDK:
1. [Create an Application](#1-create-an-application)
2. [Generate Token](#2-generate-token)
3. [Create accounts and upload KYC details using onboarding APIs](#3-create-account-and-upload-kyc-details)
4. [Generate Onboarding URL and redirect users](#4-generate-onboarding-url)
5. [Fetch access token associated with the merchant](#5-fetch-access-token)
6. [Access resources using access token](#6-access-resources-using-access-token)
7. [Process Payments](#7-process-payments)
8. [Subscribe to onboarding webhooks to receive account activation updates](#8-subscribe-to-onboarding-webhooks)

## 1. Create an Application

The first step towards building an integration is creating an application on the Razorpay Partner Dashboard. Here, an application refers to a software entity that you register on Razorpay to facilitate OAuth-based authentication and authorisation for businesses on your platform. 
It acts as an intermediary between you and Razorpay. Internally, Razorpay OAuth identifies the applications by their `client_id`.

- When you create an application on Razorpay, we generate two clients linked to the application: development and production clients. 
- Each client has its own `client_id` and `client_secret`. 
- You can use the development client in your sandbox environment or during the integration phase, and the production client once you go live.

### Development and Production Clients

Given below is a comparison of the development and production clients:

Particulars | Development Client | Production Client
---
**Redirect URI** | Can have any type of Redirect URIs whitelisted, including non-HTTP and localhost. | Cannot use non-HTTPS Redirect URIs.
---
**Test and Live Mode Access** | Can access both modes. | Can access only live mode data.

> **WARN**
>
> 
> **Watch Out!**
> 
> Only an **Owner** user can create applications on the Dashboard.
> 

  
### To create an application:

      1. Log in to the Dashboard and navigate to **Applications** under **Partners**.
         ![Create Application](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-create-application.jpg.md)
      2. Click **Create Application** under **Created Applications**.
      3. Provide the following details and click **Save**.
          - **Name**: The application name provided here is displayed on the Razorpay authorisation interface.
          - **Website**: Enter the URL of the application's website.
          - **Logo**: Upload a square image for application logo. If logo is absent, a default logo is used.
          ![Add Application Details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-oauth-create-application-details.jpg.md)

          The following fields are displayed after the application is created, for development and production clients. These are read-only:
          - **Client ID**: Publicly exposed identifier of the client which is generated uniquely. It helps identify your application on Razorpay.
          - **Client Secret**: Privately shared string between the application and Razorpay. It helps to authenticate the identity of the application on server-to-server API calls. Do not expose the client secret publicly.
          - **Redirect URIs**: A whitelisted set of URIs defined during creation. Production clients can only use secure HTTPS URIs to prevent man-in-the-middle attacks. You can define multiple redirect URIs.

          ![View Production and Development Credentials for Application](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-unmask-client-id.gif.md)
      4. Edit the Redirect URIs for your clients if needed.
      5. Click **Save**.
    

## 2. Generate Token

The next step is to generate a bearer token to access onboarding APIs. You must use the access token generated in the response to hit the [onboarding APIs](#3-create-account-and-upload-kyc-details). Below is a sample code to generate a bearer token using Onboarding SDK.

```curl: Curl
curl --location 'https://auth.razorpay.com/token' \
--header 'Content-Type: application/json' \
--form 'client_id=""' \
--form 'client_secret=""' \
--form 'grant_type="client_credentials"' \
--form 'mode=""'

```java: Java
JSONObject accessTokenRequest = new JSONObject();
accessTokenRequest.put("client_id", "")
accessTokenRequest.put("client_secret", "")
accessTokenRequest.put("grant_type", "client_credentials")
accessTokenRequest.put("redirect_uri", "")
accessTokenRequest.put("mode", "test|live")

OAuthTokenClient oAuth = new OAuthTokenClient();
OAuthToken oAuthToken = oAuth.getAccessToken(accessTokenRequest)
String accessToken = oAuthToken.get("access_token")

// Initialize the client
RazorpayClient instance = new RazorpayClient("access_token");

```php: PHP
use Razorpay\Api\Api;
use Razorpay\Api\OAuth;

$oauth = new OAuth();

$oauthToken = $oauth->oauthClient->getAccessToken([
 "client_id" => "",
 "client_secret" => "",
 "grant_type" => "client_credentials",
 "redirect_uri" => "https://example.com",
 "code" => "def50200d844dc80cc44dce2c665d07a374d76802",
 "mode" => "test"
]);

$api = new Api(null, null, $oauthToken["access_token"]);

```csharp: .NET
Dictionary accessTokenRequest = new Dictionary();
accessTokenRequest.Add("client_id","");
accessTokenRequest.Add("client_secret","");
accessTokenRequest.Add("redirect_uri","");
accessTokenRequest.Add("grant_type","client_credentials");
accessTokenRequest.Add("mode","test|live");

OAuthTokenClient oAuth = new OAuthTokenClient();
OAuthTokenClient oAuthToken = oAuth.GetAccessToken(accessTokenRequest);
String accessToken = oAuthToken["access_token"];

// Initialize the client
RazorpayClient instance = new RazorpayClient(accessToken);

```ruby: Ruby
options = {
    'client_id'     => '',
    'client_secret' => '',
    'grant_type'    => 'client_credentials',
    'redirect_uri'  => '',
    'mode'          => 'test'
}
oauth_token = Razorpay::OAuthToken.get_access_token(options)

#Initialize the client
Razorpay.setup_with_oauth(oauth_token.access_token)

```javascript: Node.js
const Razorpay = require("razorpay")
const OAuthTokenClient = require("razorpay/dist/oAuthTokenClient")

async function getAccessToken() {
  try {
      const oAuth = new OAuthTokenClient();
      const token = await oAuth.getAccessToken({
        "client_id": "",
        "client_secret": "",
        "grant_type": "authorization_code",
        "redirect_uri": "https://example.com",
        "code": "def50200d844dc80cc44dce2c665d07a374d76802",
        "mode": "test"
      });

      const instance = new Razorpay({
          oauthToken: token.access_token
      });

      console.log("OAuth Token:", token.access_token);
      return instance;
  } catch (error) {
      console.error("Error getting access token:", error);
  }
}

// Call the function
getAccessToken();

```json: Response
{
    "public_token": "rzp_test_oauth_XXXXXXXXXXXXXX",
    "razorpay_account_id": "",
    "token_type": "Bearer",
    "expires_in": 7775997,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiJ9.eyJhdWQiOiJLdVRiTWxTM3FiQWFNNSIsImp0aSI6Ik5YNzJLYWJwWnZzdHliIiwiaWF0IjoxNzA3MTE3NDAwLCJuYmYiOjE3MDcxMTc0MDAsInN1YiI6IiIsImV4cCI6MTcxNDg5MzM5NywidXNlcl9pZCI6bnVsbCwibWVyY2hhbnRfaWQiOiJKWDFTYW5iU2JJaWRuZyIsInNjb3BlcyI6WyJyZWFkX3dyaXRlIl19.FLSvsKc03hzJ4vksAjnk3m8MHZDkWPoyGJsn0m32dZxE7OfT0Qet8kUFny7liTVqTvZsFUKSBo0euv-dE0YuXg"
}
```

The `access_token` is valid for 90 days. After your access token expires, you will receive a 4XX error response. Regenerate the access token using your credentials.

## 3. Create Account and Upload KYC Details

Use onboarding APIs to add KYC details of your clients. You can pre-fill all or a few KYC details using APIs and let the users fill in the remaining on the onboarding form.

Below are the APIs available to onboard clients.

API | Action
---
[Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/create.md) | Create and update a client account. Add basic details like name, phone number, email ID and KYC details like business name, type and business PAN details. Check the [Account API Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/entity.md) for the complete list of fields.
---
[Product Configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration/request.md) | Configure products for an account. Update payment methods, settlement details and refund settings. Check the [Product Configuration API Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/product-configuration/entity.md) for the complete list of fields.
---
[Stakeholder](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/create.md) | Add the KYC details of the authorised signatory or the owner of the business. Check the [Stakeholder API Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/stakeholder/entity.md) for the list of fields.
---
[Document](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document/upload-account-documents.md) | Upload KYC documents for accounts and stakeholders. Know more about [Document APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/upload-document.md).

[List of required KYC documents as per business type.](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/business-types-kyc-documents/#kyc-documents.md)

## 4. Generate Onboarding URL

Below is the sample code to generate the onboarding URL.

```java: Java
// Initialize client
OAuthTokenClient oAuth = new OAuthTokenClient();

JSONObject authUrlRequest = new JSONObject();
authUrlRequest.put("client_id","");
authUrlRequest.put("redirect_uri","");

JSONArray scopes = new JSONArray();
scopes.put("read_write");        

authUrlRequest.put("scopes", scopes);
authUrlRequest.put("state","");

authUrlRequest.put("onboarding_signature", "");

String authUrl = oAuth.getAuthURL(authUrlRequest);

```php: PHP
use Razorpay\Api\OAuth;
use Razorpay\Api\Utility;

// Initialize client
$oauth = new OAuth();
$utility = new Utility();

$attributes = [
  "submerchant_id" => "",
  "timestamp" => floor(microtime(true))
];

$onboarding_signature = $utility->generateOnboardingSignature($attributes, "");

$authUrl = $oauth->oauthClient->getAuthURL([
 "client_id" => "",
 "response_type" => "code",
 "redirect_uri" => "https://example.com/razorpay_callback",
 "scopes" => ["read_write"],
 "state" => "NOBYtv8r6c75ex6WZ",
 "onboarding_signature" => $onboarding_signature
]);

```javascript: Node.js
const OAuthTokenClient = require("razorpay/dist/oAuthTokenClient");
const {
  generateOnboardingSignature,
} = require("razorpay/dist/utils/razorpay-utils");

// Initialize client
let oAuth = new OAuthTokenClient();

let attributes = {
  submerchant_id: "",
  timestamp: Math.floor(Date.now() / 1000),
};

let onboarding_signature = generateOnboardingSignature(
  attributes,
  "",
);

// Not a promise
const authUrl = oAuth.generateAuthUrl({
  client_id: "",
  response_type: "code",
  redirect_uri: "https://example.com/razorpay_callback",
  scope: ["read_write"],
  state: "NOBYtv8r6c75ex6WZ",
  onboarding_signature: onboarding_signature,
});

```csharp: .NET
// Initialize client
OAuthTokenClient oAuth = new OAuthTokenClient();

Dictionary authUrlRequest = new Dictionary();
authUrlRequest.Add("client_id","");
authUrlRequest.Add("redirect_uri","");
authUrlRequest.Add("scopes", new List {"read_only", "read_write"});
authUrlRequest.Add("state","");
authUrlRequest.Add("onboarding_signature", "");

String authUrl = oAuth.GetAuthUrl(authUrlRequest);

```ruby: Ruby
options = {
    'client_id'            => '',
    'redirect_uri'         => '',
    'scopes'               => ["read_write"],
    'state'                => '',
    'onboarding_signature' => ''
}
authorize_url = Razorpay::OAuthToken.get_auth_url(options)

```json: Response
{
  "amount": 100,
  "currency": "INR"
}
```

### Sample Onboarding URL

```json: Sample Onboarding URL
https://auth.razorpay.com/authorize
    ?client_id=8DXCMTshWSWECc
    &response_type=code
    &redirect_uri=https://example.com/razorpay_callback
    &scope=read_write
    &state=NOBYtv8r6c75ex6WZ
    &onboarding_signature=MUOkjashBYtv8r6c75ex6WZ
```

    
### Query Parameters

Define the following query parameters in the URL.

`client_id` _mandatory_
: `string` The unique client identifier.

`response_type` _mandatory_
: `string` Specifies that the application is requesting an authorisation code grant. Possible value is `code`.

`redirect_uri` _mandatory_ 
: `string` Callback URL used by Razorpay to redirect after the user approves or denies the authorisation request. The client should whitelist the `redirect_uri`.

`scope` _mandatory_
: `string` Defines what access your application is requesting from the user. You can request multiple scopes by specifying each scope name separately in the URL using array notation. For example: `scope[]=read_only&scope[]=read_write`. Possible values:
  - `read_only`: Provides read access to all resources. That is, all `GET` API requests.
  - `read_write`: Provides read and write access to all resources on the API.

`state` _mandatory_
: `string` A random string generated by your service. This parameter helps prevent cross-site request forgery (CSRF) attacks. State validation has to be implemented by your application and should work as described below:
  1. Your application should generate a unique random string and save it in the database.
  1. Send the random string to Razorpay in the authorisation request in the `state` parameter.
  1. Razorpay sends back the same `state` value as query params on your redirect URI.
  1. In your backend, you validate that the state value stored in your database matches the one you received for the `client_id` and the user that initiated the authorisation.

`onboarding_signature` _conditionally mandatory_
: `string` This parameter is applicable only for accounts created using KYC pre-fill. This will reduce sub-merchant onboarding time. Know more about [onboarding signature](#onboarding-signature).
        

    
### Success Response Parameters

We send the following query parameters if the user approves the authorisation request:

`code`
: URL-encoded authorisation code. You can exchange this code for an access token in the next step.

`state`
: The value of the `state` parameter sent in the authorisation request.
        

    
### Error Response Parameters

Error | Cause | Solution
---
phone number unverified | - You are using an expired `onboarding_signature`.
- `onboarding_signature` is not provided or is invalid.
 | Use a valid `onboarding_signature`. An onboarding signature is valid for 24 hours. You can regenerate it using the same code.

Refer to our [errors](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/errors#initiating-authorisation-using-url.md) page for the complete list of errors and solutions.
        

### Redirect Users to Onboarding

You need to share the Razorpay-hosted co-branded onboarding URL with your clients. Clients use this URL to continue the onboarding process. 

1. The user will be redirected to the co-branded onboarding form when they click the embedded onboarding button on your platform. The user has to enter any pending KYC details and verify the pre-filled information.
2. After the necessary details are submitted, the user is prompted to authorise your platform to access data and create payments and refunds.
3. The client gives authorisation, which allows Razorpay to connect their client account to your Partner account.
4. On successful authorisation, Razorpay redirects the user back to a URL configured by you in your application settings. While redirecting, Razorpay shares an authentication code. You need to use this Auth code in the token API request to generate an Auth token.

### Onboarding Signature

`onboarding_signature` is a mandatory parameter if you are pre-filling KYC details. The onboarding signature is used to verify the identity of the partner initiating the onboarding URL.

Use the below sample code to generate an `onboarding_signature`.

```java: Java
long timestamp = System.currentTimeMillis()/1000L;
JSONObject options = new JSONObject();
options.put("submerchant_id", "HQVlm3bnPmccC0");
options.put("timestamp", timestamp);
String signature = Utils.generateOnboardingSignature(options, "");

```php: PHP
use Razorpay\Api\Utility;

$utility = new Utility();
$attributes = [
   "submerchant_id" => "",
   "timestamp" => floor(microtime(true))
];
$onboarding_signature = $utility->generateOnboardingSignature($attributes, "");

```javascript: Node.js
const {
  generateOnboardingSignature,
} = require("razorpay/dist/utils/razorpay-utils");

// Initialize client
let oAuth = new OAuthTokenClient();

let attributes = {
  submerchant_id: "",
  timestamp: Math.floor(Date.now() / 1000),
};

let onboarding_signature = generateOnboardingSignature(
  attributes,
  "",
);

```csharp: .NET
long timestamp = DateTimeOffset.UtcNow.ToUnixTimeSeconds();    
Dictionary data = new Dictionary();
data.Add("submerchant_id", "HQVlm3bnPmccC0");
data.Add("timestamp", timestamp);
string signature = Utils.GenerateOnboardingSignature(data, "");

```ruby: Ruby 
body = {
    submerchant_id: "HQVlm3bnPmccC0",
    timestamp: Time.now.to_i
}
signature = Razorpay::Utility.generate_onboarding_signature(body, "")

```json: Response
44813a7db24e30c65f10d5b06751f5cddfd5d9094033bd5e899d709f8f13361fff5eecf4d39ebb7c4547af3898a633f71f62196a8e06f85aa0272e6cc3e9faba470abbb0d8441e3864af

```

> **WARN**
>
> 
> **Watch Out!**
> 
> The response of the account creation API, returns id as `acc_HQVlm3bnPmccC0`. However, for the onboarding signature, the sub-merchant id must be entered without the 'acc_' which means `acc_HQVlm3bnPmccC0` must be entered as `HQVlm3bnPmccC0`.
> 

### Authorisation Response

After completion, the browser is redirected to URI specified in the `redirect_uri` parameter.

## 5. Fetch Access Token

You require an access token to create payments and refunds on behalf of your clients using APIs. Exchange the authorisation code received in the previous step for an access token.

> **INFO**
>
> 
> **Handy Tips**
> 
> The authorisation code is URL-encoded. Decode it before sending in this request.
> 

Given below is a sample request to be made from the application's backend server.

```curl: Curl
curl --location 'https://auth.razorpay.com/token' \
--header 'Content-Type: application/json' \
'{
  "client_id": "",
  "client_secret": "",
  "grant_type": "authorization_code",
  "redirect_uri": "http://example.com/razorpay_callback",
  "code": "def50200d844dc80cc44dce2c665d07a374d76802",
  "mode": "test"
}'

```java: Java
JSONObject accessTokenRequest = new JSONObject();
accessTokenRequest.put("client_id", "")
accessTokenRequest.put("client_secret", "")
accessTokenRequest.put("grant_type", "authorization_code")
accessTokenRequest.put("redirect_uri", "")
accessTokenRequest.put("code", "")
accessTokenRequest.put("mode", "test|live")

OAuthTokenClient oAuth = new OAuthTokenClient();
OAuthToken oAuthToken = oAuth.getAccessToken(accessTokenRequest)
String accessToken = oAuthToken.get("access_token")

```php: PHP
use Razorpay\Api\Api;
use Razorpay\Api\OAuth;

$oauth = new OAuth();

$oauthToken = $oauth->oauthClient->getAccessToken([
 "client_id" => "",
 "client_secret" => "",
 "grant_type" => "authorization_code",
 "redirect_uri" => "https://example.com",
 "code" => "def50200d844dc80cc44dce2c665d07a374d76802",
 "mode" => "test"
]);

$api = new Api(null, null, $oauthToken["access_token"]);

```javascript:Node.js
const Razorpay = require("razorpay")
const OAuthTokenClient = require("razorpay/dist/oAuthTokenClient")

async function getAccessToken() {
  try {
      const oAuth = new OAuthTokenClient();
      const token = await oAuth.getAccessToken({
        "client_id": "",
        "client_secret": "",
        "grant_type": "authorization_code",
        "redirect_uri": "https://example.com",
        "code": "def50200d844dc80cc44dce2c665d07a374d76802",
        "mode": "test"
      });

      const instance = new Razorpay({
          oauthToken: token.access_token
      });

      console.log("OAuth Token:", token.access_token);
      return instance;
  } catch (error) {
      console.error("Error getting access token:", error);
  }
}

// Call the function
getAccessToken();

```csharp: .NET
Dictionary accessTokenRequest = new Dictionary();
accessTokenRequest.Add("client_id","");
accessTokenRequest.Add("client_secret","");
accessTokenRequest.Add("redirect_uri","");
accessTokenRequest.Add("grant_type","authorization_code");
accessTokenRequest.Add("code", "")
accessTokenRequest.Add("mode","test|live");

OAuthTokenClient oAuth = new OAuthTokenClient();
OAuthTokenClient oAuthToken = oAuth.GetAccessToken(accessTokenRequest);
String accessToken = oAuthToken["access_token"];

// Initialize the client
RazorpayClient instance = new RazorpayClient(accessToken);

```ruby: Ruby
options = {
    'client_id'     => '',
    'client_secret' => '',
    'grant_type'    => 'authorization_code',
    'redirect_uri'  => '',
    'code'          => ''
    'mode'          => 'test|live'
}
oauth_token = Razorpay::OAuthToken.get_access_token(options)

# Initialize the client
Razorpay.setup_with_oauth(oauth_token.access_token)

```json: Response
{
  "public_token": "rzp_test_oauth_XXXXXXXXXXXXXX",
  "token_type": "Bearer",
  "expires_in": 7862400,
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IkY1Z0NQYkhhRzRjcUpnIn0.eyJhdWQiOiJGNFNNeEgxanMxbkpPZiIsImp0aSI6IkY1Z0NQYkhhRzRjcUpnIiwiaWF0IjoxNTkyODMxMDExLCJuYmYiOjE1OTI4MzEwMTEsInN1YiI6IiIsImV4cCI6MTYwMDc3OTgxMSwidXNlcl9pZCI6IkYycVBpejJEdzRPRVFwIiwibWVyY2hhbnRfaWQiOiJGMnFQaVZ3N0lNV01GSyIsInNjb3BlcyI6WyJyZWFkX29ubHkiXX0.Wwqt5czhoWpVzP5_aoiymKXoGj-ydo-4A_X2jf_7rrSvk4pXdqzbA5BMrHxPdPbeFQWV6vsnsgbf99Q3g-W4kalHyH67LfAzc3qnJ-mkYDkFY93tkeG-MCco6GJW-Jm8xhaV9EPUak7z9J9jcdluu9rNXYMtd5qxD8auyRYhEgs",
  "refresh_token": "def50200f42e07aded65a323f6c53181d802cc797b62cc5e78dd8038d6dff253e5877da9ad32f463a4da0ad895e3de298cbce40e162202170e763754122a6cb97910a1f58e2378ee3492dc295e1525009cccc45635308cce8575bdf373606c453ebb5eb2bec062ca197ac23810cf9d6cf31fbb9fcf5b7d4de9bf524c89a4aa90599b0151c9e4e2fa08acb6d2fe17f30a6cfecdfd671f090787e821f844e5d36f5eacb7dfb33d91e83b18216ad0ebeba2bef7721e10d436c3984daafd8654ed881c581d6be0bdc9ebfaee0dc5f9374d7184d60aae5aa85385690220690e21bc93209fb8a8cc25a6abf1108d8277f7c3d38217b47744d7",
  "razorpay_account_id": "acc_Dhk2qDbmu6FwZH"
}
```

    
### Request Parameters

`client_id` _mandatory_
: `string` Unique client identifier.

`client_secret`  _mandatory_
: `string` Client secret string.

`grant_type`  _mandatory_
:  `string` Defines the grant type for the request. Possible value is `authorization_code`.

`redirect_uri` _mandatory_
: `string` Specifies the same `redirect_uri` used in the authorisation request.

`code`  _mandatory_
: `string` Decoded authorisation code received in the last step.

`mode` _optional_
: `string` The type of mode. Possible values: 
  - `test`
  - `live` (default)

  
> **INFO**
>
> 
>   **Handy Tips**
>  
>   Clients on production can only make requests for live mode.
>   

        

    
### Response Parameters

The server responds with the following parameters:

`token_type`
: `string` Defines the type of access token. Possible value is `Bearer`.

`expires_in`
: `integer` Integer representing the TTL of the access token in seconds.

`access_token`
: `string` A private key used to access sub-merchant resources on Razorpay. Used for server-to-server calls only.

`public_token`
: `string` A public key is used only for public routes such as Checkout or Payments.

`refresh_token`
: `string` Used to refresh the access token when it expires.

`razorpay_account_id`
: `string` Identifies the sub-merchant ID who granted the authorisation.
        

    
### Error Response Parameters

         Refer to our [errors](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/errors#token-apis.md) page for the list of errors and solutions.
        

Store the `access_token` received above on your server. Using this token, you can access the sub-merchant's data, create payments and refunds using Razorpay APIs.

#### Regenerate Access Token

The `access_token` is valid for 90 days. After your access token expires, you will receive a 4XX error response. Use a refresh token to generate a new access token. You can make a request using your refresh token to generate a new (access_token and refresh_token) pair.

Below is a sample API request to request a new token.

```curl: Curl
curl -X POST https://auth.razorpay.com/token
-H "Content-type: application/json" 
-d '{
  "client_id": "",
  "client_secret": "",
  "grant_type": "refresh_token",
  "refresh_token": "def5020096e1c470c901d34cd60fa53abdaf3662sa0"
}'

```csharp: .NET
Dictionary refreshTokenRequest = new Dictionary(); refreshTokenRequest.Add("client_id",""); refreshTokenRequest.Add("client_secret",""); refreshTokenRequest.Add("refresh_token","");

OAuthTokenClient oAuth = new OAuthTokenClient(); OAuthTokenClient oAuthToken = oAuth.RefreshToken(refreshTokenRequest); String accessToken = oAuthToken["access_token"];

// Initialize the client RazorpayClient instance = new RazorpayClient(accessToken);

```ruby: Ruby
options = {
    'client_id'     => '',
    'client_secret' => '',
    'refresh_token' => ''
}
oauth_token = Razorpay::OAuthToken.refresh_token(options)

#Initialize the client
Razorpay.setup_with_oauth(oauth_token.access_token)

```java: Java
JSONObject refreshTokenRequest = new JSONObject();
refreshTokenRequest.put("client_id", "")
refreshTokenRequest.put("client_secret", "")
refreshTokenRequest.put("refresh_token", "")

OAuthTokenClient oAuth = new OAuthTokenClient();
OAuthToken oAuthToken = oAuth.refreshToken(refreshTokenRequest)
String accessToken = oAuthToken.get("access_token")

// Initialize the client
RazorpayClient instance = new RazorpayClient(accessToken);

```php: PHP
use Razorpay\Api\Api;
use Razorpay\Api\OAuth;

$oauth = new OAuth();

$oauthToken = $oauth->oauthClient->getRefreshToken([
 "client_id" => "",
 "client_secret" => "",
 "grant_type" => "refresh_token",
 "refresh_token" => "def50200d844dc80cc44dce2c665d07a374d76802"
]);

$api = new Api(null, null, $oauthToken["access_token"]);

```javascript: Node.js
const Razorpay = require("razorpay")
const OAuthTokenClient = require("razorpay/dist/oAuthTokenClient")

async function refreshToken() {
  try {
      const oAuth = new OAuthTokenClient();
      const token = await oAuth.refreshToken({
        "client_id": "",
        "client_secret": "",
        "refresh_token": "def50200d844dc80cc44dce2c665d07a374d76802"
      });

      const instance = new Razorpay({
          oauthToken: token.access_token
      });

      console.log("OAuth Token:", token);
      return instance;
  } catch (error) {
      console.error("Error getting access token:", error);
  }
}

// Call the function
refreshToken();

```json: Response
{
  "public_token": "rzp_test_oauth_XXXXXXXXXXXXXX",
  "token_type": "Bearer",
  "expires_in": 7862400,
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijl4dTF",
  "refresh_token": "def5020096e1c470c901d34cd60fa53abdaf36620e823ffa53"
}
```

## 6. Access Resources Using Access Token

After you obtain an access token, you can use it to access the sub-merchant's data on Razorpay APIs. The access is controlled based on the scope requested for and granted by the user during the authorisation process.

Provide the access token in the `Bearer` authorisation header while requesting [Razorpay APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api.md).

Given below is a sample code for the [Fetch all Payments API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-multiple-payments.md). 

```Curl: Curl
curl -X GET https://api.razorpay.com/v1/payments
-H "Authorization: Bearer "

```java: Java
RazorpayClient instance = new RazorpayClient("");

JSONObject params = new JSONObject();
params.put("count","1");

List payment = instance.payments.fetchAll(params);

```php: PHP
$api = new Api(null, null, "");

$api->payment->all(array("count"=> "1"));

```csharp: .NET
RazorpayClient instance = new RazorpayClient("");

Dictionary params = new Dictionary();
params.Add("count","1");

List payment = instance.Payment.All(params);

```ruby: Ruby
Razorpay.setup_with_oauth('')

option = {"count":1}

payments  = Razorpay::Payment.all(option)

```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "pay_G8VaL2Z68LRtDs",
      "entity": "payment",
      "amount": 900,
      "currency": "INR",
      "status": "captured",
      "order_id": "order_G8VXfKDWDEOHHd",
      "invoice_id": null,
      "international": false,
      "method": "netbanking",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "Purchase Shoes",
      "card_id": null,
      "bank": "KKBK",
      "wallet": null,
      "vpa": null,
      "email": "gaurav.kumar@example.com",
      "contact": "+919000090000",
      "customer_id": "cust_DitrYCFtCIokBO",
      "notes": [],
      "fee": 22,
      "tax": 4,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "bank_transaction_id": "0125836177"
      },
      "created_at": 1606985740
    },
    {
      "id": "pay_G8VQzjPLoAvm6D",
      "entity": "payment",
      "amount": 1000,
      "currency": "INR",
      "status": "captured",
      "order_id": "order_G8VPOayFxWEU28",
      "invoice_id": null,
      "international": false,
      "method": "upi",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "#G8VPNzYJsQWMvY",
      "card_id": null,
      "bank": null,
      "wallet": null,
      "vpa": "gaurav.kumar@exampleupi",
      "email": "gaurav.kumar@example.com",
      "contact": "+919000090000",
      "customer_id": "cust_DitrYCFtCIokBO",
      "notes": [],
      "fee": 24,
      "tax": 4,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "rrn": "033814379298"
      },
      "created_at": 1606985209
    }
  ]
}
```

After you obtain an access token, you can use it to access the sub-merchant's data on Razorpay APIs. The access is controlled based on the scope requested for and granted by the user during the authorisation process.

## 7. Process Payments

As a Technology Partner, you can allow sub-merchants to accept payments through various Payment Methods and channels. after getting `access_token`.

@include partners/oauth-process-payments

## 8. Subscribe to Onboarding Webhooks

Subscribe to webhook events to receive real time notifications on the onboarding status of your clients. Check the available [Partner Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/status.md).

With this, your integration is complete. Test the integration before going live.

### Related Information

- [Errors](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/errors.md)
- [Razorpay Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)
