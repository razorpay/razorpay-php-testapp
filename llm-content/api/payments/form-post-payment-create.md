---
title: Form POST Payments
description: Collect payment details from your customers as Form attributes using Razorpay APIs.
---

# Form POST Payments

While accepting payments from your customers, you can collect the payment details as form attributes. The collected payment information can be submitted directly to our Payments API.

If you want to securely store the sensitive data entered by the customers, please use [ Razorpay Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md).

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

@include s2s-integration/request-params

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
 Displayed only if you have implemented [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md) at your server-side.

`razorpay_signature`
: `string` A hexadecimal string that indicates that the callback is sent by Razorpay.
 Validate the `razorpay_signature` at your end as described [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps#15-verify-payment-signature.md).

```json: Callback Response
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```
### 400 Bad Request

These validation errors are seen when erroneous parameters are passed in the request. For example, invalid currency or wrong card number.

Know more about [error codes](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#error-codes.md).

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

Know more about [error codes](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#error-codes.md).

> **INFO**
>
> 
> **Handy Tips**
> You can set query parameters in `callback_url` to map it with entities at your end. For example, http://your-site.com/url?cart_id=123 is a valid callback_url.
>
