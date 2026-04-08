---
title: ShopSe
description: Add ShopSe as a payment provider on Optimizer.
---

# ShopSe

ShopSe's Cardless EMI is a popular **Buy Now Pay Later (BNPL)** service. It lets customers manage monthly instalments for purchases without needing a credit card and sometimes not even a debit card. This digital finance option makes more expensive items affordable and accessible.

Follow the steps below to onboard ShopSe as a payment provider.

    
### Prerequisites

            This payment provider is available only with Optimizer. Ensure you have Optimizer enabled for your Razorpay account.

            
> **INFO**
>
> 
>             **Handy Tips**
>             
>             No additional configuration is required on your businesses end for ShopSe integration.
>             

        

## Add ShopSe as Payment Provider

    
### To add ShopSe as a payment provider:

        1. Log in to your Dashboard and click **Optimizer**.
        2. In the **Payment Provider** section, click **Add Provider**. 
        3. Navigate to the **Cardless EMI only** section and click **ShopSe**. 
        4. Enter your **Provider Details**. 
        5. Enter your **ShopSe Production API Details** and click **Submit**. 

        You have successfully added ShopSe as a payment provider on Optimizer.
        

## Configure Custom Rule

    
### Add custom rule to route your transactions via ShopSe:

    
            1. Log in to your Dashboard and click **Optimizer**.
            2. Click **+ Add New Rule**.
                
            3. Enter the **Rule Name** and **Rule Description**. Click **Next**.
                
            4. Select the rule conditions as follows and click **Next**:
                - **When** - `Cardless EMI Provider`.
                - **is** - `Equal to`.
                - `ShopSe`.
                 
            5. In the **Route** field, enter **100**, and select **shopse** in the **payment via** field. Click **Next**.  
            6. Click **Publish Rule**.  

            All transactions will now be routed via ShopSe.
        

## Best Practices

Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured in live or test mode on the Razorpay Dashboard will reflect in live mode. However, credentials added in test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of a small value and ensure that the credentials are correct.
        

## Go Live
After the integration is tested and successful, you can go live with ShopSe on Razorpay Optimizer.
