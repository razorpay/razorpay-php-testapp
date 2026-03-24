---
title: Payment Failure Analysis
description: Check for payment failures, reasons and the steps to resolve them.
---

# Payment Failure Analysis

Payments can fail for a variety of reasons. Failure analysis gives you a brief understanding of the various reasons a payment can fail. Let us look at some of the common reasons why a payment can fail.

There are 4 main reasons for payment failure:
- [Customer Drop-Offs](#customer-drop-offs)
- [Bank Failures](#bank-failures)
- [Business Failures](#business-failures)
- [Other Failures](#other-failures)

## Customer Drop-offs
This can happen due to various reasons such as customer cancellations, incorrect CVV, insufficient funds, and so on.

Reason | Explanation | Next Steps
---
`authentication_failed` | The customer has entered incorrect card details. | The customer must use the correct card details to complete the payment.
---
`card_not_enrolled` | If the card is not enrolled, this means that either the issuing bank (of the card) does not support 3DS or the card holder has not yet registered for the 3D secure service. | The customer must enroll the card with the issuer and retry the payment or use a different card or method.
---
`insufficient_funds` | The customer does not have sufficient funds in the account to complete the payment. | The customer must retry with a different card or method.
---
`payment_cancelled` | The customer has explicitly cancelled the payment due to which the authentication failed. | The customer must retry to complete the payment.
---
`payment_collect_request_expired` | The UPI collect request time has expired. For example, in most collect requests, the expiry period is 5-10 minutes, within which the payment has to be completed by the customer on the UPI app. If a customer fails to complete the payment during this time, the collect request expires and the payment fails. | The customer must retry and complete the payment within the expiry time.

## Bank Failures
In this case, the payment can fail because of the customer’s bank, UPI app, wallets and so on. Given below are few common errors which can be attributed to bank failures.

Reason | Explanation | Next Steps
---
`card_declined` | Issuer Banks can decline the card due to multiple checks at their end. The exact reason, in this case, is not shared with Razorpay. The customer needs to reach out to the issuing bank. | The customer can reach out to Issuer Bank to get more details.
---
`gateway_technical_error` | Payment failed due to a technical error at the gateway. This usually occurs when the gateway server encounters a technical error while processing the payment. | Please retry with a different payment method or retry after some time.
---
`payment_declined` | Issuer Bank or Gateway has declined the payment due to business or technical reasons. The exact reason in this case is not communicated to Razorpay. | The customer must reach out to the issuer bank.
---
`payment_failed` | Payment processing failed due to error at bank or wallet gateway. No specific error code received from gateway in this case. | Please retry with a different payment method.
---
`payment_timed_out` | The customer did not complete the transaction within the specified time. This error may also happen when no response is received from the gateway. | The customer must retry and complete the transaction within the time.

## Business Failures
Business failures are payment failures that occur due to the non-activation of payment methods and international payments.

Reason | Explanation | Next Steps
---
`input_validation_failed` | Payment failed due to wrong request or input sent in the payment request. This is also seen while creating a payment with incorrect parameter values on the Dashboard. | Rectify the validation issues and try again. Check the error description and field parameters for more information about the error. 
Check your integration/payment request or reach out to Razorpay. Refer to the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api.md).
---
`international_transaction_not_allowed` | International transactions are not enabled for your account or for a specific product. Refer to the error `description` parameter for more details.| Contact our [Support Team](https://razorpay.com/support) to get international transactions enabled for the product or account.
---
`invalid_amount` | Amount or currency passed in the payment request is not supported or invalid. This can arise when you pass a different variable type in the amount field or pass an unsupported amount value. | Check your integration and payment request.
---
`invalid_currency` | The currency type for the request you are sending is not enabled or not supported for your business. For example, you are attempting a payment in British pound when international currency is not enabled for your account. | 
Reach out to [Razorpay Support](https://razorpay.com/support/#request) to enable the currency or get more information about the supported currencies.

## Other Failures
Many payments fail for a good reason and do so to minimise the possibility of fraudulent payment. Other failures is a category where payments can fail because of fraud detection, internal Razorpay issues and so on.

Reason | Explanation | Next Steps
---
`bank_technical_error` | At the moment the payment was attempted, the Issuer Bank faced technical issues. This usually occurs when the Core Banking System encounters a technical error while processing the payment. | The customer must try using another bank account or another method.
---
`server_error` | Technical error at Razorpay's server. This usually occurs when there is some server issue at Razorpay's end. | Please retry after some time or reach out to [Razorpay Support](https://razorpay.com/support/#request).
---
`mobile_number_invalid` | The customer is using an invalid or an unregistered mobile number to complete the payment. This means that the mobile number is not mapped to the bank account. | The customer should check the mobile number mapped to their UPI account and reach out to bank to get the correct mobile number mapped.
---
`payment_risk_check_failed` | Payment declined due to risk checks. Risk checks are performed by Razorpay, Gateway and Issuer Bank. The source parameter would give additional clarity where the risk check failed. | The customer must retry with a different card or method.
