---
title: CAMSPay
description: Add CAMSPay as a payment provider on Optimizer.
---

# CAMSPay

CAMSPay is a Payment Gateway and Aggregator that enables businesses to securely accept a variety of digital payments for both one-time purchases and recurring transactions (like subscriptions or loan payments).

Follow the steps below to onboard CAMSPay as a payment provider.

    
### Prerequisites

            - This payment provider is available only with Optimizer. Ensure you have Optimizer enabled for your Razorpay account.
            - The gateway credentials (for example, Merchant Id, Checksum Key and Encryption Keys) must be provided to you by the CAMSPay platform. You will need these for the integration.

            
> **INFO**
>
> 
>             **Handy Tips**
>             
>             No additional configuration is required on your businesses end for CAMSPay integration.
>             

        

## Add CAMSPay as Payment Provider

    
### To add CAMSPay as a payment provider:

        1. Log in to your Dashboard and select **Optimizer**.
        2. Click **Payment Provider** → **Add Provider**.
        3. Navigate to **Card, E-Mandate, Netbanking, and UPI** → **CAMSPay**. ![Add CAMSPay payment provider in Razorpay](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/optimizer-CAMSPay-add-provider.jpg.md)
        4. Enter your **Provider Details** and click **Next**.![Add CAMSPay payment provider in Razorpay](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/optimizer-CAMSPay-add-provider-details.jpg.md)
        5. Add your **CAMSPay Production API Details** and click **Submit**. ![Add CAMSPay](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/optimizer-CAMSPay-provider-api-prod-details.jpg.md) 

        You have successfully added CAMSPay as a payment provider to Optimizer.

        

## Configure Custom Rule

    
### Add custom rule to route your transactions via CAMSPay:

         
            1. Log in to your Dashboard and click **Optimizer**.
            2. Click **+ Add New Rule**.
                ![Add CAMSPay rule](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-simpl-rule.jpg.md)
            3. Enter the **Rule Name** and **Rule Description**. Click **Next**.
                ![Add CAMSPay](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/optimizer-add-rule-name-desc.jpg.md)
            4. Select the rule conditions as follows:
               - **Condition 1:**
                   * **When** - `Channel`
                   * **is** - `Equal to`
                   * `Android`
               - **AND** (Add another condition)
               - **Condition 2:**
                   * **When** - `Payment Method`
                   * **is** - `Equal to`
                   * `Card`
                ![Add CAMSPay](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/optimizer-CAMSPay-rule-conditions.jpg.md) 
            5. In the **Route** section, enter **100**, and select **CAMSPay** in the **payment via** section. Click **Next**. ![Add CAMSPay](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/optimizer-CAMSPay-priority-route.jpg.md) 
            6. Click **Publish Rule**.

            All transactions will now be routed via CAMSPay.

        

## Best Practices

Please note these best practices before routing all or some of your traffic to a new gateway via Optimizer:

    
### Live and Test Mode Rules

         Rules you set up in test or live mode on your Razorpay Dashboard apply in live mode. However, test mode credentials will not automatically copy to live mode.
        

    
### Sanity Test at Razorpay

        For basic integration testing, contact Razorpay. We will attempt a small test payment to confirm your credentials are correct.
        

## Go Live
After the integration is tested and successful, you can go live with CAMSPay on Razorpay Optimizer.
