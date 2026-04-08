---
title: Razorpay Magic Checkout Flow
heading: How Magic Checkout Works
description: Understand how Magic Checkout works on mobile and desktop for logged-in, logged-out and new customers with QuickBuy and One Page features.
---

# How Magic Checkout Works

Given below is a complete end-to-end flow about how customers can use Magic Checkout.

## Mobile

Magic Checkout on mobile offers different experiences based on customer login status and purchase history:

    
### Logged In

         Customers who already are logged in have 2 ways to proceed with checkout:
         
            
                QuickBuy is a one-click payment solution that streamlines checkout for returning customers. With a compact half-page interface, it intelligently displays preferred payment methods based on past transactions and automatically applies the best available offers, reducing friction and decision-making.

                This results in a faster, more efficient checkout experience that boosts conversion rates and enhances satisfaction for both customers and businesses. Know more about [Quickbuy](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/features/quickbuy.md).

                QuickBuy is ideal for returning customers who are logged into Razorpay Checkout and making repeat purchases. 

                ![QuickBuy on Magic Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/quickbuy-magic.jpg.md)

                The workflow includes:

                1. **Automatic coupon application**: The best available coupon is applied to the total. If they change the coupon, the system recalculates and updates the total amount.
                2. **Default address selection**: The most recently used address is automatically selected.
                Pre-selected shipping method: The default shipping method is free if available; otherwise, the lowest-cost option is chosen, with the option to change it if required.
                3. **Preferred payment method**: The most frequently used payment method is pre-selected. If the user changes their payment method, the system recalculates and applies the best available offer to the new method, notifying them of the updated total.
                4. **Single-click purchase**: Customers complete their purchases in a single click.
            
            
                Magic Checkout now features a **One Page Checkout** that consolidates all essential checkout elements onto one clean, intuitive page. Eligible customers can complete their entire purchase without navigating through multiple pages. The unified view brings together order summary, coupon application, address selection and payment options for a streamlined checkout process. 

                The system automatically determines which checkout experience to show each customer:
                - **One Page Checkout**: Automatically displayed to logged-in customers with saved addresses and payment methods for faster completion.
                - **Multi-Step Flow**: Used for new customers or those without sufficient saved information, guiding them through the traditional step-by-step process.

                ### Customer Experience

                Customers select the products on your website or app and proceed to Checkout.
                
                ![Magic Checkout Flow on Mobile: Logged in customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-flow-mobile-logged-in.gif.md)

                On the Checkout page, logged-in customers:

                1. Verify the order in the **Order Summary** tab.
                2. Click **Coupons** to view available offers.
                3. Enter the coupon code or select a preferred coupon and click **Apply**.
                4. Verify the pre-filled address or click **Add/Change** to view all saved addresses, select any existing address or add a new one.
                5. Choose a delivery option if applicable.
                6. Choose a preferred payment method, enter the required details and complete the purchase.
            
         
        

    
### Logged Out

         Customers select the products on your website or app and proceed to Checkout.
                
         ![Magic Checkout Flow on Mobile: Logged out customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-flow-logged-out.gif.md)

         On the Checkout page, logged-out customers:

         1. Enter their mobile number and click **Continue**.
         2. Enter the OTP to prefill their saved address and click **Continue**.
         3. Verify the order in the **Order Summary** tab.
         4. Click **Coupons** to view available offers.
         5. Enter the coupon code or select a preferred coupon and click **Apply**.
         6. Verify the pre-filled address or click **Add/Change** to view all saved addresses, select any existing address or add a new one.
         7. Choose a delivery option if applicable.
         8. Choose a preferred payment method, enter the required details and complete the purchase.
        

    
### New customers

         Customers select the products on your website or app and proceed to Checkout.

         ![Magic Checkout Flow on Mobile: New customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-flow-mobile-new-user.gif.md)

         On the Checkout page, new customers:
         1. Enter their mobile number. 
         2. Verify the order in the **Order Summary** tab.
         3. Click **Coupons and offers** to view available offers. 
         4. Enter the coupon code or select a preferred coupon and click **Apply**. Click **Continue**.
         5. Enter the delivery address. 
         6. Select the **Save my address as** check box to save the address and select the address type. 
         7. Enter the OTP to securly save your address for future use and click **Continue**.
         8. In the **Payment Options** section, choose a preferred payment method. Enter the required details and complete the purchase.
        

## Desktop

Magic Checkout on desktop provides a checkout interface optimised for larger screens with different flows based on customer login status:

    
### Logged In

         Customers select the products on your website or app and proceed to Checkout.

         ![Magic Checkout Flow on Desktop: Logged in customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-flow-desktop.gif.md)

         On the Checkout page, logged-in customers:
         1. Verify the order in the **Order Summary** tab on the left.
         2. Click **Coupons and offers** to view available offers.
         3. Enter the coupon code or select a preferred coupon and click **Apply**.
         4. Verify the pre-filled address or click **Add/Change** to view all saved addresses. Select any existing address or add a new one.
         5. Choose a delivery option if applicable and click **Continue**.
         6. In the **Payment Options** section, choose a preferred payment method. Enter the required details and complete the purchase.
        

    
### Logged Out

         Customers select the products on your website or app and proceed to Checkout.

         ![Magic Checkout Flow on Desktop: Logged out customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-flow-desktop-logged-out.gif.md)

         On the Checkout page, logged-out customers:
         1. Enter their mobile number and click **Continue**.
         2. Enter the OTP to prefill their saved address and click **Continue**.
         3. Verify the order in the **Order Summary** tab on the left.
         4. Click **Coupons and offers** to view available offers.
         5. Enter the coupon code or select a preferred coupon and click **Apply**.
         6. Verify the pre-filled address. Select any existing address or add a new one.
         7. Choose a delivery option if applicable and click **Continue**.
         8. In the **Payment Options** section, choose a preferred payment method. Enter the required details and complete the purchase.
        

    
### New customers

         Customers select the products on your website or app and proceed to Checkout.

         ![Magic Checkout Flow on Desktop: New customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-checkout-flow-desktop-new-user.gif.md)

         On the Checkout page, new customers:
         1. Enter their mobile number and click **Continue**.
         2. Verify the order in the **Order Summary** tab on the left.
         3. Click **Coupons and offers** to view available offers.
         4. Enter the coupon code or select a preferred coupon and click **Apply**.
         5. Enter the delivery address. 
         6. Select the **Save my address as** check box to save the address and select the address type. 
         7. Enter the OTP to securely save your address for future use and click **Continue**.
         8. In the **Payment Options** section, choose a preferred payment method. Enter the required details and complete the purchase.
