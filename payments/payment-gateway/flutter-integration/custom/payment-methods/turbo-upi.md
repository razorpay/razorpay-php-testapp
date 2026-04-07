---
title: About Turbo UPI
description: Integrate with Turbo UPI to provide a 2-step UPI payment experience.
---

# About Turbo UPI

Use Razorpay Turbo UPI to make UPI payments faster. Following are the sample screens while making payments using Turbo UPI.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> Currently, Flutter SDK is supported only for Android.
> 
> 

## Advantages

    
        - Simplified payment process with just two steps.
        - Higher success rate.
        - One stop for refunds and disputes.
    
    
        - Higher success rates with a smoother payment experience.
        - Complete in-app flow with no redirections gives better control over the user journey.
        - Prevent timeouts effectively, as customers never leave your app.
    

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> Due to the sensitive nature of the added libraries, we must ensure that the app is running in a proper environment. Therefore, after integration, the app will not run on Android emulators.
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> - Use the `rzp_test_0wFRWIZnH65uny` merchant key for testing on the UAT environment and the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) for prod testing.
> - As a compliance requirement, you need to get approval from Google for **READ_SMS** permission. Refer [to this link](https://support.google.com/googleplay/android-developer/answer/10208820?hl=en) for more details.
> 
> 

## Customer Onboarding 

Your customers can link their bank accounts to your app with these steps:
1. The customer navigates to your app's checkout screen and taps **Add bank account**.
    

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     The customer needs to give **allow SMS permission** so that we can validate the phone number with the bank.
>      
>     

2. The customer's bank details are fetched and linked to the bank account.

    

3. The customer selects a bank from the list of banks. The top 8 banks are displayed for easier selection. 
    

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> If no UPI PIN is set, the customers are prompted to provide their card details, enter an OTP and complete the setup.
>  
> 

This completes the onboarding.

## Transaction Flow 

After the customer is onboarded, on the checkout page of your app:

1. The customer selects the linked bank account.
    
2. The customer enters the UPI PIN to complete the payment.
    

### Related Information

- [Turbo UPI Headless](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/payment-methods/turbo-upi/integration-noui.md)
