---
title: BillDesk
description: Add BillDesk as a payment provider on Optimizer.
---

# BillDesk

Follow the steps below to onboard BillDesk as a payment provider.

    
### Prerequisites

         1. Write to your BillDesk Relationship Manager  with the following requests:
            - Enable seamless/S2S mode for your account. Mention that you use Razorpay as the technology company to handle sensitive card data.
            - Enable `cards`, `upi` and `netbanking` methods.
            - Configure the common BillDesk certificate used by Optimizer merchants.
            - Configure the following webhook:

            
            Type | URL
            ---
            **Production URL** | `https://api.razorpay.com/v1/callback/billdesk_optimizer`
            
            - Enable the following if you intend to use UPI.
            - Whitelist the following IPs to make the API calls (Initiate Transaction, Authorization API call, Verify Transaction, Refund Initiation, Verify Refund):
                - 52.66.75.174
                - 52.66.76.63
                - 52.66.151.218
                - 35.154.217.40
                - 35.154.22.73
                - 35.154.143.15
                - 13.126.199.247
                - 13.126.238.192
                - 13.232.194.134
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             You should share the above mentioned IPs with BillDesk for whitelisting.
>             

            - Provide configuration details like a checksum algorithm for stage and production, BankID and card network list.
         2. BillDesk S2S card integration supports two features:
            - **Regular card processing**
            - **NoRedirect based Payment**

         You should configure **Regular card processing** at the BillDesk side, not **NoRedirect based Payment**.
         3. To pass your unique **Order ID** or **Receipt** for every order, write to your Relationship Manager to show the `additional_info1` parameter in BillDesk Dashboard and customised report.  Know more about [how to send your order id to BillDesk](#send-receipt-order-id-to-external-gateway).

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          While Optimizer can route payments based on your business logic, the method enablement of each gateway needs to be handled between you and the gateway, or it may lead to failed payments.
>          

        

## Add BillDesk as a Payment Provider

    
### To add BillDesk as a payment provider:

         1. Log in to your Dashboard.
         2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
             ![optimizer login](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-login.jpg.md)
         3. In the top right section, click **+ Add provider**.
             ![Add provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-provider.jpg.md)
         4. Select **BillDesk** in the list of gateways available and click **Next**.
             ![Add BillDesk](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-billdesk2.jpg.md)
         5. Enter the provider name and description and click **Next**.
             ![Add BillDesk Provider Name](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/billdesk-provider-name-description.jpg.md)
         6. Enter your Client ID and Merchant ID.
         7. Select the payment methods you want to enable for BillDesk and click **Submit**. 

             ![Add Security ID BillDesk](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-security-id2.jpg.md)
         You have successfully added **BillDesk** as a payment provider on Optimizer.
        

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
> Billdesk supports [Third-Party Validation (TPV)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/third-party-validation.md#supported-bank-gateways-payment-gateways-and-payment-methods).
> 

## Send Receipt/Order ID to External Gateway
You might be generating a unique Order ID or Receipt for every order which can be passed to BillDesk via [ Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#orders-api). 

Follow the steps given below for your order id to be visible on the BillDesk Dashboard:
1. In Razorpay's [ Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#orders-api), use the `receipt` parameter to send your unique Order ID or Receipt.
2. Razorpay passes this value to BillDesk in the `additional_info1` parameter.
3. Write to your BillDesk Relationship Manager to show the parameter `additional_info1` in the Dashboard and reports as per your use case.

## Best Practices

Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured on live or test mode on the Razorpay Dashboard will reflect on live mode. However, credentials added on test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of small value and ensure that the credentials are correct.
        

    
### Perform Self Sanity Test

         We recommend configuring a rule on live mode to route payments lesser than a set value (for example, ₹2) to the BillDesk gateway. This helps to test on production whether small value payments are being routed to BillDesk and working successfully, thus avoiding any direct impact on production traffic.

         To configure a rule in live mode:
         1. Log in to your Dashboard.
         2. In the left navigation, click **Optimizer**.
         3. Click **+Add Rule** and enter the **Rule name** and **Description**.
         4. Click **Next** and enter the following rule:
             - In **Parameter** field, select **Amount (In Rupees)**
             - In **Select Connection** field, select **Less Than**
             - In **Enter Amount** field, enter the value 2 and click **Next**.
                 ![Add Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-rule.jpg.md)
         5. Enter the value 100 in the **Route field**, select **billdesk_optimizer** in the **payment via** field, and click **Next**.
             ![BillDesk target Provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/billdesk-target-provider.jpg.md)
         6. Click **Publish Rule**.
             ![Publish Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/billdesk-publish-rule.jpg.md)
        
    

## Go Live
After the integration is tested and successful, you can go live on BillDesk.
