---
title: Recurring Payments - S2S Integration
description: Integrate Recurring Payments using Razorpay APIs.
---

# Recurring Payments - S2S Integration

Recurring Payments allow you to charge your customers repeatedly without requiring them to enter payment details each time. Your customers authorise their payment method once and you can charge them at intervals you control based on your business needs.

Use Razorpay Recurring Payments to create flexible payment schedules for subscriptions, installments, usage-based billing or on-demand charges. Set up recurring payments quickly using our powerful REST APIs.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

  
### How It Works

     1. **Authorise**: Customer authorises their payment method.
     2. **Tokenise**: Payment method is securely tokenised after first successful payment.
     3. **Charge**: You initiate charges as needed using the token.
    

  
### When to Use Recurring Payments

     Recurring Payments are ideal when you need:
      - **Flexible billing cycles**: Charge customers based on usage, milestones or variable schedules.
      - **Manual control**: You decide when to charge each payment.

      For automated, fixed-schedule billing (weekly, monthly, quarterly), consider using [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md) instead.
    

## Integration Flow

The integration flow varies depending on how you choose to create the authorisation transaction.

  
### Using Razorpay APIs

     @include recurring-payments/inte-flow-rr-custom-checkout
    

  
### Using a Registration Link

     @include recurring-payments/inte-flow-reg-link
    

## API Gateway URL

For most of the Razorpay APIs, the Gateway URL is `https://api.razorpay.com/v1`. You need to include this before each API endpoint to make API calls. However, certain APIs are on V2. Hence, the gateway URL may differ for certain APIs.

    
### Example

            

            - Use the URL `https://api.razorpay.com/v1/payments` to access payment resources.

            - Use the URL `https://api.razorpay.com/v2/accounts` to access Route (Linked Account)-related resources.

            

            
        

## API Authentication

All Razorpay APIs are authenticated using `Basic Auth`. Basic auth requires the following:
- `[YOUR_KEY_ID]`
- `[YOUR_KEY_SECRET]`

Basic auth expects an `Authorization` header for each request in the `Basic base64token` format. Here, `base64token` is a base64 encoded string of `YOUR_KEY_ID:YOUR_KEY_SECRET`. 

> **WARN**
>
> 
> **Watch Out!**
> 
> The `Authorization` header value should strictly adhere to the format mentioned above. Invalid formats will result in authentication failures. 
> Few examples of **invalid** headers are: `BASIC base64token`, `basic base64token`, `Basic "base64token"` and `Basic $base64token`.
> 

  
### Generate API Key

     Follow these steps to generate API keys:

  
   Watch this video to see how to generate API keys in the Test mode.

   
[Video: https://www.youtube.com/embed/VOn8JlGPG2I?si=WTAbAeLB3Hnp1n3r]

  

  
   Watch this video to see how to generate API keys in the Live mode.

   
[Video: https://www.youtube.com/embed/Cer8UfBGX_E?si=Libr1RXoFSEDfY1c]

  

1. Log in to your Dashboard with the appropriate credentials.
2. Select the mode (**Test** or **Live**) for which you want to generate the API key. 
    - **Test Mode**: The test mode is a simulation mode that you can use to test your integration flow. **Your customers will not be able to make payments in this mode**. 
    - **Live Mode**: When your integration is complete, switch to live mode and generate live mode API keys. In the integration, **replace test mode keys with live mode keys to accept customer payments**.
3. Navigate to **Account & Settings** → **API Keys** (under **Website and app settings**) → **Generate Key** to generate key for the selected mode.

> **WARN**
>
> 
> **Watch Out!**
> 
> - After generating the keys from the Dashboard, download and save them securely. You can use only one set of API keys. If you do not remember your API keys, you must [regenerate them](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#regenerate-api-keys) from the Dashboard and update them wherever the previous keys were used for payment gateway integrations. 
> - API Keys are universal; that is, they are applicable to all websites and apps that you have whitelisted for your Merchant ID.
> - **Do not share your API Key secret** with anyone or on any public platforms. **This can pose security threats to your Razorpay account**.
> - Once you generate the API Keys, only the **Key Id** is visible on the Dashboard, **not the Key secret**, as it can pose security threats to your Razorpay account.
> - Use the **Live API Keys** to accept live payments and the **Test API Keys** for test transactions.
> 

    

## List of APIs as per Supported Payment Methods

  
### Step 1: Create Authorisation Payment

      
      Set up the authorisation payment using:
       - [APIs for Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/authorization-transaction.md)
       - APIs for UPI Autopay: [Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi/authorization-transaction.md) and [Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-intent/authorization-transaction.md)
       - APIs for UPI OTM: [Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/collect/authorization-transaction.md) and [Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/intent/authorization-transaction.md)
       - [APIs for UPI TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-tpv/authorization-transaction.md)
       - [APIs for Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/emandate/authorization-transaction.md)
       - [APIs for Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/paper-nach/authorization-transaction.md)
      
      
    

  
### Step 2: Fetch Token Details

      
      Fetch the customer's token detail to proceed with the authorisation payment using:
       - [APIs for Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/tokens.md)
       - APIs for UPI Autopay: [Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi/tokens.md) and [Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-intent/tokens.md)
       - APIs for UPI OTM: [Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/collect/tokens.md) and [Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/intent/tokens.md)
       - [APIs for UPI TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-tpv/tokens.md)
       - [APIs for Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/emandate/tokens.md)
       - [APIs for Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/paper-nach/tokens.md)
      
      
    

  
### Step 3: Charge Subsequent Payments

      
      Use the token to charge customers as needed using:
       - [APIs for Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/subsequent-payments.md)
       - APIs for UPI Autopay: [Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi/subsequent-payments.md) and [Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-intent/subsequent-payments.md)
       - APIs for UPI OTM: [Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/collect/one-time-payment.md) and [Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/intent/one-time-payment.md)
       - [APIs for UPI TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-tpv/subsequent-payments.md)
       - [APIs for Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/emandate/subsequent-payments.md)
       - [APIs for Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/paper-nach/subsequent-payments.md)
