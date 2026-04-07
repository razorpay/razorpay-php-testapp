---
---

--- 
title: Manage Multi-location ESI compliance payments in RazorpayX Payroll  
heading: Multi-location ESI
desc: Set up, pay and check ESI payments across multiple locations on RazorpayX Payroll.
index: false 
tags: razorpayx payroll, esi full form, esi employee registration, esi setup, multi state esi
---

 Employees State Insurance (ESI) is a government mandated health insurance for employees. It is mandatory for organisations with more than 20 employees, whose monthly salary is lower than ₹21,000. RazorpayX Payroll now supports end-to-end automation for multi-location ESIC compliance, eliminating the need for manual handling or dependency on external CA partners.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payroll does not support initial ESI registration at the organization level, only individual employee registration is available. To register your organization on the ESIC Portal, please follow [the registration guide](https://portal.esic.gov.in/ESICInsurance1/ESICInsurancePortal/Employer_Employee_registration_through_portal.pdf). 
> 

## What is Multi-Location ESIC?

Organisations with employees spread across multiple states or locations are required by ESIC to:

- Register each office location under a separate sub-code.
- Maintain distinct login credentials for each location.
- Generate location-specific contribution files.
- Process payments separately for each sub-code.

> **WARN**
>
> 
> **Watch Out!**
> 
> Please note that multiple locations can share the same subcode, but each location must be distinctly identified. Hence, location mapping must be done with extreme care and precision. This is MANDATORY for all ESIC configurations.
> 

With our Multi-location ESIC feature, you can now automate the entire workflow through a single dashboard eleminitating the need for manual intervention as well as external CA support.

 **Key Benefits**
 - Automated, state-wise contribution file generation.
 - Location based employee registration and payment processing.
 - You can register each office location under a separate sub-code.
 - Streamlined operations with smart batch processing.

## Setting Up Multi-Location ESIC

    
###  Step 1: Enable ESIC Payment Feature

         1. Navigate to **Settings > Compliance Setup > ESIC Payment Settings.**
         2. Enable the **ESIC** payment setting. 
         3. A note will appear: "To enable payment processing for multiple locations, please configure your office locations and ESIC details in the **Company Details** section and enter credentials for these office locations."
        

    
### Step 2: Enable ESIC Feature Flag

         Before using multi-location ESIC, you need to get the feature flag enabled for your organisation.
          
         

         [Contact Payroll Support](mailto:xpayroll@razorpay.com)  for assistance.
        

    
### Step 3: Configure Office Locations

         1. Go to the **Company Details** tab.
         2. Navigate to the office location section.
         
         3. Add each office location with the following details:
            - Office Location Name(mandatory)
            - Office State
            - Office Pincode
            - ESIC Sub-code
            - Nearest ESIC Hospital/Dispensary  

            
            
> **WARN**
>
> 
>             **Watch Out!**
>             
>             Once a location is added, it cannot be modified or removed.
>              Made a mistake? [Contact Payroll Support](mailto:xpayroll@razorpay.com) immediately. Do not create duplicate entries.
>             

            
        

    
### Step 4: Set Up ESIC Credentials

            1. After adding your office locations, navigate to **External Credentials.** 
            2. You'll see a table with columns: Office Location, Sub-code, Username, Password.
            3. For each office location:
            - Select the office location from the dropdown. 
            
            - The ESIC sub-code will be auto-filled based on your selection.
            - Enter the username and password for that specific location.

            Example:
                
            

            | Office Location | Username | Password |
            ---
            | Koramangala   |  [Username] | [Password] |
            ---
            | HSR       | [Username] | [Password] |
            
            

            
> **WARN**
>
> 
> 
>             **Watch Out!**
>             Once an office location is added, it cannot be edited or deleted. You can only add new locations.
>             Before adding an office location:
> 
>             - Double-check all details are correct.
>             - Verify the complete address.
>             - Ensure all information is accurate.
>             
>         
>             If you need to make changes to an existing office location, please [contact us](mailto:xpayroll@razorpay.com) for assistance. However, please first ensure all details are correct before submitting to avoid the need for changes.
>             

            
            
            
             
         

## Employee Office Location Assignment

For multi-location ESIC to work correctly, each eligible employee must be assigned to the appropriate office location.

    
        When adding a new employee:

        1. Office location is a mandatory field in the new onboarding flow. Be very careful while adding your location as you cannot change or delete it afterwards.
        2. Select the appropriate office location for the employee.
        3. Based on the selected location, automation will:
        - Use the corresponding ESIC sub-code and credentials.
        - Register the employee in the correct ESIC portal.
        - Update the employee profile with the registration details.
    
    
        To update existing employees:

            1. Go to the employee's profile.
            2. You cannot update existing locations - [contact us](mailto:xpayroll@razorpay.com) for assistance in updating an existing location.
            3. Save the changes.
    

## ESIC Registration Process

The system automatically handles employee registration based on their assigned office location:
Based on the screenshots, here's the refined documentation for the ESIC registration process:

    
        When an employee doesn't have an existing ESIC IP number:
        
        1. Navigate to **People** → Select the employee → **ESI Registration.**
        2. Select **No** when asked "Does [Employee Name] have a ESIC IP Number?"
        3. Fill in all required information:
            - Bank account details and proof (cancelled cheque/passbook)
            - Personal details (DOJ, mobile, photo, PAN)
            - Address information (present and permanent)
            - Nominee details
            - Dispensary selection
            - Family member details (if applicable)
        4. Click **Request ESIC Addition.**

        Once this is done, the system retrieves the office location, ESIC sub-code, and nearest dispensary from the employee profile. It also:
         - Retrieves the matching credentials for that sub-code/office location.
         - Logs into the ESIC portal using those credentials.
         - Registers the employee under that organisation.
         - Retrieves the IP number and updates the employee record.
    
    
    
        When an employee already has an ESIC IP number from previous employment:
        
        1. Navigate to **People** → Select the employee → **ESI Registration.**
        2. Select **Yes** when asked "Does [Employee Name] have a ESIC IP Number?"
        3. Enter the existing **ESIC IP** number in the field provided.
        4. Fill in the same required information(bank details, personal information, etc.).
        5. Click **Request ESIC Addition.**

        Once done, the system verifies the existing IP number. It then registers the employee under your organisation using the appropriate sub-code credentials.
    

## Contribution File Generation

Once multi-location ESIC is configured, contribution files are automatically generated for each location:

1. The system calculates ESIC contributions as usual.
2. Employees are segregated based on their office location.
3. Separate contribution files with their contribution details are generated for each sub-code/office location.
4. Files are formatted according to government specifications for direct upload.

## Payment Processing

When multi-location ESIC is enabled, the payment automation process works as follows:

1. System identifies that multi-location is enabled.
2. Processes payments one sub-code/office location at a time:
   - Selects a sub-code.
   - Fetches all employees tagged to that location.
   - Retrieves the credentials for that sub-code/office location.
   - Logs in and processes the payment.
3. Repeats the process for all configured sub-codes/office locations.
4. Updates the dashboard with payment status for each location.

## FAQs

    
### Do I need to pay different contribution rates for different locations?

         No. Since ESIC is governed by a central authority, deduction amounts remain the same regardless of the sub-code.
        

    
### Can I add new office locations after enabling multi-location ESIC?

         Yes. You can add new office locations at any time through the Company Details section.
        

    
### How do I handle employee transfers between locations? 

         Update the employee's office location in their profile. The system will automatically use the correct sub-code for future compliance activities.
        

    
### Is there a limit to how many office locations I can configure?  

         No. The system supports an unlimited number of office locations and sub-codes.
