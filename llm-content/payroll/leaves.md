---
title: RazorpayX Payroll Leave Setup
heading: Leave Setup
description: Configure your organisation's leave and holiday setup in RazorpayX Payroll.
---

# Leave Setup

Time management in Payroll can be done via the Leave and Attendance module after you enable and set it up. 

You can integrate biometric devices and configure your employees' leaves setup and attendance in Payroll:

- [Configure leave and attendance module setup](#configure-leave-setup).
- [Calculate leaves based on Loss of Pay](#loss-of-pay-for-unpaid-excessive-leave-work).

## Configure Leave Setup 

To set up a leave system for your organisation on Payroll: 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **ADMIN OPTIONS** → **Settings** in the left menu.
1. Go to **Holidays, Leaves and Attendance**.
2. Under the **Types of Leaves** section, enter the different types of leaves your employee can avail and set the following parameters for each type of leave:

    

    **Type of Leave** | **Description**
    ---
    **Default Amount** | This is the number of leaves granted to an employee when they are added to Payroll.
    ---
    **Monthly Increment** | Every month, Payroll automatically increases the total leave count as per the increment set you have set. This increment happens on the 1st of every month and takes place for every active employee, irrespective of their date of joining.
    ---
    **Max Amount** | If you are using the monthly increment, then it is also helpful to set the maximum amount that this type of leave should not exceed.
    ---
    **Carry Forward** | At the end of your leave calendar (financial or calendar year), Payroll can automatically carry forward the leave balance to the next year. You can use this setting to specify the maximum carry forward. 
 Set this to `0` if you do not want the leaves to be carried forward. If this is not set, then the entire balance will be carried forward.
    

## Change Leave Types

If you have already configured your leave setup on Payroll and you decide to change the number/types of leaves, it can lead to unexpected results. 

For example, if the first type of leave defined is `Casual Leave`, and you change this to `Annual Leave`. Then the system shows the Casual Leave balance/total as the new Annual Leave balance/total. 

This is not ideal as it create confusion for the employees on the type and the corresponding number of leaves available to them.

If you have to make a change like this, you can:
1. Log in to the Payroll Dashboard.
1. Go to **Reports** → **Attendance** → **Leave Report**. 
1. Download your current leave setup data.
1. Make the required changes and save it.

Once the changes have been implemented, you might need to revisit this report, download and make changes to it using your backup, and upload it again.

## Bulk Update Leave Balance

To begin with, ensure the leave setup is configured for your organisation.

To check this:
1. Go to **Settings** → **Holidays**, **Leave and Attendance**.
2. Click **EDIT**. Go through all the different options, and set up as required.

Next, to update your employee's leave balance:

1. Go to **Reports** → **Attendance** → **Leave Report**. You can see a table with all your employees and all the different kinds of leaves that are available to them (total, as well as remaining leaves).
2. To edit this, click the **Download CSV** button, save and update the total leave balance.
    
> **INFO**
>
> 
>     **Handy Tips** 
> 
>     The leave balance is calculated automatically, so editing those columns does not have any effect.
>     

3. Upload the file on the same page and all employees' leaves get updated.

## Loss of Pay for Unpaid/Excessive Leave Work

> **INFO**
>
> 
> **Handy Tips**
> 
> This section is only applicable if your organisation is using our Leave and Attendance feature.
> 

There are three options for adding loss-of-pay based on attendance, and you can select your desired option from **Settings** → **Holidays**, **Leaves and Attendance**.

    
        If you enable this option, Payroll automatically adds loss-of-pay for your employees for the payroll month based on unpaid leaves in their attendance. 

        The loss of pay is calculated as: **Salary** x **Number of unpaid leaves** / **total number of days in the month**. 

        ![Automatically add loss-of-pay for unpaid leaves](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-holidays-leaves-attendance.jpg.md)
    
    
        If the option for automatic loss-of-pay is disabled, then you can use our LOP suggestions report under **Reports** → **Attendance** → **Payroll Adjustments**. 

        These suggestions are based on the same logic as the automatic adjustments, and you can manually select which loss-of-pay to add to the payroll.
    
    
        If you want complete manual control of loss-of-pay, then the same can be done by adding a deduction manually. 
        
        You must disable the option for automatic loss-of-pay disabled if you opt for this.
    

Know more about calculating [salary based on Loss of Pay](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#calculations.md). 

## Leave Encashment 

When an employee leaves your organisation, you can pay them for the leaves they have not availed from their balance. Know more about [Leave Encashment during exit](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll#full-and-final-settlement.md).

### Related Information

- [Human Resources](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/administrator.md) 
- [Run Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll.md) 
- [Employees](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/employees.md)
