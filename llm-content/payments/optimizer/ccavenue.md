---
title: CCAvenue
description: Add CCAvenue as a payment provider on Optimizer.
---

# CCAvenue

Follow the below steps to onboard CCAvenue as a payment provider.

> **WARN**
>
> 
> **Watch Out!**
> 
> - While Optimizer can route payments based on your business logic, the method enablement of each gateway must be handled between you and the gateway, or it may lead to failed payments.
> - CCAvenue does not support **tokenisation**.
> 

    
### Prerequisites

         
            1. Write to your CCAvenue Relationship Manager asking to do the following:
                 - Ignore the IP validation. 
                
> **WARN**
>
> 
>                 **Watch Out!**
> 
>                 You must provide the attached undertaking signed on your company's letterhead along with signature of authorised personnel for CCAvenue to ignore the IP validation. Know more about [undertaking for Ignore IP Validation](#undertaking-for-ignore-ip-validation).
>                 

                 - Enable seamless/S2S mode for your account. Mention that you use Razorpay as the technology company to handle sensitive card data.
                
> **WARN**
>
> 
>                 **Watch Out!**
> 
>                 You must provide proof of service or business relationship between you and Razorpay to enable seamless/S2S mode.
>                 

                 - Enable the methods `cards`, `wallets` and `netbanking`.
                 - Disable billing information on MID (Merchant ID).
                 - Whitelist the following URL to initiate transaction:
                    - `https://api.razorpay.com/`
            2. Copy Razorpay in the email and we will provide the supporting document from our end.
        

## Integration Requirements

Use the format given below on your company's letterhead to enable IP ignore:

    
### Undertaking for Ignore IP Validation

         To,

         Infibeam Avenues

         We, `Merchant`, hereby confirm that we want to enable the “ignore IP check “ for existing `bank`
         merchant’s with reseller code `` of Infibeam Avenues and accept the risk associated with it
         as stated further. IP/domain white-listing enables restricting the access to merchant’s service from one
         or more trusted IP’s only. For whatsoever reason, if the shared encryption key of the merchant gets
         compromised then it will not be possible to reject the merchant requests coming virtually from anywhere.

         Thanks and Regards,

         ``

         Designation

         Date:
        

## Add CCAvenue as Payment Provider

    
### To add CCAvenue as a payment provider:

         
            1. Log in to your Dashboard. 
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
                ![optimizer login](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-login.jpg.md)
            3. In the top-right section, click **Add Provider**.
                ![Add provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-provider.jpg.md)
            4. Select **CCAvenue** in the list of gateways available and click **Next**.
                ![Add CCAvenue](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-ccavenue.jpg.md)
            5. Enter the provider name and description and click **Next**.
                ![Add Provider Name CCAvenue](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/provider-name-ccavenue.jpg.md)
            6. Enter your **Access code**, **MID** and **Working Key**.
            7. Select the payment methods you want to enable for CCAvenue and click **Submit**. 
                ![Add Key CCAvenue](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-key-ccavenue-new-one.jpg.md)
            You have successfully added **CCAvenue** as a payment provider on Optimizer.
        

## Supported Payment Methods

Payment Methods | Availability
---
Netbanking | Live
---
Cards | Live
---
UPI | Live
---
Wallets | Coming Soon

## Best Practices

Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured on live or test mode on the Razorpay Dashboard will reflect on live mode. However, credentials added on test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of small value and ensure that the credentials are correct.
        

    
### Perform Self-Sanity Test

       We recommend configuring a rule on live mode to route payments lesser than a set value (for example, ₹2) to the CCAvenue gateway. This helps to test on production whether small value payments are being routed to CCAvenue and working successfully, thus helping to avoid any direct impact on production traffic.

       Follow the steps given below to configure a rule in live mode:
        1. Log in to your Dashboard.
        2. In the left navigation, click **Optimizer**.
        3. Click **+Add Rule** and enter the **Rule name** and **Description**.
        4. Click **Next** and enter the following rule:
            - In **Parameter** field, select **Amount (In Rupees)**.
            - In **Select Connection** field, select **Less Than**.
            - In **Enter Amount** field, enter the value 2 and click **Next**.
            ![Add Rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-rule.jpg.md)
        5. Enter the value 100 in the **Route field**, select **CCAvenue** in the **Payment Via** field, and click **Next**.
            ![target Provider CCAvenue](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/target-provider-ccavenue.jpg.md)
        6. Click **Publish Rule**.
            ![Publish Rule CCAvenue](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/publish-rule-ccavenue.jpg.md)
        

## Go Live
After the integration is tested and successful, you can go live on CCAvenue.
