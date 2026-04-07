---
title: Configure WooCommerce Options | Razorpay Magic Checkout
heading: Configure WooCommerce Options
description: Configure COD and shipping charges, COD intelligence, coupons, international shipping and more on your Razorpay Magic Checkout and WooCommerce Dashboard.
---

# Configure WooCommerce Options

You have various configuration options available on your Razorpay and WooCommerce Dashboard. You can perform the following configurations to suit your business needs:

- [Cash on Delivery](#cash-on-delivery)
- [RTO](#rto)
- [Convert COD Orders to Prepaid](#convert-cod-orders-to-prepaid)
- [Shipping Options](#shipping-options)
- [International Shipping](#international-shipping)
- [Coupons](#coupons)
- [Separate Billing Address](#separate-billing-address)
- [Capture and Validate GSTIN](#capture-and-validate-gstin)
- [Capture Order Instructions](#capture-order-instructions)
- [Gift Card Settings](#gift-card-settings)
- [Google and Facebook Analytics](#google-and-facebook-analytics)

## Cash on Delivery 

You can use this setting to enable COD on your store and configure the rules for selectively showing COD to customers based on specific locations, products, order amounts and more.

    
### To enable COD settings:

         1. Log in to the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **WooCommerce** from the **Platform** drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-configure-settings-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to the **COD Settings** → **COD Setup**.
         4. Enable **COD as a payment option**.
             
         5. Select the **Type of setting**.
         
             
                 Basic
                 
                  These COD settings are based on the cart value and zones, applicable for all the products irrespective of the product categories.
                  Follow the steps given below: 

                  1. Configure the **Cart order value** by selecting an option based on your requirement:
                      - **Charge COD Fee**: Charge a COD fee to customers who opt for the COD payment method. You can configure the order range and set a corresponding **Fee** accordingly.
                          1. Click **+ Add slabs**.
                          2. Enter the minimum and maximum order value for which the fee should apply.
                          3. Enter the **Delivery price**. For example, if the **Min Order Value** is ₹400, the **Max Order Value** is ₹1000, and the Fee is ₹50, a ₹50 COD fee is applied to any order value in this range.
                          4. Click **Save slabs**. 
                               
                          5. Click **+ Add rate slabs** if you want to create more slabs.   

                      - **Free COD**: No COD charge will apply within the configured order range. The customer cannot view the COD payment method if an order value does not fall within the configured range.
                          1. Click **+ Add slabs**.
                          2. Enter the minimum and maximum order value for which no COD charge should apply. For example, if the **Min Order Value** is ₹800 and the **Max Order Value** is ₹1200, the COD charge will not apply if the order value falls in this range.
                          3. Click **Save slab**.
                              
                          4. Click **+ Create more slabs** to create more slabs.

                      
> **WARN**
>
> 
>                       **Watch Out!**
>                     
>                       In the **Basic** type of setting, you cannot create overlapping slabs. For example, if you have already set a slab with a minimum order value of ₹200 and a maximum order value of ₹600, you cannot add another slab within that range, such as a minimum order value of ₹300 and a maximum order value of ₹500.
>                       

                  2. In the **COD zones** section, click **+ Add zones** to create shipping zones where COD is applicable.
                  3. Enter the **Zone name**.
                  4. Select the country, state, and city where the COD charges configured in the previous step should be applicable. Click **Confirm**.
                      
                  5. Click **Save & apply**.
                  6. Navigate to **Manual Zipcode upload** and click **Upload ZIP codes** to offer COD only to specific ZIP codes.
                     
                     
                     
> **INFO**
>
> 
>                      **Handy Tips**
>                      
>                      - Download the sample CSV file.
>                      - Enter the ZIP codes as individual rows in column 1. 
>                      - Upload the file in .CSV format. Maximum file size supported is 50 MB.
>                      

                  7. Drag the file or click **click to upload**.
                     
                     
> **WARN**
>
> 
>                      **Watch Out!**
>                      
>                      - You can only upload one file at a time. Uploading another file will overwrite the older file.
>                      - You cannot edit an uploaded file; you can only delete it and upload a new file.
>                      

                 

             
### Advanced

                  Configure COD settings based on the cart value and zones applicable to specific product categories. Follow the steps given below: 

                  1. In the **Cart order value** section, click **+ Add slabs**.
                  2. Enter the minimum and maximum order value for which the fee should apply. 
                  3. Enter the **Delivery price**. For example, if the **Min Order Value** is ₹400, the **Max Order Value** is ₹1000, and the fee is ₹50, a ₹50 COD fee will apply to any order value in this range.

                      
> **INFO**
>
> 
>                       **Handy Tips**
>                     
>                       If you do not want to charge a COD fee, you can create slabs and enter ₹0 as the delivery price. 
>                       

                    
                  4. Click **Save slab**. 
                      
                  5. Click **+ Create more slabs** if you want to create more slabs. 
                  6. In the **COD zones** section, click **+ Add zones** to create shipping zones where COD is applicable.
                  7. Enter the **Zone name**.
                  8. Select the country, state, and city where you want to apply COD charges configured in the previous step. Click **Confirm**.
                  9. You can configure COD based on either the zone or product categories.
                      - **Zone Configuration**: Manage applicable COD slabs and rates for different zones.
                          1. Click **+ Set zone configuration**.
                              
                          2. Select the slabs based on your requirement and click **Save configuration**. It is mandatory to configure all the zones you create. The COD charge applies to each zone based on the slabs you select.
                              
                          3. Click **Save & apply**.
                      - **Product categories**:  Create **Product categories** to establish custom rates or zone restrictions for different categories.
                          1. Enable the **Product categories** setting. Once you enable this setting, the **Zone configuration** field will not appear.
                          2. Click **+ Add categories**. 
                              
                          3. Enter the **Category name**. 
                          4. Select the products of your choice that you want to add to the category and click **Confirm**. You cannot add the same product in different categories.
                          5. Click **+ Create more categories** if you want to add more product categories.
                          6. Click **+ Set category configuration** to configure the zones and slabs for each category.
                              
                          7. Select the serviceable zone for the selected category and choose the slabs based on your requirements. For example, if you want to set configurations for the product category, Topwear, select the order range for this category on which COD should apply for each zone.
                          8. Click **Save configuration**. It is mandatory to configure slabs for all the zones you create.
                              
                          9. Click **Save & apply**.
                 

         
         ### Feature 

         
             
### Block List

                  You can create a blocklist for high-risk customers who often return products on delivery, resulting in damaged products during transit, high returns, refund issues, and more.

                  The customers mentioned in the blocklist based on the order phone number, email ID, device IP and shipping zip code will **not** be eligible for COD. 

                  
> **INFO**
>
> 
>                   **Handy Tips**
> 
>                   - Only the **Owner** and **Admin** roles have access to this feature.
>                   - Blocklist will work only if you enable COD as a payment option.
>                   

                  Follow the steps given below:

                  1. Log in to the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
                  2. Select **WooCommerce** from the platform drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-configure-settings-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
                  3. Navigate to **COD Setup** → **Block List**.
                  4. Click **+ Add New Blocklist**. 
                  5. You can either upload a list or enter it manually. 
                      - **To upload a list**:
                          1. Download the **sample file**.
                          2. Add the required data to the file. A maximum of 1M rows are acceptable in the file.
                          3. Upload the file in .CSV format. Maximum file size supported is 50 MB.
                      - **To manually enter the list**:
                          1. Select the **Type** from the drop-down list. 
                          2. Enter the values. You can enter up to 20 values by separating them with a comma based on the **type**.

                          
> **INFO**
>
> 
>                           **Handy Tips**
> 
>                           Enter the values in a valid format as given below: 
>                           - **Phone number**: 10-digit phone number with the country code. For example, +919000090000.
>                           - **Zip code**: 6-digit zip code.
>                           - **Device IP**: For example, 123.123.123.123.
>                           

                  6. Click **Confirm**.
                      
                  7. A pop-up page appears with the list of items added. Review the list and click **Add To Blocklist**.

                  The orders that fall under this list will not be eligible for COD.
                 

         
        
    

## RTO

You can either opt for the automated option by enabling COD intelligence or manually review COD orders.

    
### COD Intelligence

         Enable **COD Intelligence** to detect incorrect/non-serviceable addresses. This allows Magic Checkout to decide whether to show a particular customer the cash-on-delivery option based on their buying history, thus increasing the delivery percentage and reducing RTO rates. To enable COD intelligence: 

         1. Log in to the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. Select **WooCommerce** from the platform drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-configure-settings-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to **RTO Reduction Setup** → **RTO Reduction**.  
         4. Toggle on **COD Intelligence** and click **Enable COD Intelligence** in the confirmation pop-up modal. 

         
         
         You can disable **COD Intelligence** if required. This will enable the COD option for all the customers, including those considered risky by Magic Checkout. Once you enable COD intelligence, the **RTO Analytics** tab will appear. Know more about [RTO Analytics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/analytics/rto.md).

             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              - Magic Checkout automatically disables the cash on delivery option in case of high-risk customers who often return products on delivery resulting in damaged products during transit, high returns, refund issues, and so on. 
>              - You must enable COD Intelligence if you opt for RTO protection.
>              

        

    
### Manually Review COD Orders

         You can manually review COD orders to filter out potential RTO orders and, based on our insights, decide whether to offer customers the COD option.

         1. Log in to the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **WooCommerce** from the platform drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-configure-settings-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to **RTO Reduction Setup** → **RTO Reduction**.  
         4. Toggle on **Manually review COD orders**.
             
         5. Enter the **Consumer Key** and **Secret**. Follow the steps given below to generate API keys:
             1. Log in to the [WordPress account](https://wordpress.com/log-in) and navigate to  **WooCommerce** → **Settings**.
             1. Navigate to **Advanced** → **REST API**.
                 
             1. Click **Add Key**.
             1. Enter the required details and click **Generate API key**.
             1. Copy the API keys and paste them onto the Razorpay Dashboard. Click **Submit**.
                 
         6. Click **Enable manual review**.

         Once you enable manual review, you can review the COD orders and take necessary actions. Refer to the [COD Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/order-settings/review-cod-orders.md#cod-orders) section for more information.
        

## Convert COD Orders to Prepaid

With Magic Checkout, you can urge customers who chose cash on delivery while placing an order to convert COD orders to prepaid by offering discounts or incentives post-order placement. 

Converting orders to prepaid can help you increase order commitment, reduce RTO, streamline operations and enhance customer trust. Know how to [convert COD orders to prepaid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/order-settings/prepay-cod.md).

> **INFO**
>
> 
> **Feature Request**
> 
> This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
> 

## Shipping Options

Following are the configuration options available under shipping: 

    
### Method 1: Razorpay Dashboard *(Recommended)*

         You can use this setting to configure the shipping rates at a product, zone and method level for your customers.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          If you configure the shipping setting on the Razorpay Dashboard, any shipping setting configured on any plugins or your ecommerce platform will not apply.
>          

         To configure the shipping options based on your requirement:
         1. Log in to the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **WooCommerce** from the **Platform** drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-configure-settings-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to **Shipping Setup**. You can either select **Magic Shipping** or **WooCommerce** as the **Shipping Type**.
         4. Click **Add Profile** in the **Custom Shipping Profile** section.
             
         5. Click **+ Add category** in the **Product categories** section.
             
         6. Enter the **Category name** and select the products of your choice. You cannot add the same product in other categories. Click **Confirm**. 
         7. Click **+ Add zones** in the **Shipping zone** section to create zones where shipping is applicable.
         8. Enter the **Zone name** and select the country, state, and city of your choice. 
             
         9. Click **+ Upload ZIP codes** to offer shipping only to specific ZIP codes. You can either upload the ZIP codes in this profile or in the default shipping profile.
         
             
> **INFO**
>
> 
>              **Handy Tips**
>             
>              - Download the sample CSV file.
>              - Enter the ZIP codes as individual rows in column 1. 
>              - Upload the file in .CSV format. Maximum file size supported is 50 MB.
>              - Uploaded ZIP codes are compatible only with Basic COD settings.
>              

         10. Drag the file or click **click to upload**.
            
             
> **WARN**
>
> 
>              **Watch Out!**
>             
>              - You can only upload one file at a time. Uploading another file will overwrite the older file.
>              - You cannot edit an uploaded file; you can only delete it and upload a new file.
>              

         11. Click **+ Add shipping method** and configure the **Shipping method & rate** for all the shipping zones added in the previous step.
             
         12. Enter the **Delivery Name** and **Description** of your choice which will appear to your customers on Magic Checkout.
         13. Enter the **Rate** for the delivery and enable the **COD availability** if you want to show the cash on delivery payment option on checkout at the shipping method level. 
         14. Configure the Shipping slab based on the **Amount** and **Weight** of the product and enter the minimum and maximum values respectively. For example, enter the minimum-maximum value as ₹500-₹900. If the amount of the product falls in that range, a shipping rate is applicable on the product. 
             
         15. Enter the delivery estimated timeline for the customers which appears on checkout.
         16. Click **Confirm**.
             
         17. Once you configure all the shipping zones, click **Go Back**.
         18. Click **+ Set Default profile** in the **Default Shipping Profile (Mandatory)** section. Follow all the steps from 7 to 15 to configure the profile.
            
             
> **WARN**
>
> 
>              **Watch Out!**
>             
>              - It is mandatory to configure the default shipping profile.
>              - By default, the shipping settings configured is applicable for products which **do not** belong to any other shipping profile. 
>              

         19. If you selected **Magic Shipping** as the **Shipping Type** above, enable **Magic Shipping** below on the Dashboard. To confirm the action, click **Yes, enable**.
         
             
> **WARN**
>
> 
>              **Watch Out!**
>             
>              - Once you enable **Magic Shipping**, it surpasses all shipping configurations from any plugins or your ecommerce platform and prioritise our configurations.
>                  
>              - You will get a pop-up if you have not opted for [COD Engine](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce/configuration.md#cash-on-delivery) and [COD order to prepaid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce/configuration.md#convert-cod-orders-to-prepaid). Enter the **Consumer Key** and **Secret**. Follow the steps given below to generate API keys:
>                  1. Log in to the [WordPress account](https://wordpress.com/log-in) and navigate to  **WooCommerce** → **Settings**.
>                  1. Navigate to **Advanced** → **REST API** and click **Add Key**.
>                  1. Enter the required details and click **Generate API key**. Copy the API keys and paste them onto the Razorpay Dashboard. Click **Submit**.
>                      
>              

        

    
### Method 2: WooCommerce Dashboard

         For the shipping cost to reflect on the Checkout, ensure all the shipping zones are added. To add the shipping zones:
         
         1. Log in to your [WordPress account](https://wordpress.com/log-in).
         2. Navigate to **WooCommerce** → **Settings** and click the **Shipping** tab.
             
         3. Add the appropriate **Shipping Zones** and the respective **Shipping Method**.
             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              Add the shipping charges if required; otherwise, the order will process for free shipping.
>              

             
> **WARN**
>
> 
>              **Watch Out!**
> 
>              Magic Checkout does not support multiple shipping methods for a region. For example, if you have enabled free shipping and flat rate shipping methods for a particular region, then Magic Checkout will only consider free shipping as the shipping method.
>              

              
         4. Enable COD for the shipping methods, if required. Navigate to **WooCommerce** → **Settings** and click the **Payments** tab.
             
         5. Scroll down to **Cash on Delivery** and select the **Enable cash on delivery** check box. 
Add the same shipping methods in the **Enable for shipping methods** field to enable COD for shipping methods and click **Save changes**.
              

         
         ### Shipping Charges

         You can configure shipping charges based on the location or cart amount via Woocommerce plugins such as [Table rate shipping](https://woocommerce.com/products/table-rate-shipping/) and [Advanced free shipping](https://wordpress.org/plugins/woocommerce-advanced-free-shipping/).
        

    
### Logistics Partners

         You can integrate Magic Checkout with following logistics partners to easily fetch delivery status details. This is a mandatory step if you have opted for [RTO protection](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce/configuration.md#rto):
         - [Shiprocket](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/shiprocket.md) 
         - [Delhivery](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/delhivery.md)  
         - [iThink Logistics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/ithink-logistics.md) 
         - [Unicommerce](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/unicommerce.md) 
         - [ClickPost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-reduction/logistics-partners/clickpost.md)

         
        

## International Shipping 

You can allow customers to enter an international zipcode for delivery. 

    
### To enable international shipping: 

         1. Log in to
 the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **WooCommerce** from the **Platform** drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-enable-features-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to **Shipping Setup** and enable **International Shipping**.
             
        

## Coupons

You can offer discounts to your customers by adding coupons. 

    
### To add coupons:

         1. Log in to your [WordPress account](https://wordpress.com/log-in).
         2. Navigate to **Marketing** → **Coupons**.
         3. Click **Add Coupons** or select a coupon from the list.
         4. Add a **Description** for the coupon. 
             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              Step 4 is mandatory and the coupon will reflect on Checkout only if a description is added.
>              

             
         5. In the Razorpay Dashboard, navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         6. Select **WooCommerce** from the **Platform** drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-enable-features-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         7. In the **Checkout Setup** tab, the **Coupon Settings** fields are auto-filled. If you want to show all the available coupons directly on Magic Checkout, enable **Auto fetch coupon**.
             
         8. Click **Save settings**.

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          If you want to display specific coupons on checkout instead of all, you can provide a list of coupons you would like us to whitelist. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) and include the coupon names and descriptions.
>          

        

## Separate Billing Address

You can collect the customer's **Billing Address** separately from the **Shipping address**. 

    
### To collect the billing address separately:

         1. Log in to
 the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **WooCommerce** from the **Platform** drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-configure-settings-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to **Checkout Setup**, enable **Capture billing address** and click **Save settings**.
             
        

## Capture and Validate GSTIN

You can capture and validate your customer's GST details from the Dashboard.

    
### To capture and validate GSTIN details:

         1. Log in to
 the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **WooCommerce** from the **Platform** drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-enable-features-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to **Checkout Setup**, enable **Capture GSTIN?** and click **Save settings**.
             
         4. To validate the GSTIN entered by your customers at checkout, contact our [Support team](https://razorpay.com/support/#request) to enable GSTIN validation for your account.
         5. After the customers place an order, you can view the GST details on WooCommerce and the Razorpay Dashboard. 
             - **WooCommerce Dashboard**: On the WooCommerce Dashboard, navigate to **WooCommerce** → **Orders**. Select the required order number and view the details on right-hand side. 
             - **Razorpay Dashboard**: On the Razorpay Dashboard, navigate to **Transactions** → **Orders** and select the required **Order Id** to view the details.
        

    
### Customer Experience

         Once GSTIN validation is enabled for your account, your customers can validate their GST details directly at checkout:

         1. On the order summary screen, the customer clicks **Add** next to **GST Number**.
         2. A **GSTIN Number** pop-up appears.
         3. The customer enters their GSTIN and clicks **Verify**.
             - If the GSTIN is invalid, an error message is displayed asking the customer to enter a valid GSTIN number.
             - If the GSTIN is valid, the GST-registered address is automatically set as the billing address.
         
        

## Capture Order Instructions 

You can enable your customers to enter order instructions if any at the checkout. For example, customer may want a particular order to be expedited. To capture order instructions:

    
### To capture order instructions:

         1. Log in to
 the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **WooCommerce** from the **Platform** drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-enable-features-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to **Checkout Setup**, enable **Capture order instructions?** and click **Save settings**.
             
         4. After the customers place an order, you can view the GST details on WooCommerce and the Razorpay Dashboard. 
             - **WooCommerce Dashboard**: On the WooCommerce Dashboard, navigate to **WooCommerce** → **Orders**. Select the required order number and view the details on right-hand side. 
             - **Razorpay Dashboard**: On the Razorpay Dashboard, navigate to **Transactions** → **Orders** and select the required **Order Id** to view the details.
        

## Gift Card Settings

You can enable various gift card options for your customers from the Dashboard.

> **INFO**
>
> 
> **Feature Request**
> 
> This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is not available for Shopify Basic and Advanced users.
> 

    
### To enable gift card settings:

         1. Log in to
 the Razorpay Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **WooCommerce** from the **Platform** drop-down list. Paste the [WordPress Address or Site Address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/woocommerce.md#step-1-enable-features-on-razorpay-dashboard) in the **Domain hyperlink** field and click **Next**.
         3. Navigate to **Checkout Setup** and enable **Pay with gift card**.
         4. Once you enable the gift card settings, you can also enable the following options **if required**:
             - **Pay with multiple gift cards**: Allow your customers to pay with multiple gift cards at once.
             - **Restrict paying with coupon and gift card together**: Restrict your customers from using both coupon and gift card together while making a payment.
             - **Restrict buying gift cards with existing gift cards**: Restrict your customers from purchasing gift cards using existing gift cards.
             - **Restrict customers from clubbing gift cards with COD**: Restrict the usage of gift cards if your customers avail of the cash on delivery option.
             
         5. Click **Save Settings**.
        

## Google and Facebook Analytics

Activate Google and Facebook Analytics based on your requirement to track orders.

    
### To activate Google and Facebook analytics:

         1. Log in to the [WordPress account](https://wordpress.com/log-in) and navigate to **Woocommerce** → **Settings**.
         2. Click **Payments**.
         3. In the Payments tab, scroll down to **Razorpay** and click **Manage** to edit the settings.
         4. Scroll towards the end and activate Google and Facebook analytics based on your requirement.
             
         5. Click **Save changes**.
        

### Related Information

[Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/troubleshooting-faqs.md#woocommerce)
