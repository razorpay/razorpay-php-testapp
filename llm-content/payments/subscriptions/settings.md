---
title: Subscriptions Settings
description: Configure payment method settings for Razorpay Subscriptions.
---

# Subscriptions Settings

You can configure the payment methods (Cards, UPI and Emandate) using which you would like to accept subscription payments from your customers.

> **INFO**
>
> 
> **Handy Tips**
> 
> Cards and UPI currently support recurring payments up to ₹15,000. Charges of higher value would automatically fail for domestic cards.
> 

## Enable Payment Methods

To enable payment methods:

1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
2. Go to **Settings**.
3. Enable the payment methods.
    
    - **Card**: Enable this to accept recurring payments via cards for your Subscriptions.

    - **UPI**: Enable this to accept UPI payments when a recurring charge is less than ₹15,000. Only INR is supported.
- **eMandate**: Enable this to accept recurring payments via Emandate (NetBanking) for your Subscriptions only in INR. This payment method will be enabled by default. You can disable it whenever required.

    
    

    ![Configure Payment Methods using Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/subscriptions-Emandate-subscription.jpg.md)

    

### Related Information

- [Create and View Plans](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-plans.md)
- [Create Subscriptions via Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-subscription-links.md)
- [Charge a Card Manually](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/manually-charge-card.md)
- [Update a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/update.md)
