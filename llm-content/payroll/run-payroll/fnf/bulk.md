---
title: Bulk Dimiss Employees on RazorpayX Payroll Dashboard and Hold Salary Pay Compliance During Full and Final Settlement
heading: Bulk Dismiss Employees
description: Dismiss employees in bulk on the RazorpayX Payroll Dashboard.
---

# Bulk Dismiss Employees

On the Payroll Dashboard, you can dismiss multiple employees at once using the bulk dismissal and settlement feature. With this feature, you can also: 
- Process [full and final settlements (FnF)](https://razorpay.com/payroll/learn/full-and-final-settlement-fnf/). 
- [Hold Salary and Pay Compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll/fnf.md). 

Know more about [employee dismissal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#terminate-and-run-last-payroll).

## How it Works 

1. Download the initiation template from the Payroll Dashboard. 
1. Add employee details for dismissal and upload the sheet. 
1. Download and update the settlement sheet. Upload the sheet again to process settlement. 

### Video Tutorial 

Watch the video below to know how to initiate employee dismissal in bulk and process bulk final settlement. 

[Video: https://www.youtube.com/embed/yMfosbhNnAU]

## Bulk Dismissal 

To dismiss employees in bulk: 

1. Log in to the Payroll Dashboard.
1. Navigate to **ADMIN OPTIONS** → **People** and click **Bulk Full & final Initiation**.
    ![RazorpayX Payroll Bulk FNF initiate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-bulk-fnf-people.jpg.md)
1. On the **Bulk Full & final Initiation** page: 
    1. Download the template. 

        
            
### How to fill the template correctly?

                 - Follow the instructions in the template to fill the sheet.
                 - Ensure the employees for whom you are initiating FnF in bulk are not the orgnaisation's [administrators](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/user-roles-workflows.md#view-collaborators).
                 - You can start [holding salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll/fnf.md) from a month where the payroll is not yet finalised. 
                 - Ensure you upload the file in the `.xlsx` format.
                

        
    1. Upload the updated sheet for us to validate it for any errors. Know how to [resolve the template errors](#resolve-errors). You can click **Replace file** to update the current sheet. 
    1. Click **Upload & Preview**. 
        ![Payroll Create Bulk FnF ](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-bulk-fnf-initiation.jpg.md)
1. Review the employee details validated as shown on the page. This includes information such as the number of employees, employees' whose [net pay is on hold](#hold-salary), dismissal details and more. 
1. Click **Confirm** to proceed with the bulk dismissal process.  

You have successfully initiated the bulk dismissal process for multiple employees. The employee dismissal reflects on the specific employees profiles immediately. 

## Bulk Settlement 

Bulk settlement happens after you initiate the bulk dismissal. You can update the details or salary adjustments of the dismissed employees. You must dismiss employees to process bulk FnF settlements. 

To process bulk FnF settlements: 
1. Log in to the Payroll Dashboard.
1. Navigate to **ADMIN OPTIONS** → **People** and click **Bulk Full & Final Settlement**.
    ![RazorpayX Payroll Bulk FNF initiate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-bulk-fnf-people.jpg.md)
1. On the **Bulk Full & Final Settlement** page: 

    1. Click **Download Now** to download the settlement sheet from the Dashboard. The downloaded sheet contains employee information as uploaded in the [bulk initiation](#bulk-dismissal) step. 

        
            
### How to fill the template correctly?

                 - To not make salary adjustments for specific employees, delete their rows from the pre-filled sheet. Deleting these rows does not cancel dismissal. 
                 - In the **No. of Days** column in the template, enter the number of days for Leave encashment/LOP. We automatically calculate the amount.
                 - Leave the cells empty if some salary adjustments for an employee are not applicable. Do not enter '-' or 'NA' and more. 
                 - If you select Leave encashment amount, do not enter the number of days in **No. of Days** column in the template. 
                 - Provide labels for additions/deductions that do not have the leave encashment/LOP labels. Labels reflects on the payslip and denote the reason for salary adjustment. 
                 - Ensure you upload the file in the `.xlsx` format.
                

        
    1. Upload the updated sheet for us to validate it for errors. Know how to [resolve the template errors](#resolve-errors).
    1. Click **Upload & Preview**.
        ![Payroll settle bulk FnF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-bulk-fnf-settlement.jpg.md)
1. On the **Preview** page, you can view the dismissed employees' salary adjustments. You can also use the filters above the table to understand the settlement action required for specific employees. 
1. Verify the employees' details and click **Proceed To Confirm**. 
1. Click **Confirm**.

You have successfully confirmed the bulk settlement details.

## Resolve Errors 

In some cases when the template upload process fails, you can download the error report, fix the errors in the report and reupload the corrected file. 

1. When you run into errors on the Bulk initiation/Bulk settlement page, click **Get error report**. 
1. In the downloaded report, make changes to the fields with errors. 
1. Click **Replace File** to re-upload the file on the Dashboard. 
    ![Payroll Bulk FnF Resolve errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-bulk-fnf-error.jpg.md)

## FAQs

    
### 1. I want to hold the salary of a single employee. Is it possible?

            Yes, you can withhold the salary of an individual employee. Refer to [Hold Salary, Pay Compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll/fnf.md).
        

    
### 2. Can we manually select employees when initiating Bulk FNF?

            Yes, you can manually select the employees. Enter the employee names in the [Bulk Dismissal initiation template file](#bulk-dismissal). 
        

    
### 3. What are the supported payment modes to process an employee's FNF?

            We support NEFT and IMPS to process the employee's full and final settlement. However, we recommend using NEFT as the default payment mode. Know more about [payroll payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#make-payroll-payouts).
        

 

### Related Information 

- [About Employee Dismissal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#terminate-and-run-last-payroll)
- [About Salary Additions/Deductions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#attendance-based-salary-calcuation)
