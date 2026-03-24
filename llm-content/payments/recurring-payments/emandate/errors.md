---
title: Handle Errors
description: Know about errors returned in the API responses from the different payment methods used for Recurring Payments.
---

# Handle Errors

Razorpay aims to make every transaction successful for its customers. However, in the financial ecosystem errors might still occur because of intermittent communication and technical issues at multiple hops. Hence, it becomes critical for businesses to identify the `source` of the error, the payment `step` where the error occurred and the `reason` that caused the error. In short, you can identify the **who**, **where** and **why** of every payment error. This enables you to minimize or fix errors to reduce any losses.

With the new error codes, Razorpay helps you build your own logic and take remedial action at your end, wherever possible. Deriving these insights can help your business to:
- Map and analyze top failure reasons.
- Identify the source of failure. 

  Narrow down and understand if cause of the failure. Can be due to customer action or external factors (Razorpay, Gateway, Bank).
- Identify the payment step.
- Identify the exact reason of the failure.
- Handle actionable error codes.
- Avoid possible integration errors.
- Display valid responses to your customers.

## Error Response

All successful responses are returned with HTTP Status code 200. In case of failure, Razorpay API returns a JSON error response with the parameters that detail the reason for the failure.

The error response contains `code`, `description`, `field`, `source`, `step`, `reason` and `metadata` parameters that help you diagnose and solve the error.

```json: Sample Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Authentication failed due to incorrect otp",
    "field": null,
    "source": "customer",
    "step": "payment_authentication",
    "reason": "invalid_otp",
    "metadata": {
      "payment_id": "pay_EDNBKIP31Y4jl8",
      "order_id": "order_DBJKIP31Y4jl8"
    }
  }
}
```

### Response Parameters

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

    `payment_id`
    : `string` Unique identifier of the payment.

    `order_id`
    : `string` Unique identifier of the order associated with the payment.

## Error Parameters

There are certain error codes specific for each payment method supported by Razorpay. To understand the errors and their `reasons`, it is recommended to know the `source` (stakeholders) and the `steps` involved in the payment flows.

    
     The possible values for the `source` parameter for Emandate are listed below:

     -   `customer`
     -   `bank`
     -   `business`
     -   `internal`
     -   `gateway`
     -   `issuer_bank`
    
    
        The possible values for the `step` parameter, along with the description, are listed below:

        1. `payment_initiation`

            Your system initiates and sends the payment request to our server. Our server validates your request, creates the payment flow and forwards the request to the Gateway.

        1. `payment_authentication`

            The bank verifies the enrollment of the Emandate by asking customers to authenticate themselves.

        1. `payment_authorization`

            Once the customer has completed the authentication, the bank authorizes the release of the funds. The authorization status is communicated to the Gateway which in turn communicates the same to Razorpay.

    

## Error Reasons

Below are the possible values for the `reason` parameter in the error response, their explanation and the next best action to be taken in case of a failure.

## Emandate Registration

Reason | Explanation | Next Steps
---
`already_declined` | The bank has already declined a similar mandate registration attempt by the customer. NPCI blocks retry attempts to avoid duplicate requests to the bank. | The customer must retry after 24 hours.
---
`authentication_failed` | The customer has entered incorrect card or bank login details. | The customer must use the correct card details to complete the registration.
---
`bank_account_invalid` | The bank account is not valid. The customer or bank could have closed the account. | The customer must try using a valid bank account or another method.
---
`bank_account_validation_failed` | The third party validation failed as the given bank account details were incorrect or could not be verified. | The customer should check the bank account details provided and try again.
---
`bank_technical_error` | The destination bank was facing technical problems when the payment was attempted. This usually occurs when the Core Banking System encounters a technical error while processing the payment. | The customer must try using another bank account or try after sometime.
---
`card_expired` | The customer is making the payment with an expired card. | The customer must use a different card or method.
---
`card_number_invalid` | The customer has entered an incorrect card number which is not part of any BIN/ IIN. | The customer must enter the correct card number.
---
`debit_instrument_blocked` | The customer is using a blocked card or account to complete the registration. The account or card could have been blocked by the bank or by customers themselves. | The customer must retry with a different method.
---
`debit_instrument_inactive` | The customer is using an inactive or frozen card to complete the payment. The card could have been marked inactive by the issuer or by customer themselves. | The customer must use a different card or method.
---
`duplicate_request` | A payment initiation request with the exact same parameters was passed to the gateway. The gateway is blocking duplicate requests. | The customer must retry after 30 min.
---
`gateway_technical_error` | Payment failed due to a technical error at the gateway. This usually occurs when the gateway server encounters a technical error while processing the payment. | The customer must retry after some time.
---
`incorrect_card_expiry_date` | The customer has entered an incorrect expiry date of the card. | The customer must enter the correct expiry date of the card.
---
`incorrect_cvv` | The customer has entered an incorrect CVV to complete the payment. | The customer must retry with the correct CVV.
---
`incorrect_otp` | The customer has entered an incorrect OTP to complete the payment. | The customer must retry and enter the correct OTP.
---
`incorrect_pin` | The customer has entered an incorrect PIN to complete the payment. | The customer must retry with the correct PIN.
---
`insufficient_funds` | The customer does not have sufficient funds in the account to complete the payment. | The customer must retry with sufficient balance in account.
---
`joint_account_not_allowed` | The customer has tried to register the mandate on a joint account which is not allowed. Banks usually allow mandates to be registered on sole ownership accounts only. | The customer must retry with a different account.
---
`otp_attempts_exceeded` | The customer has entered the wrong OTP multiple times and exceeded the limit. Some issuers limit the number of OTP retries, beyond which the card is temporarily blocked. | The customer must retry using a different method or after some time.
---
`payment_cancelled` | The customer has explicitly cancelled the payment due to which the authentication failed to complete. | The customer must retry to complete the payment.
---
`payment_failed` | Destination Bank or Gateway has declined the payment due to business or technical reasons. The exact reason in this case is not communicated to Razorpay. | The customer must use a different method or retry after some time.
---
`payment_pending_approval` | The payment is currently pending approval by the bank. | Please wait for sometime for the payment status to be updated, or retry after sometime.
---
`payment_risk_check_failed` | Payment declined due to risk checks. Risk checks are performed by Razorpay, Gateway and Issuer Bank. The source parameter would give additional clarity where the risk check failed. | The customer must not proceed with the payment at this time.
---
`payment_timed_out` | The customer did not complete the transaction within the specified time. This error may also happen when no response is received from the gateway. | The customer must retry and complete the transaction within the time.
---
`server_error` | Technical error at Razorpay's server. This usually occurs when there is some server issue at Razorpay's end. | Please retry after some time or reach out to Razorpay.
---
`transaction_limit_exceeded` | The customers have exceeded the credit or debit limit set on their accounts. This error usually arises while doing high value transactions. | Please retry after informing the customer to update their transaction limits.
---
`user_not_registered_for_netbanking` | The customer's bank account is not registered for netbanking. | The customer should register their account with the destination bank for netbanking.

