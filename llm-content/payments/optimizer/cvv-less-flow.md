---
title: CVV-less Flow for Card Payments on Optimizer
description: Store customer card details securely as tokens and enable CVV-less payment flows for customers using Optimizer.
---

# CVV-less Flow for Card Payments on Optimizer

By enabling CVV-less payments for saved cards, customers can enjoy a streamlined checkout experience without the need to recall or input the CVV each time. Studies show that offering CVV-less saved card flows can boost conversion rates by up to 4%.

We recommend businesses to remove the CVV input field from the checkout page to streamline the payment process. If you use Razorpay Standard Checkout in your integration, these UI adjustments will be implemented automatically. Customers can select their saved cards as the preferred payment method, ensuring a swift and hassle-free transaction experience.

![CVV Less Card Payment Flow GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cvv-less-otp-less.gif.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> - To activate the CVV-less feature for your account, please get in touch with your account manager for assistance or contact the [Razorpay support team](https://razorpay.com/support/#request). 
> - CVV-less flow is supported for tokenised payments only.
> 

## Supported Cards Networks and Payment Gateways
Given below is the list of card networks and payment gateways that support the CVV-less feature on Optimizer.

    
        
        S No. | Networks | Availability
        ---
        1 | Visa | Live
        ---
        2 | Amex | Live
        ---
        3 | RuPay | Coming Soon
        ---
        4 | Mastercard | Coming Soon
        ---
        5 | Diners | Coming Soon
        
    
    
        
        S No. | Payment Gateway | Availability
        ---
        1 | Razorpay | Live
        ---
        2 | Cashfree | Live
        ---
        3 | Paytm | Live
        ---
        4 | PayU | Live
        ---
        5 | PineLabs | Live
        ---
        6 | Billdesk | Live
        ---
        7 | Axis CyberSource | Live
        ---
        8 | HDFC CyberSource | Live
        
    
    
        
        S No. | Payment Gateway | Availability
        ---
        1 | Razorpay | Live
        ---
        2 | PayU | Live
        ---
        3 | Billdesk | Live
        
    

## Frequently Asked Questions (FAQs)

  
### 1. How can I enable the CVV-less feature for my account?

      To activate the CVV-less feature for your account, please get in touch with your account manager for assistance or contact the [Razorpay support team](https://razorpay.com/support/#request).
    

  
### 2. What steps do I need to take after the feature is activated?

     After the feature is activated, businesses using Standard Checkout need not take any action, as the feature will be automatically implemented. Businesses using Custom/S2S integration can stop passing CVV to Razorpay.
    

  
### 3. CVV validation has been a mandatory step until now. Does this feature compromise my customers' security?

     No, the CVV-less feature does not compromise customer security. The Card on File Tokenization (CoFT) process securely encrypts and stores customer card details, with access limited to card networks and issuing banks. As a result, card networks have made CVV validation optional for tokenised cards. This change is 100% secure and compliant with all regulations related to card security. 
    

  
### 4. Is this change applicable only to specific transactions, such as those below ₹2000?

     No, CVV-less flows apply to all tokenised transactions under Visa, Mastercard, Diners, Amex, and Rupay, regardless of the payment amount.
