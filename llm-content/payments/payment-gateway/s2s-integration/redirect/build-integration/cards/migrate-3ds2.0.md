---
title: 3DS2 Migration Guide for Existing S2S Cards Integration
description: Integration changes needed to accept card payments with the 3DS2 protocol.
---

# 3DS2 Migration Guide for Existing S2S Cards Integration

If you integrated with our S2S APIs before October 15, 2022, you must make the following changes to your integration to accept card payments with 3DS2 authentication protocol.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You must have a PCI compliance certificate to get this feature enabled on your account.
> 

## 3DS2 Authentication

3DS2 is an authentication protocol, the successor of 3DS1, that enables businesses and payment providers to send additional information (such as customer device or browser data) to verify the transaction's authenticity. Razorpay integration is compliant with the 3DS2 protocol. 

**Know more**: Razorpay supports [3DS2 transactions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/cards/3ds2.0.md).

The customer's bank evaluates the transaction for risk and decides on the payment flow.

- **Frictionless Flow**: This flow is activated if the bank determines that the transaction is from a trusted device and allows the payment to go through without any additional authentication from the customer. Currently, this would not be applicable in India for domestic payments as RBI mandates OTP-based authentication. For international payments, this flow is viable.

- **Challenge Flow**: This flow is activated if the bank determines that the transaction is not from a trusted device and needs additional information. The customer needs to perform additional authentication steps.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Integration does not differ for the challenge flow or the frictionless flow.
> - Frictionless flow is not applicable for payments on cards issued in India.
> 

Given below is a diagram that explains the 3DS2 flow:

![Cards 3DS2 Protocol](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cards-3ds-flowchart.jpg.md)

## Quick Summary of Integration Changes

Ensure you make the following changes in your [Create a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/build-integration/cards.md#12-create-a-payment) request. There is no change in the response.

Parameter Changes | Description
---
New Parameters | Pass these new parameters: - `authentication` and related child parameter: These determine the [authentication channel](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/build-integration/cards/migrate-3ds2.0.md#:~:text=Details%20of%20the-,authentication%20channel,-.) being used.
- `browser` and related child parameters:  These capture the customer's [browser details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/build-integration/cards/migrate-3ds2.0.md#:~:text=regarding%20the%20customer%27s-,browser,-.%20This%20parameter%20need), which are sent to the banks to aid their risk analysis.

---
Existing Parameter | The `ip` parameter is now mandatory.

### Sample Code 

The following endpoint creates a payment via the redirect flow.

/payments/create/redirect

```curl: Request
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
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
    	   "expiry_year": 23,
    	   "cvv": 100
      },
      "authentication":{
    	   "authentication_channel": "browser"
      },
      ### 3DS2.0 Browser Parameters###
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
```html: Response

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
          payment_id: 'pay_LMHFoJ8HSiFTe9',
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
  "error_code": "BAD_REQUEST_ERROR",
  "error_description": "Payment failed",
  "error_source": "gateway",
  "error_step": "payment_authorization",
  "error_reason": "payment_failed"
}
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - The payment request and response would remain the same for both the frictionless and challenge flows.
> - The payment request would remain the same for both redirection and native OTP flows.
> 

#### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, INR. Refer to the list of supported currencies. The length must be 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order generated in the first step.

`email` _mandatory_
: `string` Email address of the customer. The maximum length supported is 40 characters.

`contact` _mandatory_
: `string` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

`method` _mandatory_
: `string` Name of the payment method. Possible value is `card`.

`card` _mandatory_
: `object` Details associated with the card.

    `number`
    : `string` Unformatted card number.

    `name`
    : `string` Name of the cardholder.

    `expiry_month`
    : `string` Expiry month for the card in MM format.

    `expiry_year`
    : `string` Expiry year for the card in YY format.

    `cvv`
    : `string` CVV printed on the back of the card.
    
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

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

`user-agent` _mandatory_
: `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.

`ip` _mandatory_
: `string` The customer's IP address.

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
    : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from the payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

#### Response Parameters

Descriptions for the response parameters are present in the [Payments Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#payments-entity) parameters table.

#### Response Types

`2OO OK`
:The response contains `200 OK` code along with the HTML content that needs to be opened in the customer's browser. This HTML content contains form fields which will be automatically posted to the bank or wallet URL (specified in the form) to continue with the payment process.

`400 Bad Request`
: This can happen when erroneous parameters are passed in the request, for example, invalid currency or wrong card number.

Know more about [errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md).

The HTML form returned in the response should be opened in the customer's browser. The customer completes the payment on the displayed page.

## Next Step

The rest of the integration steps mentioned in the [S2S Redirect Cards Build Integration document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/build-integration/cards.md) remain the same. No changes are required in those.

After completing the build integration steps, you can continue with [Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/test-integration.md)
