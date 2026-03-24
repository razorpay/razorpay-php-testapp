---
title: Understand Razorpay APIs
description: Explanation of Razorpay API structure and the various components such as HTTP methods, status codes, data types and parameter types. Details on versioning, rate limiting and pagination.
---

# Understand Razorpay APIs

Razorpay APIs provide businesses with a seamless way to accept payments, manage transactions, and automate financial workflows. Built on RESTful principles, they offer flexibility, scalability, and support for various payment methods. This guide will help you understand the fundamentals of Razorpay APIs, equipping you with the knowledge needed for a successful implementation.

## REST APIs

REST is an architectural style or design pattern for APIs. When a client request is made through a RESTful API, it transfers a representation of the state of the requested resource. Web services that follow the REST architectural style are called RESTful web services.

A RESTful web application exposes information in the form of information about its resources. It also enables the client to take actions on those resources, such as creating new resources (for example, creating a new user) or changing existing resources (for example, editing a post).

## Resources

A resource is any piece of data that an API can provide, modify, or interact with. It represents an entity or object, such as a customer, payment, order, invoice, or refund.

Each resource is identified by a unique URL (endpoint) and is typically manipulated using HTTP methods.

## HTTP Methods

HTTP defines a set of request methods, also known as HTTP verbs, to indicate the desired action for a given resource. 

Given below is the list of methods commonly adopted by Razorpay APIs:

