---
title: Create Payout Links on RazorpayX
heading: Create Payout Links
description: Create Payout Links via the Dashboard, API and explore the other Payout Links Dashboard actions available in RazorpayX.
---

# Create Payout Links

You can create Payout Links in two ways: 
- [Via the Dashboard](#create-a-payout-link).
- [Via Payout Links APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/api.md).

You can also [create Payout Links in bulk](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/bulk.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot create Payout Links in [Test mode](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode.md) on the Dashboard and APIs. Switch to Live mode and use [Live API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/api-keys.md) to create a successful Payout Link. 
> 

## Create a Payout Link

Watch this video to know how to create a Payout Link or read along. 

[Video: https://www.youtube.com/embed/yGxzEFjRSSw]

To create a Payout Link:
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/). 
1. Navigate to **Payout Links** from the left menu. 
1. Click **+PAYOUT LINK**. 
    ![Payout Links Dashboard highlighting +PAYOUT LINK](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/create-payout-link.jpg.md)
1. Fill in the necessary details such as: 
    - The account from which the money must be debited.
        ![Add the account from which the amount must be debited](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payout-links-create1.jpg.md)
    - The Contact to whom you are making the payout. Or, click **Add a new contact** to [create a new Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts#create-a-contact.md).
        ![Add the Contact to whom you want to send the link or add a new contact](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payout-links-create2.jpg.md)
    - The contact's email id and phone number. Choose where of the two you want to send the Payout Link to.
        ![. Choose email id/mobile number](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payout-links-create3.jpg.md)
    - Mandatory details like the Payout Link Amount, Purpose and Description. [Set expiry](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry.md) for the link if applicable. 
        - Additional optional details such as reference id and internal notes under **Add more details**. 
        ![finalise the payout amount and other details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payout-links-create4.jpg.md)
1. Enter the OTP sent to your registered mobile number or email address, and confirm creation of the Payout Link.

You have successfully created a Payout Link. 

> **INFO**
>
> 
> **Handy Tips**
> 
> When selecting a contact, you need not specify the associated fund account. If the fund account is already present then the payout amount is immediately transferred.
> 

### When Approval Workflow is Enabled

In some use cases, you can send the Payout Link for approval from the approver and then forward the link to the contact. Given below is the Payout Link creation flow when If [Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) is enabled.

1. [Create a Payout Link](#create-a-payout-link) on the Dashboard. 
1. The Payout Link is then sent to the **Approver** for approval.
1. Once approved, the Payout Link is sent to the Contact on the number and email provided.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can set [expiry on Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry.md).
> 

## Other Actions

From the Overview page, click on the specific Payout Link and view its details. In the summary pop-up page, you can also: 

- Copy the Payout Link.
- Resend the Payout Link to the same contact and repeat the transaction. 
- Cancel the Payout Link.  
    
    You can also hover over the Payout Link row and access the copy, resend and cancel Payout Link options.

![Summary pop-up page showing the Payout Link details on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payout-links-summary.jpg.md)

- Using the **Quick Filters** menu, filter out the Payout Links and transactions based on their status and other details. 
- As an [Owner/Approver](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md), view the Payout Links pending on you from the same menu. Also view the Payout Links pending on a specific [user role](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams.md). 
- Click the download icon to download the Payout Links report for a specific time range. Download as a `CSV` or an `XLS` file or email it.  

![Quick filters menu on Payout Links Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payout-links-quick-filters.jpg.md)

### Related Information 

- [Payout Links API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-links.md)
- [Create Bulk Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/bulk.md)
- [Shopify Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/shopify.md)
