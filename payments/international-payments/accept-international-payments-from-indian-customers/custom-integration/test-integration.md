---
title: 2. Test Integration
description: Steps to test if the integration was successful and what features are supported in Razorpay's sandbox environment.
---

# 2. Test Integration

This guide helps you understand how to test the integration using Razorpay. It outlines what features are supported in Test (sandbox) vs Live environments and how to simulate various scenarios effectively.

You can make test payments using one of the payment methods configured at the Checkout.

- No money is deducted from the customer's account as this is a simulated transaction. 
- Ensure you have entered the API Keys generated in the Test Mode in the Checkout code.

## Supported Payment Methods

    
### Netbanking

You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.
        

    
### UPI

You can enter one of the following UPI IDs:

    - `success@razorpay`: To make the payment successful. 
    - `failure@razorpay`: To fail the payment.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
> 

        

    
### Cards

You can use one of the test cards to make transactions in the Test Mode. Use any valid expiration date in the future and any random CVV to create a successful payment.

Card Network | Domestic / International | Card Number
---
Mastercard | Domestic |  5267 3181 8797 5449
---
Visa | Domestic | 4386 2894 0766 0153
---
Mastercard | International | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008
---
Visa | International | 4012 8888 8888 1881

        

    
### Card BIN Information

Currently, we do not have dummy card details for all card networks. However, you can refer to the BIN (Bank Identification Number) information below to simulate different card types:

Card Network | BIN Start Digits
---
Visa | Starts with **4**
---
Mastercard | Starts with **51–55** or **2221–2720**
---
Amex | Starts with **34** or **37**
---
Diners Club | Starts with **36** or **38**
---
RuPay | Starts with **60, 65, 81, or 82**
---
Maestro | Varies, often starts with **50, 56–69**
---

        

## What You Can Test in Sandbox Mode

The following features are supported in Test Mode using test cards, UPI ids, and mock data:

    
### Features supported in test mode

         
         Feature | Supported in Test Mode | Notes
         ---
         Order Creation (/v1/orders)	| Yes | Fully testable
         ---
         Customer Creation | Yes	| Full flow supported
         ---
         Payment Creation (Simulated) | Yes | Use Razorpay-provided test cards or UPI ids
         ---
         Webhooks (Simulated) | Yes | Simulated event triggers can be tested
         ---
         Tokenisation API (Simulated) | Yes | Tokens are created but not persisted
         ---
         Refunds	| Yes | Simulated refund flow
         ---
         Subscriptions | Yes	| End-to-end test flow supported
         ---
         Auth & Capture API | Yes | Can mock Auth/Capture calls
         ---
         Charge at Will – API Structure | Yes | API structure works; mandate is mocked
         
        

You can also test webhook events using failure VPAs like `failure@razorpay` to simulate failure scenarios.

## What You Cannot Test in Sandbox Mode

Some features require real payment instruments, user authentication, or live customer flows, and thus cannot be tested in Test Mode:

    
### Features not supported in test mode

         
         Feature | Supported in Test Mode | Reason 
         ---
         Saved Cards / Token Persistence | No | Requires RBI-compliant card & customer authentication (AFA)
         ---
         Saved UPI VPAs | No | Needs real UPI mandate approval
         ---
         Card/UPI Mandate Creation | No | Involves actual banking infrastructure
         ---
         CVV-less/Card Vault Flows | No | Needs real card and authentication
         ---
         UPI Intent + App Switch | No | Not supported by test apps
         ---
         Real Notifications (SMS/Email) | No | Suppressed in Test Mode
         ---
         Analytics and Smart Reports | No | Requires real traffic and transactions
         ---
         OTP / AFA Validations | No | Test cards skip 3D Secure/OTP flows
         ---
         Settlement Reports | No | Depends on real money movement and settlements
         ---
         Charge at Will (Recurring Flow) | No | Needs real mandate + live charge events
        
        

## Testing Charge at Will (CAW) Flows

    
        - You can simulate token creation and charge requests.
        - Mandate registration and authentication are mocked.
        - No real customer authentication (3DS, OTP) is involved.
    
    
        - Real tokenisation with 3DS/OTP.
        - Mandate is registered with customer’s issuing bank.
        - Charges below ₹15,000 may work without AFA.
        - Charges above ₹15,000 will require AFA as per RBI guidelines.
    

## Minimum Transaction Amounts (Live Environment)

To ensure successful transaction processing in the Live environment, please refer to the following minimum amount requirements per payment method:

Payment Method | Minimum Amount (INR)
---
Credit Card – One-time | ₹1
---
Credit Card – Recurring | ₹1
---
UPI – One-time | ₹1
---
UPI – Recurring | Varies based on pricing/commercials set during onboarding
---
Netbanking – One-time | ₹1
---

## Next Steps

[Step 3: Go Live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/custom-integration/go-live-checklist.md)
