---
title: Partners | OAuth | Build Integration
heading: Build Integration
description: Steps to integrate Razorpay OAuth with your application.
---

# Build Integration

To access the necessary information from your sub-merchant's account, you must integrate with OAuth. Follow the steps below for the integration.

1. [Create an Application](#1-create-an-application)
2. [Get Authorisation from Sub-merchant](#2-get-authorisation-from-sub-merchant)
3. [Access Resources](#3-access-resources-using-access-token)
4. [Process Payments](#4-process-payments)
4. [Subscribe to Authorization Revoked Webhook](#5-subscribe-to-authorization-revoked-webhook)

## 1. Create an Application

The first step towards building an OAuth integration is creating an application on the Razorpay Partner Dashboard. Here, an application refers to a software entity that you register on Razorpay to facilitate OAuth-based authentication and authorisation for businesses on your platform. 
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
         ![Create Application](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partners-create-application.jpg.md)
      2. Click **Create Application** under **Created Applications**.
      3. Provide the following details and click **Save**.
          - **Name**: The application name provided here is displayed on the Razorpay authorisation interface.
          - **Website**: Enter the URL of the application's website.
          - **Logo**: Upload a square image for application logo. If logo is absent, a default logo is used.
          ![Add Application Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partners-oauth-create-application-details.jpg.md)

          The following fields are displayed after the application is created, for development and production clients. These are read-only:
          - **Client ID**: Publicly exposed identifier of the client which is generated uniquely. It helps identify your application on Razorpay.
          - **Client Secret**: Privately shared string between the application and Razorpay. It helps to authenticate the identity of the application on server-to-server API calls. Do not expose the client secret publicly.
          - **Redirect URIs**: A whitelisted set of URIs defined during creation. Production clients can only use secure HTTPS URIs to prevent man-in-the-middle attacks. You can define multiple redirect URIs.

          ![View Production and Development Credentials for Application](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partners-unmask-client-id.gif.md)
      4. Edit the Redirect URIs for your clients if needed.
      5. Click **Save**.
    

## 2. Get Authorisation from Sub-merchant

Following the steps to receive sub-merchant authorisation.

### 2.1 Initiate Authorisation Using URL

A request is sent to redirect your sub-merchants to Razorpay's authorisation service. You will receive a code upon authorisation from the sub-merchant. You can exchange this code for an access token.

#### Example

```curl: Request
https://auth.razorpay.com/authorize
    ?client_id=8DXCMTshWSWECc
    &response_type=code
    &redirect_uri=https://example.com/razorpay_callback
    &scope=read_write
    &state=NOBYtv8r6c75ex6WZ
```json: Success Response
{
  "code": "def502004bd206ce8bea64a73bbaff9586e4bf4f1d247e25de748174a977220bab48ab04b3e5a931afee2d125f3e567bd2a036fb25a62c55ab333429d203c5ba725abfadc520f49358f710362dc1f37abda854b20efbdcb540a00ec902afb8ee047ffb38df4316f83365267a0fc2fada1bcf2e212e0e450df9afd6581358faa343a1daebef4a1c041669ff1e9bebeee960f6963d19a8cc4c884ec5dfc8325a163d3ece880d5def3c84dcbb2d51e618667a1fbf1990fb798a41c4c4581738e3e1d7b6763ac6293c1bbf876e4294fb5b6fcd5b47200ef66e26b4e38016292175ecbd695d6cba7c1ea3155ef70f3326347aa541c4d4d83362619ef42c0178d538e6cc92682a43a36c946ad176d158a2c0d515da1d8a3be1ec5efd37f77ae4b11784318c705b0feeea8a7f06199bf21efc4a9b0bf70c63804339eafc970697bed03b763c63516da776c0403e42798e582deaea3fd385dba7fb6e80b5c6977f3b8d1001bdf5926d582ef79fda5d0b2c",
  "state": "ACVD2346"
}
```json: Access Denied
state=ACVD2346
error=access_denied
error_description=The resource owner or authorization server denied the request
hint=The user denied the request
message=The resource owner or authorization server denied the request
```json: Merchant Rejected
state=ACVD2346
error=merchant _rejected
error_description=The merchant account is not compliant for payments processing
hint=Non compliant user
message=The merchant account is not compliant for payments processing
```

  
### Query Parameters

     Define the following query parameters in the URL. All parameters are mandatory unless specified as optional:

      `client_id`
      : `string` The unique client identifier. You can find it on your application.

      `response_type` 
      : `string` Specifies that the application is requesting an authorisation code grant. Possible value is `code`.

      `redirect_uri` 
      : `string` Callback URL used by Razorpay to redirect after the user approves or denies the authorisation request. The client should whitelist `redirect_uri`.

      `scope`
      : `string` Defines the kind of access your application is requesting from the user. You can request multiple scopes by specifying each scope name separately in the URL using array notation. For example: `scope[]=read_only&scope[]=read_write`. Possible values:
        - `read_only`: Provides read access to all resources. That is, all `GET` API requests. This means you can only view the payments, refunds and so on.
        - `read_write`: Provides read and write access to all resources on the API. This means you can view and create payments, refunds and so on.

      `state`
      : `string` A random string generated by your service. This parameter helps prevent cross-site request forgery (CSRF) attacks. State validation has to be implemented by your application and should work as described below:
        1. Your application should generate a unique random string and save it in the database.
        1. Send the random string to Razorpay in the authorisation request in the `state` parameter.
        1. Razorpay sends back the same `state` value as query params on your redirect URI.
        1. In your backend, you validate that the state value stored in your database matches the one you received for the `client_id` and the user that initiated the authorisation.
    

  
### Success Response Parameters

     We send the following parameters if the user approves the request:

      `code`
      : URL-encoded authorisation code. This is sent to you once the sub-merchant authorises. You can exchange this code for an access token. 

      `state`
      : The value of the `state` parameter sent in the authorisation request.
    

#### Authorisation Response

After completion, the sub-merchant's browser is redirected to URI specified in the `redirect_uri` parameter. Once the [sub-merchant authorises](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps/sub-merchants.md), you can proceed with the steps ahead.

### 2.2 Get Access Token

Exchange the authorisation code received in the previous step for an access token.

> **INFO**
>
> 
> **Handy Tips**
> 
> The authorisation code is URL-encoded. Decode it before sending in this request.
> 

`https://auth.razorpay.com/token`

Given below is the sample request to be made from the application's backend server.

```curl: Request
curl -X POST https://auth.razorpay.com/token
-H "Content-type: application/json"
-d '{
  "client_id": "",
  "client_secret": "",
  "grant_type": "authorization_code",
  "redirect_uri": "http://example.com/razorpay_callback",
  "code": "def50200d844dc80cc44dce2c665d07a374d76802",
  "mode": "test"
}'
```json: Response
{
  "public_token": "YOUR_KEY_ID",
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

      `client_secret` _mandatory_
      : `string` Client secret string.

      `grant_type` _mandatory_
      :  `string` Defines the grant type for the request. Possible value is `authorization_code`.

      `redirect_uri` _mandatory_
      : `string` Specifies the same `redirect_uri` used in the authorisation request.

      `code` _mandatory_
      : `string` Decoded authorisation code received in the last step.

      `mode` _optional_
      : `string` The type of mode. Possible values: 
        - `test`
        - `live` (default)

        
> **INFO**
>
> 
>         **Handy Tips**
>       
>         Clients on production can only make requests for live mode.
>         

    

  
### Response Parameters

     Once the sub-merchant authorises, the following tokens become available to both you and the sub-merchant. You can use these tokens later to create API requests on behalf of the sub-merchant. Know more [about tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps/sub-merchants.md#about-tokens).

      `token_type`
      : `string` Defines the type of access token. Possible value is `Bearer`.

      `expires_in`
      : `integer` Integer representing the TTL of the access token in seconds.

      `access_token`
      : `string` A private key used to access sub-merchant resources on Razorpay. Used for server-to-server calls only. You must use this token instead of `key_id` and `key_secret` to call API requests for the respective sub-merchant. Each sub-merchant has a unique `access_token`. It expires every 90 days.

      `public_token`
      : `string` A public key is used for Payments. For example: `YOUR_KEY_ID`.

      `refresh_token`
      : `string` Used to refresh the access token when it expires. 
      
       
> **WARN**
>
> 
>        **Watch Out!**
>       
>        The `refresh_token` expires in 180 days from the day of generation and must be used to generate a new `refresh_token` before expiry.
>        

      
      `razorpay_account_id`
      : `string` Identifies the sub-merchant id who granted the authorisation.
    

Store the `access_token` received above on your server. Using this token, you can access the sub-merchant's data on Razorpay APIs based on the level of access granted. 

For using RazorpayX as a resource, check [Access Resources using Access Token](#razorpayx).

#### About Tokens

  
### Refresh Token API

     You can use refresh tokens to generate a new access token. If your access token expires, you will receive a 4XX response from the API. You can make a request using your refresh token to generate a new (`access_token` and `refresh_token`) pair.

      Refer to the following API request on how to request a new token:

      `https://auth.razorpay.com/token`

      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       You should make this request from the application's backend server only.
>       

      Given below is the sample code:

      ```curl: Request
      curl -X POST https://auth.razorpay.com/token
      -H "Content-type: application/json" 
      -d '{
        "client_id": "",
        "client_secret": "",
        "grant_type": "refresh_token",
        "refresh_token": "def5020096e1c470c901d34cd60fa53abdaf3662sa0"
      }'
      ```json: Response
      {
        "public_token": "YOUR_KEY_ID",
        "token_type": "Bearer",
        "expires_in": 7862400,
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijl4dTF",
        "refresh_token": "def5020096e1c470c901d34cd60fa53abdaf36620e823ffa53"
      }
      ```

      
          
          Request Parameters
          
           Send the following parameters in the request:

      `client_id` _mandatory_
      : `string` Unique client identifier.

      `client_secret` _mandatory_
      : `string` Client secret string.

      `grant_type` _mandatory_
      : `string` The type of grant for the request. Possible value is `refresh_token`.

      `refresh_token` _mandatory_
      : `string` The previously-stored refresh token value which is about to expire.
          

        
### Response Parameters

             The server will respond with the following parameters:

      `token_type`
      : `string` Defines the type of access token. Possible value is `Bearer`.

      `expires_in`
      : `integer` Integer representing the TTL of the access token in seconds.

      `access_token`
      : `string` Used to access sub-merchant resources on Razorpay. `access_token` is a private token and should only be used for server-to-server calls.

      `public_token`
      : `string` Token used only for Payments. For example: `YOUR_KEY_ID`.

      `refresh_token`
      : `string` The new refresh token. The old refresh token will be expired automatically from this point.
          

        
### Error Response Parameters

             Refer to our [errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/errors.md#revoke-token-api) page for the list of errors and solutions.
          

      
    
  
  
### Revoke Token API

      Use the following endpoint to revoke a token.

      `https://auth.razorpay.com/revoke`

      ```Curl: Request
      curl -X POST https://auth.razorpay.com/revoke
      -H "Content-type: application/json"
      -d '{
        "client_id": "JA1p85ntMrHJhA",
        "client_secret": "DcTFepYebC7FuNk39C8M3yl2",
        "token_type_hint": "access_token",
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJKQTFwODVudE1ySEpoQSIsImp0aSI6IkpPZkd0aHFDTmhqQUhTIiwiaWF0IjoxNjUxMTI0NTU0LCJuYmYiOjE2NTExMjQ1NTQsInN1YiI6IiIsImV4cCI6MTY1ODk4Njk1MiwidXNlcl9pZCI6bnVsbCwibWVyY2hhbnRfaWQiOiJKOWpoSTdzZkM1S1V0NiIsInNjb3BlcyI6WyJyZWFkX3dyaXRlIl19.h1oL_Tik642Q18DdyEnIVziW1kgw6k09K8ALuI4uWQBH3jE4R8p1e6ysQq-Et4E_MZd7ADfC1W6kFwe3PXlkLC6emaZAKESZghbtTBM6RYnhieErAOcD7ytc0P8c75aNRlC6MWwlWaH20OFYuSay7iGFyw2jp4by4xDFlYweVLc"
      }'

      ```json: Success Response
      {
        "message": "Token Revoked"
      }

      ```json: Failure Response
        {
          "error": {
            "code": "SERVER_ERROR",
            "description": "The server encountered an error. The  incident has been reported to admins"
          }
        }
      ```

      
        
          Request Parameters
          
             Send the following parameters in the request:

      `client_id` _mandatory_
      : `string` Unique client identifier.

      `client_secret` _mandatory_
      : `string` Client secret string.

      `token_type_hint` _mandatory_
      : `string` The type of token for the request. Possible value:
          - `access_token`
          - `refresh_token` 

      `token` _mandatory_
      : `string` The token whose access should be revoked.
            

        
### Response Parameters

           The server will respond with the following parameters:
           
      `message`
      : `string` The confirmation message of the token revoke.
          

        
### Error Response Parameters

             Refer to our [errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/errors.md#revoke-token-api) page for the list of errors and solutions.
          

      
    
  

## 3. Access Resources using Access Token

After you obtain an access token, you can use it to access the sub-merchant's data on Razorpay APIs. The access is controlled based on the scope requested for and granted by the user during the authorisation process.

  
### For Payments

     Provide the access token in the `Bearer` authorisation header while requesting [Razorpay APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).

     Given below is a sample code for the [Fetch all Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments). 

     

     ```Curl: Request
     curl -X GET https://api.razorpay.com/v1/payments
     -H "Authorization: Bearer "
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
     

     
     

  
### For RazorpayX

     [Subscribing to webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/subscribe-to-webhooks.md) is a mandatory step if you want to access the user's RazorpayX data. Once you [generate the `access_token`](#22-get-access-token), the user's RazorpayX `account_id` will be sent to the webhook URL specified while creating your application.

     Below is a sample payload.

     ```json: Sample Payload: User's RazorpayX Account Details
     {
       "entity": "event",
       "account_id": "acc_FoM4gv3Gn6NKrM",
       "event": "banking_accounts.issued",
       "contains": [
         "accounts"
       ],
       "payload": {
         "accounts": {
           "virtual": {
             "account_number": "3434360450562835"
           },
           "current": [
             {
               "channel": "rbl",
               "account_number": "409000768239"
             }
           ]
         }
       },
       "created_at": 1604920603
     }
     ```
    

## 4. Process Payments

As a Technology Partner, you can allow sub-merchants to accept payments through various Payment Methods and channels. after getting `access_token`.

  
### 1. Access Customer APIs using OAuth

     You can process payments on behalf of your sub-merchants using [Razorpay APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md). Use the tokens generated during [OAuth integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps/partners-import-flow.md).

     Use the `access_token` generated in the [build integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps/partners-import-flow.md#22-get-access-token) step to authenticate using `Bearer Auth`.

     Below is a sample code to create a customer in server.

      /customers
      ```curl: Curl
      curl -H "Authorization: Bearer " \
      -X POST https://api.razorpay.com/v1/customers \
      -H "content-type: application/json" \
      -d '{
        "name": "Gaurav Kumar",
        "contact": "+919000090000",
        "email": "gaurav.kumar@example.com",
        "fail_existing": "0",
        "notes": {
            "notes_key_1": "Tea, Earl Grey, Hot",
            "notes_key_2": "Tea, Earl Grey… decaf."
        }
       }'

      ```json: Success
      {
        "id": "cust_MpINfSkdEvtdxb",
        "entity": "customer",
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "gstin": null,
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "created_at": 1697550382
      }

      ```json: Failure
      {
        "error": {
          "code": "BAD_REQUEST_ERROR",
          "description": "Contact number should be at least 8 digits, including country code",
          "source": "business",
          "step": "NA",
          "reason": "invalid_contact_number",
          "metadata": {},
          "field": "contact"
        }
      }
      ```

      The parameter descriptions and errors are present in the [Create a Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/build-integration.md#11-create-a-customer-in-server).
    

  
### 2. Access Order APIs using OAuth

     You can process payments on behalf of your sub-merchants using [Razorpay APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md). Use the tokens generated during [OAuth integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps/partners-import-flow.md).

     Use the `access_token` generated in the [build integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps/partners-import-flow.md#22-get-access-token) step to authenticate using `Bearer Auth`.

     Below is a sample code to create an Order and process payments.

      /orders

      ```curl: Curl
      curl -H "Authorization: Bearer " \
      -X POST https://api.razorpay.com/v1/orders \
      -H "content-type: application/json" \
      -d '{
        "amount": 10000,
        "currency": "INR",
        "receipt": "receipt#1",
        "customer_id": "cust_OwZZseNBf9Uqsi",
        "customer_details": {
          "name": "Gaurav Kumar",
          "email": "gaurav.kumar@example.com",
          "contact": "9123456780",
          "shipping_address": {
            "line1": "Mantri apartment",
            "line2": "Koramangala",
            "city": "Bengaluru",
            "country": "IND",
            "state": "Karnataka",
            "zipcode": "560032",
            "latitude": "123123",
            "longitude": "1231231"
          },
          "identity": [
            {
              "type": "tax_id",
              "id": "HSCPE4563G"
            }
          ]
        },
        "notes": {
          "key1": "value3",
          "key2": "value2"
        }
      }'

      ```json: Success
      {
        "amount": 10000,
        "amount_due": 10000,
        "amount_paid": 0,
        "attempts": 0,
        "created_at": 1703569876,
        "currency": "INR",
        "entity": "order",
        "id": "order_NGrgEcmYJsfUyl",
        "notes": {
          "key1": "value3",
          "key2": "value2"
        },
        "offer_id": null,
        "receipt": "receipt#1",
        "status": "created"
      }

      ```json: Failure
      {
        "error": {
          "code": "BAD_REQUEST_ERROR",
          "description": "The amount must be at least INR 1.00",
          "source": "business",
          "step": "payment_initiation",
          "reason": "input_validation_failed",
          "metadata": {},
          "field": "amount"
        }
      }
      ```

      The parameter descriptions and errors are present in the [Create an Order API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/build-integration.md#12-create-an-order-in-server).
    

  
### 3. Integrate with Checkout on Client-Side Using OAuth

     Using the `public_token` for authorisation can secure a public-facing implementation such as Razorpay Checkout. In such cases, the `public_token` can replace the `key_id` field as shown below:

      ```js: Checkout
      Pay
      
      
      var options = {
          "key": "YOUR_KEY_ID", // Public Token
          "amount": "29900", // Amount is in currency subunits. Default currency is INR. 
          "currency": "INR",
          "name": "Acme Corp", //your business name
          "description": "Test Transaction",
          "image": "https://example.com/your_logo",
          "customer_id": "cust_MpINfSkdEvtdxb",
          "order_id": "order_9A33XWu170gUtm",
          "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
          "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
              "name": "Gaurav Kumar",
              "email": "gaurav.kumar@example.com",
              "contact": "9000090000"
          },
          "notes": {
              "invoice_number": "IRS1245",
              "goods_description": "Digital Lamp",
          },
          "theme": {
              "color": "#3399cc"
          }
      };
      var rzp1 = new Razorpay(options);
      document.getElementById('rzp-button1').onclick = function(e){
          rzp1.open();
          e.preventDefault();
      }
      
      ```

      Know more about [Web Standard Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
    

  
### 4. Verify Payment Signature

      This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

      To verify the `razorpay_signature` returned to you by the Checkout form:

      1. Create a signature in your server using the following attributes:
          - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
          - `razorpay_payment_id`: Returned by Checkout.
          - `client_secret`: Available in your server. The `client_secret` that was generated from the [RazorpayDashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

      2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

          ```html: HMAC Hex Digest
          generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, client_secret);

            if (generated_signature == razorpay_signature) {
              payment is successful
            }
          ```

      3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.

      #### Generate Signature on Your Server

      Given below is the sample code for payment signature verification:

      ```java: Java
      RazorpayClient razorpay = new RazorpayClient("[CLIENT_KEY_ID]", "[CLIENT_KEY_SECRET]");

      String secret = "EnLs21M47BllR3X8PSFtjtbd";

      JSONObject options = new JSONObject();
      options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
      options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
      options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

      boolean status =  Utils.verifyPaymentSignature(options, secret);

      ```ruby: Ruby
      require "razorpay"
      Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

      payment_response = {
            razorpay_order_id: 'order_IEIaMR65cu6nz3',
            razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
            razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
          }
      Razorpay::Utility.verify_payment_signature(payment_response)

      ```csharp: .NET
      RazorpayClient client = new RazorpayClient("[CLIENT_KEY_ID]", "[CLIENT_KEY_SECRET]");

      Dictionary options = new Dictionary();
      options.Add("razorpay_order_id", "order_IEIaMR65");
      options.Add("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
      options.Add("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50");

      Utils.verifyPaymentSignature(options);
      ```

      #### Post Signature Verification

      With this, your integration is complete. Test the integration before going live. Replace the test key with the live key and integrate with other [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
    

## 5. Subscribe to Authorization Revoked Webhook

Sub-merchants can revoke access to your application from the Dashboard at any time. Once revoked, your application will no longer have the capability to perform any operations on the sub-merchant account. 

We recommend subscribing to the `account.app.authorization_revoked` webhook event. This ensures that you receive real-time notifications whenever a sub-merchant revokes access to your connected application. 

Follow these steps to [subscribe to webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/subscribe-to-webhooks.md).

Given below is the sample payload:

```json: account.app.authorization_revoked
{
  "event": "account.app.authorization_revoked",
  "account_id": "acc_Dhk2qDbmu6FwZH", // merchant account id
  "contains": [],
  "created_at": 1678282666
}
```

## Next Step

[2. Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/test-integration.md)

### Related Information

- [Revoke Access to Application](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/revoke-access.md)
- [Standard Web Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md)
- [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/errors.md)
