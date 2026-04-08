---
title: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Turbo UPI.
---

# Frequently Asked Questions (FAQs)

## Payments

    
### 1. What is the protocol if a user enters an incorrect UPI PIN? 

          If a user enters a wrong UPI PIN more than three times, the user must reset the PIN or wait 24 hours to make the next transaction.
        

    
### 2. On which devices can I enable Turbo UPI? Can it be enabled on the Web?

         Turbo UPI can be enabled only on a mobile app, either iOS or Android, through an SDK integration. This product is currently unavailable as a web-based solution due to the NPCI constraints. Due to security reasons, the NPCI Common Library (UPI PIN screen) can be deployed only when a device is bound to the SIM and the application.
        

    
### 3. Are there any transaction limits or restrictions imposed?

         Below are the standard NPCI transaction limits:
            - For first-time UPI users, the initial transaction limit is typically up to ₹5,000 with a cooling period of 24 hours. After this cooling period, the transaction limits will be relaxed to the standard limits.
            - During this cooling-off period, your bank will reduce the following:
                - The amount you can send per UPI payment and the amount you can send in one day.
                - The number of UPI payments you can make in one hour/day.
         
         
> **INFO**
>
> 
>          **Handy Tips**
>          
>           The limits during this period and the cooling-off period may vary from bank to bank. Please contact your bank for more information.  
>          

        

    
### 4. Can users receive money on Turbo UPI-generated UPI ID?

         Yes, users can receive money. However, they can not pay using a collect request from your app. Collect requests will go to the bank's UPI app. 
        

    
### 5. Can I enable Turbo UPI on all Razorpay checkouts?

 
         We have built Turbo UPI in a way that it can be deployed across any Razorpay checkout - [Standard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/standard/payment-methods/turbo-upi.md), [Custom](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi.md) or S2S. The integration process for each of these options will depend on whether you want to control the user experience. With our Standard Checkout offering, you can complete the integration and start processing payments within 1-2 days.
        

    
### 6. Can I extend the instant refund capability to Turbo UPI?

         Yes. If you are already using Razorpay's instant refunds functionality, you can seamlessly apply the same capability to transactions processed via Turbo UPI. To enable this feature, please raise a request at our [support team](https://razorpay.com/support/#request).
        

## Onboarding

    
### 1. What are the specific guidelines or best practices for designing the user interface for UPI payments?

         - Using the Turbo UPI logo is recommended for a better user experience. You can download the logo using the button below.
            [Download Turbo UPI Logo](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/Turbo-upi-logo.zip.md)
            ![Turbo UPI Logo image](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/turbo-upi-logo.jpg.md)
         - Ensure to have the UPI logo against the account as per UPI guidelines.
         - Encourage users to complete the onboarding process by clearly communicating the benefits they will receive. This could include highlighting the simplicity of a one-step payment, showcasing any ongoing offers, or emphasising unique features. 
         - Ensure users can complete onboarding and continue payment in a single flow. We recommend having an option to continue payment as soon as onboarding is complete.
         - Once an account is linked, clearly communicate the bank account using the last four digits and provide ways to add other accounts if users want to. 
        

    
### 2. Which UPI ID is currently supported on Turbo UPI?

        Turbo UPI supports the use of @axisbank handles for transactions. If your customer already has an existing @axisbank handle, it will be automatically fetched, allowing them to proceed seamlessly.

         
> **INFO**
>
> 
>          **Handy Tips**
>          
>          Turbo UPI does not reuse existing @axl or @okaxis handles; only the @axisbank handle is reused. If your customer does not have an existing UPI ID, one will be created automatically during the one-time device binding process. 
>          

        

    
### 3. How can I encourage users to complete the onboarding process?

         To enhance user engagement and drive onboarding completion, keep the following in view:
         1. Highlight the Value: Clearly explain how users benefit from the "1 Step Payment Experience" and the "Fastest Payment Experience." Users engage when they see the value.
         2. Offer Incentives: Provide initial incentives like discounts, special deals, or rewards. These encourage users to start the onboarding process or make their first payment using the 1 Step Payment Experience.
        

