---
title: Cashfree
description: Add Cashfree as a payment provider on Optimizer.
---

# Cashfree

Follow the steps below to onboard Cashfree as a payment provider.

> **WARN**
>
> 
> **Watch Out!**
> 
> While Optimizer can route payments based on your business logic, the method enablement of each gateway needs to be handled between you and the gateway, or it may lead to failed payments.
> 

    
### Prerequisites

         1. [Write to your Cashfree Relationship Manager](#email-format-for-cashfree) and mention that you are using Optimizer to handle sensitive card data. Request to enable the following:
            - Seamless mode for your account.
            - Whitelist the domain/URL `https://api.razorpay.com/`.
         2. Copy Razorpay in the email and we will provide the supporting document from our end. Know more about the [email format for Cashfree](#email-format-for-cashfree).
         3. To pass your unique **Order ID** or **Receipt** for every order, write to your Relationship Manager to show the `orderNote` parameter in the Cashfree Dashboard and customise report.  Know more about [how to send your order id to Cashfree](#send-receipt-order-id-to-external-gateway).
         4. On the Cashfree Dashboard, select the `v0` version for payment success, pending and fail state events.
         5. For real time sync of refund status on Optimizer, please configure refund webhooks on your Cashfree dashboard. Endpoint URL: https://api.razorpay.com/v1/callback/cashfree
        

## Add Cashfree as a Payment Provider

    
### To add Cashfree as a payment provider:

         Watch this video to see how to add Cashfree as a Payment Provider.

            
[Video: https://www.youtube.com/embed/mLEU0wnuPKQ]

            **Steps**
            1. Log in to your Dashboard.
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
            3. In the top-right section, click **Add Provider**.
            4. Select **Cashfree** in the list of gateways available and click **Next**.
                 ![Add Cashfree](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-cashfree.jpg.md)
            5. Enter the provider name and description and click **Next**.
                 ![Add cashfree Provider Name](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cashfree-provider-name.jpg.md)
            6. Enter your App ID and App secret Key.
            7. Select the payment methods you want to enable for Cashfree and click **Submit**. 
                 ![Add App key secret cashfree](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-app-key-secret.jpg.md)
            
            You have successfully added **Cashfree** as a payment provider on Optimizer.
        

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
---
EMI | Coming Soon
---
Settlements | Live
---
Refunds | Live

> **INFO**
>
> 
> **Handy Tips**
> 
> Cashfree supports [Third-Party Validation (TPV)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/third-party-validation.md#supported-bank-gateways-payment-gateways-and-payment-methods).
> 

## Email Format for Cashfree

    
### Follow the email format given below to communicate the [prerequisites](#prerequisites) or any other requirements to the Cashfree Account Manager:

         Dear `Account Manager`,

         We are using “Optimizer” as a technology service provider to manage our integration with Cashfree for account ``. 

         In order to use this TSP, we require certain configurations to be enabled as mentioned below:
         1. Enable **seamless** mode for our account.
         2. Please enable the account for card, netbanking and UPI transactions.

         Please share the following:
          - A list of the enabled banks for netbanking and networks for cards payments methods.
          - A sample of the existing payment request and response for payments.

         The PCI-DSS Certificate of Optimizer is attached with this email, as the confidential payment information will be handled by the Optimizer team.

         Regards,
        

## Send Receipt/Order ID to External Gateway
You might be generating a unique Order ID or Receipt for every order which can be passed to Cashfree via [ Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#orders-api). 

To make your order id visible on the Cashfree Dashboard:
1. In Razorpay's Orders API, use the `receipt` parameter to send your unique Order ID or Receipt.
2. Razorpay passes this value to Cashfree in `orderNote` parameter.
3. Write to your Cashfree Relationship Manager to show the parameter `orderNote` in the Dashboard and reports as per your use case.

## Best Practices

Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured on live or test mode on the Razorpay Dashboard will reflect on live mode. However, credentials added on test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of small value and ensure that the credentials are correct.
        

    
### Perform Self Sanity Test

         We recommend configuring a rule on live mode to route payments lesser than a set value (for example, ₹2) to the Cashfree gateway. This helps to test on production whether small value payments are being routed to Cashfree and working successfully, thus avoiding any direct impact on production traffic.

         To configure a rule in live mode:
         1. Log in to your Dashboard.
         2. In the left navigation, click **Optimizer**.
         3. Click **+Add Rule** and enter the **Rule name** and **Description**.
         4. Click **Next** and enter the following rule:
             - In **Parameter** field, select **Amount (In Rupees)**
             - In **Select Connection** field, select **Less Than**
             - In **Enter Amount** field, enter the value 2 and click **Next**.
                 ![Add Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-rule.jpg.md)
         5. Enter the value 100 in the **Route field**, select **Cashfree** in the **Payment Via** field, and click **Next**.
             ![Cashfree target Provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cashfree-target-provider.jpg.md)
         6. Click **Publish Rule**.
             ![Cashfree-Publish Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cashfree-publish-rule.jpg.md)
        
    

## Go Live
After the integration is tested and successful, you can go live on Cashfree.
