---
title: Reconcile Shopify Orders on Dashboard
description: Reconcile payments made on your Shopify store via Dashboard.
---

# Reconcile Shopify Orders on Dashboard

Reconciling payments made on your Shopify store with the data available on your Dashboard is a simple process.

![](/docs/assets/images/ecommerce-plugins-shopify-reconciliation-process-flow.jpg)

    
### Reconcile a Payment

         Follow the steps below to reconcile a payment:

         1. Log in to the [Shopify Dashboard](https://accounts.shopify.com/) and open the **Orders** tab. Click the drop-down to view the 1 Razorpay payment details.
            ![](/docs/assets/images/shopify-rzp-secure-details.jpg)
         2. Make a note of the payment id.
            ![](/docs/assets/images/shopify-payment-details.jpg)
         3. Log in to the Dashboard and navigate to **Transactions** → **Payments**. The payment appears on the list of payments. The payment id appears under the **Order Id** column. 
            ![](/docs/assets/images/shopify-rzp-payment-track.jpg)
         4. Match the payment id (on the Shopify Dashboard) with the Order id (on the Razorpay Dashboard) to map the payments.
        

    
### Reconcile Multiple Payments

         Follow the steps below to reconcile multiple payments:

         1. Log in to the [Shopify Dashboard](https://accounts.shopify.com/) and open the **Orders** tab.
         2. Select the required orders or time period. 
         3. Click **Export** to export the data. The **Payment References** column in the file contains the payment ids.
            ![Export Shopify order data](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-select-orders.jpg.md)
         4. Log in to the Dashboard and navigate to **Reports**. 
         5. Select **Shopify Payments Report** in the **Select Report Type** drop-down. 
         6. Select the period and format. 
         7. Click **Generate Report**.
            ![Download the Shopify Payments Report from Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-payments-report.jpg.md)
         8. Once the report is generated, click **Download**. The **Order ID** column in the file contains the payment ids.
         9. Match the **Payment References** column in the Shopify export with the **Order ID** column in the **Shopify Payments Report** to map the payments.
        

### Related Information

- [Integrate with Shopify Plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify.md)
- [Shopify FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify/faqs.md)
