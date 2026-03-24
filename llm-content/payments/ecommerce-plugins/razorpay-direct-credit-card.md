---
title: Integrate With Razorpay Direct - Credit Card Plugin
heading: Integration Steps
description: Integrate your Shopify store with Razorpay Direct - Credit Card plugin and start accepting credit card payments directly on the checkout page.
---

# Integration Steps

Follow the steps given below to integrate credit card payment with your Shopify store directly on the checkout page using Razorpay Direct - Credit Card plugin.

  - **1. Build Integration**: Install and configure the Razorpay Direct - Credit Card plugin.

  - **2. Test Integration**: Test the integration by making a test payment.

- **3. Go-Live Checklist**: Check the go-live checklist.

## 1. Build Integration

    
### Install the plugin

    
         1. **Install** [Razorpay Direct - Credit Card](https://apps.shopify.com/razorpay-cc-prod) from the Shopify app store.
            ![Activate Razorpay Direct - Credit Card plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-store-cc-plugin-install.jpg.md)
             
> **INFO**
>
> 
>              **Handy Tips**
>          
>              If you have multiple stores, select the store for which you want to install the Razorpay Direct - Credit Card.
>              

         2. You will be redirected to the Shopify home screen. Click **Install app**.
            ![Shopify install app](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-installapp.jpg.md)
         
         3. You will be redirected to a landing page. Click **I am an existing user** and log in to your Razorpay account.
            ![Shopify auth for existing Razorpay user](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-auth.gif.md)

             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              - Ensure you log in with **owner** credentials to connect Razorpay with Shopify successfully.
>              - If you are a new Razorpay user, click **I am new to Razorpay** and [set up](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md) an account.
>              

         4. Click **Activate Razorpay Direct - Credit Card** on the activation screen on your Shopify Dashboard. 
            ![Activate Razorpay Direct - Credit Card plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-activate-cc-plugin.jpg.md)

         Razorpay Direct - Credit Card Plugin now appears as a payment method on your Shopify Store.
         ![Enabled credit card plugin on shopify store](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-plugin-store.jpg.md)

         
> **INFO**
>
> 
> 
>          **Handy Tips**
> 
>          - Webhooks is auto-configured. You need to verify if webhooks are enabled on your [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/razorpay-direct-credit-card/troubleshooting-faqs.md#7-how-can-i-verify-if-webhooks-are).
>          - The `order.paid`, `payment.authorized`, `refund.processed` and `refund.failed` events are auto-configured. You do not have to configure it on the Dashboard. 
>          

        

## 2. Test Integration

After the integration is complete, you need to ensure that the integration is working as expected. You can start accepting actual payments from your customers once the test mode transaction is successful.

    
### Test Transaction in Test Mode

            Follow the steps given below to test a transaction in test mode:

                 1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
                 2. Navigate to **Settings** → **Payments**. 
                 3. Click **Manage** on the **Razorpay Direct - Credit Card** app.
                    ![edit settings on the plugin to enable test mode](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-test-navigation.jpg.md)
                 4. At the bottom of the page, select the **Enable test mode** check box and click **Save**.
                    ![Enable test mode to test the flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-enable-test-mode.jpg.md)
                 5. On your Shopify store, add an item to your cart and click **Buy it now**.
                 6. Fill in your **contact** and **shipping** details and click **Continue to shipping**.
                 7. Select the **Shipping method** and click **Continue to payment**.
                 8. Select **Credit card** and enter the card details.
                 9. Click **Pay now** and complete the order.
                    ![Test Razorpay Direct - Credit Card plugin](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-test.gif.md)

        

    
### Verify Payment Status

         You can track the payment status from the Razorpay Dashboard or poll our APIs.

            
                
                    

                    
                
                
                    [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments) to check the payment status.
                
            
        

## 3. Go-live Checklist

Follow these steps before taking the integration live:

    
### Switch from Test Mode to Live Mode

          You can perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the installation and integration is working as expected, switch to the Live Mode and start accepting payments from customers.

                 To switch from Test Mode to Live Mode:
                 1. Log in to your [Shopify store](https://accounts.shopify.com/lookup?rid=f19e1541-cd24-4856-a398-156d2ed5d56f).
                 2. Navigate to **Settings** → **Payments**.
                 3. On the **Supported payment methods** section, click **Manage** on the **Razorpay Direct - Credit Card** app.
                 4. At the bottom of the page, clear the **Enable test mode** check box and click **Save**.
                    ![Disable test mode to start accepting payments from customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-live.jpg.md)

                 You can now start accepting actual payments on your Shopify store.
        

## Refunds

#### Initiate Refunds

To initiate refunds using Shopify store:

1. Log in to the [Shopify account](https://www.shopify.in).
2. After a payment is completed, navigate to **Orders**. 
3. Select the order you want to initiate a refund.
        ![Select the order to initiate refund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-orders.jpg.md)
4. Click **Refund**.
        ![Initiate refund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-refund.jpg.md)
5. Select the quantity of the item and click **Refund**.
6. You can either issue a full refund or a partial refund.
    - For a **full refund**, enter the entire payment amount.
    - For a **partial refund**, enter a value lesser than the payment amount.
        ![Refund the order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-refund-order.jpg.md)
7. You can verify the refund status from the Dashboard. Navigate to **Transactions** → **Refunds** and check if a **Refund Id** is generated for the relevant Payment Id.
        ![Verify refund status on the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/shopify-cc-refund-verify.jpg.md)
     

## Support
If you have queries, raise a ticket on the [Razorpay Support Portal](https://razorpay.com/support/).

### Related Information

- [Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/ecommerce-plugins/razorpay-direct-credit-card/troubleshooting-faqs.md)
- [Ecommerce Plugins](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins.md)
