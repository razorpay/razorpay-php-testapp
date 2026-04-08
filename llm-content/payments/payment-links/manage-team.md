---
title: Payment Links | Manage Team
heading: Manage Team
description: Mange your team, add or remove users and provide appropriate role to control access for Payment Links.
---

# Manage Team

You can manage your team of users who can access the Dashboard. You can provide specific access to a user or a set of users for Payment Links.

**Example** 

You need someone in your organisation to perform day-to-day operations such as creating a Payment Link or a webhook. In this case, you can give access of your Dashboard to a person and assign the **Operations** role. This limits the access to actions related to refunds and settlements only.

## Standard User Roles
Following are the predefined user roles that you can assign to your team members:

  
   The Owner can perform all the actions.
   

  
   The Admin can perform all the actions.
   

   
   Check all the actions that a Manager can perform.
   

  
    Check all the actions that a team member with Operations role can/cannot perform.
  

  
   Check all the actions that a team member with Finance role can/cannot perform.
   
 

   
   Check all the actions that a a team member with ePOS role can/cannot perform.
   

   
   Check all the actions that a team member with Support role can/cannot perform.
  

> **INFO**
>
> 
> **Handy Tips**
> 
> 
> - Assign a role to your team member.
- Each role is tied to an email address.
- Assign multiple roles to a team member using multiple email addresses.
- Limit a user's access to the Dashboard using these roles.

> 
> 

### Owner

Actions Allowed
---
✔ Generate API Keys 
---
✔ Create and manage webhooks
--- 
✔ View all transactions and settlements
---
✔ Configure payment capture settings
---
✔ Capture transactions
---
✔ Create refunds
---
✔ Create and manage Payment Links
---
✔ Create and upload batch files
---
✔ Download and email reports
---
✔ Use Payments Mobile App
---
✔ Add Funds/Balance
---
✔ Install OAuth Apps

### Admin

Actions Allowed
---
✔ Generate API Keys
---
✔ Create and manage webhooks
---
✔ View all transactions and settlements
---
✔ Configure payment capture settings
---
✔ Capture transactions
---
✔ Create refunds
---
✔ Create and manage Payment Links
---
✔ Create and upload batch files
---
✔ Download and email reports
---
✔ Use Payments Mobile App

### Manager

 Actions Allowed/Not Allowed
---
 ✔ Create and manage webhooks
---
✔ View all transactions and settlements
---
✔ Configure payment capture settings
---
✔ Capture transactions
---
✔ Create refunds
---
✔ Create and manage Payment Links
---
✔ Create and upload batch files
---
✔ Download and email reports
---
✔ Use Payments Mobile App
---
✘ Generate API Key

### Operations

Actions Allowed/Not Allowed
---
✔ Create and manage webhooks
---
✔ View all transactions and settlements
---
✔ Configure payment capture settings
---
✔ Capture transactions
---
✔ Create refunds
---
✔ Create and manage Payment Links
---
✔ Create and upload batch files
---
✔ Download and email reports
---
✔ Use Payments Mobile App
---
✖ Generate API Keys

### Finance

Actions Allowed/Not Allowed
---
✔ View all transactions and settlements
---
✔ Configure payment capture settings
---
✔ Create and upload batch files
---
✔ Download and email reports
---
✔ Use Payments Mobile App
---
✖ Generate API Keys
---
✖ Create and manage webhooks
---
✖ Capture transactions
---
✖ Create refunds
---
✖ Create and manage Payment Links

### ePOS

Actions Allowed/Not Allowed
---
✔ Create Invoices and Payment Links in INR only
---
✖ Generate API Keys
---
✖ Create and manage webhooks
---
✖ Manage Teams
---
✖ View all transactions and settlements
---
✖ Capture transactions
---
✖ Create refunds
---
✖ Create and upload batch files
---
✖ Download and email reports
---
✖ View Payment Links created by other users

### Support

Actions Allowed/Not Allowed
---
✔ View all transactions and settlements
---
✖ Generate API Keys
---
✖ Create and manage webhooks
---
✖ Capture transactions
---
✖ Create refunds
---
✖ Create and manage Invoices, Payment Pages, Payment Links, Plans and Subscription Links, Customers and Virtual Accounts
---
✖ Create and upload batch files
