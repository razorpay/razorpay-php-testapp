---
title: Error Reasons
description: Check the error reasons and take appropriate actions.
---

# Error Reasons

All the possible values for the `reason` parameter in the error response along with their explanation and the next best action are shown below.

Reason | Explanation | Next Steps
---
`amount_less_than_minimum_amount` | Amount in the payment request is less than the minimum amount. Transacting through some banks have fixed fees. If the payment amount is less than the fixed fee then this error shows up. | Please make sure that the payment amount is more than the minimum fees associated with the bank.
---
`authentication_failed` | The payment failed as 3D secure, or OTP authentication failed. This could happen if the user cancels the payment on the authentication (OTP submit) screen or enters incorrect authentication details such as OTP. | The customer must enter correct authentication details to complete the payment.
---
`authorisation_declined_by_psp` | PSP app has rejected the authorisation request. This can happen when there is an issue/downtime with the PSP or there's an issue with the customer's VPA. | Recheck the customer's VPA and retry. If this is recurring, then the customer can choose another PSP app and retry.
---
`bank_account_invalid` | The bank account is not valid. The customer or bank could have closed the account. | The customer must try using a valid bank account or another method.
---
`bank_account_validation_failed` | The third party validation failed as the given bank account details were incorrect or could not be verified. | The customer should check the bank account details provided and try again.
---
`bank_cutoff_in_progress` | Bank CBS cutoff is in progress. This is a periodic event at the bank's end. | The customer must retry.
---
`bank_not_available` | Bank is not available due to a downtime or a technical issue. | The customer must retry.
---
`bank_not_enabled` | The selected bank to complete the transaction is not enabled for your business. | Please reach out to Razorpay to enable the selected bank.
---
`bank_technical_error` | The issuing bank was facing technical problems at the moment the payment was attempted. This usually occurs when the Core Banking System encounters a technical error while processing the payment. | The customer must try using another bank account or another method.
---
`beneficiary_account_does_not_exist` | An issue with the beneficiary account which doesn't exist. | Please reach out to Razorpay.
---
`beneficiary_account_dormant` | An issue with the beneficiary account which is dormant. | Please reach out to Razorpay.
---
`capture_failed` | Payment was authorized by the bank but the gateway failed to capture it due to some error. | The customer must retry the payment.
---
`card_declined` | Issuer Bank can decline the card due to multiple checks at their end. The exact reason in this case is not shared with Razorpay. Customer needs to reach out to the issuing bank. | The customer can reach out to Issuer Bank to get more details.
---
`card_expired` | The customer is making the payment with an expired card. | The customer must use a different card or method.
---
`card_network_not_enabled` | The card network through which payment was being attempted is not enabled for your business. For example, payment being tried through Amex credit card and the same is not enabled for your business. | Reach out to Razorpay to get the required card network enabled.
---
`card_not_enrolled` | If the card is not enrolled, this means that either the issuing bank (of the card) does not support 3DS or the card holder has not yet registered for the 3D secure service. | The customer must enroll the card with the issuer and retry the payment or use a different card or method.
---
`card_number_invalid` | The customer has entered an incorrect card number which is not part of any BIN/ IIN. | The customer must enter the correct card number.
---
`card_type_invalid` | The customer is using an unsupported card type to complete the payment. For example, mutual fund purchases are not allowed via credit cards. | The customer must use the correct card type to complete the payment.
---
`collect_on_mcc_blocked` | NPCI blocks collect requests on certain [MCCs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay.md#android). | Please retry using intent flow.
---
`collect_request_pending` | Collect Request is pending. Customer has not actioned on it or the callback is not yet received by the acquirer. | The customer has to approve the collect request.
---
`compliance_violation` | Any compliance violation at the customer or merchant level. | 
- If the risk check failed at the customer level, the customer can reach out to their bank to get more details. 
- If the risk check failed at the merchant level, please reach out to Razorpay.
This information will be available in the "source" parameter.
---
`credit_limit_exceeded` | The customer has exceeded the credit limit extended to him. This error occurs in Cardless EMI payments. | The customer must retry using a different payment method.
---
`credit_limit_expired` | The credit limit for the customer has expired. This error occurs in Cardless EMI payments.	| The customer must retry using a different payment method.
---
`credit_limit_inactive` | The credit limit for the customer is inactive. This may be due to pending action from the customer's end. This error occurs in Cardless EMI payments. | The customer must activate the credit limit or retry using a different payment method.
---
`credit_limit_not_approved` | The credit limit for the customer is not approved. This error occurs in Cardless EMI payments. | The customer must retry using a different payment method.
---
`credit_not_permitted` | The beneficiary bank has not allowed the credit to happen into the merchant's account. This can be because of the TPV account mismatch or an issue at the beneficiary bank. | The customer should check their bank account details and retry.
---
`credit_failed` | The beneficiary bank has not allowed the credit to happen into the merchant's account. This can be because of TPV account mismatch or an issue at the beneficiary bank. | The customer should check their bank account details and retry.
---
`debit_declined` | The customer bank has declined the debit request. One of the reasons can be because of the account being blocked. | The customer has to check with their bank.
---
`deemed_transaction` | This is the case of a deemed transaction wherein the status of the transaction is not known to the acquirer and the status will be known on the next day. | Please check the status after some time.
---
`debit_instrument_blocked` | The customer is using a blocked card to complete the payment. The card could have been blocked by the issuer or by customers themselves. | The customer must retry with a different card or method.
---
`debit_instrument_inactive` | The customer is using an inactive or frozen card to complete the payment. The card could have been marked inactive by the issuer or by customer themselves. | The customer must retry using a different card or method to complete payment.
---
`duplicate_refund_id` | Two refunds with the same Refund ID have been initiated. | Please recheck the refund ID and retry.
---
`duplicate_request` | A payment initiation request with the exact same parameters was passed to the gateway. This can be an integration issue with the merchant. | Please check the payment parameters and retry.
---
`duplicate_rrn_found` | A payment with the same RRN is found. A very rare case but possible as the RRN is not unique. This is a rare and temporary issue which can be fixed by a retry. | The customer must retry.
---
`emi_greater_than_max_amount` | The EMI amount is greater than the maximum amount allowed for the customer. This error occurs in Cardless EMI payments. | The customer must use a different EMI plan or retry using a different method.
---
`emi_plan_unavailable` | The customer-selected EMI plan is no longer supported by the EMI provider. This error occurs in Cardless EMI payments. | The customer must use a different EMI plan or retry using a different method.
---
`funds_blocked_by_mandate` | This is an error for One time Mandate product. Funds are blocked and customer is trying to access these funds via payment. | The customer should add more funds or release their mandate to complete the transaction.
---
`funds_blocked_by_mandate` | This is an error for One time Mandate product. Funds are blocked and customer is trying to access these funds via payment. | The customer should add more funds or release their mandate to complete the transaction.
---
`gateway_technical_error` | Payment failed due to a technical error at the gateway. This usually occurs when the gateway server encounters a technical error while processing the payment. | Please retry with a different payment method or retry after some time.
---
`incorrect_atm_pin` | Some banks ask for Debit card information for authentication. If the customer enters the ATM pin incorrectly, this error is thrown during the UPI registeration process.
Note: This is a very rare error code in payment transactions. | The customer must retry with the correct ATM PIN.
---
`incorrect_card_details` | This is a generic error message when a customer has entered incorrect card details to complete the payment. The customer has to enter multiple values like cardholder name, expiry date, cvv to complete the payment. | The customer must use the correct card details to complete the payment.
---
`incorrect_card_expiry_date` | The customer has entered an incorrect expiry date of the card. | The customer must enter the correct expiry date of the card.
---
`incorrect_cardholder_name` | The customer has entered an incorrect name of the card holder. | The customer must enter the correct name of the card holder.
---
`incorrect_cvv` | The customer has entered an incorrect CVV to complete the payment. | The customer must retry with the correct CVV.
---
`incorrect_otp` | The customer has entered an incorrect OTP to complete the payment. | The customer must retry and enter the correct OTP.
---
`incorrect_pin` | The customer has entered an incorrect PIN to complete the payment. | The customer must retry with the correct PIN.
---
`input_validation_failed` | Payment failed due to wrong request or input sent in the payment request. This is also seen while creating a payment with incorrect parameter values on the Dashboard. | Rectify the validation issues and try again. Check the error description and field parameters for more information about the error. 
Check your integration/payment request or reach out to Razorpay. Refer to the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
---
`insufficient_funds` | The customer does not have sufficient funds in the account to complete the payment. | The customer must retry with a different card or method.
---
`international_transaction_not_allowed` | International transactions are not enabled for your account or for a specific product. Refer to the error `description` parameter for more details.|  to get international transactions enabled for the product or account.
---
`invalid_amount` | Amount or currency passed in the payment request is not supported or invalid. This can arise when you pass a different variable type in the amount field or pass an unsupported amount value. | Check your integration and payment request.
---
`invalid_currency` | The currency type for the request you are sending is not enabled or not supported for your business. For example, you are attempting a payment in British pound when international currency is not enabled for your account. | 
Reach out to Razorpay to enable the currency or get more information about the supported currencies.
---
`invalid_device` | UPI mandates that all transactions must at least be 2FA using a mobile device(the device fingerprint) as one factor and the UPI PIN as the second. This error occurs when a user tries to complete the payment using an unregistered device to send or receive payments using that account. | The customer must first complete the device binding process and try again.
---
`invalid_email` | The customer has provided an invalid email. | The customer must retry using the correct email.
---
`invalid_mobile_number` | The customer used an unregistered or invalid mobile number to complete the transaction. This error occurs in Wallet payments.	| The customer must use the registered mobile number with the issuer to complete the transaction.
---
`invalid_order_id` | Order ID required in the payment request is either missing or is invalid. Order ID is mandatory for every payment. | Make sure correct order ID is always passed while initiating a new payment.
---
`invalid_response_from_gateway` | The response received from the gateway is invalid. | The customer must retry with the correct ATM PIN.
---
`invalid_request` | The request is invalid because of the information that the merchant has passed. | Please check the payment request and retry.
---
`invalid_user_details` | The customer does not exist. | The customer must use valid credentials.
---
`invalid_vpa` | The customer is using an invalid VPA or an unregistered VPA to complete the payment. | The customer must use a valid VPA to complete the payment.
---
`issuer_technical_error` | Payment failed due to a technical error at the issuer. This usually occurs when the gateway server encounters a technical error while processing the payment. | Please retry with a different payment method or retry after some time.
---
`issuer_technical_error` | A technical error at the issuer (UPI). | The customer must retry.
---
`live_mode_not_enabled` | Live mode is not enabled for your business. This error generally arises when you use test mode keys to make a live payment. | Generate the live mode keys in Dashboard and use them in your Integration.
---
`mandate_creation_declined` | Mandate creation failed. This is applicable for UPI Autopay and UPI OTM. | The customer must retry.
---
`mandate_creation_expired` | Mandate creation expired. | The customer must retry.
---
`mandate_creation_failed` | Mandate creation declined by an entity. | The customer must retry.
---
`mandate_creation_timeout` | Mandate creation timed out. | The customer must retry.
---
`merchant_not_activated` | Merchant is not activated with the gateway. An issue with the merchant's terminal/account. | Please reach out to Razorpay.
---
`mismatch_in_transaction_details` | The merchant has not passed the transaction details correctly. | Reach out to Razorpay to get the required card network enabled.
---
`mobile_number_invalid` | The customer is using an invalid or an unregistered mobile number to complete the payment. This means that the mobile number is not mapped to the bank account. | The customer should check the mobile number mapped to their UPI account and reach out to bank to get the correct mobile number mapped.
---
`order_already_paid` | There can only be one successful payment for each order ID. This error arises when you are trying to use an order ID where a payment is already completed. | Check for order status before initiating a new payment attempt on the order. You can also evaluate using a different order ID for each payment.
---
`order_payment_method_mismatch` | This error arises when the method mentioned in the order request is different from the method mentioned in the payment request. | Do not pass method in the create order request.
---
`order_amount_mismatch` | This error arises when the amount mentioned in the order request is different from the amount mentioned in the payment request. | Please make sure that the same amount is passed in both payment and order request.
---
`otp_attempts_exceeded` | The customer has entered the wrong OTP multiple times and exceeded the limit. Some issuers limit the number of OTP retries, beyond which the card is temporarily blocked. | The customer must retry using a different card or method.
---
`otp_expired` | The customer has entered an expired OTP. | The customer must generate OTP again and retry the payment.
---
`payment_amount_tampered` | The payment amount has been tampered. | The customer must retry with the correct amount.
---
`payment_cancelled` | The customer has explicitly cancelled the payment due to which the authentication failed to complete. | The customer must retry to complete the payment.
---
`payment_collect_request_expired` | The UPI collect request time period has expired. For example, in most collect requests the expiry period is 5-10 minutes within the payment has to be completed by the customer on the UPI app. If a customer fails to complete the payment during this time, the collect request is marked as expired and the payment fails. | The customer must retry and complete the payment within the expiry time.
---
`payment_declined` | Issuer Bank or Gateway has declined the payment due to business or technical reasons. The exact reason in this case is not communicated to Razorpay. | Customer must reach out to the issuer bank.
---
`payment_declined_due_to_high_traffic` | Primarily occurs in the case of high TPS scenarios like IPL wherein the bank is unable to serve requests. | The customer must retry.
---
`payment_failed` | Payment processing failed due to error at bank or wallet gateway. No specific error code received from gateway in this case. | Please retry with a different payment method.
---
`payment_method_not_enabled` | The selected payment method is not enabled for your business. This error occurs when your customer tries to complete a transaction using a method that is not enabled for you. | Reach out to Razorpay to enable payment method.
---
`payment_method_not_enabled` | UPI is not enabled however merchant has hit the UPI Payment request on API. | Please enable the payment method.
---
`payment_pending` | The payment was marked as pending by the bank or the gateway. Pending transactions may later on become authorized. This is known as late authorization. | The customer must wait for some time and retry the payment.
---
`payment_pending_approval` | The payment is currently pending approval by the concerned authority as part of the maker-checker flow. | Please reach out to the approver in your organization to get the transaction approved.
---
`payment_risk_check_failed` | Payment declined due to risk checks. Risk checks are performed by Razorpay, Gateway and Issuer Bank. The source parameter would give additional clarity where the risk check failed. | The customer must retry with a different card or method.
---
`payment_session_expired` | The payment session expired as the payment was not completed within the time by the customer. This is mostly due to an inactive payment window. | The customer must retry to complete the payment within the time.
---
`payment_timed_out` | The customer did not complete the transaction within the specified time. This error may also happen when no response is received from the gateway. | The customer must retry and complete the transaction within the time.
---
`pin_attempts_exceeded` | The customer has entered the wrong PIN multiple times and exceeded the limit. Some issuers limit the maximum number of PIN retries beyond which the card is temporarily blocked. | The customer must retry using a different card or method.
---
`pin_not_set` | There is no PIN set by the customer for the UPI account. | The customer must set the UPI PIN first, and then retry to complete the payment.
---
`psp_app_ not_available` | PSP app is not available. This can be because of a downtime with the PSP. | The customer must retry with another PSP app.
---
`psp_app_not_supported` | UPI App is not supported. This is a rare error used when a particular app is blacklisted. | Please choose another PSP app and try again.
---
`psp_not_available` | PSP is not available due to a downtime at their end. | The customer must choose another PSP app and retry.
---
`psp_not_available` | PSP is not available due to a downtime at their end. | The customer must choose another PSP app and retry.
---
`psp_not_registered` | The PSP is not registered on the customer's device. | The customer must retry with another PSP app.
---
`record_not_found` | A record of a payment is not found at the bank. This usually happens when a status check call is hit for intent payments for which the status check call is not hit. | The customer must retry.
---
`recurring_payment_not_enabled` | This error arises when you are trying to process a recurring payment when recurring payments are not enabled for your business. | Reach out to Razorpay to enable the recurring payment.
---
`refund_limit_crossed` | Refund amount limit crossed. | Please recheck the refund amount and retry.
---
`reqauth_mandate_not_acknowledged` | PSP did not respond to the authorisation request for the mandate. This can happen due to a downtime with a PSP. | The customer must retry.
---
`request_timed_out` | The request timed out. | The customer must retry.
---
`server_error` | Technical error at Razorpay's server. This usually occurs when there is some server issue at Razorpay's end. | Please retry after some time or reach out to Razorpay.
---
`transaction_daily_count_exceeded`  | The customer has exceeded the maximum number of transactions that can be performed daily for his card. | The customer must try after 24 hours or using a different card or another method.
---
`transaction_daily_limit_exceeded` | The customer has exceeded the daily transaction limit set on the card. Some of the cards allow customers to set a limit or have a default limit set. | The customer must retry using a different instrument or wait 24 hours to complete the payment.
---
`transaction_limit_exceeded` | The customers have exceeded the credit or debit limit set on their cards. This error usually arises while doing high value transactions. | The customer must retry using a different bank's card or method.
---
`transaction_frequency_limit_exceeded` | NPCI has a transaction limit both on the amount and the frequency per day. Customer has exceeded this limit. | Please retry using another payment method.
---
`transaction_on_vpa_restricted` | Transaction on this VPA has been temporarily/permanently blocked by the PSP. | The customer to retry with another UPI ID.
---
`upi_app_technical_error` | Technical error occurred at the customer’s PSP due to which the payment failed.	| The customer must retry the payment. If the error persists then the customer should use a different psp to complete the payment.
---
`upi_autopay_not_supported_on_psp` | UPI Autopay is not supported on PSP. | Please retry with another PSP app.
---
`upi_collect_not_enabled` | UPI Collect flow is not enabled however merchant has hit the Collect payment request on API. | Please enable collect flow.
---
`upi_intent_not_enabled` | UPI Intent flow is not enabled however merchant has hit the Intent Payment request on API. | Please enable intent flow.
---
`user_not_eligible` | The customer failed the eligibility check and is not eligible for credit. This error occurs in Cardless EMI payments. | The customer must retry using a different payment method.
---
`user_not_registered_for_netbanking` | The customer's bank account is not registered for netbanking. | The customer should register their account with the issuing bank for netbanking.
---
`vpa_resolution_failed` | The UPI network failed to validate the VPA. This is a technical error when the resolution service of the NPCI fails. | The customer must retry using a different bank account or method.
---
`verification_failed` | Verification of the payment using the status check API has failed. | This is a temporary error. The customer must retry.

### Related Information

To understand the error codes, refer to the [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) section.

To understand error codes specific for each payment method supported by Razorpay, refer to the payment flows described in the [Payment Method Error Parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/payment-methods-error-parameters.md) section.
