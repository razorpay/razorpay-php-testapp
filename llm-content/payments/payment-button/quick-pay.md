---
title: Quick Pay Button
description: Create a Quick Pay Button and accept a fixed amount as payment.
---

# Quick Pay Button

You can create a Quick Pay Button using the Dashboard and embed it on your website to accept payments from customers. This is useful in cases where you want to accept a fixed amount as payment.

**Example**

Suppose you are a digital marketing expert who wants to conduct a paid 2-hours online session. You can embed the Quick Pay button on your blog site to charge for the session. Assume you will be charging ₹499 per attendee.

## Prerequisites
- [Set up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md#sign-up) your Razorpay account.
- Log in to the Dashboard.
- The Dashboard has [test and live modes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/test-live-modes.md). Payment Buttons created in the test mode do not appear in the live environment. **You must create a new Payment Button in live mode**.

## Create a Quick Pay Button

Watch this video to see how to create a Quick Pay button.

[Video: https://www.youtube.com/embed/jL53W3mb3D8?si=jj7XMGid-HU4fy7y]

Below are the steps to create a Quick Pay button:

1. [Select a Template](#1-select-a-template)
2. [Add Button Details](#2-add-quick-pay-button-details)

### 1. Select a Template

1.1 Log in to the Dashboard.

1.2 Go to the **PAYMENT PRODUCTS** section and click **Payment Button**.
    ![Dashboard - Payment Buttons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-payment-button-dashboard.jpg.md)

1.3 Click **+ Create Payment Button**.

1.4 On the **Button Creation Wizard**, select the **Quick Pay** button.
    ![Payment Button types](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-quick-pay-quick-pay-1.jpg.md)

1.5 Click **Use this template**.

### 2. Add Quick Pay Button Details

Configure these sections to create the Payment Button:

    
### 2.1 Button Details

         On the **Button Details** pop-up page, enter the relevant information:
            1. **Title**: Provide a name for the button. This name is for your internal reference and appears on the Dashboard. It **will not be visible** to your customers. For example, **Digital Marketing for Generation Z**.
            2. **Button Type**: If you want to change the button type, click the drop-down list and select one of the types. If the button type is switched mid-way, any information entered during creation will not be saved.
            3. **Amount**: Enter the amount to be paid by the customer.
            4. **Button Label**: The text on the button to be displayed to customers. Please enter alphanumeric characters only. The maximum character limit is 20. For example, your button label can be **Book My Seat**.
            5. **Button Theme**: You can choose between the following themes:
                - Razorpay Dark
                - Razorpay Light
                - Razorpay Outline
                - Brand Color (This is the color configured by you on the Dashboard)
            6. Click **Next**.

            
            ![Payment Button Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-quick-pay-button-details.jpg.md)
            

            
        

    
### 2.2 Customer Details

         In the **Customer Details** section, configure the information that must be entered by the attendee while making the payment. By default, `Email` and `Phone` must be entered. However, you can edit the labels of these fields.

            
            ![Payment Button - Customer Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-quick-pay-customer-details-1.jpg.md)
            

            #### Custom Fields

            If you want to collect more details from the customer, you can add custom fields.

            To add custom fields:

            1. Click **+ Add Another Input Field**. From the drop-down list that appears, select the relevant field type. For example, if you want the customer to enter their name, select **Single Line Text**.
            2. On the pop-up page:
                1. Enter the label for the custom field.  For example, `Name`.
                2. If required, add a description for the field.
                3. Select **Optional Item**.
                    ![Customer Details - Field Type](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-quick-pay-customer-details-2.jpg.md)
                4. Click **Save**.
            3. To proceed, click **Save**, and then **Next**.

            
            ![Customer Details entered](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-quick-pay-customer-details-3.jpg.md)
           

            The data entered by the customers will be available in the Transaction Details report.
        

    
### 2.3 Review and Create

         
         1. Review the details entered in the previous sections. You can click **Back** to navigate to the **Button Details** and **Customer Details** section to make changes.

         2. Click **Create Button**.

             

             ![Payment Button - Review and Create](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-quick-pay-review.jpg.md)

              
         
         3. After completing the steps, the button code appears. Copy this code and add it in your webpage.

             
             ![Payment Button created successfully](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-pb-success.jpg.md)
             

             
        

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

            
            ![Embed Payment Button Code GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-button-embed-min.gif.md)
            
        

## Make Test Payments Using the Payment Button

To make a test payment using a payment button:

1. Select the payment button you wish to test from the Dashboard and click **Get Code**.
2. Click **Copy Code** to copy the code to your clipboard.
    ![Payment Button Code Selection](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pb-button-code-select.jpg.md)
3. Test the Payment Button by adding the code to the [Payment Button Test Widget](https://cdn.razorpay.com/static/widget/test-payment-button.html).
4. Paste the code in the text box and click **Run Code**.
5. Click on the Payment Button that appears in the preview section.
    ![Payment Button Test Preview](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pb-run-test-preview.jpg.md)
6. Enter the required details and click **PROCEED TO PAY**.
7. Select the payment method of your choice to proceed with the payment. 
    
        
            You can use these [test card details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#test-cards).
        
        
            You can use these [test UPI details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#test-upi-id).
        
        
            You can select any bank for your test payment. Select **Success** or **Failure**, depending on which flow you wish to test.
            ![Test Payment Success or Failure Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pl-test-payment-success.jpg.md)
        
    

8. You should see a confirmation message depending on the flow you have selected.
    ![Payment Success](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pb-payment-success.jpg.md)

### Customer Interaction

Let us make a test transaction to check how you as a visitor can interact with the button on your blog.

1. Click the **Pay Now** button.
2. Enter name and phone number and fill in the details in the other fields and click **Next**.
3. Select a payment method. For example, netbanking, and complete the payment.
4. The payment success page is displayed and you receive a confirmation email.

![](/docs/assets/images/payment-button-customerpayment.gif)

## Post Payment Actions

After the customer has successfully completed the payment, you can:

  
  
  

### Send Payment Receipt

@include payment-button/configure

### Show Custom Message

@include payment-button/custom-message

### Add a Redirect URL

@include payment-button/redirect-url

## View Transaction Details on Dashboard

You can view the payments as and when they are made in the [Transactions Details View](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/view-reports.md) of the page.

![](/docs/assets/images/payment-button-buy-now-transaction-detail.jpg)

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
- [Buy Now Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/buy-now.md)
- [Donations Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/donations.md)
- [Custom Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/custom.md)
- [Manage Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/manage.md)
- [Search for a Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/search.md)
- [View Reports](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/view-reports.md)
