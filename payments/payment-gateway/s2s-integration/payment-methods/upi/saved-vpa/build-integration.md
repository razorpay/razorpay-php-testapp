---
title: Build Integration
description: Steps to integrate tokens in the payment flow.
---

# Build Integration

The steps required to integrate tokens in the payment flow are as follows:

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md).
> 

### Step 1: Create a Customer

Create a customer whose VPAs should be saved. You can skip this step if you have already created customers in your account.

/customers

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/customers \
-H "Content-Type: application/json" \
-d '{
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000"
}'
```Java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject request = new JSONObject();
request.put("name", Gaurav Kumar);
request.put("email", gaurav.kumar@example.com);

Customer customer = razorpayClient.Customers.create(request);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.create(data=data)

```php: PHP
$api = new Api($key_id, $secret);

$customer = $api->customer->create(array('name' => 'Gaurav Kumar', 'email' => 'gaurav.kumar@example.com')); 

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();

options.Add("name", "Gaurav Kumar"); 
options.Add("contact", "9000090000"); 
options.Add("email", "gaurav.kumar@example.com"); 
options.Add("fail_existing", "0"); 

Customer customer = Customer.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customer = Razorpay::Customer.create email: 'gaurav.kumar@example.com', contact: '9000090000'
puts customer.id #cust_6vRXClWqnLhV14

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.create({name, email, contact, notes})

```json: Response
{
  "id" : "cust_EIW4T2etiweBmG",
  "entity": "customer",
  "name" : "Gaurav Kumar",
  "email" : "gaurav.kumar@example.com",
  "contact" : "9000090000",
  "gstin": null,
  "created_at ": 1234567890
}
```

#### Request Parameters

`name` _mandatory_
: `string` The name of the customer.

`email ` _optional_
: `string` The email ID of the customer.

`contact ` _optional_
: `integer` The phone number of the customer.

`notes` _optional_
: `json object` Set of key-value pairs that can be associated with an entity. This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters
(maximum), are supported.

#### Response 

The `id` obtained in the response should be sent as `customer_id` while creating the token.

### Step 2: Create an Order

You should create an order before initiating a payment at your end.

/orders

```cURL: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 200,
  "currency": "INR"
}'
```json: Response
{
  "id": "order_Ee0biRtLOqzRjP",
  "entity": "order",
  "amount": 200,
  "amount_paid": 0,
  "amount_due": 200,
  "currency": "INR",
  "receipt": null,
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1586789358
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. 
For example, for an amount of ₹295, enter `29500`.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. Only `INR` is supported.

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Maximum length of 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Step 3: Create Tokens for a Customer

While making the UPI collect payment, the customer enters the VPA on your UI. To store the VPA as a **token**, pass additional attributes in the create payment request:

```curl: Curl
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d
 '{
  "amount": 100,
  "currency": "INR",
  "contact": 9000090000,
  "email": "gaurav.kumar@example.com",
  "order_id": "order_MvaGI8vuixxomP",
  "method": "upi",
  "customer_id": "cust_KZ6AT8Jx6InXPI",
  "upi": {
    "vpa": "gaurav.kumar@exampleupi"
  },
  "save": true,
  "ip": "105.106.107.108",
  "referer": "https://merchansite.com/example/paybill",
  "user_agent": "Mozilla/5.0"
}'

```php: PHP

$api = new Api($key_id, $secret);

$api->payment->createPaymentRedirect(array('amount' => 100,'currency' => 'INR','email' => 'gaurav.kumar@example.com','contact' => '9000090000','order_id' => 'order_I6LVPRQ6upW3uh','method' => 'upi','vpa' => 'gaurav.kumar@exampleupi','save' => true,'ip' => '105.106.107.108', 'referer' => 'https://merchansite.com/example/paybill','user_agent' => 'Mozilla/5.0'));

```javascript: Node.js

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })instance.payments.createPaymentRedirect({  amount: 100,  currency: "INR",  order_id: "order_EAkbvXiCJlwhHR",  email: "gaurav.kumar@example.com",  contact: 9000090000,  method: "upi",  vpa: "gaurav.kumar@exampleupi", save: true, ip: "105.106.107.108", referer: "https://merchansite.com/example/paybill", user_agent: "Mozilla/5.0"})

```python: Python

import razorpayclient = razorpay.Client(auth=("key", "secret"))resp = client.payment.createPaymentRedirect({  "amount": 100,  "currency": "INR",  "order_id": "order_ItZMEZjpBD6dhT",  "email": "gaurav.kumar@example.com",  "contact": 9000090000,  "method": "upi",  "vpa": "gaurav.kumar@exampleupi", "save": True, "ip": "105.106.107.108", "referer": "https://merchansite.com/example/paybill", "user_agent": "Mozilla/5.0"})print(resp)
```

```java: Failure Response 
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The email must be a valid email address.",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "email"
  }
}

