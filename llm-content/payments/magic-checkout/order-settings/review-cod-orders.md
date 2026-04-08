---
title: Manually Review COD Orders | Razorpay Magic Checkout
heading: About Manual Review of COD Orders
description: Manually review COD orders with Razorpay Magic Checkout and take necessary actions based on our recommendations post-order placement to reduce RTOs.
---

# About Manual Review of COD Orders

You can manually review COD orders and take necessary actions based on our recommendations post-order placement to filter out potential RTOs.

#### Features
- Manually review COD orders to filter out potential RTO orders.
- Take necessary actions on COD orders based on the insights.
- Evaluate orders on priority based on the risk levels.

## How it Works

Follow the steps given below:

1. Log in to the Dashboard.
2. Navigate to **Magic Checkout**.
3. Select the platform of your e-commerce website, enter the relevant details and click **Next**.
4. Navigate to **RTO Reduction Setup** → **RTO Reduction**. 
5. Toggle on **Manually review COD orders**.
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     You can either opt for the automated option by enabling COD intelligence or manually review COD orders.
>     

    ![Opt for Manual Review on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-enable-manual-review.jpg.md)
6. Enter the required details based on the platform of your e-commerce website to align your actions performed on the Razorpay Dashboard with your e-commerce platform.
    
        
            No additional configuration is required to enable manual review.
        
        
            Enter the **Consumer Key** and **Secret**. Follow the steps given below:
                1. Log in to the [WordPress account](https://wordpress.com/log-in) and navigate to **WooCommerce** → **Settings**.
                1. Navigate to **Advanced** → **REST API**.
                1. Click **Add key**.
                    ![REST APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-rest-api.jpg.md)
                1. Enter the required details and click **Generate API Key**.
                    ![Generate keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-generate-apis.jpg.md)
                1. Copy the API keys and paste them onto the Razorpay Dashboard. Click **Submit**.
                    ![Submit keys on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-submit-keys.jpg.md)
        
        
            Enter the **URL to review orders API**, **User name** and **Password**. To generate the URL, click **instructions** and follow the steps. Copy the information and paste it on the Razorpay Dashboard. Click **Submit**.
                ![Submit Keys on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-ecommerce-platform-submit.jpg.md)
        
    
6. Click **Enable manual review**.

The COD option is enabled for all customers. You can now review the COD orders and take the necessary actions.

## Review COD Orders
Once you enable manual review for orders, navigate to **Orders** → **COD Order Conversion** on the Razorpay Dashboard.
Under this section, you can review all the COD orders and take relevant actions. The list gets populated with orders as and when customers place an order for COD.
- You can view the **Razorpay Order ID**, **Receipt**, **Date** when the order was placed and **RTO risk** level.
- Click on a particular **Order ID** to view the **Risk Reasons**, **recommendations** and **Customer Details**.

![Select order id to view the risk reasons, recommendations and customer details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-risk.jpg.md)

Based on the **Risk Reasons** and our recommendation, you can take the following actions:

    
### Approve Order

         There are no changes in the order. It indicates that you have reviewed the order but chose not to take action. Click the **approve icon** to approve the order.
         ![Approve order based on the risk level](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-approve-order.jpg.md)
        

    
### Cancel Order

         You can cancel the order based on the risk level and our recommendation. For example, if we have noticed a high return behaviour associated with this order; we recommend cancelling the order. The order status will change to cancelled on the COD orders tab and your [e-commerce platform](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/order-settings/review-cod-orders.md#e-commerce-platform). Click the **cancel icon** to cancel the order.
         ![Cancel Order based on the risk level](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-cancel-order.jpg.md)
        

    
### Mark Order On Hold

         It indicates that you have reviewed the order but have not decided what action to take. For example, if the address on order is incorrect, you might want to contact the customer and clarify the details. You can put the order on hold, review the order post clarification and decide if you want to approve or cancel the order. Click the **on hold icon** to put the order on hold.
         ![On hold order based on the risk level](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-hold-order.jpg.md)
        

You can view the orders in the respective tabs, **Approved Orders**, **Canceled Orders** and **On Hold Orders**.
![View the order in the respective tabs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-review-orders-tabs.jpg.md)

## E-Commerce Platform

Based on the action on the Razorpay Dashboard, the order status changes on your e-commerce platform as well.

    
### WooCommerce Dashboard

         Refer to the order states given below: 

         
         Action on Razorpay Dashboard | Status on WooCommerce Dashboard
         ---
         Approved Orders | `Processing`
         ---
         Canceled Orders | `Failed`
         ---
         On Hold Orders | `On hold`
         

         ![WooCommerce order status based on the actions on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-rto-orders-woocommerce-status.jpg.md)
        

    
### Shopify Dashboard

         Refer to the order states given below: 

         
         Action on Razorpay Dashboard | Status on Shopify Dashboard
         ---
         Approved Orders | No change, remains `Paid`
         ---
         Canceled Orders | Strike through
         ---
         On Hold Orders | `hold` tag in the **Tags Section**
         

         ![Shopify order status based on the actions on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-rto-orders-shopify-status.jpg.md)
        

### Related Information 
[COD Review Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/order-settings/review-cod-orders/workflow.md)
