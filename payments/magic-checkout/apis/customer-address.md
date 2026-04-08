---
title: Customer Address
description: Upload customers' billing and shipping addresses in bulk using our API.
---

# Customer Address

Use this API to upload customers' billing and shipping addresses in bulk.

## Sample Code

 /customers/addresses 

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/customers/addresses \
-H 'content-type : application/json'
-d '{
  "contact": "+919000090000",
  "email": "gaurav.kumar@example.com",
  "shipping_address": {
    "name": "Gaurav Kumar",
    "line1": "125/12, Rajaji Street,",
    "line2": "Near Culverton Park",
    "zipcode": "560068",
    "city": "Bangalore",
    "state": "Karnataka",
    "tag": "home",
    "landmark": "Culverton Park",
    "primary": false
  },
  "billing_address": {
    "name": "Gaurav Kumar",
    "line1": "125/12, Rajaji Street,",
    "line2": "Near Culverton Park",
    "zipcode": "560068",
    "city": "Bangalore",
    "state": "Karnataka",
    "tag": "home",
    "landmark": "Culverton Park",
    "primary": false
  }
}'
```json: Success Response
{
  "shipping_address": {
    "entity_type": "customer",
    "entity_id": "HsEFUUDLtUqOy6",
    "id": "HsEFUWzQWEE8dG"
  },
  "billing_address": {
    "entity_type": "customer",
    "entity_id": "HsEFUUDLtUqOy6",
    "id": "HsEFUWzQWEE8dG"
  }
}
```json: Failure Response (500)
{
  "code": "SERVER_ERROR",
  "description": "The server encountered an error. The incident has been reported to admins."
}
```json: Validation Failure Response (400)
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The line2 must be between 5 and 255 characters.",
    "source": "business",
    "step": "payment_initiation",
    "metadata": {},
    "reason": "input_validation_failed",
    "field": "line2"
  }
}
```

### Request Parameters

`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's phone number.

`shipping_address` _mandatory_
: `object` The customer's shipping address details.

  `name` _mandatory_
  : `string` The customer's name.

  `line1` _mandatory_
  : `string` The customer's address.

  `line2` _optional_
  : `string` Additional line for the customer's address.

  `zipcode` _mandatory_
  : `string` The customer's ZIP code.

  `city` _mandatory_
  : `string` The name of the city.

  `state` _mandatory_
  : `string` The name of the state.

  `tag` _mandatory_
  : `string` The address tag. For example, `Home`, `Office`, and so on.

  `landmark` _optional_
  : `string` Nearest landmark to the delivery address. 

  `primary` _optional_
  : `boolean` Indicates whether this is the customer's primary shipping address. Possible values:
    - `true`: It is the customer's primary shipping address.
    - `false`: It is not the customer's primary shipping address.

`billing_address` _mandatory_
: `object` The customer's billing address details.

  `name` _mandatory_
  : `string` The customer's name.

  `line1` _mandatory_
  : `string` The customer's address.

  `line2` _optional_
  : `string` Additional line for the customer's address.

  `zipcode` _mandatory_
  : `string` The customer's ZIP code.

  `city` _mandatory_
  : `string` The name of the city.

  `state` _mandatory_
  : `string` The name of the state.

  `tag` _mandatory_
  : `string` The address tag. For example, `Home`, `Office`, and so on.

  `landmark` _optional_
  : `string` Nearest landmark to the delivery address. 

  `primary` _optional_
  : `boolean` Indicates whether this is the customer's primary billing address. Possible values:
    - `true`: It is the customer's primary billing address.
    - `false`: It is not the customer's primary billing address.

### Response Parameters

`shipping_address`
: `object` Details of the customer's shipping address.

    `entity_type`
    : `string` The name of the entity. Here, it is `customer`.
    
    `entity_id`
    : `string` The unique identifier of the entity. 
    
    `id`
    : `string` The unique identifier of the shipping address.

`billing_address`
: `object` Details of the customer's billing address.

    `entity_type`
    : `string` The name of the entity. Here, it is `customer`.
    
    `entity_id`
    : `string` The unique identifier of the entity. 
    
    `id`
    : `string` The unique identifier of the billing address.

### Validation Error Parameters

`error`
: `object` The error object.

  `code`
  : `string` Type of the error.

  `description`
  : `string` Descriptive text about the error.

  `field`
  : `string` Name of the parameter in the API request that caused the error.

  `source`
  : `string` The point of failure in the specific operation (payment in this case). For example, customer, business.

  `step`
  : `string` The stage where the transaction failure occurred. The stages can vary depending on the payment method used to complete the transaction.

  `reason`
  : `string` The exact error reason. It can be handled programmatically.

  `metadata`
  : `object` Contains additional information about the request.
