---
title: Buy Now Button
description: Create a Buy Now Button, sell products and accept payments from customers.
---

# Buy Now Button

You can create a Buy Now button from the Dashboard and embed it on your website to accept payments from customers. This is useful in cases where you want to sell products on your online store.

**Example**

Suppose you are a pottery artist who sells hand-painted pottery articles to customers using your website. You can embed the Buy Now button on your online store to sell your products.

Assume you sell the following product on your online store:

Product Name | Number of Items Available | Number of Items purchasable per user | Price per Item (in ₹)
---
Handpainted Coffee Mugs Set | 25 | 1 | 500

You also offer gift wrapping for an additional cost of ₹30.

## Prerequisites
- [Set up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md#sign-up) your Razorpay account.
- Log in to the Dashboard.
- The Dashboard has [test and live modes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/test-live-modes.md). Payment Buttons created in the test mode do not appear in the live environment. **You must create a new Payment Button in live mode**.

## Create a Buy Now Button

Watch this video to see how to create a Buy Now button.

Below are the steps to create a Buy Pay button:
1. [Select a Template](#1-select-a-template)
2. [Add Button Details](#2-add-buy-now-button-details)

### 1. Select a Template

1.1 Log in to the Dashboard.

1.2. Go to the **PAYMENT PRODUCTS** section and click **Payment Button**.
     

1.3. Click **+ Create Payment Button**.

1.4. On the **Button Creation Wizard**, select the **Buy Now** button type.
     

1.5 Click **Use this template**.

### 2. Add Buy Now Button Details
Configure these sections to create the Buy Now button:

    
### 2.1 Button Details

         On the **Button Details** pop-up page, enter the relevant information:
            1. **Title**: Provide a name for the button. This name is for your internal reference and appears on the Dashboard. It **will not be visible** to customers. For example, **Handpainted Home and Kitchen Decor**.
            2. **Button Type**: If you want to change the button type, click the drop-down list and select one of the types. If the button type is switched mid-way, any information entered during creation will not be saved.
            3. **Button Label**: The text on the button to be displayed to customers. Please enter alphanumeric characters only. The maximum character limit is 20. An example for this is **Buy Now**.
            4. **Button Theme**: You can choose between the following themes:
                - Razorpay Dark
                - Razorpay Light
                - Razorpay Outline
                - Brand Color (This is the color configured by you on the Dashboard)
            5. Click **Next**.

            

            
            

            
        

    
### 2.2 Amount Details

        You must use the amount fields to list your products. There are two types of amount fields available: **Fixed Price** and **Item with Quantity**. For the Payment Button in the example, you must create two amount fields with the following configurations:

        
        Amount Field Name | Amount Field Type | Optional Item
        ---
        Handpainted Coffee Mugs Set | Item with Quantity | Yes
        ---
        Add Gift Wrap | Fixed Amount | Yes
        

        

        To create the **Hand-painted Coffee Mugs** amount field:
        1. Click **+Add Amount Field**.
            
        2. From the drop-down list, select **Item with Quantity** as the field type.
        3. On the pop-up page:
            1. Enter the label of the product as `Handpainted Coffee Mugs Set`.
            2. Click **+ Add Description** and enter details if required.
            3. Enter the amount as `500`.
                
            4. Click the more icon to view **Advanced Options**.
                1. Configure the Limit Quantity per Order, with `1` in **Min** and **Max** fields. This will prevent customers from ordering more than 1 item.
                2. Select **Item has Limited Stock** and enter the value as `25`.
                    
            5. Click **Save**.
        4. **Save** the field.

        

        

        

        

        Now, let us create the **Add Gift Wrap** amount field.
        1. Click **+Add Amount Field**.
        2. From the drop-down list, select **Fixed Amount** as the field type.
        3. On the pop-up page:
            1. Enter the label of the product as `Add Gift Wrap`.
            2. Click **+ Add Description** and enter details if required.
            3. Enter the amount as `30`.
            4. Click the arrow to view **Advanced Options** and disable **Item has Limited Stock**.
            5. Click **Save**.
        4. **Save** the field and click **Next**.

        

        

        
     

    
### 2.3 Customer Details

         In the **Customer Details** section, configure the information that must be entered by the customer while making the payment. By default, `Email` and `Phone` must be entered. However, you can edit the labels of these fields.

            

            
            

            

            #### Custom Fields

            You can add more fields to collect additional data from the customer. Let us add two custom fields - **Name** and **Address**.

            To add **Name** input field:
            1. Click **+ Add Input Field**. From the drop-down list that appears, select **Single Line Text**.
            2. On the pop-up page, enter the label for the custom field - `Name`.
            3. If required, add a description for the field.
            4. Click **Save**.

            Similarly, create the input field for **Address**.

            

            

            

            

            To proceed, click **Next**.

            The data entered by the customers will be available in the Transaction Details report.

        

    
### 2.4 Review and Create

         Review the details entered in the previous sections. You can click **Back** to navigate to the **Button Details**, **Amount Details** and **Customer Details** sections to make changes.

         1. Click **Create Button**.

             

             

             

             

         2. After completing the steps, the button code appears. Copy this code and add it in your webpage.

             

             

             

        

## Embed Payment Button Code in Website

The embed code generated on the Dashboard must be embedded in your website. After this is done, the Buy Now button appears on your website.

Customers can click this button to:
1. Open Razorpay Checkout.
2. Select the products.
3. Add their name and address.
4. Complete the payment.

You can embed this code on any webpage, be it a custom HTML site or one built on platforms such as WordPress, Wix or Google Sites.

    
### Example

         Let us embed the Buy Now button on an HTML page.

            1. Create a blank HTML file on your system.
            2. Paste the embed code onto the page.
            3. Save this HTML page and open it on the browser.

            Your button is now been embedded in your website.

            

            

            
        

## Make Test Payments Using the Payment Button

To make a test payment using a payment button:

1. Select the payment button you wish to test from the Dashboard and click **Get Code**.
2. Click **Copy Code** to copy the code to your clipboard.
    
3. Test the Payment Button by adding the code to the [Payment Button Test Widget](https://cdn.razorpay.com/static/widget/test-payment-button.html).
4. Paste the code in the text box and click **Run Code**.
5. Click on the Payment Button that appears in the preview section.
    
6. Enter the required details and click **PROCEED TO PAY**.
7. Select the payment method of your choice to proceed with the payment. 

    
        
            You can use these [test card details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#test-cards).
        
        
            You can use these [test UPI details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#test-upi-id).
        
        
            You can select any bank for your test payment. Select **Success** or **Failure**, depending on which flow you wish to test.
            
        
    
   
8. You should see a confirmation message depending on the flow you have selected.
    

### Customer Interaction

Let us make a test transaction to check how the customer will interact with the button on your website.

1. Click the **Buy Now** button.
2. Select the product you want to buy and mark quantity as `1` and click **Next**.
3. Enter name, address, email and phone number and click **Next**.
4. Select a payment method, for example, card, and complete the payment.
5. The payment success screen is displayed and a confirmation email is sent to you.

## Post Payment Actions

After the customer has successfully completed the payment, you can:

  
  
  

### Send Payment Receipt

You can ensure that your customers receive payment receipts via email once they complete the payment. Know how to [send and download automated or manual payment receipts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/receipt.md).

If you are an NGO, you can [send and download payment receipts with 80-G information](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/80g-receipt.md).

### Show Custom Message

You can show a custom message to your customers once they complete a payment. 

To show custom messages:

1. On the **Button Created Successfully** pop-up page, click **Configure** against **Redirect URL and Custom Message**.
2. On the pop-up page, enable **Show a custom message**.
3. Add the custom message in the field.
4. Click **Save**.

### Add a Redirect URL

You can redirect your customers to another page after they complete a payment. 

To redirect your customers: 

1. On the **Button Created Successfully** pop-up page, click **Configure** against **Redirect URL and Custom Message**.
2. On the pop-up page, enable **Redirect URL**.
3. Add the redirect URL in the field.
4. Click **Save**.

## View Transaction Details on Dashboard

You can view the payments as and when they are made in the [Transactions Details View](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/view-reports.md) of the page.

## Export Report

You can also export the report data into a CSV file.

To export report data:
1. Log in to the Dashboard and navigate to **Payment Button**.

2. Select the relevant Payment Button. The Transactions Details View appears.
3. Click **Export All (CSV)** button.

A .csv file is downloaded, where you can find a monthly report of all the payments made using your button.

## Settlement
You will receive the payments in your bank account as per the settlement cycle agreed upon at the time of Razorpay account setup. Usually, this is T+2 days. In case of international payments, the settlement cycle is T+7 days.

### Related Information
- [Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button.md)
- [How Payment Button Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/how-it-works.md)
- [Payment Button States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/states.md)
- [Quick Pay Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/quick-pay.md)
- [Donations Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/donations.md)
- [Custom Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/custom.md)
- [Manage Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/manage.md)
- [Prefill Amount Fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/manage/prefill-amount-fields.md)
- [Search for a Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/search.md)
- [View Reports](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/view-reports.md)
