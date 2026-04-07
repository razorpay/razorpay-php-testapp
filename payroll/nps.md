---
title: Enable NPS Declaration for Employees on RazorpayX Payroll
heading: Enable NPS Declarations
description: Enable NPS for employees and allow them to choose NPS contribution percentage on the RazorpayX Payroll Dashboard.
---

# Enable NPS Declarations

Organisations contribute up to 10% of employees' Basic Pay + Dearness Allowance as employer's contribution to the National Pension Scheme (NPS). This contribution is tax exempt upto ₹7.5 lakhs for organisations and is offered as an added benefit for employees. 

On Payroll, you can contribute towards NPS and also allow employees to choose their contribution percentage. 

> **WARN**
>
> 
> **Watch Out!**
> 
> - Employee's contribution to NPS via employer cannot be: 
>     - Greater than 10% of the employee's Basic Pay + Dearness Allowance. 
>     - Lesser than ₹500. 
> - Payroll does not generate the Permanent Retirement Account Number (PRAN) for your employees. 
> - Payroll does not handle the NPS payments. Your organisation is responsible for depositing the NPS contribution to the employee's PRAN. 
> 

## How it Works 

Following is the workflow for administrators to manage employer's NPS contributions:

1. [Enable NPS for the organisation](#enable-nps). 
1. [Enable NPS contribution for eligible employees](#enable-nps-for-eligible-employees). 
1. [Allow employees to choose NPS contribution percentage](#enable-nps-declaration). 

## Enable NPS 

On Payroll, you must first enable NPS for the oragnisation to allow contributions. To enable NPS for the organisation: 
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Navigate to **ADMIN OPTIONS** → **Settings** in the left menu.
1. Go to the **Employer NPS Setup** section and click **EDIT**. 
    
1. Enable the toggle against **Enable/Disable NPS**. 
1. Click **Save & Confirm**. 

### Enable NPS for Eligible Employees

You must enable NPS for eligible employees to allow them to set their NPS preferences.

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Navigate to **ADMIN OPTIONS** → **People** in the left menu. 
1. Go to the particular employee's profile and navigate to the **Provident Fund, Professional Tax, ESI, LWF & NPS** section. **Click EDIT**.

    
1. Go to the **NPS Status** section and select **Enabled** from the drop-down list. 
1. Enter the employee's 12-digit PRAN in the text box. We pre-fill employee's PRAN if the employee provided their PRAN during [onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md#set-up-profile).
1. Click **CONTINUE**. 

You have successfully enabled the employee to contribute to NPS.

### Enable NPS Declaration 

On Payroll, your eligible employees can choose their NPS contribution percentage. However, you must enable this setting separately. When disabled, we contribute the percentage reserved for NPS as specified in the [salary structure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md#setup-salary-structure). 

To allow eligible employees to declare NPS contribution percentage: 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Navigate to **ADMIN OPTIONS** → **Settings** in the left menu. 
1. Go to **Employer NPS Setup** and click **EDIT**. 
1. On the **NPS for Employer Setup** page, toggle the setting against **Employees can declare NPS contribution**. 

    

This enables the setting. You must now select the frequency and duration for the declaration window to remain open. 
1. Go to the **Declaration Window for NPS** section and select the custom duration from the drop-down list. You can choose from the following: 
    - **Always Open**: The declaration window remains open always. 
    - **Every month for a certain period**: Select the date range using the drop-down list to keep the declaration window open for that date range. 
    - **Custom range**: Select the date range using the drop-down calendar. Click **+ Add new range** to create multiple time ranges throughout the annual year. 

    
1. Click **Save & confirm**. 

This allows employees to declare their NPS contribution. Whenever the declaration window is open, we send an email to the NPS eligible employees to declare or make changes to their NPS declaration. 
- Ensure the declaration window is open during [onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md#employee-onboarding) and [salary revision](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#revise-salary) process.
- NPS contribution is recorded in the salary structure as a benefit. Enter an upper limit amount or a percentage for Payroll and custom salary structures respectively. This sets a limit for employees' NPS contribution.

### Related Information

- [Employee NPS Declaration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees/declarations/nps.md)
