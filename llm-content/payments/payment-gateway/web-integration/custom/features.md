---
title: Features
description: List of features that will help you build a first-class payments experience with Razorpay Custom Checkout.
---

# Features

Razorpay payment gateway comes with a range of features that help you build a first-class payment experience.

- **Native OTP** 

Generate and verify OTP on the customers’ browser without redirecting them to their bank's ACS page for authentication. Since there is no redirection using the customers’ browser, it reduces the dependency on the customers’ browser network, drop-off rates, and provides a seamless experience for card transactions. Know more about [native OTP](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/native-otp.md).

- **OTP-Assist**

Your customers gain a faster and enhanced checkout experience with Razorpay OTP auto-read and auto-submit. The system automatically reads the OTP your customers receive and auto-fills and auto-submits the OTP with the customer's consent. It prevents errors and the users do not need to navigate or interact with additional elements to complete verification, making the process seamless. This is available by default on Android SDK and not on iOS SDK. Know more about [OTP-Assist](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/otp-assist.md).

- **Offers**

Attract your customers and improve sales by providing discounts or cashback on your website or apps. Using Razorpay Offers, you can completely control the discounts offered to your customers and restrict the payment methods to which the offers are applied.
Know more about [offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers/custom-integration.md).

- **CRED Eligibility Check**

You can determine if the user is eligible for CRED Pay transactions on Custom Checkout using their contact number with the country code.
Know more about [CRED eligibility check](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/check-cred-eligibility.md).

- **International Payments**

You can accept payments from your customers in over 100 foreign currencies using Razorpay. Know more about [international payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments.md).

- **Trusted Business**

Embed the Trusted Business Widget on your website to instill credibility amongst site visitors. It reassures your customers that they can safely transact with your brand without worries.
Know more about [trusted badge](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/features/trusted-business.md) and [trusted widget](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/widgets/trusted-business.md).

- **Saved Cards**

You can save customer card details as tokens with Razorpay. On a repeat visit, the customers can pay directly just by entering the card's CVV. Know more about [ saved cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards.md).

    
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

- **Guest Checkout Payments** 

Razorpay offers an Alternate Identifier (Alt id), a solution compliant with RBI guidelines for guest checkout payments. Alternate Identifier provides a smooth payment experience to customers. Know more about [guest checkout payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/alt-id-checkout.md).

- **UPI Payments using Mobile Number**

You can accept UPI payments using the phone number for the collect flow. Your customers can enter the mobile number linked to their UPI on checkout, open the respective UPI app, and complete the payment after entering the UPI PIN on their mobile devices. Know more about [UPI payments using mobile number](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods/#upi-payments-using-phone-number.md).

- **Saved VPA**

Razorpay enables you to save a customer's VPAs. The VPAs entered by the customer are stored and secured as tokens in Razorpay. The customers can select the saved VPA and complete the payment on subsequent visits. Know more about [saved VPA](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-vpa.md).

- **Validate VPA**

If the selected payment method is `upi`, the user has to enter the `vpa` in the Checkout form. You can check if the entered VPA is valid or not. Know more about [validate VPA](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/validate-vpa.md).

- **Customer Fee-bearer**

You can charge a convenience fee to your customers for the use of technology infrastructure. Convenience Fees are seamlessly added at Razorpay Checkout without disrupting the checkout experience for your customers. Know more about [convenience fees](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/configuration/convenience-fees.md). 

    
> **INFO**
>
> 
> 
>     **Feature Request**
> 
>     This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
>     

- **Third-party Validation**

As per the SEBI guidelines, the customers must make transactions only from those bank accounts provided when they register with your business.

You can comply with the SEBI guidelines for online payment collections by offering TPV integrations with major banks at the Checkout. Customers can make payments using netbanking. Know more about [third-party validation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation/custom-integration.md).

- **Third-party Validation**

As per the SEBI guidelines, the customers must make transactions only from those bank accounts provided when they register with your business.

You can comply with the SEBI guidelines for online payment collections by offering TPV integrations with major banks at the Checkout. Customers can make payments using netbanking or UPI. UPI supports both collect and intent flows. Know more about [third-party validation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation/custom-integration.md).

- **Checkout Timeout**

You set a timeout on Checkout. After the specified time limit, the customer will not be able to use Checkout; hence, the payment will terminate after the set time. Know more about [checkout timeout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration/#checkout-options.md).

- **Downtime Communication on Checkout**
 
Downtimes updates provide an overview of various downtimes grouped across different payment methods on your [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/downtime-updates.md). You can view the latest status of downtimes for netbanking, cards, and UPI at any point. You can also view instrument details for downtimes, such as Cards Network, Issuers, Banks, and UPI handles. Know more about the [Payments Downtime API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/downtime.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Additionally, you can also temporarily prevent customers from accessing payment instruments, which are bound to fail on checkout. For example, if all payments made via Netbanking are bound to fail, you can show the option in a disabled state on checkout until it recovers. However, they can select an alternative instrument that is more likely to work to complete the payment successfully.
>
