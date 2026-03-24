---
title: Create a Standard Payment Link
description: Create a Standard Payment Link using this endpoint.
---

# Create a Standard Payment Link

## Create a Standard Payment Link

Use this endpoint to create a Payment Link using basic details such as amount, expiry date, reference id, description, customer details and so on.

- **Basic Payment Links** 

These are regular Payment Links, which are not customised.

- **Customised Payment Links** 

You can [customise Payment Links](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-links/customise.md) as per your business requirements.

> **INFO**
>
> 
> **Handy Tips**
> 
> As per Razorpay's updated security policy, even if the customer's email address and phone number are provided while creating the Payment Link, these details are not auto-populated on the Checkout section of the Payment Link hosted page. The customer will have to enter these details manually while making the payment.
> 

- After successful completion of the payment, customers can be redirected to a specific URL using the `callback_url` and `callback_method` parameters. Know more about how to use [these paramaters](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/payment-links/#using-callback-url-parameter.md).

- Verify the `razorpay_signature` parameter to validate that it is authentic and sent from Razorpay servers. Know more about how to [Verify Signature](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-links/apis/#verify-signature.md).

### Request

@include payment-links-v2/create-standard

### Response

@include payment-links-v2/create-standard-res

### Parameters

@include payment-links-v2/create-req

### Parameters

@include payment-links-v2/create-res

### Errors

The \{input field\} is required
* code: 4xx
* description: A mandatory field is empty.
* solution: Ensure all mandatory fields and values are present.

wrong input fields sent.
* code: 400
* description: When wrong input fields are sent during Payment Link creation.
* solution: Ensure that the input fields are added correctly. Refer to these [request parameters](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/payment-links#request-parameters.md) on how to add correct input fields.

payment link creation with reference ID already attempted
* code: 400
* description: An existing reference id has been passed.
* solution: Ensure that a unique reference id is used for all Payment Links.

UPI Payment Links is not supported in Test Mode. Please experience the product in Live Mode.
* code: 400
* description: The UPI link parameter has been passed with the Test API keys.
* solution: Ensure that you use [Live API keys](/api/authentication#live-mode-api-keys) while passing UPI links.

upi is currently supported only in indian currency
* code: 400
* description: Occurs when you try to create a UPI Payment Link using an international currency.
* solution: Ensure that you create a UPI payment link only in indian currency.

partial payment not supported in upi link
* code: 400
* description: Occurs when you try to create a UPI Payment Link with partial payments enabled.
* solution: Please do not enable partial payments for UPI Payment Links. 

timestamp must be atleast 15 minutes in future
* code: 400
* description: The epoch time passed is less than 15 minutes from the current time.
* solution: The `close_by` time should be more than 15 minutes from the current time.

Invalid access: Cannot create a payment link in live mode, as live mode is disabled for merchant.
* code: 400
* description: Occurs when you try to create a Payment Link in Live mode, but live mode is disabled for you
* solution: Raise a request to our [support team](https://razorpay.com/support/) to get live mode enabled for you.

Invalid access: Cannot create a payment link, as Merchant is Suspended.
* code: 400
* description: Occurs when you try to create a Payment Link when you have been been suspended.
* solution: Raise a request to our [support team](https://razorpay.com/support/) to be reinstated.

value: the length must not be greater than 255.
* code: 400
* description: When the notes length is greater than 255 characters during Payment Link creation.
* solution: Please create a payment link with notes values less than 255 characters.
