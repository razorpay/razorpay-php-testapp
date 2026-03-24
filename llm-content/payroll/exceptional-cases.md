---
title: Resolve Salary Exceptional Cases in RazorpayX Payroll
heading: Exceptional Cases
description: Troubleshoot the possible exceptional cases when disbursing salaries in RazorpayX Payroll.
---

# Exceptional Cases

Check the troubleshooting guide to resolve some exceptional cases in Payroll. The case, the reason, and the solutions to some issues are explained below. 

### Making Deduction Removes Custom Salary Structure

Sometimes when you put in a deduction, Payroll removes the custom salary structure. This applies specifically to employees to whom ESI and PF apply.

Consider an employee with the following custom salary structure:

Basic Salary | 8,000
---
House Rent Allowance (HRA) | 4,000
---
Special Allowance | 4,000
---
Employer ESI Contribution | 520
---
Employer PF Contribution | 1,440
---
**Gross Monthly Earnings** | **17,960**

Now, let us say we need to put a deduction of ₹5,000 to this month's payroll. The gross pay then is 17,960-5,000 = **₹12,960**. 

To make that deduction, it is sensible to remove the amount proportionately from the rest of the salary components, as shown. 

Basic Salary | 5500 (8000-2500)
---
House Rent Allowance (HRA) | 2750 (4000-1250)
---
Special Allowance | 2750 (4000-1250)
---
Employer ESI Contribution | 520
---
Employer PF Contribution | 1,440
---
**Gross Monthly Earnings** | **12,960**

But by doing so, **our ESI and PF of employer contributions will be incorrect**, as these are calculated as a percentage of other components.

In such a case, you should manually lower the value of other components to correct the gross pay can as per the PF and ESI values, **which can pose discrepancies**. 
    - There is the added complication of unknown or missing components. 
    - It presents problems in the payroll database of the employee which can raise issues during audit. 

Overall, this problem cannot be reliably solved using mathematical calculations.

Hence, in such cases, Payroll **removes the custom salary structure**, and assigns a new structure that back-calculates from the required gross pay.

### Add External Payroll Information 

To accurately calculate an employee's TDS liability, you must provide the employee's previous payroll data. This is important even if you have joined Payroll recently and have already processed employees' salaries. 

To add previous payroll data: 
1. Log in to the Payroll Dashboard.
1. Go to **People** and select the employee for whom you are adding the previous payroll data.
1. Navigate to **Past Payroll In FY 2023-2024** → **EDIT**. 
    1. Enter the previous year's salary details in the first section. 
    1. Enter the past salary details in the past employer(s) salary section.
1. Click **CONTINUE**.

With the details provided, Payroll automatically calculates the TDS. 

### Error Message when Finalising Payroll 

In Payroll, to execute a payroll, it first needs to be **finalised**. 

- Previously, you could finalise payroll for different months and then request execution in any order. 
- However, this often led to **incorrect TDS calculations** because Payroll only considers the past income from _executed payroll_, and not from _finalised payroll_. 

To combat this, effective from September 2021, Payroll has added a limitation: **you can finalise payroll for one month at a time only**. If a particular month's payroll is finalised and you attempt to finalise the payroll for another month, then Payroll shows an error message.

In such a situation, you have two options -
- Go to the other month's payroll and un-finalise it by clicking on **Make Changes**.
- Go to the other month's payroll and execute it.

### Modify Salary after Payroll is Executed

You cannot modify the salary after the payroll for a month is executed. Such changes create inconsistencies in the salary disbursals process and can lead to differences in the compliance calculations. 

- In Payroll, **it is not possible to make modifications retrospectively**, especially after payroll **has already been executed**. 
- If there is a necessity to change the salary or make changes to the employee's profile that affects the salary, we suggest you do so in the **upcoming payrolls**.

For instance, if an employee's salary needed to be increased in the past month and was not, you can add the additional amount to the next or upcoming payrolls as arrears. 

That way, your past calculations will not change, and the employee receives the required modifications in their next payroll.

> **INFO**
>
> 
> **Handy Tips**
> 
> On the **Run Payroll** dashboard, we use the following action buttons: 
> - **FINALIZE PAYROLL**  
> - **REQUEST EXECUTION** 
> 
> This is to imply a two-step process before positively finalising the payroll. You can always make changes to a finalised payroll by clicking on the **MAKE CHANGES** button and then clicking on **REQUEST EXECUTION**.
> 

You **cannot** make or request modifications after clicking **Request Execution**.

### Execute Payroll after TDS returns are Filed

You can execute payroll for past months for which TDS returns have already been filed. 

However, we **cannot change the TDS returns**. This can lead to inaccurate data for the employees whose payroll is executed later. Especially if TDS is deducted, the employee(s) will not see it in their [Form 16](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md#form-16-16a). In such a case, you need to get a correction filed externally in such a case. 

### Related Information

- [Salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md)
- [Run Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md)
- [One-time Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/one-time-payments.md)
