---
title: Payments Dashboard | Manage Team
heading: Manage Team
description: Manage your team, add or remove users and provide appropriate roles to control access on the Razorpay Dashboard.
---

# Manage Team

Manage your team of users who can access the Dashboard. You can provide specific access to a user or a set of users.

**Example**

You need someone in your organisation to perform day-to-day operations such as handling refunds and settlements. In this case, you can give Dashboard access to a person and assign the **Operations** role. This limits their access to actions related to refunds and settlements only.

## Standard User Roles

There are some predefined user roles that you can assign to your team members. You can use these roles to limit a user's access to the Dashboard. Check each role and the permissions associated with it. 

    
### Owner

         **Actions Allowed**
         
         - Generate API keys

         - Create and manage webhooks

         - Manage teams

         - Update brand name

         - Edit activation form details, including bank account details and GST number, before submission

         - View all transactions and settlements

         
         
         
         - Configure payment capture settings

         - Configure payment methods

         - Capture transactions

         
         - Create and manage  Payment Pages and Payment Links.

         
         - Create and upload batch files

         - Download and email reports

         
         
         
         - View and download API/webhooks logs (Developers > APIs/Webhooks)

         
        

    
### Pseudo Owner

         The Pseudo Owner role provides full owner-level access to trusted team members for business continuity when the primary owner is unavailable (on leave, travel or emergencies). This role has identical permissions to the Owner role with enhanced audit tracking.
         
         **Actions Allowed**
         
         - All permissions identical to Owner role

         - Generate API keys

         - Create and manage webhooks

         - Manage teams (invite, modify, deactivate users)

         - Update brand name

         - Edit activation form details, including bank account details and GST number

         - View and modify settlement bank account details

         - View all transactions 

         
         
         
         - Configure payment capture settings

         - Configure payment methods

         - Capture transactions

         
         - Create and manage  Payment Pages and Payment Links.

         
         - Create and upload batch files

         - Download and email reports

         
         
         
         - View and download API/Webhooks logs

         
         
         **Actions Not Allowed**
         
         - Delete the primary owner account

         
         
         
> **WARN**
>
> 
>          **Watch Out!**
>          
>          - Maximum of 2 Pseudo Owners allowed per Razorpay account.
>          - Assignment requires additional authentication (OTP/2FA).
>          - Owner receives email confirmation when a Pseudo Owner is assigned.
>          - All actions are logged with "Pseudo Owner" designation for audit purposes.
>          
>          

         
        

    
### View-Only (Auditor)

      The View-Only role provides complete visibility into all Dashboard data without any ability to perform actions or make changes. This role is designed for stakeholders who need to monitor, review or audit your payment operations.
      
      **Actions Allowed**
      
      - View all transactions 

      
      - View analytics and insights

      - View configuration and settings pages (read-only)

      - Navigate all Dashboard sections

      
      
      **Actions Not Allowed**
      
      - Generate API keys

      - Create and manage webhooks

      - Manage teams

      - Capture transactions

      
      
      - Create and manage Razorpay Invoices, Payment Pages, Payment Links

      - Edit activation form details, including bank account details

      - Create and upload batch files

      - Download or export files

      - Edit any settings or configurations

      
      - Modify API keys or webhook URLs

      - Change account settings, bank details or KYC information

      
      
      
> **WARN**
>
> 
>       **Watch Out!**
>       
>       
>       - All operational buttons (Refund, Create Payout, Edit Settings, Save) are hidden or disabled.

>       - Form fields on configuration pages are displayed in read-only mode.

>       - Attempting any restricted action displays: "Permission Denied. Please contact the owner."

>       - All page views are logged for audit and compliance purposes.

>       
>       

      
      
> **INFO**
>
> 
>       **View-Only (Auditor) Role is Best For**
>       
>       
>       - Internal and external auditors

>       - Compliance officers

>       - Senior management and executives

>       - Business analysts

>       - Regulatory reviewers

>       
>       

      
      

    
### Admin

         **Actions Allowed**
         
          - Generate API Keys

          - Create and manage webhooks

          - Update brand name

          - Edit activation form details, including bank account details and GST number, before submission.

          - Configure payment methods

          - View all transactions 

          
          
          
          - Capture transactions

          
          - Create and manage  Payment Pages and Payment Links.

          - Create and upload batch files

          - Download and email reports

          
          
          
         
         **Actions Not Allowed**
         - Manage Teams
        

    
### Manager

     **Actions Allowed**
     
       - Create and manage webhooks

       - Edit activation form details, including GST number, before submission

       - Configure payment capture settings

       - Configure payment methods

       - View all transactions 

       
       
       
       - Capture transactions

       
       - Create and manage  Payment Pages and Payment Links. 

       - Create and upload batch files

       - Download and email reports

       
       
     
     **Actions Not Allowed**
     
      - Generate API Keys

      - Manage Teams

      
     
     

     
