---
title: 3DS 2 Migration Guide - EMV 3DS 2 SDK Cards Integration
description: Steps to integrate EMV 3DS 2 SDK and accept payments using cards.
---

# 3DS 2 Migration Guide - EMV 3DS 2 SDK Cards Integration

You can integrate with Razorpay APIs to start accepting card payments. Razorpay APIs support the latest 3DS 2 authentication protocol. If you are an existing Razorpay user, that is, you integrated with our S2S APIs before October 15, 2022, you need to make certain integration changes to migrate to the 3DS 2 flow.

> **WARN**
>
> 
> **Watch Out!**
> 
> You must have a PCI compliance certificate to enable this feature on your account.
> 

## EMV 3DS 2 SDK

The 3DS 2 protocol mandates the integration of an EMV 3DS SDK for processing authentication via in-app flow. This SDK provides capabilities to authenticate processes in the native app UI without redirection to the bank ACS page for cardholder authentication. This improves the overall customer experience. EMV 3DS 2 authentication allows you to:

- Collect and pass additional device data to Issuer ACS for risk assessment. In the case of cross-border payments, issuer ACS can use the data passed to decide between frictionless or challenge-based authentication flow.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     RBI mandates the challenge flow in India, and hence the issuer cannot opt for frictionless authentication for Indian cards.
>     

- If the issuer decides to invoke the challenge-based authentication flow, then you can use the SDK to open the in-app native challenge page, to collect authentication details like OTP instead of redirecting the users.

## Integration Steps

