---
title: ZaakPay
description: Add ZaakPay as a payment provider on Optimizer.
---

# ZaakPay

Follow the steps below to onboard ZaakPay as a payment provider.

> **WARN**
>
> 
> **Watch Out!**
> 
> Optimizer routes payments based on your business logic. But, the method enablement of each gateway needs to be handled between you and the gateway, or it may lead to failed payments.
> 

    
### Prerequisites

         Reach out to your Relationship Manager to get your server-to-server or seamless integration kit with credentials.
        

## Add ZaakPay as Payment Provider

    
### To add ZaakPay as a payment provider:

            1. Log in to your Dashboard.
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
            3. In the top-right section, click **Add Provider**.
            4. Select **ZaakPay** in the list of gateways available.
                 ![Add Easebuzz](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-zaakpay-add.jpg.md)
            5. Enter the Provider Name and Description and click **Next**.
                 ![Add Easebuzz provider details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-zaakpay-add-provider.jpg.md)
            6. Enter your **Encryptionkeyid**, **Key**, **Publiccertkey** and **Salt** details.
            7. Select the **Payment Methods** you want to enable for ZaakPay and click **Submit**.
                 ![Add Easebuzz final details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-zaakpay-final.jpg.md)
            You have successfully added **ZaakPay** as a payment provider on Optimizer.
        

## Supported Payment Methods

Payment Methods | Availability
---
Netbanking | Live
---
Cards | Live
---
UPI | Live
---
Wallet | Live

> **INFO**
>
> 
> **Handy Tips**
> 
> ZaakPay supports [Third-Party Validation (TPV)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/third-party-validation.md#supported-bank-gateways-payment-gateways-and-payment-methods).
> 

## Best Practices

Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured on live or test mode on the Razorpay Dashboard will reflect on live mode. However, credentials added in test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of small value and ensure that the credentials are correct.
        

    
### Perform Self-Sanity Test

       We recommend configuring a rule in live mode to route payments lesser than a set value (for example, ₹2) to the ZaakPay gateway. This helps to test on production whether small value payments are being routed to ZaakPay and working successfully, thus helping to avoid any direct impact on production traffic.

       Follow the steps given below to configure a rule in live mode:
        1. Log in to your Dashboard.
        2. In the left navigation, click **Optimizer**.
        3. Click **+Add Rule** and enter the **Rule name** and **Description**.
        4. Click **Next** and enter the following rule:
            - In **Parameter** field, select **Amount (In Rupees)**.
            - In **Select Connection** field, select **Less Than**.
            - In **Enter Amount** field, enter the value 2 and click **Next**.
            ![Add Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-rule.jpg.md)
        5. Enter the value 100 in the **Route field**, select **ZaakPay** in the **Payment Via** field, and click **Next**.
            ![target Provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/zaakpay-target-provider.jpg.md)
        6. Click **Publish Rule**.
            ![Publish Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/zaakpay-publish-rule.jpg.md)
        

## Go Live
After the integration is tested and successful, you can go live on ZaakPay.
