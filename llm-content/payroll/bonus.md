---
title: Bonus Management | RazorpayX Payroll
heading: Bonus
description: See how to manage bonuses and clawbacks in RazorpayX Payroll.
---

# Bonus

A bonus is a one-time payment to an employee given outside of an employee's total salary. You can provide bonuses, set clawbacks, edit and delete bonuses for your employees on the Payroll Dashboard. 

    
### Difference between Bonus and Variable Pay

         
            
                - Bonus is a non-recurring payment. 
                - It is not included in the employee's CTC. 
                - It can have a clawback. Suppose an employee leaves the organisation before a certain period. In that case, the employee pays the bonus amount back to the organisation during the [FNFS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/resignation.md#process-full-final-settlement) process. 

                Examples include festive, joining, retention, milestone bonuses and more.
            
            
                - Can be a recurring or a non-recurring payment. 
                - It is a part of the employee's CTC. 
                - Clawback is not applicable on variable pay.
            
         
        

## Setup Bonus Types

Before you create bonus for an employee, you must configure the types of bonuses applicable for your organisation. 

For example, when your business cycle is seasonal, you may provide festive bonuses or profit-sharing bonuses to employees, but choose to not provide a joining or retention bonus.

To configure bonus set up: 
1. Log in to the Payroll Dashboard.
1. Navigate to **ADMIN OPTIONS** → **Settings** → **Bonus Types**. Click **Edit**.
    ![Settings Payroll Setup Bonus Types Edit on Razorpay Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-bonus-settings.jpg.md)
1. On the Bonus Types page, select the relevant bonuses as applicable.
    
    You can also create a custom bonus type. Enter the name of the bonus in the text box and click **Add**.

    ![Razorpay Payroll Bonus Setup Enter custom bonus name Add](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-bonus-configure.jpg.md)
1. Click **Save**.

You have successfully enabled the bonus types for your organisation. You can now create bonuses for your employees.

## Create Bonus

There are two steps to create a bonus for an employee: 

    
        
### 1. Add the Bonus Details

             1. Log in to the Payroll Dashboard.
             1. Go to **ADMIN OPTIONS** → **People** → specific employee's profile. 
             1. Navigate to **Compensation & Perquisites** in the employee's profile view and click **Create Bonus**.  
                 ![Create bonus for employee on RazorpayX Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employee-bonus-create.jpg.md)
                
                 The **Bonuses for Employee** page opens. Here you can create and manage bonuses for your employees.
             1. Click **Create a new bonus**. 
                ![Bonus for Employees page on RazorpayX Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-create-bonus-for-employee.jpg.md)
             1. 1. On the **Create New Bonus** page:
                1. Select a **Bonus Type** from the drop-down list. Click the link under the drop-down box to modify the [bonus setup](#prerequisites) of your organisation. 
                1. Enter the bonus amount awarded to the employee in the **Bonus Amount** text box. 
                1. Choose the **Bonus Status** from the drop-down list. 
                    - Choose **Yet To Be Paid** to schedule the bonus payout for the upcoming month. 
                    - Choose **Paid Already (Outside XPayroll)** to add an externally paid bonus payout.
                1. Select the month and year in **Payout Month**. If you paid the bonus outside of Payroll, select the month and year when you paid the bonus. 
                1. Choose whether the **TDS Deduction** happens instantly or on a prorated basis. 
                1. Add remarks as applicable. 

                    ![Add bonus details to create bonus on Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-bonus-create-process.jpg.md)
             1. Click **Next →**. 
             
             This opens the **Add Clawback Rules** page. You can add a clawback rule, if applicable to the bonus (such as joining bonus).

             If a clawback rule is not applicable: 
             1. Select the **No, I don't have any clawback rule** option.
             1. Click **Create Bonus**.
            

        
### 2. Add Clawback Rule

             Suppose an employee leaves the organisation before a certain period during which the bonus is applicable. In that case, the employee pays back the bonus amount to the organisation during the [FNFS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#full-and-final-settlement) process.

             To add the clawback rule: 
             1. Click **Next →** to go to the **Add Clawback Rules** page and select from the following options: 
                - **No, I don't have any clawback rule**.
                - **Yes, I have clawback rule**. 
                 
                    For example, clawback rule may not apply to a festive bonus but is applicable on a joining bonus. 
                1. If the clawback rule is applicable, select **Yes, I have a clawback rule**. 
                1. Add the clawback duration in the **Number of Months** text box. 
                    
                    If the employee leaves within these months, the clawback is applicable and is settled during the [FNFS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#full-and-final-settlement) process.

                    ![Add clawback rule for bonus in RazorpayX Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-bonus-clawback.jpg.md)

                1. Click **Create Bonus**. 
            

    

You have successfully created a bonus with a clawback rule. You can view the bonus details in the following pages on Payroll: 
- On the respective employee's profiles as shown in [Manage Bonus](#manage-bonus). 
- Bonus Report on the banner on the **Run Payroll** page. You can also view the number of bonuses included in the monthly payroll here.
- In the [Bonus Report](https://payroll.razorpay.com/reports/bonus). 
    - You can download this report as a `CSV` file.
    - You can also edit the bonus details from this page. 

## Manage Bonus 

To manage bonuses provided to an employee: 

1. Log in to the Payroll Dashboard.
1. Navigate to **ADMIN OPTIONS** → **People** → click specific employee's profile. 
1. Go to **Compensation & Perquisites** → **Manage Bonus**. You can also view the number of bonuses provided to the employee here. 

    ![Manage bonus for employee on Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-bonus-manage.jpg.md)

You can [create additional new bonuses](#create-bonus), [edit](#edit-bonus), [delete](#delete-bonus) unpaid bonuses and manage [bonus settlement on dismissal](#settle-bonus-on-dismissal). 

    
### Edit Bonus

         To edit a bonus: 

            1. Log in to the Payroll Dashboard.
            1. Go to the **Bonuses for Employee** page as shown in [manage bonus](#manage-bonus). 
            1. Click on the bonus to edit the details.
            1. Change the required details on the **Manage Bonus** page and click **Next →**.
                ![Edit bonus details in RazorpayX Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-bonus-edit.jpg.md)
            1. Edit the clawback rule as applicable. 
            1. Click **Save Changes**. 

            You have successfully edited and saved the changes to the employee's bonus. 

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             You can edit only the clawback period of a bonus paid via Payroll.
>             

        

    
### Delete Bonus

         In some cases, you may need to cancel an upcoming, unpaid bonus. To delete a bonus: 

            1. Log in to the Payroll Dashboard.
            1. Go to the **Bonuses for Employee** page as shown in [manage bonus](#manage-bonus).
            1. Click on the bin icon on a specific bonus to delete that bonus.
                ![Delete bonus in Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-bonus-edit-delete.jpg.md)
            1. Click **Delete now** in the **Delete Bonus** pop-up window.

            You have successfully deleted a bonus. The number of bonuses for that employee decreases in their profile view.
        

    
### Settle Bonus on Dismissal

         When you [dismiss an employee](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#terminate-and-run-last-payroll) on Payroll, we automatically calculate the bonus (when clawback is applicable) and settle it. 

            It reflects on the **Full & Final Settlement** form as a deduction with Bonus Recovery as the **Label**. You can edit the recovery amount here.
                ![Full & Final Settlement bonus deduction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-bonus-fnf-edit.jpg.md)

            To check how the deduction reflects on the employee's payslip: 

            1. Log in to the Payroll Dashboard.
            1. Go to **ADMIN OPTIONS** → **Run Payroll**. 
            1. Select the payroll month on the right pane. 
            1. Click on the **Gross Pay** amount against the dismissed employee's details to view the preview version of the employee's payslip.
        

### Related Information

- [Execute Payroll Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/execute-payroll.md)
- [Salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md)
