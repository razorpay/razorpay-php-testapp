---
title: RazorpayX Payout Links | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about RazorpayX Payout Links.
---

# Frequently Asked Questions (FAQs)

## Payout Links

    
### 1. Is the Payout Link supported in test mode?

         No, currently it is not supported in [Test mode](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/test-mode.md). You can only make requests or designate links in Live mode.
        

    
### 2. What are the supported modes for creating Payout Links?

         You can create Payout Links via:
            - [Payout Link APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-links.md).
            - [RazorpayX Dashboard](https://x.razorpay.com/).
            - [Bulk upload feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/bulk.md).
        

    
### 3. What happens if the payout of a Payout Link fails due to reasons such as bank downtime or incorrect account details?

         If a payout fails due to any reason, the same Payout Link becomes active and moves to the issued state; customers can retry the payout using the same link.

         If the 'Send SMS/Email' setting is set to true, the user will be notified on the respective medium.
        

    
### 4. Is the maker-checker applicable for Payout Links?

         Yes, if the [maker-checker](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) is enabled on the account, then it will be applicable. 
        

    
### 5. Is the Payout Link cancelled if the payout for a Payout Link is rejected?

         No, only the payout is rejected, but the link becomes active again. You must cancel the Payout Link if you do not want to make a payout.
        

    
### 6. Can Payout links be resent?

         Payout Links in the `issued` state can be resent only from the [RazorpayX Dashboard](https://x.razorpay.com/). 
        

    
### 7. If a new link is issued to an old customer, will the customer need to enter the fund account details again?

         No, if the link is sent to an old contact, the previously used fund account details will be displayed. The customers can then choose the old fund account or add a new one.

         You can manually [resend the Payout Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/create.md#create-a-payout-link) from the Payout Link summary pop-up page. 
        

    
### 8. Can a Payout link be cancelled?

         If the Fund Account details are incorrect or the Payout Link is no longer relevant, you can cancel the Payout Link via the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/create.md#other-actions) or by using the [Cancel a Payout Link API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-links/cancel.md).

         Only Payout Links in the `issued` state can be cancelled. Know more about [Payout Link Statuses](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/life-cycle.md). If [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) is enabled, [cancel the Payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#cancel-payouts) first and then the Payout Link. 
        

    
### 9. Can Email/SMS for a Payout Link delivery be disabled?

         Yes, during the creation of a payout, you can select the medium by which it has to be delivered. Both Email/SMS for a Payout Link can be disabled.
        

    
### 10. Will the customer receive notification upon payout success?

         Yes, if 'Send Email/SMS' setting was set to true, then the customer receives a notification on successful completion of a payout.
        

    
### 11. Does the Payout Link support an expiry time?

         Yes, you can [set expiry](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/set-expiry.md#set-expiry) date and time on the Payout Link.
        

    
### 12. What happens to Payout Links if funds in a debit account/RazorpayX Lite are less?

         If the funds are insufficient and the user has submitted the link, the Payout Link will be in `queued` state. Once sufficient funds are added, they will be processed.
        

    
### 13. What fund account types are supported in Payout Links?

         Refer the table below to know more about fund account types supported for Payout Links. 
            
            Fund account type | RazorpayX Lite | Current Account
            ---
            Bank Account | Yes | Yes
            ---
            UPI | Yes | No
            ---
            Amazon Pay | Yes | No
            
        

    
### 14. Is IP Allowlisting mandatory for creating Payout Links?

        [Allowlisting your IP](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) addresses is mandatory for creating Payout Links through APIs. However, it is not mandatory for creating Payout Links through the Dashboard.
        

## Bulk Payout Links

    
### 1. Is the Bulk Payout Link supported in Test mode?

         No, Bulk Payout Link is not supported in Test mode. You need to create Bulk Payout Links in the Live mode only. 
        

    
### 2. How can I set expiry for Bulk Payout Links?

         To set expiry for Bulk Payout Links, you must [enable expiry](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/set-expiry.md#enable-expiry) on the RazorpayX Dashboard. You can then [set expiry](/x/payout-links/bulk#how-it-works) for bulk Payout Links in the sample template.
