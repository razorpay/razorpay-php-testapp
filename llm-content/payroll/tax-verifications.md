---
title: Check TDS Verification in RazorpayX Payroll
heading: Verify Tax Proofs
description: Check how to manually verify investment proofs in RazorpayX Payroll.
---

# Verify Tax Proofs

Tax proofs verification begins after the proof upload window closes. Ensure that your employees have submitted their proofs on time.

> **WARN**
>
> 
> **Watch Out!**
> 
> Tax verification depends on your verification settings.
> - If you chose **Let XPayroll Verify**, Payroll verifies the proofs for your employees. We update you once the activity is complete.
> - **Let Organisation Verify**: You must carry out the verification by yourself.
> 

## Accept Proofs

To accept proof of investments for the investments declared by your employees, the proof upload window must be open. However, the duration of the proof upload window depends on your **Verification Settings**.

    
        You can verify employee's tax proofs only if you have selected **Let Organisation Verify** in **General Settings** → **Verification Settings**. You can also check the verification status.

        
            
### Check Verification Status

                 To check the verification status:
                    1. Log in to the  [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
                    1. Navigate to **ADMIN OPTIONS** → **Reports** → **Tax Deductions**.
                        ![Tax Verifications Reports](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-tax-verifications.jpg.md)
                    1. In the **Proof Verification Status** column, you can check if the employees' proofs are verified. 
                        ![Proof Verification Status on Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-tax-verifications-proofs.jpg.md)
                

            
### Verify Investment Proofs Manually

                 To verify the investment proofs manually:

                    1. Log in to the  [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
                    1. Navigate to **ADMIN OPTIONS** → **Reports** → **Tax Deductions**.
                        ![Tax Verifications Reports](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-tax-verifications.jpg.md)
                    1. In the **Proof Verification Status** column, you can check if the employees' proofs are verified. 
                        ![Proof Verification Status on Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-tax-verifications-proofs.jpg.md)
                    1. To verify the employee's pending proofs, click on **PENDING**.

                 This opens the investment pages where the proofs are yet to be verified. To verify the proofs: 
                    1. Click **Manage proofs**.
                    1. Check the attachments in the **Proof Document** column. Click to view them in a new tab.
                    1. Review the amount and comments. Click **Accept proof** or **Reject proof**.
                        ![Approve investment proofs Razorpay Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-tax-proofs-verify.jpg.md)
                    1. In the pop-up modal, modify the amount as approved according to the proof submitted. Provide comments, if any.
                        
                        
> **INFO**
>
> 
>                         **Handy Tips**
>                         
>                         Click **Undo verification** to undo proof verification.
>                         

                        
                    1. Click **Continue**.

                This successfully approves the proofs for one investment. Repeat the process across all the investments. 
                - After you verify the HRA proofs and click **Continue**, Payroll automatically moves to the next pending proof. For example, after HRA, you verify the Section 80 deductions.
                - As there are many Section 80 deductions, clicking **Continue** moves you to the next pending proof within Section 80 deductions until the last proof is verified.
                - You can also click **Next Deduction** to skip verifying the current proof. 
                    ![Next Deduction to skip current page proof verification Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-investment-proofs-next.jpg.md)
                - The **Proof Verification Status** remains in the `PENDING` status until you verify all the proofs the employee has uploaded. The status moves to **COMPLETED** when you verfiy all the proofs. 
                

        
    
    
        If you select **Let Payroll Verify**, Payroll will verify the investment proofs uploaded by your employees. You can check the verification status on the Dashboard.

        
            
### Check Verification Status

                 To check the verification status:
                    1. Log in to the  [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
                    1. Navigate to **ADMIN OPTIONS** → **Reports** → **Tax Deductions**.
                        ![Tax Verifications Reports](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-tax-verifications.jpg.md)
                    1. In the **Proof Verification Status** column, you can check if the employees' proofs are verified. 
                        ![Proof Verification Status on Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-tax-verifications-proofs.jpg.md)
                

        

        After we verify the proofs, we update the [Calculate Tax on Basis Of](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/tax-deductions-setup/#calculate-tax-on-basis-of.md) to **Declaration with verified proofs** to complete the proof verification activity.
    

> **INFO**
>
> 
> **Handy Tips**
> 
> Form 12BB is available for your employees on their dashboard under Tax Deductions. However, filling this form is non-mandatory.
> 

## Request Verification Delay

Payroll verifies all the tax proofs submitted in January. However, some organisations that chose **Let Payroll Verify** might prefer to verify the tax proofs much later. To request a delay:
1. Log in to the  [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
2. Go to **Settings** → **Tax Deductions Setup**. 
3. Select **Let Organisation Verify**. 

This ensures that we exclude you from the regular cycle of verifications.

> **WARN**
>
> 
> **Watch Out!**
> 
> We do not recommend requesting delay as a change (usually a reduction) in an employee's declaration increases their TDS. 
> 
> As a best practice, we optimise TDS deductions by deducting the tax over multiple months than in a single month. This ensures your employees receive a steady net take-home pay.
> 

To re-start verifying investment proofs:
1. Log in to the  [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Navigate to **Settings** → **Tax Deductions Setup**.
1. Select **Let Payroll Verify** in **Opt for Verification**.
1. [Contact Support](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/plans/#contact-support.md) and request to start verification.

Note that we do this on a best efforts basis, and we do not guarantee it.

### Post-Verification 

After verifying the investment proofs, you can disable the **Allow employees to update their tax deductions** to disallow any investments and proof-related changes. 

If you chose **Let Payroll Verify**, we update the [Calculate Tax on Basis Of](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/tax-deductions-setup/#calculate-tax-on-basis-of.md) to **Declaration with verified proofs** to complete the proof verification activity.

### Related Information 

- [Statutory Compliance](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/statutory-compliance.md)
- [Enable Compliance in Account Setup](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/administrator#welcome-mail-from-xpayroll.md)
