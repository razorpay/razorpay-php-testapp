---
title: Hold Salary Pay Compliance During Full and Final Settlement for Employees on RazorpayX Payroll
heading: FnF Hold Salary Pay Compliance
description: Hold employee salary for individual employees and continue compliance payments when processing full and final settlement on the RazorpayX Payroll Dashboard.
---

# FnF Hold Salary Pay Compliance

You can terminate employees on the Dashboard and process their [full and final settlement (FnF)](https://razorpay.com/payroll/learn/full-and-final-settlement-fnf/). This enables you to offboard employees from your organisation and Payroll. Know more about [employee dismissal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/resignation.md#process-full-final-settlement). 

When dismissing employees, you can hold employees' salaries to recover employee overhead costs while also continuing to make compliance payments on Payroll. 

#### How Hold Salary Pay Compliance Works

In some cases, you may need to withhold the employee's salary for the duration of their notice period to recover any losses incurred by the employee during their tenure of employment. However, you must continue to make the [compliance payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md).
         
In such cases, you can enable the hold salary setting for that employee to withhold salary and continue to make compliance payments. 

**Example**:

Your organisation has a 2-month notice period wherein you also withhold the employee's salary. This means: 

If Last Working Date (LWD) | Notice period starts from | Months Salary is Withheld
---
March 31, 2024 | Jan 31, 2024 | 2 (February and March)

On Payroll, you can dismiss employees and hold their salaries while continuing to make compliance payments. You can also manage the net pay and edit the final settlement payable.

## Video Tutorial 

Watch the video below to know how to dismiss employees, hold their salary and settle net pay, or read along. 

[Video: https://www.youtube.com/embed/bDZSXFRgWTU]

## Dismiss Employee

To dismiss an employee:

1. Log in to the Payroll Dashboard.
1. Navigate to **People** → particular employee's profile.
1. Click **DISMISS EMPLOYEE** at the bottom of the page.

This initiates the employee's full and final settlement process and redirects you to the **Initiate exit process** page.

### Hold Salary

To hold the employee's salary:
1. Select the **Last working date** (LWD) from the calendar and provide a reason for dismissal. If you have enabled the [resignation module](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees/resignation.md), we automatically add the LWD.

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     You can finalise the LWD only if you have not finalised the payroll for that month. 
>     

1. In the **Salary during resignation months** section, select **Hold net pay till the last working month**. You can then select the start month for withholding salary from the **Hold net pay starting from** drop-down menu. 

    ![Hold salary pay compliance during FnF on RazorpayX Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-hspc-dismiss-employee.jpg.md)
    
    You can select **Release Salary** to process the final settlement as per the regular [employee dismissal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/resignation.md#process-full-final-settlement) process. 
1. Click **Dismiss Employee**. Click **Dismiss** in the modal to confirm employee dismissal.

You have successfully dismissed the employee. To prorate salary calculations including the additions, loss of pay and deductions based on the LWD, follow the steps to go to the [settlement/Net Pay](#settlement) page.

Once you hold salary for an employee, you notice an **Net pay on hold** label against the employee/s names on the payroll during payroll execution. Employees cannot avail payslips via their Dashboard/WhatsApp/email for the on-hold months. 

![RazorpayX Payroll Hold Salary Pay Compliance netpay on hold](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-hspc-netpay-onhold.jpg.md)

### Settlement 

After you dismiss an employee, you can open their settlement details on the right pane on the employee's profile. On this settlement page, you can modify the Loss of Pay, additions and deductions details. 

To make adjustments to the settlement amount:

1. Log in to the Payroll Dashboard.
1. Navigate to **ADMIN OPTIONS** → **People** and navigate to the particular employee's profile. 
1. On the top-right pane, click **here** to open the resettlement page.
    ![RazorpayX Payroll dismiss employee details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-hspc-dismissal.jpg.md)
1. This opens the **Full and final settlement** page for the employee. Enter the adjustments as per the usual [employee dismissal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/resignation.md#process-full-final-settlement) process. 

    
        
### What adjustments are available?

             You can make the following adjustments on the Full and final settlement page: 
                - Enter either the **Leave Encashment amount**, or the number of leaves to encash. 
                - **Additions (excluding gratuity)**.
                - **Loss of pay deductions**.
                - **Deductions (excluding salary advance)**.
                - **Personal Email Address**.

                 ![Payroll Dashboard make additions deductions FNF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-fnf-additions-deductions.jpg.md)
            

    

1. Click **Add to Payment**. 

You have successfully added the adjustments to the employee's net pay. 
- You can preview the updated payslips for the employee on the **Full and final settlement** page. 
- You can continue to make resettlements until you release net pay for the employees. 

## Release Net Pay

After you fulfil the requirement for withholding employees' salary, you can adjust the total amount payable to the employee. This final amount payable is the employee's net pay. 

To release net pay: 

1. Navigate to **ADMIN OPTIONS** → **Pay Employees** → **Release Net Pay**.
    ![RazorpayX Payroll release net pay for dismissed employees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-hspc-release-netpay.jpg.md)
1. Select the employee/s to view the net pay breakup in the right pane. 

    To make any changes to the employees' additions/deductions, LOP or personal email id, you can either hover on the employee's details and click **Manage FNF**, or click **Manage FNF Settlement →** in the right pane. 
1. Click **Release Full & final Settlement**. Ensure you have adequate balance in your account.
1. Enter the OTP you receive at your registered email address/authenticator app and authorise the net pay release.

You have successfully released the net pay for the employee/s. 

## FAQs

    
### 1. I am unable to view the dismissal or net pay information of some of my dismissed employees. Why?

            You may not be able to view the dismissal or net pay information of some of your dismissed employees as the payroll for the employee's last working month is not finalised. 

            [Finalise Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#execute-payroll) in **Run Payroll** for the dismissed employee's net pay information to reflect on the RazorpayX Dashboard. 

            Suppose your employee's LWD is 15th May. In that case, finalise the payroll for the month of May for the employee's dismissal information to appear on the **Release Net Pay** page. 
        

    
### 2. Does Payroll immediately transfer the net pay after I choose 'Release Salary' when initiating FNF?

         No, choosing **Release Salary** does not immediately release the employee's net pay. Instead, Payroll processes the employee's [Full and final settlement](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/resignation.md#process-full-final-settlement) as part of the monthly payroll activity. 
        

    
### 3. How can I add the previously skipped salaries of employees to their net pay?

            You need not manually add the skipped/withheld salaries. The employees' [net pay](#release-net-pay) automatically includes the previously withheld salaries.
        

    
### 4. What are the supported payment modes to process employee's FNF?

            We support both NEFT and IMPS payment modes to process employee's full and final settlement. However, we recommend you choose NEFT as your default payment mode. Know more about [payroll payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#make-payroll-payouts).
        

    
### 5. Will PF/ESIC/TDS be paid within the respective months?

            Yes, we make the compliance payments (except PF payments) within the respective months for dismissed employees.
        

    
### 6. How do we make additions/deductions such as Loss of Pay to an employee's net pay?

            You can adjust the employee's gross and net pay when processing the employee's full and final settlement. Refer to the steps in [Settlement](#settlement).
        

### Related Information

- [Terminate Employee and Run Last Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/resignation.md#process-full-final-settlement)
