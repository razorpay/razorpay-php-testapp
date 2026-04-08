---
title: Troubleshooting & FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions.
---

# Troubleshooting & FAQs

## Frequently Asked Questions (FAQs)

    
### 1. How do I know if I am eligible for  ?

        You are eligible if:
        - You must be a   partner under a banking partner (like HDFC Bank)
        - You need to split payments among multiple vendors or accounts

        Contact your banking partner or Razorpay account manager to confirm your eligibility and get the feature enabled.
        

    
### 2. If I am already integrated with Razorpay Route, do I need to change my existing integration to support DS payments?

        No, your existing Razorpay Route integration will automatically work for DS payments once the feature is enabled. The system detects DS transactions and processes them accordingly without any code modifications.

        
        

    
### 3. What happens if I try to create a transfer larger than my payment amount?

        If your total transfer amount exceeds the payment amount, you will get an error: "Transfer amount can't be greater than the payment." This prevents over-distribution of funds.
        

    
### 4. Can I use Direct Transfers with  ?

        No, Direct Transfers are not supported for  . Direct Transfers require deducting money from your Razorpay balance, but   payments do not flow through Razorpay's escrow account. You can only use Payment Transfers with  .
        

    
### 5. Will I see settlement entries on my dashboard for  ?

        Yes, you will see settlement entries, but they will show net amount as 0 since the actual money movement is handled by your banking partner. This maintains visibility and reporting consistency while reflecting the true settlement flow.
        

    
### 6. How long do   take to reach linked accounts?

          transfer timing depends on your banking partner's settlement schedule and processes. Unlike standard Route transfers, there is no instant settlement option for DS since funds flow directly through your banking partner rather than Razorpay's escrow.
        

    
### 7. Are there any additional fees for using Route on DS?

        Please get in touch with the   bank SPOC for details regarding fees.
        

    
### 8. Can I accept different payment methods like cards, UPI, and netbanking on the same account?

        Yes. Since DS (Direct Settlement) is configured at the terminal level, you can accept a mix of payment methods like cards, UPI, and netbanking. Route automatically applies the correct logic based on which terminal processed the payment.
        

    
### 9. What reports are available for   Route transactions?

        You have access to the same reporting as standard Route:
        - Transaction reports (shared with banking partners for settlement processing)
        - Transfer reports showing all split payment details
        - Dashboard analytics for monitoring transfer performance
        - Settlement reports reflecting the split amounts
        

    
### 10. What should I do if my transfers are failing consistently?

        Contact your banking partner for settlement-related problems for API-related issues.

        You may check for the following:
        1. Are you using supported transfer types (Payment transfers)?
        2. Is your total transfer amount less than or equal to the payment amount?

        

    
### 11. How do I track if a transfer was successful?

        Use the same APIs you use for regular transfers:
        - `GET /transfers/{id}` to check individual transfer status.
        - `GET /payments/{id}/transfers` to see all transfers for a payment.
        - Monitor your dashboard for transfer status updates.
        - Check with your banking partner for actual settlement confirmation.
        

    
### 12. Can linked accounts access their own dashboards for  ?

        Dashboard access for linked accounts is configurable and can be defined during the onboarding process. Your banking partner or parent business can control what level of access each linked account has to transaction and settlement information.
        

    
### 13. Can I use   with international transactions?

        Currently,   is limited to INR transactions only. Support for international currencies is not available in the current implementation but may be considered for future releases based on market demand.
        

    
### 14. How to fix insufficient linked account balance issue?

        This issue occurs when transfer reversal fails due to insufficient linked account balance.

        - **Symptoms**:

            - Reversal API returns insufficient balance error.
            - Dashboard shows failed reversal status.
            - Settlement file shows incomplete settlement entries.

        - **Solutions**:

            - **Check Linked Account Balance**: Verify available balance before attempting reversal.
            - **Partial Reversals**: Create multiple smaller reversal amounts.
            - **Alternative Recovery**: Coordinate with banking partner for manual recovery process.
            - **Prevention**: Implement balance checks in your application logic.
            
        

    
### 15. How to fix invalid account details issue?

        This issue occurs when a linked account is setup with incorrect banking information.
        
        - **Symptoms**:

            - Settlement failures in processing.
            - Banking partner reports invalid account errors.
            - Transfers show processed but funds not credited.

        **Solutions**:

            - **Account Verification**: Re-verify account number, IFSC, and beneficiary name.
            - **Update Process**: Contact banking partner to update account details.
            - **Test Transfers**: Perform small test transfers before full implementation.
            - **Documentation**: Maintain accurate records of all linked account details.
        

    
### 16. How to fix a transfer block due to compliance issues?

        Transfers can get blocked due to regulatory or compliance restrictions. Below are a few symptoms to help you identify if an issue is compliance-related.

        - **Symptoms**:

            - Transfers fail with compliance-related error codes.
            - Banking partner flags certain transactions.
            - Sudden transfer failures for previously working accounts.

        - **Solutions**:

            - **Documentation Review**: Ensure all KYC and business documents are current.
            - **Banking Partner Coordination**: Work with bank compliance team to resolve blocks.
            - **Transaction Limits**: Verify transfers are within approved limits.
            - **Regular Monitoring**: Implement alerts for compliance-related failures.
        

    
### 17. Bank holiday delayed my settlement transaction. What do I do?

          settlements follow your banking partner's schedule, which means they may be delayed during banking holidays and weekends. Since your banking partner manages the actual money movement, settlement timing is outside of Razorpay's control.

        - **Expected Behavior**:

            -   settlements follow banking calendar, not 24/7 processing.
            - Settlement file processing may be delayed.
            - Linked accounts receive funds based on banking working days.

        - **Management Strategies**:

            - **Holiday Calendar Planning**: Account for banking holidays in settlement expectations.
            - **Customer Communication**: Inform linked accounts about expected delays.
            - **Buffer Management**: Plan cash flow around known banking holidays.
            - **Alternative Arrangements**: Coordinate with banking partner for urgent settlements.
        

    
### 18. How do I perform a large value transfer smoothly?

        High-value transfers require additional processing time
        - **Threshold Considerations**:

            - Transfers above certain limits may trigger additional verification.
            - Banking partner risk controls may delay processing.
            - Manual approval required for exceptional amounts.

        - **Best Practices**:

            - **Amount Splitting**: Break large transfers into smaller batches.
            - **Advance Notice**: Inform banking partner of planned large transfers.
            - **Documentation**: Provide supporting documents for high-value transactions.
            - **Timing Coordination**: Plan large transfers during optimal processing windows.
        

    
### 19. Transaction delayed due to technical issue. What do I do?

        
        Sometimes, system or integration problems affect transfer processing. Here a few common scenarios:

        - **Common Scenarios**:

            - API timeouts during transfer creation.
            - Settlement file generation delays.
            - Dashboard reporting inconsistencies.

        - **Resolution Steps**:

            - **Status Monitoring**: Regularly check transfer and settlement status.
            - **Support Escalation**: Reach out to   for technical issues.
            - **Backup Processes**: Have manual reconciliation procedures ready.
            - **System Health Checks**: Monitor API response times and success rates.