```java: Success Response

    Processing, Please Wait...
    
    
    
    
    
    
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            background: #F5F5F5;
            overflow: hidden;
            text-align: center;
            height: 100%;
            white-space: nowrap;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, ubuntu, verdana, helvetica, sans-serif;
        }
        #bg {
            position: absolute;
            bottom: 50%;
            width: 100%;
            height: 50%;
            background: #198C78;
            margin-bottom: 90px;
        }
        #cntnt {
            position: relative;
            width: 100%;
            vertical-align: middle;
            display: inline-block;
            margin: auto;
            max-width: 420px;
            min-width: 280px;
            height: 95%;
            max-height: 360px;
            background: #fff;
            z-index: 9999;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.16);
            border-radius: 4px;
            overflow: hidden;
            padding: 24px;
            box-sizing: border-box;
            text-align: left;
        }
        #ftr {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 80px;
            background: #F5F5F5;
            text-align: center;
            color: #212121;
            font-size: 14px;
            letter-spacing: -0.3px;
        }
        #ldr {
            width: 100%;
            height: 3px;
            position: relative;
            margin-top: 16px;
            border-radius: 3px;
            overflow: hidden;
        }
        #ldr::before,
        #ldr::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
        #ldr::before {
            top: 1px;
            border-top: 1px solid #BCBCBC;
        }
        #ldr::after {
            background: #198C78;
            width: 0%;
            transition: 20s cubic-bezier(0, 0.1, 0, 1);
        }
        .loaded #ldr::after {
            width: 90%;
        }
        #logo {
            width: 48px;
            height: 48px;
            padding: 8px;
            border: 1px solid #E5E5E5;
            border-radius: 3px;
            text-align: center;
        }
        #hdr {
            min-height: 48px;
            position: relative;
        }
        #logo,
        #name,
        #amt {
            display: inline-block;
            vertical-align: middle;
            letter-spacing: -0.5px;
        }
        #amt {
            position: absolute;
            right: 0;
            top: 0;
            background: #fff;
            color: #212121;
        }
        #name {
            line-height: 48px;
            margin-left: 12px;
            font-size: 16px;
            max-width: 140px;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #212121;
        }
        #logo+#name {
            line-height: 20px;
        }
        #txt {
            height: 200px;
            text-align: center;
        }
        #title {
            font-size: 20px;
            line-height: 24px;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }
        #msg,
        #cncl {
            font-size: 14px;
            line-height: 20px;
            color: #757575;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }
        #cncl {
            text-decoration: underline;
            cursor: pointer;
        }
        #logo img {
            max-width: 100%;
            max-height: 100%;
            vertical-align: middle;
        }
        @media (max-height:580px),
        (max-width:420px) {
            #bg {
                display: none;
            }
            body {
                background: #198C78;
            }
        }
        @media (max-width:420px) {
            #cntnt {
                padding: 16px;
                width: 95%;
            }
            #name {
                margin-left: 8px;
            }
        }
    

    var events = {
    page: 'payment_redirect_postform',
    props: {
          payment_id: 'pay_JLuUedI2qYOOXd',
              merchant_id: '8TgNt9DVrJB0bl',
        },
    load: true,
    unload: true
  }

    !function(e){e.track=Boolean;try{if(/razorpay\.in$/.test(location.origin))return;if("object"!=typeof e.events)return;var n=e.events.props;if(0===Object.keys(n).length)return;var t,o=e.events,r=o.page,a=o.load,s=o.unload,i=o.error,c="https://lumberjack.razorpay.com/v1/track",u="MC40OTMwNzgyMDM3MDgwNjI3Nw9YnGzW",p="function"==typeof navigator.sendBeacon,d=Date.now(),f=[{name:"ua_parser",input_key:"user_agent",output_key:"user_agent_parsed"}];function l(e,o){(o=o||{}).beacon=p,o.time_since_render=Date.now()-d,o.url=location.href,function(e,n){if(e&&n)Object.keys(n).forEach(function(t){e[t]=n[t]})}(o,n);var a={addons:f,events:[{event:r+":"+e,properties:o,timestamp:Date.now()}]},s=encodeURIComponent(btoa(unescape(encodeURIComponent(JSON.stringify(a))))),i=JSON.stringify({key:u,data:s});p?navigator.sendBeacon(c,i):((t=new XMLHttpRequest).open("post",c,!0),t.send(i))}a&&l("load"),s&&e.addEventListener("unload",function(){l("unload")}),i&&e.addEventListener("error",function(e){l("error",{message:e.message,line:e.line,col:e.col,stack:e.error&&e.error.stack})})}catch(e){}e.track=l}(window);

    
    
    
        
            
                RazorPay
            
        
        
        
            
                Loading Bank page&#x2026;
                Please wait while we redirect you to your Bank page

            
            
        
        
            Secured by
                
                
            
        
        
            setTimeout(function() {
      document.body.className = 'loaded';
    }, 10);
    setTimeout(function(){
      document.getElementById('title').innerHTML = 'Still trying to load...';
      document.getElementById('msg').innerHTML = 'The bank page is taking time to load.';
    }, 10000);
        

```

