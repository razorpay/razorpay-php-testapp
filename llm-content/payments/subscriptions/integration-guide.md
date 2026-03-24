---
title: Integrate With Subscriptions
description: Step-by-step guide on how to integrate Razorpay Subscriptions.
---

# Integrate With Subscriptions

Check the prerequisites and steps to integrate Razorpay Subscriptions:

## Prerequisites

- Create a Razorpay account.
- Log in to the Dashboard and [generate the API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md). You need to use these keys while using our APIs and Checkout.

## Integration Steps

Follow these steps to integrate Razorpay Subscriptions:

  - **1. Build Integration**: Create Plan, Subscription and integrate with Standard Checkout.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

### 1. Build Integration

Follow these steps to create plans, subscriptions and accept payments from customers.

	
### Step 1.1 Create a Plan

		 A Plan is a foundation on which a Subscription is built. It acts as a reusable template and contains details of the goods or services offered with the amount to be charged and the frequency at which the customer should be charged (billing cycle). Depending on your business, you can create multiple Plans with different billing cycles and pricing.

		 - Create a Plan before creating a Subscription using your checkout.
		 - Create Plans from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-plans/#create-a-plan.md) or using [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/create-plan.md).
		

	
### Step 1.2 Create a Subscription

		 A Subscription contains details like the Plan, the start date, total number of billing cycles, free [trial period](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create/#trial-period.md) (if any) and [upfront amount](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create/#upfront-amount.md) to be collected.

         Subscriptions can be created from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create-subscription-links/#create-a-subscription-link-from-dashboard.md) or using [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions/create-subscription.md).
		

	
### Step 1.3 Integrate With Standard Checkout

		 After you create a Subscription, you need the customer's permission to charge their card at periodic intervals. For this, the customer has to complete an authentication/authorisation transaction.

		 #### Authentication Transaction

		 You can collect the authorisation transaction by passing the subscription_id along with the other options to the Razorpay Standard Checkout.

		 Once the authorisation transaction is successful, Razorpay returns the `razorpay_payment_id`, `razorpay_subscription_id` and the `razorpay_signature`.

			
				
					Code to Add Pay Button
					
					
							Use the sample code to initiate Razorpay Standard Checkout. Check the [list of checkout parameters](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps/#123-checkout-options.md).
					
					```js: Checkout with Callback URL
					Pay
							
							
								var options = {
									"key": "key_id",
									"subscription_id": "sub_00000000000001",
									"name": "Acme Corp.",
									"description": "Monthly Test Plan",
									"image": "/your_logo.jpg",
									"callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
									"prefill": {
										"name": "",
										"email": "",
										"contact": ""
									},
									"notes": {
										"note_key_1": "Tea. Earl Grey. Hot",
										"note_key_2": "Make it so."
									},
									"theme": {
										"color": "#F37254"
									}
								};
								var rzp1 = new Razorpay(options);
								document.getElementById('rzp-button1').onclick = function(e) {
									rzp1.open();
									e.preventDefault();
								}
										
					```js: Checkout with Handler function
					Pay
							
							
								var options = {
									"key": "key_id",
									"subscription_id": "sub_00000000000001",
									"name": "Acme Corp.",
									"description": "Monthly Test Plan",
									"image": "/your_logo.jpg",
									"handler": function(response) {
										alert(response.razorpay_payment_id),
										alert(response.razorpay_subscription_id),
										alert(response.razorpay_signature);
									},
									"prefill": {
										"name": "",
										"email": "",
										"contact": ""
									},
									"notes": {
										"note_key_1": "Tea. Earl Grey. Hot",
										"note_key_2": "Make it so."
									},
									"theme": {
										"color": "#F37254"
									}
								};
							var rzp1 = new Razorpay(options);
							document.getElementById('rzp-button1').onclick = function(e) {
								rzp1.open();
								e.preventDefault();
							}
								
							```json: Failure response
							{
							"code": "BAD_REQUEST_ERROR",
							"description": "Payment failed. Please contact the site admin",
							"source": "business",
							"step": "payment_initiation",
							"reason": "amount_less_than_minimum_amount",
							"metadata":{
									},
							"field": "amount"
								}
							```
					

				
### Failure Reasons and Next Steps

						
					   
							
							Error | Cause | Solution
							---
							Customer payment is not allowed for the Subscription at this stage.	| This error occurs when you are trying to make a payment for the next billing cycle during the current cycle.	| Users cannot pay for the next billing cycle during the current cycle.
							---
							Payment failed. Please contact the site admin. | This error occurs when the amount of a plan exceeds the pricing plan configured to the business account for UPI. | Ensure the minimum amount is greater than or equal to the configured pricing plan for the respective payment method, such as UPI recurring.
							---
							`end_time` must be between `946684800` and `4765046400`. |	This error occurs when the end date of the Subscription is beyond the acceptable limits or if the current start and end are null.	| Currently, you can only charge a Subscription for up to 10 years.
							---
							Oops! Something went wrong. Please contact the merchant for further assistance. | - This error occurs when Flash Checkout is not enabled on the Dashboard.
- This error also occurs if the `subscription_id` is in the cancelled/expired state.
 | - Ensure that flash checkout is enabled on the Dashboard by navigating to Dashboard → Account & Settings → [Flash Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/checkout-features/#flash-checkout.md).
- Ensure that the Subscription is in the authenticated or active state.

							
							
							

													
							
					

					
### Payment Verification

							This is a mandatory step that allows you to confirm the authenticity of the card details returned to the Checkout form for successful payments.

							To verify the `razorpay_signature` returned to you by the Checkout form:

								1. Create a signature in your server using the following attributes:
										
										Parameter | Description
										---
										`subscription_id` | Retrieve the subscription_id from your server. Do not use the razorpay_subscription_id returned by Checkout.
										---
										`razorpay_payment_id` | Returned by Checkout.
										---
										`key_secret` | Available in your server. The key_secret that was generated from the Dashboard.
										
								2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `subscription_id` to construct an HMAC hex digest as shown below:

										```html: Code
										generated_signature = hmac_sha256(razorpay_payment_id + "|" + subscription_id, secret);

										if (generated_signature == razorpay_signature) {
										payment is successful
										}
										```
								3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
							

			
		
	

### 2. Test Integration

You can test the integration by making a test payment using our cards:

Type | Card Network	| Card Type	| Card Number | CVV	| Expiry Date
---
Domestic | Mastercard | Debit Card | 5104 0600 0000 0008 | Random CVV | Any future date.
---
Domestic | Visa	| Credit Card | 4718 6091 0820 4366	| Random CVV | Any future date.
---
International | Mastercard	| Credit Card | 5104 0155 5555 5558	| Random CVV | Any future date.

### 3. Follow Go-live Checklist

Consider the following steps before taking your integration live.

	
### Switch Test API Keys With Live API Keys

		 After confirming if your integration is working successfully, you can take the integration live by switching the Test Mode API Keys with the Live Mode Keys.

		 
		 Watch this video to know how to generate Live API keys:

		 
[Video: https://www.youtube.com/embed/30REpNtYSak?si=j9Lm_y-D4bwTspv6]

		 
		

	
### Subscribe to Webhooks

	 [Set up Razorpay Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md) to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Subscribe to these [Subscriptions webhook events](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/subscribe-to-webhooks/#webhook-events-and-descriptions.md).
	

## Best Practices

Follow the best practices for a smooth Subscriptions integration.
- [Verify Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/integration-guide/#payment-verification.md): Verify the received payments to confirm the authenticity of the mandate details returned to the Checkout form for successful payments.
- [Implement Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/integration-guide/#subscribe-to-webhooks.md): Implement Razorpay Webhooks to receive notifications on various events of Subscriptions.

### Related Information

- [Subscriptions API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/subscriptions.md)
- [Razorpay Standard Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md)
