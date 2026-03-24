---
title: Payment Gateway | Easy Digital Downloads - Integration Steps
heading: Integration Steps
description: Steps to integrate your Easy Digital Downloads website with Razorpay Payment Gateway.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your Easy Digital Downloads website.

  - **1. Build Integration**: Install and configure the Easy Digital Downloads plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/lsvPOgbHiV8]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Installation and Configuration

         1. Download and install the latest version of the Easy Digital Downloads extension from the [WordPress plugin page](https://wordpress.org/plugins/easy-digital-downloads/).
         2. Download the latest [razorpay-edd zip file](https://github.com/razorpay/razorpay-edd/releases) from the Releases section in GitHub.
         3. Unzip and upload the extension contents to your `/wp-content/plugins/` directory.
         4. Activate the extension via the WordPress **Plugins** menu.
             
             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              If you have downloaded the extension from GitHub or elsewhere, ensure that the directory is named `edd-razorpay`.
>              

             
         5. Log in to your [WordPress account](https://wordpress.com/log-in) and activate the extension in the **WordPress Plugin Manager**.
         6. Log in to your [Easy Digital Downloads account](https://easydigitaldownloads.com).
         7. Navigate to the **Settings** page and click the **Checkout/Payment Gateways** tab.
         8. Click **Razorpay** to edit the settings.
         9. Enable the Payment Method and name it Credit Card/Debit Card/Internet Banking (this will show up on the payment page your customer sees).
         10. Enter your `[KEY_ID]` and `[KEY_SECRET]`. Generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Razorpay Dashboard.
         11. Click **Save** to save the changes.
        

## 2. Test Integration

After the integration, a **Pay** button will appear on your web page/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual customer payments once the test is successful.
![](/docs/assets/images/easy-digital-pay.jpg)

You can make test payments using one of the payment methods configured at the Checkout.
- No money is deducted from the customer's account as this is a simulated transaction.
- Ensure you have entered the API keys generated in the test mode in the Checkout code.

    
### Supported Payment Methods

         @include integration-steps/next-steps
        

    
### Verify Payment Status

        You can track the payment status from the Dashboard or by polling APIs.
        
            
                1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
                2. Check if a `payment_ID` has been generated and note the status. In case of a successful payment, the status is marked as `captured`.
                
                    ![](/docs/assets/images/testpayment.jpg)
            
            
                  [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments) to check the payment status.
            
        
        

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
### 3.1 Accept Live Payments

         Perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you are switching your test API keys with API keys generated in Live Mode.
> 

To generate API Keys in Live Mode on your Razorpay Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.
