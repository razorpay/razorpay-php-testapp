---
title: Integrate RazorpayX Payroll with Zoho People
heading: Integrate with Zoho People
description: Integrate your RazorpayX Payroll account with Zoho People and simplify people management across platforms.
---

# Integrate with Zoho People

On the [Payroll Dashboard](https://payroll.razorpay.com/dashboard), you can integrate Zoho People with Payroll. You need not manually import data or switch from your current HRMS. 

After you set up the integration, Payroll uses APIs to sync data between the platforms. You can map employee roles and other employee details from Zoho People to Payroll and manage your monthly payroll seamlessly.

    
### Advantages

         - **Automated Data Sync**: 

            Once you set up the integration, any changes to the employee details on Zoho People will automatically reflect on the Payroll Dashboard. 
            
         - **Platform Flexibility**: 
 
            You can integrate your current HRMS software with Payroll seamlessly. With this integration, you no longer need to switch between your HRMS and payroll software. We support multiple HRMS tools to help you simplify payroll calculations.
        

## Prerequisites

Ensure the following prerequisites to integrate Payroll with Zoho People: 
- You use Zoho People's paid plans. 
- All your employees are onboarded on Zoho People. 
- You have requested Payroll to enable the integration. 

    
        
### How to request the Zoho People integration?

             To request Zoho People integration: 
                1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
                1. Navigate to **ADMIN OPTIONS** → **Integrations**. 
                1. Look for your Zoho People using the **HRMS** filter at the top and click **I'm Interested**. We enable the integration for you.
                    ![HRMS Integration options on RazorpayX Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-zoho-integration-explore.jpg.md)
            

    

## Integration Steps 

There are three steps to integrate Zoho People with Payroll: 

    
### 1. Authorise Payroll to Access Zoho People

         To start the integration, you must allow Payroll to access the data on Zoho People. 

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            1. Navigate to **ADMIN OPTIONS** → **Integrations** → **Zoho People**. Click **Explore**.
            1. On the integration page, click **START INTEGRATION**. 
            1. Select the check boxes on-screen. Ensure you meet the [prerequisites](#prerequisites). Click **CONNECT TO ZOHO PEOPLE**.
            1. On the authorisation page, authenticate using your Zoho credentials. Review the permissions and click **Accept**.

            This successfully initiates the integration. On the Payroll Dashboard, you must now complete the employee mapping.
        

    
### 2. Map Employees and Details to Payroll

         There are three steps to map employee details from Zoho People to Payroll. This is one-time setting and allows Payroll to sync data from Zoho People. 
         
         

            
            
                
                    1. Map Employee Fields
                    
                     Employee fields refer to the employees' details such as their name, email address, identity information and more.

                     You must select the fields to sync to Payroll from Zoho.

                        1. After you click **Accept**, you are redirected to the Payroll Dashboard.
                        1. On the **Zoho integration setup** page, review and select the employee fields to sync with Payroll. 
                        
                            You can click **Edit Fields** to select the information you want to import to Payroll.

                                ![Select Zoho employee fields to Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-zoho-integration-select-fields.jpg.md) 
                        1. Click **Save and continue**.

                        This successfully imports the selected employee details to Payroll. You can edit employees' details such as personal information on Zoho People only.
                    

                
### 2. Map Employee Types

                     Payroll considers only two types of people: `employees` and `contractors`. When integrating with Payroll, you must accurately map the employee types.

                     1. On the **Employee type mapping** page, select the employee types check boxes on-screen for Payroll to consider as `employees`.

                        For example, you can choose trainees, full-time employees, interns and more as `employees`. The unselected employee types are mapped as `contractors`.

                        ![Zoho People employee mapping Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-zoho-integration-emp-type.jpg.md)
                     1. Click **Next**.

                     This completes the employee mapping. All the selected types are considered `employees` on the Payroll Dashboard.
                    

                
### 3. Map Employee Status

                     Payroll considered two employee statuses for employees and contractors: `active` and `dismissed`. 
                     
                     You must select the available statuses on Zoho People and map them on appropriately on Payroll. Only then the employees are considered as `active`.

                     1. On the **Employee status mapping** page, select the employee status check boxes on-screen. All selected options will be considered as active. 

                         For example, you can select active, notice period and sabbatical employees as `active`. All unselected statuses are mapped as `dismissed` employees. 

                         
> **INFO**
>
> 
>                          **Handy Tips**
>                          
>                          - Dismissed employees are imported to RazorpayX Payroll but are not included in the monthly payroll. 
>                          - Employees are also considered as `dismissed` when:
>                             - Employee status on Zoho People is `dismissed`.
>                             - Employee's **Date of Exit/Last Working Date** is available on Zoho People. 
>                             - Unselected employee statuses are considered as `dismissed`.
>                          

                         ![Zoho People employee status mapping Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-zoho-integration-emp-status-mapping.jpg.md)
                     1. Click **Next**.

                     This successfully imports employee data to Payroll. 
                    

            

         You have successfully mapped the employees and imported the data to Payroll.
        
    
    
### 3. Confirm Integration

         You must confirm the integration once you map the employee details to Payroll.  

         1. On the **Disclaimer** pop-up modal, review the integration details you have configured. 
            - This integration overwrites your existing employee data on Payroll. 
            - You cannot restore existing Payroll employees' data.
            - You can download your current Payroll data from the HR Register on the Payroll Dashboard.
         1. Type `Confirm` in the text box.

            ![Payroll Zoho integration type Confirm in text box](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-zoho-integration-confirm.jpg.md)
         1. Click **Integrate**.
        

This successfully completes the Payroll integration with Zoho People. 

## Post Integration

Post integration, your employee data from Zoho People is visible within 30 minutes of successful integration. 
- We email any failed data sync to the administrator's email id. 
- After the integration, you can change the employee type mapping between `employees` and `contractors`.

## Manage Integration 

To manage the integration:
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Go to **Integrations** in the left menu → Zoho People. 
1. Click **Manage**.

On the **Manage Integration** page, you can: 
- **Manually sync data** between HRMS and Payroll when necessary. Click **Sync now**.
- **Change employee information** such as bank account data, contractor to a full-time employee or vice-versa, employee personal details, and so on using the **Modify Configuration** option.
    
    Suppose you must sync the bank account data from the HRMS after the integration, or a full-time employee is now a [contractor](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#differences-between-employee-and-contractor). You can change that information here. 
- To disable the integration, click **Disable**.

![Zoho Payroll Dashboard successful integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-zoho-integration-succes.jpg.md) 

### Related Information

- [About Payroll Integrations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations.md)
- [HRMS Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations/hrms.md)
