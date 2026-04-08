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
    

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> Due to the sensitive nature of the added libraries, we must ensure that the app is running in a proper environment. Therefore, after integration, the app will not run on Android emulators.
> 

## Prerequisites

1. Contact our [integrations team](mailto:integrations@razorpay.com) to get access to the sample app repository.
2. Get your mobile number and app whitelisted.

## Customer Onboarding Flow

Your customers can link their VPAs to your app with these steps:
1. The customer navigates to your app's checkout screen and taps **Add bank account**.
    

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     The customer needs to give permission so that we can validate the phone number with the bank.
>      
>     

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     As a compliance requirement, you need to get approval from Google for **READ_SMS** permission.
>     

2. The customer's bank details are fetched and linked to the VPA.

    

    - The customer selects a bank from the list. 
        

3. The customer can complete the payment using the new VPA.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> If no UPI PIN is set, the customers are prompted to provide their card details, enter an OTP and complete the set-up.
>  
> 

## Transaction Flow 

After the customer is onboarded, on the checkout page of your app:

- The customer selects the linked UPI Account.
 
- Enters the UPI PIN to complete the payment.
 

### Related Information

- [Turbo UPI Headless](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-noui.md)
- [Turbo UPI with UI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md)
- [Turbo UPI Headless Mock](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integration-noui-mock.md)
- [Turbo UPI with UI Mock](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integration-ui-mock.md)
