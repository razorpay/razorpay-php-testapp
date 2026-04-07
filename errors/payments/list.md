---
title: List of Errors
description: List of payment errors with descriptions and next steps.
---

# List of Errors

Below are the top error codes associated with various payment methods, along with their reasons, descriptions and steps for resolution.

## Bad Request Errors

Error Reason [columWidth="25"] | Detailed Error Description [columWidth="50"] | Next Steps [columWidth="25"]
---
amount_less_than_minimum_amount | Amount in the payment request is less than the minimum amount. Transacting through some banks have fixed fees. If the payment amount is less than the fixed fee then this error shows up. | Please make sure that the payment amount is more than the minimum fees associated with the bank.
---
authentication_failed | The payment failed as 3D secure, or OTP authentication failed. This could happen if the user cancels the payment on the authentication (OTP submit) screen or enters incorrect authentication details such as OTP. | The customer must enter correct authentication details to complete the payment.
---
bank_account_invalid | The bank account is not valid. The customer or bank could have closed the account. | The customer must try using a valid bank account or another method.
---
bank_account_validation_failed | The third party validation failed as the given bank account details were incorrect or could not be verified. | The customer should check the bank account details provided and try again.
---
bank_not_enabled | The selected bank to complete the transaction is not enabled for your business. | Please reach out to Razorpay to enable the selected bank.
---
bank_technical_error | The issuing bank was facing technical problems at the moment the payment was attempted. This usually occurs when the Core Banking System encounters a technical error while processing the payment. | The customer must try using another bank account or another method.
---
capture_failed | Payment capture has failed. | Please reach out to Razorpay.
---
card_expired | The card has expired. | The customer must retry with a valid card.
---
card_network_not_enabled | The card's network (Visa, Mastercard, etc.) is not enabled for the merchant. | Please reach out to Razorpay to enable the card network.
---
card_not_enrolled | The card is not enrolled for this payment method. | Customer needs to enroll the card for this payment method or use another card.
---
card_number_invalid | The card number is invalid. | Customer needs to enter a valid card number.
---
card_type_invalid | The card type is invalid. | Customer needs to use a valid card type.
---
compliance_violation | The payment violates compliance requirements. | Please ensure the payment meets all compliance requirements.
---
debit_instrument_blocked | The customer is using a blocked card to complete the payment. The card could have been blocked by the issuer or by customers themselves. | The customer must retry with a different card or method.
---
duplicate_refund_id | A refund with this ID already exists. | Please use a unique refund ID.
---
duplicate_request | A duplicate request has been submitted. | Please avoid duplicate requests.
---
emi_greater_than_max_amount | The EMI amount is greater than the maximum allowed amount. | Please reduce the EMI amount or use another payment method.
---
emi_plan_unavailable | The EMI plan is not available. | Please choose another EMI plan or payment method.
---
incorrect_atm_pin | Incorrect ATM PIN entered. | Customer needs to enter the correct ATM PIN.
---
incorrect_card_details | Incorrect card details entered. | Customer needs to enter correct card details.
---
incorrect_card_expiry_date | Incorrect card expiry date entered. | Customer needs to enter the correct card expiry date.
---
incorrect_cardholder_name | Incorrect cardholder name entered. | Customer needs to enter the correct cardholder name.
---
incorrect_cvv | The customer has entered an incorrect CVV to complete the payment. | The customer must retry and enter the correct CVV.
---
incorrect_otp | The customer has entered an incorrect OTP to complete the payment. | The customer must retry and enter the correct OTP.
---
incorrect_pin | Incorrect PIN entered. | Customer needs to enter the correct PIN.
---
input_validation_failed | Payment failed due to wrong request or input sent in the payment request. This is also seen while creating a payment with incorrect parameter values on the Dashboard. | Rectify the validation issues and try again. Check the error description and field parameters for more information about the error. Check your integration/payment request or reach out to Razorpay. Refer to the API Reference Guide.
---
insufficient_funds | The customer does not have sufficient funds in the account to complete the payment. | The customer must retry with a different card or method.
---
international_transaction_not_allowed | International transactions are not allowed. | Customer needs to use a domestic payment method or enable international transactions.
---
invalid_amount | The amount provided is invalid. | Please provide a valid amount.
---
invalid_currency | The currency passed is not supported or is invalid. | Check the list of supported currencies and use the correct currency code.
---
invalid_device | The device used is invalid for this transaction. | Customer needs to use a valid device.
---
invalid_email | The email address provided is invalid. | Please provide a valid email address.
---
invalid_mobile_number | The mobile number provided is not valid. | Customer needs to provide a valid mobile number and retry.
---
invalid_order_id | Order ID required in the payment request is either missing or is invalid. Order ID is mandatory for every payment. | Make sure the correct order ID is always passed while initiating a new payment.
---
invalid_request | The request is invalid. | Please check the request format and retry.
---
invalid_user_details | Invalid user details provided. | Customer needs to provide valid user details.
---
invalid_vpa | The customer has entered an incorrect VPA to complete the payment. | The customer must check and enter the correct VPA.
---
live_mode_not_enabled | Live mode is not enabled for your business. This error generally arises when you use test mode keys to make a live payment. | Generate the live mode keys in the Dashboard and use them in your integration.
---
merchant_not_activated | The merchant account is not activated. | Please contact Razorpay to activate the merchant account.
---
mismatch_in_transaction_details | There is a mismatch in transaction details. | Please check and correct the transaction details.
---
mobile_number_invalid | The mobile number is invalid. | Customer needs to provide a valid mobile number.
---
order_already_paid | There can only be one successful payment for each order ID. This error arises when you are trying to use an order ID where a payment is already completed. | Check for order status before initiating a new payment attempt on the order. You can also evaluate using a different order ID for each payment.
---
order_payment_method_mismatch | This error arises when the method mentioned in the order request is different from the method mentioned in the payment request. | Do not pass method in the create order request.
---
order_amount_mismatch | This error arises when the amount mentioned in the order request is different from the amount mentioned in the payment request. | Please make sure that the same amount is passed in both payment and order request.
---
otp_attempts_exceeded | OTP attempts have been exceeded. | Customer needs to wait and retry after some time.
---
otp_expired | The OTP has expired. | Customer needs to request a new OTP.
---
payment_cancelled | The customer has explicitly cancelled the payment due to which the authentication failed to complete. | The customer must retry to complete the payment.
---
payment_failed | Payment processing failed due to error at bank or wallet gateway. No specific error code received from gateway in this case. | Please retry with a different payment method.
---
payment_method_not_enabled | The selected payment method is not enabled for your business. This error occurs when your customer tries to complete a transaction using a method that is not enabled for you. | Reach out to Razorpay to enable payment method.
---
payment_method_not_enabled | UPI is not enabled however merchant has hit the UPI Payment request on API. | Please enable the payment method.
---
payment_pending_approval | The payment is currently pending approval by the concerned authority as part of the maker-checker flow. | Please reach out to the approver in your organization to get the transaction approved.
---
payment_risk_check_failed | Payment declined due to risk checks. Risk checks are performed by Razorpay, Gateway, and Issuer Bank. The source parameter would give additional clarity where the risk check failed. | The customer must retry with a different card or method.
---
payment_timed_out | The customer did not complete the transaction within the specified time. This error may also happen when no response is received from the gateway. | The customer must retry and complete the transaction within the time.
---
pin_attempts_exceeded | PIN attempts have been exceeded. | Customer needs to wait and retry after some time.
---
pin_not_set | PIN is not set for the payment method. | Customer needs to set a PIN for the payment method.
---
record_not_found | The requested record was not found. | Please check the details and retry.
---
recurring_payment_not_enabled | Recurring payments are not enabled. | Please enable recurring payments for your account.
---
refund_limit_crossed | The refund limit has been crossed. | Please contact Razorpay for assistance.
---
server_error | Technical error at Razorpay's server. This usually occurs when there is some server issue at Razorpay's end. | Please retry after some time or reach out to Razorpay.
---
transaction_daily_limit_exceeded | The customer has exceeded the daily transaction limit set on the card. Some of the cards allow customers to set a limit or have a default limit set. | The customer must retry using a different instrument or wait 24 hours to complete the payment.
---
transaction_limit_exceeded | The customers have exceeded the credit or debit limit set on their cards. This error usually arises while doing high value transactions. | The customer must retry using a different bank's card or method.
---
transaction_frequency_limit_exceeded | NPCI has a transaction limit both on the amount and the frequency per day. Customer has exhausted the frequency limit. | Please retry using another payment method.
---
transaction_on_vpa_restricted | Transaction on this VPA has been temporarily / permanently blocked by the PSP. | The customer to retry with another UPI ID.
---
upi_app_technical_error | Technical error occurred at the customer's PSP due to which the payment failed. | The customer must retry the payment. If the error persists then the customer should try using another UPI app.
---
upi_autopay_not_supported_on_psp | UPI Autopay is not supported on PSP. | Please retry with another PSP app.
---
upi_collect_not_enabled | UPI Collect flow is not enabled however merchant has hit the Collect payment request on API. | Please enable collect flow.
---
upi_intent_not_enabled | UPI Intent flow is not enabled however merchant has hit the Intent Payment request on API. | Please enable intent flow.
---
user_not_eligible | The customer failed the eligibility check and is not eligible for credit. This error may arise when the customer has a poor credit score or incomplete / insufficient documents. | The customer must retry using a different payment method.
---
user_not_registered_for_netbanking | The customer's bank account is not registered for netbanking. | The customer should register their account with the issuing bank for netbanking.
---
verification_failed | Verification of the payment using the status check API has failed. | This is a temporary error. The customer must retry.
---

