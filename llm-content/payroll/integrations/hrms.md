---
title: RazorpayX Payroll Integration with HRMS Software
heading: Integrate with HRMS Software
description: Check the steps to integrate RazorpayX Payroll with any HRMS Software.
---

# Integrate with HRMS Software

On the [Payroll Dashboard](https://payroll.razorpay.com/dashboard), you can integrate your Human Resource Management Systems (HRMS) tool with Payroll. You need not manually import data or switch from your current HRMS. 

Payroll seamlessly integrates with your HRMS using APIs to sync data between the two platforms. You can map employee roles and other employee details on Payroll to manage their monthly payroll.

    
### List of Supported HRMS Software

            - ADP Run
            - ADP Workforce Now
            - BambooHR
            - Breathe 
            - Ceredian Dayforce
            - Charlie HR
            - Darwinbox
            - Deel
            - Employment Hero
            - Factorial HR
            - Freshteam
            - Hibob
            - HR One
            - Humaans
            - Keka HR
            - Namely
            - Oracle Cloud HCM
            - Paychex
            - Paycom
            - Paycor
            - Paylocity
            - Personio
            - Remote
            - Rippling
            - Sage
            - SAP SuccessFactors
            - UKG Pro
            - Workday
            - Workline
            - WorQ
            - Zenefits
            - Zoho People
        

    
### Advantages of Integration

            Following are the advantages of integrating your HRMS with Payroll. 

                - **Platform Flexibility**: 

                You can integrate your current HRMS software with Payroll seamlessly. With this integration, you no longer need to switch between your HRMS and payroll software. We support multiple HRMS tools to help you simplify payroll calculations.

                - **Unified Data View via Automation**: 

                Suppose you onboard or offboard employees from your organisation or modify your employees' details, Payroll automatically reflects such changes via a daily data sync. This automated process provides a unified view of your employees' data. 

                - **Boost Efficiency and Accuracy**: 

                Payroll and HR management are cross-functional, sensitive processes that require precision and intense effort. With this integration, you boost your teams' efficiency by reducing manual effort and the scope for errors.
        

## How it Works

1. [Integrate with the HRMS tool](#integration-steps) on the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Configure the integration.

Once you successfully set up the integration, the HRMS becomes the single source of truth for employee information. 

With this integration, you can:
- Choose the entities and employee data from your HRMS software to map to Payroll [during setup](#integration-steps).
- Map your employee types as `employees` or `contractors`. Know more about [employee types](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/administrator#employee-and-contractor.md) in Payroll.
- View up-to-date employee information on Payroll via daily automated sync. This includes existing employees' data modifications or new employees added to your HRMS. 
- Sync dismissal dates from HRMS to calculate [Full and Final Settlement](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#full-and-final-settlement.md) in Payroll.

> **WARN**
>
> 
> **Watch Out!**
> 
> Only the data from the HRMS software is synced to Payroll. You cannot sync Payroll Data to your HRMS software. 
> 

### Video Tutorial

Watch this video to know how to integrate your HRMS of choice with Payroll or read along.

[Video: https://www.youtube.com/embed/dTsTQJI_b0U]

## Integration Steps 

To integrate your HRMS software with Payroll: 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **ADMIN OPTIONS** → **Integrations**. 
1. Look for your HRMS software using the **HRMS** filter at the top and click **Explore**.
    ![HRMS Integration options on RazorpayX Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-explore-hrms.jpg.md)
1. On the integration page, click **START INTEGRATION**. 
1. Follow the on-screen instructions to authenticate the tool and map your employees on Payroll. 
    1. Preview the employee information synced by Payroll. You can choose which employee data fields you want to sync to Payroll. Some fields are mandatory. 
    1. Map your employees as employee or contractor [employee types](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/administrator#employee-and-contractor.md) on Payroll. 
1. Review the configuration summary, such as the details synced, the sync duration, and the employee types on the HRMS tool mapped as contractors and employees. 
1. Type **confirm** in the text box to integrate. 

You have successfully completed the integration. 

## Post Integration

Post integration, it takes up to 30 minutes for the data to appear on Payroll. 
- The HRMS data overwrites any existing employees' information. To view a copy of the data previously available on Payroll, go to **ADMIN OPTIONS** → **Reports** → **Audit Report**.
- All the synced fields from the HRMS become uneditable on the employee's profile on Payroll. You can edit the unsynced fields only. 
- We email any failed data sync to the administrator's email id. 

> **WARN**
>
> 
> **Watch Out!**
> 
> After integrating your HRMS with Payroll, you can modify the employee details only on the HRMS Dashboard.
> 

### Manage Integration 

To manage the integration:
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Go to **Integrations** in the left menu → HRMS tool. 
1. Click **Manage**.

Here you can: 
- Manually sync data between HRMS and Payroll when necessary. Click **Sync now**.
- Change employee information such as bank account data, contractor to full-time employee or vice-versa, personal details of the employee, and so on using the **Modify Configuration** option.
    
    Suppose you must sync the bank account data from the HRMS after the integration, or a full-time employee is now a [contractor](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/administrator#differences-between-employee-and-contractor.md). You can change that information here. 
- To disable the integration, click **Disable**.

![Manage HRMS Integration on Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-hrms-manage.jpg.md)

### Bulk Update

You can bulk update your employee/contractor information on the Payroll Dashboard. This applies only to fields not synced during the [integration process](#integration-steps), like your employee's PAN, UAN, bank account details and more.

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Go to **ADMIN OPTIONS** → **People** → **Bulk update** in the right pane.
1. Download the template from the Dashboard and follow the on-screen instructions to fill the template. 
1. Upload the file. In case of errors, you can download the error report to rectify them and upload the file again.

### Related Information 

- [About Integrations](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/integrations.md) 
- [Contact Support](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/plans/#contact-support.md)
