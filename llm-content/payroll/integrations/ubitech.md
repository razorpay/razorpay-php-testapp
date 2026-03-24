---
title: RazorpayX Payroll Integration with UbiAttendance Attendance Management Software
heading: Integrate with UbiAttendance
description: Check the steps to integrate RazorpayX Payroll with UbiAttendance to manage employees' attendance.
---

# Integrate with UbiAttendance

Sync attendance data of employees by integrating Payroll Dashboard with UbiAttendance and make payroll calculations easier.
UbiAttendance also offers many advanced attendance marking and other enhanced reporting features.

### Advantages
         - Eliminates errors and challenges arising out of manual attendance and time inputs. 
         - Seamlessly syncs loss of pay information (LoP) data with Payroll, which influences monthly payroll calculations. 
        

> **WARN**
>
> 
> **Watch Out!**
> 
> - API access is required for UbiAttendance integration. [Contact Support](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/plans/#contact-support.md) for API aceess.
> - You must be on the paid plans of UbiAttendance and RazorpayX Payroll.
> 

## How it Works 

1. Maps and integrates all employee data in Payroll to UbiAttendance (this is a one-time process).
2. Maps new employee data to UbiAttendance upon manual syncing.
3. Updates UbiAttendance LoP data to Payroll upon monthly manual syncing, to arrive at the right payroll calculation.

## Prerequisites 

Following are some prerequisites before integrating with UbiAttendance:

1. You **must** disable Payroll's Attendance Module. 
1. Request access to RazorpayX Payroll APIs. 
    [Contact Support](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/plans/#contact-support.md) to request access to Payroll APIs. Integration with UbiAttendance requires Payroll's API ID and Key.
1. Ensure you have selected the following API permissions: 
    - Add additions and deductions to Payroll
    - Modify attendance
    - View profiles of employees and contractors

> **WARN**
>
> 
> **Watch Out!**
> 
> - Additions to payroll arising due to overtime payments to employees must be manually added as [additions](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#additions.md) on the Payroll Dashboard. UbiAttendance does not automatically transfer the additions data to Payroll.
> 

## Integration Steps

There are four steps to integrate with UbiAttendance: 

    
### 1. Disable Payroll Attendance Module

            To use UbiAttendance, you must disable Payroll's attendance module.

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            1. Navigate to **Settings** → **Holidays, Leave & Attendance** → **Edit**.
            1. Select **No** in the **Attendance Enabled?** drop-down menu. 
            1. Click **Continue**.

            This successfully disables Payroll's attendance module. You can now integrate with UbiAttendance.
        

    
### 2. Find and Copy Payroll Keys

            To integrate Payroll with UbiAttendance, you’ll need the following keys:

                - API ID

                - API Key

                - Client Key/Integration Key

                
                
> **WARN**
>
> 
>                 **Watch Out!**
>                 
>                  Please note that the **Client Key** and the **Integration Key** refer to the same value. Do not be confused by the different terms—both indicate the same credential required during the integration setup.
>                 

                
                Here’s how to find them:

                1. Go to Settings in RazorpayX Payroll.

                2. Click on Integrations → Select UbiAttendance.

                3. Click Edit next to the UbiAttendance integration.

                4. Click Show Key — the Integration Key will be visible here.

                Make sure to copy and save these keys safely, as they are required during the integration setup with UbiAttendance.

            
                
                    Payroll API ID and Key
                    
                     To copy the API ID and Key: 

                        1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
                        1. Navigate to **Settings** → **API Access** → **Edit**.
                        1. On the **API Setup** page, copy the **API ID** and the **API Key**.
                        
                        
> **WARN**
>
> 
>                         **Watch Out!**
>                         
>                          Without the API Key set up, UbiAttendance integration will fail.
>                        
>                         

                    

            
### One-time API Setup

                        
                        
                        If you are setting up APIs for the first time, you must set up the API key and select the API Permissions. 

                        1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
                        1. On the **API Setup** page, click **Set Key** to set up an API Key for your organisation. **API ID** for the organisation is provided by default.
                        1. Select the relevant API permissions using the check boxes.
                        1. Click **Continue** and verify with OTP.

                        This successfully sets up your APIs. 

                        To integrate with UbiAttendance, ensure you have selected the following permissions:
                        - **Add additions and deductions to Payroll**
                        - **Modify attendance**
                        - **View profiles of employees and contractors**
                    

            

            Log in to the UbiAttendance portal to complete the next steps.
        
    
    
### 3. Initiate Integration on UbiAttendance

            To start integrating with UbiAttendance:
            1. Log in to the UbiAttendance portal. 
            1. Go to **Organisation** tab in the top menu → **Settings** in the left menu. Click **Integrations** → **RazorpayX Payroll**.
            1. Click **Setup** on the card. This opens the **Integration Setup** page. Here, you must enter the following:
            - Integration Key
            - Payroll key
            - Payroll API id
            1. Paste the **Payroll Key**, **Integration Key**, **Payroll API ID** and **Integration key** in the respective text boxes on the **Razorpay Integration Setup** page.
            1. Click **Update Setup**.

            This successfully initiates the UbiAttendance integration. 
        

    
### 4. Sync Payroll Data to UbiAttendance

            After you integrate Payroll with UbiAttendance, ensure you sync payroll data from RazorpayX Payroll to UbiAttendance. This is a manual process. (Is this a manual process, or is the LoP one manual? Or both?) 
            
            To sync employee data:
            1. Log in to the UbiAttendance portal. 
            1. Go to **Organisation** tab in the top menu → **Settings** in the left menu. Click **Integrations** → **RazorpayX Payroll**.
            1. Click **Manage**. 
            
                 This opens the RazorpayX Payroll **Integrations** page, displaying two cards: **Map Employees** and **Sync Employee LoPs**.
            1. Click **Start Process** → **Integrate** → **Authenticate**.
            1. On the mapping page, click **Start Mapping** in the **All Employees** tab.

                 If any employee's data is missing on UbiAttendance:
                     1. Go to the **Specific Employee** tab.
                     1. Enter the employee's email address in the text box and click **Search**. 

                 This automatically retrieves the updated information available on the Payroll Dashboard. 

             If any details of the employees are missing, the integration will succeed only with the successfully synced details. To rectify the missing information, click **Download Error File** and make the relevant changes on the Payroll Dashboard.
        

This completes the integration process. 

## Sync LoP Data 

The integration with UbiAttendance allows you to easily sync LoP (Loss of Pay) data to Payroll. Once synced, payroll calculations and deductions for the month are processed automatically.

To sync the data:

1. Log in to the **UbiAttendance portal.**

2. Navigate to **Organisation > Settings > Integrations > RazorpayX Payroll.**

3. Click **Manage.** This opens the RazorpayX Payroll Integrations page with two options: Map Employees and Sync Employee LoPs.

4. Click **Show Details** under **Sync Employee LoPs.**

5. On the Sync LoP page, go to the **Synced LoPs Data** tab to view the LoP details of employees.

6. Select the employees whose LoP data you want to sync manually.

7. Click the **Sync icon** (top-right corner).

8. In the pop-up, choose the month and click **Confirm**, then click **Sync Employees.**

9. Click the **Refresh icon** at the top-right to pull the latest attendance data.

This will trigger a manual sync, which means the selected employees' Loss of Pay (LoP) details from UbiAttendance will be pushed to RazorpayX Payroll for the selected month. These synced LoP values will then be used to automatically calculate payroll deductions for the respective employees during payroll processing.

To verify if the sync worked:

1. Navigate to **Run Payroll** on the **Payroll Dashboard.** 
2. Make sure the correct month is selected and check the **Deductions** column for the employees listed on the Synced LoPs page.

> **WARN**
>
> 
> **Watch Out!**
> 
> Once LoP data is synced from UbiAttendance, you can edit from the Payroll Dashboard.
> However, any changes made in Payroll won’t sync back to UbiAttendance. For example; if UbiAttendance shows 2 LoP days and you update it to 3 in Payroll, the change stays only in Payroll. UbiAttendance will still show 2 days.
> 

## For Employees 

Employees can log in to the UbiAttendance portal using their user id and password that they generated when signing into UbiAttendance for the first time.
