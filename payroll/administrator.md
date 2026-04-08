---
title: RazorpayX Payroll Administrator User Role
heading: Administrator Role
description: Understand and manage your employees and contractors. Explore Admin role in HR and provide special permissions in RazorpayX Payroll.
---

# Administrator Role

People in an organization, primarily the employees and the contractors, are the company's most valuable asset. It is important to honour their needs and requirements.

Payroll ensures efficiency in your people management processes and streamlines how you manage people operations in your company. 

> **INFO**
>
> 
> **Handy Tips**
> 
> All the people added to RazorpayX Payroll as an `employee` by default.
> 

## Add Employees & Contractors

    
### Differences between Employee and Contractor

         Employees and contractors are different fundamentally, structurally and legally. Due to this, their employment and compensation processes are different too.

         Misclassification of employment can severely damage the working experience and work environment. The following section lists down the key differences between an employee and a contractor. 

            
            **Point of Difference** | **Employee** | **Contractor**
            ---
            Nature of Contract | Employed through a **Contract of Service**. | Employed through a **Contract for Service**.
            ---
            Compensation and Remuneration | Paid monthly salary. | Paid professional fees/stipends for services provided on an ad-hoc basis, which can be monthly as well, similar to a salary.
            ---
            Roles and Responsibilities | Has a specific set of responsibilities as per their designation and job description (JD). | Works on short-term or long-term projects and has project-specific duties only.
            ---
            Payroll Member | Considered to be on the permanent payroll of the company and is automatically included in Payroll. | Not considered to be on the permanent payroll of the company; is a part of accounts payable, and payments are processed through one-time payments in Payroll.
            ---
            Compliance | PF, ESI, Professional Tax, TDS and more apply to employees, and Payroll manages them. | Compliance charges and benefits are not applicable.
            ---
            Employee Benefits | Companies must allow employee benefits as per the statutory laws governing the region. | Contractors are exempt from benefits recommended by statutory laws unless the company mentions providing them on the service agreement.
            ---
            Taxation | Tax is deducted at source for employees. Due to compliance and employee benefits, one can avail tax-free schemes as an employee. | Payroll calculates TDS and other taxes as applicable, but the contractor is wholly responsible for other taxes payable.
            
        

    
### Convert Contractors to Employees and Vice Versa

         You can convert your contractors to employees and vice versa. To change employee classification:

         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
         1. Go to **People** → particular employee's profile.
         1. Click **EDIT** against **Basic Information**. 
         1. Under **Type of Employee**, change the classification. 

            
        

    
### Create Custom Employee IDs

         You can customise your employees' IDs (and contractor IDs) completely, or customise the existing identification options available in Payroll. To customise IDs: 

         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
         1. Navigate to **ADMIN OPTIONS** → **Settings** → **Employee Data** → **EDIT**.
         1. Select the **Completely custom** IDs checkbox to enable custom IDs. 
         
             You can clear the check box to use non-custom IDs, add organisation prefixes and choose different series for employees and contractors.

            
                
                    What are completely custom IDs?
                    

                     Custom IDs are free-to-enter IDs for your employees/contractors as a combination of letters and numbers. In a custom ID setup, Payroll does not auto-generate a series of IDs when you add an employee. 
                    

                
### What are non-custom IDs?

                     When you maintain non-custom IDs, Payroll auto-generates employee/contractor IDs using an internal counter and assigns it to new employees. The IDs are numeric. You can only modify the organisation prefix. 

                        In this setup, you can:
                        - Add a default prefix to your employee IDs. For example, `ABC`.
                        - Maintain different internal counters for employees and contractors.
                        - Opt for a different prefix for employees and contractors. 
                        - Decide the length of the ID. For example, if the default length is 6, the employee ID, including the prefix and the numbers, is 6.
                    

            

            
> **WARN**
>
> 
>             **Watch Out!**
>             
>             We recommend you do not change the employee ID setup after adding employees.  
>             

         1. Click **CONTINUE** to save the changes.
        
    

## Onboarding

When you someone to your organisation's payroll as an employee or a contractor, Payroll sends them a [welcome email](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md#employee-onboarding). This allows the employees to access the Employee Dashboard on Payroll. 

### Two-Factor Authentication

