---
title: S2S UPI Intent Flow
description: Enable payments on your apps using the UPI Intent flow applicable in server-to-server integration.
---

# S2S UPI Intent Flow

You can collect payments using the UPI intent flow that will be handled by UPI apps installed on your customers' mobile devices.

Customers need not enter VPA or phone numbers as these details are prefilled and submitted along with the other payment details. While making the payment, customers select the UPI PSP app on your UI. The app is launched automatically on their mobile devices where the payment is completed.

### Best Practices

If you have a significant amount of payment traffic coming from the Mobile Site, then it is advisable to use the Google Pay Intent flow available for the mSite:

1. **Do not change Intent URL** 

  Do not make changes to the intent URL shared by Razorpay as part of the API response. Making changes to the intent URL can lead to payment failure.

2. **Host UPI apps** 

  It is recommended to host the UPI apps on your page/app instead of just hosting the Intent URI where the apps are shown by the native Android drawer. This improves conversion.
3. **Rank UPI Apps by Success Rate** 

  Show the UPI PSP apps in the order of their success rate.
4. **Mobile site**  

  If you have higher traffic via mobile site, then make sure you provide the option of UPI intent payment to your users using our [m-site integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay/custom-integration.md). This will help you achieve better success rates.
5. **Gpay SDK** 

  If your UPI transaction volumes are high, you can also explore integrating [Gpay SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay.md#android-integration-using-google-pay-sdk). This provides a better user experience and about a 3-5% improvement in success rate.

## Prerequisites

- Reach out to our [Support Team](https://razorpay.com/support/#raise-a-request) to get this feature enabled for your account.
- Keep the API keys (`Key_Id` and `Key_Secret`) handy for integration. 
- [Generate API Keys from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) if you have not done already.

## Integration Steps

1. [Create an order](#step-1-create-an-order).
2. [Initiate Payment using the intent URL](#step-2-initiate-a-payment).
3. [Verify the payment status](#step-3-verify-the-payment-status).

### Step 1: Create an Order

You should create an order before initiating a payment at your end.

/orders

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
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
: `integer` The amount for which the Order was created, in currency subunits. For example, for an amount of ₹295, enter `29500`.

`currency` _mandatory_
: `string` ISO code of the currency associated with the payment amount. Only `INR` is supported.

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Maximum length of 40 characters supported.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Step 2: Initiate a Payment

After creating an order, initiate a payment with `intent` flow.

/payments/create/upi

```curl: Request
  curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
  -X POST https://api.razorpay.com/v1/payments/create/upi \
  -H "Content-Type: application/json" \
  -d '{
    "amount": 100,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9090909090",
    "method": "upi",
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
      "purpose": "UPI test payment"
    },
    "upi": {
		  "flow" : "intent"
	  }
  }'
``` json: Response
{
    "razorpay_payment_id": "pay_CMeM6XvOPGFiF",
    "link": "upi://pay?pa=success@razorpay&pn=xyz&tr=xxxxxxxxxxx&tn=gourav&am=1&cu=INR&mc=xyzw"
}
```

> **WARN**
>
> 
> **Do not make changes to the link**
> 
> Do not make changes to the link you receive in the response. This is the Razorpay Intent URL. Making changes to this URL can lead to payment failure or other unexpected errors with the payment.
> 

#### Request Parameters

The parameters needed for constructing the API request are described below:

`amount` _mandatory_
: `integer` The amount associated with the payment in smallest unit of the supported currency. For example, `2000` means ₹20.

`currency` _mandatory_
: `string` ISO code of the currency associated with the payment amount. In this case, it is `INR`.

`order_id` _mandatory_
: `string` Unique identifier of the order, obtained from the response of the previous step.

`contact` _mandatory_
: `string` Phone number of the customer.

`email` _mandatory_
: `string` Email address of the customer.

`ip` _optional_
: `string` Client's browser IP address. For example, `117.217.74.98`.

`referer` _optional_
: `string` Value of the`referer` header passed by the client's browser. For example, `https://example.com/`.

`user_agent` _optional_
: `string` Value of the `user_agent` header passed by client's browser. For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**.

`description` _optional_
: `string` Descriptive text of the payment.

`notes` _optional_
: `json object` A key-value pair that can hold additional information about the payment. 
 Refer the [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) section of the API Reference Guide.

`upi` _mandatory_
: `object` Details of the UPI payment.

  `flow`
  : `string` Type of the UPI method. In this case, it is `intent`.

You will get the UPI Intent URI as part of the payment response.

To pass the payment data to the respective UPI app and to initiate the payment, implement the code given below:

```js: Pass data to UPI app
Intent i = new Intent(Intent.ACTION_VIEW);
        i.setData(Uri.parse(url)); //uri from the create S2S payment response
        i.setPackage(packageName); //package name from the `upi://pay` intent response

activity.startActivityForResult(i,2561); //unique activity code to get the callback
```

> **INFO**
>
> 
> **Handy Tips**
> 
> For the package name, you can check the [list of supported UPI apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/supported-apps.md).
> 

### Step 3: Verify the Payment Status

You can verify the status of the payments using any of the following methods:

- Poll Razorpay servers periodically for the payments made for the order using our [Fetch Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-payments.md).

- [Subscribe to the Webhook events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) created in our system for each of the following entities:

  - [payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md)
  - [orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/orders.md)

#### Payment failure and re-initiating payment

If the Order is not marked `paid` within 2-3 minutes, then you can re-initiate payment for the same.

### Related Information

[Error reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md#list-of-error-reasons-for-payments)
