---
title: RazorpayX Payroll Insurance Integration with Plum
heading: Integrate with Plum
description: Check the insurance policy, plans, prerequisites and post-purchase.
---

# Integrate with Plum

Payroll covers insurance for all your employees.

## Policy and Plan Design 

Following are the policies and plan designs available as a part of the Payroll-Insurance plan. 

### Policy Design

There are three policy design options:

S. no. | Plan | Description
---
1 | **E Plan** | Covers employees only.
---
2 | **ESC Plan** | Covers employees, spouses and up to 4 dependent children.
---
3 | **ESCP Plan** | Covers employees, spouses, up to 4 dependent children, and 2 parents or in-laws.
---

### Insurance Plan

There are three plans available:

S. no. | Plan | Description
---
1 | **Starter** | Covers all basic health insurance benefits after a 30-day waiting period. Pre-existing diseases are covered after 1 year.
---
2 | **Essential** | Starter benefits + pre-existing coverage from day 0, no pre-disease capping or waiting period.
---
3 | **Premium** | Includes all previous benefits + maternity and day 1 newborn cover.

All employees between 18 to 80 years and dependent children between 3 months to 25 years can be covered. In the Premium plan, dependent children can be covered from birth.

> **WARN**
>
> 
> **Watch Out!**
> 
> - Cross-selection between parents and in-laws is not allowed. You cannot take policies for specific family members either. 
> - Under the ESC plan, you must cover the spouses of all married employees and all dependent children. 
> - The total number of parents should be 1.6 times the number of employees. For example, if your organisation covers the parents of 10 employees, you must cover at least 16 parents in the policy.
> - [Contractors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#differences-between-employee-and-contractor) are not covered in the insurance plans. 
> 

## Prerequisites

1. Your organisation must be using RazorpayX Payroll for all the salary transfers and applicable [compliances](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md).

1. Your organisation must have 2 or more full-time employees. 
    - The Starter plan is available for organisations with at least 2 employees. 
    - Essential and Premium plans are available for organisations with at least 5 employees.

## Post Purchase

Refer to the best practices to follow as an admin and an employee after you have purchased the suitable plan. 

### Information for Administrators

Below are a few important points to note post-purchase: 

1. **Coverage**: Your team coverage is active from when the payment is made successfully to the insurer. The state of the payment is reflected in the **Reports** → **Ledger** and on the [Payroll Dashboard](https://payroll.razorpay.com/insurance/admin/details).

2. **Payment Receipt**: We generate a payment receipt for the insurance payment. This receipt is available in the **Ledger** and is attached along with the transaction for the insurance purchase.

3. **Admin Onboarding**: For new employees who join your organisation and their dependents, you can add them to your insurance plan directly from the [Payroll Dashboard](https://payroll.razorpay.com/insurance/admin/details).

### Information for your Team

1. **Employee Onboarding**: Your team receives onboarding emails from Plum, our insurance partner. The [Plum app](https://app.plumhq.com/) serves as a one-stop solution for your teams' insurance requirements.
    - You can access their insurance, view inclusions and exclusions of the insurance policy, get support for their queries and even initiate requests for an insurance claim.
    - Your team can log in to the [Plum app](http://app.plumhq.com/) using the same email address that they use for Payroll.

2. **Digital Health IDs**: Generating digital health IDs takes up to 14 working days. These IDs are available to your team members on the [Payroll Dashboard](https://payroll.razorpay.com/insurance/user/insuranceDetails) and the [Plum app](http://app.plumhq.com/). 

3. **Claims**: Your team can initiate their request directly from the [Plum app](http://app.plumhq.com/). They can alternatively reach out to Plum at `care@plumhq.com`. 

## Insurance Payment Invoice

The insurance on Payroll is under a master policy held by Razorpay.

- Due to the nature of this policy, we provide a payment receipt for the complete premium payment. Razorpay generates this receipt for facilitating the transaction with the insurer. 
- We also issue a certificate of insurance containing the premium and GST details at an employee level. 

You can use a combination of these for your accounting purposes.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - You cannot claim GST input credit on health insurance premium payments.
> - You cannot avail 'No Claim Bonus'. 
> - The insurance policies cover treatments and hospitalisations in India only.
> 

## Benefits of Plan

1. Room and ICU rent limit:
    - There are no further sub-limits within these limits.
    - ICICI Lombard has [6500+ hospitals where cashless facilities are available](https://www.icicilombard.com/cashless-hospitals). 
 In the Plum app, your employees can search for the nearest hospital from their current location.

    The following table shows the Limit and concerned Insured Amount.

        
        Limit | Insured Amount
        ---
        Room | 2%
        ---
        ICU | 4%
        

2. **Refund**:
    
    The refund process takes 2-3 weeks from the employee's exit date. This involves ICICI Lombard (the insurer) checking for employee's insurance claims, if any. Refunds are not issued if the employee has made insurance claims. 
    
    After confirmation, you receive a prorated refund for the remaining time in the 1-year policy period.

    For instance, if the annual premium for a 30-year-old member is ₹2,000 and the employee leaves after 6 months, you will get a refund of ₹1,000. 

3. **Adding employees**:

    When you add employees to Payroll, their dependants are also added to the insurance coverage. More dependants can be added as per the plan, only in the event of marriage or childbirth. 
    
    The admin must finalise the purchase for these new employees. Premiums for new employees are charged annually and the cover is active for 1 year from the payment date.

4. Insurance covers require a minimum 24-hour hospitalisation and do not cover OPD visits, health checkups, or non-hospitalisation-related medicines.

5. There is no limit on the number of insurance claims an employee can make during the policy period. However, the maximum amount is restricted to the sum insured for the year.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Health ID cards are not required for initiating a claim. 
> - Both cashless treatments and reimbursement claims are available.
> - The ICICI Lombard plan covers [150 daycare procedures](https://www.icicilombard.com/health-insurance/ListOfDayCareSurgeries.pdf). Treatments like chemotherapy, dialysis, cataract surgery, kidney stone removal and so on are called daycare procedures as they are performed without requiring 24-hour hospitalisation.
> 

### Related Information

- [Income Tax Declaration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md#income-tax-declaration) 
- [Salary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/salary.md)
