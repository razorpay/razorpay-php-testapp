---
title: Part Time Employees
description: Manage and process payments to part-time employees through RazorpayX Payroll.
---

# Part Time Employees

The Part-Time Employee Payments module processes payroll payments for your part-time employees, freelancers, and interns while ensuring compliance with TDS regulations. This module is designed specifically for payroll-related transactions and provides automatic TDS calculations and filing capabilities.

## How it Works

Part-Time Employee Payments enables you to pay individuals for payroll purposes with built-in compliance features. The system automatically calculates TDS based on the payment purpose and ensures all transactions comply with payroll regulations.

 **Supported Payment Purposes**

The table below lists the payment purposes available for part-time employees:

Purpose | TDS Rate | Tax Code | Description
---
Part-time Employee Providing Professional Service | 10% | 194J | Consultancy services not requiring technical skills
---
Part-time Employee Providing Technical Service | 2% | 194J | Consultancy services requiring technical skills
---
Stipend for Intern | 0% | - | Educational stipend with no TDS deduction

## Prerequisites

Before using Part-Time Employee Payments, ensure:
- Your XPayroll account is active.
- You have the necessary permissions to process payments.
- Employee details including valid PAN numbers are available.
- Required employee details are prepared for upload.

### Steps to Make Part-Time Employee Payments

1. Navigate to **People > Pay Part-Time Employees**

2. Fill in the following details:
   - **Payment to:** Select the name of the employee.
   - **Amount:** Enter the gross amount (including TDS, but excluding VAT, GST, and so on)
   - **Remarks:** Add any notes which will be included in the email to the employee.
   - **Payment Purpose:** Select one of the following options:
     - **Part-time Employee Professional Service:** TDS deduction at 10%.
     - **Part-time Employee Providing Technical Services:** TDS deduction at 2%.
     - **Stipend for Intern:** No TDS deduction.

3. Review all details and click **Confirm Payment**

> **WARN**
>
> 
> **Watch Out!**
> 
>    - **Business PAN Requirement:** If the beneficiary has a business PAN, you would need to process this transaction through XPayroll that has a linked Current Account as only Payroll-related transactions are allowed via Payroll wallet. Learn more [RazorpayX-powered Current Account](https://razorpay.com/docs/payroll/razorpayx-powered-current-account/)
> 
>    - **Scheduled Payments:** You can set up scheduled payments for regular part-time employees.
> 
>    - **Invoices:** Invoices are not required for part-time employee payments.
>    
>    - **Payment Tracking:** All part-time employee payments will be recorded in your ledger for easy tracking.
> 

## 26Q Filing for Part-Time Employee Payments

Payroll automates 26Q filing for eligible part-time employee payments. 

### About 26Q Filing

- **Scope:** Only payments processed within our system will be included in the 26Q filing.
- **Eligibility:** All part-time employee payments with applicable TDS deductions will be considered for 26Q filing.
- **Filing Period:** The 26Q form is filed quarterly as per the Income Tax Department requirements.

    
### How to Enable/Disable 26Q Filing

        1. Navigate to **Settings > Tax Filing**
        2. Under the **TDS Filing** section, find the 26Q Filing option
        3. Toggle the switch to enable or disable automatic filing
        4. Save your preferences
       

    
### Handling Missing PAN Information

        If a part-time employee's PAN information is missing:
        1. A "P" error will be displayed next to their payment record
        2. Payment will be blocked until the PAN is updated
        3. Once updated, the payment will be processed and included in the 26Q filing
       

## Frequently Asked Questions

    
### Can part-time employees request payments themselves?

        Yes, freelancers can use the payment request feature to streamline communication regarding payments.
       

    
### Will I receive email notifications for part-time employee payments?

        Yes, confirmation emails are sent for all successful part-time employee payments.
       

    
### What happens if a scheduled payment is blocked due to missing PAN or non-current account?

        The payment will not be processed, and an email notification will be sent to the employee explaining the reason and steps to resolve it.
       

    
### Can I make one-time payments to part-time employees?

        Yes, one-time payments can be made through the Part-Time Employees payment section, separate from the monthly payroll.
       

    
### How are part-time employee payments different from contractor payments?

        Part-time employee payments are specific to individuals working on a part-time basis with your company, while contractor payments are for vendors providing services. The TDS rates and documentation requirements may differ.
