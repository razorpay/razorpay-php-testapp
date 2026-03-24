---
title: Google Pay Card Payments - S2S Integration JSON API
description: Learn how to integrate Cards on Google Pay on your S2S Integration using JSON API.
---

# Google Pay Card Payments - S2S Integration JSON API

Using this feature, you can allow your customers to make payments on your Android app using the cards they have saved on Google Pay.

To support Google Pay Cards on your S2S integration:

1. Show Google Pay as a separate option when Google Pay is set up on your customer's device (Know how to [check if Google Pay Cards is available](#step-3-check-if-gpay-cards-is-supported) on the customer's device).
2. Trigger payment when the user clicks Pay with Google Pay Cards on your checkout.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Prerequisites

- Sign up for a Razorpay account.
- Generate [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) on the Dashboard.
- Configure [payment capture settings](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/#dashboard-actions.md) on the Dashboard.
- Follow the [Razorpay S2S Integration documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v1.md).
- You must have a PCI compliance certificate to get this feature enabled on your account.

## Integration Steps

1. [Download the SDKs](#step-1-download-the-sdks)
2. [Add dependencies in Build Gradle file](#step-2-add-dependencies-in-build-gradle-file)
3. [Check if GPay Cards is supported](#step-3-check-if-gpay-cards-is-supported)
4. [Create an order](#step-4-create-an-order)
5. [Create a payment](#step-5-create-a-payment)
6. [Prepare payload for Initiating Payment to Google](#step-6-prepare-payload-for-initiating-payment-to)
7. [Invoke Google Pay App](#step-7-invoke-google-pay-app)
8. [Handle response from Google Pay App (optional)](#step-8-handle-response-from-google-pay-app)
9. [Verify payment status](#step-9-verify-payment-status)

### Step 1: Download the SDKs

Download the [Google Pay SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/tez-client-api-0.9.4.aar) and add the .aar file to the application library.

### Step 2: Add Dependencies in Build Gradle File

Add the following lines to your app's `build.gradle` file. 

```java: Dependencies
dependencies {
    ...
      implementation(name:'tez-client-api-0.9.4', ext:'aar')
      implementation 'com.android.support:customtabs:26.1.0'
      implementation 'com.google.android.gms:play-services-tasks:15.0.1
      implementation 'com.google.android.gms:play-services-wallet:18.0.0'
    ...
}
```

### Step 3: Check if Gpay Cards is Supported

Show `Google Pay` as a payment option only when Google Pay is set up on your customer's device. Google Pay is set up when: 
1. The Google Pay app is installed, **and** 
2. Valid cards or bank accounts (UPI) are added to your customer's Google pay account. 

This will enable you to show only relevant payment methods to your users.

Follow these steps to check if Google Pay Cards is supported:

#### Step 3.1: Integrate the following code snippet in your app 
 
Given below is the code sample:

```java: 
Task task = null;
Context context = .this;
try {
   task = mPaymentClient.isReadyToPay(context,jsonObjectRequest(payload));
} catch (NoSuchAlgorithmException e) {
   e.printStackTrace();
}

task.addOnCompleteListener(new OnCompleteListener() {
   public void onComplete(Task task) {
       boolean result = task.getResult();
       if (result == true) {
          //Google Pay card is available & ready for transaction
       } else {
	    //Google Pay card either isn't available or set up for usage. 
       }
   }
});
```

#### Step 3.2: Check if Google Pay Cards is set up

Invoke the `isReadyToPay` function when you want to check if Google Pay Cards is set up on your customer's device, using the following payload:

```java
"apiVersion": 2,
"apiVersionMinor": 0,
"allowedPaymentMethods"​:[
   {
​      "type"​:​ ​"CARD",
​       "parameters"​:​ {
​              "allowedCardNetworks"​ ​:​ ​["VISA", "MASTERCARD"],
         }
​   },
   {
​       "type"​:​ ​"UPI",
​   }
]
```

Show `Pay with Google Pay cards` method to your end customers only when `isReadyToPay` function returns `true`.

### Step 4: Create an Order

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call.  Know how to [authenticate](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) Orders API.  
- The order_id received in the response should be passed to the checkout. This ties the Order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

#### API Sample Code

The following is a sample API request and response for creating an order:

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
    "amount": 50000,
    "currency": "INR",
    "receipt": "rcptid_11",
    "partial_payment": true,
    "first_payment_min_amount": 23000
}'
```java: Java
try {
  JSONObject orderRequest = new JSONObject();
  orderRequest.put("amount", 50000); // amount in the smallest currency unit
  orderRequest.put("currency", "INR");
  orderRequest.put("receipt", "order_rcptid_11");

  Order order = razorpay.Orders.create(orderRequest);
} catch (RazorpayException e) {
  // Handle Exception
  System.out.println(e.getMessage());
}
```Python: Python
import razorpay
client = razorpay.Client(auth=("api_key", "api_secret"))

DATA = {
    "amount": 50000,
    "currency": "INR",
    "receipt": "receipt#1",
    "notes": {
        "key1": "value3",
        "key2": "value2"
    }
}
client.order.create(data=DATA)
```php: PHP
$order  = $client->order->create([
  'receipt'         => 'order_rcptid_11',
  'amount'          => 50000, // amount in the smallest currency unit
  'currency'        => 'INR'// [See the list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).)
]);
```csharp: .NET
Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.add("receipt", "order_rcptid_11");
options.add("currency", "INR");
Order order = client.Order.Create(options);
```ruby: Ruby
options = amount: 50000, currency: 'INR', receipt: ''
order = Razorpay::Order.create
```javascript: Node.js
var options = {
  amount: 50000,  // amount in the smallest currency unit
  currency: "INR",
  receipt: "order_rcptid_11"
};
instance.orders.create(options, function(err, order) {
  console.log(order);
});
```json: Response
{
    "id": "order_DBJOWzybf0sJbb",
    "entity": "order",
    "amount": 50000,
    "amount_paid": 0,
    "amount_due": 50000,
    "currency": "INR",
    "receipt": "rcptid_11",
    "status": "created",
    "attempts": 0,
    "notes": [],
    "created_at": 1566986570
}
```

#### Request Parameters

Here is the list of parameters and their description for creating an order:

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). Length must be 3 characters.

  
  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY and three decimal currencies, such as KWD, BHD and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

  

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`id` _mandatory_
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

Know more about [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

#### Response Parameters

Descriptions for the response parameters are present in the [Orders Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/entity.md) table.

#### Error Response Parameters

The error response parameters are available in the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md).

The `razorpay_order_id` returned on successful creation of the order should be sent to the Checkout form.

### Step 5: Create a Payment

Once an order is created, your next step is to create a payment. The following API will create a payment with Pay with Google Pay Cards as the payment method:

/payments/create/json

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": "100",
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "order_id": "order_EKwxwAgItmmXdp",
  "provider": "google_pay",
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment"
}'
```json: Response
{
  "razorpay_payment_id": "pay_ERNEungCtXpZqM",
  "next": [
    {
      "action": "invoke_sdk",
      "provider": "google_pay",
      "provider_data": {
        "google_pay": {
          "card": {
            "supported_networks": [
              "Visa",
              "MasterCard"
            ],
            "gateway_reference_id": "XXXXXX"
          },
          "upi": {
            "payee_vpa": "gaurav.kumar@exampleupi",
            "mcc": "0000",
            "gateway_reference_id": "XXXXXX"
          }
        }
      }
    },
    {
      "action": "poll",
      "url": "https://api.razorpay.com/v1/payments/pay_ERNEungCtXpZqM"
    }
  ]
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is ₹100, enter `10000`.

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. See the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

`order_id` _mandatory_
: `string` Order ID generated in the previous step.

`email` _mandatory_
: `string` Email address of the customer.

`contact` _mandatory_
: `string`  Phone number of the customer.

`provider` _mandatory_
: `string`  Name of the service provider partnered with Razorpay. Enter the value `google_pay`.

`notes` _optional_
: `object` Set of key-value pairs used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`ip` _optional_
: `string` Customer IP Address.

`referrer` _optional_
: `string` Customer referrer.

`user_agent` _optional_
: `string` Customer user-agent.

#### Response Parameters

Given below are the response parameters:

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

   `action`
   : `string` An indication of the next step available to you to continue the payment process. Possible value:
      - `invoke_sdk`: Contains the payload needed to create `loadPaymentData` payload as specified by the Google SDK specification. Use this to create the payload and pass it to the customer's device. Use the same to invoke the Google Pay app on the user's android app.
      - `poll`: Contains the URL you must poll to fetch the payment status (`authorized` or `failed`).

### Step 6: Prepare payload for Initiating Payment to Google

As a next step, you need to initiate payment to Google SDK integrated in [Step 2](#step-2-add-dependencies-in-build-gradle-file). To initiate the payment, you need to create a payload in the format prescribed by Google. The payload structure is explained in this step:

Google Pay payload:
Google expects following payload in payment request:

```java:Google Pay Payload
{
  "apiVersion": 2,
  "apiVersionMinor": 0,
  "allowedPaymentMethods": [
    {
      "type": "UPI",
      "parameters": {
        "payeeVpa": "",
        "payeeName": "Some Name",
        "referenceUrl": "Website URL",
        "mcc": "",
        "transactionReferenceId": ""
      },
      "tokenizationSpecification": {
        "type": "DIRECT"
      }
    },
    {
      "type": "CARD",
      "parameters": {
        "allowedCardNetworks": [
          "VISA",
          "MASTERCARD"
        ]
      },
      "tokenizationSpecification": {
        "type": "PAYMENT_GATEWAY",
        "parameters": {
          "gateway": "razorpayindia",
          "gatewayMerchantId": "",
          "gatewayTransactionId": ""
        }
      }
    }
  ],
  "transactionInfo": {
    "currencyCode": "INR",
    "totalPrice": "5000.00",
    "totalPriceStatus": "FINAL"
  }
}
```

#### Request Parameters

As can be seen, the payload has a lot of fields. Razorpay will provide values to be passed in some of the fields. For the remaining fields, you would need to be pass the values from your end.
The value to be passed in each field is displayed in the table below:

Parameter | Data Type | Description | Required?
---
apiVersion | Integer | The Google Pay API version used. The current version is 2. | Y
---
apiVersionMinor | Integer | The Google Pay API minor version used. The current version is 0. | Y
---
allowedPaymentMethods | Array | An array of objects for each method to be allowed. In this case, it will have two objects one each for UPI and Cards respectively. Each of the objects are explained in subsequent tables. | Y
---
transactionInfo.currencyCode | string | The value is `INR`. | Y
----
transactionInfo.totalPrice | string | The payment amount passed in the API request in step 5. The amount here is in INR. | Y
---
transactionInfo.totalPriceStatus | string | The value is `FINAL`. | Y

#### UPI Object

The table below explains the fields for the UPI object:

Google Pay Field | Razorpay Field | Value
---
parameters.payeeVpa 
`required` | provider_data.google_pay.upi.payee_vpa | This is your VPA created by Razorpay. This will be provided by Razorpay in payment response in step 5.
---
parameters.payeeName 
`required` | NA | You need to pass the user-facing business name for your business.
---
parameters.referenceUrl 
`optional` | NA | Your website URL for this specific payment. You may pass your website URL here.
---
parameters.mcc 
`required` | provider_data.google_pay.upi.mcc | This is a digit category code for your business. This will be provided by Razorpay in payment response in step 5.
---
parameters.transactionReferenceId 
`required` | provider_data.google_pay.upi.gateway_reference_id | This is a unique ID generated for this UPI payment. This will be provided by Razorpay in payment response in step 5.
---
tokenizationSpecification.type 
`required` | DIRECT | Always `Direct`

#### Card Object

The table below explains the fields for the card object:

Google Pay Field | Razorpay Field | Value
---
parameters.allowedCardNetworks 
`required` | provider_data.google_pay.card.supported_networks | This field indicates the card networks to be supported by Google. This will be provided by Razorpay in payment response in step 5. * You will need to transform network names in block letters.For example, convert Visa to `VISA` and MasterCard to `MASTERCARD`.
---
tokenizationSpecification.type 
`required` | DIRECT | Always `Direct`.
---
tokenizationSpecification.parameters.gateway 
`required` |  razorpayindia | Always `razorpayindia`.
---
tokenizationSpecification.parameters.gatewayMerchantId 
`required` | NA | This is the Razorpay merchant ID for your Razorpay account. You can find this by logging in to the Dashboard and clicking the user icon on the top right corner.
---
tokenizationSpecification.parameters.gatewayTransactionId 
`required` | provider_data.google_pay.card.gateway_reference_id | This is a unique ID generated for this Card payment. This will be provided by Razorpay in payment response in step 5.

### Step 7: Invoke Google Pay App

The payload created by you in step 6 (using the data available in `invoke_sdk` action in next array) will be used here. You will need to pass the payload to your Android app and initiate the `loadPaymentData` function as shown below:

```java:Sample code
mPaymentClient.loadPaymentData(MainActivity.this,transactionPayload,LOAD_PAYMENT_DATA_REQUEST_CODE​);
```

This will open the Google Pay app on the customer's device for payment processing.

### Step 8: Handle response from Google Pay App (Optional)

Google Pay app will return result to `onActivityResult` function as shown below:

```java: onActivityResult
@Override
protected void onActivityResult(int requestCode, int resultCode, Intent data) {
   if (requestCode == LOAD_PAYMENT_DATA_REQUEST_CODE​) {
       switch (resultCode) {
           case Activity.RESULT_OK: //payment was successful
               String paymentData = WalletUtils.getPaymentDataFromIntent(data);
               break;
           case Activity.RESULT_FIRST_USER: //internal error, something went wrong
               int statusCode = data.getIntExtra(WalletConstants.EXTRA_ERROR_CODE, WalletConstants.INTERNAL_ERROR);
               handleResultStatusCode(click here)(statusCode);
               break;
           case Activity.RESULT_CANCELED: //the transaction was cancelled by USER
               break;
       }
   }
}
```

Your app can further use the snippet code below to get more insight into the error code `RESULT_FIRST_USER` received in `onActivityResult`:

```java: onActivityResult
private void handleResultStatusCode(int statusCode) {
   switch (statusCode) {
       case WalletConstants.ERROR_CODE_BUYER_ACCOUNT_ERROR:
           break;
       case WalletConstants.ERROR_CODE_MERCHANT_ACCOUNT_ERROR:
           break;
       case WalletConstants.ERROR_CODE_UNSUPPORTED_API_VERSION:
       case WalletConstants.INTERNAL_ERROR:
       case WalletConstants.DEVELOPER_ERROR:
       default:
           Toast.makeText(this,"Internal error", Toast.LENGTH_SHORT).show();
           //throw new IllegalStateException("Internal error.");
   }
}
```

### Step 9: Verify Payment Status

When your application gets `Result_OK` from the Google app, you can verify the same using any of the following methods:
- [Fetch Payments API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-multiple-payments.md)
- [Payments Webhooks (Recommended)](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments/#payments.md)
- [Orders Webhooks (Recommended)](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/orders/#orders.md)
