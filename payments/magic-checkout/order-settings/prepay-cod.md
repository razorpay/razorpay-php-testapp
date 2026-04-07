---
title: Convert COD Orders to Prepaid
description: Send your customers a Conversion Link via WhatsApp to convert COD orders to prepaid with Razorpay Magic Checkout.
---

# Convert COD Orders to Prepaid

Cash on Delivery transactions are popular in India. However, they can result in a higher return rate due to less customer commitment.

With Magic Checkout, you can urge customers who chose cash on delivery while placing an order to convert to prepaid by offering discounts or incentives post-order placement. You can do this by sending your customers a conversion link via WhatsApp to convert COD orders to prepaid.

> **INFO**
>
> 
> **Dependencies**
> 
> - This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
> - This feature is available only if you use [Shopify](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify.md) or [WooCommerce](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md) (v4.3.5 and above) plugin.
> 

    
### Advantages

         - **Increase Order Commitment**

         Since customers have already paid upfront, prepaid orders reduce the likelihood of cancellations or returns.

         - **Reduce RTO**
 
         Customers who invest their money are more likely to be satisfied with their purchases, leading to a decrease in RTO orders.

         - **Streamline Operations**

         Shifting to prepaid orders simplifies order fulfillment, reducing operational burdens and errors associated with cash handling and returns management.

         - **Enhance Customer Trust**

         Offering discounts or incentives for prepaid orders builds customer trust and loyalty, fostering a positive brand impression and increasing the likelihood of repeat purchases.
        

## Configure Conversion Link

Follow the steps given below:

1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings**.
2. Navigate to **COD Setup** → **Convert COD to Prepaid**.
3. Click **Convert COD to Prepaid**.
    

    
> **INFO**
>
> 
>     **Manually Review COD Orders**
> 
>     The **Enable conversion for** field will appear if you enable the [Manually review COD orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/order-settings/review-cod-orders.md) feature. The COD conversion will be based on the type of RTO risk.
>         
>     

4. Enable **Discount** to add a flat or percentage discount to the total COD order amount. Adding a discount increases the probability of conversion by up to 30%. Select the type of discount you want to apply: 
    
    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     Discount applied on the order amount excludes shipping and COD fee.
>     

    
        
            In this type, a fixed amount is deducted from the original amount.
            - **Discount value**: Enter an amount by which the original price should be reduced. For example, if ₹150 is the flat discount applied, ₹150 is deducted from the original price.
            - **Minimum order value**: Enter the minimum bill amount for which the discount can be applied. For example, if you enter ₹800, the discount is applied to orders whose bill amount is ₹800 or above.
              
        
        
            In this type, the offer is calculated in percentage.
            - **Discount percentage**: The percentage by which the original price should be reduced. For example, if 10 is the percentage discount to be applied, on an order amount of ₹900, ₹90 will be deducted.
            - **Maximum discount**: The maximum amount that can be deducted from the bill amount. For example, you can ensure that the customer cannot avail of a discount higher than ₹500, irrespective of the order amount.
            - **Minimum order value**: Enter the minimum bill amount for which the offer can be applied. For example, if you enter ₹800, the discount is applied to orders whose bill amount is ₹800 or above.
            
        
    
5. Select the **Order conversion validity** based on your requirement. Customers will not be able to convert COD orders to prepaid post validity. For example, if you set the order conversion validity to 15 minutes, customers cannot convert COD orders to prepaid 15 minutes after sending the conversion link. 

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     We recommend setting the order conversion validity below your average shipping start time. Customers should not be able to convert COD orders to prepaid after the order is shipped.
>     

6. You can convert orders only on **WhatsApp message**. Customers will receive the conversion link based on your selected option.

7. Click **Save settings**.
    
    
> **WARN**
>
> 
>     **WooCommerce API Credentials**
>     
>     If you are a WooCommerce user and have not opted for the [Manually review COD orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/order-settings/review-cod-orders.md) feature, you must provide your **WooCommerce API credentials** to enable us to send the conversion links to your customers.
>         
>     

> **WARN**
>
> 
> **WhatsApp Message Limitations**
> 
> - WhatsApp notifications for COD to prepaid conversion are subject to Meta's daily messaging limits of **5-6 marketing messages per customer**.
> - If customers have already received their daily limit of marketing messages from any WhatsApp Business account, COD to prepaid notifications may fail to deliver.
> - This is expected behavior due to Meta's WhatsApp Business API policies and affects all platforms using WhatsApp marketing messages, not specific to Razorpay.
> 

## Conversion States

After you send the conversion link to your customers, you can filter the search by Order Id and track the conversion status on the Dashboard. Navigate to **Magic Checkout** → **COD Order Conversion**. 

    
### List of Conversion States

         The table below lists the various conversion states and their descriptions:

         
         Status | Description
         ---
         Conversion Link Sent | Indicates that the conversion link is sent.
         ---
         Converted To Prepaid | Indicates that the customer successfully converted the order to prepaid.
         ---
         Auto Expired | Indicates that the link expired based on the order conversion validity (expiry time).
         ---
         Manually Expired | Indicates that you manually expired the link from the Dashboard. 
         ---
         Failed To Send Link | Indicates that the link is not sent to the customer due to technical issues or since the customer is not on WhatsApp.
         

         
> **INFO**
>
> 
>          **Conversion Link Sent State**
> 
>          When the link is in the **Conversion Link Sent** state, you can choose to expire the link manually. Follow the steps given below:
>              1. In the **COD Order Conversion** tab, select the **Order Id** for which you want to expire the conversion link. 
>              2. Under **Actions**, click the clock icon.
>                  
>              3. Click **Expire Link** to confirm your action.
>          

        

## Customer Experience

Customers view the conversion link on WhatsApp sent via Razorpay's WhatsApp handle and can choose to prepay for the order.

### Edit Display Name *(Optional)*

You can change the business name displayed on the WhatsApp message to a name that your customers are familiar with. For example, if **Acme Corp's** official business name is XYZ Technologies, but customers know them as Acme Corp, we recommend using **Acme Corp** as the display name.

    
### To edit the display name:

         1. Log in to the Dashboard and navigate to **Account & Settings**.
         2. In the **Business settings** section, select **Account details**.
             
         3. Click **Edit** and modify the name.
