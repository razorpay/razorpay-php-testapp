---
title: Paytm S2S
description: Add Paytm Server-to-Server as a payment provider on Optimizer.
---

# Paytm S2S

Follow the steps below to onboard Paytm Server-to-Server as a payment provider.

> **WARN**
>
> 
> **Watch Out!**
> 
> While Optimizer can route payments based on your business logic, the method enablement of each gateway needs to be handled between you and the gateway, or it may lead to failed payments.
> 

    
### Prerequisites

         1. [Write to the Paytm Support Team](#email-format-for-paytm) with the following requests:
             - Enable seamless mode for your account. Mention that you are using a technology company to handle sensitive card data.
             - Configure the following webhooks:

            
            Type | URL
            ---
            **Production URL** | `https://api.razorpay.com/v1/callback/paytm`
            ---
            **Stage URL** | `https://beta-api.razorpay.com/v1/callback/paytm`
            
            - Configure the following if you intend to use UPI.
            - Update **settlement API page size** from 20 to 200.
            - Enable **Refund Processing** to process refunds for your merchant ID.

         2. To pass your unique **Order ID** or **Receipt** for every order, write to Paytm support team to show the `extendInfo.udf1` parameter in the Paytm Dashboard and customize report.  Know more about [how to send your order id to Paytm](#send-receipt-order-id-to-external-gateway).
        

## Add Paytm as a Payment Provider

    
### To add Paytm (S2S) as a payment provider:

            1. Log in to your Dashboard.
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
            3. In the top-right section, click **Add Provider**.
            4. Select **PayTm** in the list of gateways available and click **Next**.
                 ![Add Paytm](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-add.jpg.md)
            5. Select **Server-to-Server** and click **Next**.
                 ![Select Paytm server-to-server](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-select-s2s.jpg.md)
            6. Enter the provider name and description and click **Next**.
                 ![Add Paytm provider details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-add-provider.jpg.md)
            7. Enter your **INDUSTRY_TYPE_ID**, **KEY**, **MID** (merchant id) and **WEBSITE** details.
            8. Select the **Payment Methods** you want to enable for Paytm and click **Submit**.
                 ![Add Paytm final details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-final-new.jpg.md)
            You have successfully added **Paytm Server-to-Server** as a payment provider on Optimizer.
        

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

## Email Format for Paytm

    
### Follow the email format given below to communicate the [prerequisites](#prerequisites) or any other requirements to the Paytm support team:

            Send the email to the following email IDs:

            - `devsupport@paytmpayments.com`
            - `pg.support@paytmpayments.com`

            Dear Team,

            We are using a technology service provider to manage our integration with Paytm for account ``. 

            In order to use this TSP, we require the following configuration changes:
            1. Kindly enable seamless pro or S2S mode for our account.
            2. Please enable the account for card and netbanking transactions.
            3. Configuration of the below end points for transaction callbacks for production and stage:

                
                Type | URL
                ---
                **Production URL** | `https://api.razorpay.com/v1/callback/paytm`
                ---
                **Stage URL** | `https://beta-api.razorpay.com/v1/callback/paytm`
                ---
                

            4. Enable refund processing on this MID.
            5. Enable UPI for this account.

            Also, please share the following credentials of our account with us:
            - INDUSTRY_TYPE_ID
            - KEY
            - MID
            - WEBSITE

            Please share a list of the enabled banks for netbanking and networks for cards payments methods so that this can be configured at our end.

            Regards,

        

## Send Receipt/Order ID to External Gateway
You might be generating a unique Order ID or Receipt for every order which can be passed to Paytm via [ Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#orders-api). 

To male your order id visible on the Paytm Dashboard:
1. In Razorpay's Orders API, use the `receipt` parameter to send your unique Order ID or Receipt.
2. Razorpay passes this value to Paytm in the `extendInfo.udf1` parameter.
3. Write to your Paytm support team to show the parameter `extendInfo.udf1` in the Dashboard and reports as per your use case.

## Best Practices
Before routing any traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured on live or test mode on the Razorpay Dashboard will reflect on live mode. However, credentials added on test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of small value and ensure that the credentials are correct.
        

    
### Perform Self Sanity Test

        We recommend configuring a rule on live mode to route payments lesser than a set value (for example, ₹2) to the Paytm gateway. This helps to test on production whether small value payments are being routed to Paytm and working successfully, thus avoiding any direct impact on production traffic.

        To configure a rule in live mode:
        1. Log in to your Dashboard.
        2. In the left navigation, click **Optimizer**.
        3. Click **+Add Rule** and enter the **Rule name** and **Description**.
        4. Click **Next** and enter the following rule:
            - In **Parameter** field, select **Amount (In Rupees)**.
            - In **Select Connection** field, select **Less Than**.
            - In **Enter Amount** field, enter the value 2 and click **Next**.
            ![Add Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-rule.jpg.md)
        5. Enter the value 100 in the **Route field**, select **Paytm** in the **Payment Via** field, and click **Next**.
            ![Paytm target Provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-rule-add.jpg.md)
        6. Click **Publish Rule**.
            ![Paytm Publish Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-publish-rule.jpg.md)
        

## Go Live
After the integration is tested and successful, you can go live on Paytm.
