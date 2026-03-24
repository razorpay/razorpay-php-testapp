---
title: Pay Advance Salary in RazorpayX Payroll
heading: Advance Salary
description: Set up, pay and manage advance salary disbursals.
---

# Advance Salary

You can provide salary advances to your employees on the Payroll Dashboard. 

Payroll automates the salary advance process. We settle the advance amount against future payroll executions via monthly deductions. You can also customise the EMIs so that the employee pays the advance over several months.

    
### How is Advance Salary different from Employee Loans?

         In a salary advance, the organisation pays a portion of the employee's salary as an advance. The advance paid is recovered in installments from the employee and is usually interest-free.

         [Employee loans](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/loans.md) are a loan facility employers provide to their employees at a lower interest rate than the market rate. The EMIs are deducted from the employee's salary and on Payroll, you can modify the employee's EMI or skip the EMI when necessary.
        

## Enable Advance Salary Requests

By default, you can provide advance salary to your employees on the Payroll Dashboard. However, you can also allow employees to request advance salary as necessary. 

1. Log in to the Payroll Dashboard.
1. Navigate to **Setting** → **Payroll Setup** → **EDIT**.
1. Select the **Let employees request salary advances** check box. 

This allows your employees to raise salary advance requests. 

## Create Advance Salary Request

To create an advance salary request on your employee's behalf:

1. Log in to the Payroll Dashboard.
1. Navigate to **Pay Employees** → **Advance Salary**. 
1. On the **Advance Salary** → **NEW ADVANCE** tab:
    1. Enter the **Employee Name** and the **Amount**.
    1. Provide the **EMI** amount to deduct from the monthly net pay. Enter 0 in the EMI field if you do not wish to recover advance salary via EMI/recover the amount lumpsum. 
    1. Provide any **Remarks**, if any. You can also provide a reason.  

    ![Provide Advance Salary details on RazorpayX Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-new-advance-salary.jpg.md)
1. Click **ADD TO PENDING PAYMENTS**.
    
This creates an advance salary request on your employee's behalf.

### Approve Requests

All advance salary requests that employees have raised are listed in the **PENDING REQUESTS** tab. To approve the requests: 

1. Log in to the Payroll Dashboard.
1. Navigate to **Pay Employees** → **Advance Salary**. 
1. Click the **PENDING REQUESTS** tab. 
1. Review the request and select the check box for a employee. Click **APPROVE**. Click **REJECT** to cancel the request. 

You have successfully approved/rejected an advance salary request. All approved requests are now moved to the **Pending Payments** section.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can also delete any of the pending payments. Click the delete icon against a specific pending payment. 
> 

## Pay Advance Salary 

To pay advance salary: 
1. Follow the steps to [create advance salary](#create-advance-salary-request) and [approve the requests](#approve-requests). 
1. In the right pane, click **PAY NOW**. Ensure you have sufficient funds. 
1. Enter the OTP you receive at your registered email address/authenticator app and authorise the payment.

This successfully pays the advance salary to the employee. 

## Record External Payment 

If you have paid advance salary outside of Payroll, you must record it on your Payroll Dashboard. 

1. Log in to the Payroll Dashboard.
1. Go to **People** → click specific employee's profile. 
1. Click **EDIT** against **Compensation & Perquisites**.
1. Enter the advance salary amount in the **Current Advance Salary** field. You can add the EMI amount, if any. 

    ![Edit Current Advance Salary on Razorpay Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-advance-salary-record-ex-pay.jpg.md)

## Check Ledger Reports 

To check the history of advance salaries your organisation has paid or to view the transaction record: 

1. Log in to the Payroll Dashboard.
1. You can either: 
    - Navigate to **Pay Employees** → **Salary Advance** → **Ledger** in the right pane.
    - Go to **ADMIN OPTIONS** → **Reports** → **Ledger**.
1. In the Ledger report, select **Advance Salary** in filter **Type**. 
    ![Check Advance Salary transactions in payroll ledger](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-advance-salary-ledger.jpg.md)

### Related Information

- [Payroll Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md) 
- [Salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md)
