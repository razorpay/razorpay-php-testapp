---
title: Integration Steps | Razorpay Route WooCommerce Plugin
heading: Integration Steps
description: A step-by-step guide to integrate Razorpay Route using the Razorpay Payment Gateway Plugin with your WooCommerce-enabled WordPress website
---

# Integration Steps

Follow these steps to integrate Razorpay Route on your WooCommerce-enabled WordPress website:

  - **1. Build Integration**: Integrate Route Using WooCommerce plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow the integration steps based on how you want to transfer funds to the Linked Accounts using Razorpay Route:

    
### Transfers Via Orders or Payments

         Given below are the steps to transfers funds via orders or payments through the WooCommerce Payment Gateway plugin:
             
            
            
            1.1 Enable Route Module On Your WordPress Site
            

            To enable the Route Module:

            1. Log in to the **WordPress Admin Dashboard** and navigate to **WooCommerce** → **Settings**.
                ![](/docs/assets/images/woocommerce-route-settings.jpg)
            2. Go to **Payments** and click **Razorpay – Credit Card/Debit Card/NetBanking**.
                ![](/docs/assets/images/woocommerce-settings-payments.jpg)
            3. Select **Enable route module?** and click **Save changes**.
                ![](/docs/assets/images/woocommerce-route-enable.jpg)

            

            

            
            
### 1.2 Transfer via Orders or Payments (Automatic Transfers) On Your WordPress Site

            You can initiate a automatic transfer via orders or payments by providing the transfer details while creating a product. A transfer will be automatically initiated after the customer makes the payment.

            To provide the transfer details while creating a product:

            1. Log in to the **WordPress Admin Dashboard** and navigate to **Products** → **Add New**.
            2. Click **Razorpay Route** in the **Product data** section.
                ![](/docs/assets/images/woocommerce-route-transfers.jpg)
            3. Select any of the following options. You can transfer the funds to linked accounts from orders or payments.
                - **Transfer from Order**: This will initiate a transfer at the time of order creation.
                - **Transfer from Payment**: This will initiate a transfer after the customer makes the payment.
            4. Provide the **Linked Account Number** and the transfer **Amount**.
            5. Select your required option from the **Hold Settlement:** drop-down menu.
            6. You can add multiple transfer details by using the **Add Field** button.
                ![](/docs/assets/images/woocommerce-route-transfers-details.jpg)

            

            
