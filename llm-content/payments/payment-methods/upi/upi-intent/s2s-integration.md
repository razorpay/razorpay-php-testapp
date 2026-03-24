---
title: UPI Intent on iOS - S2S
description: Integrate with Razorpay APIs to support UPI Intent flow on your app.
---

# UPI Intent on iOS - S2S

You can collect payments using the UPI intent flow that is handled by UPI apps installed on your customers' mobile devices. We support UPI Intent on iOS for these PSP apps:
- Google Pay
- PhonePe
- Paytm

## Prerequisites

- Sign up for a Razorpay account.
- [Generate API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from the Dashboard.

## Workflow

To enable UPI Intent on your customer's iOS device:

1. [Create an Order](#step-1-create-an-order).
2. [Update your iOS app's `info.plist` file](#step-2-update-your-apps-infoplist-file).
3. [Check availability of PSP app on customer's device](#step-3-check-availability-of-psp-app-on).
4. [Initiate Payment using the intent URL](#step-4-initiate-the-payment).
5. [Deep link the URL by prefixing App Name](#step-5-deep-link-the-url-by-prefixing).
6. [Verify Payment Status](#step-6-verify-payment-status).

### Step 1: Create an Order

@include integration-steps/order-creation

### Step 2: Update your app's info.plist file

Your iOS app must seek permission from the device to open the UPI PSP app that the customer selects on Checkout. For this, you must make the following changes in your iOS app's info.plist file.

```xml: info.plist
LSApplicationQueriesSchemes

    tez
    phonepe
    paytmmp
    credpay
    mobikwik
    in.fampay.app
    bhim
    amazonpay
    navi
    kiwi
    payzapp
    jupiter
    omnicard
    icici
    popclubapp
    sbiyono
    myjio
    slice-upi
    bobupi
    shriramone
    indusmobile
    whatsapp
    kotakbank

```

### Step 3:  Check Availability of PSP App on Customer Device

You must ensure that the UPI PSP app (Google Pay, PhonePe or Paytm) is available on the customer's device. This can be done by checking the URI scheme.

If an app is not available, it will not be displayed on the Checkout. For example, if you want to determine availability of PhonePe on customer's device:

```js: Check PSP App Availability
let urlPhonePe = "phonepe://" // This will open PhonePe URL.

if let urlString = urlPhonePe.addingPercentEncoding(withAllowedCharacters: NSCharacterSet.urlQueryAllowed) {
            if let phonepeURL = URL(string: urlString) {
                if UIApplication.shared.canOpenURL(phonepeURL) {
        //Show Phonepe image
                } else {
        // Hide Phonepe icon
                }
            }
        }
```

### Step 4: Initiate the Payment

/payments/create/upi

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/upi \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "order_id": "order_DBJOWzybf0sJbb",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "upi",
  "flow": "intent",
  "ip": "105.106.107.108",
  "referer": "http://merchantsite.com/pay",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "purpose": "UPI test payment"
  }
}'
``` json: Response
{
  "razorpay_payment_id": "pay_FEmLehpBBG0ntV",
  "link": "upi://pay?pa=upi@razopay&pn=Acme&tr=z5WHDd077OGFvPK&tn=razorpay&am=1&cu=INR&mc=5411"
}
```

#### Request Parameters

Following are the request parameters:

`amount` _mandatory_
: `integer` Amount in paisa. The amount associated with the payment in smallest unit of the supported currency. For example, 2000 means ₹20.

`currency` _mandatory_
: `string` ISO code of the currency associated with the payment amount. In this case, it is `INR`.

`order_id` _mandatory_
: `string` Unique identifier of the order, obtained from the response of the previous step.

`contact` _mandatory_
: `string` Phone number of the customer.

`email` _mandatory_
: `string` Email address of the customer.

`method` _mandatory_
: `string` Method used to make the payment. Here, it is `upi`.

`flow` _mandatory_
: `string` Type of the UPI method. In this case, it is `flow`.

`ip` _mandatory_
: `string` Client's browser IP address. For example, **117.217.74.98**

`referer` _mandatory_
: `string` Value of the`referer` header passed by the client's browser. For example, **https://example.com/**

`user_agent` _mandatory_
: `string` Value of the `user_agent` header passed by client's browser. For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`description` _optional_
: `string` Descriptive text of the payment.

`callback_URL` _optional_
: `string` URL where Razorpay will submit the final payment status.

### Step 5: Deep link the URL by prefixing App Name

After the URL is generated in the response of the previous step, you should edit it and prefix the app name to the URL. For example, if you detect the presence of PhonePe on the customer's device, you should add a prefix to the URL as shown below:

Original URL | Edited URL
---
upi://pay?pa=upi@razopay&pn=Acme&tr=z5WHDd077OGFvPK&tn=razorpay&am=1&cu=INR&mc=5411 | phonepe://pay?pa=upi@razorpay&pn=Acme&tr=99fz4Q6LKearD1B&tn=razorpay&am=1&cu=INR&mc=5411

For Google Pay and Paytm, you should append the prefix to the URL as shown:

App Name | Prefix-appended URL
---
Google Pay | tez://upi/pay?pa=upi@razorpay&pn=Acme&tr=99fz4Q6LKearD1B&tn=razorpay&am=1&cu=INR&mc=5411
---
Paytm | paytmmp://upi/pay?pa=upi@razorpay&pn=Acme&tr=99fz4Q6LKearD1B&tn=razorpay&am=1&cu=INR&mc=5411

### Step 6: Verify Payment Status

You can subscribe to the `order.paid`, `payment.authorized` and `payment.captured` Webhook events to get notified once the customer completes the UPI payment. Know more about[ Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).

You can also poll our APIs at regular intervals to track the status of the [payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-payments-based-on-orders.md) made for an order.

#### Payment Failure and Re-initiating Payments

If the order is not marked `paid` within 2-3 minutes, you can re-initiate payment for the same order.
