---
title: Additional Support for Payment Methods
description: Check the various form fields you can use in the Checkout Form used in Razorpay Checkout integrations.
---

# Additional Support for Payment Methods

The Razorpay Web Custom SDK lets you integrate the supported payment methods on your website's checkout form. 

## Fetch Payment Methods

Use the [Fetch Payment Methods API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md#14-fetch-payment-methods) to fetch the payment methods available for your account.

Below are the sample payloads for each payment method.

## Bank Transfer

This payment method allows you to display your Customer Identifier details on the checkout. Your customers can make online bank transfers to this account.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

There are no specific request parameters to be passed. Instead, you must pass the `fetchVirtualAccount` method for your Customer Identifier to get created and the details to appear on the checkout. Know more about [integrating bank transfer with Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer/custom-integration.md).

## Debit and Credit Card

In this case, `data.method` should be specified as `card`. Other required fields:

- `card[name]`
- `card[number]`
- `card[cvv]`
- `card[expiry_month]`
- `card[expiry_year]`

```js: Example
razorpay.createPayment({
  amount: 5000,
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  order_id: 'order_9A33XWu170gUtm',
  method: 'card',
  'card[name]': 'Gaurav Kumar',
  'card[number]': '4386289407660153',
  'card[cvv]': '566',
  'card[expiry_month]': '10',
  'card[expiry_year]': '20'
});
```

If you want to securely store the customer's card details as network tokens, know about [Saved Cards feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards.md).

## EMI on Credit and Debit Cards

For EMIs, data is the same as the card, with the following differences:

- `method` should be `emi`
- An additional field, `emi_duration` corresponding to the number of months for EMI, should be included. After the customer selects the desired plan, pass the corresponding value in the `emi_duration` field.

Use the code given below:

```js: Example
razorpay.createPayment({
  amount: 300000,
  email: 'gaurav.kumar@example.com',
  contact: '9000090000',
  order_id: 'order_9A33XWu170gUtm',
  method: 'emi',
  emi_duration: 9,
  'card[name]': 'Gaurav Kumar',
  'card[number]': '5241810000000000',
  'card[cvv]': '123',
  'card[expiry_month]': '10',
  'card[expiry_year]': '30'
});
```

#### Fetch EMI Plans

To display the available EMI plans, use the Razorpay checkout helper methods to fetch the details of the EMI plans and display them. You can use the event ready, as shown below:

```javascript: Request
var razorpay = new Razorpay(...); // as before

    /**
       * The above code remains the same.
       * You can fetch the available EMI plans by adding the below code in your options.
       */
razorpay.once('ready', function() {
  console.log(razorpay.methods.emi_plans);
  console.log(razorpay.methods.netbanking);
})
```json: Response
{
  "HDFC": {
    "min_amount": 300000,
    "plans": {
      "3": 12,
      "6": 12,
      "9": 13,
      "12": 13,
      "18": 15,
      "24": 15
    }
  },
  "AMEX": {
    "min_amount": 500000,
    "plans": {
      "3": 15,
      "6": 15,
      "9": 15,
      "12": 15
    }
  }
  // etc..
}
```

`razorpay.methods.emi_plans`
: `string` Lists the EMI-supported banks with their respective interest rates.

`razorpay.methods.netbanking`
: `string` Contains the list of all banks and bank codes.

#### Calculate EMI

You can use the function `Razorpay.emi.calculator` to calculate instalment amounts as shown below:

```javascript: Request
Razorpay.emi.calculator(principal_amount, duration_in_month, annual_interest_rate);
```

The below code will calculate EMI for a principal amount of 10000(in paisa), that is, ₹100 over 12 months with an annual interest rate of 9%:

```javascript: Request
Razorpay.emi.calculator(10000, 12, 9);
= 874
```

> **INFO**
>
> 
> **Handy Tips**
> 
> The above code does not do any unit conversion of the principal amount. The returned amount will have the same unit as the principal. If the principal amount is in *paisa*, the returned EMI amount will also be in *paisa*.
> 

## Cardless EMI

Cardless EMI is a checkout payment method that allows customers to convert their payment amount to EMIs. The user does not require a debit or credit card. Make payments via credits approved by the supported Cardless EMI payment partner.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

Use the code given below:

```js: Example
razorpay.createPayment({
  amount: 5000,
  email: 'gaurav.kumar@example.com',
  contact: '9000090000',
  order_id: 'order_9A33XWu170gUtm',
  method: 'cardless_emi',
  provider: ''
});
```
Possible values for `provider`:
  - `hdfc`
  - `icic`
  - `idfb`
  - `kkbk`
  - `zestmoney`
  - `earlysalary`
  - `walnut369`
  - `shopse`
  - `snapmint`

## Netbanking

When `method` is `netbanking`, you need to pass an additional field `bank` as shown below:

```js: Example
razorpay.createPayment({
  amount: 5000,
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  order_id: 'order_9A33XWu170gUtm',
  method: 'netbanking',
  bank: 'SBIN'
})
```

You can list the available banks using a drop-down for customers. You can obtain a list of banks using the [Fetch Supported Methods API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md#12-fetch-payment-methods).

## Wallet

When `method` is `wallet`, you need to pass an additional field `wallet` as shown below:

```js: Example
razorpay.createPayment({
  amount: 5000,
  email: 'gaurav.kumar@example.com',
  contact: '9000090000',
  order_id: 'order_9A33XWu170gUtm',
  method: 'wallet',
  wallet: 'mobikwik'
});
```

Possible values for `wallet`:
- `payzapp` (default)
- `olamoney` (requires [approval](https://razorpay.com/support/#request))
- `phonepe` (requires [approval](https://razorpay.com/support/#request))
- `airtelmoney` (requires [approval](https://razorpay.com/support/#request))
- `mobikwik` (requires [approval](https://razorpay.com/support/#request))
- `jiomoney` (requires [approval](https://razorpay.com/support/#request))
- `amazonpay` (requires [approval](https://razorpay.com/support/#request))
- `bajajpay`   (requires [approval](https://razorpay.com/support#request))
- `paypal` (requires [approval](https://razorpay.com/support/#request) and [onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md))
- `phonepeswitch` (requires [approval](https://razorpay.com/support/#request))

#### PhonePe Switch

You can accept in-app payments from your customers transacting in PhonePe Switch. Know more about [PhonePe Switch Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch.md).

## UPI

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
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#intent-flow). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md).
> 

#### Intent Flow

You can avail the UPI Intent flow by integrating with the [Google Pay SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay/custom-integration.md).

#### Intent Flow for Mobile Web

Using Razorpay, you can let your customers make UPI Intent payments on your mobile website. Customers can then proceed with the payment without navigating away from your mobile website. This leads to a faster checkout experience with higher success rates.

Know how to integrate with [UPI Intent on Mobile Web](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods/upi-intent-mweb.md).

> **INFO**
>
> 
> **Feature Enablement**
> 
> The UPI Intent feature is usually available by default. If you are unable to access this feature, raise a request with our [Support team](https://razorpay.com/support/#request) to get this enabled on your Razorpay account.
> 

#### Collect Flow

Customers enter their `vpa` or [phone number](#upi-payments-using-phone-number) on your UI and complete the payments on their respective UPI apps in collect flow. 

You can now pass the `vpa` parameter in the `upi` array as shown below:

```js: Example
razorpay.createPayment({
  amount: 5000,
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  order_id: 'order_9A33XWu170gUtm',
  method: 'upi',
  upi:
  {
    vpa: 'gauravkumar@somebank',
    flow: 'collect'
  }
});
```

You will need to collect the Virtual Payment Address (VPA) from the user. This should be a text field that validates against the regex `^.+@.+$`.

  
### UPI Payments Using Phone Number

     You can accept UPI payments using phone number for the collect flow. Follow the steps given below: 

     1. You must collect the customer's phone number from your end.
     2. Check if any `vpa` is associated with the given number and get the `vpa_token` for that number using the sample code given below:
        ```java: JavaScript
        var razorpay = new Razorpay({
          key: '',
        });

        razorpay.verifyVpa(number)
          .then((data) => {
            // get and store data.vpa_token for initiating payment
            // you will get data.masked_vpa in this response which you can show the end user to accept payment on this vpa associated app
          })
          .catch(() => {
            // no vpa associated with the number, show an error to the user
          });
        ```
     3. Pass the `vpa_token` parameter in the `upi` array as shown below:
        ```java: JavaScript
        razorpay.createPayment({
          amount: 5000,
          email: 'gaurav.kumar@example.com',
          contact: '9000090000',
          order_id: 'order_9A33XWu170XXXX',
          method: 'upi',
          upi: {
            vpa_token: 'f731951149df8903d374b117f921ab41',
            flow: 'collect'
          }
        });
        ```
    

You can accept UPI payments using the collect flow. Know more about [Validate VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/validate-vpa.md) and [Saved VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-vpa.md).

#### UPI QR Code

You can display a UPI QR Code at checkout. Customers can scan this QR code using a UPI app on their mobile phones to complete the payment.

Razorpay supports two flows for UPI QR payments:
- [Non-Redirect Flow](#non-redirect-flow) *(Beta)*: Displays the QR directly on your checkout page.
- [Redirect Flow](#redirect-flow): Redirects customers to Razorpay's payment page to display the QR.

  
### Flow Comparison

     
     Aspect | Non-Redirect Flow | Redirect Flow
     ---
     **Request** | Create payment with `flow: 'qr'`. | Create payment with `upi: { qr: true }`.
     ---
     **Response** | Returns UPI intent URL via event. | Redirects to Razorpay page.
     ---
     **QR Display** | You convert URL to QR and display on your page. | On Razorpay's payment page.
     ---
     **Customer Experience** | Stays on your checkout page. | Leaves your checkout page.
     ---
     **Implementation Effort** | Requires QR generation library. | Simple - no QR generation needed.
     --- 
     **Feature Availability** | Requires approval. | Available to all businesses.
     
    

#### Non-Redirect Flow *(Beta)*

Display UPI QR codes directly on your checkout page without redirecting customers to Razorpay's payment page. This flow allows you to:
- Receive a UPI intent URL from Razorpay.
- Convert it to a QR code on your checkout page.
- Keep customers on your site for a seamless experience.

> **INFO**
>
> 
> **Feature Enablement**
> 
> - This is an on-demand feature. Raise a request with your account manager to get this feature enabled on your account.
> - This flow is available only for desktop websites.
> 

Add the `flow` parameter to enable non-redirect flow:

```javascript: Request
razorpay.createPayment(
  {
    amount: 100000,  
    method: 'upi',
    email: 'gaurav.kumar@example.com',  
    contact: '+919000090000'  
  },
  {
    app: 'any',  
    flow: 'qr' // Enables non-redirect flow
  }
);
```javascript: Success Response
razorpay.on("payment.upi.qr", (data) => {
  // data = {
  //   qr_url: "upi://....",  // undefined if expired
  //   expires_on: 1757523607185,
  //   status: "created" | "expired"
  // }
});
```javascript: Failure Response
{
  code: 'BAD_REQUEST_ERROR',
  description: 'UPI QR non-redirection flow not supported',
  reason: 'Feature not enabled'
}
```

  
### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is ₹100.00, enter `10000` in this field.

`method` _mandatory_
: `string` The payment method selected by the customer. Must be set to `upi` for UPI QR payments.

`email` _optional_
: `string` Email address of the customer.

`contact` _optional_
: `string` Phone number of the customer. 

`app` _optional_
: `string` UPI app preference for payment. Set to `any` to allow customers to use any UPI app for payment.

`flow` _optional_
: `string` Determines the UPI QR flow type. Set to `qr` to enable non-redirect flow where the UPI intent URL is returned instead of redirecting to Razorpay's payment page. If undefined or any other value, the standard redirect flow is used.
    

  
### Response Parameters

`qr_url`
: `string` UPI intent URL that needs to be converted to a QR code image for display on your checkout page. The value is `undefined` when the status is `expired`.

`expires_on`
: `integer` Unix timestamp indicating when the QR code will expire. The QR code is valid for 10 minutes from creation.

`status`
: `string` Current status of the UPI QR code. Possible values:
    - `created`: QR code is active and can be scanned for payment.
    - `expired`: QR code has expired and cannot be used for payment.
    

#### Redirect Flow

With this flow, customers are redirected to Razorpay's payment page where the QR code is displayed. 

> **INFO**
>
> 
> **Sample QR Code on Checkout**
> 
> Ensure that you invoke/activate the QR Code only after a user clicks **Show QR Code**.
> ![UPI QR code on Razorpay Payment Gateway custom web integration.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/upi-qr-custom-web.jpg.md)
> 

Pass the `qr` parameter in the `upi` array as shown below:

```js: Example
razorpay.createPayment({
  amount: 5000,
  email: 'gaurav.kumar@example.com',
  contact: '+919000090000',
  order_id: 'order_9A33XWu170XXXX',
  method: 'upi',
  upi:
  {
    qr: true,
    timeout: 10
  }
});
```

`timeout` _optional_
: `integer` Indicates the time (in minutes) after which the QR code will expire. Possible values are between `1` to `10`. The default value is `10`.

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     Some browsers may pause `JavaScript` timers when the user switches tabs, especially in power saver mode. This can cause the checkout session to stay active beyond the set timeout duration.
>     

> **INFO**
>
> 
> **Handy Tips**
> 
> For the best experience, show QR codes only on desktops.
> 

## Pay Later

You can enable your customers to make payments using the **Pay Later** service offered by various third-party providers such as:

Provider | Provider Code | Availability | Minimum Transaction | Maximum Transaction
---
LazyPay | `lazypay` | [Requires Approval](https://razorpay.com/support/#request)  | ₹1 | ₹10,000
---
PayPal | `paypal` | [Requires Approval](https://razorpay.com/support/#request)  | ₹100 | Based on the customer's approved limit.

Before you begin, follow the steps given below:

- Contact our [Support Team](https://razorpay.com/support/#request) to get this payment method enabled for your account.
- Customers should be registered account holders of the Pay Later service providers.

#### Sample Code

After creating an order and obtaining the customer's payment details, send the information to Razorpay to complete the payment. You can do this by invoking `createPayment` and passing `method=paylater` and `provider=`.

Available providers with provider code:
- **LazyPay**: `lazypay`
- **PayPal**: `paypal`

```js: Example
razorpay.createPayment({
  amount: 200000,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9111145678',
  order_id: 'order_DPzFe1Q1dEObDv',
  method: 'paylater',
  provider: 
});
```

## Emandate

You can accept recurring payments from your customers using `emandate`, `card` or `upi` as the method. For more information about authorisation and subsequent payments, refer to the [Recurring Payments documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments.md).

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

#### Workflow

1. [Create a customer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#create-a-customer).
2. Create an Order with method as `emandate`, `nach` or `upi`.
3. Collect authorisation transaction.
    - Using custom checkout.
    - Using an authorisation link.
4. Verify Tokens.
5. Charge subsequent payments.

Know more about [Recurring Payments APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/custom.md).

#### Collect Authorisation Transaction

Use the sample checkout code given below: 

```js: Emandate (Netbanking)
razorpay.createPayment({
  amount: 0,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9111145678',
  order_id: 'order_EAbtuXPh24LrEc',
  customer_id: 'cust_E9penp7VGhT5yt',
  recurring: '1',
  method: 'emandate',
  bank: 'HDFC',
  auth_type: 'netbanking',
  'bank_account[name]': 'Gaurav Kumar',
  'bank_account[account_number]': '1121431121541121',
  'bank_account[account_type]': 'savings',
  'bank_account[ifsc]': 'HDFC0000001'
});
```js: Emandate (Debit Card)
razorpay.createPayment({
  amount: 0,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9111145678',
  order_id: 'order_EAbtuXPh24LrEc',
  customer_id: 'cust_E9penp7VGhT5yt',
  recurring: '1',
  method: 'emandate',
  bank: 'HDFC',
  auth_type: 'debitcard',
  'bank_account[name]': 'Gaurav Kumar',
  'bank_account[account_number]': '1121431121541121',
  'bank_account[account_type]': 'savings',
  'bank_account[ifsc]': 'HDFC0000001'
});
```js: Emandate (Aadhaar)
razorpay.createPayment({
  amount: 0,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9111145678',
  order_id: 'order_EAbtuXPh24LrEc',
  customer_id: 'cust_E9penp7VGhT5yt',
  recurring: '1',
  method: 'emandate',
  bank: 'HDFC',
  auth_type: 'aadhaar',
  'bank_account[name]': 'Gaurav Kumar',
  'bank_account[account_number]': '1121431121541121',
  'bank_account[account_type]': 'savings',
  'bank_account[ifsc]': 'HDFC0000001'
});
```js: Card
razorpay.createPayment({
  amount: 100,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9111145678',
  order_id: 'order_EAbtuXPh24LrE0',
  customer_id: 'cust_E9penp7VGhTkeD',
  recurring: '1',
  method: 'card',
  'card[number]': '4047458064386281',
  'card[cvv]': '123',
  'card[expiry_month]': '01',
  'card[expiry_year]': '22',
  'card[name]': 'Gaurav Kumar'
});
```js: UPI
razorpay.createPayment({
 "amount": 100,
 "currency": "INR",
 "email": "gaurav.kumar@example.com",
 "contact": "9111145678",
 "order_id": "order_IxWD8iKBkMLwUu",
 "customer_id": "cust_H0Hs5VmLjN0ir7",
 "recurring": 1,
 "method": "upi",
 "upi" : {
  "flow": "collect",
  "vpa": "9876543211@ybl"//Payer VPA in case of collect request
 }
```

## CRED

To add CRED as a payment method, you need to:
- Pass the `app_offer` parameter in Orders API.
- Pass the `method` and `provider` parameters in [Create Payment Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md#133-submit-payment-details).

#### 1. Pass app_offer Parameter in Order

You must create an order using Orders API. In the response, you obtain an `order_id` which you must pass to Checkout.

 /orders 

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
}'
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
 })
```php: PHP 
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => 'receipt#1', 'amount' => 1000, 'currency' => 'INR', 'app_offer'=> true));

```csharp: .NET 
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 1000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
options.Add("app_offer", true);
Order order = client.Order.Create(options);

```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 1000,
  currency: "INR",
  receipt: "receipt#1",
  app_offer: true
})

