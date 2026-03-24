---
title: RazorpayX Payout Status
heading: Check Payout Status
description: Check the status of payouts on the RazorpayX Dashboard.
---

# Check Payout Status

Payout Status details are returned when a payout is created and moves to another state. Know more about [Payout States](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> The `failure_reason`, `queueing_details` and `cancellation_details` fields, along with the error object, would be deprecated from the API response. Please move to Payout status details to understand the status of your payout and share this information with your developers.
> 

## About Status Details

Status details shows intermediate statuses (`pending`, `processing`, `queued`) and terminal states (`reversed` and `failed`) along with the payout clearance SLA. You can view the status of a payout in the following places: 
- [RazorpayX Dashboard](#check-status-on-dashboard)
- [Fetch Payout API response](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
- [Webhook Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)

Status details also tells you why a payout is in the `processing` state. Some reasons include:

- [Deemed Success](https://razorpay.com/blog/business-banking/payout-processing-imps-upi-transactions-deemed-success-npci/)
- NEFT/RTGS off hours
- Partner bank or beneficiary bank issues
- Other bank or server issues

Whenever an attribute in the status details changes, we send a payout update webhook, which you can use to inform your beneficiaries.

## Check Status on Dashboard

You can check the status details of a payout in three ways on the RazorpayX Dashboard. 

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth). 
1. Navigate to either of the following. 

    
        
### Need Help Widget

             You can check the payout status using the **Need Help?** button at the bottom-right corner of the Dashboard. Watch the video below or read along. 

             
[Video: https://www.youtube.com/embed/epkmUCUI83c]

             1. Click the **Need Help?** widget. 
             1. In the right pane, use commas to enter multiple Payout IDs in the text box.   
                ![Search Payout Status on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payout-status-support-search.jpg.md)
             1. Click **Search**. 

             It opens a list view of the payouts along with their statuses. You can hover over the payout status or open the summary view for more information on the payout's status. 
            

        
### Payout Summary View

             2. Navigate to **Payouts** from the left menu.
             3. Select the particular payout to open the summary view in the right pane.

                 ![Payout status details on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payouts-status-summary.jpg.md)
            

        
### Subscribe to Daily Reports

             You can also subscribe to daily reports to receive a detailed document on the status, status and SLA for the payouts in the `processing` status. 
             
             To subscribe, [raise a support ticket](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) from the RazorpayX Dashboard with a list of recipient email IDs. We will enable the function for you in 3 working days.
            

    

![Check Payout Status on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-check-payout-status-dashboard.jpg.md)

## Payout Status Details
Find below an exhaustive list of payout statuses, their details and also possible steps you can take to proceed further.

  
### Status: reversed/failed

    
      
        bank_account_closed
        
        - **Description**: Payout failed as the beneficiary account is closed. Please contact the beneficiary bank.
        - **Source**: beneficiary_bank
        - **Next Steps**: NA
        

      
### bank_account_frozen

        - **Description**: Payout failed as beneficiary account is frozen. Please contact the beneficiary bank.
        - **Source**: beneficiary_bank
        - **Next Steps**: NA
        

      
### bank_account_invalid

        - **Description**: Payout failed due to invalid beneficiary account details.
        - **Source**: beneficiary_bank
        - **Next Steps**: NA
        

      
### beneficiary_account_dormant

        - **Description**: Payout failed as beneficiary account is dormat. Please contact the beneficiary bank.
        - **Source**: beneficiary_bank
        - **Next Steps**: NA
        

      
### beneficiary_bank_failure

        - **Description**: Payout failed at the beneficiary bank due to a technical issue. Please retry after 30 min.
        - **Source**: beneficiary_bank
        - **Next Steps**: Retry
        

      
### beneficiary_bank_offline

        - **Description**: Beneficiary bank systems are offline. Please retry after 30 min.
        - **Source**: beneficiary_bank
        - **Next Steps**: Retry
        

      
### beneficiary_bank_rejected

        - **Description**: Payout rejected by the beneficiary bank. Please contact the beneficiary bank.
        - **Source**: beneficiary_bank
        - **Next Steps**: NA
        

      
### beneficiary_bank_technical_error

        - **Description**: Payout failed due to a technical issue at the beneficiary bank. Please retry after 30 min.
        - **Source**: beneficiary_bank
        - **Next Steps**: Retry
        

      
### beneficiary_psp_offline

        - **Description**: Beneficiary PSP systems are offline. Please retry after 30 min.
        - **Source**: beneficiary_bank
        - **Next Steps**: Retry
        

      
### imps_not_allowed

        - **Description**: IMPS is not enabled on beneficiary account. Please retry with different mode.
        - **Source**: beneficiary_bank
        - **Next Steps**: Retry with a different payment mode.
        

      
### invalid_ifsc_code

        - **Description**: Payout failed as the IFSC code is invalid. Please correct the IFSC code and retry.
        - **Source**: beneficiary_bank
        - **Next Steps**: Retry with correct IFSC code.
        

      
### npci_beneficiary_timeout

        - **Description**: Temporary technical issue between NPCI and the beneficiary bank. Please retry after 30 min.
        - **Source**: beneficiary_bank
        - **Next Steps**: Retry
        

      
### transaction_limit_exceeded

        - **Description**: Payout amount greater than the limit supported by the beneficiary account.
        - **Source**: beneficiary_bank
        - **Next Steps**: NA
        

      
### amount_limit_exhausted_neft

        - **Description**: The NEFT 24*7 limits for your account has been exhausted. Please retry after sometime.
        - **Source**: business
        - **Next Steps**: Retry
        

      
### beneficiary_account_invalid

        - **Description**: Payout failed due to invalid beneficiary account number.
        - **Source**: business
        - **Next Steps**: NA
        

      
### beneficiary_vpa_invalid

        - **Description**: UPI validation failed. If the UPI ID is valid, please retry after sometime.
        - **Source**: business
        - **Next Steps**: Ensure UPI ID is valid and retry.
        

      
### insufficient_funds

        - **Description**: Payout failed due to insufficient funds in your account.
        - **Source**: business
        - **Next Steps**: Add funds to your account and retry.
        

      
### invalid_beneficiary

        - **Description**: Customer account does not exist with the wallet provider for the given phone number.
        - **Source**: business
        - **Next Steps**: NA
        

      
### gateway_down

        - **Description**: Payout failed as the partner bank is facing technical issues. Please retry.
        - **Source**: gateway
        - **Next Steps**: Retry
        

      
### gateway_technical_error

        - **Description**: Payout failed due to a temporary technical issue at the partner bank. Please retry after 30 min.
        - **Source**: gateway
        - **Next Steps**: Retry
        

      
### gateway_timeout

        - **Description**: Payout timed out at the partner bank. Please retry after 30 min.
        - **Source**: gateway
        - **Next Steps**: Retry
        

      
### server_error

        - **Description**: Payout failed. Contact support for help.
        - **Source**: internal
        - **Next Steps**: Contact support to find out the exact issue.
        

      
### server_error_temporary

        - **Description**: Payout failed due to temporary technical issue. Please retry.
        - **Source**: internal
        - **Next Steps**: Retry
        

    
    
  

  
### Status: processing

    
      
        beneficiary_bank_confirmation_pending
        
        - **Description**: Confirmation of credit to the beneficiary is pending from `beneficiary_bank`. Please check the status after (date,time).
        - **Source**: beneficiary_bank
        - **Next Steps**: Inform the customer of the delay, reason for the same and by when it will be cleared.
        

      
### bank_window_closed

        - **Description**: The `mode` window for the day is closed. Please check the status after (date,time).
        - **Source**: gateway
        - **Next Steps**: Inform the customer of the delay, reason for the same and by when it will be cleared.
        

        
### payout_bank_processing

        - **Description**: Payout is being processed by the partner bank. Please check the final status after (date,time).
        - **Source**: gateway
        - **Next Steps**: Inform the customer of the delay, reason for the same and by when it will be cleared.
        

        
### amount_limit_exhausted

        - **Description**: The (mode) 24*7 limits for your account has been exhausted. Please check the status after (date,time).
        - **Source**: business
        - **Next Steps**: Inform the customer of the delay, reason for the same and by when it will be cleared.
        

        
### partner_bank_pending

        - **Description**: Payout is being processed by our partner bank. Please check the final status after (date,time).
        - **Source**: internal
        - **Next Steps**: Inform the customer of the delay, reason for the same and by when it will be cleared.
        

    
    
  

  
### Status: processed

    
      
        payout_processed
        
        - **Description**: Payout is processed and the money has been credited into the beneficiary's account.
        - **Source**: beneficiary_bank
        - **Next Steps**: NA
        

    
    
  

  
### Status: pending

    
      
        pending_approval
        
        - **Description**: Workflow for the payout is pending approval from the approver(s).
        - **Source**: business
        - **Next Steps**: NA
        

    
    
  

  
### Status: queued

    
      
        gateway_degraded
        
        - **Description**: Payout is queued as Partner bank systems are down.
        - **Source**: gateway
        - **Next Steps**: NA
        

      
### beneficiary_bank_down

        - **Description**: Beneficiary bank's systems are not working. Payout will be processed after the system starts working else it will be failed after the pre-defined time limit.
        - **Source**: gateway
        - **Next Steps**: NA
        

        
### low_balance

        - **Description**: Payout is queued as there is insufficient balance in your account to process the payout.
        - **Source**: business
        - **Next Steps**: NA
        

        
### syncing_balance

        - **Description**: Payout is queued as your balance is being synced with the bank. Please check the status after some time.
        - **Source**: gateway
        - **Next Steps**: Check status after some time.
        

        
### fee_recovery_pending

        - **Description**: Payout is queued as you have a pending fee recovery payout. It will get processed after the fee recovery payout is cleared.
        - **Source**: business
        - **Next Steps**: NA
        

    
    
  

### Related Information

- [About Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md)
- [Payout Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/best-practices.md)
- [Status Details via API](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
