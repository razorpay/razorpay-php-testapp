---
title: Setup and manage Voluntary Provident Fund in RazorpayX Payroll
heading: Voluntary Provident Fund (VPF)
description: Set up and manage voluntary provident fund contributions in RazorpayX Payroll.
---

# Voluntary Provident Fund (VPF)

Voluntary Provident Fund (VPF) is an additional contribution made by employees over and above the mandatory Employee Provident Fund (EPF). It is a tax-saving instrument that allows employees to contribute more towards their retirement savings while enjoying tax benefits under Section 80C of the Income Tax Act.

    
### VPF Eligibility

         Any employee who is already enrolled in the Employees' Provident Fund (EPF) scheme is eligible to contribute to VPF. The employee must have:
            - An active Universal Account Number (UAN)
            - An existing EPF contribution

         VPF contribution is completely voluntary and is initiated at the employee's request.
        

    
### VPF Contribution Limits

         Employees can contribute any percentage of their PF wages towards VPF with the following conditions:
         
         - Minimum: 0% of PF wages
         - Maximum: 88% of PF wages

         There is no absolute maximum amount limit, but the percentage-based restriction applies. The declaration can be maximum of ₹5,903 (88% of PF wages) for employees whose PF is calculated on the standard ₹15,000 limit.

         The VPF contribution amount will be deducted from the employee's monthly salary in addition to the regular EPF deduction.
        

    
### Tax Benefits of VPF

         VPF offers excellent tax benefits under the Income Tax Act:
         
         - VPF contributions qualify for tax exemption under Section 80C of the Income Tax Act in the old tax regime.
         - VPF contributions are not tax-exempt under the new tax regime.
         - The interest earned on VPF is tax-free up to certain limits.
         - The maturity amount received is also tax-free under certain conditions.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          The tax benefits for VPF apply only to the old tax regime. If an employee has opted for the new tax regime, they will not receive tax exemptions for their VPF contributions.
>          

        

## Setup VPF

Before employees can contribute to VPF, ensure that your organisation has properly set up the Provident Fund in RazorpayX Payroll.

To enable VPF for your organisation:

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
2. Go to **Settings** → **Payments & Compliance Setup**. Click **EDIT**.
3. In the **Compliance Payments Settings** section, select the applicable option under **PF Settings.**
    Check the following options as needed:
        -  Include employer contributions to PF in employee CTC.
        - Include PF with a senior margin in employee CTC.
        - Use only basic salary for calculating PF (optional).
        -  Use PF limit of ₹15,000 while calculating contributions.
        -  Select the **Allow employees to update Voluntary PF** option.
        ![Setup VPF option for employees](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/vpf-setup.jpg.md)
4. Click the **Save** button at the bottom of the section to apply your changes.

Once PF is properly set up, employees can opt in for VPF contributions.

> **WARN**
>
> 
> **Watch Out!**
> 
>     Note that even if the organisation has switched off VPF contribution, admins can still edit the VPF.   However, it is not possible for employees to make these changes themselves.
> 

## Manage VPF

    
### Opt In for VPF

         Employees can opt in for VPF contributions through their dashboard or request HR/Admin to enable it. 

         To enable VPF for an employee:
            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            2. Navigate to **People** from the left menu.
            3. Open the employee's profile and navigate to their **Compensation** tab.
            4. Click on the **Deductions** tab to view all deduction options.
            5. Locate the **Voluntary PF** section and click **Opt in to VPF**.
             ![VPF contribution dialog box](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/opt-in-vpf.jpg.md)
               
            6. In the **Voluntary PF** dialog box that appears:
               - Enter the **Monthly Contribution** amount the employee wishes to contribute.
               - Note the declaration can be maximum of 88% of PF wages.
               - Check the confirmation box.
             ![Opt in to VPF on Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/vpf-opt-in.jpg.md) 
            7. Click **Opt in** to confirm.

         The VPF contribution will be applied from the next salary cycle.
        

    
### Modify VPF Amount

         Employees can request to modify their VPF contribution amount at any time. To modify the VPF amount:

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            2. Navigate to **People** from the left menu.
            3. Open the employee's profile and navigate to their **Compensation** tab.
            4. Click on the **Deductions** tab to view all deduction options.
            5. Locate the **Voluntary PF** section and click **Manage VPF**.
                ![Modify VPF amount option](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/vpf-modify2.jpg.md)
            6. From the drop-down menu, select **Modify VPF amount**.
            7. In the **Modify VPF amount** dialog box:
               - Enter the new **Monthly Contribution** amount.
               - Note the declaration can be maximum of 88% of PF wages.
               - Check the confirmation box if not already checked.
               ![Modify VPF amount option](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/vpf-modify3.jpg.md)
            8. Click **Modify** to save the changes.

         The modified VPF amount will be effective from the next salary cycle.
        

    
### Opt Out of VPF

         Employees can choose to opt out of VPF contributions at any time. To opt out of VPF:

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            2. Navigate to **People** from the left menu.
            3. Open the employee's profile and navigate to their **Compensation** tab.
            4. Click on the **Deductions** tab to view all deduction options.
            5. Locate the **Voluntary PF** section and click **Manage VPF**.
            6. From the drop-down menu, select **Opt out of VPF**.
               ![Opt out of VPF option](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/opt-out-vpf2.jpg.md)
            7. Click **Opt out** to confirm or **Cancel** to go back.
         After opting out, the VPF contribution will stop from the next salary cycle.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          When VPF configuration is disabled by your organisation, employees will see a message stating "VPF configuration is disabled by your organisation. Contact admin for further details." In such cases, the organisation admin must enable VPF settings first.
>          ![Confirm opt out of VPF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/vpf-disabled.jpg.md)
>          

        

    
### VPF Processing

         Once VPF is enabled and the contribution amount is set:

            - The specified VPF amount is deducted from the employee's monthly salary, in addition to the regular EPF deduction.
            - Both EPF and VPF contributions are processed together and remitted to the employee's PF account.
            - VPF contributions are visible in the employee's payslip under the deductions section.
            - The VPF amount is included in the ECR file generated for PF payments.

         No separate payment process is required for VPF as it is processed along with the regular PF contributions.
        

    
### VPF in Tax Declarations

         VPF contributions are automatically included in tax declarations under Section 80C for employees on the old tax regime:

            1. The VPF amount is automatically added to the total EPF contribution for tax calculation purposes.
            2. The combined EPF and VPF contributions are shown in the Form 16 under Section 80C deductions (for old tax regime only).
        

    
### Troubleshooting VPF Issues

         Common VPF issues and their solutions:

            1. **VPF not showing in payslip:**
               - Verify that the VPF opt-in was completed before the payroll processing date.
               - Check if the PF settings are properly configured for the organisation.
               - Ensure the employee has an active UAN and is enrolled in EPF.

            2. **Unable to modify VPF amount:**
               - Check if there are any organisation-level restrictions on VPF modifications.
               - Verify that the requested amount is within the allowed limits (maximum 88% of PF wages).
               - Ensure the modification request was made before the payroll cut-off date for the month.

            3. **VPF not reflecting in tax declarations:**
               - Verify that the employee is on the old tax regime where VPF tax benefits apply.
               - Check if the VPF contributions have been properly processed in previous payroll cycles.

            If issues persist, [Contact support](#contact-support) for assistance.
        

### Related Information

- [Provident Fund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/provident-fund.md)
- [Statutory Compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md)