#### Request Parameters

`customer_id`
: `string` Unique identifier of the customer. This can be obtained from the response of [Step 1](#step-1-create-a-customer).

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. 
For example, for an amount of ₹295, enter `29500`.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. Only `INR` is supported.

`order_id` _mandatory_
: `string` Order ID generated via [Razorpay Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` Email address of the customer.

`contact` _mandatory_
: `string` Phone number of the customer.

`method` _mandatory_
: `string` The payment method used to make the payment. Possible value is `upi`.

`upi` _mandatory_
: `object` The UPI type payment method.

 `vpa` _mandatory_
 : `string` UPI ID used for making the payment on the UPI app.

`ip` _mandatory_
: `string` The client's browser IP address. For example, `105.106.107.108`.

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser. For example, `https://merchansite.com/example/paybill`

`user_agent` _mandatory_
: `string` Value of `user_agent` header passed by the client's browser. 
For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**

`save`
: `boolean` Specifies if the VPA should be stored as a token. Possible values are:
  - `true`: Saves the VPA details.
  - `false`(default): Does not save the VPA details.

#### Response

The response contains an HTML page that is rendered in the customer's browser. The customer can now complete the payment by logging in to the respective UPI app.

### Step 4: Fetch all Tokens of the Customer

All the card (if saved earlier) and VPA tokens of a customer can be retrieved.

/customers/:customer_id/tokens

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/customers/cust_EIW4T2etiweBmG/tokens

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->all();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.fetchTokens(customerId)

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.all(customerId)

```Java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_DtHaBuooGHTuyZ";

List customer = instance.customers.fetchTokens(customerId)

```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "token_EeroOjvOvorT5L",
      "entity": "token",
      "token": "4ydxm47GQjrIEx",
      "bank": null,
      "wallet": null,
      "method": "card",
      "card": {
        "entity": "card",
        "name": "Gaurav Kumar",
        "last4": "8430",
        "network": "Visa",
        "type": "credit",
        "issuer": "HDFC",
        "international": false,
        "emi": true,
        "expiry_month": 12,
        "expiry_year": 2022,
        "flows": {
          "otp": true,
          "recurring": true
        }
      },
      "vpa": null,
      "recurring": false,
      "auth_type": null,
      "mrn": null,
      "used_at": 1586976724,
      "created_at": 1586976724,
      "expired_at": 1672511399,
      "dcc_enabled": false
    },
    {
      "id": "token_EeO65VIv8BXZg5",
      "entity": "token",
      "token": "D7Qun28CcPwNVy",
      "bank": null,
      "wallet": null,
      "method": "upi",
      "vpa": {
        "username": "9000090000",
        "handle": "upi",
        "name": null
      },
      "recurring": false,
      "recurring_details": {
        "status": "not_applicable",
        "failure_reason": null
      },
      "auth_type": null,
      "mrn": null,
      "used_at": 1586872080,
      "created_at": 1586872080,
      "start_time": null,
      "dcc_enabled": false
    }
  ]
}
```

#### Response

Pass the token that contains the VPA details of the customer, `token_EeO65VIv8BXZg5` in the above example, to the payment create request.

### Step 5: Create Payments using Tokens

After VPA tokenisation, customers can complete their UPI payments without having to enter their VPAs again for repeat transactions on your site.

You should pass the following attributes in each payment create request, instead of the `vpa` field:

```curl: Curl
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d
 '{
  "amount": 100,
  "currency": "INR",
  "contact": 9000090000,
  "email": "gaurav.kumar@example.com",
  "order_id": "order_I6LVPRQ6upW3uh",
  "method": "upi",
  "customer_id":"cust_KZ6AT8Jx6InXPI",
  "token":"token_EeroOjvOvorT5L"
}'

