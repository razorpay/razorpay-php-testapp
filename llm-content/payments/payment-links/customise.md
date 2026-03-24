---
title: Customise Payment Links
description: Customise the Payment Links payment request page using Razorpay APIs. Make changes to the payment details and checkout sections.
---

# Customise Payment Links

You can send standard Payment Links to customers via email and SMS. When customers click on the link, they are redirected to a page hosted by us where they can complete the payment.

The payment request page consists of two sections:
- **Payment Details**: Displays details about the payment description, expiry date, payable amount and in case of partial payments, partial amount paid and due.
- **Checkout**: Displays the **Phone** and **Email** fields and list the various payment methods available.

![payment links payment request page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-customize-pl_original.jpg.md)

You can customise this hosted page as per your brand and business requirements. For example, you may display only specific payment methods, change the color of Checkout, and so on.

> **INFO**
>
> 
> **Handy Tips**
> 
> - This feature is not available for UPI Payment Links.
> - You can only customise the payment request page using API. It is not possible to do this from the Dashboard.
> 

## Customise Payment Links Using API

You can customise the payment request page to suit your business requirements. You can do this by passing the customisation parameters in the Create Payment Links API request.

Shown below is an example of a **customised payment request page**. You can customise the field labels in the **Payment Details** section and modify the look-and-feel of the **Checkout** in the payment request page to meet your brand and business requirements.

![payment links customized payment request page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-customize-sample_custom_checkout.jpg.md)

As you can see, the labels in the Payment Details section have been renamed, while the Checkout displays only two payment methods instead of the default four.

### Checkout Section

You can customise the following fields in the checkout section:

- [Implement thematic changes in Payment Links checkout section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/checkout-theme.md)
- [Change business name](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/change-business-name.md)
- [Customise payment methods - options and method parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/customise-payment-methods.md)
- [Customise payment methods - options and config parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/customise-options-config.md)

#### Related Information

- [Payment Links APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md)
- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/faqs.md)