```go: go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
}
body, err := client.Order.Create(data, nil)

```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 1000, currency: 'INR', receipt: 'receipt#1', app_offer: true

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 1000); // amount in the smallest currency unit
orderRequest.put("currency", "INR");
orderRequest.put("receipt", "receipt#1");
orderRequest.put("app_offer", true);

Order order = razorpay.orders.create(orderRequest);

```json: Response
{
  "id": "order_FNPoKwCtPyhJOt",
  "entity": "order",
  "amount": 1000,
  "amount_paid": 0,
  "amount_due": 1000,
  "currency": "INR",
  "receipt": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1596703420
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Default is `INR`.

`app_offer` _optional_
: `boolean` Allow/do not allow customers to use CRED coins to make payments. This is used to prevent double discounting scenarios where customers have already availed discounts using voucher/coupon and you do not want them to redeem Coins as well. Possible values:
    - `true`: Customer not allowed to use CRED coins to make payment.
    - `false` (default): Customer can use CRED coins to make payment.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### 2. Pass Method and Provider Parameters During Payment Creation

```js: Cred
razorpay.createPayment({
  amount: 12340,
  currency: 'INR',
  email: 'gaurav.kumar@example.com',
  contact: '9111145678',
  order_id: 'order_EAbtuXPh24LrEc',
  method: 'app',
  provider: 'cred'
});
```

#### Request Parameters

Along with the other checkout options, you must pass:

`method` _mandatory_
: `string` The method used to make the payment. Here, it must be `app`.

`provider` _mandatory if method=app_
: `string` Name of the PSP app. Here, it must be `cred`.
