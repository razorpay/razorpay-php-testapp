---
title: Coupons | Razorpay COD & Magic Checkout
heading: Coupons
description: Add various types of coupons to offer discounts to your customers using the Razorpay Dashboard.
---

# Coupons

You can choose to offer discounts to your customers by adding coupons using Razorpay Dashboard.

> **WARN**
>
> 
> **Watch Out!**
> 
> - Coupons created on both the Razorpay Dashboard and Shopify are not auto-applied. Customers are required to manually apply them at checkout.
> - **Automatic discount** coupons created on Shopify are applied automatically, while **Discount code** coupons require manual application.
> 

To create coupons: 

1. Log in to the Dashboard and navigate to **Magic Checkout** → **Setup & Settings** → **Checkout Settings**. 
2. Click **Edit**, enable **Auto fetch coupon** and click **Save settings**. This step is mandatory and allows you to display coupons to your customers at checkout. Even if you enable **Display this coupon at checkout** in the next steps, you must still enable Auto fetch coupon.
3. Navigate to **Coupons** → **Setup**. 

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     When you create coupons on the Razorpay Dashboard, all the coupons created on Shopify will not apply unless they are synced. To sync all coupons, navigate to **Setup** on the Razorpay Dashboard and click **Sync now** next to the **Coupons from Shopify** section. Set the sync duration and click **Start sync**.
> 
>     - By default, all the coupons synced from Shopify are in the `created` state. You must manually configure and publish the coupons. To configure a coupon, identify the one you want to publish, click the options icon, and click **View and Edit** *(if required)*, or click **Publish**.
>     
>         
>             Watch the GIF below:
>             
>             ![publish the coupons synced from Shopify](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-publish-sync-shopify.gif.md)
>             
>         
>     
>     - All newly created coupons will be automatically synced after the initial sync. You must manually configure and publish the coupons.
>     - Only the following coupons will be synced from Shopify: (currently, multiple collections are not synced)
>         - Amount discounted on orders
>         - Amount discounted on products 
>         - Buy X Get Y (if minimum quantity configured)
>     

4. Navigate to **All Coupons**, click **+ Create Coupon** and **Select a Coupon Type** based on your requirement.  Alternatively, you can click **+ Create Coupon** next to **Coupons on Magic** in the **Setup** section and **Select a Coupon Type**.
    
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     - The steps from 5 to 7 given below are common for all types of coupons.
>     - You can preview how customers will view the coupon summary at checkout as you configure the details.
>          
>              
>                  Preview Coupon Summary
>                  
>                   ![Preview Coupon Summary](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-preview-coupon.jpg.md)
>                  
>              
>          
>     

    
5. Enter the **Coupon Code**. Your customers can view the coupon code at checkout.
6. Enter the **Coupon description**. Your customers can view the coupon description at checkout.
7. Select the **Display this coupon at checkout** check box to display the coupon at checkout for your customers. 
    1. After selecting the above check box, the **Enable coupon as an unavailable coupon** check box appears.
    2. Select this check box if you want to display the coupon as unavailable (in a disabled state) when users do not meet the cart or eligibility conditions. Once the conditions are met, the coupon is automatically enabled.
    ![Enter the coupon code and description](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magicx-shopify-coupon-code.jpg.md)

### Coupon Type

Select a coupon type from the following:

    
### Amount discounted on orders

         Apply a discount to the total order amount, you can set conditions based on the cart value. For example, offer ₹200 discount from the total order amount when the cart value exceeds ₹2,000.

         
> **INFO**
>
> 
>          **Handy Tips**
>         
>          Before you begin, follow steps 5 to 7 given above, which are common for all coupon types.
>          

         
         1. **Discount Details**: Select the **Discount type**.
             
                 
                     In this type, a fixed amount is deducted from the original amount. 

                     **Discount amount**: Enter an amount by which the original price should be reduced. For example, if ₹150 is the flat discount applied, ₹150 is deducted from the original price.
                     ![Configure the fixed discount details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-discount.jpg.md)
                 
                 
                     This type deducts a set percentage of the amount from the original amount. 
                         - **Discount percentage**: The percentage by which the original price should be reduced. For example, if 10% discount is applied, on an order amount of ₹900, ₹90 will be deducted.
                         - **Upto (Max Discount)**: The maximum amount that can be deducted from the bill amount. For example, if the max discount is ₹300, and the order amount is ₹800, you can ensure that the customer cannot avail of a discount higher than ₹300.
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
>                  **Watch Out!**
>                 
>                  The coupon will never expire if you do not set an end date or a total maximum budget.
>                  

                
             ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity.jpg.md)
         4. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
             1. Click **+ Add Customers**.
                 ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
             1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
            
                 
> **WARN**
>
> 
>                  **Watch Out!**
>             
>                  If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                  

             1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.
                
                 
> **INFO**
>
> 
>                  **To Upload File:**
> 
>                  - Enter the values in a valid format as given below:
>                  - Mobile number: +919000090000
>                  - Email id: gauravkumar@example.com
>                  - CSV file should not have any header/column title.
>                  - Maximum acceptable rows in the file is 1 million.
>                  - Upload the file in CSV format. Maximum file size supported is 50 MB.
>                  

                
             1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
         5. **Usage restriction**: Set the maximum limit to which a coupon is redeemed in total and per customer.
             1. Select the **Number of times discount can be used in total** check box and set the number. For example, 100.
             1. Select the **Number of times the coupon can be used per customer** check box and set the number. For example, 2. Select **By mobile no.** or **By email id** via which the customer can use the coupon.
             ![configure coupon restriction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-restriction.jpg.md)
         6. **Coupon combinations** *(optional)*: You can combine this coupon with various other coupons as follows:  
             - **Amount off product coupons**: Combine this coupon with a coupon created in the **Amount discounted on products** category to offer a discount on the total order amount and specific products or collections of products.
             - **Other Amount off order coupons**: Combine this coupon with other coupons created in the same category to offer multiple discounts on the total order amount.
             ![Combine coupons created with other categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magicx-shopify-coupon-order-combine.jpg.md)
            
             
> **WARN**
>
> 
>              **Watch Out!**
> 
>              - You can combine two coupons only if you select the same check box in both coupons. For example:
>                  
>                      
>                          If you want to combine two coupons created in the **Amount discounted on orders** category, you must select the **Other Amount off order coupons** check box in both coupons. 
>                      
>                      
>                          If you want to combine a coupon from the **Amount discounted on orders** category with a coupon from the **Amount discounted on products** category, you need to select the appropriate check boxes:
>                              - Select the **Amount off product coupons** check box in the **Amount discounted on orders** category coupon.
>                              - Select the **Amount off order coupons** check box in the **Amount discounted on products** category coupon.
>                      
>                  
>              - You cannot combine specific coupons selectively within a category or across categories. For example: 
>                  
>                      
>                          If you have coupons C1, C2, and C3 created in the **Amount discounted on orders** category and you select the **Other Amount off order coupons** check box for all three, all three coupons will be combined. You cannot choose to combine only C1 and C2 without including C3.
>                      
>                      
>                          If you have coupons B1 and B2 created in the **Amount discounted on products** category and C1 and C2 created in the **Amount discounted on orders** category, and you select:
>                              - **Other Amount off product coupons** and **Amount discounted on orders** check boxes for B1 and B2.
>                              - **Other Amount off order coupons** and **Amount off product coupons** check boxes for C1 and C2.
>                         
>                          Then B1, B2, C1, and C2 will all be combined. You cannot selectively combine only B1 and C1 if the respective check boxes are selected for all the coupons created.
>                      
>                  
> 
>              - In summary, selecting the check box allows all coupons within the same or different category to be combined, rather than combining specific coupons selectively.
>             

         7. Click **Create and Publish**.
        
 
    
### Amount discounted on products

         Apply discounts to specific products or a collection of products. You can target individual items or grouped categories. For example, apply a 20% discount on Wireless Earbuds during a limited-time sale or offer a 15% discount on all items in the Winter Wear collection.

         
> **INFO**
>
> 
>          **Handy Tips**
>         
>          Before you begin, follow steps 5 to 7 given above, which are common for all coupon types.
>          

         1. **Discount Details**: Select the **Discount type**.
             
                 
                     In this type, a fixed amount is deducted from the original amount.

                     **Discount amount**: Enter an amount by which the original price should be reduced. For example, if ₹150 is the flat discount applied, ₹150 is deducted from the original price.
                     ![Configure the fixed discount details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-discount.jpg.md)
                 
                 
                     This type deducts a set percentage of the amount from the original amount. 
                         - **Discount percentage**: The percentage by which the original price should be reduced. For example, if 10% discount is applied, on an order amount of ₹900, ₹90 will be deducted.
                         - **Upto (Max Discount)**: The maximum amount that can be deducted from the bill amount. For example, if the max discount is ₹300, and the order amount is ₹800, you can ensure that the customer cannot avail of a discount higher than ₹300.
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
>                  **Watch Out!**
>                 
>                  The coupon will never expire if you do not set an end date or a total maximum budget.
>                  

             ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity.jpg.md)
         5. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
             1. Click **+ Add Customers**.
                 ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
             1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
            
                 
> **WARN**
>
> 
>                  **Watch Out!**
>             
>                  If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                  

             1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.

                 
> **INFO**
>
> 
>                  **To Upload File:**
> 
>                  - Enter the values in a valid format as given below:
>                  - Mobile number: +919000090000
>                  - Email id: gauravkumar@example.com
>                  - CSV file should not have any header/column title.
>                  - Maximum acceptable rows in the file is 1 million.
>                  - Upload the file in CSV format. Maximum file size supported is 50 MB.
>                  

             1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
         6. **Usage restriction**: Set the maximum limit to which a coupon is redeemed in total and per customer.
             1. Select the **Number of times discount can be used in total** check box and set the number. For example, 100.
             1. Select the **Number of times the coupon can be used per customer** check box and set the number. For example, 2. Select **By mobile no.** or **By email id** via which the customer can use the coupon.
             ![configure coupon restriction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-restriction.jpg.md)
         7. **Coupon combinations** *(optional)*: You can combine this coupon with various other coupons as follows:  
             - **Amount off order coupons**: Combine this coupon with a coupon created in the **Amount discounted on order** category to offer a discount on the total order amount and specific products or collections of products.
             - **Other Amount off product coupons**: Combine this coupon with other coupons created in the same category to offer multiple discounts on specific products or collections of products.
             ![Combine coupons created with other categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magicx-shopify-coupon-prod-combine.jpg.md)
            
             
> **WARN**
>
> 
>              **Watch Out!**
> 
>              - You can combine two coupons only if you select the same check box in both coupons. For example:
>                  
>                      
>                          If you want to combine two coupons created in the **Amount discounted on products** category, you must select the **Other Amount off product coupons** check box in both coupons. 
>                      
>                      
>                          If you want to combine a coupon from the **Amount discounted on orders** category with a coupon from the **Amount discounted on products** category, you need to select the appropriate check boxes:
>                              - Select the **Amount off product coupons** check box in the **Amount discounted on orders** category coupon.
>                              - Select the **Amount off order coupons** check box in the **Amount discounted on products** category coupon.
>                      
>                  
>              - You cannot combine specific coupons selectively within a category or across categories. For example: 
>                  
>                      
>                          If you have coupons B1, B2, and B3 created in the **Amount discounted on products** category and you select the **Other Amount off product coupons** check box for all three, all three coupons will be combined. You cannot choose to combine only B1 and B2 without including B3.
>                      
>                      
>                          If you have coupons B1 and B2 created in the **Amount discounted on products** category and C1 and C2 created in the **Amount discounted on orders** category, and you select:
>                              - **Other Amount off product coupons** and **Amount discounted on orders** check boxes for B1 and B2.
>                              - **Other Amount off order coupons** and **Amount off product coupons** check boxes for C1 and C2.
>                         
>                          Then B1, B2, C1, and C2 will all be combined. You cannot selectively combine only B1 and C1 if the respective check boxes are selected for all the coupons created.
>                      
>                  
> 
>              - In summary, selecting the check box allows all coupons within the same or different category to be combined, rather than combining specific coupons selectively.
>              

         8. Click **Create and Publish**.
        

    
### Buy X Get Y

         In the Buy X Get Y scenario, you must convey to your customers that to use this coupon, both the X and Y products should be present in their cart. For example, if the coupon offers a discount on a cap or provides it for free when you buy a t-shirt, both items must be in your cart for the discount to apply. To discount products based on customer's purchase:

         
