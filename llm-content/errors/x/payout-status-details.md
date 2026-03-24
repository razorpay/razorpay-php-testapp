---
title: Payout Status Details
description: Know the status of your payouts using the Payout Status Details API.
---

# Payout Status Details

Payout Status details are returned when a payout is created and moves to another state.

> **WARN**
>
> 
> **Watch Out!**
> 
> The `failure_reason`, `queueing_details` and `cancellation_details` fields along with the error object would be deprecated from the API response. Please move to Payout status details to understand the status of your payout.
> 

## About Status Details

Status details are sent as part of the fetch payout API response and webhook payloads. You can also check the status details on the [dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/status-details.md). It provides additional details about each payout status including intermediate status like `pending`, `processing`, `queued` and terminal states like `reversed` and `failed`. The details will include payout clearance SLA and why payout is in `processing` state. A payout update webhook is fired every time an attribute in status details changes.

You can check status details of a payout to know why it is in the `processing` state. It maybe due to:

- [Deemed Success](https://razorpay.com/blog/business-banking/payout-processing-imps-upi-transactions-deemed-success-npci/)
- NEFT/RTGS off hours
- Partner bank or beneficiary bank issues
- Other bank or server issues

You can use this information to keep your beneficiaries informed.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - The status details object in the payouts' API response gives details about the exact reason for a payout state and the next steps to be taken. Please share this information with your developers.
> - You can subscribe to daily reports to receive a detailed document on the status, reason for status and SLA for the payouts in `processing state`. [Raise a support ticket](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) from the Dashboard, with a list of recipient email IDs. We will enable the function for you in 3 working days.
> 

## Status Details API Response

Below is the sample status details response that appears as part of the status details object. 

### Sample Code

```json: Sample Status Details Response Code
{
  "status_details": {
    "description": "IMPS is not enabled on beneficiary account, Retry with different mode",
    "source": "beneficiary_bank",
    "reason": "imps_not_allowed",
  }
}
```json: Complete Status Details Response Code
{
  "id": "pout_00000000000001",
  "entity": "payout",
  "fund_account_id": "fa_00000000000001",
  "amount": 1000000,
  "currency": "INR",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "fees": 0,
  "tax": 0,
  "status": "failed",
  "utr": null,
  "mode": "IMPS",
  "purpose": "refund",
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "batch_id": null,
  "created_at": 1545383037,
  "status_details": {
    "description": "IMPS is not enabled on beneficiary account, Retry with different mode",
    "source": "beneficiary_bank",
    "reason": "imps_not_allowed",
  }
}
```

`description`
: `string` A description for the error. For example, `IMPS is not enabled on beneficiary account, Retry with different mode`.

`source`
: `string` Possible values:
  - `gateway`: Technical error at Razorpay partner bank.
  - `beneficiary_bank`: Technical error at beneficiary bank.
  - `business`: Merchant action required.
  - `internal`: Technical error at Razorpay's server.

`reason`
: `string` The error reason. For example, `imps_not_allowed`.

All the reasons for any payout state appear at the [source parameter](#sample-code) of the code. The error reason, source, description and steps to be taken for various payout statuses are given below.

  
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
- [Status Details via Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/status-details.md)
