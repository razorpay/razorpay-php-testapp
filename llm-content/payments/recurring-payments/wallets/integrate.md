---
title: Integrate Recurring Payments Using Wallets
description: Steps to integrate Recurring Payments using Wallet.
---

# Integrate Recurring Payments Using Wallets

Set up recurring payments using Touch'n Go wallet. Customers authorise their wallet once and subsequent payments are processed automatically without additional authentication.

## Integration Flow

The recurring payments integration involves three main steps:

1. [Register Wallet Mandate](#1-register-wallet-mandate): Customer authorises their wallet for future charges.
2. [Fetch Token Details](#2-fetch-token-details): Retrieve and verify the mandate registration.
3. [Charge Customers](#3-charge-customers): Create subsequent payments as needed.

## 1. Register Wallet Mandate

Mandate registration creates an **authorisation transaction** where customers provide consent to charge their Touch'n Go wallet for future payments. This generates a secure **token** that represents the customer's payment authorisation.

    

        
> **WARN**
>
> 
>         **Watch Out!**
>         
>         Standard Checkout authorisation can only be created using Razorpay Curlec APIs.
>         

        **Step 1:** [**Create a Customer**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/wallets/create-authorization-transaction.md#111-create-a-customer)
        
        Create a customer record in Razorpay Curlec to associate the mandate with. This returns a `customer_id` to be used in subsequent steps.

        **Step 2:** [**Create an Order**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/wallets/create-authorization-transaction.md#112-create-an-order)
        
        Create an order for the authorisation amount. You can set this to RM 1 for minimal authorisation or the actual first payment amount. Pass the token parameters including `max_amount` and `expire_at` to set mandate limits.

        **Step 3:** [**Create Authorisation Payment**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/wallets/create-authorization-transaction.md#113-create-an-authorization-payment)
        
        Initialise Razorpay Curlec Checkout with the `order_id`, `customer_id` and recurring-specific parameters. Specify `wallet` as the payment method. The customer completes the authorisation on Touch'n Go interface. Once the authorisation is successful, you receive a `token_id` in the payment response. This token represents the customer's wallet mandate.

    
    

        ### Registration Link Flow

        ![Recurring Payments Using Registration Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/recurring-payments-recurring_payments_registration_link.jpg.md)

        **Create a Registration Link** using:
        - [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/wallets/create-authorization-transaction.md#121-create-a-registration-link)
        - [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#1-create-a-registration-link)

        Specify the authorisation amount, customer details, wallet type (Touch'n Go) and token parameters (max_amount and expire_at). The link can be sent to your customer via email or SMS.

        **Send the link** to your customer. The customer clicks the link, is redirected to Touch'n Go wallet interface, and completes the authorisation.

        
> **INFO**
>
> 
>         **No Need to Create Customer and Order Separately**
>         
>         When using registration links, Razorpay Curlec automatically creates both the customer and order records for you.
>         

        ### Registration Link Statuses

        @include recurring-payments/registration-link-states
    

    
### Authorisation Payment Statuses

         @include recurring-payments/authorization-payment-states
        

## 2. Fetch Token Details

After the authorisation transaction is complete, a **token** is generated. The token securely stores the customer's wallet authorisation and represents their mandate.

You can retrieve token information using:

- [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/wallets/tokens.md)
- [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#3-search-for-the-token)
- [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/subscribe-to-webhooks.md#token-states)

    
### Token Lifecycle

         Tokens move through different states from creation to expiry:

         ![Token life cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/rec-pmnts-2_1_1_1.jpg.md)

         @include recurring-payments/token-states
        

## 3. Charge Customers

Once the token is in **confirmed** state, you can create recurring payments without customer intervention. Each subsequent payment requires you to create a new charge request.

> **WARN**
>
> 
> **Important**
> 
> - Always ensure the charge amount does not exceed the `max_amount` specified during token creation. Charges exceeding this limit will fail.
> - Ensure customers maintain sufficient balance in their Touch'n Go wallet for successful recurring charges.
> 

### How to Charge Customers

    

        **Step 1:** [**Find the Token**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#3-search-for-the-token)
        
        Use the Dashboard search to locate the customer's token. Verify the token status is **confirmed**.

        **Step 2:** [**Create a Charge**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#4-charge-the-token)
        
        Click **Charge Token** and enter the payment amount. Razorpay Curlec automatically creates an order and processes the payment.

        
> **INFO**
>
> 
>         **Automatic Order Creation**
>         
>         When charging via Dashboard, Razorpay Curlec automatically creates the order for you - no need to create it separately.
>         

    
    
        
        **Step 1:** [**Create an Order**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/wallets/create-subsequent-payments.md#31-create-an-order-to-charge-the-customer)
        
        Each subsequent payment must be associated with a unique order. This allows you to track payments and handle retries. Specify the charge amount, currency (MYR) and optional notes for tracking.

        **Step 2:** [**Create a Recurring Payment**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/wallets/create-subsequent-payments.md#32-create-a-recurring-payment)
        
        Use the `token_id` to create a payment for the order. No customer action required. The payment is processed automatically against the customer's Touch'n Go wallet balance.

        
> **SUCCESS**
>
> 
>         **Best Practice**
>         
>         Set up webhooks to receive real-time notifications about payment status changes. This ensures you are immediately notified of successful or failed charges.
>         

    

### Related Information
[List of Wallets APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/wallets/apis.md)
