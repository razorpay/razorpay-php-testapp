---
title: Run Payroll Settings in RazorpayX Payroll
heading: Run Payroll
description: Execute payroll and pay advance salary to your employees in RazorpayX Payroll.
---

# Run Payroll

After you have finalised the salary components, you can finally execute your payroll. Ensure you refer to the [payroll checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/execute-payroll.md) before doing so. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Automated Professional Tax (PT) payments for employees in Karnataka are temporarily unavailable on Payroll. Know more about the [PT rule change](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#professional-tax).
> 

> **SUCCESS**
>
> 
> **Union Budget Updates**
> 
> Payroll has revised the salary computation as per the changes introduced in the Union Budget of July 2024.
> 
> - **Old tax regime**: No changes to the tax slabs, surcharge, cess, rebate and standard deduction. 
> - **New tax Regime**: In the new tax regime, the following changes are applicable: 
> 
>     - Standard Deduction of ₹50,000 has increased to ₹75,000.
>     - NPS contribution (10% of Basic + DA) has increased to 14%.
>     - Income slabs have changed for people earning between 3 lakhs and 12 lakhs as follows.
> 
>         
>             
>                 Revised Income Tax Slabs
>                 
>                  
>                     Previous Income Slabs | New Income Slabs | Tax Rate
>                     ---
>                     Upto 3,00,000  | Upto 3,00,000 | Nil
>                     ---
>                     3,00,001-6,00,000  | 3,00,001-7,00,000 | 5%
>                     ---
>                     6,00,001-9,00,000 | 7,00,001-10,00,000 | 10%
>                     ---
>                     9,00,001-12,00,000 | 10,00,001-12,00,000 | 15%
>                     ---
>                     12,00,001-15,00,000 | 12,00,001-15,00,000 | 20%
>                     ---
>                     Above 15,00,000 | Above 15,00,000 | 30%
>                     
>                 
>             
>         
> 

Given below are the various salary options and features available under **Run Payroll** in your Payroll Dashboard. 

## Execute Payroll

> **WARN**
>
> 
> **Watch Out!**
> 
> Execute payroll before the [Payroll due dates](/payroll/execute-payroll/#5-check-due-dates) as applicable to your organisation. This enables Payroll to make timely compliance payments. 
> 

To execute payroll:
1. Log in to the Payroll Dashboard.
1. Check the following: 
    - Make the additions and deductions as necessary.
    - Skip salary or stop salary for the applicable employees.
    - Ask your employees to declare their investments before the payroll execution date.
    - Fulfil other components from the [execute payroll checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/execute-payroll.md).
1. Click **FINALIZE PAYROLL** to imply that you are satisfied with the current payroll details.
    - If required, you can still make changes to your payroll by clicking on **MAKE CHANGES**. 
    - If your payroll looks good, you can click on **REQUEST EXECUTION**. 
1. Enter the OTP you receive at your registered email address/authenticator app and authorise the execution request.

You have successfully executed payroll. You cannot make [payroll modifications](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/exceptional-cases.md#modify-salary-after-payroll-is-executed) after you execute payroll. 

### Stop Salary 

If you wish to stop the salary for an existing payroll member, you have the following options to do so: 

    
        1. Log in to the Payroll Dashboard.
        1. Navigate to **People** and select the employee's profile. 
        2. Click **Compensation & Perquisites** → **EDIT** the annual Salary. 
        3. Set the annual salary to 0. 

        ![Set annual salary to 0 under Compensation & Perquisites.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-stop-salary.jpg.md)
    
    
        1. Log in to the Payroll Dashboard.
        1. Navigate to **People** and select the employee's profile. 
        2. Scroll down to **Stop Salary**. 

        ![Stop Salary option highlighted in the employee's profile in Payroll.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-stop-salary-2.jpg.md)
    

    
On the other hand, if you wish to only pause an employee's salary for a particular month, you can [skip payroll for that month](#skip-salary). 

### Skip Salary 

You can skip employees' salaries on the Payroll Dashboard:
- [Individually](#individual-skip-salary)
- [In Bulk](#bulk-skip-salary)

Filter the employees by their departments or locations and select them to skip their salary using the check box. You need not manually skip employees one-by-one with this add-on.

#### Individual Skip Salary

To individually skip or pause payroll: 

1. Log in to the Payroll Dashboard.
1. Navigate to **ADMIN OPTIONS** → **Pay Employees** → **Run Payroll**.
2. If required, select the month you want to skip the employee's salary.
3. Search the employee's name and click on the **Edit** icon on the right-most column.
    ![Edit icon against employee details field](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-edit-employee.jpg.md)
4. Select **SKIP THIS** to skip the employee's salary for that month. 

![Skip Salary for employee in Payroll highlighted in Edit Salary.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-skip-salary.jpg.md)

#### Bulk Skip Salary 

To skip salary in bulk: 

1. Log in to the Payroll Dashboard.
1. Go to **ADMIN OPTIONS** → **Pay Employees** → **Run Payroll**. 
1. On the **Payroll Summary** page, click the check box above the employee's list view. You can search and filter the employees via Location or Department. 
    ![Bulk skip salary selection on Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-bulk-skip.jpg.md)
1. Select the employees you want to skip salary for. 
1. Click **SKIP SELECTED** to skip the salaries. 

> **INFO**
>
> 
> **Handy Tips**
> 
> - With the Gross Pay status like `skipped`, the **SKIP SELECTED** button shows multiple salary actions like **Resume Selected**, **Skip All Except Selected** and more. 
> - If the payroll is already finalised, click on **Make Changes** and update that month's salary disbursals.
> 

### Resume Skipped Salary

To pay the same employee's salary later:

1. Log in to the Payroll Dashboard.
1. Navigate back to **Run Payroll**.
2. Select the payroll month and the employee's profile whose salary you have skipped.
3. Click **EDIT**, and click **Resume Pay**. 
4. Finalise the payroll again.

If you want to exclude an employee from all future payroll processes, indefinitely or until chosen manually, you can [stop salary](#stop-salary). 

### Execute Payroll for One Employee 

Your employee is availing their salary earlier than usual, or is exiting the company and the final settlement needs to be done immediately. In such cases, you can run payroll for just that employee. To do so:

1. Log in to the Payroll Dashboard.
1. Navigate to **Run Payroll**, and select the payroll month if required.
2. Search the employee for whom you want to execute payroll and click on the **Edit** icon in the last column.
3. Click **SKIP ALL EXCEPT THIS**. This will pause all the other employees' salaries for that month.

![Edit Salary window where Skip All Except This is highlighted.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-skip-all-salary-except-this.jpg.md)

Now you can finalise your payroll and request execution.

### Resume Other Employees' Skipped Salaries

Remember to resume the salaries for the rest of the employees. To do so:

1. Log in to the Payroll Dashboard.
1. Navigate to **Run Payroll**, and select the payroll month if required.
2. Click any of the skipped employees' profiles (from step 2 to [execute payroll for one employee](#execute-payroll-for-one-employee)) and then on the **Edit** icon.
3. Click **Resume all skipped**.

### Revise Salary 

You can set an employee-level salary revision with an effective date on the Payroll Dashboard:
- [Individually](#individual-revision)
- [In bulk](#bulk-revision)

Know how Payroll treats [salary revision arrears](#how-to-pay-salary-revision-arrears). 

#### Individual Revision

To revise employees' salary with an effective date individually:

1. Log in to the Payroll Dashboard.
1. Navigate to **People** → Employee name. 
1. Go to **EDIT** against **Compensation & Perquisites**.
1. Click **REVISE COMPENSATION**. 
    ![Revise Salary for employee](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-revise-salary.jpg.md)
1. On the **Revise compensation** page, modify the following as applicable: 
    1. CTC in case of default salary structure adopted by Payroll. Or you can select [custom salary structure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md#setup-salary-structure) as applicable to your organisation. 
    1. Add Voluntary Provident Fund.
    1. Perquisites. 
    1. Deductible benefits. 
        ![Modify salary components to revise salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-revise-salary-comp.jpg.md)
    1. In the **Add Salary effective date** section, click **Add salary effective date** to customise the date for the salary changes to reflect in the employee's payslip. This is optional. 
        ![Add salary effective date](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-add-salary-eff-date.jpg.md)
1. Click **NEXT** to verify the arrears and finalise the revised salary. 
1. Click **CONFIRM**.

You have successfully revised an employee's salary.

#### Bulk Revision

To revise salaries for multiple employees, you can bulk upload revisions with the respective effective dates. 

1. Log in to the Payroll Dashboard.
1. Navigate to **People** → Employee name. 
1. Go to **Compensation & Perquisites** → **EDIT**.
1. Click **Bulk Salary Revision**.
    ![Revise Salary for employee](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-revise-salary.jpg.md)
    
The **Salary revision & arrear calculation** page opens. 
1. Select the salary effective date applicable for all employees. 
1. Download the Salary Revision Sheet. 
1. Enter the revised salary details against the relevant employee's names. 
    - Delete the employee rows for whom salary revisions are not applicable. 
    - Enter the revised CTC amount in the template in the Default Structure sheet. 
    - In the Custom Structure sheet, enter the revised CTC breakdown for each employee under [Custom Salary Structure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md#setup-salary-structure). 
1. Save the file and upload the template. 
1. Click **Continue**. 
1. Preview the changes and confirm the revised salary and arrears. Download the arrear report to view the caclulations. 
1. Click **Proceed to Confirm**.

You have successfully revised salary in bulk for multiple employees. 

After revision, all the arrears are auto-applied for the particular employee. To check that: 
1. Go to **Pay Employees** → **Run Payroll**.
1. On the **Payroll Summary** page, click the **Edit** icon against the employee's name. 
1. Check the **Arrears** drop-down. You can further edit the arrears amount. 

#### Resolve Errors 

In case of errors in the upload file, the system provides an error report that you can download, fix and reupload. 

1. Click **Get error report**. 
1. In the downloaded file, fix the errors highlighted in the errors column. 
1. Click **Replace file** to reupload the fixed error file. 

### Terminate and Run Last Payroll 

You can terminate employees on the Payroll Dashboard and process their [full and final settlement (FnF)](https://razorpay.com/payroll/learn/full-and-final-settlement-fnf/). This enables you to offboard employees from your organisation and Payroll.

To terminate/dismiss an employee:

1. Log in to the Payroll Dashboard.
1. Navigate to **People** and click on the particular employee's profile.
1. Click **DISMISS EMPLOYEE** at the bottom of the page. This opens the **Initiate exit process** page.
    ![Dismiss Employee on RazorpayX Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-dismiss-employee.jpg.md)
1. Select the **Last working date** (LWD) from the drop-down calendar and provide a reason for dismissal. If you have enabled the [resignation module](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees/resignation.md), we automatically add the LWD once the employee submits their resignation.

This initiates the full and final settlement process for the employee. Know how to [process employee's FNF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/resignation.md). 

You have successfully dismissed the employee from the organisation. View the employee's payslip to verify the payroll calculation before [executing payroll](#execute-payroll). 

### Pay Employee Level Arrears 

You can pay employees' arrears on the Payroll Dashboard. Manually calculate and add component-wise arrears to employee salaries, including allowances and deductible benefits. 

To add arrears to employee's salaries: 
1. Log in to the Payroll Dashboard.
1. Go to **ADMIN OPTIONS** → **Pay Employees** → **Run Payroll**. 
1. Click the **Edit** icon against the employee's profile you want to add arrears. 
    ![Edit icon against employee details field](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-edit-employee.jpg.md)
1. In the **Edit Salary** page, click to the **Arrears** section. 
1. Enter the arrears amounts against the respective salary components. You can also reverse LOP deductions. 

    ![RazorpayX Payroll manage employee arrears](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-employee-arrears.jpg.md)
    
        
### How to pay Salary Revision Arrears?

             You need not manually pay any salary revision arrears. After you [revise salary](#revise-salary) effective from a past date, we automatically calculate and display the arrears payable. 

                ![RazorpayX Payroll pay salary revision arrears](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-salary-revision-arrears.jpg.md)
             
             We add and process the salary revision arrears automatically in the upcoming payroll cycle. 
            

     
1. Click **DONE** after finalising the component-wise arrears. 

You have successfully added component-wise arrears to your employee's salaries.
- To check the arrears in future, refer to the **Salary Register**. 
- The arrears reflect on the payslip as additions. Click **Gross Pay** in the **Payroll Summary** page to view the updated payslip. 
    ![Check Gross Pay after adding arrears](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-check-gross-pay-after-arrears.jpg.md)
- TDS on arrears is deducted in the same month as arrears are added. 

> **WARN**
>
> 
> **Watch Out!**
> 
> You can only pay salary component arrears via the Payroll Dashboard. Do not pay compliance arrears using this feature.
> 

## Attendance-based Salary Calcuation

You have three ways with which you can calculate [loss of pay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/leaves.md#loss-of-pay-for-unpaid-excessive-leave-work) for Unpaid/Excessive Leave Work. Know how you can make salary deductions for the same below. 

### Additions and Deductions 

Payroll supports adding incentives, bonuses and other components to the monthly payroll activity. You can also make deductions in the employee's payroll. 

The additions and the deductions reflect in the employee's payslip and are taxable as applicable. 

![Making additions and deductions in Edit Salary window of employee's profile.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-edit-salary-additions-deductions.jpg.md)

#### Additions 
To add incentives and others to your employees' payroll, you must:

1. Navigate to **Run Payroll** → **Select employee**.
2. Click the **EDIT** icon under the last, right-most column. 
    ![Against the employee name, click edit in the right-most column.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-edit-emp-additions.jpg.md)
3. Add the amounts under **Additions** and click **DONE**. 
4. Click **Gross Pay** after you add a bonus to view the new payslip instantly.

#### Deductions 
To make deductions from your employee's payroll, you must: 

1. Navigate back to **Run Payroll** and select the employee.
2. Click the **EDIT** icon under the right-most column against the employee's name. 
3. Navigate to **Deductions** enter the amount for **Recovery** or the [Loss of Pay](#loss-of-pay) Days.

> **INFO**
>
> 
> **Handy Tips**
> 
> If the edit icon looks uneditable and says **Final**, click **Make Changes** on the right menu to make the column editable again. Know more about [making changes to payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/exceptional-cases.md#modify-salary-after-payroll-is-executed).
> 

### Loss of Pay
Payroll does not automatically deduct the loss of pay based on attendance. By default, attendance is considered `present` for all calendar days of the month in Payroll. Know more about [attendance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/attendance.md). 

Following are some ways to deduct salary for the Loss of Pay days:
- **Standard recovery of an amount**: Enter the total amount directly after calculating the total amount to be deducted from the employee's salary.
- **Loss of Pay days**: Enter the number of days to prorate the value automatically.
- **Jibble Integration**: Sync the loss of pay data from the Jibble Dashboard to automatically calculate and deduct loss of pay amount. Know more about the [Jibble attendance integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations/jibble.md). 

To [pay Loss of Pay arrears](#how-to-pay-lop-reversal-arrears), follow the steps mentioned in **Run Payroll**.

#### Calculations

Loss of Pay is usually calculated on the total number of days in the month and not on the total working days of the month. 

    
### Default Salary Structure

         Consider the following example where LOP days added is 2 in Payroll's default salary structure. LOP days are prorated on the gross salary of the employee. 
         
         It is calculated on the basis of either:
        
            
                Consider the following conditions to calculate LOP:
                    - Attendance is calculated on all working days in the month.
                    - All Sundays are off days.
                    - There is no other holiday in the month. 
                
                In such a case, LOP is calculated as: 

                        (`Actual Monthly Salary` x `Total Days Worked`) / `Total Working Days` 
                    
                    Where:
                        - Total working days in the month excludes 4 Sundays.
                        - Total Days Worked = Total Working Days (excluding week-offs/Sundays) - Employee Working Days (excluding week-offs/Sundays)
                
                Actual Gross Salary x 25 / 27 gives the Gross salary post LOP deductions. 
            
            
                If you configure to calculate attendance based on total number of days of the month, LOP is calculated as: 

                        (`Actual Monthly Salary` x `Total Days Worked`) / `Total Number of Days in Month`

                    Where:
                        - Total working days in the month includes 4 Sundays.
                        - Total Days Worked = Total Working Days (including week-offs/Sundays) - Employee Working Days (including week-offs/Sundays)
                
                Actual Gross Salary x 29 / 31 gives the Gross salary post LOP deductions. 
            
            
        

    
### Custom Salary Structure

         If you use a custom salary structure, we do not prorate the employee/s LOP deduction based on the gross salary. All the salary components, except compliance payments, are prorated separately based on your organisation's [attendance setup](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#xpayroll-s-loss-of-pay-calculation-is-not) to arrive at the LOP deduction amount. 

         Consider the following example where: 
         - LOP applicable = 1 day
         - Total number of days in the month of March = 31 days 
         - Employee's working days = (31 - 1) = 30

         LOP is calculated as follows: 

         
         Salary Components | Actual Salary | Salary post LOP 
         ---
         Basic Pay | 1,16,667 | 1,12,904
         ---
         HRA | 58,333 | 56,451 
         ---
         Special Allowances | 1,53,283 | 1,48,338 
         ---
         EPF Contribution | 1,800 | 1,800
         ---
         Medical Allowance | 1,250 | 1,210 
         ---
         Conveyance Allowance | 2,000 | 1,935 
         ---
         **Gross Pay** | **3,33,333** | **3,22,683** 
         
        

### Bulk Upload

You can change the additions, deductions and loss of pay for all your employees in bulk on the Payroll Dashboard.

To navigate to the bulk upload feature: 
1. Log in to the Payroll Dashboard.
1. Go to **ADMIN OPTIONS** → **Pay Employees** → **Run Payroll**. 
1. On the **Run Payroll** page, click the **Edit** icon against any employee.
    ![Edit icon against employee details field](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-edit-employee.jpg.md)
    The **Edit Salary** pop-up page opens.
1. Click **Bulk Upload**.
    ![Bulk upload attendance modification at the page bottom](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-payroll-bulk-add-dedt-lop-option.jpg.md)
1. The **Bulk Additions/Deductions/Loss of Pay** page appears.
    ![Bulk additions/deductions/Loss of Pay page on Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-bulk-add-dedt-lop-page.jpg.md)

On the **Bulk Additions/Deductions/Loss of Pay** page:

1. Select the month for which you want to make the attendance-based salary modifications.
1. Click **Download Now**. The `.xlsx` template containing the employee details for the month is generated. Skipped employees' details are not downloaded.
1. Follow the on-screen instructions to finalise the template. 
    - Delete the rows for employees with unmodified salary details.
    - Add new rows for each employee having any combination of additions/deductions/loss of pay.

    ![Payroll employee file download template with details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-bulk-add-dedt-lop-template-view.jpg.md)
1. Upload the updated `.xlsx` file. You can click **Replace File** to upload a different file.
1. Preview the file uploaded. When satisfied with the changes, click **Confirm** → **Proceed**.

You have successfully uploaded the template with the attendance-based salary modifications.

#### Resolve Template Errors 

When you upload an incorrect file, you see: 
- The **Processing failed** message on the **Bulk Additions/Deductions/Loss of Pay** page. 
- Total number of errors in the file. 
- Option to download the Error Report. 

To resolve errors during template upload: 
1. Click **Get error report**. 
1. Make the required changes in the error file. 
1. Reupload the error file to validate the corrections.

### Related Information

- [Salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md)  
- [One-time Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/one-time-payments.md) 
- [Reimbursements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/reimbursements.md)
