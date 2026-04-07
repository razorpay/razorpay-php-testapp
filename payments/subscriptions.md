---
title: Payments | Subscriptions
heading: About Subscriptions
description: Use Razorpay Subscriptions to accept recurring payments from your customers. Check the available billing models and the supported currencies.
---

# About Subscriptions

Discover new features, updates and deprecations related to Razorpay Subscriptions (since Jan 2024).

Use Razorpay Subscriptions to set up and manage recurring payments.

- Create a plan with your pricing and billing schedule, then create a subscription for customers. Razorpay automatically charges them at regular intervals. 

- Manage all Subscriptions directly from the Dashboard - create plans, manage customer subscriptions, handle upgrades/downgrades, or pause billing. 

- Receive near real-time notifications by subscribing to Webhook events.

## Advantages

* **Automated Billing**: Create a plan once and Razorpay automatically charges customers on schedule.
* **Multiple Billing Models**: Support fixed amounts, usage-based billing or add-ons for extra services.
* **Flexible Plans**: Set up trial periods, upfront charges and multiple pricing tiers.
* **Customer Management**: Allow customers to upgrade, downgrade, pause or cancel subscriptions.
* **Smart Payment Retries**: Automatic retry logic maximises successful collections.
* **Seamless Integration**: Integrate using Dashboard links or APIs.
* **Auto-Invoicing**: Invoices are automatically generated for every billing cycle.

## When to Use Subscriptions vs Recurring Payments

**Subscriptions** are plan-based recurring payments. You create a plan (pricing and billing schedule), create a subscription for each customer and Razorpay automatically charges them at the defined intervals. Billing is fully automated and managed from the Dashboard.

**Recurring Payments** let you charge customers repeatedly after they authorise their payment method once. You control when each charge is initiated using tokens. There is no built-in plan or automatic schedule; you trigger charges via API based on your business logic.

  
### Choose Subscriptions when you have:

      - Fixed billing schedules (weekly, monthly, quarterly, yearly)
      - Multiple pricing plans for customers to choose from
      - Need for automated, hands-off billing
    

   
### Choose Recurring Payments when you need:

      - Flexible billing based on usage or milestones
      - Manual control over when to charge each payment
      - On-demand or variable payment amounts

      See [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments.md) for flexible, usage-based billing.
    

## Supported Payment Methods

   
      Customers can make payments using credit and debit cards. Card details are securely tokenised as per RBI guidelines.
   
   
      Accept subscription payments via all major UPI apps including PhonePe, Google Pay, Paytm, BHIM and Amazon Pay.
   
   
      Enable automated recurring transactions via Aadhaar, netbanking or debit card-based mandates.
   

   

See [Supported Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-payment-methods.md) for complete details on limits and supported banks.

## Prerequisites

  
### 1. Sign up for Account

     Ensure you have a [Razorpay account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md).
    

   
### 2. Enable Flash Checkout

      1. Log in to the Dashboard.
      2. Navigate to **Account & Settings → Checkout Features** and enable **Flash checkout**.
     
        
     

   
### 3. Understand Tokenisation

     For card-based subscriptions, customer card details are securely tokenised with explicit consent during authorisation.
     
      
    

## Get Started

1. Log in to the Dashboard and navigate to **Subscriptions** under **PAYMENT PRODUCTS**.
2. [Create a Plan](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create.md#plan) to define your product, pricing and billing frequency.
3. [Create a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create.md#subscription) to link a customer to a plan using Dashboard or APIs.
4. Verify your subscription flow in [test mode](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/test.md).

## Integrate With Your Systems

You can integrate Razorpay Subscriptions with your existing systems:

   
      Create [Plans](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-plans.md) and [Subscription Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-subscription-links.md) and share via email/SMS - no coding required.
   
   
     Integrate Subscriptions with your website or app using [Subscriptions APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md).
   
   
     Set up [webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/subscribe-to-webhooks.md) to receive real-time notifications for subscription events.
   

#### Related Information

- [How Subscriptions Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/workflow.md)
- [Subscription Use Cases](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/use-cases.md)
- [Subscription States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/states.md)
- [Create Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create.md)
- [Integration Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/integration-guide.md)
* [Subscriptions APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/apis.md)
- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/faqs.md)
