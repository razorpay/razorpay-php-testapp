---
title: Paytm Instant (beta)
description: Add Paytm Instant (beta) as a payment provider on Optimizer.
---

# Paytm Instant (beta)

Go live with your Paytm Payment Gateway account instantly using the **Instant** integration mode. This is a beta release and supports limited [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/paytm-instant.md#supported-payment-methods). Follow the steps below to onboard Paytm Instant (beta) as a payment provider.

    
### Prerequisites

         - You need to have an active Paytm account with the necessary payment methods activated.
         - [Write to the Paytm Support Team](#email-format-for-paytm-instant-beta) to enable refunds via API for your Paytm account.
         - Generate API keys on the [Paytm Dashboard](https://dashboard.paytm.com/login/).
            1. Log in to the Paytm Dashboard.
            2. Navigate to **Developers Settings** → **API Keys** and generate live API keys.
             ![Paytm test API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-test-api-keys.jpg.md)
        

## Add Paytm as a Payment Provider

    
### To add Paytm (instant) as a payment provider:

         1. Log in to your Dashboard.
         2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
         3. In the top-right section, click **Add Provider**.
         4. Select **PayTm** in the list of gateways available and click **Next**.
             ![Add Paytm](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-add.jpg.md)
         5. Select **Instant (beta)** and click **Next**.
             ![Select Paytm Insant (beta)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-select-instant.jpg.md)
         6. Enter the provider name and description and click **Next**.
             ![Add Paytm provider details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-add-provider.jpg.md)
         7. Enter your **INDUSTRY_TYPE_ID**, **KEY**, **MID** (merchant id) and **WEBSITE** details.
         8. Select the payment methods you want to enable for Paytm and click **Submit**.
             ![Add Paytm final details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-final-new.jpg.md)
                
         You have successfully added **Paytm Instant (beta)** as a payment provider on Optimizer.
        

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
> If you want to offer all payment methods and support refunds from the Dashboard, please use the [S2S integration mode](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/paytm-s2s.md).
> 

## Email Format for Paytm Instant (beta)

Follow the email format given below to get Refund API enabled on your Paytm PG account:

To: `pg.support@paytmpayments.com`, `devsupport@paytmpayments.com` 

Subject: Enabling Refunds API on MID `Paytm MID` 

Dear Team,

Please enable refunds via API for our Paytm PG account with MID `Paytm MID`

Regards, 

## Send Receipt/Order ID to External Gateway
You might be generating a unique Order id or Receipt for every order which can be passed to Paytm via [ Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#orders-api). 

To make your order id visible on the Paytm Dashboard:
1. In Razorpay's Orders API, use the `receipt` parameter to send your unique Order id or Receipt.
2. Razorpay passes this value to Paytm in the `extendInfo.udf1` parameter.
3. Write to your Paytm Relationship Manager to show the parameter `extendInfo.udf1` in the Dashboard and reports as per your use case.

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
            5. Enter the value 100 in the **Route field**, select **Paytm** in the **payment via** field, and click **Next**.
                ![Paytm target Provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-rule-add.jpg.md)
            6. Click **Publish Rule**.
                ![Paytm Publish Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-paytm-publish-rule.jpg.md)

        

## Go Live
After the integration is tested and successful, you can go live on Paytm.
