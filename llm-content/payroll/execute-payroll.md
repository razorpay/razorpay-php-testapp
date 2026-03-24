---
title: Refer to Execute Payroll Checklist in RazorpayX Payroll
heading: Execute Payroll Checklist
description: Use the RazorpayX Payroll execution checklist before executing your next payroll.
---

# Execute Payroll Checklist

Once you complete [Payroll account setup](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/quickstart.md), you can execute payroll for your organisation. Payroll automates transactions and manages payroll as per settings enabled. Use the following checklist to execute payroll without any misses.

> **WARN**
>
> 
> **Watch Out!**
> 
> Your employees and company depend on this one-click payroll processing mechanism. Use this checklist to ensure all prerequisite steps are completed before processing payroll.
> 

## 1. Update Employee List

Before disbursing salaries, ensure that your employee list is up-to-date. Add, modify or dismiss employees according to their employment status and compensation changes. To do so:

1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. In the left menu, navigate to **Admin Options** → **People**.  
1. Select the relevant employee as per from **ALL** or other tabs. 
1. Click **EDIT** against the applicable sections, as shown.  
    ![Editing employee information in Payroll.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-modify-employee.gif.md)

Edit their personal and payment information, their leaves and their attendance before the payroll execution date. 

## 2. Check Missing Information

Check if any employee's critical information, like their bank account number, UAN, PAN or so on is missing. To do so:

1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Go to **Admin Options** → **Reports**
1. Click **Missing Information**. It provides a list of employees in the left column the information missing about them against their name.

![Employee missing info highlighted in employee's missing info modal in RazorpayX Payroll.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-reports-missing-info.jpg.md)

## 3. Adjust Variables

Variables can either be an addition to the salary, a deduction based on a loss of pay, a recovery or a reimbursement.

![Edit Salary window to enter amount and labels on Payroll.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-edit-salary-additions-deductions.jpg.md)

### Additions

To update your employees' **Additions**: 
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Navigate to the payroll month, and click **EDIT** against the employee's name.
2. Add any bonus or incentives under **Additions**.
3. Click **Done** once updated.

### Deductions

To update your employees' **Deductions**: 

- If your organisation uses the Payroll attendance module to track leaves, navigate to **Reports** → **Attendance** → **Payroll Adjustments** and approve any loss of pay recommendations that Payroll suggests. 
    ![Leave reccomendations tab on Payroll on the right hand side menu.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-leave-suggestions.jpg.md)

- If you are tracking the loss of pay (LOP) days outside of Payroll or using the [Jibble integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/integrations/jibble.md), follow the given steps:  

    
        Know how to [sync loss of pay data from Jibble](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/integrations/jibble/#verify-lop-in-payroll.md).
    
    
        1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
        1. Navigate to **Pay Employees** → **Run Payroll**. Select the employee here.
        1. Click **EDIT** and update this data under **Deductions**.
        1. Click **Done**.
    
  

Check how you can modify other salary components as part of [Run Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll.md).

## 4. Verify Salaries

Before processing payroll, check under **Reports** → **Salary Register** on your [Payroll Dashboard](https://payroll.razorpay.com/dashboard) whether your employees are paid as per the applicable cost-to-company (CTC). Cross-verify their salaries and update the information accurately. 

> **WARN**
>
> 
> **Watch Out!**
> 
> You **cannot** modify payroll after it is executed.
> 

## 5. Check Due Dates

For Payroll to make timely compliance payments, you must execute Payroll on or before 5th or 10th of the month, depending on the compliances applicable to your organisation. 

Compliance | Payroll Due Date | Government Due Date
---
TDS (Salaried/Employees) | 5th of the month |  7th of the month
---
TDS (Non-salaried/Contractors) | 5th of the month |  7th of the month
---
PF | 10th of the month | 15th of the month
---
ESIC | 10th of the month | 15th of the month

## 6. Finalise and Execute

Finalise the payroll for the month. [Transfer the funds](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/payroll-payouts.md) required to process payroll and then **Request Execution** with ease. You **cannot** [make changes](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/exceptional-cases.md) to payroll after you have executed it. 

Authorise the payroll execution using the OTP received at your registered email address/authenticator app.

### Related Information

- [Run Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll.md)
- [Salary](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/salary.md)
- [Statutory Compliance](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/statutory-compliance.md)
