---
title: Recurring Payments APIs for UPI
description: List of Recurring Payments APIs available for UPI.
---

# Recurring Payments APIs for UPI

You can use the Recurring Payments APIs to perform various actions using UPI as a payment method.

## API-wise Integration Checklist for UPI

### UPI Registration using Standard Checkout
- We recommend that you create a single customer id rather than multiple customer ids for the same customer. If their details change, you can use the [Edit Customer Details](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/#edit-customer-details.md) API. Duplicate validation is done based on email ID and phone number.
- Use the `fail_existing : "1"` parameter so that the [API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction.md) returns the same details of the customer created earlier. If the `fail_existing : "0"` is used, the API throws an error and does not fetch the customer id previously created. This can help in the end-user journey experience if a customer is signing up despite having signed up earlier.
- Use the [Payments Downtime](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/downtime.md) API to check for any ongoing downtimes that may impact the UPI Recurring.
- Ensure you pass all the token parameters while [creating an Order](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction/#112-create-an-order.md) for the authorisation transaction using the Standard Checkout method.
- Ensure you pass the value of the `recurring` parameter as `1` in the [Create an Authorisation Payment](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction/#113-create-an-authorization-payment.md) API. If not passed, it would be considered a one-time payment. Once the authorisation payment is made, we request you verify the payment signature at your backend.
- To check the status of the token ID use the [Fetch Token](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/tokens.md) API.
- Enable webhooks to check the status of the [token](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks#check-token-status-using-webhooks.md) and [payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks#check-payment-status-using-webhooks.md) and the [registration link](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks#check-registration-link-status-using-webhooks.md). Use this only if your business is using it in a non-critical way. In critical scenarios, we recommend that you [fetch](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md) APIs.
- A pre-debit notification is sent before the payment is deducted by the issuing bank. It is recommended that you check the presentment time in the [FAQ](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upi/faqs.md) document before proceeding with the recurring payments.

### UPI Registration using a Registration Link
- Ensure to pass the below parameters while creating a registration link using the API:
    1. Customer details such as `name`, `email` and `contact`.
    2. `sms_notify` and `email_notify` as `true` to send notifications to customers.
    3. `amount` as `0` and `type` as `link`.
    4. `description` of the link.
    5. `subscription_registration` details such as:
        - `method` as `upi`
        - `max_amount` as `500`
        - `frequency` as `monthly` or `as_presented`

### Create Subsequent Payments
- Ensure the `token_id` passed is for the linked `customer_id` while creating a recurring payment.
- Use [webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/subscribe-to-webhooks.md) to get real-time updates of payment.

## List of Recurring Payments APIs

The table below lists the various Recurring Payments APIs available for UPI and gives a brief description of each API:

API | Description
---
[Create Authorisation Transaction using Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction/#11-using-razorpay-standard-checkout.md) | API to create an authorisation transaction using Razorpay Checkout.
---
[Create Authorisation Transaction using Registration Link](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction/#12-using-a-registration-link.md) | API to create an authorisation transaction using Registration Link.
---
[Fetch Tokens using Payment id](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/tokens/#21-fetch-token-by-payment-id.md) | API to fetch tokens using the Payment id.
---
[Fetch Tokens using Customer id](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/tokens/#22-fetch-tokens-by-customer-id.md) | API to fetch tokens using the Customer id.
---
[Delete Tokens](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/tokens/#23-delete-tokens.md) | API to delete tokens.
---
[Create Subsequent Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/upi/create-subsequent-payments.md) | API to create subsequent payments.

### Related Information
- [Integrate Recurring Payments Using UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upi/integrate.md)
- [Supported Banks and Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upi/supported-banks.md)
