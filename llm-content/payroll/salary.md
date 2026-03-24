---
title: Explore Salary payout and settings available in RazorpayX Payroll
heading: Salary Setup
description: Explore all the salary features in RazorpayX Payroll. Optimise your salary structure and enable Form 16s.
---

# Salary Setup

On Payroll, you can automate paying your employees accurately and effortlessly. All payments are made directly to the employees' bank accounts and are systematically recorded in the [Salary Register](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/quickstart/#confirm-salary-components.md). 

## Payroll Salary Actions 

With Payroll, salary disbursals are timely, precise and efficient. It can pay your employees in the folllowing ways:
- Execute monthly payroll using [Run Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll.md). 
- Make [one-time payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/one-time-payments.md), as necessary.
- Approve and pay [Reimbursements](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/reimbursements.md).
- Approve and pay Advance Salary.
- Create [bonuses](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/bonus.md) and add clawbacks.
- Grant [employee loans](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/loans.md) at the time of need. 
- Provide [flexible benefits](#avail-flexible-benefits) to employees.

All of these options are available in the **Pay Employees** drop-down menu on your Payroll Dashboard.

![Pay Employees drop-down higlighting: Run Payroll, One-time Payments, Advance Salary and Reimbursements.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-salary-pay-emp-tab.jpg.md)

## Setup Salary Structure 

To pay salaries to your employees, you must first set up your salary structure for your organisation and configure flexible benefits for your employees. Know more about setting up a [default salary structure](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/quickstart#setup-default-salary-structure.md).

### Custom Salary Structure 

> **WARN**
>
> 
> **Watch Out!**
> 
> We do not recommend setting up a custom salary structure due to the following reasons:
> - Most organisations do this to reduce the tax liability of their employees. Payroll, by default, creates an automatically optimised salary structure for this.
> - Previously applicable allowances like conveyance and medical allowances are [no longer relevant](https://razorpay.com/payroll/learn/income-tax-allowances-salaried-individuals-india/#Standard-Deduction-Replacing-conveyance-and-medical-allowance) and do not offer any tax advantages. 
> - If PF and ESI apply to an employee, you must enter the required amount. Doing so can avoid errors in the salary structuring when it is prorated (as per the month of joining/exiting the organisation).
> 
> We recommend setting up custom salary structures only when you offer [flexible  benefits](#flexi-benefits-in-custom-salary-structure) to your employees.
> 
> 

You have the option to change the default salary structure that Payroll has assigned to your company and employees at the time of setting up your account.

### Organisation Level Custom Salary Structure 

You can change the salary strcuture for your organisation at large. To change the salary structure: 
1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **Admin Options** → **Settings**.
1. Go to **Payroll Setup** → **Default Salary Structure** and click **EDIT**. 
    ![EDIT otpion highlighted against the Default Salary Structure option.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-edit-deflt-sal-structure.jpg.md)
2. Uncheck the option to **Use XPayroll's default salary structure** and define your salary structure.
    ![Checked default salary structure checkbox in Payroll. Uncheck it to disable](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-change-default-salary-structure.jpg.md)

This structure will automatically apply to your current and new employees if they are not using an [employee-customised salary structure](#employee-level-custom-salary-structure), as explained below.

### Employee Level Custom Salary Structure

You can set a salary structure for specific employees. This change applies if your employee is availing a joining bonus or other payroll services like advance salary. 

To set a salary structure for an employee:
1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard)
1. Navigate to the **People** tab on the left menu. 
1. Click the employee's name.  
1. Navigate to **Compensation & Perquisites** → **EDIT** and edit the employee's salary structure.

![Changing salary strcuture in Compensation and Perquisites.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-changing-employee-salary-structure.jpg.md)

Here you can review the salary figure and change the employees' annual salary, any advance salary due, perquisites, and others.

If you wish to customise the salary structure for more than one employee, select the checkbox next to **Create a custom salary structure**, and then put in the various amounts under different heads. 

### Avail Flexible Benefits 

Employee benefits, fringe benefits, or flexible benefits are special allowances given to employees that help save expenses and taxes. 

It allows employees to choose the benefits they want to avail themselves, and they avail it in addition to their standard wages. 

For example, you may give your employees an **Internet Allowance**, which your employees can use to set up a high-speed broadband connection while working from home. 

By making this a flexible benefit, your employees can upload proof of the expense incurred by them and effectively make that part of the allowance tax-free.

### Set Up Flexi Benefits

To use flexible benefits, you must set up a [custom salary structure](#flexi-benefits-in-custom-salary-structure) for your employees and choose **flexi** under the **Taxable column**.

![ Taxable column showing Yes/No/Flexi in Payroll.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/xpayroll-taxable-column.jpg.md)

Your employees can upload proof of expenses by going to **Reimbursements** → **Reimburse Flexible Benefits**. After they have uploaded their proofs, you can view the [pending reimbursements](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/reimbursements#view-pending-reimbursements.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Payroll **does not validate** the proofs uploaded for flexible benefits. Your organisation must verify the documents internally.
> 

### Flexi Benefits in Custom Salary Structure 

You can set the **taxable column** as yes/no/flexi. **Flexi** stands for [flexible benefits](#avail-flexible-benefits), and implies that allowances are taxable by default. 

But the employees can upload any proof of expenses and make some part of their salary partially or fully tax-exempt.

### Related Information

- [Reimbursements](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/reimbursements.md)
- [Attendance](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/attendance.md)
- [Conveyance Allowance](https://razorpay.com/payroll/learn/conveyance-allowance/)
