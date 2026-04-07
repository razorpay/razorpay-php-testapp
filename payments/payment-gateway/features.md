---
title: Features | Razorpay Payment Gateway
heading: Features
description: List of features that will help you build a first-class payments experience with Razorpay Checkout.
---

# Features

Razorpay payment gateway comes with a range of features that helps you build a first-class payments experience.

- **Cash on Delivery** 

You can now offer Cash on Delivery (COD) as a payment method on the Razorpay Checkout interface. Customers can choose COD directly on the Checkout page, alongside UPI, cards, netbanking and more. This flow increases accessibility and builds trust among first-time buyers and high-value orders. Know more about how to enable [Cash on Delivery](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cod.md) on your checkout page.

- **Sign in with Truecaller** 

Truecaller-based authentication allows your customers to verify themselves at the checkout without entering an OTP. Customers who have the Truecaller app installed on their devices will receive a pop-up for authentication using Truecaller. This feature is enabled by default and only applies to the Android SDK and Android Mobile Web browsers (Chrome and Samsung). To disable Truecaller-based authentication, please raise a request with our [Support team](https://razorpay.com/support/). 

- **Order Milestone Badge on Checkout** 

Boost trust and credibility by displaying order milestone badges at checkout. These badges highlight real order volumes, reassuring customers of your reliability and encouraging them to complete their purchase. Know more about [Order Milestone Badge](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#order-banner).

        For example, if your store has processed 10,000+ successful orders, the badge showcases this achievement, reinforcing trust.

        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         - This feature is automatically enabled and currently available only for businesses with [RTB](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/widgets/trusted-business.md) enabled.
>         - If a [message banner](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#message-banner) exists on the checkout page, the badge information seamlessly integrates within the same section using vertical scrolling.
>         

        
            
### Customer Experience

                    
                

        

- **QuickBuy: Revolutionise Your Checkout Process** 

QuickBuy is a game-changing 1-click payment experience designed to simplify your checkout. Its intuitive half-page interface minimises steps, allowing customers to complete payments faster. 

    Leveraging advanced personalisation algorithms, QuickBuy streamlines the checkout experience by minimising steps and simplifying decisions leading to quicker checkouts and higher conversion rates. This boosts customer satisfaction and drives business growth, making every transaction seamless. Know more about [QuickBuy](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/features/quickbuy.md).

- **Saved Cards**

You can save customer card details in the form of tokens with Razorpay. On a repeat visit, the customers will be able to pay directly just by entering the CVV of the card. Know more about [saved cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>      - CVV is not required by default for tokenised cards across all networks.
>      - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>      - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>      - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>      - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.   
>     

- **Biometric Authentication**

Razorpay's biometric authentication ensures security and convenience by eliminating OTP verification. It uses device capabilities to verify users, enabling faster access to saved cards during checkout. Once set up, users can access their saved cards with just their fingerprint. 

    
        
### Customer Experience

                
            

    

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>      - This feature is enabled by default. To disable it, raise a request with our [Support Team](https://razorpay.com/support).
>      - It is only available for businesses using Standard Checkout on Android devices that support biometrics.
>      - It is not supported on webviews redirected from apps like Instagram or Facebook.
>      - We are rolling it out in phases and will soon be available for your users at checkout.
>     

- **OTP Auto-Read and Submit**

Your customers gain a faster and enhanced checkout experience with Razorpay OTP auto-submit. The system automatically reads the OTP received, with your customer’s consent, and submits it. It prevents errors and the users do not need to navigate or interact with additional elements to complete verification, making the process seamless. This is available by default on Android SDK and not available on iOS SDK.

- **UPI Payments using Mobile Number**

Your customers can enter their mobile number linked to their UPI on checkout, open the respective UPI app and complete the payment after entering the UPI PIN on their mobile devices. Customers are redirected to your website or app after successful payment. Know more about [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).

- **Offers**

Attract your customers and improve sales by providing discounts or cashback on your website or apps. Using Razorpay Offers, you can have complete control of the discounts offered to your customers and restrict the payment methods on which the offers are applied.
Know more about [offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers.md).

- **Checkout in Local Languages**

Allow customers to change the display language of checkout fields to enhance accessibility. By default, checkout fields are shown in English, but customers can switch to Hindi, Marathi, Gujarati, Telugu, Tamil, and more. To change the language:

    - On mobile: Click the **Account & Terms** icon in the top-right corner, then select **Language**.
    - On desktop: Click the more icon in the top-right corner, then select **Language**.

    Once selected, the checkout fields update to the preferred language. Know more about how to [change the default language](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#default-language).

    
        
### Customer Experience

                
            

    

- **Eligibility Check**

Razorpay offers a pre-eligibility check on Debit Card EMI, Cardless EMI and Pay Later instruments at checkout. By assessing eligibility upfront, your customers can choose the most relevant affordability option and complete the purchase quicker.
Know more about [eligibility check](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/eligibility-check/standard.md).

- **Making Email Read-only**

You can set the email field as read-only to ensure your customers can only view the email but can not edit it. You can allow your customers to edit this field based on your preferences. Know more about [making email read-only](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#123-checkout-options).

- **Configuring Payment Methods**

Razorpay Standard Checkout hosts a variety of payment methods for customers to make payments. You can rearrange the order of these payment methods and display them at the Checkout to provide a highly personalised experience for your customers. Know more about [configuring payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).

- **Autofill for Faster Checkout**

Razorpay Checkout autofills details like addresses, contact information and saved card data by default across various platforms, including Instagram, Facebook and iOS browsers. This reduces customers time and effort to complete transactions, boosting your conversion rates. 

- **Prefill Customer Contact Details**

To improve conversion rates and reduce form-fill friction, use the prefill parameter to automatically fill in customer contact information, especially their phone number. The expected format while prefilling the phone number in the [Checkout code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#code-to-add-pay-button) is `+ (country code)(phone number)`(Example: "contact": "+919000090000"). 

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     This feature is not applicable if you:
>         - Do no collect customer contact details on your website before checkout.
>         - Have Shopify stores.
>         - Use any of the no-code apps.
>     

- **Making Phone Number Field Optional**

You can hide the phone number field from the checkout page based on your preferences. You can also enable customers to proceed with the payment without providing a phone number. Refer to the [Checkout Options](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#checkout-options) table to know more about making the phone number field optional.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     - To enable this feature, contact our  [Support Team](https://razorpay.com/support).   
>     - If you enable customers to proceed with the payment without providing their phone number, then the field will not appear against the payment on the Dashboard and the reports.
>     

- **Configure Email Address Field**

The email address field is hidden by default on checkout if it is not pre-filled. Since email is not mandatory, this will reduce drop-offs and improve conversion rates. You can choose to hide the field, make it optional or mandatory based on your business requirement. Know how to [configure the email address field](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#collect-email-from-customers).

- **Partial Payment Capability**
 
You can allow your customer to make partial payments at the Checkout. Know more about [partial payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#111-request-parameters).

- **International Payments**

You can accept payments from your customers in more than 100 foreign currencies using our Payment Gateway and other products such as Payment Pages, Payment Button, Payment Links, and Invoices. Know more about [international payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md).

- **Trusted Business**

Showcase our Trusted Badge on checkout and embed the Razorpay Trusted Business Widget on your website to instil credibility amongst site visitors. It reassures your customers that they can safely transact with your brand without any worries.
Know more about [trusted badge](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/features/trusted-business.md) and [trusted widget](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/widgets/trusted-business.md).

- **Customer Fee-bearer**

You can choose to charge a convenience fee to your customers for the use of technology infrastructure. Convenience Fees are seamlessly added at Razorpay Checkout without disrupting the checkout experience for your customers. Know more about [convenience fees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/configuration/convenience-fees.md). 

- **Third-party Validation**

As per the SEBI guidelines, the customers must make transactions only from those bank accounts provided when they register with your business.

You can comply with the SEBI guidelines for online payment collections by offering TPV integrations with major banks at the Checkout. Customers can make payments using netbanking or UPI. UPI supports both collect and intent flows. Know more about [third-party validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md).

- **Checkout Timeout**

You set a timeout on Checkout. After the specified time limit, the customer will not be able to use Checkout and hence the payment will terminate after the set time. Know more about [checkout timeout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#123-checkout-options).

- **Downtime Communication on Checkout**
 
Downtimes updates provide an overview of various downtimes grouped across different payment methods on your [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/downtime-updates.md). You can view the latest status of downtimes for netbanking, cards, and UPI at any point in time. You can also view instrument details for downtimes such as Cards Network, Issuers, Banks, and UPI handles. Know more about the [Payments Downtime API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     We temporarily prevent customers from accessing payment instruments, which are bound to fail on checkout. For example, if all payments made via Netbanking are bound to fail, we show the option in a disabled state on checkout until it recovers. However, they can select an alternative instrument that is more likely to work to complete the payment successfully.
>     
>         
>             Customer Experience
>             
>              
>             
>         
>     
>     

- **Checkout Retry Flow**

By default, Razorpay provides transparent, contextual, and actionable suggestions to customers at the point of payment failure on checkout. For example, if a customer's payment via Card fails on Razorpay checkout, the system intelligently suggests the next best payment option based on the reason for the failure and the customer's past transaction history. This reduces customer drop-offs and improves the overall payment experience.

    
        
### Customer Experience

             
            

    

### Related Information
- [Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md)
- [How Payment Gateway Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md)
- [Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md)
