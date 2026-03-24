---
title: Turbo UPI SDK - Error Codes | Android Standard Integration
heading: Turbo UPI SDK - Error Codes
description: List of error codes for Turbo UPI SDK.
---

# Turbo UPI SDK - Error Codes

Given below is the list of error codes categorised by error reasons, with relevant descriptions, source and step.

### Bad Request Errors

Given below is the list of Bad Request errors.

    
### bank_not_live_on_upi

        - **Description**: The selected bank is not enabled on UPI. Please try using another bank.
        - **Source**: gateway
        - **Step**: customer_onboarding
        

    
### account_does_not_exist

         
            
                Payment Debit Request
                
                 - **Description**: No accounts found for the selected bank. Please try using another bank.
                 - **Source**: issuer_bank
                 - **Step**: payment_debit_request
                

            
### Payment Credit Request

                 - **Description**: Payment was unsuccessful as the receiver's bank account is not valid. Any amount deducted will be refunded within 5-7 working days.
                 - **Source**: beneficiary_bank
                 - **Step**: payment_credit_request
                

         
        
    
    
### transaction_not_allowed

         
            
                Payment Debit Request
                
                 - **Description**: Transaction not permitted to the account as per your bank policy. Please contact your bank for more details or try with another bank account.
                 - **Source**: customer
                 - **Step**: payment_debit_request
                

            
### Payment Credit Request

                 - **Description**: Payment not allowed as it got declined by the receiver's bank. Any amount deducted will be refunded within 5-7 working days.
                 - **Source**: beneficiary_bank
                 - **Step**: payment_credit_request
                

         
        
    
    
### upi_pin_registration_card_expired

        - **Description**: Card used while setting UPI PIN has expired. Please use another debit card or use another bank account.
        - **Source**: issuer_bank
        - **Step**: payment_authentication
        

    
### upi_pin_registration_card_not_found

        - **Description**: Card details used while setting UPI PIN are incorrect. Please re-check and try again.
        - **Source**: issuer_bank
        - **Step**: payment_authentication
        

    
### upi_pin_registration_card_restricted

        - **Description**: Card used while setting UPI PIN has been blocked by your bank. Please reach out to your bank for more information or try using another bank account.
        - **Source**: issuer_bank
        - **Step**: payment_authentication
        

    
### bank_technical_error

        - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
        - **Source**: beneficiary_bank
        - **Step**: payment_status_request
        

    
### pin_not_set

        - **Description**: Payment was unsuccessful as you have not set the UPI PIN on the app. Try using another method.
        - **Source**: customer_psp
        - **Step**: payment_authentication
        

    
### customer_not_registered

        - **Description**: No bank account is associated with this mobile number. Please try again by adding your account.
        - **Source**: gateway
        - **Step**: customer_onboarding
        

    
### server_error

        - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
        - **Source**: gateway
        - **Step**: payment_authentication
        

    
### payment_cancelled_by_user

        - **Description**: Flow was aborted as you pressed back from the PIN screen. Please try again.
        - **Source**: customer
        - **Step**: payment_authorization
        

### Gateway Errors

Given below is the list of gateway errors.

    
### incorrect_otp

         - **Description**: You have entered an incorrect OTP. Try again.
         - **Source**: customer
         - **Step**: customer_onboarding
         

    
### otp_expired

         - **Description**: You have entered an expired OTP. Please regenerate OTP and try again.
         - **Source**: customer
         - **Step**: customer_onboarding
        

    
### insufficient_funds

         - **Description**: Payment was unsuccessful due to insufficient funds. Kindly check your balance and try again.
         - **Source**: customer
         - **Step**: payment_debit_request
        

    
### insufficient_funds_mandate_block

         - **Description**: Payment was unsuccessful as the amount in your account is blocked for another payment. Try using another account.
         - **Source**: issuer_bank
         - **Step**: payment_authentication
        

    
### otp_attempts_exceeded

         - **Description**: You have entered an incorrect OTP too many times. Try again in some time.
         - **Source**: customer_psp
         - **Step**: customer_onboarding
        

    
### account_dormant

         - **Description**: Payment was unsuccessful as the receiver's bank account is inactive. Any amount deducted will be refunded within 5-7 working days.
         - **Source**: beneficiary_bank
         - **Step**: payment_credit_request
        

    
### bank_not_live_on_upi

         - **Description**: Selected bank is not available on UPI. Please try using another bank.
         - **Source**: issuer_bank
         - **Step**: customer_onboarding
        

    
### payment_timed_out

         
            
                Temporary Issue
                
                 - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
                 - **Source**: beneficiary_bank
                 - **Step**: payment_response
                

            
