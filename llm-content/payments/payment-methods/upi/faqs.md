---
title: UPI Payment Methods | UPI - FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about UPI as a payment method at Razorpay Checkout.
---

# Frequently Asked Questions (FAQs)

## UPI Collect Flow (Deprecated)

  
### 1. Why is UPI Collect being discontinued?

     The National Payments Corporation of India (NPCI) is sunsetting the UPI Collect flow to align with the latest ecosystem compliance standards and enhance transaction security. By supporting only UPI Intent flows (automatic app redirection on mobile) and Dynamic QR (on desktop), the ecosystem aims to reduce manual entry errors and curb fraudulent `pull` requests, leading to higher success rates for businesses.
    

  
### 2. From when will UPI Collect stop working?

     NPCI is sunsetting UPI Collect across all devices and operating systems effective 28 February 2026. Razorpay is rolling out this transition in phases to ensure all businesses are compliant before the final deadline.
    

  
### 3. Will this impact Standard, Custom and S2S Checkout?

     Yes, this change impacts all Razorpay integrations:

     - **Standard Checkout**: Razorpay will automatically handle the transition by removing the UPI Collect option and enabling Intent/QR flows for one-time and recurring payments.
     - **Custom/S2S Checkout**: You must take manual action to remove the UPI Collect option from your UI and backend and ensure you have enabled UPI Intent or QR codes. 

     Check deprecation and migration guides below:
     - [Standard Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/standard-integration.md).
     - [Custom Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/custom-integration.md)
     - [S2S Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md)
    

  
### 4. Is UPI Autopay affected by this change?

     Yes, but only for new mandate registrations. New registrations via the Collect flow will no longer be supported. Migrate to UPI Intent (for mobile) and Dynamic QR (for desktop) for setting up new mandates.

     Automatic debits for already registered mandates on the UPI Collect flow will continue to be supported. No changes are required for existing mandates.
    

  
  
### 5. What happens if I do not migrate before the deadline?

     Transactions initiated via the deprecated UPI Collect flow after the deadline may fail or be declined. If you have not enabled UPI Intent flows on your checkout, this could result in lost revenue. We recommend migrating as soon as possible.
    

  
### 6. Will there be downtime during migration?

     No downtime is expected during this migration. The transition is being conducted in phases and we will keep you informed ahead of the sunset timelines.

     If you are using Custom/S2S checkout, ensure UPI Intent and QR payment modes are live on your checkout before removing the UPI Collect option to ensure a seamless experience for your customers.
    

  
### 7. Who can I contact for migration support?

     - **Managed Accounts**: Contact your Razorpay Account Manager for dedicated assistance.
     - **Self-Serve Accounts**: Raise a support ticket via your [Razorpay Dashboard](https://dashboard.razorpay.com) or email [support@razorpay.com](mailto:support@razorpay.com).
    

  
### 8. My UPI payments stopped working after UPI Collect was disabled. What should I do?

     If UPI Collect was disabled on your account and you have not enabled UPI Intent or QR code, your checkout may break and prevent customers from completing UPI payments.

     
        
            - UPI Intent (mobile/mobile web) and UPI QR code (desktop) are automatically enabled on your checkout
            - If you were not using these flows previously, you may need to configure them.
            - Refer to the [Standard Checkout migration guide](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/standard-integration.md) for more information.
        
        
            - You must manually integrate UPI Intent and QR code.
            - Refer to the migration guides:
                - [Custom integration](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/custom-integration.md).
                - [S2S integration](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md).
        
     

     **To prevent this issue:**
     - Ensure UPI Intent and QR code are enabled and working on your checkout **before** UPI Collect is disabled.
     - Test the new flows thoroughly.
     - For Standard Checkout, verify that Intent/QR modes are active on your account even if you were not using them before.
    

## Common

  
    
### 1. I am seeing an error while enabling UPI as payment method. How to resolve?

         If you are facing error while enabling UPI as payment method:

         - You might have made a request using a non-owner role. Please log in as an owner and try again. See [ Manage Team](https://razorpay.com/docs/payments/dashboard/account-settings/manage-team/).
         - If the issue persists, clear your cookies and retry.
         
         If you still receive an error, reach out to your dedicated support HDFC Relationship Managerthe [Razorpay Support team](https://razorpay.com/support/).
        

    
### 2. How can I enable UPI apps for my account?

         Navigate to **Account & Settings → Payment Methods** and check if UPI apps are reflecting along with other payment methods. If it is not enabled, you can reach out to the [Razorpay Support team](https://razorpay.com/support/) to get it enabled. 
         See [ UPI Payment Methods](https://razorpay.com/docs/payments/payment-methods/upi/).
        

    
### 3. Which UPI apps does Razorpay support?

       Here is the [list of supported UPI apps](https://razorpay.com/docs/payments/payment-methods/upi/supported-apps/).
