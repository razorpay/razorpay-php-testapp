---
title: Recurring Payments
description: Know how to create and collect an authorisation transaction from your customer and how you can charge the customer recurring payments.
---

# Recurring Payments

Recurring Payments allow you to charge your customers repeatedly without requiring them to enter payment details each time. Your customers authorise their payment method once and you can charge them at intervals you control based on your business needs.

Use Razorpay Recurring Payments to create flexible payment schedules for subscriptions, installments, usage-based billing or on-demand charges. Set up recurring payments quickly using our powerful REST APIs.

 to get this feature activated on your Razorpay account.

> **SUCCESS**
>
> 
> **What's New**
> - RuPay cards from all major banks are supported. (April 2024)
> 

  
### How It Works

     1. **Authorise**: Customer authorises their payment method.
     2. **Tokenise**: Payment method is securely tokenised after first successful payment.
     3. **Charge**: You initiate charges as needed using the token.
    

  
### When to Use Recurring Payments

     Recurring Payments are ideal when you need:
      - **Flexible billing cycles**: Charge customers based on usage, milestones or variable schedules.
      - **Manual control**: You decide when to charge each payment.

      For automated, fixed-schedule billing (weekly, monthly, quarterly), consider using [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md) instead.
    

  
### Recurring Payments vs. Subscriptions

     
      

      Feature | Recurring Payments | Subscriptions
      ---
      **Best For** | Variable billing, usage-based charges, on-demand payments | Fixed schedules (weekly, monthly, quarterly, yearly)
      ---
      **Scheduling** | You initiate each charge via API when needed | Automatically scheduled and charged by Razorpay
      ---
      **Control** | Full manual control over timing and amounts | Set-and-forget automation
      ---
      **Tokenisation** | After first successful payment | Based on selected frequency
      ---
      **Payment Methods** | - Credit Cards
- Debit Cards
- Emandate (Netbanking, Debit Card, Aadhaar)
- Paper NACH
- UPI
 | - Credit Cards
- Debit Cards
- UPI
- Emandate

      
      

      

      

    

## Available Payment Methods

Choose the payment method that best suits your business model:

  
   Accept Recurring Payments with UPI Autopay.
   

  
   Accept Recurring Payments with Cards.
   

  
   Accept Recurring Payments with Emandate.
   

  
   Accept Recurring Payments with Paper NACH.
   

## Use Cases

  
### Usage-Based Billing - Online Marketing Agency

     **Scenario**: Acme Corp, an online marketing agency, charges clients based on actual ad clicks rather than fixed monthly fees.

     **Example**: A client wants to run campaigns for three months, paying  per 5,000 clicks.

     **Solution**: Authorise the payment method once, then charge the customer each time they reach 5,000 clicks. The amount and timing varies based on actual usage.

     **Recommended Method**: Cards or UPI for quick authorisation (₹1 minimum)

     → [Set up with Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/create-authorization-transaction.md)
     
     → [Set up with UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction.md)
     
    

  
### Flexible Investment Plans - Investment Management Company

     **Scenario**: Acme Finance, an investment company, offers mutual funds where customers make an initial investment and add variable amounts later.

     **Example**: Customer invests  initially and can invest any amount (₹500, ₹2000, ₹5000) at any time.

     **Solution**: Charge the initial investment immediately during authorisation, then process subsequent investments as requested by the customer.

     **Recommended Method**: Emandate or Paper NACH for long-term investment commitments.

     
     
     → [Set up with Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction.md) | [Set up with Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction.md)
     
    

## Get Started

Select the [payment method](#available-payment-methods) based on your use case and customer preferences. Follow these steps to implement Recurring Payments:

  
### Step 1: Create Authorisation Payment

     
      Set up the authorisation payment using:
      - [APIs for Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/create-authorization-transaction.md)
      - [APIs for UPI Autopay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction.md)
      - [APIs for UPI OTM](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi-otm/authorization-transaction.md)
      - [APIs for UPI TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi-tpv/create-authorization-transaction.md)
      - [APIs for Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-authorization-transaction.md)
      - [APIs for Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-authorization-transaction.md)
      

      

      
    

  
### Step 2: Fetch Token Details

      
       Fetch the customer's token detail to proceed with the authorisation payment using:
       - [APIs for Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/tokens.md)
       - [APIs for UPI Autopay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi/tokens.md)
       - [APIs for UPI TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi-tpv/tokens.md)
       - [APIs for UPI OTM](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi-otm/tokens.md)
       - [APIs for Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/tokens.md)
       - [APIs for Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/tokens.md)
      
      
      
    

  
### Step 3: Charge Subsequent Payments

      
       Use the token to charge customers as needed using:
       - [APIs for Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/create-subsequent-payments.md)
       - [APIs for UPI Autopay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi/create-subsequent-payments.md)
       - [APIs for UPI TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi-tpv/create-subsequent-payments.md)
       - [APIs for UPI OTM](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi-otm/one-time-payment.md)
       - [APIs for Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/create-subsequent-payments.md)
       - [APIs for Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/paper-nach/create-subsequent-payments.md)
            
            
      
    

## Supported Platforms

Razorpay Recurring Payments is supported on the following platforms:

  
    
    Web | Android | iOS | Webview
    ---
    ✓ | ✓ (excluding Paper NACH) |	✓ |	✓
    
  
  
    
    Web | Android | iOS | Webview
    ---
    ✓ | ✓ (excluding Paper NACH) | ✓ | ✓
    
  

### Related Information

- [Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md)
- [Cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/cards/integrate.md)
- [Paper NACH](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/paper-nach/integrate.md)
- [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi/integrate.md)
- [Optimizer Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer/recurring-payments.md)
