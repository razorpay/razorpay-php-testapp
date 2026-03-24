---
title: PhonePe Switch Integration
description: Integrate your Razorpay Custom web application to accept payments in PhonePe Switch platform.
---

# PhonePe Switch Integration

PhonePe Switch platform allows customers to switch seamlessly between PhonePe and their preferred apps within the PhonePe app itself. With a single tap, customers can log in to these apps without downloading them. For example, customers can book cabs or hotel rooms right on the PhonePe app and utilize offers provided by PhonePe.

PhonePe enables various businesses to integrate their web apps or mobile sites with the Switch platform and instantly reach out to the PhonePe user base. By integrating Razorpay APIs with PhonePe Switch payment flow, you can accept in-app payments made by your customers without having to worry about handling settlements or reconciliation separately.

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

## User Flow

The user's journey through this entire flow is outlined below:

1. Customers log in to the PhonePe app and click **PhonePe Switch**.
2. In the PhonePe Switch, customers select your app, place orders and click **Proceed to Pay**.
3. Customers are redirected to the PhonePe payment page.
4. After the successful payment on the PhonePe payment page, customers are redirected to your website.

## Prerequisites

Before integrating with the Checkout, run through this checklist:

- Check if your webapp is integrated with PhonePe Switch.
-  Understand the [payment flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/how-it-works.md).
-  Sign up for a Razorpay Account.
- Generate the API keys from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/#api-keys.md). Use the test API Keys to test out the integration.

Watch the video to see how to generate API key in Test Mode.

[Video: https://www.youtube.com/embed/6mJnOWZDhDo]

> **WARN**
>
> 
> **PCI DSS Certification**
> 
> A customer's payment information should never reach your servers, unless you are PCI DSS certified.
> 

## Integration Steps

Steps to integrate Custom Checkout in your site:

1. [Create an Order from your Server](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch/#step-1-create-an-order-from-your-server.md).
1. [Invoke Checkout and Pass Order Id and Other Options to it](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch/#step-2-invoke-checkout-and-pass-order-id.md)
  1. [Include the JavaScript code in your Webpage](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch/#step-21-include-the-javascript-code-in-your.md).
  1. [Instantiate Razorpay Custom Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch/#step-22-instantiate-razorpay-custom-checkout.md).
  1. [Submit Payment Details](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch/#step-23-submit-payment-details.md).
1. [Store Fields in Your Server](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch/#step-3-store-fields-in-your-server.md).
1. [Verify the Signature](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch/#step-4-verify-the-signature.md).

### Step 1: Create an Order in your Server

When a customer places an order on your website or application, use the details to create an order on Razorpay.

/orders

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
 -d '{
    "amount": 1000,
    "currency": "INR",
    "receipt": "merchant_txn_id"
    "phonepe_switch_context" : "{\n\"orderContext\":{\"trackingInfo\":{\n\"type\":\"HTTPS\",\"url\":\"https://google.com\"}},\"fareDetails\":{\n\"payableAmount\":3900,\"totalAmount\":3900},\"cartDetails\":{\"cartItems\":[{\"quantity\":1,\"address\":{\"addressString\":\"TEST\",\"city\":\"TEST\",\"pincode\":\"TEST\",\"country\":\"TEST\",\n\"latitude\":1,\"longitude\":1},\"shippingInfo\":{\n\"deliveryType\":\"STANDARD\",\"time\":{\"timestamp\":1561540218,\"zoneOffSet\":\"+05:30\"\n\n\n}},\n\n\n\n\n\"category\":\"SHOPPING\",\"itemId\":\"1234567890\",\n\"price\":3900,\"itemName\":\"TEST\"}]}}"
}'
```json: Response
{
    "id": "order_EdUtuxhupLSOUH",
    "entity": "order",
    "amount": 1000,
    "amount_paid": 0,
    "amount_due": 1000,
    "currency": "INR",
    "receipt": "merchant_txn_id",
    "offer_id": null,
    "status": "created",
    "attempts": 0,
    "notes": [],
    "created_at": 1586677700
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. 
 You can create Orders in **INR** only.

`receipt` _optional_
: `string` Your receipt ID for this order can be passed here. Maximum length is 40 characters.

`phonepe_switch_context` _optional_

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Step 2: Invoke Checkout and Pass Order Id and Other Options to it

#### Step 2.1: Include the JavaScript code in your Webpage

Include the following script, preferably in `` section of your page:

```html: Index HTML

```

> **INFO**
>
> 
> **Including the Javascript, not the Library**
> 
> Include the script from `https://checkout.razorpay.com/v1/razorpay.js` instead of serving a copy from your own server. This allows new updates and bug fixes to the library to get automatically served to your application.
> 
> We always maintain backward compatibility with our code.
> 

#### Step 2.2: Instantiate Razorpay Custom Checkout

#### Single Instance on a Page

```js: Invoke a Single Instance
var razorpay = new Razorpay({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
});
```

#### Multiple Instances on Same Page

If you need multiple razorpay instances on same page, you can globally set some of the options:

```js: Invoke Multiple Instances
Razorpay.configure({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
})
new Razorpay({}); // will inherit key and image from above.
```
#### Step 2.3: Submit Payment Details

Once the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. The data that needs to be submitted depends upon the payment method selected by the customer.

You can do this by invoking `createPayment` method:

```js: createPayment with handler Function
  var data = {
    amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
    currency: "INR",
    email: 'gaurav.kumar@example.com',
    contact: '9123456780',
    notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
    },
    order_id: "order_EdUtuxhupLSOUH", // Enter the order ID obtained from Step 1
    method: 'wallet',
    wallet: 'phonepeswitch'
    };

    var btn = document.querySelector('#btn');
    btn.addEventListener('click', function(){
    razorpay.createPayment(data);

    razorpay.on('payment.success', function(resp){
        alert(resp.razorpay_payment_id),
        alert(resp.razorpay_order_id),
        alert(resp.razorpay_signature)
        }); // will pass payment ID, order ID, and Razorpay signature to success handler.

    razorpay.on('payment.error', function(resp){
        alert(resp.error.description)}); // will pass error object to error handler
  });
```js: createPayment with callback URL
  var data = {
    callback_url: 'https://www.examplecallbackurl.com/',
    amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
    currency: "INR",
    email: 'gaurav.kumar@example.com',
    contact: '9123456780',
    notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
    },
    order_id: "order_EdUtuxhupLSOUH", // Enter the order ID obtained from Step 1
    method: 'wallet',
    wallet: 'phonepeswitch'
    };

    var btn = document.querySelector('#btn');
    btn.addEventListener('click', function(){
    razorpay.createPayment(data);
  });
```

> **ERROR**
>
> 
> **Note**
> 
> The `createPayment` method should be called within an event listener triggered by user action to prevent the popup from being blocked. For example:
> 

> ```js
> $('button').click( function (){ razorpay.createPayment(...) })
> ```
> 

> **INFO**
>
> 
> **Handler Function vs Callback URL**
> 
> - **Handler Function**:
>   
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server.
> - **Callback URL**:
>   
When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Callback URL.
> 

### Step 3: Store Fields in Your Server

@include integration-steps/store-fields

### Step 4: Verify the Signature

@include integration-steps/verify-signature

## Payment Capture Settings

@include integration-steps/capture-settings

@include integration-steps/next-steps

### Related Information

@include integration-steps/related-info
