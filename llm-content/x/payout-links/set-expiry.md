---
title: Set Payout Links Expiry on RazorpayX
heading: Set Payout Links Expiry
description: Check how to set expiry for RazorpayX Payout Links and how to add, modify or delete expiry.
---

# Set Payout Links Expiry

With Payout Links, you can offer cashbacks, refund deposits, or refunds in case of cash on delivery transactions. However, if the end user does not claim the benefit, the amount is not disbursed and this results in bookkeeping issues for enterprises.

To resolve this, you can set your Payout Links to expire after a certain time. By default, Payout Links do not expire. You must: 
1. [Enable Expiry](#enable-expiry)  
2. [Set Expiry](#set-expiry)

The Payout Link then expires on that specific date or after the chosen duration.

You can set a Payout Link to expire: 
- While creating the Payout Link.
- After creating the Payout Link.

Your contact receives 3 reminders for 3 days before the Payout Link expires.

## Enable Expiry 

You have to enable the setting to set expiry date on Payout Links. To enable this feature:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **My Account & Settings**.
3. Click **Business Profile**.
4. Scroll to the **PAYOUT LINK EXPIRY** section and enable the feature using the toggle as shown:
   ![Enable Payout Link expiry toggle on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payout-links-enable-expiry2.jpg.md)

You can also enable expiry from the Payout Links Dashboard. 
1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
1. Navigate to the **More Options** (⋮) menu as shown and click **Expiry Settings** from the menu.  
   ![Expiry Settings in the Payout Links Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/x-payout-links-enable-expiry1.jpg.md)
1. On the **Business Profile** page, you can enable expiry for Payout Links.

After you enable expiry, you can set the following for Payout Links:
- Expiry date
- Expiry time

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure the expiry time is greater than the current time by at least 15 minutes. For example, if the current time is `15:00`, the expiry time must be greater than `15:15`.
> 

## Set Expiry 

To set expiry date on a Payout Link:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/).
2. Navigate to **Payout Links** from the left menu.
3. Click **+PAYOUT LINK**.
4. Select contact to whom you want to send the Payout Link or add new contact and complete the procedure.
5. Click **NEXT**.
6. Provide details such as amount, Payout purpose, and Payout Reason.
7. Select the **Set Expiry Date** checkbox and add the expiry date and time as shown here:
   ![Setting expiry date on Payout Links modal on RazorpayX Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payout-link-expiry.jpg.md)
8. Click **PROCEED TO CONFIRM**.
9. Enter the OTP sent to your registered mobile number/email address.
10. Click **CREATE LINK**.

You can also set expiry after creating the Payout Link and modify it as well. 

### Add Expiry 

To add expiry for existing Payout Links:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/) → **Payout Links** from the left menu.
1. Navigate to the specific Payout Link and open the Payout Link details view.
1. Click **SET EXPIRY DATE**, as shown. 
   ![Add expiry date for existing links](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-expiry-date-payout-links.jpg.md)
1. Select the date and the time by when you want the Payout Link to expire. 
   ![specific and meaningful image title](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/expiry-date-time-payout-links.jpg.md)
1. Click **CONFIRM**.

You have successfully added expiry for an existing Payout Link. 

### Modify Expiry 

To modify the expiry set for a Payout Link:

1. Log in to your [RazorpayX Dashboard](https://x.razorpay.com/) → **Payout Links** from the left menu.
1. Navigate to the specific Payout Link and open the Payout Link details view.
1. Click the edit icon, as shown. 
   ![Add expiry date for existing links](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/modify-expiry-payout-links.jpg.md)
1. Change the date and the time by when you want the Payout Link to expire. 
   ![specific and meaningful image title](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/modify-expiry-date-time-payout-links.jpg.md)
1. Click **UPDATE EXPIRY**.

You have successfully updated the expiry for an existing Payout Link. 

### Remove Expiry 

You can remove expiry for your Payout Links if they are no longer applicable. To do so: 

1. Click and open the Payout Link details view. 
1. Click the edit icon, as shown. 
   ![Add expiry date for existing links](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/modify-expiry-payout-links.jpg.md)
1. Click **REMOVE EXPIRY**.  
   ![specific and meaningful image title](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/modify-expiry-date-time-payout-links.jpg.md)

You have successfully removed the expiry for a Payout Link. 

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Expired Payout Links can be duplicated to create another Payout Link with same details. Contact, Fund Account and amount details are automatically returned in the duplicated Payout Link.
> 
> - Once you enable expiry for Payout Links from the Dashboard, you can find the expiry parameters in the API response too (if you are using the [Payout Links API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-links.md)).
> 

### Related Information 

- [About Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links.md)
- [Create Bulk Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/bulk.md)
- [Shopify Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/shopify.md)
