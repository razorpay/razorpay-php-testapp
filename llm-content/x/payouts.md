---
title: RazorpayX | Payouts
heading: About Payouts
description: Create and process payouts on the RazorpayX Dashboard. Understand the payout modes, actions and features.
---

# About Payouts

Payouts are transactions made to contacts. For every payout, you need to specify the amount, the contact, and the payout purpose. You become eligible to make payouts after you sign up, complete the account activation and KYC verification.

A payout transaction is made to a [Fund account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts.md) associated with a [Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md). Contact is the beneficiary (person or institution) and Fund account is the account used for payment transactions.

> **SUCCESS**
>
> 
> **What's New**
> 
> You can now initiate payouts directly to mobile numbers using the [Payout Composite API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-composite/create/phone-number.md). This feature is currently not available on dashboard.
> 

    
### Features and Functions

            Payouts in RazorpayX come with variety of features and functions. You can:
                - [Add attachments](#add-attachments) to your payouts and help customers and clients reconcile payments.
                - [Create Payout Purpose](#create-payout-purpose) as a narration to the payment to give context. You can create new or/and use the existing ones.
                - [Create and view Payout summary](#actions) as created.
                - [Use the various supported payout modes](#payout-modes) to process payouts from RazorpayX Lite and Current Account.
                - [Make payouts in Test Mode](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode/#payouts.md) to understand the payout process and life cycle.

            If a payout fails at any stage, [a reversal is created](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle#reversal-transaction.md), which ends with the debited balance being credited back to your RazorpayX account.

            The payout amount, fees and tax are deducted from your RazorpayX account balance. These appear as a debit against your RazorpayX account. Know more about [Billing in RazorpayX](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/billing.md).
        

> **WARN**
>
> 
> **Watch Out!**
> 
> - Making payouts from [RazorpayX Lite](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/razorpayx-lite.md) account to RazorpayX Lite Customer Identifiers or Razorpay [Customer identifiers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect.md) is not supported.
> - The payout modes are case-sensitive. When creating payouts using APIs, ensure payout modes are entered in upper case.
> 
> 

## How to Make Payouts

You can make payouts in 3 simple steps:

1. Add funds to your business account.
2. Create a Contact and a Fund account. This is similar to adding a beneficiary on your netbanking portal. Know more about adding [ Contacts and Fund accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md).
3. Make a payout.

![Create Payout by adding funds → create Contact and Fund Account → create Payout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-create-payout.jpg.md)

> **INFO**
>
> 
> 
> **Payouts Demo**
> 
> [Check out the RazorpayX Payouts Demo](https://x.razorpay.com/demo?utm_source=docs&utm_medium=fold&utm_id=demo) to understand how to create and make payouts in 4 simple steps. Experience making payouts in a jiffy, without having to sign up!
> 
> ![Demo of RazorpayX, showing how to make a payout in Live mode.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-payouts-demo.gif.md)
> 
> 

### Create a Payout

Watch the video to know how to create payouts.

[Video: https://www.youtube.com/embed/uJfaqH64BLE]

To make a Payout:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. You can navigate to Payouts in two ways:
    - Click **+ Payouts** on the top-right side of the Dashboard or
    - Hover over Payouts on the left navigation and click **+**.
    - You can also click Payouts on the left navigation and then click **+ Payouts** on the left side.
3. Select an existing contact or [create a new one](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts#create-a-contact.md).
4. Hover over the fund account to which you want to make the payout and click **NEXT** or [**+ FUND ACCOUNT**](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts#update-a-contact-and-fund-account.md) as per requirement.
5. Enter the total amount to be paid and click **Next**.
6. Select the Payout Details:
    - Payout Purpose (_mandatory_)
    - Debit from (_mandatory_)
    - Transfer Type (_mandatory_)
    - Attachment (_optional_)
    - Additional details (_optional_)
7. Click **Next**. An OTP is sent to your registered mobile number and email id. Enter the OTP to confirm the Payout.
8. Click **Pay**.
    

> **INFO**
>
> 
> **Is your payout in `processing` state?**
> 
> You can check status details of a payout to know why it is in the `processing` state.
> 
> 1. [Status Details via API](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
> 2. [Status Details via Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/status-details.md)
> 3. You can subscribe to daily reports to receive a detailed document on the status, reason for status and SLA for the payouts in `processing state`. [Raise a support ticket](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) from the Dashboard, with a list of recipient email IDs. We will enable the function for you in 3 working days.
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> If you get the below response while trying to complete a payout, it is recommended to wait for sometime and retry the payout if required, after the status is updated on the Dashboard.
> 
>  ![Payout in progress](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/5xx.jpg.md)
> 
> 
> 

### Payout Purpose

You can add a payout purpose as a narration to the payout as it leads to easier reconciliation. You can choose an existing purpose or create a new one while making the payout itself. **You can add up to 400 Payout Purposes.**

    
### Create Payout Purpose

         To create payout purpose via the Dashboard:

        1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
        2. Navigate to **Payouts** on the left navigation and click the more options (**⋮**) menu.
        3. Click **Create New Purpose**.
            ![Create New Payout Purpose](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-create-new-purpose.jpg.md)
        4. Enter name for the purpose.
        5. Click **CREATE PAYOUT PURPOSE**.
            ![Create Payout Purpose](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-create-payout-purpose-final.jpg.md)

            The payout purpose is created. 

        Alternately, you can also assign a payout purpose while creating a payout. Select purpose from the Payout Purpose drop-down menu or click **+ ADD PAYOUT PURPOSE** to create a new one.

    ![Select Payout Purpose](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/choose-payout-purpose.jpg.md)
        

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot delete or edit a Payout Purpose once it is created.
> 

    
### Upload Attachments During Payout Creation

         To add attachments during the payout creation process: 

        1. On your Dashboard, [create a Payout](#how-to-make-payouts).
        2. In the **Payout Details** page of creating a payout, add files against **Attachment**, as shown. 
            - You can upload files with `.pdf`, `.jpg`, `.jpg`, `.doc` and `.xls` extensions.
            - The supported file size is upto 5 MB.
            - Drag and drop the file or click **browse** to upload it from the system. 

    
            The image below shows how to add an attachment during the payout creation process. You can also add [after creating payouts](#upload-attachments-after-payout-creation).

            ![Payout Details asking (compulsory) Payout Purpose, Debit Account, Transfer Type and (non-compulsory) Attachment.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payouts-add-attachments.jpg.md)
        3. Add other details in **+ ADDITIONAL DETAILS** if required and click **NEXT**. Enter the OTP and proceed to pay.
        

    
### Upload Attachments After Payout Creation

            To add attachments after the Payout is created: 
            1. In you Payouts Dashboard, click on the Payout you want to add an attachment to.
            1. Navigate to **Attachment** in pop-up page that appears to the right. 
            1. Click **Upload** and upload the attachment file. The supported file type remain [as mentioned above](#upload-attachments-during-payout-creation).

        ![Payout summary pop-up showing Payout details and highlighting Attachment and Upload](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payouts-add-attachment-2.jpg.md)

        

## Cancel Payouts

You can cancel the payouts in a [`queued`](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle#queued.md), [`pending`](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle#pending.md) or [`scheduled`](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle#scheduled.md) state only.

    
### Cancel Payout

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).

        Either: 

        2. Navigate to **Payouts**.
        3. Hover over the payout you want to cancel and click **CANCEL**. Your payout is cancelled.
            ![Cancel Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-cancel-payouts.jpg.md)

        Or you can also:

        2. Select the payout you want to cancel.
        3. Click **CANCEL PAYOUT** on the right pane. Your payout is cancelled.
            ![Cancel Payouts from RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-cancel-payouts-2.jpg.md)
        

### Actions

Action | API | Dashboard | RazorpayX Mobile App | Bulk Upload
---
Create a Payout | ✓ | ✓ | ✓ | ✓
---
View payout details | ✓ | ✓ | ✓ | x

Know more about creating [payouts using APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts.md) and [payouts in bulk](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts/bulk-uploads.md).

## Payout Modes and TAT

You can make payouts using any one of the following payout modes (IMPS/RTGS/NEFT/UPI). The transaction limits and operating hours for each payout mode is listed below.

    
### RazorpayX Lite

         The transaction limits and operating hours for different payout modes for [RazorpayX Lite](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/#virtual-account.md) are as below:
         

         
            
                When the payout mode is IMPS for the following conditions:
- **Fund account type**: `bank_account`
- **Amount limit**: Upto ₹5 lakh (per transaction)

The transaction is processed to the fund account immediately on all days, 24x7.
            
            
                When the payout mode is NEFT for the following conditions:
- **Fund account type**: `bank_account`
- **Amount limit**: Above ₹1 (per transaction)

Transactions are processed to fund accounts within 2 hours, if initiated on working days between 2:00 am and 6:00 pm. 
            
            
                When the payout mode is RTGS for the following conditions:
- **Fund account type**: `bank_account`
- **Amount limit**: Above ₹2 lakh (per transaction)

 Transactions are processed to fund accounts within 2 hours, if initiated on working days between 2:00 am and 6:00 pm.
            
            
                When the payout mode is UPI for the following conditions:
- **Fund account type**: `vpa`
- **Amount limit**: Upto ₹1 lakh (per transaction)

The transaction is processed to the fund account immediately on all days, 24x7.
            
            
                When the payout mode is NEFT for the following conditions:
- **Fund account type**: `wallet`
- **Amount limit**: Upto ₹10,000 (per transaction)

The gift card is sent to the fund account immediately.
            
         
        

    
### Current Account

         The transaction limits and operating hours for different payout modes for [Current account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/#current-account.md):
            

         
            
                When the payout mode is IMPS for the following conditions:
- **Fund account type**: `bank_account`
- **Amount limit**: Upto ₹5 lakh (per transaction)

The transaction is processed to the fund account immediately on all days, 24x7. 
            
            
                 When the payout mode is NEFT for the following conditions:
- **Fund account type**: `bank_account`
- **Amount limit**: Above ₹1 (per transaction)

The transaction is processed to the fund account within 2 hours if initiated on working days between:-  2:00 am and 6:00 pm ( from **IDFC First Bank** or **RBL** Accounts)
-  1:00 am and 6:45 pm (from **ICICI Bank** or **Yes Bank** Accounts) 

[Contact support](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) for enabling **NEFT 24 * 7** in RBL and Yes Bank accounts.
            
                
                    IDFC First Bank Holiday List
                    
                    - January 26, 2026 (Republic Day)
                    - August 15, 2026 (Independence Day)
                    - October 2, 2026 (Gandhi Jayanti)
                    - All Sundays
                    - All 2nd and 4th Saturdays
                    

                
### ICICI Bank Holiday List

                    - January 26, 2026 (Republic Day)
                    - August 15, 2026 (Independence Day)
                    - October 2, 2026 (Gandhi Jayanthi)
                    - December 25, 2026 (Christmas)
                    - All Sundays
                    - All 2nd and 4th Saturdays
                    

                
### Yes Bank Holiday List

                    - January 26, 2026 (Republic Day)
                    - August 15, 2026 (Independence Day)
                    - October 2, 2026 (Gandhi Jayanthi)
                    - All Sundays
                    - All 2nd and 4th Saturdays
                    

                
### Axis Bank Holiday List

                    - January 26, 2026 (Republic Day)
                    - August 15, 2026 (Independence Day)
                    - October 2, 2026 (Gandhi Jayanthi)
                    - All Sundays
                    - All 2nd and 4th Saturdays
                    

                
### RBL Holiday List

                    - January 26, 2026 (Republic Day)
                    - August 15, 2026 (Independence Day)
                    - October 2, 2026 (Gandhi Jayanthi)
                    - December 25, 2026 (Christmas)
                    - All Sundays
                    - All 2nd and 4th Saturdays
                     

                
### Slice Holiday List

                    - Operational on all days regardless of bank holidays.
                    

            
            
            
                 When the payout mode is RTGS for the following conditions:
- **Fund account type**: `bank_account`
- **Amount limit**: Above ₹2 lakh (per transaction)

The transaction is processed to the fund account within 30 minutes, if initiated on working days between:-  2:00 am and 6:00 pm ( from **IDFC First Bank** Accounts)
-  9:30 am and 5:15 pm (from **ICICI Bank** Accounts)
-  7:00 am and 6:30 pm (from **Yes Bank** Accounts) 
-   8:00 am and 5:30 pm (from **RBL** Accounts) 

RTGS holidays: 2nd and 4th Saturdays and all Sundays for all banks. 
            
            
                Currently, the UPI facility is available only for RBL and Yes Bank Current Accounts.
When the payout mode is UPI for the following conditions:
- **Fund account type**: `vpa`
- **Amount limit**: Below ₹1 lakh (per transaction)

The transaction is processed to the fund account immediately on all days, 24x7.
            
         
        
    

### Related Information

- [Payout Life Cycle and States](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle.md)
- [Payout Status](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/status-details.md)
- [Payout Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/best-practices.md)
