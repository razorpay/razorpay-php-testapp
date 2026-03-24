---
title: Payments Mobile App | Issue Refunds
heading: Issue Refunds
description: Issue refunds to customers using the Razorpay Payments Mobile App and check the various refund states.
---

# Issue Refunds

You can use the Razorpay  Mobile app to issue partial or full refunds to your customers.

## How to Issue a Refund

Follow these steps to issue a refund:

1. Log in with your Dashboard credentials. You can also use the **Login With Google** option. If you have enabled the 2FA feature on your account, complete the OTP process. 

    ![Payments Mobile App Login](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payments-mobile-app-login.jpg.md)
2. Navigate to **Transactions** → **Payments**. Tap on the payment for which you have to issue a refund.

3. Tap **Issue Refund**.
    ![Issue Refunds using Razorpay Mobile App](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payments-mobile-app-refund.jpg.md)
4. Provide the following details:
    - Enter the refund amount. You can choose to make a full or partial refund.
    - Select **Refund Instantly** if you want the refund to reach the customer within a day's time.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>         - Instant refund carries additional fees.
>         - This feature is available only on Netbanking, UPI and select debit and credit cards. [Check the complete list of payment methods.](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/instant/#payment-methods.md)
>     

    - You can add a comment. This is an optional field.
5. Tap **Issue Full/Partial Refund**.

6. Tap **Yes, Issue Refund** to confirm. You get a confirmation popup as shown: 

    ![successful refund](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payments-mobile-app-success-refund.jpg.md)
7. To view the details, tap on the payment for which you initiated a refund.

## Refund States

The table below lists the various states in the refund life cycle and provides a brief description about each.

Status | Description
---
Pending | Razorpay is attempting to process the refund.
---
Processed | Once the refund has been processed, it goes to the `processed` state.

### Related Information

- [ Razorpay Mobile App](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/mobile-app.md)
- [Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds.md)
