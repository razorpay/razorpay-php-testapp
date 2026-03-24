---
title: Recurring Payments APIs for Paper NACH
description: List of Recurring Payments APIs available for Paper NACH.
---

# Recurring Payments APIs for Paper NACH

You can use the Recurring Payments APIs to perform various actions using Paper NACH as a payment method.

## API-wise Integration Checklist for Paper NACH

### Paper NACH Registration using Standard Checkout
- Enable webhooks to check the status of the [token](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-token-status-using-webhooks) and [payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-payment-status-using-webhooks).
- We recommend that you create a single customer id rather than multiple customer ids for the same customer. If their details change, you can use the [Edit Customer Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#edit-customer-details) API. Duplicate validation is done based on email id and phone number.
- Use the `fail_existing : "1"` parameter while [creating a customer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction.md#111-create-a-customer). This helps reduce the number of customer id being created multiple times and will help in your reconciliation process.
- Use the [Payments Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md) API to check for any ongoing downtimes that might affect the NACH registration.
- Ensure to pass the below parameters while creating an order:
    1. `currency` as `INR`.
    2. `amount` as `0`.
    3. `description` of the link.
    4. `method` as `nach`.
    5. Token details such as:
        - `auth_type` as `physical`
        - Bank account details such as `account_number`, `ifsc_code` and `beneficiary_name`.
        - Any additional information to be printed on the NACH form that your customer will sign.
- For the custom checkout flow to upload the NACH form, you can use the [Upload the NACH File via Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md) custom API.
- To create an authorisation payment, download the Paper NACH form and send it to customers.
    - The image should be in jpeg, jpg and png formats.
    - The maximum file size is 6 MB.
    - You can either ask customers to fill the form and upload it using the [Upload via Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction.md#1131-upload-the-nach-file-via-checkout) API or upload the received form using the [create NACH File](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction.md#1132-upload-the-nach-file-via-api) API.
    - Ensure you pass the mandatory parameters, such as `"recurring": "1"`.
- After the authorisation payment is made, we request you to verify the payment signature at your backend.
- To check the status of the token id use the [Fetch Token](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md) API.
- You can use the [Fetch a Payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md) API to know the status of the payment.

### Paper NACH Registration using a Registration Link
- Enable webhooks to check the status of the [token](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-token-status-using-webhooks) and [payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-payment-status-using-webhooks) and the [registration link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-registration-link-status-using-webhooks) using APIs.
- Ensure to pass the below parameters while creating a registration link using the API:
    1. Customer details such as `name`, `email` and `contact`.
    2. `sms_notify` and `email_notify` as `true` to send notifications to customers.
    3. `amount` as `0` and `type` as `link`.
    4. `description` of the link.
- To check the status of the token id use the [Fetch Token](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md) API.
- The following table indicates the time required to update the token status from the `initiated` state to the `confirmed` state for the physical mandates.

Method | Bank | TAT Guidelines
---
Paper NACH | All Banks | Up to ₹ 5,00,000, T+5 working days.
 More than ₹ 5,00,000, T+10 working days.

### Create Subsequent Payments
- Ensure the amount does not exceed the max amount set while [creating an order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction.md#112-create-an-order).
- Ensure the `token_id` passed is for the linked `customer_id` while creating a recurring payment.
- Use [webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/subscribe-to-webhooks.md) to get real-time updates of payment.

## List of Recurring Payments APIs

The table below lists the various Recurring Payments APIs available for Paper NACH and gives a brief description of each API:

API | Description
---
[Create Authorisation Transaction using Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction.md#11-using-razorpay-standard-checkout) | API to create an authorisation transaction using Razorpay Checkout.
---
[Create Authorisation Transaction using Registration Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction.md#12-using-a-registration-link) | API to create an authorisation transaction using Registration Link.
---
[Fetch Tokens using Order id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/tokens.md#21-fetch-payment-id-using-order-id) | API to fetch tokens using the Order id.
---
[Fetch Tokens using Payment id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/tokens.md#22-fetch-token-by-payment-id) | API to fetch tokens using the Payment id.
---
[Fetch Tokens using Customer id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/tokens.md#23-fetch-tokens-by-customer-id) | API to fetch tokens using the Customer id.
---
[Delete Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/tokens.md#24-delete-tokens) | API to delete tokens.
---
[Create Subsequent Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-subsequent-payments.md) | API to create subsequent payments.

### Registration and Charge First Payment Together

API | Description
---
[Create Authorisation Transaction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/auto-debit.md#1-create-an-authorization-transaction) | API to create an authorisation transaction.
---
[Fetch Tokens using Payment id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/auto-debit.md#21-fetch-token-by-payment-id) | API to fetch tokens using the Payment id.
---
[Fetch Tokens using Customer id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/auto-debit.md#22-fetch-tokens-by-customer-id) | API to fetch tokens using the Customer id.
---
[Delete Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/auto-debit.md#23-delete-tokens) | API to delete tokens.
---
[Create Subsequent Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/auto-debit.md#3-create-subsequent-payments) | API to create subsequent payments.

### Related Information
- [Integrate Recurring Payments Using Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/paper-nach/integrate.md)