### 1.3 Enable Webhooks on the Dashboard

            These 3 webhooks are auto-configured for the Route Module:

                - `transfer.processed`
                - `settlement.processed`
                - `transfer.failed`

            [Enable Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md#set-up-webhooks) to receive notifications for these events.
            

            
### 1.4 Create Manual Trasfers from Payments

            You can manually create a transfer after the customer makes the payment.

            To create a transfer manually from the received payment:

            1. Log in to the **WordPress Admin Dashboard** and navigate to **Razorpay Route woocommerce** → **Payments**.
            2. Click the required **Payment Id** to create a transfer.
                ![](/docs/assets/images/woocommerce-route-payment-transfer.jpg)
            3. Click **Create Transfer** and provide the following details:
                - **Transfer Amount**: Amount to be transferred. The transfer amount cannot be greater than the payment/order amount.
                - **Linked Account Number**: ID of the Linked Account to which the amount should be transfered.
                - **Settlement schedule**: Define the settlement schedule.
                ![](/docs/assets/images/woocommerce-route-manual-transfer.jpg)
            4. Click **Create** to create a transfer.
                ![](/docs/assets/images/woocommerce-route-payment-transfer-create.jpg)
                
                
> **INFO**
>
> 
>                 **Handy Tips**
>                 
>                 The transfer amount will be settled into the Linked Account depending on the defined schedule.
>                 

            

            

            
            
### 1.5 Schedule Settlements

            You can schedule a settlement of the initiated transfer from the WordPress Admin Dashboard.

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             - You can schedule a settlement only after the customer makes the payment and the transfer is initiated.
>             - You cannot schedule a settlement of a transfer with the **Settlement Status** as **Settled**.
>             

            To schedule a settlement:
            1. Log in to the **WordPress Admin Dashboard** and navigate to **Razorpay Route woocommerce**.
            2. Click the **Transfer Id** to schedule a settlement.
            3. Click **Change** under **Transfer Details**.
                ![](/docs/assets/images/woocommerce-route-settlement-change.jpg)
            4. Select either of the following **Settlement Schedule** options:
                - **Schedule settlement on**: Select this to schedule the transfer to a later date using the calendar.
                - **Put on hold**: Use this to defer the transfer until specified otherwise.
                - **Settle in next slot**: Use this to settle the payment in the next settlement slot.
                ![](/docs/assets/images/woocommerce-route-settlement-schedule.jpg)
            5. Click **Save**.

            

            
###  1.6 Verify Payment Status

                

                

                ##### Verify Payment Status from the WordPress Admin Dashboard

                To verify the payment status:

                1. Log in to the **WordPress Admin Dashboard** and navigate to **Razorpay Route woocommerce** → **Payments**.
                2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**. Know more about various [payment states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md#payment-life-cycle).
                    ![Check if the payment id is generated and the status is captured](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/woocommerce-route-payment-status.jpg.md)

            

            

        
    
    
### Direct Transfers

         Given below are the steps to directly transfer funds to Linked Accounts from a WooCommerce-based website using Razorpay Route.

             to get this feature activated on your Razorpay account.

            
            
            1.1 Enable Route Module On WordPress Site
            

            To enable Route Module:

            1. Log in to the **WordPress Admin Dashboard** and navigate to **WooCommerce** → **Settings**.
                ![](/docs/assets/images/woocommerce-route-settings.jpg)
            2. Go to **Payments** and click **Razorpay – Credit Card/Debit Card/NetBanking**.
                ![](/docs/assets/images/woocommerce-settings-payments.jpg)
            3. Enable the **Route Module** on the **Razorpay Payment Gateway** page and click **Save Changes**.
                ![](/docs/assets/images/woocommerce-route-enable.jpg)

            

            
### 1.2 Create a Direct Transfer on WordPress Site

            You can create a Direct Transfer from the WordPress Admin Dashboard. The transfer amount will be deducted from your account.

            To create Direct Transfers:

            1. Log in to the **WordPress Admin Dashboard** and click **Razorpay Route woocommerce**.
            2. Click **Create Direct Transfer**.
                ![](/docs/assets/images/woocommerce-route-direct-transfer.jpg)
            3. Enter the **Transfer Amount** and **Linked Account Number** to create a Transfer.
            4. Click **Create**.
                ![](/docs/assets/images/woocommerce-route-direct-transfer2.jpg)

            The transfer is successful. You can see the details in the **Transfers** tab.

            ![](/docs/assets/images/woocommerce-route-direct-transfer-details.jpg)

        

        
### 1.3 Enable Webhooks on Dashboard

         
         These 3 webhooks are auto-configured for the Route Module:
         - `transfer.processed`
         - `settlement.processed`
         - `transfer.failed`

         [Enable Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md#set-up-webhooks) to receive notifications for these events.
        

        
                
            

## 2. Test Integration

After completing the integration, you can simulate a test payment transfer. After the test is successful, you can start accepting real-time payments and transferring them to linked accounts.

![](/docs/assets/images/woocommerce-route-test-integration.jpg)

> **WARN**
>
> 
> **Watch Out!**
> 
> You can make test payments using one of the payment methods configured at the Checkout.
> - No money is deducted from the customer's account as this is a simulated transaction.
> - Ensure you have entered [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) in the Checkout code.
> 

    
### 2.1 UPI/Test Cards

         #### UPI IDs

         You can enter one of the following UPI IDs:
            - `success@razorpay`: To make the payment successful.
            - `failure@razorpay`: To fail the payment.

            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
>             

         #### Test Cards
         You can use one of the test cards to make transactions in the test mode. Use any valid expiration date in the future and any random CVV to create a successful payment.

         

Type | Card Network | Card Type | Card Number | CVV & Expiry Date
---
Domestic | Visa | Credit Card | 4718 6091 0820 4366 | Use a random CVV and any future date ^^^
---
International | Mastercard | Credit Card | 5104 0155 5555 5558 | 
---
International | Mastercard | Debit Card | 5104 0600 0000 0008 | 

        

    
### 2.2 View Test Transfer Details

         You can check the test transfer details on the **WordPress Admin Dashboard** after the transaction is successful.

         To check the test transfer:

         1. Log in to the **WordPress Admin Dashboard** and click **Razorpay Route woocommerce** from the left menu. The list of recent transfers is displayed.
         2. Click the recent **Transfer Id** to view the details.
                ![](/docs/assets/images/woocommerce-route-test-transfers.jpg)
        

## 3. Go-Live Checklist

You can perform an end-to-end simulation of funds flow in the Test Mode. Once you are confident that the integration is working as expected, switch to Live Mode to accept live payments and transfer them to Linked Accounts.

    
### 3.1 Create Linked Accounts

         You should create Linked Accounts in Live Mode to transfer live payments. Watch this video to create a Linked Account in Live Mode.
            
[Video: https://www.youtube.com/embed/aLLI9UwNMl0]

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             For Mutual Funds Distributors (MFDs), Linked Accounts with their Asset Management Company (AMC) details are automatically created after they get access to the Route. MFDs do not need to create any Linked Accounts from the Dashboard. Please get in touch with our [support team](https://razorpay.com/support/) for any help on creating Linked Accounts.
>             

            To create a Linked Account:
            

            

            You have successfully created Linked Accounts. 
        

    
### 3.2 Generate an API Key in Live Mode

         Watch this video to generate an API Key in Live Mode.

            
[Video: https://www.youtube.com/embed/30REpNtYSak]

            To generate an API Key in Live Mode:

            

            

            You have successfully generated your API keys in Live Mode. Use this pair of `Key_ID` and `Key_Secret` to accept payments from your customers and route them to the involved third parties using [Route](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route.md).
