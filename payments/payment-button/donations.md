---
title: Donations Button
description: Create a Donation Button and accept donations.
---

# Donations Button

You can create a Donations Button using the Dashboard and embed it on your website to accept donations from donors. This is useful if you are an NGO or a business that wants to raise funds for a cause.

**Example**

Suppose you work for an NGO - Asha Foundation, and are in charge of a campaign to raise funds for flood victims. You can embed the Donations button on your website to raise funds.

Assume you want to raise funds to deliver relief materials as shown below:

Relief Material Package | Amount
---
Dry Rations | ₹750
---
Sanitation kit | ₹2500
---
Donate any Amount | Minimum amount of ₹500

## Prerequisites
- [Set up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md#sign-up) your Razorpay account.
- Log in to the Dashboard.
- The Dashboard has [test and live modes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/test-live-modes.md). Payment Buttons created in the test mode do not appear in the live environment. **You must create a new Payment Button in live mode**.

## Create a Donations Button

Watch this video to see how to create a Donations button.

Below are the steps to create a Donation Button:
1. [Select a Template](#1-select-a-template)
2. [Add Button Details](#2-add-button-details)

### 1. Select a Template

1.1 Log in to the Dashboard.

1.2 Go to the **PAYMENT PRODUCTS** section and click **Payment Button**.
    

1.3 Click **+ Create Payment Button**.

1.4 On the **Button Creation Wizard**, select the **Donations** button type.
    

1.5 Click **Use this template**.

## 2. Add Button Details

Configure these sections to create the Payment Button:

    
### 2.1 Button Details

         

            On the **Button Details** pop-up page, enter the relevant information:
            1. **Title**: Provide a name for the button. This name is for your internal reference and appears on the Dashboard. It **will not be visible** to donors. For example, **Assam Floods**.
            2. **Button Type**: If you want to change the button type, click the drop-down list and select one of the types. If the button type is switched mid-way, any information entered during creation will not be saved.
            3. **Button Label**: The text on the button to be displayed to customers. Please enter alphanumeric characters only. The maximum character limit is 20. An example for this is **Donate Now**.
            4. **Button Theme** - You can choose between the following themes:
                - Razorpay Dark
                - Razorpay Light
                - Razorpay Outline
                - Brand Color (This is the color configured by you on the Dashboard)
            5. Click **Next**.
         
         

            

            

            

            

            

            
        

    
### 2.2 Donation Amount

        

        Donors can pay an amount of their choice or pay an amount that you suggested. For example, you can collect funds for a specific relief material package or ask to pay any amount.

        1. Create the **Donate any Amount** field.
            1. Edit the **Donate an Amount of your Choice** field label to **Donate any Amount**.
            2. Click **+ Add Description** and enter details if required.
            3. Select the donation currency.
            4. Click **+ Add min and max amount limits** and enter the `500` as the minimum donation amount.
        2. Create the **Dry Rations** and **Sanitation Kits** fields:
            1. Enable **Show presets for donation amount**.
            2. Enter the label as `Dry Rations` and the amount as `750`.
            3. Similarly, in the next field, enter the label - `Sanitation Kits` and the amount - `2500`.
        3. Click **Next**.
        

        

        

        

        

        
        

    
### 2.3 Customer Details

         In the **Customer Details** section, configure the information that must be entered by the donor while making the payment. By default, `email` and `contact` must be entered by donor. However, you can edit the labels of these fields.

            

            

            

            

            #### Custom Fields

            

            You can add more fields to collect additional data from the donor such as Name and PAN.

            To add custom fields:
            1. Click **+ Add Another Input Field**. From the drop-down list, select the relevant field type. For example, if you want donors to enter their PAN, select **PAN Number**.
            2. On the pop-up page, enter the label for the custom field.  For example, `Enter Your PAN`.
            3. If required, add a description for the field and select **This field is optional**.
            4. Click **Save**.
            5. To proceed, click **Next**.

            The data entered by the donors will be available in the Transaction Details report.

            

            

            

        

    
### 2.4 Review and Create

         1. Review the details entered in the previous sections. You can click **Back** to navigate to the **Button Details**, **Donation Details** and **Customer Details** sections to make changes.

         2. Click **Create Button**.

             

             

             

         3. After completing the steps, the button code appears. Copy this code and add it in your webpage.

             

             

             
        

## Embed Payment Button Code in Website

The embed code generated on the Dashboard must be embedded in your website. After this is done, the **Donations** button appears on your website.

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

            Your button is now been embedded to your website.
            

            

            
        

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
    

## Donor Interaction

Let us make a test transaction to check how the donor will interact with the button on your website.

1. Click the **Donate Now** button.
2. Enter name and phone number and fill in the details in the other fields and click **Next**.
3. Select a payment method, for example, card, and complete the payment.
4. The payment success page is displayed and you receive a confirmation email.

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

You can also export the report data into a CSV file. To export report data:
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
- [Buy Now Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/buy-now.md)
- [Custom Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/custom.md)
- [Manage Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/manage.md)
- [Prefill Amount Fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/manage/prefill-amount-fields.md)
- [Search for a Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/search.md)
- [View Reports](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/view-reports.md)
