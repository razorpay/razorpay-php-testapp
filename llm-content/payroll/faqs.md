---
title: RazorpayX Payroll | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about RazorpayX Payroll.
---

# Frequently Asked Questions (FAQs)

- **Manage Tax Proofs Verifications**: Explore tax proofs verifications guidelines.

 - **2FA on PF Payments**: Explore FAQs about 2FA implementation on PF.

   - **2FA on Karnataka PT Payments**: Refer to FAQs about 2FA rule on Karnataka PT.

   - **TDS Filing**: Check when the TDS Returns are filed.

   - **Challans**: Explore when challans are available on the Payroll Dashboard.

   - **TDS Charges**: See how TDS is calculated on payroll payouts.

## Payroll APIs

To view the APIs, follow the links.

 
   

## Quick Links

Explore the quick links as available on the Payroll Dashboard.

    
### How do I setup a Custom Salary Structure?

         You can setup two types of custom salary structures:
            - Custom salary structure for the organisation.
            - Custom salary structure for a specific employee.
        
            Know more about [Custom Salary Structure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md#custom-salary-structure).
        

    
### Are there any best practices to note before I execute payroll?

         You can refer to the [Execute Payroll checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/execute-payroll.md).
        

    
### How can I make one-time payments?

         Refer to the steps on how to create [one-time payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/one-time-payments.md#make-one-time-payments).
        

    
### Can I revise salaries in bulk?

         Yes, you can [bulk revise salaries](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#revise-salary) on the Payroll Dashboard.
        

    
### How do I upload additions, deductions and Loss of Pay in bulk?

         You can use the [bulk upload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#bulk-upload) feature to pay and deduct additions, deductions and loss of pay.
        

    
### When will Payroll pay my ESIC/PT/PF/TDS dues?

         You can refer to the [Compliance payments due dates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md#payment-due-dates).
        

## Account & Settings 

    
### 1. Why was my Payroll account deactivated?

         Your account may be deactivated due to inactivity for an extended period. We hibernate your account if you have not used Payroll to [finalise and execute payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md) for an extended period of time.
        

    
### 2. Can I reactivate my Payroll account?

         Yes, you can reactivate your Payroll account. [Contact support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/plans.md#contact-support) with the reason for your inactivity and the plan for future Payroll usage to reactivate.
        

        
### 3. Is it mandatory to use the core payroll module in Payroll?

         Yes, it is mandatory. You can use other payroll modules such as Leave and Attendance, Resignation, Bonus and more in addition to the core payroll module. Core payroll includes finalising and executing payroll. Know more about [Executing Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md).
        

        
### 4. Can I use supplementary modules without using core payroll?

         No. You must use the core payroll module to access supplementary modules such as Bonus, Attendance, and more.
        

    
### 5. How do I provide additional permissions to my HR/Operations/Finance team members?

         You can set up user roles to create permissions and provide or restrict access to certain modules on the Payroll Dashboard. 
         
         For example, you can create a user role: `Human Resource`, configure permissions for the user role and assign it to employees. The assigned employee/s start to have access to the permitted Payroll modules.
         
         Know how to [create, edit and manage user roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/user-roles-workflows.md). Navigate to **Settings** → **User Roles** on the Dashboard.
        

    
### 6. How can I create approval workflows for one-time payments and reimbursements?

         Currently, you cannot create approval workflows for one-time payments and reimbursements. You can check the [available approval workflows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/approval-workflow.md#available-workflows).
         
         You can instead [create user roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/user-roles-workflows.md) and assign it to your team members.
        

## Payroll Payouts 

    
### 1. We processed the salaries and the payments are still In Progress. What do we do now?

         
         If your payment status shows `In Progress`, it means that Payroll is awaiting payment confirmation status from the bank.

         Please wait for confirmation from the bank. You can also check the status in the **Ledger** on the Payroll Dashboard. Know more about the [payment status](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#check-payment-status) and the [Payout modes and TAT](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#payout-modes-and-tat). 
        

    
### 2. We processed the salaries. The payment status is successful but is yet to be credited to my employees. What to do now?

         If your payouts are processed successfully, yet the amount is not credited, please wait for 3 days for the payment to reflect in the employees' accounts.  

         You can retry the payment from **Reports** → **Ledger** on the Payroll Dashboard after 3 days. Know more about [Payment Statuses](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#no-credit-after-payment-success). 
        

    
### 3. How long does Payroll take to process payments? By when should we prepare the monthly payroll for execution?

         Refer to the [fund credit timelines](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#fund-credit-timelines) to understand how long Payroll takes to process salary payments. You can also check the [Payment Statuses](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#no-credit-after-payment-success). 

         Payroll automates the monthly payroll calculations, so you need not manually prepare the monthly payroll. However, we recommend you execute payroll before the [Payroll due dates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/execute-payroll.md#5-check-due-dates). 
        

    
### 4. Can we reverse salary payments after execution?

         No, it is not possible to reverse salary payments after you execute payroll. Know why we restrict [payroll modification](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/exceptional-cases.md#modify-salary-after-payroll-is-executed) after execution.

         You can instead add arrears or create deductions in the upcoming payroll activity. Know more about [payroll additions and deductions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#additions-and-deductions).

         Ensure you follow the [Execute Payroll checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/execute-payroll.md) before executing payroll for employees.
        

    
### 5. How long does it take for employees to receive their salary post execution?

         It takes up to 8 hours for salaries to reflect in the employees' bank accounts. Know more about [fund credit timelines](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#fund-credit-timelines). 
        

    
### 6. How can I reverse one-time payments?

         It is not possible to reverse one-time payments. 
        

### Fund Loading, Transfer, Account Balance

Transferring funds to your Payroll account updates your Payroll balance. Know more about [fund transfer and payroll payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#transfer-funds) in Payroll.

    
### 1. When will Payroll update my account balance after I transfer funds?

         Payroll takes up to 24 hours to identify a successful fund transfer transaction and update your Payroll account balance. This is due to the dependency on the banking systems.
        

    
### 2. How do I know if my fund transfer transaction is unsuccessful? Why was it unsuccessful and how do I resolve it?

         We inform you the transaction status through your registered email.

         Fund transfers may be unsuccessful or delayed due to the following reasons: 
         - You transferred the funds on a non-working day such as on bank holidays or Sundays.
         - You transferred funds from a non-whitelisted bank account source. Fund transfer is only possible via validated accounts. 
         - Your bank account details could be incorrect.

         Know more about [fund transfer failure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#funds-not-updated). 

         To resolve this, retry the payment using the steps mailed to your registered email address.
        

    
### 3. We transferred funds to the Payroll account today and the payroll execution date is tomorrow. Will my transactions be successful?

         Your transactions are successful **with a delay**. It takes up to 24 hours for the transferred funds to reflect as balance on your Payroll account.

         To ensure timely payroll payouts, you must transfer funds at least 24 hours before you execute payroll.
        

    
### 4. Can we process salary on non-working days or banking holidays?

         While IMPS works on all days of the week, we highly recommend that you do not process employees' salaries on non-working days or banking holidays to reduce the risk of delayed payments. 
         
         Know more about [payroll payout modes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#modify-default-payout-mode).
        

    
### 5. Is there minimum or a maximum limit when transferring funds to my Payroll account?

         No, there is no minimum or maximum limit for transferring funds. 
        

    
### 6. We are unable to transfer the funds from our Axis account to Payroll's Axis account available on the Dashboard. The account number says it is invalid. How to resolve this?

         It is possible you encounter errors while transferring funds from your personal/corporate Axis account to Payroll's Axis account. Follow the given steps to troubleshoot:
            1. On this Axis netbanking portal: 
                - Select **Other Bank Payees** instead of **Axis Payees** if you use Axis Bank's Corporate Banking portal. 
                    ![Axis corp banking Payroll fund transfer resolution](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-axis-crbanking-fix.jpg.md)
                - Select **Other Bank** under **Payee** if you use Axis Bank's Retail Banking portal.  
                    ![Axis retail banking Payroll fund transfer resolution](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-axis-retailbanking-fix.jpg.md)

                    
> **WARN**
>
> 
>                     **Watch Out!**
>                     
>                     You can transfer funds to Payroll only via Netbanking.
>                     

                    
            1. Enter the account number and IFSC available on the **Money Transfer** page to add funds. You can transfer the funds to your Axis account between 1:30 am-9:30 pm. Know more about [fund transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#transfer-funds).
        

## Compliance Payments 

Following are the frequently asked questions about compliance payments.

    
### 1. What happens when I disable compliance payments settings on the Payroll Dashboard?

         When you [disable compliance settings](#2-where-can-i-modify-the-compliance-payments), you disable Payroll from automating the compliance deductions. 

         For example, an employee contributes ₹2,000 towards ESIC (total of employee and employer's contribution). 
         
         If you clear the ESI setting check box, you are disabling Payroll from making the ESI payments automatically to the ESIC. 
         - The ESI deduction continues to appear on the employee's payslip to maintain payroll and payslip accuracy.
         - Payroll does not deduct the ESI contribution when you execute payroll.
         - You must pay the statutory dues to the respective compliance departments (ESIC here) manually and externally.
        

    
### 2. Where can I modify the compliance payments settings for my organisation?

         To modify compliance payments settings:
            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            1. Navigate to **ADMIN OPTIONS** → **Settings** → **Payments & Compliance Setup** → **Edit**.
            1. Clear the relevant check boxes in the **Compliance Payments Settings** section.

                Due to [PF 2FA](#pf-payments) applicability, Provident Fund (PF) is automatically cleared.
                ![Compliance Payments Setting section Clear checkboxes Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-compliance-settings-disable.jpg.md)

            You have successfully disabled Payroll's automatic deduction of compliance payments. 
            
            Ensure you make the compliance payments externally with the respective departments [on time](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md#payment-due-dates) to avoid government notices and penalties.
        

    
### 3. I have disabled compliance payments for my organisation. Does Payroll deduct the money required to make compliance payments from my account balance?

         No, Payroll does not deduct any amount from your account balance towards compliance payments as you have disabled compliance payment settings. You must make the payments manually and externally.
        

    
### 4. Why do compliance payments deductions appear in my employees' payslips even after I have disabled them on the Dashboard?

         The compliances continue to appear on your employees' payslips as the payments are mandatory for employees. After disabling compliance settings, it is your responsibility to make the compliance payments [on time](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md#payment-due-dates).
        

### Professional Tax 

    
### 1. Why has Payroll temporarily paused automated Professional Tax payments for Karnataka employees?

         The Karnataka government has introduced 2 Factor Authentication (2FA) which mandates OTP verification from the organisation's administrators. As a result, Payroll is unable to automate PT payments for Karnataka-based employees.
        

    
### 2. Does the PT 2FA rule apply to employees not located in Karnataka?

         No, the PT 2FA rule change applies only to employees in Karnataka. Payroll will continue automatically making PT payments on the respective due dates for the rest of the states.
        

    
### 3. Will Payroll continue to make TDS and ESIC payments?

         Yes, TDS and ESIC payments are unaffected. Know more about the [compliance payments due dates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md#payment-due-dates). 
        

    
### 4. Do I need to register employees on the PT portal?

         No, you need not register your employees on the PT portal. You only need to make the PT payments before the due date.
        

    
### 5. How can I check the amount I must pay as Professional Tax?

         To check the PT amount payable to the Karnataka government: 
         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
         1. Navigate to **ADMIN OPTIONS** → **Reports** in the left menu.
         1. Click **Salary Register**.
         1. Use the **PT Location** filter to list the employees whose PT payments you must make. 
         1. Scroll horizontally against the employees' names to view the PT amounts.
            ![Payroll Dashboard PT payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-professional-tax-update.jpg.md)
         
         The amount mentioned in the **PT** column is the PT amount payable to the government.
        

    
### 6. I have already executed the payroll for the month. Will Payroll process my PT payments for Karnataka-based employees?

         No, Payroll is unable to process PT payments for Karnataka-based employees. We refund the PT amount to your Payroll wallet. You must make the PT payments for your employees.
        

    
### 7. By when must I make the Professional Tax payments?

         Ensure you make the pending PT payments to the Karnataka government by 20th of the month. Know more about the [compliance payments due dates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md#payment-due-dates).
        

    
### 8. How can I make the PT payments for my employees based in Karnataka?

         You must [manually make PT payments for Karnataka-based employees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/professional-tax.md#pt-payment-for-karnataka-employees).
        

### PF Payments

    
### 1. When is Payroll resuming automated PF payments?

         Starting February 2025, Payroll has resumed making PF payments for your employees. You no longer need to manually register employees and make PF payments.
        

    
### 2. How is the payroll amount calculated for PF since the 2FA rule change is in effect?

         Note that as of February 2025, Payroll has resumed automated registration and PF payments for employees.

         When you finalise payroll, the amount displayed on the **Run Payroll** pages does not include the PF payments you are yet to make to the EPFO. 
         
         However, your employees' net pay/in-hand salary is paid after considering the PF deductions.

         For example, consider the following: 

            
            Term | Amount
            ---
            Employee's Gross Pay | ₹1000
            ---
            PF Deduction | ₹100
            ---
            Employee's Net Pay (Gross - Deductions) | ₹900
            
         
         The amount displayed on the **Run Payroll** page is ₹900 * the number of employees. The ₹100 is excluded on the **Run Payroll page**, but continues to appear on the employees' payslip as a PF deduction. This is in place due to the PF rule change. 

         In such cases, the following are applicable: 
         - You can load ₹900 (multiplied by the total number of employees) into your Payroll wallet to process the monthly payroll. 
         - You must remit the ₹100 to the EPFO (due to Payroll temporarily pausing automated PF payments). Follow the steps to [make PF Payments via EPFO](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md#make-pf-payments-on-epfo).
         
         We maintain the above calculation to generate accurate payslips for your employees.
        

    
### 3. Why was automatic PF payments via Payroll Dashboard temporarily paused?

         Payroll uses your EPF login credentials to automate PF registration and payments for employees. This was paused due to mandatory 2FA during EPF login.

         However, as of Feb 2025, Payroll has resumed employee PF payments. You no longer need to make manual payments.
        

    
### 4. How do I make PF payments for my employees?

         Note that as of February 2025, Payroll has resumed automated registrations and PF payments for employees. You no longer need to manually make PF payments for your employees. 

         You can download the PF ECR file from the Payroll Dashboard and make the PF payments directly via the EPF portal. 
         - PF ECR files are available on the Payroll Dashboard from the 5th of the following month. 
         - Navigate to **Run Payroll** and click **here** in the **Urgent: PF payment is pending** warning. 

         Know how to [make Provident Fund payments via EPFO](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md#register-employees).
        

    
### 5. What is the due date for PF payments?

         The due date for employees' PF payments is the 15th of the following month. For example, September 15, 2024 is the PF payment due date for August.
        

    
### 6. Where can I download the PF ECR file?

         You can download the PF ECR file from the [Payroll Dashboard](https://payroll.razorpay.com/run-payroll). Know more about making [PF payments on the EPFO portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md#1-download-pf-ecr-txt-file).
        

### ESIC 

    
### 1. Why did ESIC registration for some of my employees fail? Where can I check the failure reasons and next steps?

         ESIC registration for your employees may fail due to insufficient employee data. 
         
         To check the failure reasons: 
         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
         1. Navigate to **ADMIN OPTIONS** → **ESIC Registration Report**.
         1. On the **ESIC Registration Report** page, check the **Remarks** column to understand the failure reasons.
        

### Challans

    
### 1. Where can I download my ESIC, PF, PT challans from?

         To view ESIC, PT, PF challans:
         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
         1. Navigate to **ADMIN OPTIONS** → **Reports** → **Provident Fund, ESI & Professional Tax**.
            ![Challans PF, PT, TDS, ESI on Razorpay Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-reports-challans.jpg.md)
         1. On the **Compliance Documents** page, click the attachments under the respective compliance columns to download them.
        

    
### 2. Where can I view my TDS challans on the Payroll Dashboard?

         TDS challans are available in **ADMIN OPTIONS** → **Reports** → **TDS** on the [Payroll Dashboard](https://payroll.razorpay.com/reports/tdsPayments). 
        

    
### 3. When are the challans for compliance payments available on the Payroll Dashboard?

         Challans for all the compliance payments are available by 28th of the current month on the [Payroll Dashboard](https://payroll.razorpay.com/). 
        

    
### 4. I am unable to view my TDS challans on the Dashboard. How do I resolve this?

         TDS challans could be unavilable due to incorrect IT credentials provided on the Payroll Dashboard. As a result, Payroll is unable to fetch the challans. 

         To rectify, [update your Income Tax portal credentials](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart.md#enable-compliances) on the Payroll Dashboard. 
        

### TDS & charges

    
### 1. What is the TDS impact on the Razorpay charges we paid?

         You need not pay TDS on Razorpay charges unless the charges are more than ₹30,000. If Razorpay charges are more than ₹30,000, you can deduct TDS using Payroll, or pay it manually. 

         Know more about [TDS Charges](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md#tds-for-razorpay-charges ).
        

    
### 2. Will my TDS deduction increase if I pay bonus to my employees?

         Yes, your TDS increases as providing a bonus is an addition to the employee's salary. Know how bonus on top of salary affects TDS and how [treats such additions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md#tds-on-bonus).
        

    
### 3. We received a notice from TRACES with the subject 'Regular Statement filed is processed with defaults and/or PAN errors u/s 200A.' Why did we receive this and what needs to be done?

         You receive such an email when you file returns against an inoperative PAN of the employee/contractor. Due to an inoperative PAN, TDS is deducted at 20%. To verify this, download the Justification Report from the TRACES portal. 

         Payroll does not support revised filings. Please log in to the TRACES portal and rectify the TDS excess/shortfall.
        

### Form 16 

    
### 1. When will my employees get the Form 16?

         Employees receive their Form 16 after the end of the financial year, around June. Know more about [Form 16](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md#form-16-16a). 
        

    
### 2. Where do we see the Employees Form 16 once it is available?

         We mail the unsigned Employee Form 16s to your employees' email ids. 
         
         However, we can mail your employees only if Payroll handles your 24Q filing. This is usually enabled by default for all organisations. You can check if you have enabled 24Q under **Settings** → **TDS Filing Setup** on the Payroll Dashboard.
        

    
### 3. Do we get the Contractors Form 16A through Payroll?

         No. Payroll does not provide Form 16A by default. You can [contact Payroll Support](mailto:xpayroll@razorpay.com) to request Form 16As and mention the following in your email: 

         - The Contractor's name and PAN. 
         - The quarter for which you need the Form 16A. 

         However, you can request Form 16A only if you have used Payroll to pay your contractors and file 26Q returns. Know more about [Form 16A](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md#tds-for-contractors).
        

## Bonus

    
### 1. How can I pay bonuses to my employees?

         There are three ways in which you can pay bonuses to your employees: 
         - Use the [Bonus module](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/bonus.md). 
         - Make [One-time payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/one-time-payments.md#make-one-time-payments) for bonus payouts.
         - Add bonus as an [addition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#additions) to the monthly salary.
        

    
### 2. How can I pay an instant bonus to employees?

         You can [make one-time payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/one-time-payments.md#make-one-time-payments) to pay an instant bonus to your employees. 
        

    
### 3. The Bonus Type drop-down menu is empty. How to resolve this?

         The Bonus Type drop-down menu can be empty when you have not configured the types of bonuses applicable for your organisation. 
         
         Ensure you [set up the bonus types](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/bonus.md#setup-bonus-types) on the Payroll Dashboard before you create a bonus for an employee.
        

    
### 4. Can I make bonus payments in bulk?

         Bulk bonus payments depend on whether the bonus payment has a clawback rule.
         - If the bonus does not have a [clawback rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/bonus.md#2-add-clawback-rule), you can use the [bulk additions template](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#bulk-upload).
         - If the bonus has a clawback rule, you cannot make bonus payments in bulk.
        

    
### 5. If I pay a bonus to my employees, will it affect PF, ESI, PT or TDS calculations?

         Yes, paying a bonus can impact ESI, PT and TDS calculations, depending on how it is processed. However, PF deductions remain unaffected.

            **Provident Fund (PF)**
            - Bonuses are not included in PF wage calculations, so paying a bonus will not affect PF deductions. Even if you process the bonus as a one-time payment or as an addition to monthly salary, it will still not impact PF unless the structure of Basic + DA changes.

            **Employee State Insurance (ESI)**
            - ESI is calculated on gross earnings, including fixed salary and certain allowances. By default, bonus payments (whether one-time or as an addition) do not affect ESI deductions.

            - However, if you want bonuses to be included in ESI wage calculations:
    
                1. Log in to the Payroll Dashboard.  
                2. Navigate to **Settings** → **Payments & Compliance Setup** → **ESI Setup** in the left menu.  
                3. Check the option **Include Payroll Additions & One-Time Payments in ESI Wages**.

            - If this setting is enabled, the bonus will be included in ESI wages, which may increase the ESI deduction.

            **Professional Tax (PT)**
            - PT is calculated based on state-specific salary slabs. Since PT is derived from gross salary, adding a bonus (as a one-time payment or monthly addition) can increase the gross salary, which may push the employee into a higher PT slab, leading to a higher PT deduction.

            - The impact of bonuses on PT varies from state to state, so it’s essential to check the PT rules applicable in the respective state.

            **TDS**
            
            - TDS is [deducted on bonuses](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#2-will-my-tds-deduction-increase-if-i) as per tax slabs, and it can increase the employee’s overall tax liability. 

        

## Leaves 

    
### 1. Our leaves are carried forward to the next financial year even if we did not configure that. Why?

         By default, Payroll automatically carries forward the unused paid time off (PTOs) to the next financial year. 

         To modify or remove carrying unused leaves forward to the next year, refer to the [Leave Setup Steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/leaves.md#configure-leave-setup) and configure it to 0/none. 
        

## Salary 

    
### 1. Payroll's Loss of Pay calculation is not matching with our calculation. Why?

         If LOP days do not match your calculations, it may be because LOP is calculated using total working days in the month instead of the total number of days in the month. Know more about [LOP Calculations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#calculations). 
        

    
### 2. Is my employee's personal email address necessary when processing Full and final settlement?

         We recommend adding the employee's personal email address as an alternative mode of communication. 
         
         We email the necessary documents such as payslips, relieving letter, Form 16 and more to your employee's personal email id.
        

    
### 3. What are the supported payment modes to process an employee's FNF?

            We support NEFT and IMPS to process the employee's full and final settlement. However, we recommend using NEFT as the default payment mode. Know more about [payroll payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#make-payroll-payouts).
        

    
### 4. Is it possible to revise salary in bulk?

         Yes, you can revise salary in bulk. Know more about [bulk salary revision](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#bulk-revision).