Razorpay will provide a ready-to-use 3DS 2 SDK certified by **EMVCo**. You may use this SDK to process 3DS 2 payment providers, including Razorpay. The SDK-based flow will vary for both Challenge-based and Frictionless authentication flows.
- [Changes Required for Challenge Flow](#changes-required-for-challenged-flow)
- [Changes Required for Frictionless Flow](#changes-required-for-frictionless-payments)

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You may also develop the same and get the SDK certified with the **EMVCo**.
> 

## Changes Required for Challenged Flow

1. [Pass additional parameter in Create a Payment API request](#1-pass-additional-parameter-in-create-a-payment-api-request).
2. [Collect Device Information](#2-collect-device-information).
3. [Submit Device Information to Razorpay](#3-submit-device-information-to-razorpay).
4. [Present the Challenge Flow to the Cardholder](#4-present-the-challenge-flow-to-the-cardholder).
5. [Verify Payment Status on Razorpay Server](#5-verify-payment-status-on-razorpay-server).

### 1. Pass Additional Parameter in Create a Payment API request

Pass the following additional parameter in the Create a Payment API request apart from the [existing parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards/browser.md).

```curl: Curl
curl -X POST \
https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "contact": "9900008989",
  "email": "gaurav.kumar@example.com",
  "order_id": "order_DPzFe1Q1dEOKed",
  "method": "card",
  "card":{
         "number": "4386289407660153",
         "name": "Gaurav",
         "expiry_month": 11,
         "expiry_year": 2030,
         "cvv": 100
      },
      "authentication":{
         "authentication_channel": "app" 
      },
     "ip": "105.106.107.108",
     "referer": "https://merchansite.com/example/paybill"
}

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient instance = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 100);
paymentRequest.put("currency", "INR");
paymentRequest.put("contact", "9900008989");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("order_id", "order_DPzFe1Q1dEOKed");
paymentRequest.put("method", "card");

JSONObject card = new JSONObject();
card.put("number", "4386289407660153");
card.put("name", "Gaurav");
card.put("expiry_month", "11");
card.put("expiry_year", "2030");
card.put("cvv", "100");
paymentRequest.put("card", card);

JSONObject authentication = new JSONObject();
authentication.put("authentication_channel", "app");
paymentRequest.put("authentication", authentication);

paymentRequest.put("ip", "105.106.107.108");
paymentRequest.put("referer", "https://merchansite.com/example/paybill");

Payment payment = instance.payments.createJsonPayment(paymentRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", 100);
paymentRequest.Add("currency", "INR");
paymentRequest.Add("contact", "9900008989");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("order_id", "order_DPzFe1Q1dEOKed");
paymentRequest.Add("method", "card");

Dictionary card = new Dictionary();
card.Add("number", "4386289407660153");
card.Add("name", "Gaurav");
card.Add("expiry_month", "11");
card.Add("expiry_year", "30");
card.Add("cvv", "100");
paymentRequest.Add("card", card);

Dictionary authentication = new Dictionary();
authentication.Add("authentication_channel", "app");
paymentRequest.Add("authentication", authentication);

paymentRequest.Add("ip", "105.106.107.108");
paymentRequest.Add("referer", "https://merchansite.com/example/paybill");

Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array('amount'=>100,'currency'=>'INR','contact'=>'9900008989','email'=>'gaurav.kumar@example.com','order_id'=>'order_DPzFe1Q1dEOKed','method'=>'card','card'=>array('number'=>'4386289407660153','name'=>'Gaurav','expiry_month'=>11,'expiry_year'=>2030,'cvv'=>100,),'authentication'=>array('authentication_channel'=>'app',),'ip'=>'105.106.107.108','referer'=>'https://merchansite.com/example/paybill',));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "method": "card",
    "card": {
        "number": "4386289407660153",
        "name": "Gaurav",
        "expiry_month": 11,
        "expiry_year": 2030,
        "cvv": 100
    },
    "authentication": {
        "authentication_channel": "app"
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill"
};

instance.payments.createPaymentJson(data);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "method": "card",
    "card": {
        "number": "4386289407660153",
        "name": "Gaurav",
        "expiry_month": 11,
        "expiry_year": 2030,
        "cvv": 100
    },
    "authentication": {
        "authentication_channel": "app"
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill",
}

Razorpay::Payment.create_json_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "method": "card",
    "card": map[string]interface{}{
        "number": "4386289407660153",
        "name": "Gaurav",
        "expiry_month": 11,
        "expiry_year": 2030,
        "cvv": 100,
    },
    "authentication": map[string]interface{}{
        "authentication_channel": "app",
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill",
}

body, err := client.Payment.CreatePaymentJson(para_attr, nil)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
  "amount": 100,
  "currency": "INR",
  "contact": "9900008989",
  "email": "gaurav.kumar@example.com",
  "order_id": "order_DPzFe1Q1dEOKed",
  "method": "card",
  "card":{
         "number": "4386289407660153",
         "name": "Gaurav",
         "expiry_month": 11,
         "expiry_year": 2030,
         "cvv": 100
      },
      "authentication":{
         "authentication_channel": "app" 
      },
     "ip": "105.106.107.108",
     "referer": "https://merchansite.com/example/paybill"
}

client.payment.createPaymentJson(data)

```json: Response 
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "submit_authentication_information",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/authentication_information"
      "3DS2_data": {
          "message_version": "2.2.0",
          "directory_server_id": "A000000003",
          "directory_server_public_key": "eyJrdHkiOiJSU0EiLCJlIjoiQVFBQiIsIm4iOiI4VFBxZkFQ"
       }
    }
  ]
}
```

#### Request Parameters

`authentication` 
: `object` Details of the authentication channel.

   `authentication_channel` _mandatory_
   : `string` The authentication channel for the payment. In the case of SDK-based transaction, the possible value is `app`. For all other cases, it can be `browser`. 

#### Response Parameters

`message_version`
: `string` The exact protocol version supported by the card.

`directory_server_id`
: `string` This is threeDSServerTransID sent by the ACS.

`directory_server_public_key`
: `string` Public key for performing authentication. 

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process.

    `url`
    : `string`  URL to be used for the action indicated.

### 2. Collect Device Information

When you get the action as `submit_3ds_device_information`, you will need to start the device fingerprinting process using the 3DS 2 SDK. There are two ways:
1. Using Razorpay's EMVCo SDK
2. Using Direct EMVCo SDK

#### Using Razorpay EMVCo SDK

Follow these steps to initiate the SDK call to collect 3DS 2 device information:

1. Initiate the `get_device_information` method on Razorpay SDK. Razorpay SDK will make required calls to the inherent 3DS 2 SDK.
2. Using the response received in payment create API, pass the following parameters to the `get_device_information` method:
   1. `directory_server_id`
   2. `message_version`
   3. `directory_server_public_key`
3. The `get_device_information` method will return the below parameters. You need to pass the same to Razorpay in the next API call. The parameters are:
   1. `sdk_app_id`
   2. `sdk_transaction_id`
   3. `sdk_ephemeral_public_key`
   4. `device_date`
   5. `message_version`

#### Using Direct EMVCo SDK

Follow these steps to initiate the SDK call to collect 3DS 2 device information:

1. Create instances of ConfigParameters, locale, and UiCustomization for initialization by passing the `directory_server_id`, and the `directory_server_public_key` parameters returned during the payment create response.
2. Call the initialise method to initialise the 3DS SDK during the App startup as a background task or when a transaction is initiated.
3. Call the `createTransaction` method on SDK by passing the `directory_server_id` parameter returned during the payment create response.
4. Call the `getProgressView` method on the SDK. This step shows a processing screen to the cardholder.
5. Call the `getAuthenticationRequestParameters` method on the SDK and obtain the `AuthenticationRequestParameters` object that contains the following:
   1. `sdkAppId`
   2. `sdkTransactionID`
   3. `sdkEphemeralPublicKey`
   4. `sdkReferenceNumber`
   5. `deviceData`
   6. `messageVersion`

You will pass this information on to Razorpay to process the authentication request.

### 3. Submit Device Information to Razorpay

Once the data is collected using the above steps:
1. Make an API call from your backend to submit device data to Razorpay.
2. Razorpay will initiate an authentication request. If the issuer bank mandates a challenge flow, then a challenge flow would be required.
3. If the issuer bank approves frictionless flow, you will receive a successful payment message in the response.

#### Sample Code 

Given below is the sample code:

```curl: Request
curl -X POST "https://api.razorpay.com/v1/payments/pay_FVmAtLUe9XZSGM/authentication_information" \
 -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
 -H "Content-Type: application/json" \
 -d '{
      "authentication": {
      "3DS2_data": {
      "device_information": {
         "sdk_app_id": "9063b12c-fcde-43c7-b28e-8d0af5520e8a",
         "sdk_transaction_id": "9063b12c-fcde-43c7-b28e-8d0af5520e8a",
         "sdk_encrypted_data": "",
         "sdk_reference_number": "3DS_LOA_SDK_ADBV_739485_94783",
         "sdk_ephermal_public_key": {
            "crv": "P-256",
            "kty": "EC",
            "x": "LYImJkRzS92vogM6AUPCBhJ20VagSe8IL0Q9SdisUSo",
            "y": "Rav4sKHnLUIUHVdyR4dyV7G2_EeAnuCn_6621ZhqZYU"
         }
      },
      "authentication_channel": "app",
      "auth_step": "3ds2Auth"
     }
    }
   }'
```json: Response 
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "initiate_challenge_via_sdk",
      "3DS2_data": {
          "threeDSServerTransID": "xxxx",
          "acs_transaction_id": "xxxx",
          "acs_reference_number": "xxxx",
          "acs_signed_content": "xxxx",
          "acs_rendering_type": "xxxx"
    },
    {
      "action": "poll",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/"
    }
  ]
}
```

#### Request Parameters

`sdk_app_id` _mandatory_
: `string` App id used by ACS/DS to identify the transaction.

`sdk_transaction_id` _mandatory_
: `string` Transaction id used by ACS/DS to identify the transaction.

`sdk_encrypted_data` _mandatory_
: `string` Encrypted response data sent by DS via ACS.

`sdk_reference_number` _mandatory_
: `string` Reference number used by ACS/DS to identify the transaction.

`sdk_ephemeral_public_key` _mandatory_
: `object` This is the public key used to decrypt the sdk_encrypted_data at our data at our end. It should contain the below fields.

   `crv` _mandatory_
   : `string` Indicates the curve.
 
   `kty` _mandatory_
   : `string` Indicates the key type.

   `x` _mandatory_
   : `string` X coordinate of the curve.

   `y` _mandatory_ 
   : `string` Y coordinate of the curve.

`authentication_channel` _mandatory_
: `string` This value is used for processing the transaction as an sdk-based flow. The constant value should be **app** for the SDK transaction.

`auth_step` _mandatory_
: ` string` This value is an indicator for Razorpay to process the authenticate the payment.

#### Response Parameters

`threeDSServerTransID`
: `string` Sent by DS via ACH to check the validation of the transaction at each step.

`acs_transaction_id`
: `string` Transaction id used by ACS to identify the transaction.

`acs_reference_number`
: `string` Reference number used by ACS to identify the transaction.

`acs_signed_content`
: ` string` Signed (encrypted) response sent by ACS.

`acs_rendering_type`
: `string` Contains Layout rendering information.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - `initiate_challenge_via_sdk` indicates that the issuer bank has requested a challenge flow. 
> - This challenge flow has to be processed via SDK.
> 

### 4. Present the Challenge Flow to the Cardholder 

In the previous API, if you receive the value of `action` as `initiate_challenge_via_sdk`, it means that the challenge flow is required.
There are two ways you can use the SDK to process the challenge flow:
1. Using Razorpay's EMVCo SDK
2. Using Direct EMVCo SDK

####  Using Razorpay EMVCo SDK

Given below is the SDK call to be made to collect 3DS 2 device information:

1. Initiate the `process_challege` method.
2. Provide the data received in the previous API response to the SDK. The parameters required are:
   1. `directory_server_transaction_id`
   2. `acs_transaction_id`
   3. `acs_reference_number`
   4. `acs_signed_content`
   5. `3ds_requestor_app_url`
      
> **INFO**
>
> 
>       **Handy Tips**
> 
>       `3ds_requestor_app_url`- You will not get this parameter in the API response, and you need to pass your app redirection URL to this parameter. 
>       

   6. `challenge_status`

#### Using Standalone EMVCo SDK

Given below is the SDK call to be made to collect 3DS 2 device information:

1. Create an instance of `ChallengeParameters`.
2. You will need to call the `dochallenge` method.
3. Your app provides the following to the SDK:
   1. `directory_server_transaction_id`
   2. `acs_transaction_id`
   3. `acs_reference_number`
   4. `acs_signed_content`
   5. `3ds_requestor_app_url`
   6. `challenge_status`
4. Call the `cleanup` method to free up resources.

### 5. Verify Payment Status on Razorpay Server

You can use your existing integration to verify payment status. Such as:
1. [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments) to check the payment status. This API needs to be hit in a cron job, as payment will get authorized once this API is hit for the first time. And the payment status change will show up on subsequent calls.
2. Listening to payment callback events or webhooks.

## Changes Required for Frictionless Flow

1. [Pass additional parameter in Create a Payment API](#1-pass-additional-parameter-in-create-a-payment-api-request)
2. [Collect Device Information](#2-collect-device-information)
3. [Submit Device Information](#3-submit-device-information-to-razorpay)

Ensure you make the following changes in your Create a Payment API request.

### 1. Pass Additional Parameter in Create a Payment API Request.

Pass the following additional parameter in the Create a Payment API request apart from the existing request parameters.

```curl: Request
curl -X POST \
https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "contact": "9900008989",
  "email": "gaurav.kumar@example.com",
  "order_id": "order_DPzFe1Q1dEOKed",
  "method": "card",
  "card":{
         "number": "4386289407660153",
         "name": "Gaurav",
         "expiry_month": 11,
         "expiry_year": 2030,
         "cvv": 100
      },
      "authentication":{
         "authentication_channel": "app" 
      },
     "ip": "105.106.107.108",
     "referer": "https://merchansite.com/example/paybill"
}'
```json: Response
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "submit_authentication_information",
      "url": "https://api.razorpay.com/v1/payments/FVmAtLUe9XZSGM/3ds2_device_information"
      "3DS2_data": {
          "message_version": "2.2.0",
          "directory_server_id": "A000000003",
    "directory_server_public_key": "eyJrdHkiOiJSU0EiLCJlIjoiQVFBQiIsIm4iOiI4VFBxZkFQ"
       }
    }
  ]
}
```

#### Request Parameters

`authentication` 
: `object` Details of the authentication channel.

   `authentication_channel` _mandatory_
   : `string` The authentication channel for the payment. For SDK-based transactions, the possible value is `app`. For all other cases, it can be `browser`.

#### Response Parameters

`network` 
: `string` The card's network value.

`message_version`
: `string` The exact protocol version supported by the card.

`directory_server_id`
: `string` This is the threeDSServerTransID sent by the ACS.

`directory_server_public_key`
: `string` Public key for performing authentication.

### 2. Collect Device Information

When you get the action as `submit_3ds_device_information`, you will need to start the device fingerprinting process using the 3DS 2 SDK. You will call the SDK commands as given below:
There are two ways:
1. Using Razorpay's EMVCo SDK
2. Using Direct EMVCo SDK

#### Using Razorpay EMVCo SDK

Follow these steps to initiate the SDK call to collect 3DS 2 device information:

1. Initiate the `get_device_information` method on Razorpay SDK. Razorpay SDK will make required calls to the inherent 3DS 2 SDK.
2. Using the response received in payment create API, pass the following parameters to the `get_device_information` method:
   1. `directory_server_id`
   2. `message_version`
   3. `directory_server_public_key`
3. The `get_device_information` will return the below parameters, and you need to pass the same to Razorpay in the next API call.
   1. `sdk_app_id`
   2. `sdk_transaction_id`
   3. `sdk_ephemeral_public_key`
   4. `sdk_reference_number`
   5. `device_date`
   6. `message_version`

#### Using Direct EMVCo SDK

Follow these steps to initiate the SDK call to collect 3DS 2 device information:

1. Create instances of ConfigParameters, locale, and UiCustomization for initialisation by passing the `directory_server_public_key` parameters returned Payment Create response.
2. Call the initialise method to initialise the 3DS SDK during App startup as a background task or when a transaction is initiated.
3. Call the `createTransaction` method on SDK by passing the `directory_server_id` parameter returned in the payment create response.
4. Call the `getProgressView` method on the SDK. This step shows a processing screen to the cardholder.
5. Call the `getAuthenticationRequestParameters` method on the SDK and obtain the `AuthenticationRequestParameters` object that contains:
   1. `sdk_app_id`
   2. `sdk_transaction_id`
   3. `sdk_ephemeral_public_key`
   4. `sdk_reference_number`
   5. `device_data`
   6. `message_version`

You will pass this information on to Razorpay to process the authentication request.

### 3. Submit Device Information to Razorpay

Once the data is collected using the above steps: 
1. Make an API call from your backend to submit the device data to Razorpay.
2. Razorpay will initiate an authentication request. If the issuer bank mandates a challenge flow, then a challenge flow would be required. 
3. If issuer banks approve frictionless flow, then you will get a payment successful message for the following request:

#### Sample Code

Given below is the sample code:

```curl: Request
curl -X POST "https://api.razorpay.com/v1/payments/FVmAtLUe9XZSGM/authentication_information" \
 -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
 -H "Content-Type: application/json" \
  -d '{
      "authentication": {
       "3DS2_data": {
       "device_information": {
         "sdk_app_id": "9063b12c-fcde-43c7-b28e-8d0af5520e8a",
         "sdk_transaction_id": "9063b12c-fcde-43c7-b28e-8d0af5520e8a",
         "sdk_encrypted_data": "",
         "sdk_referenceNumber": "3DS_LOA_SDK_ADBV_739485_94783",
         "sdk_ephermal_public_key": {
            "crv": "P-256",
            "kty": "EC",
            "x": "LYImJkRzS92vogM6AUPCBhJ20VagSe8IL0Q9SdisUSo",
            "y": "Rav4sKHnLUIUHVdyR4dyV7G2_EeAnuCn_6621ZhqZYU"
         }
       },
       "authentication_channel": "app",
       "auth_step": "3ds2Auth"
       }
      }
   }'
```json: Response
{
  "razorpay_payment_id": "pay_D5jmY2H6vC7Cy3",
  "razorpay_order_id": "order_9A33XWu170gUtm",
"razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

#### Request Parameters

`id` _mandatory_
: `string` Unique identifier of the payment.
 
`sdk_app_id` _mandatory_
: `string` App id used by ACS/DS to identify the transaction

`sdk_transaction_id` _mandatory_
: `string` Transaction id used by ACS/DS to identify the transaction.

`sdk_encrypted_data` _mandatory_
: `string` Encrypted Response Data sent by DS via ACH.

`sdk_reference_number` _mandatory_
: `string` Reference number used by ACS/DS to identify the transaction.

`sdk_ephemeral_public_key` _mandatory_
: `string` This is the public key used to decrypt the sdk_encrypted_data at our end. It should contain the below fields.

   `crv` _mandatory_
   : `string` curve.

   `kty` _mandatory_
   : `string` key type.

   `x` _mandatory_
   : `string` x coordinate of the curve.

   `y` _mandatory_
   : `string` y coordinate of the curve.

`authentication_channel` 
: `string` Constant value should be **app** for sdk trx. This value is used for processing the transaction as a sdk-based flow.

`auth_step`
: `string` Constant value should be **3ds2Auth**. This value is an indicator for Razorpay to process the authentication on the payment.

The above response indicates that the issuer bank has approved a frictionless payment flow. You can show a successful payment response to the customer.