Verb | Description | Example
---
GET | Requests a representation of the specified resource. Requests using GET should only retrieve data. | [Fetch all payments received by you](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments)
---
POST | Submits an entity to the specified resource, often causing a change in state or side effects on the server. | [Create a Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md#create-payment-link)
---
PUT | Replaces all current representations of the target resource with the request payload. | [Edit customer details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#edit-customer-details)
---
DELETE | Deletes the specified resource. | [Delete an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices.md#delete-an-invoice)
---
PATCH | Applies partial modifications to a resource. | [Update Order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#update-order)

  
### Example

     Use the Razorpay Payments API to fetch specific payment (the resource) details. The API response returns the payment state, including payment amount, currency, payment method and more. The representation of the state can be in a JSON format.

      /payments/:id

      

      

      ```json: Response
      {
        "id": "pay_DG4ZdRK8ZnXC3k",
        "entity": "payment",
        "amount": 5000,
        "currency": "",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": true,
        "description": "Test Transaction",
        "card_id": "card_LPpN6ubeosLH4g",
        "card": {
          "id": "card_LPpN6ubeosLH4g",
          "entity": "card",
          "name": "",
          "last4": "0153",
          "network": "Visa",
          "type": "debit",
          "issuer": null,
          "international": false,
          "sub_type": "consumer",
          "token_iin": null
        },
        "bank": null,
        "wallet": null,
        "email": "",
        "contact": "",
        "notes": {
          "address": "Corporate Office"
        },
        "fee": 100,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "auth_code": "878694"
        },
        "created_at": 1678452635
      }
      ```
    

## HTTPS Status Codes

HTTP response status codes indicate whether a specific HTTP request is successfully completed. Responses are grouped into five classes:

- Informational responses (100–199)
- Successful responses (200–299)
- Redirection messages (300–399)
- Client error responses (400–499)
- Server error responses (500–599)

Refer to [Mozilla docs](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status) to know about status codes. Let us look at the success and error response status codes.

  
### Success Responses

     Given below is the list of the most commonly encountered success responses:

      
      Status Codes | Description
      ---
      **201 Created** | The request succeeded, and a new resource was created. This is typically the response sent after POST requests or some PUT requests.
      ---
      **202 Accepted** | The request has been received but not yet acted upon. It is non-committal since there is no way in HTTP to send an asynchronous response later indicating the outcome of the request. It is intended for cases where another process or server handles the request or batch processing.
      
    

  
### Error Responses

     Following is the list of the most commonly encountered error responses:

      
      Status Codes | Description
      ---
      **400 Bad Request** | The server cannot or will not process the request due to something that is perceived to be a client error.
      ---
      **401 Unauthorized** | Although the HTTP standard specifies "unauthorized", semantically, this response means "unauthenticated". That is, the client must authenticate itself to get the requested response.
      ---
      **404 Not Found** | The server can not find the requested resource. In the browser, this means the URL is not recognised. In an API, this can also mean that the endpoint is valid, but the resource itself does not exist. Servers may also send this response instead of 403 Forbidden to hide the existence of a resource from an unauthorised client. This response code is probably the most well known due to its frequent occurrence on the web.
      ---
      **429 Throttling Error** | The server is processing too many requests at once and is unable to process your request. Retry the request after some time. Know more about [Rate Limiting](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#rate-limits).
      ---
      **500 Internal Server Error** | The server has encountered a situation it does not know how to handle.
      ---
      **502 Bad Gateway** | This error response means that the server got an invalid response while working as a gateway to get a response needed to handle the request.
      ---
      **503 Service Unavailable** | The server is not ready to handle the request. Common causes are a server that is down for maintenance or is overloaded. 
      ---
      **504 Gateway Timeout** | This error response is given when the server acts as a gateway and cannot get a timely response.
      
    

## Parameter Types

Following table lists the various parameter types with examples:

Parameter Type | Description | Example
---
Query | Parameters appended to the URL in GET requests to filter or modify data. | `?count=5`
---
Path | Parameters included in the URL path to specify a resource. | `/payments/{payment_id}`
---
Request | Parameters sent in the request body, typically in JSON format, for creating or updating resources. | `{ "amount": 5000 }`
---
Response | Parameters returned in the API response, providing information about the requested resource. | `{ "id": "pay_29QQoUBi66xm2f", "status": "captured" }`

The following images highlight the different types of API parameters.

![API Path and Query Parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/api-path-query-parameters.jpg.md)

![API Path and Request Parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/api-path-request-parameters.jpg.md)

## Data Types

Razorpay APIs use standard data types to represent different kinds of information in API requests and responses. The following table outlines the primary data types used:

Data Type | Description | Example
---
String | A sequence of characters. Used for textual data, such as IDs, names, and descriptions. | `pay_29QQoUBi66xm2f`
---
Integer | A whole number without decimals. Used for values like amount, timestamps and counts. | `1623456789` (Unix timestamp)
---
Float/Decimal | A number with decimal precision. Used for amounts and fees. | `499.99`
---
Boolean | A value that is either `true` or `false`. Used for flags such as payment status. | `true`
---
Array | A list of values, typically enclosed in square brackets. | `["card", "upi", "netbanking"]`
---
Object | A collection of key-value pairs enclosed in curly braces. Used for structured data. | `{"name": "Gaurav Kumar", "email": "gaurav@example.com"}`
---
Entity | The name of the API resource. | `"entity": "invoice"`

## Conventions

Following are some conventions followed in Razorpay APIs:

### Entity

All Razorpay API responses carry this attribute with the value being the name of the API resource. For example, `"entity: "order"`. There are some common attributes for every entity.

`entity`
: `string` Indicates the type of the entity.

`id`
: `integer` A unique identifier of the entity.

In an entity, the attributes can be used to make entity-specific API calls. For example, you can fetch the payment ID from the `order.paid` webhook and use it to initiate a refund for that payment.

### Collection

A list of objects/entities is called collection. Usually, when fetching an API resource using the GET method, multiple entities are expected in the result. In this case, it is returned in a collection form. For the `collection entity`, the following parameters are common.

`entity`
: `string` Indicates the type of the entity. For example, `collection`.

`count`
: `integer` Indicates the number of `items` are returned. For example, `2`.

`items`
: `array` The list of entities.

### Notes

The `notes` object is a set of key-value pairs that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

The majority of the entities allow the `notes` object to store additional information and preserve data relevant to your integration. Razorpay does not use it for any operational purposes.

You can store the notes related to:
-  Billing or shipping address of the initiated payment.
-  Reference id generated for an order.

### Identifier

Razorpay attributes are uniquely identified by their identifier which is mostly present in the attribute `id`. The identifier is of 14 characters, alphanumeric and case-sensitive. 

## Response Body

When you make a request to the Razorpay API, the server responds with a JSON object containing relevant data. The response body structure varies depending on the API endpoint and the type of request.

![API Response Parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/api-conventions-response-parameters.jpg.md)

## Versioning

All Razorpay APIs are backwards-compatible. If an API or its parameters are deprecated, we add a warning note for the same for a specific period of time.

## Rate Limiting

Razorpay uses a request **Rate Limiter** to limit the number of requests received by the API within a time frame. Rate Limiter helps maintain system stability during heavy traffic loads.

- While integrating with any APIs, watch for HTTP status code 429 and build the retry mechanism based on the requirement.
- Use an exponential backoff/stepped backoff strategy to reduce request volume and stay within the limit.
- Add some randomisation within the backoff schedule to avoid the [thundering herd effect](https://en.wikipedia.org/wiki/Thundering_herd_problem).

## Pagination

Usually, when you make calls to the Razorpay APIs, there will be a large volume of responses. You can paginate the results to ensure that these responses are easier to handle, using a combination of the query parameters given below to receive a specific number of records in the API response.

`from`
: `integer` Timestamp, in Unix, after which the entities are created.

`to`
: `integer` Timestamp, in Unix, before which the entities are created.

`count`
: `integer` Number of entities to fetch. Default is 10. This can be used for pagination, in combination with `skip`.

`skip`
: `integer` Number of entities to skip. Default is 0. This can be used for pagination, in combination with `count`.

  
### Example

     If you want to get information on all the payments received from customers, the result could be a massive response with hundreds of payments.
    

### Related Information

- [Authentication](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md)
- [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)
- [Best Practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/best-practices.md)
- [Glossary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/glossary.md)
