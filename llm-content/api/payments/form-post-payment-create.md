---
title: Form POST Payments
description: Collect payment details from your customers as Form attributes using Razorpay APIs.
---

# Form POST Payments

While accepting payments from your customers, you can collect the payment details as form attributes. The collected payment information can be submitted directly to our Payments API.

If you want to securely store the sensitive data entered by the customers, please use [ Razorpay Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).

> **WARN**
>
> 
> **Watch Out!**
> Ensure that the payment details entered by customers never reach your servers, unless you are [PCI-DSS certified](https://www.pcisecuritystandards.org/documents/PCI-DSS-v3_2_1-SAQ-D_Merchant.pdf).
> 

## Request
The payment details collected from your client-side implementation should be submitted as a `POST` request to the following URL:

 /payments 

### Request Parameters
The submitted form should contain the following attributes in the request body:

`key_id` _mandatory_
: `string` The key id that you have generated from the **API Keys** tab in the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order.
 Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`ip` _mandatory_
: `string` Customer's IP address.

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters. 

`contact` _mandatory_
: `string`  Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code. 

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
    : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from the payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

`method` _mandatory_
: `string` Name of the payment method. Possible values are: 
    - `card` 
    - `netbanking`
    - `wallet`
    - `emi`
    - `upi`
    - `cardless_emi`
    - `paylater`

`card`
:  `object` Details associated with the card. Required if the payment method is `card`.

    `number` _mandatory_
    : `string` Unformatted card number. Required if the method is `card`.

    `name` _mandatory_
    : `string` Name of the cardholder. Required if the method is `card`.

    `expiry_month` _mandatory_
    : `integer` Expiry month for card in `MM` format. Required if the method is `card`.

    `expiry_year` _mandatory_
    : `string` Expiry year for card in `YY` format. Required if the method is `card`.

    `cvv` _mandatory_
    : `string` CVV printed on the back of card. Required if the method is `card`.
    
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

`bank`
: `string` Bank code of the bank used for the payment. Required if the method is `netbanking`.

`bank_account`
: The details of the bank account that should be passed in the request. Required if the method is `emandate`.

    `account_number` _mandatory_
    : `string` Bank account number used to initiate the payment.

    `ifsc` _mandatory_
    : `string` IFSC of the bank used to initiate the payment.

    `name` _mandatory_
    : `string` Name associated with the bank account used to initiate the payment.

`emi_duration`
: `string` The EMI duration in months. Required if the method is `emi`.

`vpa`
: `string` Virtual payment address of the customer. Required if the method is `upi`.

`wallet`
: `string` Wallet code for the wallet used for the payment. Required if the method is `wallet`.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

`user_agent` _optional_
: `string` Customer user-agent.

#### Example

In the HTML form, add the `key_id` of the API key generated from your Dashboard.

```html: HTML

```

## Response

Typically, the response is contained in an `HTML Form Post` and should be opened in the customer's browser. The HTML form contains form-fields along with the `razorpay_payment_id` and is automatically posted to the bank or wallet URL (specified in the form) to continue with the payment process.

After the customer completes a payment, a `POST` request is sent to the `callback_URL` configured in the request. Possible responses are described below:

### 200 OK

A successful payment with `200 OK` status contains the following response:

`razorpay_payment_id`
: `string` Unique identifier of the payment created for this request.

`razorpay_order_id`
: `string` Unique identifier of the order.
 Displayed only if you have implemented [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md) at your server-side.

`razorpay_signature`
: `string` A hexadecimal string that indicates that the callback is sent by Razorpay.
 Validate the `razorpay_signature` at your end as described [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#15-verify-payment-signature).

```json: Callback Response
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```
### 400 Bad Request

These validation errors are seen when erroneous parameters are passed in the request. For example, invalid currency or wrong card number.

Know more about [error codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#error-codes).

A sample validation error with `400 Bad Request` contains the following response:

```
{
   "error": {
      "code": "BAD_REQUEST_ERROR",
      "description": "Wrong card number",
      "field": "number"
  }
}
```

## Failed Payments

In failed payments, the response received at the `callback_url` contains the error details as shown below:

```
error%5Bcode%5D=BAD_REQUEST_ERROR&error%5Bdescription%5D=Payment+failed
```

The key-value parameters of the request is shown below:

error[code]
: BAD_REQUEST_ERROR

error[description]
: Payment failed

Know more about [error codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#error-codes).

> **INFO**
>
> 
> **Handy Tips**
> You can set query parameters in `callback_url` to map it with entities at your end. For example, http://your-site.com/url?cart_id=123 is a valid callback_url.
>
