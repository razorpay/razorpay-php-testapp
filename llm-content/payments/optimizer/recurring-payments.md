---
title: Recurring Payments
description: Create and collect an authorisation transaction from your customer and charge the customer for recurring payments on Optimizer.
---

# Recurring Payments

You can use Optimizer Recurring Payments to set up and oversee customer payments on your terms. It is a user-friendly self-serve feature on Optimizer that simplifies the process, enabling you to establish recurring payment schedules for your customers effortlessly. 

## Supported Payment Gateways and Methods

Payment Gateways | Payment Methods
---
PayU | - [Emandate (Live)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md)
- [Cards (Live)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/cards/integrate.md)
- [UPI Autopay (Live)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction.md)

---
Razorpay | - [Emandate (Live)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md)
- [Cards (Live)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/cards/integrate.md)
- [UPI Autopay (Live)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction.md)

---
HDFC Mindgate | - UPI Autopay (Live)

> **WARN**
>
> 
> **Watch Out!**
> 
> Optimizer rules apply only for the first-time registration payment. All subsequent debits happen on the same terminal used for registration payment. Optimizer Rules will not be applicable for subsequent payments.
> 

## Integrate Emandate (PayU)

### Prerequisites

1. Write to your PayU Relationship Manager with the following requests:
    - Enable seamless mode for your account. Mention that you use a technology company to handle sensitive card data.
    - Enable the method ENACH for your account.
    - Configure the webhook URL as `https://api.razorpay.com/v1/callback/payu` to receive an Emandate response.
    - Subscribe to webhooks for all emandate payment events.
    - Enable the required banks.
    - Provide **PayU key** and **Salt key** details.
2. You should have an [active Razorpay account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md) with [Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer.md) enabled.
3. Get in touch with your Razorpay Relationship Manager to enable **Emandate** as a payment method.

### Integration Steps
Below are the steps to integrate Recurring Payments for PayU using Emandate as a payment method:

    
### Step1: Add PayU as a Payment Provider

         Know how to [add PayU as a payment provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/payu.md#add-payu-as-a-payment-provider).

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Ensure you select `Emandate` as a payment method while selecting the required payment methods.
>             

        

    
### Step2: Route Emandate Transactions

         To route emandate transactions via Optimizer, configure the rule as follows:
            1. Log in to your Dashboard. 
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
                ![optimizer login](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-login.jpg.md)

            3. Click **+Add New Rule** and enter the **Rule name** and **Description**.
                ![add new rule and description](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-rule-description.gif.md)

            4. Click **Next** and enter the following rule:
                - In **Select Parameter** field, select **Payment Method**.
                - In **Select Connection** field, select **Equal to**.
                - In **Select Comparing Value** field, select **emandate**.
                ![optimizer emandate payu first rule condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emandate-rule-condition.jpg.md)
            5. Click **Add Another Condition** and enter the following rule:
                - In **Select Parameter** field, select **Emandate Authentication Type**.
                - In **Select Connection** field, select **One Of**.
                - In **Select Comparing Value** field, select **netbanking** or **debit card** as per your requirement and click **Next**. 
                
> **WARN**
>
> 
>                 **Watch Out!**
> 
>                 PayU does not support Aadhaar-based authentication. To use Aadhaar authentication, route transactions to Razorpay.
>                 

                ![optimizer emandate payu second rule condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emandate-rule-condition-two.jpg.md)
                
            6. Enter the value **100** in the **Route** field, select **payu** in the **payment via** drop-down, and click Next.
                ![add provider emandate payu](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emandate-payu-add-provider.jpg.md)
            7. Click **Publish Rule**.
                ![emandate payu publish rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emandate-payu-publish-rule.jpg.md)
        

## Integrate Cards (PayU)

### Prerequisites
1. Write to your PayU Relationship Manager with the following requests:
    - Enable seamless mode for your account. Mention that you use a technology company to handle sensitive card data.
    - Enable the method **Card Recurring** for your account.
    - Configure the webhook URL as `https://api.razorpay.com/v1/callback/payu` to receive a card recurring response.
    - Subscribe to webhooks for all card recurring payment events.
    - Provide **PayU key** and **Salt key** details.
2. You should have an [active Razorpay account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md) with [Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer.md) enabled.
3. Get in touch with your Razorpay Relationship Manager to enable **Card Recurring** as a payment method.

### Integration Steps
Below are the steps to integrate Recurring Payments for PayU using Cards as a payment method:

    
### Step 1: Add PayU as a Payment Provider

         Know how to [add PayU as a payment provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/payu.md#add-payu-as-a-payment-provider).

            
> **WARN**
>
> 
>             **Watch Out!**
> 
>             Ensure you select `Card` as a payment method while selecting the required payment methods.
>             

        

    
### Step 2: Route Cards Transactions

         To route cards transactions via Optimizer, configure the rule as follows:
            1. Log in to your Dashboard. 
            2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
                ![optimizer login](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-login.jpg.md)
            3. Click **+Add New Rule** and enter the **Rule name** and **Description**.
                ![cards recurring add new rule and description](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cards-recurring-add-rule-description.jpg.md)
            4. Click **Next** and enter the following rule:
                - In **Select Parameter** field, select **Payment Method**.
                - In **Select Connection** field, select **Equal to**.
                - In **Select Comparing Value** field, select **card**.
                ![optimizer card recurring payu first rule condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/card-recurring-rule-condition.jpg.md)
            5. Click **Add Another Condition** and enter the following rule:
                - In **Select Parameter** field, select **Recurring (card)**.
                - In **Select Connection** field, select **Equal to**.
                - In **Select Comparing Value** field, select **true** and click **Next**.
                ![optimizer cards recurring payu second rule condition](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cards-recurring-rule-condition.jpg.md)
            6. Enter the value **100** in the **Route** field, select **payu** in the **payment via** drop-down, and click Next.
                ![add provider emandate payu](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emandate-payu-add-provider.jpg.md)
            7. Click **Publish Rule**.
                ![cards recurring payu publish rule](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cards-recurring-payu-publish-rule.jpg.md)

        

> **INFO**
>
> 
> **Handy Tips**
> 
> You can follow similar steps for UPI payments by selecting UPI as the payment method.
>
