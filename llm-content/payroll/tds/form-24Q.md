---
title: Form 24Q Compliance
heading: Form 24Q for Employers
description: Ensure accurate Form 24Q compliance, payroll execution, and error handling for TDS filing.
---

# Form 24Q for Employers

Form 24Q is a quarterly statement that employers must file to report Tax Deducted at Source (TDS) on salaries. It contains details of salaries paid and TDS deducted for each employee. Filing this form is mandatory, as it enables the generation of Form 16, which employees need for tax returns.  

## Quarterly Filing Deadlines

Quarter | Month | Due Date
---
Q1 | April – June | 31 July
---
Q2 | July – September | 31 October
---
Q3 | October – December | 31 January
---
Q4 | January – March | 31 May

### Q4 Specific Rules 

Since Q4 includes the full financial year’s salary and TDS details, specific salary data is required for active and dismissed employees to ensure accurate filing.

- **Active Employees**: Salary details are taken from the **March payslip**.  
- **Dismissed Employees**: Salary details are taken from the **Full & Final (F&F) settlement payslip**.  

## XPayroll Checks Before Filing

We ensure accurate filing with two checks during the March payroll execution.  

### Check 1: Skipped Summary Report

The **Skipped Summary Report** warns admins about missing **March and F&F payslips**, skipped or out-of-order payrolls, and unprocessed payrolls for active and dismissed employees.

![](/docs/assets/images/Skipped-summary-report.jpg)

  The report includes:
	 - Months with skipped payrolls or missing payrolls
	 - Active employees whose March payroll is not executed 
	- Dismissed employees whose F&F payroll is not executed 

	
> **WARN**
>
> 
> 	Watch Out!
> 	- Payroll restricts out-of-order execution for March payroll of active employees, but allows it for other months *(For example, February payroll before January payroll)*.  
> 	- For dismissed employees, only the last working month can not be executed out of order.
> 	

### Check 2: Finalisation Error Report

The Finalisation Error Report runs an additional check and is available for all months. If payroll finalisation fails, admins can click **View Issue** on the **Run Payroll** page to access the report.

![](/docs/assets/images/finalisation-issue.jpg)

If all Q4 filing criteria are met, finalisation proceeds without issues.

It fails if any of these issues are found during the check:
 - Negative net pay.
 - March payroll of the same FY is already executed.
 - F&F payroll is already executed.

The finalisation error report includes:  
- **Employee Details (Name, Email, Employee ID, Status - *Active/Dismissed*)**  
  - Helps identify the affected employees and their payroll status.  
  - Ensures the right employees are reviewed and corrected.  

- **Hire Date and Last Working Date**  
  - Confirms if an employee is active or dismissed.  
  - Ensures F&F payroll is processed correctly for dismissed employees.  
  - Helps validate if payroll execution aligns with their employment period.  

To make error resolution easier, we have also added filters for:  
- Negative net pay  
- Future payroll already executed 
- March payroll of previous FY not executed 
- March/F&F payroll not executed 

![](/docs/assets/images/finalisation-filter.jpg)

If auto-payroll is enabled and finalisation fails due to an error, we send an email to the admin of the organisation with a link to the 'Finalisation Error' report.

> **WARN**
>
> 
> 	Watch Out!
> 	- Payroll restricts **April payroll** if **March payroll for active employees** or **F&F payroll for dismissed employees** from the previous FY is missing, as both are required for **Form 16**.
> 	

## Error Resolution

If payroll finalisation fails, the errors listed below must be addressed before proceeding. Use the suggested resolutions to fix them. 

Error | Resolution
---
Employee's deductions exceeded earnings, resulting in negative net pay.  | Add reimbursement to balance it (can be adjusted with the next payroll).  
**Example:** An employee has a ₹5,000 deduction for a damaged company laptop, but their earnings are only ₹3,000, resulting in a negative net pay of ₹-2,000. To balance this, add a Travel Reimbursement of ₹2,000, ensuring zero net pay. 
The reimbursement can be adjusted in the next payroll. 
---
The Employee’s previous FY March payroll was skipped. | The March [past FY] payslip must be executed for accurate Form 16 generation. To ensure correct FY earnings before finalization, generate a zero payslip by adding 30/31 days of Loss of Pay (LoP). 
---
Dismissed employee's F&F payroll has already been executed.  | Once an employee's F&F payroll is executed, it cannot be redone. Generate a zero payslip by adding 30/31 days of Loss of Pay (LoP) to ensure accurate FY earnings before finalisation. 
---
An employee left in any previous month, but their F&F payroll was never executed. | F&F month payslip needs to be executed as we rely on this for Form 16 generation. Generate a zero payslip by adding 30/31 days of Loss of Pay (LoP) to ensure accurate FY earnings before finalisation. 
---
