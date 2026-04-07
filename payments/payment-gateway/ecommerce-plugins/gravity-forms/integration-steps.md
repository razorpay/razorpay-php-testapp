---
title: Payment Gateway | Gravity Forms - Integration Steps
heading: Integration Steps
description: Steps to integrate your WordPress website using the Gravity Forms plugin.
---

# Integration Steps

Follow the steps given below to integrate Razorpay Payment Gateway with your Gravity Forms website.

  - **1. Build Integration**: Install and configure the WordPress plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Download Razorpay Gravity Forms Plugin and Configure Settings

         Follow the steps given below:
         1. Download and install the Razorpay Gravity Forms Plugin. You can do this using either of these methods:
             - [Download the latest version of the plugin from the WordPress Plugin Directory](https://github.com/razorpay/razorpay-gravity-forms/releases/latest) and add the zip file to your WordPress website's **Plugins** folder.
             - Add the plugin directly on your WordPress website from the **Plugin** page.
                 
         1. On your WordPress site, activate the plugin in the **WordPress Plugin Manager**. 

             

         1. Click **Settings**. 

             

         1. Configure the following information and click **Update Settings**:
            - Add in your [KEY_ID] and [KEY_SECRET] generated from the Razorpay Dashboard.
            - **Payment Action**: Set this to **Authorize and Capture**.
         1. Select the currency in which the payment must be accepted. 
            1. Navigate to **Forms** → **Settings**.
            2. Under **General Settings**, go to the **Currency** field and choose the relevant currency. For this example, we will select **Indian Rupee**.
            
        

    
### 1.2 Create a Gravity Form

         To create a Gravity Form:
         1. Navigate to **Forms** → **New Form** and click **Add New**.
         2. Enter the form title and description in the **Create a New Form** dialog box.
         3. Click **Create Form**.
         4. Before entering the product details, you must select whether you are selling a subscription or a product/service. Navigate to **Settings** → **Razorpay** and configure the **Razorpay Feed**.
            1. In the **Razorpay Feed** settings, click **Add New**.
            2. Add a name for the feed. For example, `Ooty Green Tea`.
            3. Select `Products and Services` as the **Transaction Type**.
            4. Click **Update Settings**.
                 

         4. Click **Edit** to start adding product details:
             

            1. Click **Pricing Fields** and select **Product**.
                 

            2. Click the form to enter the product details and click **Update**.
                1. **Field Label**: Enter the product name. For example, `Ooty Green Tea`.
                2. **Description**: Enter a description for the product.
                3. **Field Type**: Select the field type as required.
                4. **Price**: Enter the product price in INR. For example, `399.99`.
                5. **Disable Quantity Field**: Do not select this option if your customer wants to choose a quantity.
                6. **Rules**: Enable the **Required** check box to make the quantity field mandatory.
             

         The form is now ready to be added to your web pages.
        

    
### 1.3 Add the Form to a Webpage

         To add the form on a webpage:
         1. Click **Pages** to navigate to the relevant page.
         2. Add a block and click the form icon.
             

         3. Select the form to be added to the page.
             

         4. Once the form is added, you can choose to hide the form title and description.
         5. Click **Publish** or **Update**.
        

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Webhook is auto-configured when you enter and save the API key ID and secret on the plugin settings page. You need to [verify if webhooks are enabled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/gravity-forms/troubleshooting-faqs.md#2-how-can-i-verify-if-webhooks-are) on your Razorpay Dashboard. However, for versions lower than 1.3.2, you need to [configure webhooks manually](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/gravity-forms/troubleshooting-faqs.md#1-my-webhooks-are-not-auto-configured-since-i).
> 

## 2. Test Integration

After the integration, Razorpay will appear as a payment option on your web page/app. You need to click the button and make a test transaction to ensure the integration works as expected. You can start accepting actual payments from your customers once the test is successful.

You can make test payments using one of the payment methods configured at the Checkout.
- No money is deducted from the customer's account as this is a simulated transaction.
- Ensure you have entered the API keys generated in the test mode in the Checkout code.

    
### Supported Payment Methods

         After the integration is complete, a **Pay** button appears on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test transaction is successful.

> **WARN**
>
> 
> **Watch Out!**
> 
> This is a mock payment page that uses your test API keys, test card and payment details. 
> - Ensure you have entered only your [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) in the Checkout code. 
> - Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> 

Following are all the payment modes that the customer can use to complete the payment on the Checkout. Some of them are available by default, while others may require approval from us. Raise a request from the Dashboard to enable such payment methods.

Payment Method | Code | Availability
---
[Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `debit` | ✓
---
[Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `credit` | ✓
---
[Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md) | `netbanking`| ✓
---
[UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md) | `upi` | ✓
---
EMI - [Credit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md), [Debit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md) and [No Cost EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/no-cost-emi.md) | `emi` | ✓
---
[Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md) | `wallet` | ✓
---
[Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md) | `cardless_emi` | Requires [Approval](https://razorpay.com/support).
---
[Bank Transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md) | `bank_transfer` | Requires [Approval](https://razorpay.com/support) and Integration.
---
[Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md) | `emandate` | Requires [Approval](https://razorpay.com/support) and Integration.
---
[Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md)| `paylater` | Requires [Approval](https://razorpay.com/support).

You can make test payments using one of the payment methods configured at the Checkout.

    
        Netbanking
        
         You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.

         Check the list of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md#supported-banks).
        

    
### UPI

         You can enter one of the following UPI IDs:

         - `success@razorpay`: To make the payment successful. 
         - `failure@razorpay`: To fail the payment.

         Check the list of [supported UPI flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
>          

        

    
### Cards

         You can use the following test cards to test transactions for your integration in Test Mode.

         ### Domestic Cards

         Use the following test cards for Indian payments:

         
         Network | Card Number | CVV & Expiry Date
         ---
         Visa  | 4100 2800 0000 1007 | Use a random CVV and any future date ^^^^^
         ---
         Mastercard | 5500 6700 0000 1002 | 
         ---
         RuPay | 6527 6589 0000 1005 | 
         ---
         Diners | 3608 280009 1007 | 
         ---
         Amex | 3402 560004 01007 | 
         

         #### Error Scenarios

         Use these test cards to simulate payment errors. See the [complete list](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#error-scenario-test-cards) of error test cards with detailed scenarios.
         Check the following lists: 
         - [Supported Card Networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
         - [Cards Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/cards.md).

         ### International Cards

         Use the following test cards to test international payments. Use any valid expiration date in the future in the MM/YY format and any random CVV to create a successful payment.

         
         Card Network | Card Number | CVV & Expiry Date
         ---
         Mastercard | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 | Use a random CVV and any future date ^^
         ---
         Visa | 4012 8888 8888 1881 |
         

         Check the list of [supported card networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
        

    
### Wallet

         You can select any of the listed wallets. After choosing a wallet, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the wallet login portals.

         Check the list of [supported wallets](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).
        

        
    
    
### Verify Payment Status

        You can track the payment status from the Dashboard or by polling APIs.
        
            
                1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
                2. Check if a `payment_ID` has been generated and note the status. In case of a successful payment, the status is marked as `captured`.
                
                    
            
            
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

        

    
### 3.2 Payment Capture

         After payment is `authorized`, you need to capture it to settle the amount to your bank account as per the settlement schedule. Payments that are not captured are auto-refunded after a fixed time.

> **WARN**
>
> 
> 
> **Watch Out**
> 
> - You should deliver the products or services to your customers only after the payment is captured. Razorpay automatically refunds all the uncaptured payments.
> - You can track the payment status using our [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-a-payment) or webhooks.
> 

  
    Authorized payments can be automatically captured. You can auto-capture all payments [using global settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments) on the Razorpay Dashboard. Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Payment capture settings work only if you have integrated with Orders API on your server side. Know more about the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
>     

  
  
    Each authorized payment can also be captured individually. You can manually capture payments using [Payment Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments). Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
