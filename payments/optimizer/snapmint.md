---
title: Snapmint
description: Add Snapmint as a payment provider on Optimizer.
---

# Snapmint

Snapmint's Cardless EMI is a **Buy Now Pay Later (BNPL)** service that lets customers buy products on easy monthly instalments without a credit card. It offers a credit line, often linked to your customers' debit card or UPI, making purchases more accessible.

Follow the steps below to onboard Snapmint as a payment provider.

    
### Prerequisites

            This payment provider is available only with Optimizer. Ensure you have Optimizer enabled for your Razorpay account.

            
> **INFO**
>
> 
>             **Handy Tips**
>             
>             No additional configuration is required on your businesses end for Snapmint integration.
>             

        

## Add Snapmint as Payment Provider

    
### To add Snapmint as a payment provider:

        1. Log in to your Dashboard and select **Optimizer**.
        2. In the **Payment Provider** section, click **Add Provider**.
        3. Navigate to the **Cardless EMI only** section and click **Snapmint**. 
        4. Enter your **Provider Details**. 
        5. Add your **Snapmint Production API Details** and click **Submit**.  

        You have successfully added Snapmint as a payment provider to Optimizer.

        

## Configure Custom Rule

    
### Add custom rule to route your transactions via Snapmint:

         
            1. Log in to your Dashboard and click **Optimizer**.
            2. Click **+ Add New Rule**.
                
            3. Enter the **Rule Name** and **Rule Description**. Click **Next**.
                
            4. Select the rule conditions as follows and click **Next**:
                - **When** - `Cardless EMI Provider`.
                - **is** - `Equal to`.
                - `Snapmint`.
                 
            5. In the **Route** section, enter **100**, and select **snapmint** in the **payment via** section. Click **Next**.  
            6. Click **Publish Rule**.

            All transactions will now be routed via Snapmint.

        

## Best Practices

Please note these best practices before routing all or some of your traffic to a new gateway via Optimizer:

    
### Live and Test Mode Rules

         Rules you set up in test or live mode on your Razorpay Dashboard apply in live mode. However, test mode credentials will not automatically copy to live mode.
        

    
### Sanity Test at Razorpay

        For basic integration testing, contact Razorpay. We will attempt a small test payment to confirm your credentials are correct.
        

## Go Live
After the integration is tested and successful, you can go live with Snapmint on Razorpay Optimizer.
