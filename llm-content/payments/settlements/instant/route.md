---
title: Instant Settlements for Linked Accounts on Route
heading: Instant Settlements on Route
description: Explore how instant settlements on Razorpay Route's Linked Accounts work and how to enable the feature.
---

# Instant Settlements on Route

[Instant settlements](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements/instant.md) on Route enable you to settle payments instantly to your Linked Accounts for a small fee. You can choose which Linked Account to enable instant settlements on, and all subsequent transfers to that account will be processed instantly.

Transactions settled instantly are credited to your Linked Accounts' bank accounts within 10 minutes. Instant settlements on Route are available 24/7, including on banking holidays.

    
### Use Cases and Examples

         - **Lending** 

         Suppose you are Acme Corp, a Loan Service Provider (LSP) who sources customers via your product for multiple NBFCs. 
         
            Your lending partners may wish to receive loan repayments instantly when the payment is captured instead of on a T+2 basis (T being the payment date), which enables them to disburse loans faster for other applicants.
            
            With instant settlements, you can [create a Linked Account](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/linked-account/#add-and-manage-linked-accounts.md) on Route, initiate a transfer and settle the payments to them instantly.

         - **Logistics** 

         You are Acme Movers, a logistics company that connects customers with retail packers and movers. One or many logistics partners may require instant payments from you to manage their cashflow. 

            To facilitate this, you can enable instant settlements on the particular logistics partners' Linked Account and settle the payments to them instantly.
        

    
### Advantages

         Instant settlements on Route offers the following advantages: 
         - Instant settlements within 10 minutes. 
         - Available on all days of the year, 24*7, including banking holidays.
         - Seamless transfers to Linked Accounts from when the payment was captured.
        

## Prerequisites

To enable instant settlements on Route, ensure the following: 
- You have an [existing/created Linked Account](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/linked-account/#add-and-manage-linked-accounts.md) on Route.
- You have [disabled refunds from Linked Accounts](#how-to-disable-refunds-for-a-linked-account).

> **WARN**
>
> 
> **Watch Out!**
> 
> Instant Settlements on Route fail when: 
> - The [transfer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/faqs/#1-how-can-i-transfer-money-to-customers.md) amount exceeds 5 lakhs.
> 
>     For example, if you choose to transfer ₹17 lakhs, you must create 3 transfers of 5 lakhs each and another transfer of ₹2 lakhs.
> - You have not disabled refunds on Linked Accounts. 
> 

## How it Works

To use instant settlements on Route:

1. Create a Linked Account for your vendors.
1. Contact support to enable instant settlements on Route for the Linked Accounts.
1. Initiate transfers to your Linked Account.
1. The Linked Account/Vendor receives the transferred amount instantly.
    ![Instant settlements on Route How it Works](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/settlements-instant-route-v2.jpg.md)

### 1. Enable Feature

There are two steps to enable instant settlements on Route:

1. Reach out to your sales POC or [contact support](https://razorpay.com/support/#request).

    
> **INFO**
>
> 
> 
>     **Feature Request**
> 
>     This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
>     

1. Disable **Allow Refunds** for your Linked Accounts.

    
        
### How to disable refunds for a Linked Account?

             To disable refunds on a Linked Account: 

                1. Log in to the Dashboard.
                1. Go to **Route** in the left menu.
                1. Navigate to the **Accounts** tab.
                1. View the relevant Linked Accounts and click the **Allow Refunds** toggle to disable it.
                    ![Disable refunds on Razorpay Dashboard for Route](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payments-is-route-disable-refunds.jpg.md)
                1. In the **Disable Allow Refunds** pop-up modal, click **Disable**.

                You have successfully disabled refunds from this Linked Account.
            

    

This successfully enables instant settlements on Route for your account.

### 2. Initiate Transfers 

After we enable the feature, you must initiate a transfer via Orders or Payments to the Linked Accounts. The initiated transfers are settled instantly, within minutes. You can also use the APIs to initiate transfers.

Know how to initiate a transfer via: 
- [Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/transfer-funds-to-linked-accounts/#transfer-via-orders.md).
- [Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/route/transfer-funds-to-linked-accounts/#transfers-via-payments.md).
- [Create Transfers from Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-transfers-orders.md).
- [Create Transfers from Payments API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route/create-transfers-payments.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> - You cannot settle transfers instantly to Linked Accounts via Direct transfers.
> - When you create a transfer, ensure you process it in batches of 5 lakhs each.
> 

### Frequently Asked Questions

    
### 1. What happens if my upper limit for a transfer is greater than 5 lakhs?

         We create a transfer but the amount will not be settled to your Linked Accounts, leading to a transfer failure. This is due to [daily transfer limits](https://razorpay.com/learn/imps-limit/) on IMPS.
         
         For transfers greater than 5 lakhs, we recommend you split the amount in batches of 5 lakhs and initiate the transfer. Otherwise, you can choose NEFT as the default trasfer mode to increase the upper limit.
        

    
### 2. I routinely create transfers that are greater than 5 lakhs per transaction. How can I instantly settle such transactions?

         You can either: 
         - Create transfers in batches of 5 lakhs each. 
         - Use NEFT as your default transfer mode.

         Note that NEFT credits the amount to your Linked Accounts within 2 hours instead of 10 minutes.
        

    
### 3. How can I modify my default payment mode from IMPS to NEFT for some of my Linked Accounts?

         While IMPS is the default transfer mode, you can choose NEFT to be the default mode. Reach out to your sales POC or [contact support](https://razorpay.com/support/#request).

         Note that [NEFT limitations](https://razorpay.com/learn/neft-timings/) are applicable. NEFT transfers are settled within 2 hours instead of 10 minutes.
        

    
### 4. Are there any additional charges for using this feature?

         Yes, instant settlements on Route is a paid feature. Contact your sales POC to discuss the pricing and invoice. 
        

    
### 5. If I do not manually set the upper limit of 5 lakhs on transfers, will Razorpay set it?

         No, you must batch the transfers in multiples of 5, or as applicable. For example, if you choose to transfer ₹17 lakhs, you must create 3 transfers of 5 lakhs each and another transfer of ₹2 lakhs, as follows:

         - Transfer A: 5 lakhs
         - Transfer B: 5 lakhs
         - Transfer C: 5 lakhs
         - Transfer D: 2 lakhs
        

    
### 6. Can I customise which transactions to enable instant settlements on?

        No, you can only choose the Linked Account to which you want to settle the transfers instantly. 
        
        All the transfers initiated to that Linked Account will be settled instantly.
