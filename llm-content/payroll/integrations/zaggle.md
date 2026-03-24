---
title: Integrate Razorpay Payroll with Zaggle
heading: Integrate with Zaggle
description: Integrate RazorpayX Payroll with Zaggle to simplify flexible benefits management for employees.
---

# Integrate with Zaggle

Integrate with Zaggle to simplify the flexible benefits declaration and reimbursement process for your employees. 

With the Zaggle integration, employees can declare flexible benefits on their Zaggle card. You can then approve the declared amounts and transfer funds to their card, that employees can then use the card to make purchases. 

    
### Advantages

         - **Central Data Tracking**: 

            Your Payroll account maintains all employees' flexible benefits data. On the Payroll Dashboard, you can configure flexible benefits at an organisational level and allocate funds accordingly.  
        
         - **Smooth Declaration and Reimbursement Process**: 

            Employees can use their Zaggle cards to declare flexible benefits. After declaring, you can transfer the approved amount and funds to their Zaggle card. This streamlines the flexible benefits process.
        
         - **Simplified Reconcilaition**: 

            Since employees use their Zaggle card to make payments from their declared benefits, collecting proofs for the declarations becomes easy.

         - **Automatic Data Sync**: 

            Your organisation's employee data is automatically transferred to Zaggle during setup. This eliminates the manual effort and errors in exporting data to Zaggle.
        

## How it Works 

1. [Integrate Zaggle with Payroll](#integration-steps).
1. Set up flexible benefits plan (FBP) and allocate monthly amounts on the Payroll Dashboard.
1. Complete the KYC and arrange card delivery for employees. 

## Integration Steps

To integrate with Zaggle: 
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **Integrations** in the left menu under **ADMIN OPTIONS**. 
1. Look for **Zaggle** and click **Explore**.
1. On the Zaggle integration page, click **CONTINUE SETUP** at the bottom. This opens the setup page. 
1. On the setup page: 
    1. In the **WALLETS** tab, select the check boxes to make flexible benefits available to your employees. Click **SAVE AND NEXT**.
        ![Set up Zaggle FBP plan on Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-integrations-zaggle-setup.jpg.md)
    1. In the **COMPONENT** tab, enter the maximum monthly amount allowed for flexible benefits at an employee level in the **Monthly amount** text box. 
    
        If you enter 5000 in the text box, ₹5000 is the total flexible benefits amount allocated for every employee in your organisation.

            
                
### What does this mean?

                    - When you add a specific amount in the text box, Payroll creates flexible benefits component in your employees' salary structure. 
                    - The amount added here is the sum total of all the flexible benefits and allocation.
                    

            

        Click **SAVE AND NEXT**.

        ![Add monthly amount on Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-integrations-zaggle-component.jpg.md)
    1. In the **ADDRESS** tab, select whether Zaggle should deliver the cards to your organisation's address or individually to your employees' addresses.

        
> **WARN**
>
> 
>         **Watch Out!**
> 
>         You cannot change the delivery address details after integrating.
>         

    1. On the **CONFIRM** tab, review the integration details and click **CONFIRM**.

This successfully completes the integration.

## Manage Integration 

To manage your integration with Zaggle on the Payroll Dashboard:

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **Integrations** in the left menu under **ADMIN OPTIONS**. 
1. Click **Manage** in the Zaggle card.

    ![Click Manage in Payroll Integrations Dashboard Zaggle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-integrations-zaggle-manage.jpg.md)

The following actions are available: 

    
### Update KYC

         You must complete the Zaggle KYC process to deliver your employees' cards. 

         1. Navigate to the [Zaggle integration page](#manage-integration) and click **START VERIFICATION**.
            ![Zaggle Payroll Integration KYC and modify FBP](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-integrations-zaggle-manage1.jpg.md)
         1. On the KYC Verification page, provide your **GSTIN Number**, **GSTIN Certificate** and a **Cancelled Cheque**.
         1. Click **Request Verification**. 

         This successfully initiates the verification process.
        

    
### Modify Flexible Benefit Plan

         To modify the flexible benefits plan: 
         1. Navigate to the [Zaggle integration page](#manage-integration). 
         1. **Click here** opens the FBP modification page.
         1. On the **WALLETS** page, you can re-configure the flexible benefits plan and the monthly amount in the **COMPONENT** tab. 
         1. Click **SAVE AND NEXT**.
        

### Related Information

- [About Payroll Integrations](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/integrations.md)
- [Integrate with Jibble for Attendance](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/integrations/jibble.md)
