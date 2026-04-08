---
title: Manage Employee Loans in RazorpayX Payroll
heading: Employee Loans
description: Create and manage loans for employees on the RazorpayX Payroll Dashboard.
---

# Employee Loans

Employee loans are beneficial for both the employer and the employee. 
- Employees choose to avail loans from their employers as the interest rates are lower. 
- The employer trusts the employee to make timely repayments. In the case of a default, the employer can recover the amount easily. 

This makes the loan process more straightforward for employees and lucrative for organisations. 

On the Payroll Dashboard, you can easily add new loans and manage them. You can also analyse loan reports visually, get a centralised view of loans given, track loans and manage repayment and foreclosure, all in a single dashboard. 

    
### Advantages of the Loan Module

         - Payroll's loan module automatically calculates all the loan conditions.
         - Provides a centralised view of your organisation's loan portfolio.
         - Single Platform to manage, modify and track employee loans. 
         - Streamlines loan modifications effortlessly. 
         - Detailed real-time reports on loan repayments and requests.
        

    
### What is the difference between Advance Salary and Employee Loans?

         Employee loans are a loan facility employers provide to their employees at a lower interest rate than the market rate. The EMIs are deducted from the employee's salary and on Payroll, you can modify the employee's EMI or skip the EMI when necessary.

         In an [Advance Salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/advance-salary.md), the organisation pays a portion of the employee's salary as an advance. The advance paid is recovered in installments from the employee and is usually interest-free.
        

## Create and Manage Loans

Explore how you can:
- [Create a Loan](#create-a-loan).
- [Skip Loan EMIs](#skip-loan-emis).
- [Modify Loan Duration](#modify-duration).
- [Record External Loan Recovery](#recover-loan).
- [View Loan Reports](#view-reports). 

### Create a Loan 

To create a loan as per your loan policy:

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **ADMIN OPTIONS** → **Pay Employees** → **Loans** in the left menu. 
1. Click **+ ADD NEW LOAN**.
    
1. On the **Create Loan** page: 
    1. Enter employee details. 
        1. Search and enter the employee's name. 
        1. Provide a loan name. For example, 'Personal Loan'. 
    1. Specify the loan amount and duration details. 
        1. Enter the total loan amount sanctioned to the employee. 
        1. Choose the interest type between Flat rate or Reducing rate. 
            
                
### Difference between Flat rate and Reducing rate

                    
                    Flat Interest Rate | Reducing Interest Rate
                    ---
                    Is a fixed interest rate charged on the total principal availed by the employee. | Also a fixed interest rate, but is charged on the total outstanding principal amount after each EMI/repayment.
                    ---
                    Interest amount remains fixed throughout the loan tenure. | Interest amount changes after every EMI as the principal amount is reducing. 
                    ---
                    Interest is easier to calculate and consistent. | Interest amount calculation is more complex than flat rate calculations. 
                    ---
                    Interest increases the EMI amount. | Interest is charged proportionately on the outstanding amount. 
                    
                    

             
        1. Enter the rate of interest. You must use SBI's loan products for reference.
        1. Provide the perquisite percentage.  
            
                
### What is Perquisite Rate?

                    Perquisite rate or perquisite % is the difference between SBI's interest rate on loans and the organisation's interest rate. 

                        - To calculate perquisite rate, you must refer to SBI's loan products.
                        - If your organisation provides personal loans, check SBI's personal loan products. Similarly, you can check SBI's marriage loan products for marriage loans. 
                    
                    Suppose SBI's personal loan interest rate is 13% and your organisation's rate of interest is 8%.
                    
                    
                    Perquisite % | 13% - 8% 
 = 5%
                    ---
                     
                    
                    The 5% is a perquisite income to the employee and is charged under the selected tax regime, basis their tax bracket. 
                    

            
    1. Determine the repayment terms. 
        - Provide the duration of the loan by entering the number of months.
        - Choose from when the EMI deduction starts to provide flexibility to the employee. 
1. Review the details and click **ADD TO PENDING LOANS**. 

You have successfully created a loan. This moves to the `pending` status as you must disburse the loan for the employee to receive the loan amount. 

To disburse the loan to the employee: 
1. Go to **PENDING LOANS** on the Loans page. 
1. Review the loan details. You can delete a loan entry if it is no longer required for the employee. 
1. Click **DISBURSE LOAN ()**. This creates the loan payout to your employees. 
    

    [Add funds to your Payroll account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#transfer-funds) in case the **DISBURSE LOAN ()** option is not available.
1. Enter the OTP you you receive at your registered email address/authenticator app and authorise the loan disbursal.

> **INFO**
>
> 
> **Handy Tips**
> 
> In the [employees' profile](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md#set-up-profile) view, you can either set a limit on the total perquisite amount allowed (only in [custom salary structure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md#setup-salary-structure)) or let Payroll calculate the amount allowed automatically. This is beneficial in cases of employee's [salary revision](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#revise-salary). 
> 

Once you disburse the loan, you can view the details and summary on the [Manage Loans](#manage-loans) page.

## Manage Loans

To manage a particular loan:

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **ADMIN OPTIONS** → **Pay Employees** → **Loans**. 
    
1. Click **Manage** against the particular loan. 

You can filter active and closed loans using the drop-down list on this page. A loan is closed after the loan amount and interest is [recovered](#recover-loan). Click **PENDING LOANS** to view the loans you have created but are yet to disburse. 

### Skip Loan EMIs

Sometimes an employee may request to skip a month's EMI. To skip the upcoming month's EMI:

1. Navigate to the [Loan Details](#manage-loans) page. 
1. Click **Skip EMI** in right pane. 
1. Choose how to adjust the EMI repayment. You can either increase the EMI amount proportionally for the loan tenure or the total number of EMIs payable. You can preview the updated calculation in the table displayed below. 
    
1. Click **CONFIRM**. 

You have successfully skipped a month's EMI for the employee. 

### Modify Duration 

To modify the loan duration: 

1. Navigate to the [Loan Details](#manage-loans) page. 
1. Click **Modify Instalment Terms** in the right pane. 
1. Enter the new loan duration in months on the **Modify Loan Duration** page. Click **PREVIEW NEW TENURE** to check the change in the EMI and outstanding balance amount. 
1. Click **CONFIRM**.

You have successfully changed the EMI tenure for the loan. 

### Recover Loan 

In some cases, employees may be interested in foreclosing the loan. In such cases, you can recover the loan amount externally and update the recovery on Payroll. To enable foreclosure for your employees: 

1. Navigate to the [Loan Details](#manage-loans) page. 
1. Click **Loan Recovery** in the right pane.
1. Choose between a Full or Partial Recovery of the loan. In case of a partial recovery, enter the amount you have recovered. 
    
1. Click **Next**. 
1. Review the updated loan tenure, EMI amount and the repayment status for the payroll months in the **Verify & Confirm** page and click **Confirm**.
1. In the **Confirm changes** pop-up modal, click **CONFIRM CHANGES**. 

You have successfully updated the loan status after recovery. 

> **INFO**
>
> 
> **Handy Tips**
> 
> You can [change the loan duration](#modify-duration) to 1 month to perform an early loan recovery. This automatically updates the loan status on Payroll. 
> 

## View Reports

To view the loan reports:

1. Navigate to the [Loan Details](#manage-loans) page. Here you can view the loan details and terms. 
1. Click **Report** in the right pane. This opens the Loan Summary report. 
1. You can use the filter options and click **APPLY FILTER** to view the data. 

## For Employees 

Once the employee receives the loan amount: 

- Payroll deducts the EMI from their salary every month. Employees can view the deduction breakdown on their payslips.  
- Employees can view their loan infomation from their [profile](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md#set-up-profile). 

### Related Information

- [About Salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md)
- [Run Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md)
