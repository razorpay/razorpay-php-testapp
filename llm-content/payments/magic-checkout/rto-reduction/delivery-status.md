---
title: Delivery Status | Razorpay Magic Checkout
heading: Delivery Status
description: Share the order history (pre-Magic Checkout) and monthly delivery status for Razorpay Magic Checkout orders to improve intelligence and RTO protection.
---

# Delivery Status

You can share your historical order data (pre-Magic Checkout) and delivery status with Razorpay Magic Checkout for improved COD intelligence and better RTO protection. You must upload the following:
- [Monthly Delivery Data](#monthly-delivery-data) for Magic Checkout orders.
- [Pre-Magic Delivery Data](#pre-magic-delivery-data).

#### Advantages

- Reduce the RTO rate in the long run.
- Get improved COD intelligence from day 1.
- Better RTO protection.

## Monthly Delivery Data

You can share the monthly delivery status data for Magic Checkout orders to be eligible for RTO protection and get improved COD intelligence.

If you have not integrated with logistics partners like [Shiprocket](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/shiprocket.md), [Delhivery](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/delhivery.md), [iThink Logistics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/ithink-logistics.md), [Unicommerce](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/unicommerce.md) and [ClickPost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/clickpost.md), you must manually upload the data. 

    
### To upload the delivery statuses:

         1. Log in to the Dashboard and navigate to **Magic Checkout**.
         2. Select the platform of your e-commerce website, enter the relevant details and click **Next**.
         3. Navigate to **RTO Reduction Setup** → **Delivery Data Upload**. 
         4. In the **RTO Reduction Setup** section, navigate to the **Delivery Data Upload** tab. 
         5. Click **+ Upload Delivery Statuses**.
             
         6. Download the **sample file** for the template. Enter the Order id, Status, Shipping Charges, AWB number and Shipping Provider to claim RTO Insurance. Upload the file.
             
> **WARN**
>
> 
>              **Watch Out!**
> 
>              - Shipping provider and AWB number fields are mandatory.
>              - Merchant_order_id should contain your platform order id as mentioned in the order. For example, `#BCA1011`.
>              - The status should contain the shipping status against the order. For example, RTO, Delivered, Cancelled and so on.
>              - Upload a `.csv` or an `.xlsx` file. 
>              - The maximum size of the file is 50MB.
>              - The number of rows in the file should not exceed 1 million.
>              

             

         Here is a glimpse of the sample file:
        

## Pre-Magic Delivery Data

You can share your shipping provider's pre-Magic Checkout order history on Razorpay Magic Checkout for the last 6 months to get improved COD intelligence and better RTO protection. 
Follow the steps given below to share the order history:

    
### 1. Export Order History

         We recommend that you upload the data for the last 6 months. Currently, Magic Checkout supports order history upload for: 
         
             
                 Shiprocket
                 
                  Follow the steps given below:

                  1. Log in to the [Shiprocket Dashboard](https://app.shiprocket.in/login) and navigate to **Orders**.
                      
                  1. Under **All**, select **Custom** and filter the data for the last 6 months. Click **Apply**.
                      
                  1. Click the download icon.
                      .
                  1. Your report is sent to your email id or you can also download it from the **Reports Panel**.
                 

             
### Delhivery *(Old Dashboard)*

                  Follow the steps given below:

                  1. Log in to the [Delhivery Dashboard](https://cl.delhivery.com/app/home) and click **Go to Dashboard**.
                      
                  1. Click **APPLY FILTER**.
                  1. Click **Custom Date Range** and select the **Start Date** and the **End Date**. Click **Apply Filter**.
                      
                  1. Click **Download**.
                      
                 

             
### Pickrr

                  Follow the steps given below:

                  1. Log in to the Pickrr Dashboard.
                  1. Navigate to **Reports** → **Advanced Report**.
                      
                  1. Select **Download By Data Range**.
                  1. Select upload dates.
                  1. Select the **File Type** as **MIS**.
                  1. Select the **Status** as **All** from the drop-down list.
                  1. Enter your **Email Address** and click **Download**. The report download link is sent to your email ID. 
                      
                 

         
        
    
    
### 2. Upload Order History

         To upload order history:
          1. Log in to the Razorpay Dashboard and navigate to **Magic Checkout**.
          2. Select the platform of your e-commerce website, enter the relevant details and click **Next**.
          3. In the **RTO Reduction Setup** section, navigate to the **RTO History** tab. 
          4. Click **+ Upload Order History**.
              
          5. Select the **Shipping Provider** from the drop-down list.
          6. Upload the order history file you downloaded in the [previous step](#step-1-export-order-history).

              
> **WARN**
>
> 
>               **Watch Out!**
> 
>               - Upload a `.csv` file. Only one file upload is allowed.
>               - The maximum size of the file is 50MB.
>               - If you use multiple shipping providers, please upload the file from your most frequently used provider.
>               

          7. Click **Confirm**.
              
        

### Related Information 
- [RTO Analytics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/analytics/rto.md)
- [Integrate with Logistics Partners](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners.md)
