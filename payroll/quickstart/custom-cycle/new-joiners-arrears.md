---
title: Set up payroll cut-off date for new joinees and pay arrears | RazorpayX Payroll
heading: New Joiner's Arrears
description: Check how to set a cut-off date for new employees and pay new joiner arrears in RazorpayX Payroll.
---

# New Joiner's Arrears

Most organisations freeze employees' payroll inputs by a specific day (say the 24th or 25th of the month) before finalising payroll. This creates a buffer period for the payroll teams to make changes to the monthly payroll. 

However, when new employees join the organisation during the buffer period, calculating payroll for the working days in a month becomes complex. In Payroll, you can set up a new joiner cut-off date and choose how to process the new joiner's salary.

    
### What is New Joiner's Cut-Off Date?

         In Payroll, the new joiner cut-off date determines whether Payroll should process a new employee's salary in the joining month or with arrears in the upcoming month.

         For example, if an employee joins the organisation on July 23rd, the new joiner cut-off date helps the payroll team process the employee's payroll either in July or August ([with arrears](#1-what-are-new-joiner-arrears)).
        

## How it Works 

1. Set up [payroll and attendance cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart/custom-cycle.md).
1. [Enable and select the new joiner cut-off](#set-up-new-joiner-cut-off-date) date for the organisation. 
1. Basis the employee's date of joining (DOJ), Payroll either: 
    - Holds new employee's salary for the joining month and pays the prorated salary (including new joiner arrears) in the upcoming month. 
    - Pays the new joiner's salary in the joining/current month. 

## Set Up Cut-off Date

To set up new joiner's cut-off date:
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **ADMIN OPTIONS** → **Settings** in the left menu.
1. Go to **Payroll Setup** → **EDIT**. This opens the **Payroll Setup** page. 
1. Enable the toggle against **New Joiner Cut-Off**. 
1. Select the cut-off date from the drop-down calendar. 
    
1. Click **Save Changes**.

This sets up the new joiner's cut-off date. Employees who join after the cut-off date receive their prorated salary in the upcoming month.

## Edit Cut-off Date

You can change the new joiner cut-off date to apply starting from a future month. To edit the cut-off date: 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Follow the [steps to set up the new joiner cut-off date](#set-up-new-joiner-cut-off-date).
1. Select the **New cycle effective month** from the drop-down calendar. This ensures that the change applies starting the selected effective month.  
1. Click **Save Changes**.

You have successfully changed the cut-off date. 

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot change the new joiner cut-off date if you have an upcoming effective [payroll and attendance cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart/custom-cycle.md). [Cancel the upcoming cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart/custom-cycle.md#cancel-upcoming-cycle) and then make changes to the new joiner cut-off date, payroll and attendance cycles. 
> 

### Payroll Impact

When an employee joins after the new joiner cut-off date, Payroll processes the employee's salary in the upcoming month. For example, an employee that joined your organisation in July after the cut-off date receives the prorated salary (including arrears) in the August payroll. 

> **INFO**
>
> 
> **Handy Tips**
> 
> You can make gross-pay changes like deductions, bonuses, or salary revision to the new joiner's payroll. [Finalise payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#execute-payroll) for the employee's joining month to view the prorated salary for the upcoming month. 
> 

Know how we process payroll for the joining and upcoming months below.

    
### For the Joining Month

         - New joiner's payroll for the joining month is **On-Hold**. When you finalise payroll, the **Run Payroll** list for the joining/current month displays the following:

                

         - In the joining month, you can deduct [LOP](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#loss-of-pay) days and salary revision for new employees. However, we process them only in the upcoming month.
        

    
### For the Upcoming Month

         The new joiner's payroll for the upcoming month includes the current month's salary prorated with the [new joiner's arrears](#1-what-are-new-joiner-arrears) for the previous month. When you finalise payroll for the upcoming month, the **Run Payroll** list adds the arrears under the **Additions** column. 
         
         In the **Addition details** pop-up modal, you can view the details of the additions added.

            
        

## Frequently Asked Questions (FAQs)

    
### 1. What are new joiner arrears?

         When an employee joins your organisation after the [new joiner's cut-off date](#set-up-new-joiner-cut-off-date), we process the employee's payroll in the upcoming month. We do not pay the new joiner for their working days in the joining month. 
         
         Payroll prorates the salary to include the unpaid days as arrears in the upcoming month. These are referred to as new joiner's arrears.
        

    
### 2. I am unable to finalise payroll for the upcoming month. How to resolve this?

         You cannot [finalise payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#execute-payroll) for the upcoming month because you have not finalised the new joiner's payroll for the previous month. 
         
         Finalise payroll for the new employee's joining month. Then, finalise the payroll for the upcoming month to pay the arrears and the salary.
        

    
### 3. I have paid a joining bonus to my employee. When will the employee receive it?

         If the employee has joined your organisation after the cut-off date, we pay the bonus in the upcoming month. 
         
         For example, if your employee joins your organisation in January after the cut-off date, they receive their bonus payout in February along with the prorated salary.
        

    
### 4. I cannot find the settings to set up a new joiner cut-off date for my organisation. What should I do to enable it?

         If you cannot find the new joiner cut-off date settings, you are using [Jibble](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations/jibble.md) to manage employee's attendance, loss of pay and more. 
         
         In such cases, you cannot set up a new joiner's cut-off date for your organisation. 
        

    
### 5. How do I add Reverse LOP for my newly joined employees?

         You cannot add [reverse LOP arrears](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#how-to-pay-lop-reversal-arrears) to a new employee's payroll.
         
         To reverse the LOP deductions, [make changes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#execute-payroll) to the employee's payroll for their joining month.
        

    
### 6. Why cannot I update the additions/deductions in the bulk upload template?

         Your new employees' names appear in the downloadable template for bulk updating additions/deductions for their joining month. However, you cannot edit those fields as we hold their salary during that month. 
         
         We do not support gross pay additions and deductions, except loss of pay for leaves.
        

    
### 7. How can I revise my new employee's salary before paying the arrears?

         You must [make changes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#execute-payroll) to your finalised payroll in the previous month to revise salary for a new employee. 
        

    
### 8. How do I make changes/unfinalise payroll?

         Refer to the [Execute Payroll section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#execute-payroll) to know how to make changes to the monthly payroll.
        

    
### 9. Is there any penalty for PF/ESI arrears due to skipping New Joiners' salaries?

         No, there are no penalties.
