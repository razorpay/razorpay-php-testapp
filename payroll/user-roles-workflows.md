---
title: Check User Roles, Permissions and Workflows available in RazorpayX
heading: User Roles & Workflows
description: Create, edit, delete and manage user roles on the Razorpay Dashboard.
---

# User Roles & Workflows

You can customise pre-existing user roles, modify the permissions and set up workflows on the Dashboard. After sign up, the following roles are immediately available: 

- Administrator
- Human resources
- Payroll 
- Report Viewer 
- Reimbursements
- Chartered Accountant 

Provide special access, like [administrator permissions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart.md), to the people in your team. You can also [create custom roles](#create-user-roles). This is available with the [Elite and Enterprise Plans](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/plans.md) only. 

Explore how you can assign user roles, create custom roles and more. 

## User Role Actions 

Following are the user role actions available to you on the Dashboard. 

### Create User Roles

To view the user roles available on the Dashboard:

1. Log in to the Payroll Dashboard.
1. Navigate to **Settings** from the left menu.
1. Go to the **User Roles** section. Click **CREATE/EDIT ROLES**. 

    On the User Roles & Permissions page, you can:

    
        
            1. Click the user role. The **Manage Role** page opens. 
            1. Under each section, select the permissions applicable for the role. 
                
            1. Click **SAVE CHANGES** to finalise the changes. 
        
        
            1. Click **+ CREATE NEW ROLE**. 
            1. You can either: 
                - Create a blank role and set permissions manually. 
                - Use the existing user roles and permissions as a template. 
                
            1. On the **Manage Role** page, add a role name, set/modify the permissions and click **SAVE CHANGES**.
        
    
1. Enter the OTP you receive at your registered email address/authenticator app and authorise the changes.

You have successfully created a user role. 

### Assign User Roles 

To assign the user roles you have created:

1. Log in to the Payroll Dashboard.
1. Navigate to **People** and select the employee you want to assign the role to. 
1. In the employee's profile, go to **User Roles & Permissions** → **EDIT**. 
1. Select a role to assign from the drop-down list. 
    

You have successfully assiged a new role to the employee. 

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> Ensure that the person you provide special access/role/permissions to is already a part of your organisation's payroll. Know more about [adding people to Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart.md#add-all-employees). 
> 

### Edit User Roles 

You can modify the permissions of all the available user roles. 

1. Log in to the Payroll Dashboard.
1. Navigate to **Settings** from the left menu.
1. Go to **User Roles** → **CREATE/EDIT ROLES**. 
1. Click the role you must modify. The **Manage Role** page opens. 
1. Select or clear the check boxes to modify the permissions for that role. 
    
1. Enter the OTP you receive at your registered email address/authenticator app and click **SAVE CHANGES**. 

You have successfully modified the user role.

### Delete User Roles

When the role is no longer required, you can delete the role from the Dashboard in the following way: 

1. Log in to the Payroll Dashboard.
1. Navigate to **Settings** from the left menu.
1. Go to **User Roles** → **CREATE/EDIT ROLES**. 
1. Click the role you must modify. The **Manage Role** page opens.
1. Click **DELETE ROLE**.
    

You have successfully deleted a user role. 

> **WARN**
>
> 
> **Watch Out!**
> 
> You can delete custom user roles only. 
> 

## Setup Workflows 

With user roles, you can also set up workflows on the Dashboard. For example, you can allow one employee to only edit the payroll, and allow another employee to only finalise the payroll. 

To set up workflows:

1. Log in to the Payroll Dashboard.
1. Follow the steps to [create custom role](#create-user-roles) for both these actions. You must create separate user roles for each of them. 

You have successfully created a user role workflow. [Assign the user role](#assign-user-roles) to the specific employee in your organisation. 

## View Collaborators

You can also view the list of people who have special user roles assigned to them. To do so, navigate to **Settings** → **Collaborators**.
    

Once your users are all setup, you can start configuring their documents, leaves and attendance in [Leave Setup](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/leaves.md).

### Related Information

- [Audit Reporting](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/audit-reporting.md) 
- [Human Resources](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md)