### Operations

     **Actions Allowed**
     
       - View all transactions 

       
       
       
       - Capture transactions

       
       - Create  Payment Links and Payment Pages.

       - Create and upload batch files

       - Download and email reports

       
     

     **Actions Not Allowed**
      
      - Generate API Keys

      - Manage Teams

      - Edit activation form details, including bank account details and GST number, before submission

      
      
     

     
### Finance

     **Actions Allowed**
      
      - Edit activation form details including GST number, before submission

      - View all transactions 

      
      
      
      - Create and upload batch files

      - Download and email reports

      
     **Actions Not Allowed**
      
      - Generate API Keys

      - Create and manage webhooks

      - Manage Teams

      - Capture transactions

      
      - Create and manage  Payment Pages and Payment Links.

      
      
      

      
### ePos

      **Actions Allowed**
      
      - Create  Payment Links in INR only

      
      - Create, view and edit Payment Page

      
      
      

     **Actions Not Allowed**
      
        - Generate API Keys

        - Edit activation form details including GST number, before submission

        - Create and manage webhooks

        - Manage Teams

        - View all transactions 

        
        
        
        - Capture transactions

        
        
        - Create and upload batch files

        - Download and email reports

        
        - View  Payment Pages, Payment Links created by other users

      
     

     
### Dispute Manager

       The Dispute Manager role is designed for team members who handle chargebacks and payment disputes. This role provides focused access to dispute management functions while restricting access to sensitive financial operations.
      
       **Actions Allowed**
       
        - View all disputes and dispute details

        - Accept disputes

        - Contest disputes and submit evidence

        - Download dispute reports

        - Search and filter disputes

        - View dispute summary metrics (pending, accepted, contested)

       
      
       **Actions Not Allowed**
        
            - Generate API keys

            - Create and manage webhooks

            - Manage teams

            - View transactions (except dispute-related context)

            - View settlements

            - View or edit bank account details

            - Create refunds

            - Capture transactions

            - Edit activation form details

            - Edit Razorpay account or business settings

            - Create and manage Razorpay Invoices, Payment Pages, Payment Links

            - Create and upload batch files (non-dispute)

            - Download reports (except dispute reports)

            
            
        
      
       
> **INFO**
>
> 
>        **Dispute Manager Role is Best For**
>       
>         - Dedicated chargeback teams.
>         - Customer support specialists handling dispute cases.
>         - Third-party dispute management agencies.
>        

      
      

     
### Support

     **Actions Allowed**
     
     - View all transactions 

     
     
     - Download and email reports other than the monthly invoice report

     

     **Actions Not Allowed**
     
      - Generate API Keys

      - Create and manage webhooks

      - Manage Teams

      - Edit activation form details, including bank account details and GST number, before submission

      - Capture transactions

      
      - Create and manage  Payment Pages and Payment Links.

      
      - Create and upload batch files

      - Access monthly invoice report

      
     

