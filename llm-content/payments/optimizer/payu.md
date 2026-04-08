---
title: PayU
description: Add PayU as a payment provider on Optimizer.
---

# PayU

Follow the steps below to onboard PayU as a payment provider.

> **WARN**
>
> 
> **Watch Out!**
> 
> Optimizer routes payments based on your business logic. But, the method enablement of each gateway needs to be handled between you and the gateway, or it may lead to failed payments.
> 

    
### Prerequisites

         
            1. [Write to your PayU Relationship Manager](#email-format) with the following requests and copy `production.support@payu.in` on the email:
                - Enable seamless mode for your account. Mention that you use Razorpay as the technology company to handle sensitive card data.
                - Disable **Retry**. 
                - Configure the webhook URL as `https://api.razorpay.com/v1/callback/payu` to receive **UPI** and **Emandate** response.
                - Enable the required banks for **Netbanking** and **Emandate**.
                - **UPI** as a payment method
                    - Enable UPI on **seamless**/**S2S** with the flag`txn_s2s_flow=4`.
                    - Enable **UPI Intent**.
                - **Cards** as a payment method
                    - Enable the method **cards**.
                    - Enable the required networks (eg: visa, master, amex, rupay).
                - **Netbanking** as a payment method
                    - Enable the method **netbanking**.
                - **Emandate** as a payment method
                    - Enable the method **ENACH**.
                    - Subscribe webhooks for all emandate payment events.
            2. Copy Razorpay in the email. We will provide the supporting document from our end. Know more about the [email format for PayU](#email-format).
            3. To pass your unique **Order ID** or **Receipt** for every order, write to your relationship manager to show the `udf1` parameter in PayU Dashboard and customize report.  Know more about [how to send your order id to PayU](#send-receipt-order-id-to-external-gateway).
            4. If you wish to send PayU's offer ID to the downstream gateway, you can use Optimizer's `Custom Identifier 1` to map PayU’s Offer key. This will help you send offer keys to PayU for processing and reconciliation.
        

## Integration Requirements

Before you go live with PayU on Optimizer, disable the retry option.

    
### Retry Disablement

         PayU attempts a retry on the PayU checkout page by default. This needs to be disabled while using PayU via Optimizer as all payments need to be routed through Razorpay and its checkout. If retry is enabled, Razorpay will not know about the status of the payment, and it may lead to breakages.

         Consider the following points:
         1. The retry disablement option can only be done in one go for all methods as PayU cannot disable retry at a method level.
         2. If you have an existing integration with PayU, disabling retry might partially affect the success rate. Follow the steps given below to avoid any implications:
            - Disable the retry option before the traffic goes live on Optimizer and plan a quick switch-over once testing is completed.
            - Create a new account on PayU side to limit the impact on existing integrations for you and PayU.
            - Get all the configurations done except for retry disablement and ask PayU to disable retry just before you go live.
        

    
### Route EMI Transactions

            To route EMI transactions via Optimizer, configure the rule as follows:
            1. Log in to your Dashboard. 
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
            3. Click **+Add New Rule** and enter the **Rule name** and **Description**.
            4. Click **Next** and enter the following rule:
                - **Select Parameter**: Select **Payment Method**.
                - **Select Connection**: Select **Equal to**.
                - **Select Comparing Value**: Select **emi**.
            5. Click **Add Another Condition** and enter the following rule:
                - **Select Parameter**: Select **EMI Duration**.
                - **Select Connection**: Select **Equal to**.
                - **Select Comparing Value**: Select **the EMI Duration** as per your requirement, and click **Next**. Know more about [EMI durations](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/supported-gateways-aggregators.md#emi) for PayU EMI.
                 ![Rule for EMI PayU](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emi-payu-route.jpg.md)
            6. Enter the value **100** in the **Route** field, select **payu** in the **payment via** field, and click Next.
                 ![Add provider EMi PayU](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emi-payu-provider.jpg.md)
            7. Click **Publish Rule**.
                 ![EMI PayU Publish Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emi-payu-publish-rule.jpg.md)
        

## Add PayU as Payment Provider

    
### To add PayU as a payment provider:

         
            1. Log in to your Dashboard. 
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
            3. In the top-right section, click **Add Provider**.
            4. Select **PayU** in the list of gateways available and click **Next**.
                ![Add PayU](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-payu.jpg.md)
            5. Enter the provider name and description and click **Next**.
                ![Add Provider Name](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/provider-name.jpg.md)
            6. Enter your PayU key and Salt key.
            7. Select the payment methods you want to enable for PayU and click **Submit**. 
                ![Add Salt Key sodexo](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-key-salt-payu.jpg.md)
            You have successfully added **PayU** as a payment provider on Optimizer.
        

## Supported Payment Methods
Given below is the list of card networks and payment gateways that support the CVV-less feature on Optimizer.

    
        
        S No. | Payment Methods | Availability
        ---
        1 | Netbanking | Live
        ---
        2 | Cards | Live
        ---
        3 | UPI | Live
        ---
        4 | Wallet | Live
        ---
        5 | EMI | Live
        ---
        6 | Settlements | Live
        ---
        7 | Refunds | Live
        ---
        8 | Emandate | Live
        ---
        9 | [Sodexo](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/sodexo.md) | Live
        
    
    
        
        S No. | Payment Methods | Availability
        ---
        1 | [Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md) | Live
        ---
        2 | [Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/cards/integrate.md) | Live
        ---
        3 | UPI Autopay | Live
        
    

> **INFO**
>
> 
> **Handy Tips**
> 
> PayU supports [Third-Party Validation (TPV)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/third-party-validation.md#supported-bank-gateways-payment-gateways-and-payment-methods).
> 

## Email Format

    
### Follow the email format given below and copy `production.support@payu.in` on the email to communicate the prerequisites or any other requirements to the PayU account manager.

            Dear `Account Manager`,

            
            We are using “Optimizer” as a technology service provider to manage our integration with PayU for account ``. 

            In order to use this TSP, we require certain configurations to be enabled as mentioned below:
            1. Enablement of S2S/seamless integration for the above MID.
            2. Disablement of the retry option for all methods.
            3. Configuration of the below end points for transaction callbacks for production and stage:

                
                Type | URL
                ---
                **Production URL** | `https://api.razorpay.com/v1/callback/payu`
                ---
                **Stage URL** | `https://beta-api.razorpay.com/v1/callback/payu`
                ---
                

            4. Enablement of UPI, Cards, Wallet and Netbanking. (Please change this as per requirement)
            5. Enable Method UPI on S2S with `txn_s2s_flow = 4` and also enable UPI Intent.
            6. Enable all the card networks like visa, master, amex, rupay, etc.
            7. Enable all the banks for Netbanking.

            Please share a list of the enabled banks for netbanking and networks for cards payments methods so that this can be configured at our end.

            Additionally, please share the KEY and SALT for the account so that we can complete the integration.

            Regards,
        

## Send Receipt/Order ID to External Gateway
You might be generating a unique Order ID or Receipt for every order which can be passed to PayU via [ Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#orders-api). Follow the steps given below for your order id to be visible on the PayU Dashboard:

1. In Razorpay's Orders API, use the `receipt` parameter to send your unique Order ID or Receipt.
2. Razorpay passes this value to PayU in the `udf1` parameter.
3. Write to your PayU Relationship Manager to show the parameter `udf1` in the Dashboard and reports as per your use case.

## Best Practices

Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured on live or test mode on the Razorpay Dashboard will reflect on live mode. However, credentials added on test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of small value and ensure that the credentials are correct.
        

    
### Perform Self-Sanity Test

       We recommend configuring a rule on live mode to route payments lesser than a set value (for example, ₹2) to the PayU gateway. This helps to test on production whether small value payments are being routed to PayU and working successfully, thus helping to avoid any direct impact on production traffic.

       Follow the steps given below to configure a rule in live mode:
        1. Log in to your Dashboard.
        2. In the left navigation, click **Optimizer**.
        3. Click **+Add Rule** and enter the **Rule name** and **Description**.
        4. Click **Next** and enter the following rule:
            - In **Parameter** field, select **Amount (In Rupees)**.
            - In **Select Connection** field, select **Less Than**.
            - In **Enter Amount** field, enter the value 2 and click **Next**.
            ![Add Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-rule.jpg.md)
        5. Enter the value 100 in the **Route field**, select **PayU** in the **Payment Via** field, and click **Next**.
            ![target Provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/target-provider.jpg.md)
        6. Click **Publish Rule**.
            ![Publish Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/publish-rule.jpg.md)
        

## Go Live
After the integration is tested and successful, you can go live on PayU.
