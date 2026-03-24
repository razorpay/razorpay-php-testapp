---
title: Payment Pages | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay Payment Pages.
---

# Frequently Asked Questions (FAQs)

### 1. How can I add my business logo on the page?

         To add your business logo on the page:

         1. In the Dashboard, navigate to **Account & Settings**.
         2. Click **Branding** under **Checkout settings**, and click **Choose File** in the **Your Logo** section.
         3. Upload the logo file. Ensure that the logo is a square image of minimum dimensions 256x256 px. Maximum file size allowed is 1MB. Formats supported are JPG, JPEG and  PNG.
        

    
### 2. How can I make the Payment Page elements reflect my brand colors?

         You can make the Payment Page elements such as Pay button, side bar and title underline appear in your brand colours. To change the colors of the Payment Page:

         1. In the Dashboard, navigate to **Account & Settings**.
         2. Click **Branding** under **Checkout settings** and enter the HEX code for your brand. For example, `#6822CC` in the **Theme Color** section.
         3. Click **Save Changes**.
        

    
### 3. How do I create a custom URL for my Payment Page?

         You must create the Payment Page in **Live Mode** in order to obtain a custom URL. You can only customise the suffix and not the entire URL. If your suffix is `livingarts`, the custom URL will appear as `https://pages.razorpay.com/livingarts`.

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          If another business that uses Razorpay Payment Pages has already created a custom URL with `livingarts` as the suffix, you will not be able to use `livingarts`. Your Payment Page suffix must be unique as two Payment Pages cannot have the same suffix.
>          

         To create a custom URL for Payment Page:
         1. In the Dashboard, navigate to menu ribbon, click the drop-down button and select **Live Mode**.
         2. Create a **Payment Page** and fill in the Business Details section and set up the Payment Details section.
         3. Click **Save and Publish Page**.
         4. Click **Page Settings** and in the pop-up that appears, enter the suffix to create a custom URL for the page. Click **Save and Publish**.
        

    
### 4. How do I add a quantity counter for the price field created on the Payment Page?

         While creating the price field, ensure that you select the `Item with Quantity` as the type. This adds the quantity counter, which the customer can use to add or reduce quantity. If you have already created the price field without this option, you must delete and recreate with `Item has quantity` type selected.
        

    
### 5. I want to create a price field wherein customers can enter an amount of their choice. How do I do this?

         While creating the price field, make sure that you select `Customers Decide Amount` type. Once the page is published, in the customer view, the field appears with a blank space where the customer can enter the amount.
        

    
### 6. What are the size requirements and supported formats for the image added to a price field?

         We support images with dimensions 40x40. Formats supported are JPG, JPEG, PNG and GIF.

         
> **INFO**
>
> 
>          **Handy Tip**
> 
>          GIFs with animations are converted and displayed as non-animated GIFs in the price field images.
>          

        

    
### 7. How do I update the stock level of a price field (item) in my Payment Page?

         You can update the stock in two ways.

         **From the List of Payment Pages**:
         1. Navigate to the list of **Payment Pages** and click on the relevant page. The items appear on the top of the page, on the right-hand side.
         2. Click **Update Stock** and enter the number of units available for sale in the field.
         3. Click **Update**.

         **Using the Payment Page Edit Mode**:
         1. Navigate to the list of **Payment Pages** and click on the relevant page. Click the edit icon.
         2. In the **Payment Details** section, go to the price field and click the edit icon.
         3. Enter the number of units available for sale in the field.
         4. Click **Add**.
        

    
### 8. What happens to my Payment Page if all the listed price fields (items) go out of stock?

         If all the items listed on your Payment Page go out of stock:
         - If the **Price** field is **mandatory**, when the items goes out-of-stock, the Payment Page becomes inactive. The customers will not be able to access this page to make payments.
         - If the **Optional** price fields go out-of-stock and  there are other **Mandatory** Price fields which still have stock available, the Payment Page will remain in active state.
        

    
### 9. Can I have two Price fields with different currencies appear on a single Payment Page?

         No. You cannot configure Price fields to have different currencies. When you attempt to configure the second price field with a different currency, a message appears on the screen displaying that only one currency can be applied.
        

    
