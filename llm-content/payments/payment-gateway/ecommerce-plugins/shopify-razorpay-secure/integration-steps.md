---
title: Shopify Razorpay Secure Integration Steps | Payment Gateway Setup
heading: Integration Steps
description: Step-by-step guide to integrate Razorpay Payment Gateway with Shopify. Install Razorpay Secure app and start accepting payments on your Shopify store.
---

# Integration Steps

Follow the steps given below to integrate 1 Razorpay App on your Shopify store.

  - **1. Build Integration**: Install the 1 Razorpay App.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Installation

         1. Sign up for a .
         2. Once your Razorpay account is activated, click on [this link](https://apps.shopify.com/razorpay-secure) to access the Razorpay Secure App on your Shopify store. Click **Install**.
            ![Shopify Install](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-razorpay-secure-install-new.jpg.md)
         3. You will be redirected to a landing page. Click **I am an existing user**.
         4. Scroll down and click **Login**. 
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             Make sure you log in with **owner** credentials to connect Razorpay with Shopify successfully.
>             

         5. Click **Activate** on the activation screen on your Shopify Dashboard. 

            ![Shopify Activate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-1razorpay-activate.jpg.md)

         Razorpay Secure now appears as a Payment Gateway on your Shopify Store checkout. This completes your integration. For more information, see [Shopify FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins/shopify-razorpay-secure/faqs.md).

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          **Shopify Plus** merchants can use the [**Shopify Script**](https://help.shopify.com/en/manual/checkout-settings/script-editor/examples/payment-gateway-scripts#reorder-gateways) to modify their plugins. 

>          For example, you can: 
 
>             - Change the order of the payment methods on your checkout.
>             - Select the relevant payment methods on your checkout.
>             - Modify the payment option title on your checkout.
>                 
>          

        

## 2. Test Integration

After the integration of **Shopify - Razorpay Secure** on your Shopify store is complete, follow the steps given below:

    
### 2.1 Make a Test Transaction in Test Mode

         After completing the integration, you must ensure it is working as expected. You can start accepting actual payments from your customers once the test mode transaction is successful.

         Follow the steps given below to test a transaction in test mode:

         

         

         

         You can make test payments using one of the payment methods configured at the Checkout.

            - No money is deducted from the customer's account as this is a simulated transaction.
            - Ensure you have entered the API keys generated in the test mode in the Checkout code.
         
         
            
                Supported Payment Methods
                
                 After the integration is complete, a **Pay** button appears on your webpage/app. 

![Test integration on your webpage/app](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/test-int.gif.md)

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
[Pay Later ](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md)| `paylater` | Requires [Approval](https://razorpay.com/support).

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
        

                
            
         
        
    
    
### 2.2 Update Checkout Settings

         Follow the steps given below for a smooth checkout experience:
         1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
         2. Navigate to **Settings** → **Checkout**. 
         3. On the **Customer contact method** section, click **Phone number or email** and click **Save**.
            ![Shopify Checkout v2](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-checkout-v2.jpg.md)

         
> **INFO**
>
> 
> 
>          **Handy Tips**
> 
>          Your customer's email ID is prefilled during checkout, but the `phone number` must be entered manually.
>          

        

    
### 2.3 Verify Payment Status

         You can track the payment status from the  Dashboard or by polling APIs.
            
                
                1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
                2. Check if a `payment_ID` has been generated and note the status. In case of a successful payment, the status is marked as `captured`. 
                    
                
                
                [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments) to check the payment status.
                
            
        

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
### 3.1 Switch from Test mode to Live mode

         You can perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the installation and integration is working as expected, switch to the Live Mode and start accepting payments from customers. 

         Watch this short animation to know how to switch from **Test Mode** to **Live Mode** on your Shopify store.

         ![Shopify Go Live](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-go-live-v2.gif.md)

         To switch from **Test Mode** to **Live Mode**:
         1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
         2. Navigate to **Settings** → **Payments**. 
         3. On the **Supported payment methods** section, click **Manage** on the **1 Razorpay** app.
            ![Shopify go live v2](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-go-live-v2.jpg.md)
         4. At the bottom of the page, untick the **Enable test mode** option and click **Save**.
            ![Shopify go live v2 save](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-go-live-save.jpg.md)
         You can now start accepting actual payments on your Shopify store.
