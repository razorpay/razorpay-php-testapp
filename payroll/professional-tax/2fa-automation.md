---
title: Automate Karnataka PT payments on the Payroll Dashboard
heading: Automate Karnataka Professional Tax Payments
description: Automate Professional Tax payments for Karnataka employees on the Payroll Dashboard.
---

# Automate Karnataka Professional Tax Payments

Due to the introduction of [2FA on the PT portal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/faqs.md#professional-tax) by Karnataka government, Payroll enables you to automate PT payments (for Karnataka employees) via the Dashboard. Previously, we had paused PT payments via the Dashboard.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you make the PT payments before 20th of the current month.
> 

## Automate PT Payments

Watch the video below or read along to know how to make PT payments for Karnataka employees from the Payroll Dashboard. 

### Best Practices and Points to Note

        Following are some points to note before you make PT payments for employees on the Payroll Dashboard: 

        1. **Payroll Execution and PT Payments**: 

            Payroll makes PT payments only for those employees whose payroll you have executed. 
                - If you executed payroll for few employees, you can make PT payments for only those employees via the Payroll Dashboard. The employees must also be eligible for PT payments.
                - For employees who payroll is not executed, you must manually make the PT payments externally.
                - When initiating PT payments, Payroll displays the **Employee count**. This includes only those employees whose payroll is executed but PT payments are pending. 
                - **Employee count** does not include employees whose payroll is not executed.
        2. You can initiate PT payments only **once** from the Payroll Dashboard.

            If you executed payroll and made PT payments via the Payroll Dashboard once already, you can still execute payroll for other employees. However, you cannot make PT payments for these employees from the Payroll Dashboard. 
        3. **Paid Externally** to mark as paid: 

            - Use the **Paid Externally** feature after you make the PT payments externally. 
            - Once you mark a payment as paid, you cannot reverse it.
        4. If your PT payment is unsuccessful, you must reinitiate the PT payment from the Payroll Dashboard.
        5. You cannot make PT payments after 20th via Payroll. Make the payments externally via the PT portal and ensure you mark the payment as paid on the Payroll Dashboard.
    

### Initiate PT Payments

        To make Professional Tax payments for your employees based in Karnataka: 
        1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
        1. [Finalise Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#execute-payroll) for the month and execute it.

            - Enter the OTP to initiate payroll processing. 
            - If you have enabled approval workflow, ensure the reviewer approves it.
        
        This executes the payroll successfully. You can now make Professional Tax payments for your employees.
        1. Go to **Pay Employees** → **Run Payroll**.
        1. Click the **Pay KA Professional Tax** tab and click **Initiate**.
            
            
            In the right pane, you can view the PT payment details such as the current status, the due date, employee count and more.
             

                
> **WARN**
>
> 
>                 **Watch Out!**
>                 
>                 - You can make PT payments only for those employees whose payroll is executed. 
>                 - **Employee count** does not include the employees whose payroll you have not executed.
>                 - **Employee count** only includes the Karnataka employees.
>                 

        
        1. Click **Pay Now**. If your initiation failed, click **Retry**.
        1. In the **Second factor authentication** pop-up modal, enter the OTP you receive at your registered mobile number with Payroll. Click **Verify**.
        
        This successfully initiates the PT payments for employees.
    

### Check PT Payments Status

        To check the PT payments' status: 
        1. Log in [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
        1. Navigate to **ADMIN OPTIONS** → **Pay Employees** → **Run Payroll**.
        1. On the **Run Payroll** page, you can view the latest status of your PT payments and the next steps. 
    

### Mark PT Payments as Paid

        To mark PT payments as paid: 
        1. Log in [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
        1. Navigate to **ADMIN OPTIONS** → **Pay Employees** → **Run Payroll**.
        1. On the **Run Payroll** page, follow the steps to [initiate PT payment](#initiate-pt-payments). 
        1. In the right pane, click **Paid Externally**.
        

        This marks the PT payments for employees as paid. Once you mark as **Paid Externally**, you cannot reverse it.
    

### Troubleshoot PT Payments via Payroll

        Your PT payments may fail in some cases. Check how to resolve them.

        - **Incorrect credentials.** PT payments may fail when you initiate them due to incorrect PT credentials. 

            To resolve this:
            1. Navigate to **ADMIN OPTIONS** → **Company Details**.
            1. Go to **External Credentials** → **Edit**. 
            1. In the PT section, update your PT credentials for Karnataka.

        - **PT Payments have failed.** Due to timeouts or other errors on PT portal, your successful PT payment initiation may fail. 
            
            To resolve this, retry the PT payment.

        - **Employees are not eligible for PT payments**. This error occurs when PT is not enabled for your organisation, or PT is not enabled for employee/s. 

            To resolve this, ensure you enable PT for the organisation and ensure the employees' PT state is Karnataka.
    

## Related Information

- [TDS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/tds.md)
- [Statutory Compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md)
- [Provident Fund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md)
- [Enable Compliance during Account Setup](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#welcome-mail-from-xpayroll)
