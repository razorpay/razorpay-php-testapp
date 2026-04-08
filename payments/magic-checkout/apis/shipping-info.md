---
title: Shipping Information
description: Send customer shipping information to Razorpay easily using our API.
---

# Shipping Information

Use this API to send the customer's shipping information to Razorpay.

> **INFO**
>
> 
> **Handy Tips**
> 
> Use your webhook URL as the API endpoint for the Shipping Info and Coupon Code APIs.
> 

## Sample Code

your-webhook-url

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://example-webhook-url.com \
-H 'content-type : application/json'
-d '{
  "orderId": "FFADADADADASDAS",
  "addresses": [
    {
      "zipcode": "560060",
      "state": "Karnataka",
      "country": "IN"
    }
  ]
}'
```json: Response
{
  "addresses": [
    {
      "zipcode": "560060",
      "country": "IN",
      "state": "Karnataka",
      "serviceable": true,
      "cod": false,
      "cod_amount": 50,
      "shipping_methods": [
        {
          "id": "shipping_1",
          "charge": 50,
          "summary": "Free shipping",
          "name": "Free Shipping"
        }
      ]
    }
  ]
}
```

### Request Parameters

`order_id` _mandatory_
: `string` The unique identifier of the order created in the previous step.

`addresses` _mandatory_
: `array` The customer's address details.

  `zipcode`
  : `string` The customer's ZIP code.

  `state`
  : `string` The state where the customer resides.

  `country`
  : `string` The country where the customer resides. The length cannot exceed 2 characters.

### Response Parameters

`addresses` _mandatory_
: `array` The customer's address details.

  `zipcode`
  : `string` The customer's ZIP code.

  `state`
  : `string` The state where the customer resides.

  `country`
  : `string` The country where the customer resides. The length cannot exceed 2 characters.

  `serviceable`
  : `boolean` Indicates whether you deliver orders to the ZIP code entered by the customer. This is based on the ZIP codes you have added under the Serviceability setting on the Razorpay Dashboard. Possible values:
      - `true`: Orders can be delivered to the added ZIP codes.
      - `false`: Orders cannot be delivered to the added ZIP codes.

  `cod`
  : `boolean` Indicates whether you support cash on delivery on this order.

  `cod_amount`
  : `integer` The additional amount charged by for you COD. This is based on the amount you have added to the COD setting on the Razorpay Dashboard.

  `shipping_methods`
  : `array` Details regarding the shipping methods.

      `id`
      : `string` The unique identifier of the shipping method.

      `charge`
      : `integer` The shipping charge applicable.

      `summary`
      : `string` A brief description of the shipping method.

      `name`
      : `string` The name of the shipping method.
