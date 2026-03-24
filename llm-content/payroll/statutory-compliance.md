---
title: Manage Statutory Compliance in RazorpayX Payroll
heading: About Statutory Compliance
description: Understand the compliance setup and deduction process from employee's payroll in Payroll.
---

# About Statutory Compliance

Statutory compliance regulations are government mandated legal arrangements that a company and its employees adhere to. Every organisation that pays salaries to the people it has employed is bound by these laws. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Automated Professional Tax (PT) payments for employees in Karnataka are temporarily unavailable on Payroll. Know more about the [PT rule change](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#professional-tax).
> 

On Payroll, you can automate registering your employees for compliances and payments (except  [Provident Fund (PF)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#pf-payments)). We do not handle registrations for organisations. Talk to [these CA partners](#initiate-initial-registration-for-organisations) to start the initial registration.

    
### Compliance Payments Features that Payroll Handles

         Payroll helps you automate all the operational parts of compliances. With Payroll, you get access to:
            - [PF UAN registration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md), register management, monthly payments and filings.
            - [ESI IP registration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/esi.md), register management, monthly payments and filings.
            - [TDS payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md) and Quarterly filings (24Q).
            - One-Time [Tax Documentation Verification](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tax-deductions-setup.md) in January along with TDS Payments and Quarterly Filings (24Q).
            - [Form 16](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md#employee-s-form-16) generation at the end of the year.
            - [26Q filings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md#file-tds-return), if enabled, and all contractors payments made via the platform.
        

    
### Compliance Payments that Payroll DOES NOT Handle

         RazorpayX Payroll does not offer the following:

            - Company registrations for compliances like PF, PT, ESIC.
            - Bulk registration requests of any kind. 
            - LWF payments and filings.
            - Salary Structuring or HR services.
            - PF transfers, withdrawal management, and so on.
            - Assistance with ESI claims.
            - TDS correction filing.
            - Representation services of any kind.
            - Nil filing entries. 
        

    
### Initiate Initial Registration for Organisations

         Payroll automates the payments and the filings. We **do not** help with the initial company registration. 

         However, few CA partners who use Payroll to manage their clients on our platform can help you register your organisation for compliances. Their contact details are provided below:

            
            CA firm Name | Website
            ---
            Startup-Movers | [startup-movers.com](https://www.startup-movers.com/)
            ---
            TaxMantra | [taxmantra.com](https://taxmantra.com/)
            ---
            QED Corporation | [qedcorp.co.in](http://qedcorp.co.in/)
            ---
            StartersCFO | [starterscfo.com](https://starterscfo.com/)
            ---
            Jain Ambavat & associates | [mumbaica.com](http://mumbaica.com/)
            ---
            

            You can add your CA partner as a [Contractor](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart.md#add-all-employees) who has [special access](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#special-access-and-permissions) to your Payroll account. 

            Your partners then receive a [welcome email](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#welcome-mail-from-xpayroll) and will be able to login and access relevant sections of the platform as you choose.
        

## Prerequisites

To ensure timely compliance payments, ensure you update all the required credentials under
**Company Details** ➔ **External Credentials** [during account set up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart.md). Ensure you have updated your credentials post TIN implementation.

## Compliance Payments 

Payroll automates the following compliance payments:

    
### Tax Deducted at Source (TDS)

         Tax Deducted at Source, or simply TDS, is deducted from salary and one-time payments as applicable. Know more about [filing TDS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md) with RazorpayX Payroll.
        

    
### Provident Fund (PF)

         Payroll handles all the monthly payments, filings, and employee registration after the initial registration is complete. However, it does not offer initial registration for [Provident Fund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md).
        

    
### Employees State Insurance (ESI)

         Employees State Insurance (ESI) is a government-mandated health insurance for employees. We handle the register management, monthly payments and filings. Know more about [ESI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/esi.md). 
        

    
### Professional Tax (PT)

         Payroll only handles the tax payments and filing monthly returns, and does not handle the initial registration. Individual state governments have website portals to manage Professional Tax (PT) and you have to register accordingly. 

         Know how to set up and handle [Professional Tax in Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/professional-tax.md). 
        

    
### Labour Welfare Fund (LWF)

         Labour Welfare Fund (LWF) is a statutory welfare fund. Many organisations mandatorily contribute to LWF across 16 states (Andhra Pradesh, Chandigarh, Chhattisgarh, Delhi, Goa, Gujarat, Haryana, Karnataka, Kerala, Madhya Pradesh, Maharashtra, Odisha, Punjab, Tamil Nadu, Telangana, West Bengal) in India.
         
         It provides socio-economic benefits such as housing, nutrition, healthcare benefits and more for certain eligible workers.

         On the Payroll Dashboard, you can set up LWF at an organisation or employee level.

         
            
                Organisation Level Configuration
                
                    To enable LWF for all employees: 
                    1. Log in to the Payroll Dashboard.
                    1. Navigate to **ADMIN OPTIONS** → **Company Details**.
                    1. Click **Edit** against **Provident Fund / ESIC / Professional Tax / LWF**.
                        ![specific and meaningful image title](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-lwf-org-enable.jpg.md)
                    1. Go to the **LWF Status** section and select **Enable** from the drop-down menu. 
                        ![Razorpay Payroll enable LWF for org](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-lwf-enable.jpg.md)
                    1. Click **Continue**.

                    This successfully enables LWF for your organisation. You can also choose to include employer's LWF contribution in the employee when setting up/modifying employee's CTC. 

                    1. On the Payroll Dashboard, navigate to **ADMIN OPTIONS** → **Settings**.
                    1. Click **Edit** against **Payroll and Compliance Setup**. 
                    1. In the **LWF Settings** section, select the **Include employer contribution to LWF in employee CTC** check box.
                        ![Select check box to include employer contribution on Razorpay Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-lwf-employer-contri.jpg.md)
                    1. Click **Continue**.

                    This successfully makes employer's LWF contribution a part of the employee's CTC. Ensure you set up [employee's salary structure](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md#setup-salary-structure) accordingly. 
                

            
### Employee Level Configuration

                    You can configure employee-level LWF settings as well. 

                    1. Log in to the Payroll Dashboard.
                    1. Navigate to **People** in the left menu and go to the particular employee's profile.
                    1. Go to **Provident Fund, Professional Tax, ESI, LWF & NPS** and click **Edit**.
                        ![Razorpay Payroll employee compliance LWF Edit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-lwf-employee-enable.jpg.md)
                    1. Go to the **LWF Settings** section and select the following from the drop-down menu: 
                        1. **LWF Status** as **Enabled/Disabled**.
                        1. **LWF Location** as **Use Company Default** or the specific state.

                            ![Razorpay Payroll LWF Employee enable](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-lwf-employee-enable-location.jpg.md)
                    1. Click **Continue**.

                    This successfully saves your employee-level LWF settings.
                

         
        
    

### Payment Due Dates 

Following is the list of due dates by when you must make the compliance payments. Ensure you execute payroll before the [Payroll due dates](/payroll/execute-payroll/#5-check-due-dates).

Compliance Payment | Due Date
---
TDS* | 7th of the following month
---
PF | 15th of the following month
---
ESI | 7th of the following month
---
PT** | 15th - 31st of the following month

* For March specifically, the due date is April 30 of the following month.

** **For PT Payments**: 
- Automated Professional Tax (PT) payments for employees in Karnataka are [temporarily unavailable](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#professional-tax). 
- For Professional Tax payments, due dates depend on the respective Indian state's due dates for PT. Some states require annual/half-yearly/quarterly filing. We defer PT payments until the due date in such cases.

> **INFO**
>
> 
> **Handy Tips**
> 
> - All the compliance payments are made before 15th of the following month (15th or 20th in case of Professional Tax). 
>     - You can find the TDS challans under **Reports** → **TDS**.
>     - For PF, ESI, and PT, navigate to **Reports** → **Provident Fund, ESI & Professional Tax**.
> - We display all compliance payments individually for all employees and contractors. Payroll does not file nil returns. 
> 

### For Contractor Payments

For Contractor Payments, the due date is 7th of the following month based on whether the invoice or the contractor payment was earlier. For example, if you make a contractor payment for an invoice dated January 10, we make the TDS payment by February 7. 

If invoice date is missing, we calculate the TDS payment date using the contractor payment date.

## Check Compliance Payments

After every payroll execution, check whether Payroll has made a deduction for any compliance. To check this:

1. Log in to your Payroll Dashboard.
1. Navigate to **Reports** → **Ledger**. 
1. Check the **Status** column in the ledger report.
    - If the status is **Success**, then the payment has already been made. 
    - If the status is **Pending**, then the payment is yet to happen.

In the Ledger Report section, Payroll displays all compliance payments individually for all employees and contractors. If there are no entries here, it means that Payroll has not made any such deductions.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payroll sometimes makes the payment before the due date.
> 

### Related Information

- [ESI: Full form, Registration Process, and Eligibility](https://razorpay.com/payroll/learn/esi-full-form-registration/)
- [Enable Compliance during Account Setup](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#welcome-mail-from-xpayroll)
- [Provident Fund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md)
- [TDS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md)
- [ESI Meaning, Eligibility and Registration](https://razorpay.com/payroll/learn/esi-full-form-registration/)
