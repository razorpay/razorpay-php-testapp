---
title: Razorpay Webstore | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay Webstore.
---

# Frequently Asked Questions (FAQs)

### 1. How can I add my business logo on the Webstore?

         To add your business logo:

         1. In the Dashboard, navigate to **Account & Settings**.
         2. Click **Branding** under **Checkout settings**, and click **Choose File** in the **Your Logo** section.
         3. Upload the logo file. Ensure that the logo is a square image of minimum dimensions 256x256 px. Maximum file size allowed is 1MB. Formats supported are JPG, JPEG and  PNG.
        

    
### 2. How can I make the Webstore elements reflect my brand colors?

         You can make the Webstore elements appear in your brand colours. To change the colours:

         1. In the Dashboard, navigate to **Account & Settings**.
         2. Click **Branding** under **Checkout settings** and enter the HEX code for your brand. For example, `#6822CC` in the **Theme Color** section.
         3. Click **Save Changes**.
        

    
### 3. How do I create a custom URL for my Webstore?

         You must create the Webstore in **Live Mode** in order to have a custom URL. You can only customise the suffix and not the entire URL. If your suffix is `livingarts`, the custom URL will appear as `https://pages.razorpay.com/livingarts`.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          - If another business that uses Razorpay Webstore has already created a custom URL with `livingarts` as the suffix, you will not be able to use `livingarts`. Your Webstore suffix must be unique as two Webstores cannot have the same suffix.
>          - You cannot create a custom URL in **Test Mode**. This feature is only available in **Live Mode**.
>          

         To create a custom URL for Webstore:
         1. In the Dashboard, navigate to menu ribbon, click the drop-down button and select **Live Mode**.
         2. While creating a Webstore, click **Page Settings** and in the pop-up that appears, enter the suffix to create a custom URL. Click **Save**.
         3. Click **Publish Page**.
        

    
### 4. How do I add a quantity for my products added on the Webstore?

         While adding a product to your Webstore, add your quantity in the **Quantity in stock** section.
        

    
### 6. What are the supported formats for the image added to a product?

         We support image uploads in the following formats: JPG, JPEG, PNG, and GIF.
        

    
### 7. How do I update the stock level of a price field (item) in my Webstore?

         You can update the stock in two ways.

         **From the List of Webstore**:
         1. Select the relevant Webstore. The items appear on the top of the page, on the right-hand side.
         2. Click **Update Stock** and enter the number of units available for sale in the field.
         3. Click **Update**.

         **Using the Webstore Edit Mode**:
         1. Select the relevant webstore and click the edit icon.
         2. In the **Products** section, go to the price field and click the edit icon.
         3. Enter the number of units available for sale in the field.
         4. Click **Add**.
        

    
### 8. What happens to my Webstore if all the listed products go out of stock?

         If all the items listed on your Webstore go out of stock, it will still remain active. However, all the products will show an **Out of Stock** label.
        

    
### 9. How do I track the payments made by customers? When will the amount be settled to my account?

         You can view the payments as and when they are made in the [Transactions Details View](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages/view-reports.md) of the Webstore.

         ![Transaction details view page for tracking payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-pages-v3-view_report.jpg.md)
        

    
### 10. What payment methods can customers use to make payments on the Webstore? Can I display additional payment methods?

         All the payment methods enabled for your account are displayed on the Webstore. The default payment methods available are:
         - Cards
         - Netbanking
         - UPI
         - Wallets (PayZapp)

         If you want to show more wallets or [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md) at Checkout, please raise a request with the [Razorpay Support team](https://razorpay.com/support/#request).
        

    
### 11. What is the maximum payment amount allowed per transaction on a Webstore?

         By default, a customer can make a maximum payment of ₹5,00,000. You can increase this limit by raising a request with [Razorpay Support](https://razorpay.com/support/#request).
        

    
### 12. Can I accept payments in international currency?

         You can accept payments in international currency using Webstore by following these steps:
         1. Follow [these steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/international-debit-credit-cards.md#application-process) to enable international payments for your account.
         2. While creating the Webstore, click the currency drop-down list in the **Price** field and select the required currency.

         
> **INFO**
>
> 
>          **One Currency per Webstore**
> 
>          You can set only one currency for the Price fields on a Webstore. If you attempt to configure the second price field with a different currency, a message appears on the screen displaying that more than one currency cannot be applied.
> 
>          

        

    
### 13. How many products can I add to a Webstore?

         The maximum number of products that you can add to a Webstore is **100**.
        

    
### 14. I am getting a message that my domain was not connected. What should I do?

         Sometimes it can take up to an hour for the changes to save. Do not undo the changes you have made to your domain and try again after an hour. Raise a ticket with our [support team](https://razorpay.com/support/) if you can still not connect your domain.
        

    
### 15. I am getting an error message - Failed to create link with given slug, please try a different value. What should I do in this case?

         This error message occurs when the custom URL provided by you already exists. Please use a different URL slug.
        

    
### 16. Can I create multiple URLs for a Webstore?

         No, you cannot create multiple URLs for a Webstore. ​A Webstore allows you to collect multiple payments on the same link.