## Integrations

    
### 1. How will I be notified about my payment status?

         Razorpay provides notifications about payment status through webhooks, ensuring you are promptly informed about the status of your transactions. When a payment is processed, Razorpay will trigger a webhook to notify you whether the payment was successful or failed. Refer to the [payment payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payments).
        

    
### 2. Is Device Binding necessary for every transaction?

         No, Device Binding is a one-time requirement aimed at verifying the presence of the user's phone number. This verification is achieved through an outgoing SMS from the user's device. Once this initial verification is completed, there is no need to repeat the Device Binding process for every new account linking or transaction.

            
> **WARN**
>
> 
>             **Watch Out!**
>        
>             Device Binding may need to be repeated if the user uninstalls the app or clears their storage. The process should be reinitiated in such cases to ensure the account's security.
>             

        

## Miscellaneous 

    
### 1. Is there any analytics available about the user journey? 

         Yes. There would be events to understand the user journey and each action the user takes, which we can share on a request basis or set up automated reports as required. Additionally, the entire journey will be in your app, and you will have your UI. 
            
> **INFO**
>
> 
>             **Handy Tips**

>             - For Custom Checkout: you can install and trigger any additional event on your application.
>             - For Standard Checkout: Razorpay can share these details via reports on request. Raise a request to the [support team](https://razorpay.com/support/#request).
>             

        

    
### 2. Is Turbo UPI supported with Optimizer?

         Yes, Turbo UPI can be enabled for businesses who use Optimizer. However, a prerequisite is that the business sets a routing rule to direct 100% of traffic towards Razorpay instead of other PGs. Only then will end-users be able to benefit from Turbo UPI. Know more about [Turbo UPI on Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/create-custom-rule.md#turbo-upi-on-optimizer).
        

    
### 3. By enabling Turbo UPI, does the business become a TPAP?

         Integrating with Turbo UPI **does not** classify the business as a Third-Party App Provider (TPAP). Consider the following:
         - According to the OC 154 Circular, the bank’s SDK is the licensed party, not the business app. Thus, the bank partner must comply with any new developments from NPCI, not the business.
         - Razorpay acts as the front-end entity similar to TPAPs like GPay or PhonePe. We provide a wrapper built around the bank’s SDK that can be directly integrated into the business app. This wrapper-SDK now consists of all the front-end capabilities to process in-app payments.
         - Businesses using Turbo UPI can enjoy a streamlined onboarding process without requiring lengthy certification procedures with NPCI. They can unlock new features through Razorpay’s SDK in a case-by-case scenario.
         - Businesses can now operate as UPI apps for all practical purposes, limited to Peer-to-Merchant (P2M) transactions, thus simplifying their go-to-market experience and delighting customers.
        

    
### 4. Who is Razorpay's partner bank for Turbo UPI? Do we plan to integrate with more banks in the future?

         Razorpay has chosen to collaborate with Axis bank as their partner bank. The underlying SDK used is Axis bank's Plugin SDK, over which Razorpay has created a wrapper to support standard P2M flows. 
        

    
### 5. Is there a customised, business-specific UPI ID that will be created for users who use Turbo UPI? For example, @swiggy?

         No, since the acquiring partner is still Axis bank, the UPI ID created at the backend will be @axisbank. The Turbo UPI solution does not enable businesses to become TPAPs and uses the bank's UPI processing stack. Thus, the UPI ID created will also be the bank's UPI ID and not customised to the business. 
        

    
### 6. If we take the example of Axis bank being the partner app, does this mean that users can leverage existing UPI ID with Axis bank, and the same gets pre-fetched and stored? Also, does that include only Axis bank app UPI IDs or even 3rd party PSP having Axis handles like @okaxis? 

         @axl and @okaxis handles will not be considered existing UPI IDs for Turbo UPI. Users must have an @axisbank handle to reuse it on Turbo UPI. If required, a new UPI ID will be automatically created in the one-time onboarding process. 

         In this case, Axis bank, the acquirer bank, has over 10-12 million unique customer UPI IDs. End users with an existing @axisbank UPI ID will experience a shorter and quicker onboarding process (shorter by 1 step).  
        

    
### 7. Whenever an existing Turbo UPI user (for business A) wants to use Turbo UPI on business B, would the same UPI ID be used, or would a new UPI ID be created?

         Existing UPI ID with @axisbank will be reused on any new subsequent Turbo UPI businesses. There is no requirement to create new UPI IDs for the same customer. Furthermore, as a UPI ID is already available, this would mean one less step (bank selection step) for the end-user in the 1-time device binding process. 
        

        
### 8. What is the difference between P2P and P2M transactions?

 
         - P2P (Peer-to-Peer): This type of transaction occurs between two individuals, where one person transfers funds to another person, both of whom are registered on the UPI platform.
         - P2M (Person-to-Merchant): P2M transactions involve a customer making a payment to a merchant for goods or services. In this case, the transaction is between the customer and the merchant.
        

    
### 9. What is P2M (Person-to-Merchant) payment?

         P2M (Person-to-Merchant) payment allows customers to make payments to merchants for their goods or services. In this transaction, funds are transferred from the customer to the respective merchant, facilitating a convenient and straightforward way to complete purchases.
        

## TPV

    
### 1. Is TPV supported on Turbo UPI?

         Yes, mandatory TPV is supported on Turbo UPI. Additionally, we have solutioned a way for you to never see TPV failures (a prevalent problem today that impacts success rates by 4%) through Validated Account Linking.
        

    
### 2. Is there a way to prevent users from linking a non-KYC account to my business app via Turbo UPI? 

         Yes, we have made this possible through Validated Account Linking, wherein you can limit the accounts being linked via Turbo UPI to the business app based on the KYC account details passed to us by the businesses. This prevents end users from making transactions from unauthorised accounts, resulting in 0 TPV failure cases.
        

## Supports

    
### 1. Who will manage the support for transactional queries?

 
         Razorpay will handle the support queries end to end. If it is bank-dependent, our team will coordinate with the bank internally and provide you with the latest updates and resolutions.
        

    
### 2. Is there support for multiple banks for Turbo UPI?

         The NPCI does not allow a multi-bank model for the P2M plugin (Turbo UPI).
        

    
### 3. How are we notified about the downtime if the partner bank faces fluctuations?

         We have built Downtime Detection on Turbo UPI. We will inform you via email or [Webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-downtime-started) if there are any fluctuations due to which Success Rates fall. Also, there are [Downtime APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md#entity), which you can consume to know the latest status. 
        

    
### 4. What if Turbo UPI is down? Will my UPI payments be affected? 

         Along with Turbo UPI, you can also display the existing UPI methods (BHIM / GPay / PhonePe / PayTM ), solving for downtimes. During downtime, the Turbo UPI experience will be disabled; your users can still transact via the standard UPI flows via UPI Apps.
        

## Error Code Mapping

    
### 1. How will Turbo UPI provide better error code mapping and insights into customer drop-offs?

         UPI P2M transactions are routed through third-party UPI apps, and neither you nor the payment gateways have visibility into where users drop off or why a payment has failed. With Turbo UPI, Razorpay can provide data points on the following:
            - Insightful error codes where you will know why the user's payment failed.
            - Points of user drop-offs in the transaction flow.
            - Points of friction, that is, where users spend maximum time.
            - Conversion rates of transaction flow and account linking flow.
            
         [Refer to the list of possible error reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/error-codes.md).
        

    
### 2. If a user registers on an app via Turbo UPI, is the user required to register again on another app?

         On every app, the device binding has to be done by the user. But once the user has linked bank accounts on one app, the user will get those accounts on other apps immediately once device binding is done.
