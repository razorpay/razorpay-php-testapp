---
title: Google Pay Integration -  Standard Checkout
description: Integrate Google Pay on Razorpay's Standard Checkout page for web and Android apps.
---

# Google Pay Integration -  Standard Checkout

When using Razorpay Standard Checkout Integration, you do not require any extra integration to display the Google Pay option in the list of payment options.Google Pay is shown inside the **UPI** section on the checkout form.

Google pay is shown under the **UPI** section on the checkout form.

![Google Pay Standard Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-checkout-header-changes.jpg.md)

## Web Integration

### Collect flow

On your website, all Google Pay requests will be Collect requests. The customer selects the Google Pay option, enters their UPI handle and clicks **Pay**. A request is sent to the Google Pay app installed on their mobile device. The customer has to manually open the Google Pay app and approve the request.

### Intent flow

Customers can make intent-based payments using Google Pay on mobile-web applications. Here, the customer is redirected to Google Pay’s application, installed on their mobile devices, to complete the payment.

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is only available for web pages running on HTTPS on Google Chrome for Android (v56 and above) and not on Google Chrome web views.
> 

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Android Integration

@include payment-methods/upi-collect-deprecated/standard

### Intent-Based Integration

When using the Standard Checkout, Google Pay is shown inside the payment method **UPI**. The customer selects Google Pay from the list of apps and click **Pay**. Customers are then redirected to the Google Pay application, provided it is installed on the mobile device they are using to access checkout, where they can make the payment.

#### Intent-Based Integration Using Google Pay SDK

You also have the option to integrate Google Pay with the Standard Checkout on your Android app using Google's SDK.

This offers the advantage of letting you open Google Pay within your application for customers to make the payment without any redirection, enhancing the user experience.

#### Prerequisites

1. [Sign up](https://support.google.com/pay/business/answer/7684271?hl=en&ref_topic=7684388) for a business account with Google Pay.
1. [Contact our Support Team](https://razorpay.com/support/#request) and have them **whitelist your UPI ID/VPA**.
1. Verify your UPI ID/VPA details on the [Google Merchant Console](https://support.google.com/pay/business/answer/7684398?hl=en&ref_topic=7684388). Here, Google deposits a small amount into the bank account linked to your VPA (UPI ID).
1. You should have already integrated [Razorpay Standard Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
1. [Generate API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) from the Dashboard.

### Collect-Based Integration

This is same as [UPI Collect Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/#collect-flow.md).

The customers enter their UPI handle in the **Enter your UPI ID** section on the Checkout form and click **Pay**. Collect the customer's UPI handle and pass it in the payment request with method as `upi`.

Razorpay then triggers a Collect request. The Collection request is sent to the customer's Google Pay application where they can make the payment.

**NPCI Restrictions for UPI Collect Flow**

As per NPCI guidelines, the following MCC codes are restricted and cannot accept UPI Collect payments:

  
### Restricted MCC Codes

     
     MCC Code | Category
     ---
     5816 | Digital Goods: Games
     ---
     6540 | POI Funding Transactions (excluding MoneySend)
     ---
     4812 | Telecommunication Equipment and Telephone Sales
     ---
     4814 | Telecommunication Services
     ---
     7408 | Lending Platform
     ---
     6513 | Real Estate Agents and Managers - Rentals
     ---
     7995 | Betting/Lottery
     ---
     5412 | Grocery Stores, Supermarkets
     ---
     5413 | Grocery Stores, Supermarkets
     
    

@include payment-methods/google-pay-sdk-integration
