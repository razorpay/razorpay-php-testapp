---
title: Simpl
description: Add Simpl as a payment provider on Optimizer.
---

# Simpl

Simpl PayLater and Pay-in-3 is a flexible BNPL option that lets customers split their purchases into three equal, interest-free installments. Payments are completed instantly at checkout without entering card details or OTPs. Simpl bills the total amount in three parts over a set period. For businesses, it helps enhance user experience, reduce cart drop-offs, and boost conversions while encouraging customer loyalty through convenient, no-cost payment flexibility.

Follow the steps below to onboard Simpl as a payment provider.

> **WARN**
>
> 
> **Watch Out!**
> 
> Optimizer routes payments based on your business logic. But, the method enablement of each gateway needs to be handled between you and the gateway, or it may lead to failed payments.
> 

    
### Prerequisites

            Make sure you have Optimizer enabled for your Razorpay account.

            
> **INFO**
>
> 
>             **Handy Tips**
>             
>             No additional configuration is required on your businesses end for Simpl integration.
>             

        

## Integration Requirements

Before you go live with Simpl on Optimizer, add PayLater as a payment method on the Razorpay Dashboard.

    
### Configure PayLater (Simpl) as a payment method

         1. On the Razorpay Dashboard, navigate to **Account & Settings**.
         2. Select **PayLater** from the list of **payment methods**.
         3. Look for **Simpl** and click **Request**. Know more about [how to request for a payment method](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/payment-methods#request-for-payment-methods.md).
            ![paylater simpl request](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/simpl-paylatr-req.jpg.md)

         Once you complete the above steps, Simpl appears on your Razorpay Checkout.
        

## Add Simpl as Payment Provider

    
### To add Simpl as a payment provider:

         
            1. Log in to your Dashboard. 
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
            3. In the top-right section, click **Add Provider**.
            4. Select **Simpl** in the list of gateways available.
                ![Add simpl](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-simpl.jpg.md)
            5. Enter the provider name and description and click **Next**.
                ![simpl Add Provider Name](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/simpl-provider-name.jpg.md)
            6. Enter your **Gateway Terminal Id**.
            7. Select **Simpl** from the Paylaters dropdown under the payment method section, and click Submit.
                ![Add Key simpl](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-terminal-id-simpl.jpg.md)
            You have successfully added **Simpl** as a payment provider on Optimizer.
        

## Configure Custom Rule

    
### To route your transactions via Simpl:

         
            1. Log in to your Dashboard. 
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
            3. Click **+ Add New Rule**.
                ![Add simpl rule](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-simpl-rule.jpg.md)
            4. Enter the **Rule Name** and **Rule Description**, then click **Next**.
                ![Add simpl](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-simpl-rule-name-desc.jpg.md)
            5. Select the rule conditions as follows:
                - **When** - Select `Payment Method`.
                - **is** - Select `Equal to`.
                - **Select Comparing Value** - Select `paylater`.
            6. Click **Add Another Condition** and select the rule conditions as follows:
                - **When** - Select `PayLater Provider`.
                - **is** - Select `Equal to`.
                - **Select Comparing Value** - Select `Simpl Pay in 3`.
                ![Add simpl](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-simpl-rule-conditions.jpg.md)
            7. Click **Next**.
            8. In the **Route** section, enter **100**, select **Simpl** in the **Payment Via** section, and click **Next**.
                ![Add simpl](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-simpl-target-provider.jpg.md)
            9. Click **Publish Rule**.
                ![Add simpl](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/simpl-publish-rule.jpg.md)

            All transactions will now be routed via Simpl.
        

## Best Practices

Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured in live or test mode on the Razorpay Dashboard will reflect in live mode. However, credentials added in test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of a small value and ensure that the credentials are correct.
        

## Go Live
After the integration is tested and successful, you can go live with Simpl on Razorpay Optimizer.
