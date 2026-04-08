---
title: Coupon Code
description: Send coupon details to Razorpay using this API.
---

# Coupon Code

Use the Coupon Code APIs to send coupon details to Razorpay. Razorpay will create the coupon codes, which you can then apply to transactions.

> **INFO**
>
> 
> **Handy Tips**
> 
> Use your webhook URL as the API endpoint for the Coupon Code APIs.
> 

## Sample Code

Fetch the list of coupons available using this API.

your-webhook-url

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://example-webhook-url.com \
-H 'content-type : application/json'
-d '{
  "orderId": "FFADADADADASDAS",
  "contact": "+919000090000",
  "email": "gaurav.kumar@example.com"
}'
```json: Response
{
  "coupons": [
    {
      "code": "coupon1",
      "summary": "short summary",
      "description": "long description- One time ",
      "tnc": [
        "term1",
        "term2"
      ]
    },
    {
      "code": "coupon2",
      "summary": "short summary",
      "description": "long description- One time ",
      "tnc": [
        "term1",
        "term2"
      ]
    }
  ]
}
```

### Request Parameters

`order_id` _mandatory_
: `string` The unique identifier of the order created in the previous step.

`email` _optional_
: `string` The customer's email address.

`contact` _optional_
: `string` The customer's phone number.

### Response Parameters

`coupons`
: `array` Details of the coupons created.

  `code`
  : `string` The unique identifier of the coupon.

  `summary`
  : `string` A summary about the coupon.

  `description`
  : `string` A brief description of the coupon.

  `tnc`
  : `array` Terms and conditions about the coupon.

## Apply Coupons API

Apply a coupon on a transaction using this API.

your-webhook-url

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://example-webhook-url.com \
-H 'content-type : application/json'
-d '{
  "orderId": "FFADADADADASDAS",
  "contact": "+919000090000",
  "email": "gaurav.kumar@example.com",
  "cart_value": 1000,
  "shipping_charge": 24,
  "cod_charge": 10,
  "coupon_code": "coupon1"
}'
```json: Success Response
{
  "orderId": "AAAAAAAAA",
  "status": true,
  "methods": [
    "cards",
    "netbanking"
  ],
  "new_cart_value": 230,
  "discount": 10,
  "new_shipping_charge": 0,
  "items": {
    "item": "item1",
    "cost": 234
  },
  "cod_charge": 0
}
```json: Failure Response
{
  "status": false,
  "failure_reason": "Coupon Code has expired" / "Invalid Coupon Code"
}
```

### Request Parameters

`order_id` _mandatory_
: `string` The unique identifier of the order created in the previous step.

`email` _optional_
: `string` The customer's email address.

`contact` _optional_
: `string` The customer's phone number.

`cart_value` _mandatory_
: `integer` The customer's cart value.

`shipping_charge` _optional_
: `integer` The shipping charge levied on the customer.

`cod_charge` _optional_
: `integer` The cash-on-delivery charge levied on the customer.

`coupon_code` _mandatory_
: `string` The coupon code to be applied on the transaction.

### Response Parameters

`order_id`
: `string` The unique identifier of the order created in the previous step.

`status` 
: `boolean` Indicates whether the coupon got applied successfully to the transaction. Possible values:
  - `true`: The coupon was successfully applied.
  - `false`: The coupon was not successfully applied.

`methods` 
: `array` The supported payment methods. 

`new_cart_value`
: `integer` The net cart value (original value minus coupon discount).

`discount`
: `integer` The discount amount.

`new_shipping_charge`
: `integer` The net shipping charge.

`items`
: `object` Details of the items.

  `cost`
  : `integer` The item cost.

  `item`
  : `string` The unique identifier of the item.

`cod_charge`
: `integer` The cash-on-delivery charge levied.

`failure_reason`
: `string` The reason why the coupon did not get applied successfully. For example, `Coupon Code has expired`.