```php: PHP

$api = new Api($key_id, $secret);

$api->payment->createPaymentRedirect(array('amount' => 100,'currency' => 'INR','email' => 'gaurav.kumar@example.com','contact' => '9000090000','order_id' => 'order_I6LVPRQ6upW3uh','method' => 'upi','customer_id' => 'cust_KZ6AT8Jx6InXPI','token' => 'token_EeroOjvOvorT5L'));

```javascript: Node.js

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })instance.payments.createPaymentRedirect({  amount: 100,  currency: "INR",  order_id: "order_I6LVPRQ6upW3uh",  email: "gaurav.kumar@example.com",  contact: 9000090000,  method: "upi", customer_id: "cust_KZ6AT8Jx6InXPI",  token: "token_EeroOjvOvorT5L"})

```python: Python

import razorpayclient = razorpay.Client(auth=("key", "secret"))resp = client.payment.createPaymentRedirect({  "amount": 100,  "currency": "INR",  "order_id": "order_ItZMEZjpBD6dhT",  "email": "gaurav.kumar@example.com",  "contact": 9000090000,  "method": "upi",  "customer_id": "cust_KZ6AT8Jx6InXPI", "token": "token_EeroOjvOvorT5L"})print(resp)
```

```java: Failure Response 
{
   "error": {
      "code": "BAD_REQUEST_ERROR",
      "description": "The email must be a valid email address.",
      "source": "business",
      "step": "payment_initiation",
      "reason": "input_validation_failed",
      "metadata": {},
      "field": "email"
   }
}

```java: Success Response

    Processing, Please Wait...
    
    
    
    
    
    
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            background: #F5F5F5;
            overflow: hidden;
            text-align: center;
            height: 100%;
            white-space: nowrap;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, ubuntu, verdana, helvetica, sans-serif;
        }
        #bg {
            position: absolute;
            bottom: 50%;
            width: 100%;
            height: 50%;
            background: #198C78;
            margin-bottom: 90px;
        }
        #cntnt {
            position: relative;
            width: 100%;
            vertical-align: middle;
            display: inline-block;
            margin: auto;
            max-width: 420px;
            min-width: 280px;
            height: 95%;
            max-height: 360px;
            background: #fff;
            z-index: 9999;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.16);
            border-radius: 4px;
            overflow: hidden;
            padding: 24px;
            box-sizing: border-box;
            text-align: left;
        }
        #ftr {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 80px;
            background: #F5F5F5;
            text-align: center;
            color: #212121;
            font-size: 14px;
            letter-spacing: -0.3px;
        }
        #ldr {
            width: 100%;
            height: 3px;
            position: relative;
            margin-top: 16px;
            border-radius: 3px;
            overflow: hidden;
        }
        #ldr::before,
        #ldr::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
        #ldr::before {
            top: 1px;
            border-top: 1px solid #BCBCBC;
        }
        #ldr::after {
            background: #198C78;
            width: 0%;
            transition: 20s cubic-bezier(0, 0.1, 0, 1);
        }
        .loaded #ldr::after {
            width: 90%;
        }
        #logo {
            width: 48px;
            height: 48px;
            padding: 8px;
            border: 1px solid #E5E5E5;
            border-radius: 3px;
            text-align: center;
        }
        #hdr {
            min-height: 48px;
            position: relative;
        }
        #logo,
        #name,
        #amt {
            display: inline-block;
            vertical-align: middle;
            letter-spacing: -0.5px;
        }
        #amt {
            position: absolute;
            right: 0;
            top: 0;
            background: #fff;
            color: #212121;
        }
        #name {
            line-height: 48px;
            margin-left: 12px;
            font-size: 16px;
            max-width: 140px;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #212121;
        }
        #logo+#name {
            line-height: 20px;
        }
        #txt {
            height: 200px;
            text-align: center;
        }
        #title {
            font-size: 20px;
            line-height: 24px;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }
        #msg,
        #cncl {
            font-size: 14px;
            line-height: 20px;
            color: #757575;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }
        #cncl {
            text-decoration: underline;
            cursor: pointer;
        }
        #logo img {
            max-width: 100%;
            max-height: 100%;
            vertical-align: middle;
        }
        @media (max-height:580px),
        (max-width:420px) {
            #bg {
                display: none;
            }
            body {
                background: #198C78;
            }
        }
        @media (max-width:420px) {
            #cntnt {
                padding: 16px;
                width: 95%;
            }
            #name {
                margin-left: 8px;
            }
        }
    

    var events = {
    page: 'payment_redirect_postform',
    props: {
          payment_id: 'pay_JLuUedI2qYOOXd',
              merchant_id: '8TgNt9DVrJB0bl',
        },
    load: true,
    unload: true
  }

    !function(e){e.track=Boolean;try{if(/razorpay\.in$/.test(location.origin))return;if("object"!=typeof e.events)return;var n=e.events.props;if(0===Object.keys(n).length)return;var t,o=e.events,r=o.page,a=o.load,s=o.unload,i=o.error,c="https://lumberjack.razorpay.com/v1/track",u="MC40OTMwNzgyMDM3MDgwNjI3Nw9YnGzW",p="function"==typeof navigator.sendBeacon,d=Date.now(),f=[{name:"ua_parser",input_key:"user_agent",output_key:"user_agent_parsed"}];function l(e,o){(o=o||{}).beacon=p,o.time_since_render=Date.now()-d,o.url=location.href,function(e,n){if(e&&n)Object.keys(n).forEach(function(t){e[t]=n[t]})}(o,n);var a={addons:f,events:[{event:r+":"+e,properties:o,timestamp:Date.now()}]},s=encodeURIComponent(btoa(unescape(encodeURIComponent(JSON.stringify(a))))),i=JSON.stringify({key:u,data:s});p?navigator.sendBeacon(c,i):((t=new XMLHttpRequest).open("post",c,!0),t.send(i))}a&&l("load"),s&&e.addEventListener("unload",function(){l("unload")}),i&&e.addEventListener("error",function(e){l("error",{message:e.message,line:e.line,col:e.col,stack:e.error&&e.error.stack})})}catch(e){}e.track=l}(window);

    
    
    
        
            
                RazorPay
            
        
        
        
            
                Loading Bank page&#x2026;
                Please wait while we redirect you to your Bank page

            
            
        
        
            Secured by
                
                
            
        
        
            setTimeout(function() {
      document.body.className = 'loaded';
    }, 10);
    setTimeout(function(){
      document.getElementById('title').innerHTML = 'Still trying to load...';
      document.getElementById('msg').innerHTML = 'The bank page is taking time to load.';
    }, 10000);
        

```

#### Request Parameters

`customer_id`
: `string` Unique identifier of the customer.

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. 
For example, for an amount of ₹295, enter `29500`.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. Only `INR` is supported.

`order_id` _mandatory_
: `string` Order ID generated via [Razorpay Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` Email address of the customer.

`contact` _mandatory_
: `string`  Phone number of the customer.

`method`
: `string` The payment method used to make the payment. Possible value is `upi`.

`token`
: `string` Token of the saved VPA, obtained in the [previous step](#step-4-fetch-all-tokens-of-the-customer).

#### Response

The response contains an HTML page that is rendered in the customer's browser. The customer can now complete the payment by logging in to the respective UPI app.

### Next Steps

You can check the status of the payments using any of the following methods:

-  Poll the Razorpay servers to [fetch a payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md) or [fetch the payments made for an order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-payments-based-on-orders).

- Subscribe to [payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md) and [orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/orders.md) Webhook events that are generated in Razorpay when the customer completes the payment on your website.
