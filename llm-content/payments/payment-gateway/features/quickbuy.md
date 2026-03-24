---
title: QuickBuy | Razorpay Payment Gateway Features
heading: QuickBuy
description: Streamline checkout with QuickBuy’s 1-click payment. Minimise steps and speed up transactions for a fast, seamless customer experience.
---

# QuickBuy

QuickBuy is a one-click payment solution that streamlines checkout for returning customers. With a compact half-page interface, it intelligently displays preferred payment methods based on past transactions and automatically applies the best available offers, reducing friction and decision-making.

This results in a faster, more efficient checkout experience that boosts conversion rates and enhances satisfaction for both customers and businesses.

![QuickBuy on Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/quickbuy-std.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> This feature is available on mobile devices only:
> 
> Platform | Native SDK | Mobile Web
> ---
> Android | v1.6.41+ | ✓
> ---
> iOS | NA | ✓
> 
> 

## Features

- **Quick Transactions**: 1-click payment process for returning users with minimal steps for faster checkouts, enhanced by a half-page overlay that provides a streamlined experience.
- **Clear Payment Details**: Transparent display of payment information, including savings and discounts.
- **Automatic Offer Application**: Automatic application of offers with visible savings to enhance customer satisfaction.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Customers can use UPI intent, UPI Saved VPAs and Saved Cards through QuickBuy.
> - QuickBuy displays recommended payment methods based on past transactions for a faster checkout. If no recommendations exist, the full checkout flow is shown.
> 

## Advantages

    
        - **Improved Conversion Rates**: Reduces drop-offs with minimal steps and pre-selected payment methods.
        - **Enhanced User Experience**: Provides a faster, simpler payment process that encourages repeat transactions.
        - **Efficient Checkout Process**: Offers advanced features like 1-click purchases, improving overall efficiency.
    
    
        - **Simplified Payments**: Pre-selection of preferred payment methods for quicker transactions.
        - **Automatic Offer Application:** Automatically applies the best available offers for cost savings. 
    

## How it Works

QuickBuy is ideal for returning users who are logged into Razorpay Checkout and making repeat purchases. The workflow includes:

1. **Preferred payment method**: The most frequently used payment method is pre-selected. If the user changes their payment method, the system recalculates and applies the best available offer to the new method, notifying them of the updated total.
2. **Automatic offer application**: The best available offer is applied to the total. If they change the offer, the system recalculates and updates the total amount.
3. **Single-click purchase**: Customers complete their purchases in a single click.

> **INFO**
>
> 
> **Disable QuickBuy**
> 
> To disable QuickBuy on checkout, contact our [Support team](https://razorpay.com/support/#request).
>
