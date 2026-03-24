---
title: Make Test Payments
description: Make test payments to Customer Identifiers in Test Mode.
---

# Make Test Payments

You can make a test payment to a Customer Identifier only in Test Mode.

> **INFO**
>
> 
> **No Test Payments on Live Mode**
> 
> - The **Make Test Payments** feature is only available in **Test Mode**.
> - You can toggle between Live and Test Modes on your **Dashboard**. Navigate to the top menu ribbon and click the drop-down icon against **Live Mode**. Toggle to **Test Mode** and create a new customer identifier.
> 

## Test Payment to a Customer Identifier

To make test payments to a Customer Identifier:

1. Log in to the Dashboard and click **Smart Collect**.
2. In the list of Customer Identifiers, select the Customer Identifier id to which you want to make a test payment.
3. In the right pane, click **Make a Test Payment**.
    ![Smart Collect - Test Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/smart-collect-va_test_payments.jpg.md)
4. Enter the following details in the form:
    1. **Amount**: Enter the amount to be transferred to the Customer Identifier as the test payment.
        ![SC - Test Payment Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sc_test_payment.jpg.md)
    2. **Method**: Select the payment method. You can choose NEFT, RTGS or IMPS.
5. Click **Create**.

A success message **test payment successful** appears, indicating that the payment has gone through. You can verify this on the Customer Identifier list as well.

### Related Information
- [Create Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/create.md)
- [Close Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/close.md)
- [Refund Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/refund.md)
- [Search for a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/search.md)
