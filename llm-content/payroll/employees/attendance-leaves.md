---
title: Razorpay attendance and apply leaves as an employee on the Payroll Dashboard | RazorpayX Payroll
heading: Attendance & Leaves
description: Use the RazorpayX Payroll Dashboard as an employee to check attendance and apply for leaves.
---

# Attendance & Leaves

Leaves and attendance form a critical part of every employee's payslip and personal management. On the Payroll Dashboard, you can: 

- [Mark attendance](#mark-attendance)
    - [Update/Edit attendance for a past date](#edit-attendance)
    - [Delete incorrect attendance information](#delete-attendance)
- [Apply for leaves](#apply-for-leaves)
    - [Apply for leaves in bulk](#apply-leaves-in-bulk)
    - [View Leaves Status](#leave-status-indicator)
    - [View leave balance](#view-leave-balance)
- [Delete Leave & Attendance modification requests](#delete-requests)

Once you apply for leaves, they are sent to your managers for approval as configured under **Profile** → **Basic Information**. Both administrators and your manager can approve leave requests.

> **SUCCESS**
>
> 
> **Available Now!**
> 
> Watch the video on to how to [mark attendance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/video-tutorials.md#mark-and-modify-attendance) and [apply for leaves](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/video-tutorials.md#apply-for-leaves).
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> - If your organisation has integrated [Payroll with Slack](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations/slack.md), you can update your leaves and attendance from within the Slack App. Refer to the [leave commands](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations/slack.md#how-it-works).
> - You can check in and check out of your organisation via the biometric device, if your organisation has enabled it.
> 

## Mark Attendance 

To mark attendance:
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Navigate to **Attendance** in the left menu.
2. Use the **CHECK IN** and **CHECK OUT** options on the **Leave & Attendance** page to mark attendance for the day. You can also edit it on a future date and send it for approval.
    ![Check in and check out for attendance RazorpayX Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-mark-attendance1.jpg.md)

You have successfully marked your attendance for a single day. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you allow Payroll to access your device's location. Click **Allow** in the pop-up modal during check in and check out.
> 

#### Manage Attendance 

You can edit and delete incorrect attendance data on the Payroll Dashboard. After you make changes to your attendance, we send your request to your manager for approval.

    
### Edit Attendance

         You can edit attendance for a past date to update your attendance information.

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
            1. Go to to **Attendance** in the left menu → [**Attendance** table](#attendance-table).
            1. Navigate to the specific date for which you want to edit attendace. Click the edit icon in the **Edit** column against that date.
            1. In the **Change Attendance** pop-up window, update you attendance/leave information.
                ![Apply leave on RazorpayX Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-leave-apply.jpg.md)

            This successfully raises the edit attendance request to the admin/manager for approval.
        

    
### Delete Attendance

         You can delete attendance for a specific date if you have added and saved your attendance for the incorrect date.

            1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
            1. Go to **Attendance** in the left menu.
            1. Navigate to the specific date for which you want to delete your attendace. Click the edit icon in the **Edit** column against that date.
            1. In the **Change Attendance** pop-up window, click **DELETE ATTENDANCE**.
                ![Apply leave on RazorpayX Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-leave-apply.jpg.md)

            This successfully raises the delete attendance request to your admin/manager for approval.
        

    
### View Attendance

         After you mark your attendance for the day, we update the **Attendance** table. To view the attendance information for a specific date, navigate to the specific date in the table.

            Here you can view the **Date**, **Status**, **Check In** and **Check Out** times. We automatically update the **Duration** and add the **Remarks** provided by you or your manager in the specific columns.

            ![RazorpayX Payroll apply for leave](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-attendance-apply.jpg.md)
        

## Apply for Leaves

To apply for a leave:
1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
1. Go to **Attendance** in the left menu.
1. In the [**Attendance** table](#attendance-table), find the date on which you are on leave. Click the edit icon in the **Edit** column.

    ![RazorpayX Payroll apply for leave](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-attendance-apply.jpg.md)
1. In the **Change Attendance** pop-up modal: 
    1. Select the **Status**. Select the leave to avail from the drop-down menu.
    1. Leave the **Check In** and **Check Out** times blank.
    1. Enter **Remarks** as applicable.
    1. Click **SEND REQUEST**.

    ![Apply leave on RazorpayX Payroll Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-leave-apply.jpg.md)

This successfully creates a leave request for the chosen date. We update your attendance calendar after your manager/HR's approval. 

#### Manage Leaves 

You can edit and update, or delete your leave and leaves modification requests on the Payroll Dashboard. 

    
### Apply Leaves in Bulk

         To apply for leaves in bulk: 
         1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard).
         1. Go to **Attendance** in the left menu → [**Attendance** table](#attendance-table).
         1. Click **here** under the **Attendance** heading.

             This opens the **Apply for Leave** pop-up modal.
         1. Select the **From Date** and **To Date** in the modal. 
         1. Click **SEND REQUEST**.

         ![Update bulk leaves on Razorpay Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-bulk-leave.jpg.md)
        

    
### Leave Status Indicator

         Payroll indicates attendance/leaves using the following colours:

            
            Colour | Description
            ---
            Green | Indicates `Present` days.
            ---
            Red | Indicates `Approved`leave days.
            ---
            Brown | Indicates `Pending Approval` from the Manager.
            

            ![Razorpay Payroll leave status indicators](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-leave-codes.jpg.md)
        

    
### View Leave Balance

         To view leave balance, click **VIEW LEAVES TAKEN** in the right pane. You can view the leaves taken and available balance in the **Leaves Taken** pop-up modal.
        

## Delete Requests

When you modify your attendance or add a leave, we raise the leave as a request with your manager. You can also choose to delete the request before your manager's approval.

1. Go to the **Open Requests** section on the **Leave & Attendance** page.
1. Select the check box against the list requests you have raised to delete them. 

![Modify leave request. Select the check box to update on Razorpay Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payroll-employees-leave-request.jpg.md)

### Related Information

- [Employee Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md)
- [Slack Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations/slack.md)
- [IT Declarations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees/declarations.md)