### 10. How to get the hyperlink button on my website?

         You can get the hyperlink button on your website to collect payments from your customers.

         To get the hyperlink button on your website:
         1. Go to **Dashboard** → **Payment Pages** and in the list of Payment Pages, click on the Payment Page name.
         2. The page opens in edit mode. Click **Page Settings**.
         3. Click **Create** against the get hyperlink button. In the pop-up that appears, customise the button text and select the button size.
         4. Copy the HTML code to embed on your website and click **Done**.
         5. In your website code, paste this code on the page where you want the payment button to appear.
        

    
### 11. How do I track the payments made by customers? When will the amount be settled to my account?

         You can view the payments as and when they are made in the [Transactions Details View](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-pages/view-reports.md) of the page.

         ![Payment Page - View Report](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-pages-v3-view_report.jpg.md)
         
        

    
### 12. What payment methods can customers use to make payments on the page? Can I display additional payment methods?

         All the payment methods enabled for your account are displayed on the Payment Page. The default payment methods available are:
         - Cards
         - Netbanking
         - UPI
         - Wallet (PayZapp)

         If you want to show more wallets or [payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods.md) at Checkout, please raise a request with the [Razorpay Support team](https://razorpay.com/support/#request).
        

    
### 13. What is the maximum payment amount allowed per transaction on a Payment Page?

         By default, a customer can make a maximum payment of ₹5,00,000. You can increase this limit by raising a request with our [Support team](https://razorpay.com/support/).
        

    
### 14. Can I accept payments in international currency?

         You can accept payments in international currency using Payment Pages by following these steps:
         1. Follow [these steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments.md) to enable international payments for your account.
         2. While creating the Payment Page, click the currency drop-down list in the **Price** field and select the required currency.

         
> **INFO**
>
> 
>          **One Currency per Payment Page**
> 
>          You can set only one currency for the Price fields on a Payment Page. If you attempt to configure the second price field with a different currency, a message appears on the screen displaying that more than one currency cannot be applied.
> 
>          

        

    
### 15. Facebook Analytics tool is being withdrawn by 30 June 2021. Will this affect my existing Facebook Pixel integration with Payment Pages?

         Although the Facebook Analytics tool is being withdrawn, this will have no impact on your Facebook Pixel integration with Payment Pages. You can find more information about this [here](https://www.facebook.com/business/help/966883707418907?content_id=XxWPmeIfQg9ns0j).
        

    
### 16. How many fields can I add to a Payment Page?

         The maximum number of fields that you can add to a Payment Page is **25**.
        

    
### 17. I am getting a message that my domain was not connected. What should I do?

         Sometimes it can take up to an hour for the changes to save. Do not undo the changes you have made to your domain and try again after an hour. Raise a ticket with our [Support team](https://razorpay.com/support/) if you can still not connect your domain.
        

    
### 18. I am getting an error message Failed to create link with given slug, please try a different value. What should I do in this case?

         This error message occurs when the custom URL provided by you already exists. Please use a different URL slug.
        

    
### 19. How can I strike-through a text on Razorpay Payment Page description?

         Razorpay does not support the feature to strikethrough a text on the Payment Page description section.
        

    
### 20. Can I create multiple URLs for a Payment Page?

         No, you cannot create multiple URLs for a Payment Page. ​A Payment Page allows you to collect multiple payments on the same link.
        

    
### 21. How is the Total Revenue calculated on the Dashboard?

         The Total Revenue amount is the sum of captured and refunded payments.
        

 if you can still not connect your domain.
        
    
    
### 15. I am getting an error message Failed to create link with given slug, please try a different value. What should I do in this case?

         This error message occurs when the custom URL provided by you already exists. Please use a different URL slug.
        

    
### 16. How can I strike-through a text on Razorpay Payment Page description?

         Razorpay does not support the feature to strikethrough a text on the Payment Page description section.
        

    
### 17. Can I create multiple URLs for a Payment Page?

         No, you cannot create multiple URLs for a Payment Page. ​A Payment Page allows you to collect multiple payments on the same link.
        

    
### 18. How is the Total Revenue calculated on the Dashboard?

         The Total Revenue amount is the sum of captured and refunded payments.
