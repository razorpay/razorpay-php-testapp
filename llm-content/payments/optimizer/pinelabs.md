---
title: PineLabs
description: Add PineLabs as a payment provider on Optimizer.
---

# PineLabs

Follow the steps below to onboard PineLabs as a payment provider.

> **WARN**
>
> 
> **Watch Out!**
> 
> While Optimizer can route payments based on your business logic, the method enablement of each gateway needs to be handled between you and the gateway, or it may lead to failed payments.
> 

    
### Prerequisites

         1. [Write to your PineLabs Plural Account Manager](#email-format) with the following requests:
                - Enable all the required payment methods and refunds. Mention that you are using Razorpay as the technology company to handle sensitive card data.
                - Enable the Aggregator model. Otherwise, RRN and other attributes are not returned in the callback response of card payment initialisation. Razorpay supports only the aggregator model for Pine Labs Plural card integration.
                - Enable the INQUIRY API for your Pine Labs Plural account to check the payment status.
                - Allow dynamic URL in redirection URL.
         2. Copy Razorpay in the email and we will provide the supporting document from our end.
         3. Pine Labs Plural supports only the static callback URL (merchant_return_url). You need to share Razorpay's dynamic callback URL to whitelist. Share the following URL:
                - Production redirect URL format - `https://api.razorpay.com/v1/payments//callback//`

                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 After the Razorpay production URL is shared, the Pine Labs DBA team must configure the production database to support the Razorpay dynamic URL.
>                 

         4. To pass your unique **Order ID** or **Receipt** for every order, write to your Relationship Manager to show the `udf_data.udf_field_1` parameter in PineLabs Dashboard and customise report.  Know more about [how to send your order id to PineLabs](#send-receipt-order-id-to-external-gateway).
                
> **INFO**
>
> 
>                 **Handy Tips**
> 
>                 Only MasterCard and Visa networks will be supported by default for an AXIS terminal configuration done by PineLabs.
>                 

        

## Integration Requirements
Before you go live with PineLabs on Optimizer, whitelist the dynamic URL.

### URL Whitelisting
The dynamic URL pattern needs to be whitelisted for PineLabs, or the payments will fail. To whitelist the dynamic URL pattern for PineLabs, you should communicate the requirements to the PineLabs account manager via email in a specific manner. Know more about [how to communicate via email](#email-format).

## Add PineLabs as a Payment Provider

    
### To add PineLabs as a payment provider:

         1. Log in to your Dashboard.
         2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
         3. In the top-right section, click **Add Provider**.
                 ![Add provider](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-provider.jpg.md)
         4. Select **PineLabs** in the list of gateways available and click **Next**.
                 ![Add PineLabs](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-pinelabs.jpg.md)
         5. Enter the provider name and description and click **Next**.
                 ![Add PineLabs Provider](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-provider-pinelabs.jpg.md)
         6. Enter your Access code, Merchant ID and Secure secret.
         7. Select the payment methods you want to enable for PineLabs and click **Submit**.
                 ![Add Access Code](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-access-code.jpg.md)

            You have successfully added **PineLabs** as a payment provider on Optimizer.
        

 
## Supported Payment Methods

Payment Methods | Availability
---
Cards | Live
---
UPI (Collect) | Live
---
Refunds | Live
---
UPI (Intent) | Coming Soon
---
EMI | Coming Soon
---
Netbanking | Coming Soon

## Email Format 

    
### Follow the email format given below to communicate the [prerequisites](#prerequisites) or any other requirements to the PineLabs account manager:

            Dear `Account Manager`,

            We are using “Optimizer” as a technology service provider to manage our integration with PineLabs for account ``. 

            In order to use this TSP, we require the following configuration changes:

            1. Enable the **Aggregator model** for card transactions.
            2. Allow Dynamic URL in redirection/return URL (Configure the production database to support dynamic URL).
            3. Configure the below dynamic URL for return URL:

                
                Type | URL
                ---
                **Production URL** | `https://api.razorpay.com/v1/payments//callback//`
                ---
                

            4. Enable the INQUIRY API to check the payment status.
            5. Please enable the account for card, and UPI transactions.

            Please share a list of the enabled banks for netbanking and networks for cards payments methods so that this can be configured at our end.

            Regards,

        

## Send Receipt/Order ID to External Gateway
You might be generating a unique Order ID or Receipt for every order which can be passed to PineLabs via [ Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders#orders-api.md).

To make your order id to be visible on the PineLabs Dashboard:
1. In Razorpay's Orders API, use the `receipt` parameter to send your unique Order ID or Receipt.
2. Razorpay passes this value to PineLabs in the `udf_data.udf_field_1` parameter.
3. Write to your PineLabs Relationship Manager to show the parameter `udf_data.udf_field_1` in the Dashboard and reports as per your use case.

## Best Practices
Before routing all traffic or some traffic to a new gateway via Optimizer, the following best practices are recommended:

    
### Live and Test Mode Rules

         All rules configured on live or test mode on the Razorpay Dashboard will reflect on live mode. However, credentials added on test mode will not be automatically replicated in live mode.
        

    
### Sanity Test at Razorpay

         You can reach out to Razorpay for basic sanity testing of the integration. Razorpay will try a test payment of small value and ensure that the credentials are correct.
        

    
### Perform Self Sanity Test

       We recommend configuring a rule on live mode to route payments lesser than a set value (for example, ₹2) to the PineLabs gateway. This helps to test on production whether small value payments are being routed to PineLabs and working successfully, thus avoiding any direct impact on production traffic.

        To configure a rule in live mode:
        1. Log in to your Dashboard.
        2. In the left navigation, click **Optimizer**.
        3. Click **+Add Rule** and enter the **Rule name** and **Description**.
        4. Click **Next** and enter the following rule:
            - In **Parameter** field, select **Amount (In Rupees)**.
            - In **Select Connection** field, select **Less Than**.
            - In **Enter Amount** field, enter the value 2 and click **Next**.
             ![Add Rule](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/add-rule.jpg.md)
        5. Enter the value 100 in the **Route field**, select **PineLabs** in the **Payment Via** field, and click **Next**.
             ![PineLabs target Provider](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/pinelabs-target-provider.jpg.md)
        6. Click **Publish Rule**.
             ![PineLabs Publish Rule](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/pinelabs-publish-rule.jpg.md)
       
   

## Go Live
After the integration is tested and successful, you can go live on PineLabs.
