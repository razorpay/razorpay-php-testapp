---
title: Integrate Razorpay Magic Checkout With Shopify Store
heading: Integrate Magic Checkout With Shopify Store
description: Configure COD and shipping charges, COD intelligence, coupons, international shipping and more on your Razorpay Magic Checkout and Shopify Dashboard.
---

# Integrate Magic Checkout With Shopify Store

After you successfully integrate your Shopify website with Magic Checkout, the following configurations are available on your Razorpay and Shopify Dashboard:

- [Cash on Delivery](#cash-on-delivery) 
- [Partial Cash on Delivery](#partial-cash-on-delivery) 
- [RTO](#rto)
- [Convert COD Orders to Prepaid](#convert-cod-orders-to-prepaid)
- [Shipping Options](#shipping-options) 
- [International Shipping](#international-shipping)
- [Coupons](#coupons)
- [Login with Razorpay](#login-with-razorpay)
- [Offers](#offers) 
- [Separate Billing Address](#separate-billing-address)
- [Capture and Validate GSTIN](#capture-and-validate-gstin)
- [Capture Order Instructions](#capture-order-instructions)
- [Google Analytics](#google-analytics)
- [Google Ads](#google-ads)
- [Facebook Ads](#facebook-ads)
- [Gift Card Settings](#gift-card-settings)

## Cash on Delivery

You can choose to configure COD using the following methods: 

    
### Method 1: Razorpay Dashboard *(Recommended)*

         You can use this setting to enable COD on your store and configure the rules for selectively showing COD to customers based on specific locations, products, order amounts and more.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          If you configure the COD setting on the Razorpay Dashboard, any COD setting configured on the Shopify store or Advanced Cash on Delivery app will not apply.
>          

         Follow the steps given below: 

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **COD Setup** → **COD Settings**.
         4. Enable **COD as a payment option**.
             ![COD settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-cod-settings.jpg.md)
         5. Select the **Type of setting**.

         ### Type of Setting

         
             
                 Basic
                 
                  Configure COD based on the cart value and zones applicable to **all** the products. Follow the steps given below:

                  1. Configure the **Cart order value** by selecting an option based on your requirement:
                      
                          
                              Charge a COD fee to customers who opt for the COD payment method. You can configure the order range and set a corresponding **Fee** accordingly.
                                 1. Click **+ Add slabs**.
                                 2. Enter the minimum and maximum order value for which the fee should apply.
                                 3. Enter the **Delivery price**. For example, if the **Min Order Value** is ₹400, the **Max Order Value** is ₹1000 and the fee is ₹50, a ₹50 COD fee is applied to any order value in this range.
                                 4. Click **Save slabs**. 
                                     ![Create COD eligibility slabs with COD charges](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-cod-slabs.jpg.md) 
                                 5. Click **+ Add rate slabs** if you want to create more slabs.   
                          
                          
                              No COD charge will apply within the configured order range. The customer cannot view the COD payment method if an order value does not fall within the configured range.
                                 1. Click **+ Add slabs**.
                                 2. Enter the minimum and maximum order value for which no COD charge should apply. For example, if the **Min Order Value** is ₹800 and the **Max Order Value** is ₹1200, the COD charge will not apply if the order value falls in this range.
                                 3. Click **Save slab**.
                                     ![Create COD eligibility slabs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-free-cod.jpg.md)
                                 4. Click **+ Add rate slabs** to create more slabs.
                          
                      

                      
> **WARN**
>
> 
>                       **Watch Out!**
>                     
>                       In the **Basic** type of setting, you cannot create overlapping slabs. For example, if you have already set a slab with a minimum order value of ₹200 and a maximum order value of ₹600, you cannot add another slab within that range, such as a minimum order value of ₹300 and a maximum order value of ₹500.
>                       

                  2. In the **COD zones** section, click **+ Add zones** to create shipping zones where COD is applicable.
                  3. Enter the **Zone name**.
                  4. Select the country, state and city where the COD charges configured in the previous step should be applicable. Click **Confirm**.
                      ![Create COD zones](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-cod-zone.jpg.md)
                  5. Click **Save & apply**.
                  6. Navigate to **Manual Zipcode upload** and click **Upload ZIP codes** to offer COD only to specific ZIP codes.
                     ![Upload ZIP codes to offer COD only to specific ZIP codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-cod-shipping-pincode.jpg.md)
                     
                     
> **INFO**
>
> 
>                      **Handy Tips**
>                      
>                      - Download the sample CSV file.
>                      - Enter the ZIP codes as individual rows in column 1. 
>                      - Upload the file in .CSV format. Maximum file size supported is 50 MB.
>                      - Uploaded ZIP codes are compatible only with Basic COD settings.
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
                  3. Enter the **Delivery price**. For example, if the **Min Order Value** is ₹400, the **Max Order Value** is ₹1000 and the fee is ₹50, a ₹50 COD fee will apply to any order value in this range.

                      
> **INFO**
>
> 
>                       **Handy Tips**
>                     
>                       If you do not want to charge a COD fee, you can create slabs and enter ₹0 as the delivery price. 
>                       

                    
                  4. Click **Save slab**. 
                      ![Create advanced COD eligibility slabs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-advanced-cod-slabs.jpg.md)
                  5. Click **+ Create more slabs** if you want to create more slabs. 
                  6. In the **COD zones** section, click **+ Add zones** to create shipping zones where COD is applicable.
                  7. Enter the **Zone name**.
                  8. Select the country, state and city where you want to apply COD charges configured in the previous step. Click **Confirm**.
                  9. You can configure COD based on either the zone or product categories.
                      - **Zone Configuration**: Manage applicable COD slabs and rates for different zones.
                          1. Click **+ Set zone configuration**.
                              ![Set zone configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopif-zone-config.jpg.md)
                          2. Select the slabs based on your requirement and click **Save configuration**. It is mandatory to configure all the zones you create. The COD charge applies to each zone based on the slabs you select.
                              ![Select zone-wise COD slabs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-zone-cod-slabs.jpg.md)
                          3. Click **Save & apply**.
                      - **Product categories**:  Create **Product categories** to establish custom rates or zone restrictions for different categories.
                          1. Enable the **Product categories** setting. Once you enable this setting, the **Zone configuration** field will not appear.
                          2. Click **+ Add categories**. 
                              ![Add product categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-product-cat.jpg.md)
                          3. Enter the **Category name**. 
                          4. Select the products of your choice that you want to add to the category and click **Confirm**. You cannot add the same product in different categories.
                          5. Click **+ Create more categories** if you want to add more product categories.
                          6. Click **+ Set category configuration** to configure the zones and slabs for each category.
                              ![Set category configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-product-cat-config.jpg.md)
                          7. Select the serviceable zone for the selected category and choose the slabs based on your requirements. For example, if you want to set configurations for the product category, Topwear, select the order range for this category on which COD should apply for each zone.
                          8. Click **Save configuration**. It is mandatory to configure slabs for all the zones you create.
                              ![Config zone and slabs for each category](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-category-config.jpg.md)
                          9. Click **Save & apply**.
                 

         
         ### Feature 

         
             
### Block List

                  You can create a blocklist for high-risk customers who often return products on delivery, resulting in damaged products during transit, high returns, refund issues and more.

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

                  1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
                  2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
                  3. Navigate to **COD Setup** → **Block List**.
                  4. Click **+ Add New Blocklist**. 
                     ![Add blocklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-blocklist.jpg.md)
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
                      ![Confirm](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-blocklist-confirm.jpg.md)
                  7. A pop-up page appears with the list of items added. Review the list and click **Add To Blocklist**.

                  The orders that fall under this list will not be eligible for COD.
                 

         
        
    
    
### Method 2: Shopify Store

         This feature is an alternative to the Advanced Cash on Delivery App. It helps eliminate the dependency on the app to acquire details like COD rates and applicability. We recommend using this feature to configure COD on Shopify based on your requirement.

         1. Log in to the [Shopify Store](https://accounts.shopify.com/store-login) and navigate to **Products**.
         2. Select the required products to add a COD tag.
             ![Select the products to add a COD tag](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cod-configs.jpg.md)

             
> **INFO**
>
> 
>              **Handy Tips**
>             
>              Considering this is a bulk operation, select products with similar COD rates rather than having to do this individually. For example, if you select 5 products, you can add a single tag that states the COD charge and applies to all 5 products. 
>              

         3. Click the options icon below and click **Add tags**.
             ![Add the required COD tags](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cod-add-tags.jpg.md)
         4. Enter the COD rate and click **Add CODXXXX**.

             
> **INFO**
>
> 
>              **Handy Tips**
>             
>              - The format of the tag is `CODXXXX` (in capital), where XXXX denotes the COD charges of the product. For example, `COD500`.
>              - If you want to offer COD with no COD charge, use `COD0000`.
>              

            
             
> **WARN**
>
> 
>              **Watch Out!**
>             
>              Currently, we do not support pincode-based blocking of COD and slab-based rates using this method.
>              

         5. Click **Save**.  
             ![Enter the COD charge and save the changes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cod-tag-save.jpg.md)
         6. Select a product you added a tag to and view the COD tag under the **Product organization** field to verify the changes.
         
             
                 Customer Experience
                 
                  Your customers can view the COD charge applied to the product at checkout.
                  ![Customers view the tag at the checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cod-tag-customer.jpg.md)
                 

         
        
    

## Partial Cash on Delivery

Enable customers to pay a partial order amount online and use cash on delivery for the remaining balance to reduce order cancellation risk.

> **WARN**
>
> 
> **Watch Out!**
> 
> This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
> 

    
### To enable partial COD:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **COD Setup** → **Partial COD**.
         4. Turn on **Enable Partial COD** and click **Enable** to confirm.
             ![Enable partial COD](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-config-partial-cod-enable.jpg.md)
         5. Select the appropriate check boxes to enable **Partial COD** for specific categories:
             - **All Buyers**: Enables Partial COD for all buyers, regardless of risk level.
             - **Low Risk Buyers**: Limits Partial COD to low-risk buyers, helping maintain low RTO rates by focusing on safer transactions.
             - **Medium Risk Buyers**: Allows Partial COD for medium-risk buyers, providing flexibility while managing moderate RTO potential.
             - **High Risk Buyers**: Enables Partial COD for high-risk buyers, which may increase RTO rates but offers selective COD availability for specific cases.
             ![enable partial COD for specific categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-config-partial-cod-risk.jpg.md)
         6. You can select a default partial amount or set a custom amount for partial COD.
             
                 
                     Choose a default amount that will be charged as a partial payment when customers opt for COD.
                     ![choose a default amount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-config-partial-cod-default-amt.jpg.md)
                 
                 
                     To set a custom amount: 
                         1. Click **Custom Value**.
                         2. Select the value type and enter the value:
                             - **Custom Percentage**: Define a percentage of the order value the customer must pay upfront as a partial COD amount. For example, if the order value is ₹600 and the percentage is set to 20%, customers will pay ₹120 (20% of ₹600) upfront and the remaining ₹480 via COD.
                             - **Custom Amount**: Enter a fixed amount that the customer must pay upfront. For example, if the order value is ₹600 and the fixed partial COD amount is ₹150, customers will pay ₹150 online and the remaining amount via COD.   
                         3. Click **Save**.
                         ![Enter a custom value](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-config-partial-cod-custom-amt.jpg.md)
                 
             
             
             
> **WARN**
>
> 
>              **Watch Out!**
>              
>              The partial amount cannot exceed 50% of the total order value. If it is higher than 50% of the order value, it will be set to 50%. 
>              
>              For example, if the order value is ₹300 and the partial amount is set at ₹200, 50% of the order value (₹300) is ₹150. Since ₹200 exceeds 50% of ₹300, it will be capped at ₹150. Therefore, the customer will pay ₹150 (50% of ₹300) upfront instead of ₹200 and the remaining via COD.
>              

         6. Click **Save**.
          
         
> **INFO**
>
> 
>          **Handy Tips**
>     
>          Use [Advanced Partial COD Slabs](#set-advanced-partial-cod-slabs) to create price slabs for partial COD within specific order ranges, adjusting amounts based on customer risk categories.
>          

         
             
                 Set Advanced Partial COD Slabs
                 
                  Set price slabs for partial COD within specific order ranges, allowing different amounts based on customer risk categories.
                  1. In the **Partial COD** section, click **Set advanced slabs**.
                      ![set advanced slabs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-config-partial-cod-set-advanced.jpg.md)
                  2. Click **+ New Slab**.
                  3. Enter the **Min** and **Max** cart values for which the partial COD amount should apply.
                  4. Choose a **Customer Risk** category from the drop-down list:
                      - **All Buyers**: Enables Partial COD for all buyers, regardless of risk level.
                      - **Low Risk Buyers**: Limits Partial COD to low-risk buyers, helping maintain low RTO rates by focusing on safer transactions.
                      - **Medium Risk Buyers**: Allows Partial COD for medium-risk buyers, providing flexibility while managing moderate RTO potential.
                      - **High Risk Buyers**: Enables Partial COD for high-risk buyers, which may increase RTO rates but offers selective COD availability for specific cases.
                  5. In the **Amount to pay** section, select the value type and enter the value:
                      - **Percentage**: Define a percentage of the order value the customer must pay upfront as a partial COD amount. For example, if you set the range as ₹300 to ₹600 and the percentage to 20%, customers will pay ₹120 (20% of ₹600) upfront and the remaining ₹480 via COD for any order within this range.
                      - **Amount**: Enter a fixed amount that the customer must pay upfront. For example, if you set the range as ₹300 to ₹600 and the fixed partial COD amount is ₹150, customers will pay ₹150 online and the remaining amount via COD for any order within this range.
                      
                      
> **WARN**
>
> 
>                       **Watch Out!**
>                       
>                       - Ensure the partial amount set is within the specified order range and does not exceed the maximum order value. For example, if the range is ₹300 to ₹600, the partial amount should not exceed ₹600.
> 
>                       - Avoid overlapping order ranges for each customer risk category. For instance, if you set a range of ₹300 to ₹600 for **Low Risk Buyers**, do not set another overlapping range, such as ₹500 to ₹700, for the same risk category. Each range should be distinct to prevent conflicts.
>                       

                      
                  6. Click **Confirm** to save the settings.
                  ![Partial COD advanced slab settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-config-partial-cod-advanced.jpg.md)
                 

         
        
    

## RTO

You can either opt for the automated option by enabling COD intelligence or manually review COD orders. 

    
### COD Intelligence

         Enable **COD Intelligence** to detect incorrect/non-serviceable addresses. This allows Magic Checkout to decide whether to show a particular customer the cash-on-delivery option based on their buying history, thus increasing the delivery percentage and reducing RTO rates. To enable COD intelligence: 

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **RTO Reduction Setup** → **RTO Reduction**.  
         4. Toggle on **COD Intelligence** and click **Enable COD Intelligence** in the confirmation pop-up modal. 

         ![Enable COD intelligence](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-cod-enable.jpg.md) 
         
         You can disable **COD Intelligence** if required. This will enable the COD option for all the customers, including those considered risky by Magic Checkout. Once you enable COD intelligence, the **RTO Analytics** tab will appear. Know more about [RTO Analytics](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/analytics/rto.md).

             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              - Magic Checkout automatically disables the cash on delivery option in case of high-risk customers who often return products on delivery resulting in damaged products during transit, high returns, refund issues and so on. 
>              - You must enable COD Intelligence if you opt for RTO protection.
>              

        

    
### Manually Review COD Orders

         You can manually review COD orders to filter out potential RTO orders and decide whether to provide customers with the COD option based on the insights we provide regarding COD orders. To enable manual review:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **RTO Reduction Setup** → **RTO Reduction**.  
         4. Toggle on **Manually review COD orders**.
             ![Manual Review](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-manual-review-shopify.jpg.md)

         Once you enable manual review, you can review the COD orders and take necessary actions. Refer to the [COD Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/order-settings/review-cod-orders.md#cod-orders) section for the next steps.
        

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

You can choose to configure the shipping options using the following methods: 

    
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
         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **Shipping Setup**.
         4. Click **Add Profile** in the **Custom Shipping Profile** section.
             ![Navigate to Shipping settings on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-shipping-settings.jpg.md)
         5. Click **+ Add category** in the **Product categories** section.
             ![Add product categories to configure shipping](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-wooc-shipping-category.jpg.md)
         6. Enter the **Category name** and select the products of your choice. You cannot add the same product in other categories. Click **Confirm**. 
         7. Click **+ Add zones** in the **Shipping zone** section to create zones where shipping is applicable.
         8. Enter the **Zone name** and select the country, state and city of your choice. 
             ![Add shipping zones to determine the shipping charges for each zone](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-add-shipping-zone.jpg.md)
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
             ![Configure the shipping rates for each zone](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-shipping-method.jpg.md)
         12. Enter the **Delivery Name** and **Description** of your choice which will appear to your customers on Magic Checkout.
         13. Enter the **Rate** for the delivery and enable the **COD availability** if you want to show the cash on delivery payment option on checkout at the shipping method level. 
         14. Configure the Shipping slab based on the **Amount** and **Weight** of the product and enter the minimum and maximum values respectively. For example, enter the minimum-maximum value as ₹500-₹900. If the amount of the product falls in that range, a shipping rate is applicable on the product. 
             ![Configure the shipping method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-configure-shipping-method.jpg.md)
         15. Enable **Display Delivery in** option to display the estimated timeline for the customers on checkout.
         16. Enter the estimated delivery timeline and click **Confirm**.
             ![Configure the shipping method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-configure-shipping-delivery.jpg.md)
         17. Once you configure all the shipping zones, click **Go Back**.
         18. Click **+ Set Default Profile** in the **Default Shipping profile** section.  Follow all the steps from 7 to 15 to configure the profile.
            
             
> **WARN**
>
> 
>              **Watch Out!**
>             
>              - It is mandatory to configure the default shipping profile.
>              - By default, the shipping settings configured is applicable for products which **do not** belong to any other shipping profile. 
>              

         19. Enable **Magic Shipping**. To confirm the action, click **Yes, enable**.
            
             
> **WARN**
>
> 
>              **Watch Out!**
>             
>              Once you enable **Magic Shipping**, it surpasses all shipping configurations from any plugins or your E-commerce platform and prioritises our configurations.
>              

             ![Enable Shipping settings on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-magic-enable-shipping-settings.jpg.md)
        

    
### Method 2: Shopify Store

         Follow the steps given below: 

         1. Log in to the [Shopify Store](https://accounts.shopify.com/store-login) and navigate to **Settings** → **Shipping and delivery**. 
             ![Shopify shipping](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-shipping.jpg.md)
         2. Create a profile under general or custom shipping rates and add the required details.
             - **General Shipping Rates**: Create a profile for all products. With this, you charge a standard shipping rate on certain products.
             - **Custom Shipping Rates**: Create an individual shipping rate for a certain product.

             
> **WARN**
>
> 
>              **Watch Out!**
> 
>              You cannot list the same products under general and custom shipping rates. You can list a product under only one shipping rate.
>              

            
             ![Profile for general or custom shipping rates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-profile.jpg.md)
         3. After creating a profile, click **Manage** to navigate to the shipping settings under that profile.
             ![Edit shipping settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-manage.jpg.md)
         4. Click **Create shipping zone** and add zones of your choice. Click **Done**.
             ![Shipping zones](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-shipping-zone.jpg.md)
         5. Click **Add rate** to add the shipping rates. You can create multiple shipping rates/options you want to show to your customers on Magic Checkout.
             ![Add shipping rates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-add-rate.jpg.md)
         6. Select **Set up your own rates**. Follow the steps given below:
             1. Enter your **Rate name**, for example, Standard Shipping Charges. Customers will view this at Checkout.
             1. Enter the **Price**.
             1. Add conditions if required. You can add conditions based on **item weight** or **order price**. Enter the required details.
             1. Click **Done**.
                 ![Set up your own rates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-own-rate.jpg.md)

             
> **INFO**
>
> 
>              **Handy Tips**
>             
>              You can create multiple shipping options by charging extra for cash on delivery. Know how to [create multiple shipping rates](#cash-on-delivery-shipping-rates).
>              

        

## International Shipping 

You can allow customers to enter an international PIN code for delivery. 

    
### To enable international shipping:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **Shipping Setup** and enable **International Shipping**.
             ![International shipping](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-international.jpg.md)
        

## Coupons

You can choose to offer discounts to your customers by adding coupons using the following methods: 

    
### Method 1: Razorpay Dashboard

                
         
> **WARN**
>
> 
>          **Watch Out!**
>          
>          - Coupons created on both the Razorpay Dashboard and Shopify can be auto-applied. 
>             - Coupons created on Shopify using its Discount Creation Dashboard flow can be auto-applied. 
>          - Coupons created on the Razorpay Dashboard cannot be synced on Shopify.
>          

         
         To create coupons: 

         1. Once the feature is enabled, log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. In the **Checkout Setup** tab, enable **Auto fetch coupon** and click **Save settings**. This step is mandatory and allows you to display coupons to your customers at checkout. Even if you enable **Display this coupon at checkout** in the next steps, you must still enable Auto fetch coupon.
            ![enable auto fetch coupon to display coupons to customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-auto-fetch.jpg.md)
         3. Navigate to **Coupons** → **Setup**. 
         4. Enable the following, as required:
             1. **Enable Coupons**: Allows customers to make the coupons accessible on checkout for your customers. Once you enable this all the coupons created on Shopify will stop working immediately if not synced.
             2. **Auto-apply best coupon**: Automatically applies the coupon with the best value from those available.
             3. **Let users combine coupons**: Lets customers apply multiple coupons at checkout. You can configure specific rules for each coupon.
             ![Enable toggles to configure coupons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-toggle.jpg.md)
            
> **WARN**
>
> 
>             **Watch Out!**
>             
>             When you create coupons on the Razorpay Dashboard, all the coupons created on Shopify will not apply unless they are synced. To sync all coupons, navigate to **Setup** on the Razorpay Dashboard and click **Sync now** next to the **Coupons from Shopify** section. Set the sync duration and click **Start sync**.
> 
>             - By default, all the coupons synced from Shopify are in the `created` state. You must manually configure and publish the coupons. To configure a coupon, identify the one you want to publish, click the options icon and click **View and Edit** *(if required)* or click **Publish**.
>                  
>                      
>                          Watch the GIF below:
>                          
>                           ![publish the coupons synced from Shopify](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-publish-sync-shopify.gif.md)
>                          
>                      
>                  
>             - All newly created coupons will be automatically synced after the initial sync. You must manually configure and publish the coupons.
>             - Only the following coupons will be synced from Shopify: (currently, multiple collections are not synced)
>                 - Amount discounted on orders
>                 - Amount discounted on products 
>                 - Buy X Get Y (if minimum quantity configured)
>             

         5. Navigate to **All Coupons**, click **+ Create Coupon** and **Select a Coupon Type** based on your requirement.  Alternatively, you can click **+ Create Coupon** next to **Coupons on Magic** in the **Setup** section and **Select a Coupon Type**.
              ![Create a coupon](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-create.jpg.md)
             
             
> **INFO**
>
> 
>              **Handy Tips**
>              
>              The steps from 6 to 10 given below are common for all types of coupons.
>              

             
         6. Enter the **Coupon Code**. Your customers can view the coupon code at checkout.
         7. Enter the **Coupon description**. Your customers can view the coupon description at checkout.
         8. Select the **Display this coupon at checkout** check box to display the coupon at checkout for your customers. 
             1. After selecting the above check box, the **Enable coupon as an unavailable coupon** check box appears.
             2. Select this check box if you want to display the coupon as unavailable (in a disabled state) when users do not meet the cart or eligibility conditions. Once the conditions are met, the coupon is automatically enabled.
         9. Select the **Enable this coupon code only for Prepaid Payment methods** check box to disable the COD payment option for customers and nudge them to pay via prepaid methods. *(optional)*
         10. Select the **Automatically apply this coupon for eligible users** check box to automatically apply the coupon with the best value from those available.
             ![Enter the coupon code and description](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-code.jpg.md)
                    
             
> **INFO**
>
> 
>              **Handy Tips**
>             
>              To completely hide the COD payment option in a disabled state throughout the modal, navigate to **Setup & Settings** → **Platform Settings**. Enable the **Hide COD payment method when disabled** option and click **Save settings**.
>                  ![To hide COD payment method when disabled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-coupons-hide-cod.jpg.md)
>              

         #### Coupon Type

         Select a coupon type from the following:

         
             
                 Amount discounted on orders
                 
                  To discount the total order amount:

                  
> **INFO**
>
> 
>                   **Handy Tips**
>                   
>                   Before you begin, follow steps 6 to 10 given above, which are common for all coupon types.
>                   

                 
                  1. **Discount Details**: Select the **Discount type**.
                      
                          
                              In this type, a fixed amount is deducted from the original amount. 

                              **Discount amount**: Enter an amount by which the original price should be reduced. For example, if ₹150 is the flat discount applied, ₹150 is deducted from the original price.
                              ![Configure the fixed discount details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-discount.jpg.md)
                          
                          
                              This type deducts a set percentage of the amount from the original amount. 
                                  - **Discount percentage**: The percentage by which the original price should be reduced. For example, if 10% discount is applied, on an order amount of ₹900, ₹90 will be deducted.
                                  - **Upto (Max Discount)**: The maximum amount that can be deducted from the bill amount. For example, if the max discount is ₹300 and the order amount is ₹800, you can ensure that the customer cannot avail of a discount higher than ₹300.
                              ![Configure the percentage discount details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-discount-percentage.jpg.md)
                          
                      
                  2. Select the **Purchase requirements** based on your preference to set eligibility criteria for the customers to use the coupon.
                      
                          
                              By default, the coupon is visible to all the customers irrespective of the quantity or amount.
                              ![Configure purchase requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-pur-req.jpg.md)
                          
                          
                              You can set a minimum quantity for customers to access the coupon. For example, if you set the minimum quantity as 2, the customers can use the coupon only if there are 2 or more items in their cart.
                              ![Configure minimum quantity requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-qt.jpg.md)
                          
                          
                              You can set a minimum amount for customers to use the coupon. For example, if you set the minimum amount requirements as ₹300, the customers can use the coupon only if the cart value is ₹300 or above.
                              ![Configure minimum amount requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-amt.jpg.md)
                          
                      
                  3. **Coupon validity**: Set the duration for the coupon.
                      1. **Active dates**: Set the **Start date** and **Start time**. 
                      1. Select the **Set an end date** check box and set the **End date** and **End time**. *(optional)*
                      1. **Total maximum budget** *(Optional)*: Set an amount to expire the coupon when the total discount to be offered to all your customers is reached. For example, if you set ₹10,000 as the total maximum budget, once the budget limit is reached, the coupon code gets expired and is not visible at checkout.
                         
                         
> **WARN**
>
> 
>                          **Watch Out!**
>                          
>                          The coupon will never expire if you do not set an end date or a total maximum budget.
>                          

                         
                      ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity.jpg.md)
                  4. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
                      1. Click **+ Add Customers**.
                         ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
                      1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
                        
                          
> **WARN**
>
> 
>                           **Watch Out!**
>                         
>                           If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                           

                      1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.
                          
                          
> **INFO**
>
> 
>                           **To Upload File:**
> 
>                           - Enter the values in a valid format as given below:
>                             - Mobile number: +919000090000
>                             - Email id: gauravkumar@example.com
>                           - CSV file should not have any header/column title.
>                           - Maximum acceptable rows in the file is 1 million.
>                           - Upload the file in .CSV format. Maximum file size supported is 50 MB.
>                           

                          
                      1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
                  5. **Usage restriction**: Set the maximum limit to which a coupon is redeemed in total and per customer.
                      1. Select the **Number of times discount can be used in total** check box and set the number. For example, 100.
                      1. Select the **Number of times the coupon can be used per customer** check box and set the number. For example, 2. 
                      1. Select **By mobile no.** or **By email id** via which the customer can use the coupon.
                      ![configure coupon restriction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-restriction.jpg.md)
                  6. **Coupon combinations** *(optional)*: You can combine this coupon with various other coupons as follows:  
                     - **Amount off product coupons**: Combine this coupon with a coupon created in the **Amount discounted on products** category to offer a discount on the total order amount and specific products or collections of products.
                     - **Other Amount off order coupons**: Combine this coupon with other coupons created in the same category to offer multiple discounts on the total order amount.
                     - **Free shipping coupons**: Combine this coupon with **Free shipping coupons** to provide free shipping along with the discount. If you select **Free shipping coupons** in this category then you must select the **Amount off order coupons** check box in the **Free Shipping** category to combine the coupon.
                     ![Combine coupons created with other categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-order-combine.jpg.md)
                     
                     
                     
> **WARN**
>
> 
>                      **Watch Out!**
>                      - This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
>                      - You can combine two coupons only if you select the same check box in both coupons. For example:
>                          
>                              
>                                  If you want to combine two coupons created in the **Amount discounted on orders** category, you must select the **Other Amount off order coupons** check box in both coupons. 
>                              
>                              
>                                  If you want to combine a coupon from the **Amount discounted on orders** category with a coupon from the **Amount discounted on products** category, you need to select the appropriate check boxes:
>                                      - Select the **Amount off product coupons** check box in the **Amount discounted on orders** category coupon.
>                                      - Select the **Amount off order coupons** check box in the **Amount discounted on products** category coupon.
>                              
>                          
>                      - You cannot combine specific coupons selectively within a category or across categories. For example: 
>                          
>                              
>                                  If you have coupons C1, C2 and C3 created in the **Amount discounted on orders** category and you select the **Other Amount off order coupons** check box for all three, all three coupons will be combined. You cannot choose to combine only C1 and C2 without including C3.
>                              
>                              
>                                  If you have coupons B1 and B2 created in the **Amount discounted on products** category and C1 and C2 created in the **Amount discounted on orders** category and you select:
>                                      - **Other Amount off product coupons** and **Amount discounted on orders** check boxes for B1 and B2.
>                                      - **Other Amount off order coupons** and **Amount off product coupons** check boxes for C1 and C2.
>                                  
>                                  Then B1, B2, C1 and C2 will all be combined. You cannot selectively combine only B1 and C1 if the respective check boxes are selected for all the coupons created.
>                              
>                          
> 
>                      - In summary, selecting the check box allows all coupons within the same or different category to be combined, rather than combining specific coupons selectively.
>                      

                  7. Click **Create and Publish**.
                 
 
             
### Amount discounted on products

                  To discount **specific** products or collection of products:

                  
> **INFO**
>
> 
>                   **Handy Tips**
>                   
>                   Before you begin, follow steps 6 to 10 given above, which are common for all coupon types.
>                   

                  1. **Discount Details**: Select the **Discount type**.
                      
                          
                              In this type, a fixed amount is deducted from the original amount.

                              **Discount amount**: Enter an amount by which the original price should be reduced. For example, if ₹150 is the flat discount applied, ₹150 is deducted from the original price.
                              ![Configure the fixed discount details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-discount.jpg.md)
                          
                          
                              This type deducts a set percentage of the amount from the original amount. 
                                  - **Discount percentage**: The percentage by which the original price should be reduced. For example, if 10% discount is applied, on an order amount of ₹900, ₹90 will be deducted.
                                  - **Upto (Max Discount)**: The maximum amount that can be deducted from the bill amount. For example, if the max discount is ₹300 and the order amount is ₹800, you can ensure that the customer cannot avail of a discount higher than ₹300.
                              ![Configure the percentage discount details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-discount-percentage.jpg.md)
                          
                      
                  2. Select **Products** or **Collections** to limit the discount to specific products or collections. Click **+ Add Products** or **+ Add Collections** respectively. Select the products or collections based on your requirement and click **Confirm**. You can add multiple products or collections.

                      ![configure the discount details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-discount-det.jpg.md)
                      
                  3. Select the **Purchase requirements** based on your preference to set eligibility criteria for the customers to use the coupon.
                      
                          
                              By default, the coupon is visible to all the customers irrespective of the quantity or amount.
                              ![Configure purchase requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-pur-req.jpg.md)
                          
                          
                              You can set a minimum quantity for customers to access the coupon. For example, if you set the minimum quantity as 2, the customers can use the coupon only if there are 2 or more items in their cart.
                              ![Configure minimum quantity requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-qt.jpg.md)
                          
                          
                              You can set a minimum amount for customers to use the coupon. For example, if you set the minimum amount requirements as ₹300, the customers can use the coupon only if the cart value is ₹300 or above.
                              ![Configure minimum amount requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-amt.jpg.md)
                          
                      
                  4. **Coupon validity**: Set the duration for the coupon.
                      1. **Active dates**: Set the **Start date** and **Start time**. 
                      1. Select the **Set an end date** check box and set the **End date** and **End time**. *(optional)*
                      1. **Total maximum budget** *(Optional)*: Set an amount to expire the coupon when the total discount to be offered to all your customers is reached. For example, if you set ₹10,000 as the total maximum budget, once the budget limit is reached, the coupon code gets expired and is not visible at checkout.

                         
> **WARN**
>
> 
>                          **Watch Out!**
>                          
>                          The coupon will never expire if you do not set an end date or a total maximum budget.
>                          

                      ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity.jpg.md)
                  5. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
                      1. Click **+ Add Customers**.
                         ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
                      1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
                        
                          
> **WARN**
>
> 
>                           **Watch Out!**
>                         
>                           If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                           

                      1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.

                          
> **INFO**
>
> 
>                           **To Upload File:**
> 
>                           - Enter the values in a valid format as given below:
>                             - Mobile number: +919000090000
>                             - Email id: gauravkumar@example.com
>                           - CSV file should not have any header/column title.
>                           - Maximum acceptable rows in the file is 1 million.
>                           - Upload the file in .CSV format. Maximum file size supported is 50 MB.
>                           

                      1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
                  6. **Usage restriction**: Set the maximum limit to which a coupon is redeemed in total and per customer.
                      1. Select the **Number of times discount can be used in total** check box and set the number. For example, 100.
                      1. Select the **Number of times the coupon can be used per customer** check box and set the number. For example, 2. 
                      1. Select **By mobile no.** or **By email id** via which the customer can use the coupon.
                      ![configure coupon restriction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-restriction.jpg.md)
                  7. **Coupon combinations** *(optional)*: You can combine this coupon with various other coupons as follows:  
                     - **Amount off order coupons**: Combine this coupon with a coupon created in the **Amount discounted on order** category to offer a discount on the total order amount and specific products or collections of products.
                     - **Other Amount off product coupons**: Combine this coupon with other coupons created in the same category to offer multiple discounts on specific products or collections of products.
                     - **Free shipping coupons**: Combine this coupon with **Free shipping coupons** to provide free shipping along with the discount. If you select **Free shipping coupons** in this category then you must select the **Amount off product coupons** check box in the **Free Shipping** category to combine the coupon.
                     ![Combine coupons created with other categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-prod-combine.jpg.md)
                     
                     
> **WARN**
>
> 
>                      **Watch Out!**
>                      - This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
>                      - You can combine two coupons only if you select the same check box in both coupons. For example:
>                          
>                              
>                                  If you want to combine two coupons created in the **Amount discounted on products** category, you must select the **Other Amount off product coupons** check box in both coupons. 
>                              
>                              
>                                  If you want to combine a coupon from the **Amount discounted on orders** category with a coupon from the **Amount discounted on products** category, you need to select the appropriate check boxes:
>                                      - Select the **Amount off product coupons** check box in the **Amount discounted on orders** category coupon.
>                                      - Select the **Amount off order coupons** check box in the **Amount discounted on products** category coupon.
>                              
>                          
>                      - You cannot combine specific coupons selectively within a category or across categories. For example: 
>                          
>                              
>                                  If you have coupons B1, B2 and B3 created in the **Amount discounted on products** category and you select the **Other Amount off product coupons** check box for all three, all three coupons will be combined. You cannot choose to combine only B1 and B2 without including B3.
>                              
>                              
>                                  If you have coupons B1 and B2 created in the **Amount discounted on products** category and C1 and C2 created in the **Amount discounted on orders** category and you select:
>                                      - **Other Amount off product coupons** and **Amount discounted on orders** check boxes for B1 and B2.
>                                      - **Other Amount off order coupons** and **Amount off product coupons** check boxes for C1 and C2.
>                                  
>                                  Then B1, B2, C1 and C2 will all be combined. You cannot selectively combine only B1 and C1 if the respective check boxes are selected for all the coupons created.
>                              
>                          
> 
>                      - In summary, selecting the check box allows all coupons within the same or different category to be combined, rather than combining specific coupons selectively.
>                      

                  8. Click **Create and Publish**.
                 

             
### Buy X Get Y

                  In the Buy X Get Y scenario, you must convey to your customers that to use this coupon, both the X and Y products should be present in their cart. For example, if the coupon offers a discount on a cap or provides it for free when you buy a tshirt, both items must be in your cart for the discount to apply. To discount products based on customer's purchase:

                  
> **INFO**
>
> 
>                   **Handy Tips**
>                   
>                   Before you begin, follow steps 6 to 10 given above, which are common for all coupon types.
>                   

                  1. Configure the **Purchase requirements** for X products based on your preference to set eligibility criteria for the customers to avail of the coupon offer. 
                      
                          
                              You can set a minimum quantity for customers. For example, if you set the minimum quantity as 3, the customers can use the coupon only if there are 3 or more items in their cart.
                              ![Configure minimum quantity requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-qt-buy.jpg.md)
                          
                          
                              You can set a minimum purchase amount for customers. For example, if you set the minimum purchase amount as ₹300, the customers can use the coupon only if the cart value is ₹300 and above. 
                              ![Configure minimum amount requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-amt-buy.jpg.md)
                          
                      

                  2. Select **Products** or **Collections** to limit the discount to specific products or collections. Click **+ Add Products** or **+ Add Collections** respectively. Select the products or collections based on your requirement and click **Confirm**. You can add multiple products or collections.

                      ![Configure coupon products purchased](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-product-config.jpg.md)

                  3. Configure the **Additional products offered** for Y products based on your preference. For example, if you set the purchase requirement as 3 and additional products offered quantity as 2, the customers can buy 3 products and get a discount on 2 additional products. 
                  4. Select **Products** or **Collections** for Y products as well. Refer to step 2.
                      ![Configure coupon discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-discount-offered.jpg.md)
                  5. **Discount type**: Select the **Discount type** applicable on Y products.
                      
                          
                              - **Fixed Discount**: In this type, a fixed amount is deducted from the original amount of the Y product.
                                  - **Discount amount**: Enter an amount by which the original price should be reduced. For example, if ₹150 is the flat discount applied, ₹150 is deducted from the original price.
                                  ![configure fixed discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-fixed-dis.jpg.md)
                              - **Percentage discount**: In this type, a set percentage of the amount is deducted from the original amount of the Y product. 
                                  - **Discount percentage**: The percentage by which the original price should be reduced. For example, if 10% discount is applied, on an order amount of ₹900, ₹90 will be deducted.
                                  ![configure percentage discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-percentage-dis.jpg.md)
                          
                          
                              In this type, customers can get the Y product for free.
                              ![configure free discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-free-discount.jpg.md)
                          
                      
                  6. **Usage Limit**: Specify the maximum number of Y products that qualify for a discount. For instance, if the customer adds 2 Y products to the cart and you set the usage limit at 1, the discount applies to only 1 of the Y products.
                  7. **Coupon validity**: Set the duration for the coupon.
                      1. **Active dates**: Set the **Start date** and **Start time**. 
                      1. Select the **Set an end date** check box and set the **End date** and **End time**. *(optional)*
                      1. **Total maximum budget** *(Optional)*: Set an amount to expire the coupon when the total discount to be offered to all your customers is reached. For example, if you set ₹10,000 as the total maximum budget, once the budget limit is reached, the coupon code gets expired and is not visible at checkout.

                         
> **WARN**
>
> 
>                          **Watch Out!**
>                          
>                          The coupon will never expire if you do not set an end date or a total maximum budget.
>                          

                      ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity.jpg.md)
                  8. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
                      1. Click **+ Add Customers**.
                          ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
                      1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
                        
                          
> **WARN**
>
> 
>                           **Watch Out!**
>                         
>                           If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                           

                      1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.

                          
> **INFO**
>
> 
>                           **To Upload File:**
> 
>                           - Enter the values in a valid format as given below:
>                             - Mobile number: +919000090000
>                             - Email id: gauravkumar@example.com
>                           - CSV file should not have any header/column title.
>                           - Maximum acceptable rows in the file is 1 million.
>                           - Upload the file in .CSV format. Maximum file size supported is 50 MB.
>                           

                      1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
                  9. **Coupon combinations** *(optional)*: Combine this coupon with **Free shipping coupons** to provide free shipping along with the discount. If you select **Free shipping coupons** in this category then you must select the **BxGy discount coupons** check box in the **Free Shipping** category to combine the coupon.
                     ![Combine this coupon with free shipping](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-free-combine.jpg.md)

                     
> **WARN**
>
> 
>                      **Watch Out!**
>                      
>                      This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
>                      

                     
                  10. Click **Create and Publish**.
                 

             
### Bulk discount

                  To offer a discount on a bulk order:

                  
> **INFO**
>
> 
>                   **Handy Tips**
>                   
>                   Before you begin, follow steps 6 to 10 given above, which are common for all coupon types.
>                   

                  1. Configure the **Purchase requirements** for products based on your preference to set eligibility criteria for the customers to avail of the coupon offer. You can set a minimum quantity for customers. For example, if you set the minimum quantity as 20, the customers can use the coupon only if there are 20 or more items in their cart.
                  2. Select **Products** or **Collections** to limit the discount to specific products or collections. Click **+ Add Products** or **+ Add Collections** respectively. Select the products or collections based on your requirement and click **Confirm**. You can add multiple products or collections.
                      
                      ![Configure coupon products purchased](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-product-config-bulk.jpg.md) 

                  3. Select the **Discount type**.
                      
                          
                              - **Fixed Discount**: In this type, a fixed amount is deducted from the original amount of the Y product.
                                  - **Discount amount**: Enter an amount by which the original price should be reduced. For example, if ₹150 is the flat discount applied, ₹150 is deducted from the original price.
                                  ![configure fixed discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-fixed-dis-bulk.jpg.md)
                              - **Percentage discount**: In this type, a set percentage of the amount is deducted from the original amount of the Y product. 
                                  - **Discount percentage**: The percentage by which the original price should be reduced. For example, if 10% discount is applied, on an order amount of ₹900, ₹90 will be deducted.
                                  ![configure percentage discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-percentage-dis-bulk.jpg.md)
                          
                          
                              In this type, you can define a flat pricing per product.
                                  - **Price offered per product**: Enter a discounted product rate. For example, if a single product costs ₹500, you can define the discounted rate as ₹440.
                                  ![configure rate per product discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-rate-dis.jpg.md)
                          
                      
                  4. **Usage Limit**: Specify the maximum number of products that qualify for a discount. For instance, if the customer adds 20 products to the cart and you set the usage limit at 8, the discount applies to only 8 of the products.
                  5. **Coupon validity**: Set the duration for the coupon.
                      1. **Active dates**: Set the **Start date** and **Start time**. 
                      1. Select the **Set an end date** check box and set the **End date** and **End time**. *(optional)*
                      1. **Total maximum budget** *(Optional)*: Set an amount to expire the coupon when the total discount to be offered to all your customers is reached. For example, if you set ₹10,000 as the total maximum budget, once the budget limit is reached, the coupon code gets expired and is not visible at checkout.

                         
> **WARN**
>
> 
>                          **Watch Out!**
>                          
>                          The coupon will never expire if you do not set an end date or a total maximum budget.
>                          

                      ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity-bulk.jpg.md)
                  6. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
                      1. Click **+ Add Customers**.
                          ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
                      1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
                        
                          
> **WARN**
>
> 
>                           **Watch Out!**
>                         
>                           If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                           

                      1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.

                          
> **INFO**
>
> 
>                           **To Upload File:**
> 
>                           - Enter the values in a valid format as given below:
>                             - Mobile number: +919000090000
>                             - Email id: gauravkumar@example.com
>                           - CSV file should not have any header/column title.
>                           - Maximum acceptable rows in the file is 1 million.
>                           - Upload the file in .CSV format. Maximum file size supported is 50 MB.
>                           

                      1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
                  7. **Usage restriction**: Set the maximum limit to which a coupon can be redeemed in total and per customer.
                      1. Select the **Number of times discount can be used in total** check box and set the number. For example, 100.
                      1. Select the **Number of times the coupon can be used per customer** check box and set the number. For example, 2. 
                      1. Select **By mobile no.** or **By email id** via which the customer can use the coupon.
                      ![configure coupon restriction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-restriction.jpg.md)
                  8. **Coupon combinations** *(optional)*: Combine this coupon with **Free shipping coupons** to provide free shipping along with the discount. If you select **Free shipping coupons** in this category then you must select the **Bulk discount coupons** check box in the **Free Shipping** category to combine the coupon.
                     ![Combine this coupon with free shipping](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-free-combine.jpg.md)

                     
> **WARN**
>
> 
>                      **Watch Out!**
>                      
>                      This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
>                      

                  9. Click **Create and Publish**.
                 

             
### Free shipping

                  To offer free shipping on an order:

                  
> **INFO**
>
> 
>                   **Handy Tips**
>                   
>                   Before you begin, follow steps 6 to 10 given above, which are common for all coupon types.
>                   

                  
                  
> **WARN**
>
> 
>                   **Watch Out!**
>                   
>                   We do not support country-based shipping if this coupon is created on the Razorpay Dashboard. If you provide international shipping, it will apply to all countries. 
>                   

                  1. Select the **Purchase requirements** based on your preference to set eligibility criteria for the customers to use the coupon.
                      
                          
                              By default, the coupon is visible to all the customers irrespective of the quantity or amount.
                              ![Configure purchase requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-pur-req.jpg.md)
                          
                          
                              You can set a minimum quantity for customers to access the coupon. For example, if you set the minimum quantity as 2, the customers can use the coupon only if there are 2 or more items in their cart.
                              ![Configure minimum quantity requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-qt.jpg.md)
                          
                          
                              You can set a minimum amount for customers to use the coupon. For example, if you set the minimum amount requirements as ₹300, the customers can use the coupon only if the cart value is ₹300 or above.
                              ![Configure minimum amount requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-amt.jpg.md)
                          
                      
                  2. **Coupon validity**: Set the duration for the coupon.
                      1. **Active dates**: Set the **Start date** and **Start time**. 
                      1. Select the **Set an end date** check box and set the **End date** and **End time**. *(optional)*
                      1. **Total maximum budget** *(Optional)*: Set an amount to expire the coupon when the total discount to be offered to all your customers is reached. For example, if you set ₹10,000 as the total maximum budget, once the budget limit is reached, the coupon code gets expired and is not visible at checkout.
                  3. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
                      1. Click **+ Add Customers**.
                      1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
                        
                          
> **WARN**
>
> 
>                           **Watch Out!**
>                         
>                           If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                           

                      1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.

                          
> **INFO**
>
> 
>                           **To Upload File:**
> 
>                           - Enter the values in a valid format as given below:
>                             - Mobile number: +919000090000
>                             - Email id: gauravkumar@example.com
>                           - CSV file should not have any header/column title.
>                           - Maximum acceptable rows in the file is 1 million.
>                           - Upload the file in .CSV format. Maximum file size supported is 50 MB.
>                           

                      1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
                      ![Configure details for free shipping coupon](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-free.jpg.md)
                  4. **Usage restriction**: Set the maximum limit to which a coupon can be redeemed in total and per customer.
                      1. Select the **Number of times discount can be used in total** check box and set the number. For example, 100.
                      1. Select the **Number of times the coupon can be used per customer** check box and set the number. For example, 2. 
                      1. Select **By mobile no.** or **By email id** via which the customer can use the coupon.
                      ![configure coupon restriction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-restriction.jpg.md)
                  5. **Coupon combinations** *(optional)*: You can combine this coupon with various other coupons as follows:  
                     - **Amount off product coupons**: Combine this coupon with a coupon created in the **Amount discounted on product coupons** category to offer a discount on the specific products or collect of products and free shipping. 
                     - **Amount off order coupons**: Combine this coupon with a coupon created in the **Amount discounted on order coupons** category to offer a discount on the total order amount and free shipping.
                     - **Bulk discount coupons**: Combine this coupon with a coupon created in the **Amount discounted on product coupons** category to offer a discount on a bulk order and free shipping.
                     - **BxGy discount coupons**: Combine this coupon with a coupon created in the **Amount discounted on product coupons** category to offer a discount on products based on customer's purchase and free shipping.
                     - **Freebie item coupons**: Combine this coupon with a coupon created in the **Freebie item coupon** category to offer a free gift to customers when their cart meets specific conditions.

                     ![Combine this coupon created with other categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupons-free-combine.jpg.md)
                 
                     
                     
> **WARN**
>
> 
>                      **Watch Out!**
>                      
>                      - This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled for your account.
>                      - If you select **Amount off product coupons**, **Amount off order coupons**, **Bulk discount coupons** or/and **BxGy discount coupons** in this category then you must select the **Free shipping coupons** check box in the respective category to combine the coupon.
>                      

                     
                  6. Click **Create and Publish**.
                 

             
### Freebie Item

                  Create coupons to offer a free gift to customers when their cart meets specific conditions. For example, offer a free item when the cart value exceeds ₹1,000.

                  
> **INFO**
>
> 
>                   **Handy Tips**
>                   
>                   Before you begin, follow steps 5 to 7 given above, which are common for all coupon types.
>                   

                  1. Configure the **Purchase requirements** for products based on your preference to set eligibility criteria for the customers to avail of the coupon offer. 
                      
                          
                              You can set a minimum quantity for customers. For example, if you set the minimum quantity as 3, the customers can use the coupon only if there are 3 or more items in their cart.
                              ![Configure minimum quantity requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-qt-buy.jpg.md)
                          
                          
                              You can set a minimum purchase amount for customers. For example, if you set the minimum purchase amount as ₹300, the customers can use the coupon only if the cart value is ₹300 and above. 
                              ![Configure minimum amount requirements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-min-amt-buy.jpg.md)
                          
                      

                  2. Select **Products** or **Collections** to limit the discount to specific products or collections. Click **+ Add Products** or **+ Add Collections** respectively. Select the products or collections based on your requirement and click **Confirm**. You can add multiple products or collections.

                      ![Configure coupon products purchased](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-product-config.jpg.md)

                  3. **Discount Offered**: Select one product variant to offer as a free gift when the purchase requirements are met:
                      
                      
> **WARN**
>
> 
>                       **Watch Out!**
>                       
>                       You must maintain sufficient inventory of the free product to ensure the coupon works smoothly and provides a seamless experience for your customers.
>                       

                      
                      1. Click **+Add Products**.
                          ![Select a product to offer free item discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-freebie-discount.jpg.md)
                      1. Select the product of your choice and click **Confirm**.
                  4. **Usage Limit**: Select the **Maximum uses per order** check box and specify the maximum number of products that qualify for a discount. For instance, if the customer adds 2 products to the cart and you set the usage limit at 1, the discount applies to only 1 of the products.
                  5. **Coupon validity**: Set the duration for the coupon.
                      1. **Active dates**: Set the **Start date** and **Start time**. 
                      1. Select the **Set an end date** check box and set the **End date** and **End time**. *(optional)*
                      1. **Total maximum budget** *(Optional)*: Set an amount to expire the coupon when the total discount to be offered to all your customers is reached. For example, if you set ₹10,000 as the total maximum budget, once the budget limit is reached, the coupon code gets expired and is not visible at checkout.

                          
> **WARN**
>
> 
>                           **Watch Out!**
>                           - For Freebie coupons, the budget will be calculated based on the total price of the free products.
>                           - The coupon will never expire if you do not set an end date or a total maximum budget.
>                           

                      ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity.jpg.md)
                  6. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
                      1. Click **+ Add Customers**.
                          ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
                      1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
                      
                          
> **WARN**
>
> 
>                           **Watch Out!**
>                       
>                           If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                           

                      1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.

                          
> **INFO**
>
> 
>                           **To Upload File:**
> 
>                           - Enter the values in a valid format as given below:
>                           - Mobile number: +919000090000
>                           - Email id: gauravkumar@example.com
>                           - CSV file should not have any header/column title.
>                           - Maximum acceptable rows in the file is 1 million.
>                           - Upload the file in CSV format. Maximum file size supported is 50 MB.
>                           

                      1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
                  7. **Usage restriction**: Set the maximum limit to which a coupon can be redeemed in total and per customer.
                      1. Select the **Number of times discount can be used in total** check box and set the number. For example, 100.
                      1. Select the **Number of times the coupon can be used per customer** check box and set the number. For example, 2. 
                      1. Select **By mobile no.** or **By email id** via which the customer can use the coupon.
                      ![configure coupon restriction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-restriction.jpg.md)
                  8. **Coupon combinations** *(optional)*: You can combine this coupon with **Free shipping coupons** category to offer free shipping on an order.
                     ![Combine this coupon created with other categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-freebie-combine.jpg.md)
                  9. Click **Create and Publish**.
                

         

         #### Coupon Statuses

         The table below lists the various coupon states and their descriptions:

         
             
### States and Descriptions

                  
                  Status | Description
                  ---
                  Created | Indicates that the coupon is in the draft stage of the creation process.
                  ---
                  Active | Indicates that the coupon is available for customers to use.
                  ---
                  Inactive | Indicates that the coupon is manually deactivated.
                  ---
                  Expired | Indicates that the coupon expired based on the coupon validity (expiry time).
                  ---
                  Published | Indicates that the coupon is currently published for a future activation date.
                  
                 

          

         #### Manage Coupons

         You can perform the following actions based on your requirement on the Razorpay Dashboard. Navigate to **Magic Checkout** → **Coupons** → **All Coupons**.

         - You can activate an inactive coupon if it has not expired. Identify the coupon you want to activate, navigate to the options icon and click **Activate**.
         - You can only delete coupons in created and inactive states. Identify the coupon you want to delete, navigate to the options icon and click **Delete**.
         - You can only deactivate coupons in active and published states and not delete them. Identify the coupon you want to deactivate, navigate to the options icon and click **Deactivate**.
         - If a coupon has expired and you want to offer the coupon again, you can duplicate the coupon. Identify the expired coupon, navigate to the options icon and click **Duplicate**.
         - You cannot create multiple coupons with the same coupon code. However, you can reuse a coupon code once a coupon with a similar code expires.
         - Once a coupon is active, you cannot edit the **Coupon Code**, **Coupon eligibility file**, **Coupon start date** and **Total Maximum budget**.  
         - You can edit the **Display this coupon at checkout** configuration in all states except expired. After editing, the coupons will not appear to the customer.
        
    
    
### Method 2: Shopify Dashboard

         1. Log in to the [Shopify Store](https://accounts.shopify.com/store-login).
         2. Navigate to **Discounts** and click **Create discount**.
             ![Create discounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-discount.jpg.md)
         3. You can create four types of discounts:
             1. **Amount off products**: Discount specific products or collection of products.
             2. **Amount off order**: Discount the total order amount.
             3. **Buy X Get Y**: Discount products based on customer's purchase.
             4. **Free shipping**: Offer free shipping on an order.
             ![Select discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-select-discount.jpg.md)
         4. **Select discount type** of your choice and enter the following details:
             1. **Method**: Choose **Discount code** or **Automatic discount**.
                 1. **Discount code**: Create a code-specific discount and click **Generate**. The customer must enter this code at checkout to avail of discounts. 
                 1. **Automatic discount**: Once a customer adds a product to the cart, the discount will be applied automatically.
             1. Select the **Value** of the discount based on your requirement. You can also choose to add a discount to **Specific collections** or **Specific products**.
                 ![Select the value of the discount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-config.jpg.md)
             1. In the **Minimum purchase requirements** section, you can decide whether the offer should be provided in case of minimum purchase in terms of rupees or quantity.
             1. In the **Customer eligibility** section, you can decide which customer or customer segments can avail discounts.
             1. Add **Maximum discount uses** to **Limit number of times this discount can be used in total** or **Limit to one use per customer**.
             1. Select the **Start date** and **Start time** for the coupons. You can also **Set end date** if required.
             1. Click **Save discount**.
                 ![Save Configs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-configs.jpg.md)
        

    
### Disable Coupon Listing

         If you provide coupons to a select set of customers, we recommend disabling coupon listing from the Dashboard so that these personalised coupons are not visible to everyone. To disable coupon listing:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **Checkout Setup**, disable **Auto fetch coupon** and click **Save settings**.
             ![Disable coupons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-coupon.jpg.md)
        

> **WARN**
>
> 
> **Watch Out!**
> 
> When you create offers/coupons through the Razorpay Dashboard and apply them to Shopify orders, the captured amounts display differently across platforms:
> 
> - **Shopify Dashboard**: Shows the full order amount as captured.
> - **Razorpay Dashboard**: Shows the actual discounted amount collected from the customer.
> 
> This creates a refund limitation. You can only refund the amount that was actually captured (the discounted amount), not the full amount displayed in Shopify. We recommend processing refunds through the Razorpay Dashboard for accuracy. If you want to use Shopify, check the captured amount in your Razorpay Dashboard first, then process only that amount in Shopify.
> 
> **Example**:
> - ₹100 order with ₹10 Razorpay offer.
> - Razorpay captures ₹90 (actual amount charged).
> - Shopify displays ₹100 as captured.
> - You can only refund ₹90.
> 

## Login With Razorpay

Razorpay Magic SSO (Single Sign-On) offers a seamless login experience, helping you enhance conversions and gain valuable insights into user behaviour. Know more about how to setup [login with Razorpayt](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/login-with-razorpay.md) on your shopify store.

## Offers

You can offer discounts or cashback on Magic Checkout to attract customers and improve sales. Using Razorpay Offers, you can completely control the discounts offered to your customers. You create offers on prepaid methods, which will reflect on the Magic Checkout payment page.

Know how to [create offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md).

## Separate Billing Address

You can collect the customer's **Billing Address** separately from the **Shipping address**. Customers can enter a separate billing address apart from the delivery address.

    
### To collect the billing address separately:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.  
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.   
         3. Navigate to **Checkout Setup**, enable **Capture billing address** and click **Save settings**.
             ![Capture separate billing address](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-billing.jpg.md)
        

## Capture and Validate GSTIN

You can capture and validate your customer's GST details from the Dashboard.

    
### To capture and validate GSTIN details:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.    
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **Checkout Setup**, enable **Capture GSTIN** and click **Save settings**.
             ![Capture customer's GSTIN](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-capture-gstin.jpg.md)
         4. To validate the GSTIN entered by your customers at checkout, contact our [Support team](https://razorpay.com/support/#request) to enable GSTIN validation for your account.
         5. After the customers place an order, you can view the GST details on the Shopify and the Razorpay Dashboard.
             - **Shopify Dashboard**: On the Shopify Admin Dashboard, navigate to **Orders** and select the required order number to view the details.
             - **Razorpay Dashboard**: On the Razorpay Dashboard, navigate to **Transactions** → **Orders** and select the required **Order Id** to view the details.
        

    
### Customer Experience

         Once GSTIN validation is enabled for your account, your customers can validate their GST details directly at checkout:

         1. On the order summary screen, the customer clicks **Add** next to **GST Number**.
         2. A **GSTIN Number** pop-up appears.
         3. The customer enters their GSTIN and clicks **Verify**.
             - If the GSTIN is invalid, an error message is displayed asking the customer to enter a valid GSTIN number.
             - If the GSTIN is valid, the GST-registered address is automatically set as the billing address.
         ![GSTIN on checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-config-gstin.jpg.md)
        

## Capture Order Instructions

You can enable your customers to enter order instructions if any at the checkout. For example, customer may want a particular order to be expedited. 

    
### To capture order instructions:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**. 
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **Checkout Setup**, enable **Capture order instructions** and click **Save settings**.
             ![Capture customers order instructions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-shopify-order-inst.jpg.md)
         4. After the customers place an order, you can view the GST details on the Shopify and the Razorpay Dashboard. 
             - **Shopify Dashboard**: On the Shopify Admin Dashboard, navigate to **Orders** and select the required order number to view the details.
             - **Razorpay Dashboard**: On the Razorpay Dashboard, navigate to **Transactions** → **Orders** and select the required **Order Id** to view the details.
        

## Google Analytics

You can use Google Analytics to track orders based on your requirement.

    
### To activate Google analytics:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.   
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **Analytics and ads setup** → **Google Analytics**.
         4. Select the integration type from the drop-down list. 
             ![Select the integration type to configure GA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-ga-integration.jpg.md)
         
             
                 Integrate with frontend. Enable the events of your choice and click **Save events**.
                 ![Configure and save the events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-ga-events.jpg.md)

                 
> **WARN**
>
> 
>                  **Watch Out!**
>                 
>                  You cannot add multiple GA accounts for this integration type.
>                  

             
             
                 Integrate with backend to get a complete view of your website and customers. 

                 
> **INFO**
>
> 
>                  **Handy Tips**
> 
>                  You can add multiple GA accounts for this integration type.
>                  

                 Follow the steps given below:
                 1. Enter the **Measurement ID** and the **API secret value**. Follow the steps in the **Credentials** section  to find this information.
                 2. Click **Integrate backend →**. 
                     ![Enter the GA credentials to integrate backend](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-ga-cred.jpg.md)
                 3. Enable the events of your choice and click **Save events**.
                     ![Configure and save the events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-ga-events.jpg.md)
                 
                     
                         Credentials
                         
                          Follow the steps given below to get the **Measurement ID** and the **API secret value**:

                          1. Log in to the [GA 4 Dashboard](https://analytics.google.com/) and navigate to **Admin**, present at the bottom of the left nav.
                          2. Under the **Admin** section, navigate to **Data Streams**.
                          3. Select the relevant **Stream URL** and copy the **Measurement ID**.
                          4. Under the **Events** section, click **Measurement Protocol API secrets**.
                          5. Click **Create** on the top right.
                          6. Enter a **Nickname** to create a new API secret and click **Create**.
                          7. Copy the **Secret value**. 
                         

                 
             
         
         
             
### List of Events

                  
                   Events | Description
                   ---
                   Checkout initiated | Triggered when customer initiates checkout.
                   ---
                   Add shipping info | Triggered when customer adds shipping info and continues to the next screen.
                   ---
                   Add payment info | Triggered when customer selects a payment option.
                   ---
                   Purchase | Triggered when customer places an order.
                   ---
                   Custom events | Triggered throughout the customer journey.
                   
                 

                 
        
    

## Google Ads

Integrate Google Ads on your Shopify store based on your requirement. 

    
### To integrate Google Ads:

         1. Log in to the [Google Ads Dashboard.](https://ads.google.com/nav/login?subid=in-en-ha-awa-bk-c-c05!o3~Cj0KCQjw6uWyBhD1ARIsAIMcADodCLNnQEp30Xo_8hJPfEIAmsLCF-T9qKj-zqJIAuhv-t7gp8cY3fEaAln1EALw_wcB~140706620052~kwd-94527731~16862088904~592470418766_apac-ha&authuser=0)
         2. Navigate to **Goals** if you are using the newer version of the Google Ads Dashboard. If you are using an older version, navigate to **Tools & Settings**. 
         3. Select the primary conversion action (purchase) you want to track. 
         4. Click **Tag setup** and click **Install the tag yourself**.
         5. The second snippet code (Event snippet) is the Gtag code. Copy the code and share it with us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled on your Shopify store.
        

## Facebook Ads

Integrate Facebook Ads on your Shopify store based on your requirement. 

    
### To integrate Facebook ads:

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.  
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.            
         3. Navigate to **Analytics and ads setup** → **Facebooks Ads**.
         4. Select the integration type from the drop-down list. 
             ![Select the integration type to configure Facebook Ads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-facebook-integrations.jpg.md)
         
             
                 Integrate with frontend. Enable the events of your choice and click **Save events**.
                 ![Configure and save the events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-facebook-events.jpg.md)

                 
> **WARN**
>
> 
>                  **Watch Out!**
>                 
>                  You cannot add multiple Facebook accounts for this integration type.
>                  

             
             
                 Integrate with backend to get a complete view of your website and customers. 

                 
> **INFO**
>
> 
>                  **Handy Tips**
>             
>                  You can add multiple Facebook accounts for this integration type.
>                  

                 Follow the steps given below:
                 1. Enter the **Pixel ID** and the **Access token**. Follow the steps in the **Credentials** section to find this information.
                 2. Click **Integrate backend →**. 
                     ![Enter the GA credentials to integrate backend](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-facebook-creds.jpg.md)
                 3. Enable the events of your choice and click **Save events**.
                     ![Configure and save the events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-facebook-events.jpg.md)
                 
                     
                         Credentials
                         
                          Follow the steps given below to get the credentials:

                          1. Log in to your [Facebook Business](https://analytics.google.com/) account and navigate to **All activity** → **Manage integration**.
                          2. Click **Manage** in the **Conversion API** section.
                          3. Select **Start sending events from server** from the drop-down list.
                          4. Click **Generate Access Token** and click **Copy code to clipboard**. 
                         

                 
             
             
                 Integrate with both backend and frontend to get a complete view of your website and customers. 

                 
> **INFO**
>
> 
>                  **Handy Tips**
> 
>                  You can add multiple Facebook accounts for this integration type.
>                  

                 Follow the steps given below:
                 1. Enter the **Pixel ID** and the **Access token**. Follow the steps in the **Credentials** section to find this information.
                 2. Click **Integrate backend →**. 
                     ![Enter the GA credentials to integrate backend](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-facebook-creds.jpg.md)
                 3. Enable the events of your choice and click **Save events**.
                     ![Configure and save the events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-facebook-events.jpg.md)
                 
                     
### Credentials

                          Follow the steps given below to get the credentials:

                          1. Log in to your [Facebook Business](https://analytics.google.com/) account and navigate to **All activity** → **Manage integration**.
                          2. Click **Manage** in the **Conversion API** section.
                          3. Select **Start sending events from server** from the drop-down list.
                          4. Click **Generate Access Token** and click **Copy code to clipboard**. 
                         

                 
             
         
         
             
### List of Events

                  
                  Events | Description
                  ---
                  Checkout initiated | Triggered when customer initiates checkout.
                  ---
                  Add payment info | Triggered when customer selects a payment option.
                  ---
                  Purchase | Triggered when customer places an order.
                  ---
                  Custom events | Triggered throughout the customer journey.
                  
                 

                 
        
    

> **WARN**
>
> 
> **Watch Out!**
> 
> - Razorpay provides the technical capability to pass `fbclid` and event details to Facebook for campaign tracking and optimisation.
> - Razorpay cannot control impacts on campaign performance or optimisation caused by event quality, data health or Facebook's interpretation of the events.
> - Resolving discrepancies or optimisation challenges requires collaboration between you, Razorpay and Facebook.
> - Razorpay is not liable for campaign performance issues resulting from your integration of Facebook event tracking via the Razorpay dashboard.
> 

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

         1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Platform Settings**.
         2. Select **Shopify** from the **Platform** drop-down list and enter your Shopify **Store ID**.
         3. Navigate to **Checkout Setup** and enable **Pay with gift card**.
         4. Once you enable the gift card settings, you can also enable the following options **if required**:
             - **Pay with multiple gift cards**: Allow your customers to pay with multiple gift cards at once.
             - **Restrict paying with coupon and gift card together**: Restrict your customers from using both coupon and gift card together while making a payment.
             - **Restrict buying gift cards with existing gift cards**: Restrict your customers from purchasing gift cards using existing gift cards.
             - **Restrict customers from clubbing gift cards with COD**: Restrict the usage of gift cards if your customers avail of the cash on delivery option.
             ![Configure the gift card options if required](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-gift-config.jpg.md)
         5. Click **Save Settings**.
        

### Related Information

[Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/troubleshooting-faqs.md#woocommerce)