### UPI ID Not Reachable

                 - **Description**: Payment was unsuccessful as the bank linked to this UPI ID is not reachable at this time.
                 - **Source**: issuer_bank
                 - **Step**: payment_debit_response
                

         
        
    
    
### first_transaction_limit_exceeded

         - **Description**: Payment was unsuccessful as you exceeded the first-time transaction limit set by your bank. You can use another bank account or retry after 24 hours.
         - **Source**: issuer_bank
         - **Step**: payment_debit_response
        

    
### transaction_limit_exceeded

         
            
                Limit Set By Bank Exceeded
                
                  - **Description**: Payment was unsuccessful as you exceeded the transaction limit set by your bank. Try using another account.
                  - **Source**: issuer_bank
                  - **Step**: payment_debit_response
                

            
### Daily Amount Limit Exceeded

                 - **Description**: Payment was unsuccessful as you exceeded the amount limit for the day with this bank account. Try using another account.
                 - **Source**: issuer_bank
                 - **Step**: payment_debit_response
                

         

        
    
    
### first_time_transaction_freeze_period

         - **Description**: Payment was unsuccessful due to the cooling period set by your bank for first-time user. Please try again after some time.
         - **Source**: issuer_bank
         - **Step**: payment_debit_response
        

    
### transaction_frequency_limit_exceeded

         - **Description**: Payment was unsuccessful as the number of transactions exceeds the max limit set by the bank. You can use another bank account or retry after some time.
         - **Source**: issuer_bank
         - **Step**: payment_debit_response
        

    
### bank_account_inactive

         
            
                Issuer Bank Account Inactive
                
                 - **Description**: Payment was unsuccessful as your account is not active. Please try using another bank account.
                 - **Source**: issuer_bank
                 - **Step**: payment_debit_request
                

            
### Receiver Bank Account Inactive

                 - **Description**: Payment was unsuccessful as the receiver's bank account is not active. Any amount deducted will be refunded within 5-7 working days.
                 - **Source**: beneficiary_bank
                 - **Step**: payment_debit_request
                

         
        
    
    
### server_error

         
            
                Temporary Issue - Issuer Bank
                
                 - **Description**: Payment was unsuccessful due to a temporary issue. Please retry in some time.
                 - **Source**: beneficiary_bank
                 - **Step**: payment_request
                

            
### Temporary Issue - Beneficiary Bank

                 - **Description**: Payment was unsuccessful due to a temporary issue. Please retry in some time.
                 - **Source**: issuer_bank
                 - **Step**: payment_request
                

         
        
    
    
### invalid_ifsc

         - **Description**: Payment was unsuccessful due to a temporary issue. Please retry in some time.
         - **Source**: gateway
         - **Step**: payment_authentication
        

    
### upi_pin_registration_card_blocked

         - **Description**: Card used while setting UPI PIN has been blocked by your bank. Please reach out to your bank for more information or try using another bank account.
         - **Source**: issuer_bank
         - **Step**: payment_authentication
        

    
### bank_technical_error

         
          
           UPI ID Temporarily Unavailable
           
            - **Description**: Payment was unsuccessful as the bank linked to this UPI ID is temporarily unavailable. Any amount deducted will be refunded within 5-7 working days.
            - **Source**: issuer_bank
            - **Step**: payment_credit_response
           

          
### Temporary Issue

            - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
            - **Source**: issuer_bank
            - **Step**: payment_credit_response
           

         
        
    
    
### payment_declined

         
          
           Declined by Bank
           
            - **Description**: Payment was unsuccessful as it was declined by your bank. Reach out to your bank for more details. Try using another account.
            - **Source**: issuer_bank
            - **Step**: payment_debit_request
           

          
### Temporary Issue

            - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
            - **Source**: beneficiary_bank
            - **Step**: payment_debit_request
           

         
        
    
    
### pin_attempts_exceeded

         - **Description**: You have exceeded the incorrect UPI PIN attempts. You can use another bank account or retry after 24 hours.
         - **Source**: customer
         - **Step**: payment_authentication
        

    
### incorrect_pin

         - **Description**: You have entered incorrect UPI PIN. Please try again with the correct UPI PIN.
         - **Source**: customer
         - **Step**: payment_authentication
        

    
### linked_account_removal_failed

         - **Description**: Unable to remove the account. Please try again.
         - **Source**: customer_psp
         - **Step**: account_management
        

    
### sms_text_not_received

         - **Description**: Something went wrong while sending SMS. Please try again.
         - **Source**: gateway
         - **Step**: customer_onboarding
        

### Server Errors

Given below is the list of server errors.

 
### server_error

   - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
   - **Source**: issuer_bank
   - **Step**: customer_onboarding
  

 
### server_error

   - **Description**: We are facing some trouble completing your request at the moment. Please try again shortly.
   - **Source**: internal
   - **Step**: payment_authorization
