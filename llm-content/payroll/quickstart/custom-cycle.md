---
title: Set up Custom Payroll & Attendance Cycles in RazorpayX Payroll | RazorpayX Payroll
heading: Custom Payroll & Attendance Cycle
description: Check how to set up and operate custom payroll & attendance cycles in RazorpayX Payroll.
---

# Custom Payroll & Attendance Cycle

Every organisation uses an attendance cycle to record the employees' attendance data for a payroll month and pays salaries. In RazorpayX Payroll, you can set up a [payroll and attendance cycle](#meaning-of-payroll-and-attendance-cycle) of the same duration, or set up a custom payroll or attendance cycle.

    
### Meaning of Payroll and Attendance Cycle

         - **Payroll cycle**: 
         Refers to the duration between two payroll activities. It is the period for which employees' work is considered for compensation. 
         
            In most organisations, payroll cycles follow the calendar month, that is, from the 1st of the month to the end of the month. 

         - **Attendance cycle**: 
         This is the duration for which the organisation records the employees' attendance data for the payroll month. The payroll month is also the payroll cycle. 
         
            Using an attendance cycle, organisations calculate the payroll for that employee in a specific month. 
        

You can use an attendance cycle to freeze the employees' attendance for that month and finalise the payroll before [execution](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#execute-payroll.md).

### How it Works 

1. Choose to make manual or automatic payments. 
1. Set up/modify a payroll and attendance cycle. 
1. Select the effective date from when the modified cycle/s are effective for the organisation. 
1. Choose the payroll date for payroll execution. 
1. Streamline automatic payroll payments using autopilot.

### Video Tutorial

Watch the video below to know how to create custom payroll and attendance cycles on the Payroll Dashboard or read along. 

[Video: https://www.youtube.com/embed/fevoeAtHRkI]

## Set Up Payroll/Attendance Cycle

To set up or modify the payroll/attendance cycle: 
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **ADMIN OPTIONS** → **Settings** in the left menu.
1. Go to **Payroll Setup** → **EDIT**. This opens the **Payroll Setup** page. 

On the **Payroll Setup** page, you can modify the following settings: 

### 1. Automate Payroll Payments 

To allow RazorpayX Payroll to execute your monthly payroll: 
1. Toggle the setting against **Let RazorpayX Payroll do the payments**. 
    ![Payroll set up payroll and attendance cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-custom-cycle-let-payments.jpg.md)
1. Navigate to **Payroll Date** section and select the payroll execution date from the drop-down menu. 
    ![Payroll enable payroll autopilot](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-custom-cycle-effective-date.jpg.md)

This enables RazorpayX Payroll to pay salaries when you request execution on the **Run Payroll** page. If you deselect this setting, you must manually pay salaries to your employees. [Payroll autopilot](#set-up-payroll-autopilot) is also not available. 

Know more about [payroll execution](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/execute-payroll.md). 

### 2. Modify Payroll/Attendance Cycle

To set up or modify the payroll/attendance cycle: 
1. Go to the [**Payroll Setup** page](#set-up-payroll-attendance-cycle). 
1. Review the current cycle per the calendar month in the **Payroll Cycle** section.  

    To change the cycle, click on **+ Create custom cycle** tab and select the start date. We automatically add the end date with a 30-day gap.

    ![Payroll set up custom payroll and attendance cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-custom-cycle-setup.jpg.md)

1. Toggle against the **Attendance Cycle** to follow the selected payroll cycle duration. Or you can set up a custom cycle.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     You can either set up a custom payroll cycle OR a custom attendance cycle at once. 
>     - If you create a custom payroll cycle, the attendance cycle is the same as the payroll cycle. 
>     - Your payroll cycle must follow the calendar month to create a custom attendance cycle.
>     

1. [Choose the **Payroll Date**](#automate-payroll-payments) from the drop-down menu, if not already done.
1. Select the **New cycle effective month** from the drop-down menu. You can only select an [unfinalised payroll month](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#execute-payroll.md) for the updated payroll and attendance cycle to take effect.

    The Payroll Setup section on the **Payroll Settings** page shows the old cycle until the effective month.

    ![Payroll Setup Summary on RazorpayX Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-custom-cycle-sum.jpg.md)

You have successfully set up/modified the payroll or attendance cycle. 

### 3. Set Up Payroll Autopilot 

You can allow Payroll to automatically make payments on the selected payroll date. On the **Payroll Setup** page: 
1. Toggle the setting against **Payroll Autopilot**. This means that the Payroll automatically makes payroll payouts on the **Payroll Date**. 
    When disabled, you must manually [request execution](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/execute-payroll.md).

    ![Payroll enable payroll autopilot](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-custom-cycle-autopilot.jpg.md)
1. Click **Save Changes**.

You have successfully changed the payroll and/or attendance cycle. 

### Cancel Upcoming Cycle 

When the upcoming effective cycle is no longer relevant for the organisation, you can cancel the upcoming cycle.

1. Go to the [**Payroll Setup** page](#set-up-payroll-attendance-cycle). 
1. Click **Cancel upcoming cycle** at the top of the page. 

This cancels the future effective cycle.

### Related Information 

- [About Account Setup](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/quickstart.md)
- [About Execute Payroll Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/execute-payroll.md)
