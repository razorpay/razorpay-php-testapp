---
title: RazorpayX Payroll Employee Bank Account Validation
heading: Employee Bank Account Validation
description: Learn how RazorpayX Payroll validates employee bank accounts to prevent errors and ensure accurate salary disbursements.
---

# Employee Bank Account Validation

The Employee Bank Account Validation feature in RazorpayX Payroll ensures that salary payments reach the correct employee bank accounts. It validates bank account information during employee onboarding and when account details are modified, thereby preventing payment errors caused by incorrect bank details. 

The validation happens directly with the bank where it is checked if the bank account is active and the beneficiary name is accurate. 

Common use cases include:
- **Bank Detail Changes**: Verifying updated bank account information when employees modify their details.
- **Payment Error Reduction**: Minimising the risk of salary disbursements to incorrect accounts.
- **Recovery Process Avoidance**: Eliminating the need for lengthy fund recovery procedures.

## Bank Account Validation Process

    
             
      For Current Accounts, the validation process involves:

      1. **Penny Drop Verification**: System automatically conducts a small test transaction to verify account existence.

      2. **Auto-approval**: The system conducts penny drop verification and auto-approves accounts when valid, while simultaneously employing an algorithm to match the fetched account holder name with the employee name in our records to ensure proper identity verification. 

      3. **Admin Review**: Administrators review only rejected validations and provide comments for rejection reasons.

      4. **Secure Processing**: All validation data is securely processed and stored for compliance purposes.
  

          
            
### Employees

               To update your bank account details:
                1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
                2. Navigate to your profile section.
                3. Locate the Payment Information panel. 
                4. Click EDIT to update your details.
                5. Enter or modify the following information:
                    - Bank Account Number. Enter your bank account number twice to confirm.
                    - IFSC (You can find the IFSC in your bank account's cheque book)
                    - Beneficiary Name (as it appears on your bank account)
                6. Click **Continue** to initiate the penny drop validation process.
                7. Wait for administrator approval notification.
                    ![Upload document and verfiy the info](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/sent-approval-ca.jpg.md) 
                The system will automatically verify your account through a penny drop test transaction to confirm the account exists and matches your details.
              

            
### Administrators

                1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
                2. Navigate to the **Approvals** section.
                3. Review pending bank account validation requests.
                4. Check the account details and penny drop validation results.
                5. Make an approval decision:
                    - Approve the account if details are correct and validation is successful.
                    - Reject the account with a comment explaining the reason.
                     ![Approve or reject the bank account information](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/approve-ca.jpg.md) 
                6. Submit the decision which triggers notification to the employee.
                
                
> **WARN**
>
> 
>                 **Watch Out!**
>                 
>                 You can view the status of bank account validation requests (approved or rejected) in the completed section.               
>                 

                
              

                        
        

    
        For XPayroll Wallet Accounts, the validation process involves:
            
            1. **Document Submission**: Employees upload either a cancelled cheque or bank statement showing account details.
            2. **Document Verification**: System registers the document for admin review.
            3. **Manual Validation**: Administrators verify account details against the provided documentation.
            4. **Decision Processing**: Admin approves or rejects the submission with appropriate comments.
            5. **Status Communication**: Employee receives notification about their account validation status.
            6. **Secure Processing**: All validation data is securely processed and stored for compliance purposes.
    

    
        
          
### Employees

             In the Payment Information section, employees can:
              1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
              2. Navigate to your **profile** section.
              3. Locate the **Payment Information** panel.
              4. Click **EDIT** to update your details.
              5. Enter or modify the following information:
                - **Bank Account Number** (enter twice to confirm)
                  - IFSC (find this in your cheque book or search at bankifsccode.com)
                  - Beneficiary Name (as it appears on your bank account)
                -  Payment Mode (Default, IMPS, or NEFT)
                -  Upload Document: You must provide one of the following:
                    1. A cancelled cheque with your name printed on it.
                    2. A recent bank statement showing your account details.
              6. Enter the OTP sent to your verified emailID.
                    ![enter OTP sent to your valid emailID](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/otp-ca.jpg.md) 
              7. Click **Continue** to send your information for review.
              8. Wait for administrator approval notification.
              Your uploaded document will be manually verified by an administrator to confirm your account details before approval.

            

          
### Administrators

             
              1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
              2. Navigate to the **Approvals** section.
              3. Review pending bank account validation requests.
              4. Click **View** and review the account details and uploaded documentation.
              5. Verify and take an approval decision:
                   - Approve: If the account details are correct and documentation is valid.
                   - Reject: If the account details are not matching with a comment explaining the reason.
              6. Submit the decision which triggers notification to the employee.
            

        
        
    

After completing the bank account validation:

1. All validated accounts are immediately eligible for payroll processing.
3. If an employee attempts to change bank account details, the validation process will automatically repeat.
4. The system maintains an update history for audit and compliance purposes.

> **INFO**
>
> 
> **Handy Tips**
> 
>   - The validation process works with all major Indian banks and financial institutions.
>   - This feature significantly reduces the risk of salary disbursement errors, which previously could take up to two months to resolve through bank recovery processes.
>   - While the validation system provides a robust security layer, it does not replace the need for organisational due diligence. 
>
