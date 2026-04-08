---
title: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Recurring Payments using Emandate.
---

# Frequently Asked Questions (FAQs)

## Registrations

    
### 1. How does the NPCI ENACH registration process work?

         Following is the registration flow of the NPCI ENACH:

         
        

    
### 2. How does Emanate registration process work with Razorpay’s direct bank partnerships?

         Following is the registration flow of Emanate with Razorpay’s direct bank partnerships

         
        

    
### 3. Is there a video that we can share with customers to understand the registration flow?

         Yes, you can share the below video with customersto understand the registration flow.

         
        

    
### 4. What can I do to ensure the best user experience for Emandate registrations?

         To improve the Emandate registration user experience for your customers:
          - Before customers proceed with the authorisation transaction, you can display a message asking your customers to keep their netbanking credentials handy. This will help prevent time-out at the checkout.
          - Inform your customers that there might be a ₹1 or ₹2 deduction during the authorisation transaction. This amount will be refunded to your customer in 3-5 bank working days.
        

    
### 5. What is the timeline for Emandate token registration confirmation?

         The timeline for token confirmation depends on the authentication method and bank used for registration. Token confirmation is required before you can initiate debits on the mandate.
         
         **Confirmation Timelines by Authentication Type and Bank**

          
          Authentication Type | Bank | Timeline | Details
          ---
          Debit Card, Netbanking | All Banks (NPCI eNACH) | Real-time | Once an Emandate registration request is created, the token status confirmation happens immediately in real-time.
          ---
          Aadhaar Card | All Banks (RBL eSign) | T+1 working days | After successful registration payment, the payment status changes to `authorized`. Token moves from `initiated` to `confirmed` based on the T+1 processing schedule below.
          ---
          Netbanking | ICICI Bank (direct integration) | Real-time | Once an Emandate registration request is created, the token status confirmation happens immediately in real-time.
          ---
          Netbanking | Axis Bank (direct integration) | Real-time | Once an Emandate registration request is created, the token status confirmation happens immediately in real-time.
          ---
          Netbanking | HDFC Bank (direct integration) | T+1 working days | After successful registration payment, the payment status changes to `authorized`. Token moves from `initiated` to `confirmed` based on the T+1 processing schedule below.
          ---
          Netbanking | State Bank of India (direct integration) | T+1 working days | After successful registration payment, the payment status changes to `authorized`. Token moves from `initiated` to `confirmed` based on the T+1 processing schedule below.
          

          **T+1 Processing Schedule**

          Authorisation requests are processed based on submission time:

          - Requests created between **T-1 day 9:00 AM** and **T day 9:00 AM** are processed on **T during banking hours**.
          - Requests created **after T day 9:00 AM** are processed in the **T+1 cycle**.

          **Important Considerations**

          - Delays: Token confirmation may be delayed up to 5 days in some instances due to bank-side issues or bank holidays.
          - Debit timing: Debits can only be initiated after token confirmation is complete.
          - NPCI eNACH partner banks: While registrations are instant with NPCI eNACH, partner banks may take up to 2 days to complete their registration process. Debits initiated before the bank completes registration will fail. Wait at least 2 days before retrying a failed debit.

          
          