> **INFO**
>
> 
> **Handy Tips**
> 
> A team member can be assigned only one role, as each role is tied to a specific email address. A user can have multiple roles if they have different email addresses.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> - A team member should be assigned a role as the role is tied to an email address. A user can have multiple roles if they have different email ids.
> - Use the [Dispute Manager](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/manage-team.md#dispute-manager) role for team members who only need to handle chargebacks without access to refunds or bank details.
> - Use the [Pseudo Owner](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/manage-team.md#pseudo-owner) role sparingly for trusted individuals who need to manage the account when the Owner is unavailable.
> - Use the [View-Only](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/manage-team.md#view-only-auditor) role for auditors and stakeholders who need visibility without operational access.
> 

    
### Invite a Registered User

        1. Log in to the Dashboard.
        2. Navigate to the **Account & Settings** → **Business settings** and click **Manage Team**.
        3. Click **Invite New Member**.
        4. Type in the email address of the user whom you want to invite. Select a role from the drop-down list.
        5. Click **Send Invitation** to invite the user. A list of accepted and pending invitations is displayed on the same page.
        6. Click **Resend** to re-invite the user or **Cancel** to cancel the invitation.

        

    
### Accept Invite - Existing User

         To accept an invitation:

         1. Log in to the Dashboard.
         2. Navigate to the **Account & Settings** → **Business settings** and click **Invitations**.
         3. Click **Accept** next to the invite.

         

         

         

         
> **INFO**
>
> 
> 
>          **Switching Accounts**
> 
>          After accepting the invite, the invited user can switch between their and your account using the **Switch Merchant** option available on the Dashboard header.
>          You cannot access their account unless they invite you to join their team.
>          

        

    
### Invite a New User

         You can invite a user who is not registered with  to join your team. Such users are sent an invitation link via email.

         To invite a new user:

         1. Log in to the Dashboard.
         2. Navigate to the **Account & Settings** → **Business settings** and click **Manage Team**.
         3. Click **Invite New Member**.
         4. Enter the member's email id and select the user role to be assigned.
         5. Click **Send Invitation**.

         

         

         
        

    
### Update Role of a User

         You can change the user's role after the invitation is sent to the user or after the invitation is accepted by the user.

         To update a user's role:

         1. Log in to the Dashboard.
         2. Navigate to the **Account & Settings** → **Business settings** and click **Manage Team**.
         3. Select the new role for the user from the drop-down.
         4. Click **Update**.
        

    
### Remove a User

         You can remove a user from your team to remove their complete access from your Dashboard.

         To remove a user from your team:

         1. Log in to the Dashboard.
         2. Navigate to the **Account & Settings** → **Business settings** and click **Manage Team**.
         3. Click **Remove** to remove a user from the **Team Member** list. Once removed, the user can no longer access your Dashboard.
         4. Click **Cancel** to remove a user from the **Pending Invitations** list.
        

    
### Enable 2-Step Verification (2FA at Team Level)

         You can set 2-step verification for your entire team for enhanced security and protection of your Dashboard data thus preventing malicious attacks or misuse of your sensitive business data.

         To enable 2-step verification for your team:

         1. Log in to the Dashboard.
         2. Navigate to the **Account & Settings** → **Business settings** and click **Manage Team**.
         3. Enable the **2-Step Verification to the team** option.
         4. Enter the OTP sent to your registered mobile device. (This step is not required if you had already performed OTP verification during login.)
         5. Enter your account password and confirm.

         You have now set up 2FA for your entire team.
        

## Frequently Asked Questions (FAQs)

    
### 1. What to do if a user account is locked?

         If a user enters the wrong OTP 9 times, their account will be locked for security reasons. In such scenarios, the user should contact their respective account owner. The account owner can unlock the users' accounts.
        

    
### 2. What to do if a user loses their mobile device?

         If a user loses their mobile device, they should reach out to their respective account owner. The account owner can **Invalidate 2FA** for the user, that is reset 2FA for the user. The user will be asked to enter their mobile number the next time they log in to the Dashboard.
        

    
### 3. What to do if the account owner is locked?

         If you are the account owner and have entered the wrong OTP 9 times, your account will be locked for security reasons. In such scenarios, contact our [Support Team](https://razorpay.com/support/#request) to **Reset 2FA** for your account.
        

    
### 4. What to do if the account owner loses their mobile device?

         If you are the account owner and have lost your mobile device,  contact our [Support Team](https://razorpay.com/support/#request) to **Reset 2FA** for your account.
        

    
    
### 5. What is the Dispute Manager role?

         The Dispute Manager role is designed for team members who handle chargebacks and payment disputes. Users with this role can view, accept and contest disputes and download dispute reports. They cannot create refunds or access settlement/bank details. This role is ideal for dedicated chargeback teams or third-party dispute management agencies.
        

    
### 6. What is the Pseudo Owner role?

         The Pseudo Owner role provides full owner-level access to trusted team members for business continuity. It is useful when the primary owner is unavailable (on leave, travel or emergencies). Pseudo Owner role has the same permissions as the Owner role except they cannot delete the primary owner account. A maximum of 2 Pseudo Owners can be assigned per account and assignment requires additional authentication.
        

    
### 7. What is the View-Only (Auditor) role?

         The View-Only role provides read-only access to all Dashboard data. Users with this role can view transactions, settlements, disputes and settings but cannot perform any actions or make changes. This role is ideal for auditors, compliance officers and senior management who need visibility without operational access. All page views are logged for audit purposes.
        

    
### 8. How many Pseudo Owners can I have?

         You can provide Pseudo Owner access to a maximum of 2 users for each Razorpay account. If you need more, contact [Razorpay support](https://razorpay.com/support/#request) to discuss your requirements.
        

    
### 9. Can a Dispute Manager issue refunds?

         No, Dispute Managers cannot create refunds. If a refund is needed to resolve a dispute, the Dispute Manager must coordinate with a team member who has refund permissions (Owner, Pseudo Owner, Admin, Manager or Operations roles).
        

    
### 10. Can a View-Only user download reports?

         No, users with view-only access can only view reports and data on the Dashboard. They cannot download or export files. This restriction helps maintain data security for audit and compliance purposes.
