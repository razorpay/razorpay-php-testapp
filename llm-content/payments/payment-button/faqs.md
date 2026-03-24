---
title: Payment Button | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay Payment Button.
---

# Frequently Asked Questions (FAQs)

## Supported Platforms

    
### 1. Can I embed the Payment Button on my website even if it is built on a platform such as Wix or Blogger?

         Yes, you can embed Razorpay Payment Button on custom-built websites as well as those built on popular platforms such as Weebly, Wix, Blogger, Google Sites and so on.
        

    
### 2. Can I embed the Payment Button on my mobile app?

         You will be able to embed the button on mobile apps, provided:
         - The app-development platform supports JS.
         - The app is able to make the Button open in a WebView.
        

## Customise Button

    
### 1. How can I add my business logo on the Checkout modal that appears once the button is clicked?

         To make your your business logo appear on the Checkout modal:
         1. In the ** Dashboard**, navigate to **Account & Settings**.
         2. Under **Account & Settings**, in the **Your Logo** section, click **Choose File**.
         3. Upload the logo file. Ensure that the logo is a square image of minimum dimensions 256x256 px. Maximum file size allowed is 1MB.
        

    
### 2. How can I make the Payment Button and Checkout elements reflect my brand colors?

         You can make the Payment Button and Checkout elements appear in your brand colours. To do this:
         1. In the ** Dashboard**, navigate to **Account & Settings**.
         2. Under **Account & Settings**, in the **Theme Color** section, enter the HEX code for your brand. For example, `#6822CC`.
         3. Click **Save Changes**.

         Once this is done, during button creation ensure that in the **Button Details** section, you select **Brand Color** in **Button Theme** field.
        

## Amount Field Configuration

    
### 1. I want to add a quantity counter for the amount field created on the Payment Button. How do I add it?

         While creating the amount field, ensure that you select `Item with Quantity` as the type. This adds the quantity counter, which the customer can use to add or reduce quantity. If you have already created the amount field without this option, you must delete the field and recreate it with `Item has quantity` type selected.
        

    
### 2. I want to create an amount field wherein customers can enter an amount of their choice. How do I do this?

         While creating the amount field, select the `Customers Decide Amount` type. Once the button is published, in the customer view, the field appears with a blank space where the customer can enter the amount.
        

    
### 3. One of the amount fields (items) is out of stock. How do I update the stock level?

         You can update the stock in two ways:

         **List of Payment Button:**  

         1. Log in to your Dashboard, navigate to **Payment Button** and click the relevant Id. The items appear on the top of the page, on the right.
         1. Click **Update Stock** and enter the number of units available for sale in the field.
         1. Click **Update**.

         **Payment Button Edit Mode:**

         1. Log in to your Dashboard, navigate to **Payment Button** and click the relevant Id.
         2. Click the edit icon.
         3. In the **Amount Details** section, go to the amount field and click the edit icon.
         4. Enter the number of units available for sale in the field.
         5. Click **Add**.
        

    
### 4. What happens to my Payment Button if all the listed price fields (items) go out of stock?

         This depends on the amount field's configuration. If the amount field is **mandatory**, then when it goes out-of-stock, the Payment Button will become inactive. Customers would not be able to access this button to make payments.

         As long as there is at least one amount field (mandatory or optional) that has stock, the button remains active.
        

    
### 5. Can I have two amount fields with different currencies appear in a single Payment Button?

         No, you cannot configure amount fields to have different currencies. When you attempt to configure the second amount field with a different currency, a message appears on the screen highlighting that only one currency can be applied.
        

## Embed Code

    
### 1. How to embed the payment button on my website?

         You can embed the payment button on your website to collect payments from your customers.

         To do this:
         1. Go to ** Dashboard** → **Payment Button**.
         2. In the list that appears, navigate to the relevant button and copy the button code.
         3. In your website code, paste this code on the page where you want the payment button to appear.
        

## Payments and Payment Methods

    
### 1. How do I track the payments made by customers? When will the amount be settled to my account?

         You can view the payments as and when they are made in the [Transactions Details View](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-button/view-reports.md) of the Payment Button.

         You will receive the payments in your bank account as per the settlement cycle. By default, this is T+2 for domestic payments and T+7 for international payments.
        

    
### 2. What payment methods can customers use to make payments? Can I display additional payment methods?

         All the payment methods enabled for your account are displayed on the Checkout. The default payment methods available are:

         - Cards
         - Netbanking
         - UPI
         - Wallet (PayZapp)

         Raise a request on the Dashboard to display more [payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/payment-methods/#request-for-payment-methods-and-support.md) on Checkout.
        

    
### 3. What is the maximum payment amount allowed per transaction on a Payment Button?

         cBy default, a customer can make a maximum payment of ₹5,00,000. This can be raised by raising a request with [Razorpay Support](https://razorpay.com/support/#request).
        

    
### 4. Can I accept payments in international currency?

         You can accept payments in international currency using Payment Button. Refer to the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). Follow these steps:
         1. Raise a request with [Razorpay Support](https://razorpay.com/support/#request) to enable international payments for your account.
         2. While creating the Payment Button, click the currency drop-down in the amount field and select the required currency.

         
> **INFO**
>
> 
>          **One Currency per Button**
> 
>          You can set only one currency for amount fields on a Payment Button. If you attempt to configure the second amount field with a different currency, a message appears on the screen highlighting that more than one currency cannot be applied.
>          

        

    
### 5. Can I create Payment Button for bulk products?

         No, Razorpay does not support creating a Payment Button for bulk products.
        

## Adding Redirects

    
### 1. Can I get this Payment Button to redirect to a different page?

         You can redirect your customers to another page after they complete a payment. 

         To redirect your customers: 

         1. On the **Button Created Successfully** pop-up page, click **Configure** against **Redirect URL and Custom Message**.
         2. On the pop-up page, enable **Redirect URL**.
         3. Add the redirect URL in the field.
         4. Click **Save**.
