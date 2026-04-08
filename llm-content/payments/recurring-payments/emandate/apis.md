---
title: Recurring Payments APIs for Emandate
description: List of Recurring Payments APIs available for Emandate.
---

# Recurring Payments APIs for Emandate

You can use the Recurring Payments APIs to perform various actions using Emandate as a payment method.

## API-wise Integration Checklist for Emandate

### Emandate Registration using Standard Checkout
- We recommend that you create a single customer id rather than multiple customer ids for the same customer. If the cutomer's details change, you can use the [Edit Customer Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#edit-customer-details) API. Duplicate validation is done based on email ID and phone number.
- Use the `fail_existing : "1"` parameter so that the [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction.md#request-parameters) returns the same details of the customer created earlier. If the `fail_existing : "0"` is used, the API throws an error and does not fetch the customer id previously created. This can help in the end-user journey experience if a customer is signing up despite having signed up earlier.
- We recommend that you have the customer’s mode of payment. 
- Let customers choose the method they want to authenticate the transaction. In this way, the customer gets to select the auth type in checkout and link.
- Let customers choose the bank account and fill in those details that they wish to make the recurring payment. This can reduce the load of having the details and we can handle the errors accordingly.
- Use the [Payments Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md) API to check for any ongoing downtimes that might affect the Mandate registration.
- Ensure you pass all the token parameters while [creating an Order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction.md#112-create-an-order) for the authorisation transaction using the Standard Checkout method.
- Ensure you pass the value of the `recurring` parameter as `1` in the [Create an Authorisation Payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction.md#113-create-an-authorization-payment) API. If not passed, it would be considered a one-time payment. Once the authorisation payment is made, we request you verify the payment signature at your backend.
- You cannot edit the details of the token once you register the mandate.
- Enable webhooks to check the status of the [token](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-token-status-using-webhooks) and [payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-payment-status-using-webhooks) and use this only if your business is using it in a non-critical way. In critical scenarios, we recommend you [fetch](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md) APIs.
- Once the payment is made, we send a payment ID, order ID and signature in the response. After the signature verification is done, you can fetch the token using the [Fetch Token by Payment ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md#21-fetch-token-by-payment-id) API.
- The token will be confirmed for HDFC and SBI in T+1 days. Refer to the [FAQ](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/faqs.md) section for more information.
- For all the payments, handle the error description on the server-side.

### Emandate Registration using a Registration Link
- Share access to your team members based on the you would like to assign them if you create a registration link via the Dashboard.
- Ensure to pass the below parameters while creating a registration link using the API:
    1. Customer details such as `name`, `email` and `contact`.
    2. `currency` as `INR`.
    3. `sms_notify` and `email_notify` as `true` to send notifications to customers.
    4. `amount` as `0` and `type` as `link`.
    5. `description` of the link.
    6. `subscription_registration` details such as `method`.
- You can use the [Fetch a Payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md) API to know the status of the payment.

### Create Subsequent Payments
- Ensure the amount does not exceed the max amount set while [creating an order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-subsequent-payments.md#31-create-an-order-to-charge-the-customer).
- Ensure the token id is in the `confirmed` state before initiating the recurring payment.
- Ensure the `token_id` passed is for the linked `customer_id` while creating a recurring payment.
- To ensure same-day debit authorization, Razorpay must receive the request by 8:59 a.m. on a bank working day.
- In the case of Emandate, the process varies from bank to bank. If the Emandate is registered using a Netbanking login, it can take up to 2 working days for payment authorization.

Method | Bank | TAT Guidelines
---
Emandate | ICICI Bank | Real-time
---
Emandate | Axis | Same day
---
Emandate | HDFC Bank | T+1 working days
---
Emandate | State Bank of India | T+1 working days
---
Emandate | All Banks under NPCI ENACH | Same day

- Use [webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-payment-status-using-webhooks) to get real-time updates of payment.
- After the debit request is created, payment will be in the `created` state. You can use the [Fetch a Payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md) API to know the status of the payment.

## List of Recurring Payments APIs

The table below lists the various Recurring Payments APIs available for Emandate and gives a brief description of each API:

API | Description
---
[Create Authorisation Transaction using Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction.md#11-using-razorpay-standard-checkout) | API to create an authorisation transaction using Razorpay Checkout.
---
[Create Authorisation Transaction using Registration Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction.md#12-using-a-registration-link) | API to create an authorisation transaction using Registration Link.
---
[Fetch Tokens using Payment id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md#21-fetch-token-by-payment-id) | API to fetch tokens using the Payment id.
---
[Fetch Tokens using Customer id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md#22-fetch-tokens-by-customer-id) | API to fetch tokens using the Customer id.
---
[Delete Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md#23-delete-tokens) | API to delete tokens.
---
[Create Subsequent Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-subsequent-payments.md) | API to create subsequent payments.

### Registration and Charge First Payment Together

API | Description
---
[Create Authorisation Transaction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/auto-debit.md#1-create-an-authorization-transaction) | API to create an authorisation transaction.
---
[Fetch Tokens using Payment id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/auto-debit.md#21-fetch-token-by-payment-id) | API to fetch tokens using the Payment id.
---
[Fetch Tokens using Customer id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/auto-debit.md#22-fetch-tokens-by-customer-id) | API to fetch tokens using the Customer id.
---
[Delete Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/auto-debit.md#23-delete-tokens) | API to delete tokens.
---
[Create Subsequent Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/auto-debit.md#3-create-subsequent-payments) | API to create subsequent payments.

### Related Information
- [Integrate Recurring Payments Using Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md)
- [Charge Customers During Registration - Use Cases and Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/charge-customer-during-registration.md)
- [Supported Banks and Apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/supported-banks.md)
- [Handle Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/errors.md)
