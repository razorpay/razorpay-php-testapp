---
title: Check Professional Tax Management in RazorpayX Payroll
heading: Professional Tax (PT)
description: Set up, pay and check Professional Tax (PT) payments on RazorpayX Payroll.
---

# Professional Tax (PT)

Professional Tax (PT) is a state-level, mandatory tax levied u/s 16 of the Income Tax Act, 1961. It varies between states and applies to all earning individuals regardless of their profession, trade or employment in India. 

Payroll seamlessly handles professional tax deductions for your employees based on the state in which you are registered. Know how you can set up and check payment records in Payroll.

> **WARN**
>
> 
> **Watch Out!**
> 
> Automated Professional Tax (PT) payments for employees in Karnataka are temporarily unavailable on Payroll. Know more about the [PT rule change](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#professional-tax).
> 
>    You must make Professional Tax payments [via the e-Prerana portal](#pt-payments-via-pt-portal) for Karnataka employees after processing the monthly payroll.
> 

## Set Up PT

Payroll only handles Professional Tax (PT) payments and filings, not the initial registration. Know more about the people and resources available for [initial registration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md#initial-registration).

    
### Set up Professional Tax (PT) Payments and Filings

         To set up PT payments for your organisation: 

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
            1. Navigate to **ADMIN OPTIONS** → **Company Details**. Here:
                1. Go to **Provident Fund / ESIC / Professional Tax / LWF** → **Edit**. 
                1. Select **Enabled** from the **PT Status** drop-down menu and click **Continue**.
                    
                1. On the **Company Details** page, go to **External Credentials** → **Edit**.
                1. Go to the **PT** section and update the credentials to the PT portal of your registered state.
            1. Go to **Settings** → **Payments & Compliance Setup** and enable PT Payments and Filings.
                
        

You have successfully set up PT for your organisation. 
- Know more about [enabling compliances](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart.md#enable-compliances).
- If PT is disabled under **Company Details** → **Provident Fund** / **ESIC** / **Professional Tax**, it is not deducted for any employee.

## Manage PT

On the Payroll Dashboard, you can check and modify the PT settings for your organisation and review PT payments.

    
### Home State PT Deduction

         By default, when you add a new employee, they get added to the same state as your organisation. If PT applies to your state, it is also automatically enabled for the employee.  

            PT is not deducted automatically for employees who are not in the home state.

            - If you are registered for PT in that employee's state, enable PT for that employee. 
                1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
                1. Go to the particular employee's profile. 
                1. Edit the **Provident Fund, Professional Tax & ESI** section and enable PT.
            - If you are not registered for PT in that employee's state, you can: 
                - Change the employee's location to your home state in Payroll. In this case, PT is deducted as per your state's policy. 
                - Keep the employee's current location/state as is. PT will not be deducted for them.
        

    
### PT Deduction

         To check whether PT is being deducted for your employees:
            1. Log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            1. Go to **Reports** → **Salary Register**. 
            1. Look for PT as a **column** and ensure deductions are showing up for all employees. 

            When you finalise the payroll for that employee, click on the Payroll Amount and ensure PT is visible as a **row**.
        

    
### PT Payment

         Professional Tax payment and filing is done between the 15th and 31st of the following month, depending on the state. Until then, it remains in the `pending` state. To check the PT payment status:

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
            1. Navigate to **Admin Options**.
            1. Go to **Reports** → **Ledger**. A filter view screen appears.  
            1. Select filter **Type** and choose **Professional Tax**. 

            After payment, you can find the challans under **Reports** → **Provident Fund, Professional Tax & ESI**.
        

## PT Payment for Karnataka Employees 

The Karnataka government has introduced 2-Factor Authentication (2FA) when logging into the PT portal, effective September 2024. Due to this, Payroll is unable to automate PT payments. 

You must manually make PT payments for your employees. Ensure you make the PT payments before October 20, 2024.

#### PT Payments via PT Portal

Watch the video below or read along.

There are three steps to make PT payments: 

    
### List Employees with Pending PT Payments

         Your organisation may have employees from multiple locations. Use the filter option to list the employees located in Karnataka. This is a prerequisite step.

         To check the list of employees as well as the amount payable: 
 
         1. Log in [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
         1. Navigate to **ADMIN OPTIONS** → **Reports** in the left menu.
         1. Click **Salary Register**.
         1. Use the **PT Location** filter to list the employees whose PT payments you must make. 
         1. Scroll horizontally against the employees' names to view the PT amounts.
            
         
            The amount mentioned in the **PT** column is the PT amount payable to the government. 
         1. Click **Download CSV**.

         This downloads the salary report for the month. Filter the **PT Location** as Karnataka in the file and calculate the total amount payable for the number of employees whose PT payments are pending.
        

    
### 1. File e-Return

         To file the e-Return: 
         1. Log in to the Karnataka PT e-Prerana portal.
         1. Enter the OTP and authenticate your access to the portal. 
         1. Click **File Return**.
                
         1. Select the **Return Entry** details from the respective drop-down menus. This includes: 
            - **Return Period Type:** Annual/Monthly.
            - **Month:**
            - **Year:**
            - **Return Type:** Original/Revised

                
         1. Click **NEXT**.
         1. In the new table displayed on-screen, enter the number of employees with pending PT payments in the **No. of Employees** column. For example, `10`. 
         
             The portal automatically calculates the total tax payable.
         1. Click **Save Return**.

         You have successfully filed the e-return, after which you receive the confirmation message on the same page. 
         
         Click **Home** at the top-left corner to return to PT home page.
        

    
### 2. Make E-Payment

         After filing the PT e-Return, you must make the E-Payment.

         1. On the PT e-Prerana home page, click **Make E-Payment**. 
             
         1. On the **Make E-Payment** page, you can view the returns filed in step 2. Click **Pay**.
         1. Review the **PT-Demand Details** as populated from the returns you filed. Click **Make e-Payment**.
         1. This redirects you to the Khajane II portal. Here: 
            - Select the **Mode of Payment** from the drop-down menu. We recommend you select netbanking as the payment mode.
            - Select the **Type of E-Payment** as **SBI Aggregator**.
         1. Enter the captcha and click **Submit**.

         This successfully makes the PT payment for the month. You are automatically redirected to the PT portal. 
         
         Click **Home** at the top-left corner to return to PT home page.
        

    
### 3. Submit Returns

         After successfully making the E-Payments, you must submit the returns for which you made the PT payment. This is a mandatory reconciliation practice. 

         1. Click **Home** to go to the e-Prerana portal home page. Here, click **Submit Return**.
             
         1. Review the return details and click **Submit**. This opens the **Verify and Submit Return** page.
         1. Click **Add CTD reference number** to link the auto-generated CTD number with your submit return request. 
         
             You can now view the tax payable details and the CTD reference number. 
         1. Click **Verify & Submit**.

         You have successfully submitted the returns. Click **Home** at the top-left corner to return to PT home page.
        

You have successfully made the PT payments. You can view the details on the home page directly for the current FY. 

Click **Verify/Print** on the e-Prerana portal home page to download the Returns receipt. 

### Troubleshooting Steps 

When you submit Returns in step 4, you may not find the necessary details on the page. There are two ways to resolve this: 

    
### Re-verify Payments

            1. Navigate to e-Prerana portal home page and click **Verify failed payments**. 
            1. Copy the CTD Reference number. 
            1. Click **Verify** against the respective payments.
            

            This can verify your payments post which, you can submit the returns.
        

    
### Verify Challan Payment Status

         If the above process fails, follow the below steps to verify failed payments.

            1. Go to the [E-Khajane II Portal](https://k2.karnataka.gov.in/K2/index_en.html).
            1. Click **Verify Challan Payment Status**.

                
            1. Enter the CTD number you previously copied and the captcha on-screen.
            1. Ensure the transaction status is successful.

            This successfully verifies the failed payments. You can now [Submit Returns](#4-submit-returns).
        

### Related Information 

- [TDS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md)
- [Statutory Compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md)
- [Provident Fund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md)
- [Enable Compliance during Account Setup](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#welcome-mail-from-xpayroll)
