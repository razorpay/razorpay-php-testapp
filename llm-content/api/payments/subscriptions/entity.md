---
title: Subscriptions Entity
description: Know about the Subscription entity and the associated parameter descriptions.
---

# Subscriptions Entity

## Subscriptions Entity

The Subscriptions entity has the following parameters.

### Response

```json: Entity
{
  "entity":"collection",
  "count":2,
  "items":[
    {
      "id":"sub_00000000000005",
      "entity":"subscription",
      "plan_id":"plan_00000000000004",
      "customer_id":"cust_D00000000000006",
      "status":"active",
      "current_start":1577355873,
      "current_end":1582655401,
      "ended_at":null,
      "quantity":1,
      "notes":{
        "notes_key_1":"Tea, Earl Grey, Hot",
        "notes_key_2":"Tea, Earl Grey… decaf."
      },
      "charge_at":1577385995,
      "offer_id":"offer_JHD834hjbxzhd38d",
      "start_at":1577385995,
      "end_at":1603737004,
      "auth_attempts":0,
      "total_count":6,
      "paid_count":1,
      "customer_notify":true,
      "created_at":1577356088,
      "expire_by":1577485999,
      "short_url":"https://rzp.io/i/z3b1R61A9",
      "has_scheduled_changes":false,
      "change_scheduled_at":null,
      "remaining_count":5
    },
    {
      "id":"sub_00000000000006",
      "entity":"subscription",
      "plan_id":"plan_00000000000009",
      "customer_id":"cust_D00000000000005",
      "status":"active",
      "current_start":1577355875,
      "current_end":1577355875,
      "ended_at":null,
      "quantity":1,
      "notes":{
        "notes_key_1":"Tea, Earl Grey, Hot",
        "notes_key_2":"Tea, Earl Grey… decaf."
      },
      "charge_at":1561852802,
      "start_at":1561852802,
      "end_at":1590777006,
      "auth_attempts":0,
      "total_count":12,
      "paid_count":1,
      "customer_notify":true,
      "created_at":1560241237,
      "expire_by":1561939197,
      "short_url":"https://rzp.io/i/m0y0f",
      "has_scheduled_changes":false,
      "change_scheduled_at":null,
      "source":"api",
      "offer_id":"offer_JHD834hjbxzhd38d",
      "remaining_count":11
    }
  ]
}
```

### Parameters

`id`
: `string` The unique identifier linked to a Subscription.

`entity`
: `string` The entity being created. Here, it is `subscription`.

`plan_id`
: `string` The unique identifier of a plan that should be linked to the Subscription. For example, `plan_00000000000001`.

`customer_id`
: `string` The unique identifier of the customer who is subscribing to a plan. This is populated automatically after the customer completes the authorisation transaction.

`total_count`
: `integer` The number of billing cycles for which the customer should be charged. For example, if a customer is buying a 1-year subscription billed on a bi-monthly basis, this value should be `6`.

`customer_notify`
: `boolean` Indicates whether the communication to the customer would be handled by businesses or Razorpay. Possible values:
    - `true` (default): Communication handled by Razorpay.
    - `false`: Communication handled by businesses.

`start_at`
: `integer` The Unix timestamp, indicates from when the Subscription should start. If not passed, the Subscription starts immediately after the authorisation payment. For example, `1581013800`. For Subscriptions with a future start_date, frequency is considered `as_presented`.

`quantity`
: `integer` The number of times the customer should be charged the plan amount per invoice. For example, a customer subscribes to use software. The charges are /month/license. The customer wants 5 licenses. You should pass 5 as the quantity. The customer is charged  (5 x ) monthly. By default, this value is set to `1`.

`notes`
: `object` Object consisting of key value pairs as notes.

`status`
: `string` Status of the Subscription. Possible values: 
    - `created`
    - `authenticated`
    - `active`
    - `pending`
    - `halted`
    - `cancelled`
    - `completed`
    - `expired` 
    
  Know more about [Subscriptions States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/states.md).  

`paid_count`
: `integer` Indicates the number of billing cycles the customer has already been charged.

`current_start`
: `integer` Indicates the start time of the current billing cycle of a Subscription.

`current_end`
: `integer` Indicates the end time of the current billing cycle of a Subscription.

`ended_at`
: `integer` The Unix timestamp of when the Subscription has completed its period or has been cancelled midway.

`charge_at`
: `integer` The Unix timestamp of when the next charge on the Subscription should be made.

`auth_attempts`
: `integer` The number of times the charge for the current billing cycle has been attempted on the card.

`expire_by`
: `integer` The Unix timestamp that indicates till when the customer can make the authorisation payment. For example, `1581013800`. The default value is 30 years. Do not pass any value if you do not want to set an expiry date.

`addons`
: `array of objects` Array that contains details of any upfront amount you want to collect as part of the authorisation transaction.

    `item`
    : `array` Details of the upfront amount you want to charge your customer.

        `name`
        : `string` A name for the upfront amount you want to charge the customer. For example, `Delivery Fee`.

        `amount`
        : `integer` The upfront amount in the currency subunit you want to charge the customer. For example ,`30000`.

        `currency`
        : `string` The currency in which you want to charge the customer. This has to match the plan currency. For example, `INR`.

`offer_id`
: `string` The unique identifier of the offer that is linked to the Subscription. You can obtain this from the Dashboard. For example, `offer_JHD834hjbxzhd38d`.

`notes`
: `object` Notes you can enter for the contact for future reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Gym Membership Plan`.

`short_url`
: `string` URL that can be used to make the authorisation payment. For example, `https://rzp.io/i/PWtAiEo`.

`has_scheduled_changes`
: `boolean` Indicates if the Subscription has any scheduled changes. Possible values:
    - `true`: Subscription has scheduled changes.
    - `false`: Subscription does not have scheduled changes.

`schedule_change_at`
: `string` Represents when the Subscription should be updated. Possible values:
    - `now` (default): Updates the Subscription immediately.
    - `cycle_end`: Updates the Subscription at the end of the current billing cycle.

`remaining_count`
: `integer` Indicates the number of billing cycles remaining on the Subscription. For example, `2`.