> **INFO**
>
> 
>           **Handy Tips**
>           
>           To ensure same-day token registration confirmation, submit your request to Razorpay by 8:59 AM on a bank working day.
>           

        

    
### 6. How can I cancel my customer's registered mandates?

         For all mandates registered under ENACH, NPCI offers a facility to cancel the mandates which are either not in use or are requested by the customers to be cancelled.

         You can initiate cancellation and track the status by following these steps:
          - Delete the mandate token using [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#delete-the-token) or [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md#23-delete-tokens). 
          - Razorpay will initiate cancellation for the deleted tokens on the next working day.
          - On acknowledgement from NPCI for cancellation, you will receive a 'Token Cancelled' [webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#token-cancelled), which can be taken as a confirmation of mandate cancellation.
            
            
        

    
### 7. Can Razorpay help schedule debits for Emandates?

         Razorpay will take care of your scheduled debits if you use our Subscriptions services.

         Know more about [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md).
        

    
### 8. My customers are not able to register via one of the banks. What can I do?

         It may be a temporary issue of bank downtime on NPCI. If you see this as a consistent issue for more than 24 hours, raise a support ticket from your Dashboard.
        

    
### 9. Which account types are allowed to sign up for online Emandates?

         Following are the supported account types for online Emandates:
          - Savings
          - Current

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>           - If your customer is a sole proprietor of the business, they can register their Emandates using the `current` account type.
>           - Suppose your customer’s business has a corporate cash-credit account. In that case, they can only register using Physical NACH, where we have an option of `cash credit` accounts for mandate registrations.
>          

        

    
### 10. Can joint account holders sign up for Emandates?

         Joint accounts have multiple modes of operation. Suppose the customer trying to set up the mandate has access to operate the account without the joint account holder’s consent (mode of operation on account as `either or survivor` or `anyone or survivor`). In that case, they can register the mandates. 

         However, if both joint holders’ approval is required for operating the account, then such account holders cannot register with Emandates.
        

    
### 11. What are the prerequisites for customers to register using Emandates?

         Customers need to ensure the following while registering for emandates:
         1. Have the details for the selected mode of authentication.
            1. **NetBanking:** Login and Password
            2. **Debit Card:** Card Number, Expiry and Debit Card PIN
            3. **Aadhaar:** Aadhaar Number and Registered mobile number as on Aadhaar
         2. Ensure the bank account used for authentication with NetBanking or Debit Card is the same as the account number used for registration. For Aadhaar based authentication, ensure to map the Aadhaar Number to the bank account on which the mandate is being registered.
         3. Maintain average monthly balance in the bank account where the mandate is being registered.
         4. Ensure that the selected bank account is in the `active` state.
        

    
### 12. Which banks are supported for Emandates?

         You can refer to the [Supported Banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/supported-banks.md) page for the list of supported banks for Emandates.
        

    
### 13. What information should we collect from a user to successfully register their Emandate?

         You should collect the following information from the customer:
          1. Customer Name
          2. Account Number
          3. IFSC Code
          4. Account Type
          5. Bank Name
        

    
### 14. I have recently signed up with Razorpay and my Razorpay account balance is ₹0. I cannot capture my payments and they are stuck in the `authorized` state. What should I do?

         As there is no payment at the time of Emandate registrations, you need to have a sufficient balance in your Razorpay account to pay the transaction charges for registrations. 

         We recommend you top up your Razorpay account with a minimum amount to take care of registration charges until you start generating continuous cash flow via Razorpay.
        

    
### 15. How do I enable Aadhaar as an auth type for emandates? Do I need to make changes in my Integration to use the aadhaar emandate?

         Aadhaar emandate is available only on request. Raise a request on our [Support Portal](https://razorpay.com/support/#request) to get this feature enabled.

         After it is enabled on your account, pass `auth_type=aadhaar` in the existing emandate APIs.
        

## Debits Presentments

    
### 1. How does the debit presentment work with NPCI ENACH?

         Following is the debit presentment flow of the NPCI ENACH:

         
        

    
### 2. What is the maximum amount which can be debited from the customers?

         You can set the maximum amount while initiating registrations for your customers. The maximum amount varies depending on the authentication mode using which customers want to set up the mandate.

         If you do not set a limit for the mandate, the maximum limit defaults to ₹1,00,00,000 for Emandates.

         **For Emandates via NPCI**

         The following table lists the auth types and their maximum limit allowed for Emandates via NPCI.

         
         **Auth Type** | **Maximum Allowed Limit** | Default Allowed limit(if no max amount mentioned)
         ---
         Netbanking | ₹1,00,00,000 | ₹1,00,00,000
         ---
         Debit Card | ₹1,00,00,000 | ₹1,00,00,000
         ---
         Aadhaar | ₹1,00,00,000 | ₹1,00,00,000
         

         **For Emandates - Direct bank integration (SBI, ICICI, Axis)**

         The following table lists the auth type and the maximum limit allowed for Emandates - Direct bank integration (SBI, ICICI, Axis).

         
         **Auth Type** | **Maximum Allowed Limit** | Default Allowed limit(if no max amount mentioned)
         ---
         Netbanking | ₹1,00,00,000 | ₹1,00,00,000
         

         **For Emandates - Direct bank integration (HDFC)**

         The following table lists the auth type and the maximum limit allowed for Emandates - Direct bank integration (HDFC).

         
         **Auth Type** | **Maximum Allowed Limit** | Default Allowed limit(if no max amount mentioned)
         ---
         Netbanking | ₹1,00,000 | ₹1,00,000
         
        

    
### 3. Is there a cooling period for Emandates registered via NPCI ENACH for initiating the first debit after completing the registration process?

         The registrations are instant with NPCI ENACH and you can initiate debits immediately. 

         However, there are instances where the registration confirmation at the partner bank side has not been completed. It could take up to 2 days to complete this process.
         
         We have observed that most debits get cleared even when presented as soon as the registration is complete. That said, we recommend waiting for 2 days before you retry after a failed debit.
        

    
### 4. Is there a cooling period for Emandates registered via Aadhaar Esign for initiating the first debit after completing the registration process?

         Debits can be initiated once the token status changes to `confirmed`. There is no additional waiting or cooling period required after the successful validation of the Aadhaar eSign.
        

    
### 5. Is there a cooling period for Emandates created via Direct Bank Integration (ICICI, Axis, HDFC, SBI) for initiating the first debit after completing the registration process?

         Debits can be initiated once the token status changes to `confirmed`. There is no additional waiting or cooling period required.
        

    
### 6. For Emandates, how long does it take a subsequent charge to move from the `created` state to the `authorized` state?

         In the case of Emandate, the process varies from bank to bank and the authentication type used. Based on the integration used during Emandate registration, it can take up to 2 working days for subsequent debit payment authorisation.

         

         Bank | TAT Guidelines | TAT Examples
         ---
         All Banks under NPCI ENACH | T+2 working days | Debit requests created between **T-1 day 9 AM** and **T day 9 AM** are processed on **T by end of the day**. Requests after **T day 9 AM** are processed in **T+1 cycle**.
         ---
         All Banks under RBL eSign (registered using Aadhaar) | T+2 working days | Debit requests created between **T-1 day 9 AM** and **T day 9 AM** are processed on **T by end of the day**. Requests after **T day 9 AM** are processed in **T+1 cycle**.
         ---
         ICICI Bank | Real-time | Debit requests are processed in real-time.
         ---
         Axis | T+2 working days | Debit requests created between **T-1 day 9 AM** and **T day 9 AM** are processed on **T by end of the day**. Requests after **T day 9 AM** are processed in **T+1 cycle**.
         ---
         HDFC Bank | T+2 working days | Debit requests created between **T-1 day 9 AM** and **T day 9 AM** are processed on **T by end of the day**. Requests after **T day 9 AM** are processed in **T+1 cycle**.
         ---
         State Bank of India | T+2 working days | Debit requests created between **T-1 day 9 AM** and **T day 9 AM** are processed on **T by end of the day**. Requests after **T day 9 AM** are processed in **T+1 cycle**.
         

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          To ensure same-day debit authorisation, Razorpay must receive the request by 8:59 am on a bank working day.
>          

        

    
### 7. Will my debits get processed on holidays as well?

         Customer account debits for Emandates registered with NPCI ENACH will be done on all days, including weekends and public holidays. 

         However, settlements for the debit payments captured on weekends and public holidays will only be made on the next working day as per your settlement schedule.
        

    
### 8. I am getting an error saying `Customer has to refer to branch to complete registration` while initiating debits for my customers?

         This issue occurs when the bank has not completed the registration at their end. For such cases, you can retry debit after 5 working days. If this issue persists, inform your customers to contact their bank and get their mandate approved.
        

    
### 9. I am getting an error saying  `Payment failed because emandate is cancelled or inactive` while presenting debits for my customers?

         This failure can occur for 2 reasons:
         1. When the first debit is presented within a few days after registration. This means that the bank has not completed the mandate setup. You can retry after 5 days of the first failure in such cases.
         2. When the debit is presented more than a month after registration, then it means that the customers have cancelled the mandate by approaching their bank. In such cases, you will need to ask customers to register a new mandate.
        

    
### 10. The payment status for debit presentment says `authorized` and I have not received a settlement for this payment yet. Why?

         Payments have to be `captured` for the corresponding settlement to take place. You can manually capture the payment from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#manually-capture-payments).

         Alternatively, to avoid manual dependency, you can enable Auto Capture for all your payments from the Dashboard.

         Know more about [Capture Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments).
        

    
### 11. When can I retry subsequent debit if the first attempt fails for NPCI ENACH?

         If the first attempt fails, you can retry after 3 days from getting the confirmation or rejection of the last payment, as it may take more than 24 hours.

         For example:
         - If the charge fails on 1 November 2023 and you receive the confirmation, you can retry the attempt on 4 November 2023.
         - If the charge fails on 1 November 2023 and you receive the confirmation on 2 November 2023, you can retry the attempt on 5 November 2023.
        

    
### 12. Will there be any charges applied for subsequent debit failures?

         Yes, we will charge for failed debit attempts after the prescribed retries. Please contact the [support team](https://razorpay.com/support/#request) for information on the exact charges.
        

## Charge Customer During Registration

    
### 1. Is the feature, Charging Customers During Registration, available on all authorisation methods?

         The feature, **Charging Customers During Registration**, is available only on emandate via netbanking.
        

    
### 2. Is the feature, Charging Customers During Registration, supported by all banks?

         The feature, **Charging Customers During Registration**, is only supported by HDFC and ICICI.
        

    
### 3. How is this feature, Charging Customers During Registration, different from the First Payment Amount feature?

         **First Payment Amount**:

         The first charge is automatically debited after NPCI confirms the mandate. The amount is debited from the customer's account within 2 days of token confirmation.

         **Charging Customers During Registration**:

         The customer is not immediately charged. First, the mandate is registered. We automatically charge the customer the first payment amount only after the mandate is successfully registered.
        

    
### 4. What is the maximum amount I can charge a customer immediately using the Charging Customers During Registration feature?

         Currently, we support this for HDFC and ICICI. For HDFC, the maximum amount is ₹1,00,000. For ICICI, it is ₹1,00,00,000.
        

## Payment retries

    
### 1. Can I retry a failed payment?

         Payment re-tries are not automated. You can manually re-initiate the payment for the same order id in case of a failed payment. If the payment for the given order id is successful or refunded, then you cannot use the same order id to initiate the payment.

         However, if the payment has failed due to `insufficient_balance`, you can only re-initiate a payment 3 days after initiating the previous payment.
        

    
### 2. How many times can I retry a payment?

         You can manually re-initiate a payment for the same order id, repeatedly, until the payment is successful. Once the payment is successful or refunded, you cannot use that order id to re-initiate the payment.

         However, if the payment has failed due to `insufficient_balance`, you can only re-initiate a payment 3 days after initiating the previous payment.