##  Subsequent Payments

Reason | Explanation | Next Steps
---
`bank_account_invalid` | The customer's bank account is either closed or no longer valid. The customer or bank could have closed the account. | The customer must re-register for the mandate.
---
`bank_account_validation_failed` | The bank could not validate the customer registration for debiting the customer. | Please retry after some time or reach out to Razorpay.
---
`bank_technical_error` | The destination bank was facing technical problems at the moment the payment was attempted. This usually occurs when the Core Banking System encounters a technical error while processing the payment. | Please retry after some time or reach out to Razorpay.
---
`debit_instrument_blocked` | Withdrawals on the customer's account are temprarily blocked by the bank. | The customer must reach out to their bank to get the account unblocked.
---
`debit_instrument_inactive` | Withdrawals on the customer's account are temprarily blocked by the bank. | The customer must reach out to their bank to get the account unblocked.
---
`gateway_technical_error` | Payment failed due to a technical error at the gateway. This usually occurs when the gateway server encounters a technical error while processing the payment. | Please retry after some time or reach out to Razorpay.
---
`incorrect_ifsc` | The bank IFSC code is no longer valid. | The customer must re-register for the mandate.
---
`input_validation_failed` | Payment failed due to wrong request or input sent in the payment request. This is also seen while creating a payment with incorrect parameter values on the Dashboard. | Rectify the validation issues and try again. Check the error description and field parameters for more information about the error. 
Check your integration/payment request or reach out to Razorpay. Refer to the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
---
`insufficient_funds` | The customer does not have sufficient funds in the account to complete the payment. | Please retry after asking the customer to add funds to their bank account.
---
`invalid_amount` | Amount or currency passed in the payment request is not supported or invalid. This can arise when you pass a different variable type in the amount field or pass an unsupported amount value. | Check your integration and payment request.
---
`mandate_not_active` | The registered mandate is no longer active. The customer or bank could have cancelled the mandate. | The customer must re-register for the mandate.
---
`payment_cancelled` | The customer has explicitly cancelled the payment. The customer could have given a cancellation instruction to their banks. | Please retry after informing the customer to remove the cancellation request.
---
`payment_declined` | Destination Bank or Gateway has declined the payment due to business or technical reasons. The exact reason in this case is not communicated to Razorpay. | Please retry after some time or reach out to Razorpay.
---
`payment_failed` | Destination Bank or Gateway has declined the payment due to business or technical reasons. The exact reason in this case is not communicated to Razorpay. | Please retry after some time or reach out to Razorpay.
---
`payment_mandate_not_active` | The registered mandate is not yet activated at the bank. Banks sometimes take longer to activate the mandates at their end. | Please retry after some time or reach out to Razorpay.
---
`payment_timed_out` | The bank where the mandate is registered could not debit the customer's account in time. | Please retry after some time or reach out to Razorpay.
---
`server_error` | Technical error at Razorpay's server. This usually occurs when there is some server issue at Razorpay's end. | Please retry after some time or reach out to Razorpay.
---
`transaction_limit_exceeded` | The customers have exceeded the credit or debit limit set on their accounts. This error usually arises while doing high value transactions. | Please retry after some time after informing the customer to update their transation limits.

### Related Information
- [Integrate Recurring Payments Using Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md)
- [Charge Customers During Registration - Use Cases and Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/charge-customer-during-registration.md)
- [Supported Banks and Apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/supported-banks.md)
- [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/apis.md)
