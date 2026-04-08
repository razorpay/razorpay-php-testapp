---
title: Set up an Income Tax declaration window in RazorpayX Payroll | RazorpayX Payroll
heading: Tax Deductions Setup
description: Check how to set up and operate declaration and proof upload windows for RazorpayX Payroll.
---

# Tax Deductions Setup

[Income tax declarations and proof submission](https://razorpay.com/payroll/investment-proof-submission/) is a critical payroll activity. Employees declare the investments they have planned for the year and towards the end of the financial year, organisations collect proofs of the declarations and adjust the amounts on which the tax is calculated and deducted.

With Tax Deductions Setup on the Payroll Dashboard, you can set up:

  
   Setup verification settings for your organisation. Explore the [tax verification process](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tax-verifications.md).
   

   
   Set up declaration windows for your organisation.
   

   
   Set up a proof upload window for employees in your organisation.
   

   
   Set up a custom window for specific employees in your organisation.
   

    
### Meaning of Windows

         Declaration and Proof Upload windows refer to a duration where employees can perform declaration or proof upload activites on the Dashboard. 

         It also creates a buffer period for your payroll team to finalise the monthly payroll and tax deductions.
        

## How it Works

To set up tax deductions for your organisation:

1. Enable tax deductions. 
1. Define the tax verifications settings under General Settings.
1. Set up Declaration and Proof Upload windows.
1. Create custom windows as necessary.

## Enable & Set Up

To set up the IT Declaration windows: 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **ADMIN OPTIONS** → **Settings**. 
1. Go to the **Tax Deductions Setup** section. Click **Edit**. This opens the **General** settings page of **Tax Declaration & Proof Upload Settings**.
1. Toggle the setting against **Allow employees to update their tax deductions**. We usually enable this by default. 
    ![RazorpayX Payroll enable Tax Declaration for employees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-tax-declaration-general.jpg.md)

You have now enabled your employees to declare investment proofs. If you turn this setting off, you cannot modify the declaration and window settings. 

## General Settings 

After you [enable the declaration settings](#enable-set-up), you can further modify the following: 

#### Verification Settings 

You can modify the following verification settings on the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 

    
### Opt for Verification

         You can verify the investment proofs your employees submit in two ways. From the drop-down menu, you can select either:
         - **Let XPayroll Verify** to allow Payroll to verify your proofs. 
         - **Let Organisation Verify** to carry out the [verification by yourself](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tax-verifications.md).
        

        
### Select Financial Year

         You can select the financial year for which employees can declare and upload their investment proofs. This is useful to update employees' past/mid-year payroll information. You can select between: 
         - **Let XPayroll choose**. By default, we recommend you allow Payroll to select the year (usually the current financial year) to calculate taxes. 
         - The relevant financial years available in the drop-down menu. 
        

    
### Calculate Tax on Basis Of

         Choose on which basis your organisation calculates employees' taxes. Select either:
         - **Declaration and verified proofs** to calculate tax based on the proofs employees submit. 
         - **Amount declared by employee** to calculate as per their investment declarations only.

         
> **WARN**
>
> 
>          **Watch Out!**
>          
>          For dimissed employees, tax is calculated on the approved amount, not the declared amount. 
>          

          
        

![RazorpayX Payroll Tax Verification Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-tax-declaration-verification-settings.jpg.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> - You cannot choose the [Calculate Tax On Basis Of](#calculate-tax-on-basis-of) if you chose **Let XPayroll Verify** when you [**Opt for Verification**](#opt-for-verification).
>     - Payroll updates the Calculate Tax on Basis Of setting to **Amount declared by employee** after completing the verification process.
> - You can choose your organisation's [Proof Upload Window](#proof-upload-window) only if you choose **Let Organisation Verify** when you [**Opt for Verification**](#opt-for-verification). 
> 

#### Auto-Open Window & 80G Settings

You can choose to automatically enable the proof upload window for new joiners or dismissed employees on the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 

    
### Auto-Open Window for New and Dismissed Employees

         You can automatically open the investment declaration window for new joiners and auto-enable the proof upload window for dismissed employees awaiting their Last Working Day (LWD). To enable this: 

         1. Select the toggle against **Auto open declaration window for new employees**. 
         1. Enter the **Number of days** in the text box until the declaration window remains open. 

         For dismissed employees, the investment proof upload window automatically opens when you dismiss the employee. It remains open until the employee's LWD. 

         
         
> **WARN**
>
> 
>          **Watch Out!**
>          
>          Payroll does not verify the proofs for employees dismissed between April and December as it falls outside Payroll's proof verification period. 
>          
>          This applies to both the options in the [**Opt for Verification**](#opt-for-verification) settings.
>          

        

    
### Disable 80G

         You can enable the setting to disable employees' 80G contributions. Select the toggle against **Disable 80G**. 
         
         In such cases, the employee must individually declare their 80G contributions when they file their taxes in July. 
        

![RazorpayX Payroll Auto-open Windows Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-tax-declaration-auto-open-settings.jpg.md) 

## For Employees 

Employees can declare their provisional investments and upload investment proofs via the [IT Declarations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees/declarations.md) page. We communicate the window availability to your employees via email. 

### Related Information

- [About Statutory Compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md)
