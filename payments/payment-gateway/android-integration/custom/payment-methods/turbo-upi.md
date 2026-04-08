---
title: About Turbo UPI
description: Integrate with Turbo UPI to provide a 2-step UPI payment experience.
---

# About Turbo UPI

Use Razorpay Turbo UPI to make UPI payments faster. Following are the sample screens while making payments using Turbo UPI.

## Advantages

    
        - Simplified payment process with just two steps.
        - Higher success rate.
        - One stop for refunds and disputes.
    
    
        - Higher success rates with a smoother payment experience.
        - Complete in-app flow with no redirections gives better control over the user journey.
        - Reduce timeout issues significantly since customers never leave your app.
    

> **SUCCESS**
>
> 
> **What's New**
> 
> Users can now link their credit cards alongside bank accounts during onboarding. Merchants can seamlessly retrieve both credit cards and bank accounts for transactions. Simplifying payments, expanding options, and ensuring security. 
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> Charges will be levied for payments made using CC on UPI. Contact the [support team](https://razorpay.com/support/#request) for further information.
> 

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

## Customer Onboarding Flow

Your customers can link their credit cards and bank accounts to your app with these steps:
1. The customer navigates to your app's checkout screen and taps **Link bank a/c & credit card**.
    

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     The customer needs to give **allow SMS permission** so that we can validate the phone number with the bank.
>      
>     

2. The customer's bank and credit card details are fetched and linked to the app.

    

3. The customer selects a bank or credit card from the list of banks. The top 8 banks are displayed for easier selection. 
    

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> If no UPI PIN is set, the customers are prompted to provide their card details (debit or credit), to enter an OTP and complete the set-up.
>  
> 

This completes the onboarding.

## Transaction Flow 

After the customer is onboarded, on the checkout page of your app:

1. The customer selects the linked bank or credit account.
    
2. The customer enters the UPI PIN to complete the payment.
    

### Related Information

- [Turbo UPI Headless](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui.md)
- [Turbo UPI with UI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui.md)
- [Turbo UPI Headless Mock](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui-mock.md)
- [Turbo UPI with UI Mock](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui-mock.md)
- [Turbo UPI Headless TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-noui-tpv.md)
- [Turbo UPI with UI TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/integration-ui-tpv.md)
