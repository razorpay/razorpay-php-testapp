---
title: Collect Gateway Specific Convenience Fee from Customers
description: Collect gateway specific convenience fees from your customers for using your technology and infrastructure.
---

# Collect Gateway Specific Convenience Fee from Customers

You can set a specific fee for each payment gateway used for payments made through Optimizer. This allows you to charge an additional fee to your customers, helping you recover costs such as online payment gateway charges. 

Convenience fees are smoothly integrated into Razorpay Checkout, ensuring a seamless customer experience. In case of a refund, the customer receives both the convenience fee and the original payment amount.

![Dynamic Convenience Fees](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payments-dynamic-convenience-fees-v2.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> - **INR** is the only supported currency. This feature is not available for international payments.
> - This feature is **not available** for:
>     - Smart Collect (via VA, VPA and QR Codes)
>     - Route
>     - Subscriptions (via Emandate and Paper NACH)
> 

## Enable Customer Fee Bearer

To enable customer fee bearer for your account:
- Reach out to your Account Manager and share the fees with them that need to be configured for each payment gateway.

## How it Works
Given below is the customer payment flow:

1. The customer selects an item on your website/Payment Link/Payment Page and clicks the pay button.
2. The checkout pop-up page is displayed. The customer selects the payment method and the payment gateway through which they want to make the payment.
    ![cfb optimizer](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cfb-optimizer-gateway.gif.md)
3. The **Fee Breakup** page containing the Convenience Fee appears, and the customer clicks **Continue and pay**.
4. The customer is redirected to the payment success screen.

> **INFO**
>
> 
> **Handy Tips**
> 
> All Optimizer gateways support the Customer Fee Bearer feature. Know more about the [gateways supported by Optimizer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/supported-gateways-aggregators.md).
> 

## Communication

You should inform customers about the convenience fees, as we do not notify them of them except at checkout. In the Razorpay payment acknowledgement email sent after a successful payment, the convenience fees are included in the total amount without a breakdown.

### Related Information

- [Collect Standard Convenience Fee](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/convenience-fees.md)
- [SR Analytics Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/success-rate.md)
- [Roles and Permissions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/roles-and-permissions.md)
- [Tokenisation for Optimizer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/tokenisation.md)
- [Supported Gateways and Aggregators](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/supported-gateways-aggregators.md)
- [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/optimizer/faqs.md)
