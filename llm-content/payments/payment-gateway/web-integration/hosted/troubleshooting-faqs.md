---
title: Hosted Web Integration - Troubleshooting & FAQs | Razorpay Payment Gateway
heading: Troubleshooting & FAQs
description: Troubleshoot common errors and find answers to frequently asked questions related to Razorpay Hosted Web Integration.
---

# Troubleshooting & FAQs

### 1. What is Razorpay Hosted Checkout?

          Razorpay Hosted Checkout is a secure and customisable solution for accepting payments on your website. It allows you to redirect customers to a Razorpay-hosted page to complete their transactions, ensuring data security and compliance with payment regulations.
        

    
### 2. What payment methods are supported by Razorpay Hosted Checkout?

          Razorpay Hosted Checkout supports a wide range of payment methods including  netbanking, credit and debit cards, wallets, UPI and Pay Later  . You can offer your customers multiple payment options to enhance their checkout experience.
         
          
          
> **WARN**
>
> 
>           **Watch Out!**
>           
>           We do not support EMI, Offers and UPI intent on Hosted Checkout.
>           

          

          
        

    
### 3. Which webhook events should I enable to ensure proper payment tracking?

          To ensure proper payment tracking and receive real-time updates, you should enable the following webhook events:

             - `payment.captured`
             - `payment.failed`
             - `order.paid`
        

    
### 4. How can I avoid cases of callback failure?

          To avoid cases of callback failure due to connectivity or network issues, implement webhooks or use the query API. Know more about [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).
        

    
### 5. Will an order_id be generated each time a user visits the pricing page? How can I handle the order_id when there is limited time to make a POST form call?

          The order_id can be generated in real time as required. Your implementation should be designed to handle the order_id generation at the moment it is required, ensuring that the necessary POST form call can be made efficiently.
