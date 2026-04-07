---
title: About Payments
description: Check payments, the various payment states and Razorpay Dashboard actions. Understand late authorisations.
---

# About Payments

You can accept live payments using the Razorpay Payment Gateway once your  account is activated.

## Payment Life Cycle

Following are the various states of a payment:

States | Description
---
`created` | This is the first state.  The customer has provided the payment details, which are sent to Razorpay. The payment has not been processed yet.
---
`authorized` | The payment state changes to `authorized` when the bank successfully authenticates the customer's payment details. The money is deducted from the customer’s account by Razorpay. The amount is settled to your account after the payment is manually or automatically captured.  Payment in this state is auto-refunded to the customer if not captured within 3 days of creation.
---
`captured` |  When the payment status is changed to `captured`, the payment is verified as complete by Razorpay. The amount is settled to your account as per the settlement schedule.
---
`refunded` | You can refund the payments that have been successfully captured at your end. The amount is reversed to the customer's account.
---
`failed` | An unsuccessful payment attempt is marked as `failed`, and the customer will have to retry the payment. Any amount debited will be refunded into customers account in 5-7 working days.

The following state diagram depicts the flow of money through the various payment states:

## Dashboard Actions

You can perform the following actions on payments from the Dashboard:

- Configure settings to [auto-capture payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
- [Manually capture payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#manually-capture-payments)
- [Issue a refund for a payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/issue.md)
- [View details of a payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#view-payment-details)
- [View settlement details of a payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements/dashboard.md#view-settlements-using-dashboard)

### Related Information

- [Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md)
- [Test Card Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md)
- [Payment Capture Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md)
- [International Payment Support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md)
