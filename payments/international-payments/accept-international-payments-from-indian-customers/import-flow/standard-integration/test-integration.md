---
title: 2. Test Integration
description: Steps to test if the custom Web integration was successful.
---

# 2. Test Integration

After the integration is complete, a **Pay** button appears on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test transaction is successful.

You can make test payments using one of the payment methods configured at the Checkout.

> **WARN**
>
> 
> **Watch Out!**
> 
> This is a mock payment page that uses your test API keys, test card and payment details. 
> - Ensure you have entered only your [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) in the Checkout code. 
> - Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> 

    
### Supported Payment Methods

        Following are all the payment modes that the customer can use to complete the payment on the Checkout. Some of them are available by default, while others require approval from us. Raise a request from the Dashboard to enable such payment methods.

        
        Payment Method | Code | Availability
        ---
        [Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `debit` | ✓
        ---
        [Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `credit` | ✓
        ---
        [Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md) | `netbanking`| ✓
        ---
        [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md) | `upi` | ✓
        

        #### Netbanking

        You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.

        Check the list of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md#supported-banks).

        #### UPI

        You can enter one of the following UPI IDs:

        - `success@razorpay`: To make the payment successful. 
        - `failure@razorpay`: To fail the payment.

        Check the following lists: 
            - [Supported UPI Flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).
            - [UPI Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/upi.md).

        
> **INFO**
>
> 
> 
>         **Handy Tips**
> 
>         You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
>         

        #### Cards

        You can use one of the following test cards to test transactions for your integration in Test Mode. 

        

        Card Network | Domestic / International | Card Number | CVV & Expiry Date
        ---
        Mastercard | Domestic |  5267 3181 8797 5449 | Use a random CVV and any future date ^^^^
        ---
        Visa | Domestic | 4386 2894 0766 0153 |
        ---
        Mastercard | International | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 |
        ---
        Visa | International | 4012 8888 8888 1881 |
        

        Check the following lists: 
            - [Supported Card Networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
            - [Cards Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/cards.md).
            - [Test Error Scenarios](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#error-scenario-test-cards).
        

## Next Steps

[Step 3: Go Live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/import-flow/standard-integration/go-live-checklist.md)
