---
title: Google Pay™
description: Enable Google Pay as a payment method for international customers using Razorpay Checkout.
---

# Google Pay™

Google Pay™ is a secure, digital wallet payment method that allows customers to pay using cards stored in their Google Account or tokenised cards on Android devices. Once Google Pay is enabled and integrated, it appears on your Checkout page as a payment option, providing a frictionless checkout experience for international customers. Know more about [Google Pay](https://pay.google.com/).

> **INFO**
>
> 
> 
> **Auto-Enabled Feature**
> 
> Google Pay is automatically enabled for eligible businesses with international payments activated on Standard Checkout. No integration changes are required.
> 
> 

    
### Advantages

         Integrating Google Pay as a payment method on Checkout offers you the following advantages:

         - **Higher Conversion Rates**: Up to 15% improvement in checkout conversion rates for international customers.
         - **Reduced Friction**: Eliminate manual card entry with biometric authentication or device PIN.
         - **Enhanced Security**: Benefit from Google's tokenisation and device-based authentication.
         - **Faster Checkout**: 80% reduction in checkout time - from 100+ seconds to under 20 seconds.
         - **Increased Success Rates**: Achieve 80%+ success rates compared to industry average of 50-55%.
         - **Broad Device Coverage**: Support for Android devices, Windows, Linux and macOS users (45%+ of international traffic).
         - **Global Reach**: Accept payments from customers using Google Pay across 100+ countries.
        

## Prerequisites

Before using Google Pay, ensure you:

- Integrate with Razorpay Standard Checkout with the international payments feature enabled.
- Are a Registered business entity (non-profit organisations are not eligible).

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> All businesses using Google Pay must adhere to the [Google Pay and Wallet API's Acceptable Use Policy](https://payments.developers.google.com/terms/aup) and accept the terms defined in the [Google Pay API Terms of Service](https://payments.developers.google.com/terms/sellertos).
> 
> 

## Google Pay on Standard Checkout

   
### Automatic Enablement

       Google Pay is automatically enabled for eligible businesses:
       
       - No code changes are required for Standard Checkout integration.
       - The payment button displays dynamically based on device compatibility and user eligibility.
       - Google Pay appears in the recommended payment methods section for eligible customers.
       - Feature is enabled internally through a phased rollout approach.
       
       **Business Eligibility:**
       - Existing Businesses with international payments enabled.
       - New Businesses: Enabled automatically upon completing Razorpay international cards onboarding.
      

   
### Understanding Google Pay Flows

       Google Pay supports two authentication flows:
       
       **1. CRYPTOGRAM_3DS Flow (Device-Tokenised Cards):**
       - Uses tokenised cards stored on the device.
       - No additional authentication required - faster checkout.
       - Provides liability shift protection.
       
       **2. PAN_ONLY Flow (Stored Card Details):**
       - Uses card details stored in Google Pay or Chrome.
       - Requires 3D Secure (3DS) authentication with issuing bank.
       - User completes OTP or biometric verification.

       
> **INFO**
>
> 
>        **Handy Tips**
>        
>        Razorpay automatically handles all cryptogram decryption, token validation and 3DS authentication. No technical integration or configuration is required from your end.
>        

      

   
### Brand Guidelines Compliance

       When displaying Google Pay as a payment option:
       
       - Use the official Google Pay logo and button assets only.
       - Follow [Google Pay web brand guidelines](https://developers.google.com/pay/api/web/guides/brand-guidelines) for web implementations.
       - Follow [Google Pay Android brand guidelines](https://developers.google.com/pay/api/android/guides/brand-guidelines) for mobile implementations.
       - Do not modify Google Pay asset colours, proportions or appearance.
      

## Supported Card Networks

Google Pay on Razorpay supports the following international card networks:

- Visa
- Mastercard
- American Express (Amex) (Coming Soon)
- Diners Club (Coming Soon)
- Discover (Coming Soon)

Supported networks are automatically configured based on your business account settings and terminal availability.

## Payment Flow For Customers

Given below is the payment flow for Google Pay at Razorpay Checkout:

1. The customer selects **Google Pay** at checkout.
2. If eligible for Dynamic Currency Conversion (DCC), the customer sees a currency selection screen. Select preferred currency (for example, INR or USD) and click **Pay with Google Pay** to proceed.
3. Google Pay displays the payment sheet with all the card options available.
4. Customer selects a card and completes the payment instantly.
5. Payment processes and the customer is returned to the website with a confirmation.

## Device and Platform Support

Google Pay automatically appears for eligible customers based on their device and browser:

Device/OS | Browser | Google Pay Display
---
Android | All browsers | Yes
---
Windows | All browsers | Yes
---
Linux | All browsers | Yes
---
macOS | Chrome, Firefox, Edge | Yes
---
macOS | Safari | No
---
iOS | Safari | No
---
iOS | Chrome, Firefox, other | Yes

## Frequently Asked Questions

   
### 1. Do I need to make any code changes to support Google Pay on Standard Checkout?

       No code changes are required for Standard Checkout integration. Once Google Pay is enabled on your account (automatically for eligible businesses), it will appear as a payment option for eligible customers based on their device and browser compatibility.
      

   
### 2. Can customers save their Google Pay details for future purchases?

       Google Pay uses cards stored in the user's Google Wallet or Google Account. Once customers add cards to their Google Wallet, these are automatically available for all future Google Pay transactions without needing to re-enter card details.
      

### Related Information

For technical implementation details and API integration, refer to:
- [Google Pay Web Developer Documentation](https://developers.google.com/pay/api/web/)
- [Google Pay Android Developer Documentation](https://developers.google.com/pay/api/android/)
- [Google Pay Web Integration Checklist](https://developers.google.com/pay/api/web/guides/test-and-deploy/integration-checklist)
- [Google Pay Android Integration Checklist](https://developers.google.com/pay/api/android/guides/test-and-deploy/integration-checklist)