## Gateway Errors

Error Reason [columWidth="25"] | Detailed Error Description [columWidth="50"] | Next Steps [columWidth="25"]
---
authentication_failed | The payment failed as 3D secure, or OTP authentication failed. This could happen if the user cancels the payment on the authentication (OTP submit) screen or enters incorrect authentication details such as OTP. | The customer must enter correct authentication details to complete the payment.
---
authorisation_declined_by_psp | PSP app has rejected the authorisation request. This can happen when there is an issue/downtime with the PSP or there's an issue with the customer's VPA. | Recheck the customer's VPA and retry. If this is recurring, then the customer can choose another PSP app and retry.
---
bank_cutoff_in_progress | Bank CBS cutoff is in progress. This is a periodic event at the bank's end. | The customer must retry.
---
bank_not_available | Bank is not available due to a downtime or a technical issue. | The customer must retry.
---
bank_technical_error | The issuing bank was facing technical problems at the moment the payment was attempted. This usually occurs when the Core Banking System encounters a technical error while processing the payment. | The customer must try using another bank account or another method.
---
beneficiary_account_does_not_exist | An issue with the beneficiary account which does not exist. | Please reach out to Razorpay.
---
beneficiary_account_dormant | An issue with the beneficiary account which is dormant. | Please reach out to Razorpay.
---
card_declined | The card has been declined. | The customer must retry with a different card or method.
---
collect_on_mcc_blocked | UPI Collect is blocked for this MCC (Merchant Category Code). | Please contact Razorpay for assistance.
---
collect_request_pending | A collect request is already pending for this transaction. | Please wait for the current request to complete or retry after some time.
---
credit_limit_exceeded | The customer's credit limit has been exceeded. | Customer needs to reduce the amount or use another payment method.
---
credit_limit_expired | The customer's credit limit has expired. | Customer needs to renew their credit limit or use another payment method.
---
credit_limit_inactive | The customer's credit limit is inactive. | Customer needs to activate their credit limit or use another payment method.
---
credit_limit_not_approved | The customer's credit limit is not approved. | Customer needs to get their credit limit approved or use another payment method.
---
credit_not_permitted | Credit transactions are not permitted for this customer. | Customer needs to use another payment method.
---
credit_failed | Credit processing has failed. | Please retry or use another payment method.
---
debit_declined | The debit transaction has been declined. | Customer needs to retry with another payment method.
---
deemed_transaction | The transaction is deemed and cannot be processed. | Please contact Razorpay for assistance.
---
debit_instrument_blocked | The customer is using a blocked card to complete the payment. The card could have been blocked by the issuer or by customers themselves. | The customer must retry with a different card or method.
---
debit_instrument_inactive | The debit instrument is inactive. | Customer needs to activate the instrument or use another payment method.
---
duplicate_rrn_found | A duplicate RRN (Retrieval Reference Number) was found. | Please retry with a new transaction.
---
funds_blocked_by_mandate | Funds are blocked by an existing mandate. | Customer needs to release the mandate or use another account.
---
gateway_technical_error | Technical error occurred at the gateway. | Please retry after some time.
---
invalid_response_from_gateway | Invalid response received from the gateway. | Please retry the transaction.
---
invalid_vpa | The customer has entered an incorrect VPA to complete the payment. | The customer must check and enter the correct VPA.
---
issuer_technical_error | Technical error occurred at the card issuer. | Please retry after some time or use another card.
---
mandate_creation_declined | Mandate creation has been declined. | Customer needs to retry mandate creation or use another payment method.
---
mandate_creation_expired | Mandate creation has expired. | Customer needs to retry mandate creation.
---
mandate_creation_failed | Mandate creation has failed. | Customer needs to retry mandate creation or use another payment method.
---
mandate_creation_timeout | Mandate creation has timed out. | Customer needs to retry mandate creation.
---
mcc_amount_limit_exceeded | The amount limit for this MCC (Merchant Category Code) has been exceeded. | Please reduce the amount or contact Razorpay.
---
payment_amount_tampered | The payment amount has been tampered. | The customer must retry with the correct amount.
---
payment_cancelled | The customer has explicitly cancelled the payment due to which the authentication failed to complete. | The customer must retry to complete the payment.
---
payment_collect_request_expired | The payment collect request has expired. | Customer needs to retry the payment.
---
payment_declined | The payment has been declined. | Customer needs to retry with another payment method.
---
payment_declined_due_to_high_traffic | Payment declined due to high traffic at the gateway. | Please retry after some time.
---
payment_failed | Payment processing failed due to error at bank or wallet gateway. No specific error code received from gateway in this case. | Please retry with a different payment method.
---
payment_pending | The payment is pending and has not been completed yet. | Please wait for the payment to complete or retry.
---
payment_risk_check_failed | Payment declined due to risk checks. Risk checks are performed by Razorpay, Gateway, and Issuer Bank. The source parameter would give additional clarity where the risk check failed. | The customer must retry with a different card or method.
---
payment_session_expired | The payment session has expired. | Customer needs to start a new payment session.
---
payment_timed_out | The customer did not complete the transaction within the specified time. This error may also happen when no response is received from the gateway. | The customer must retry and complete the transaction within the time.
---
psp_app_not_available | PSP app is not available. This can be because of a downtime with the PSP. | The customer must retry with another PSP app.
---
psp_app_not_supported | UPI App is not supported. This is a rare error used when a particular app is blacklisted. | Please choose another PSP app and try again.
---
psp_not_available | PSP is not available. | Customer needs to retry with another PSP.
---
psp_not_registered | PSP is not registered. | Customer needs to register with a PSP or use another PSP.
---
reqauth_mandate_not_acknowledged | Request authentication mandate is not acknowledged. | Customer needs to acknowledge the mandate.
---
request_timed_out | The request has timed out. | Please retry the request.
---
server_error | Technical error at Razorpay's server. This usually occurs when there is some server issue at Razorpay's end. | Please retry after some time or reach out to Razorpay.
---
transaction_daily_count_exceeded | The daily transaction count has been exceeded. | Customer needs to wait for the next day or use another payment method.
---
transaction_daily_limit_exceeded | The customer has exceeded the daily transaction limit set on the card. Some of the cards allow customers to set a limit or have a default limit set. | The customer must retry using a different instrument or wait 24 hours to complete the payment.
---
transaction_frequency_limit_exceeded | NPCI has a transaction limit both on the amount and the frequency per day. Customer has exhausted the frequency limit. | Please retry using another payment method.
---
user_not_eligible | The customer failed the eligibility check and is not eligible for credit. This error may arise when the customer has a poor credit score or incomplete/insufficient documents. | The customer must retry using a different payment method.
---
vpa_resolution_failed | The UPI network failed to validate the VPA. This is a technical error when the resolution fails. | The customer must retry using a different bank account or method.
---
