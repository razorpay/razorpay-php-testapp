---
title: 1. Build Integration
description: Steps to integrate S2S Redirect API and accept payments using cards.
---

# 1. Build Integration

You can integrate with Razorpay APIs to start accepting payments made using cards. Razorpay APIs support the latest 3DS2 authentication protocol.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> If you are an existing Razorpay user, that is, you integrated with our S2S APIs before October 15, 2022, you need to make certain integration changes to 
> [migrate to the 3DS2 flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/build-integration/cards/migrate-3ds2.0.md).
> 

> **WARN**
>
> 
> 
> Watch Out!
> 
> You must have a PCI compliance certificate to get this feature enabled on your account.
> 

## 3DS2 Authentication
3DS2 is an authentication protocol, the successor of 3DS1, that enables businesses and payment providers to send additional information (such as customer device or browser data) to verify the transaction's authenticity. Razorpay integration is compliant with the 3DS2 protocol.

**Know more:** Razorpay supports [3DS2 transactions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/cards/3ds2.0.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> - Integration does not differ for the challenge or frictionless flow.
> - Frictionless flow is not applicable for payments on cards issued in India.
> 

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
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 23,
    "cvv": 100
  },
  "authentication":{
    "authentication_channel": "browser"
	},
  "browser":{
    "java_enabled": false,
    "javascript_enabled": false,
    "timezone_offset": 11,
    "color_depth": 23,
    "screen_width": 23,
    "screen_height": 100
  },
  "ip": "105.106.107.108",
  "referer": "https://merchansite.com/example/paybill",
  "user_agent": "Mozilla/5.0"
}'

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
    "description": "Invalid payment method given: cards",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {}
  }
}
```

#### Request Parameters

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
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`. Refer to the [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md) for a list of supported international currencies.

    
> **INFO**
>
> 
> 
>     **Handy Tips**
> 
>     Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>     

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
> 	UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [ migration documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md) to switch to UPI Intent.
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
>      - CVV is not required by default for tokenised cards across all networks.
>      - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>      - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>      - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>      - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.          
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
: `string` Bank code of the bank used for the payment. Required if the method is `netbanking` or `emandate`.

`wallet` _mandatory_
: `string` Wallet code for the wallet used for the payment. Required if the method is `wallet`.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [notes](@/Applications/MAMP/htdocs/new-docs/llm-content/api/understand#notes.md) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`ip` _mandatory_
: `string`  IP Address of the client's browser.

`authentication` _optional_
: `object` Details of the authentication channel.

    `authentication_channel`
    : `string` The authentication channel for the payment. Possible values:
      - `browser` (default)
      - `app`

`browser` _mandatory_
: `object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

    `java_enabled`
    : `boolean` Indicates whether the customer's browser supports Java. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser supports Java.
        - `false`: Customer's browser does not support Java.

    `javascript_enabled`
    : `boolean` Indicates whether the customer's browser can execute JavaScript. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser can execute JavaScript.
        - `false`: Customer's browser cannot execute JavaScript.

    `timezone_offset`
    : `integer` Time difference between UTC time and the cardholder browser local time. Obtained from the `getTimezoneOffset()` method applied to `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

`referrer` _mandatory_
: `string` Referrer header passed by the client's browser.

`user_agent` _mandatory_
: `string` Value of **user_agent** header passed by the client's browser.

#### Response Parameters 

Descriptions for the response parameters are present in the [Payments Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments#payments-entity.md) parameters table.

#### Response Types

`2OO OK`
:The response contains `200 OK` code along with the HTML content that needs to be opened in the customer's browser. This HTML content contains form fields which will be automatically posted to the bank or wallet URL (specified in the form) to continue with the payment process.

`400 Bad Request`
: This can happen when erroneous parameters are passed in the request, for example, invalid currency or wrong card number.

```
{
  "error_code": "BAD_REQUEST_ERROR",
  "error_description": "Payment failed",
  "error_source": "gateway",
  "error_step": "payment_authorization",
  "error_reason": "payment_failed"
}
```

Know more about [errors](@/Applications/MAMP/htdocs/new-docs/llm-content/errors.md).

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

The key-value parameters are shown below:

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

Know more about [errors](@/Applications/MAMP/htdocs/new-docs/llm-content/errors.md).

## 1.4 Verify Payment Signature

@include integration-steps/verify-signature

## 1.5 Verify Payment Status

@include integration-steps/verify-payment-status

## Integrate Payments Rainy Day Kit

@include rainy-day/section

#### Test Cards

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

#### Error Scenarios

Use these test cards to simulate payment errors. See the [complete list](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/test-card-details/#error-scenario-test-cards.md) of error test cards with detailed scenarios.
Check the following lists: 
- [Supported Card Networks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards.md).
- [Cards Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/payments/cards.md).

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/test-integration.md)
