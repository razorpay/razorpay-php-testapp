---
title: Customise salary components and tax deductions with RazorpayX Payroll’s settings
heading: Salary Component Library
description: Standardise payroll with RazorpayX Payroll’s Salary Component Library for accuracy & compliance.
---

# Salary Component Library

The Salary Component Library in RazorpayX Payroll is a structured repository that standardises salary components. It categorises additions and deductions so you can easily define and manage salary components. It also ensures compliance with tax and statutory regulations.

When setting up payroll, different components make up an employee's salary—some add to their pay like bonuses, while others deduct from it like ad-hoc damage repairs. In RazorpayX Payroll, you can customise both addition and deduction components to suit your organisation’s salary structure.

    
### Features

            
            Feature | Improvement | Example
            ---
            **Standardised Salary Component** | Admins can set up a salary component library with predefined and custom components for consistency | Earlier, one employee's bonus was labelled “Performance Bonus” and another’s as “Year-end Bonus,” creating confusion. Now, admins define a single “Bonus” component, ensuring uniform payroll calculations.
            ---
            **Controlled Component Editing**| Only the amount can be modified while executing payroll by admins; name and taxability remain fixed for uniformity. | HR teams often renamed allowances per employee, leading to payroll mismatches. Now, admins lock names and taxability while allowing only amount adjustments for consistency.
            ---
            **Tax Calculations** | Admins ensure accurate tax handling with a clear distinction between gross and net pay deductions. | An employee eligible for a ₹15,000 exemption had only ₹10,000 exempted due to manual errors, resulting in unnecessary taxation.  Now, predefined setup ensures the correct exemption based on salary eliminating errors and ensuring compliance.
            ---
            **Compliance Updates** | Payroll enables automatic tax compliance with government regulations.
             | If the PF wage ceiling increased, outdated deductions could lead to penalties. Now, the system alerts admins to regulatory changes and blocks payroll processing until compliance is ensured, preventing errors and legal risks.
            

        

 
        
          A Custom Addition Component is any salary element that increases an employee’s total earnings.
          

        By defining addition components, you can ensure employees receive the right benefits while maintaining compliance with tax rules. You also get to standardise salary components so that similar components are treated the same way for all employees.

         To add a new custom addition component:

            1. Navigate to the **Settings→Salary Component Library→Edit.**
                 
            2. Click **Create component** and select **Earning** from the dropdown. 
                 
            3. Fill in the **General & Pay Configuration** details:  
                - Enter a **Component name** (make sure it's unique as two components cannot be of the same name).  
                - Add a **Display name in payslip and salary register**(this will show up in payslip and reports).  
                - Write a **Component Description** to explain what it is used for.
                
            4. Set up **Prorations and Arrears**:  
            5. Click **Next: Taxation** to Navigate to tax settings.
                 
            6. Configure taxation details as per your organisation's policies.  
                - Review everything to make sure it's correct.  
                - Click **Next: Review** to check the customisations added to the salary component. 
                 
            7. Review all the customisations added in the salary component.
                 - Click **Create component** to add the new component you just created.
                 

            To modify a custom addition component: 

                1. Navigate to the **Salary Component Library.**   
                2. Select the component you want to edit.          
                3. Click **View details** to open the component settings.
                4. Click **Modify** and make the necessary changes. 
                     
                5.  Click **Save Component** to modify the component.  

            To disable a custom addition component:

            1. Follow steps **1-3** from the modification process.

            2. Click the **Disable** button. 
        
            
> **WARN**
>
> 
>             **Watch Out!**
> 
>            If the component is included in a current payroll that has not yet been executed, it cannot be disabled. Otherwise, it can be disabled.
> 
>             
 
              

        
        
            A Custom Deduction Component is an amount that is subtracted from an employee’s salary. These can be Ad-Hocs such as Laptop Repair Costs or Salary Advances' Recovery.

        Deductions can be applied either before tax (gross pay deductions) or after tax (net pay deductions).
        
         Set these up correctly to ensure your payroll is accurate, tax-compliant, and transparent for employees.

        To add a new custom deduction component:
            
            1. Navigate to the **Settings→Salary Component Library.**
                
            2. Click **Create component** and select **Deduction** from the dropdown. 
            3. Fill in the **General & Pay Configuration** details:
            4. Enter a **Component Name** (must be unique).
            5. Add a **Display name in payslip and salary register**(this will show up in payslip and reports).
            6. Write a **Component Description** explaining its purpose.
            7.  Set the **Deduction Types** as Ad-Hoc.
            8. Set **Deduction Configuration:**
                    - **Calculate Arrears:** Configure whether system should calculate arrears based on this deduction.
               -  **Ad-Hoc**
                     Choose whether to Deduct from Gross Pay or Deduct from Net Pay

                    - **Deduct from Gross Pay:** The deduction is applied before taxes and other statutory deductions are calculated. This affects the taxable income and may reduce tax liability.
                    - **Deduct from Net Pay:** The deduction is applied after taxes and other statutory deductions have been calculated. This does not affect tax calculations.
                 
            9. Navigate to **Next: Pay Taxability** to configure tax details. 
            10. Adjust tax settings based on your organisation’s policies.
            11. Click **Next: Review** to verify all details.
                 - Review all configurations.
                 - Click **Create component** to save it.
                  

            
            To modify a custom deduction component:

            1. Navigate to the **Salary Component Library.**
            2. Select the deduction component you want to edit.
            3. Click **View details** to open details.
            4. Click **Modify** and make the required changes.
            5. Click **Save Component** to apply the changes.

             

            To disable a custom deduction component:
            1. Follow steps 1-3 from the modification process.
            2. Click the **Disable** button.
  
        
    

## Adding Components to Salary

Once you’ve created and configured your custom salary components, you can apply them while executing payroll for your employees. RazorpayX Payroll ensures that only the **amount** of these components can be edited during payroll execution—**the name and taxability remain fixed** to maintain consistency and compliance.

To add an addition component:
 1. Navigate to **Pay Employees → Run Payroll.**
     
 2. **Select** the employee whose salary you want to update.
 3. Click the **Edit** button next to the employee's salary details.
 4. In the edit screen, go to the **Addition** section.
     
 5. Choose the predefined component from the dropdown.  
 6. Enter the amount for the selected component.
     
 7. **Save** the changes.
      

The selected addition will now appear in the employee’s salary details next to the monthly CTC.

Similarly, to add a **deduction component:**

1. Navigate to **Pay Employees → Run Payroll.**  
     
2. **Select** the employee whose salary you want to update.  
3. Click the **Edit** button next to the employee's salary details.  
4. In the edit screen, go to the **Deduction** section.  
     
5. Choose the predefined component from the dropdown.  
6. Enter the amount for the selected component.  
     
7. **Save** the changes.

 Watch the video below to know how Salary Component Library Works:
