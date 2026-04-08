---
title: Configure COD | Razorpay COD & Magic Checkout
heading: Configure COD
description: Configure COD for shipping and payment methods created on your Shopify store.
---

# Configure COD

After successfully onboarding with COD & Magic Checkout, you can configure COD for the shipping and payment methods created on your Shopify store. 

To configure COD:
1. On the Dashboard, navigate to **Magic Checkout** → **Setup and Settings** → **COD Settings**.
2. Toggle on **Enable COD as a payment option** to allow customers to choose COD at checkout. Click **Yes, enable** in the confirmation pop-up modal.
    ![Enable COD as a payment option](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-checkout-cod-enable.jpg.md)
3. Turn on **Enable RTO Intelligence** to check customer eligibility for COD based on their purchase history. If a customer is ineligible, the COD option is hidden, displaying only prepaid options at checkout. Click **Enable COD Intelligence** in the confirmation pop-up modal.

    ![Enable RTO Intelligence](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-checkout-cod-rto-intelligence.jpg.md)

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     To enable RTO Intelligence, you must activate Magic Checkout.
> 
>     
>         
>             To activate Magic Checkout:
>             
>              1. Click **Activate** under **Enable RTO Intelligence**.
>                  ![Activate Magic Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-cod-activate-magic.jpg.md)
>              1. On the **Checkout Settings** page, turn on **Enable Magic Checkout**.
>              1. Click **Save Settings**.
>                  ![Enable Magic Checkout to activate RTO Intelligence](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-checkout-cod-enable-magic.jpg.md)
>             
>         
>     
>     

4. Select the type of setting:
- [Basic](#basic)
- [Advanced](#advanced) *(Recommended)*

## Basic

Configure COD for the shipping methods synced from your Shopify store. These methods are based on the profiles you have set up on Shopify to manage shipping locations and costs at checkout. Know more about [shipping options on Shopify](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/cod-magic-checkout/shopify/shipping-options.md).

    
### Follow the steps given below:

         1. In **COD Settings**, click **Configure COD** under **Configure COD for Shopify Shipping Methods** to select the payment methods allowed for the shipping method synced from Shopify. 
    
             
> **INFO**
>
> 
>              **Handy Tips**
>              
>              Click **Sync Again** to sync shipping methods from Shopify.
>              

             
             ![Configure COD for shopify shipping methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-config-cod.jpg.md)
             
             
> **WARN**
>
> 
>              **Watch Out!**
>              
>              You can configure the shipping method rate only on your Shopify store. Know more about how to create [shipping options on Shopify](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/cod-magic-checkout/shopify/shipping-options.md).
>              

             
         2. In the **Allowed Payment Method** section, select the relevant option:

             - **COD**: Select the **COD** check box. You can either apply COD to all orders or define a range by specifying a minimum and maximum order value. For example, you can set a minimum order value of ₹100 and a maximum of ₹500. If a customer's order subtotal falls within this range, the COD option will be available for that shipping method.
                 
                 
> **INFO**
>
> 
>                  **How to charge extra for COD orders?**
>                  
>                  You can either create a new shipping method or update an existing shipping profile on Shopify. Configure the shipping rate to include both shipping and COD charges. For example, if the shipping cost is ₹50 and COD is ₹30, set the shipping rate to ₹80 to cover both.
>                  

             - **Prepaid**: Select the **Prepaid** check box to allow only prepaid options for that shipping method.
         3. Click **Submit** to save your settings.
         ![Configure COD for shopify shipping methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-config-cod-edit.jpg.md)
        

## Advanced *(Recommended)*

Set up advanced rules to customise the shipping and payment methods displayed at checkout. You can create conditions based on weight, cart total, discount percentage, phone number, and more. 

Depending on these conditions, you can choose to show or hide specific shipping or payment options. You can also combine multiple conditions to create more specific rules.

> **INFO**
>
> 
> **Handy Tips**
> 
> This feature is enabled by default for new users. In case you are an existing user, you must update the **Razorpay COD & Magic Checkout** app to get this feature on your account.
> 
>     
>         To update the app:
>         
>          1. Log in to your [Shopify Dashboard](https://www.shopify.com/in/login?ui_locales=en-IN).
>          2. Navigate to **Apps** → **Razorpay COD & Magic Checkout**.
>          3. Click **Update**.
>          ![Update Razorpay COD & Magic Checkout app](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-update-app.jpg.md)
>         
>     
> 
> 

Follow the steps given below to set up Shipping and Payment Rules:

    
### Shipping Rule

         Customise shipping methods you want to display on checkout. For example, if the cart total is less than ₹1000, you can choose to hide free shipping.
         ![Shipping methods on checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-shipping-methods.jpg.md)

         1. Select **Shipping Rule**.
         2. Enter the **Rule Name** and **Description**.
         3. You can create various shipping conditions:
             
                 
                     Automate Actions Based on Simple Conditions
                     
                     Define **When** and **Then** conditions to automate actions. 

                     For example, when the **Quantity is less than 20 units**, then **Hide Free Shipping Methods*.
                     ![define when then conditions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-when-then-condition.jpg.md)
                     

                 
### Combine Multiple Conditions

                     Combine multiple conditions based on AND and OR logic.
                     
                        
                            Combine multiple **When** conditions to trigger actions **only if all** conditions are true. Click **+Add another block** and select **AND** to add another **When** condition. 

                            For example, when the **Quantity is less than 20 units** and the **Weight is less than 500 grams**, then **Hide Free Shipping Methods*.
                            ![combine when and when-then condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-when-when-then-condition.jpg.md)
                        
                        
                            Use **When** conditions to trigger actions **if any** of the conditions are true. Click **+Add another block** and select **OR** to add another **When** condition. 
                     
                            For example, when the **Quantity is less than 20 units** or the **Weight is less than 500 grams**, then **Hide Free Shipping Methods*.
                            ![combine when or when-then condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-when-or-when-then-condition.jpg.md)
                        
                     
                    

                 
### Combine Multiple Complex Conditions

                     Combine multiple complex conditions based on AND and OR logic.
                     
                        
                            Combine **When OR** conditions to handle more complex scenarios. Click **+Add another condition** and select **AND** to define a **When OR** condition. 
                             
                            For example, when the **Quantity is less than 20 units** or the **Cart Total is less than or equal to ₹3000** and the **Weight is less than 500 grams**, then **Hide Free Shipping Methods*.
                            ![combine when or condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-combine-when-or-condition.jpg.md)

                             
                            
> **INFO**
>
> 
>                             **Handy Tips**
>                              
>                             You can include multiple AND blocks and OR conditions to create flexible and dynamic rules.
>                              
>                             For example, when the **Quantity is less than 20 units** or the **Cart Total is less than or equal to ₹3000** and the **Weight is less than 500 grams** or the **Cart Total Before Discount equals to ₹3000**, then **Hide Free Shipping Methods*.
>                             

                        
                        
                            Combine **When AND** conditions to handle more complex scenarios. Click **+Add another condition** and select **AND** to define a **When AND** condition. 
                             
                            For example, when the **Quantity is less than 20 units** and the **Cart Total is less than or equal to ₹3000** or the **Weight is less than 500 grams**, then **Hide Free Shipping Methods*.
                            ![combine when and condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-combine-when-and-condition.jpg.md)

                            
> **INFO**
>
> 
>                             **Handy Tips**
>                             
>                             You can include multiple OR blocks and AND conditions to create flexible and dynamic rules.
>                             
>                             For example, when the **Quantity is less than 20 units** and the **Cart Total is less than or equal to ₹3000** or the **Weight is less than 500 grams** and the **Cart Total Before Discount equals to ₹3000**, then **Hide Free Shipping Methods*.
>                             

                        
                     
                     

             

         4. Click **Submit**.
        
    
    
### Payment Rule

         Customise payment methods you want to display on checkout. For example, if the cart total is less than ₹1000, you can choose to show specific payment methods based on your preference. 

         ![Payment methods on checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-payment-methods.jpg.md)

         1. Select **Payment Rule**.
         2. Enter the **Rule Name** and **Description**.
         3. You can create various payment conditions:
             
                 
                     Automate Actions Based on Simple Conditions
                     
                     Define **When** and **Then** conditions to automate actions. 

                     For example, when the **Cart Total is less than ₹2000**, then **Hide COD Methods*.
                     ![define when then conditions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-when-then-payment-condition.jpg.md)
                     

                 
### Combine Multiple Conditions

                     Combine multiple conditions based on AND and OR logic.
                     
                        
                            Combine multiple **When** conditions to trigger actions **only if all** conditions are true. Click **+Add another block** and select **AND** to add another **When** condition. 

                            For example, when the **Cart Total is less than ₹2000** and **Quantity is less than or equal to 10 units**, then **Hide COD Methods*.
                            ![combine when and when-then condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-when-when-then-payment-condition.jpg.md)
                        
                        
                            Use **When** conditions to trigger actions **if any** of the conditions are true. Click **+Add another block** and select **OR** to add another **When** condition. 
                     
                            For example, when the **Cart Total is less than ₹2000** or **Quantity is less than or equal to 10 units**, then **Hide COD Methods*.
                            ![combine when or when-then condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-when-or-when-then-payment-condition.jpg.md)
                        
                     
                    

                 
### Combine Multiple Complex Conditions

                     Combine multiple complex conditions based on AND and OR logic.
                     
                        
                            Combine **When OR** conditions to handle more complex scenarios. Click **+Add another condition** and select **AND** to define a **When OR** condition. 
                             
                            For example, when the **Cart Total is less than ₹2000** or the **Weight is less than 500 grams** and **Quantity is less than or equal to 10 units**, then **Hide COD Methods*.
                            ![combine when or condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-combine-when-or-payment-condition.jpg.md)

                             
                            
> **INFO**
>
> 
>                             **Handy Tips**
>                              
>                             You can include multiple AND blocks and OR conditions to create flexible and dynamic rules.
>                              
>                             For example, when the **Cart Total is less than ₹2000** or the **Weight is less than 500 grams** and **Quantity is less than or equal to 10 units** or the **Cart Total equals to ₹2000**, then **Hide COD Methods*.
>                             

                        
                        
                            Combine **When AND** conditions to handle more complex scenarios. Click **+Add another condition** and select **AND** to define a **When AND** condition. 
                             
                            For example, when the **Cart Total is less than ₹2000** and the **Weight is less than 500 grams** or **Quantity is less than or equal to 10 units**, then **Hide COD Methods*.
                            ![combine when and condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cod-magic-combine-when-and-payment-condition.jpg.md)

                            
> **INFO**
>
> 
>                             **Handy Tips**
>                             
>                             You can include multiple OR blocks and AND conditions to create flexible and dynamic rules.
>                             
>                             For example, when the **Cart Total is less than ₹2000** and the **Weight is less than 500 grams** or **Quantity is less than or equal to 10 units** and the **Cart Total equals to ₹2000**, then **Hide COD Methods*.
>                             

                        
                     
                     

             

         4. Click **Submit**.
        
    

> **WARN**
>
> 
> **Watch Out!**
> 
> The **Allowed Rule Size** at the bottom indicates the maximum size of rules you can input. For example, if you select **Email** as one of the **When** conditions, you must provide a comma-separated list of customer email IDs. The rule size determines how many email IDs you can include. 
> 

### List of Conditions and Values

    
### When Conditions

         The list below includes conditions for both Shipping and Payment rules.

         
         Conditions | Values
         ---
         Quantity | Enter the total number of product units.
         ---
         Weight | Enter the total weight of the products in grams.
         ---
         Discount Percentage | Enter the discount offered in percentage.
         ---
         Cart Total | Enter the total cart amount in rupees.
         ---
         Cart Contains Discount | Indicates whether the cart includes a discount. Select **True** or **False**.
         ---
         Cart Total Before Discount | Enter the cart total amount in rupees before any discount is applied.
         ---
         Email | Enter customer email IDs as a comma-separated list.
         ---
         Phone | Enter customer phone numbers with the country code as a comma-separated list. For example, `+919000090000`.
         ---
         Zipcode | Enter customer ZIP codes as a comma-separated list.
         
       

    
### Then Conditions

         
            
                Shipping Rule
                
                 
                 Conditions | Value
                 ---
                 Hide Free Shipping Methods | NA
                 ---
                 Hide Paid Shipping Methods | NA
                 ---
                 Show Specific Shipping Methods | Select shipping methods from the drop-down list. 
                 ---
                 Hide Specific Shipping Methods | Select shipping methods from the drop-down list.
                 
                

            
### Payment Rule

                 
                 Conditions | Value
                 ---
                 Hide COD Methods | NA
                 ---
                 Hide Prepaid Methods | NA
                 ---
                 Show Specific Payment Methods | Enter payment methods as a comma-separated list.
                 ---
                 Hide Specific Payment Methods | Enter payment methods as a comma-separated list.
