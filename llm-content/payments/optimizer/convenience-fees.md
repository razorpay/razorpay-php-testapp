---
title: Collect Standard Convenience Fees from Customers
description: Collect convenience fees from your customers for using your technology and infrastructure.
---

# Collect Standard Convenience Fees from Customers

You can configure a particular fee for every payment made using Optimizer with the help of the Customer Fee Bearer feature. You can charge an additional fee to your customers to help you recover costs such as as online payment gateway charges. 

Convenience fees are seamlessly added at Razorpay Checkout without disrupting customers checkout experience. If a refund is initiated, your customers receive the convenience fees and the actual payment amount.

![Dynamic Convenience Fees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payments-dynamic-convenience-fees-v2.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> - **INR** is the only supported currency. This feature is not available for international payments.
> - This feature is **not available** for:
>     - Smart Collect (via VA, VPA and QR Codes)
>     - Route
>     - Subscriptions (via Emandate, Paper NACH)
> 

## Enable Customer Fee Bearer

To enable customer fee bearer for your account:
- Reach out to your Account Manager and share the fees with them that need to be configured for each payment method.

## How it Works
Given below is the customer payment flow:

1. The customer selects an item on your website/Payment Link/Payment Page and clicks the pay button.
    ![Customer clicks pay button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/dashboard-guide-settings-fee-bearer-payment-page.jpg.md)
2. The checkout pop-up page is displayed. The customer selects the payment mode and clicks the **Pay** button.
    ![checkout form](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/dashboard-guide-settings-fee-bearer-checkout-new1.jpg.md)
3. The **Fees Breakup** page containing the Convenience Fee appears, and the customer clicks **Continue and pay**.
    ![Fees breakup](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/dashboard-guide-settings-fee-bearer-fee-breakup-new1.jpg.md)
4. The customer is redirected to the bank page with the total amount, including the Convenience Fee.

> **INFO**
>
> 
> **Handy Tips**
> 
> All Optimizer gateways support the Customer Fee Bearer feature. Know more about the [gateways supported by Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/supported-gateways-aggregators.md).
> 

## Communication

You should inform customers about the convenience fees, as we do not notify them of them except at checkout. In the Razorpay payment acknowledgement email sent after a successful payment, the convenience fees are included in the total amount without a breakdown.

### Related Information

- [Add Payment Providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/add-payment-providers.md)
- [SR Analytics Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/success-rate.md)
- [Roles and Permissions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/roles-and-permissions.md)
- [Tokenisation for Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/tokenisation.md)
- [Supported Gateways and Aggregators](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/supported-gateways-aggregators.md)
- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/faqs.md)
