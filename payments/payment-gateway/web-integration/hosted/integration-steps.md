---
title: Hosted Integration - Integration Steps | Razorpay Payment Gateway
heading: Integration Steps
description: Steps to integrate with Razorpay Hosted Web Integration.
---

# Integration Steps

### Video Tutorial

     Watch this video to know how to integrate Razorpay Hosted Checkout on your website. 
     
    

Follow these steps to integrate the Hosted Checkout form on your website:

1. [Build Integration](#1-build-integration): Use the sample codes to integrate the Razorpay Hosted Integration on your website.
2. [Test Integration](#2-test-integration): Make a test payment using the payment methods configured at checkout to ensure the integration is working as expected.
3. [Go-live Checklist](#3-go-live-checklist): Check the go-live checklist before taking the integration live.

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Create an Order in Server

     **Order is an important step in the payment process.**

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call. Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) Orders API.
- The `order_id` received in the response should be passed to the checkout. This ties the order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

You can create an order using:

    
        Use this endpoint to create an order using the Orders API.

        /orders

        ```curl: Curl
        curl -X POST https://api.razorpay.com/v1/orders 
        -U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
        -H 'content-type:application/json'
        -d '{
            "amount": 50000,
            "currency": "",
            "receipt": "qwsaq1",
            "partial_payment": true,
            "first_payment_min_amount": 230
        }'
        ```java: Java
        RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 50000); // amount in the smallest currency unit
        orderRequest.put("currency", "");
        orderRequest.put("receipt", "order_rcptid_11");

        Order order = razorpay.Orders.create(orderRequest);
        } catch (RazorpayException e) {
        // Handle Exception
        System.out.println(e.getMessage());
        }
        ```Python: Python
        import razorpay
        client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

        DATA = {
            "amount": 50000,
            "currency": "",
            "receipt": "receipt#1",
            "notes": {
                "key1": "value3",
                "key2": "value2"
            }
        }
        client.order.create(data=DATA)
        ```php: PHP
        $api = new Api($key_id, $secret);

        $api->order->create(array('receipt' => '123', 'amount' => 50000, 'currency' => '', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
        ```csharp: .NET
        RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

        Dictionary options = new Dictionary();
        options.Add("amount", 50000); // amount in the smallest currency unit
        options.add("receipt", "order_rcptid_11");
        options.add("currency", "");
        Order order = client.Order.Create(options);
        ```ruby: Ruby
        require "razorpay"
        Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

        options = amount: 50000, currency: '', receipt: ''
        order = Razorpay::Order.create
        ```javascript: Node.js
        var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

        instance.orders.create({
        amount: 50000,
        currency: "",
        receipt: "receipt#1",
        notes: {
            key1: "value3",
            key2: "value2"
        }
        })
        ```go: Go
        import ( razorpay "github.com/razorpay/razorpay-go" )
        client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

        data := map[string]interface{}{
        "amount": 50000,
        "currency": "",
        "receipt": "some_receipt_id"
        }
        body, err := client.Order.Create(data)
        ```

        ```json: Success Response
        {
            "id": "order_IluGWxBm9U8zJ8",
            "entity": "order",
            "amount": 50000,
            "amount_paid": 0,
            "amount_due": 50000,
            "currency": "",
            "receipt": "rcptid_11",
            "offer_id": null,
            "status": "created",
            "attempts": 0,
            "notes": [],
            "created_at": 1642662092
        }
        ```json: Failure Response
        {
        "error": {
            "code": "BAD_REQUEST_ERROR",
            "description": "Order amount less than minimum amount allowed",
            "source": "business",
            "step": "payment_initiation",
            "reason": "input_validation_failed",
            "metadata": {},
            "field": "amount"
        }
        }
        ```
    
    
        You can use the Postman workspace below to create an order:

        [](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-6f15a901-06ea-4224-b396-15cd94c6148d)

        
> **INFO**
>
> 
> 
>         **Handy Tips**
> 
>         Under the **Authorization** section in Postman, select **Basic Auth** and add the Key Id and secret as the Username and Password, respectively.
>         

        You can create an order manually by integrating the API sample codes on your server.
    

    
        Request Parameters
        

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit. For example, for an actual amount of , the value of this field should be `22225`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
     - `true`: The customer can make partial payments.
     - `false` (default): The customer cannot make partial payments.

`first_payment_min_amount` _optional_
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of ₹7,000 is to be received from the customer in two installments of #1 - ₹5,000, #2 - ₹2,000, then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

        

    
### Response Parameters

         Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) parameters table.
        

    
### Error Response Parameters

         The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
        

    
  
  
### 1.2 Pass Payment Options to Hosted Checkout

     Add the Pay button on your web page using the checkout code given below. The hosted checkout page is displayed when the customers click the Pay button.
     
       
         1.2.1 Code to Add Pay Button
         
          The Checkout options are sent as form-data to the following URL in a POST request.

          `POST: https://api.razorpay.com/v1/checkout/embedded`

           

          The sample code is given below:

          ```html: Hosted Checkout
          
            
            
            
            
            
            
            
            
            
            
            
            
            
            Submit
          
          ```
          

          

          - For every successful payment, `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` are submitted via a POST request to the `callback_url` passed in payment options.
          - If your customer cancels the transaction or clicks the back button, they are redirected to the `cancel_url` via a GET request.
          - If the payment fails, a POST request is made to the `callback_url`, with the error fields as payload.
         

     
     
       
### 1.2.2 Checkout Options

`key_id` _mandatory_
: `string` Enter [YOUR_Key_ID] generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

`name` _mandatory_
: `string` The business name to be shown in the checkout form.

`description`_optional_
: `string` Description of the item purchased shown in the checkout form.

`image` _optional_
: `string` URL of the logo that must appear on the checkout form.

`order_id` _mandatory_
: `string` Unique identifier of the Order, created using the Orders API.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>     

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`. Refer to the [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies) for a list of supported international currencies.

    
> **INFO**
>
> 
> 
>     **Handy Tips**
> 
>     Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>     

`method` _optional_
: `string` Use this parameter to display a specific payment method in Checkout. Possible values:
  - `card`
  - `netbanking`
  - `wallet`
  - `upi`
  - `paylater`

`prefill`
: The fields that can be pre-populated in the Checkout form.

  `name` _optional_
  : `string` Name of the cardholder.

  `email` _mandatory_
  : `string` Email address of the customer.

  `contact` _mandatory_
  : `string` Customer's phone number.

`notes`_optional_
: `object` An additional set of fields that you want to associate with the payment. For example, you can add "shipping address" and "alternate contact" in the Notes field. You can specify up to 15 note fields.

  `Shipping address`
  : `string` 106, Razorpay, Bangalore

  `Alternate contact`
  : `string` 9000090000

`callback_url` _mandatory_
: `string` Page to which the customers are redirected to after a successful payment. `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` are sent as form-data through a `POST` request to the `callback_url`.

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     Callback URL is not required if you are using the native SDK for Android/iOS.
>     

`cancel_url`_optional_
: `string` The URL customers are redirected to after the cancellation of a payment.
         

     
    
  
  
### 1.3 Store Fields in Your Server

     A successful payment returns the following fields to the Checkout form.

  
    Success Callback
    
- You need to store these fields in your server.
- You can confirm the authenticity of these details by verifying the signature in the next step.

```json: Success Callback
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
    

    
  
  
### 1.4 Verify Payment Signature

     This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

  
    To verify the `razorpay_signature` returned to you by the Checkout form:
    
     1. Create a signature in your server using the following attributes:
        - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
        - `razorpay_payment_id`: Returned by Checkout.
        - `key_secret`: Available in your server. The `key_secret` that was generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

     2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

         ```html: HMAC Hex Digest
         generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

           if (generated_signature == razorpay_signature) {
             payment is successful
           }
         ```
         
     3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
    

  
### Generate Signature on Your Server

Given below is the sample code for payment signature verification:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

boolean status =  Utils.verifyPaymentSignature(options, secret);

```php: PHP
$api = new Api($key_id, $secret);

$api->utility->verifyPaymentSignature(array('razorpay_order_id' => $razorpayOrderId, 'razorpay_payment_id' => $razorpayPaymentId, 'razorpay_signature' => $razorpaySignature));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
       razorpay_order_id: 'order_IEIaMR65cu6nz3',
       razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
       razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
     }
Razorpay::Utility.verify_payment_signature(payment_response)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.utility.verify_payment_signature({
  'razorpay_order_id': razorpay_order_id,
  'razorpay_payment_id': razorpay_payment_id,
  'razorpay_signature': razorpay_signature
  })

```c: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("razorpay_order_id", "order_IEIaMR65");
options.Add("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.Add("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50");

Utils.verifyPaymentSignature(options);

```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var { validatePaymentVerification, validateWebhookSignature } = require('./dist/utils/razorpay-utils');
validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);

```Go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

params := map[string]interface{}{
 "razorpay_order_id": "order_IEIaMR65cu6nz3",
 "razorpay_payment_id": "pay_IH4NVgf4Dreq1l",
}

signature := "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f";
secret := "EnLs21M47BllR3X8PSFtjtbd";
utils.VerifyPaymentSignature(params, signature, secret)
```

    

  
### Post Signature Verification

After you have completed the integration, you can [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md), make test payments, replace the test key with the live key and integrate with other [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
    

     Here are the links to our [SDKs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md#github-and-documentation-links-for-sdks) for the supported platforms.
    
  
  
### 1.5 Verify Payment Status

     
> **INFO**
>
> 
> **Handy Tips**
> 
> On the Razorpay Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
> 

    
        You can track the payment status in three ways:
        

    
        To verify the payment status from the Razorpay Dashboard:

        1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
        2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**.
        
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

    
  

## 2. Test Integration

After the integration is complete, a **Pay** button appears on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test transaction is successful.

You can make test payments using one of the payment methods configured at the Checkout.

> **WARN**
>
> 
> **Watch Out!**
> 
> This is a mock payment page that uses your test API keys, test card and payment details. 
> - Ensure you have entered only your [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) in the Checkout code. 
> - Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> 

    
### Supported Payment Methods

         Following are all the payment modes that the customer can use to complete the payment on the Checkout. Some of them are available by default, while others require approval from us. Raise a request from the Dashboard to enable such payment methods.

         

         
         Payment Method | Code | Availability
         ---
         [Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `debit` | ✓
         ---
         [Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `credit` | ✓
         ---
         [Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md) | `netbanking`| ✓
         ---
         [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md) | `upi` | ✓
         ---
         [Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md) | `wallet` | ✓
         ---
         [Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md)| `paylater` | Requires [Approval](https://razorpay.com/support).
         

         

         

         

         ###  Netbanking

         You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.

         Check the list of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md#supported-banks).

         ###  UPI

         You can enter one of the following UPI IDs:

         - `success@razorpay`: To make the payment successful. 
         - `failure@razorpay`: To fail the payment.

         Check the following lists: 
            - [Supported UPI Flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).
            - [UPI Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/upi.md).

         
> **INFO**
>
> 
> 
>          **Handy Tips**
> 
>          You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
>          

         ###  Cards

         You can use the following test cards to test transactions for your integration in Test Mode.

         #### Domestic Cards

         Use the following test cards for Indian payments:

         
         Network | Card Number | CVV & Expiry Date
         ---
         Visa  | 4100 2800 0000 1007 | Use a random CVV and any future date ^^^^^
         ---
         Mastercard | 5500 6700 0000 1002 | 
         ---
         RuPay | 6527 6589 0000 1005 | 
         ---
         Diners | 3608 280009 1007 | 
         ---
         Amex | 3402 560004 01007 | 
         

         Check the following lists: 
            - [Supported Card Networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
            - [Cards Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/cards.md).
            - [Test Error Scenarios](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#error-scenario-test-cards).

         #### International Cards

         Use the following test cards to test international payments. Use any valid expiration date in the future in the MM/YY format and any random CVV to create a successful payment.

         
         Card Network | Card Number | CVV & Expiry Date
         ---
         Mastercard | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 | Use a random CVV and any future date ^^
         ---
         Visa | 4012 8888 8888 1881 | 
         

         ###  Wallet

         You can select any of the listed wallets. After choosing a wallet, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the wallet login portals.

         Check the list of [supported wallets](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).

         

         
        

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Hosted Checkout integration. Consider these steps before taking the integration live.

    
### 3.1 Accept Live Payments

         Perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you are switching your test API keys with API keys generated in Live Mode.
> 

To generate API Keys in Live Mode on your Razorpay Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        

    
### 3.2 Payment Capture

         After payment is `authorized`, you need to capture it to settle the amount to your bank account as per the settlement schedule. Payments that are not captured are auto-refunded after a fixed time.

> **WARN**
>
> 
> 
> **Watch Out**
> 
> - You should deliver the products or services to your customers only after the payment is captured. Razorpay automatically refunds all the uncaptured payments.
> - You can track the payment status using our [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-a-payment) or webhooks.
> 

  
    Authorized payments can be automatically captured. You can auto-capture all payments [using global settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments) on the Razorpay Dashboard. Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Payment capture settings work only if you have integrated with Orders API on your server side. Know more about the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
>     

  
  
    Each authorized payment can also be captured individually. You can manually capture payments using [Payment Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments). Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
  

        

    
### 3.3 Set Up Webhooks

         Ensure you have [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) in the live mode and configured the events for which you want to receive notifications.

         
> **WARN**
>
> 
>          **Implementation Considerations**
> 
>          Webhooks are the primary and most efficient method for event notifications. They are delivered asynchronously in near real-time. For critical user-facing flows that need instant confirmation (like showing "Payment Successful" immediately), supplement webhooks with API verification.
> 
>          **Recommended approach** 

>          - Rely on webhooks for all automation, which can be asynchronous.
>          - If a critical user-facing flow requires instant status, but the webhook notification has not arrived within the time mandated by your business needs, perform an immediate API Fetch call ([Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md), [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-with-id.md) and [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds/fetch-specific-refund-payment.md)) to verify the status.
>
