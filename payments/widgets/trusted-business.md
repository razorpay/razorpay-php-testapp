---
title: Razorpay Trusted Business Widget
heading: About Razorpay Trusted Business Widget
description: Enhance your business credibility with the Razorpay Trusted Business Widget. Boost customer confidence about your business's legitimacy and minimise drop-offs.
---

# About Razorpay Trusted Business Widget

Razorpay Trusted Business (RTB) Widget offers a simple solution to enhance trust and reduce drop-offs. You can seamlessly embed the widget on your website with two integration steps.

This widget provides information about your business's legitimacy and product/service quality. It dynamically adjusts its content to match the purchase journey, product, business category, and individual customers, effectively reducing doubt and minimising drop-offs.

    
### Use Cases

         The Razorpay Trusted Business widget enhances sales and conversions by boosting authenticity, credibility, and transaction safety, reducing cart abandonment and hesitation. It provides transparent refund policies for a trustworthy customer experience for: 

         - Ecommerce Business
         - Educational Industry
         - Banking, Financial Services and Insurance Industry
         - Travel Industry
         - Startup
         - Micro Business and Freelancers
         - NGO
        

## How it Works 

The following diagram depicts the customer journey after integrating the Razorpay Trusted Business widget on your website:

## Prerequisites

- Create a [Razorpay account](https://dashboard.razorpay.com/signup).
- Generate the API Keys on the Dashboard. You can use the  [Test Mode keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) to test the integration and preview the Widget. Later, switch to **Live Mode** on the Dashboard, generate the [Live API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) and replace it with the test keys.
- Check if you are [eligible](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/features/trusted-business.md#eligibility-requirements) for Razorpay Trusted Business on the Dashboard. 
    
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     - The widget appears on your website only if you are eligible for RTB.
>     - It renders only on domains you have whitelisted. Hence, ensure that the domains you wish to display the widget on are whitelisted with Razorpay.
>         - Domain Whitelisting happens during the onboarding process. If not, you can raise a request with our [Support team](https://razorpay.com/support/#request).
>     

- Currently, the RTB widget is supported on Web and [shopify](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/widgets/trusted-business/rtb-widget-shopify.md).

    
### Where to place the Widget on your website?

         We recommend the following locations on your website to display the widget for better conversions: 

         
         Business Category | Location
         ---
         Ecommerce Business | In the product details page near the: - Product image
- Ratings
- Offers
- Buy Now or Add to Cart button
 
         ---
        Educational Industry | In the payment links near the: - Business name
- Product amount

         ---
         Banking, Financial Services and Insurance Industry | In the repayment, investment, premium payment links and onboarding links near the: -  Business name
- Product amount

         ---
         Travel Industry | -  In the landing page near the business name.
- The checkout page near the product amount or booking details.

         ---
         Startup, Micro Business and Freelancers | In the pricing page and landing pages near the: - Business name
- Product amount

         ---
         NGO | In the checkout page and landing page near the: -  Business name
- Product amount

         
        

## Integration Steps 

Follow these steps to integrate the RTB widget on your website:

    
### Step 1: Embed JS File in Website

         Use the following code to embed the JavaScript file into your website in the head section: 

            ```js: Embed JS
            
            
            ```
        

    
### Step 2: Add Widget on Website

         Create a custom Razorpay Trusted Business widget HTML element based on where you want to place the widget and link the following code to your HTML file. Replace the key with your Test Key generated from the Dashboard.

            ```js: Add Widget
            
            ```

            `key` _mandatory_
            : `string` API Key id generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys). For example, `rzp_test_XXXX00000XXXX`.
        
  

## Customise Widget

    
### Use the following code to customise the widget:

         ```java: Customise
            
            ```

            `key` _mandatory_
            : `string` API Key id generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys). For example, `rzp_test_XXXX00000XXXX`.

            `dark-mode` _optional_
            : `boolean` Enable or disable dark mode for the widget. Possible values:
                - `true`: Enable dark mode.
                - `false` (default): Disable dark mode.

            `hide_attributes` _optional_
            : `comma separated string` Hide any information you do not want to display on the widget and RTB website. Possible values: 

                - `age`: Indicates your brand's historical presence and experience.
                - `transaction_history`: Your past transaction records and history.
                - `ratings_review`: User-generated ratings and reviews of your business and product.
                - `return_policy`: Your policy regarding product returns.
                - `user_testimonials`: Testimonials and endorsements from previous customers.
                - `purchase_protection`: Purchase protection-related details.
                - `serviceability_details`: Product/service availability and shipping-related details.
                - `social_media_details`: Your presence and activity on social media platforms.
                - `customer_support_details`: Contact and support information for customers.

            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             - By default, all the necessary information is displayed on the widget and RTB website.
>             - Attributes provide valuable information to customers about your business. The algorithm determines the most effective attributes and what information should appear on the widget and RTB website to enhance conversions.
>             

        

## Test Widget

You can now preview and test the widget on the page you integrated it. 

    
### Follow the checklist to test the integration:

         - **Widget Rendering**: Confirm that the RTB widget renders properly on the decided location of the desired page.
         - **Widget Interaction**: Interact with the widget to verify that users can click the widget to access additional information on the RTB website.
         - **Responsive Design**: Resize the browser window or access the page on different devices to test the widget's responsiveness.
         - **Widget Loading**: Ensure the widget loads quickly and smoothly without causing any delays or disruptions on the page it is integrated.
        

 

## Go Live With Widget

After you preview and test the widget on your Dashboard, switch to the live mode to generate live API keys. Replace the test keys with these live keys to take the integration live. Know more about [live API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys).

Your customers can view the widget on your website. Once they click the widget, it redirects them them to the RTB website to access more information. 

- Here is a glimpse of the default widget:
    
        
### On Web

            
            

        
### On Mobile

            
            

    

- Here is a glimpse of the RTB website:

    
        
### On Web

            
            

        
### On Mobile
