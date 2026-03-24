---
title: Quickstart Guide
description: Complete guide to get started with RazorpayX Payroll.
---

# Quickstart Guide

After you sign up with [Payroll](https://payroll.razorpay.com/login), you can begin to set up your account and Dashboard.

## Set Up Payroll Account

The following guide provides a checklist of prerequisite steps and best practices to set up your organisation's payroll account and system. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Automated Professional Tax (PT) payments for employees in Karnataka are temporarily unavailable on Payroll. Know more about the [PT rule change](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#professional-tax).
> 

    
### Add All Employees

           You can add employees individually or in bulk on the Payroll Dashboard to set up the payroll recipients. 
           
           To add employees:
                1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
                1. Navigate to **ADMIN OPTIONS** → **People**. 
                1. Click **Add One** to add an individual employee, or **Add Multiple** to add multiple employees. You can also invite your employees using their email ids using **Invite many**.
                    ![Add employees on RazorpayX Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-add-emp.jpg.md)
                1. Enter the employees' information such as joining date, authorised email id, salary information and more. 
                1. Click **CONTINUE**. 

            You have successfully added employees/contractors to the Dashboard. Your employees can complete their [onboarding and profile set up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md#employee-onboarding) using the welcome mail they receive at their registered email id. 

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Sometimes your employees may not be added to your system due to operational discrepancies like [not receiving the welcome mail](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#welcome-mail). Re-trigger a welcome mail or invite them to your company and payroll system.
>             

        

    
### Enable Compliances

         Update your organisation's compliance details as applicable. We support and automate many monthly [statutory compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md) payments. 

        To enable compliances applicable:

        1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
        1. Navigate to **ADMIN OPTIONS** → **Company Details** in the left menu. 
        1. Click **Provident Fund / ESIC / Professional Tax / LWF** → **EDIT** and enable compliances from the respective drop-down menu as applicable.
        1. Click **CONTINUE** to save the changes.

            ![Changing compliance settings like PF and external credentials in Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-payroll-enable-compliances.jpg.md)

        If you want us to handle your external compliances, connect your Payroll account to your compliance portals as applicable.

        1. Go to **External Credentials** in **Company Details** → **EDIT**.
        1. Enter the user ids and passwords to authenticate your credentials. 
        1. Click **CONTINUE** to save the changes.

        You have successfully enabled the applicable compliances. Know more about [compliance payments and automation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md). 
        

    
### Upload Company Logo

         You can upload your company logo to reflect on both the Dashboard and the payslips. Ensure you meet the following conditions for the logo:

            - Must be a PNG file.
            - Must have a 5:1 aspect ratio or be rectangular shaped.
            - Must have a transparent background.

         To upload the logo: 
         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
         1. Navigate to **Company Details** → **Name & Address** → **EDIT**. 
         1. Upload the photograph and click **PREVIEW**.

            ![Upload Company Logo under Company Details in Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-upload-logo.jpg.md)
        

    
### Setup Default Salary Structure

         See [default salary structure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md#setup-salary-structure) set up.
        

    
### Check for Missing Information

         Before you [execute payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/execute-payroll.md), ensure you your employees' data is available and up-to-date.

         To check for missing information:

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
            1. Go to **ADMIN OPTIONS** → **Reports** → **Missing Information**. This opens the **Missing Information** page with a list of employees and their missing information.
            1. Select the checkboxes against the employees' names and click **SEND EMAILS**. You can also select all employees using the checkbox against **Employee Name**.
            1. Click **SEND EMAILS** to re-confirm. 

            Your employee/s receive an email at their registered email address to update their missing information. 

            ![Missing Information settings in Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-missing-info.jpg.md)
        

    
### Confirm Salary Components

        You should re-check the salary components and net salary calculations.

         To re-check salary information:

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard)
            1. Navigate to **ADMIN OPTIONS** → **Reports**.
            1. Select **Salary Register** and select the relevant month. You can filter the information, download the payslips for that month and download the data as a .CSV file to process the data better. 

            ![Salary Register in Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/xpayroll-check-salary-register.jpg.md)
        

    
### Employee Tax Declarations

         You must ask your employees to update their tax deductions and declarations on the [Employee Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees/declarations.md). 

         Employees must navigate to **Tax Deductions** on their Dashboard to update their tax details and minimise their deductible taxes. 
        

    
### Add RazorpayX Payroll as Beneficiary

         To enable fund transfers, you need to add your Payroll Account as a beneficiary. You can find your account details in the Payroll [Money Transfer page](https://payroll.razorpay.com/moneyTransfer).
        

    
### Update UAN

         Update your employees' Universal Account Number (UAN) if applicable. 

         To update UAN:

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            1. Navigate to **ADMIN OPTIONS** → **People**.
            1. Select the employee From the list of employees and open their profile. 
            1. Update their PF details in **Provident Fund** → **Professional Tax & ESI**.
        

    
### Enable Resignation

         You can enable employee resignations and allow employees to submit resignation requests. 

         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
         1. Go to **Settings** → **Employee Resignation Setup** → **EDIT**.
         1. Select the **Enable resignations feature** check box.
        

With all of the above done, your account is completely set up to process payroll.

### Related Information

- [Execute Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/execute-payroll.md)
- [Statutory Compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md)
- [Administrative Role](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md)
- [Salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md)
