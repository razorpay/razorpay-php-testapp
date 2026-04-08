---
title: PhonePe
description: Add PhonePe as a payment provider on Optimizer.
---

# PhonePe

Follow the steps below to onboard PhonePe as a payment provider.

> **WARN**
>
> 
> **Watch Out!**
> 
> Optimizer routes payments based on your business logic. However, the method enablement of each gateway should be handled by you and the gateway. Otherwise, it may lead to failed payments.
> 

    
### Prerequisites

         
            - Write to your PhonePe Relationship Manager with the following requests:
                - Enable seamless, S2S or merchant-hosted type integration as per your requirement.
                - Share the **Merchant Id**, **Key Index** and **Salt key** via email. 
                - Whitelist the following domain if required **(Optional)**:
                    - `https://api.razorpay.com/pg_router/v1/payments*` 
        

## Add PhonePe as a Payment Provider

    
### To add PhonePe as a payment provider:

         
            1. Log in to your Dashboard. 
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
            3. In the top-right section, click **Add Provider**.
            4. Select **PhonePe** in the list of gateways available and enter the provider name and description. Click **Next**.
                
            5. Enter your **Merchant Id**, **Key Index** and **Salt key**.
            6. Select the payment methods you want to enable for PhonePe and click **Submit**. 
                
            You have successfully added **PhonePe** as a payment provider on Optimizer.
        

## Supported Payment Methods

Payment Methods | Availability
---
UPI | Live
---
Netbanking | Coming Soon
---
Cards | Coming Soon

## Best Practices
Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured on live or test mode on the Razorpay Dashboard will reflect on live mode. However, credentials added on test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of small value and ensure that the credentials are correct.
        

    
### Perform Self Sanity Test

       We recommend configuring a rule on live mode to route payments lesser than a set value (for example, ₹2) to the PhonePe gateway. This helps to test on production whether small value payments are being routed to PhonePe and working successfully, thus avoiding any direct impact on production traffic.

        To configure a rule in live mode:
        1. Log in to your Dashboard.
        2. In the left navigation, click **Optimizer**.
        3. Click **+Add Rule** and enter the **Rule name** and **Description**.
        4. Click **Next** and enter the following rule:
            - In **Parameter** field, select **Amount (In Rupees)**.
            - In **Select Connection** field, select **Less Than**.
            - In **Enter Amount** field, enter the value 2 and click **Next**.
             
        5. Enter the value 100 in the **Route field**, select **PhonePe** in the **Payment Via** field, and click **Next**.
             
        6. Click **Publish Rule**.
             
       
   

## Go Live
After the integration is tested and successful, you can go live on PhonePe.
