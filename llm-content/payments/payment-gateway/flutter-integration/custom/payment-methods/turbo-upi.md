---
title: About Turbo UPI
description: Integrate with Turbo UPI to provide a 2-step UPI payment experience.
---

# About Turbo UPI

Use Razorpay Turbo UPI to make UPI payments faster. Following are the sample screens while making payments using Turbo UPI.

![Razorpay Turbo UPI Payment Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-turbo-in-app-transaction-flow.jpg.md)

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
> - Use the `rzp_test_0wFRWIZnH65uny` merchant key for testing on the UAT environment and the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
> - As a compliance requirement, you need to get approval from Google for **READ_SMS** permission. Refer [to this link](https://support.google.com/googleplay/android-developer/answer/10208820?hl=en) for more details.
> 
> 

## Customer Onboarding 

Your customers can link their bank accounts to your app with these steps:
1. The customer navigates to your app's checkout screen and taps **Add bank account**.
    ![Turbo UPI Add Bank Account](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-turbo-custom-add-bank-account.jpg.md)

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     The customer needs to give **allow SMS permission** so that we can validate the phone number with the bank.
>      ![Turbo UPI SMS Verification](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-turbo-custom-sms-verification.jpg.md)
>     

2. The customer's bank details are fetched and linked to the bank account.

    ![Turbo UPI Fetch Bank Account](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-turbo-custom-fetch-account.jpg.md)

3. The customer selects a bank from the list of banks. The top 8 banks are displayed for easier selection. 
    ![Turbo UPI Select Bank Account](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-turbo-custom-select-bank-account.jpg.md)

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> If no UPI PIN is set, the customers are prompted to provide their card details, enter an OTP and complete the setup.
>  ![Turbo UPI Enter Card Details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-turbo-custom-card-details.jpg.md)
> 

This completes the onboarding.

## Transaction Flow 

After the customer is onboarded, on the checkout page of your app:

1. The customer selects the linked bank account.
    ![Razorpay Turbo UPI Payment Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-turbo-linked-bank.jpg.md)
2. The customer enters the UPI PIN to complete the payment.
    ![Turbo UPI Payment Successful](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-turbo-custom-enter-pin.jpg.md)

### Related Information

- [Turbo UPI Headless](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/payment-methods/turbo-upi/integration-noui.md)
