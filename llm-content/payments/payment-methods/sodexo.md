---
title: Sodexo
description: Accept payments using Sodexo meal cards for food and beverage orders.
---

# Sodexo

Accept payments using Sodexo meal cards for food and beverage purchases with Razorpay Optimizer. By incorporating Sodexo meal card payments, businesses can offer customers a seamless and familiar payment experience, expanding the range of payment options available for food and beverage purchases.
![sodexo checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sodexo-checkout.jpg.md)

## Add Sodexo as a Payment Method

> **INFO**
>
> 
> **Handy Tips**
> 
> Sodexo integration is supported on all checkout types: [standard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md), [custom](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md), and [server-to-server (S2S)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration.md).
> 

Follow the steps given below on the Razorpay Dashboard:

    
### Step 1: Enable Optimizer and Add PayU as Payment Provider

         1. Enable [Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer.md) on your Razorpay account.
         2. Log in to the Dashboard and navigate to **Optimizer**.
         3. [Add PayU as a payment provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/payu.md#add-payu-as-a-payment-provider).
         4. Select `card` and `sodexo` payment methods and submit.
             ![Add Salt Key sodexo](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-key-salt-new-payu-sodexo.jpg.md)
        

    
### Step 2: Configure Sodexo as a Payment Method

         1. On the Razorpay Dashboard, navigate to **Account & Settings**.
         2. Select **Sodexo** from the list of payment methods and click **Request**. Know more about [how to request for a payment method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-methods.md#request-for-payment-methods).
             ![sodexo request](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/sodexo-request.jpg.md)

         After the completion of the above steps, Sodexo appears on the Razorpay Checkout.