On the Payroll Dashboard, 2FA is enabled by default for all [user roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/user-roles-workflows.md) except employees. You can enable two-factor authentication (2FA) for your employees and enhance access security. 

    
### What is Two-Factor Authentication (2FA)?

         Two-factor authentication (2FA) is an enhanced security process where access to your organisation's Payroll Dashboard is validated at two levels: 
            - **Authorisation**: During sign in using email id and password.
            - **Authentication**: After sign in, using OTP. 
         The two authentication modes ensure unauthorised members do not access the Payroll Dashboard. 

         2FA provides an additional level of security where it prevents unauthorised access to your Payroll account, stops financial and sensitive data compromises and mitigates other risks. 
            - When you authenticating via email/SMS/authenticator app-OTP, you verify your identity as configured by your organisation. 
            - 2FA is possible using OTPs/passwords sent to your email ids or phone numbers, or via a third-party authenticator app such as Google or Microsoft Authenticator.  
        

To enable 2FA for employees:

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Navigate to **ADMIN OPTIONS** → **Settings**. Click **EDIT** against **Two Factor Authentication** at the bottom.
1. Select the check box for **Enable Two Factor Authentication for employees**. 
    
1. Click **CONTINUE**.

This enables 2FA for all employees. To disable 2FA, clear the check box for **Enable Two Factor Authentication for employees**. 

> **INFO**
>
> 
> **Handy Tips**
> 
> Your employees can choose their preferred mode of authentication. 
> 

### Troubleshooting Login

You can perform the following actions to resolve employees' login issues, if any. 

    
### Mail not Received

         If your employees report [not receiving any email](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md#unable-to-find-email) from Payroll, the following could be the reasons: 

            - **Typos in the email address entered/provided**: 

                In such cases, please check the email address entered. You can ask the employee/s to confirm and update their email address.

            - **Email marked as spam**: 

                The email provider may be blocking emails from Payroll as spam. 
                - Advise your employees to check their spam folders. 
                - The organisation administrators can also re-trigger a welcome email from the employee's profile page.
                - Employee can also visit the [Payroll Dashboard](https://payroll.razorpay.com/dashboard) → click **Forgot password?** to send themselves a password reset email.

            If none of these work, [contact us](mailto:xpayroll@razorpay.com). We will share the password reset link with you directly.

            
> **WARN**
>
> 
> 
>             **Watch Out!**
> 
>             Ensure that you contact us through your registered email address or use your organisation's administrator's email address.
>             

        

    
### OTP Not Received

         In some cases, your employees may report not receiving the OTP at their registered email address due the employee's email id being invalid. 

         To resolve this, change the employee's registered email id. 
         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
         1. Navigate to **People** in the left menu. 
         1. Select and open the employee's profile. Click **EDIT** against **Basic Information**.

            
         1. On the **Edit** page, change your employee's email id in the **Email** text box.
         1. Click **CONTINUE**.

         This resends the onboarding email to the employee post which they can log in to the Payroll Dashboard. [Contact Support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md#razorpayx-payroll) if you face further issues. 
        

    
### Disable Login

         You can control your employee/contactor's access to the Dashboard. Disabling login is useful if there are concerns about unauthorized access or when an employee avails sabbaticals during which they may not access the Dashboard.

            To disable login: 
            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
            1. Navigate to **People** from the left menu. 
            1. In the employee/contractor list, click on the employee's profile whose Dashboard access you must temporarily restrict. 
            1. Click **DISABLE LOGIN**. 

         You have successfully disabled access for that particular employee. 
        

## Download/Export Documents in Bulk

You can download documents such as payslips, reimbursement proofs, investment submission proofs, and employee documents in bulk as a ZIP file from the Payroll Dashboard. 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Navigate to **ADMIN OPTIONS** → **Reports**. 
1. Click the specific report to view and verify the details. 
1. On the specific Reports page, select the relevant option to download/export the report. 
    - For some reports, you can select the date range. 
    - You can also email it to your registered email address. 

    For example, Tax Deductions report is available to download CSV file. Click Export at the top-right corner and select format and mode in the **Download Tax Deductions Report** pop-up modal.

    
     

> **WARN**
>
> 
> **Watch Out!**
> 
> Not all reports are available to download as a CSV.
> 

### Related Information

- [Employees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md)
- [Leaves](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/leaves.md)
- [Attendance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/attendance.md)
- [Payroll Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md)
