---
title: Pay with Reward Points on S2S Integration (JSON)
description: Know how your customers can redeem reward points on your website or app using S2S Integration.
---

# Pay with Reward Points on S2S Integration (JSON)

You can enable your customers to pay using a combination of reward points and a payment method such as cards, netbanking, wallets or UPI, on your S2S integration.

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
- Follow the [Razorpay S2S Integration documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration.md).
- Customers should have earned reward points. In the absence of reward points, customers will get an error and will not be able to proceed with `Pay with Reward Points`.

## Integration Steps

Given below are the integration steps:

1. [Fetch payment methods using the Methods API](#step-1-fetch-payment-methods-using-methods-api).
2. [Create an order using the Orders API](#step-2-create-an-order-using-orders-api).
3. [Create a payment using the S2S JSON Payments API](#step-3-create-a-payment-using-s2s-json).
4. [Handle payment success and failure](#step-4-handle-payment-success-and-failure).
5. [Fetch payment status](#step-5-fetch-payment-status).

### Step 1: Fetch Payment Methods using Methods API

To fetch a list of payment methods enabled for your account, send the following request:

/methods

```curl: Request
curl -u [YOUR_KEY_ID] \
- X GET https://api.razorpay.com/v1/methods \
```json: Response
{
  "entity": "methods",
  ...
  "apps": {
    "twid": true,
    "cred": true
  },
  ...
}
```

### Step 2: Create an order using Orders API

Create an order using the Orders API. Send the order request parameters to the following endpoint:

@include integration-steps/order-creation

### Step 3: Create a Payment using S2S JSON Payments API

Use the following API to create a payment with `app` as the payment method:

/payments/create/json

```curl: curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": "100",
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "order_id": "order_EKwxwAgItmmXdp",
  "method": "app",
  "provider": "twid"
}'
```json: Response
{
  "razorpay_payment_id": "pay_FVptEVkDdNzFx8",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/FVptEs3cSWX1fs/authorize"
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

`method` _mandatory_
: `string` Name of the payment method. Enter the value `app`.

`provider` _mandatory_
: `string`  Name of the service provider partnered with Razorpay. Enter the value `twid`.

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

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. Possible value:
        - `redirect`: Use this URL to redirect customers to the Twid page. Customers should select the reward points here and complete the redemption process/
    
    `url`
    : `string`  URL to be used for the action indicated. 

### Step 4: Handle Payment Success and Failure

Once the customer completes the payment, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_FVptEVkDdNzFx8",
  "razorpay_order_id": "order_EKwxwAgItmmXdp",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

#### Failure Callback

If the payment has failed, the callback will contain details of the error. Know more about [errors](@/Applications/MAMP/htdocs/new-docs/llm-content/errors.md).

### Step 5: Fetch Payment Status

Upon payment completion, you can fetch the status of the payment using:
- [Fetch Payments API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-multiple-payments.md)
- [Payments Webhooks (Recommended)](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments/#payments.md)

### Related Information

- [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/apps/reward-points/faqs.md)
