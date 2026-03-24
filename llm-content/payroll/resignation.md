---
title: Enable and manage resignations in RazorpayX Payroll
heading: Resgination Setup
description: Set up and handle resignations on the Payroll Dashboard.
---

# Resgination Setup

On the Payroll Dashboard, you can dismiss employees at the end of their tenure at your organisation, or allow them to resign. After receiving a resignation request, you can process the [Full and final settlement](#process-fnf) and successfully dismiss the employee.

> **INFO**
>
> 
> **Handy Tips**
> 
> Both the administrator and the employee's manager can approve resignations. 
> 

## Enable Resignation

To allow employees to resign, you must enable it. 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Go to **Settings** → **Employee Resignation Setup** → **EDIT**.
    ![Scroll to Enable Resignation set up. Click EDIT on RazorpayX Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-enable-resignation.jpg.md)
1. Select the **Enable resignations feature** check box.

This enables resignation submission for employees. 

## Pending Requests

After an employee submits their resignation, you can view the request and take action on it.

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Click either of the following. The Resignation reports page opens.

    
        
            1. Navigate to ADMIN OPTIONS → Reports. 
            1. Click **Resignations**.
                ![Resignation report in Settings on the Razorpay Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-resignation-report.jpg.md)
        
        
            In the reminders tab, click **resignations**.
                ![Resignation reminders on the RazorpayX Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-resignations-reminders.jpg.md)
        
     
1. View the resignation requests pending your review. Select the employee and click **REVIEW RESIGNATION**. You can only review one request at a time.
1. In the Update Resignation Request pop-up modal, you can: 
    - Change the employee's **Last Working Day**. 
    - Provide **Remarks** on the resignation request. 
1. Click **UPDATE** to make changes to the employee's resignation. Then, click **APPROVE**.
    ![Approve or Reject resignations on Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-resignation-modal-approve-reject.jpg.md)

This successfully approves the employee's resignation. 
- To reject the request, click **REJECT**. 
- Click View Resignation History on the right pane to view older requests. 
    - You can filter the older requests using the **Resignation Status** and duration.
    - Click DOWNLOAD CSV to download the resignation data.  

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot undo an approved resignation request.
> 

## Process Full & Final Settlement

Once you approve the resignation request, you can process the employee's full and final settlement. 

1. On the Resignations report page, select the employee to process the FnF for. Click **PROCESS FNF SETTLEMENT**. This opens the **Full and final settlement** page.
1. On the Full and final settlement page:
    1. Provide the leave encashment details. You can either enter the number of leaves to encash or the total leave encashment amount.
    1. Enter any additions or deductions to the employee's salary. You can also enter the [Loss of Pay](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#loss-of-pay.md) days, or the [Jibble Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/integrations/jibble.md)  to sync the LOP data automatically.

        ![Payroll Dashboard make additions deductions FNF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-fnf-additions-deductions.jpg.md)

        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         Ensure you do not include loan recovery, bonus clawback, gratuity payments and other salary components or deductions here. 
>         

    1. Select whether the deductions happen from the employee's gross or net pay.
        
            
### What is the difference between Gross Pay and Net Pay?

                 
                    
                        Gross pay is the total amount an employee earns before any relevant deductions, including taxes, benefits, bonuses, reimbursements, and more. This also includes the basic, ad hoc and the allowance components of an employee's salary. 

                        Examples of gross pay deductions include loss of pay, bonus recovery after clawback, and more, depending on the employee's performance. Gross pay deductions are mandatory and affect compliance payments (TDS, PF).
                    
                    
                        Net pay is the employee's take-home salary after all applicable deductions such as benefits, taxes, and compliances. Net pay = Gross pay - TDS - PF - PT - ad hoc deductions.  
                        
                        Examples of net pay deductions include laptop repair recovery charges, penalties, insurance payments and more.
                    
                 
                

        
    1. Enter the employee's personal email address for further communication. 
    
        If Payroll had been handling the employee's [Form 16s](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/salary/#employee-s-form-16.md), the employee receives it on their personal email address at the end of the financial year.
    1. Click **Add to Payment**. 

You have successfully modified the full and final settlement for the employee. The employee receives the settlement payment after you [execute payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#execute-payroll.md) for the month.

### Maintain Employee Directory 

After dismissing employees, you can choose to:
- **DELETE EMPLOYEE** from the employee directory. 
- **DISABLE LOGIN** for the employee during the notice period, if necessary. 

The above options are available on the employee's **User Profile**.

## Reports 

You can access the following reports: 

Report Name | Description
---
Resignation | View the resignation requests initiated and approved so far.
---
Full and final settlement | View the details of full and final settlements processed month-wise. You can refresh the data and download it in a CSV file.

### Related Information

- [Dismiss Employees on the Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#terminate-and-run-last-payroll.md)
- [About Full and Final Settlement](https://razorpay.com/payroll/learn/full-and-final-settlement-fnf/)
