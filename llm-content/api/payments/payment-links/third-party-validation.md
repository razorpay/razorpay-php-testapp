---
title: Perform Third-Party Validation Using Payment Links
description: Use Razorpay Payment Links APIs to perform third-party validation of bank accounts provided by your customers.
---

# Perform Third-Party Validation Using Payment Links

## Perform Third-Party Validation Using Payment Links

Use this endpoint to comply with the regulatory guidelines in a manner such that the customers make payments only from their registered bank account. 

- TPV stands for Third Party Validation. This feature is made available only to businesses operating in Mutual fund, Securities or Brokerage sectors. 

- You can perform third party validation using Payment Links by passing the `options` parameter along with the Create Payment Links API request. Check the [use cases to perform TPV using Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/use-cases.md).

 to get this feature activated on your Razorpay account.

### Response

### Parameters

@include payment-links-v2/create-req

`options` _mandatory_
: `array` Options to configure the customer's bank account details in the Payment Link. Parent parameter under which the `order` child parameter must be passed.

    `order` _mandatory_
    : `array` The parameter under which the customer's bank account details must be configured to perform third party validation.

      `bank_account` _mandatory_
      : `array` Parent parameter under which the customer's bank account details must be passed.

          `account_number` _mandatory_
          : `string` The bank account number through which the customer is expected to make the payment.

          `name` _mandatory_
          : `string` The name of the account holder.

          `ifsc` _mandatory_
          : `string` The IFSC associated with the bank account through which the customer is expected to make the payment.

      `method` _mandatory_
      : `string` Use this parameter to control which payment methods must be shown on the Checkout. Possible values:
        - `netbanking`
        - `upi`

        
> **WARN**
>
> 
>         **Note**
> 
>         Do not pass this parameter if allowing customers to make payments using either `netbanking` or `upi` as the payment method.
>         

          `netbanking`
          : `boolean` Used to enable or disable `netbanking` as a payment method  the Checkout. Possible values are:
            - `true` (default): Displays netbanking on the Checkout.
            - `false`: Hides netbanking on the Checkout.

          `upi`
          : `boolean` Used to enable or disable `UPI` as a payment method on the Checkout. Possible values are:
            - `true` (default): Displays UPI on the Checkout.
            - `false`: Hides UPI on the Checkout.

### Parameters

@include payment-links-v2/create-res

### Errors

The api \{key/secret\} provided is invalid
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure that: - The API Keys are active and entered correctly.
- There are no white-spaces before or after the keys.

The \{input field\} is required
* code: 4xx
* description: A mandatory field is empty.
* solution: Ensure all mandatory fields and values are present.

wrong input fields sent.
* code: 400
* description: When wrong input fields are sent during Payment Link creation.
* solution: Ensure that the input fields are added correctly. Refer to these [request parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md#request-parameters) on how to add correct input fields.

payment link creation with reference ID already attempted
* code: 400
* description: An existing reference id has been passed.
* solution: Ensure that a unique reference id is used for all Payment Links.

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
