---
title: 1. Build Integration
description: Steps to integrate your Web application with the Razorpay S2S Redirect API.
---

# 1. Build Integration

You can integrate with Razorpay APIs to start accepting payments made using netbanking, card, UPI and other payment methods. In this document, the netbanking payment method has been shown as an example.

Follow these steps to integrate your Web application with the Razorpay S2S Redirect API:

**1.1** [Create an Order](#11-create-an-order). 

**1.2** [Create a Payment](#12-create-a-payment). 

**1.3** [Handle Payment Success and Failure](#13-handle-payment-success-and-failure). 

**1.4** [Verify Payment Signature](#14-verify-payment-signature). 

**1.5** [Verify Payment Status](#15-verify-payment-status).

> **WARN**
>
> 
> **Watch Out!**
> 
> Do not hardcode the URL returned in the API responses.
> 

## 1.1 Create an Order

@include integration-steps/order-creation

## 1.2 Create a Payment

Create a payment using the API given below after your order is created.

/payments/create/redirect

#### Sample Code

The following is a sample API request and response for creating a payment:

```curl: Curl
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d
 '{
  "amount": 100,
  "currency": "INR",
  "contact": "8888888888",
  "email": "gaurav@gmail.com",
  "order_id": "order_4xbQrmEoA5WJ0G",
  "method": "netbanking",
  "bank": "HDFC",
  "ip": "105.106.107.108",
  "referer": "https://merchansite.com/example/paybill",
  "user_agent": "Mozilla/5.0"
}'

```php: PHP

$api = new Api($key_id, $secret);

$api->payment->createPaymentRedirect(array('amount' => 100,'currency' => 'INR','email' => 'gaurav.kumar@example.com','contact' => '9000090000','order_id' => 'order_I6LVPRQ6upW3uh','ip' => '105.106.107.108','method' => 'netbanking','bank' => 'HDFC')));

```javascript: Node.js

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })instance.payments.createPaymentRedirect({  amount: 100,  currency: "INR",  order_id: "order_EAkbvXiCJlwhHR", ip: "105.106.107.108",  email: "gaurav.kumar@example.com",  contact: 9090909090,  method: "netbanking",  bank: "HDFC"})

```python: Python

import razorpayclient = razorpay.Client(auth=("key", "secret"))resp = client.payment.createPaymentRedirect({  "amount": 100,  "currency": "INR",  "order_id": "order_ItZMEZjpBD6dhT", "ip": "105.106.107.108",  "email": "gaurav.kumar@example.com",  "contact": 9090909090,  "method": "netbanking",  "bank": "HDFC"})print(resp)
```

```java: Success Response

	Processing, Please Wait...
	
	
	
	
	
	
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		body {
			background: #f5f5f5;
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
			background: #f5f5f5;
			text-align: center;
			color: #212121;
			font-size: 14px;
			letter-spacing: -0.3px;
		}

		#ftr_new {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 0 24px;
			position: absolute;
			left: 0;
			right: 0;
			bottom: 0;
			height: 80px;
			background: #f5f5f5;
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
			border-top: 1px solid #bcbcbc;
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
			border: 1px solid #e5e5e5;
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

		@media (max-height:580px),
		(max-width:420px) {
			#ftr_new {
				padding: 0 16px;
			}
		}
	

	var events = {
    page: 'payment_redirect_postform',
    props: {
          payment_id: 'pay_KFMEsPhiP7Ipou',
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
				![](https://cdn.razorpay.com/logo.svg)
				
			
		
		
			setTimeout(function() {
      document.body.className = 'loaded';
    }, 10);

    setTimeout(function(){
      document.getElementById('title').innerHTML = 'Still trying to load...';
      document.getElementById('msg').innerHTML = 'The bank page is taking time to load.';
    }, 10000);
		

```json: Failure Response 
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Invalid payment method given: banks",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {}
  }
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. 
 For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`. Refer to the [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies) for a list of supported international currencies.

`order_id` _mandatory_
: `string` Unique identifier of the Order created at your server side.
 Enter the `id` returned in the response of the [previous](#11-create-an-order) step.

`email` _mandatory_
: `string` Email address of the customer.

`contact` _mandatory_
: `string` Contact of the customer.

`method` _mandatory_
: `string` Supported payment methods are:

- `card`
- `netbanking`
- `wallet`
- `emi`
- `upi`
- `emandate`

`vpa` _mandatory_
: `string` Virtual payment address of the customer. Required if the method is `upi`.

	
> **WARN**
>
> 
> 	**Deprecation Notice**
> 
> 	UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [ migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md) to switch to UPI Intent.
> 	

`card`
: The fields that can be pre-populated in the Checkout form.

    `number` _mandatory_
    : `string` Unformatted card number. Required if the method is `card`.

    `name` _mandatory_
    : `string` Name of the cardholder. Required if the method is `card`.

    `expiry_month` _mandatory_
    : `integer` Expiry month for the card in `MM` format. Required if the method is `card`.

    `expiry_year` _mandatory_
    : `string` Expiry year for the card in `YY` format. Required if the method is `card`. 

    `cvv` _mandatory_
    : `string` CVV printed on the back of the card. Required if the method is `card`.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>         - CVV is not required by default for tokenised cards across all networks.
>         - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>         - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>         - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>         - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.       
>     

`bank_account`
: The details of the bank account that should be passed in the request.

    `account_number` _mandatory_
    : `string` Bank account number used to initiate the payment. Required if the method is `emandate`.

    `ifsc` _mandatory_
    : `string` IFSC of the bank used to initiate the payment. Required if the method is `emandate`.

    `name` _mandatory_
    : `string` Name associated with the bank account used to initiate the payment. Required if the method is `emandate`.

`bank` _mandatory_
: `string` Bank code of the bank used for the payment. Required if the method is `fpx`.

`wallet` _mandatory_
: `string` Wallet code for the wallet used for the payment. Required if the method is `wallet`.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`ip` _mandatory_
: `string`  IP Address of the client's browser.

`referrer` _mandatory_
: `string` Referrer header passed by the client's browser.

`user_agent` _mandatory_
: `string` Value of **user_agent** header passed by the client's browser.

#### Response Parameters 

Descriptions for the response parameters are present in the [Payments Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#payments-entity) parameters table.

#### Response Types

`2OO OK`
: The response contains `200 OK` code along with the HTML content that needs to be opened in the customer's browser. This HTML content contains form fields that will be automatically posted to the bank or wallet URL (specified in the form) to continue with the payment process.

`400 Bad Request`
: This can happen when erroneous parameters are passed in the request, for example invalid currency.

    ```
    {
    "error_code": "BAD_REQUEST_ERROR",
    "error_description": "Payment failed",
    "error_source": "gateway",
    "error_step": "payment_authorization",
    "error_reason": "payment_failed",
    }
    ```

Know more about [errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md).

The HTML form returned in the response should be opened in the customer's browser. The customer completes the payment on the displayed page.

## 1.3 Handle Payment Success and Failure

Once the payment is completed by the customer, a `POST` request is sent to the `callback_url` provided in the [create a payment request](#12-create-a-payment). The data contained in the `POST` request depends on the **success** or **failure** of the payment made by the customer.

#### Success

A successful payment contains the following fields:

1. `razorpay_payment_id`
2. `razorpay_order_id`
3. `razorpay_signature`

```json:  Success - Callback

{   "razorpay_payment_id": "pay_29QQoUBi66xm2f",
    "razorpay_order_id": "order_9A33XWu170gUtm",
    "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```
#### Failure

In failed payments, the response received at the callback contains the error details as shown below:

```
error%5Bcode%5D=BAD_REQUEST_ERROR&error%5Bdescription%5D=Payment+failed&error%5Bsource%5D=gateway&error%5Bstep%5D=payment_authorization&error%5Breason%5D=payment_failed&error%5Bmetadata%5D=%7B%22payment_id%22%3A%22pay_HDP0E0MdoAaOYu%22%2C%22order_id%22%3A%22order_HDOSKuUVbejk0C%22%7D
```

The key-value parameters of the request are shown below:

`error_code`
: `string` Error that occurred during payment. For example, `BAD_REQUEST_ERROR`.

`error_description`
: `string` Description of the error that occurred during payment. For example, `Payment failed`.

`error_source`
: `string` The point of failure. For example, `gateway`.

`error_step`
: `string` The stage where the transaction failure occurred. The stages can vary depending on the payment method used to complete the transaction. For example, `payment_auhtorization`.

`error_reason`
: `string` The exact error reason. For example, `payment_failed`.

`metadata`
: `object` Contains additional information about the request.

    `payment_id`
    : `string` Unique identifier of the payment.

    `order_id`
    : `string` Unique identifier of the order associated with the payment.

Know more about [errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md).

## 1.4 Verify Payment Signature

@include integration-steps/verify-signature

## 1.5 Verify Payment Status

@include integration-steps/verify-payment-status

## Integrate Payments Rainy Day Kit

@include rainy-day/section

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/test-integration.md)
