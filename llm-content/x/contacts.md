---
title: Contacts on RazorpayX
heading: About Contacts
description: Create, update and view Contacts on the RazorpayX Dashboard.
---

# About Contacts

A Contact can be a vendor or a customer to whom you need to send payouts (similar to a *beneficiary* in your netbanking portal).
- You can add a Contact's name, email id, phone and [Fund Account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts.md) details (bank account, UPI or both) while creating a Contact. 
- You can start sending payouts once the Contact has been created.
- There is no limit to the number of Contacts you can add.

> **WARN**
>
> 
> **Contact Support**
> 
> This page is not meant for contacting Razorpay Support. Visit our [contact support page](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) to contact our support team.
> 

## Contact Types

When creating a Contact, you are required to assign a type to the Contact. This helps in categorisation of Contacts and analysis of the payouts made to each category. The following `types` are available:

- `vendor`
- `customer`
- `employee`
- `self`

You are not restricted to use only these `types`. You can create custom `types` for Contacts, as applicable to your business, from the RazorpayX Dashboard.

### Create and View Contact Types

    
### To create a Contact Type:

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
         2. Navigate to **Contacts** on the left navigation and click **︙**.
         3. Click **Create Contact Type**.
             ![Create Contact Type](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-contact-type-1.jpg.md)
         4. Enter the **Type Name** and click **CREATE CONTACT TYPE**.
             ![Enter Contact Type name](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-contact-type-2.jpg.md)

         Or, first view the existing Contact Types and decide whether you want to create a new type.

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
         2. Navigate to **Contacts** on the left navigation and click **︙**.
         3. Click **View Contact Types**.
         4. Scroll to view all the available types or use search.
         5. Click **+ CREATE NEW CONTACT TYPE**.
             ![View and create new Contact Type](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-contact-type-3.jpg.md)
         6. Enter the **Type Name** and click **CREATE CONTACT TYPE**.
        

## Contacts Actions

The following table lists down the actions that can be performed on Contacts using APIs, Dashboard and Bulk Upload:

Action | API | Dashboard | Bulk Upload
---
Create a Contact | ✓ | ✓ | ✓
---
Update a Contact | ✓ | ✓ | x
---
View Contact details | ✓ | ✓ | x
---
Mark as inactive | ✓ | ✓ | x

You can [create Contacts using APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/create.md) or [create Contacts in bulk](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts/bulk-uploads.md).

## Create a Contact

    
### To create a Contact with Fund Account from the Dashboard:

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
         2. You can create a Contact in two ways:
            - Navigate to the drop-down menu next to **+ Payouts** and click **Add Contact**.
                 ![Create new Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-create-contact.jpg.md)
            - Hover over **Contacts** on the left navigation and click **+**.
            - Press C on your keyboard.
            - Navigate to **Contacts** on the left navigation and click **+ CONTACT**.
         3. Enter contact details.
                 ![Contact Details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-contact-details.jpg.md)
         4. Click **SAVE AND CLOSE**.
        

## Update a Contact

    
### To update a Contact from the Dashboard:

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
         2. Navigate to **Contacts**.
         3. Select the Contact you want to edit.
         4. Navigate to **Options** → **Edit Contact**.
         5. Edit Contact details and click **NEXT**.
         6. Click **SAVE AND CLOSE**.
        

You can also [create](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/create.md) and [update](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/update.md) contacts using APIs. 

## Mark Contact Inactive

Mark Contacts inactive instead of deleting them when you do not require them. You can also activate them following the same steps. 

    
### To mark a Contact inactive from the Dashboard:

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/).
         2. Navigate to **Contacts**.
         3. Select the Contact you want to mark inactive. A right-pane opens up.
         4. Click **Options** → **Mark as Inactive**.
             ![Mark Contact Inactive](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-mark-contact-inactive.jpg.md)
        

## Next Steps

Add [Fund Accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts.md).

### Related Information

- [Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md)
- [Fund Accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts/faqs.md)
