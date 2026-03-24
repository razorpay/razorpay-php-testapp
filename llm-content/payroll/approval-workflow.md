---
title: Set up Approval Workflow in RazorpayX Payroll | RazorpayX Payroll
heading: Create Approval Workflow
description: Check how to set up and operate approval workflows for RazorpayX Payroll.
---

# Create Approval Workflow

You can set up Approval Workflows for processes on the [Payroll Dashboard](https://payroll.razorpay.com/dashboard) to ensure compliance, security and accuracy in critical decision-making. 

    
### Advantages of Approval Workflows

         With approval workflows, you can: 
         - Segregate duties, enforce smoother collaboration and manage teams better. 
         - Promote autonomy, accountability and efficiency. 
         - Mitigate risks associated with critical business decisions. 
         - Ensure compliance and transparency. 
         - Audit financial transactions and ownership to reduce fraud and conflicts of interest. 
        

    
### Approval Workflow Use Cases

         Approval Workflow enables multiple teams to collaborate smoothly with the allowed permissions. It is useful in the following ways: 

         - Approvers can check critical information changes such as updating bank details, salary revision, bonuses, contractor payments and more. 
         - Administrator/s can assign roles and ensure there are approvers to review and audit the request when another user is unavailable in the organisation. 
         - Approvers can verify the payouts made to employees and contractors.
        

## How it Works 

1. Set up [user roles](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/user-roles-workflows.md) in Payroll. 
1. Create and save approval workflows and assign one or two levels of approvers on the Dashboard.
1. Your team/[collaborators](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/user-roles-workflows/#view-collaborators.md)/user roles make a request and send it for the approvers' review. 
1. The approvers receive and approve/reject the request from the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).

## Available Workflows

You can create approval workflows for the following Payroll actions: 

- [Edit Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#additions-and-deductions.md)
- [Finalise Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#execute-payroll.md)
- [Salary Revision](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/run-payroll/#revise-salary.md)

Know more about the [Approver Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/approval-workflow/checklist.md). 

> **WARN**
>
> 
> **Watch Out!**
> 
> You must set up [user roles](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/user-roles-workflows.md) before creating approval workflows. Go to **Settings** → **User Roles & Workflows** → **User Roles** → **EDIT** on the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
> 

## Set Up Workflow

To set up the workflow: 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard) as the admin. 
1. Navigate to **Settings** → **User Roles & Workflows** → **Workflows** → **EDIT**. 
1. On the **Workflows** page, choose a Payroll process from the left menu to set up an approval workflow. 
    ![Approval Workflow Set Up on the Razorpay Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-approval-workflow-setup.jpg.md)

## Create Workflow 

To create an Approval Workflow: 

1. Navigate to the **Workflows** page as shown in [set up](#set-up-and-manage-workflow). 
1. Select the Payroll action from the left menu. 
1. Click **Set-up workflow**. For example, **Edit Payroll**. 
1. On the **Workflows** page:
    1. Enter the names of all the users you want to assign as approvers in the text box. For example, two finance role users, Gauri Kumari and Gaurav Kumar.

        ![Add Approvers on Payroll Dashboard for Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-approval-workflow-add-approvers.jpg.md)
    
        Ensure the users have the appropriate permissions to approve/reject as defined in the [user roles](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/user-roles-workflows.md). 

    1. Select the minimum number of approvals required at this level from the drop-down list. 

        
> **INFO**
>
> 
>         **Handy Tips**
>         
>         If you assign five approvers and choose the minimum number of approvals required as two, then any two of the five approvers can approve the request. 
>         

    
    1. Click **Done**. You can add a second level of approvers if required. 
        
        
### To add Second Level Approvers:

 

            For some payroll actions like providing loans or salary advances, you need approvals from a senior level or cross-functional managers. In such cases, you can add another level of approvers to review the request on the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
            
            To add a second level of approvers: 
            1. Click **+ Add Level 2 Approvers**.
                ![Add Approvers on Payroll Dashboard for Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-approval-workflow-add-approvers.jpg.md)
            1. Enter the names of user roles in the text box. Ensure the approvers have user roles assigned to them.
            1. Select the minimum number of approvals required from the drop-down list. 
            1. Click **Done**.

            You have successfully added a second level of approvers.
            

        
    1. Click **End Workflow & Save**.
        ![Payroll end Approval Workflow process](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-approval-workflow-add-approvers.jpg.md)

You have successfully set up an Approval Workflow.

## Manage Workflows 

You can manage the approval workflows in the following ways:

    
### Edit Workflow

         
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Editing the workflow rejects the pending requests previously created using the workflow. After saving the changes, you must [create the requests](#create-a-request) again. 
>             

            To edit an approval workflow: 

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard) as the admin. 
            1. Navigate to [Workflow settings](#set-up-and-manage-workflow).
            1. Select the Payroll action from the left menu. 
            1. Click **Edit Workflow** on the **Workflows** page. 
                ![Edit Approval Workflow on the Razorpay Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-approval-workflow-edit.jpg.md)
            1. Click **Edit** against the level of approvers and make the relevant changes.
            1. Click **End Workflow & Save**.

            You have successfully edited and saved the workflow.
        

    
### Copy Workflow

         You can copy an existing workflow if the new workflow matches the conditions of an older workflow. 

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard) as the admin.
            1. Navigate to [Workflow settings](#set-up-and-manage-workflow).
            1. Select the Payroll action from the left menu. 
            1. When creating the workflow, click **Copy existing workflow**. 
                ![Approval Workflow Set Up on the Razorpay Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payroll-approval-workflow-copy.jpg.md)
            1. Select an existing workflow from the drop-down list.
            1. Review the workflow and click **End Workflow & Save**.  

            You have successfully copied and saved the workflow.
        

    
### Delete Workflow

         You can delete the workflow if you no longer need an approval workflow for any Payroll action. If there are pending items that require approval, the workflow rejects those requests, post which the workflow gets deleted.

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard) as the admin. 
            1. Navigate to [Workflow settings](#set-up-and-manage-workflow).
            1. Select the Payroll action from the left menu. 
            1. Click **Delete** → **Yes, reject and delete**. 

                ![Delete Workflow modal on the Razorpay Payroll Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-xpayroll-approval-workflow-delete.jpg.md)

            You have successfully deleted the workflow.
        

## Create a Request 

After setting up an Approval Workflow, any member of the organisation can create requests on the Dashboard as necessary. 
- Requests are successfully created only when there are no errors.
- You cannot edit requests after sending them for approval. 

When a maker performs any action requiring approval on the Payroll Dashboard, the assigned approvers receive the notification via email and the Dashboard. Approvers can then view the request on the [Approvals Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/approval-workflow/approvers.md).

## Related Information 

- [Approvals Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/approval-workflow/checklist.md)
- [Approvals Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/approval-workflow/approvers.md)
- [User Roles and Workflows](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/user-roles-workflows.md)
- [Salary Actions in Payroll](@/Applications/MAMP/htdocs/new-docs/llm-content/payroll/salary.md)