> **INFO**
>
> 
>          **Handy Tips**
>         
>          Before you begin, follow steps 5 to 7 given above, which are common for all coupon types.
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
>                  **Watch Out!**
>                 
>                  The coupon will never expire if you do not set an end date or a total maximum budget.
>                  

             ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity.jpg.md)
         8. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
             1. Click **+ Add Customers**.
                 ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
             1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
            
                 
> **WARN**
>
> 
>                  **Watch Out!**
>             
>                  If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                  

             1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.

                 
> **INFO**
>
> 
>                  **To Upload File:**
> 
>                  - Enter the values in a valid format as given below:
>                  - Mobile number: +919000090000
>                  - Email id: gauravkumar@example.com
>                  - CSV file should not have any header/column title.
>                  - Maximum acceptable rows in the file is 1 million.
>                  - Upload the file in CSV format. Maximum file size supported is 50 MB.
>                  

             1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
         9. Click **Create and Publish**.
        

    
### Freebie Item

         Create coupons to offer a free gift to customers when their cart meets specific conditions. For example, offer a free item when the cart value exceeds ₹1,000.

         
> **INFO**
>
> 
>          **Handy Tips**
>         
>          Before you begin, follow steps 5 to 7 given above, which are common for all coupon types.
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
>              **Watch Out!**
>              
>              You must maintain sufficient inventory of the free product to ensure the coupon works smoothly and provides a seamless experience for your customers.
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
>                  **Watch Out!**
>                  - For Freebie coupons, the budget will be calculated based on the total price of the free products.
>                  - The coupon will never expire if you do not set an end date or a total maximum budget.
>                  

             ![Configure the coupon validity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-validity.jpg.md)
         6. **Coupon eligibility**: Create the coupon for **All customers** or **Specific customers**. If you want to create coupons for specific customers: 
             1. Click **+ Add Customers**.
                 ![Configure the coupon eligibility](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-shopify-coupon-eligibility.jpg.md)
             1. You can upload a list of **Mobile Number** or **Email ID** based on your requirement.
            
                 
> **WARN**
>
> 
>                  **Watch Out!**
>             
>                  If you want to create specific coupons based on the **Email ID**, ensure the **Email** field on checkout is not set as optional and is not hidden from checkout.
>                  

             1. Click **Download Sample File** and add the required data to the sample file. Ensure the data is formatted correctly and save the file.

                 
> **INFO**
>
> 
>                  **To Upload File:**
> 
>                  - Enter the values in a valid format as given below:
>                  - Mobile number: `+919000090000`
>                  - Email id: `gauravkumar@example.com`
>                  - CSV file should not have any header/column title.
>                  - Maximum acceptable rows in the file is 1 million.
>                  - Upload the file in CSV format. Maximum file size supported is 50 MB.
>                  

             1. Select **click to upload** and choose the file you want to import. Click **Confirm**.
         7. Click **Create and Publish**.
        

### Show Coupons on Checkout

After you publish a coupon, navigate to **Coupons** → **Setup** and toggle on **Enable Coupons** option to make the coupons accessible on checkout for your customers. Click **Save settings** post which all the coupons created on Shopify will stop working immediately.

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
        
        

 

### Manage Coupons

You can perform the following actions based on your requirement on the Razorpay Dashboard. Navigate to **Checkoout360** → **Coupons** → **All Coupons**.

- You can activate an inactive coupon if it has not expired. Identify the coupon you want to activate, navigate to the options icon and click **Activate**.
- You can only delete coupons in created and inactive states. Identify the coupon you want to delete, navigate to the options icon and click **Delete**.
- You can only deactivate coupons in active and published states and not delete them. Identify the coupon you want to deactivate, navigate to the options icon and click **Deactivate**.
- If a coupon has expired and you want to offer the coupon again, you can duplicate the coupon. Identify the expired coupon, navigate to the options icon and click **Duplicate**.
- You cannot create multiple coupons with the same coupon code. However, you can reuse a coupon code once a coupon with a similar code expires.
- Once a coupon is active, you cannot edit the **Coupon Code**, **Coupon eligibility file**, **Coupon start date** and **Total Maximum budget**.  
- You can edit the **Display this coupon at checkout** configuration in all states except expired. After editing, the coupons will not appear to the customer.
